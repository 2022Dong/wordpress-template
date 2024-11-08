<?php

// wp_head()
function mytheme_register_styles()
{
    $version = wp_get_theme()->get('Version');
    // Theme CSS  *depending on bootstrap
    wp_enqueue_style('mytheme-style', get_template_directory_uri() . "/style.css", array('mytheme-bootstrap'), $version, 'all');
    // Bootstrap CSS
    wp_enqueue_style('mytheme-bootstrap', "https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css", array(), '4.4.1', 'all');
    // FontAwesome CSS
    wp_enqueue_style('mytheme-fontawesome', "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css", array(), '5.13.0', 'all');
}

add_action('wp_enqueue_scripts', 'mytheme_register_styles');

// wp_footer()
function mytheme_register_scripts()
{
    wp_enqueue_script('mytheme-jquery', "https://code.jquery.com/jquery-3.4.1.slim.min.js", array(), '3.4.1', 'all', true);
    wp_enqueue_script('mytheme-popper', "https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js", array(), '1.16.0', 'all', true);
    wp_enqueue_script('mytheme-bootstrap', "https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js", array(), '4.4.1', 'all', true);
    wp_enqueue_script('mytheme-main', get_template_directory_uri() . "/assets/js/main.js", array(), '1.0', 'all', true);
}

add_action('wp_enqueue_scripts', 'mytheme_register_scripts');


function mytheme_theme_support()
{
    // Adds dynamic title tag support
    add_theme_support('title-tag');
    add_theme_support('custom-logo');
    add_theme_support('post-thumbnails');
}

add_action('after_setup_theme', 'mytheme_theme_support');


function mytheme_menus()
{
    // Display location
    $locations = array(
        'primary' => "Desktop Primary Left Sidebar",
        'footer' => "Footer Menu Items"
    );

    register_nav_menus($locations);
}

add_action('init', 'mytheme_menus');

function mytheme_widget_areas()
{
    register_sidebar(
        array(
            'before_title' => '',
            'after_title' => '',
            'before_widget' => '<ul class="social-list list-inline py-3 mx-auto">',
            'after_widget' => '</ul>',
            'name' => 'Sidebar Area',
            'id' => 'sidebar-1',
            'description' => 'Sidebar Widget Area'
        )
    );

    register_sidebar(
        array(
            'before_title' => '',
            'after_title' => '',
            'before_widget' => '',
            'after_widget' => '',
            'name' => 'Footer Area',
            'id' => 'footer-1',
            'description' => 'Footer Widget Area'
        )
    );
}

add_action('widgets_init', 'mytheme_widget_areas');

function add_favicon()
{
    echo '<link rel="shortcut icon" href=" ' . get_template_directory_uri() . '/assets/images/logo.ico">';
}

add_action('wp_head', 'add_favicon');

// Remove junk from head
remove_action('wp-head', '_wp_render_title_tag', 1);
remove_action('wp-head', 'wp_resource_hints', 2);
remove_action('wp-head', 'feed_links', 2);
remove_action('wp-head', 'feed_links_extra', 3);
remove_action('wp-head', 'rsd_link');
remove_action('wp-head', 'wlwmanifest_link');
remove_action('wp-head', 'locale_stylesheet');
remove_action('publish_future_post', 'check_and_publish_future_post', 10, 1);
remove_action('wp-head', 'wp_robots', 1);
remove_action('wp-head', 'print_emoji_detection_script', 7);
remove_action('wp-head', 'wp_print_head_scripts', 9);
remove_action('wp-head', 'wp_print_styles', 8);
remove_action('wp-head', 'wp_generator');
remove_action('wp-head', 'wp_shortlink_wp_head', 10, 0);
remove_action('wp-head', 'wp_custom_css_cb', 101);
remove_action('wp-head', 'wp_site_icon', 99);
