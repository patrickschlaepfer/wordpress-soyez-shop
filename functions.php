<?php
/**
 * Functions and definitions for Soyez shop 
 *
 * Edit soyez_shop_min_suffix() and soyez_shop_setup() to unlock features.
 *
 * @package    WordPress
 * @subpackage soyez_shop
 * @version    04/15/2015
 * @author     soyez.ch 
 */

/**
 * Sets up theme defaults, enqeues stylesheet and scripts.
 *
 * @since   09/19/2013
 * @return  void
 */
function soyez_shop_setup() {

	// Loads the child theme's translated strings
	load_child_theme_textdomain( 'virtue', get_stylesheet_directory() . '/languages' );

}
add_action( 'after_setup_theme', 'soyez_shop_setup' );

# add_filter( 'woocommerce_product_single_add_to_cart_text', 'woo_custom_cart_button_text' );    // 2.1 +
function woo_custom_cart_button_text() {
        return __( 'in den warenkorb', 'woocommerce' );
}

# add_filter( 'woocommerce_product_add_to_cart_text', 'woo_archive_custom_cart_button_text' );    // 2.1 +
function woo_archive_custom_cart_button_text() {
        return __( 'in den warenkorb', 'woocommerce' );
}
add_filter('woocommerce_registration_errors', 'registration_errors_validation', 10,3);
function registration_errors_validation($reg_errors, $sanitized_user_login, $user_email) {
	global $woocommerce;
	extract( $_POST );

	if ( strcmp( $password, $password2 ) !== 0 ) {
		return new WP_Error( 'registration-error', __( 'Passwords do not match.', 'woocommerce' ) );
	}
	return $reg_errors;
}

add_action( 'woocommerce_register_form', 'wc_register_form_password_repeat' );
function wc_register_form_password_repeat() {
	?>
	<p class="form-row form-row-wide">
		<label for="reg_password2"><?php _e( 'Password Repeat', 'woocommerce' ); ?> <span class="required">*</span></label>
		<input type="password" class="input-text" name="password2" id="reg_password2" value="<?php if ( ! empty( $_POST['password2'] ) ) echo esc_attr( $_POST['password2'] ); ?>" />
	</p>
	<?php
}
