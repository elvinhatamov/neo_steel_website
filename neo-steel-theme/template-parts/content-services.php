<?php
/**
 * Template part for displaying services
 *
 * @package NEO_STEEL
 */

$services_query = new WP_Query(array(
    'post_type'      => 'service',
    'posts_per_page' => 6,
    'orderby'        => 'menu_order',
    'order'          => 'ASC',
));

if ($services_query->have_posts()) :
    ?>
    <div class="services-grid">
        <?php
        while ($services_query->have_posts()) :
            $services_query->the_post();
            $icon = neo_steel_get_service_icon();
            ?>
            <div class="service-item">
                <div class="service-icon">
                    <i class="<?php echo esc_attr($icon); ?>"></i>
                </div>
                <h3><?php the_title(); ?></h3>
                <p><?php echo wp_trim_words(get_the_excerpt(), 20); ?></p>
                <a href="<?php echo esc_url(home_url('/services')); ?>#service-<?php echo get_the_ID(); ?>" class="service-link">
                    <?php esc_html_e('Learn More', 'neo-steel'); ?>
                    <i class="fas fa-arrow-right"></i>
                </a>
            </div>
            <?php
        endwhile;
        wp_reset_postdata();
        ?>
    </div>
    <?php
else :
    // Default services if none are added
    $default_services = array(
        array('icon' => 'fas fa-building', 'title' => 'Structural Steel Fabrication', 'desc' => 'Custom fabrication of structural steel components for all types of construction projects.'),
        array('icon' => 'fas fa-tools', 'title' => 'Custom Metalwork', 'desc' => 'Precision metalwork tailored to your specific requirements and design specifications.'),
        array('icon' => 'fas fa-hard-hat', 'title' => 'Steel Erection', 'desc' => 'Professional installation and erection of steel structures with safety as our priority.'),
        array('icon' => 'fas fa-cogs', 'title' => 'Industrial Maintenance', 'desc' => 'Ongoing maintenance and repair services to keep your steel structures in optimal condition.'),
        array('icon' => 'fas fa-fire', 'title' => 'Welding Services', 'desc' => 'Expert welding services including MIG, TIG, and arc welding by certified professionals.'),
        array('icon' => 'fas fa-ruler-combined', 'title' => 'Design & Engineering', 'desc' => 'Comprehensive design and engineering support from concept to completion.'),
    );
    ?>
    <div class="services-grid">
        <?php foreach ($default_services as $service) : ?>
            <div class="service-item">
                <div class="service-icon">
                    <i class="<?php echo esc_attr($service['icon']); ?>"></i>
                </div>
                <h3><?php echo esc_html($service['title']); ?></h3>
                <p><?php echo esc_html($service['desc']); ?></p>
            </div>
        <?php endforeach; ?>
    </div>
    <?php
endif;
