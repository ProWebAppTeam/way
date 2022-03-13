<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

remove_action('woocommerce_before_shop_loop_item','woocommerce_template_loop_product_link_open', 10);
add_action('woocommerce_before_shop_loop_item','way_template_loop_product_link_open',10);
function way_template_loop_product_link_open() {
	global $product;

	$link = apply_filters( 'woocommerce_loop_product_link', get_the_permalink(), $product );

	echo '<a href="' . esc_url( $link ) . '" class="product-link">';
}

remove_action('woocommerce_after_shop_loop_item','woocommerce_template_loop_product_link_close', 5);
add_action('woocommerce_after_shop_loop_item','way_end_link',20);
function way_end_link() {
	echo '</a>';
}

add_action('woocommerce_before_shop_loop_item_title','way_before_img',5);
function way_before_img() {
	echo '<div class="product-img">';
}

add_action('woocommerce_before_shop_loop_item_title','way_after_img',20);
function way_after_img() {
	echo '</div>';
}

remove_action('woocommerce_before_shop_loop_item_title','woocommerce_template_loop_product_thumbnail', 10);
add_action('woocommerce_before_shop_loop_item_title','way_img',10);
function way_img() {
	global $product;
	$img = $product ? $product->get_image( $image_size ) : '';
	echo $img;
	//echo '<img src="'. $img .'" alt="">';
}

add_action('woocommerce_shop_loop_item_title','way_before_title',5);
function way_before_title() {
	echo '<div class="product-text">';
}

add_action('woocommerce_after_shop_loop_item_title','way_after_title',20);
function way_after_title() {
	echo '</div>';
}

remove_action('woocommerce_after_shop_loop_item_title','woocommerce_template_loop_rating', 5);
remove_action('woocommerce_after_shop_loop_item_title','woocommerce_template_loop_price', 10);
add_action('woocommerce_after_shop_loop_item_title','way_loop_price',10);
function way_loop_price() {
    global $product;
    if ( $price_html = $product->get_price_html() ) :
	?>
        <div class="product-price">
   	        Price <span><?php echo $price_html; ?></span>
        </div>
<?php 
    endif;
};


remove_action('woocommerce_after_shop_loop_item','woocommerce_template_loop_add_to_cart', 10);