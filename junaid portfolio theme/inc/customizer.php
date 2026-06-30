<?php
/**
 * Theme Customizer Settings
 */

function junaid_customizer_register($wp_customize) {
    
    // ══════════════════════════════════════
    // HERO SECTION
    // ══════════════════════════════════════
    $wp_customize->add_section('junaid_hero_section', array(
        'title'    => __('Hero Section', 'junaid-portfolio'),
        'priority' => 30,
    ));
    
    // Hero Badge
    $wp_customize->add_setting('hero_badge', array(
        'default'           => 'Available for new projects',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ));
    $wp_customize->add_control('hero_badge', array(
        'label'   => __('Badge Text', 'junaid-portfolio'),
        'section' => 'junaid_hero_section',
        'type'    => 'text',
    ));
    
    // Hero Title Line 1
    $wp_customize->add_setting('hero_title_line1', array(
        'default'           => 'WordPress Expert.',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ));
    $wp_customize->add_control('hero_title_line1', array(
        'label'   => __('Title - Line 1', 'junaid-portfolio'),
        'section' => 'junaid_hero_section',
        'type'    => 'text',
    ));
    
    // Hero Title Line 2 (Emphasized)
    $wp_customize->add_setting('hero_title_line2', array(
        'default'           => 'Zero Compromise.',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ));
    $wp_customize->add_control('hero_title_line2', array(
        'label'   => __('Title - Line 2 (Highlighted)', 'junaid-portfolio'),
        'section' => 'junaid_hero_section',
        'type'    => 'text',
    ));
    
    // Hero Description
    $wp_customize->add_setting('hero_description', array(
        'default'           => 'I turn broken WordPress sites into fast, pixel-perfect products — from Figma design to live site, Elementor builds, custom plugins, WooCommerce, and everything in between. Top Rated on Upwork.',
        'sanitize_callback' => 'sanitize_textarea_field',
        'transport'         => 'refresh',
    ));
    $wp_customize->add_control('hero_description', array(
        'label'   => __('Description', 'junaid-portfolio'),
        'section' => 'junaid_hero_section',
        'type'    => 'textarea',
    ));
    
    // Upwork URL
    $wp_customize->add_setting('upwork_url', array(
        'default'           => 'https://www.upwork.com/freelancers/~0139f4995660a6a8ea',
        'sanitize_callback' => 'esc_url_raw',
        'transport'         => 'refresh',
    ));
    $wp_customize->add_control('upwork_url', array(
        'label'   => __('Upwork Profile URL', 'junaid-portfolio'),
        'section' => 'junaid_hero_section',
        'type'    => 'url',
    ));
    
    // ══════════════════════════════════════
    // PROFILE CARD SECTION
    // ══════════════════════════════════════
    $wp_customize->add_section('junaid_profile_section', array(
        'title'    => __('Profile Card', 'junaid-portfolio'),
        'priority' => 31,
    ));
    
    // Profile Name
    $wp_customize->add_setting('profile_name', array(
        'default'           => 'Junaid S.',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ));
    $wp_customize->add_control('profile_name', array(
        'label'   => __('Full Name', 'junaid-portfolio'),
        'section' => 'junaid_profile_section',
        'type'    => 'text',
    ));
    
    // Profile Title
    $wp_customize->add_setting('profile_title', array(
        'default'           => 'WordPress Specialist · Pakistan',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ));
    $wp_customize->add_control('profile_title', array(
        'label'   => __('Profile Title', 'junaid-portfolio'),
        'section' => 'junaid_profile_section',
        'type'    => 'text',
    ));
    
    // Stat - Jobs
    $wp_customize->add_setting('stat_jobs', array(
        'default'           => '38+',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ));
    $wp_customize->add_control('stat_jobs', array(
        'label'   => __('Jobs Done', 'junaid-portfolio'),
        'section' => 'junaid_profile_section',
        'type'    => 'text',
    ));
    
    // Stat - Success
    $wp_customize->add_setting('stat_success', array(
        'default'           => '100%',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ));
    $wp_customize->add_control('stat_success', array(
        'label'   => __('Success Rate', 'junaid-portfolio'),
        'section' => 'junaid_profile_section',
        'type'    => 'text',
    ));
    
    // Stat - Rated
    $wp_customize->add_setting('stat_rated', array(
        'default'           => 'Top',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ));
    $wp_customize->add_control('stat_rated', array(
        'label'   => __('Rated Badge', 'junaid-portfolio'),
        'section' => 'junaid_profile_section',
        'type'    => 'text',
    ));
    
    // Profile Image
    $wp_customize->add_setting('profile_image', array(
        'default'           => get_template_directory_uri() . '/images/My Image.jpeg',
        'sanitize_callback' => 'esc_url_raw',
        'transport'         => 'refresh',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'profile_image', array(
        'label'    => __('Profile Image', 'junaid-portfolio'),
        'section'  => 'junaid_profile_section',
        'settings' => 'profile_image',
    )));
    
    // ══════════════════════════════════════
    // WHY ME SECTION
    // ══════════════════════════════════════
    $wp_customize->add_section('junaid_why_section', array(
        'title'    => __('Why Me Section', 'junaid-portfolio'),
        'priority' => 32,
    ));
    
    // Why Big Stat
    $wp_customize->add_setting('why_big_stat', array(
        'default'           => '100%',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ));
    $wp_customize->add_control('why_big_stat', array(
        'label'   => __('Big Stat Number', 'junaid-portfolio'),
        'section' => 'junaid_why_section',
        'type'    => 'text',
    ));
    
    // Why Stat Label
    $wp_customize->add_setting('why_stat_label', array(
        'default'           => 'Job Success Score on Upwork',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ));
    $wp_customize->add_control('why_stat_label', array(
        'label'   => __('Big Stat Label', 'junaid-portfolio'),
        'section' => 'junaid_why_section',
        'type'    => 'text',
    ));
    
    // Mini Stats
    $mini_stats = array(
        'why_mini_1_num'   => array('label' => 'Mini Stat 1 - Number', 'default' => '38+'),
        'why_mini_1_label' => array('label' => 'Mini Stat 1 - Label', 'default' => 'Completed projects'),
        'why_mini_2_num'   => array('label' => 'Mini Stat 2 - Number', 'default' => '5.0★'),
        'why_mini_2_label' => array('label' => 'Mini Stat 2 - Label', 'default' => 'Average rating'),
        'why_mini_3_num'   => array('label' => 'Mini Stat 3 - Number', 'default' => '24h'),
        'why_mini_3_label' => array('label' => 'Mini Stat 3 - Label', 'default' => 'Avg response time'),
        'why_mini_4_num'   => array('label' => 'Mini Stat 4 - Number', 'default' => '4+'),
        'why_mini_4_label' => array('label' => 'Mini Stat 4 - Label', 'default' => 'Years experience'),
    );
    
    foreach ($mini_stats as $key => $stat) {
        $wp_customize->add_setting($key, array(
            'default'           => $stat['default'],
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'refresh',
        ));
        $wp_customize->add_control($key, array(
            'label'   => __($stat['label'], 'junaid-portfolio'),
            'section' => 'junaid_why_section',
            'type'    => 'text',
        ));
    }
    
    // ══════════════════════════════════════
    // CONTACT SECTION
    // ══════════════════════════════════════
    $wp_customize->add_section('junaid_contact_section', array(
        'title'    => __('Contact Info', 'junaid-portfolio'),
        'priority' => 33,
    ));
    
    // Contact Email
    $wp_customize->add_setting('contact_email', array(
        'default'           => get_option('admin_email'),
        'sanitize_callback' => 'sanitize_email',
        'transport'         => 'refresh',
    ));
    $wp_customize->add_control('contact_email', array(
        'label'   => __('Form Email (where messages go)', 'junaid-portfolio'),
        'section' => 'junaid_contact_section',
        'type'    => 'email',
    ));
    
    // Location
    $wp_customize->add_setting('contact_location', array(
        'default'           => 'Pakistan · Remote worldwide',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ));
    $wp_customize->add_control('contact_location', array(
        'label'   => __('Location', 'junaid-portfolio'),
        'section' => 'junaid_contact_section',
        'type'    => 'text',
    ));
    
    // Response Time
    $wp_customize->add_setting('contact_response_time', array(
        'default'           => 'Usually within a few hours',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ));
    $wp_customize->add_control('contact_response_time', array(
        'label'   => __('Response Time', 'junaid-portfolio'),
        'section' => 'junaid_contact_section',
        'type'    => 'text',
    ));
    
    // ══════════════════════════════════════
    // FOOTER SECTION
    // ══════════════════════════════════════
    $wp_customize->add_section('junaid_footer_section', array(
        'title'    => __('Footer', 'junaid-portfolio'),
        'priority' => 34,
    ));
    
    // Copyright Text
    $wp_customize->add_setting('footer_copyright', array(
        'default'           => '© ' . date('Y') . ' Junaid S. · WordPress Expert · Pakistan',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ));
    $wp_customize->add_control('footer_copyright', array(
        'label'   => __('Copyright Text', 'junaid-portfolio'),
        'section' => 'junaid_footer_section',
        'type'    => 'text',
    ));
}
add_action('customize_register', 'junaid_customizer_register');