<?php
// Query for home page ================================================ //
function my_post_queries( $query ) {
	// do not alter the query on wp-admin pages and only alter it if it's the main query
	if (!is_admin() && $query->is_main_query()){

	    // alter the query for the home page
	    if( is_home() ){
			$query->set( 'post_type', array( 'post','news_events' ) );
			$query->set( 'orderby', 'date' );
            $query->set( 'order', 'ASC' );
	    }
	}
}
add_action( 'pre_get_posts', 'my_post_queries' );

// Add theme support ================================================ //
if (function_exists('add_theme_support')) {

    // Add Menu Support
    add_theme_support('menus');

    // Add Thumbnail Theme Support
    add_theme_support('post-thumbnails');
    add_image_size('large', 900, '', true);
    add_image_size('medium', 480, 480, true);
    add_image_size('small', 320, 200, true);

    // BG feature
    add_image_size('bg_large', 1102, '', array( 'center', 'center') );
    add_image_size('bg_small', 480, '', true );

    // News Image
    add_image_size( 'news_thumb', 900, 400, true );

    // Enables post and comment RSS feed links to head
    add_theme_support('automatic-feed-links');

    // Add Post Formats
    add_theme_support( 'post-formats', array(
        'aside', 'image', 'video', 'audio', 'quote', 'link', 'gallery',
    ) );

    // HTML5 Form
    add_theme_support( 'html5', array(
        'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
    ) );

    // Localisation Support
    load_theme_textdomain( 'walkbikenc', get_template_directory() . '/languages');
}

