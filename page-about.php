<?php
/**
 * Template Name: About Us Page
 * Description: Template for displaying About Us page
 */

get_header();

// Get page data and custom fields
while (have_posts()) : the_post();
    $page_title = get_the_title();
    $page_id = get_the_ID();
    
    // Intro Section
    $intro_title = get_post_meta($page_id, '_about_intro_title', true);
    $intro_text_1 = get_post_meta($page_id, '_about_intro_text_1', true);
    $intro_text_2 = get_post_meta($page_id, '_about_intro_text_2', true);
    $intro_text_3 = get_post_meta($page_id, '_about_intro_text_3', true);
    $intro_image = get_post_meta($page_id, '_about_intro_image', true);
    
    // Differences Section
    $diff_title = get_post_meta($page_id, '_about_diff_title', true);
    $diff_subtitle = get_post_meta($page_id, '_about_diff_subtitle', true);
    $differences = get_post_meta($page_id, '_about_differences', true);
    
    // Values Section
    $values_title = get_post_meta($page_id, '_about_values_title', true);
    $values_lead = get_post_meta($page_id, '_about_values_lead', true);
    $values = get_post_meta($page_id, '_about_values', true);
    $values_image = get_post_meta($page_id, '_about_values_image', true);
    
    // Clients Section
    $clients_title = get_post_meta($page_id, '_about_clients_title', true);
    $clients_lead = get_post_meta($page_id, '_about_clients_lead', true);
    $clients_text_1 = get_post_meta($page_id, '_about_clients_text_1', true);
    $clients_text_2 = get_post_meta($page_id, '_about_clients_text_2', true);
    
    // Capabilities Section
    $cap_title = get_post_meta($page_id, '_about_cap_title', true);
    $cap_subtitle = get_post_meta($page_id, '_about_cap_subtitle', true);
    $capabilities = get_post_meta($page_id, '_about_capabilities', true);
    
endwhile;
wp_reset_postdata();

// Default image fallback
$default_image = get_template_directory_uri() . '/images/hero-timber-home.jpg';
if (empty($intro_image)) $intro_image = $default_image;
if (empty($values_image)) $values_image = $default_image;
?>

<!-- About Hero Section -->
<section class="page-hero" style="background: linear-gradient(135deg, rgba(10,10,10,0.9) 0%, rgba(26,26,26,0.95) 100%), url('<?php echo $default_image; ?>') center/cover;">
    <div class="container">
        <div class="page-hero-content">
            <h1 class="page-title"><?php echo esc_html($page_title); ?></h1>
            <p class="page-description">A family-led luxury home company creating fully custom residences across Atlanta, Metro Atlanta, and North Georgia.</p>
        </div>
    </div>
</section>

<!-- About Intro Section -->
<section class="about-intro-section section">
    <div class="container">
        <div class="about-intro-grid">
            <div class="about-intro-content reveal">
                <h2><?php echo $intro_title ? esc_html($intro_title) : 'Building Homes That Reflect How You Want to Live'; ?></h2>
                <?php if ($intro_text_1) : ?>
                    <p><?php echo esc_html($intro_text_1); ?></p>
                <?php endif; ?>
                <?php if ($intro_text_2) : ?>
                    <p><?php echo esc_html($intro_text_2); ?></p>
                <?php endif; ?>
                <?php if ($intro_text_3) : ?>
                    <p><?php echo esc_html($intro_text_3); ?></p>
                <?php endif; ?>
            </div>
            <div class="about-intro-image reveal">
                <img src="<?php echo esc_url($intro_image); ?>" alt="Luxury Custom Home">
            </div>
        </div>
    </div>
</section>

<!-- What Sets Us Apart -->
<?php if ($differences && is_array($differences) && count($differences) > 0) : ?>
<section class="about-difference-section section" style="background: var(--color-gray-dark);">
    <div class="container">
        <div class="section-title">
            <h2><?php echo $diff_title ? esc_html($diff_title) : 'What Sets Us Apart'; ?></h2>
            <?php if ($diff_subtitle) : ?>
                <p><?php echo esc_html($diff_subtitle); ?></p>
            <?php endif; ?>
        </div>
        
        <div class="grid grid-3">
            <?php foreach ($differences as $diff) : 
                if (empty($diff['title']) && empty($diff['description'])) continue;
            ?>
            <div class="difference-card reveal">
                <?php if (!empty($diff['icon'])) : ?>
                <div class="difference-icon">
                    <i class="<?php echo esc_attr($diff['icon']); ?>"></i>
                </div>
                <?php endif; ?>
                <?php if (!empty($diff['title'])) : ?>
                <h3><?php echo esc_html($diff['title']); ?></h3>
                <?php endif; ?>
                <?php if (!empty($diff['description'])) : ?>
                <p><?php echo esc_html($diff['description']); ?></p>
                <?php endif; ?>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>

