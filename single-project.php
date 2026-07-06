<?php
/**
 * The template for displaying single projects
 *
 * @package New_Horizon_Developments
 * @since 1.0.0
 */

get_header();

// Enqueue lightbox
wp_enqueue_style('lightbox-css', 'https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css');
wp_enqueue_script('lightbox-js', 'https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js', array('jquery'), null, true);
?>

<?php while (have_posts()) : the_post(); 
    $project_id = get_the_ID();
    $location = get_post_meta(get_the_ID(), '_project_location', true);
    $size = get_post_meta(get_the_ID(), '_project_size', true);
    $year = get_post_meta(get_the_ID(), '_project_year', true);
    $status = get_post_meta(get_the_ID(), '_project_status', true);
?>

<!-- Project Hero Section -->
<section class="page-hero" style="background: linear-gradient(135deg, rgba(10,10,10,0.9) 0%, rgba(26,26,26,0.95) 100%), url('<?php echo has_post_thumbnail() ? get_the_post_thumbnail_url(get_the_ID(), 'full') : get_template_directory_uri() . '/images/hero-timber-home.jpg'; ?>') center/cover;">
    <div class="container">
        <div class="page-hero-content">
            <h1<?php echo new_horizon_inline_edit_attrs('post_field', 'post_title', 'text', $project_id); ?> class="page-title"><?php the_title(); ?></h1>
            <?php if ($location) : ?>
                <p class="page-description">
                    <i class="fas fa-map-marker-alt"></i> <span<?php echo new_horizon_inline_edit_attrs('post_meta', '_project_location', 'text', $project_id); ?>><?php echo esc_html($location); ?></span>
                </p>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- Project Main Content -->
