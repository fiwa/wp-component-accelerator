<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */

get_header();
?>

    <section id="primary" class="content-area">
        <main id="main" class="site-main">

            <div class="component-container">
                <?php echo wpca_get_component('hero'); ?>
<pre>echo wpca_get_component('hero');</pre>

                <?php
                echo wpca_get_component(
                    'hero',
                    array(
                        'container_class'   => 'my-custom-container-class',
                        'content_class'     => 'my-custom-content-class',
                        'title'             => '<h1 class="my-custom-title-class">My custom hero title</h1>',
                        'body'              => '<p>My custom hero body n ac pellentesque urna. Ut id posuere lorem, at aliquet libero. In vitae dui eros. Duis cursus sapien nec erat finibus volutpat. Nulla placerat dui felis, non gravida ante pretium nec. Vestibulum lorem massa, sodales vitae maximus non, lacinia eu est. Suspendisse sodales dui odio, nec eleifend lectus faucibus at.</p>',
                        'body_class'        => 'my-custom-body-class',
                    )
                );
                ?>
<pre>
echo wpca_get_component(
    'hero',
    array(
        'container_class'   => 'my-custom-container-class',
        'content_class'     => 'my-custom-content-class',
        'title'             => '&lt;h1&gt; class="my-custom-title-class">My custom hero title&lt;/h1&gt;',
        'body'              => '&lt;p&gt;My custom hero body...&lt;/p&gt;',
        'body_class'        => 'my-custom-body-class',
    )
);
</pre>

                <?php
                echo wpca_get_component(
                    'hero',
                    array(
                        'title'             => '<h1>Hero with image</h1>',
                        'image_id'          => 5,
                        'image_format'      => 'full',
                        'body'              => '<p>My custom hero body n ac pellentesque urna. Ut id posuere lorem, at aliquet libero. In vitae dui eros. Duis cursus sapien nec erat finibus volutpat. Nulla placerat dui felis, non gravida ante pretium nec. Vestibulum lorem massa, sodales vitae maximus non, lacinia eu est. Suspendisse sodales dui odio, nec eleifend lectus faucibus at.</p>',
                    )
                );
                ?>
<pre>
echo wpca_get_component(
    'hero',
    array(
        ...
        'image_id'          => 5,
        'image_format'      => 'full',
    )
);
</pre>

                <?php
                echo wpca_get_component(
                    'hero',
                    array(
                        'title'             => '<h1>Hero with video</h1>',
                        'body'              => '<p>Poster<br>Source: mp4, webm, ogv</p>',
                        'image_id'          => 5,
                        'video_id'          => array(6, 7, 8),
                    )
                );
                ?>

<pre>
echo wpca_get_component(
    'hero',
    array(
        ...
        'image_id'          => 5,
        'video_id'          => array(6, 7, 8),
    )
);
</pre>

                <?php
                echo wpca_get_component(
                    'hero',
                    array(
                        'title'             => '<h1>Hero with video</h1>',
                        'body'              => '<p>Run once</p>',
                        'video_id'          => array(6, 7),
                        'video_loop'        => false,
                    )
                );
                ?>

<pre>
echo wpca_get_component(
    'hero',
    array(
        ...
        'video_id'          => array(6, 7),
        'video_loop'        => false,
    )
);
</pre>


                <?php
                echo wpca_get_component(
                    'hero',
                    array(
                        'title'             => '<h1>Hero with video</h1>',
                        'body'              => '<p>Invalid video source</p>',
                        'video_id'          => array(5, 6),
                    )
                );
                ?>

<pre>
echo wpca_get_component(
    'hero',
    array(
        ...
         'video_id'         => array(5, 6),
    )
);
</pre>

                <?php
                echo wpca_get_component(
                    'hero',
                    array(
                        'title'             => '<h1>Hero with invalid video IDs</h1>',
                        'body'              => '<p>Invalid video sources</p>',
                        'image_id'          => 5,
                        'video_id'          => array(6, 71),
                    )
                );
                ?>

