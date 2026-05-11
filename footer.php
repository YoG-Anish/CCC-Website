<footer class="main-footer">
    <div class="container">
        <div class="top-footer">
            <div class="footer-left">
                <div class="footer-content">
                    <h3><?php echo get_theme_mod('ccc_footer_title'); ?></h3>
                    <p><?php echo get_theme_mod('ccc_footer_description'); ?></p>
                    <?php
                    $footer_phone_icon = get_theme_mod('footer_phone_icon');
                    $footer_phone_alt = get_post_meta($footer_phone_icon, '_wp_attachment_image_alt', true);
                    $ccc_mail_icon = get_theme_mod('ccc_mail_icon');
                    $ccc_mail_alt = get_post_meta($ccc_mail_icon, '_wp_attachment_image_alt', true);
                    ?>
                    <ul class="contact-list">
                        <li>
                            <?php if ($footer_phone_icon): ?>
                                <a href="tel:<?php echo get_theme_mod('ccc_footer_number'); ?>" class="contact-list__item">
                                    <span class="icon">
                                        <img src="<?php echo esc_url(wp_get_attachment_url($footer_phone_icon)); ?>" alt="<?php echo $footer_phone_alt; ?>">
                                    </span>
                                    <span class="text"><?php echo get_theme_mod('ccc_footer_number'); ?></span>
                                </a>
                            <?php endif; ?>
                        </li>
                        <li>
                            <?php if ($ccc_mail_icon): ?>
                                <a href="mailt0:<?php echo get_theme_mod('ccc_email'); ?>" class="contact-list__item">
                                    <span class="icon">
                                        <img src="<?php echo esc_url(wp_get_attachment_url($ccc_mail_icon)); ?>" alt="<?php echo $ccc_mail_alt; ?>">
                                    </span>
                                    <span class="text"><?php echo get_theme_mod('ccc_email'); ?></span>
                                </a>
                            <?php endif; ?>
                        </li>
                    </ul>
                    <?php
                    $footer_facebook_icon = get_theme_mod('footer_facebook_icon');
                    $footer_facebook_alt = get_post_meta($footer_facebook_icon, '_wp_attachment_image_alt', true);
                    $footer_instagram_icon = get_theme_mod('footer_instagram_icon');
                    $footer_instagram_alt = get_post_meta($footer_instagram_icon, '_wp_attachment_image_alt', true);
                    $footer_linkedin_icon = get_theme_mod('footer_linkedin_icon');
                    $footer_linkedin_alt = get_post_meta($footer_linkedin_icon, '_wp_attachment_image_alt', true);

                    $footer_facebook_url = get_theme_mod('footer_facebook_url');
                    $footer_instagram_url = get_theme_mod('footer_instagram_url');
                    $footer_linkedin_url = get_theme_mod('footer_linkedin_url');
                    ?>
                    <div class="social-links">

                        <!-- Instagram -->
                        <?php if ($footer_instagram_icon): ?>
                            <a href="<?php echo esc_url($footer_instagram_url); ?>" title="Instagram" target="_blank">
                                <img src="<?php echo esc_url(wp_get_attachment_url($footer_instagram_icon)); ?>" alt="<?php echo $footer_instagram_alt; ?>">
                            </a>
                        <?php endif; ?>

                        <!-- Facebook -->
                        <?php if ($footer_facebook_icon): ?>
                            <a href="<?php echo esc_url($footer_facebook_url); ?>" title="Facebook" target="_blank">
                                <img src="<?php echo esc_url(wp_get_attachment_url($footer_facebook_icon)); ?>" alt="<?php echo $footer_facebook_alt; ?>">
                            </a>
                        <?php endif; ?>

                        <!-- LinkedIn -->
                        <?php if ($footer_linkedin_icon): ?>
                            <a href="<?php echo esc_url($footer_linkedin_url); ?>" title="LinkedIn" target="_blank">
                                <img src="<?php echo esc_url(wp_get_attachment_url($footer_linkedin_icon)); ?>" alt="<?php echo $footer_linkedin_alt; ?>">
                            </a>
                        <?php endif; ?>

                    </div>
                </div>
            </div>
            <div class="footer-right">
                <?php echo do_shortcode('[contact-form-7 id="d08a6aa" title="ccc contact"]'); ?>
            </div>
        </div>
        <div class="bottom-footer">
            <p>© <?php echo date('Y'); ?> — Copyright</p>
        </div>
    </div>
</footer>
<?php wp_footer(); ?>
</body>

</html>