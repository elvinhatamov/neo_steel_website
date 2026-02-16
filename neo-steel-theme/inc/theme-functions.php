<?php
/**
 * Theme Helper Functions
 *
 * @package NEO_STEEL
 */

/**
 * Default menu fallback
 */
function neo_steel_default_menu() {
    echo '<ul class="nav-menu">';
    echo '<li><a href="' . esc_url(home_url('/')) . '">Home</a></li>';
    echo '<li><a href="' . esc_url(home_url('/about')) . '">About</a></li>';
    echo '<li><a href="' . esc_url(home_url('/services')) . '">Services</a></li>';
    echo '<li><a href="' . esc_url(home_url('/projects')) . '">Projects</a></li>';
    echo '<li><a href="' . esc_url(home_url('/contact')) . '">Contact</a></li>';
    echo '<li><a href="' . esc_url(home_url('/contact')) . '" class="nav-cta">Get a Quote</a></li>';
    echo '</ul>';
}

/**
 * Get project meta data
 */
function neo_steel_get_project_meta($post_id = null) {
    if (!$post_id) {
        $post_id = get_the_ID();
    }
    
    $meta = array(
        'client'          => get_post_meta($post_id, '_project_client', true),
        'completion_date' => get_post_meta($post_id, '_project_completion_date', true),
        'location'        => get_post_meta($post_id, '_project_location', true),
        'category'        => get_post_meta($post_id, '_project_category', true),
        'budget'          => get_post_meta($post_id, '_project_budget', true),
    );
    
    return $meta;
}

/**
 * Get service icon class
 */
function neo_steel_get_service_icon($post_id = null) {
    if (!$post_id) {
        $post_id = get_the_ID();
    }
    
    $icon = get_post_meta($post_id, '_service_icon', true);
    return $icon ? $icon : 'fas fa-cog';
}

/**
 * Get testimonial rating
 */
function neo_steel_get_testimonial_rating($post_id = null) {
    if (!$post_id) {
        $post_id = get_the_ID();
    }
    
    $rating = get_post_meta($post_id, '_testimonial_rating', true);
    return $rating ? intval($rating) : 5;
}

/**
 * Display star rating
 */
function neo_steel_display_rating($rating = 5) {
    $output = '<div class="rating">';
    for ($i = 1; $i <= 5; $i++) {
        if ($i <= $rating) {
            $output .= '<i class="fas fa-star"></i>';
        } else {
            $output .= '<i class="far fa-star"></i>';
        }
    }
    $output .= '</div>';
    return $output;
}

/**
 * Get testimonial client info
 */
function neo_steel_get_testimonial_client($post_id = null) {
    if (!$post_id) {
        $post_id = get_the_ID();
    }
    
    $client = array(
        'name'    => get_post_meta($post_id, '_testimonial_client_name', true),
        'company' => get_post_meta($post_id, '_testimonial_client_company', true),
        'position' => get_post_meta($post_id, '_testimonial_client_position', true),
    );
    
    return $client;
}

/**
 * Custom pagination
 */
function neo_steel_pagination() {
    global $wp_query;
    
    if ($wp_query->max_num_pages <= 1) {
        return;
    }
    
    $big = 999999999;
    
    $links = paginate_links(array(
        'base'      => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
        'format'    => '?paged=%#%',
        'current'   => max(1, get_query_var('paged')),
        'total'     => $wp_query->max_num_pages,
        'prev_text' => '<i class="fas fa-chevron-left"></i> Previous',
        'next_text' => 'Next <i class="fas fa-chevron-right"></i>',
    ));
    
    if ($links) {
        echo '<nav class="pagination">' . $links . '</nav>';
    }
}

/**
 * Breadcrumbs
 */
function neo_steel_breadcrumbs() {
    if (is_front_page()) {
        return;
    }
    
    $home = 'Home';
    $delimiter = ' <i class="fas fa-chevron-right"></i> ';
    
    echo '<div class="breadcrumbs">';
    echo '<a href="' . esc_url(home_url('/')) . '">' . esc_html($home) . '</a>' . $delimiter;
    
    if (is_category()) {
        single_cat_title();
    } elseif (is_single()) {
        the_category(', ');
        echo $delimiter;
        the_title();
    } elseif (is_page()) {
        the_title();
    } elseif (is_search()) {
        echo 'Search Results for "' . get_search_query() . '"';
    } elseif (is_404()) {
        echo 'Page Not Found';
    }
    
    echo '</div>';
}

/**
 * Add meta boxes for custom post types
 */
