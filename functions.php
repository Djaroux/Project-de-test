<?php
/**
 * Basic Elementor Theme functions and definitions
 *
 * @package Basic_Elementor_Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

/**
 * Define theme version
 */
define( 'BASIC_THEME_VERSION', '1.0.0' );

/**
 * Sets up theme defaults and registers support for various WordPress features.
 */
function basic_theme_setup() {
    // Add default posts and comments RSS feed links to head
    add_theme_support( 'automatic-feed-links' );

    // Let WordPress manage the document title
    add_theme_support( 'title-tag' );

    // Enable support for Post Thumbnails on posts and pages
    add_theme_support( 'post-thumbnails' );
    set_post_thumbnail_size( 1200, 675, true );

    // Add additional image sizes
    add_image_size( 'basic-theme-featured', 800, 450, true );
    add_image_size( 'basic-theme-thumbnail', 400, 300, true );

    // Register navigation menus
    register_nav_menus( array(
        'primary' => esc_html__( 'Primary Menu', 'basic-elementor-theme' ),
        'footer'  => esc_html__( 'Footer Menu', 'basic-elementor-theme' ),
    ) );

    // Switch default core markup to output valid HTML5
    add_theme_support( 'html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
    ) );

    // Add theme support for selective refresh for widgets
    add_theme_support( 'customize-selective-refresh-widgets' );

    // Add support for custom logo
    add_theme_support( 'custom-logo', array(
        'height'      => 100,
        'width'       => 400,
        'flex-height' => true,
        'flex-width'  => true,
    ) );

    // Add support for custom background
    add_theme_support( 'custom-background', array(
        'default-color' => 'ffffff',
    ) );

    // Add support for custom header
    add_theme_support( 'custom-header', array(
        'default-image' => '',
        'width'         => 1920,
        'height'        => 500,
        'flex-height'   => true,
        'flex-width'    => true,
    ) );

    // Add support for editor styles
    add_theme_support( 'editor-styles' );
    add_editor_style( 'assets/css/editor-style.css' );

    // Add support for responsive embeds
    add_theme_support( 'responsive-embeds' );

    // Add support for wide alignment
    add_theme_support( 'align-wide' );

    // Add support for block styles
    add_theme_support( 'wp-block-styles' );

    // Add support for full and wide align images
    add_theme_support( 'align-wide' );

    // Set content width
    $GLOBALS['content_width'] = 1200;
}
add_action( 'after_setup_theme', 'basic_theme_setup' );

/**
 * Register widget areas
 */
