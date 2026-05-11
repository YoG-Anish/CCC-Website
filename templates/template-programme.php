<?php
/*
Template Name: All Programme Page
*/
get_header(); ?>

<section class="program-section section neutral-bg">
    <div class="container">
        <div class="section-header center">
            <span class="colored-dots">
                <span class="blue"></span>
                <span class="yellow"></span>
                <span class="red"></span>
            </span>
            <h2 class="main-title h2"><?php the_field('program_title') ?></h2>
        </div>
        <?php
        $program_args = array(
            'post_type' => 'programme',
            'posts_per_page' => -1,
            'orderby' => 'date',
            'order' => 'ASC',
        );
        $program_query = new WP_Query($program_args);
        if ($program_query->have_posts()) :
            echo '<div class="program__list">';
            while ($program_query->have_posts()) : $program_query->the_post();
        ?>
                <div class="program__list-item">
                    <a href="<?php the_permalink(); ?>">
                        <h3 class="program__item-title"><?php the_title(); ?></h3>
                    </a>
                    <p class="program__item-text"><?php the_content(); ?></p>
                </div>
        <?php endwhile;
            echo '</div>';
            wp_reset_postdata();
        else :
            echo '<p>No programmes found.</p>';
        endif;
        ?>
    </div>
</section>

<?php get_footer(); ?>