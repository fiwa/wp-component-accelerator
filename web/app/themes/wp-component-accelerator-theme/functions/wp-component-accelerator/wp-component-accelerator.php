<?php

/**
 * Get component
 *
 * @param string $type
 *
 * @param array $args
 * Optional, array of arguments.
 * Defined in each component.
 */
function wpca_get_component($type = '', $args = array()) {
    $template_path = sprintf(get_theme_file_path('/functions') . '/wp-component-accelerator/components/%s.php', $type);
    if (!file_exists($template_path)) {
        if (WP_DEBUG) echo sprintf(__('Component <i>"%s"</i> missing. Supported component types are listed in the documentation at #.'), $type);
    } else {
        require $template_path;
    }
}

/**
 * Enqueue stylesheets
 */
add_action('wp_enqueue_scripts', function() {
    wp_enqueue_style('wpca-style', get_stylesheet_directory_uri() . '/functions/wp-component-accelerator/style.css');
});