<?php
    $title = get_field('title');
    $see_details = get_field('see_details');
    $highlights_cards = get_field('highlights_cards');

?>

<section class="last-highlights">
    <div class="container">
        <div class="last-highlights__start d-flex justify-content-between align-items-end">
            <h2 class="last-highlights__title"><?php echo esc_html( $title ); ?></h2>
            <?php if (isset($see_details) && $see_details): ?>
                <a class="last-highlights__see-details"
                   href="<?= esc_html( $see_details['url'] )?>"
                   target="<?= $see_details['target']; ?>">
                    <?php echo esc_html( $see_details['title'] )?>
                </a>
            <?php endif; ?>
        </div>
        <div class="last-highlights__card-box">
            <div class="row last-highlights__grid-layout">
                <?php if ( isset($highlights_cards) && $highlights_cards ): ?>
                    <?php foreach ( $highlights_cards as $key=>$highlights ): ?>
                    <div class="<?php echo ($key == 0 || $key==1) ? 'col-lg-6 last-highlights__big-card' : 'col-lg-4 last-highlights__normal-card'?>">
                            <div class="card border-0 last-highlights__card">
                                <div class="last-highlights__body">

                                    <?php if ($highlights['date_and_time']): ?>
                                        <span class="last-highlights__date-and-time icon-date-time"><?php echo esc_html( $highlights['date_and_time'] ); ?></span>
                                    <?php endif; ?>

                                    <div class="last-highlights__content">
                                        <div class="last-highlights__portray">
                                        <?php if ($highlights['highlights_title']): ?>
                                            <h5 class="card-title "><?php echo esc_html( $highlights['highlights_title'] ); ?></h5>
                                        <?php endif; ?>

                                        <?php if (isset($highlights['highlights_count']) && $highlights['highlights_count']): ?>
                                            <span class="card-text-number" id="percentage-counter">
                                                <?php echo esc_html($highlights['highlights_count']['number']); ?>
                                            </span>
                                            <span class="card-text-postfix"><?php echo esc_html($highlights['highlights_count']['postfix']); ?> </span>
                                        <?php endif; ?>

                                        <?php if ($highlights['highlights_note']): ?>
                                            <p class="card-text-note"><?php echo esc_html($highlights['highlights_note']); ?></p>
                                        <?php endif; ?>
                                        </div>

                                        <div class="last-highlights__design">
                                        <?php if ( isset( $highlights['visual_icon'] ) && $highlights['visual_icon'] ): ?>
                                            <img class="last-highlights__visual-icon visual"
                                                 src="<?= $highlights['visual_icon']['url'] ?>"
                                                 alt="<?= $highlights['visual_icon']['alt'] ?>"
                                            />
                                        <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
