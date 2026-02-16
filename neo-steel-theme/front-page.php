<?php
/**
 * The front page template
 *
 * @package NEO_STEEL
 */

get_header();
?>

<!-- Hero Section -->
<section class="hero-section">
    <div class="hero-overlay"></div>
    <div class="hero-content">
        <div class="container">
            <h1 class="hero-title animate-fade-in">NEO STEEL LTD.</h1>
            <p class="hero-tagline animate-fade-in-delay">FROM BLUEPRINT TO BRILLIANCE</p>
            <p class="hero-subtitle animate-fade-in-delay-2">15 Years of Experience in Steel Manufacturing & Fabrication</p>
            <div class="hero-buttons animate-fade-in-delay-3">
                <a href="<?php echo esc_url(home_url('/contact')); ?>" class="btn btn-primary btn-large">Get a Quote</a>
                <a href="<?php echo esc_url(home_url('/services')); ?>" class="btn btn-outline btn-large">Our Services</a>
            </div>
        </div>
    </div>
</section>

<!-- 15 Years Experience Section -->
<section class="experience-section section">
    <div class="container">
        <div class="experience-content">
            <div class="experience-stats">
                <div class="stat-item">
                    <h2 class="stat-number" data-target="15">0</h2>
                    <p class="stat-label">Years of Experience</p>
                </div>
                <div class="stat-item">
                    <h2 class="stat-number" data-target="500">0</h2>
                    <p class="stat-label">Projects Completed</p>
                </div>
                <div class="stat-item">
                    <h2 class="stat-number" data-target="250">0</h2>
                    <p class="stat-label">Satisfied Clients</p>
                </div>
                <div class="stat-item">
                    <h2 class="stat-number" data-target="50">0</h2>
                    <p class="stat-label">Team Members</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Services Overview Section -->
<section class="services-overview section section-light">
    <div class="container">
        <div class="section-header text-center">
            <h2>Our Services</h2>
            <p>Comprehensive steel manufacturing and fabrication solutions</p>
        </div>
        
        <?php get_template_part('template-parts/content', 'services'); ?>
        
        <div class="text-center" style="margin-top: 3rem;">
            <a href="<?php echo esc_url(home_url('/services')); ?>" class="btn btn-primary">View All Services</a>
        </div>
    </div>
</section>

<!-- Featured Projects Section -->
<section class="projects-showcase section">
    <div class="container">
        <div class="section-header text-center">
            <h2>Featured Projects</h2>
            <p>Showcasing our expertise and craftsmanship</p>
        </div>
        
        <?php get_template_part('template-parts/content', 'projects'); ?>
        
        <div class="text-center" style="margin-top: 3rem;">
            <a href="<?php echo esc_url(home_url('/projects')); ?>" class="btn btn-primary">View All Projects</a>
        </div>
    </div>
</section>

<!-- Why Choose Us Section -->
<section class="why-choose-us section section-dark">
    <div class="container">
        <div class="section-header text-center">
            <h2>Why Choose NEO STEEL?</h2>
            <p>Excellence in every aspect of steel fabrication</p>
        </div>
        
        <div class="features-grid">
            <div class="feature-item">
                <div class="feature-icon">
                    <i class="fas fa-certificate"></i>
                </div>
                <h3>Quality Certified</h3>
                <p>ISO certified processes ensuring the highest quality standards in every project.</p>
            </div>
            
            <div class="feature-item">
                <div class="feature-icon">
                    <i class="fas fa-clock"></i>
                </div>
                <h3>On-Time Delivery</h3>
                <p>Commitment to meeting deadlines without compromising on quality.</p>
            </div>
            
            <div class="feature-item">
                <div class="feature-icon">
                    <i class="fas fa-users"></i>
                </div>
                <h3>Expert Team</h3>
                <p>Highly skilled professionals with years of industry experience.</p>
            </div>
            
            <div class="feature-item">
                <div class="feature-icon">
                    <i class="fas fa-shield-alt"></i>
                </div>
                <h3>Safety First</h3>
                <p>Rigorous safety protocols protecting our team and your project.</p>
            </div>
            
            <div class="feature-item">
                <div class="feature-icon">
                    <i class="fas fa-tools"></i>
                </div>
                <h3>Advanced Equipment</h3>
                <p>State-of-the-art machinery for precision and efficiency.</p>
            </div>
            
            <div class="feature-item">
                <div class="feature-icon">
                    <i class="fas fa-handshake"></i>
                </div>
                <h3>Customer Focused</h3>
                <p>Dedicated support throughout your project from start to finish.</p>
            </div>
        </div>
    </div>
</section>

<!-- Testimonials Section -->
<section class="testimonials-section section">
    <div class="container">
        <div class="section-header text-center">
            <h2>What Our Clients Say</h2>
            <p>Trusted by industry leaders</p>
        </div>
        
        <?php get_template_part('template-parts/content', 'testimonials'); ?>
    </div>
</section>

<!-- Contact CTA Section -->
<section class="contact-cta section section-light">
    <div class="container">
        <div class="cta-content text-center">
            <h2>Ready to Start Your Project?</h2>
            <p>Contact us today for a free consultation and quote</p>
            <div class="cta-buttons">
                <a href="<?php echo esc_url(home_url('/contact')); ?>" class="btn btn-primary btn-large">Contact Us</a>
                <a href="tel:+1234567890" class="btn btn-secondary btn-large">
                    <i class="fas fa-phone"></i> Call Now
                </a>
            </div>
        </div>
    </div>
</section>

<?php
get_footer();
