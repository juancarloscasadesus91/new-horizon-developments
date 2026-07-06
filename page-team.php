<?php
/**
 * Template Name: Team Page
 * The team page template file
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
$team_page_id = get_queried_object_id();
?>

<!-- Team Hero Section -->
<section class="page-hero" style="background: linear-gradient(135deg, rgba(10,10,10,0.9) 0%, rgba(26,26,26,0.95) 100%), url('<?php echo get_template_directory_uri(); ?>/images/hero-timber-home.jpg') center/cover;">
    <div class="container">
        <div class="page-hero-content">
            <h1<?php echo new_horizon_inline_edit_attrs('theme_mod', 'new_horizon_team_page_title', 'text', $team_page_id); ?> class="page-title"><?php echo esc_html(get_theme_mod('new_horizon_team_page_title', 'Our Team')); ?></h1>
            <p<?php echo new_horizon_inline_edit_attrs('theme_mod', 'new_horizon_team_page_description', 'textarea', $team_page_id); ?> class="page-description"><?php echo esc_html(get_theme_mod('new_horizon_team_page_description', 'Meet the experts behind your dream home')); ?></p>
        </div>
    </div>
</section>

<!-- Team Section -->
<section class="team-section section" id="team">
    <div class="container">
        <div class="section-title">
            <p<?php echo new_horizon_inline_edit_attrs('theme_mod', 'new_horizon_team_section_subtitle', 'text', $team_page_id); ?> class="section-subtitle"><?php echo esc_html(get_theme_mod('new_horizon_team_section_subtitle', 'THE TEAM')); ?></p>
            <h2<?php echo new_horizon_inline_edit_attrs('theme_mod', 'new_horizon_team_section_title', 'text', $team_page_id); ?>><?php echo esc_html(get_theme_mod('new_horizon_team_section_title', 'Leadership & Experts')); ?></h2>
            <p<?php echo new_horizon_inline_edit_attrs('theme_mod', 'new_horizon_team_section_description', 'textarea', $team_page_id); ?>><?php echo esc_html(get_theme_mod('new_horizon_team_section_description', 'Dedicated professionals committed to building excellence')); ?></p>
        </div>

        <div class="team-grid">
            <?php
            // Query team members from database
            $team_query = new WP_Query(array(
                'post_type'      => 'team_member',
                'posts_per_page' => -1,
                'orderby'        => 'meta_value_num',
                'meta_key'       => '_team_order',
                'order'          => 'ASC',
            ));

            if ($team_query->have_posts()) :
                while ($team_query->have_posts()) : $team_query->the_post();
                    $position = get_post_meta(get_the_ID(), '_team_position', true);
                    $email = get_post_meta(get_the_ID(), '_team_email', true);
                    $phone = get_post_meta(get_the_ID(), '_team_phone', true);
                    $bio = get_the_content();
                    ?>
                    <div class="team-member reveal">
                        <div class="team-member-image">
                            <?php
                            if (has_post_thumbnail()) {
                                the_post_thumbnail('full');
                            } else {
                                ?>
                                <img src="<?php echo get_template_directory_uri(); ?>/images/team/placeholder.jpg" alt="<?php the_title_attribute(); ?>">
                                <?php
                            }
                            ?>
                            <div class="team-member-overlay">
                                <div class="team-member-info">
                                    <?php if ($bio) : ?>
                                        <div<?php echo new_horizon_inline_edit_attrs('post_field', 'post_content', 'textarea', get_the_ID()); ?> class="team-member-bio"><?php echo wp_kses_post($bio); ?></div>
                                    <?php endif; ?>
                                    <div class="team-member-contact">
                                        <?php if ($email) : ?>
                                            <a href="mailto:<?php echo esc_attr($email); ?>" class="team-contact-link">
                                                <i class="fas fa-envelope"></i> <span<?php echo new_horizon_inline_edit_attrs('post_meta', '_team_email', 'text', get_the_ID()); ?>><?php echo esc_html($email); ?></span>
                                            </a>
                                        <?php endif; ?>
                                        <?php if ($phone) : ?>
                                            <a href="tel:<?php echo esc_attr(str_replace(array(' ', '(', ')', '-'), '', $phone)); ?>" class="team-contact-link">
                                                <i class="fas fa-phone"></i> <span<?php echo new_horizon_inline_edit_attrs('post_meta', '_team_phone', 'text', get_the_ID()); ?>><?php echo esc_html($phone); ?></span>
                                            </a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="team-member-details">
                            <h3<?php echo new_horizon_inline_edit_attrs('post_field', 'post_title', 'text', get_the_ID()); ?> class="team-member-name"><?php the_title(); ?></h3>
                            <?php if ($position) : ?>
                                <p<?php echo new_horizon_inline_edit_attrs('post_meta', '_team_position', 'text', get_the_ID()); ?> class="team-member-position"><?php echo esc_html($position); ?></p>
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php
                endwhile;
                wp_reset_postdata();
            else :
                ?>
                <p style="grid-column: 1/-1; text-align: center; color: rgba(255,255,255,0.7);">
                    <?php esc_html_e('No team members found. Add team members from the WordPress admin panel.', 'timber-homes'); ?>
                </p>
                <?php
            endif;
            ?>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="cta-section section" style="background: var(--color-gray-dark);">
    <div class="container">
        <div class="cta-content" style="text-align: center; max-width: 800px; margin: 0 auto;">
            <h2<?php echo new_horizon_inline_edit_attrs('theme_mod', 'new_horizon_team_cta_title', 'text', $team_page_id); ?> style="color: var(--color-white); margin-bottom: var(--spacing-md);">
                <?php echo esc_html(get_theme_mod('new_horizon_team_cta_title', 'Ready to Start Your Project?')); ?>
            </h2>
            <p<?php echo new_horizon_inline_edit_attrs('theme_mod', 'new_horizon_team_cta_text', 'textarea', $team_page_id); ?> style="color: rgba(255,255,255,0.7); margin-bottom: var(--spacing-lg); font-size: 1.125rem;">
                <?php echo esc_html(get_theme_mod('new_horizon_team_cta_text', 'Our team is ready to bring your dream timber home to life. Contact us today for a free consultation.')); ?>
            </p>
            <div style="display: flex; gap: 1rem; justify-content: center; flex-wrap: wrap;">
                <a href="#contact" class="btn btn-primary"><span<?php echo new_horizon_inline_edit_attrs('theme_mod', 'new_horizon_team_cta_primary', 'text', $team_page_id); ?>><?php echo esc_html(get_theme_mod('new_horizon_team_cta_primary', 'Get In Touch')); ?></span></a>
                <a href="#portfolio" class="btn btn-outline"><span<?php echo new_horizon_inline_edit_attrs('theme_mod', 'new_horizon_team_cta_secondary', 'text', $team_page_id); ?>><?php echo esc_html(get_theme_mod('new_horizon_team_cta_secondary', 'View Our Work')); ?></span></a>
            </div>
        </div>
    </div>
</section>

<?php
get_footer();
