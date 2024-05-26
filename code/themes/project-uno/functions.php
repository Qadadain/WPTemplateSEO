<?php
add_theme_support( 'post-thumbnails' );

add_action('wp_enqueue_scripts', 'parent_enqueue_styles');
function parent_enqueue_styles()
{
    wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');
}

function parent_enqueue_scripts()
{
    wp_enqueue_script('index', get_template_directory_uri() . '/assets/js/index.js');
}

add_action('wp_enqueue_scripts', 'parent_enqueue_scripts');

function my_theme_enqueue_styles() {
    if (is_single()) {
        wp_enqueue_style('my-custom-style', get_stylesheet_directory_uri() . '/assets/css/post-view.css', array(), '1.0.0');
    }

    if (is_category()) {
        wp_enqueue_style('my-custom-style', get_stylesheet_directory_uri() . '/assets/css/post-list.css', array(), '1.0.0');
    }

    if (is_home()) {
        wp_enqueue_style('my-custom-style', get_stylesheet_directory_uri() . '/assets/css/home.css', array(), '1.0.0');
    }

}
add_action('wp_enqueue_scripts', 'my_theme_enqueue_styles');



function remove_default_image_sizes($sizes) {
    unset($sizes['thumbnail']);
    unset($sizes['medium']);
    unset($sizes['medium_large']);
    unset($sizes['large']);

    return $sizes;
}

add_filter('intermediate_image_sizes_advanced', 'remove_default_image_sizes');

function custom_excerpt_length( $length ) {
    return 29;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

function get_page_number(): string
{
    return (get_query_var('paged')) ? get_query_var('paged') : 1;
}

function blog_pagination($params = [])
{
    global $wp_query;

    $paged = get_page_number();
    $searchParam = array_merge([
        'post_type' => 'post',
        'post_status' => 'publish',
        'paged' => $paged,
    ], $params);

    $wp_query = new WP_Query($searchParam);


    $posts_pagination = get_the_posts_pagination([
        'mid_size' => 1,
        'prev_text' => "<span class='link'><</span>",
        'next_text' => "<span class='link'>></span>",
    ]);

    if ($posts_pagination) {
        $posts_pagination = str_replace('class="prev page-numbers"', 'class="prev page-numbers btn-wp" rel="prev"', $posts_pagination);
        $posts_pagination = str_replace('class="next page-numbers"', 'class="next page-numbers btn-wp" rel="next"', $posts_pagination);
        $posts_pagination = str_replace('class="page-numbers"', 'class="page-numbers btn-wp btn"', $posts_pagination);
        $posts_pagination = str_replace('class="page-numbers current"', 'class="page-numbers btn-wp current btn"', $posts_pagination);

        echo preg_replace('~(<h2\\s(class="screen-reader-text")(.*)[$>])(.*)(</h2>)~ui', '', $posts_pagination);
    }
}

add_theme_support('title-tag');

//meta robots
function filter_wpseo_robots($robotsstr)
{
    $paged = get_page_number();

    if (is_tag()) {
        $robotsstr = "noindex,follow";
    } elseif ($paged > 1) {
        $robotsstr = "noindex, follow";
    } else {
        $robotsstr = "index, follow";
    }
    return $robotsstr;
}

// meta title
function filter_wpseo_title($wpseo_replace_vars)
{
    $paged = get_page_number();

    if (1 < $paged && $wpseo_replace_vars != "") {
        $wpseo_replace_vars .= ' - Page ' . $paged;
    }

    return $wpseo_replace_vars;
}

// meta description
function filter_wpseo_metadesc($wpseo_replace_vars)
{
    $paged = get_page_number();

    if (1 < $paged && $wpseo_replace_vars != "") {
        $wpseo_replace_vars .= ' - Page ' . $paged;
    }

    return $wpseo_replace_vars;
}

add_filter('wpseo_robots', 'filter_wpseo_robots', 10, 1);
add_filter('wpseo_title', 'filter_wpseo_title', 10, 1);
add_filter('wpseo_metadesc', 'filter_wpseo_metadesc', 10, 1);


function add_linebreak_shortcode() {
    return '<br />';
}
add_shortcode('br', 'add_linebreak_shortcode' );

add_filter( 'wpseo_canonical', '__return_false' );