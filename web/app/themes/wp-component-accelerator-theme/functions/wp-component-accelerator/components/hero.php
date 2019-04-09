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
    '<div class="%1$s">%2$s</div>',
    esc_attr($args['title_container_class']),
    $args['title'],
);

$description = sprintf(
    '<div class="%1$s">%2$s</div>',
    esc_attr($args['description_class']),
    $args['description'],
);

$media_object = '';
if (!empty($args['video_id'])) {
    $args['poster'] = wp_get_attachment_url(absint($args['image_id']));

    $video = wpca_get_video_tag($args['video_id'], $args);

    if ('success' === $video['status']) {
        $args['container_class'] .= ' '. $args['container_class'] . '--has-video';
        $media_object = $video['html'];
    } else {
        $image = wpca_get_image_tag($args);

        if ('success' === $image['status']) {
            $args['container_class'] .= ' '. $args['container_class'] . '--has-image';
            $media_object = $image['html'];
        }
    }
} else {
    $image = wpca_get_image_tag($args);

    if ('success' === $image['status']) {
        $args['container_class'] .= ' '. $args['container_class'] . '--has-image';
        $media_object = $image['html'];
    }
}

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
        <?php echo $description; ?>
    </div>

    <?php echo $media_object; ?>

<?php
echo sprintf(
    '</%s>',
    esc_attr($args['container'])
);
?>
