<?php
/**
 * Template part for displaying posts
 *
 * @package Timber_Homes
 * @since 1.0.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('blog-post'); ?>>
    <?php if (has_post_thumbnail()) : ?>
        <div class="post-thumbnail">
            <a href="<?php the_permalink(); ?>">
                <?php the_post_thumbnail('timber-homes-portfolio'); ?>
            </a>
        </div>
    <?php endif; ?>

    <div class="post-content">
        <header class="entry-header">
            <?php
            if (is_singular()) :
                the_title('<h1 class="entry-title">', '</h1>');
            else :
                the_title('<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');
            endif;
            ?>

            <div class="entry-meta">
                <span class="posted-on">
                    <i class="fas fa-calendar-alt"></i>
                    <time datetime="<?php echo esc_attr(get_the_date('c')); ?>">
                        <?php echo esc_html(get_the_date()); ?>
                    </time>
                </span>
                <span class="byline">
                    <i class="fas fa-user"></i>
                    <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>">
                        <?php echo esc_html(get_the_author()); ?>
                    </a>
                </span>
                <?php if (has_category()) : ?>
                    <span class="cat-links">
                        <i class="fas fa-folder"></i>
                        <?php the_category(', '); ?>
                    </span>
                <?php endif; ?>
            </div>
        </header>

        <div class="entry-content">
            <?php
            if (is_singular()) :
                the_content();

                wp_link_pages(array(
                    'before' => '<div class="page-links">' . esc_html__('Pages:', 'timber-homes'),
                    'after'  => '</div>',
                ));
            else :
                the_excerpt();
                ?>
                <a href="<?php the_permalink(); ?>" class="btn btn-primary">
                    <?php esc_html_e('Read More', 'timber-homes'); ?>
                </a>
                <?php
            endif;
            ?>
        </div>

        <?php if (is_singular() && has_tag()) : ?>
            <footer class="entry-footer">
                <div class="tags-links">
                    <i class="fas fa-tags"></i>
                    <?php the_tags('', ', ', ''); ?>
                </div>
            </footer>
        <?php endif; ?>
    </div>
</article>
