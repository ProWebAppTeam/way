<?php
/**
 * Cart Page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.8.0
 */

defined( 'ABSPATH' ) || exit;

//do_action( 'woocommerce_before_cart' ); ?>

	
<div class="cart-block">
    <div class="cart-items">
        <div class="top-line">
            <label for="all">
            <input type="checkbox" name="" id="all">
            <span>Выбрать все</span>
            </label>
            <button>Удалить выбранные</button>
        </div>
        
<form class="woocommerce-cart-form" action="<?php echo esc_url( wc_get_cart_url() ); ?>" method="post">
	<?php do_action( 'woocommerce_before_cart_table' ); ?>
	 <div class="cart-list">
	    <div class="cart-top-bar">
            <div class="c-name">Товар</div>
            <div class="c-price">Цена</div>
            <div class="c-pieces">Кол-во</div>
        </div>
			<?php do_action( 'woocommerce_before_cart_contents' ); ?>

			<?php
			$cart_array = WC()->cart->get_cart();
			$products_count = 0;
			$product_weight = 0;
			foreach ( $cart_array as $cart_item_key => $cart_item ) {
			    $cart_item_id = $cart_item['data']->id;
				$_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
				$product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

				if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
					$product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
					$product_weight += $_product->get_weight() * $cart_item['quantity'];
					?>
                    <div class="cart-item <?php echo esc_attr( apply_filters( 'woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key ) ); ?>">
                        <label for="<?php echo $cart_item_id ?>">
                            <input type="checkbox" id="<?php echo $cart_item_id ?>">
                            <span></span>
                        </label>
							<?php
								$remove_link = apply_filters( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
									'woocommerce_cart_item_remove_link',
									sprintf(
										'<a href="%s" data-product_id="%s" data-product_sku="%s">Удалить</a>',
										esc_url( wc_get_cart_remove_url( $cart_item_key ) ),
										esc_attr( $product_id ),
										esc_attr( $_product->get_sku())
									),
									$cart_item_key
								);
								
								$post_thumbnail_id = $_product->get_image_id();
								$post_thumbnail = wp_get_attachment_image_src($post_thumbnail_id,'full');
							?>
						
						
						 <div class="cart-name">
                            <img src="<?php echo $post_thumbnail[0] ?>" width="<?php echo $post_thumbnail[1] ?>" height="<?php echo $post_thumbnail[2] ?>" alt="">
                            <div class="bl">
                                <?php
                                if ( ! $product_permalink ) {
							        echo $thumbnail; // PHPCS: XSS ok.
						        } else {
							        printf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $thumbnail ); // PHPCS: XSS ok.
						        }
                                ?>
                                <a href="">
                                    <?php
                                    if ( ! $product_permalink ) {
							            echo wp_kses_post( apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key ) . '&nbsp;' );
						            } else {
							            echo wp_kses_post( apply_filters( 'woocommerce_cart_item_name', sprintf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $_product->get_name() ), $cart_item, $cart_item_key ) );
						            }
                                    ?>
                                </a>
                                <button>В избранное</button>
                            </div>
                        </div>

						
						<?php
						/*$thumbnail = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );
	
						if ( ! $product_permalink ) {
							echo $thumbnail; // PHPCS: XSS ok.
						} else {
							printf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $thumbnail ); // PHPCS: XSS ok.
						}*/
						?>
						<!--</td>-->

						<!--<td class="product-name" data-title="<?php esc_attr_e( 'Product', 'woocommerce' ); ?>">-->
						<?php
						/*if ( ! $product_permalink ) {
							echo wp_kses_post( apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key ) . '&nbsp;' );
						} else {
							echo wp_kses_post( apply_filters( 'woocommerce_cart_item_name', sprintf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $_product->get_name() ), $cart_item, $cart_item_key ) );
						}*/

						do_action( 'woocommerce_after_cart_item_name', $cart_item, $cart_item_key );

						// Meta data.
						echo wc_get_formatted_cart_item_data( $cart_item ); // PHPCS: XSS ok.

						// Backorder notification.
						if ( $_product->backorders_require_notification() && $_product->is_on_backorder( $cart_item['quantity'] ) ) {
							echo wp_kses_post( apply_filters( 'woocommerce_cart_item_backorder_notification', '<p class="backorder_notification">' . esc_html__( 'Available on backorder', 'woocommerce' ) . '</p>', $product_id ) );
						}
						?>
						
						<div class="cart-price">
						
							<?php
								echo apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key ); // PHPCS: XSS ok.
							?>
						
						</div>
						
						
						<?php
						$products_count += $cart_item['quantity'];
						if ( $_product->is_sold_individually() ) {
							$product_quantity = sprintf( '1 <input type="hidden" name="cart[%s][qty]" value="1" />', $cart_item_key );
						} else {
							$product_quantity = woocommerce_quantity_input(
								array(
									'input_name'   => "cart[{$cart_item_key}][qty]",
									'input_value'  => $cart_item['quantity'],
									'max_value'    => $_product->get_max_purchase_quantity(),
									'min_value'    => '0',
									'product_name' => $_product->get_name(),
								),
								$_product,
								false
							);
						}

						//$quantity_input = apply_filters( 'woocommerce_cart_item_quantity', $product_quantity, $cart_item_key, $cart_item ); // PHPCS: XSS ok.
						?>
						<div class="cart-pieces product-quantity" data-title="<?php esc_attr_e( 'Quantity', 'woocommerce' ); ?>">
                           <div class="inprange">
                             
                             <?php echo apply_filters( 'woocommerce_cart_item_quantity', $product_quantity, $cart_item_key, $cart_item );?>
                             <div class="btns">
                               <button><img src="<?php bloginfo('template_url'); ?>/assets/image/up.svg" alt=""></button>
                               <button><img src="<?php bloginfo('template_url'); ?>/assets/image/down.svg" alt=""></button>
                             </div>
                           </div>
                           <?php echo $remove_link ?>
                           <!--<a href="">Удалить</a>-->
                        </div>
						
							<?php
								//echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key ); // PHPCS: XSS ok.
							?>
						
					</div>
					<?php
				}
			}
			?>

			<?php do_action( 'woocommerce_cart_contents' ); ?>


					<?php //if ( wc_coupons_enabled() ) { ?>
						<!--<div class="coupon">
							<label for="coupon_code"><?php //esc_html_e( 'Coupon:', 'woocommerce' ); ?></label> <input type="text" name="coupon_code" class="input-text" id="coupon_code" value="" placeholder="<?php //esc_attr_e( 'Coupon code', 'woocommerce' ); ?>" /> <button type="submit" class="button" name="apply_coupon" value="<?php //esc_attr_e( 'Apply coupon', 'woocommerce' ); ?>"><?php //esc_attr_e( 'Apply coupon', 'woocommerce' ); ?></button>
							<?php //do_action( 'woocommerce_cart_coupon' ); ?>
						</div>-->
					<?php //} ?>
					
					<button type="submit" class="checkout_button" name="update_cart" value="<?php //esc_attr_e( 'Update cart', 'woocommerce' ); ?>"><?php esc_html_e( 'Update cart', 'woocommerce' ); ?></button>

					<?php do_action( 'woocommerce_cart_actions' ); ?>

					<?php wp_nonce_field( 'woocommerce-cart', 'woocommerce-cart-nonce' ); ?>

			<?php do_action( 'woocommerce_after_cart_contents' ); ?>
			<?php do_action( 'woocommerce_after_cart_table' ); ?>
