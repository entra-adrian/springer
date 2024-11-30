<?php

/** Define theme constants */
define('XTHEME_IMAGES_URI', get_stylesheet_directory_uri() . '/images');
define('XTHEME_CSS_DIR', dirname(__FILE__) . '/css');
define('XTHEME_JS_DIR', dirname(__FILE__) . '/js');
define('TEXTDOMAIN', 'xtheme');

// Remove dashicons in frontend for unauthenticated users
// Remove Gutenberg Block Library CSS from loading on the frontend
function xam_dequeue_unused_css_scripts() {
    if ( ! is_user_logged_in() ) {
        wp_deregister_style( 'dashicons' );
    }
    wp_dequeue_style( 'wp-block-library' );
    wp_dequeue_style( 'wp-block-library-theme' );
    wp_dequeue_style( 'wc-blocks-style' ); // Remove WooCommerce block CSS
}
add_action( 'wp_enqueue_scripts', 'xam_dequeue_unused_css_scripts' );


/** Add additional theme functionality on setup
 * @package cwmsocialnetwork
 */
function xtheme_setup_theme() {
    $defaults = array(
        'default-image' => XTHEME_IMAGES_URI . '/logo.png',
        'random-default' => false,
        'width' => 334,
        'height' => 81,
        'flex-height' => false,
        'flex-width' => false,
        'default-text-color' => '',
        'header-text' => false,
        'uploads' => true,
    );
    add_theme_support('custom-header', $defaults);
    add_theme_support('post-thumbnails');

    add_image_size( 'banner', 1920, 800, true );

    // Add admin stylesheet in css folder so we can use SASS
    add_editor_style(get_bloginfo('stylesheet_directory') . '/css/editor-style.css');

    // add_theme_support( 'post-formats', array( 'gallery' ) );
    // add post-formats to post_type
    // add_post_type_support( 'page', 'post-formats' );
}
add_action('after_setup_theme', 'xtheme_setup_theme');

/** Theme stylesheets
 * @package xtheme
 */
function xtheme_styles() {
    wp_register_style('xtheme-layout', get_bloginfo('stylesheet_directory') . '/css/layout.css', false, '1.1');
    wp_enqueue_style('xtheme-layout');    

    if(!is_home() && !is_archive()) {
        wp_dequeue_style( 'wp-pagenavi' );
    }
}
add_action('wp_enqueue_scripts', 'xtheme_styles');

/** Theme scripts
 * @package xtheme
 */
function xtheme_scripts() {
    wp_register_script('jquery-ui', '//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js', false, '1.10.4', true);
    wp_register_script('xtheme-site', get_bloginfo('stylesheet_directory') . '/js/site.min.js', array('jquery'), '1.0', true);
    wp_enqueue_script('xtheme-site');
}
add_action('wp_enqueue_scripts', 'xtheme_scripts');

/** Theme sidebars
 * @package xparent
 */
function xtheme_sidebars() {
    $widget_areas = array();
    // Sidebar Widget Area
    // $widget_areas[] = array(
    //     'id' => 'sidebar-widget-area',
    //     'name' => 'Sidebar Widget Area',
    //     'before_title' => '<h5 class="widget-title">',
    //     'after_title' => '</h5><div class="widget-content">',
    //     'before_widget' => '<div id="%1$s" class="widget %2$s">',
    //     'after_widget' => '</div></div>',
    // );
    // Footer Widget Area
    $widget_areas[] = array(
        'id' => 'footer-widget-area',
        'name' => 'Footer Widget Area',
        'before_title' => '<h6 class="widget-title">',
        'after_title' => '</h6>',
        'before_widget' => '<div class="grid-xs-12 grid-s-6 grid-m-3"><div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div></div>',
	);
	// Loop through the widget areas and register them!
    if ($widget_areas) {
        foreach ($widget_areas as $widget_area) {
            register_sidebar($widget_area);
        }
    }
}
add_action('widgets_init', 'xtheme_sidebars');

/** Theme menu locations
 * @package xtheme
 */
function xtheme_menus() {
    $locations = array(
        'top-nav' => 'Top Navigation',
        'main' => 'Main Menu',
        'footer' => 'Footer Menu'
    );
    register_nav_menus($locations);
}
add_action('init', 'xtheme_menus');

