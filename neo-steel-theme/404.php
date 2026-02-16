<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package NEO_STEEL
 */

get_header();
?>

<div class="error-404 not-found">
    <section class="error-hero" style="background: linear-gradient(135deg, var(--color-primary-navy) 0%, var(--color-secondary-blue) 100%); padding: 4rem 0; color: white;">
        <div class="container text-center">
            <h1 class="error-title">404</h1>
            <p class="error-subtitle"><?php esc_html_e('Page Not Found', 'neo-steel'); ?></p>
        </div>
    </section>

    <section class="error-content section">
        <div class="container text-center">
            <div class="error-icon">
                <i class="fas fa-exclamation-triangle"></i>
            </div>
            
            <h2><?php esc_html_e('Oops! That page can\'t be found.', 'neo-steel'); ?></h2>
            <p><?php esc_html_e('It looks like nothing was found at this location. Maybe try searching?', 'neo-steel'); ?></p>
            
            <div class="error-search">
                <?php get_search_form(); ?>
            </div>
            
            <div class="error-links">
                <a href="<?php echo esc_url(home_url('/')); ?>" class="btn btn-primary">
                    <i class="fas fa-home"></i> Go to Homepage
                </a>
                <a href="<?php echo esc_url(home_url('/contact')); ?>" class="btn btn-secondary">
                    <i class="fas fa-envelope"></i> Contact Us
                </a>
            </div>
        </div>
    </section>

    <!-- Quick Links -->
    <section class="error-quick-links section section-light">
        <div class="container">
            <h3 class="text-center"><?php esc_html_e('Quick Links', 'neo-steel'); ?></h3>
            
            <div class="quick-links-grid">
                <div class="quick-link-item">
                    <i class="fas fa-home"></i>
                    <h4><a href="<?php echo esc_url(home_url('/')); ?>">Home</a></h4>
                </div>
                
                <div class="quick-link-item">
                    <i class="fas fa-info-circle"></i>
                    <h4><a href="<?php echo esc_url(home_url('/about')); ?>">About Us</a></h4>
                </div>
                
                <div class="quick-link-item">
                    <i class="fas fa-tools"></i>
                    <h4><a href="<?php echo esc_url(home_url('/services')); ?>">Services</a></h4>
                </div>
                
                <div class="quick-link-item">
                    <i class="fas fa-folder"></i>
                    <h4><a href="<?php echo esc_url(home_url('/projects')); ?>">Projects</a></h4>
                </div>
                
                <div class="quick-link-item">
                    <i class="fas fa-envelope"></i>
                    <h4><a href="<?php echo esc_url(home_url('/contact')); ?>">Contact</a></h4>
                </div>
            </div>
        </div>
    </section>
</div>

<?php
get_footer();
