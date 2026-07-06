<?php
/**
 * Template Name: About Us Page
 * Description: Template for displaying About Us page
 */

get_header();

if (new_horizon_page_has_visual_blocks()) {
    new_horizon_render_visual_page_content();
    get_footer();
    return;
}

// Get page data and custom fields
while (have_posts()) : the_post();
    $page_title = get_the_title();
    $page_id = get_the_ID();
    $hero_description = get_post_meta($page_id, '_about_hero_description', true);
    
    // Intro Section
    $intro_title = get_post_meta($page_id, '_about_intro_title', true);
    $intro_text_1 = get_post_meta($page_id, '_about_intro_text_1', true);
    $intro_text_2 = get_post_meta($page_id, '_about_intro_text_2', true);
    $intro_text_3 = get_post_meta($page_id, '_about_intro_text_3', true);
    $intro_image = get_post_meta($page_id, '_about_intro_image', true);
    
    // Combined Section
    $combined_title = get_post_meta($page_id, '_about_combined_title', true);
    $combined_subtitle = get_post_meta($page_id, '_about_combined_subtitle', true);
    $combined_items = get_post_meta($page_id, '_about_combined_items', true);
    
    // Clients Section
    $clients_title = get_post_meta($page_id, '_about_clients_title', true);
    $clients_lead = get_post_meta($page_id, '_about_clients_lead', true);
    $clients_text_1 = get_post_meta($page_id, '_about_clients_text_1', true);
    $clients_text_2 = get_post_meta($page_id, '_about_clients_text_2', true);
    $clients_image = get_post_meta($page_id, '_about_clients_image', true);
    $cta_title = get_post_meta($page_id, '_about_cta_title', true);
    $cta_text = get_post_meta($page_id, '_about_cta_text', true);
    $cta_button = get_post_meta($page_id, '_about_cta_button', true);
    
endwhile;
wp_reset_postdata();

// Default image fallback
$default_image = get_template_directory_uri() . '/images/hero-timber-home.jpg';

// Get intro image URL from ID
if ($intro_image) {
    $intro_image_url = wp_get_attachment_image_url($intro_image, 'large');
    if (!$intro_image_url) {
        $intro_image_url = $default_image;
    }
} else {
    $intro_image_url = $default_image;
}

// Get clients image URL from ID
if ($clients_image) {
    $clients_image_url = wp_get_attachment_image_url($clients_image, 'full');
    if (!$clients_image_url) {
        $clients_image_url = $default_image;
    }
} else {
    $clients_image_url = $default_image;
}
?>

<!-- About Hero Section -->
<section class="page-hero" style="background: linear-gradient(135deg, rgba(10,10,10,0.9) 0%, rgba(26,26,26,0.95) 100%), url('<?php echo $default_image; ?>') center/cover;">
    <div class="container">
        <div class="page-hero-content">
            <h1<?php echo new_horizon_inline_edit_attrs('post_field', 'post_title', 'text', $page_id); ?> class="page-title"><?php echo esc_html($page_title); ?></h1>
            <p<?php echo new_horizon_inline_edit_attrs('post_meta', '_about_hero_description', 'textarea', $page_id); ?> class="page-description"><?php echo esc_html($hero_description ? $hero_description : 'A family-led luxury home company creating fully custom residences across Atlanta, Metro Atlanta, and North Georgia.'); ?></p>
        </div>
    </div>
</section>

<!-- About Intro Section -->
<section class="about-intro-section section">
    <div class="container">
        <div class="about-intro-grid">
            <div class="about-intro-content reveal">
                <h2<?php echo new_horizon_inline_edit_attrs('post_meta', '_about_intro_title', 'textarea', $page_id); ?>><?php echo $intro_title ? esc_html($intro_title) : 'Building Homes That Reflect How You Want to Live'; ?></h2>
                <?php if ($intro_text_1) : ?>
                    <p<?php echo new_horizon_inline_edit_attrs('post_meta', '_about_intro_text_1', 'textarea', $page_id); ?>><?php echo esc_html($intro_text_1); ?></p>
                <?php endif; ?>
                <?php if ($intro_text_2) : ?>
                    <p<?php echo new_horizon_inline_edit_attrs('post_meta', '_about_intro_text_2', 'textarea', $page_id); ?>><?php echo esc_html($intro_text_2); ?></p>
                <?php endif; ?>
                <?php if ($intro_text_3) : ?>
                    <p<?php echo new_horizon_inline_edit_attrs('post_meta', '_about_intro_text_3', 'textarea', $page_id); ?>><?php echo esc_html($intro_text_3); ?></p>
                <?php endif; ?>
            </div>
            <div class="about-intro-image reveal">
                <img src="<?php echo esc_url($intro_image_url); ?>" alt="Luxury Custom Home">
            </div>
        </div>
    </div>
