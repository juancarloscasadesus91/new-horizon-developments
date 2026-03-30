<?php
/**
 * The header template file
 *
 * @package Timber_Homes
 * @since 1.0.0
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <link rel="icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/images/new-horizon-develoments.png">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div id="page" class="site">
    <a class="skip-link sr-only" href="#primary"><?php esc_html_e('Skip to content', 'timber-homes'); ?></a>

    <header class="site-header" id="header">
        <div class="header-container">
            <!-- Logo -->
            <div class="site-logo">
                <?php
                if (has_custom_logo()) {
                    the_custom_logo();
                } else {
                    ?>
                    <a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/new-horizon-develoments.png" alt="Avatar Placeholder">
                    </a>
                    <?php
                }
                ?>
            </div>

            <!-- Main Navigation -->
            <nav class="main-navigation" id="mainNav" role="navigation" aria-label="<?php esc_attr_e('Primary Navigation', 'timber-homes'); ?>">
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'primary',
                    'menu_id'        => 'primary-menu',
                    'container'      => false,
                    'fallback_cb'    => false,
                ));
                ?>
            </nav>

            <!-- Header CTA -->
            <div class="header-cta">
                <?php
                $phone = get_theme_mod('timber_homes_phone', '+1 (555) 123-4567');
                ?>
                <a href="tel:<?php echo esc_attr(str_replace(array(' ', '(', ')', '-'), '', $phone)); ?>" class="btn btn-primary">
                    <i class="fas fa-phone"></i> <?php esc_html_e('Call Us', 'timber-homes'); ?>
                </a>
            </div>

            <!-- Mobile Menu Toggle -->
            <button class="mobile-menu-toggle" id="mobileMenuToggle" aria-label="<?php esc_attr_e('Toggle mobile menu', 'timber-homes'); ?>" aria-expanded="false">
                <span></span>
                <span></span>
                <span></span>
            </button>
        </div>
    </header>
