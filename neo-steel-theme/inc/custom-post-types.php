<?php
/**
 * Custom Post Types Registration
 *
 * @package NEO_STEEL
 */

/**
 * Register Projects Custom Post Type
 */
function neo_steel_register_projects_cpt() {
    $labels = array(
        'name'                  => _x('Projects', 'Post Type General Name', 'neo-steel'),
        'singular_name'         => _x('Project', 'Post Type Singular Name', 'neo-steel'),
        'menu_name'             => __('Projects', 'neo-steel'),
        'name_admin_bar'        => __('Project', 'neo-steel'),
        'archives'              => __('Project Archives', 'neo-steel'),
        'attributes'            => __('Project Attributes', 'neo-steel'),
        'parent_item_colon'     => __('Parent Project:', 'neo-steel'),
        'all_items'             => __('All Projects', 'neo-steel'),
        'add_new_item'          => __('Add New Project', 'neo-steel'),
        'add_new'               => __('Add New', 'neo-steel'),
        'new_item'              => __('New Project', 'neo-steel'),
        'edit_item'             => __('Edit Project', 'neo-steel'),
        'update_item'           => __('Update Project', 'neo-steel'),
        'view_item'             => __('View Project', 'neo-steel'),
        'view_items'            => __('View Projects', 'neo-steel'),
        'search_items'          => __('Search Project', 'neo-steel'),
        'not_found'             => __('Not found', 'neo-steel'),
        'not_found_in_trash'    => __('Not found in Trash', 'neo-steel'),
        'featured_image'        => __('Featured Image', 'neo-steel'),
        'set_featured_image'    => __('Set featured image', 'neo-steel'),
        'remove_featured_image' => __('Remove featured image', 'neo-steel'),
        'use_featured_image'    => __('Use as featured image', 'neo-steel'),
        'insert_into_item'      => __('Insert into project', 'neo-steel'),
        'uploaded_to_this_item' => __('Uploaded to this project', 'neo-steel'),
        'items_list'            => __('Projects list', 'neo-steel'),
        'items_list_navigation' => __('Projects list navigation', 'neo-steel'),
        'filter_items_list'     => __('Filter projects list', 'neo-steel'),
    );
    
    $args = array(
        'label'                 => __('Project', 'neo-steel'),
        'description'           => __('Project portfolio items', 'neo-steel'),
        'labels'                => $labels,
        'supports'              => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'),
        'taxonomies'            => array('project_category'),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'menu_icon'             => 'dashicons-portfolio',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'post',
        'show_in_rest'          => true,
        'rewrite'               => array('slug' => 'projects'),
    );
    
    register_post_type('project', $args);
}
add_action('init', 'neo_steel_register_projects_cpt', 0);

/**
 * Register Project Categories Taxonomy
 */
function neo_steel_register_project_taxonomy() {
    $labels = array(
        'name'                       => _x('Project Categories', 'Taxonomy General Name', 'neo-steel'),
        'singular_name'              => _x('Project Category', 'Taxonomy Singular Name', 'neo-steel'),
        'menu_name'                  => __('Categories', 'neo-steel'),
        'all_items'                  => __('All Categories', 'neo-steel'),
        'parent_item'                => __('Parent Category', 'neo-steel'),
        'parent_item_colon'          => __('Parent Category:', 'neo-steel'),
        'new_item_name'              => __('New Category Name', 'neo-steel'),
        'add_new_item'               => __('Add New Category', 'neo-steel'),
        'edit_item'                  => __('Edit Category', 'neo-steel'),
        'update_item'                => __('Update Category', 'neo-steel'),
        'view_item'                  => __('View Category', 'neo-steel'),
        'separate_items_with_commas' => __('Separate categories with commas', 'neo-steel'),
        'add_or_remove_items'        => __('Add or remove categories', 'neo-steel'),
        'choose_from_most_used'      => __('Choose from the most used', 'neo-steel'),
        'popular_items'              => __('Popular Categories', 'neo-steel'),
        'search_items'               => __('Search Categories', 'neo-steel'),
        'not_found'                  => __('Not Found', 'neo-steel'),
        'no_terms'                   => __('No categories', 'neo-steel'),
        'items_list'                 => __('Categories list', 'neo-steel'),
        'items_list_navigation'      => __('Categories list navigation', 'neo-steel'),
    );
    
    $args = array(
        'labels'                     => $labels,
        'hierarchical'               => true,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => true,
        'show_in_rest'               => true,
        'rewrite'                    => array('slug' => 'project-category'),
    );
    
    register_taxonomy('project_category', array('project'), $args);
}
add_action('init', 'neo_steel_register_project_taxonomy', 0);

/**
 * Register Services Custom Post Type
 */