</section>

<!-- What We Handle & What Sets Us Apart (Combined) -->
<?php if ($combined_items && is_array($combined_items) && count($combined_items) > 0) : ?>
<section class="about-combined-section section">
    <div class="container">
        <div class="section-title">
            <h2<?php echo new_horizon_inline_edit_attrs('post_meta', '_about_combined_title', 'textarea', $page_id); ?>><?php echo $combined_title ? esc_html($combined_title) : 'What We Handle & What Sets Us Apart'; ?></h2>
            <?php if ($combined_subtitle) : ?>
                <p<?php echo new_horizon_inline_edit_attrs('post_meta', '_about_combined_subtitle', 'textarea', $page_id); ?>><?php echo esc_html($combined_subtitle); ?></p>
            <?php endif; ?>
        </div>
        
        <div class="combined-items-list">
            <?php foreach ($combined_items as $index => $item) : 
                if (empty($item['title']) && empty($item['description'])) continue;
            ?>
            <div class="combined-item reveal" style="animation-delay: <?php echo ($index * 0.1); ?>s;">
                <?php if (!empty($item['icon'])) : ?>
                <div class="combined-icon">
                    <i class="<?php echo esc_attr($item['icon']); ?>"></i>
                </div>
                <?php endif; ?>
                <?php if (!empty($item['title'])) : ?>
                <h3<?php echo new_horizon_inline_edit_array_attrs('_about_combined_items', $index, 'title', 'text', $page_id); ?>><?php echo esc_html($item['title']); ?></h3>
                <?php endif; ?>
                <?php if (!empty($item['description'])) : ?>
                <p<?php echo new_horizon_inline_edit_array_attrs('_about_combined_items', $index, 'description', 'textarea', $page_id); ?>><?php echo esc_html($item['description']); ?></p>
                <?php endif; ?>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>

<!-- Who We Build For -->
<?php if ($clients_title || $clients_lead || $clients_text_1 || $clients_text_2) : ?>
<section class="about-clients-section" style="background: linear-gradient(135deg, rgba(10,10,10,0.85) 0%, rgba(26,26,26,0.90) 100%), url('<?php echo esc_url($clients_image_url); ?>') center/cover; background-attachment: fixed;">
    <div class="container">
        <div class="clients-content">
            <div class="section-title">
                <h2<?php echo new_horizon_inline_edit_attrs('post_meta', '_about_clients_title', 'textarea', $page_id); ?>><?php echo $clients_title ? esc_html($clients_title) : 'Who We Build For'; ?></h2>
                <?php if ($clients_lead) : ?>
                    <p<?php echo new_horizon_inline_edit_attrs('post_meta', '_about_clients_lead', 'textarea', $page_id); ?> class="lead-text"><?php echo esc_html($clients_lead); ?></p>
                <?php endif; ?>
            </div>
            
            <div class="clients-description reveal">
                <?php if ($clients_text_1) : ?>
                    <p<?php echo new_horizon_inline_edit_attrs('post_meta', '_about_clients_text_1', 'textarea', $page_id); ?>><?php echo esc_html($clients_text_1); ?></p>
                <?php endif; ?>
                <?php if ($clients_text_2) : ?>
                    <p<?php echo new_horizon_inline_edit_attrs('post_meta', '_about_clients_text_2', 'textarea', $page_id); ?>><?php echo esc_html($clients_text_2); ?></p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>

<!-- CTA Section -->
<section class="about-cta-section">
    <div class="container">
        <div class="cta-content reveal">
            <h2<?php echo new_horizon_inline_edit_attrs('post_meta', '_about_cta_title', 'textarea', $page_id); ?>><?php echo esc_html($cta_title ? $cta_title : 'Ready to Build with the Right Team?'); ?></h2>
            <p<?php echo new_horizon_inline_edit_attrs('post_meta', '_about_cta_text', 'textarea', $page_id); ?>><?php echo esc_html($cta_text ? $cta_text : 'A home of this scale deserves more than construction alone. It deserves careful guidance, direct communication, and a process built to support your vision from the start.'); ?></p>
            <div class="cta-buttons" style="margin-bottom: 3rem;">
                <a href="<?php echo home_url('/services/'); ?>" class="btn btn-outline"><span<?php echo new_horizon_inline_edit_attrs('post_meta', '_about_cta_button', 'text', $page_id); ?>><?php echo esc_html($cta_button ? $cta_button : 'Explore Our Process'); ?></span></a>
            </div>
        </div>
    </div>
</section>

<?php
get_footer();
?>
