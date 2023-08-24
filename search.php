<?php
global $s;
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package msbase
 */

get_header();

global $wp_query;
$posts = $wp_query->posts;


$allsearch = new WP_Query("s=$s&show-posts=0");


?>

    <main id="primary" class="site-main">
        <div class="container pt-5">
            <div class="main-container">
                <div class="search-page">
                    <h6 class="search-page__title">
                        <?php _e('Search'); ?> (<span
                                class="search-page__count"><?= $allsearch->found_posts; ?></span>) <?php _e('Result'); ?>
                    </h6>
                    <div class="row archive-taxonomy__card-grid">
                        <?php foreach ($posts

                        as $key => $post): ?>

                        <?php if (get_post_type($post->ID) === 'post'): ?>
                        <a href="<?= get_permalink($post->ID) ?>">
                            <?php elseif (get_post_type($post->ID) === 'locations'): ?>
                            <a href="<?= get_permalink($post->ID) ?>">
                                <?php endif; ?>
                                <div class="col-xl-3 col-lg-4 col-sm-6 border-0 h-100 archive-taxonomy__card">
                                    <div class="archive-taxonomy__card-img">
                                        <img src="<?= get_the_post_thumbnail_url($post->ID) ?>"
                                             alt="<?php echo get_post_meta(
                                                 get_post_thumbnail_id($post),
                                                 '_wp_attachment_image_alt',
                                                 true
                                             ); ?>">
                                    </div>
                                    <div class="card-body p-0">
                                        <h2 class="card-title m-0 archive-taxonomy__product-title">
                                            <?php echo $post->post_title; ?>
                                        </h2>
                                        <p class="archive-taxonomy__product-excerpt m-0"><?= $post->post_excerpt ?></p>
                                    </div>
                                </div>
                                <?php if (get_post_type($post->ID) === 'post'): ?>
                            </a>
                        <?php endif; ?>
                            <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </main>

<?php
//get_sidebar();
get_footer();
