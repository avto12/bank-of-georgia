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
    'order' => 'DESC',
    'post__not_in'   => array( $post->ID ),
    'category_name' => $category[0]->name,
);

$posts = query_posts($args);

?>

	<main id="primary" class="site-main">

		<!-- Code pending -->

        <section class="post-single">
            <div class="container">
                <div class="post-single__information-content">
                    <div class="post-single__info">
                        <a class="post-single__category" href="<?= get_category_link($category[0])  ?>">
                            <?= $category[0]->name ?>
                        </a>
                        <h1 class="post-single__title"><?= get_the_title(); ?></h1>
                        <span class="post-single__date"><span><?php _e('Published on'); ?> </span><?= date('j M, Y', strtotime($post->post_date)) ?></span>
                    </div>

                    <?php if (get_the_post_thumbnail_url($post->ID)): ?>
                         <img class="post-single__image" src="<?= get_the_post_thumbnail_url($post->ID) ?>" alt="">
                    <?php endif; ?>
                    <?php if( get_the_content() ): ?>
                        <div class="post-single__content">
                            <?= get_the_content(); ?>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="post-single__related">
                    <h2 class="post-single__related-title"><?php _e('Explore More Insights'); ?></h2>
                    <div class="post-single__related-wrapper">
                        <?php if(isset($posts) && $posts): ?>
                            <?php foreach($posts as $post): ?>
                                <div class="post-single__related-post">
                                    <?php if (get_the_post_thumbnail_url($post->ID)): ?>
                                    <a href="<?= get_permalink($post); ?>">
                                            <img class="post-single__related-post-image" src="<?= get_the_post_thumbnail_url($post->ID) ?>" alt="">
                                    </a>
                                    <?php endif; ?>
                                    <div class="post-single__related-info">
                                        <span class="post-single__related-date"> <?php echo date('H:i', strtotime($post->post_date)); ?> </span>
                                        <span class="post-single__related-date"><?= date('j F, Y', strtotime($post->post_date)) ?></span>
                                    </div>
                                    <h3 class="post-single__related-post-title">
                                        <a href="<?= get_permalink($post); ?>" class="post-single__related-link">
                                            <?= get_the_title(); ?>
                                            <span class="post-single__line-arrow">
                                            <img class="post-single__arrow-img"
                                                 src="<?= get_template_directory_uri(); ?>/_/img/arrow-right.png"  alt="arrow-right" />
                                        </span>
                                        </a>

                                    </h3>
                                    <div class="post-single__bottom-line"></div>
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
