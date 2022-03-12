<?php

/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.4.0
 */

defined('ABSPATH') || exit;

get_header('shop');

/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */
do_action('woocommerce_before_main_content');


if (woocommerce_product_loop()) {

    /**
     * Hook: woocommerce_before_shop_loop.
     *
     * @hooked woocommerce_output_all_notices - 10
     * @hooked woocommerce_result_count - 20
     * @hooked woocommerce_catalog_ordering - 30
     */
    do_action('woocommerce_before_shop_loop');

    //woocommerce_product_loop_start();
?>

    <ul class="product-list columns-<?php echo esc_attr(wc_get_loop_prop('columns')); ?>">
    <?php

    if (wc_get_loop_prop('total')) {
        while (have_posts()) {
            the_post();

            /**
             * Hook: woocommerce_shop_loop.
             */
            do_action('woocommerce_shop_loop');

            wc_get_template_part('content', 'product');
        }
    }

    echo '</ul>'; //woocommerce_product_loop_end();

    /**
     * Hook: woocommerce_after_shop_loop.
     *
     * @hooked woocommerce_pagination - 10
     */
    do_action('woocommerce_after_shop_loop');
} else {
    /**
     * Hook: woocommerce_no_products_found.
     *
     * @hooked wc_no_products_found - 10
     */
    do_action('woocommerce_no_products_found');
}
/**
 * Hook: woocommerce_after_main_content.
 *
 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
 */
do_action('woocommerce_after_main_content');

/**
 * Hook: woocommerce_sidebar.
 *
 * @hooked woocommerce_get_sidebar - 10
 */
do_action('woocommerce_sidebar');




get_footer('shop'); ?>

    <script>
        $(document).ready(function() {
            let from_price = $(".price_label .from").html();
            let to_price = $(".price_label .to").html();
            let from_star = $(".ui-slider-handle:first-of-type");
            let to_star = $(".ui-slider-handle:last-child");
            let min_price = $("#min_price").data("min");
            let max_price = $("#max_price").data("max");
            let range_slider = $("#range-slider");

            if (min_price && max_price) {
                range_slider.attr('data-min', min_price);
                range_slider.attr('data-max', max_price);
                from_star.attr('data-min', from_price.replace('&nbsp;', ''));
                to_star.attr('data-max', to_price.replace('&nbsp;', ''));
            }

            $(".price_label .to").bind("DOMSubtreeModified", function() {
                to_star.attr('data-max', $(this).html().replace('&nbsp;', ''));
                setTimeout(function() {
                    $(".price_slider_amount .button").click();
                }, 1500);
            });
            $(".price_label .from").bind("DOMSubtreeModified", function() {
                from_star.attr('data-min', $(this).html().replace('&nbsp;', ''));
                setTimeout(function() {
                    $(".price_slider_amount .button").click();
                }, 1500);
            });
        })
    </script>