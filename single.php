<?php get_header(); ?>

   <?php
    if ( have_posts() ) :
        while ( have_posts() ) : the_post(); ?>
           
           <article class="page">
                <h1 ><?php the_title(); ?></h1>
                <h2><?php the_content(); ?></h2>
           </article>
           
        <?php endwhile;
    else :
        echo '<p>No content found</p>';
    endif;
    ?>


<?php get_footer(); ?>
