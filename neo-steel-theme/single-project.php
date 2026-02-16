<?php
/**
 * The template for displaying single projects
 *
 * @package NEO_STEEL
 */

get_header();
?>

<div class="single-project">
    <?php
    while (have_posts()) :
        the_post();
        $project_meta = neo_steel_get_project_meta();
        ?>
        
        <section class="project-hero" style="background: linear-gradient(135deg, var(--color-primary-navy) 0%, var(--color-secondary-blue) 100%); padding: 4rem 0; color: white;">
            <div class="container">
                <?php the_title('<h1 class="project-title">', '</h1>'); ?>
                
                <div class="project-meta-header">
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
                </div>
            </div>
        </section>

        <section class="project-content section">
            <div class="container">
                <div class="project-layout">
                    <div class="project-main">
                        <?php if (has_post_thumbnail()) : ?>
                            <div class="project-featured-image">
                                <?php the_post_thumbnail('neo-steel-hero'); ?>
                            </div>
                        <?php endif; ?>
                        
                        <div class="project-description">
                            <?php the_content(); ?>
                        </div>
                        
                        <?php
                        // Project gallery (if using a gallery plugin or custom fields)
                        $gallery_images = get_post_meta(get_the_ID(), '_project_gallery', true);
                        if (!empty($gallery_images)) :
                            ?>
                            <div class="project-gallery">
                                <h3>Project Gallery</h3>
                                <div class="gallery-grid">
                                    <?php
                                    $image_ids = explode(',', $gallery_images);
                                    foreach ($image_ids as $image_id) :
                                        $image = wp_get_attachment_image($image_id, 'neo-steel-project');
                                        if ($image) :
                                            echo '<div class="gallery-item">' . $image . '</div>';
                                        endif;
                                    endforeach;
                                    ?>
                                </div>
                            </div>
                            <?php
                        endif;
                        ?>
                    </div>
                    
                    <aside class="project-sidebar">
                        <div class="project-details-box">
                            <h3>Project Details</h3>
                            
                            <?php if (!empty($project_meta['client'])) : ?>
                                <div class="detail-item">
                                    <strong><i class="fas fa-user"></i> Client:</strong>
                                    <span><?php echo esc_html($project_meta['client']); ?></span>
                                </div>
                            <?php endif; ?>
                            
                            <?php if (!empty($project_meta['completion_date'])) : ?>
                                <div class="detail-item">
                                    <strong><i class="fas fa-calendar"></i> Completion Date:</strong>
                                    <span><?php echo esc_html(date('F Y', strtotime($project_meta['completion_date']))); ?></span>
                                </div>
                            <?php endif; ?>
                            
                            <?php if (!empty($project_meta['location'])) : ?>
                                <div class="detail-item">
                                    <strong><i class="fas fa-map-marker-alt"></i> Location:</strong>
                                    <span><?php echo esc_html($project_meta['location']); ?></span>
                                </div>
                            <?php endif; ?>
                            
                            <?php if (!empty($project_meta['budget'])) : ?>
                                <div class="detail-item">
                                    <strong><i class="fas fa-dollar-sign"></i> Budget:</strong>
                                    <span><?php echo esc_html($project_meta['budget']); ?></span>
                                </div>
                            <?php endif; ?>
                            
                            <?php
                            $terms = get_the_terms(get_the_ID(), 'project_category');
                            if ($terms && !is_wp_error($terms)) :
                                ?>
                                <div class="detail-item">
                                    <strong><i class="fas fa-tag"></i> Category:</strong>
                                    <span>
                                        <?php
                                        $term_names = array();
                                        foreach ($terms as $term) {
                                            $term_names[] = $term->name;
                                        }
                                        echo esc_html(implode(', ', $term_names));
                                        ?>
                                    </span>
                                </div>
                                <?php
                            endif;
                            ?>
                        </div>
                        
                        <div class="project-cta-box">
                            <h3>Interested in a Similar Project?</h3>
                            <p>Contact us to discuss your requirements</p>
                            <a href="<?php echo esc_url(home_url('/contact')); ?>" class="btn btn-primary btn-block">
                                Get a Quote
                            </a>
                        </div>
                    </aside>
                </div>
            </div>
        </section>

        <!-- Related Projects -->
        <?php
        $related_projects = new WP_Query(array(
            'post_type'      => 'project',
            'posts_per_page' => 3,
            'post__not_in'   => array(get_the_ID()),
            'orderby'        => 'rand',
        ));
        
        if ($related_projects->have_posts()) :
            ?>
            <section class="related-projects section section-light">
                <div class="container">
                    <h2 class="text-center">Related Projects</h2>
                    
                    <div class="projects-grid">
                        <?php
                        while ($related_projects->have_posts()) :
                            $related_projects->the_post();
                            ?>
                            <div class="project-card">
                                <?php if (has_post_thumbnail()) : ?>
                                    <div class="project-image">
                                        <a href="<?php the_permalink(); ?>">
                                            <?php the_post_thumbnail('neo-steel-project'); ?>
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
                                        <?php the_excerpt(); ?>
                                    </div>
                                    <a href="<?php the_permalink(); ?>" class="btn btn-primary">View Project</a>
                                </div>
                            </div>
                            <?php
                        endwhile;
                        wp_reset_postdata();
                        ?>
                    </div>
                </div>
            </section>
            <?php
        endif;
        ?>
        
        <?php
    endwhile;
    ?>
</div>

<?php
get_footer();
