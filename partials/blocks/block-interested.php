<?php

$section_title = get_field('section_title');
$interested = get_field('interested');

?>

<section class="interested">
    <div class="container">
        <h2 class="interested__section-title"><?php echo esc_html($section_title); ?> </h2>
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            <?php if (isset($interested) && $interested): ?>
                <?php foreach ($interested as $interested_item): ?>
                    <div class="col interested__section-content">
                        <div class="card interested__section-card">
                            <?php if (isset($interested_item['interested_animation_image']) && $interested_item['interested_animation_image']): ?>
                                <img src="<?= $interested_item['interested_animation_image']['url']; ?>"
                                     class=" interested__animation-image"
                                     alt="<?= $interested_item['interested_animation_image']['alt']; ?>"
                                />
                            <?php endif; ?>
                            <div class="interested__view-content">
                                <h5 class="interested__card-title">
                                    <?php echo esc_html($interested_item['interested_title']); ?>
                                </h5>
                                <div class="interested__link-wrapper">
                                    <?php if ($interested_item['link']): ?>
                                        <a class="interested__redirect-view"
                                           href="<?= $interested_item['link']['url']; ?>"
                                           target="<?= $interested_item['link']['target']; ?>">
                                            <?php echo esc_html($interested_item['link']['title']); ?>
                                            <img class="interested__arrow-img"
                                                 src="<?= get_template_directory_uri(); ?>/_/img/arrow-right-line.svg"
                                                 alt="arrow-right" />
                                        </a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
            <?php endif; ?>
        </div>
    </div>

</section>
