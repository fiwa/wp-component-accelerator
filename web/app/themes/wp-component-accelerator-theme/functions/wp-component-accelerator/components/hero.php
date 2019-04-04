<?php
/**
 * Component hero
 */

// Setup default args
$defaults = array(
    'container'             => 'div',
    'container_class'       => 'hero',
    'title'                 => __('Hero default title'),
    'title_block_format'    => 'h1',
    'title_class'           => 'hero__title',
    'description'           => apply_filters('the_content', __('Hero default description.')),
    'description_class'     => 'hero__description',
    'link'                  => '',
);

$args = wp_parse_args($args, $defaults);

if (!in_array($args['container'], array('div', 'a'), true)) {
    // Invalid value, fall back to default
    $args['container'] = $defaults['container'];
}

if ('a' === $args['container'] && wp_http_validate_url($args['link'])) {
    $args['container'] = 'a';
    $args['link'] = sprintf('href="%s"', esc_url($args['link']));
} else {
    $args['container'] = $defaults['container'];
    $args['link'] = $defaults['link'];
}

// Open component container
$wpca_component = sprintf(
    '<%1$s %2$s class="%3$s">',
    $args['container'],
    $args['link'],
    $args['container_class'],
);

// Component content
$wpca_component .= sprintf(
    '<%1$s class="%2$s">%3$s</%1$s>',
    esc_attr($args['title_block_format']),
    esc_attr($args['title_class']),
    esc_html($args['title']),
);

$wpca_component .= sprintf(
    '<div class="%1$s">%2$s</div>',
    esc_attr($args['description_class']),
    $args['description'],
);

// Close component vontainer
$wpca_component .= sprintf(
    '</%1$s>',
    $args['container']
);

// Print component
echo $wpca_component;
