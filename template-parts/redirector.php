<?php
/*
Template Name: redirect
*/

get_header();
$page_background = get_field('page_background', 'option');

$args = array(
    'post_type'      => 'page',
    'posts_per_page' => -1,
    'post_parent'    => get_the_ID(),
    'orderby'        => 'menu_order',
    'order'          => 'ASC'
);

$child_pages = get_posts($args);

?>
        <?php if ($page_background): ?>
            <div class="site-pages" <?php if ($page_background): ?> style="background-image: url('<?php echo $page_background['url']?>')" <?php endif; ?> >
                <h1 class="text-center site-pages__page-title">
                    <?php the_title() ?>
                </h1>
            </div>
        <?php endif; ?>

        <div class="tab-page">
            <div class="container">
                <ul class="nav nav-tabs tab-page__content" id="myTabs" role="tablist">
                    <?php foreach ($child_pages as $index => $child_page):
                            setup_postdata($child_page);
                            $tab_id = 'tab-' . $child_page->ID;
                            $tab_title = $child_page->post_title;
                            $content_id = 'content-' . $child_page->ID;
                            $tab_class = ($index === 0) ? 'active' : '';
                            $content_class = ($index === 0) ? 'show active' : '';
                        ?>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link <?php echo esc_attr($tab_class); ?> tab-page__content--page border-0 p-0"
                                    href="<?php echo esc_attr($tab_title); ?>"
                                    id="<?php echo esc_attr($tab_id); ?>" data-bs-toggle="tab"
                                    data-bs-target="#<?php echo esc_attr($content_id); ?>" type="button" role="tab"
                                    aria-controls="<?php echo esc_attr($content_id); ?>"
                                    aria-selected="<?php echo ($index === 0) ? 'true' : 'false'; ?>">
                                <?php echo esc_html($child_page->post_title); ?>
                            </a>
                        </li>
                    <?php
                    endforeach;
                    wp_reset_postdata();
                    ?>
                </ul>
            </div>
        </div>
    <div class="container">
            <div class="tab-content" id="myTabContent">
                <?php foreach ($child_pages as $index => $child_page): ?>
                    <?php
                    setup_postdata($child_page);
                    $content_id = 'content-' . $child_page->ID;
                    $content_class = ($index === 0) ? 'show active' : '';
                    ?>
                    <div class="tab-pane fade <?php echo esc_attr($content_class); ?>"
                         id="<?php echo esc_attr($content_id); ?>" role="tabpanel"
                         aria-labelledby="<?php echo esc_attr($tab_id); ?>" tabindex="0">
                        <?php echo apply_filters('the_content', $child_page->post_content); ?>
                    </div>
                <?php  endforeach;
                wp_reset_postdata();
                ?>
            </div>
            </div>


<?php
get_footer();

