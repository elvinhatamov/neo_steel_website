<?php
/**
 * The template for displaying search results
 *
 * @package NEO_STEEL
 */

get_header();
?>

<div class="search-results">
    <section class="page-hero" style="background: linear-gradient(135deg, var(--color-primary-navy) 0%, var(--color-secondary-blue) 100%); padding: 4rem 0; color: white;">
        <div class="container text-center">
            <h1>
                <?php
                /* translators: %s: search query. */
                printf(esc_html__('Search Results for: %s', 'neo-steel'), '<span>' . get_search_query() . '</span>');
                ?>
            </h1>
            <?php neo_steel_breadcrumbs(); ?>
        </div>
    </section>

    <section class="search-content section">
        <div class="container">
            <div class="search-form-container">
                <?php get_search_form(); ?>
            </div>
            
            <?php if (have_posts()) : ?>
                
                <div class="search-results-info">
                    <p>
                        <?php
                        /* translators: %d: number of search results. */
                        printf(esc_html(_n('%d result found', '%d results found', $wp_query->found_posts, 'neo-steel')), $wp_query->found_posts);
                        ?>
                    </p>
                </div>
                
                <div class="search-results-list">
                    <?php
                    while (have_posts()) :
                        the_post();
                        ?>
                        <article id="post-<?php the_ID(); ?>" <?php post_class('search-result-item'); ?>>
                            <?php if (has_post_thumbnail()) : ?>
                                <div class="result-thumbnail">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_post_thumbnail('neo-steel-thumbnail'); ?>
                                    </a>
                                </div>
                            <?php endif; ?>
                            
                            <div class="result-content">
                                <div class="result-meta">
                                    <span class="result-type"><?php echo esc_html(get_post_type()); ?></span>
                                    <span class="result-date">
                                        <i class="far fa-calendar"></i>
                                        <?php echo esc_html(get_the_date()); ?>
                                    </span>
                                </div>
                                
                                <h2 class="result-title">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_title(); ?>
                                    </a>
                                </h2>
                                
                                <div class="result-excerpt">
                                    <?php the_excerpt(); ?>
                                </div>
                                
                                <a href="<?php the_permalink(); ?>" class="read-more">
                                    <?php esc_html_e('Read More', 'neo-steel'); ?>
                                    <i class="fas fa-arrow-right"></i>
                                </a>
                            </div>
                        </article>
                        <?php
                    endwhile;
                    ?>
                </div>
                
                <?php
                // Pagination
                neo_steel_pagination();
                ?>
                
            <?php else : ?>
                
                <div class="no-results text-center">
                    <i class="fas fa-search" style="font-size: 4rem; color: var(--color-secondary-blue);"></i>
                    <h2><?php esc_html_e('Nothing Found', 'neo-steel'); ?></h2>
                    <p><?php esc_html_e('Sorry, but nothing matched your search terms. Please try again with different keywords.', 'neo-steel'); ?></p>
                </div>
                
            <?php endif; ?>
        </div>
    </section>
</div>

<?php
get_footer();
