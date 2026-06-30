<?php
/**
 * Junaid Portfolio Theme - Functions
 * Version: 1.0
 */

// ── Security Hardening ──
add_filter('xmlrpc_enabled', '__return_false');
remove_action('wp_head', 'wp_generator');

if (!defined('DISALLOW_FILE_EDIT')) {
    define('DISALLOW_FILE_EDIT', true);
}

function junaid_login_errors() {
    return 'Invalid login credentials.';
}
add_filter('login_errors', 'junaid_login_errors');

// ── Performance: Preconnect & DNS Prefetch ──
function junaid_preconnect_dns() {
    echo '<link rel="preconnect" href="https://fonts.googleapis.com">' . "\n";
    echo '<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>' . "\n";
    echo '<link rel="dns-prefetch" href="//fonts.googleapis.com">' . "\n";
    echo '<link rel="dns-prefetch" href="//fonts.gstatic.com">' . "\n";
}
add_action('wp_head', 'junaid_preconnect_dns', 1);

// ── Performance: Defer Google Fonts ──
function junaid_defer_fonts($html, $handle) {
    if ('google-fonts' === $handle) {
        return str_replace(
            "rel='stylesheet'",
            "rel='preload' as='style' onload=\"this.onload=null;this.rel='stylesheet'\"",
            $html
        );
    }
    return $html;
}
add_filter('style_loader_tag', 'junaid_defer_fonts', 10, 2);

// ── Theme Setup ──
function junaid_theme_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo');
    add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption'));
    add_theme_support('customize-selective-refresh-widgets');
    
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'junaid-portfolio'),
        'mobile'  => __('Mobile Menu', 'junaid-portfolio'),
    ));
}
add_action('after_setup_theme', 'junaid_theme_setup');

// ── Enqueue Styles & Scripts ──
function junaid_enqueue_assets() {
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Syne:wght@700;800&display=swap', array(), null);
    wp_enqueue_style('junaid-style', get_stylesheet_uri(), array(), '1.0');
    wp_enqueue_style('junaid-custom', get_template_directory_uri() . '/css/main.css', array(), '1.0');
    wp_enqueue_script('junaid-script', get_template_directory_uri() . '/js/main.js', array(), '1.0', true);
    wp_localize_script('junaid-script', 'junaid_ajax', array(
        'ajax_url' => admin_url('admin-ajax.php'),
        'nonce'    => wp_create_nonce('contact_form_nonce'),
    ));
}
add_action('wp_enqueue_scripts', 'junaid_enqueue_assets');

// ── Include Required Files ──
require_once get_template_directory() . '/inc/cpts.php';
require_once get_template_directory() . '/inc/customizer.php';

// ── Custom Image Sizes ──
add_image_size('testimonial-thumb', 150, 150, true);
add_image_size('service-icon', 100, 100, true);

// ── Contact Form AJAX Handler ──
function junaid_contact_form_submit() {
    if (!wp_verify_nonce($_POST['nonce'], 'contact_form_nonce')) {
        wp_die('Security check failed');
    }
    
    $name    = sanitize_text_field($_POST['name']);
    $email   = sanitize_email($_POST['email']);
    $service = sanitize_text_field($_POST['service']);
    $message = sanitize_textarea_field($_POST['message']);
    
    $to      = get_theme_mod('contact_email', get_option('admin_email'));
    $subject = 'New Contact from ' . $name;
    
    $body  = "Name: $name\n";
    $body .= "Email: $email\n";
    $body .= "Service: $service\n\n";
    $body .= "Message:\n$message";
    
    $headers = array('Content-Type: text/plain; charset=UTF-8', "Reply-To: $name <$email>");
    
    $sent = wp_mail($to, $subject, $body, $headers);
    
    if ($sent) {
        wp_send_json_success('Message sent successfully!');
    } else {
        wp_send_json_error('Failed to send message. Please try again.');
    }
}
add_action('wp_ajax_junaid_contact_form', 'junaid_contact_form_submit');
add_action('wp_ajax_nopriv_junaid_contact_form', 'junaid_contact_form_submit');

// ── Helper: Get Star Rating ──
function junaid_get_stars($rating = 5) {
    $stars = '';
    for ($i = 1; $i <= 5; $i++) {
        $stars .= '<svg viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>';
    }
    return $stars;
}

