<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

function way_get_account_menu_items() {
	$endpoints = array(
		'orders'          => get_option( 'woocommerce_myaccount_orders_endpoint', 'orders' ),
		'payment-methods' => get_option( 'woocommerce_myaccount_payment_methods_endpoint', 'payment-methods' ),
		'favorites' => wc_get_endpoint_url( $endpoint, '', wc_get_page_permalink( 'favorites' ) ),
	);

	$items = array(
		'dashboard'       => __( 'ПРОФИЛЬ', 'woocommerce' ),
		'orders'          => __( 'ЗАКАЗЫ', 'woocommerce' ),
		'payment-methods' => __( 'МЕТОДЫ ОПЛАТЫ', 'woocommerce' ),
		'favorites' => __( 'ИЗБРАННОЕ', 'woocommerce' ),
	);

	// Remove missing endpoints.
	foreach ( $endpoints as $endpoint_id => $endpoint ) {
		if ( empty( $endpoint ) ) {
			unset( $items[ $endpoint_id ] );
		}
	}

	// Check if payment gateways support add new payment methods.
	if ( isset( $items['payment-methods'] ) ) {
		$support_payment_methods = false;
		foreach ( WC()->payment_gateways->get_available_payment_gateways() as $gateway ) {
			if ( $gateway->supports( 'add_payment_method' ) || $gateway->supports( 'tokenization' ) ) {
				$support_payment_methods = true;
				break;
			}
		}

		if ( ! $support_payment_methods ) {
			unset( $items['payment-methods'] );
		}
	}

	return apply_filters( 'woocommerce_account_menu_items', $items, $endpoints );
}

/**
 * Get account menu item classes.
 *
 * @since 2.6.0
 * @param string $endpoint Endpoint.
 * @return string
 */
function way_get_account_menu_item_classes( $endpoint ) {
	global $wp;

	$classes = array(
		'woocommerce-MyAccount-navigation-link',
		'woocommerce-MyAccount-navigation-link--' . $endpoint,
	);

	// Set current item class.
	$current = isset( $wp->query_vars[ $endpoint ] );
	if ( 'dashboard' === $endpoint && ( isset( $wp->query_vars['page'] ) || empty( $wp->query_vars ) ) ) {
		$current = true; // Dashboard is not an endpoint, so needs a custom check.
	} elseif ( 'orders' === $endpoint && isset( $wp->query_vars['view-order'] ) ) {
		$current = true; // When looking at individual order, highlight Orders list item (to signify where in the menu the user currently is).
	} elseif ( 'payment-methods' === $endpoint && isset( $wp->query_vars['add-payment-method'] ) ) {
		$current = true;
	}

	if ( $current ) {
		$classes[] = 'active';
	}

	$classes = apply_filters( 'woocommerce_account_menu_item_classes', $classes, $endpoint );

	return implode( ' ', array_map( 'sanitize_html_class', $classes ) );
}

	/**
	 * My Account > Orders template.
	 *
	 * @param int $current_page Current page number.
	 */
	function way_woocommerce_account_orders( $current_page = 1 ) {
		$current_page    = empty( $current_page ) ? 1 : absint( $current_page );
		$customer_orders = wc_get_orders(
			apply_filters(
				'woocommerce_my_account_my_orders_query',
				array(
					'customer' => get_current_user_id(),
					'page'     => $current_page,
					'paginate' => true,
				)
			)
		);
		
		echo count($customer_orders); 
		
		wc_get_template(
			'myaccount/orders.php',
			array(
				'current_page'    => absint( $current_page ),
				'customer_orders' => $customer_orders,
				'has_orders'      => 0 < $customer_orders->total,
			)
		);
	}
