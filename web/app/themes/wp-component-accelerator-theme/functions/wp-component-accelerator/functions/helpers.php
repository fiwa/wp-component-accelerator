<?php

/**
 * Write to errorlog
 */
if (!function_exists('pr_log')) {
   function pr_log ( $log )  {
      if (is_array($log) || is_object($log)) {
         error_log(print_r($log, true));
      } else {
         error_log($log);
      }
   }
}

/**
 * Media object (returns image or video)
 */
function wpca_media_object($args = array()) {
    $output = array(
        'status'                   => 'error',
        'html'                     => '',
        'container_class'          => '',
    );

    if (!empty($args['video_id'])) {
        $args['poster'] = wp_get_attachment_url(absint($args['image_id']));

        $video = wpca_get_video_tag($args['video_id'], $args);

        if ('success' === $video['status']) {
            $output['container_class'] = $args['container_class'] . '--has-video';
            $output['html'] = $video['html'];
        } else {
            $image = wpca_get_image_tag($args);

            if ('success' === $image['status']) {
                $output['container_class'] = $args['container_class'] . '--has-image';
                $output['html'] = $image['html'];
            }
        }
    } else {
        $image = wpca_get_image_tag($args);

        if ('success' === $image['status']) {
            $output['container_class'] = $args['container_class'] . '--has-image';
            $output['html'] = $image['html'];
        }
    }

    return $output;
}

/**
 * Post mime type
 */
function wpca_mime_type($mime_type = '') {
    $type = '';

    if (false !== strpos($mime_type, '/')) {
        list($type, $subtype ) = explode('/', $mime_type);
    } else {
        list($type, $subtype) = array($mime_type, '');
    }

    return $type;
}

/**
 * Return image tag
 */
function wpca_get_image_tag($args = array()) {
    $output = array(
        'status' => 'error',
        'html'   => '',
    );

    $args = array(
        'image_id'                    => esc_attr($args['image_id']),
        'image_format'                => esc_attr($args['image_format']),
        'image_container'             => esc_attr($args['image_container']),
        'image_container_class'       => esc_attr($args['image_container_class']),
    );

    $image_el = wp_get_attachment_image(absint($args['image_id']), esc_attr($args['image_format']));
    if ($image_el) {
        $output['html'] = sprintf(
            '<%1$s class="%2$s">%3$s</%1$s>',
            esc_attr($args['image_container']),
            esc_attr($args['image_container_class']),
            $image_el
        );
        $output['status'] = 'success';
    }

    return $output;
}

/**
 * Return video tag
 */
function wpca_get_video_tag($attachments = array(), $args = '') {
    $args = array(
        'preload'       => esc_attr($args['video_preload']),
        'loop'          => esc_attr($args['video_loop']),
        'muted'         => esc_attr($args['video_muted']),
        'autoplay'      => esc_attr($args['video_autoplay']),
        'poster'        => esc_url($args['poster']),
    );

    $output = array(
        'status' => 'error',
        'html'   => sprintf('<video %s>', join(' ', $args)),
    );

    $source  = '<source type="%s" src="%s" />';
    foreach ($attachments as $attachment) {
        if (!$attachment = get_post(absint($attachment))) {
            return;
        }

        if ('video' === wpca_mime_type($attachment->post_mime_type)) {
            $output['status'] = 'success';
            $output['html'] .= sprintf($source, esc_attr($attachment->post_mime_type), esc_url($attachment->guid));
        }
    }

    $output['html'] .= '</video>';

    return $output;
}