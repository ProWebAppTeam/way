<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Way_u_choose
 */
$way_unique_id = wp_unique_id('search-form-');
?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <div id="wptime-plugin-preloader"></div>
    <?php wp_body_open(); ?>
    <div class="wrapper">
        <div id="mobile-menu">
            <div class="block df">
                <ul>
                    <li><a href=""><span>Link</span></a></li>
                    <li><a href=""><span>Link</span></a></li>
                    <li><a href=""><span>Link</span></a></li>
                    <li><a href=""><span>Link</span></a></li>
                </ul>
            </div>
        </div>
        <header>
            <div class="container">
                <div class="block">
                    <div class="logo-block">
                        <!-- Кнопка Мобильного Меню -->
                        <button id="burger-menu">
                            <div class="box box_item1"></div>
                            <div class="box box_item2"></div>
                            <div class="box box_item3"></div>
                        </button>
                        <a class="logo" href="/">

                            <img src="<?php bloginfo('template_url'); ?>/assets/image/logo_main.png" alt="">

                        </a>
                    </div>
                    <div class="search-block">
                        <form role="search" method="get" class="search-form" action="<?php echo esc_url(home_url('/')); ?>">
                            <input type="search" id="<?php echo esc_attr($way_unique_id); ?>" value="<?php echo get_search_query(); ?>" placeholder="Найти..." name="s">
                        </form>
                    </div>
                    <div class="user-block">
                        <a href="">
                            <img src="<?php bloginfo('template_url'); ?>/assets/image/icon/like_icon.svg" alt="">
                        </a>
                        <?php way_u_choose_woocommerce_cart_link(); ?>
                        <a href="<?php get_site_url(); ?>/my-account">
                            <img src="<?php bloginfo('template_url'); ?>/assets/image/icon/people_icon.svg" alt="">
                        </a>
                    </div>
                </div>
            </div>
        </header>