<pre>
echo wpca_get_component(
    'hero',
    array(
        ..
         'video_id'         => array(6, 71),
    )
);
</pre>

                <?php
                echo wpca_get_component(
                    'hero',
                    array(
                        'title'                 => '<h4>My custom hero title</h4>',
                        'body'                  => '<p>My custom hero body n ac pellentesque urna. Ut id posuere lorem, at aliquet libero. In vitae dui eros. Duis cursus sapien nec erat finibus volutpat. Nulla placerat dui felis, non gravida ante pretium nec. Vestibulum lorem massa, sodales vitae maximus non, lacinia eu est. Suspendisse sodales dui odio, nec eleifend lectus faucibus at.</p>',
                        'container'             => 'a',
                        'link'                  => 'https://google.se',
                    )
                );
                ?>
<pre>
echo wpca_get_component(
    'hero',
    array(
        'title'                 => '&lt;h4&gt;My custom hero title&lt;/h4&gt;',
        'body'                  => '&lt;p&gt;My custom hero body...&lt;/p&gt;',
        'container'             => 'a',
        'link'                  => 'https://google.se',
    )
);
</pre>

                <?php
                echo wpca_get_component(
                    'hero',
                    array(
                        'title'         => '<h1>Hero without body</h1>',
                        'container'     => 'a',
                        'link'          => 'this is not a link',
                    )
                );
                ?>
<pre>
echo wpca_get_component(
    'hero',
    array(
        ...
        'container'     => 'a',
        'link'          => 'this is not a link',
    )
);
</pre>

                <?php
                echo wpca_get_component(
                    'rich-list-item',
                    array(
                        'title'         => '<h1>Rich list item</h1>',
                        'body'          => '<p>My custom hero body n ac pellentesque urna. Ut id posuere lorem, at aliquet libero. In vitae dui eros. Duis cursus sapien nec erat finibus volutpat. Nulla placerat dui felis, non gravida ante pretium nec. Vestibulum lorem massa, sodales vitae maximus non, lacinia eu est. Suspendisse sodales dui odio, nec eleifend lectus faucibus at.</p>',
                        'image_id'      => 5,
                    )
                );
                ?>

<pre>
echo wpca_get_component(
    'rich-list-item',
    array(
        ...
        'image_id'      => 5,
    )
);
</pre>

                <?php
                echo wpca_get_component(
                    'rich-list-item',
                    array(
                        'title'                     => '<h1>Rich list item</h1>',
                        'body'                      => '<p>My custom hero body n ac pellentesque urna. Ut id posuere lorem, at aliquet libero. In vitae dui eros. Duis cursus sapien nec erat finibus volutpat. Nulla placerat dui felis, non gravida ante pretium nec. Vestibulum lorem massa, sodales vitae maximus non, lacinia eu est. Suspendisse sodales dui odio, nec eleifend lectus faucibus at.</p>',
                        'image_id'                  => 5,
                        'content_class'             => 'Rich-list-item__content order-1',
                        'image_class'               => 'Rich-list-item__image order-2',
                    )
                );
                ?>

<pre>
echo wpca_get_component(
    'rich-list-item',
    array(
        ...
        'image_id'               => 5,
        'content_class'          => 'Rich-list-item__content order-1',
        'image_class'            => 'Rich-list-item__image order-2',
    )
);
</pre>

                <?php echo wpca_get_component('unsupported_component'); ?>
<pre>echo wpca_get_component('unsupported_component');</pre>
            </div>

            <?php

            /* Start the Loop */
            while ( have_posts() ) :
                the_post();

                get_template_part( 'template-parts/content/content', 'page' );

                // If comments are open or we have at least one comment, load up the comment template.
                if ( comments_open() || get_comments_number() ) {
                    comments_template();
                }

            endwhile; // End of the loop.
            ?>

        </main><!-- #main -->
    </section><!-- #primary -->

<?php
get_footer();
