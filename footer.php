<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package msbase
 */

$menus = ms_getMenuItemes();


$footer_logo = get_field('footer_logo', 'option');
$footer_custom_text = get_field('footer_custom_text', 'option');
$socials_network = get_field('socials_network', 'option');


?>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
<footer class="footer">
    <div class="container">
        <div class="row ">
        <div class="col-md-6">
            <div class="footer__logo">
                <?php if (isset($footer_logo) && $footer_logo): ?>
                    <img src="<?= $footer_logo['url']; ?>" alt="<?= $footer_logo['alt']; ?>">
                <?php endif; ?>
                <p class="footer__custom-text"><?php echo esc_html($footer_custom_text); ?></p>
            </div>
        </div>
        <div class="col-md-6">
            <div class="footer__menu">
                <nav class="footer__footer-menu-nav">
                    <ul class="footer__footer-menu-list">
                        <?php if(isset($menus['menu']['footer-menu'])): ?>
                            <?php foreach($menus['menu']['footer-menu'] as $menu): ?>
                                <li>
                                    <a href="<?= $menu->url ?>"
                                       class="footer__footer-menu-link">
                                        <?= $menu->title ?>
                                    </a>
                                </li>
                                <li class="footer__horizontal-line">|</li>
                            <?php endforeach;
                        endif;
                        ?>
                    </ul>
                </nav>
            </div>

            <div class="footer__socials-networks">
                <?php if (isset($socials_network) && $socials_network): ?>
                    <?php foreach ($socials_network as $socials): ?>
                        <a href="<?= $socials['social_link']; ?>"
                           class="footer__socials-networks--link"
                          >
                            <img src="<?= $socials['social_icon']['url']; ?>"
                                 class="footer__socials-networks-icon"
                                 alt="<?= $socials['social_icon']['alt']; ?>" />
                        </a>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
            </div>
        </div>
    </div>
</footer>
</html>
