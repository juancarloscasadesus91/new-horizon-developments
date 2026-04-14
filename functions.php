<?php
/**
 * New Horizon Developments Theme Functions
 * 
 * @package New_Horizon_Developments
 * @since 1.0.0
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Add Front Page Meta Boxes
 */
function new_horizon_frontpage_meta_boxes() {
    global $post;
    if (!$post) return;
    
    // Check if this is the front page (either static page or posts page)
    $front_page_id = get_option('page_on_front');
    $show_on_front = get_option('show_on_front');
    
    // Show on static front page OR if no front page is set (using front-page.php)
    if ($show_on_front === 'page' && $post->ID != $front_page_id) {
        return;
    }
    
    // If show_on_front is 'posts', we need to create a settings page instead
    // For now, let's show it on any page with slug 'home' or if it's the front page
    if ($show_on_front !== 'page' && $post->post_name !== 'home') {
        return;
    }
    
    add_meta_box(
        'why_choose_us_section',
        __('Why Choose Us Section', 'new-horizon'),
        'new_horizon_why_choose_us_callback',
        'page',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'new_horizon_frontpage_meta_boxes');

/**
 * Why Choose Us Callback
 */
function new_horizon_why_choose_us_callback($post) {
    wp_nonce_field('why_choose_us_nonce', 'why_choose_us_nonce');
    
    $why_subtitle = get_post_meta($post->ID, '_why_subtitle', true);
    $why_title = get_post_meta($post->ID, '_why_title', true);
    $why_description = get_post_meta($post->ID, '_why_description', true);
    $why_items = get_post_meta($post->ID, '_why_items', true);
    
    if (!is_array($why_items) || empty($why_items)) {
        $why_items = array(
            array('number' => '25+', 'title' => 'Years of Experience', 'description' => 'Over two decades of expertise in timber home construction, delivering exceptional quality and craftsmanship.'),
            array('number' => '500+', 'title' => 'Homes Built', 'description' => 'Successfully completed over 500 custom timber homes, each one a testament to our commitment to excellence.'),
            array('number' => '100%', 'title' => 'Satisfaction Rate', 'description' => 'Every client is a satisfied client. We don\'t rest until your dream home exceeds your expectations.'),
            array('number' => 'A+', 'title' => 'BBB Rating', 'description' => 'Accredited with the Better Business Bureau with an A+ rating, reflecting our integrity and customer service.'),
        );
    }
    ?>
    <p>
        <label><strong><?php _e('Section Subtitle:', 'new-horizon'); ?></strong></label><br>
        <input type="text" name="why_subtitle" value="<?php echo esc_attr($why_subtitle ?: 'Why Choose Us'); ?>" style="width: 100%;" placeholder="Why Choose Us">
    </p>
    <p>
        <label><strong><?php _e('Section Title:', 'new-horizon'); ?></strong></label><br>
        <input type="text" name="why_title" value="<?php echo esc_attr($why_title ?: 'Building Excellence Since 1995'); ?>" style="width: 100%;" placeholder="Building Excellence Since 1995">
    </p>
    <p>
        <label><strong><?php _e('Section Description:', 'new-horizon'); ?></strong></label><br>
        <input type="text" name="why_description" value="<?php echo esc_attr($why_description ?: 'Trusted by hundreds of families across America'); ?>" style="width: 100%;" placeholder="Trusted by hundreds of families across America">
    </p>
    
    <h4><?php _e('Why Choose Us Items (4 items):', 'new-horizon'); ?></h4>
    <?php for ($i = 0; $i < 4; $i++) : 
        $item = isset($why_items[$i]) ? $why_items[$i] : array('number' => '', 'title' => '', 'description' => '');
    ?>
    <div style="background: #f9f9f9; padding: 15px; margin-bottom: 15px; border-left: 4px solid #2271b1;">
        <h4><?php echo sprintf(__('Item %d', 'new-horizon'), $i + 1); ?></h4>
        <p>
            <label><strong><?php _e('Number/Stat:', 'new-horizon'); ?></strong></label><br>
            <input type="text" name="why_items[<?php echo $i; ?>][number]" value="<?php echo esc_attr($item['number']); ?>" style="width: 100%;" placeholder="25+">
            <em><?php _e('e.g., "25+", "500+", "100%", "A+"', 'new-horizon'); ?></em>
        </p>
        <p>
            <label><strong><?php _e('Title:', 'new-horizon'); ?></strong></label><br>
            <input type="text" name="why_items[<?php echo $i; ?>][title]" value="<?php echo esc_attr($item['title']); ?>" style="width: 100%;" placeholder="Years of Experience">
        </p>
        <p>
            <label><strong><?php _e('Description:', 'new-horizon'); ?></strong></label><br>
            <textarea name="why_items[<?php echo $i; ?>][description]" rows="3" style="width: 100%;"><?php echo esc_textarea($item['description']); ?></textarea>
        </p>
    </div>
    <?php endfor; ?>
    <?php
}

/**
 * Save Front Page Meta Boxes
 */
function new_horizon_save_frontpage_meta($post_id) {
    if (!isset($_POST['why_choose_us_nonce']) || !wp_verify_nonce($_POST['why_choose_us_nonce'], 'why_choose_us_nonce')) {
        return;
    }
    
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }
    
    // Save Why Choose Us fields
    if (isset($_POST['why_subtitle'])) {
        update_post_meta($post_id, '_why_subtitle', sanitize_text_field($_POST['why_subtitle']));
    }
    
    if (isset($_POST['why_title'])) {
        update_post_meta($post_id, '_why_title', sanitize_text_field($_POST['why_title']));
    }
    
    if (isset($_POST['why_description'])) {
        update_post_meta($post_id, '_why_description', sanitize_text_field($_POST['why_description']));
    }
    
    if (isset($_POST['why_items']) && is_array($_POST['why_items'])) {
        $items = array();
        foreach ($_POST['why_items'] as $item) {
            $items[] = array(
                'number' => sanitize_text_field($item['number']),
                'title' => sanitize_text_field($item['title']),
                'description' => sanitize_textarea_field($item['description']),
            );
        }
        update_post_meta($post_id, '_why_items', $items);
    }
}
add_action('save_post_page', 'new_horizon_save_frontpage_meta');

/**
 * Add About Us Page Meta Boxes
 */
function new_horizon_about_meta_boxes() {
    // Only show on pages using the About Us template
    global $post;
    if (!$post) return;
    
    $template = get_post_meta($post->ID, '_wp_page_template', true);
    if ($template !== 'page-about.php') return;
    
    add_meta_box(
        'about_intro_section',
        __('About Intro Section', 'new-horizon'),
        'new_horizon_about_intro_callback',
        'page',
        'normal',
        'high'
    );
    
    add_meta_box(
        'about_differences_section',
        __('What Sets Us Apart Section', 'new-horizon'),
        'new_horizon_about_differences_callback',
        'page',
        'normal',
        'high'
    );
    
    add_meta_box(
        'about_values_section',
        __('Our Commitment Section', 'new-horizon'),
        'new_horizon_about_values_callback',
        'page',
        'normal',
        'high'
    );
    
    add_meta_box(
        'about_clients_section',
        __('Who We Build For Section', 'new-horizon'),
        'new_horizon_about_clients_callback',
        'page',
        'normal',
        'high'
    );
    
    add_meta_box(
        'about_capabilities_section',
        __('What We Handle Section', 'new-horizon'),
        'new_horizon_about_capabilities_callback',
        'page',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'new_horizon_about_meta_boxes');

/**
 * Add Project Gallery Meta Box
 */
function new_horizon_project_gallery_meta_box() {
    add_meta_box(
        'project_gallery',
        __('Project Gallery', 'new-horizon'),
        'new_horizon_project_gallery_callback',
        'project',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'new_horizon_project_gallery_meta_box');

/**
 * Project Gallery Callback
 */
function new_horizon_project_gallery_callback($post) {
    wp_nonce_field('project_gallery_nonce', 'project_gallery_nonce');
    
    $gallery_images = get_post_meta($post->ID, '_project_gallery', true);
    ?>
    <div class="project-gallery-container">
        <p><strong><?php _e('Add images to the project gallery:', 'new-horizon'); ?></strong></p>
        
        <div id="project-gallery-images" class="project-gallery-images">
            <?php
            if ($gallery_images && is_array($gallery_images)) {
                foreach ($gallery_images as $image_id) {
                    $image_url = wp_get_attachment_image_url($image_id, 'thumbnail');
                    if ($image_url) {
                        ?>
                        <div class="gallery-image-item" data-id="<?php echo esc_attr($image_id); ?>">
                            <img src="<?php echo esc_url($image_url); ?>" alt="">
                            <button type="button" class="remove-gallery-image">&times;</button>
                        </div>
                        <?php
                    }
                }
            }
            ?>
        </div>
        
        <input type="hidden" id="project_gallery_ids" name="project_gallery_ids" value="<?php echo esc_attr(implode(',', $gallery_images ?: array())); ?>">
        
        <p>
            <button type="button" class="button button-primary" id="add-gallery-images">
                <i class="dashicons dashicons-images-alt2"></i> <?php _e('Add Images to Gallery', 'new-horizon'); ?>
            </button>
        </p>
        
        <p class="description"><?php _e('Click to add multiple images. You can drag to reorder them.', 'new-horizon'); ?></p>
    </div>
    
    <style>
        .project-gallery-images {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(120px, 1fr));
            gap: 10px;
            margin: 15px 0;
            padding: 15px;
            background: #f9f9f9;
            border: 1px solid #ddd;
            min-height: 100px;
        }
        
        .gallery-image-item {
            position: relative;
            cursor: move;
            border: 2px solid #ddd;
            background: #fff;
        }
        
        .gallery-image-item img {
            width: 100%;
            height: 120px;
            object-fit: cover;
            display: block;
        }
        
        .gallery-image-item .remove-gallery-image {
            position: absolute;
            top: 5px;
            right: 5px;
            background: #dc3232;
            color: #fff;
            border: none;
            border-radius: 50%;
            width: 24px;
            height: 24px;
            cursor: pointer;
            font-size: 18px;
            line-height: 1;
            padding: 0;
        }
        
        .gallery-image-item .remove-gallery-image:hover {
            background: #a00;
        }
    </style>
    
    <script>
    jQuery(document).ready(function($) {
        var galleryFrame;
        
        // Add images
        $('#add-gallery-images').on('click', function(e) {
            e.preventDefault();
            
            if (galleryFrame) {
                galleryFrame.open();
                return;
            }
            
            galleryFrame = wp.media({
                title: '<?php _e('Select Gallery Images', 'new-horizon'); ?>',
                button: {
                    text: '<?php _e('Add to Gallery', 'new-horizon'); ?>'
                },
                multiple: true
            });
            
            galleryFrame.on('select', function() {
                var selection = galleryFrame.state().get('selection');
                var currentIds = $('#project_gallery_ids').val().split(',').filter(Boolean);
                
                selection.map(function(attachment) {
                    attachment = attachment.toJSON();
                    if (currentIds.indexOf(attachment.id.toString()) === -1) {
                        currentIds.push(attachment.id);
                        
                        var imageHtml = '<div class="gallery-image-item" data-id="' + attachment.id + '">' +
                            '<img src="' + attachment.sizes.thumbnail.url + '" alt="">' +
                            '<button type="button" class="remove-gallery-image">&times;</button>' +
                            '</div>';
                        
                        $('#project-gallery-images').append(imageHtml);
                    }
                });
                
                $('#project_gallery_ids').val(currentIds.join(','));
            });
            
            galleryFrame.open();
        });
        
        // Remove image
        $(document).on('click', '.remove-gallery-image', function() {
            var item = $(this).closest('.gallery-image-item');
            var imageId = item.data('id');
            
            item.remove();
            
            var currentIds = $('#project_gallery_ids').val().split(',').filter(Boolean);
            currentIds = currentIds.filter(function(id) {
                return id != imageId;
            });
            
            $('#project_gallery_ids').val(currentIds.join(','));
        });
        
        // Make sortable
        $('#project-gallery-images').sortable({
            update: function() {
                var ids = [];
                $('.gallery-image-item').each(function() {
                    ids.push($(this).data('id'));
                });
                $('#project_gallery_ids').val(ids.join(','));
            }
        });
    });
    </script>
    <?php
}

/**
 * Save Project Gallery
 */
function new_horizon_save_project_gallery($post_id) {
    if (!isset($_POST['project_gallery_nonce']) || !wp_verify_nonce($_POST['project_gallery_nonce'], 'project_gallery_nonce')) {
        return;
    }
    
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }
    
    if (isset($_POST['project_gallery_ids'])) {
        $gallery_ids = array_filter(array_map('intval', explode(',', $_POST['project_gallery_ids'])));
        update_post_meta($post_id, '_project_gallery', $gallery_ids);
    } else {
        delete_post_meta($post_id, '_project_gallery');
    }
}
add_action('save_post_project', 'new_horizon_save_project_gallery');

