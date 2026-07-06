<?php
/**
 * The front page template file
 * This is the homepage template
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
$home_hero_title = get_theme_mod('new_horizon_home_hero_title', 'The Home You\'ve Been Imagining Deserves the Right Team to Build It');
$home_hero_description = get_theme_mod('new_horizon_home_hero_description', 'Every home begins with understanding how you want to live.');
$home_quote_label = get_theme_mod('new_horizon_home_quote_label', 'Request a Quote');
$home_projects_label = get_theme_mod('new_horizon_home_projects_label', 'View Our Projects');
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
            <h1<?php echo new_horizon_inline_edit_attrs('theme_mod', 'new_horizon_home_hero_title', 'textarea'); ?> class="hero-title"><?php echo esc_html($home_hero_title); ?></h1>
            <p<?php echo new_horizon_inline_edit_attrs('theme_mod', 'new_horizon_home_hero_description', 'textarea'); ?> class="hero-description"><?php echo esc_html($home_hero_description); ?></p>
            <div class="hero-buttons">
                <a href="#contact" class="btn btn-primary"><span<?php echo new_horizon_inline_edit_attrs('theme_mod', 'new_horizon_home_quote_label'); ?>><?php echo esc_html($home_quote_label); ?></span></a>
                <a href="#portfolio" class="btn btn-outline"><span<?php echo new_horizon_inline_edit_attrs('theme_mod', 'new_horizon_home_projects_label'); ?>><?php echo esc_html($home_projects_label); ?></span></a>
            </div>
            <?php $price_anchor = get_theme_mod('new_horizon_price_anchor', 'Custom residences from the $900s'); if ($price_anchor) : ?>
            <p<?php echo new_horizon_inline_edit_attrs('theme_mod', 'new_horizon_price_anchor'); ?> class="hero-price-anchor"><?php echo esc_html($price_anchor); ?></p>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- Credibility Bar -->
<section class="credibility-bar">
    <div class="container">
        <div class="credibility-stats">
            <?php
            $stat1_num   = get_theme_mod('new_horizon_stat1_number', '50+');
            $stat1_label = get_theme_mod('new_horizon_stat1_label', 'Homes Completed');
            $stat2_num   = get_theme_mod('new_horizon_stat2_number', '10+');
            $stat2_label = get_theme_mod('new_horizon_stat2_label', 'Years in Business');
            $stat3_label = get_theme_mod('new_horizon_stat3_label', 'Georgia & Southeast');
            $stat4_label = get_theme_mod('new_horizon_stat4_label', 'Licensed & Insured');
            ?>
            <div class="credibility-item">
                <span<?php echo new_horizon_inline_edit_attrs('theme_mod', 'new_horizon_stat1_number'); ?> class="credibility-number"><?php echo esc_html($stat1_num); ?></span>
                <span<?php echo new_horizon_inline_edit_attrs('theme_mod', 'new_horizon_stat1_label'); ?> class="credibility-label"><?php echo esc_html($stat1_label); ?></span>
            </div>
            <div class="credibility-divider"></div>
            <div class="credibility-item">
                <span<?php echo new_horizon_inline_edit_attrs('theme_mod', 'new_horizon_stat2_number'); ?> class="credibility-number"><?php echo esc_html($stat2_num); ?></span>
                <span<?php echo new_horizon_inline_edit_attrs('theme_mod', 'new_horizon_stat2_label'); ?> class="credibility-label"><?php echo esc_html($stat2_label); ?></span>
            </div>
            <div class="credibility-divider"></div>
            <div class="credibility-item">
                <span class="credibility-number"><i class="fas fa-map-marker-alt"></i></span>
                <span<?php echo new_horizon_inline_edit_attrs('theme_mod', 'new_horizon_stat3_label'); ?> class="credibility-label"><?php echo esc_html($stat3_label); ?></span>
            </div>
            <div class="credibility-divider"></div>
            <div class="credibility-item">
                <span class="credibility-number"><i class="fas fa-shield-alt"></i></span>
                <span<?php echo new_horizon_inline_edit_attrs('theme_mod', 'new_horizon_stat4_label'); ?> class="credibility-label"><?php echo esc_html($stat4_label); ?></span>
            </div>
        </div>
    </div>
</section>

<!-- Services Section -->
<section class="services-section section" id="services">
    <div class="container">
        <div class="section-title">
            <p<?php echo new_horizon_inline_edit_attrs('theme_mod', 'new_horizon_home_services_subtitle'); ?> class="section-subtitle"><?php echo esc_html(get_theme_mod('new_horizon_home_services_subtitle', 'Our Process')); ?></p>
            <h2<?php echo new_horizon_inline_edit_attrs('theme_mod', 'new_horizon_home_services_title'); ?>><?php echo esc_html(get_theme_mod('new_horizon_home_services_title', 'Our Construction Services')); ?></h2>
            <p<?php echo new_horizon_inline_edit_attrs('theme_mod', 'new_horizon_home_services_description', 'textarea'); ?>><?php echo esc_html(get_theme_mod('new_horizon_home_services_description', 'Comprehensive home construction solutions from design to completion')); ?></p>
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
                        <h3<?php echo new_horizon_inline_edit_attrs('post_field', 'post_title', 'text', get_the_ID()); ?>><?php the_title(); ?></h3>
                        <?php if ($short_desc) : ?>
                            <p<?php echo new_horizon_inline_edit_attrs('post_meta', '_service_short_description', 'textarea', get_the_ID()); ?>><?php echo esc_html($short_desc); ?></p>
                        <?php else : ?>
                            <p<?php echo new_horizon_inline_edit_attrs('post_field', 'post_content', 'textarea', get_the_ID()); ?>><?php echo esc_html(get_the_excerpt()); ?></p>
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

<!-- Services CTA Section -->
<section class="about-cta-section section">
    <div class="container">
        <div class="cta-content">
            <h2<?php echo new_horizon_inline_edit_attrs('theme_mod', 'new_horizon_home_services_cta_title'); ?>><?php echo esc_html(get_theme_mod('new_horizon_home_services_cta_title', 'Ready to Start Your Project?')); ?></h2>
            <p<?php echo new_horizon_inline_edit_attrs('theme_mod', 'new_horizon_home_services_cta_text', 'textarea'); ?>><?php echo esc_html(get_theme_mod('new_horizon_home_services_cta_text', 'Let\'s turn your vision into reality. Our team is ready to guide you through every step of the construction process.')); ?></p>
            <div class="cta-buttons">
                <a href="#contact" class="btn btn-primary"><span<?php echo new_horizon_inline_edit_attrs('theme_mod', 'new_horizon_home_services_cta_button'); ?>><?php echo esc_html(get_theme_mod('new_horizon_home_services_cta_button', 'Request a Quote')); ?></span></a>
            </div>
        </div>
    </div>
</section>

<!-- Portfolio Section -->
<section class="portfolio-section section" id="portfolio">
    <div class="container">
        <div class="section-title">
            <p<?php echo new_horizon_inline_edit_attrs('theme_mod', 'new_horizon_home_portfolio_subtitle'); ?> class="section-subtitle"><?php echo esc_html(get_theme_mod('new_horizon_home_portfolio_subtitle', 'Our Work')); ?></p>
            <h2<?php echo new_horizon_inline_edit_attrs('theme_mod', 'new_horizon_home_portfolio_title'); ?>><?php echo esc_html(get_theme_mod('new_horizon_home_portfolio_title', 'Featured Projects')); ?></h2>
            <p<?php echo new_horizon_inline_edit_attrs('theme_mod', 'new_horizon_home_portfolio_description', 'textarea'); ?>><?php echo esc_html(get_theme_mod('new_horizon_home_portfolio_description', 'Explore our portfolio of stunning')); ?></p>
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
                            <h3<?php echo new_horizon_inline_edit_attrs('post_field', 'post_title', 'text', get_the_ID()); ?> class="portfolio-title"><?php the_title(); ?></h3>
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

<!-- Testimonials Section -->
<section class="testimonials-section section" id="testimonials">
    <div class="container">
        <div class="section-title">
            <p<?php echo new_horizon_inline_edit_attrs('theme_mod', 'new_horizon_home_testimonials_subtitle'); ?> class="section-subtitle"><?php echo esc_html(get_theme_mod('new_horizon_home_testimonials_subtitle', 'Client Reviews')); ?></p>
            <h2<?php echo new_horizon_inline_edit_attrs('theme_mod', 'new_horizon_home_testimonials_title'); ?>><?php echo esc_html(get_theme_mod('new_horizon_home_testimonials_title', 'What Our Clients Say')); ?></h2>
            <p<?php echo new_horizon_inline_edit_attrs('theme_mod', 'new_horizon_home_testimonials_description', 'textarea'); ?>><?php echo esc_html(get_theme_mod('new_horizon_home_testimonials_description', 'Real stories from real homeowners')); ?></p>
        </div>

        <div class="testimonials-container">
            <?php
            $testimonials = array(
                array(
                    'content_key'  => 'new_horizon_home_testimonial_1_content',
                    'name_key'     => 'new_horizon_home_testimonial_1_name',
                    'location_key' => 'new_horizon_home_testimonial_1_location',
                    'content'      => 'Building our home with New Horizon Developments was one of the best decisions we\'ve made. The entire process was smooth, transparent, and the craftsmanship exceeded every expectation. We couldn\'t be happier with the result.',
                    'name'         => 'Marcus & Danielle T.',
                    'location'     => 'Johns Creek, GA',
                ),
                array(
                    'content_key'  => 'new_horizon_home_testimonial_2_content',
                    'name_key'     => 'new_horizon_home_testimonial_2_name',
                    'location_key' => 'new_horizon_home_testimonial_2_location',
                    'content'      => 'From our first conversation to the final walkthrough, the NHD team was professional, communicative, and genuinely invested in our vision. Our home is everything we dreamed it would be and more.',
                    'name'         => 'James & Priya R.',
                    'location'     => 'Atlanta, GA',
                ),
                array(
                    'content_key'  => 'new_horizon_home_testimonial_3_content',
                    'name_key'     => 'new_horizon_home_testimonial_3_name',
                    'location_key' => 'new_horizon_home_testimonial_3_location',
                    'content'      => 'We\'ve worked with other builders before, but nothing compares to the attention to detail and personal service we received from New Horizon. They treated our home like it was their own.',
                    'name'         => 'Chris & Lauren M.',
                    'location'     => 'Buford, GA',
                ),
            );

            foreach ($testimonials as $testimonial) {
                ?>
                <div class="testimonial-card reveal">
                    <div<?php echo new_horizon_inline_edit_attrs('theme_mod', $testimonial['content_key'], 'textarea'); ?> class="testimonial-content">
                        <?php echo esc_html(get_theme_mod($testimonial['content_key'], $testimonial['content'])); ?>
                    </div>
                    <div class="testimonial-author">
                        <div class="testimonial-avatar">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/avatar-placeholder.jpg" alt="<?php echo esc_attr($testimonial['name']); ?>">
                        </div>
                        <div class="testimonial-info">
                            <h4<?php echo new_horizon_inline_edit_attrs('theme_mod', $testimonial['name_key']); ?>><?php echo esc_html(get_theme_mod($testimonial['name_key'], $testimonial['name'])); ?></h4>
                            <p<?php echo new_horizon_inline_edit_attrs('theme_mod', $testimonial['location_key']); ?>><?php echo esc_html(get_theme_mod($testimonial['location_key'], $testimonial['location'])); ?></p>
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
            <p<?php echo new_horizon_inline_edit_attrs('theme_mod', 'new_horizon_home_contact_subtitle'); ?> class="section-subtitle"><?php echo esc_html(get_theme_mod('new_horizon_home_contact_subtitle', 'Get In Touch')); ?></p>
            <h2<?php echo new_horizon_inline_edit_attrs('theme_mod', 'new_horizon_home_contact_title'); ?>><?php echo esc_html(get_theme_mod('new_horizon_home_contact_title', 'Let\'s Talk About Your Vision')); ?></h2>
            <p<?php echo new_horizon_inline_edit_attrs('theme_mod', 'new_horizon_home_contact_description', 'textarea'); ?>><?php echo esc_html(get_theme_mod('new_horizon_home_contact_description', 'Tell us about your project - we\'ll follow up within 24 hours.')); ?></p>
        </div>

        <div class="contact-grid">
            <!-- Contact Information -->
            <div class="contact-info">
                <h3<?php echo new_horizon_inline_edit_attrs('theme_mod', 'new_horizon_home_contact_info_title'); ?>><?php echo esc_html(get_theme_mod('new_horizon_home_contact_info_title', 'Reach Us Directly')); ?></h3>
                
                <?php
                $address = get_theme_mod('timber_homes_address', '134 Industrial Park Dr, Lawrenceville, GA');
                $phone = get_theme_mod('timber_homes_phone', '+1 678-818-9424');
                $email = get_theme_mod('timber_homes_email', 'admin@newhorizondevelopments.us');
                $whatsapp = get_theme_mod('timber_homes_whatsapp', 'Mon–Fri: 8am–6pm EST');
                ?>

                <div class="contact-item">
                    <div class="contact-icon">
                        <i class="fas fa-map-marker-alt"></i>
                    </div>
                    <div class="contact-details">
                        <h4<?php echo new_horizon_inline_edit_attrs('theme_mod', 'new_horizon_home_office_label'); ?>><?php echo esc_html(get_theme_mod('new_horizon_home_office_label', 'Our Office')); ?></h4>
                        <p<?php echo new_horizon_inline_edit_attrs('theme_mod', 'timber_homes_address', 'textarea'); ?>><?php echo nl2br(esc_html($address)); ?></p>
                    </div>
                </div>

                <div class="contact-item">
                    <div class="contact-icon">
                        <i class="fas fa-phone"></i>
                    </div>
                    <div class="contact-details">
                        <h4<?php echo new_horizon_inline_edit_attrs('theme_mod', 'new_horizon_home_phone_label'); ?>><?php echo esc_html(get_theme_mod('new_horizon_home_phone_label', 'Phone')); ?></h4>
                        <p><span<?php echo new_horizon_inline_edit_attrs('theme_mod', 'timber_homes_phone'); ?>><?php echo esc_html($phone); ?></span><br><span<?php echo new_horizon_inline_edit_attrs('theme_mod', 'new_horizon_home_contact_hours'); ?>><?php echo esc_html(get_theme_mod('new_horizon_home_contact_hours', 'Mon-Fri: 8am - 6pm MST')); ?></span></p>
                    </div>
                </div>

                <div class="contact-item">
                    <div class="contact-icon">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <div class="contact-details">
                        <h4<?php echo new_horizon_inline_edit_attrs('theme_mod', 'new_horizon_home_email_label'); ?>><?php echo esc_html(get_theme_mod('new_horizon_home_email_label', 'Email')); ?></h4>
                        <p><a href="mailto:<?php echo esc_attr($email); ?>"><span<?php echo new_horizon_inline_edit_attrs('theme_mod', 'timber_homes_email'); ?>><?php echo esc_html($email); ?></span></a></p>
                    </div>
                </div>

                <div class="quick-contact-buttons">
                    <a href="https://wa.me/<?php echo esc_attr($whatsapp); ?>" class="btn btn-whatsapp" target="_blank" rel="noopener noreferrer">
                        <i class="fab fa-whatsapp"></i> <span<?php echo new_horizon_inline_edit_attrs('theme_mod', 'new_horizon_home_whatsapp_label'); ?>><?php echo esc_html(get_theme_mod('new_horizon_home_whatsapp_label', 'WhatsApp Us')); ?></span>
                    </a>
                    <a href="tel:<?php echo esc_attr(str_replace(array(' ', '(', ')', '-'), '', $phone)); ?>" class="btn btn-call">
                        <i class="fas fa-phone-alt"></i> <span<?php echo new_horizon_inline_edit_attrs('theme_mod', 'new_horizon_home_call_label'); ?>><?php echo esc_html(get_theme_mod('new_horizon_home_call_label', 'Call Now')); ?></span>
                    </a>
                </div>
            </div>

            <!-- Contact Form -->
            <div class="contact-form">
                <div id="form-messages"></div>
                <form id="contactForm" method="POST" data-wp-ajax="true">
                    <?php wp_nonce_field('contact_form_nonce', 'contact_nonce'); ?>
                    <input type="text" name="website" id="contact_website" value="" tabindex="-1" autocomplete="off" aria-hidden="true" style="position:absolute; left:-9999px;">
                    
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
                            <?php
                            $contact_services = new WP_Query(array(
                                'post_type'      => 'service',
                                'posts_per_page' => -1,
                                'orderby'        => 'meta_value_num',
                                'meta_key'       => '_service_order',
                                'order'          => 'ASC',
                            ));

                            if ($contact_services->have_posts()) :
                                while ($contact_services->have_posts()) : $contact_services->the_post();
                                    ?>
                                    <option value="<?php echo esc_attr(get_the_title()); ?>"><?php the_title(); ?></option>
                                    <?php
                                endwhile;
                                wp_reset_postdata();
                            else :
                                ?>
                                <option value="custom-design"><?php esc_html_e('Custom Home Design', 'timber-homes'); ?></option>
                                <option value="full-construction"><?php esc_html_e('Full Construction', 'timber-homes'); ?></option>
                                <option value="renovation"><?php esc_html_e('Renovation & Restoration', 'timber-homes'); ?></option>
                                <option value="consultation"><?php esc_html_e('Free Consultation', 'timber-homes'); ?></option>
                                <?php
                            endif;
                            ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="message"><?php esc_html_e('Your Message', 'timber-homes'); ?> *</label>
                        <textarea id="message" name="message" required></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary" id="submit-btn">
                        <span class="btn-text"><?php esc_html_e('Send Message', 'timber-homes'); ?></span>
                        <span class="btn-loading" style="display: none;">
                            <i class="fas fa-spinner fa-spin"></i> <?php esc_html_e('Sending...', 'timber-homes'); ?>
                        </span>
                    </button>
                </form>
            </div>
            
            <script>
            jQuery(document).ready(function($) {
                $('#contactForm').on('submit', function(e) {
                    e.preventDefault();
                    
                    var $form = $(this);
                    var $submitBtn = $('#submit-btn');
                    var $messages = $('#form-messages');
                    
                    // Disable button and show loading
                    $submitBtn.prop('disabled', true);
                    $submitBtn.find('.btn-text').hide();
                    $submitBtn.find('.btn-loading').show();
                    $messages.html('');
                    
                    // Prepare data
                    var formData = {
                        action: 'submit_contact_form',
                        nonce: $('#contact_nonce').val(),
                        name: $('#name').val(),
                        email: $('#email').val(),
                        phone: $('#phone').val(),
                        service: $('#service').val(),
                        message: $('#message').val(),
                        website: $('#contact_website').val()
                    };
                    
                    // Send AJAX request
                    $.ajax({
                        url: '<?php echo admin_url('admin-ajax.php'); ?>',
                        type: 'POST',
                        data: formData,
                        success: function(response) {
                            if (response.success) {
                                $messages.html('<div class="alert alert-success"><i class="fas fa-check-circle"></i> ' + response.data.message + '</div>');
                                $form[0].reset();
                            } else {
                                $messages.html('<div class="alert alert-error"><i class="fas fa-exclamation-circle"></i> ' + response.data.message + '</div>');
                            }
                        },
                        error: function() {
                            $messages.html('<div class="alert alert-error"><i class="fas fa-exclamation-circle"></i> <?php esc_html_e('An error occurred. Please try again.', 'timber-homes'); ?></div>');
                        },
                        complete: function() {
                            // Re-enable button
                            $submitBtn.prop('disabled', false);
                            $submitBtn.find('.btn-text').show();
                            $submitBtn.find('.btn-loading').hide();
                            
                            // Scroll to message
                            $('html, body').animate({
                                scrollTop: $messages.offset().top - 100
                            }, 500);
                        }
                    });
                });
            });
            </script>
        </div>
    </div>
</section>

<!-- Instagram Feed Section -->
<section class="instagram-section section">
    <div class="container">
        <div class="section-title">
            <p<?php echo new_horizon_inline_edit_attrs('theme_mod', 'new_horizon_home_instagram_subtitle'); ?> class="section-subtitle"><?php echo esc_html(get_theme_mod('new_horizon_home_instagram_subtitle', 'FOLLOW US')); ?></p>
            <h2<?php echo new_horizon_inline_edit_attrs('theme_mod', 'new_horizon_home_instagram_title'); ?>><?php echo esc_html(get_theme_mod('new_horizon_home_instagram_title', 'Instagram')); ?></h2>
            <p<?php echo new_horizon_inline_edit_attrs('theme_mod', 'new_horizon_home_instagram_description', 'textarea'); ?>><?php echo esc_html(get_theme_mod('new_horizon_home_instagram_description', 'See our latest projects and behind-the-scenes')); ?></p>
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
                    <i class="fab fa-instagram"></i> <span<?php echo new_horizon_inline_edit_attrs('theme_mod', 'new_horizon_home_instagram_button'); ?>><?php echo esc_html(get_theme_mod('new_horizon_home_instagram_button', 'Follow on Instagram')); ?></span>
                </a>
            <?php endif; ?>
        </div>
    </div>
</section>

<?php
get_footer();