// ── Helper: Get Service Icon SVG ──
function junaid_get_service_icon($icon_name = 'default') {
    $icons = array(
        'figma'       => '<svg viewBox="0 0 24 24"><rect x="2" y="2" width="9" height="9" rx="2"/><rect x="13" y="2" width="9" height="9" rx="2"/><rect x="2" y="13" width="9" height="9" rx="2"/><circle cx="17.5" cy="17.5" r="4.5"/></svg>',
        'elementor'   => '<svg viewBox="0 0 24 24"><rect x="3" y="3" width="18" height="18" rx="2"/><line x1="9" y1="3" x2="9" y2="21"/><line x1="3" y1="9" x2="9" y2="9"/><line x1="3" y1="15" x2="9" y2="15"/></svg>',
        'bug'         => '<svg viewBox="0 0 24 24"><path d="M12 20h9"/><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"/></svg>',
        'plugin'      => '<svg viewBox="0 0 24 24"><path d="M12 2L2 7l10 5 10-5-10-5z"/><path d="M2 17l10 5 10-5"/><path d="M2 12l10 5 10-5"/></svg>',
        'theme'       => '<svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><path d="M2 12h20"/><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/></svg>',
        'woocommerce' => '<svg viewBox="0 0 24 24"><path d="M6 2 3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"/><line x1="3" y1="6" x2="21" y2="6"/><path d="M16 10a4 4 0 0 1-8 0"/></svg>',
        'speed'       => '<svg viewBox="0 0 24 24"><path d="M13 2L3 14h9l-1 8 10-12h-9l1-8z"/></svg>',
        'security'    => '<svg viewBox="0 0 24 24"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>',
        'migration'   => '<svg viewBox="0 0 24 24"><polyline points="17 1 21 5 17 9"/><path d="M3 11V9a4 4 0 0 1 4-4h14"/><polyline points="7 23 3 19 7 15"/><path d="M21 13v2a4 4 0 0 1-4 4H3"/></svg>',
    );
    return isset($icons[$icon_name]) ? $icons[$icon_name] : $icons['theme'];
}

// ── Helper: Get Tool Icon SVG ──
function junaid_get_tool_icon($tool_name = '') {
    $colors = array(
        'wordpress'   => '#21759b',
        'figma'       => '#EA4C89',
        'woocommerce' => '#96588a',
        'elementor'   => '#e9222d',
        'php'         => '#777bb4',
        'javascript'  => '#f0db4f',
        'css3'        => '#264de4',
        'mysql'       => '#4479a1',
        'postman'     => '#ff6c37',
        'git'         => '#f05032',
        'hostinger'   => '#47cf73',
        'upwork'      => '#1d9b4e',
    );
    
    $color = isset($colors[strtolower($tool_name)]) ? $colors[strtolower($tool_name)] : '#2563eb';
    $abbr  = strtoupper(substr($tool_name, 0, 4));
    
    return '<svg viewBox="0 0 32 32" fill="none"><rect width="32" height="32" rx="6" fill="' . $color . '"/><text x="16" y="22" text-anchor="middle" fill="white" font-size="8" font-weight="bold" font-family="monospace">' . esc_html($abbr) . '</text></svg>';
}

