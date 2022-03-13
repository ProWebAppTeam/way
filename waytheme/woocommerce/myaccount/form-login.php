<?php
/**
 * Login Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-login.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 4.1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}?>

<div class="account">

<?php do_action( 'woocommerce_before_customer_login_form' ); ?>

    <div class="u-columns col2-set account-block" id="customer_login">
                    
                    <form class="woocommerce-form woocommerce-form-login login" method="post">
	    
	    <div class="u-column1 col-1 account-info">
    
            <div class="account-item">
                <div class="inpb-group">
		            <div class="account-title"><?php esc_html_e( 'Login', 'woocommerce' ); ?></div>

		            

			        <?php do_action( 'woocommerce_login_form_start' ); ?>

			        <div class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide inpb">
				    <!--<label for="username"><?php //esc_html_e( 'Username or email address', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>-->
				        <input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="username" 
				            id="username" autocomplete="username" 
				            placeholder="<?php esc_html_e( 'Username or email address', 'woocommerce' ); ?>"
				            value="<?php echo ( ! empty( $_POST['username'] ) ) ? esc_attr( wp_unslash( $_POST['username'] ) ) : ''; ?>" /><?php // @codingStandardsIgnoreLine ?>
			        </div>
			        <div class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide inpb">
				        <!--<label for="password"><?php //esc_html_e( 'Password', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>-->
				        <input class="woocommerce-Input woocommerce-Input--text input-text" type="password" 
				            name="password" id="password" 
				            placeholder="<?php esc_html_e( 'Password', 'woocommerce' ); ?>"
				            autocomplete="current-password" />
			        </div>

			        <?php do_action( 'woocommerce_login_form' ); ?>

			        <div class="form-row inpb">
				        <label class="woocommerce-form__label woocommerce-form__label-for-checkbox woocommerce-form-login__rememberme">
					        <input class="woocommerce-form__input woocommerce-form__input-checkbox" name="rememberme" type="checkbox" id="rememberme" value="forever" /> <span><?php esc_html_e( 'Remember me', 'woocommerce' ); ?></span>
				        </label>
				        <?php wp_nonce_field( 'woocommerce-login', 'woocommerce-login-nonce' ); ?>
				        
			        </div>
			        
			        <button type="submit" class="woocommerce-button button woocommerce-form-login__submit checkout_button" name="login" value="<?php esc_attr_e( 'Log in', 'woocommerce' ); ?>"><?php esc_html_e( 'Log in', 'woocommerce' ); ?></button>
			        
			        <br>
			        
			        <p class="woocommerce-LostPassword lost_password">
				        <a href="<?php echo esc_url( wp_lostpassword_url() ); ?>"><?php esc_html_e( 'Lost your password?', 'woocommerce' ); ?></a>
			        </p>

			         <?php do_action( 'woocommerce_login_form_end' ); ?>

		        </div>
        
            </div>
    
        </div>
                    
                    </form>

<?php if ( 'yes' === get_option( 'woocommerce_enable_myaccount_registration' ) ) : ?>
        
	    <div class="v-line"></div>

	<div class="u-column2 col-2 account-info">

		<div class="account-title"><?php esc_html_e( 'Register', 'woocommerce' ); ?></div>
            <div class="inpb-group">
		        <form method="post" class="woocommerce-form woocommerce-form-register register" <?php do_action( 'woocommerce_register_form_tag' ); ?> >

			        <?php do_action( 'woocommerce_register_form_start' ); ?>

			        <?php if ( 'no' === get_option( 'woocommerce_registration_generate_username' ) ) : ?>

				        <div class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide inpb">
					        <!--<label for="reg_username"><?php //esc_html_e( 'Username', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>-->
					        <input type="text" class="woocommerce-Input woocommerce-Input--text input-text" 
					            name="username" id="reg_username" autocomplete="username" 
					            placeholder="<?php esc_html_e( 'Username', 'woocommerce' ); ?>" 
					            value="<?php echo ( ! empty( $_POST['username'] ) ) ? esc_attr( wp_unslash( $_POST['username'] ) ) : ''; ?>" /><?php // @codingStandardsIgnoreLine ?>
				        </div>

			        <?php endif; ?>

			        <div class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide inpb">
				        <!--<label for="reg_email"><?php //esc_html_e( 'Email address', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>-->
				        <input type="email" class="woocommerce-Input woocommerce-Input--text input-text" name="email" 
				        id="reg_email" autocomplete="email" 
				        placeholder="<?php esc_html_e( 'Username', 'woocommerce' ); ?>" 
				        value="<?php echo ( ! empty( $_POST['email'] ) ) ? esc_attr( wp_unslash( $_POST['email'] ) ) : ''; ?>" /><?php // @codingStandardsIgnoreLine ?>
			        </div>

			        <?php if ( 'no' === get_option( 'woocommerce_registration_generate_password' ) ) : ?>

				    <div class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide inpb">
					    <!--<label for="reg_password"><?php //esc_html_e( 'Password', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>-->
					    <input type="password" class="woocommerce-Input woocommerce-Input--text input-text" 
					    name="password" id="reg_password" 
					    placeholder="<?php esc_html_e( 'Password', 'woocommerce' ); ?>" 
					    autocomplete="new-password" />
				    </div>

			        <?php else : ?>

				    <p><?php esc_html_e( 'A password will be sent to your email address.', 'woocommerce' ); ?></p>

			        <?php endif; ?>

			        <?php do_action( 'woocommerce_register_form' ); ?>

			        
				    <?php wp_nonce_field( 'woocommerce-register', 'woocommerce-register-nonce' ); ?>
				    <button type="submit" class="woocommerce-Button woocommerce-button button woocommerce-form-register__submit checkout_button" name="register" value="<?php esc_attr_e( 'Register', 'woocommerce' ); ?>"><?php esc_html_e( 'Register', 'woocommerce' ); ?></button>

			        <?php do_action( 'woocommerce_register_form_end' ); ?>

		        </form>
		    </div>

	</div>

  </div>
<?php endif; ?>

<?php do_action( 'woocommerce_after_customer_login_form' ); ?>

</div>