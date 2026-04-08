<?php
/**
 * The front page template file
 * This is the homepage template
 *
 * @package Timber_Homes
 * @since 1.0.0
 */

get_header();
?>

<!-- Hero Section -->
<section class="hero-section" id="home">
    <div class="hero-background">
        <?php
        if (has_header_image()) {
            ?>
            <img src="<?php header_image(); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>">
            <?php
        } else {
            ?>
            <img src="<?php echo get_template_directory_uri(); ?>/images/hero-timber-home.jpg" alt="<?php esc_attr_e('Beautiful American-style timber home', 'timber-homes'); ?>">
            <?php
        }
        ?>
    </div>
    
    <div class="container">
        <div class="hero-content fade-in-up">
                <div class="hero-logo">
                <?php
                    if (has_custom_logo()) {
                        the_custom_logo();
                    }
                ?>
                </div>
            <h1 class="hero-title"><?php esc_html_e('The Home You\'ve Been Imagining Deserves the Right Team to Build It', 'new-horizon'); ?></h1>
            <p class="hero-description">
                <?php esc_html_e('Every home begins with understanding how you want to live.', 'new-horizon'); ?>
            </p>
            <div class="hero-buttons">
                <a href="#contact" class="btn btn-primary"><?php esc_html_e('Request a Quote', 'timber-homes'); ?></a>
                <a href="#portfolio" class="btn btn-outline"><?php esc_html_e('View Our Projects', 'timber-homes'); ?></a>
            </div>
        </div>
    </div>
</section>

<!-- Services Section -->
<section class="services-section section" id="services">
    <div class="container">
        <div class="section-title">
            <p class="section-subtitle"><?php esc_html_e('What We Offer', 'timber-homes'); ?></p>
            <h2><?php esc_html_e('Our Construction Services', 'timber-homes'); ?></h2>
            <p><?php esc_html_e('Comprehensive timber home solutions from design to completion', 'timber-homes'); ?></p>
        </div>

        <div class="grid grid-3">
            <?php
            // Query services from WordPress
            $services = new WP_Query(array(
                'post_type'      => 'service',
                'posts_per_page' => -1,
                'orderby'        => 'meta_value_num',
                'meta_key'       => '_service_order',
                'order'          => 'ASC',
            ));

            if ($services->have_posts()) :
                while ($services->have_posts()) : $services->the_post();
                    $icon = get_post_meta(get_the_ID(), '_service_icon', true);
                    $short_desc = get_post_meta(get_the_ID(), '_service_short_description', true);
                    ?>
                    <a href="<?php the_permalink(); ?>" class="service-card reveal">
                        <?php if ($icon) : ?>
                            <div class="service-icon">
                                <i class="<?php echo esc_attr($icon); ?>"></i>
                            </div>
                        <?php endif; ?>
                        <h3><?php the_title(); ?></h3>
                        <?php if ($short_desc) : ?>
                            <p><?php echo esc_html($short_desc); ?></p>
                        <?php else : ?>
                            <p><?php echo esc_html(get_the_excerpt()); ?></p>
                        <?php endif; ?>
                    </a>
                    <?php
                endwhile;
                wp_reset_postdata();
            else :
                // Fallback: Show message if no services exist
                ?>
                <div class="service-card reveal">
                    <div class="service-icon">
                        <i class="fas fa-info-circle"></i>
                    </div>
                    <h3><?php esc_html_e('No Services Yet', 'new-horizon'); ?></h3>
                    <p><?php esc_html_e('Services will appear here once they are added from the WordPress admin panel.', 'new-horizon'); ?></p>
                </div>
                <?php
            endif;
            ?>
        </div>
    </div>
</section>

<!-- Portfolio Section -->
<section class="portfolio-section section" id="portfolio">
    <div class="container">
        <div class="section-title">
            <p class="section-subtitle"><?php esc_html_e('Our Work', 'timber-homes'); ?></p>
            <h2><?php esc_html_e('Featured Projects', 'timber-homes'); ?></h2>
            <p><?php esc_html_e('Explore our portfolio of stunning timber homes', 'timber-homes'); ?></p>
        </div>

        <div class="portfolio-grid">
            <?php
            $projects = new WP_Query(array(
                'post_type'      => 'project',
                'posts_per_page' => 6,
                'orderby'        => 'date',
                'order'          => 'DESC',
                'meta_query'     => array(
                    array(
                        'key'     => '_project_featured',
                        'value'   => '1',
                        'compare' => '='
                    )
                )
            ));

            if ($projects->have_posts()) :
                while ($projects->have_posts()) : $projects->the_post();
                    $location = get_post_meta(get_the_ID(), '_project_location', true);
                    $size = get_post_meta(get_the_ID(), '_project_size', true);
                    ?>
                    <a href="<?php the_permalink(); ?>" class="portfolio-item reveal">
                        <div class="portfolio-image">
                            <?php
                            if (has_post_thumbnail()) {
                                the_post_thumbnail('timber-homes-portfolio');
                            } else {
                                ?>
                                <img src="<?php echo get_template_directory_uri(); ?>/images/placeholder-project.jpg" alt="<?php the_title_attribute(); ?>">
                                <?php
                            }
                            ?>
                        </div>
                        <div class="portfolio-overlay">
                            <h3 class="portfolio-title"><?php the_title(); ?></h3>
                        </div>
                    </a>
                    <?php
                endwhile;
                wp_reset_postdata();
            endif;
            ?>
        </div>
    </div>
