<?php

$tab_page = get_field("tab_page");
//page_url
?>




<section class="tab-page">
    <?php if (isset($tab_page) && $tab_page): ?>
        <div class="container">
            <div class="tab-page__content">
                <?php foreach ($tab_page as $tab): ?>
                    <a class="tab-page__content--page <?php if ($tab['page_url']['url'] === get_permalink()) { echo 'tab-active-page'; } ?>"
                       href="<?= $tab['page_url']['url']; ?>"><?= $tab['page_url']['title']; ?>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    <?php endif; ?>
</section>
