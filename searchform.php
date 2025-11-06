<?php
/**
 * Template for displaying search forms
 *
 * @package Basic_Elementor_Theme
 */
?>

<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <label>
        <span class="screen-reader-text"><?php echo esc_html_x( 'Rechercher:', 'label', 'basic-elementor-theme' ); ?></span>
        <input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Rechercher&hellip;', 'placeholder', 'basic-elementor-theme' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
    </label>
    <button type="submit" class="search-submit">
        <span class="screen-reader-text"><?php echo esc_html_x( 'Rechercher', 'submit button', 'basic-elementor-theme' ); ?></span>
        🔍
    </button>
</form>
