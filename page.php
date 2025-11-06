<?php
/**
 * The template for displaying all pages
 *
 * @package Basic_Elementor_Theme
 */

get_header();
?>

<div class="container">
    <main id="primary" class="content-area">

        <?php
        while ( have_posts() ) :
            the_post();
            ?>

            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <?php if ( has_post_thumbnail() && ! is_front_page() ) : ?>
                    <div class="post-thumbnail">
                        <?php the_post_thumbnail( 'basic-theme-featured' ); ?>
                    </div>
                <?php endif; ?>

                <header class="entry-header">
                    <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
                </header>

                <div class="entry-content">
                    <?php
                    the_content();

                    wp_link_pages( array(
                        'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'basic-elementor-theme' ),
                        'after'  => '</div>',
                    ) );
                    ?>
                </div>

                <?php if ( get_edit_post_link() ) : ?>
                    <footer class="entry-footer">
                        <?php
                        edit_post_link(
                            sprintf(
                                wp_kses(
                                    __( 'Modifier <span class="screen-reader-text">%s</span>', 'basic-elementor-theme' ),
                                    array(
                                        'span' => array(
                                            'class' => array(),
                                        ),
                                    )
                                ),
                                get_the_title()
                            ),
                            '<span class="edit-link">',
                            '</span>'
                        );
                        ?>
                    </footer>
                <?php endif; ?>
            </article>

            <?php
            // If comments are open or we have at least one comment, load up the comment template.
            if ( comments_open() || get_comments_number() ) :
                comments_template();
            endif;

        endwhile;
        ?>

    </main>

    <?php
    // Only show sidebar if not full-width page template
    if ( ! is_page_template( 'page-templates/full-width.php' ) ) {
        get_sidebar();
    }
    ?>
</div><!-- .container -->

<?php
get_footer();
