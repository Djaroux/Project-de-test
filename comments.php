<?php
/**
 * The template for displaying comments
 *
 * @package Basic_Elementor_Theme
 */

if ( post_password_required() ) {
    return;
}
?>

<div id="comments" class="comments-area">

    <?php if ( have_comments() ) : ?>
        <h2 class="comments-title">
            <?php
            $comment_count = get_comments_number();
            if ( '1' === $comment_count ) {
                printf(
                    esc_html__( 'Un commentaire sur &ldquo;%s&rdquo;', 'basic-elementor-theme' ),
                    '<span>' . get_the_title() . '</span>'
                );
            } else {
                printf(
                    esc_html( _nx( '%1$s commentaire sur &ldquo;%2$s&rdquo;', '%1$s commentaires sur &ldquo;%2$s&rdquo;', $comment_count, 'comments title', 'basic-elementor-theme' ) ),
                    number_format_i18n( $comment_count ),
                    '<span>' . get_the_title() . '</span>'
                );
            }
            ?>
        </h2>

        <ol class="comment-list">
            <?php
            wp_list_comments( array(
                'style'       => 'ol',
                'short_ping'  => true,
                'avatar_size' => 50,
                'callback'    => 'basic_theme_comment',
            ) );
            ?>
        </ol>

        <?php
        the_comments_navigation();

        // If comments are closed and there are comments, let's leave a little note
        if ( ! comments_open() ) :
            ?>
            <p class="no-comments"><?php esc_html_e( 'Les commentaires sont fermés.', 'basic-elementor-theme' ); ?></p>
        <?php
        endif;

    endif; // Check for have_comments()

    comment_form();
    ?>

</div><!-- #comments -->
