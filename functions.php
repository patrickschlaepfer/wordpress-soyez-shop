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
