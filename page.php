<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package msbase
 */

get_header();
$page_background = get_field('page_background', 'option');



?>

	<main id="primary" class="site-main">
        <?php if ($page_background): ?>
            <?php if ( ! is_page('Who we are')): ?>
                <div class="site-pages" <?php if ($page_background): ?> style="background-image: url('<?php echo $page_background['url']?>')" <?php endif; ?> >
                    <h1 class="text-center site-pages__page-title">
                        <?php the_title() ?>
                    </h1>
                </div>
            <?php endif; ?>
        <?php endif ?>


		<!-- Code pending -->
        <div>
            <?php the_content(); ?>
        </div>

	</main><!-- #main -->

<?php
//get_sidebar();
get_footer();