</form>
		</div>
	</div>
		<!--</tbody>
	</table>-->

<?php do_action( 'woocommerce_before_cart_collaterals' ); ?>


<div class="cart-functions">
    <div class="l1">
        <a href="<?php echo esc_url( wc_get_checkout_url() ); ?>">Перейти к оформлению</a>
        <div class="t1">
                     Доступные способы и время доставки <br>
                      можно выбрать при оформлении заказа
        </div>
        <div class="t-item">
            <div class="titl"><b>Ваша корзина</b> <span><?php echo $products_count; ?> товаров <?php echo $product_weight ?> грамм</span></div>
            <div class="tovar"><span>Товары (<?php echo $products_count; ?>)</span><span><?php echo WC()->cart->get_cart_subtotal();?></span></div>
            </div>
            <div class="final-price">
                <b>Общая стоимость</b>
                <b><?php echo WC()->cart->get_total();?></b>
            </div>
    </div>
</div>

<!--<div class="cart-collaterals" >-->
	<?php
		/**
		 * Cart collaterals hook.
		 *
		 * @hooked woocommerce_cross_sell_display
		 * @hooked woocommerce_cart_totals - 10
		 */
		//do_action( 'woocommerce_cart_collaterals' );
	?>
<!--</div>-->

<?php do_action( 'woocommerce_after_cart' ); ?>
