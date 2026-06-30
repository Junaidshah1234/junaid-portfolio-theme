<?php
/**
 * Custom Post Types & Meta Boxes
 */

// ── Services CPT ──
function junaid_register_services_cpt() {
    $labels = array(
        'name'               => __('Services', 'junaid-portfolio'),
        'singular_name'      => __('Service', 'junaid-portfolio'),
        'add_new'            => __('Add New Service', 'junaid-portfolio'),
        'add_new_item'       => __('Add New Service', 'junaid-portfolio'),
        'edit_item'          => __('Edit Service', 'junaid-portfolio'),
        'new_item'           => __('New Service', 'junaid-portfolio'),
        'view_item'          => __('View Service', 'junaid-portfolio'),
        'search_items'       => __('Search Services', 'junaid-portfolio'),
        'not_found'          => __('No services found', 'junaid-portfolio'),
        'not_found_in_trash' => __('No services found in Trash', 'junaid-portfolio'),
        'all_items'          => __('All Services', 'junaid-portfolio'),
        'menu_name'          => __('Services', 'junaid-portfolio'),
    );
    
    $args = array(
        'labels'              => $labels,
        'public'              => true,
        'has_archive'         => false,
        'publicly_queryable'  => false,
        'show_in_menu'        => true,
        'menu_position'       => 5,
        'menu_icon'           => 'dashicons-hammer',
        'supports'            => array('title', 'editor'),
        'show_in_rest'        => true,
        'rewrite'             => array('slug' => 'service'),
    );
    
    register_post_type('junaid_service', $args);
}
add_action('init', 'junaid_register_services_cpt');

// ── Service Tags Taxonomy ──
function junaid_register_service_tags() {
    $labels = array(
        'name'              => __('Service Tags', 'junaid-portfolio'),
        'singular_name'     => __('Tag', 'junaid-portfolio'),
        'search_items'      => __('Search Tags', 'junaid-portfolio'),
        'all_items'         => __('All Tags', 'junaid-portfolio'),
        'edit_item'         => __('Edit Tag', 'junaid-portfolio'),
        'update_item'       => __('Update Tag', 'junaid-portfolio'),
        'add_new_item'      => __('Add New Tag', 'junaid-portfolio'),
        'new_item_name'     => __('New Tag Name', 'junaid-portfolio'),
        'menu_name'         => __('Tags', 'junaid-portfolio'),
    );
    
    register_taxonomy('service_tag', 'junaid_service', array(
        'labels'            => $labels,
        'hierarchical'      => false,
        'show_admin_column' => true,
        'show_in_rest'      => true,
    ));
}
add_action('init', 'junaid_register_service_tags');

// ── Testimonials CPT ──
function junaid_register_testimonials_cpt() {
    $labels = array(
        'name'               => __('Testimonials', 'junaid-portfolio'),
        'singular_name'      => __('Testimonial', 'junaid-portfolio'),
        'add_new'            => __('Add New Testimonial', 'junaid-portfolio'),
        'add_new_item'       => __('Add New Testimonial', 'junaid-portfolio'),
        'edit_item'          => __('Edit Testimonial', 'junaid-portfolio'),
        'new_item'           => __('New Testimonial', 'junaid-portfolio'),
        'view_item'          => __('View Testimonial', 'junaid-portfolio'),
        'search_items'       => __('Search Testimonials', 'junaid-portfolio'),
        'not_found'          => __('No testimonials found', 'junaid-portfolio'),
        'not_found_in_trash' => __('No testimonials found in Trash', 'junaid-portfolio'),
        'all_items'          => __('All Testimonials', 'junaid-portfolio'),
        'menu_name'          => __('Testimonials', 'junaid-portfolio'),
    );
    
    $args = array(
        'labels'              => $labels,
        'public'              => true,
        'has_archive'         => false,
        'publicly_queryable'  => false,
        'show_in_menu'        => true,
        'menu_position'       => 6,
        'menu_icon'           => 'dashicons-format-chat',
        'supports'            => array('title', 'editor'),
        'show_in_rest'        => true,
    );
    
    register_post_type('junaid_testimonial', $args);
}
add_action('init', 'junaid_register_testimonials_cpt');

