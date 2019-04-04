<?php
/**
 * Component hero
 */

// Setup default arguments
$defaults = array(
    'container'             => 'div',
    'container_class'       => 'hero',
    'content_class'         => 'hero__content',
    'title'                 => __('Hero default title'),
    'title_block_format'    => 'h1',
    'title_class'           => 'hero__title',
    'description'           => '',
    'description_class'     => 'hero__description',
    'link'                  => '',
);

$args = wp_parse_args($args, $defaults);

// Invalid value, fall back to default
if (!in_array($args['container'], array('div', 'a'), true)) {
    $args['container'] = $defaults['container'];
}

// Invalid values, fall back to default
if ('a' === $args['container'] && wp_http_validate_url($args['link'])) {
    $args['container'] = 'a';
    $args['link'] = sprintf('href="%s"', esc_url($args['link']));
} else {
    $args['container'] = $defaults['container'];
    $args['link'] = $defaults['link'];
}

// Component content
$title = sprintf(
    '<%1$s class="%2$s">%3$s</%1$s>',
    esc_attr($args['title_block_format']),
    esc_attr($args['title_class']),
    esc_html($args['title']),
);

$description = sprintf(
    '<div class="%1$s">%2$s</div>',
    esc_attr($args['description_class']),
    $args['description'],
);
?>

<<?php echo sprintf('%1$s %2$s class="%3$s"', esc_attr($args['container']), esc_url($args['link']), esc_attr($args['container_class'])); ?>>

    <div class="<?php echo esc_attr($args['content_class']); ?>">

        <?php echo $title; ?>
        <?php echo $description; ?>

    </div>

</<?php echo esc_attr($args['container']); ?>>
