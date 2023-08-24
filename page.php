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
?>

	<main id="primary" class="site-main">

		<!-- Code pending -->
        <div>
            <?php the_content(); ?>
        </div>

	</main><!-- #main -->

<?php
//get_sidebar();
get_footer();
