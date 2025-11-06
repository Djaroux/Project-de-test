<?php
/**
 * Template Name: Elementor Canvas
 * Template Post Type: page
 *
 * A blank canvas template without header and footer, perfect for Elementor landing pages
 *
 * @package Basic_Elementor_Theme
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>

<body <?php body_class( 'elementor-canvas' ); ?>>
<?php wp_body_open(); ?>

<?php
while ( have_posts() ) :
    the_post();
    ?>

    <main id="primary" class="site-main">
        <?php the_content(); ?>
    </main>

<?php
endwhile;
?>

<?php wp_footer(); ?>

</body>
</html>
