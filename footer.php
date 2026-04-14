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
                    <h3><?php echo esc_html(get_theme_mod('footer_about_title', get_bloginfo('name'))); ?></h3>
                    <p><?php echo esc_html(get_theme_mod('footer_about_text', 'Building premium American-style timber homes since 1995. We combine traditional craftsmanship with modern techniques to create sustainable, beautiful homes that last for generations.')); ?></p>
                    <div class="social-links">
                        <?php
                        $social_networks = array(
                            'facebook'  => array('icon' => 'fab fa-facebook-f', 'label' => 'Facebook'),
                            'instagram' => array('icon' => 'fab fa-instagram', 'label' => 'Instagram'),
                            'pinterest' => array('icon' => 'fab fa-pinterest-p', 'label' => 'Pinterest'),
                            'linkedin'  => array('icon' => 'fab fa-linkedin-in', 'label' => 'LinkedIn'),
                            'twitter'   => array('icon' => 'fab fa-twitter', 'label' => 'Twitter'),
                            'youtube'   => array('icon' => 'fab fa-youtube', 'label' => 'YouTube'),
                        );

                        foreach ($social_networks as $network => $data) {
                            $url = get_theme_mod("footer_social_$network");
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
                <div class="footer-section">
                    <h3><?php esc_html_e('Quick Links', 'timber-homes'); ?></h3>
                    <div class="footer-links">
                        <?php
                        // Get all pages
                        $pages = get_pages(array(
                            'sort_column' => 'menu_order',
                            'post_status' => 'publish'
                        ));
                        
                        // Priority pages
                        $priority_pages = array('home', 'about', 'services', 'projects', 'contact');
                        $displayed = array();
                        
                        // First show priority pages
                        foreach ($priority_pages as $slug) {
                            foreach ($pages as $page) {
                                if ($page->post_name === $slug && !in_array($page->ID, $displayed)) {
                                    echo '<a href="' . get_permalink($page->ID) . '">' . esc_html($page->post_title) . '</a>';
                                    $displayed[] = $page->ID;
                                    break;
                                }
                            }
                        }
                        
                        // Then show other published pages (max 6 total)
                        $count = count($displayed);
                        if ($count < 6) {
                            foreach ($pages as $page) {
                                if (!in_array($page->ID, $displayed) && $count < 6) {
                                    echo '<a href="' . get_permalink($page->ID) . '">' . esc_html($page->post_title) . '</a>';
                                    $displayed[] = $page->ID;
                                    $count++;
                                }
                            }
                        }
                        ?>
                    </div>
                </div>

                <!-- Services -->
                <div class="footer-section">
                    <h3><?php esc_html_e('Our Services', 'timber-homes'); ?></h3>
                    <div class="footer-links">
                        <?php
                        // Get services from custom post type
                        $services = new WP_Query(array(
                            'post_type'      => 'service',
                            'posts_per_page' => 6,
                            'orderby'        => 'menu_order',
                            'order'          => 'ASC',
                        ));
                        
                        if ($services->have_posts()) :
                            while ($services->have_posts()) : $services->the_post();
                                echo '<a href="' . get_permalink() . '">' . get_the_title() . '</a>';
                            endwhile;
                            wp_reset_postdata();
                        else :
                            // Fallback if no services exist
                            ?>
                            <a href="#"><?php esc_html_e('Custom Home Design', 'timber-homes'); ?></a>
                            <a href="#"><?php esc_html_e('Full Construction', 'timber-homes'); ?></a>
                            <a href="#"><?php esc_html_e('Renovation & Restoration', 'timber-homes'); ?></a>
                            <a href="#"><?php esc_html_e('Interior Finishing', 'timber-homes'); ?></a>
                            <?php
                        endif;
                        ?>
                    </div>
                </div>

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
                            $address = get_theme_mod('footer_address', '123 Main Street, Denver, CO 80202');
                            $phone = get_theme_mod('footer_phone', '+1 (555) 123-4567');
                            $email = get_theme_mod('footer_email', 'info@newhorizon.com');
                            $hours = get_theme_mod('footer_hours', 'Mon-Fri: 8am - 6pm MST');
                            ?>
                            <p><i class="fas fa-map-marker-alt"></i> <?php echo esc_html($address); ?></p>
                            <p><i class="fas fa-phone"></i> <a href="tel:<?php echo esc_attr(str_replace(array(' ', '(', ')', '-'), '', $phone)); ?>"><?php echo esc_html($phone); ?></a></p>
                            <p><i class="fas fa-envelope"></i> <a href="mailto:<?php echo esc_attr($email); ?>"><?php echo esc_html($email); ?></a></p>
                            <p><i class="fas fa-clock"></i> <?php echo esc_html($hours); ?></p>
                        </div>
                    </div>
                <?php endif; ?>
            </div>

            <div class="footer-bottom">
                <p>
                    <?php
                    $copyright = get_theme_mod('footer_copyright', '');
                    if ($copyright) {
                        echo esc_html(str_replace('{year}', date('Y'), $copyright));
                    } else {
                        printf(
                            esc_html__('&copy; %1$s %2$s. All rights reserved.', 'timber-homes'),
                            date('Y'),
                            get_bloginfo('name')
                        );
                    }
                    ?>
                    <?php if (get_privacy_policy_url()) : ?>
                        | <a href="<?php echo esc_url(get_privacy_policy_url()); ?>"><?php esc_html_e('Privacy Policy', 'timber-homes'); ?></a>
                    <?php endif; ?>
                </p>
            </div>
        </div>
    </footer>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
