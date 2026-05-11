<?php
/*
Template Name: Testimonials
*/
get_header(); ?>

<section class="testimonial-listing-section section">
        <div class="container">
            <div class="section-header center">
                <span class="colored-dots">
                    <span class="blue"></span>
                    <span class="yellow"></span>
                    <span class="red"></span>
                </span>
                <h1 class="main-title h1"> Testimonials</h1>
            </div>
            <div class="testimonial-listing">



                <?php

                    $testimonial_args = array(
                        'post_type' => 'testimonial',
                        'posts_per_page' => -1,
                        'orderby' => 'date',
                        'order' => 'ASC',
                    );

                    $testimonial_query = new WP_Query($testimonial_args);
                    if ($testimonial_query->have_posts()) :
                        while ($testimonial_query->have_posts()) : $testimonial_query->the_post();
                            ?>

                            <div class="testimonial-list-item">
                                <div class="testimonial-card">
                                    <div class="testimonial-card__image">
                                        <?php the_post_thumbnail(); ?>
                                    </div>

                                    <div class="testimonial-card__info">
                                        <h3 class="testimonial-card__name"><?php the_title(); ?></h3>
                                        <span class="testimonial-card__post"><?php echo esc_html(get_field('position')); ?></span>

                                        <div class="testimonial-content">
                                            <p><?php the_content(); ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        <?php endwhile;
                        wp_reset_postdata();
                    else :
                        echo '<p>No testimonials found.</p>';

                    endif;
                ?>


                </div>
            </div>
    </section>




<?php get_footer(); ?>
