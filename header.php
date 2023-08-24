<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package msbase
 */

$menus = ms_getMenuItemes();


?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>


<header class="header-main" id="headerMain">
        <nav class="header-main__menu">
            <div class="menu-main__first">
                <div class="container">
<!--                    top menu -->
                    <ul class="menu-main__first-nav" id="menuFirst">
                        <?php if(isset($menus['menu']['top-menu'])): ?>
                            <?php foreach($menus['menu']['top-menu'] as $menu): ?>
                            <?php $icon = get_field('menu_icon', $menu->ID); ?>

                                <li class="menu-main__item-first">
                                    <a href="<?= $menu->url ?>" class="menu-main__link-first">
                                        <?= $menu->title ?>
                                        <?php if ($icon): ?>
                                            <img class="menu-main__top-icon" src="<?= $icon; ?>"
                                                 alt="icon"/>
                                        <?php endif; ?>
                                    </a>
                                </li>

                            <?php endforeach;
                        endif;
                        ?>
                        <li class="menu-main__item-first">Share price:
                            <a class="" style="text-decoration: none"> London: 3,225.00p <span style="color: #00A750">+25.00</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="menu-main__second">
                <div class="container">
<!--                    second menu -->
                    <ul class="menu-main__second-nav" id="menuSecondary">
                        <?php the_custom_logo(); ?>
                        <div class="menu-main__nav-container">
                        <?php
                        if (isset($menus['menu']['menu-1'])): ?>
                            <?php
                            foreach ($menus['menu']['menu-1'] as $menu): ?>
                                <li class="menu-main__item-second">
                                    <a href="<?= $menu->url ?>"
                                       class="menu-main__link-second <?= $menu->is_active; ?>">
                                        <?= $menu->title ?>
                                    </a>
                                    <?php if (isset($menu->children) && is_array($menu->children)): ?>
                                    <div class="menu-main__children show-children">
                                        <span class="menu-main__children-arrow-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="11" viewBox="0 0 22 11" fill="none">
                                                <path d="M10.9 0L21.2057 10.5H0.594297L10.9 0Z" fill="#FC6923"/>
                                            </svg>
                                        </span>
                                        <div class="menu-main__second-nav-wrapper-children">
                                            <ul class="menu-main__second-nav-children">
                                            <?php foreach ($menu->children as $child): ?>
                                                <li class="menu-main__item-second-children">
                                                    <a href="<?= $child->url ?>" class="menu-main__link-second-children <?= $child->is_active; ?>">
                                                        <?= $child->title ?>
                                                    </a>
                                                    <?php if (isset($child->children) && is_array($child->children)): ?>
                                                        <ul class="menu-main__second-nav-sub-children">
                                                            <?php foreach ($child->children as $grandchild): ?>
                                                                <li class="menu-main__item-second-sub-children">
                                                                    <a href="<?= $grandchild->url ?>" class="menu-main__link-second-sub-children <?= $grandchild->is_active; ?>">
                                                                        <?= $grandchild->title ?>
                                                                    </a>
                                                                    <!-- You can continue nesting more levels here if needed -->
                                                                </li>
                                                            <?php endforeach; ?>
                                                        </ul>
                                                    <?php endif; ?>
                                                </li>
                                            <?php endforeach; ?>
                                        </ul>
                                        </div>
                                    </div>
                                    <?php endif; ?>
                                </li>

                            <?php
                            endforeach; ?>
                        <?php
                        endif; ?>
<!--                            search icon -->
                            <img class="menu-main__search-icon" id="searchIcon"  role="button" data-bs-toggle="dropdown"
                                 aria-expanded="false" src="<?= get_template_directory_uri()?>/_/img/search.svg" alt="search"/>
                        </div>
                    </ul>
                </div>
            </div>

<!--            search input -->
            <div class="menu-main__search-dropdown border-0 rounded-0 mb-3" id="searchMain">
                <div>
                    <div class="container">
                        <div class="menu-main__close-icon">
                            <img id="closeIcon" src="<?= get_template_directory_uri() ?>/_/img/x.svg" alt="close Icon"/>
                        </div>
                    </div>
                    <form class="navbar-form menu-main__search-form" role="search" method="get"
                          action="<?php echo esc_url( home_url( '/' ) ); ?>">
                        <h5 class="menu-main__search-title"><?php _e('Search'); ?></h5>
                        <div class="input-group">
                            <input type="search" id="s"
                                   class="form-control menu-main__search-input"
                                   placeholder="<?php echo esc_attr_x('Start Typing...', 'placeholder') ?>"
                                   value="<?php the_search_query(); ?>" name="s"
                                   title="<?php echo esc_attr_x('delete', 'label') ?>"
                                   oninput="updateSearchType()"/>

                            <button type="submit" class="menu-main__search-icon-button">
                                <img src="<?= get_template_directory_uri() ?>/_/img/search.svg" alt="Search Icon"/>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </nav>
</header>

