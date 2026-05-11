<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <title>CCC</title> -->
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>


    <header class="site-header">
        <div class="container">
            <div class="site-header__wrapper">
                <div class="site-logo">
                    <a href="<?php echo home_url(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/image/logo.png" alt="<?php bloginfo('name'); ?>"></a>
                </div>
                <div class="navigation-menu">
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'primary',
                        'container' => false,
                        'menu_class' => 'primary-menu',
                    ));
                    ?>

                </div>
                <div class="contact-info">
                    <?php
                    $ccc_mail_icon = get_theme_mod('ccc_mail_icon');
                    $ccc_mail_alt = get_post_meta($ccc_mail_icon, '_wp_attachment_image_alt', true);
                    if ($ccc_mail_icon):
                    ?>
                        <a href="mailto:info@coachingconsulting.net">
                            <span class="icon">
                                <img src="<?php echo esc_url(wp_get_attachment_url($ccc_mail_icon)); ?>" alt="<?php echo $ccc_mail_alt; ?>">
                            </span>
                            <span class="text"><?php echo get_theme_mod('ccc_email'); ?></span>
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </header>