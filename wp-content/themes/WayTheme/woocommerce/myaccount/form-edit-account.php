<?php
/**
 * Edit account form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-edit-account.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.5.0
 */

defined( 'ABSPATH' ) || exit;

do_action( 'woocommerce_before_edit_account_form' ); ?>

<div class="account-item">
    <div class="account-title">ОБО МНЕ</div>
    
    <div class="inpb-group">
        <form class="woocommerce-EditAccountForm edit-account" action="" method="post" <?php do_action( 'woocommerce_edit_account_form_tag' ); ?> >

	    <?php do_action( 'woocommerce_edit_account_form_start' ); ?>

	    <div class="woocommerce-form-row woocommerce-form-row--first form-row form-row-first inpb">
		<!--<label for="account_first_name"><?php //esc_html_e( 'First name', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>-->
		    <input type="text" class="woocommerce-Input woocommerce-Input--text input-text" placeholder="ИМЯ" name="account_first_name" id="account_first_name" autocomplete="given-name" value="<?php echo esc_attr( $user->first_name ); ?>" />
	    </div>
	    <div class="woocommerce-form-row woocommerce-form-row--last form-row form-row-last inpb">
		    <!--<label for="account_last_name"><?php //esc_html_e( 'Last name', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>-->
		    <input type="text" class="woocommerce-Input woocommerce-Input--text input-text" placeholder="ФАМИЛИЯ" name="account_last_name" id="account_last_name" autocomplete="family-name" value="<?php echo esc_attr( $user->last_name ); ?>" />
	    </div>
	    <div class="clear"></div>

	    <div class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide inpb">
		    <!--<label for="account_display_name"><?php //esc_html_e( 'Display name', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>-->
		    <input type="text" class="woocommerce-Input woocommerce-Input--text input-text" placeholder="ЛОГИН" name="account_display_name" id="account_display_name" value="<?php echo esc_attr( $user->display_name ); ?>" /> <span><em><?php esc_html_e( 'This will be how your name will be displayed in the account section and in reviews', 'woocommerce' ); ?></em></span>
	    </div>

	    <div class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide inpb">
		    <!--<label for="account_email"><?php //esc_html_e( 'Email address', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>-->
		    <input type="email" class="woocommerce-Input woocommerce-Input--email input-text" placeholder="E-MAIL" name="account_email" id="account_email" autocomplete="email" value="<?php echo esc_attr( $user->user_email ); ?>" />
	    </p>
    </div>
</div>

<br>

<div class="account-item">
    <div class="account-title">МОЙ ПАРОЛЬ</div>
	<div class="inpb-group">
	<fieldset>
		<!--<legend><?php //esc_html_e( 'Password change', 'woocommerce' ); ?></legend>-->

		<div class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide inpb">
			<!--<label for="password_current"><?php esc_html_e( 'Current password (leave blank to leave unchanged)', 'woocommerce' ); ?></label>-->
			<input type="password" class="woocommerce-Input woocommerce-Input--password input-text" name="password_current" id="password_current" autocomplete="off" placeholder="ТЕКУЩИЙ ПАРОЛЬ"/>
		</div>
		<div class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide inpb">
			<!--<label for="password_1"><?php esc_html_e( 'New password (leave blank to leave unchanged)', 'woocommerce' ); ?></label>-->
			<input type="password" class="woocommerce-Input woocommerce-Input--password input-text" name="password_1" id="password_1" autocomplete="off" placeholder="СТАРЫЙ ПАРОЛЬ"/>
		</div>
		<div class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide inpb">
			<!--<label for="password_2"><?php //esc_html_e( 'Confirm new password', 'woocommerce' ); ?></label>-->
			<input type="password" class="woocommerce-Input woocommerce-Input--password input-text" name="password_2" id="password_2" autocomplete="off" placeholder="НОВЫЙ ПАРОЛЬ"/>
		</div>
	</fieldset>
	</div>
</div>

	<?php do_action( 'woocommerce_edit_account_form' ); ?>

		<?php wp_nonce_field( 'save_account_details', 'save-account-details-nonce' ); ?>
		<button type="submit" class="woocommerce-Button button account-btn" name="save_account_details" value="<?php esc_attr_e( 'Save changes', 'woocommerce' ); ?>"><?php esc_html_e( 'Save changes', 'woocommerce' ); ?></button>
		<input type="hidden" name="action" value="save_account_details" />

	<?php do_action( 'woocommerce_edit_account_form_end' ); ?>
</form>

<?php do_action( 'woocommerce_after_edit_account_form' ); ?>
</div>
