<?php
$latest_meeting_first = get_field('latest_meeting_first');
$latest_meeting_second = get_field('latest_meeting_second');

?>



<section class="latest-meeting">
    <div class="container-fluid text-center">
        <div class="row align-items-start">
            <?php if ( isset($latest_meeting_first) && $latest_meeting_first ): ?>
                <div class="col-lg-6 p-0">
                    <div class="latest-meeting__first-column">
                        <?php if (isset($latest_meeting_first['background_image']) && $latest_meeting_first['background_image']): ?>
                            <img class="latest-meeting__first-background-image bg-image"
                                 src="<?= $latest_meeting_first['background_image']['url']; ?>"
                                 alt="<?= $latest_meeting_first['background_image']['alt']; ?>" />
                        <?php endif; ?>
                    <div class="latest-meeting__first">
                        <h2 class="latest-meeting__title"><?php echo esc_html($latest_meeting_first["title"]); ?></h2>
                        <span class="latest-meeting__date"><?php echo esc_html($latest_meeting_first["date"]); ?></span>
                            <div class="latest-meeting__view">
                                <?php if (isset($latest_meeting_first["link"]) && $latest_meeting_first["link"]): ?>
                                    <a href="<?= $latest_meeting_first["link"]['url']; ?>"
                                       class="view-btn"
                                       target="<?= $latest_meeting_first["link"]['target']; ?>">
                                        <?php echo esc_html($latest_meeting_first["link"]['title']); ?>
                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <?php if ( isset($latest_meeting_second) && $latest_meeting_second  ): ?>
                <div class="col-lg-6 p-0">
                    <div class="latest-meeting__second-column">
                        <?php if (isset($latest_meeting_second['background_image']) && $latest_meeting_second['background_image']): ?>
                            <img class="latest-meeting__second-background-image bg-image"
                                 src="<?= $latest_meeting_second['background_image']['url']; ?>"
                                 alt="<?= $latest_meeting_second['background_image']['alt']; ?>">
                        <?php endif; ?>
                    <div class="latest-meeting__second">
                        <h2 class="latest-meeting__title"> <?php echo esc_html($latest_meeting_second["title"]); ?> </h2>
                        <span class="latest-meeting__date"><?php echo esc_html($latest_meeting_second["date"]); ?></span>
                            <div class="latest-meeting__view">
                                <?php if (isset($latest_meeting_second["link"])  && $latest_meeting_second["link"]): ?>
                                    <a href="<?= $latest_meeting_second["link"]['url']; ?>"
                                       class="view-btn"
                                       target="<?= $latest_meeting_second["link"]['target']; ?>">
                                        <?php echo esc_html($latest_meeting_second["link"]['title']); ?>
                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>
