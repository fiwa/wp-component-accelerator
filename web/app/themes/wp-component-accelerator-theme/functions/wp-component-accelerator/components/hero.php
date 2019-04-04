<?php
/**
 * Component hero
 *
 * @param array $args {
 *       Optional, array of arguments.
 *
 *       @type string         container         'Accepts 'div' or 'a'.
 *       ...
 * }
 */

// Setup default arguments
$defaults = array(
    'container'                 => 'div',
    'container_class'           => 'Hero',
    'content_class'             => 'Hero__content',
    'title'                     => __('Hero default title'),
    'title_block_format'        => 'h1',
    'title_class'               => 'Hero__title',
    'image_container'           => 'figure',
    'image_container_class'     => 'Hero__image',
    'image_id'                  => '',
    'image_format'              => 'large',
    'description'               => '',
    'description_class'         => 'Hero__description',
    'link'                      => '',
);

$args = wp_parse_args($args, $defaults);

// If invalid value, fall back to default
if (!in_array($args['container'], array('div', 'a'), true)) {
    $args['container'] = $defaults['container'];
}

if (!in_array($args['image_container'], array('figure', 'div'), true)) {
    $args['image_container'] = $defaults['image_container'];
}

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

$image = $defaults['image_id'];
$image_el = wp_get_attachment_image(absint($args['image_id']), esc_attr($args['image_format']));
if ($image_el) {
    $image = sprintf(
        '<%1$s class="%2$s">%3$s</%1$s>',
        esc_attr($args['image_container']),
        esc_attr($args['image_container_class']),
        $image_el
    );
    $args['container_class'] .= ' '. $args['container_class'] . '--has-image';
}
?>

<<?php echo sprintf('%1$s %2$s class="%3$s"', esc_attr($args['container']), $args['link'], esc_attr($args['container_class'])); ?>>

    <div class="<?php echo esc_attr($args['content_class']); ?>">
        <?php echo $title; ?>
        <?php echo $description; ?>
    </div>

    <?php echo $image; ?>

</<?php echo esc_attr($args['container']); ?>>
