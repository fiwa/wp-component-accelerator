<?php
/**
 * Component Hero
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
    'title'                     => '<h1 class="Hero__heading-title">Hero default title</h1>',
    'title_container_class'     => 'Hero__heading',
    'image_container'           => 'figure',
    'image_container_class'     => 'Hero__image',
    'image_id'                  => '',
    'image_format'              => 'large',
    'video_id'                  => array(),
    'video_autoplay'            => 'autoplay',
    'video_muted'               => 'muted',
    'video_loop'                => 'loop',
    'video_preload'             => 'auto',
    'body'                      => '',
    'body_class'                => 'Hero__body',
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
    '<div class="%1$s">%2$s</div>',
    esc_attr($args['title_container_class']),
    $args['title'],
);

$body = sprintf(
    '<div class="%1$s">%2$s</div>',
    esc_attr($args['body_class']),
    $args['body'],
);

$media_object = wpca_media_object($args);
$args['container_class'] .= ' ' . $media_object['container_class'];
$media_object = $media_object['html'];
?>

<?php
echo sprintf(
    '<%1$s %2$s class="%3$s">',
    esc_attr($args['container']),
    $args['link'],
    esc_attr($args['container_class'])
);
?>

    <div class="<?php echo esc_attr($args['content_class']); ?>">
        <?php echo $title; ?>
        <?php echo $body; ?>
    </div>

    <?php echo $media_object; ?>

<?php
echo sprintf(
    '</%s>',
    esc_attr($args['container'])
);
?>
