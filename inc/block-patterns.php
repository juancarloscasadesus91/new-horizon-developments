<?php
/**
 * Block patterns that let editors build pages visually with the theme design.
 *
 * @package New_Horizon_Developments
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Register editable section patterns.
 */
function new_horizon_register_block_patterns() {
    if (!function_exists('register_block_pattern')) {
        return;
    }

    register_block_pattern_category(
        'new-horizon-sections',
        array('label' => __('New Horizon Sections', 'new-horizon'))
    );

    register_block_pattern(
        'new-horizon/page-hero',
        array(
            'title'       => __('Page Hero', 'new-horizon'),
            'description' => __('A dark luxury hero section with editable title and description.', 'new-horizon'),
            'categories'  => array('new-horizon-sections'),
            'content'     => '<!-- wp:group {"tagName":"section","className":"page-hero","style":{"background":{"backgroundImage":{"url":"' . esc_url(get_template_directory_uri() . '/images/hero-timber-home.jpg') . '","id":0,"source":"file","title":"hero-timber-home"},"backgroundSize":"cover","backgroundPosition":"50% 50%"},"color":{"background":"#111111"}},"layout":{"type":"constrained"}} --><section class="wp-block-group page-hero has-background" style="background-color:#111111;background-image:url(' . esc_url(get_template_directory_uri() . '/images/hero-timber-home.jpg') . ');background-position:50% 50%;background-size:cover"><!-- wp:group {"className":"page-hero-content","layout":{"type":"constrained"}} --><div class="wp-block-group page-hero-content"><!-- wp:heading {"level":1,"className":"page-title"} --><h1 class="wp-block-heading page-title">' . esc_html__('Your Page Title', 'new-horizon') . '</h1><!-- /wp:heading --><!-- wp:paragraph {"className":"page-description"} --><p class="page-description">' . esc_html__('Replace this text with a short page introduction.', 'new-horizon') . '</p><!-- /wp:paragraph --></div><!-- /wp:group --></section><!-- /wp:group -->',
        )
    );

    register_block_pattern(
        'new-horizon/section-heading',
        array(
            'title'       => __('Section Heading', 'new-horizon'),
            'description' => __('Centered section eyebrow, title, and intro copy.', 'new-horizon'),
            'categories'  => array('new-horizon-sections'),
            'content'     => '<!-- wp:group {"className":"section-title","layout":{"type":"constrained"}} --><div class="wp-block-group section-title"><!-- wp:paragraph {"className":"section-subtitle"} --><p class="section-subtitle">' . esc_html__('Section Label', 'new-horizon') . '</p><!-- /wp:paragraph --><!-- wp:heading --><h2 class="wp-block-heading">' . esc_html__('Editable Section Title', 'new-horizon') . '</h2><!-- /wp:heading --><!-- wp:paragraph --><p>' . esc_html__('Add a short description for this section.', 'new-horizon') . '</p><!-- /wp:paragraph --></div><!-- /wp:group -->',
        )
    );

    register_block_pattern(
        'new-horizon/text-image-section',
        array(
            'title'       => __('Text and Image Section', 'new-horizon'),
            'description' => __('Two-column about style section with editable copy and image.', 'new-horizon'),
            'categories'  => array('new-horizon-sections'),
            'content'     => '<!-- wp:group {"tagName":"section","className":"about-intro-section section","layout":{"type":"constrained"}} --><section class="wp-block-group about-intro-section section"><!-- wp:columns {"className":"about-intro-grid"} --><div class="wp-block-columns about-intro-grid"><!-- wp:column {"className":"about-intro-content reveal"} --><div class="wp-block-column about-intro-content reveal"><!-- wp:heading --><h2 class="wp-block-heading">' . esc_html__('Building Homes That Reflect How You Want to Live', 'new-horizon') . '</h2><!-- /wp:heading --><!-- wp:paragraph --><p>' . esc_html__('Replace this copy with the story or message for this page section.', 'new-horizon') . '</p><!-- /wp:paragraph --><!-- wp:paragraph --><p>' . esc_html__('Add another paragraph if the section needs more detail.', 'new-horizon') . '</p><!-- /wp:paragraph --></div><!-- /wp:column --><!-- wp:column {"className":"about-intro-image reveal"} --><div class="wp-block-column about-intro-image reveal"><!-- wp:image {"sizeSlug":"large"} --><figure class="wp-block-image size-large"><img src="' . esc_url(get_template_directory_uri() . '/images/hero-timber-home.jpg') . '" alt=""/></figure><!-- /wp:image --></div><!-- /wp:column --></div><!-- /wp:columns --></section><!-- /wp:group -->',
        )
    );

    register_block_pattern(
        'new-horizon/three-feature-cards',
        array(
            'title'       => __('Three Feature Cards', 'new-horizon'),
            'description' => __('Three editable cards using the existing luxury service card styling.', 'new-horizon'),
            'categories'  => array('new-horizon-sections'),
            'content'     => '<!-- wp:group {"tagName":"section","className":"services-section section","layout":{"type":"constrained"}} --><section class="wp-block-group services-section section"><!-- wp:group {"className":"grid grid-3","layout":{"type":"default"}} --><div class="wp-block-group grid grid-3"><!-- wp:group {"className":"service-card reveal","layout":{"type":"constrained"}} --><div class="wp-block-group service-card reveal"><!-- wp:heading {"level":3} --><h3 class="wp-block-heading">' . esc_html__('Feature One', 'new-horizon') . '</h3><!-- /wp:heading --><!-- wp:paragraph --><p>' . esc_html__('Describe this feature or service.', 'new-horizon') . '</p><!-- /wp:paragraph --></div><!-- /wp:group --><!-- wp:group {"className":"service-card reveal","layout":{"type":"constrained"}} --><div class="wp-block-group service-card reveal"><!-- wp:heading {"level":3} --><h3 class="wp-block-heading">' . esc_html__('Feature Two', 'new-horizon') . '</h3><!-- /wp:heading --><!-- wp:paragraph --><p>' . esc_html__('Describe this feature or service.', 'new-horizon') . '</p><!-- /wp:paragraph --></div><!-- /wp:group --><!-- wp:group {"className":"service-card reveal","layout":{"type":"constrained"}} --><div class="wp-block-group service-card reveal"><!-- wp:heading {"level":3} --><h3 class="wp-block-heading">' . esc_html__('Feature Three', 'new-horizon') . '</h3><!-- /wp:heading --><!-- wp:paragraph --><p>' . esc_html__('Describe this feature or service.', 'new-horizon') . '</p><!-- /wp:paragraph --></div><!-- /wp:group --></div><!-- /wp:group --></section><!-- /wp:group -->',
        )
    );

    register_block_pattern(
        'new-horizon/cta-section',
        array(
            'title'       => __('Call to Action Section', 'new-horizon'),
            'description' => __('Centered CTA section with editable heading, copy, and button.', 'new-horizon'),
            'categories'  => array('new-horizon-sections'),
            'content'     => '<!-- wp:group {"tagName":"section","className":"about-cta-section section","layout":{"type":"constrained"}} --><section class="wp-block-group about-cta-section section"><!-- wp:group {"className":"cta-content reveal","layout":{"type":"constrained"}} --><div class="wp-block-group cta-content reveal"><!-- wp:heading --><h2 class="wp-block-heading">' . esc_html__('Ready to Build with the Right Team?', 'new-horizon') . '</h2><!-- /wp:heading --><!-- wp:paragraph --><p>' . esc_html__('Replace this with a concise call to action for the page.', 'new-horizon') . '</p><!-- /wp:paragraph --><!-- wp:buttons {"className":"cta-buttons","layout":{"type":"flex","justifyContent":"center"}} --><div class="wp-block-buttons cta-buttons"><!-- wp:button {"className":"btn btn-primary"} --><div class="wp-block-button btn btn-primary"><a class="wp-block-button__link wp-element-button" href="/contact/">' . esc_html__('Request a Quote', 'new-horizon') . '</a></div><!-- /wp:button --></div><!-- /wp:buttons --></div><!-- /wp:group --></section><!-- /wp:group -->',
        )
    );
}
add_action('init', 'new_horizon_register_block_patterns');
