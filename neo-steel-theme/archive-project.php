<?php
/**
 * The template for displaying project archives
 *
 * @package NEO_STEEL
 */

get_header();
?>

<div class="archive-projects">
    <section class="page-hero" style="background: linear-gradient(135deg, var(--color-primary-navy) 0%, var(--color-secondary-blue) 100%); padding: 4rem 0; color: white;">
        <div class="container text-center">
            <h1>
                <?php
                if (is_tax('project_category')) {
                    single_term_title();
                } else {
                    esc_html_e('Our Projects', 'neo-steel');
                }
                ?>
            </h1>
            <?php
            if (is_tax('project_category')) {
                $term_description = term_description();
                if (!empty($term_description)) {
                    echo '<p class="archive-description">' . wp_kses_post($term_description) . '</p>';
                }
            }
            ?>
        </div>
    </section>

    <section class="projects-archive section">
        <div class="container">
            <?php if (have_posts()) : ?>
                
                <div class="projects-grid">
                    <?php
                    while (have_posts()) :
                        the_post();
                        $project_meta = neo_steel_get_project_meta();
                        ?>
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
                                
                                <?php
                                $terms = get_the_terms(get_the_ID(), 'project_category');
                                if ($terms && !is_wp_error($terms)) :
                                    ?>
                                    <div class="project-categories">
                                        <?php foreach ($terms as $term) : ?>
                                            <span class="project-category"><?php echo esc_html($term->name); ?></span>
                                        <?php endforeach; ?>
                                    </div>
                                    <?php
                                endif;
                                ?>
                                
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
                        <?php
                    endwhile;
                    ?>
                </div>
                
                <?php
                // Pagination
                neo_steel_pagination();
                ?>
                
            <?php else : ?>
                
                <div class="no-projects text-center">
                    <i class="fas fa-folder-open" style="font-size: 4rem; color: var(--color-secondary-blue);"></i>
                    <h2><?php esc_html_e('No Projects Found', 'neo-steel'); ?></h2>
                    <p><?php esc_html_e('Check back soon for new projects!', 'neo-steel'); ?></p>
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="btn btn-primary">Back to Home</a>
                </div>
                
            <?php endif; ?>
        </div>
    </section>
</div>

<?php
get_footer();