/**
 * Set JPEG compression quality
 */
add_filter('jpeg_quality', function() {
    return 85; // 85% quality (good balance)
});

add_filter('wp_editor_set_quality', function() {
    return 85;
});

/**
 * Set max image dimensions
 */
function new_horizon_resize_large_images($file) {
    $max_width = 2000;
    $max_height = 2000;
    
    $image = wp_get_image_editor($file);
    
    if (!is_wp_error($image)) {
        $size = $image->get_size();
        
        if ($size['width'] > $max_width || $size['height'] > $max_height) {
            $image->resize($max_width, $max_height, false);
            $image->save($file);
        }
    }
    
    return $file;
}
add_filter('wp_handle_upload_prefilter', 'new_horizon_resize_large_images');

/**
 * Handle Contact Form Submission
 */
function new_horizon_handle_contact_form() {
    // Verify nonce
    if (!isset($_POST['nonce']) || !wp_verify_nonce($_POST['nonce'], 'contact_form_nonce')) {
        wp_send_json_error(array('message' => __('Security check failed. Please refresh and try again.', 'new-horizon')));
    }
    
    // Sanitize inputs
    $name = sanitize_text_field($_POST['name']);
    $email = sanitize_email($_POST['email']);
    $phone = sanitize_text_field($_POST['phone']);
    $service = sanitize_text_field($_POST['service']);
    $message = sanitize_textarea_field($_POST['message']);
    
    // Validate required fields
    if (empty($name) || empty($email) || empty($message)) {
        wp_send_json_error(array('message' => __('Please fill in all required fields.', 'new-horizon')));
    }
    
    if (!is_email($email)) {
        wp_send_json_error(array('message' => __('Please enter a valid email address.', 'new-horizon')));
    }
    
    // Get admin email
    $admin_email = get_option('admin_email');
    $site_name = get_bloginfo('name');
    
    // Email subject
    $subject = sprintf(__('[%s] New Contact Form Submission from %s', 'new-horizon'), $site_name, $name);
    
    // Email body
    $body = sprintf(
        __("You have received a new contact form submission:\n\n", 'new-horizon') .
        __("Name: %s\n", 'new-horizon') .
        __("Email: %s\n", 'new-horizon') .
        __("Phone: %s\n", 'new-horizon') .
        __("Service: %s\n\n", 'new-horizon') .
        __("Message:\n%s\n\n", 'new-horizon') .
        __("---\n", 'new-horizon') .
        __("This email was sent from the contact form on %s", 'new-horizon'),
        $name,
        $email,
        $phone ?: __('Not provided', 'new-horizon'),
        $service ?: __('Not specified', 'new-horizon'),
        $message,
        $site_name
    );
    
    // Email headers
    $headers = array(
        'Content-Type: text/plain; charset=UTF-8',
        'From: ' . $site_name . ' <' . $admin_email . '>',
        'Reply-To: ' . $name . ' <' . $email . '>'
    );
    
    // Send email
    $sent = wp_mail($admin_email, $subject, $body, $headers);
    
    if ($sent) {
        // Save to database (optional)
        global $wpdb;
        $table_name = $wpdb->prefix . 'contact_submissions';
        
        $wpdb->insert(
            $table_name,
            array(
                'name' => $name,
                'email' => $email,
                'phone' => $phone,
                'service' => $service,
                'message' => $message,
                'submitted_at' => current_time('mysql'),
                'ip_address' => $_SERVER['REMOTE_ADDR']
            ),
            array('%s', '%s', '%s', '%s', '%s', '%s', '%s')
        );
        
        wp_send_json_success(array(
            'message' => __('Thank you for your message! We will get back to you soon.', 'new-horizon')
        ));
    } else {
        wp_send_json_error(array(
            'message' => __('Sorry, there was an error sending your message. Please try again or contact us directly.', 'new-horizon')
        ));
    }
}
add_action('wp_ajax_submit_contact_form', 'new_horizon_handle_contact_form');
add_action('wp_ajax_nopriv_submit_contact_form', 'new_horizon_handle_contact_form');

/**
 * Create contact submissions table
 */
function new_horizon_create_contact_table() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'contact_submissions';
    $charset_collate = $wpdb->get_charset_collate();
    
    $sql = "CREATE TABLE IF NOT EXISTS $table_name (
        id bigint(20) NOT NULL AUTO_INCREMENT,
        name varchar(255) NOT NULL,
        email varchar(255) NOT NULL,
        phone varchar(50),
        service varchar(100),
        message text NOT NULL,
        submitted_at datetime NOT NULL,
        ip_address varchar(100),
        PRIMARY KEY  (id)
    ) $charset_collate;";
    
    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
}
register_activation_hook(__FILE__, 'new_horizon_create_contact_table');
// Run on theme activation
add_action('after_switch_theme', 'new_horizon_create_contact_table');

/**
 * Footer Customizer Settings
 */
