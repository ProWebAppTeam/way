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
	<header class="main-header">
        <div class="top-row row desktop-top">
            <div class="top-row_logo col-auto">
                <img src="<?php 
                    $logo = get_theme_mod( 'custom_logo' );
                	$image = wp_get_attachment_image_src( $logo , 'full' );
                	$image_url = $image[0];
                    echo($image_url) ?>" alt="logo">
            </div>
            <?php 
                    $home_url = site_url() . "/wp-content/themes/WayTheme/assets";
            ?>
            <div class="top-row_right-block col-auto">
                <div class="top-row_right-block_search">
                    <div class="input-group">
                        <span class="input-group-append">
                            <button class="btn" type="button">
                                <img src="<?php echo $home_url, "/image/icon/Find_icon.svg" ?>" alt="">
                            </button>
                        </span>
                        <input class="form-control " type="search" value="" placeholder="Найти..."
                            id="example-search-input">

                    </div>
                </div>
                <a href="#" class="header-link like-link"><img src="<?php echo $home_url, "/image/icon/like_icon.svg" ?>" alt=""></a>
                <a href="#" class="header-link store-link"><img src="<?php echo $home_url, "/image/icon/store_icon.svg" ?>" alt=""></a>
                <a href="#" class="header-link account-link"><img src=<?php echo $home_url,"/image/icon/people_icon.svg" ?>" alt=""></a>
            </div>
        </div>
        <div class="top-row-menu">
            <?php
                wp_nav_menu([
                    'items_wrap'      => '<ul id="%1$s" class="top-row-menu">%3$s</ul>',
                    ]); 
            ?>
        </div>

    </header>
