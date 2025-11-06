<?php
/**
 * The main template file
 *
 * @package Basic_Elementor_Theme
 */

get_header();
?>

<div class="container">
    <main id="primary" class="content-area">

        <?php if ( have_posts() ) : ?>

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
                            if ( is_singular() ) :
                                the_title( '<h1 class="entry-title">', '</h1>' );
                            else :
                                the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
                            endif;
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
                            <?php endif; ?>
                        </header>

                        <div class="entry-content">
                            <?php
                            if ( is_singular() ) {
                                the_content();

                                wp_link_pages( array(
                                    'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'basic-elementor-theme' ),
                                    'after'  => '</div>',
                                ) );
                            } else {
                                the_excerpt();
                                ?>
                                <a href="<?php the_permalink(); ?>" class="read-more">
                                    <?php esc_html_e( 'Lire la suite', 'basic-elementor-theme' ); ?> →
                                </a>
                                <?php
                            }
                            ?>
                        </div>

                        <?php if ( is_singular() && ( has_tag() || get_the_tags() ) ) : ?>
                            <footer class="entry-footer">
                                <?php
                                $tags_list = get_the_tag_list( '', ', ' );
                                if ( $tags_list ) {
                                    printf(
                                        '<span class="tags-links">' . esc_html__( 'Étiquettes: %s', 'basic-elementor-theme' ) . '</span>',
                                        $tags_list
                                    );
                                }
                                ?>
                            </footer>
                        <?php endif; ?>
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
                    <?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

                        <p>
                            <?php
                            printf(
                                wp_kses(
                                    __( 'Prêt à publier votre premier article? <a href="%1$s">Commencez ici</a>.', 'basic-elementor-theme' ),
                                    array(
                                        'a' => array(
                                            'href' => array(),
                                        ),
                                    )
                                ),
                                esc_url( admin_url( 'post-new.php' ) )
                            );
                            ?>
                        </p>

                    <?php elseif ( is_search() ) : ?>

                        <p><?php esc_html_e( 'Désolé, aucun résultat ne correspond à votre recherche. Veuillez essayer avec d\'autres mots-clés.', 'basic-elementor-theme' ); ?></p>
                        <?php get_search_form(); ?>

                    <?php else : ?>

                        <p><?php esc_html_e( 'Il semble que nous ne puissions pas trouver ce que vous cherchez. Peut-être qu\'une recherche aidera.', 'basic-elementor-theme' ); ?></p>
                        <?php get_search_form(); ?>

                    <?php endif; ?>
                </div>
            </section>

        <?php endif; ?>

    </main>

    <?php get_sidebar(); ?>
</div><!-- .container -->

<?php
get_footer();