function neo_steel_add_meta_boxes() {
    // Project meta boxes
    add_meta_box(
        'project_details',
        'Project Details',
        'neo_steel_project_meta_box_callback',
        'project',
        'normal',
        'high'
    );
    
    // Service meta boxes
    add_meta_box(
        'service_details',
        'Service Details',
        'neo_steel_service_meta_box_callback',
        'service',
        'normal',
        'high'
    );
    
    // Testimonial meta boxes
    add_meta_box(
        'testimonial_details',
        'Client Details',
        'neo_steel_testimonial_meta_box_callback',
        'testimonial',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'neo_steel_add_meta_boxes');

/**
 * Project meta box callback
 */
function neo_steel_project_meta_box_callback($post) {
    wp_nonce_field('neo_steel_save_project_meta', 'neo_steel_project_nonce');
    
    $client = get_post_meta($post->ID, '_project_client', true);
    $completion_date = get_post_meta($post->ID, '_project_completion_date', true);
    $location = get_post_meta($post->ID, '_project_location', true);
    $budget = get_post_meta($post->ID, '_project_budget', true);
    
    ?>
    <p>
        <label for="project_client">Client Name:</label><br>
        <input type="text" id="project_client" name="project_client" value="<?php echo esc_attr($client); ?>" style="width: 100%;">
    </p>
    <p>
        <label for="project_completion_date">Completion Date:</label><br>
        <input type="date" id="project_completion_date" name="project_completion_date" value="<?php echo esc_attr($completion_date); ?>" style="width: 100%;">
    </p>
    <p>
        <label for="project_location">Location:</label><br>
        <input type="text" id="project_location" name="project_location" value="<?php echo esc_attr($location); ?>" style="width: 100%;">
    </p>
    <p>
        <label for="project_budget">Budget (optional):</label><br>
        <input type="text" id="project_budget" name="project_budget" value="<?php echo esc_attr($budget); ?>" style="width: 100%;">
    </p>
    <?php
}

/**
 * Service meta box callback
 */
function neo_steel_service_meta_box_callback($post) {
    wp_nonce_field('neo_steel_save_service_meta', 'neo_steel_service_nonce');
    
    $icon = get_post_meta($post->ID, '_service_icon', true);
    
    ?>
    <p>
        <label for="service_icon">Font Awesome Icon Class (e.g., fas fa-tools):</label><br>
        <input type="text" id="service_icon" name="service_icon" value="<?php echo esc_attr($icon); ?>" style="width: 100%;">
        <small>Visit <a href="https://fontawesome.com/icons" target="_blank">Font Awesome</a> to find icon classes.</small>
    </p>
    <?php
}

/**
 * Testimonial meta box callback
 */
function neo_steel_testimonial_meta_box_callback($post) {
    wp_nonce_field('neo_steel_save_testimonial_meta', 'neo_steel_testimonial_nonce');
    
    $client_name = get_post_meta($post->ID, '_testimonial_client_name', true);
    $client_company = get_post_meta($post->ID, '_testimonial_client_company', true);
    $client_position = get_post_meta($post->ID, '_testimonial_client_position', true);
    $rating = get_post_meta($post->ID, '_testimonial_rating', true);
    
    ?>
    <p>
        <label for="testimonial_client_name">Client Name:</label><br>
        <input type="text" id="testimonial_client_name" name="testimonial_client_name" value="<?php echo esc_attr($client_name); ?>" style="width: 100%;">
    </p>
    <p>
        <label for="testimonial_client_company">Company:</label><br>
        <input type="text" id="testimonial_client_company" name="testimonial_client_company" value="<?php echo esc_attr($client_company); ?>" style="width: 100%;">
    </p>
    <p>
        <label for="testimonial_client_position">Position:</label><br>
        <input type="text" id="testimonial_client_position" name="testimonial_client_position" value="<?php echo esc_attr($client_position); ?>" style="width: 100%;">
    </p>
    <p>
        <label for="testimonial_rating">Rating (1-5):</label><br>
        <select id="testimonial_rating" name="testimonial_rating" style="width: 100%;">
            <?php for ($i = 1; $i <= 5; $i++) : ?>
                <option value="<?php echo $i; ?>" <?php selected($rating, $i); ?>><?php echo $i; ?> Star<?php echo $i > 1 ? 's' : ''; ?></option>
            <?php endfor; ?>
        </select>
    </p>
    <?php
}

/**
 * Save meta box data
 */
function neo_steel_save_meta_boxes($post_id) {
    // Project meta
    if (isset($_POST['neo_steel_project_nonce']) && wp_verify_nonce($_POST['neo_steel_project_nonce'], 'neo_steel_save_project_meta')) {
        if (isset($_POST['project_client'])) {
            update_post_meta($post_id, '_project_client', sanitize_text_field($_POST['project_client']));
        }
        if (isset($_POST['project_completion_date'])) {
            update_post_meta($post_id, '_project_completion_date', sanitize_text_field($_POST['project_completion_date']));
        }
        if (isset($_POST['project_location'])) {
            update_post_meta($post_id, '_project_location', sanitize_text_field($_POST['project_location']));
        }
        if (isset($_POST['project_budget'])) {
            update_post_meta($post_id, '_project_budget', sanitize_text_field($_POST['project_budget']));
        }
    }
    
    // Service meta
    if (isset($_POST['neo_steel_service_nonce']) && wp_verify_nonce($_POST['neo_steel_service_nonce'], 'neo_steel_save_service_meta')) {
        if (isset($_POST['service_icon'])) {
            update_post_meta($post_id, '_service_icon', sanitize_text_field($_POST['service_icon']));
        }
    }
    
    // Testimonial meta
    if (isset($_POST['neo_steel_testimonial_nonce']) && wp_verify_nonce($_POST['neo_steel_testimonial_nonce'], 'neo_steel_save_testimonial_meta')) {
        if (isset($_POST['testimonial_client_name'])) {
            update_post_meta($post_id, '_testimonial_client_name', sanitize_text_field($_POST['testimonial_client_name']));
        }
        if (isset($_POST['testimonial_client_company'])) {
            update_post_meta($post_id, '_testimonial_client_company', sanitize_text_field($_POST['testimonial_client_company']));
        }
        if (isset($_POST['testimonial_client_position'])) {
            update_post_meta($post_id, '_testimonial_client_position', sanitize_text_field($_POST['testimonial_client_position']));
        }
        if (isset($_POST['testimonial_rating'])) {
            update_post_meta($post_id, '_testimonial_rating', intval($_POST['testimonial_rating']));
        }
    }
}
add_action('save_post', 'neo_steel_save_meta_boxes');