function neo_steel_register_services_cpt() {
    $labels = array(
        'name'                  => _x('Services', 'Post Type General Name', 'neo-steel'),
        'singular_name'         => _x('Service', 'Post Type Singular Name', 'neo-steel'),
        'menu_name'             => __('Services', 'neo-steel'),
        'name_admin_bar'        => __('Service', 'neo-steel'),
        'archives'              => __('Service Archives', 'neo-steel'),
        'attributes'            => __('Service Attributes', 'neo-steel'),
        'parent_item_colon'     => __('Parent Service:', 'neo-steel'),
        'all_items'             => __('All Services', 'neo-steel'),
        'add_new_item'          => __('Add New Service', 'neo-steel'),
        'add_new'               => __('Add New', 'neo-steel'),
        'new_item'              => __('New Service', 'neo-steel'),
        'edit_item'             => __('Edit Service', 'neo-steel'),
        'update_item'           => __('Update Service', 'neo-steel'),
        'view_item'             => __('View Service', 'neo-steel'),
        'view_items'            => __('View Services', 'neo-steel'),
        'search_items'          => __('Search Service', 'neo-steel'),
        'not_found'             => __('Not found', 'neo-steel'),
        'not_found_in_trash'    => __('Not found in Trash', 'neo-steel'),
        'featured_image'        => __('Service Image', 'neo-steel'),
        'set_featured_image'    => __('Set service image', 'neo-steel'),
        'remove_featured_image' => __('Remove service image', 'neo-steel'),
        'use_featured_image'    => __('Use as service image', 'neo-steel'),
        'insert_into_item'      => __('Insert into service', 'neo-steel'),
        'uploaded_to_this_item' => __('Uploaded to this service', 'neo-steel'),
        'items_list'            => __('Services list', 'neo-steel'),
        'items_list_navigation' => __('Services list navigation', 'neo-steel'),
        'filter_items_list'     => __('Filter services list', 'neo-steel'),
    );
    
    $args = array(
        'label'                 => __('Service', 'neo-steel'),
        'description'           => __('Service offerings', 'neo-steel'),
        'labels'                => $labels,
        'supports'              => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 6,
        'menu_icon'             => 'dashicons-admin-tools',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'post',
        'show_in_rest'          => true,
        'rewrite'               => array('slug' => 'services'),
    );
    
    register_post_type('service', $args);
}
add_action('init', 'neo_steel_register_services_cpt', 0);

/**
 * Register Testimonials Custom Post Type
 */
function neo_steel_register_testimonials_cpt() {
    $labels = array(
        'name'                  => _x('Testimonials', 'Post Type General Name', 'neo-steel'),
        'singular_name'         => _x('Testimonial', 'Post Type Singular Name', 'neo-steel'),
        'menu_name'             => __('Testimonials', 'neo-steel'),
        'name_admin_bar'        => __('Testimonial', 'neo-steel'),
        'archives'              => __('Testimonial Archives', 'neo-steel'),
        'attributes'            => __('Testimonial Attributes', 'neo-steel'),
        'parent_item_colon'     => __('Parent Testimonial:', 'neo-steel'),
        'all_items'             => __('All Testimonials', 'neo-steel'),
        'add_new_item'          => __('Add New Testimonial', 'neo-steel'),
        'add_new'               => __('Add New', 'neo-steel'),
        'new_item'              => __('New Testimonial', 'neo-steel'),
        'edit_item'             => __('Edit Testimonial', 'neo-steel'),
        'update_item'           => __('Update Testimonial', 'neo-steel'),
        'view_item'             => __('View Testimonial', 'neo-steel'),
        'view_items'            => __('View Testimonials', 'neo-steel'),
        'search_items'          => __('Search Testimonial', 'neo-steel'),
        'not_found'             => __('Not found', 'neo-steel'),
        'not_found_in_trash'    => __('Not found in Trash', 'neo-steel'),
        'featured_image'        => __('Client Photo', 'neo-steel'),
        'set_featured_image'    => __('Set client photo', 'neo-steel'),
        'remove_featured_image' => __('Remove client photo', 'neo-steel'),
        'use_featured_image'    => __('Use as client photo', 'neo-steel'),
        'insert_into_item'      => __('Insert into testimonial', 'neo-steel'),
        'uploaded_to_this_item' => __('Uploaded to this testimonial', 'neo-steel'),
        'items_list'            => __('Testimonials list', 'neo-steel'),
        'items_list_navigation' => __('Testimonials list navigation', 'neo-steel'),
        'filter_items_list'     => __('Filter testimonials list', 'neo-steel'),
    );
    
    $args = array(
        'label'                 => __('Testimonial', 'neo-steel'),
        'description'           => __('Client testimonials', 'neo-steel'),
        'labels'                => $labels,
        'supports'              => array('title', 'editor', 'thumbnail', 'custom-fields'),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 7,
        'menu_icon'             => 'dashicons-format-quote',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => false,
        'can_export'            => true,
        'has_archive'           => false,
        'exclude_from_search'   => true,
        'publicly_queryable'    => true,
        'capability_type'       => 'post',
        'show_in_rest'          => true,
    );
    
    register_post_type('testimonial', $args);
}
add_action('init', 'neo_steel_register_testimonials_cpt', 0);
