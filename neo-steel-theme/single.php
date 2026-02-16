<?php
/**
 * The template for displaying all single posts
 *
 * @package NEO_STEEL
 */

get_header();
?>

<div class="single-post">
    <section class="post-hero" style="background: linear-gradient(135deg, var(--color-primary-navy) 0%, var(--color-secondary-blue) 100%); padding: 3rem 0; color: white;">
        <div class="container">
            <?php the_title('<h1 class="entry-title">', '</h1>'); ?>
            
            <div class="entry-meta">
                <span class="posted-on">
                    <i class="far fa-calendar"></i>
                    <?php echo esc_html(get_the_date()); ?>
                </span>
                <span class="byline">
                    <i class="far fa-user"></i>
                    <?php echo esc_html(get_the_author()); ?>
                </span>
                <?php if (has_category()) : ?>
                    <span class="categories">
                        <i class="far fa-folder"></i>
                        <?php the_category(', '); ?>
                    </span>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <section class="post-content section">
        <div class="container">
            <div class="content-area">
                <?php
                while (have_posts()) :
                    the_post();
                    ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                        <?php if (has_post_thumbnail()) : ?>
                            <div class="post-thumbnail">
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
                        
                        <?php if (has_tag()) : ?>
                            <div class="entry-tags">
                                <i class="fas fa-tags"></i>
                                <?php the_tags('', ', ', ''); ?>
                            </div>
                        <?php endif; ?>
                    </article>
                    <?php
                    
                    // Post navigation
                    the_post_navigation(array(
                        'prev_text' => '<span class="nav-subtitle">' . esc_html__('Previous:', 'neo-steel') . '</span> <span class="nav-title">%title</span>',
                        'next_text' => '<span class="nav-subtitle">' . esc_html__('Next:', 'neo-steel') . '</span> <span class="nav-title">%title</span>',
                    ));
                    
                    // Comments
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
