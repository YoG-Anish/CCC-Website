<?php
/*
Template Name: All Community
*/
get_header(); ?>

<?php
$args = array(
    'post_type' => 'community',
    'posts_per_page' => -1,
    'orderby' => 'date',
    'order' => 'ASC',
);
$the_query = new WP_Query( $args );

if ( $the_query->have_posts() ) : 
    while ( $the_query->have_posts() ) : $the_query->the_post();
        the_title();
        the_content();
        the_field('community_location');
    endwhile; endif; wp_reset_postdata();?>


<?php get_footer(); ?>