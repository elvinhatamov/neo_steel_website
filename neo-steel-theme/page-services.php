<?php
/**
 * Template Name: Services Page
 *
 * @package NEO_STEEL
 */

get_header();
?>

<div class="page-services">
    <!-- Page Hero -->
    <section class="page-hero" style="background: linear-gradient(135deg, var(--color-primary-navy) 0%, var(--color-secondary-blue) 100%); padding: 4rem 0; color: white;">
        <div class="container text-center">
            <h1><?php the_title(); ?></h1>
            <p class="hero-subtitle">Comprehensive Steel Manufacturing & Fabrication Solutions</p>
            <?php neo_steel_breadcrumbs(); ?>
        </div>
    </section>

    <!-- Page Content -->
    <section class="services-intro section">
        <div class="container">
            <?php
            if (have_posts()) :
                while (have_posts()) :
                    the_post();
                    the_content();
                endwhile;
            endif;
            ?>
        </div>
    </section>

    <!-- Services Grid -->
    <section class="services-grid section section-light">
        <div class="container">
            <div class="section-header text-center">
                <h2>Our Services</h2>
                <p>Expert solutions for all your steel fabrication needs</p>
            </div>
            
            <div class="services-container">
                <?php
                $services_query = new WP_Query(array(
                    'post_type'      => 'service',
                    'posts_per_page' => -1,
                    'orderby'        => 'menu_order',
                    'order'          => 'ASC',
                ));
                
                if ($services_query->have_posts()) :
                    while ($services_query->have_posts()) :
                        $services_query->the_post();
                        $icon = neo_steel_get_service_icon();
                        ?>
                        <div class="service-card">
                            <?php if (has_post_thumbnail()) : ?>
                                <div class="service-image">
                                    <?php the_post_thumbnail('neo-steel-service'); ?>
                                </div>
                            <?php endif; ?>
                            
                            <div class="service-content">
                                <div class="service-icon">
                                    <i class="<?php echo esc_attr($icon); ?>"></i>
                                </div>
                                <h3><?php the_title(); ?></h3>
                                <div class="service-excerpt">
                                    <?php the_excerpt(); ?>
                                </div>
                                <a href="#service-<?php echo get_the_ID(); ?>" class="btn btn-primary learn-more">Learn More</a>
                            </div>
                        </div>
                        <?php
                    endwhile;
                    wp_reset_postdata();
                else :
                    // Default services if none are added
                    $default_services = array(
                        array(
                            'icon'  => 'fas fa-building',
                            'title' => 'Structural Steel Fabrication',
                            'desc'  => 'Custom fabrication of structural steel components for commercial, industrial, and residential projects.',
                        ),
                        array(
                            'icon'  => 'fas fa-tools',
                            'title' => 'Custom Metalwork',
                            'desc'  => 'Precision metalwork tailored to your specific requirements and design specifications.',
                        ),
                        array(
                            'icon'  => 'fas fa-hard-hat',
                            'title' => 'Steel Erection',
                            'desc'  => 'Professional installation and erection of steel structures with safety as our priority.',
                        ),
                        array(
                            'icon'  => 'fas fa-cogs',
                            'title' => 'Industrial Maintenance',
                            'desc'  => 'Ongoing maintenance and repair services to keep your steel structures in optimal condition.',
                        ),
                        array(
                            'icon'  => 'fas fa-fire',
                            'title' => 'Welding Services',
                            'desc'  => 'Expert welding services including MIG, TIG, and arc welding by certified professionals.',
                        ),
                        array(
                            'icon'  => 'fas fa-ruler-combined',
                            'title' => 'Design & Engineering',
                            'desc'  => 'Comprehensive design and engineering support from concept to completion.',
                        ),
                    );
                    
                    foreach ($default_services as $service) :
                        ?>
                        <div class="service-card">
                            <div class="service-content">
                                <div class="service-icon">
                                    <i class="<?php echo esc_attr($service['icon']); ?>"></i>
                                </div>
                                <h3><?php echo esc_html($service['title']); ?></h3>
                                <p><?php echo esc_html($service['desc']); ?></p>
                            </div>
                        </div>
                        <?php
                    endforeach;
                endif;
                ?>
            </div>
        </div>
    </section>

    <!-- Detailed Services -->
    <?php
    $services_query = new WP_Query(array(
        'post_type'      => 'service',
        'posts_per_page' => -1,
        'orderby'        => 'menu_order',
        'order'          => 'ASC',
    ));
    
    if ($services_query->have_posts()) :
        ?>
        <section class="services-detailed section">
            <div class="container">
                <?php
                while ($services_query->have_posts()) :
                    $services_query->the_post();
                    $icon = neo_steel_get_service_icon();
                    ?>
                    <div id="service-<?php echo get_the_ID(); ?>" class="service-detail-item">
                        <div class="service-detail-grid">
                            <div class="service-detail-content">
                                <div class="service-icon-large">
                                    <i class="<?php echo esc_attr($icon); ?>"></i>
                                </div>
                                <h3><?php the_title(); ?></h3>
                                <div class="service-detail-text">
                                    <?php the_content(); ?>
                                </div>
                            </div>
                            
                            <?php if (has_post_thumbnail()) : ?>
                                <div class="service-detail-image">
                                    <?php the_post_thumbnail('neo-steel-project'); ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php
                endwhile;
                wp_reset_postdata();
                ?>
            </div>
        </section>
        <?php
    endif;
    ?>

    <!-- Industry Sectors -->
    <section class="industry-sectors section section-dark">
        <div class="container">
            <div class="section-header text-center">
                <h2>Industries We Serve</h2>
                <p>Delivering excellence across multiple sectors</p>
            </div>
            
            <div class="sectors-grid">
                <div class="sector-item">
                    <i class="fas fa-industry"></i>
                    <h4>Manufacturing</h4>
                </div>
                
                <div class="sector-item">
                    <i class="fas fa-building"></i>
                    <h4>Commercial Construction</h4>
                </div>
                
                <div class="sector-item">
                    <i class="fas fa-warehouse"></i>
                    <h4>Warehousing & Logistics</h4>
                </div>
                
                <div class="sector-item">
                    <i class="fas fa-oil-can"></i>
                    <h4>Oil & Gas</h4>
                </div>
                
                <div class="sector-item">
                    <i class="fas fa-bolt"></i>
                    <h4>Energy & Power</h4>
                </div>
                
                <div class="sector-item">
                    <i class="fas fa-bridge"></i>
                    <h4>Infrastructure</h4>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="services-cta section">
        <div class="container text-center">
            <h2>Need a Custom Solution?</h2>
            <p>Contact us to discuss your specific requirements and get a free quote</p>
            <div class="cta-buttons">
                <a href="<?php echo esc_url(home_url('/contact')); ?>" class="btn btn-primary btn-large">Request a Quote</a>
                <a href="<?php echo esc_url(home_url('/projects')); ?>" class="btn btn-secondary btn-large">View Projects</a>
            </div>
        </div>
    </section>
</div>

<?php
get_footer();