/**
 * If a content-{$postID} template is added, then search and include it
 */
function xtheme_template_content($content) {
    $additional_template = locate_template('content-' . get_the_ID() . '.php');
    if (!empty($additional_template)) {
        ob_start();
        include $additional_template;
        $content .= ob_get_clean();
    }
    return $content;
}
add_filter('the_content', 'xtheme_template_content');

/**
 * Modify the default wp_mail from address to use noreply@domain
 * @param      string  $from_email  The from email
 * @return     string  ( description_of_the_return_value )
 */
function xtheme_wp_mail_from($from_email) {
    // Get the site domain and get rid of 'http://', 'https://', 'www.'
    $sitename = str_replace(array('http://', 'https://', 'www.'), '', strtolower(home_url()));
    $from_email = 'no-reply@' . $sitename;
    return $from_email;
}
add_filter('wp_mail_from', 'xtheme_wp_mail_from', 0);

// Remove WP Admin Bar from Frontend
//add_filter('show_admin_bar', '__return_false');

// Enable shortcodes in widgets
add_filter('widget_text', 'do_shortcode');

/**
 * If more than one page exists, return TRUE.
 */
function show_posts_nav() {
    global $wp_query;
    return ($wp_query->max_num_pages > 1);
}

/**
 * Get the page title for the archive, category and date pages
 * @return [type] [description]
 */
function get_page_title() {
    if (is_post_type_archive()):
        $page_title = post_type_archive_title('', false);
    elseif (is_home() && $home_id = get_option('page_for_posts')):
        $page_title = get_the_title($home_id);
    elseif (is_category()):
        $page_title = single_cat_title('', false);
    elseif (is_tag()):
        $page_title = single_tag_title('', false);
    elseif (is_tax()):
        $page_title = get_queried_object()->name;
    elseif (is_day()):
        $page_title = get_the_time('j F Y');
    elseif (is_month()):
        $page_title = get_the_time('F Y');
    elseif (is_year()):
        $page_title = get_the_time('Y');
    elseif (is_404()):
        $page_title = __('Nothing Found', 'xtheme');
    elseif (is_search()):
        $page_title = sprintf(__('Search Results for <span class="colour">%1s</span>', 'xtheme'), get_search_query());
    else:
        $page_title = get_the_title();
    endif;

    return $page_title;
}

function xtheme_render_pagebuilder_elements() {
    $content = ''; // Initialize the variable
    ob_start();

    // Check if the flexible content field has rows of data
    if( have_rows('page_builder') ):

        // Loop through the rows of data
        while ( have_rows('page_builder') ) : the_row();
            // Include the template part for the current layout
            echo get_template_part( 'sections/section', get_row_layout() );
        endwhile;

    endif;
    $content .= ob_get_clean(); // Safely append the buffer contents
    return $content;
}


function xtheme_render_postbuilder_elements() {
    ob_start();
    // check if the flexible content field has rows of data
    if( have_rows('post_builder') ):
         // loop through the rows of data
        while ( have_rows('post_builder') ) : the_row();
                
            echo get_template_part( 'contents/blocks/block', get_row_layout() );
        
        endwhile;
    endif;
    $content .= ob_get_contents();
    ob_end_clean();

    return $content;
}

function xtheme_get_section_class($section_class = '') {
    // Set the default class
    $classes = 'section';

    // Add additional classes if they are provided
    if ($section_class) {
        $classes .= ' ' . $section_class;
    }

    // Get the background color from ACF
    $bg_colour = get_sub_field('section_bg_colour');

    // Prepare the inline style attribute
    $style = '';
    if ($bg_colour) {
        $style = 'background-color:' . esc_attr($bg_colour) . ';';
    }

    // Return the classes and style as a string
    return array(
        'class' => $classes,
        'style' => $style
    );
}

/**
 * Remove tags for posts
 */
function xtheme_unregister_tags_for_posts() {
    unregister_taxonomy_for_object_type( 'post_tag', 'post' );
}
add_action( 'init', 'xtheme_unregister_tags_for_posts' );

if( function_exists('acf_add_options_sub_page') ) { 
    acf_add_options_page(array(
        'page_title'    => 'Theme Options',
    ));
}