function basic_theme_widgets_init() {
    register_sidebar( array(
        'name'          => esc_html__( 'Sidebar', 'basic-elementor-theme' ),
        'id'            => 'sidebar-1',
        'description'   => esc_html__( 'Add widgets here to appear in your sidebar.', 'basic-elementor-theme' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );

    // Footer widget areas
    register_sidebar( array(
        'name'          => esc_html__( 'Footer 1', 'basic-elementor-theme' ),
        'id'            => 'footer-1',
        'description'   => esc_html__( 'Add widgets here to appear in your footer.', 'basic-elementor-theme' ),
        'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );

    register_sidebar( array(
        'name'          => esc_html__( 'Footer 2', 'basic-elementor-theme' ),
        'id'            => 'footer-2',
        'description'   => esc_html__( 'Add widgets here to appear in your footer.', 'basic-elementor-theme' ),
        'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );

    register_sidebar( array(
        'name'          => esc_html__( 'Footer 3', 'basic-elementor-theme' ),
        'id'            => 'footer-3',
        'description'   => esc_html__( 'Add widgets here to appear in your footer.', 'basic-elementor-theme' ),
        'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );
}
add_action( 'widgets_init', 'basic_theme_widgets_init' );

/**
 * Enqueue scripts and styles
 */
function basic_theme_scripts() {
    // Enqueue main stylesheet
    wp_enqueue_style( 'basic-theme-style', get_stylesheet_uri(), array(), BASIC_THEME_VERSION );

    // Enqueue custom styles
    wp_enqueue_style( 'basic-theme-main', get_template_directory_uri() . '/assets/css/main.css', array(), BASIC_THEME_VERSION );

    // Enqueue navigation script
    wp_enqueue_script( 'basic-theme-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array(), BASIC_THEME_VERSION, true );

    // Enqueue comment reply script
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'basic_theme_scripts' );

/**
 * Add Elementor support
 */
function basic_theme_add_elementor_support() {
    // Add Elementor support
    add_theme_support( 'elementor' );
}
add_action( 'after_setup_theme', 'basic_theme_add_elementor_support' );

/**
 * Register Elementor locations
 */
function basic_theme_register_elementor_locations( $elementor_theme_manager ) {
    $elementor_theme_manager->register_all_core_location();
}
add_action( 'elementor/theme/register_locations', 'basic_theme_register_elementor_locations' );

/**
 * Add body classes for Elementor
 */
function basic_theme_body_classes( $classes ) {
    // Add a class if Elementor is active
    if ( did_action( 'elementor/loaded' ) ) {
        $classes[] = 'elementor-default';
    }

    // Add a class if sidebar is active
    if ( is_active_sidebar( 'sidebar-1' ) && ! is_page_template( 'page-templates/full-width.php' ) ) {
        $classes[] = 'has-sidebar';
    }

    return $classes;
}
add_filter( 'body_class', 'basic_theme_body_classes' );

/**
 * Custom excerpt length
 */
function basic_theme_excerpt_length( $length ) {
    return 30;
}
add_filter( 'excerpt_length', 'basic_theme_excerpt_length' );

/**
 * Custom excerpt more
 */
function basic_theme_excerpt_more( $more ) {
    return '...';
}
add_filter( 'excerpt_more', 'basic_theme_excerpt_more' );

/**
 * Add pagination
 */
function basic_theme_pagination() {
    the_posts_pagination( array(
        'mid_size'  => 2,
        'prev_text' => esc_html__( '← Previous', 'basic-elementor-theme' ),
        'next_text' => esc_html__( 'Next →', 'basic-elementor-theme' ),
    ) );
}

/**
 * Custom comments callback
 */
function basic_theme_comment( $comment, $args, $depth ) {
    ?>
    <li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
        <article class="comment-body">
            <div class="comment-author vcard">
                <?php echo get_avatar( $comment, 50 ); ?>
                <b class="fn"><?php echo get_comment_author_link(); ?></b>
            </div>
            <div class="comment-metadata">
                <a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
                    <?php printf( esc_html__( '%1$s at %2$s', 'basic-elementor-theme' ), get_comment_date(), get_comment_time() ); ?>
                </a>
            </div>
            <div class="comment-content">
                <?php comment_text(); ?>
            </div>
            <?php
            comment_reply_link( array_merge( $args, array(
                'depth'     => $depth,
                'max_depth' => $args['max_depth'],
            ) ) );
            ?>
        </article>
    <?php
}

/**
 * Skip link focus fix for screen readers
 */
function basic_theme_skip_link_focus_fix() {
    ?>
    <script>
    (function() {
        var is_webkit = navigator.userAgent.toLowerCase().indexOf('webkit') > -1,
            is_opera  = navigator.userAgent.toLowerCase().indexOf('opera')  > -1,
            is_ie     = navigator.userAgent.toLowerCase().indexOf('msie')   > -1;

        if ((is_webkit || is_opera || is_ie) && document.getElementById && window.addEventListener) {
            window.addEventListener('hashchange', function() {
                var element = document.getElementById(location.hash.substring(1));
                if (element) {
                    if (!/^(?:a|select|input|button|textarea)$/i.test(element.tagName))
                        element.tabIndex = -1;
                    element.focus();
                }
            }, false);
        }
    })();
    </script>
    <?php
}
add_action( 'wp_print_footer_scripts', 'basic_theme_skip_link_focus_fix' );

/**
 * Include custom functions
 */
require get_template_directory() . '/inc/template-tags.php';
require get_template_directory() . '/inc/customizer.php';
