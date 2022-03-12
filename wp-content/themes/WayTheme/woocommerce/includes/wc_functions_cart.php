<?php
/**
 * Sample implementation of the WooCommerce Mini Cart.
 *
 * You can add the WooCommerce Mini Cart to header.php like so ...
 *
	<?php
		if ( function_exists( 'way_u_choose_woocommerce_header_cart' ) ) {
			way_u_choose_woocommerce_header_cart();
		}
	?>
 */

if ( ! function_exists( 'way_u_choose_woocommerce_cart_link_fragment' ) ) {
	/**
	 * Cart Fragments.
	 *
	 * Ensure cart contents update when products are added to the cart via AJAX.
	 *
	 * @param array $fragments Fragments to refresh via AJAX.
	 * @return array Fragments to refresh via AJAX.
	 */
	function way_u_choose_woocommerce_cart_link_fragment( $fragments ) {
		ob_start();
		way_u_choose_woocommerce_cart_link();
		$fragments['a.cart-contents'] = ob_get_clean();

		return $fragments;
	}
}
add_filter( 'woocommerce_add_to_cart_fragments', 'way_u_choose_woocommerce_cart_link_fragment' );

if ( ! function_exists( 'way_u_choose_woocommerce_cart_link' ) ) {
	/**
	 * Cart Link.
	 *
	 * Displayed a link to the cart including the number of items present and the cart total.
	 *
	 * @return void
	 */
	function way_u_choose_woocommerce_cart_link() {
		?>
		<?php
			$item_count_text = sprintf(
				/* translators: number of items in the mini cart. */
				_n( '%d item', '%d items', WC()->cart->get_cart_contents_count(), 'way_u_choose' ),
				WC()->cart->get_cart_contents_count()
			);
			?>
		<a href="<?php echo esc_url( wc_get_cart_url() ); ?>"
		    title="<?php esc_attr_e( 'View your shopping cart', 'way_u_choose' ); ?>" 
		    class="cart-btn">
		    <img src="<?php bloginfo('template_url'); ?>/assets/image/icon/store_icon.svg" alt="">
		    <!--<div style="display: -webkit-box;">
                <img src="<?php //bloginfo('template_url'); ?>/assets/image/icon/store_icon.svg" alt="">
                <div class="amount" style="font-size: 10px; font-family: Helvetica;">
                    <?php // echo wp_kses_data( WC()->cart->get_cart_subtotal() ); ?>
                </div> 
                <div class="count" style="font-size: 10px; font-family: Helvetica;">
                    <?php //echo esc_html( $item_count_text ); ?>
                </div>
            </div>-->
        </a>
		<?php
	}
}

if ( ! function_exists( 'way_u_choose_woocommerce_header_cart' ) ) {
	/**
	 * Display Header Cart.
	 *
	 * @return void
	 */
	function way_u_choose_woocommerce_header_cart() {
		if ( is_cart() ) {
			$class = 'current-menu-item';
		} else {
			$class = '';
		}
		?>
		<ul id="site-header-cart" class="site-header-cart">
			<li class="<?php echo esc_attr( $class ); ?>">
				<?php way_u_choose_woocommerce_cart_link(); ?>
			</li>
			<li>
				<?php
				$instance = array(
					'title' => '',
				);

				the_widget( 'WC_Widget_Cart', $instance );
				?>
			</li>
		</ul>
		<?php
	}
}
?>