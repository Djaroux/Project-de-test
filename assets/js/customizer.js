/**
 * Customizer live preview scripts
 * Handles live preview of theme customizer settings
 */

(function($) {
    'use strict';

    // Site title
    wp.customize('blogname', function(value) {
        value.bind(function(to) {
            $('.site-title a').text(to);
        });
    });

    // Site description
    wp.customize('blogdescription', function(value) {
        value.bind(function(to) {
            $('.site-description').text(to);
        });
    });

    // Header text color
    wp.customize('header_textcolor', function(value) {
        value.bind(function(to) {
            if ('blank' === to) {
                $('.site-title, .site-description').css({
                    'clip': 'rect(1px, 1px, 1px, 1px)',
                    'position': 'absolute'
                });
            } else {
                $('.site-title, .site-description').css({
                    'clip': 'auto',
                    'position': 'relative'
                });
                $('.site-title a, .site-description').css({
                    'color': to
                });
            }
        });
    });

    // Primary color
    wp.customize('basic_theme_primary_color', function(value) {
        value.bind(function(to) {
            var style = '<style id="basic-theme-primary-color">';
            style += 'a, .main-navigation a:hover, .main-navigation .current-menu-item a { color: ' + to + '; }';
            style += '.wp-block-search__button, .pagination .current { background-color: ' + to + '; border-color: ' + to + '; }';
            style += '</style>';

            var existingStyle = $('#basic-theme-primary-color');
            if (existingStyle.length) {
                existingStyle.replaceWith(style);
            } else {
                $('head').append(style);
            }
        });
    });

    // Container width
    wp.customize('basic_theme_container_width', function(value) {
        value.bind(function(to) {
            var style = '<style id="basic-theme-container-width">';
            style += '.container { max-width: ' + to + 'px; }';
            style += '</style>';

            var existingStyle = $('#basic-theme-container-width');
            if (existingStyle.length) {
                existingStyle.replaceWith(style);
            } else {
                $('head').append(style);
            }
        });
    });

    // Footer text
    wp.customize('basic_theme_footer_text', function(value) {
        value.bind(function(to) {
            $('.site-info p').html(to);
        });
    });

})(jQuery);