function new_horizon_footer_customizer($wp_customize) {
    
    // Footer Section
    $wp_customize->add_section('footer_settings', array(
        'title'    => __('Footer Settings', 'new-horizon'),
        'priority' => 120,
    ));
    
    // About Section
    $wp_customize->add_setting('footer_about_title', array(
        'default'           => get_bloginfo('name'),
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('footer_about_title', array(
        'label'    => __('About Section Title', 'new-horizon'),
        'section'  => 'footer_settings',
        'type'     => 'text',
    ));
    
    $wp_customize->add_setting('footer_about_text', array(
        'default'           => 'Building premium American-style timber homes since 1995. We combine traditional craftsmanship with modern techniques to create sustainable, beautiful homes that last for generations.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    
    $wp_customize->add_control('footer_about_text', array(
        'label'    => __('About Section Text', 'new-horizon'),
        'section'  => 'footer_settings',
        'type'     => 'textarea',
    ));
    
    // Social Media Links
    $social_networks = array(
        'facebook'  => 'Facebook URL',
        'instagram' => 'Instagram URL',
        'pinterest' => 'Pinterest URL',
        'linkedin'  => 'LinkedIn URL',
        'twitter'   => 'Twitter URL',
        'youtube'   => 'YouTube URL',
    );
    
    foreach ($social_networks as $network => $label) {
        $wp_customize->add_setting("footer_social_$network", array(
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw',
        ));
        
        $wp_customize->add_control("footer_social_$network", array(
            'label'    => __($label, 'new-horizon'),
            'section'  => 'footer_settings',
            'type'     => 'url',
        ));
    }
    
    // Contact Information
    $wp_customize->add_setting('footer_address', array(
        'default'           => '123 Main Street, Denver, CO 80202',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('footer_address', array(
        'label'    => __('Address', 'new-horizon'),
        'section'  => 'footer_settings',
        'type'     => 'text',
    ));
    
    $wp_customize->add_setting('footer_phone', array(
        'default'           => '+1 (555) 123-4567',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('footer_phone', array(
        'label'    => __('Phone Number', 'new-horizon'),
        'section'  => 'footer_settings',
        'type'     => 'text',
    ));
    
    $wp_customize->add_setting('footer_email', array(
        'default'           => 'info@newhorizon.com',
        'sanitize_callback' => 'sanitize_email',
    ));
    
    $wp_customize->add_control('footer_email', array(
        'label'    => __('Email Address', 'new-horizon'),
        'section'  => 'footer_settings',
        'type'     => 'email',
    ));
    
    $wp_customize->add_setting('footer_hours', array(
        'default'           => 'Mon-Fri: 8am - 6pm MST',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('footer_hours', array(
        'label'    => __('Business Hours', 'new-horizon'),
        'section'  => 'footer_settings',
        'type'     => 'text',
    ));
    
    // WhatsApp
    $wp_customize->add_setting('footer_whatsapp', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('footer_whatsapp', array(
        'label'       => __('WhatsApp Number', 'new-horizon'),
        'description' => __('Format: 15551234567 (country code + number, no spaces)', 'new-horizon'),
        'section'     => 'footer_settings',
        'type'        => 'text',
    ));
    
    // Copyright Text
    $wp_customize->add_setting('footer_copyright', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('footer_copyright', array(
        'label'       => __('Custom Copyright Text', 'new-horizon'),
        'description' => __('Leave empty to use default. Use {year} for current year.', 'new-horizon'),
        'section'     => 'footer_settings',
        'type'        => 'text',
    ));
}
add_action('customize_register', 'new_horizon_footer_customizer');

/**
 * About Intro Section Callback
 */
function new_horizon_about_intro_callback($post) {
    wp_nonce_field('about_sections_nonce', 'about_sections_nonce');
    
    $intro_title = get_post_meta($post->ID, '_about_intro_title', true);
    $intro_text_1 = get_post_meta($post->ID, '_about_intro_text_1', true);
    $intro_text_2 = get_post_meta($post->ID, '_about_intro_text_2', true);
    $intro_text_3 = get_post_meta($post->ID, '_about_intro_text_3', true);
    $intro_image = get_post_meta($post->ID, '_about_intro_image', true);
    ?>
    <p>
        <label><strong><?php _e('Section Title:', 'new-horizon'); ?></strong></label><br>
        <input type="text" name="about_intro_title" value="<?php echo esc_attr($intro_title); ?>" style="width: 100%;" placeholder="Building Homes That Reflect How You Want to Live">
    </p>
    <p>
        <label><strong><?php _e('Paragraph 1:', 'new-horizon'); ?></strong></label><br>
        <textarea name="about_intro_text_1" rows="3" style="width: 100%;"><?php echo esc_textarea($intro_text_1); ?></textarea>
    </p>
    <p>
        <label><strong><?php _e('Paragraph 2:', 'new-horizon'); ?></strong></label><br>
        <textarea name="about_intro_text_2" rows="3" style="width: 100%;"><?php echo esc_textarea($intro_text_2); ?></textarea>
    </p>
    <p>
        <label><strong><?php _e('Paragraph 3:', 'new-horizon'); ?></strong></label><br>
        <textarea name="about_intro_text_3" rows="3" style="width: 100%;"><?php echo esc_textarea($intro_text_3); ?></textarea>
    </p>
    <p>
        <label><strong><?php _e('Image URL:', 'new-horizon'); ?></strong></label><br>
        <input type="text" name="about_intro_image" id="about_intro_image" value="<?php echo esc_url($intro_image); ?>" style="width: 80%;">
        <button type="button" class="button upload-image-button"><?php _e('Upload Image', 'new-horizon'); ?></button>
        <em><?php _e('Or upload from Media Library', 'new-horizon'); ?></em>
    </p>
    <?php
}

/**
 * What Sets Us Apart Callback
 */
function new_horizon_about_differences_callback($post) {
    $diff_title = get_post_meta($post->ID, '_about_diff_title', true);
    $diff_subtitle = get_post_meta($post->ID, '_about_diff_subtitle', true);
    $differences = get_post_meta($post->ID, '_about_differences', true);
    
    if (!is_array($differences) || empty($differences)) {
        $differences = array(
            array('icon' => 'fas fa-compass', 'title' => '', 'description' => ''),
            array('icon' => 'fas fa-pencil-ruler', 'title' => '', 'description' => ''),
            array('icon' => 'fas fa-handshake', 'title' => '', 'description' => ''),
            array('icon' => 'fas fa-hard-hat', 'title' => '', 'description' => ''),
            array('icon' => 'fas fa-comments', 'title' => '', 'description' => ''),
            array('icon' => 'fas fa-home', 'title' => '', 'description' => ''),
        );
    }
    ?>
    <p>
        <label><strong><?php _e('Section Title:', 'new-horizon'); ?></strong></label><br>
        <input type="text" name="about_diff_title" value="<?php echo esc_attr($diff_title); ?>" style="width: 100%;" placeholder="What Sets Us Apart">
    </p>
    <p>
        <label><strong><?php _e('Section Subtitle:', 'new-horizon'); ?></strong></label><br>
        <input type="text" name="about_diff_subtitle" value="<?php echo esc_attr($diff_subtitle); ?>" style="width: 100%;" placeholder="A unified process that brings everything together">
    </p>
    
    <h4><?php _e('Difference Items (6 items):', 'new-horizon'); ?></h4>
    <?php for ($i = 0; $i < 6; $i++) : 
        $item = isset($differences[$i]) ? $differences[$i] : array('icon' => '', 'title' => '', 'description' => '');
    ?>
    <div style="background: #f9f9f9; padding: 15px; margin-bottom: 15px; border-left: 4px solid #2271b1;">
        <h4><?php echo sprintf(__('Item %d', 'new-horizon'), $i + 1); ?></h4>
        <p>
            <label><strong><?php _e('Icon (Font Awesome):', 'new-horizon'); ?></strong></label><br>
            <input type="text" name="about_differences[<?php echo $i; ?>][icon]" value="<?php echo esc_attr($item['icon']); ?>" style="width: 100%;" placeholder="fas fa-compass">
        </p>
        <p>
            <label><strong><?php _e('Title:', 'new-horizon'); ?></strong></label><br>
            <input type="text" name="about_differences[<?php echo $i; ?>][title]" value="<?php echo esc_attr($item['title']); ?>" style="width: 100%;">
        </p>
        <p>
            <label><strong><?php _e('Description:', 'new-horizon'); ?></strong></label><br>
            <textarea name="about_differences[<?php echo $i; ?>][description]" rows="2" style="width: 100%;"><?php echo esc_textarea($item['description']); ?></textarea>
        </p>
    </div>
    <?php endfor; ?>
    <?php
}

/**
 * Our Commitment Callback
 */
function new_horizon_about_values_callback($post) {
    $values_title = get_post_meta($post->ID, '_about_values_title', true);
    $values_lead = get_post_meta($post->ID, '_about_values_lead', true);
    $values = get_post_meta($post->ID, '_about_values', true);
    $values_image = get_post_meta($post->ID, '_about_values_image', true);
    
    if (!is_array($values) || empty($values)) {
        $values = array(
            array('title' => '', 'description' => ''),
            array('title' => '', 'description' => ''),
            array('title' => '', 'description' => ''),
            array('title' => '', 'description' => ''),
        );
    }
    ?>
    <p>
        <label><strong><?php _e('Section Title:', 'new-horizon'); ?></strong></label><br>
        <input type="text" name="about_values_title" value="<?php echo esc_attr($values_title); ?>" style="width: 100%;" placeholder="Our Commitment to You">
    </p>
    <p>
        <label><strong><?php _e('Lead Text:', 'new-horizon'); ?></strong></label><br>
        <textarea name="about_values_lead" rows="2" style="width: 100%;"><?php echo esc_textarea($values_lead); ?></textarea>
    </p>
    
    <h4><?php _e('Values (4 items):', 'new-horizon'); ?></h4>
    <?php for ($i = 0; $i < 4; $i++) : 
        $item = isset($values[$i]) ? $values[$i] : array('title' => '', 'description' => '');
    ?>
    <div style="background: #f9f9f9; padding: 15px; margin-bottom: 15px; border-left: 4px solid #2271b1;">
        <h4><?php echo sprintf(__('Value %d', 'new-horizon'), $i + 1); ?></h4>
        <p>
            <label><strong><?php _e('Title:', 'new-horizon'); ?></strong></label><br>
            <input type="text" name="about_values[<?php echo $i; ?>][title]" value="<?php echo esc_attr($item['title']); ?>" style="width: 100%;">
        </p>
        <p>
            <label><strong><?php _e('Description:', 'new-horizon'); ?></strong></label><br>
            <textarea name="about_values[<?php echo $i; ?>][description]" rows="2" style="width: 100%;"><?php echo esc_textarea($item['description']); ?></textarea>
        </p>
    </div>
    <?php endfor; ?>
    
    <p>
        <label><strong><?php _e('Image URL:', 'new-horizon'); ?></strong></label><br>
        <input type="text" name="about_values_image" id="about_values_image" value="<?php echo esc_url($values_image); ?>" style="width: 80%;">
        <button type="button" class="button upload-image-button"><?php _e('Upload Image', 'new-horizon'); ?></button>
    </p>
    <?php
}

/**
 * Who We Build For Callback
 */
function new_horizon_about_clients_callback($post) {
    $clients_title = get_post_meta($post->ID, '_about_clients_title', true);
    $clients_lead = get_post_meta($post->ID, '_about_clients_lead', true);
    $clients_text_1 = get_post_meta($post->ID, '_about_clients_text_1', true);
    $clients_text_2 = get_post_meta($post->ID, '_about_clients_text_2', true);
    ?>
    <p>
        <label><strong><?php _e('Section Title:', 'new-horizon'); ?></strong></label><br>
        <input type="text" name="about_clients_title" value="<?php echo esc_attr($clients_title); ?>" style="width: 100%;" placeholder="Who We Build For">
    </p>
    <p>
        <label><strong><?php _e('Lead Text:', 'new-horizon'); ?></strong></label><br>
        <textarea name="about_clients_lead" rows="2" style="width: 100%;"><?php echo esc_textarea($clients_lead); ?></textarea>
    </p>
    <p>
        <label><strong><?php _e('Paragraph 1:', 'new-horizon'); ?></strong></label><br>
        <textarea name="about_clients_text_1" rows="3" style="width: 100%;"><?php echo esc_textarea($clients_text_1); ?></textarea>
    </p>
    <p>
        <label><strong><?php _e('Paragraph 2:', 'new-horizon'); ?></strong></label><br>
        <textarea name="about_clients_text_2" rows="3" style="width: 100%;"><?php echo esc_textarea($clients_text_2); ?></textarea>
    </p>
    <?php
}

/**
 * What We Handle Callback
 */
function new_horizon_about_capabilities_callback($post) {
    $cap_title = get_post_meta($post->ID, '_about_cap_title', true);
    $cap_subtitle = get_post_meta($post->ID, '_about_cap_subtitle', true);
    $capabilities = get_post_meta($post->ID, '_about_capabilities', true);
    
    if (!is_array($capabilities) || empty($capabilities)) {
        $capabilities = array(
            array('icon' => 'fas fa-map-marked-alt', 'title' => '', 'description' => ''),
            array('icon' => 'fas fa-pencil-ruler', 'title' => '', 'description' => ''),
            array('icon' => 'fas fa-clipboard-list', 'title' => '', 'description' => ''),
            array('icon' => 'fas fa-hard-hat', 'title' => '', 'description' => ''),
            array('icon' => 'fas fa-home', 'title' => '', 'description' => ''),
            array('icon' => 'fas fa-file-contract', 'title' => '', 'description' => ''),
        );
    }
    ?>
    <p>
        <label><strong><?php _e('Section Title:', 'new-horizon'); ?></strong></label><br>
        <input type="text" name="about_cap_title" value="<?php echo esc_attr($cap_title); ?>" style="width: 100%;" placeholder="What We Handle">
    </p>
    <p>
        <label><strong><?php _e('Section Subtitle:', 'new-horizon'); ?></strong></label><br>
        <input type="text" name="about_cap_subtitle" value="<?php echo esc_attr($cap_subtitle); ?>" style="width: 100%;" placeholder="A complete approach to luxury homebuilding">
    </p>
    
    <h4><?php _e('Capability Items (6 items):', 'new-horizon'); ?></h4>
    <?php for ($i = 0; $i < 6; $i++) : 
        $item = isset($capabilities[$i]) ? $capabilities[$i] : array('icon' => '', 'title' => '', 'description' => '');
    ?>
    <div style="background: #f9f9f9; padding: 15px; margin-bottom: 15px; border-left: 4px solid #2271b1;">
        <h4><?php echo sprintf(__('Item %d', 'new-horizon'), $i + 1); ?></h4>
        <p>
            <label><strong><?php _e('Icon (Font Awesome):', 'new-horizon'); ?></strong></label><br>
            <input type="text" name="about_capabilities[<?php echo $i; ?>][icon]" value="<?php echo esc_attr($item['icon']); ?>" style="width: 100%;" placeholder="fas fa-map-marked-alt">
        </p>
        <p>
            <label><strong><?php _e('Title:', 'new-horizon'); ?></strong></label><br>
            <input type="text" name="about_capabilities[<?php echo $i; ?>][title]" value="<?php echo esc_attr($item['title']); ?>" style="width: 100%;">
        </p>
        <p>
            <label><strong><?php _e('Description:', 'new-horizon'); ?></strong></label><br>
            <textarea name="about_capabilities[<?php echo $i; ?>][description]" rows="2" style="width: 100%;"><?php echo esc_textarea($item['description']); ?></textarea>
        </p>
    </div>
    <?php endfor; ?>
    <?php
}

/**
 * Save About Page Meta
 */
function new_horizon_save_about_meta($post_id) {
    if (!isset($_POST['about_sections_nonce']) || !wp_verify_nonce($_POST['about_sections_nonce'], 'about_sections_nonce')) {
        return;
    }
    
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }
    
    // Save Intro Section
    if (isset($_POST['about_intro_title'])) {
        update_post_meta($post_id, '_about_intro_title', sanitize_text_field($_POST['about_intro_title']));
    }
    if (isset($_POST['about_intro_text_1'])) {
        update_post_meta($post_id, '_about_intro_text_1', sanitize_textarea_field($_POST['about_intro_text_1']));
    }
    if (isset($_POST['about_intro_text_2'])) {
        update_post_meta($post_id, '_about_intro_text_2', sanitize_textarea_field($_POST['about_intro_text_2']));
    }
    if (isset($_POST['about_intro_text_3'])) {
        update_post_meta($post_id, '_about_intro_text_3', sanitize_textarea_field($_POST['about_intro_text_3']));
    }
    if (isset($_POST['about_intro_image'])) {
        update_post_meta($post_id, '_about_intro_image', esc_url_raw($_POST['about_intro_image']));
    }
    
    // Save Differences Section
    if (isset($_POST['about_diff_title'])) {
        update_post_meta($post_id, '_about_diff_title', sanitize_text_field($_POST['about_diff_title']));
    }
    if (isset($_POST['about_diff_subtitle'])) {
        update_post_meta($post_id, '_about_diff_subtitle', sanitize_text_field($_POST['about_diff_subtitle']));
    }
    if (isset($_POST['about_differences']) && is_array($_POST['about_differences'])) {
        $differences = array();
        foreach ($_POST['about_differences'] as $diff) {
            $differences[] = array(
                'icon' => sanitize_text_field($diff['icon']),
                'title' => sanitize_text_field($diff['title']),
                'description' => sanitize_textarea_field($diff['description']),
            );
        }
        update_post_meta($post_id, '_about_differences', $differences);
    }
    
    // Save Values Section
    if (isset($_POST['about_values_title'])) {
        update_post_meta($post_id, '_about_values_title', sanitize_text_field($_POST['about_values_title']));
    }
    if (isset($_POST['about_values_lead'])) {
        update_post_meta($post_id, '_about_values_lead', sanitize_textarea_field($_POST['about_values_lead']));
    }
    if (isset($_POST['about_values']) && is_array($_POST['about_values'])) {
        $values = array();
        foreach ($_POST['about_values'] as $val) {
            $values[] = array(
                'title' => sanitize_text_field($val['title']),
                'description' => sanitize_textarea_field($val['description']),
            );
        }
        update_post_meta($post_id, '_about_values', $values);
    }
    if (isset($_POST['about_values_image'])) {
        update_post_meta($post_id, '_about_values_image', esc_url_raw($_POST['about_values_image']));
    }
    
    // Save Clients Section
    if (isset($_POST['about_clients_title'])) {
        update_post_meta($post_id, '_about_clients_title', sanitize_text_field($_POST['about_clients_title']));
    }
    if (isset($_POST['about_clients_lead'])) {
        update_post_meta($post_id, '_about_clients_lead', sanitize_textarea_field($_POST['about_clients_lead']));
    }
    if (isset($_POST['about_clients_text_1'])) {
        update_post_meta($post_id, '_about_clients_text_1', sanitize_textarea_field($_POST['about_clients_text_1']));
    }
    if (isset($_POST['about_clients_text_2'])) {
        update_post_meta($post_id, '_about_clients_text_2', sanitize_textarea_field($_POST['about_clients_text_2']));
    }
    
    // Save Capabilities Section
    if (isset($_POST['about_cap_title'])) {
        update_post_meta($post_id, '_about_cap_title', sanitize_text_field($_POST['about_cap_title']));
    }
    if (isset($_POST['about_cap_subtitle'])) {
        update_post_meta($post_id, '_about_cap_subtitle', sanitize_text_field($_POST['about_cap_subtitle']));
    }
    if (isset($_POST['about_capabilities']) && is_array($_POST['about_capabilities'])) {
        $capabilities = array();
        foreach ($_POST['about_capabilities'] as $cap) {
            $capabilities[] = array(
                'icon' => sanitize_text_field($cap['icon']),
                'title' => sanitize_text_field($cap['title']),
                'description' => sanitize_textarea_field($cap['description']),
            );
        }
        update_post_meta($post_id, '_about_capabilities', $capabilities);
    }
}
add_action('save_post', 'new_horizon_save_about_meta');

/**
 * Theme Setup
 */
function new_horizon_setup() {
    // Add default posts and comments RSS feed links to head
    add_theme_support('automatic-feed-links');

    // Let WordPress manage the document title
    add_theme_support('title-tag');

    // Enable support for Post Thumbnails
    add_theme_support('post-thumbnails');
    set_post_thumbnail_size(1200, 800, true);

    // Add custom image sizes
    add_image_size('timber-homes-portfolio', 800, 600, true);
    add_image_size('timber-homes-thumbnail', 400, 300, true);
    add_image_size('timber-homes-hero', 1920, 1080, true);

    // Register navigation menus
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'timber-homes'),
        'footer' => __('Footer Menu', 'timber-homes'),
    ));

    // Switch default core markup to output valid HTML5
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
    ));

    // Add theme support for selective refresh for widgets
    add_theme_support('customize-selective-refresh-widgets');

    // Add support for custom logo
    add_theme_support('custom-logo', array(
        'height'      => 100,
        'width'       => 400,
        'flex-height' => true,
        'flex-width'  => true,
    ));

    // Add support for custom header
    add_theme_support('custom-header', array(
        'default-image' => '',
        'width'         => 1920,
        'height'        => 1080,
        'flex-height'   => true,
        'flex-width'    => true,
    ));

    // Add support for custom background
    add_theme_support('custom-background', array(
        'default-color' => 'ffffff',
    ));

    // Add support for Block Editor styles
    add_theme_support('wp-block-styles');
    add_theme_support('align-wide');
    add_theme_support('editor-styles');
    add_editor_style('css/editor-style.css');
}
add_action('after_setup_theme', 'new_horizon_setup');

/**
 * Set the content width in pixels
 */
function new_horizon_content_width() {
    $GLOBALS['content_width'] = apply_filters('timber_homes_content_width', 1200);
}
add_action('after_setup_theme', 'new_horizon_content_width', 0);

/**
 * Register Widget Areas
 */
function new_horizon_widgets_init() {
    register_sidebar(array(
        'name'          => __('Sidebar', 'new-horizon'),
        'id'            => 'sidebar-1',
        'description'   => __('Add widgets here to appear in your sidebar.', 'new-horizon'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));

    register_sidebar(array(
        'name'          => __('Footer 1', 'new-horizon'),
        'id'            => 'footer-1',
        'description'   => __('Add widgets here to appear in your footer.', 'new-horizon'),
        'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));

    register_sidebar(array(
        'name'          => __('Footer 2', 'new-horizon'),
        'id'            => 'footer-2',
        'description'   => __('Add widgets here to appear in your footer.', 'new-horizon'),
        'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));

    register_sidebar(array(
        'name'          => __('Footer 3', 'new-horizon'),
        'id'            => 'footer-3',
        'description'   => __('Add widgets here to appear in your footer.', 'new-horizon'),
        'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));

    register_sidebar(array(
        'name'          => __('Footer 4', 'new-horizon'),
        'id'            => 'footer-4',
        'description'   => __('Add widgets here to appear in your footer.', 'new-horizon'),
        'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));
}
add_action('widgets_init', 'new_horizon_widgets_init');

/**
 * Enqueue Scripts and Styles
 */
function new_horizon_scripts() {
    // Google Fonts - Elegant Typography
    wp_enqueue_style('new-horizon-fonts', 'https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@300;400;500;600;700&family=Montserrat:wght@300;400;500;600;700&display=swap', array(), null);

    // Font Awesome
    wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css', array(), '6.4.0');

    // Main stylesheet
    wp_enqueue_style('timber-homes-style', get_stylesheet_uri(), array(), '1.0.0');

    // Main JavaScript
    wp_enqueue_script('new-horizon-main', get_template_directory_uri() . '/js/main.js', array('jquery'), '1.0.0', true);
    
    // Instagram Feed
    wp_enqueue_script('new-horizon-instagram', get_template_directory_uri() . '/js/instagram-feed.js', array('jquery'), '1.0.0', true);

    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'new_horizon_scripts');

/**
 * Enqueue Admin Scripts and Styles
 */
function new_horizon_admin_scripts($hook) {
    // Solo cargar en las páginas de edición de servicios
    global $post_type;
    
    if (($hook == 'post-new.php' || $hook == 'post.php') && $post_type == 'service') {
        // Font Awesome para el admin
        wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css', array(), '6.4.0');
        
        // Icon Picker CSS
        wp_enqueue_style('icon-picker-css', get_template_directory_uri() . '/css/admin-icon-picker.css', array(), '1.0.0');
        
        // Icon Picker JS
        wp_enqueue_script('icon-picker-js', get_template_directory_uri() . '/js/icon-picker.js', array('jquery'), '1.0.0', true);
    }
}
add_action('admin_enqueue_scripts', 'new_horizon_admin_scripts');

/**
 * Custom Post Type: Projects
 */
function new_horizon_register_projects_post_type() {
    $labels = array(
        'name'               => _x('Projects', 'post type general name', 'new-horizon'),
        'singular_name'      => _x('Project', 'post type singular name', 'new-horizon'),
        'menu_name'          => _x('Projects', 'admin menu', 'new-horizon'),
        'add_new'            => _x('Add New', 'project', 'new-horizon'),
        'add_new_item'       => __('Add New Project', 'new-horizon'),
        'new_item'           => __('New Project', 'new-horizon'),
        'edit_item'          => __('Edit Project', 'new-horizon'),
        'view_item'          => __('View Project', 'new-horizon'),
        'all_items'          => __('All Projects', 'new-horizon'),
        'search_items'       => __('Search Projects', 'new-horizon'),
        'not_found'          => __('No projects found.', 'new-horizon'),
        'not_found_in_trash' => __('No projects found in Trash.', 'new-horizon'),
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'projects'),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 5,
        'menu_icon'          => 'dashicons-admin-multisite',
        'supports'           => array('title', 'editor', 'thumbnail', 'excerpt'),
        'show_in_rest'       => true,
    );

    register_post_type('project', $args);
}
add_action('init', 'new_horizon_register_projects_post_type');

/**
 * Custom Taxonomy: Project Categories
 */
function new_horizon_register_project_taxonomy() {
    $labels = array(
        'name'              => _x('Project Categories', 'taxonomy general name', 'new-horizon'),
        'singular_name'     => _x('Project Category', 'taxonomy singular name', 'new-horizon'),
        'search_items'      => __('Search Project Categories', 'new-horizon'),
        'all_items'         => __('All Project Categories', 'new-horizon'),
        'parent_item'       => __('Parent Project Category', 'new-horizon'),
        'parent_item_colon' => __('Parent Project Category:', 'new-horizon'),
        'edit_item'         => __('Edit Project Category', 'new-horizon'),
        'update_item'       => __('Update Project Category', 'new-horizon'),
        'add_new_item'      => __('Add New Project Category', 'new-horizon'),
        'new_item_name'     => __('New Project Category Name', 'new-horizon'),
        'menu_name'         => __('Categories', 'new-horizon'),
    );

    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array('slug' => 'project-category'),
        'show_in_rest'      => true,
    );

    register_taxonomy('project_category', array('project'), $args);
}
add_action('init', 'new_horizon_register_project_taxonomy');

/**
 * AJAX Handler for Contact Form
 */
function new_horizon_submit_contact_form() {
    // Verify nonce
    check_ajax_referer('timber_homes_nonce', 'nonce');

    // Sanitize input
    $name = sanitize_text_field($_POST['name']);
    $email = sanitize_email($_POST['email']);
    $phone = sanitize_text_field($_POST['phone']);
    $service = sanitize_text_field($_POST['service']);
    $message = sanitize_textarea_field($_POST['message']);

    // Validate
    if (empty($name) || empty($email) || empty($message)) {
        wp_send_json_error(array('message' => 'Please fill in all required fields.'));
    }

    if (!is_email($email)) {
        wp_send_json_error(array('message' => 'Please enter a valid email address.'));
    }

    // Prepare email
    $to = get_option('admin_email');
    $subject = 'New Contact Form Submission from ' . $name;
    $body = "Name: $name\n";
    $body .= "Email: $email\n";
    $body .= "Phone: $phone\n";
    $body .= "Service: $service\n\n";
    $body .= "Message:\n$message\n";

    $headers = array('Content-Type: text/plain; charset=UTF-8', "Reply-To: $email");

    // Send email
    $sent = wp_mail($to, $subject, $body, $headers);

    if ($sent) {
        wp_send_json_success(array('message' => 'Thank you for your message!'));
    } else {
        wp_send_json_error(array('message' => 'There was an error sending your message.'));
    }
}
add_action('wp_ajax_submit_contact_form', 'new_horizon_submit_contact_form');
add_action('wp_ajax_nopriv_submit_contact_form', 'new_horizon_submit_contact_form');

/**
 * Custom Excerpt Length
 */
function new_horizon_excerpt_length($length) {
    return 30;
}
add_filter('excerpt_length', 'new_horizon_excerpt_length');

/**
 * Custom Excerpt More
 */
function new_horizon_excerpt_more($more) {
    return '...';
}
add_filter('excerpt_more', 'new_horizon_excerpt_more');

/**
 * Add custom fields support (if ACF is not installed)
 */
function new_horizon_add_meta_boxes() {
    add_meta_box(
        'project_details',
        __('Project Details', 'new-horizon'),
        'new_horizon_project_details_callback',
        'project',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'new_horizon_add_meta_boxes');

function new_horizon_project_details_callback($post) {
    wp_nonce_field('new_horizon_save_project_details', 'new_horizon_project_details_nonce');
    
    $location = get_post_meta($post->ID, '_project_location', true);
    $size = get_post_meta($post->ID, '_project_size', true);
    $year = get_post_meta($post->ID, '_project_year', true);
    $featured = get_post_meta($post->ID, '_project_featured', true);
    ?>
    <p>
        <label for="project_location"><?php _e('Location:', 'new-horizon'); ?></label><br>
        <input type="text" id="project_location" name="project_location" value="<?php echo esc_attr($location); ?>" style="width: 100%;">
    </p>
    <p>
        <label for="project_size"><?php _e('Size (sq ft):', 'new-horizon'); ?></label><br>
        <input type="text" id="project_size" name="project_size" value="<?php echo esc_attr($size); ?>" style="width: 100%;">
    </p>
    <p>
        <label for="project_year"><?php _e('Year Completed:', 'new-horizon'); ?></label><br>
        <input type="text" id="project_year" name="project_year" value="<?php echo esc_attr($year); ?>" style="width: 100%;">
    </p>
    <p>
        <label>
            <input type="checkbox" id="project_featured" name="project_featured" value="1" <?php checked($featured, '1'); ?>>
            <?php _e('Show in Featured Projects (Homepage)', 'new-horizon'); ?>
        </label>
    </p>
    <p>
        <strong><?php _e('Project Gallery:', 'new-horizon'); ?></strong><br>
        <em><?php _e('Set the Featured Image as the main project image. For additional gallery images, use a gallery plugin or add them in the content editor.', 'new-horizon'); ?></em>
    </p>
    <?php
}

function new_horizon_save_project_details($post_id) {
    if (!isset($_POST['new_horizon_project_details_nonce'])) {
        return;
    }
    
    if (!wp_verify_nonce($_POST['new_horizon_project_details_nonce'], 'new_horizon_save_project_details')) {
        return;
    }
    
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }
    
    if (isset($_POST['project_location'])) {
        update_post_meta($post_id, '_project_location', sanitize_text_field($_POST['project_location']));
    }
    
    if (isset($_POST['project_size'])) {
        update_post_meta($post_id, '_project_size', sanitize_text_field($_POST['project_size']));
    }
    
    if (isset($_POST['project_year'])) {
        update_post_meta($post_id, '_project_year', sanitize_text_field($_POST['project_year']));
    }
    
    if (isset($_POST['project_featured'])) {
        update_post_meta($post_id, '_project_featured', '1');
    } else {
        delete_post_meta($post_id, '_project_featured');
    }
}
add_action('save_post_project', 'new_horizon_save_project_details');

/**
 * Customizer Settings
 */
function new_horizon_customize_register($wp_customize) {
    // Contact Information Section
    $wp_customize->add_section('new_horizon_contact', array(
        'title'    => __('Contact Information', 'new-horizon'),
        'priority' => 30,
    ));

    // Phone Number
    $wp_customize->add_setting('new_horizon_phone', array(
        'default'           => '+1 (555) 123-4567',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('new_horizon_phone', array(
        'label'   => __('Phone Number', 'new-horizon'),
        'section' => 'new_horizon_contact',
        'type'    => 'text',
    ));

    // Email
    $wp_customize->add_setting('new_horizon_email', array(
        'default'           => 'info@timberhomes.com',
        'sanitize_callback' => 'sanitize_email',
    ));

    $wp_customize->add_control('new_horizon_email', array(
        'label'   => __('Email Address', 'new-horizon'),
        'section' => 'new_horizon_contact',
        'type'    => 'email',
    ));

    // Address
    $wp_customize->add_setting('new_horizon_address', array(
        'default'           => '123 Main Street, Denver, CO 80202',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));

    $wp_customize->add_control('new_horizon_address', array(
        'label'   => __('Address', 'new-horizon'),
        'section' => 'new_horizon_contact',
        'type'    => 'textarea',
    ));

    // WhatsApp Number
    $wp_customize->add_setting('new_horizon_whatsapp', array(
        'default'           => '15551234567',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('new_horizon_whatsapp', array(
        'label'       => __('WhatsApp Number', 'new-horizon'),
        'description' => __('Enter number without + or spaces (e.g., 15551234567)', 'new-horizon'),
        'section'     => 'new_horizon_contact',
        'type'        => 'text',
    ));

    // Social Media Section
    $wp_customize->add_section('new_horizon_social', array(
        'title'    => __('Social Media', 'new-horizon'),
        'priority' => 31,
    ));

    $social_networks = array(
        'facebook'  => 'Facebook',
        'instagram' => 'Instagram',
        'pinterest' => 'Pinterest',
        'linkedin'  => 'LinkedIn',
    );

    foreach ($social_networks as $network => $label) {
        $wp_customize->add_setting("new_horizon_$network", array(
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw',
        ));

        $wp_customize->add_control("new_horizon_$network", array(
            'label'   => $label . ' ' . __('URL', 'new-horizon'),
            'section' => 'new_horizon_social',
            'type'    => 'url',
        ));
    }
}
add_action('customize_register', 'new_horizon_customize_register');

/**
 * Custom Post Type: Services
 */
function new_horizon_register_services_post_type() {
    $labels = array(
        'name'               => _x('Services', 'post type general name', 'new-horizon'),
        'singular_name'      => _x('Service', 'post type singular name', 'new-horizon'),
        'menu_name'          => _x('Services', 'admin menu', 'new-horizon'),
        'add_new'            => _x('Add New', 'service', 'new-horizon'),
        'add_new_item'       => __('Add New Service', 'new-horizon'),
        'new_item'           => __('New Service', 'new-horizon'),
        'edit_item'          => __('Edit Service', 'new-horizon'),
        'view_item'          => __('View Service', 'new-horizon'),
        'all_items'          => __('All Services', 'new-horizon'),
        'search_items'       => __('Search Services', 'new-horizon'),
        'not_found'          => __('No services found.', 'new-horizon'),
        'not_found_in_trash' => __('No services found in Trash.', 'new-horizon'),
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'service'),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 7,
        'menu_icon'          => 'dashicons-hammer',
        'supports'           => array('title', 'editor', 'thumbnail', 'excerpt'),
        'show_in_rest'       => true,
    );

    register_post_type('service', $args);
}
add_action('init', 'new_horizon_register_services_post_type');

/**
 * Custom Post Type: Team Members
 */
function new_horizon_register_team_post_type() {
    $labels = array(
        'name'               => _x('Team Members', 'post type general name', 'new-horizon'),
        'singular_name'      => _x('Team Member', 'post type singular name', 'new-horizon'),
        'menu_name'          => _x('Team', 'admin menu', 'new-horizon'),
        'add_new'            => _x('Add New', 'team member', 'new-horizon'),
        'add_new_item'       => __('Add New Team Member', 'new-horizon'),
        'new_item'           => __('New Team Member', 'new-horizon'),
        'edit_item'          => __('Edit Team Member', 'new-horizon'),
        'view_item'          => __('View Team Member', 'new-horizon'),
        'all_items'          => __('All Team Members', 'new-horizon'),
        'search_items'       => __('Search Team Members', 'new-horizon'),
        'not_found'          => __('No team members found.', 'new-horizon'),
        'not_found_in_trash' => __('No team members found in Trash.', 'new-horizon'),
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'team'),
        'capability_type'    => 'post',
        'has_archive'        => false,
        'hierarchical'       => false,
        'menu_position'      => 6,
        'menu_icon'          => 'dashicons-groups',
        'supports'           => array('title', 'editor', 'thumbnail'),
        'show_in_rest'       => true,
    );

    register_post_type('team_member', $args);
}
add_action('init', 'new_horizon_register_team_post_type');

/**
 * Add Service Meta Boxes
 */
function new_horizon_add_service_meta_boxes() {
    add_meta_box(
        'service_details',
        __('Service Details', 'new-horizon'),
        'new_horizon_service_details_callback',
        'service',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'new_horizon_add_service_meta_boxes');

function new_horizon_service_details_callback($post) {
    wp_nonce_field('new_horizon_save_service_details', 'new_horizon_service_details_nonce');
    
    $icon = get_post_meta($post->ID, '_service_icon', true);
    $short_desc = get_post_meta($post->ID, '_service_short_description', true);
    $order = get_post_meta($post->ID, '_service_order', true);
    ?>
    <p>
        <label for="service_icon"><strong><?php _e('Icon Class (Font Awesome):', 'new-horizon'); ?></strong></label><br>
        <input type="text" id="service_icon" name="service_icon" value="<?php echo esc_attr($icon); ?>" style="width: 100%; margin-bottom: 10px;" placeholder="fas fa-home">
        
        <div class="icon-input-wrapper">
            <div id="icon-preview">
                <?php if ($icon) : ?>
                    <i class="<?php echo esc_attr($icon); ?>"></i>
                <?php endif; ?>
            </div>
            <button type="button" id="select-icon-btn" class="button button-secondary">
                <span class="dashicons dashicons-search" style="margin-top: 3px;"></span>
                <?php _e('Seleccionar Ícono', 'new-horizon'); ?>
            </button>
        </div>
        
        <br><em><?php _e('Haz clic en "Seleccionar Ícono" para elegir de una galería visual, o escribe manualmente la clase del ícono (ej: "fas fa-home", "fas fa-hammer").', 'new-horizon'); ?></em>
    </p>
    <p>
        <label for="service_short_description"><strong><?php _e('Short Description (for homepage):', 'new-horizon'); ?></strong></label><br>
        <textarea id="service_short_description" name="service_short_description" rows="3" style="width: 100%;" placeholder="Brief description shown on the homepage..."><?php echo esc_textarea($short_desc); ?></textarea>
        <br><em><?php _e('This short description will appear on the homepage service card. Keep it concise (1-2 sentences).', 'new-horizon'); ?></em>
    </p>
    <p>
        <label for="service_order"><strong><?php _e('Display Order:', 'new-horizon'); ?></strong></label><br>
        <input type="number" id="service_order" name="service_order" value="<?php echo esc_attr($order ? $order : 0); ?>" style="width: 100px;" min="0">
        <br><em><?php _e('Lower numbers appear first on the homepage. Use 0, 1, 2, 3, etc.', 'new-horizon'); ?></em>
    </p>
    
    <hr style="margin: 30px 0;">
    
    <h3><?php _e('Why Choose Us? - Service Benefits (4 items)', 'new-horizon'); ?></h3>
    <p><em><?php _e('Add 4 unique benefits/qualities for this specific service. Each benefit needs an icon, title, and description.', 'new-horizon'); ?></em></p>
    
    <?php
    // Get existing benefits
    $benefits = get_post_meta($post->ID, '_service_benefits', true);
    if (!is_array($benefits)) {
        $benefits = array(
            array('icon' => '', 'title' => '', 'description' => ''),
            array('icon' => '', 'title' => '', 'description' => ''),
            array('icon' => '', 'title' => '', 'description' => ''),
            array('icon' => '', 'title' => '', 'description' => ''),
        );
    }
    
    for ($i = 0; $i < 4; $i++) :
        $benefit = isset($benefits[$i]) ? $benefits[$i] : array('icon' => '', 'title' => '', 'description' => '');
        ?>
        <div style="background: #f9f9f9; padding: 15px; margin-bottom: 15px; border-left: 4px solid #2271b1;">
            <h4><?php echo sprintf(__('Benefit %d', 'new-horizon'), $i + 1); ?></h4>
            
            <p>
                <label><strong><?php _e('Icon (Font Awesome):', 'new-horizon'); ?></strong></label><br>
                <input type="text" name="service_benefits[<?php echo $i; ?>][icon]" value="<?php echo esc_attr($benefit['icon']); ?>" style="width: 100%;" placeholder="fas fa-award">
                <em><?php _e('Example: fas fa-award, fas fa-certificate, fas fa-clock, fas fa-shield-alt', 'new-horizon'); ?></em>
            </p>
            
            <p>
                <label><strong><?php _e('Title:', 'new-horizon'); ?></strong></label><br>
                <input type="text" name="service_benefits[<?php echo $i; ?>][title]" value="<?php echo esc_attr($benefit['title']); ?>" style="width: 100%;" placeholder="Expert Team">
            </p>
            
            <p>
                <label><strong><?php _e('Description:', 'new-horizon'); ?></strong></label><br>
                <textarea name="service_benefits[<?php echo $i; ?>][description]" rows="2" style="width: 100%;" placeholder="Brief description of this benefit..."><?php echo esc_textarea($benefit['description']); ?></textarea>
            </p>
        </div>
        <?php
    endfor;
    ?>
    
    <hr style="margin: 30px 0;">
    
    <p>
        <strong><?php _e('Full Description:', 'new-horizon'); ?></strong><br>
        <em><?php _e('Use the main content editor above to add the complete service description. This will appear on the individual service page.', 'new-horizon'); ?></em>
    </p>
    <p>
        <strong><?php _e('Service Image:', 'new-horizon'); ?></strong><br>
        <em><?php _e('Set the Featured Image to display on the service detail page.', 'new-horizon'); ?></em>
    </p>
    <?php
}

function new_horizon_save_service_details($post_id) {
    if (!isset($_POST['new_horizon_service_details_nonce'])) {
        return;
    }
    
    if (!wp_verify_nonce($_POST['new_horizon_service_details_nonce'], 'new_horizon_save_service_details')) {
        return;
    }
    
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }
    
    if (isset($_POST['service_icon'])) {
        update_post_meta($post_id, '_service_icon', sanitize_text_field($_POST['service_icon']));
    }
    
    if (isset($_POST['service_short_description'])) {
        update_post_meta($post_id, '_service_short_description', sanitize_textarea_field($_POST['service_short_description']));
    }
    
    if (isset($_POST['service_order'])) {
        update_post_meta($post_id, '_service_order', intval($_POST['service_order']));
    }
    
    // Save benefits
    if (isset($_POST['service_benefits']) && is_array($_POST['service_benefits'])) {
        $benefits = array();
        foreach ($_POST['service_benefits'] as $benefit) {
            $benefits[] = array(
                'icon' => sanitize_text_field($benefit['icon']),
                'title' => sanitize_text_field($benefit['title']),
                'description' => sanitize_textarea_field($benefit['description']),
            );
        }
        update_post_meta($post_id, '_service_benefits', $benefits);
    }
}
add_action('save_post_service', 'new_horizon_save_service_details');

/**
 * Add Team Member Meta Boxes
 */
function new_horizon_add_team_meta_boxes() {
    add_meta_box(
        'team_member_details',
        __('Team Member Details', 'new-horizon'),
        'new_horizon_team_member_details_callback',
        'team_member',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'new_horizon_add_team_meta_boxes');

function new_horizon_team_member_details_callback($post) {
    wp_nonce_field('new_horizon_save_team_member_details', 'new_horizon_team_member_details_nonce');
    
    $position = get_post_meta($post->ID, '_team_position', true);
    $email = get_post_meta($post->ID, '_team_email', true);
    $phone = get_post_meta($post->ID, '_team_phone', true);
    $order = get_post_meta($post->ID, '_team_order', true);
    ?>
    <p>
        <label for="team_position"><strong><?php _e('Position/Title:', 'new-horizon'); ?></strong></label><br>
        <input type="text" id="team_position" name="team_position" value="<?php echo esc_attr($position); ?>" style="width: 100%;" placeholder="e.g., Founder & CEO">
    </p>
    <p>
        <label for="team_email"><strong><?php _e('Email:', 'new-horizon'); ?></strong></label><br>
        <input type="email" id="team_email" name="team_email" value="<?php echo esc_attr($email); ?>" style="width: 100%;" placeholder="email@example.com">
    </p>
    <p>
        <label for="team_phone"><strong><?php _e('Phone:', 'new-horizon'); ?></strong></label><br>
        <input type="text" id="team_phone" name="team_phone" value="<?php echo esc_attr($phone); ?>" style="width: 100%;" placeholder="+1 (555) 123-4567">
    </p>
    <p>
        <label for="team_order"><strong><?php _e('Display Order:', 'new-horizon'); ?></strong></label><br>
        <input type="number" id="team_order" name="team_order" value="<?php echo esc_attr($order ? $order : 0); ?>" style="width: 100px;" min="0">
        <br><em><?php _e('Lower numbers appear first. Use 0, 1, 2, 3, etc.', 'new-horizon'); ?></em>
    </p>
    <p>
        <strong><?php _e('Biography:', 'new-horizon'); ?></strong><br>
        <em><?php _e('Use the main content editor above to add the team member\'s biography. This will appear in the overlay on hover.', 'new-horizon'); ?></em>
    </p>
    <p>
        <strong><?php _e('Photo:', 'new-horizon'); ?></strong><br>
        <em><?php _e('Set the Featured Image as the team member\'s photo. Recommended size: 600x800px (3:4 ratio).', 'new-horizon'); ?></em>
    </p>
    <?php
}

function new_horizon_save_team_member_details($post_id) {
    if (!isset($_POST['new_horizon_team_member_details_nonce'])) {
        return;
    }
    
    if (!wp_verify_nonce($_POST['new_horizon_team_member_details_nonce'], 'new_horizon_save_team_member_details')) {
        return;
    }
    
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }
    
    if (isset($_POST['team_position'])) {
        update_post_meta($post_id, '_team_position', sanitize_text_field($_POST['team_position']));
    }
    
    if (isset($_POST['team_email'])) {
        update_post_meta($post_id, '_team_email', sanitize_email($_POST['team_email']));
    }
    
    if (isset($_POST['team_phone'])) {
        update_post_meta($post_id, '_team_phone', sanitize_text_field($_POST['team_phone']));
    }
    
    if (isset($_POST['team_order'])) {
        update_post_meta($post_id, '_team_order', intval($_POST['team_order']));
    }
}
add_action('save_post_team_member', 'new_horizon_save_team_member_details');

/**
 * ============================================================================
 * SEO OPTIMIZATION - Local Business & Google Indexing
 * ============================================================================
 */

/**
 * Add SEO Meta Tags to Head
 */
function new_horizon_seo_meta_tags() {
    // Get page information
    $site_name = get_bloginfo('name');
    $site_description = get_bloginfo('description');
    $site_url = home_url('/');
    
    // Default meta description
    $meta_description = $site_description;
    $meta_keywords = 'luxury home construction, custom homes, residential development, home builder, construction company';
    $meta_title = $site_name;
    $canonical_url = $site_url;
    $og_type = 'website';
    $og_image = get_template_directory_uri() . '/images/new-horizon-develoments.png';
    
    // Page-specific meta tags
    if (is_singular()) {
        global $post;
        $meta_title = get_the_title() . ' | ' . $site_name;
        $canonical_url = get_permalink();
        
        // Use excerpt or content for description
        if (has_excerpt()) {
            $meta_description = wp_strip_all_tags(get_the_excerpt());
        } else {
            $meta_description = wp_trim_words(wp_strip_all_tags(get_the_content()), 30, '...');
        }
        
        // Featured image for OG
        if (has_post_thumbnail()) {
            $og_image = get_the_post_thumbnail_url(get_the_ID(), 'large');
        }
        
        // Post type specific
        if (is_singular('project')) {
            $og_type = 'article';
            $location = get_post_meta(get_the_ID(), '_project_location', true);
            if ($location) {
                $meta_keywords = 'custom home ' . $location . ', luxury construction ' . $location . ', home builder';
            }
        } elseif (is_singular('service')) {
            $og_type = 'article';
        }
    } elseif (is_front_page()) {
        $meta_description = 'New Horizon Developments - Premier luxury home construction and custom residential development. Building exceptional homes with superior craftsmanship and elegant design.';
        $meta_keywords = 'luxury home builder, custom home construction, residential development, premium homes, construction company';
    } elseif (is_post_type_archive('project')) {
        $meta_title = 'Our Projects | ' . $site_name;
        $meta_description = 'Explore our portfolio of luxury custom homes and residential developments. Quality craftsmanship and exceptional design.';
        $canonical_url = get_post_type_archive_link('project');
    } elseif (is_post_type_archive('service')) {
        $meta_title = 'Our Services | ' . $site_name;
        $meta_description = 'Comprehensive home construction services including custom builds, renovations, and project management.';
        $canonical_url = get_post_type_archive_link('service');
    }
    
    // Sanitize
    $meta_description = esc_attr(wp_strip_all_tags($meta_description));
    $meta_keywords = esc_attr($meta_keywords);
    $meta_title = esc_attr($meta_title);
    
    ?>
    <!-- SEO Meta Tags -->
    <meta name="description" content="<?php echo $meta_description; ?>">
    <meta name="keywords" content="<?php echo $meta_keywords; ?>">
    <meta name="author" content="<?php echo $site_name; ?>">
    <meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1">
    
    <!-- Canonical URL -->
    <link rel="canonical" href="<?php echo esc_url($canonical_url); ?>">
    
    <!-- Open Graph Meta Tags (Facebook, LinkedIn) -->
    <meta property="og:locale" content="<?php echo get_locale(); ?>">
    <meta property="og:type" content="<?php echo $og_type; ?>">
    <meta property="og:title" content="<?php echo $meta_title; ?>">
    <meta property="og:description" content="<?php echo $meta_description; ?>">
    <meta property="og:url" content="<?php echo esc_url($canonical_url); ?>">
    <meta property="og:site_name" content="<?php echo $site_name; ?>">
    <meta property="og:image" content="<?php echo esc_url($og_image); ?>">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    
    <!-- Twitter Card Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?php echo $meta_title; ?>">
    <meta name="twitter:description" content="<?php echo $meta_description; ?>">
    <meta name="twitter:image" content="<?php echo esc_url($og_image); ?>">
    
    <!-- Additional SEO -->
    <meta name="format-detection" content="telephone=yes">
    <meta name="HandheldFriendly" content="true">
    <?php
}
add_action('wp_head', 'new_horizon_seo_meta_tags', 1);

/**
 * Add Local Business Schema.org Structured Data
 */
function new_horizon_local_business_schema() {
    // Only on homepage
    if (!is_front_page()) {
        return;
    }
    
    $business_name = get_bloginfo('name');
    $business_description = get_bloginfo('description');
    $business_url = home_url('/');
    $business_logo = get_template_directory_uri() . '/images/new-horizon-develoments.png';
    
    // Get contact info from customizer
    $phone = get_theme_mod('new_horizon_phone', '+1 (555) 123-4567');
    $email = get_theme_mod('new_horizon_email', 'info@newhorizondevelopments.com');
    $address = get_theme_mod('new_horizon_address', '123 Main Street, Denver, CO 80202');
    
    // Parse address (simple parsing)
    $address_parts = explode(',', $address);
    $street = isset($address_parts[0]) ? trim($address_parts[0]) : '';
    $city = isset($address_parts[1]) ? trim($address_parts[1]) : '';
    $state_zip = isset($address_parts[2]) ? trim($address_parts[2]) : '';
    
    // Get social media
    $facebook = get_theme_mod('new_horizon_facebook', '');
    $instagram = get_theme_mod('new_horizon_instagram', '');
    $linkedin = get_theme_mod('new_horizon_linkedin', '');
    
    $social_profiles = array();
    if ($facebook) $social_profiles[] = $facebook;
    if ($instagram) $social_profiles[] = $instagram;
    if ($linkedin) $social_profiles[] = $linkedin;
    
    $schema = array(
        '@context' => 'https://schema.org',
        '@type' => 'GeneralContractor',
        'name' => $business_name,
        'description' => $business_description,
        'url' => $business_url,
        'logo' => $business_logo,
        'image' => $business_logo,
        'telephone' => $phone,
        'email' => $email,
        'address' => array(
            '@type' => 'PostalAddress',
            'streetAddress' => $street,
            'addressLocality' => $city,
            'addressRegion' => $state_zip,
            'addressCountry' => 'US'
        ),
        'geo' => array(
            '@type' => 'GeoCoordinates',
            'latitude' => '39.7392', // Denver coordinates - update with actual
            'longitude' => '-104.9903'
        ),
        'priceRange' => '$$$',
        'areaServed' => array(
            '@type' => 'State',
            'name' => 'Colorado'
        ),
        'openingHoursSpecification' => array(
            '@type' => 'OpeningHoursSpecification',
            'dayOfWeek' => array('Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'),
            'opens' => '08:00',
            'closes' => '17:00'
        )
    );
    
    if (!empty($social_profiles)) {
        $schema['sameAs'] = $social_profiles;
    }
    
    echo '<script type="application/ld+json">' . wp_json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) . '</script>' . "\n";
}
add_action('wp_head', 'new_horizon_local_business_schema', 2);

/**
 * Add Project Schema.org Structured Data
 */
function new_horizon_project_schema() {
    if (!is_singular('project')) {
        return;
    }
    
    global $post;
    
    $location = get_post_meta(get_the_ID(), '_project_location', true);
    $size = get_post_meta(get_the_ID(), '_project_size', true);
    $year = get_post_meta(get_the_ID(), '_project_year', true);
    
    $schema = array(
        '@context' => 'https://schema.org',
        '@type' => 'CreativeWork',
        'name' => get_the_title(),
        'description' => wp_strip_all_tags(get_the_excerpt() ?: get_the_content()),
        'url' => get_permalink(),
        'creator' => array(
            '@type' => 'Organization',
            'name' => get_bloginfo('name')
        )
    );
    
    if (has_post_thumbnail()) {
        $schema['image'] = get_the_post_thumbnail_url(get_the_ID(), 'large');
    }
    
    if ($location) {
        $schema['contentLocation'] = array(
            '@type' => 'Place',
            'name' => $location
        );
    }
    
    if ($year) {
        $schema['dateCreated'] = $year;
    }
    
    echo '<script type="application/ld+json">' . wp_json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) . '</script>' . "\n";
}
add_action('wp_head', 'new_horizon_project_schema', 2);

/**
 * Add Breadcrumb Schema
 */
function new_horizon_breadcrumb_schema() {
    if (is_front_page()) {
        return;
    }
    
    $items = array();
    $position = 1;
    
    // Home
    $items[] = array(
        '@type' => 'ListItem',
        'position' => $position++,
        'name' => 'Home',
        'item' => home_url('/')
    );
    
    // Archive pages
    if (is_post_type_archive('project')) {
        $items[] = array(
            '@type' => 'ListItem',
            'position' => $position++,
            'name' => 'Projects',
            'item' => get_post_type_archive_link('project')
        );
    } elseif (is_post_type_archive('service')) {
        $items[] = array(
            '@type' => 'ListItem',
            'position' => $position++,
            'name' => 'Services',
            'item' => get_post_type_archive_link('service')
        );
    }
    
    // Single pages
    if (is_singular('project')) {
        $items[] = array(
            '@type' => 'ListItem',
            'position' => $position++,
            'name' => 'Projects',
            'item' => get_post_type_archive_link('project')
        );
        $items[] = array(
            '@type' => 'ListItem',
            'position' => $position++,
            'name' => get_the_title(),
            'item' => get_permalink()
        );
    } elseif (is_singular('service')) {
        $items[] = array(
            '@type' => 'ListItem',
            'position' => $position++,
            'name' => 'Services',
            'item' => get_post_type_archive_link('service')
        );
        $items[] = array(
            '@type' => 'ListItem',
            'position' => $position++,
            'name' => get_the_title(),
            'item' => get_permalink()
        );
    } elseif (is_page()) {
        $items[] = array(
            '@type' => 'ListItem',
            'position' => $position++,
            'name' => get_the_title(),
            'item' => get_permalink()
        );
    }
    
    if (count($items) > 1) {
        $schema = array(
            '@context' => 'https://schema.org',
            '@type' => 'BreadcrumbList',
            'itemListElement' => $items
        );
        
        echo '<script type="application/ld+json">' . wp_json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) . '</script>' . "\n";
    }
}
add_action('wp_head', 'new_horizon_breadcrumb_schema', 3);

/**
 * Generate XML Sitemap
 */
function new_horizon_generate_sitemap() {
    // Check if WordPress has native sitemap (WP 5.5+)
    // This is a fallback for older versions
    if (function_exists('wp_sitemaps_get_server')) {
        return; // Use WordPress native sitemap
    }
    
    // Simple sitemap generation for older WP versions
    if (isset($_GET['sitemap']) && $_GET['sitemap'] === 'xml') {
        header('Content-Type: application/xml; charset=utf-8');
        echo '<?xml version="1.0" encoding="UTF-8"?>';
        echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';
        
        // Homepage
        echo '<url>';
        echo '<loc>' . esc_url(home_url('/')) . '</loc>';
        echo '<changefreq>weekly</changefreq>';
        echo '<priority>1.0</priority>';
        echo '</url>';
        
        // Pages
        $pages = get_pages();
        foreach ($pages as $page) {
            echo '<url>';
            echo '<loc>' . esc_url(get_permalink($page->ID)) . '</loc>';
            echo '<lastmod>' . mysql2date('Y-m-d', $page->post_modified) . '</lastmod>';
            echo '<changefreq>monthly</changefreq>';
            echo '<priority>0.8</priority>';
            echo '</url>';
        }
        
        // Projects
        $projects = get_posts(array('post_type' => 'project', 'posts_per_page' => -1));
        foreach ($projects as $project) {
            echo '<url>';
            echo '<loc>' . esc_url(get_permalink($project->ID)) . '</loc>';
            echo '<lastmod>' . mysql2date('Y-m-d', $project->post_modified) . '</lastmod>';
            echo '<changefreq>monthly</changefreq>';
            echo '<priority>0.7</priority>';
            echo '</url>';
        }
        
        // Services
        $services = get_posts(array('post_type' => 'service', 'posts_per_page' => -1));
        foreach ($services as $service) {
            echo '<url>';
            echo '<loc>' . esc_url(get_permalink($service->ID)) . '</loc>';
            echo '<lastmod>' . mysql2date('Y-m-d', $service->post_modified) . '</lastmod>';
            echo '<changefreq>monthly</changefreq>';
            echo '<priority>0.7</priority>';
            echo '</url>';
        }
        
        echo '</urlset>';
        exit;
    }
}
add_action('template_redirect', 'new_horizon_generate_sitemap');

/**
 * Add Customizer Settings for SEO
 */
function new_horizon_seo_customizer($wp_customize) {
    // SEO Section
    $wp_customize->add_section('new_horizon_seo', array(
        'title'    => __('SEO Settings', 'new-horizon'),
        'priority' => 35,
    ));
    
    // Business Coordinates
    $wp_customize->add_setting('new_horizon_latitude', array(
        'default'           => '39.7392',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('new_horizon_latitude', array(
        'label'       => __('Business Latitude', 'new-horizon'),
        'description' => __('For Google Maps and local SEO (e.g., 39.7392)', 'new-horizon'),
        'section'     => 'new_horizon_seo',
        'type'        => 'text',
    ));
    
    $wp_customize->add_setting('new_horizon_longitude', array(
        'default'           => '-104.9903',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('new_horizon_longitude', array(
        'label'       => __('Business Longitude', 'new-horizon'),
        'description' => __('For Google Maps and local SEO (e.g., -104.9903)', 'new-horizon'),
        'section'     => 'new_horizon_seo',
        'type'        => 'text',
    ));
    
    // Service Area
    $wp_customize->add_setting('new_horizon_service_area', array(
        'default'           => 'Colorado',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('new_horizon_service_area', array(
        'label'       => __('Service Area', 'new-horizon'),
        'description' => __('State or region you serve (e.g., Colorado)', 'new-horizon'),
        'section'     => 'new_horizon_seo',
        'type'        => 'text',
    ));
}
add_action('customize_register', 'new_horizon_seo_customizer');

/**
 * Optimize Permalinks Structure
 */
function new_horizon_optimize_permalinks() {
    // Ensure pretty permalinks are enabled
    global $wp_rewrite;
    
    // Set custom permalink structure if not already set
    if (get_option('permalink_structure') === '') {
        update_option('permalink_structure', '/%postname%/');
        flush_rewrite_rules();
    }
}
add_action('after_switch_theme', 'new_horizon_optimize_permalinks');

/**
 * Add robots.txt rules
 */
function new_horizon_robots_txt($output, $public) {
    if ($public) {
        $output .= "User-agent: *\n";
        $output .= "Disallow: /wp-admin/\n";
        $output .= "Disallow: /wp-includes/\n";
        $output .= "Disallow: /wp-content/plugins/\n";
        $output .= "Disallow: /wp-content/themes/\n";
        $output .= "Allow: /wp-content/uploads/\n";
        $output .= "\n";
        
        // Add sitemap
        if (function_exists('wp_sitemaps_get_server')) {
            $output .= "Sitemap: " . home_url('/wp-sitemap.xml') . "\n";
        } else {
            $output .= "Sitemap: " . home_url('/?sitemap=xml') . "\n";
        }
    }
    
    return $output;
}
add_filter('robots_txt', 'new_horizon_robots_txt', 10, 2);

/**
 * Add hreflang tags for international SEO (if needed)
 */
function new_horizon_hreflang_tags() {
    if (is_singular() || is_front_page()) {
        $current_url = get_permalink();
        if (is_front_page()) {
            $current_url = home_url('/');
        }
        
        // Default language
        echo '<link rel="alternate" hreflang="en-US" href="' . esc_url($current_url) . '" />' . "\n";
        echo '<link rel="alternate" hreflang="x-default" href="' . esc_url($current_url) . '" />' . "\n";
    }
}
add_action('wp_head', 'new_horizon_hreflang_tags', 4);

/**
 * Optimize title tag for SEO
 */
function new_horizon_document_title_separator($sep) {
    return '|';
}
add_filter('document_title_separator', 'new_horizon_document_title_separator');

function new_horizon_document_title_parts($title) {
    if (is_front_page()) {
        $title['title'] = get_bloginfo('name');
        $title['tagline'] = get_bloginfo('description');
    }
    return $title;
}
add_filter('document_title_parts', 'new_horizon_document_title_parts');
