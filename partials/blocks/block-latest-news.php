<?php
$latest_news_title = get_field('latest_news_title');
$latest_news_see_more = get_field('latest_news_see_more');

$latest_title = get_field('latest_title');
$last_news = get_field('last_news');

$announcements_title = get_field('announcements_title');
$announcements_news = get_field('announcements_news');


$args = array(
    'post_type' => 'post',
    'category_name' => 'news-announcements',
    'posts_per_page' => 3,
    'orderby' => 'id',
    'order' => 'DESC',
);

$post_loop = new WP_Query( $args );

?>

<section class="latest-news">
    <div class="container">
        <div class="latest-news__head">
            <h2 class="latest-news__head--title"> <?php echo esc_html($latest_news_title); ?> </h2>
            <?php  if (isset($latest_news_see_more) && $latest_news_see_more): ?>
                <a href="<?= $latest_news_see_more['url']; ?>"
                   class="latest-news__head--see-more"
                   target="<?= $latest_news_see_more['target']; ?>">
                    <?php echo esc_html($latest_news_see_more['title']); ?>
                </a>
            <?php endif; ?>
        </div>

        <ul class="nav nav-tabs border-0 latest-news__tab" id="myTab" role="tablist">
            <li class="nav-item latest-news__tab-item" role="presentation">
                <button class="nav-link active border-0 p-0 latest-news__tab-item--btn"
                        id="last-news-tab"
                        data-bs-toggle="tab"
                        data-bs-target="#last-news-tab-pane"
                        type="button"
                        role="tab"
                        aria-controls="last-news-tab-pane"
                        aria-selected="true">
                    <?php echo  esc_html($latest_title); ?>
                </button>
            </li>
            <?php if ($latest_title || $last_news): ?>
                <li class="latest-news__tab-item--btn">|</li>
            <?php endif; ?>
            <li class="nav-item latest-news__tab-item" role="presentation">
                <button class="nav-link border-0 p-0 latest-news__tab-item--btn"
                        id="announcements-news-tab"
                        data-bs-toggle="tab"
                        data-bs-target="#announcements-news-tab-pane"
                        type="button"
                        role="tab"
                        aria-controls="announcements-news-tab-pane"
                        aria-selected="false">
                    <?php echo  esc_html($announcements_title); ?>
                </button>
            </li>
        </ul>
        <div class="tab-content latest-news__content" id="myTabContent">
            <div class="tab-pane fade show active latest-news__posts-content" id="last-news-tab-pane" role="tabpanel" aria-labelledby="last-news-tab" tabindex="0">
                <?php if ($last_news): ?>

                    <?php if ( isset($last_news) && $last_news ): ?>
                        <?php foreach( $last_news as $last_news_post ):  setup_postdata($last_news_post); ?>
                            <div class="d-grid latest-news__posts-listing">
                                <div class="d-flex latest-news__post-date">
                                    <span> <?php echo date('H:i', strtotime($last_news_post->post_date)); ?> </span>
                                    <span> <?php echo date('j F, Y', strtotime($last_news_post->post_date)); ?> </span>
                                </div>
                                <div class="latest-news__title-container">
                                    <a class="latest-news__post-title"
                                       href="<?php the_permalink($last_news_post->ID); ?>"><?php echo $last_news_post->post_title; ?></a>
                                    <span class="latest-news__line-arrow">
                                        <img class="latest-news__arrow-img"
                                             src="<?= get_template_directory_uri(); ?>/_/img/arrow-right.png"  alt="arrow-right" />
                                    </span>
                                </div>
                                <div class="latest-news__bottom-line"></div>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>

                <?php else: ?>

                    <?php if ($post_loop->have_posts()) : ?>
                        <?php foreach ($post_loop->posts as $post) : setup_postdata($post); ?>
                            <div class="latest-news__posts-listing">
                                <div class="d-grid latest-news__post">
                                    <div class="d-flex latest-news__post-date">
                                        <span><?php echo date('H:i', strtotime($post->post_date)); ?></span>
                                        <span><?php echo date('j F, Y', strtotime($post->post_date)); ?></span>
                                    </div>
                                    <div class="latest-news__title-container">
                                        <a class="latest-news__post-title" href="<?php the_permalink($post->ID); ?>"><?php echo $post->post_title; ?></a>
                                        <span class="latest-news__line-arrow">
                                        <img class="latest-news__arrow-img" src="<?= get_template_directory_uri(); ?>/_/img/arrow-right.png" alt="arrow-right"/>
                                    </span>
                                    </div>
                                    <div class="latest-news__bottom-line"></div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <p>No news posts found.</p>
                    <?php endif; ?>

                    <?php wp_reset_postdata(); ?>

                <?php endif; ?>
            </div>

            <div class="tab-pane fade latest-news__posts-content" id="announcements-news-tab-pane" role="tabpanel" aria-labelledby="announcements-news-tab" tabindex="0">
                <?php if ( isset($announcements_news) && $announcements_news ): ?>
                    <?php foreach( $announcements_news as $announcements_news_post ):  setup_postdata($announcements_news_post); ?>
                        <div class="d-grid latest-news__posts-listing">
                            <div class="d-flex latest-news__post-date">
                                <span> <?php echo date('H:i', strtotime($announcements_news_post->post_date)); ?> </span>
                                <span> <?php echo date('j F, Y', strtotime($announcements_news_post->post_date)); ?> </span>
                            </div>
                            <div class="latest-news__title-container">
                                <a class="latest-news__post-title" href="<?php the_permalink($announcements_news_post->ID); ?>"><?php echo $announcements_news_post->post_title; ?></a>
                                <span class="latest-news__line-arrow">
                                    <img class="latest-news__arrow-img" src="<?= get_template_directory_uri(); ?>/_/img/arrow-right.png"  alt="line" />
                                </span>
                            </div>
                            <div class="latest-news__bottom-line"></div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>

        </div>
    </div>
</section>
