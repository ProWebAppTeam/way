<?php
/**
 * My Account page
 *
 */

defined( 'ABSPATH' ) || exit;?>

<div class="account">

<?php
/**
 * My Account navigation.
 *
 * @since 2.6.0
 */
 do_action( 'woocommerce_account_navigation' ); ?>

<div class="woocommerce-MyAccount-content">
	<?php
		/**
		 * My Account content.
		 *
		 * @since 2.6.0
		 */
		//do_action( 'woocommerce_account_content' );
	?>
</div>
    <div class="account-block">
        <div class="account-info">
            <?php wc_get_template( 'myaccount/form-edit-account.php', array( 'user' => get_user_by( 'id', get_current_user_id() ) ) );?>
        </div>
        
        <div class="v-line"></div>
        
        <div class="account-address">
            <?php way_edit_address(); ?>
        </div>
    </div>
    
    <a href="<?php echo wc_logout_url()?>" class="logout">ВЫЙТИ</a>
    
</div>

