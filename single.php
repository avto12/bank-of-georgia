<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package msbase
 */

get_header();

global $post;
$category = get_the_category($post->ID);

$args = array(
    'post_type' => 'post',
    'posts_per_page' => 3,
    'post_status' => 'publish',
    'post__not_in'   => array( $post->ID ),
    'category_name' => $category[0]->name,
);

$posts = query_posts($args);

?>

	<main id="primary" class="site-main">

		<!-- Code pending -->

        <section class="post-single">
            <div class="container">
                <div class="post-single__info">
                    <a class="post-single__category" href="<?= get_category_link($category[0])  ?>">
                        <?= $category[0]->name ?>
                    </a>
                    <div class="archive-post__card-publish-divider"></div>
                    <span class="post-single__date"><?= date('F j, Y', strtotime($post->post_date)) ?></span>
                </div>
                <h1 class="post-single__title"><?= get_the_title(); ?></h1>
                <img class="post-single__image" src="<?= get_the_post_thumbnail_url($post->ID) ?>" alt="">
                <?php if( get_the_content() ): ?>
                    <div class="post-single__content">
                        <?= get_the_content(); ?>
                    </div>
                <?php endif; ?>
                <div class="post-single__related">
                    <h2 class="post-single__related-title">Related posts</h2>
                    <div class="post-single__related-wrapper">
                        <?php if(isset($posts) && $posts): ?>
                            <?php foreach($posts as $post): ?>
                                <div class="post-single__related-card">
                                    <a href="<?= get_permalink($post); ?>">
                                        <img class="post-single__related-card-image" src="<?= get_the_post_thumbnail_url($post->ID) ?>" alt="">
                                    </a>
                                    <div class="post-single__info">
                                        <a class="post-single__category" href="<?= get_category_link($category[0])  ?>">
                                            <?= $category[0]->name ?>
                                        </a>
                                        <div class="archive-post__card-publish-divider"></div>
                                        <span class="post-single__date"><?= date('F j, Y', strtotime($post->post_date)) ?></span>
                                    </div>
                                    <h3 class="post-single__related-card-title">
                                        <a href="<?= get_permalink($post); ?>">
                                            <?= get_the_title(); ?>
                                        </a>
                                    </h3>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </section>

	</main><!-- #main -->

<?php
//get_sidebar();
get_footer();
