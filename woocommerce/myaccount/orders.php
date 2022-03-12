<?php
/**
 * Orders
 *
 * Shows orders on the account page.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/orders.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.7.0
 */

defined( 'ABSPATH' ) || exit;

do_action( 'woocommerce_before_account_orders', $has_orders ); ?>

<div class="account">

<?php 
do_action( 'woocommerce_account_navigation' );
if ( $has_orders ) : ?>

    <div class="history-block">
	<!--<table class="woocommerce-orders-table woocommerce-MyAccount-orders shop_table shop_table_responsive my_account_orders account-orders-table">-->
		<div class="name-line topline">
            <div class="name-l"><span>ИМЯ</span></div>
            <div class="all-block">
                <div class="price-l"><span>ЦЕНА</span></div>
                <div class="date-l"><span>ДАТА</span></div>
                <div class="num-l"><span>НОМЕР ЗАКАЗА</span></div>
                <div class="deliv-l"><span>ТИП ДОСТАВКИ</span></div>
                <div class="status-l"><span>СТАТУС</span></div>
            </div>
        </div>

		<!--<tbody>-->
			<?php
			foreach ( $customer_orders->orders as $customer_order ) {
				$order      = wc_get_order( $customer_order ); // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited
				$item_count = $order->get_item_count() - $order->get_item_count_refunded();
				$data = $order->get_data();
				$items = $order->get_items();
				$firstItem = array_values($items)[0]->get_product();
				?>
				<div class="product-line">
				<!--<tr class="woocommerce-orders-table__row woocommerce-orders-table__row--status-<?php //echo esc_attr( $order->get_status() ); ?> order">-->
					<div class="name-line">
					    
                        <div class="name-l">
                            <?php $image_id  = $firstItem->get_image_id();
                            ?>
                            <img src="<?php echo wp_get_attachment_image_url( $image_id, 'full' ); ?>" alt="">
                            <a href="<?php echo esc_url( $order->get_view_order_url() ); ?>">
								<?php echo $firstItem->get_name(); ?>
							</a>
                        </div>
                        
                        <div class="all-block">
                            <div class="price-l"><?php
								/* translators: 1: formatted order total 2: total order items */
								echo wp_kses_post( sprintf( _n( '%1$s for %2$s item', '%1$s for %2$s items', $item_count, 'woocommerce' ), $order->get_formatted_order_total(), $item_count ) );
								?>
							</div>
							
                            <div class="date-l">
                                <time datetime="<?php echo esc_attr( $order->get_date_created()->date( 'c' ) ); ?>"><?php echo esc_html( wc_format_datetime( $order->get_date_created() ) ); ?></time>
                            </div>
                            
                            <div class="num-l"><?php echo $order->get_order_number(); ?></div>
                           
                            <div class="deliv-l">
                            <?php 
                            $ship_meth = $order->get_shipping_method();
                            echo $ship_meth;
                            ?>
                            </div>
                           
                            <div class="status-l">
                                <?php 
                                if($order->get_status() === 'failed'){
                                    echo '<b class="red">';
                                } 
                                else if($order->get_status() === 'completed'){
                                    echo '<b class="green">';
                                } 
                                else {
                                    echo '<b class="yellow">';
                                }
                                ?>
                                <?php echo esc_html( wc_get_order_status_name( $order->get_status() ) ); ?>
                                <button class="show-info-history">
                                   <img src="<?php bloginfo('template_url'); ?>/assets/image/bbot.svg" alt="">
                                </button></b>
                            </div>
                            
                         </div>
                   </div>
                   
                   
                   <div class="all-txt dn">
                       <?php
                       foreach($items as $item){ ?>
                           <p><?php echo $item->get_name() . ' * ' . $item->get_quantity() . ': ' . get_woocommerce_currency_symbol() . $item->get_total(); ?></p>
                       <?php
                       }
                       ?>
                   </div>
                   
				<!--</tr>-->
				</div>
				<?php
			}
			?>
		<!--</tbody>
	</table>-->

	<?php do_action( 'woocommerce_before_account_orders_pagination' ); ?>

	<?php if ( 1 < $customer_orders->max_num_pages ) : ?>
		<div class="woocommerce-pagination woocommerce-pagination--without-numbers woocommerce-Pagination">
			<?php if ( 1 !== $current_page ) : ?>
				<a class="woocommerce-button woocommerce-button--previous woocommerce-Button woocommerce-Button--previous button" href="<?php echo esc_url( wc_get_endpoint_url( 'orders', $current_page - 1 ) ); ?>"><?php esc_html_e( 'Previous', 'woocommerce' ); ?></a>
			<?php endif; ?>

			<?php if ( intval( $customer_orders->max_num_pages ) !== $current_page ) : ?>
				<a class="woocommerce-button woocommerce-button--next woocommerce-Button woocommerce-Button--next button" href="<?php echo esc_url( wc_get_endpoint_url( 'orders', $current_page + 1 ) ); ?>"><?php esc_html_e( 'Next', 'woocommerce' ); ?></a>
			<?php endif; ?>
		</div>
	<?php endif; ?>

<?php else : ?>
    <div class="no-order dn">
        <div class="t1">У ВАС ПОКА НЕ БЫЛО ЗАКАЗОВ <img src="assets/img/smile.svg" alt=""></div>
        <a href="<?php echo esc_url( apply_filters( 'woocommerce_return_to_shop_redirect', wc_get_page_permalink( 'shop' ) ) ); ?>"><?php esc_html_e( 'Browse products', 'woocommerce' );?></a>
    </div>
<?php endif; ?>

    </div>
</div>

<?php do_action( 'woocommerce_after_account_orders', $has_orders ); ?>
