<?php
/**
 * Template Name: About Page
 *
 * @package NEO_STEEL
 */

get_header();
?>

<div class="page-about">
    <!-- Page Hero -->
    <section class="page-hero" style="background: linear-gradient(135deg, var(--color-primary-navy) 0%, var(--color-secondary-blue) 100%); padding: 4rem 0; color: white;">
        <div class="container text-center">
            <h1><?php the_title(); ?></h1>
            <?php neo_steel_breadcrumbs(); ?>
        </div>
    </section>

    <!-- Company Introduction -->
    <section class="company-intro section">
        <div class="container">
            <div class="intro-content">
                <?php
                if (have_posts()) :
                    while (have_posts()) :
                        the_post();
                        ?>
                        <div class="content-wrapper">
                            <?php if (has_post_thumbnail()) : ?>
                                <div class="intro-image">
                                    <?php the_post_thumbnail('neo-steel-hero'); ?>
                                </div>
                            <?php endif; ?>
                            
                            <div class="intro-text">
                                <?php the_content(); ?>
                            </div>
                        </div>
                        <?php
                    endwhile;
                endif;
                ?>
            </div>
        </div>
    </section>

    <!-- 15 Years Experience Highlight -->
    <section class="about-experience section section-dark">
        <div class="container text-center">
            <h2>15 Years of Excellence</h2>
            <p class="lead">Since our founding, NEO STEEL LTD. has been at the forefront of steel manufacturing and fabrication.</p>
            
            <div class="experience-stats">
                <div class="stat-item">
                    <h3 class="stat-number" data-target="15">0</h3>
                    <p>Years in Business</p>
                </div>
                <div class="stat-item">
                    <h3 class="stat-number" data-target="500">0</h3>
                    <p>Projects Completed</p>
                </div>
                <div class="stat-item">
                    <h3 class="stat-number" data-target="250">0</h3>
                    <p>Happy Clients</p>
                </div>
                <div class="stat-item">
                    <h3 class="stat-number" data-target="50">0</h3>
                    <p>Expert Team Members</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Mission & Vision -->
    <section class="mission-vision section">
        <div class="container">
            <div class="mission-vision-grid">
                <div class="mission-box">
                    <div class="icon-wrapper">
                        <i class="fas fa-bullseye"></i>
                    </div>
                    <h3>Our Mission</h3>
                    <p>To deliver exceptional steel manufacturing and fabrication services that exceed client expectations while maintaining the highest standards of quality, safety, and environmental responsibility.</p>
                </div>
                
                <div class="vision-box">
                    <div class="icon-wrapper">
                        <i class="fas fa-eye"></i>
                    </div>
                    <h3>Our Vision</h3>
                    <p>To be the leading steel manufacturing company recognized for innovation, reliability, and excellence, transforming blueprints into brilliant structures that stand the test of time.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Core Values -->
    <section class="core-values section section-light">
        <div class="container">
            <div class="section-header text-center">
                <h2>Our Core Values</h2>
                <p>The principles that guide everything we do</p>
            </div>
            
            <div class="values-grid">
                <div class="value-item">
                    <i class="fas fa-award"></i>
                    <h4>Quality Excellence</h4>
                    <p>Uncompromising commitment to delivering the highest quality in every project.</p>
                </div>
                
                <div class="value-item">
                    <i class="fas fa-shield-alt"></i>
                    <h4>Safety First</h4>
                    <p>Creating a safe work environment for our team and clients.</p>
                </div>
                
                <div class="value-item">
                    <i class="fas fa-handshake"></i>
                    <h4>Integrity</h4>
                    <p>Conducting business with honesty, transparency, and ethical standards.</p>
                </div>
                
                <div class="value-item">
                    <i class="fas fa-lightbulb"></i>
                    <h4>Innovation</h4>
                    <p>Embracing new technologies and methods to improve our services.</p>
                </div>
                
                <div class="value-item">
                    <i class="fas fa-users"></i>
                    <h4>Teamwork</h4>
                    <p>Collaborating effectively to achieve outstanding results.</p>
                </div>
                
                <div class="value-item">
                    <i class="fas fa-leaf"></i>
                    <h4>Sustainability</h4>
                    <p>Minimizing environmental impact through responsible practices.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Certifications -->
    <section class="certifications section">
        <div class="container">
            <div class="section-header text-center">
                <h2>Quality Certifications</h2>
                <p>Committed to excellence through certified standards</p>
            </div>
            
            <div class="certifications-content">
                <div class="cert-item">
                    <i class="fas fa-certificate"></i>
                    <h4>ISO 9001:2015</h4>
                    <p>Quality Management System</p>
                </div>
                
                <div class="cert-item">
                    <i class="fas fa-hard-hat"></i>
                    <h4>OSHA Certified</h4>
                    <p>Occupational Safety Standards</p>
                </div>
                
                <div class="cert-item">
                    <i class="fas fa-check-circle"></i>
                    <h4>AWS Certified</h4>
                    <p>American Welding Society</p>
                </div>
                
                <div class="cert-item">
                    <i class="fas fa-industry"></i>
                    <h4>AISC Member</h4>
                    <p>American Institute of Steel Construction</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="about-cta section section-dark">
        <div class="container text-center">
            <h2>Ready to Work With Us?</h2>
            <p>Let's discuss how we can help bring your project to life</p>
            <div class="cta-buttons">
                <a href="<?php echo esc_url(home_url('/contact')); ?>" class="btn btn-primary btn-large">Get in Touch</a>
                <a href="<?php echo esc_url(home_url('/projects')); ?>" class="btn btn-outline btn-large">View Our Work</a>
            </div>
        </div>
    </section>
</div>

<?php
get_footer();
