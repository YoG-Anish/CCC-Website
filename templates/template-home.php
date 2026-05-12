<?php
/*
Template Name: Home
*/

get_header(); ?>

<main>
    <section class="main-banner-section section">
        <div class="container">
            <div class="main-banner__content">
                <div class="main-banner__image">
                    <?php
                    $front_page_id = get_option('page_on_front');
                    if (has_post_thumbnail($front_page_id)) :
                        echo get_the_post_thumbnail($front_page_id, 'full', array('alt' => get_the_title($front_page_id)));
                    else :
                        echo '<p>No featured image found for the front page.</p>';
                    endif;
                    ?>
                </div>
                <div class="main-banner__icon-list">
                    <?php
                    $banner_image1 = get_field('banner_image1');
                    $banner_image2 = get_field('banner_image2');
                    $banner_image3 = get_field('banner_image3');
                    ?>
                    <div class="main-banner__icon-list-item">
                        <span class="icon">
                            <?php if ($banner_image1) : ?>
                                <img src="<?php echo esc_url($banner_image1['url']); ?>" alt="<?php echo esc_attr($banner_image1['alt']); ?>">
                            <?php endif; ?>
                        </span>
                        <span class="text"><?php echo get_field('banner_item1'); ?></span>
                    </div>
                    <div class="main-banner__icon-list-item">
                        <span class="icon">
                            <?php if ($banner_image2) : ?>
                                <img src="<?php echo esc_url($banner_image2['url']); ?>" alt="<?php echo esc_attr($banner_image2['alt']); ?>">
                            <?php endif; ?>
                        </span>
                        <span class="text"><?php echo get_field('banner_item2'); ?></span>
                    </div>
                    <div class="main-banner__icon-list-item">
                        <span class="icon">
                            <?php if ($banner_image3) : ?>
                                <img src="<?php echo esc_url($banner_image3['url']); ?>" alt="<?php echo esc_attr($banner_image3['alt']); ?>">
                            <?php endif; ?>
                        </span>
                        <span class="text"><?php echo get_field('banner_item3'); ?></span>
                    </div>
                </div>
            </div>
        </div>
    </section>
