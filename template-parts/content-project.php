<?php
/**
 * Template part for displaying projects
 *
 * @package Timber_Homes
 * @since 1.0.0
 */

$location = get_post_meta(get_the_ID(), '_project_location', true);
$size = get_post_meta(get_the_ID(), '_project_size', true);
$year = get_post_meta(get_the_ID(), '_project_year', true);
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('portfolio-item'); ?>>
    <?php if (has_post_thumbnail()) : ?>
        <a href="<?php the_permalink(); ?>">
            <?php the_post_thumbnail('timber-homes-portfolio'); ?>
        </a>
    <?php endif; ?>

    <div class="portfolio-overlay">
        <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
        <p><?php echo esc_html(get_the_excerpt()); ?></p>
        <div class="portfolio-meta">
            <?php if ($location) : ?>
                <span><i class="fas fa-map-marker-alt"></i> <?php echo esc_html($location); ?></span>
            <?php endif; ?>
            <?php if ($size) : ?>
                <span><i class="fas fa-ruler-combined"></i> <?php echo esc_html($size); ?> sq ft</span>
            <?php endif; ?>
        </div>
    </div>
</article>
