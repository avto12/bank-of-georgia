<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package msbase
 */

get_header();
?>

	<main id="primary" class="site-main">

		<section class="error-404 not-found">
            <div class="error-404__container">
                <div class="error-404__image">
                    <img src="<?= get_theme_file_uri() ?>/_/img/404-image.png" alt="404">
                </div>
                <div class="error-404__texts">
                    <h3>
                        <?php esc_html_e( 'Oops, We can seem to find the page what you are looking for.', 'msbase' ); ?>
                    </h3>
                    <p>
                        <?php esc_html_e( 'The page you are looking for might have been removed, had its name changed, or is temporarily unavailable.', 'msbase' ); ?>
                    </p>
                </div>
                <div class="error-404__button">
                    <a href="<?= home_url() ?>" target="_self">
                        <?php esc_html_e( 'BACK TO HOMEPAGE', 'msbase' ); ?>
                        <img src="<?= get_theme_file_uri() ?>/_/img/arrow-right-card.svg" alt="arrow right">
                    </a>
                </div>
            </div>
		</section><!-- .error-404 -->

	</main><!-- #main -->

<?php
get_footer();