2
    <section class="rich-text-section section">
        <div class="container">
            <div class="rich-text__content">
                <div class="rich-text__text">
                    <p><?php echo get_field('banner_description') ?></p>
                </div>
                <div class="rich-text__button">
                    <a href="<?php echo get_field('banner_link') ?>" class="default-btn"><?php echo get_field('banner_link_text') ?></a>
                </div>
            </div>
        </div>
    </section>

    <section class="about-section section">
        <div class="container">
            <div class="about__content">
                <?php
                $home_about_image = get_field('home_about_image');
                if ($home_about_image) : ?>
                    <div class="about__image">
                        <img src="<?php echo esc_url($home_about_image['url']); ?>" alt="<?php echo esc_attr($home_about_image['alt']); ?>">
                    </div>
                <?php endif; ?>
                <div class="about__text">
                    <span class="colored-dots">
                        <span class="blue"></span>
                        <span class="yellow"></span>
                        <span class="red"></span>
                    </span>
                    <?php echo get_field('home_about_content') ?>
                    <div class="about__button">
                        <a href="<?php echo get_field('about_link') ?>/About" title="" class="default-btn"><?php echo get_field('about_link_text') ?></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="team-listing-section section">
        <div class="container">
            <div class="section-header center">
                <span class="colored-dots">
                    <span class="blue"></span>
                    <span class="yellow"></span>
                    <span class="red"></span>
                </span>
                <?php echo get_field('home_team_content') ?>
            </div>
            <?php
            $team_args = array(
                'post_type' => 'team_member',
                'posts_per_page' => 3,
            );
            $team_query = new WP_Query($team_args);
            if ($team_query->have_posts()) :
                echo '<div class="team-listing__list">';
                while ($team_query->have_posts()) : $team_query->the_post();
                    $position = get_field('position');
            ?>
                    <div class="team-card">
                        <div class="team-card__image">
                            <?php the_post_thumbnail(); ?>
                        </div>
                        <div class="team-card__info">
                            <h3 class="team-card__name"><?php the_title(); ?></h3>
                            <p class="team-card__position"><?php echo esc_html($position); ?></p>
                            <a href="<?php the_permalink(); ?>" class="text-btn">
                                Learn More
                                <span class="icon">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M8 5V19L19 12L8 5Z" fill="#757575" />
                                    </svg>
                                </span>
                            </a>
                            <div class="team-card__social-links">
                                <?php
                                $facebook = get_field('facebook_url');
                                $instagram = get_field('instagram_url');
                                $twitter = get_field('twitter_url');
                                $linkedin = get_field('linkedin_url');
                                ?>
                                <?php if ($facebook) : ?>
                                    <a href="<?php echo esc_url($facebook); ?>" title="" class="icon icon-facebook">
                                        <!-- Facebook SVG -->
                                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M4.93848 7.46094V10.4609H7.18848V15.7109H10.1885V10.4609H12.4385L13.1885 7.46094H10.1885V5.96094C10.1885 5.76203 10.2675 5.57126 10.4081 5.43061C10.5488 5.28996 10.7396 5.21094 10.9385 5.21094H13.1885V2.21094H10.9385C9.94392 2.21094 8.99009 2.60603 8.28683 3.30929C7.58356 4.01255 7.18848 4.96638 7.18848 5.96094V7.46094H4.93848Z" stroke="#282828" stroke-width="1.125" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </a>
                                <?php endif; ?>
                                <?php if ($instagram) : ?>
                                    <a href="<?php echo esc_url($instagram); ?>" title="" class="icon icon-instagram">
                                        <!-- Instagram SVG -->
                                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M12.2422 2.39844C14.2097 2.39844 15.8047 3.99342 15.8047 5.96094V11.9609C15.8047 13.9285 14.2097 15.5234 12.2422 15.5234H6.24219C4.27467 15.5234 2.67969 13.9285 2.67969 11.9609V5.96094C2.67969 3.99342 4.27467 2.39844 6.24219 2.39844H12.2422ZM6.24219 3.52344C4.89599 3.52344 3.80469 4.61474 3.80469 5.96094V11.9609C3.80469 13.3071 4.89599 14.3984 6.24219 14.3984H12.2422C13.5884 14.3984 14.6797 13.3071 14.6797 11.9609V5.96094C14.6797 4.61474 13.5884 3.52344 12.2422 3.52344H6.24219ZM9.24219 6.14844C10.7955 6.14844 12.0547 7.40764 12.0547 8.96094C12.0547 10.5142 10.7955 11.7734 9.24219 11.7734C7.68889 11.7734 6.42969 10.5142 6.42969 8.96094C6.42969 7.40764 7.68889 6.14844 9.24219 6.14844ZM9.24219 7.27344C8.31021 7.27344 7.55469 8.02896 7.55469 8.96094C7.55469 9.89292 8.31021 10.6484 9.24219 10.6484C10.1742 10.6484 10.9297 9.89292 10.9297 8.96094C10.9297 8.02896 10.1742 7.27344 9.24219 7.27344ZM12.6172 5.02344C12.9278 5.02344 13.1797 5.27528 13.1797 5.58594V5.58691C13.1797 5.89757 12.9278 6.14941 12.6172 6.14941C12.3065 6.14941 12.0547 5.89757 12.0547 5.58691V5.58594C12.0547 5.27528 12.3065 5.02344 12.6172 5.02344Z" fill="#282828" />
                                        </svg>
                                    </a>
                                <?php endif; ?>
                                <?php if ($twitter) : ?>
                                    <a href="<?php echo esc_url($twitter); ?>" title="" class="icon icon-twitter">
                                        <!-- Twitter SVG -->
                                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M16.2275 2.92963C15.4775 3.29713 14.7425 3.44638 13.9775 3.67213C13.1368 2.72338 11.8903 2.67088 10.6925 3.11938C9.49479 3.56788 8.71029 4.66438 8.72754 5.92213V6.67213C6.29379 6.73438 4.12629 5.62588 2.72754 3.67213C2.72754 3.67213 -0.408961 9.24688 5.72754 11.9221C4.32354 12.8574 2.92329 13.4881 1.22754 13.4221C3.70854 14.7744 6.41229 15.2394 8.75304 14.5599C11.438 13.7799 13.6445 11.7676 14.4913 8.75338C14.7439 7.83663 14.8693 6.88952 14.864 5.93863C14.8625 5.75188 15.9965 3.85963 16.2275 2.92888V2.92963Z" stroke="#282828" stroke-width="1.125" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </a>
                                <?php endif; ?>
                                <?php if ($linkedin) : ?>
                                    <a href="<?php echo esc_url($linkedin); ?>" title="" class="icon icon-linkedin">
                                        <!-- LinkedIn SVG -->
                                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <g clip-path="url(#clip0_1112_1153)">
                                                <path d="M15.5906 15.6631H12.3402C12.1102 15.6631 11.9244 15.4773 11.9244 15.2474V10.0127C11.9244 8.21747 10.9984 8.21747 10.6929 8.21747C9.87087 8.21747 9.52127 8.86629 9.40788 9.14662C9.35433 9.27262 9.32912 9.48678 9.32912 9.78601V15.2506C9.32912 15.4805 9.14331 15.6663 8.91341 15.6663H5.65986C5.54963 15.6663 5.44253 15.6222 5.3638 15.5435C5.28506 15.4648 5.24097 15.3576 5.24411 15.2474C5.24411 15.1592 5.2882 6.38128 5.24411 5.48364C5.23781 5.37025 5.27875 5.26001 5.3575 5.17812C5.43625 5.09623 5.54333 5.04898 5.65984 5.04898H8.91341C9.14331 5.04898 9.32914 5.23479 9.32914 5.46472V5.71039C9.87717 5.2222 10.6677 4.81904 11.8457 4.81904C14.4504 4.81904 16.0063 6.62061 16.0063 9.63793V15.2474C16.0063 15.4773 15.8205 15.6631 15.5906 15.6631ZM12.7559 14.8317L15.178 14.8316V9.63789C15.178 7.10245 13.9654 5.6505 11.8488 5.6505C10.4347 5.6505 9.74805 6.35601 9.31655 7.00168C9.26616 7.17176 9.10552 7.29776 8.91655 7.29776H8.89452C8.74331 7.29776 8.60473 7.21586 8.53231 7.08359C8.47563 6.97964 8.46302 6.85995 8.50081 6.74971V5.87729H6.08506C6.10711 7.61273 6.08506 13.2285 6.07877 14.8285H8.49766V9.78281C8.49766 9.36392 8.54175 9.06156 8.63623 8.83164C9.00159 7.9277 9.77008 7.38282 10.6898 7.38282C12 7.38282 12.7527 8.34032 12.7527 10.0096V14.8316H12.7559L12.7559 14.8317ZM3.86144 15.6631H0.607891C0.377969 15.6631 0.192156 15.4772 0.192156 15.2473V5.46468C0.192156 5.23476 0.377969 5.04893 0.607891 5.04893H3.86144C4.09136 5.04893 4.27717 5.23476 4.27717 5.46467V15.2473C4.27717 15.4773 4.09136 15.6631 3.86144 15.6631V15.6631ZM1.02366 14.8316H3.44569V5.8804H1.02367L1.02366 14.8316ZM2.23623 4.54498L2.21417 4.54496C0.932281 4.54496 0 3.65678 0 2.43473C0 1.21584 0.948031 0.327637 2.25827 0.327637C3.54645 0.327637 4.46616 1.19062 4.49136 2.42528C4.49136 3.65678 3.54333 4.54498 2.23623 4.54498ZM2.25827 1.16229C1.40472 1.16229 0.8315 1.67568 0.8315 2.4379C0.8315 3.1875 1.39844 3.71348 2.21419 3.71348H2.23622C3.08663 3.71348 3.65984 3.20009 3.65984 2.43789C3.64409 1.66623 3.09292 1.16229 2.25827 1.16229Z" fill="#282828" />
                                            </g>
                                            <defs>
                                                <clipPath id="clip0_1112_1153">
                                                    <rect width="16" height="16" fill="white" />
                                                </clipPath>
                                            </defs>
                                        </svg>
                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
            <?php endwhile;
                echo '</div>';
                wp_reset_postdata();
            else :
                echo '<p>No team members found.</p>';
            endif;
            ?>
        </div>
    </section>

    <section class="work-with-section section">
        <div class="container">
            <div class="work-with__wrapper">
                <div class="work-with__info">
                    <span class="colored-dots">
                        <span class="white"></span>
                        <span class="white"></span>
                        <span class="white"></span>
                    </span>
                    <?php echo get_field('home_work_content') ?>
                </div>
                <?php
                $home_work_image = get_field('home_work_image');
                if ($home_work_image) : ?>
                    <div class="work-with__image">
                        <img src="<?php echo esc_url($home_work_image['url']); ?>" alt="<?php echo esc_attr($home_work_image['alt']); ?>">
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <section class="service-section section">
        <div class="container">
            <div class="section-header center">
                <span class="colored-dots">
                    <span class="blue"></span>
                    <span class="yellow"></span>
                    <span class="red"></span>
                </span>
                <h2 class="main-title h2"><?php echo get_field('home_services_title') ?></h2>
            </div>
            <?php echo get_field('home_services_content') ?>
        </div>
        </div>
    </section>
    <!--  Programme section -->
    <section class="program-section section neutral-bg">
        <div class="container">
            <div class="section-header center">
                <span class="colored-dots">
                    <span class="blue"></span>
                    <span class="yellow"></span>
                    <span class="red"></span>
                </span>
                <h2 class="main-title h2"><?php echo get_field('home_programmes_title') ?></h2>
            </div>
            <?php
            $program_args = array(
                'post_type' => 'programme',
                'posts_per_page' => 4,
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
    <!--  End of Programme section -->
    <section class="partner-section section">
        <div class="container">
            <div class="section-header center">
                <span class="colored-dots">
                    <span class="blue"></span>
                    <span class="yellow"></span>
                    <span class="red"></span>
                </span>
                <?php echo get_field('home_partner_heading') ?>
            </div>
            <div class="parnter__wrapper">
                <div class="partner__banner-image">
                    <?php
                    $home_partner_image = get_field('home_partner_image');
                    if ($home_partner_image) : ?>
                        <img src="<?php echo esc_url($home_partner_image['url']); ?>" alt="<?php echo esc_attr($home_partner_image['alt']); ?>">
                    <?php endif; ?>
                </div>
                <div class="partner__lists-wrapper">
                    <div class="partner__lists">
                        <?php
                        $partner_args = array(
                            'post_type' => 'partner',
                            'posts_per_page' => 4,
                        )
                        ?>
                        <?php
                        $partner_query = new WP_Query($partner_args);
                        if ($partner_query->have_posts()) :
                            while ($partner_query->have_posts()) : $partner_query->the_post(); ?>
                                <div class="parnter__item">
                                    <span class="partner__icon">
                                        <img src="<?php echo get_template_directory_uri(); ?>/image/partner.png" alt="">
                                    </span>
                                    <span class="parnter__name"><?php the_title(); ?></span>
                                </div>
                        <?php endwhile;
                            wp_reset_postdata();
                        else :
                            echo '<p>No programmes found.</p>';
                        endif;
                        ?>
                    </div>
                    <div class="partner__more-btn-wrapper">
                        <a href="<?php echo get_field('home_partner_text_link') ?>" class="default-btn"><?php echo get_field('home_partner_text') ?></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="engagement-section section neutral-bg">
        <div class="container">
            <div class="section-header center">
                <span class="colored-dots">
                    <span class="blue"></span>
                    <span class="yellow"></span>
                    <span class="red"></span>
                </span>
                <?php echo get_field('home_community_heading') ?>
            </div>
            <div class="engagement-list-wrapper">
                <?php
                $community_args = array(
                    'post_type'      => 'community',
                    'posts_per_page' => 4,
                    'post_status'    => 'publish'
                );
                $community_query = new WP_Query($community_args);
                if ($community_query->have_posts()) :
                ?>
                    <div class="engagement-list">
                        <?php
                        while ($community_query->have_posts()) : $community_query->the_post();
                        ?>
                            <div class="engagement-list__item">
                                <div class="engagement-list__icon">
                                    <img src="<?php echo get_template_directory_uri(); ?>/image/engagement.svg" alt="">
                                </div>
                                <div class="engagement-list__info">
                                    <h3 class="engagement-list__title"><?php the_title(); ?></h3>
                                    <span class="engagement-list__location">
                                        <?php echo esc_html(get_field('community_location')); ?>
                                    </span>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    </div>
                <?php
                    wp_reset_postdata();
                endif;
                ?>
                <div class="engagement-more-btn-wrapper">
                    <a href="<?php echo get_field('home_community_text_link') ?>" class="default-btn"><?php echo get_field('home_community_text') ?></a>
                </div>
            </div>
        </div>
    </section>

    <section class="icon-list-section section">
        <div class="container">
            <div class="section-header center">
                <span class="colored-dots">
                    <span class="blue"></span>
                    <span class="yellow"></span>
                    <span class="red"></span>
                </span>
                <h2 class="main-title h2"><?php echo get_field('home_whyus_heading') ?></h2>
            </div>
            <div class="icon-list-wrapper">
                <?php
                // 1. Get the data from your Pods repeater field.
                // Change 'your_pods_field_name' to the actual name of your field in Pods!
                // The 'false' at the end tells WordPress to give us an array (a list) of all the repeated items.
                $list_items = get_post_meta(get_the_ID(), 'why_choose_us_content', false);

                // 2. Check if the field actually has data before we output the HTML
                if (! empty($list_items)) :
                ?>
                    <div class="icon-list__list">
                        <?php
                        // 3. Loop through each text item from Pods
                        foreach ($list_items as $item_text) :
                        ?>
                            <div class="icon-list__item">
                                <span class="icon-list__icon">
                                    <!-- This image stays exactly the same for every row -->
                                    <img src="<?php echo get_template_directory_uri(); ?>/image/icon1.svg" alt="">
                                </span>

                                <span class="icon-list__text">
                                    <!-- This text changes dynamically from your Pods field -->
                                    <?php echo esc_html($item_text); ?>
                                </span>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
                <div class="icon-list__image">
                    <?php
                    $home_whyus_image = get_field('home_whyus_image');
                    if ($home_whyus_image) : ?>
                        <img src="<?php echo esc_url($home_whyus_image['url']); ?>" alt="<?php echo esc_attr($home_whyus_image['alt']); ?>">
                    <?php endif; ?>
                </div>
            </div>

        </div>
        </div>
    </section>

    <section class="testimonial-slider-section section gradient-bg">
        <div class="container">
            <div class="section-header center">
                <span class="colored-dots">
                    <span class="blue"></span>
                    <span class="yellow"></span>
                    <span class="red"></span>
                </span>
                <h2 class="main-title h2"> <?php echo get_field('home_testimonials_title') ?></h2>
            </div>
            <div class="testimonial-slider-wrapper">
                <div class="splide">
                    <div class="splide__track">
                        <div class="splide__list">
                            <?php
                            $tax_args = array(
                                'post_type' => 'testimonial',
                                'posts_per_page' => -1,
                            );

                            $tax_query = new WP_Query($tax_args);
                            if ($tax_query->have_posts()) :
                                while ($tax_query->have_posts()) : $tax_query->the_post();
                                    $position = get_field('position'); ?>
                                    <div class="splide__slide">
                                        <div class="testimonial-card">
                                            <div class="testimonial-card__image">
                                                <?php the_post_thumbnail(); ?>
                                            </div>
                                            <div class="testimonial-card__info">
                                                <h3 class="testimonial-card__name"><?php the_title(); ?></h3>
                                                <span class="testimonial-card__post"><?php echo esc_html($position); ?></span>

                                                <div class="testimonial-content">
                                                    <p><?php the_excerpt(); ?></p>
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
                    <div class="splide__arrows">
                        <button class="splide__arrow splide__arrow--prev">
                            <svg width="18" height="32" viewBox="0 0 18 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M1.5 1.5L16.5 16L1.5 30.5" stroke="#0A5DA1" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" fill="none" />
                            </svg>
                        </button>
                        <button class="splide__arrow splide__arrow--next">
                            <svg width="18" height="32" viewBox="0 0 18 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M1.5 1.5L16.5 16L1.5 30.5" stroke="#0A5DA1" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" fill="none" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>