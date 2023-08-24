<?php
$subscribe_image = get_field('subscribe_image');
$subscribe_title = get_field('subscribe_title');
$subscribe_paragraph = get_field('subscribe_paragraph');
$subscribe_link = get_field('subscribe_link');

?>

<section class="subscribe">
    <div class="container">
        <div class="row align-items-center subscribe__section">
            <div class="col">
                <div class="subscribe__image">
                    <?php if (isset($subscribe_image) && $subscribe_image ): ?>
                        <img class="subscribe__image" src="<?= $subscribe_image['url']; ?>" alt="<?= $subscribe_image['alt']; ?>" >
                    <?php endif; ?>
                </div>
            </div>
            <div class="col">
                <div class="subscribe__newspaper">
                    <?php if ($subscribe_title): ?>
                        <h3 class="subscribe__newspaper--title"><?php echo esc_html($subscribe_title); ?> </h3>
                    <?php endif; ?>

                    <?php if ($subscribe_paragraph): ?>
                        <p class="subscribe__newspaper--paragraph"><?php echo esc_html($subscribe_paragraph); ?> </p>
                    <?php endif; ?>

                    <?php if (isset($subscribe_link) && $subscribe_link): ?>
                        <a class="subscribe__newspaper--btn"
                           href="<?= $subscribe_link['url']; ?>"
                           target="<?= $subscribe_link['target']; ?>">
                            <?php echo esc_html($subscribe_link['title']); ?>
                        </a>
                    <?php endif; ?>

                </div>
            </div>
        </div>
    </div>
</section>
