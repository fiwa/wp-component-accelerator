<?php

/**
 * Enqueue stylesheets
 */
add_action('wp_enqueue_scripts', function() {
    wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');
    wp_enqueue_style('child-style', get_stylesheet_directory_uri() . '/style.css');
});

/**
 * Load function parts
 */
load_functions(
    array(
        'wp-component-accelerator/wp-component-accelerator',
        )
);

function load_function_file($functionFileName) {
    $includePath = get_theme_file_path('/functions/') . $functionFileName . '.php';
    if (!file_exists($includePath))
        throw new RuntimeException ($functionFileName . ' does not exist');
    else
        require_once($includePath);
}

function load_functions($files) {
    foreach ($files as $file) {
        try {
            load_function_file($file);
        } catch (RuntimeException $e) {
            // Hush!
            if (WP_DEBUG) echo "Missing function file. ".$e->getMessage();
        }
    }
}


