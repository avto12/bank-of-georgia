<?php
/**
 * msbase functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package msbase
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function msbase_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on msbase, use a find and replace
		* to change 'msbase' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'msbase', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'msbase' ),
            'top-menu' => esc_html__( 'Secondary', 'msbase' ),
            'footer-menu' => esc_html__( 'Footer Top', 'msbase' ),
            'footer-submenu' => esc_html__( 'Footer Bottom', 'msbase' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'msbase_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'msbase_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function msbase_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'msbase_content_width', 640 );
}
add_action( 'after_setup_theme', 'msbase_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function msbase_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'msbase' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'msbase' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'msbase_widgets_init' );

/**
 * Enqueue scripts and styles.
 */

function site_styles() {
	wp_register_style( 'main',  get_template_directory_uri() . '/dist/main.css' );
	wp_enqueue_style( 'main' );
}
add_action( 'wp_enqueue_scripts', 'site_styles' );

// function admin_styles() {
// 	if ( is_login_page() ) :
// 	    wp_register_style( 'admin',  get_template_directory_uri() . '/dist/admin.css' );
// 		wp_enqueue_style( 'admin');
// 	endif;
// }
// add_action( 'login_enqueue_scripts', 'admin_styles' );

function site_scripts() {
    wp_register_script( 'main', get_template_directory_uri() . '/dist/main.bundle.js', array(), '', true );
    wp_enqueue_script( 'main', $in_footer = true);

    wp_register_script( 'vendor', get_template_directory_uri() . '/dist/vendor.bundle.js', array(), '', true );
    wp_enqueue_script( 'vendor', $in_footer = true);
}
add_action( 'wp_enqueue_scripts', 'site_scripts' );

//Page Slug Body Class
function add_slug_body_class( $classes ) {
	global $post;
	if ( isset( $post ) ) {
	$classes[] = $post->post_name;
}
	return $classes;
}
add_filter( 'body_class', 'add_slug_body_class' );

require_once(__DIR__ . "/functions/block.php");
require_once(__DIR__ . "/functions/ajaxcalls.php");
require_once(__DIR__ . "/functions/menu/menu-walker.php");



if (function_exists('acf_add_options_page')) {

    acf_add_options_page();

    acf_add_options_page(array(
        'page_title'    => 'Footer',
        'menu_title'    => 'Footer',
        'menu_slug'     => 'footer',
        'capability'    => 'edit_posts',
        'icon_url'      => 'dashicons-welcome-widgets-menus',
        'redirect'      => false
    ));
}


function ms_exists($obj, $key, $result = '')
{
    if (is_array($obj)) {
        $result = array_key_exists($key, $obj) ? $obj[$key] : $result;
    }
    if (is_object($obj)) {
        $result = isset($obj->{$key}) ? $obj->{$key} : $result;
    }
    return $result;
}

function ms_exists_n($obj, $key1, $key2, $key3 = '', $key4 = '')
{
    if ($key4)
        return ms_exists(ms_exists(ms_exists(ms_exists($obj, $key1), $key2), $key3), $key4);
    if ($key3)
        return ms_exists(ms_exists(ms_exists($obj, $key1), $key2), $key3);
    return ms_exists(ms_exists($obj, $key1), $key2);
}

function ms_tree($elements, $paren_id = 0, $args = [])
{
    $result = [];
    global $wp;
    $current_url = $wp->request;
    foreach ($elements as $element) {
        $element = (object)[
            'ID' => $element->ID,
            'parent_id' => $element->menu_item_parent,
            'object_id' => $element->object_id,
            'title' => $element->title,
            'url' => $element->url,
            'target' => $element->target,
            'description' => $element->description,
            'classes' => array_filter($element->classes),
            'is_active' => home_url("/") . $current_url . "/" == $element->url ? "active" : "inactive"
        ];
        if (ms_exists($args, 'fields')) {
            foreach ($args['fields'] as $field)
                $element->{$field} = get_post_meta($element->ID, $field, true);
        }
        $element->args = $args;
        if ($element->parent_id == $paren_id) {
            $children = ms_tree($elements, $element->ID, $args);
            if ($children)
                $element->children = $children;
            foreach ($children as $child) {
                if ($child->is_active == "active") {
                    $element->is_active = "active";
                }
            }
            $result[] = $element;
            unset($element);
        }
    }
    return $result;
}

function ms_getMenuItemes()
{
    $result = ['menu' => [], 'menu_name' => []];
    $locations = get_nav_menu_locations();              // Get menu locations
    // Set menu
    if (is_array($locations) && !empty($locations)) {
        foreach ($locations as $location => $id) {
            $menu_items = wp_get_nav_menu_items($id);
            $menu_object = wp_get_nav_menu_object($id);
            $menu_title = ms_exists($menu_object, 'name');
            $menu_id = ms_exists($menu_object, 'term_id');
            if ($menu_items) {
                $result['menu'][$location] = ms_tree($menu_items, 0);
                $result['menu_name'][$location] = $menu_title;
                $result['menu_id'][$location] = $menu_id;
            }
        }
    }
    return $result;
}

add_filter( 'register_post_type_args', function ( $args, $post_type ) {

    if( 'post' == $post_type ) {

        $args['has_archive'] = true;
        $args['rewrite'] = [
            'slug' => 'news',
            'with_front' => 1,
            'pages' => 1,
            'feeds' => 1,
            'ep_mask' => 1,
        ];

    }

    return $args;

}, PHP_INT_MAX, 2 );

function pluginname_ajaxurl()
{
    ?>
    <script type="text/javascript">
        var ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?>';
        var nonce = '<?php echo wp_create_nonce("load_posts");?>';
    </script>
    <?php
}

add_action('wp_head', 'pluginname_ajaxurl');





// Allow SVG
add_filter('wp_check_filetype_and_ext', function ($data, $file, $filename, $mimes) {

    global $wp_version;
    if ($wp_version !== '4.7.1') {
        return $data;
    }

    $filetype = wp_check_filetype($filename, $mimes);

    return [
        'ext' => $filetype['ext'],
        'type' => $filetype['type'],
        'proper_filename' => $data['proper_filename']
    ];

}, 10, 4);

function cc_mime_types($mimes)
{
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}

add_filter('upload_mimes', 'cc_mime_types');

function fix_svg()
{
    echo '<style type="text/css">
		  .attachment-266x266, .thumbnail img {
			   width: 100% !important;
			   height: auto !important;
		  }
		  </style>';
}

add_action('admin_head', 'fix_svg');

function allow_svg_upload($mimes)
{
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}

add_filter('upload_mimes', 'allow_svg_upload');

