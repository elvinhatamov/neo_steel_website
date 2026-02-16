<?php
/**
 * The template for displaying all pages
 *
 * @package NEO_STEEL
 */

get_header();
?>

<div class="page-default">
    <section class="page-hero" style="background: linear-gradient(135deg, var(--color-primary-navy) 0%, var(--color-secondary-blue) 100%); padding: 3rem 0; color: white;">
        <div class="container text-center">
            <h1><?php the_title(); ?></h1>
            <?php neo_steel_breadcrumbs(); ?>
        </div>
    </section>

    <section class="page-content section">
        <div class="container">
            <div class="content-wrapper">
                <?php
                while (have_posts()) :
                    the_post();
                    ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                        <?php if (has_post_thumbnail()) : ?>
                            <div class="page-thumbnail">
                                <?php the_post_thumbnail('neo-steel-hero'); ?>
                            </div>
                        <?php endif; ?>
                        
                        <div class="entry-content">
                            <?php
                            the_content();
                            
                            wp_link_pages(array(
                                'before' => '<div class="page-links">' . esc_html__('Pages:', 'neo-steel'),
                                'after'  => '</div>',
                            ));
                            ?>
                        </div>
                    </article>
                    <?php
                    
                    // If comments are open or we have at least one comment, load up the comment template.
                    if (comments_open() || get_comments_number()) :
                        comments_template();
                    endif;
                    
                endwhile;
                ?>
            </div>
        </div>
    </section>
</div>

<?php
get_footer();
