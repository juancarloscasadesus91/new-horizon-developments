<?php
/**
 * New Horizon Developments Theme Functions
 * 
 * @package New_Horizon_Developments
 * @since 1.0.0
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Theme Setup
 */
function new_horizon_setup() {
    // Add default posts and comments RSS feed links to head
    add_theme_support('automatic-feed-links');

    // Let WordPress manage the document title
    add_theme_support('title-tag');

    // Enable support for Post Thumbnails
    add_theme_support('post-thumbnails');
    set_post_thumbnail_size(1200, 800, true);

    // Add custom image sizes
    add_image_size('timber-homes-portfolio', 800, 600, true);
    add_image_size('timber-homes-thumbnail', 400, 300, true);
    add_image_size('timber-homes-hero', 1920, 1080, true);

    // Register navigation menus
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'timber-homes'),
        'footer' => __('Footer Menu', 'timber-homes'),
    ));

    // Switch default core markup to output valid HTML5
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
    ));

    // Add theme support for selective refresh for widgets
    add_theme_support('customize-selective-refresh-widgets');

    // Add support for custom logo
    add_theme_support('custom-logo', array(
        'height'      => 100,
        'width'       => 400,
        'flex-height' => true,
        'flex-width'  => true,
    ));

    // Add support for custom header
    add_theme_support('custom-header', array(
        'default-image' => '',
        'width'         => 1920,
        'height'        => 1080,
        'flex-height'   => true,
        'flex-width'    => true,
    ));

    // Add support for custom background
    add_theme_support('custom-background', array(
        'default-color' => 'ffffff',
    ));

    // Add support for Block Editor styles
    add_theme_support('wp-block-styles');
    add_theme_support('align-wide');
    add_theme_support('editor-styles');
    add_editor_style('css/editor-style.css');
}
add_action('after_setup_theme', 'new_horizon_setup');

/**
 * Set the content width in pixels
 */
function new_horizon_content_width() {
    $GLOBALS['content_width'] = apply_filters('timber_homes_content_width', 1200);
}
add_action('after_setup_theme', 'new_horizon_content_width', 0);

/**
 * Register Widget Areas
 */
