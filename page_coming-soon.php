<?php

// =============================================================================
// PAGE_COMING-SOON.PHP
// -----------------------------------------------------------------------------
// Coming Soon Page Template
// =============================================================================

/* Template Name: Coming Soon */

?>

<?php get_header(); ?>

	<main class="coming-soon" style="background-image:url('<?php the_post_thumbnail_url(); ?>');">
		<div class="coming-soon__img-mobile"></div>
		<h1 class="coming-soon__title open-menu-main">
			<?php the_title(); ?>
		</h1>
		<ul class="coming-soon__text">
			<li class="coming-soon__phrase">
				Coming soon…
			</li>
			<li class="coming-soon__phrase">
				Coming soon…
			</li>
			<li class="coming-soon__phrase coming-soon__phrase--solid">
				Coming soon…
			</li>
		</ul>
	</main>

<?php get_footer(); ?>