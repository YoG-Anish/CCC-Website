<?php


function ccc_enqueue_scripts()
{
    // Enqueue styles
    wp_enqueue_style('ccc-style', get_stylesheet_uri());
    wp_enqueue_style('ccc-splide', get_template_directory_uri() . '/css/splide.min.css');

    // Enqueue scripts
    wp_enqueue_script('ccc-script', get_template_directory_uri() . '/js/script.js', array(), '1.0', true);

    wp_enqueue_script('ccc-splide', get_template_directory_uri() . '/js/splide.min.js', array(), '1.0', true);
}
add_action('wp_enqueue_scripts', 'ccc_enqueue_scripts');



// Theme setup
function ccc_setup_theme()
{
    // Add support for title tag
    add_theme_support('title-tag');

    // Add support for post thumbnails
    add_theme_support('post-thumbnails');

    // Register navigation menu
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'ccc'),
        'footer' => __('Footer Menu', 'ccc'),
    ));
}
add_action('after_setup_theme', 'ccc_setup_theme');


// Enable SVG upload
function ccc_enable_svg($mimes)
{
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter('upload_mimes', 'ccc_enable_svg');


// creating cpt

function ccc_register_cpt()
{

    $labels = array(
        'name'              => _x('Banners', 'Post Type General Name', 'ccc'),
        'singular_name'     => _x('Banner', 'Post Type Singular Name', 'ccc'),
        'menu_name'        => __('Banners', 'ccc'),
        'name_admin_bar'   => __('Banner', 'ccc'),
        'add_new'          => __('Add New', 'ccc'),
        'add_new_item'     => __('Add New Banner', 'ccc'),
        'new_item'         => __('New Banner', 'ccc'),
        'edit_item'        => __('Edit Banner', 'ccc'),
        'view_item'        => __('View Banner', 'ccc'),
        'all_items'        => __('All Banners', 'ccc'),
        'search_items'     => __('Search Banners', 'ccc'),
        'parent_item_colon' => __('Parent Banners:', 'ccc'),
        'not_found'        => __('No banners found.', 'ccc'),
        'not_found_in_trash' => __('No banners found in Trash.', 'ccc')
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'banner'),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 5,
        'show_in_rest'       => true,
        'supports'           => array('title', 'editor', 'thumbnail', 'custom-fields'),
    );

    register_post_type('banner', $args);

    //creating a cpt for team members
    $labels = array(
        'name'              => _x('Team Members', 'Post Type General Name', 'ccc'),
        'singular_name'     => _x('Team Member', 'Post Type Singular Name', 'ccc'),
        'menu_name'        => __('Team Members', 'ccc'),
        'name_admin_bar'   => __('Team Member', 'ccc'),
        'add_new'          => __('Add New', 'ccc'),
        'add_new_item'     => __('Add New Team Member', 'ccc'),
        'new_item'         => __('New Team Member', 'ccc'),
        'edit_item'        => __('Edit Team Member', 'ccc'),
        'view_item'        => __('View Team Member', 'ccc'),
        'all_items'        => __('All Team Members', 'ccc'),
        'search_items'     => __('Search Team Members', 'ccc'),
        'parent_item_colon' => __('Parent Team Members:', 'ccc'),
        'not_found'        => __('No team members found.', 'ccc'),
        'not_found_in_trash' => __('No team members found in Trash.', 'ccc')
    );
    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'team-member'),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 6,
        'show_in_rest'       => true,
        'supports'           => array('title', 'editor', 'thumbnail', 'custom-fields'),
    );
    register_post_type('team_member', $args);

    //creating a cpt for testimonials
    $labels = array(
        'name'              => _x('Testimonials', 'Post Type General Name', 'ccc'),
        'singular_name'     => _x('Testimonial', 'Post Type Singular Name', 'ccc'),
        'menu_name'        => __('Testimonials', 'ccc'),
        'name_admin_bar'   => __('Testimonial', 'ccc'),
        'add_new'          => __('Add New', 'ccc'),
        'add_new_item'     => __('Add New Testimonial', 'ccc'),
        'new_item'         => __('New Testimonial', 'ccc'),
        'edit_item'        => __('Edit Testimonial', 'ccc'),
        'view_item'        => __('View Testimonial', 'ccc'),
        'all_items'        => __('All Testimonials', 'ccc'),
        'search_items'     => __('Search Testimonials', 'ccc'),
        'parent_item_colon' => __('Parent Testimonials:', 'ccc'),
        'not_found'        => __('No testimonials found.', 'ccc'),
        'not_found_in_trash' => __('No testimonials found in Trash.', 'ccc')
    );
    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'testimonial'),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 7,
        'show_in_rest'       => true,
        'supports'           => array('title', 'editor', 'thumbnail', 'custom-fields'),
    );
    register_post_type('testimonial', $args);

    // creating a cpt for programmes
    $labels = array(
        'name'              => _x('Programmes', 'Post Type General Name', 'ccc'),
        'singular_name'     => _x('Programme', 'Post Type Singular Name', 'ccc'),
        'menu_name'        => __('Programmes', 'ccc'),
        'name_admin_bar'   => __('Programme', 'ccc'),
        'add_new'          => __('Add New', 'ccc'),
        'add_new_item'     => __('Add New Programme', 'ccc'),
        'new_item'         => __('New Programme', 'ccc'),
        'edit_item'        => __('Edit Programme', 'ccc'),
        'view_item'        => __('View Programme', 'ccc'),
        'all_items'        => __('All Programmes', 'ccc'),
        'search_items'     => __('Search Programmes', 'ccc'),
        'parent_item_colon' => __('Parent Programmes:', 'ccc'),
        'not_found'        => __('No programmes found.', 'ccc'),
        'not_found_in_trash' => __('No programmes found in Trash.', 'ccc')
    );
    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'programme'),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 8,
        'show_in_rest'       => true,
        'supports'           => array('title', 'editor', 'thumbnail', 'custom-fields'),
    );
    register_post_type('programme', $args);
}
add_action('init', 'ccc_register_cpt');

