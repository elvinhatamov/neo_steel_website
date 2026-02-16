<?php
/**
 * The main template file
 *
 * @package NEO_STEEL
 */

get_header();
?>

<div class="container">
    <div class="content-area">
        <?php if (have_posts()) : ?>
            
            <header class="page-header">
                <?php if (is_home() && !is_front_page()) : ?>
                    <h1 class="page-title"><?php single_post_title(); ?></h1>
                <?php elseif (is_archive()) : ?>
                    <?php the_archive_title('<h1 class="page-title">', '</h1>'); ?>
                    <?php the_archive_description('<div class="archive-description">', '</div>'); ?>
                <?php elseif (is_search()) : ?>
                    <h1 class="page-title">
                        <?php
                        /* translators: %s: search query. */
                        printf(esc_html__('Search Results for: %s', 'neo-steel'), '<span>' . get_search_query() . '</span>');
                        ?>
                    </h1>
                <?php endif; ?>
            </header>

            <div class="posts-container">
                <?php
                while (have_posts()) :
                    the_post();
                    ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                        <?php if (has_post_thumbnail()) : ?>
                            <div class="post-thumbnail">
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_post_thumbnail('neo-steel-project'); ?>
                                </a>
                            </div>
                        <?php endif; ?>
                        
                        <header class="entry-header">
                            <?php
                            if (is_singular()) :
                                the_title('<h1 class="entry-title">', '</h1>');
                            else :
                                the_title('<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '">', '</a></h2>');
                            endif;
                            ?>
                            
                            <?php if ('post' === get_post_type()) : ?>
                                <div class="entry-meta">
                                    <span class="posted-on">
                                        <i class="far fa-calendar"></i>
                                        <?php echo esc_html(get_the_date()); ?>
                                    </span>
                                    <span class="byline">
                                        <i class="far fa-user"></i>
                                        <?php echo esc_html(get_the_author()); ?>
                                    </span>
                                </div>
                            <?php endif; ?>
                        </header>
                        
                        <div class="entry-content">
                            <?php
                            if (is_singular()) :
                                the_content();
                            else :
                                the_excerpt();
                            ?>
                                <a href="<?php the_permalink(); ?>" class="read-more btn btn-primary">
                                    <?php esc_html_e('Read More', 'neo-steel'); ?>
                                </a>
                            <?php endif; ?>
                        </div>
                    </article>
                    <?php
                endwhile;
                
                // Pagination
                the_posts_pagination(array(
                    'prev_text' => esc_html__('Previous', 'neo-steel'),
                    'next_text' => esc_html__('Next', 'neo-steel'),
                ));
                ?>
            </div>
            
        <?php else : ?>
            
            <section class="no-results not-found">
                <header class="page-header">
                    <h1 class="page-title"><?php esc_html_e('Nothing Found', 'neo-steel'); ?></h1>
                </header>
                
                <div class="page-content">
                    <?php if (is_home() && current_user_can('publish_posts')) : ?>
                        <p>
                            <?php
                            printf(
                                wp_kses(
                                    /* translators: 1: link to WP admin new post page. */
                                    __('Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'neo-steel'),
                                    array(
                                        'a' => array(
                                            'href' => array(),
                                        ),
                                    )
                                ),
                                esc_url(admin_url('post-new.php'))
                            );
                            ?>
                        </p>
                    <?php elseif (is_search()) : ?>
                        <p><?php esc_html_e('Sorry, but nothing matched your search terms. Please try again with different keywords.', 'neo-steel'); ?></p>
                        <?php get_search_form(); ?>
                    <?php else : ?>
                        <p><?php esc_html_e('It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'neo-steel'); ?></p>
                        <?php get_search_form(); ?>
                    <?php endif; ?>
                </div>
            </section>
            
        <?php endif; ?>
    </div>
</div>

<?php
get_footer();
