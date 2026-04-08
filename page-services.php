<?php
/**
 * Template Name: Services Page
 * Description: Template for displaying all services with banner
 */

get_header();

// Get page data
while (have_posts()) : the_post();
    $page_title = get_the_title();
    $page_content = get_the_content();
endwhile;
wp_reset_postdata();
?>

<!-- Services Page Banner -->
<section class="page-hero" style="background: linear-gradient(135deg, rgba(10,10,10,0.9) 0%, rgba(26,26,26,0.95) 100%), url('<?php echo get_template_directory_uri(); ?>/images/hero-timber-home.jpg') center/cover;">
    <div class="container">
        <div class="page-hero-content">
            <h1 class="page-title"><?php echo esc_html($page_title); ?></h1>
            <?php if ($page_content) : ?>
                <p class="page-description"><?php echo wp_strip_all_tags($page_content); ?></p>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- Services Section -->
<section id="services" class="services-section section">
    <div class="container">
        <div class="grid grid-3">
            <?php
            // Query all published services ordered by custom order field
            $services_query = new WP_Query(array(
                'post_type' => 'service',
                'posts_per_page' => -1,
                'post_status' => 'publish',
                'meta_key' => '_service_order',
                'orderby' => 'meta_value_num',
                'order' => 'ASC'
            ));

            if ($services_query->have_posts()) :
                while ($services_query->have_posts()) : $services_query->the_post();
                    $icon = get_post_meta(get_the_ID(), '_service_icon', true);
                    $short_desc = get_post_meta(get_the_ID(), '_service_short_description', true);
                    ?>
                    <a href="<?php the_permalink(); ?>" class="service-card reveal">
                        <?php if ($icon) : ?>
                            <div class="service-icon">
                                <i class="<?php echo esc_attr($icon); ?>"></i>
                            </div>
                        <?php endif; ?>
                        <h3><?php the_title(); ?></h3>
                        <?php if ($short_desc) : ?>
                            <p><?php echo esc_html($short_desc); ?></p>
                        <?php else : ?>
                            <p><?php echo esc_html(get_the_excerpt()); ?></p>
                        <?php endif; ?>
                    </a>
                    <?php
                endwhile;
                wp_reset_postdata();
            else :
                ?>
                <div class="no-services">
                    <p><?php esc_html_e('No services found. Please add services from the WordPress admin.', 'new-horizon'); ?></p>
                </div>
                <?php
            endif;
            ?>
        </div>
    </div>
</section>

<?php
get_footer();
?>
