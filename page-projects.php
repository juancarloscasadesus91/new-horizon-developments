<?php
/**
 * Template Name: Projects Page
 *
 * @package Timber_Homes
 * @since 1.0.0
 */

get_header();
?>

<!-- Projects Hero Section -->
<section class="page-hero" style="background: linear-gradient(135deg, rgba(10,10,10,0.9) 0%, rgba(26,26,26,0.95) 100%), url('<?php echo get_template_directory_uri(); ?>/images/hero-timber-home.jpg') center/cover;">
    <div class="container">
        <div class="page-hero-content">
            <h1 class="page-title"><?php esc_html_e('Our Projects', 'timber-homes'); ?></h1>
            <p class="page-description"><?php esc_html_e('Explore our portfolio of exceptional timber homes', 'timber-homes'); ?></p>
        </div>
    </div>
</section>

<!-- Projects Grid Section -->
<section class="projects-page-section section" id="projects">
    <div class="container">
        <div class="projects-page-grid">
            <?php
            $projects = new WP_Query(array(
                'post_type'      => 'project',
                'posts_per_page' => -1,
                'orderby'        => 'date',
                'order'          => 'DESC',
            ));

            if ($projects->have_posts()) :
                while ($projects->have_posts()) : $projects->the_post();
                    $location = get_post_meta(get_the_ID(), '_project_location', true);
                    ?>
                    <a href="<?php the_permalink(); ?>" class="project-card reveal">
                        <div class="project-card-image">
                            <?php
                            if (has_post_thumbnail()) {
                                the_post_thumbnail('timber-homes-portfolio');
                            } else {
                                ?>
                                <img src="<?php echo get_template_directory_uri(); ?>/images/placeholder-project.jpg" alt="<?php the_title_attribute(); ?>">
                                <?php
                            }
                            ?>
                            <div class="project-card-overlay">
                                <div class="project-card-content">
                                    <h3 class="project-card-title"><?php the_title(); ?></h3>
                                    <?php if ($location) : ?>
                                        <p class="project-card-location">
                                            <i class="fas fa-map-marker-alt"></i> <?php echo esc_html($location); ?>
                                        </p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </a>
                    <?php
                endwhile;
                wp_reset_postdata();
            else :
                ?>
                <p style="grid-column: 1/-1; text-align: center; color: rgba(255,255,255,0.7);">
                    <?php esc_html_e('No projects found. Add projects from the WordPress admin panel.', 'timber-homes'); ?>
                </p>
                <?php
            endif;
            ?>
        </div>
    </div>
</section>

<?php
get_footer();
