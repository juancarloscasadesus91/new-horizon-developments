<?php
/**
 * The footer template file
 *
 * @package Timber_Homes
 * @since 1.0.0
 */
?>

    <footer class="site-footer">
        <div class="container">
            <div class="footer-content">
                <!-- About Section -->
                <div class="footer-section">
                    <h3><?php bloginfo('name'); ?></h3>
                    <p>
                        <?php
                        $description = get_bloginfo('description', 'display');
                        if ($description || is_customize_preview()) {
                            echo esc_html($description);
                        } else {
                            esc_html_e('Building premium American-style timber homes since 1995. We combine traditional craftsmanship with modern techniques to create sustainable, beautiful homes that last for generations.', 'timber-homes');
                        }
                        ?>
                    </p>
                    <div class="social-links">
                        <?php
                        $social_networks = array(
                            'facebook'  => array('icon' => 'fab fa-facebook-f', 'label' => 'Facebook'),
                            'instagram' => array('icon' => 'fab fa-instagram', 'label' => 'Instagram'),
                            'pinterest' => array('icon' => 'fab fa-pinterest-p', 'label' => 'Pinterest'),
                            'linkedin'  => array('icon' => 'fab fa-linkedin-in', 'label' => 'LinkedIn'),
                        );

                        foreach ($social_networks as $network => $data) {
                            $url = get_theme_mod("timber_homes_$network");
                            if ($url) {
                                printf(
                                    '<a href="%s" class="social-link" aria-label="%s" target="_blank" rel="noopener noreferrer"><i class="%s"></i></a>',
                                    esc_url($url),
                                    esc_attr($data['label']),
                                    esc_attr($data['icon'])
                                );
                            }
                        }
                        ?>
                    </div>
                </div>

                <!-- Quick Links -->
                <?php if (is_active_sidebar('footer-1')) : ?>
                    <div class="footer-section">
                        <?php dynamic_sidebar('footer-1'); ?>
                    </div>
                <?php else : ?>
                    <div class="footer-section">
                        <h3><?php esc_html_e('Quick Links', 'timber-homes'); ?></h3>
                        <?php
                        wp_nav_menu(array(
                            'theme_location' => 'footer',
                            'menu_class'     => 'footer-links',
                            'container'      => 'div',
                            'fallback_cb'    => false,
                        ));
                        ?>
                    </div>
                <?php endif; ?>

                <!-- Services -->
                <?php if (is_active_sidebar('footer-2')) : ?>
                    <div class="footer-section">
                        <?php dynamic_sidebar('footer-2'); ?>
                    </div>
                <?php else : ?>
                    <div class="footer-section">
                        <h3><?php esc_html_e('Our Services', 'timber-homes'); ?></h3>
                        <div class="footer-links">
                            <a href="#"><?php esc_html_e('Custom Home Design', 'timber-homes'); ?></a>
                            <a href="#"><?php esc_html_e('Full Construction', 'timber-homes'); ?></a>
                            <a href="#"><?php esc_html_e('Sustainable Materials', 'timber-homes'); ?></a>
                            <a href="#"><?php esc_html_e('Renovation & Restoration', 'timber-homes'); ?></a>
                            <a href="#"><?php esc_html_e('Interior Finishing', 'timber-homes'); ?></a>
                            <a href="#"><?php esc_html_e('Warranty & Maintenance', 'timber-homes'); ?></a>
                        </div>
                    </div>
                <?php endif; ?>

                <!-- Contact Info -->
                <?php if (is_active_sidebar('footer-3')) : ?>
                    <div class="footer-section">
                        <?php dynamic_sidebar('footer-3'); ?>
                    </div>
                <?php else : ?>
                    <div class="footer-section">
                        <h3><?php esc_html_e('Contact Us', 'timber-homes'); ?></h3>
                        <div class="footer-links">
                            <?php
                            $address = get_theme_mod('timber_homes_address', '123 Main Street, Denver, CO 80202');
                            $phone = get_theme_mod('timber_homes_phone', '+1 (555) 123-4567');
                            $email = get_theme_mod('timber_homes_email', 'info@timberhomes.com');
                            ?>
                            <p><i class="fas fa-map-marker-alt"></i> <?php echo esc_html($address); ?></p>
                            <p><i class="fas fa-phone"></i> <?php echo esc_html($phone); ?></p>
                            <p><i class="fas fa-envelope"></i> <a href="mailto:<?php echo esc_attr($email); ?>"><?php echo esc_html($email); ?></a></p>
                            <p><i class="fas fa-clock"></i> <?php esc_html_e('Mon-Fri: 8am - 6pm MST', 'timber-homes'); ?></p>
                        </div>
                    </div>
                <?php endif; ?>
            </div>

            <div class="footer-bottom">
                <p>
                    <?php
                    printf(
                        esc_html__('&copy; %1$s %2$s. All rights reserved.', 'timber-homes'),
                        date('Y'),
                        get_bloginfo('name')
                    );
                    ?>
                    | <a href="<?php echo esc_url(get_privacy_policy_url()); ?>"><?php esc_html_e('Privacy Policy', 'timber-homes'); ?></a>
                </p>
            </div>
        </div>
    </footer>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
