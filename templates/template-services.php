<?php
/*
Template Name: Services
*/
get_header(); ?>

<section class="image-content-section section">
    <div class="container">
        <div class="image-content__wrapper">
            <div class="image-content__content">
                <span class="colored-dots">
                    <span class="blue"></span>
                    <span class="yellow"></span>
                    <span class="red"></span>
                </span>
                <?php the_field('services_content') ?>
            </div>
            <div class="image-content__image">
                <div class="image-content__image-wrapper">
                    <img src="image/main-banner.jpg" alt="">
                    <img src="image/main-banner.jpg" alt="">
                </div>
            </div>
        </div>
    </div>
</section>

<section class="program-section section">
    <div class="container">
        <div class="section-header center">
            <span class="colored-dots">
                <span class="blue"></span>
                <span class="yellow"></span>
                <span class="red"></span>
            </span>
            <h2 class="main-title h2"><?php the_field('services_section2_title') ?></h2>
        </div>
        <div class="program__list">
            <?php
            $program_args = array(
                'post_type' => 'programme',
                'posts_per_page' => 4,
            );
            $program_query = new WP_Query($program_args);
            if ($program_query->have_posts()) :
                while ($program_query->have_posts()) : $program_query->the_post();
            ?>
                    <div class="program__list-item">
                        <a href="<?php the_permalink(); ?>">
                            <h3 class="program__item-title"><?php the_title(); ?></h3>
                            <p class="program__item-text"><?php the_content(); ?></p>
                        </a>
                    </div>
            <?php endwhile;
                wp_reset_postdata();
            else :
                echo '<p>No programmes found.</p>';
            endif;
            ?>
        </div>
        <div class="program__more-btn-wrapper">
            <a href="<?php echo get_field('all_program') ?>" class="default-btn"><?php echo get_field('all_program_text') ?></a>
        </div>
    </div>
</section>


<?php get_footer(); ?>