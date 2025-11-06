<?php
/**
 * Template Name: Full Width (No Sidebar)
 * Template Post Type: page
 *
 * A full width template without sidebar, perfect for Elementor pages
 *
 * @package Basic_Elementor_Theme
 */

get_header();
?>

<div class="container" style="max-width: 100%; padding: 0;">
    <main id="primary" class="content-area" style="width: 100%;">

        <?php
        while ( have_posts() ) :
            the_post();
            ?>

            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <div class="entry-content">
                    <?php
                    the_content();

                    wp_link_pages( array(
                        'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'basic-elementor-theme' ),
                        'after'  => '</div>',
                    ) );
                    ?>
                </div>
            </article>

            <?php
            // If comments are open or we have at least one comment, load up the comment template.
            if ( comments_open() || get_comments_number() ) :
                ?>
                <div class="container">
                    <?php comments_template(); ?>
                </div>
                <?php
            endif;

        endwhile;
        ?>

    </main>
</div>

<?php
get_footer();