function new_horizon_widgets_init() {
    register_sidebar(array(
        'name'          => __('Sidebar', 'new-horizon'),
        'id'            => 'sidebar-1',
        'description'   => __('Add widgets here to appear in your sidebar.', 'new-horizon'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));

    register_sidebar(array(
        'name'          => __('Footer 1', 'new-horizon'),
        'id'            => 'footer-1',
        'description'   => __('Add widgets here to appear in your footer.', 'new-horizon'),
        'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));

    register_sidebar(array(
        'name'          => __('Footer 2', 'new-horizon'),
        'id'            => 'footer-2',
        'description'   => __('Add widgets here to appear in your footer.', 'new-horizon'),
        'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));

    register_sidebar(array(
        'name'          => __('Footer 3', 'new-horizon'),
        'id'            => 'footer-3',
        'description'   => __('Add widgets here to appear in your footer.', 'new-horizon'),
        'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));

    register_sidebar(array(
        'name'          => __('Footer 4', 'new-horizon'),
        'id'            => 'footer-4',
        'description'   => __('Add widgets here to appear in your footer.', 'new-horizon'),
        'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));
}
add_action('widgets_init', 'new_horizon_widgets_init');

/**
 * Enqueue Scripts and Styles
 */
function new_horizon_scripts() {
    // Google Fonts - Elegant Typography
    wp_enqueue_style('new-horizon-fonts', 'https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@300;400;500;600;700&family=Montserrat:wght@300;400;500;600;700&display=swap', array(), null);

    // Font Awesome
    wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css', array(), '6.4.0');

    // Main stylesheet
    wp_enqueue_style('timber-homes-style', get_stylesheet_uri(), array(), '1.0.0');

    // Main JavaScript
    wp_enqueue_script('new-horizon-main', get_template_directory_uri() . '/js/main.js', array('jquery'), '1.0.0', true);
    
    // Instagram Feed
    wp_enqueue_script('new-horizon-instagram', get_template_directory_uri() . '/js/instagram-feed.js', array('jquery'), '1.0.0', true);

    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'new_horizon_scripts');

/**
 * Custom Post Type: Projects
 */
function new_horizon_register_projects_post_type() {
    $labels = array(
        'name'               => _x('Projects', 'post type general name', 'new-horizon'),
        'singular_name'      => _x('Project', 'post type singular name', 'new-horizon'),
        'menu_name'          => _x('Projects', 'admin menu', 'new-horizon'),
        'add_new'            => _x('Add New', 'project', 'new-horizon'),
        'add_new_item'       => __('Add New Project', 'new-horizon'),
        'new_item'           => __('New Project', 'new-horizon'),
        'edit_item'          => __('Edit Project', 'new-horizon'),
        'view_item'          => __('View Project', 'new-horizon'),
        'all_items'          => __('All Projects', 'new-horizon'),
        'search_items'       => __('Search Projects', 'new-horizon'),
        'not_found'          => __('No projects found.', 'new-horizon'),
        'not_found_in_trash' => __('No projects found in Trash.', 'new-horizon'),
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'projects'),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 5,
        'menu_icon'          => 'dashicons-admin-multisite',
        'supports'           => array('title', 'editor', 'thumbnail', 'excerpt'),
        'show_in_rest'       => true,
    );

    register_post_type('project', $args);
}
add_action('init', 'new_horizon_register_projects_post_type');

/**
 * Custom Taxonomy: Project Categories
 */
function new_horizon_register_project_taxonomy() {
    $labels = array(
        'name'              => _x('Project Categories', 'taxonomy general name', 'new-horizon'),
        'singular_name'     => _x('Project Category', 'taxonomy singular name', 'new-horizon'),
        'search_items'      => __('Search Project Categories', 'new-horizon'),
        'all_items'         => __('All Project Categories', 'new-horizon'),
        'parent_item'       => __('Parent Project Category', 'new-horizon'),
        'parent_item_colon' => __('Parent Project Category:', 'new-horizon'),
        'edit_item'         => __('Edit Project Category', 'new-horizon'),
        'update_item'       => __('Update Project Category', 'new-horizon'),
        'add_new_item'      => __('Add New Project Category', 'new-horizon'),
        'new_item_name'     => __('New Project Category Name', 'new-horizon'),
        'menu_name'         => __('Categories', 'new-horizon'),
    );

    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array('slug' => 'project-category'),
        'show_in_rest'      => true,
    );

    register_taxonomy('project_category', array('project'), $args);
}
add_action('init', 'new_horizon_register_project_taxonomy');

/**
 * AJAX Handler for Contact Form
 */
function new_horizon_submit_contact_form() {
    // Verify nonce
    check_ajax_referer('timber_homes_nonce', 'nonce');

    // Sanitize input
    $name = sanitize_text_field($_POST['name']);
    $email = sanitize_email($_POST['email']);
    $phone = sanitize_text_field($_POST['phone']);
    $service = sanitize_text_field($_POST['service']);
    $message = sanitize_textarea_field($_POST['message']);

    // Validate
    if (empty($name) || empty($email) || empty($message)) {
        wp_send_json_error(array('message' => 'Please fill in all required fields.'));
    }

    if (!is_email($email)) {
        wp_send_json_error(array('message' => 'Please enter a valid email address.'));
    }

    // Prepare email
    $to = get_option('admin_email');
    $subject = 'New Contact Form Submission from ' . $name;
    $body = "Name: $name\n";
    $body .= "Email: $email\n";
    $body .= "Phone: $phone\n";
    $body .= "Service: $service\n\n";
    $body .= "Message:\n$message\n";

    $headers = array('Content-Type: text/plain; charset=UTF-8', "Reply-To: $email");

    // Send email
    $sent = wp_mail($to, $subject, $body, $headers);

    if ($sent) {
        wp_send_json_success(array('message' => 'Thank you for your message!'));
    } else {
        wp_send_json_error(array('message' => 'There was an error sending your message.'));
    }
}
add_action('wp_ajax_submit_contact_form', 'new_horizon_submit_contact_form');
add_action('wp_ajax_nopriv_submit_contact_form', 'new_horizon_submit_contact_form');

/**
 * Custom Excerpt Length
 */
function new_horizon_excerpt_length($length) {
    return 30;
}
add_filter('excerpt_length', 'new_horizon_excerpt_length');

/**
 * Custom Excerpt More
 */
function new_horizon_excerpt_more($more) {
    return '...';
}
add_filter('excerpt_more', 'new_horizon_excerpt_more');

/**
 * Add custom fields support (if ACF is not installed)
 */
function new_horizon_add_meta_boxes() {
    add_meta_box(
        'project_details',
        __('Project Details', 'new-horizon'),
        'new_horizon_project_details_callback',
        'project',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'new_horizon_add_meta_boxes');

function new_horizon_project_details_callback($post) {
    wp_nonce_field('new_horizon_save_project_details', 'new_horizon_project_details_nonce');
    
    $location = get_post_meta($post->ID, '_project_location', true);
    $size = get_post_meta($post->ID, '_project_size', true);
    $year = get_post_meta($post->ID, '_project_year', true);
    $featured = get_post_meta($post->ID, '_project_featured', true);
    ?>
    <p>
        <label for="project_location"><?php _e('Location:', 'new-horizon'); ?></label><br>
        <input type="text" id="project_location" name="project_location" value="<?php echo esc_attr($location); ?>" style="width: 100%;">
    </p>
    <p>
        <label for="project_size"><?php _e('Size (sq ft):', 'new-horizon'); ?></label><br>
        <input type="text" id="project_size" name="project_size" value="<?php echo esc_attr($size); ?>" style="width: 100%;">
    </p>
    <p>
        <label for="project_year"><?php _e('Year Completed:', 'new-horizon'); ?></label><br>
        <input type="text" id="project_year" name="project_year" value="<?php echo esc_attr($year); ?>" style="width: 100%;">
    </p>
    <p>
        <label>
            <input type="checkbox" id="project_featured" name="project_featured" value="1" <?php checked($featured, '1'); ?>>
            <?php _e('Show in Featured Projects (Homepage)', 'new-horizon'); ?>
        </label>
    </p>
    <p>
        <strong><?php _e('Project Gallery:', 'new-horizon'); ?></strong><br>
        <em><?php _e('Set the Featured Image as the main project image. For additional gallery images, use a gallery plugin or add them in the content editor.', 'new-horizon'); ?></em>
    </p>
    <?php
}

function new_horizon_save_project_details($post_id) {
    if (!isset($_POST['new_horizon_project_details_nonce'])) {
        return;
    }
    
    if (!wp_verify_nonce($_POST['new_horizon_project_details_nonce'], 'new_horizon_save_project_details')) {
        return;
    }
    
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }
    
    if (isset($_POST['project_location'])) {
        update_post_meta($post_id, '_project_location', sanitize_text_field($_POST['project_location']));
    }
    
    if (isset($_POST['project_size'])) {
        update_post_meta($post_id, '_project_size', sanitize_text_field($_POST['project_size']));
    }
    
    if (isset($_POST['project_year'])) {
        update_post_meta($post_id, '_project_year', sanitize_text_field($_POST['project_year']));
    }
    
    if (isset($_POST['project_featured'])) {
        update_post_meta($post_id, '_project_featured', '1');
    } else {
        delete_post_meta($post_id, '_project_featured');
    }
}
add_action('save_post_project', 'new_horizon_save_project_details');

/**
 * Customizer Settings
 */
function new_horizon_customize_register($wp_customize) {
    // Contact Information Section
    $wp_customize->add_section('new_horizon_contact', array(
        'title'    => __('Contact Information', 'new-horizon'),
        'priority' => 30,
    ));

    // Phone Number
    $wp_customize->add_setting('new_horizon_phone', array(
        'default'           => '+1 (555) 123-4567',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('new_horizon_phone', array(
        'label'   => __('Phone Number', 'new-horizon'),
        'section' => 'new_horizon_contact',
        'type'    => 'text',
    ));

    // Email
    $wp_customize->add_setting('new_horizon_email', array(
        'default'           => 'info@timberhomes.com',
        'sanitize_callback' => 'sanitize_email',
    ));

    $wp_customize->add_control('new_horizon_email', array(
        'label'   => __('Email Address', 'new-horizon'),
        'section' => 'new_horizon_contact',
        'type'    => 'email',
    ));

    // Address
    $wp_customize->add_setting('new_horizon_address', array(
        'default'           => '123 Main Street, Denver, CO 80202',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));

    $wp_customize->add_control('new_horizon_address', array(
        'label'   => __('Address', 'new-horizon'),
        'section' => 'new_horizon_contact',
        'type'    => 'textarea',
    ));

    // WhatsApp Number
    $wp_customize->add_setting('new_horizon_whatsapp', array(
        'default'           => '15551234567',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('new_horizon_whatsapp', array(
        'label'       => __('WhatsApp Number', 'new-horizon'),
        'description' => __('Enter number without + or spaces (e.g., 15551234567)', 'new-horizon'),
        'section'     => 'new_horizon_contact',
        'type'        => 'text',
    ));

    // Social Media Section
    $wp_customize->add_section('new_horizon_social', array(
        'title'    => __('Social Media', 'new-horizon'),
        'priority' => 31,
    ));

    $social_networks = array(
        'facebook'  => 'Facebook',
        'instagram' => 'Instagram',
        'pinterest' => 'Pinterest',
        'linkedin'  => 'LinkedIn',
    );

    foreach ($social_networks as $network => $label) {
        $wp_customize->add_setting("new_horizon_$network", array(
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw',
        ));

        $wp_customize->add_control("new_horizon_$network", array(
            'label'   => $label . ' ' . __('URL', 'new-horizon'),
            'section' => 'new_horizon_social',
            'type'    => 'url',
        ));
    }
}
add_action('customize_register', 'new_horizon_customize_register');

/**
 * Custom Post Type: Team Members
 */
function new_horizon_register_team_post_type() {
    $labels = array(
        'name'               => _x('Team Members', 'post type general name', 'new-horizon'),
        'singular_name'      => _x('Team Member', 'post type singular name', 'new-horizon'),
        'menu_name'          => _x('Team', 'admin menu', 'new-horizon'),
        'add_new'            => _x('Add New', 'team member', 'new-horizon'),
        'add_new_item'       => __('Add New Team Member', 'new-horizon'),
        'new_item'           => __('New Team Member', 'new-horizon'),
        'edit_item'          => __('Edit Team Member', 'new-horizon'),
        'view_item'          => __('View Team Member', 'new-horizon'),
        'all_items'          => __('All Team Members', 'new-horizon'),
        'search_items'       => __('Search Team Members', 'new-horizon'),
        'not_found'          => __('No team members found.', 'new-horizon'),
        'not_found_in_trash' => __('No team members found in Trash.', 'new-horizon'),
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'team'),
        'capability_type'    => 'post',
        'has_archive'        => false,
        'hierarchical'       => false,
        'menu_position'      => 6,
        'menu_icon'          => 'dashicons-groups',
        'supports'           => array('title', 'editor', 'thumbnail'),
        'show_in_rest'       => true,
    );

    register_post_type('team_member', $args);
}
add_action('init', 'new_horizon_register_team_post_type');

/**
 * Add Team Member Meta Boxes
 */
function new_horizon_add_team_meta_boxes() {
    add_meta_box(
        'team_member_details',
        __('Team Member Details', 'new-horizon'),
        'new_horizon_team_member_details_callback',
        'team_member',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'new_horizon_add_team_meta_boxes');

function new_horizon_team_member_details_callback($post) {
    wp_nonce_field('new_horizon_save_team_member_details', 'new_horizon_team_member_details_nonce');
    
    $position = get_post_meta($post->ID, '_team_position', true);
    $email = get_post_meta($post->ID, '_team_email', true);
    $phone = get_post_meta($post->ID, '_team_phone', true);
    $order = get_post_meta($post->ID, '_team_order', true);
    ?>
    <p>
        <label for="team_position"><strong><?php _e('Position/Title:', 'new-horizon'); ?></strong></label><br>
        <input type="text" id="team_position" name="team_position" value="<?php echo esc_attr($position); ?>" style="width: 100%;" placeholder="e.g., Founder & CEO">
    </p>
    <p>
        <label for="team_email"><strong><?php _e('Email:', 'new-horizon'); ?></strong></label><br>
        <input type="email" id="team_email" name="team_email" value="<?php echo esc_attr($email); ?>" style="width: 100%;" placeholder="email@example.com">
    </p>
    <p>
        <label for="team_phone"><strong><?php _e('Phone:', 'new-horizon'); ?></strong></label><br>
        <input type="text" id="team_phone" name="team_phone" value="<?php echo esc_attr($phone); ?>" style="width: 100%;" placeholder="+1 (555) 123-4567">
    </p>
    <p>
        <label for="team_order"><strong><?php _e('Display Order:', 'new-horizon'); ?></strong></label><br>
        <input type="number" id="team_order" name="team_order" value="<?php echo esc_attr($order ? $order : 0); ?>" style="width: 100px;" min="0">
        <br><em><?php _e('Lower numbers appear first. Use 0, 1, 2, 3, etc.', 'new-horizon'); ?></em>
    </p>
    <p>
        <strong><?php _e('Biography:', 'new-horizon'); ?></strong><br>
        <em><?php _e('Use the main content editor above to add the team member\'s biography. This will appear in the overlay on hover.', 'new-horizon'); ?></em>
    </p>
    <p>
        <strong><?php _e('Photo:', 'new-horizon'); ?></strong><br>
        <em><?php _e('Set the Featured Image as the team member\'s photo. Recommended size: 600x800px (3:4 ratio).', 'new-horizon'); ?></em>
    </p>
    <?php
}

function new_horizon_save_team_member_details($post_id) {
    if (!isset($_POST['new_horizon_team_member_details_nonce'])) {
        return;
    }
    
    if (!wp_verify_nonce($_POST['new_horizon_team_member_details_nonce'], 'new_horizon_save_team_member_details')) {
        return;
    }
    
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }
    
    if (isset($_POST['team_position'])) {
        update_post_meta($post_id, '_team_position', sanitize_text_field($_POST['team_position']));
    }
    
    if (isset($_POST['team_email'])) {
        update_post_meta($post_id, '_team_email', sanitize_email($_POST['team_email']));
    }
    
    if (isset($_POST['team_phone'])) {
        update_post_meta($post_id, '_team_phone', sanitize_text_field($_POST['team_phone']));
    }
    
    if (isset($_POST['team_order'])) {
        update_post_meta($post_id, '_team_order', intval($_POST['team_order']));
    }
}
add_action('save_post_team_member', 'new_horizon_save_team_member_details');
