<?php
/**
 * NEO STEEL Theme Functions
 *
 * @package NEO_STEEL
 */

// Define theme constants
define('NEO_STEEL_VERSION', '1.0.0');
define('NEO_STEEL_THEME_DIR', get_template_directory());
define('NEO_STEEL_THEME_URI', get_template_directory_uri());

/**
 * Theme Setup
 */
function neo_steel_theme_setup() {
    // Add default posts and comments RSS feed links to head
    add_theme_support('automatic-feed-links');
    
    // Let WordPress manage the document title
    add_theme_support('title-tag');
    
    // Enable support for Post Thumbnails
    add_theme_support('post-thumbnails');
    
    // Set default thumbnail sizes
    set_post_thumbnail_size(1200, 675, true);
    add_image_size('neo-steel-hero', 1920, 800, true);
    add_image_size('neo-steel-project', 800, 600, true);
    add_image_size('neo-steel-service', 600, 400, true);
    add_image_size('neo-steel-thumbnail', 400, 300, true);
    
    // Register navigation menus
    register_nav_menus(array(
        'primary' => esc_html__('Primary Menu', 'neo-steel'),
        'footer' => esc_html__('Footer Menu', 'neo-steel'),
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
    
    // Add theme support for custom logo
    add_theme_support('custom-logo', array(
        'height'      => 80,
        'width'       => 250,
        'flex-height' => true,
        'flex-width'  => true,
    ));
    
    // Add support for Block Styles
    add_theme_support('wp-block-styles');
    
    // Add support for full and wide align images
    add_theme_support('align-wide');
    
    // Add support for responsive embeds
    add_theme_support('responsive-embeds');
    
    // Add support for custom background
    add_theme_support('custom-background', array(
        'default-color' => 'ffffff',
    ));
}
add_action('after_setup_theme', 'neo_steel_theme_setup');

/**
 * Set the content width
 */
function neo_steel_content_width() {
    $GLOBALS['content_width'] = apply_filters('neo_steel_content_width', 1200);
}
add_action('after_setup_theme', 'neo_steel_content_width', 0);

/**
 * Register widget areas
 */
function neo_steel_widgets_init() {
    register_sidebar(array(
        'name'          => esc_html__('Sidebar', 'neo-steel'),
        'id'            => 'sidebar-1',
        'description'   => esc_html__('Add widgets here.', 'neo-steel'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));
    
    // Footer widget areas
    for ($i = 1; $i <= 4; $i++) {
        register_sidebar(array(
            'name'          => sprintf(esc_html__('Footer Widget %d', 'neo-steel'), $i),
            'id'            => 'footer-' . $i,
            'description'   => sprintf(esc_html__('Footer widget area %d', 'neo-steel'), $i),
            'before_widget' => '<div class="footer-widget">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3>',
            'after_title'   => '</h3>',
        ));
    }
}
add_action('widgets_init', 'neo_steel_widgets_init');

/**
 * Enqueue scripts and styles
 */
function neo_steel_scripts() {
    // Main stylesheet
    wp_enqueue_style('neo-steel-style', get_stylesheet_uri(), array(), NEO_STEEL_VERSION);
    
    // Additional CSS files
    wp_enqueue_style('neo-steel-main', NEO_STEEL_THEME_URI . '/assets/css/main.css', array(), NEO_STEEL_VERSION);
    wp_enqueue_style('neo-steel-responsive', NEO_STEEL_THEME_URI . '/assets/css/responsive.css', array('neo-steel-main'), NEO_STEEL_VERSION);
    
    // Google Fonts
    wp_enqueue_style('neo-steel-fonts', 'https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&family=Open+Sans:wght@400;600&display=swap', array(), null);
    
    // Font Awesome
    wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css', array(), '6.4.0');
    
    // JavaScript files
    wp_enqueue_script('neo-steel-main', NEO_STEEL_THEME_URI . '/assets/js/main.js', array('jquery'), NEO_STEEL_VERSION, true);
    wp_enqueue_script('neo-steel-forms', NEO_STEEL_THEME_URI . '/assets/js/forms.js', array('jquery'), NEO_STEEL_VERSION, true);
    
    // Localize script for AJAX
    wp_localize_script('neo-steel-forms', 'neoSteelAjax', array(
        'ajaxurl' => admin_url('admin-ajax.php'),
        'nonce'   => wp_create_nonce('neo_steel_nonce'),
    ));
    
    // Comment reply script
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'neo_steel_scripts');

/**
 * Include custom files
 */
require_once NEO_STEEL_THEME_DIR . '/inc/custom-post-types.php';
require_once NEO_STEEL_THEME_DIR . '/inc/theme-functions.php';
require_once NEO_STEEL_THEME_DIR . '/inc/form-handlers.php';

/**
 * Add async/defer attributes to scripts
 */
function neo_steel_add_async_defer($tag, $handle) {
    if ('neo-steel-main' === $handle || 'neo-steel-forms' === $handle) {
        return str_replace(' src', ' defer src', $tag);
    }
    return $tag;
}
add_filter('script_loader_tag', 'neo_steel_add_async_defer', 10, 2);

/**
 * Custom excerpt length
 */
function neo_steel_excerpt_length($length) {
    return 25;
}
add_filter('excerpt_length', 'neo_steel_excerpt_length');

/**
 * Custom excerpt more
 */
function neo_steel_excerpt_more($more) {
    return '...';
}
add_filter('excerpt_more', 'neo_steel_excerpt_more');