// Excerpt ======================================================= //
function custom_excerpt_length( $length ) {
	return 16;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

function new_excerpt_more( $more ) {
    return ' ... <a href="' . get_permalink() . '" class="excerpt-link more-detail">Read More <span>&rsaquo;</span></a>';
}
add_filter('excerpt_more', 'new_excerpt_more');

// Styles and Scripts =========================================== //
function register_scripts() {

    // Styles
	wp_register_style(
		'style',
		get_template_directory_uri() . '/style.css',
		array(),
		'1.0',
		'all'
	);

	wp_enqueue_style( 'style' );

    // Scripts
    wp_register_script(
        'slick',
        get_template_directory_uri() . '/js/slick.min.js',
        array( 'jquery' ),
        '1.3.15',
        true
    );

    wp_register_script(
        'scripts',
        get_template_directory_uri() . '/js/scripts.js',
        array(),
        '1.0',
        true
    );

    wp_enqueue_script( 'slick' );
    wp_enqueue_script( 'scripts' );

}
add_action( 'wp_enqueue_scripts', 'register_scripts' );

// Async scripts
if ( !( is_admin() ) ) {

    function defer_parsing_of_js ( $url ) {
        if ( FALSE === strpos( $url, '.js' ) ) return $url;
        if ( strpos( $url, 'jquery.js' ) ) return "$url' async";
        if ( strpos( $url, 'jquery-migrate.min.js' ) ) return "$url' async defer='defer";
        return "$url' async";
    }

    add_filter( 'clean_url', 'defer_parsing_of_js', 11, 1 );
}

// Menus ====================================================== //
function register_menus() {
    register_nav_menus( array( // Using array to specify more menus if needed
        'header-menu' => __('Header Menu', 'walkbikenc'),
        'sidebar-menu' => __('Sidebar Menu', 'walkbikenc'),
        'footer-menu' => __('Footer Menu', 'walkbikenc')
    ));
}
add_action('init', 'register_menus');

// Widgets ====================================================== //
function walkbikenc_widgets_init() {
    register_sidebar( array(
        'name'          => __( 'Intro Text For Pillars', 'walkbikenc' ),
        'id'            => 'pillars_intro',
        'description'   => __( 'Text for the intro to the 5 pillars', 'walkbikenc' ),
        'before_widget' => '',
        'after_widget'  => '',
        'before_title'  => '',
        'after_title'   => '',
    ));

    register_sidebar( array(
        'name'          => __( 'Footer', 'walkbikenc' ),
        'id'            => 'footer_widget',
        'before_widget' => '',
        'after_widget'  => '',
        'before_title'  => '',
        'after_title'   => '',
    ));

    register_sidebar( array(
        'name'          => __( 'Footer Contact', 'walkbikenc' ),
        'id'            => 'footer_contact',
        'before_widget' => '',
        'after_widget'  => '',
        'before_title'  => '',
        'after_title'   => '',
    ));
}
add_action( 'widgets_init', 'walkbikenc_widgets_init' );

// Custom Post Types =============================================== //
add_action( 'init', 'custom_posttype' );
function custom_posttype() {

    register_post_type( 'news_events', array(
        'labels' => array(
            'name' => __( 'News & Events' ),
            'singular_name' => __( 'News' )
        ),
        'public' => true,
        'has_archive' => true,
        'menu_position' => 11,
        'supports' => array(
            'title',
            'editor',
            'thumbnail',
            'custom-fields',
            'revisions',
            'excerpt'
        ),
    ));

    register_post_type( 'safety_post', array(
        'labels' => array(
            'name' => __( 'Safety' ),
            'singular_name' => __( 'Safety' )
        ),
        'public' => true,
        'has_archive' => true,
        'menu_position' => 12,
        'supports' => array(
            'title',
            'editor',
            'thumbnail',
            'custom-fields',
            'revisions'
        ),
    ));

    register_post_type( 'health_post', array(
        'labels' => array(
            'name' => __( 'Health' ),
            'singular_name' => __( 'Health' )
        ),
        'public' => true,
        'has_archive' => true,
        'menu_position' => 13,
        'supports' => array(
            'title',
            'editor',
            'thumbnail',
            'custom-fields',
            'revisions'
        ),
    ));

    register_post_type( 'economy_post', array(
        'labels' => array(
            'name' => __( 'Economy' ),
            'singular_name' => __( 'Economy' )
        ),
        'public' => true,
        'has_archive' => true,
        'menu_position' => 14,
        'supports' => array(
            'title',
            'editor',
            'thumbnail',
            'custom-fields',
            'revisions'
        ),
    ));

    register_post_type( 'mobility_post', array(
        'labels' => array(
            'name' => __( 'Mobility' ),
            'singular_name' => __( 'Mobility' )
        ),
        'public' => true,
        'has_archive' => true,
        'menu_position' => 15,
        'supports' => array(
            'title',
            'editor',
            'thumbnail',
            'custom-fields',
            'revisions'
        ),
    ));

    register_post_type( 'environment_post', array(
        'labels' => array(
            'name' => __( 'Environment' ),
            'singular_name' => __( 'Environment' )
        ),
        'public' => true,
        'has_archive' => true,
        'menu_position' => 16,
        'supports' => array(
            'title',
            'editor',
            'thumbnail',
            'custom-fields',
            'revisions'
        ),
    ));

};

// Remove invalid rel attribute values in the categorylist ===== //
function remove_category_rel_from_category_list($thelist)
{
    return str_replace('rel="category tag"', 'rel="tag"', $thelist);
}
add_filter('the_category', 'remove_category_rel_from_category_list');

// Add page slug to body class, love this - Credit: Starkers Wordpress Theme
function add_slug_to_body_class($classes)
{
    global $post;
    if (is_home()) {
        $key = array_search('blog', $classes);
        if ($key > -1) {
            unset($classes[$key]);
        }
    } elseif (is_page()) {
        $classes[] = sanitize_html_class($post->post_name);
    } elseif (is_singular()) {
        $classes[] = sanitize_html_class($post->post_name);
    }

    return $classes;
}
add_filter('body_class', 'add_slug_to_body_class');

// Remove Admin bar =============================================== //
function remove_admin_bar()
{
    return false;
}
add_filter('show_admin_bar', 'remove_admin_bar');

// Remove 'text/css' from our enqueued stylesheet ================= //
function style_remove($tag)
{
    return preg_replace('~\s+type=["\'][^"\']++["\']~', '', $tag);
}
add_filter('style_loader_tag', 'style_remove');

// Remove thumbnail width and height dimensions that prevent fluid images in the_thumbnail
function remove_thumbnail_dimensions( $html )
{
    $html = preg_replace('/(width|height)=\"\d*\"\s/', "", $html);
    return $html;
}
add_filter('post_thumbnail_html', 'remove_thumbnail_dimensions', 10);
add_filter('image_send_to_editor', 'remove_thumbnail_dimensions', 10);

// Custom Gravatar in Settings > Discussion ======================== //
function blankgravatar($avatar_defaults)
{
    $myavatar = get_template_directory_uri() . '/img/gravatar.jpg';
    $avatar_defaults[$myavatar] = "Custom Gravatar";
    return $avatar_defaults;
}
add_filter('avatar_defaults', 'blankgravatar');

// Threaded Comments =============================================== //
function enable_threaded_comments()
{
    if (!is_admin()) {
        if (is_singular() AND comments_open() AND (get_option('thread_comments') == 1)) {
            wp_enqueue_script('comment-reply');
        }
    }
}
add_action('get_header', 'enable_threaded_comments');

// Remove <div> from navs ============================================== //
function my_wp_nav_menu_args($args = '')
{
    $args['container'] = false;
    return $args;
}
add_filter('wp_nav_menu_args', 'my_wp_nav_menu_args');

// SVGs ================================================================ //
function cc_mime_types( $mimes ){
	$mimes['svg'] = 'image/svg+xml';
	return $mimes;
}
add_filter( 'upload_mimes', 'cc_mime_types' );

// Filters ============================================================ //
// add_filter('widget_text', 'shortcode_unautop');
add_filter('the_excerpt', 'shortcode_unautop');
remove_filter( 'the_excerpt', 'wpautop' );

// Remove auto paragraph
if ( !is_singular( 'news_events' ) ) {
    remove_filter( 'the_content', 'wpautop' );
}