// ── Tools CPT ──
function junaid_register_tools_cpt() {
    $labels = array(
        'name'               => __('Tools', 'junaid-portfolio'),
        'singular_name'      => __('Tool', 'junaid-portfolio'),
        'add_new'            => __('Add New Tool', 'junaid-portfolio'),
        'add_new_item'       => __('Add New Tool', 'junaid-portfolio'),
        'edit_item'          => __('Edit Tool', 'junaid-portfolio'),
        'new_item'           => __('New Tool', 'junaid-portfolio'),
        'view_item'          => __('View Tool', 'junaid-portfolio'),
        'search_items'       => __('Search Tools', 'junaid-portfolio'),
        'not_found'          => __('No tools found', 'junaid-portfolio'),
        'not_found_in_trash' => __('No tools found in Trash', 'junaid-portfolio'),
        'all_items'          => __('All Tools', 'junaid-portfolio'),
        'menu_name'          => __('Tools', 'junaid-portfolio'),
    );
    
    $args = array(
        'labels'              => $labels,
        'public'              => true,
        'has_archive'         => false,
        'publicly_queryable'  => false,
        'show_in_menu'        => true,
        'menu_position'       => 7,
        'menu_icon'           => 'dashicons-admin-tools',
        'supports'            => array('title'),
        'show_in_rest'        => true,
    );
    
    register_post_type('junaid_tool', $args);
}
add_action('init', 'junaid_register_tools_cpt');

// ── Process Steps CPT ──
function junaid_register_process_cpt() {
    $labels = array(
        'name'               => __('Process Steps', 'junaid-portfolio'),
        'singular_name'      => __('Process Step', 'junaid-portfolio'),
        'add_new'            => __('Add New Step', 'junaid-portfolio'),
        'add_new_item'       => __('Add New Step', 'junaid-portfolio'),
        'edit_item'          => __('Edit Step', 'junaid-portfolio'),
        'new_item'           => __('New Step', 'junaid-portfolio'),
        'view_item'          => __('View Step', 'junaid-portfolio'),
        'search_items'       => __('Search Steps', 'junaid-portfolio'),
        'not_found'          => __('No steps found', 'junaid-portfolio'),
        'not_found_in_trash' => __('No steps found in Trash', 'junaid-portfolio'),
        'all_items'          => __('All Steps', 'junaid-portfolio'),
        'menu_name'          => __('Process', 'junaid-portfolio'),
    );
    
    $args = array(
        'labels'              => $labels,
        'public'              => true,
        'has_archive'         => false,
        'publicly_queryable'  => false,
        'show_in_menu'        => true,
        'menu_position'       => 8,
        'menu_icon'           => 'dashicons-clock',
        'supports'            => array('title', 'editor', 'page-attributes'),
        'show_in_rest'        => true,
    );
    
    register_post_type('junaid_process', $args);
}
add_action('init', 'junaid_register_process_cpt');

