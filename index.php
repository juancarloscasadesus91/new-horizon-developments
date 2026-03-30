<?php
/**
 * The main template file
 *
 * @package Timber_Homes
 * @since 1.0.0
 */

get_header();
?>

<main id="primary" class="site-main">
    <div class="container">
        <?php
        if (have_posts()) :
            ?>
            <div class="blog-grid grid grid-2">
                <?php
                while (have_posts()) :
                    the_post();
                    get_template_part('template-parts/content', get_post_type());
                endwhile;
                ?>
            </div>

            <?php
            the_posts_navigation(array(
                'prev_text' => __('&larr; Older posts', 'timber-homes'),
                'next_text' => __('Newer posts &rarr;', 'timber-homes'),
            ));

        else :
            get_template_part('template-parts/content', 'none');
        endif;
        ?>
    </div>
</main>

<?php
get_footer();
