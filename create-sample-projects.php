<?php
/**
 * Script para crear proyectos de ejemplo
 * INSTRUCCIONES: 
 * 1. Sube este archivo al directorio del tema
 * 2. Accede a: tu-sitio.com/wp-content/themes/new-horizon-developments/create-sample-projects.php
 * 3. Los proyectos se crearán automáticamente
 * 4. ELIMINA este archivo después de usarlo por seguridad
 */

// Cargar WordPress
$parse_uri = explode('wp-content', $_SERVER['SCRIPT_FILENAME']);
require_once($parse_uri[0] . 'wp-load.php');

// Verificar que el usuario esté logueado y sea administrador
if (!is_user_logged_in() || !current_user_can('manage_options')) {
    die('Acceso denegado. Debes estar logueado como administrador.');
}

// Proyectos de ejemplo
$sample_projects = array(
    array(
        'title' => "Eagle's Nest",
        'location' => 'Aspen, CO',
        'size' => '3,500',
        'year' => '2023',
        'image' => 'project-1.jpg',
        'description' => 'A stunning mountain retreat featuring panoramic views and custom timber construction. This luxury home combines modern amenities with rustic charm.'
    ),
    array(
        'title' => 'Home Alone',
        'location' => 'Vail, CO',
        'size' => '4,200',
        'year' => '2023',
        'image' => 'project-2.jpg',
        'description' => 'Contemporary timber home with state-of-the-art design and sustainable building practices. Perfect blend of luxury and environmental consciousness.'
    ),
    array(
        'title' => 'Valley View',
        'location' => 'Breckenridge, CO',
        'size' => '2,800',
        'year' => '2024',
        'image' => 'project-3.jpg',
        'description' => 'Elegant timber residence overlooking pristine valley landscapes. Features include custom woodwork and energy-efficient systems.'
    ),
    array(
        'title' => 'Stock Farm',
        'location' => 'Telluride, CO',
        'size' => '5,100',
        'year' => '2022',
        'image' => 'project-4.jpg',
        'description' => 'Expansive ranch-style timber home with authentic western character. Includes guest quarters and workshop facilities.'
    ),
    array(
        'title' => 'Above It All',
        'location' => 'Steamboat Springs, CO',
        'size' => '3,900',
        'year' => '2023',
        'image' => 'project-5.jpg',
        'description' => 'High-altitude timber masterpiece with breathtaking mountain vistas. Features premium finishes and smart home technology.'
    ),
    array(
        'title' => '100 Mile Views',
        'location' => 'Crested Butte, CO',
        'size' => '4,500',
        'year' => '2024',
        'image' => 'project-6.jpg',
        'description' => 'Spectacular timber estate with unobstructed panoramic views. Showcases the finest in timber frame construction and design.'
    ),
);

$created_count = 0;
$theme_dir = get_template_directory_uri();

foreach ($sample_projects as $project) {
    // Crear el post
    $post_id = wp_insert_post(array(
        'post_title'   => $project['title'],
        'post_content' => $project['description'],
        'post_status'  => 'publish',
        'post_type'    => 'project',
        'post_author'  => get_current_user_id(),
    ));
    
    if ($post_id) {
        // Agregar meta datos
        update_post_meta($post_id, '_project_location', $project['location']);
        update_post_meta($post_id, '_project_size', $project['size']);
        update_post_meta($post_id, '_project_year', $project['year']);
        update_post_meta($post_id, '_project_featured', '1'); // Marcar como destacado
        
        // Intentar agregar la imagen como featured image
        $image_path = get_template_directory() . '/images/' . $project['image'];
        if (file_exists($image_path)) {
            $upload_dir = wp_upload_dir();
            $filename = basename($image_path);
            $new_file = $upload_dir['path'] . '/' . $filename;
            
            // Copiar imagen a uploads
            copy($image_path, $new_file);
            
            // Crear attachment
            $attachment = array(
                'post_mime_type' => 'image/jpeg',
                'post_title'     => $project['title'],
                'post_content'   => '',
                'post_status'    => 'inherit'
            );
            
            $attach_id = wp_insert_attachment($attachment, $new_file, $post_id);
            
            // Generar metadata
            require_once(ABSPATH . 'wp-admin/includes/image.php');
            $attach_data = wp_generate_attachment_metadata($attach_id, $new_file);
            wp_update_attachment_metadata($attach_id, $attach_data);
            
            // Establecer como featured image
            set_post_thumbnail($post_id, $attach_id);
        }
        
        $created_count++;
    }
}

echo "<h1>✅ Proyectos de Ejemplo Creados</h1>";
echo "<p>Se crearon <strong>{$created_count}</strong> proyectos de ejemplo exitosamente.</p>";
echo "<p><a href='" . admin_url('edit.php?post_type=project') . "'>Ver Proyectos en el Admin</a></p>";
echo "<p><a href='" . home_url() . "'>Ver Homepage</a></p>";
echo "<hr>";
echo "<p style='color: red;'><strong>IMPORTANTE:</strong> Por seguridad, elimina este archivo (create-sample-projects.php) después de usarlo.</p>";
?>