// Customizer setting 

function ccc_register_customizer_setting($wp_customize)
{
    //add dynamic section for header
    $wp_customize->add_section('ccc_header_section', array(
        'title'      => __('Header', 'ccc'),
        'priority'   => 30,
    ));

    // mail icon image
    $wp_customize->add_setting('ccc_mail_icon', array(
        'default' => '',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, 'mail_icon_control', array(
        'label' => __('Mail Icon', 'ccc'),
        'section' => 'ccc_header_section',
        'settings' => 'ccc_mail_icon',
        'mime_type' => 'image',
    )));

    //add mail in header
    $wp_customize->add_setting('ccc_email', array(
        'default' => ''
    ));
    $wp_customize->add_control('ccc_email', array(
        'label'   => __('Email', 'ccc'),
        'section' => 'ccc_header_section',
        'settings' => 'ccc_email',
        'type'    => 'email',
    ));

    //add dynamic section for footer
    $wp_customize->add_section('ccc_footer_section', array(
        'title'      => __('Footer', 'ccc'),
        'priority'   => 30,
    ));

    //footet title
    $wp_customize->add_setting('ccc_footer_title', array(
        'default' => ''
    ));
    $wp_customize->add_control('ccc_footer_title', array(
        'label'   => __('Footer Title', 'ccc'),
        'section' => 'ccc_footer_section',
        'settings' => 'ccc_footer_title',
        'type'    => 'text',
    ));
    //footer description
    $wp_customize->add_setting('ccc_footer_description', array(
        'default' => ''
    ));
    $wp_customize->add_control('ccc_footer_description', array(
        'label'   => __('Footer Description', 'ccc'),
        'section' => 'ccc_footer_section',
        'settings' => 'ccc_footer_description',
        'type'    => 'textarea',
    ));

    //footer Number Icon
    $wp_customize->add_setting('footer_phone_icon', array(
        'default' => '',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, 'footer_number_icon_control', array(
        'label' => __('phone Icon', 'ccc'),
        'section' => 'ccc_footer_section',
        'settings' => 'footer_phone_icon',
        'mime_type' => 'image',
    )));

    //footer number
    $wp_customize->add_setting('ccc_footer_number', array(
        'default' => ''
    ));
    $wp_customize->add_control('ccc_footer_number', array(
        'label'   => __('Footer Number', 'ccc'),
        'section' => 'ccc_footer_section',
        'settings' => 'ccc_footer_number',
        'type'    => 'text',
    ));

    // instagram icon
    $wp_customize->add_setting('footer_instagram_icon', array(
        'default' => '',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, 'footer_instagram_icon_control', array(
        'label' => __('Instagram Icon', 'ccc'),
        'section' => 'ccc_footer_section',
        'settings' => 'footer_instagram_icon',
        'mime_type' => 'image',
    )));

    // instagram url
    $wp_customize->add_setting('ccc_instagram_url', array(
        'default' => ''
    ));
    $wp_customize->add_control('ccc_instagram_url', array(
        'label'   => __('Instagram URL', 'ccc'),
        'section' => 'ccc_footer_section',
        'settings' => 'ccc_instagram_url',
        'type'    => 'url',
    ));

    // footer facebook icon
    $wp_customize->add_setting('footer_facebook_icon', array(
        'default' => '',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, 'footer_facebook_icon_control', array(
        'label' => __('Facebook Icon', 'ccc'),
        'section' => 'ccc_footer_section',
        'settings' => 'footer_facebook_icon',
        'mime_type' => 'image',
    )));

    // facebook url
    $wp_customize->add_setting('ccc_facebook_url', array(
        'default' => ''
    ));
    $wp_customize->add_control('ccc_facebook_url', array(
        'label'   => __('Facebook URL', 'ccc'),
        'section' => 'ccc_footer_section',
        'settings' => 'ccc_facebook_url',
        'type'    => 'url',
    ));

    // linkedin icon
    $wp_customize->add_setting('footer_linkedin_icon', array(
        'default' => '',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, 'footer_linkedin_icon_control', array(
        'label' => __('Linkedin Icon', 'ccc'),
        'section' => 'ccc_footer_section',
        'settings' => 'footer_linkedin_icon',
        'mime_type' => 'image',
    )));

    // linkedin url
    $wp_customize->add_setting('ccc_linkedin_url', array(
        'default' => ''
    ));
    $wp_customize->add_control('ccc_linkedin_url', array(
        'label'   => __('Linkedin URL', 'ccc'),
        'section' => 'ccc_footer_section',
        'settings' => 'ccc_linkedin_url',
        'type'    => 'url',
    ));
}
add_action('customize_register', 'ccc_register_customizer_setting');
