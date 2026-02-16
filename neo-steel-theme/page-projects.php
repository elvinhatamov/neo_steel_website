<?php
/**
 * Template Name: Projects Page
 *
 * @package NEO_STEEL
 */

get_header();
?>

<div class="page-projects">
    <!-- Page Hero -->
    <section class="page-hero" style="background: linear-gradient(135deg, var(--color-primary-navy) 0%, var(--color-secondary-blue) 100%); padding: 4rem 0; color: white;">
        <div class="container text-center">
            <h1><?php the_title(); ?></h1>
            <p class="hero-subtitle">Showcasing Our Excellence in Steel Fabrication</p>
            <?php neo_steel_breadcrumbs(); ?>
        </div>
    </section>

    <!-- Page Content -->
    <section class="projects-intro section">
        <div class="container text-center">
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

    <!-- Project Filters -->
    <section class="projects-gallery section section-light">
        <div class="container">
            <?php
            // Get project categories
            $categories = get_terms(array(
                'taxonomy'   => 'project_category',
                'hide_empty' => true,
            ));
            
            if (!empty($categories) && !is_wp_error($categories)) :
                ?>
                <div class="project-filters text-center">
                    <button class="filter-btn active" data-filter="*">All Projects</button>
                    <?php foreach ($categories as $category) : ?>
                        <button class="filter-btn" data-filter=".<?php echo esc_attr($category->slug); ?>">
                            <?php echo esc_html($category->name); ?>
                        </button>
                    <?php endforeach; ?>
                </div>
                <?php
            endif;
            ?>
            
            <!-- Projects Grid -->
            <div class="projects-grid">
                <?php
                $projects_query = new WP_Query(array(
                    'post_type'      => 'project',
                    'posts_per_page' => -1,
                    'orderby'        => 'date',
                    'order'          => 'DESC',
                ));
                
                if ($projects_query->have_posts()) :
                    while ($projects_query->have_posts()) :
                        $projects_query->the_post();
                        $terms = get_the_terms(get_the_ID(), 'project_category');
                        $term_classes = '';
                        if ($terms && !is_wp_error($terms)) {
                            $term_slugs = array();
                            foreach ($terms as $term) {
                                $term_slugs[] = $term->slug;
                            }
                            $term_classes = implode(' ', $term_slugs);
                        }
                        
                        $project_meta = neo_steel_get_project_meta();
                        ?>
                        <div class="project-item <?php echo esc_attr($term_classes); ?>">
                            <div class="project-card">
                                <?php if (has_post_thumbnail()) : ?>
                                    <div class="project-image">
                                        <a href="<?php the_permalink(); ?>">
                                            <?php the_post_thumbnail('neo-steel-project'); ?>
                                            <div class="project-overlay">
                                                <i class="fas fa-search-plus"></i>
                                            </div>
                                        </a>
                                    </div>
                                <?php endif; ?>
                                
                                <div class="project-content">
                                    <h3>
                                        <a href="<?php the_permalink(); ?>">
                                            <?php the_title(); ?>
                                        </a>
                                    </h3>
                                    
                                    <?php if ($terms && !is_wp_error($terms)) : ?>
                                        <div class="project-categories">
                                            <?php foreach ($terms as $term) : ?>
                                                <span class="project-category"><?php echo esc_html($term->name); ?></span>
                                            <?php endforeach; ?>
                                        </div>
                                    <?php endif; ?>
                                    
                                    <div class="project-excerpt">
                                        <?php the_excerpt(); ?>
                                    </div>
                                    
                                    <?php if (!empty($project_meta['client']) || !empty($project_meta['completion_date'])) : ?>
                                        <div class="project-meta">
                                            <?php if (!empty($project_meta['client'])) : ?>
                                                <span><i class="fas fa-user"></i> <?php echo esc_html($project_meta['client']); ?></span>
                                            <?php endif; ?>
                                            
                                            <?php if (!empty($project_meta['completion_date'])) : ?>
                                                <span><i class="fas fa-calendar"></i> <?php echo esc_html(date('F Y', strtotime($project_meta['completion_date']))); ?></span>
                                            <?php endif; ?>
                                        </div>
                                    <?php endif; ?>
                                    
                                    <a href="<?php the_permalink(); ?>" class="btn btn-primary">View Details</a>
                                </div>
                            </div>
                        </div>
                        <?php
                    endwhile;
                    wp_reset_postdata();
                else :
                    // Default placeholder projects
                    $placeholder_projects = array(
                        array(
                            'title' => 'Industrial Warehouse Steel Structure',
                            'excerpt' => 'Complete structural steel fabrication and installation for a 50,000 sq ft warehouse facility.',
                            'client' => 'ABC Manufacturing',
                            'date' => 'January 2024',
                        ),
                        array(
                            'title' => 'Commercial Building Framework',
                            'excerpt' => 'Structural steel framework for a modern 10-story commercial office building.',
                            'client' => 'Downtown Developers',
                            'date' => 'December 2023',
                        ),
                        array(
                            'title' => 'Custom Metalwork & Railings',
                            'excerpt' => 'Precision custom metalwork including decorative railings and architectural features.',
                            'client' => 'Elite Properties',
                            'date' => 'November 2023',
                        ),
                    );
                    
                    foreach ($placeholder_projects as $project) :
                        ?>
                        <div class="project-item">
                            <div class="project-card">
                                <div class="project-content">
                                    <h3><?php echo esc_html($project['title']); ?></h3>
                                    <p><?php echo esc_html($project['excerpt']); ?></p>
                                    <div class="project-meta">
                                        <span><i class="fas fa-user"></i> <?php echo esc_html($project['client']); ?></span>
                                        <span><i class="fas fa-calendar"></i> <?php echo esc_html($project['date']); ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                    endforeach;
                endif;
                ?>
            </div>
        </div>
    </section>

    <!-- Project Stats -->
    <section class="project-stats section section-dark">
        <div class="container">
            <div class="section-header text-center">
                <h2>Our Track Record</h2>
            </div>
            
            <div class="stats-grid">
                <div class="stat-item">
                    <h3 class="stat-number" data-target="500">0</h3>
                    <p>Completed Projects</p>
                </div>
                
                <div class="stat-item">
                    <h3 class="stat-number" data-target="250">0</h3>
                    <p>Satisfied Clients</p>
                </div>
                
                <div class="stat-item">
                    <h3 class="stat-number" data-target="1000000">0</h3>
                    <p>Sq Ft Fabricated</p>
                </div>
                
                <div class="stat-item">
                    <h3 class="stat-number" data-target="15">0</h3>
                    <p>Years Experience</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="projects-cta section">
        <div class="container text-center">
            <h2>Start Your Project Today</h2>
            <p>Let us help you bring your vision to life with our expert steel fabrication services</p>
            <div class="cta-buttons">
                <a href="<?php echo esc_url(home_url('/contact')); ?>" class="btn btn-primary btn-large">Get a Quote</a>
                <a href="<?php echo esc_url(home_url('/services')); ?>" class="btn btn-secondary btn-large">Our Services</a>
            </div>
        </div>
    </section>
</div>

<?php
get_footer();
