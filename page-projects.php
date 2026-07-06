<?php
/**
 * Template Name: Projects Page
 *
 * @package Timber_Homes
 * @since 1.0.0
 */

get_header();

if (new_horizon_page_has_visual_blocks()) {
    new_horizon_render_visual_page_content();
    get_footer();
    return;
}
?>

<?php
$projects_page_id = get_queried_object_id();
?>

<!-- Projects Hero Section -->
<section class="page-hero" style="background: linear-gradient(135deg, rgba(10,10,10,0.9) 0%, rgba(26,26,26,0.95) 100%), url('<?php echo get_template_directory_uri(); ?>/images/hero-timber-home.jpg') center/cover;">
    <div class="container">
        <div class="page-hero-content">
            <h1<?php echo new_horizon_inline_edit_attrs('theme_mod', 'new_horizon_projects_page_title', 'text', $projects_page_id); ?> class="page-title"><?php echo esc_html(get_theme_mod('new_horizon_projects_page_title', 'Our Projects')); ?></h1>
            <p<?php echo new_horizon_inline_edit_attrs('theme_mod', 'new_horizon_projects_page_description', 'textarea', $projects_page_id); ?> class="page-description"><?php echo esc_html(get_theme_mod('new_horizon_projects_page_description', 'Explore our portfolio of exceptional timber homes')); ?></p>
        </div>
    </div>
</section>

<!-- Projects Grid Section -->
<section class="portfolio-section section" id="projects">
    <div class="container">
        <div class="portfolio-grid">
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
                            <h3<?php echo new_horizon_inline_edit_attrs('post_field', 'post_title', 'text', get_the_ID()); ?> class="portfolio-title"><?php the_title(); ?></h3>
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
