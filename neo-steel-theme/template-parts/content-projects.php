<?php
/**
 * Template part for displaying projects
 *
 * @package NEO_STEEL
 */

$projects_query = new WP_Query(array(
    'post_type'      => 'project',
    'posts_per_page' => 6,
    'orderby'        => 'date',
    'order'          => 'DESC',
));

if ($projects_query->have_posts()) :
    ?>
    <div class="projects-grid">
        <?php
        while ($projects_query->have_posts()) :
            $projects_query->the_post();
            $project_meta = neo_steel_get_project_meta();
            ?>
            <div class="project-item">
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
                        
                        <div class="project-excerpt">
                            <?php echo wp_trim_words(get_the_excerpt(), 20); ?>
                        </div>
                        
                        <?php if (!empty($project_meta['client'])) : ?>
                            <div class="project-meta">
                                <span><i class="fas fa-user"></i> <?php echo esc_html($project_meta['client']); ?></span>
                            </div>
                        <?php endif; ?>
                        
                        <a href="<?php the_permalink(); ?>" class="btn btn-primary">View Project</a>
                    </div>
                </div>
            </div>
            <?php
        endwhile;
        wp_reset_postdata();
        ?>
    </div>
    <?php
else :
    // Default placeholder projects
    ?>
    <div class="projects-grid">
        <div class="project-item">
            <div class="project-card">
                <div class="project-content">
                    <h3>Industrial Warehouse Steel Structure</h3>
                    <p>Complete structural steel fabrication and installation for a 50,000 sq ft warehouse facility.</p>
                    <div class="project-meta">
                        <span><i class="fas fa-user"></i> ABC Manufacturing</span>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="project-item">
            <div class="project-card">
                <div class="project-content">
                    <h3>Commercial Building Framework</h3>
                    <p>Structural steel framework for a modern 10-story commercial office building.</p>
                    <div class="project-meta">
                        <span><i class="fas fa-user"></i> Downtown Developers</span>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="project-item">
            <div class="project-card">
                <div class="project-content">
                    <h3>Custom Metalwork & Railings</h3>
                    <p>Precision custom metalwork including decorative railings and architectural features.</p>
                    <div class="project-meta">
                        <span><i class="fas fa-user"></i> Elite Properties</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
endif;