</section>

<!-- Why Choose Us Section -->
<section class="why-us-section section" id="about">
    <div class="container">
        <div class="section-title">
            <p class="section-subtitle"><?php esc_html_e('Why Choose Us', 'timber-homes'); ?></p>
            <h2><?php esc_html_e('Building Excellence Since 1995', 'timber-homes'); ?></h2>
            <p><?php esc_html_e('Trusted by hundreds of families across America', 'timber-homes'); ?></p>
        </div>

        <div class="why-us-grid">
            <?php
            $reasons = array(
                array(
                    'number' => '25+',
                    'title'  => __('Years of Experience', 'timber-homes'),
                    'desc'   => __('Over two decades of expertise in timber home construction, delivering exceptional quality and craftsmanship.', 'timber-homes'),
                ),
                array(
                    'number' => '500+',
                    'title'  => __('Homes Built', 'timber-homes'),
                    'desc'   => __('Successfully completed over 500 custom timber homes, each one a testament to our commitment to excellence.', 'timber-homes'),
                ),
                array(
                    'number' => '100%',
                    'title'  => __('Satisfaction Rate', 'timber-homes'),
                    'desc'   => __('Every client is a satisfied client. We don\'t rest until your dream home exceeds your expectations.', 'timber-homes'),
                ),
                array(
                    'number' => 'A+',
                    'title'  => __('BBB Rating', 'timber-homes'),
                    'desc'   => __('Accredited with the Better Business Bureau with an A+ rating, reflecting our integrity and customer service.', 'timber-homes'),
                ),
            );

            foreach ($reasons as $reason) {
                ?>
                <div class="why-us-item reveal">
                    <div class="why-us-number"><?php echo esc_html($reason['number']); ?></div>
                    <h3><?php echo esc_html($reason['title']); ?></h3>
                    <p><?php echo esc_html($reason['desc']); ?></p>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
</section>

<!-- Testimonials Section -->
<section class="testimonials-section section" id="testimonials">
    <div class="container">
        <div class="section-title">
            <p class="section-subtitle"><?php esc_html_e('Client Reviews', 'timber-homes'); ?></p>
            <h2><?php esc_html_e('What Our Clients Say', 'timber-homes'); ?></h2>
            <p><?php esc_html_e('Real stories from real homeowners', 'timber-homes'); ?></p>
        </div>

        <div class="testimonials-container">
            <?php
            $testimonials = array(
                array(
                    'content' => __('Working with Timber Homes was an absolute dream. From the initial design consultation to the final walkthrough, their team was professional, responsive, and incredibly skilled. Our mountain retreat is everything we hoped for and more. The craftsmanship is outstanding!', 'timber-homes'),
                    'name'    => 'Sarah & John Mitchell',
                    'location' => 'Colorado Springs, CO',
                ),
                array(
                    'content' => __('We\'ve lived in our timber home for three years now, and it still takes our breath away every single day. The quality of materials and attention to detail is exceptional. Timber Homes delivered on every promise and stayed within our budget. Highly recommended!', 'timber-homes'),
                    'name'    => 'David & Emily Thompson',
                    'location' => 'Bozeman, MT',
                ),
                array(
                    'content' => __('As a retired architect, I had very specific requirements for our retirement home. The team at Timber Homes not only met but exceeded my expectations. Their expertise in timber construction is unmatched, and their commitment to sustainability impressed us greatly.', 'timber-homes'),
                    'name'    => 'Robert & Linda Anderson',
                    'location' => 'Jackson Hole, WY',
                ),
            );

            foreach ($testimonials as $testimonial) {
                ?>
                <div class="testimonial-card reveal">
                    <div class="testimonial-content">
                        <?php echo esc_html($testimonial['content']); ?>
                    </div>
                    <div class="testimonial-author">
                        <div class="testimonial-avatar">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/avatar-placeholder.jpg" alt="<?php echo esc_attr($testimonial['name']); ?>">
                        </div>
                        <div class="testimonial-info">
                            <h4><?php echo esc_html($testimonial['name']); ?></h4>
                            <p><?php echo esc_html($testimonial['location']); ?></p>
                            <div class="testimonial-rating">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
</section>

<!-- Contact Section -->
<section class="contact-section section" id="contact">
    <div class="container">
        <div class="section-title">
            <p class="section-subtitle"><?php esc_html_e('Get In Touch', 'timber-homes'); ?></p>
            <h2><?php esc_html_e('Start Your Timber Home Journey', 'timber-homes'); ?></h2>
            <p><?php esc_html_e('Let\'s discuss your dream home project', 'timber-homes'); ?></p>
        </div>

        <div class="contact-grid">
            <!-- Contact Information -->
            <div class="contact-info">
                <h3><?php esc_html_e('Contact Information', 'timber-homes'); ?></h3>
                
                <?php
                $address = get_theme_mod('timber_homes_address', '123 Main Street, Denver, CO 80202');
                $phone = get_theme_mod('timber_homes_phone', '+1 (555) 123-4567');
                $email = get_theme_mod('timber_homes_email', 'info@timberhomes.com');
                $whatsapp = get_theme_mod('timber_homes_whatsapp', '15551234567');
                ?>

                <div class="contact-item">
                    <div class="contact-icon">
                        <i class="fas fa-map-marker-alt"></i>
                    </div>
                    <div class="contact-details">
                        <h4><?php esc_html_e('Our Office', 'timber-homes'); ?></h4>
                        <p><?php echo nl2br(esc_html($address)); ?></p>
                    </div>
                </div>

                <div class="contact-item">
                    <div class="contact-icon">
                        <i class="fas fa-phone"></i>
                    </div>
                    <div class="contact-details">
                        <h4><?php esc_html_e('Phone', 'timber-homes'); ?></h4>
                        <p><?php echo esc_html($phone); ?><br><?php esc_html_e('Mon-Fri: 8am - 6pm MST', 'timber-homes'); ?></p>
                    </div>
                </div>

                <div class="contact-item">
                    <div class="contact-icon">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <div class="contact-details">
                        <h4><?php esc_html_e('Email', 'timber-homes'); ?></h4>
                        <p><a href="mailto:<?php echo esc_attr($email); ?>"><?php echo esc_html($email); ?></a></p>
                    </div>
                </div>

                <div class="quick-contact-buttons">
                    <a href="https://wa.me/<?php echo esc_attr($whatsapp); ?>" class="btn btn-whatsapp" target="_blank" rel="noopener noreferrer">
                        <i class="fab fa-whatsapp"></i> <?php esc_html_e('WhatsApp Us', 'timber-homes'); ?>
                    </a>
                    <a href="tel:<?php echo esc_attr(str_replace(array(' ', '(', ')', '-'), '', $phone)); ?>" class="btn btn-call">
                        <i class="fas fa-phone-alt"></i> <?php esc_html_e('Call Now', 'timber-homes'); ?>
                    </a>
                </div>
            </div>

            <!-- Contact Form -->
            <div class="contact-form">
                <form id="contactForm" action="#" method="POST">
                    <div class="form-group">
                        <label for="name"><?php esc_html_e('Full Name', 'timber-homes'); ?> *</label>
                        <input type="text" id="name" name="name" required>
                    </div>

                    <div class="form-group">
                        <label for="email"><?php esc_html_e('Email Address', 'timber-homes'); ?> *</label>
                        <input type="email" id="email" name="email" required>
                    </div>

                    <div class="form-group">
                        <label for="phone"><?php esc_html_e('Phone Number', 'timber-homes'); ?></label>
                        <input type="tel" id="phone" name="phone">
                    </div>

                    <div class="form-group">
                        <label for="service"><?php esc_html_e('Service Interested In', 'timber-homes'); ?></label>
                        <select id="service" name="service">
                            <option value=""><?php esc_html_e('Select a service', 'timber-homes'); ?></option>
                            <option value="custom-design"><?php esc_html_e('Custom Home Design', 'timber-homes'); ?></option>
                            <option value="full-construction"><?php esc_html_e('Full Construction', 'timber-homes'); ?></option>
                            <option value="renovation"><?php esc_html_e('Renovation & Restoration', 'timber-homes'); ?></option>
                            <option value="consultation"><?php esc_html_e('Free Consultation', 'timber-homes'); ?></option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="message"><?php esc_html_e('Your Message', 'timber-homes'); ?> *</label>
                        <textarea id="message" name="message" required></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary"><?php esc_html_e('Send Message', 'timber-homes'); ?></button>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- Instagram Feed Section -->
<section class="instagram-section section">
    <div class="container">
        <div class="section-title">
            <p class="section-subtitle"><?php esc_html_e('FOLLOW US', 'new-horizon'); ?></p>
            <h2><?php esc_html_e('Instagram', 'new-horizon'); ?></h2>
            <p><?php esc_html_e('See our latest projects and behind-the-scenes', 'new-horizon'); ?></p>
        </div>
        
        <div class="instagram-feed-wrapper">
            <?php 
            // Display Instagram feed using Smash Balloon Instagram Feed plugin
            // Using feed ID 2 (devaccount70)
            echo do_shortcode('[instagram-feed feed=2 num=6 cols=6 showheader=false showbutton=false showfollow=false]');
            ?>
        </div>
        
        <div class="instagram-cta">
            <?php
            $instagram_url = get_theme_mod('new_horizon_instagram', '#');
            if ($instagram_url && $instagram_url !== '#') :
            ?>
                <a href="<?php echo esc_url($instagram_url); ?>" target="_blank" rel="noopener" class="btn btn-outline">
                    <i class="fab fa-instagram"></i> <?php esc_html_e('Follow on Instagram', 'new-horizon'); ?>
                </a>
            <?php endif; ?>
        </div>
    </div>
</section>

<?php
get_footer();
