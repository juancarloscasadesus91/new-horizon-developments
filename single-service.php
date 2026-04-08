<?php
/**
 * The template for displaying single services
 *
 * @package New_Horizon_Developments
 * @since 1.0.0
 */

get_header();
?>

<?php while (have_posts()) : the_post(); 
    $icon = get_post_meta(get_the_ID(), '_service_icon', true);
    $short_desc = get_post_meta(get_the_ID(), '_service_short_description', true);
?>

<!-- Service Hero Section -->
<section class="page-hero" style="background: linear-gradient(135deg, rgba(10,10,10,0.9) 0%, rgba(26,26,26,0.95) 100%), url('<?php echo get_template_directory_uri(); ?>/images/hero-timber-home.jpg') center/cover;">
    <div class="container">
        <div class="page-hero-content">
            <?php if ($icon) : ?>
                <div class="service-hero-icon">
                    <i class="<?php echo esc_attr($icon); ?>"></i>
                </div>
            <?php endif; ?>
            <h1 class="page-title"><?php the_title(); ?></h1>
        </div>
    </div>
</section>

<!-- Service Main Content -->
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

                <!-- About The Service -->
                <div class="service-about reveal">
                    <h2 class="service-section-title"><?php esc_html_e('About The Service', 'new-horizon'); ?></h2>
                    <?php if ($short_desc) : ?>
                        <p class="service-intro"><?php echo esc_html($short_desc); ?></p>
                    <?php endif; ?>
                    <div class="service-content">
                        <?php the_content(); ?>
                    </div>
                </div>

                <!-- Why Choose Us -->
                <?php
                $benefits = get_post_meta(get_the_ID(), '_service_benefits', true);
                if ($benefits && is_array($benefits) && count($benefits) > 0) :
                    // Check if at least one benefit has content
                    $has_content = false;
                    foreach ($benefits as $benefit) {
                        if (!empty($benefit['title']) || !empty($benefit['description'])) {
                            $has_content = true;
                            break;
                        }
                    }
                    
                    if ($has_content) :
                ?>
                <div class="service-why-choose reveal">
                    <h2 class="service-section-title"><?php esc_html_e('Why Choose Us?', 'new-horizon'); ?></h2>
                    <p><?php esc_html_e('We bring decades of experience and unwavering commitment to quality in every project we undertake.', 'new-horizon'); ?></p>
                    
                    <div class="service-benefits-grid">
                        <?php foreach ($benefits as $benefit) : 
                            if (empty($benefit['title']) && empty($benefit['description'])) continue;
                        ?>
                        <div class="service-benefit-item">
                            <?php if (!empty($benefit['icon'])) : ?>
                            <div class="benefit-icon">
                                <i class="<?php echo esc_attr($benefit['icon']); ?>"></i>
                            </div>
                            <?php endif; ?>
                            
                            <?php if (!empty($benefit['title'])) : ?>
                            <h3><?php echo esc_html($benefit['title']); ?></h3>
                            <?php endif; ?>
                            
                            <?php if (!empty($benefit['description'])) : ?>
                            <p><?php echo esc_html($benefit['description']); ?></p>
                            <?php endif; ?>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <?php 
                    endif;
                endif; 
                ?>


            </div>

            <!-- Sidebar Column -->
            <div class="service-sidebar">
                
                <!-- Other Services -->
                <div class="service-sidebar-widget reveal">
                    <h3 class="sidebar-widget-title"><?php esc_html_e('Other Services', 'new-horizon'); ?></h3>
                    <div class="sidebar-services-list">
                        <?php
                        $all_services = new WP_Query(array(
                            'post_type'      => 'service',
                            'posts_per_page' => -1,
                            'orderby'        => 'meta_value_num',
                            'meta_key'       => '_service_order',
                            'order'          => 'ASC',
                        ));

                        if ($all_services->have_posts()) :
                            while ($all_services->have_posts()) : $all_services->the_post();
                                $is_current = (get_the_ID() == get_queried_object_id());
                                ?>
                                <a href="<?php the_permalink(); ?>" class="sidebar-service-item <?php echo $is_current ? 'active' : ''; ?>">
                                    <?php the_title(); ?>
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
                        <h3><?php esc_html_e('Need Assistance?', 'new-horizon'); ?></h3>
                        <p><?php esc_html_e('Our team is ready to help you with your project.', 'new-horizon'); ?></p>
                        <?php
                        $phone = get_theme_mod('new_horizon_phone', '+1 (555) 123-4567');
                        $whatsapp = get_theme_mod('new_horizon_whatsapp', '15551234567');
                        ?>
                        <a href="https://wa.me/<?php echo esc_attr($whatsapp); ?>" class="btn btn-whatsapp btn-block" target="_blank" rel="noopener noreferrer">
                            <i class="fab fa-whatsapp"></i> <?php esc_html_e('WhatsApp Us', 'new-horizon'); ?>
                        </a>
                        <a href="<?php echo esc_url(home_url('/#contact')); ?>" class="btn btn-outline btn-block">
                            <i class="fas fa-envelope"></i> <?php esc_html_e('Get a Quote', 'new-horizon'); ?>
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