// ── Auto Create Default Data on Theme Activation ──
function junaid_create_default_data() {
    
    if (get_option('junaid_default_data_created')) {
        return;
    }
    
    // Create Default Services
    $default_services = array(
        array('title' => 'Figma to WordPress', 'content' => 'Pixel-perfect conversion of your Figma designs into fully functional, responsive WordPress sites. No shortcuts, no templates — pure custom code that matches your design exactly.', 'icon' => 'figma', 'tags' => array('Figma', 'ACF', 'Custom Theme')),
        array('title' => 'Elementor Builds & Fixes', 'content' => 'Complete Elementor Pro websites, custom widgets, popup fixes, and template creation. I also fix broken Elementor layouts, widget conflicts, and CSS overrides.', 'icon' => 'elementor', 'tags' => array('Elementor Pro', 'Custom CSS', 'Popups')),
        array('title' => 'WordPress Bug Fixing', 'content' => 'White screens, fatal errors, broken layouts, plugin conflicts — I diagnose and fix WordPress problems fast. Typically resolved within 24 hours.', 'icon' => 'bug', 'tags' => array('PHP Errors', 'White Screen', 'Conflicts')),
        array('title' => 'Custom Plugin Development', 'content' => 'Need functionality that no plugin offers? I build clean, secure custom WordPress plugins tailored to your exact requirements — with hooks, filters, and admin panels.', 'icon' => 'plugin', 'tags' => array('OOP PHP', 'REST API', 'WP Hooks')),
        array('title' => 'Custom Theme Development', 'content' => 'Fully custom WordPress themes from scratch — no bloated page builders. Built with Gutenberg blocks, child themes, or classic PHP templates as needed.', 'icon' => 'theme', 'tags' => array('PHP', 'Gutenberg', 'Child Theme')),
        array('title' => 'WooCommerce Setup & Fixes', 'content' => 'Store setup, payment gateway integration, checkout customization, cart bugs, order flow issues, and custom product displays. Your online shop, running perfectly.', 'icon' => 'woocommerce', 'tags' => array('WooCommerce', 'Checkout', 'Payments')),
        array('title' => 'Speed & Performance', 'content' => 'Google PageSpeed 90+ guaranteed. Caching setup, image optimization, database cleanup, CDN configuration, and Core Web Vitals improvement.', 'icon' => 'speed', 'tags' => array('PageSpeed', 'Core Web Vitals', 'CDN')),
        array('title' => 'Security & Malware Removal', 'content' => 'Malware scanning and removal, firewall setup (Wordfence / Sucuri), login hardening, and ongoing security monitoring to keep your site safe.', 'icon' => 'security', 'tags' => array('Malware', 'Firewall', '2FA')),
        array('title' => 'Migration & Backup', 'content' => 'Safe migration to a new host (like Hostinger), zero downtime transfers, and automated backup systems so your site is always recoverable.', 'icon' => 'migration', 'tags' => array('Hostinger', 'Backup', 'Zero Downtime')),
    );
    
    foreach ($default_services as $index => $service) {
        $post_id = wp_insert_post(array(
            'post_title'   => $service['title'],
            'post_content' => $service['content'],
            'post_type'    => 'junaid_service',
            'post_status'  => 'publish',
            'menu_order'   => $index,
        ));
        if ($post_id && !is_wp_error($post_id)) {
            update_post_meta($post_id, '_service_icon', $service['icon']);
            wp_set_object_terms($post_id, $service['tags'], 'service_tag');
        }
    }
    
    // Create Default Testimonials
    $default_testimonials = array(
        array('title' => 'Michael K. Review', 'content' => 'Fixed an issue that three other developers couldn\'t solve. Fast, professional, and communicates clearly at every step. Will definitely hire again.', 'name' => 'Michael K.', 'initials' => 'MK', 'job' => 'WordPress Bug Fix · USA', 'rating' => '5'),
        array('title' => 'Sarah L. Review', 'content' => 'My site was down and Junaid had it back up within an hour. Genuinely impressed with the speed and his diagnostic process. Top-notch freelancer.', 'name' => 'Sarah L.', 'initials' => 'SL', 'job' => 'Site Recovery · UK', 'rating' => '5'),
        array('title' => 'Ahmed R. Review', 'content' => 'Excellent Figma to WordPress conversion. Every detail was matched exactly. He also added responsive behavior that wasn\'t even in the design — proactive and skilled.', 'name' => 'Ahmed R.', 'initials' => 'AR', 'job' => 'Figma to WP · UAE', 'rating' => '5'),
        array('title' => 'James T. Review', 'content' => 'Custom plugin built exactly to spec. Clean code, well commented, and he walked me through how to use it. A developer who actually cares about the quality of his work.', 'name' => 'James T.', 'initials' => 'JT', 'job' => 'Custom Plugin · Canada', 'rating' => '5'),
        array('title' => 'Emma P. Review', 'content' => 'WooCommerce checkout was broken and losing us orders. Junaid diagnosed the issue in minutes and had it fixed within the hour. Absolute lifesaver.', 'name' => 'Emma P.', 'initials' => 'EP', 'job' => 'WooCommerce Fix · Australia', 'rating' => '5'),
        array('title' => 'Rafael B. Review', 'content' => 'PageSpeed went from 38 to 94 after Junaid\'s optimization work. The site feels completely different now. Clients have already noticed the difference.', 'name' => 'Rafael B.', 'initials' => 'RB', 'job' => 'Speed Optimization · Brazil', 'rating' => '5'),
    );
    
    foreach ($default_testimonials as $testimonial) {
        $post_id = wp_insert_post(array(
            'post_title'   => $testimonial['title'],
            'post_content' => $testimonial['content'],
            'post_type'    => 'junaid_testimonial',
            'post_status'  => 'publish',
        ));
        if ($post_id && !is_wp_error($post_id)) {
            update_post_meta($post_id, '_client_name', $testimonial['name']);
            update_post_meta($post_id, '_client_initials', $testimonial['initials']);
            update_post_meta($post_id, '_client_job', $testimonial['job']);
            update_post_meta($post_id, '_rating', $testimonial['rating']);
        }
    }
    
    // Create Default Tools
    $default_tools = array('WordPress', 'Figma', 'WooCommerce', 'Elementor', 'PHP', 'JavaScript', 'CSS3', 'MySQL', 'Postman', 'Git', 'Hostinger', 'Upwork');
    foreach ($default_tools as $index => $tool) {
        wp_insert_post(array(
            'post_title'  => $tool,
            'post_type'   => 'junaid_tool',
            'post_status' => 'publish',
            'menu_order'  => $index,
        ));
    }
    
    // Create Default Process Steps
    $default_steps = array(
        array('title' => 'Share your issue', 'content' => 'Tell me what\'s broken or what you need built. I\'ll ask the right questions to understand exactly what\'s needed.'),
        array('title' => 'I diagnose & plan', 'content' => 'I audit your site, identify root causes, and give you a clear plan with timeline and scope before any work begins.'),
        array('title' => 'Work begins', 'content' => 'I work on a staging environment whenever possible, keeping your live site safe while changes are tested thoroughly.'),
        array('title' => 'Review & deliver', 'content' => 'You review the results. I make adjustments until you\'re satisfied, then hand over with full documentation.'),
    );
    
    foreach ($default_steps as $index => $step) {
        wp_insert_post(array(
            'post_title'   => $step['title'],
            'post_content' => $step['content'],
            'post_type'    => 'junaid_process',
            'post_status'  => 'publish',
            'menu_order'   => $index + 1,
        ));
    }
    
    // Set Default Customizer Values
    $default_customizer = array(
        'hero_badge'            => 'Available for new projects',
        'hero_title_line1'      => 'WordPress Expert.',
        'hero_title_line2'      => 'Zero Compromise.',
        'hero_description'      => 'I turn broken WordPress sites into fast, pixel-perfect products — from Figma design to live site, Elementor builds, custom plugins, WooCommerce, and everything in between. Top Rated on Upwork.',
        'upwork_url'            => 'https://www.upwork.com/freelancers/~0139f4995660a6a8ea',
        'profile_name'          => 'Junaid S.',
        'profile_title'         => 'WordPress Specialist · Pakistan',
        'stat_jobs'             => '38+',
        'stat_success'          => '100%',
        'stat_rated'            => 'Top',
        'why_big_stat'          => '100%',
        'why_stat_label'        => 'Job Success Score on Upwork',
        'why_mini_1_num'        => '38+',
        'why_mini_1_label'      => 'Completed projects',
        'why_mini_2_num'        => '5.0★',
        'why_mini_2_label'      => 'Average rating',
        'why_mini_3_num'        => '24h',
        'why_mini_3_label'      => 'Avg response time',
        'why_mini_4_num'        => '4+',
        'why_mini_4_label'      => 'Years experience',
        'contact_location'      => 'Pakistan · Remote worldwide',
        'contact_response_time' => 'Usually within a few hours',
        'contact_email'         => get_option('admin_email'),
        'footer_copyright'      => '© ' . date('Y') . ' Junaid S. · WordPress Expert · Pakistan',
    );
    
    foreach ($default_customizer as $key => $value) {
        set_theme_mod($key, $value);
    }
    
    update_option('junaid_default_data_created', true);
}
add_action('after_switch_theme', 'junaid_create_default_data');

// Reset on theme switch
function junaid_reset_default_data() {
    delete_option('junaid_default_data_created');
}
add_action('switch_theme', 'junaid_reset_default_data');