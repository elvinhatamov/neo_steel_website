<?php
/**
 * Template part for displaying testimonials
 *
 * @package NEO_STEEL
 */

$testimonials_query = new WP_Query(array(
    'post_type'      => 'testimonial',
    'posts_per_page' => 5,
    'orderby'        => 'rand',
));

if ($testimonials_query->have_posts()) :
    ?>
    <div class="testimonials-slider">
        <div class="testimonials-wrapper">
            <?php
            while ($testimonials_query->have_posts()) :
                $testimonials_query->the_post();
                $rating = neo_steel_get_testimonial_rating();
                $client = neo_steel_get_testimonial_client();
                ?>
                <div class="testimonial-item">
                    <div class="testimonial-content">
                        <div class="testimonial-quote">
                            <i class="fas fa-quote-left"></i>
                        </div>
                        
                        <div class="testimonial-text">
                            <?php the_content(); ?>
                        </div>
                        
                        <div class="testimonial-rating">
                            <?php echo neo_steel_display_rating($rating); ?>
                        </div>
                        
                        <div class="testimonial-author">
                            <?php if (has_post_thumbnail()) : ?>
                                <div class="author-image">
                                    <?php the_post_thumbnail('thumbnail'); ?>
                                </div>
                            <?php endif; ?>
                            
                            <div class="author-info">
                                <strong><?php echo esc_html($client['name'] ? $client['name'] : get_the_title()); ?></strong>
                                <?php if (!empty($client['position']) || !empty($client['company'])) : ?>
                                    <span>
                                        <?php
                                        if (!empty($client['position'])) {
                                            echo esc_html($client['position']);
                                        }
                                        if (!empty($client['position']) && !empty($client['company'])) {
                                            echo ' at ';
                                        }
                                        if (!empty($client['company'])) {
                                            echo esc_html($client['company']);
                                        }
                                        ?>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            endwhile;
            wp_reset_postdata();
            ?>
        </div>
        
        <div class="testimonials-nav">
            <button class="testimonial-prev"><i class="fas fa-chevron-left"></i></button>
            <button class="testimonial-next"><i class="fas fa-chevron-right"></i></button>
        </div>
        
        <div class="testimonials-dots"></div>
    </div>
    <?php
else :
    // Default testimonials
    ?>
    <div class="testimonials-slider">
        <div class="testimonials-wrapper">
            <div class="testimonial-item">
                <div class="testimonial-content">
                    <div class="testimonial-quote">
                        <i class="fas fa-quote-left"></i>
                    </div>
                    <div class="testimonial-text">
                        <p>"NEO STEEL exceeded our expectations with their exceptional craftsmanship and professionalism. They delivered our warehouse project on time and within budget."</p>
                    </div>
                    <div class="testimonial-rating">
                        <?php echo neo_steel_display_rating(5); ?>
                    </div>
                    <div class="testimonial-author">
                        <div class="author-info">
                            <strong>John Anderson</strong>
                            <span>Project Manager at ABC Manufacturing</span>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="testimonial-item">
                <div class="testimonial-content">
                    <div class="testimonial-quote">
                        <i class="fas fa-quote-left"></i>
                    </div>
                    <div class="testimonial-text">
                        <p>"Outstanding quality and attention to detail. The team at NEO STEEL is highly skilled and professional. Highly recommended for any steel fabrication needs."</p>
                    </div>
                    <div class="testimonial-rating">
                        <?php echo neo_steel_display_rating(5); ?>
                    </div>
                    <div class="testimonial-author">
                        <div class="author-info">
                            <strong>Sarah Johnson</strong>
                            <span>Owner at Elite Properties</span>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="testimonial-item">
                <div class="testimonial-content">
                    <div class="testimonial-quote">
                        <i class="fas fa-quote-left"></i>
                    </div>
                    <div class="testimonial-text">
                        <p>"We've partnered with NEO STEEL on multiple projects over the years. Their consistency in quality and reliability makes them our go-to steel fabricator."</p>
                    </div>
                    <div class="testimonial-rating">
                        <?php echo neo_steel_display_rating(5); ?>
                    </div>
                    <div class="testimonial-author">
                        <div class="author-info">
                            <strong>Michael Chen</strong>
                            <span>CEO at Downtown Developers</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="testimonials-nav">
            <button class="testimonial-prev"><i class="fas fa-chevron-left"></i></button>
            <button class="testimonial-next"><i class="fas fa-chevron-right"></i></button>
        </div>
        
        <div class="testimonials-dots"></div>
    </div>
    <?php
endif;
