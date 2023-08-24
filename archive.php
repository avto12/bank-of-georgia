<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package msbase
 */

get_header();

global $wp_query;
$posts = $wp_query->posts;

?>

	<main id="primary" class="site-main">

		<div class="container">
            <h1 class="archive-post__title"><?= is_post_type_archive('post') ? "News" : single_cat_title() ?></h1>
            <div class="archive-post__card-grid">
            <?php foreach($posts as $key => $post): ?>
                <?php if($key == 0): ?>
                    <div class="archive-post__card-main">
                        <a href="<?= get_permalink($post)?>">
                            <img class="archive-post__card-main-image" src="<?= get_the_post_thumbnail_url($post->ID) ?>" alt="">
                        </a>
                        <div class="archive-post__card-info">
                            <div class="archive-post__card-publish">
                                <?php $category = get_the_category($post->ID) ?>
                                <a class="archive-post__card-info-category" href="<?= get_category_link($category[0])  ?>">
                                    <?= $category[0]->name ?>
                                </a>
                                <div class="archive-post__card-publish-divider"></div>
                                <span class="archive-post__card-info-date"><?= date('F j, Y', strtotime($post->post_date)) ?></span>
                            </div>
                            <h2>
                                <a href="<?= get_permalink($post)?>">
                                    <?= $post->post_title?>
                                </a>
                            </h2>
                            <p><?= $post->post_excerpt?></p>
                        </div>
                    </div>
                <?php endif; ?>

                    <?php if($key != 0): ?>
                        <div class="archive-post__card-secondary">
                            <a href="<?= get_permalink($post)?>">
                                <img src="<?= get_the_post_thumbnail_url($post->ID) ?>" alt="">
                            </a>
                            <div class="archive-post__card-info">
                                <div class="archive-post__card-publish">
                                    <?php $category = get_the_category($post->ID) ?>
                                    <a class="archive-post__card-info-category" href="<?= get_category_link($category[0])  ?>">
                                        <?= $category[0]->name ?>
                                    </a>
                                    <div class="archive-post__card-publish-divider"></div>
                                    <span class="archive-post__card-info-date"><?= date('F j, Y', strtotime($post->post_date)) ?></span>
                                </div>
                                <h2>
                                    <a href="<?= get_permalink($post)?>">
                                        <?= $post->post_title?>
                                    </a>
                                </h2>
                                <p><?= $post->post_excerpt?></p>
                            </div>
                        </div>
                    <?php endif; ?>
            <?php endforeach; ?>
            </div>

            <?php if($wp_query->found_posts > 10): ?>

            <div class="archive-post__wrapper">
                <a href="javascript:void(0)" class="archive-post__btn" id="load-more" paged="1" max_num_pages="<?= $wp_query->max_num_pages?>" category="<?= $wp_query->query['category_name']?>" posts-per-page="<?= get_option( 'posts_per_page' ); ?>">
                    Load more

                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M8.81311 12.6869C9.00837 12.8822 9.32496 12.8822 9.52022 12.6869L13.6869 8.52026C13.8821 8.325 13.8821 8.00842 13.6869 7.81315L9.52022 3.64649C9.32496 3.45123 9.00837 3.45123 8.81311 3.64649C8.61785 3.84175 8.61785 4.15833 8.81311 4.35359L12.1262 7.66671L2.5 7.66671C2.22386 7.66671 2 7.89057 2 8.16671C2 8.44285 2.22386 8.66671 2.5 8.66671H12.1262L8.81311 11.9798C8.61785 12.1751 8.61785 12.4917 8.81311 12.6869Z" fill="#1D3525"/>
                    </svg>

                </a>
            </div>

            <?php endif; ?>
        </div>

	</main><!-- #main -->

<?php
//get_sidebar();
get_footer();
