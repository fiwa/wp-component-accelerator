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
                        'title'             => 'My custom hero title',
                        'title_class'       => 'my-custom-title-class',
                        'description'       => '<p>My custom hero description n ac pellentesque urna. Ut id posuere lorem, at aliquet libero. In vitae dui eros. Duis cursus sapien nec erat finibus volutpat. Nulla placerat dui felis, non gravida ante pretium nec. Vestibulum lorem massa, sodales vitae maximus non, lacinia eu est. Suspendisse sodales dui odio, nec eleifend lectus faucibus at.</p>',
                        'description_class' => 'my-custom-description-class',
                    )
                );
                ?>
<pre>
echo wpca_get_component(
    'hero',
    array(
        'container_class'   => 'my-custom-container-class',
        'content_class'     => 'my-custom-content-class',
        'title'             => 'My custom hero title',
        'title_class'       => 'my-custom-title-class',
        'description'       => '&lt;p&gt;My custom hero description...&lt;/p&gt;',
        'description_class' => 'my-custom-description-class',
    )
);
</pre>

                <?php
                echo wpca_get_component(
                    'hero',
                    array(
                        'title'                 => __('My custom hero title'),
                        'title_block_format'    => 'h4',
                        'description'           => '<p>My custom hero description n ac pellentesque urna. Ut id posuere lorem, at aliquet libero. In vitae dui eros. Duis cursus sapien nec erat finibus volutpat. Nulla placerat dui felis, non gravida ante pretium nec. Vestibulum lorem massa, sodales vitae maximus non, lacinia eu est. Suspendisse sodales dui odio, nec eleifend lectus faucibus at.</p>',
                        'container'             => 'a',
                        'link'                  => 'https://google.se',
                    )
                );
                ?>
<pre>
echo wpca_get_component(
    'hero',
    array(
        'title'                 => 'My custom hero title',
        'title_block_format'    => 'h4',
        'description'           => '&lt;p&gt;My custom hero description...&lt;/p&gt;',
        'container'             => 'a',
        'link'                  => 'https://google.se',
    )
);
</pre>

                <?php
                echo wpca_get_component(
                    'hero',
                    array(
                        'title'         => __('Hero without description'),
                        'container'     => 'a',
                        'link'          => 'this is not a link',
                    )
                );
                ?>
<pre>
echo wpca_get_component(
    'hero',
    array(
        'title'         => __('Hero without description'),
        'container'     => 'a',
        'link'          => 'this is not a link',
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
