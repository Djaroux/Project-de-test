<?php
/**
 * Theme Customizer
 *
 * @package Basic_Elementor_Theme
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function basic_theme_customize_register( $wp_customize ) {
    $wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
    $wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
    $wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

    if ( isset( $wp_customize->selective_refresh ) ) {
        $wp_customize->selective_refresh->add_partial( 'blogname', array(
            'selector'        => '.site-title a',
            'render_callback' => 'basic_theme_customize_partial_blogname',
        ) );
        $wp_customize->selective_refresh->add_partial( 'blogdescription', array(
            'selector'        => '.site-description',
            'render_callback' => 'basic_theme_customize_partial_blogdescription',
        ) );
    }

    // Add theme colors section
    $wp_customize->add_section( 'basic_theme_colors', array(
        'title'    => __( 'Couleurs du thème', 'basic-elementor-theme' ),
        'priority' => 30,
    ) );

    // Primary color
    $wp_customize->add_setting( 'basic_theme_primary_color', array(
        'default'           => '#0073aa',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'postMessage',
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'basic_theme_primary_color', array(
        'label'    => __( 'Couleur principale', 'basic-elementor-theme' ),
        'section'  => 'basic_theme_colors',
        'settings' => 'basic_theme_primary_color',
    ) ) );

    // Footer options
    $wp_customize->add_section( 'basic_theme_footer', array(
        'title'    => __( 'Options du pied de page', 'basic-elementor-theme' ),
        'priority' => 90,
    ) );

    // Footer copyright text
    $wp_customize->add_setting( 'basic_theme_footer_text', array(
        'default'           => '',
        'sanitize_callback' => 'wp_kses_post',
        'transport'         => 'postMessage',
    ) );

    $wp_customize->add_control( 'basic_theme_footer_text', array(
        'label'    => __( 'Texte de copyright', 'basic-elementor-theme' ),
        'section'  => 'basic_theme_footer',
        'settings' => 'basic_theme_footer_text',
        'type'     => 'textarea',
    ) );

    // Layout options
    $wp_customize->add_section( 'basic_theme_layout', array(
        'title'    => __( 'Options de mise en page', 'basic-elementor-theme' ),
        'priority' => 40,
    ) );

    // Container width
    $wp_customize->add_setting( 'basic_theme_container_width', array(
        'default'           => '1200',
        'sanitize_callback' => 'absint',
        'transport'         => 'postMessage',
    ) );

    $wp_customize->add_control( 'basic_theme_container_width', array(
        'label'       => __( 'Largeur du conteneur (px)', 'basic-elementor-theme' ),
        'section'     => 'basic_theme_layout',
        'settings'    => 'basic_theme_container_width',
        'type'        => 'number',
        'input_attrs' => array(
            'min'  => 960,
            'max'  => 1920,
            'step' => 10,
        ),
    ) );
}
add_action( 'customize_register', 'basic_theme_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function basic_theme_customize_partial_blogname() {
    bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function basic_theme_customize_partial_blogdescription() {
    bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function basic_theme_customize_preview_js() {
    wp_enqueue_script( 'basic-theme-customizer', get_template_directory_uri() . '/assets/js/customizer.js', array( 'customize-preview' ), BASIC_THEME_VERSION, true );
}
add_action( 'customize_preview_init', 'basic_theme_customize_preview_js' );

/**
 * Output custom CSS based on Customizer settings
 */
function basic_theme_customizer_css() {
    $primary_color     = get_theme_mod( 'basic_theme_primary_color', '#0073aa' );
    $container_width   = get_theme_mod( 'basic_theme_container_width', '1200' );

    ?>
    <style type="text/css">
        :root {
            --primary-color: <?php echo esc_attr( $primary_color ); ?>;
            --container-width: <?php echo esc_attr( $container_width ); ?>px;
        }

        a,
        .main-navigation a:hover,
        .main-navigation .current-menu-item a {
            color: <?php echo esc_attr( $primary_color ); ?>;
        }

        .container {
            max-width: <?php echo esc_attr( $container_width ); ?>px;
        }

        .wp-block-search__button,
        .pagination .current {
            background-color: <?php echo esc_attr( $primary_color ); ?>;
            border-color: <?php echo esc_attr( $primary_color ); ?>;
        }
    </style>
    <?php
}
add_action( 'wp_head', 'basic_theme_customizer_css' );
