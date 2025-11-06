<?php
/**
 * The template for displaying all single posts
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
                <?php if ( has_post_thumbnail() ) : ?>
                    <div class="post-thumbnail">
                        <?php the_post_thumbnail( 'large' ); ?>
                    </div>
                <?php endif; ?>

                <header class="entry-header">
                    <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

                    <div class="entry-meta">
                        <span class="posted-on">
                            <time datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>">
                                <?php echo get_the_date(); ?>
                            </time>
                        </span>
                        <span class="byline">
                            <?php
                            printf(
                                esc_html__( 'par %s', 'basic-elementor-theme' ),
                                '<a href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a>'
                            );
                            ?>
                        </span>
                        <?php if ( has_category() ) : ?>
                            <span class="cat-links">
                                <?php
                                printf(
                                    esc_html__( 'dans %s', 'basic-elementor-theme' ),
                                    get_the_category_list( ', ' )
                                );
                                ?>
                            </span>
                        <?php endif; ?>
                    </div>
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

                <footer class="entry-footer">
                    <?php
                    // Tags
                    $tags_list = get_the_tag_list( '', ', ' );
                    if ( $tags_list ) {
                        printf(
                            '<div class="tags-links"><strong>' . esc_html__( 'Étiquettes:', 'basic-elementor-theme' ) . '</strong> %s</div>',
                            $tags_list
                        );
                    }

                    // Edit link
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
            </article>

            <?php
            // Previous/Next post navigation
            the_post_navigation( array(
                'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Article précédent:', 'basic-elementor-theme' ) . '</span> <span class="nav-title">%title</span>',
                'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Article suivant:', 'basic-elementor-theme' ) . '</span> <span class="nav-title">%title</span>',
            ) );

            // If comments are open or we have at least one comment, load up the comment template.
            if ( comments_open() || get_comments_number() ) :
                comments_template();
            endif;

        endwhile;
        ?>

    </main>

    <?php get_sidebar(); ?>
</div><!-- .container -->

<?php
get_footer();
