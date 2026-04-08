<?php
/**
 * Archive template for Projects
 *
 * @package New_Horizon_Developments
 * @since 1.0.0
 */

get_header();
?>

<!-- Projects Hero Section -->
<section class="page-hero" style="background: linear-gradient(135deg, rgba(10,10,10,0.9) 0%, rgba(26,26,26,0.95) 100%), url('<?php echo get_template_directory_uri(); ?>/images/hero-timber-home.jpg') center/cover;">
    <div class="container">
        <div class="page-hero-content">
            <h1 class="page-title"><?php esc_html_e('Our Projects', 'new-horizon'); ?></h1>
            <p class="page-description"><?php esc_html_e('Explore our portfolio of exceptional custom homes', 'new-horizon'); ?></p>
        </div>
    </div>
</section>

<!-- Projects Grid Section -->
<section class="portfolio-section section" id="projects">
    <div class="container">
        <div class="portfolio-grid">
            <?php
            if (have_posts()) :
                while (have_posts()) : the_post();
                    $location = get_post_meta(get_the_ID(), '_project_location', true);
                    ?>
                    <a href="<?php the_permalink(); ?>" class="portfolio-item reveal">
                        <div class="portfolio-image">
                            <?php
                            if (has_post_thumbnail()) {
                                the_post_thumbnail('timber-homes-portfolio');
                            } else {
                                ?>
                                <img src="<?php echo get_template_directory_uri(); ?>/images/placeholder-project.jpg" alt="<?php the_title_attribute(); ?>">
                                <?php
                            }
                            ?>
                        </div>
                        <div class="portfolio-overlay">
                            <h3 class="portfolio-title"><?php the_title(); ?></h3>
                        </div>
                    </a>
                    <?php
                endwhile;
                wp_reset_postdata();
            else :
                ?>
                <p style="grid-column: 1/-1; text-align: center; color: rgba(255,255,255,0.7);">
                    <?php esc_html_e('No projects found. Add projects from the WordPress admin panel.', 'new-horizon'); ?>
                </p>
                <?php
            endif;
            ?>
        </div>
    </div>
</section>

<?php
get_footer();