<section class="service-main-section section">
    <div class="container">
        <div class="service-layout">
            <!-- Main Content Column -->
            <div class="service-main-content">
                
                <!-- Featured Image -->
                <?php if (has_post_thumbnail()) : ?>
                    <div class="service-featured-image reveal">
                        <?php the_post_thumbnail('large', array('class' => 'service-image')); ?>
                    </div>
                <?php endif; ?>

                <!-- About The Project -->
                <div class="service-about reveal">
                    <h2<?php echo new_horizon_inline_edit_attrs('theme_mod', 'new_horizon_single_project_about_title', 'text', $project_id); ?> class="service-section-title"><?php echo esc_html(get_theme_mod('new_horizon_single_project_about_title', 'About This Project')); ?></h2>
                    <div<?php echo new_horizon_inline_edit_attrs('post_field', 'post_content', 'html', $project_id); ?> class="service-content">
                        <?php echo wp_kses_post(get_the_content()); ?>
                    </div>
                </div>

                <!-- Project Features -->
                <?php
                $features = get_post_meta(get_the_ID(), '_project_features', true);
                if ($features && is_array($features) && count($features) > 0) :
                    $has_content = false;
                    foreach ($features as $feature) {
                        if (!empty($feature['title']) || !empty($feature['description'])) {
                            $has_content = true;
                            break;
                        }
                    }
                    
                    if ($has_content) :
                ?>
                <div class="service-why-choose reveal">
                    <h2<?php echo new_horizon_inline_edit_attrs('theme_mod', 'new_horizon_single_project_features_title', 'text', $project_id); ?> class="service-section-title"><?php echo esc_html(get_theme_mod('new_horizon_single_project_features_title', 'Key Features')); ?></h2>
                    
                    <div class="service-benefits-grid">
                        <?php foreach ($features as $index => $feature) : 
                            if (empty($feature['title']) && empty($feature['description'])) continue;
                        ?>
                        <div class="service-benefit-item">
                            <?php if (!empty($feature['icon'])) : ?>
                            <div class="benefit-icon">
                                <i class="<?php echo esc_attr($feature['icon']); ?>"></i>
                            </div>
                            <?php endif; ?>
                            
                            <?php if (!empty($feature['title'])) : ?>
                            <h3<?php echo new_horizon_inline_edit_array_attrs('_project_features', $index, 'title', 'text', $project_id); ?>><?php echo esc_html($feature['title']); ?></h3>
                            <?php endif; ?>
                            
                            <?php if (!empty($feature['description'])) : ?>
                            <p<?php echo new_horizon_inline_edit_array_attrs('_project_features', $index, 'description', 'textarea', $project_id); ?>><?php echo esc_html($feature['description']); ?></p>
                            <?php endif; ?>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <?php 
                    endif;
                endif; 
                ?>

                <!-- Project Gallery -->
                <?php
                $gallery_images = get_post_meta(get_the_ID(), '_project_gallery', true);
                if ($gallery_images && is_array($gallery_images) && count($gallery_images) > 0) :
                ?>
                <div class="project-gallery-section reveal">
                    <h2<?php echo new_horizon_inline_edit_attrs('theme_mod', 'new_horizon_single_project_gallery_title', 'text', $project_id); ?> class="service-section-title"><?php echo esc_html(get_theme_mod('new_horizon_single_project_gallery_title', 'Project Gallery')); ?></h2>
                    <div class="project-gallery-grid">
                        <?php foreach ($gallery_images as $image_id) : 
                            $image_url = wp_get_attachment_image_url($image_id, 'large');
                            $image_full = wp_get_attachment_image_url($image_id, 'full');
                            if ($image_url) :
                        ?>
                        <a href="<?php echo esc_url($image_full); ?>" class="project-gallery-item" data-lightbox="project-gallery">
                            <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr(get_the_title()); ?>">
                            <div class="gallery-item-overlay">
                                <i class="fas fa-search-plus"></i>
                            </div>
                        </a>
                        <?php 
                            endif;
                        endforeach; ?>
                    </div>
                </div>
                <?php endif; ?>

            </div>

            <!-- Sidebar Column -->
            <div class="service-sidebar">
                
                <!-- Project Details -->
                <div class="service-sidebar-widget reveal">
                    <h3<?php echo new_horizon_inline_edit_attrs('theme_mod', 'new_horizon_single_project_details_title', 'text', $project_id); ?> class="sidebar-widget-title"><?php echo esc_html(get_theme_mod('new_horizon_single_project_details_title', 'Project Details')); ?></h3>
                    <div class="project-details-list">
                        <?php if ($location) : ?>
                        <div class="project-detail-item">
                            <span class="detail-label"><i class="fas fa-map-marker-alt"></i> <span<?php echo new_horizon_inline_edit_attrs('theme_mod', 'new_horizon_single_project_location_label', 'text', $project_id); ?>><?php echo esc_html(get_theme_mod('new_horizon_single_project_location_label', 'Location')); ?></span></span>
                            <span<?php echo new_horizon_inline_edit_attrs('post_meta', '_project_location', 'text', $project_id); ?> class="detail-value"><?php echo esc_html($location); ?></span>
                        </div>
                        <?php endif; ?>
                        
                        <?php if ($size) : ?>
                        <div class="project-detail-item">
                            <span class="detail-label"><i class="fas fa-ruler-combined"></i> <span<?php echo new_horizon_inline_edit_attrs('theme_mod', 'new_horizon_single_project_size_label', 'text', $project_id); ?>><?php echo esc_html(get_theme_mod('new_horizon_single_project_size_label', 'Size')); ?></span></span>
                            <span class="detail-value"><span<?php echo new_horizon_inline_edit_attrs('post_meta', '_project_size', 'text', $project_id); ?>><?php echo esc_html($size); ?></span> sq ft</span>
                        </div>
                        <?php endif; ?>
                        
                        <?php if ($year) : ?>
                        <div class="project-detail-item">
                            <span class="detail-label"><i class="fas fa-calendar-alt"></i> <span<?php echo new_horizon_inline_edit_attrs('theme_mod', 'new_horizon_single_project_year_label', 'text', $project_id); ?>><?php echo esc_html(get_theme_mod('new_horizon_single_project_year_label', 'Year')); ?></span></span>
                            <span<?php echo new_horizon_inline_edit_attrs('post_meta', '_project_year', 'text', $project_id); ?> class="detail-value"><?php echo esc_html($year); ?></span>
                        </div>
                        <?php endif; ?>
                        
                        <?php if ($status) : ?>
                        <div class="project-detail-item">
                            <span class="detail-label"><i class="fas fa-info-circle"></i> <span<?php echo new_horizon_inline_edit_attrs('theme_mod', 'new_horizon_single_project_status_label', 'text', $project_id); ?>><?php echo esc_html(get_theme_mod('new_horizon_single_project_status_label', 'Status')); ?></span></span>
                            <span<?php echo new_horizon_inline_edit_attrs('post_meta', '_project_status', 'text', $project_id); ?> class="detail-value"><?php echo esc_html($status); ?></span>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
                
                <!-- Other Projects -->
                <div class="service-sidebar-widget reveal">
                    <h3<?php echo new_horizon_inline_edit_attrs('theme_mod', 'new_horizon_single_project_other_title', 'text', $project_id); ?> class="sidebar-widget-title"><?php echo esc_html(get_theme_mod('new_horizon_single_project_other_title', 'Other Projects')); ?></h3>
                    <div class="sidebar-services-list">
                        <?php
                        $other_projects = new WP_Query(array(
                            'post_type'      => 'project',
                            'posts_per_page' => 5,
                            'orderby'        => 'date',
                            'order'          => 'DESC',
                            'post__not_in'   => array(get_the_ID()),
                        ));

                        if ($other_projects->have_posts()) :
                            while ($other_projects->have_posts()) : $other_projects->the_post();
                                ?>
                                <a href="<?php the_permalink(); ?>" class="sidebar-service-item">
                                    <span<?php echo new_horizon_inline_edit_attrs('post_field', 'post_title', 'text', get_the_ID()); ?>><?php the_title(); ?></span>
                                    <i class="fas fa-chevron-right"></i>
                                </a>
                                <?php
                            endwhile;
                            wp_reset_postdata();
                        endif;
                        ?>
                    </div>
                </div>

                <!-- Contact Widget -->
                <div class="service-sidebar-widget service-contact-widget reveal">
                    <div class="contact-widget-content">
                        <div class="contact-widget-icon">
                            <i class="fas fa-headset"></i>
                        </div>
                        <h3<?php echo new_horizon_inline_edit_attrs('theme_mod', 'new_horizon_single_project_contact_title', 'text', $project_id); ?>><?php echo esc_html(get_theme_mod('new_horizon_single_project_contact_title', 'Interested in a Similar Project?')); ?></h3>
                        <p<?php echo new_horizon_inline_edit_attrs('theme_mod', 'new_horizon_single_project_contact_text', 'textarea', $project_id); ?>><?php echo esc_html(get_theme_mod('new_horizon_single_project_contact_text', 'Every home we build starts with a conversation. Tell us your vision and we\'ll show you what\'s possible.')); ?></p>
                        <?php
                        $phone = get_theme_mod('new_horizon_phone', '+1 (555) 123-4567');
                        $whatsapp = get_theme_mod('new_horizon_whatsapp', '15551234567');
                        ?>
                        <a href="https://wa.me/<?php echo esc_attr($whatsapp); ?>" class="btn btn-whatsapp btn-block" target="_blank" rel="noopener noreferrer">
                            <i class="fab fa-whatsapp"></i> <span<?php echo new_horizon_inline_edit_attrs('theme_mod', 'new_horizon_single_project_whatsapp_label', 'text', $project_id); ?>><?php echo esc_html(get_theme_mod('new_horizon_single_project_whatsapp_label', 'WhatsApp Us')); ?></span>
                        </a>
                        <a href="<?php echo esc_url(home_url('/#contact')); ?>" class="btn btn-outline btn-block" style="font-size: 0.75rem; letter-spacing: 0.5px; padding: 0.875rem 1rem;">
                            <i class="fas fa-envelope"></i> <span<?php echo new_horizon_inline_edit_attrs('theme_mod', 'new_horizon_single_project_quote_label', 'text', $project_id); ?>><?php echo esc_html(get_theme_mod('new_horizon_single_project_quote_label', 'BEGIN YOUR PROJECT ->')); ?></span>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

<?php endwhile; ?>

<?php
get_footer();
