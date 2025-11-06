<?php
/**
 * The template for displaying archive pages
 *
 * @package Basic_Elementor_Theme
 */

get_header();
?>

<div class="container">
    <main id="primary" class="content-area">

        <?php if ( have_posts() ) : ?>

            <header class="page-header">
                <?php
                the_archive_title( '<h1 class="page-title">', '</h1>' );
                the_archive_description( '<div class="archive-description">', '</div>' );
                ?>
            </header>

            <div class="posts-list">

                <?php
                // Start the Loop
                while ( have_posts() ) :
                    the_post();
                    ?>

                    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                        <?php if ( has_post_thumbnail() ) : ?>
                            <div class="post-thumbnail">
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_post_thumbnail( 'basic-theme-featured' ); ?>
                                </a>
                            </div>
                        <?php endif; ?>

                        <header class="entry-header">
                            <?php
                            the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
                            ?>

                            <?php if ( 'post' === get_post_type() ) : ?>
                                <div class="entry-meta">
                                    <span class="posted-on">
                                        <?php echo get_the_date(); ?>
                                    </span>
                                    <span class="byline">
                                        <?php
                                        printf(
                                            esc_html__( 'par %s', 'basic-elementor-theme' ),
                                            '<a href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a>'
                                        );
                                        ?>
                                    </span>
                                </div>
                            <?php endif; ?>
                        </header>

                        <div class="entry-content">
                            <?php the_excerpt(); ?>
                            <a href="<?php the_permalink(); ?>" class="read-more">
                                <?php esc_html_e( 'Lire la suite', 'basic-elementor-theme' ); ?> →
                            </a>
                        </div>
                    </article>

                <?php
                endwhile;
                ?>

            </div><!-- .posts-list -->

            <?php
            // Pagination
            basic_theme_pagination();

        else :
            ?>

            <section class="no-results not-found">
                <header class="page-header">
                    <h1 class="page-title"><?php esc_html_e( 'Rien n\'a été trouvé', 'basic-elementor-theme' ); ?></h1>
                </header>

                <div class="page-content">
                    <p><?php esc_html_e( 'Il semble que nous ne puissions pas trouver ce que vous cherchez. Peut-être qu\'une recherche aidera.', 'basic-elementor-theme' ); ?></p>
                    <?php get_search_form(); ?>
                </div>
            </section>

        <?php endif; ?>

    </main>

    <?php get_sidebar(); ?>
</div><!-- .container -->

<?php
get_footer();
