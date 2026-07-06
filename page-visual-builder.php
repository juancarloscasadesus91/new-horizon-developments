<?php
/**
 * Template Name: Visual Builder Page
 * Description: Full-width page template for Gutenberg-built editable sections.
 *
 * @package New_Horizon_Developments
 */

get_header();
?>

<main id="primary" class="site-main visual-builder-page">
    <?php
    while (have_posts()) :
        the_post();
        ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class('visual-builder-content'); ?>>
            <?php the_content(); ?>
        </article>
        <?php
    endwhile;
    ?>
</main>

<?php
get_footer();