<!-- Our Values -->
<?php if ($values && is_array($values) && count($values) > 0) : ?>
<section class="about-values-section section">
    <div class="container">
        <div class="values-content-grid">
            <div class="values-text reveal">
                <h2><?php echo $values_title ? esc_html($values_title) : 'Our Commitment to You'; ?></h2>
                <?php if ($values_lead) : ?>
                    <p class="lead-text"><?php echo esc_html($values_lead); ?></p>
                <?php endif; ?>
                
                <div class="values-list">
                    <?php foreach ($values as $value) : 
                        if (empty($value['title']) && empty($value['description'])) continue;
                    ?>
                    <div class="value-item">
                        <i class="fas fa-check-circle"></i>
                        <div>
                            <?php if (!empty($value['title'])) : ?>
                            <h4><?php echo esc_html($value['title']); ?></h4>
                            <?php endif; ?>
                            <?php if (!empty($value['description'])) : ?>
                            <p><?php echo esc_html($value['description']); ?></p>
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
            
            <div class="values-image reveal">
                <img src="<?php echo esc_url($values_image); ?>" alt="Craftsmanship">
            </div>
        </div>
    </div>
</section>
<?php endif; ?>

<!-- Who We Build For -->
<?php if ($clients_title || $clients_lead || $clients_text_1 || $clients_text_2) : ?>
<section class="about-clients-section section" style="background: var(--color-gray-dark);">
    <div class="container">
        <div class="clients-content">
            <div class="section-title">
                <h2><?php echo $clients_title ? esc_html($clients_title) : 'Who We Build For'; ?></h2>
                <?php if ($clients_lead) : ?>
                    <p class="lead-text"><?php echo esc_html($clients_lead); ?></p>
                <?php endif; ?>
            </div>
            
            <div class="clients-description reveal">
                <?php if ($clients_text_1) : ?>
                    <p><?php echo esc_html($clients_text_1); ?></p>
                <?php endif; ?>
                <?php if ($clients_text_2) : ?>
                    <p><?php echo esc_html($clients_text_2); ?></p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>

<!-- Capabilities -->
<?php if ($capabilities && is_array($capabilities) && count($capabilities) > 0) : ?>
<section class="about-capabilities-section section">
    <div class="container">
        <div class="section-title">
            <h2><?php echo $cap_title ? esc_html($cap_title) : 'What We Handle'; ?></h2>
            <?php if ($cap_subtitle) : ?>
                <p><?php echo esc_html($cap_subtitle); ?></p>
            <?php endif; ?>
        </div>
        
        <div class="grid grid-2">
            <?php foreach ($capabilities as $cap) : 
                if (empty($cap['title']) && empty($cap['description'])) continue;
            ?>
            <div class="capability-card reveal">
                <?php if (!empty($cap['icon'])) : ?>
                <i class="<?php echo esc_attr($cap['icon']); ?>"></i>
                <?php endif; ?>
                <?php if (!empty($cap['title'])) : ?>
                <h3><?php echo esc_html($cap['title']); ?></h3>
                <?php endif; ?>
                <?php if (!empty($cap['description'])) : ?>
                <p><?php echo esc_html($cap['description']); ?></p>
                <?php endif; ?>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>

<!-- CTA Section -->
<section class="about-cta-section section" style="background: linear-gradient(135deg, rgba(10,10,10,0.95) 0%, rgba(26,26,26,0.98) 100%), url('<?php echo $default_image; ?>') center/cover; background-attachment: fixed;">
    <div class="container">
        <div class="cta-content reveal">
            <h2>Ready to Build with the Right Team?</h2>
            <p>A home of this scale deserves more than construction alone. It deserves careful guidance, direct communication, and a process built to support your vision from the start.</p>
            <div class="cta-buttons" style="margin-bottom: 3rem;">
                <a href="/services/" class="btn btn-outline">Explore Our Process</a>
            </div>
        </div>
    </div>
</section>

<?php
get_footer();
?>