// ── Meta Boxes for Testimonials ──
function junaid_testimonial_meta_boxes() {
    add_meta_box(
        'testimonial_details',
        __('Testimonial Details', 'junaid-portfolio'),
        'junaid_testimonial_details_callback',
        'junaid_testimonial',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'junaid_testimonial_meta_boxes');

function junaid_testimonial_details_callback($post) {
    wp_nonce_field('testimonial_details_nonce', 'testimonial_details_nonce');
    
    $client_name    = get_post_meta($post->ID, '_client_name', true);
    $client_job     = get_post_meta($post->ID, '_client_job', true);
    $rating         = get_post_meta($post->ID, '_rating', true) ?: 5;
    $client_initials = get_post_meta($post->ID, '_client_initials', true);
    ?>
    <style>
        .junaid-meta-field { margin-bottom: 15px; }
        .junaid-meta-field label { display: block; font-weight: 600; margin-bottom: 5px; color: #1d2327; }
        .junaid-meta-field input, .junaid-meta-field select { width: 100%; max-width: 400px; padding: 8px; border: 1px solid #8c8f94; border-radius: 4px; }
        .junaid-meta-field .description { font-size: 12px; color: #646970; margin-top: 4px; }
    </style>
    <div class="junaid-meta-field">
        <label for="client_name"><?php _e('Client Name', 'junaid-portfolio'); ?></label>
        <input type="text" id="client_name" name="client_name" value="<?php echo esc_attr($client_name); ?>" placeholder="e.g., Michael K." />
        <p class="description">Full name of the client</p>
    </div>
    <div class="junaid-meta-field">
        <label for="client_initials"><?php _e('Client Initials', 'junaid-portfolio'); ?></label>
        <input type="text" id="client_initials" name="client_initials" value="<?php echo esc_attr($client_initials); ?>" maxlength="2" placeholder="e.g., MK" />
        <p class="description">2-letter initials for avatar</p>
    </div>
    <div class="junaid-meta-field">
        <label for="client_job"><?php _e('Job/Project', 'junaid-portfolio'); ?></label>
        <input type="text" id="client_job" name="client_job" value="<?php echo esc_attr($client_job); ?>" placeholder="e.g., WordPress Bug Fix · USA" />
    </div>
    <div class="junaid-meta-field">
        <label for="rating"><?php _e('Rating', 'junaid-portfolio'); ?></label>
        <select id="rating" name="rating">
            <?php for ($i = 5; $i >= 1; $i--): ?>
                <option value="<?php echo $i; ?>" <?php selected($rating, $i); ?>><?php echo $i; ?> Stars</option>
            <?php endfor; ?>
        </select>
    </div>
    <?php
}

function junaid_save_testimonial_meta($post_id) {
    if (!isset($_POST['testimonial_details_nonce'])) return;
    if (!wp_verify_nonce($_POST['testimonial_details_nonce'], 'testimonial_details_nonce')) return;
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    if (!current_user_can('edit_post', $post_id)) return;
    
    $fields = array('client_name', 'client_initials', 'client_job', 'rating');
    foreach ($fields as $field) {
        if (isset($_POST[$field])) {
            update_post_meta($post_id, '_' . $field, sanitize_text_field($_POST[$field]));
        }
    }
}
add_action('save_post', 'junaid_save_testimonial_meta');

// ── Meta Boxes for Services ──
function junaid_service_meta_boxes() {
    add_meta_box(
        'service_icon',
        __('Service Icon', 'junaid-portfolio'),
        'junaid_service_icon_callback',
        'junaid_service',
        'side',
        'default'
    );
}
add_action('add_meta_boxes', 'junaid_service_meta_boxes');

function junaid_service_icon_callback($post) {
    wp_nonce_field('service_icon_nonce', 'service_icon_nonce');
    $icon = get_post_meta($post->ID, '_service_icon', true) ?: 'theme';
    $icons = array(
        'figma'       => 'Figma',
        'elementor'   => 'Elementor',
        'bug'         => 'Bug Fixing',
        'plugin'      => 'Custom Plugin',
        'theme'       => 'Theme Dev',
        'woocommerce' => 'WooCommerce',
        'speed'       => 'Speed',
        'security'    => 'Security',
        'migration'   => 'Migration',
    );
    ?>
    <select name="service_icon" style="width:100%;">
        <?php foreach ($icons as $value => $label): ?>
            <option value="<?php echo $value; ?>" <?php selected($icon, $value); ?>><?php echo $label; ?></option>
        <?php endforeach; ?>
    </select>
    <?php
}

function junaid_save_service_meta($post_id) {
    if (!isset($_POST['service_icon_nonce'])) return;
    if (!wp_verify_nonce($_POST['service_icon_nonce'], 'service_icon_nonce')) return;
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    if (!current_user_can('edit_post', $post_id)) return;
    
    if (isset($_POST['service_icon'])) {
        update_post_meta($post_id, '_service_icon', sanitize_text_field($_POST['service_icon']));
    }
}
add_action('save_post', 'junaid_save_service_meta');