<?php
/**
 * Edit address form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-edit-address.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$page_title = ( $load_address === 'billing' ) ? __( 'Billing Address', 'north' ) : __( 'Shipping Address', 'north' );

wc_print_notices();

/**
 * My Account navigation.
 *
 * @since 2.6.0
 */
// do_action( 'woocommerce_account_navigation' ); ?>

<div class="woocommerce-MyAccount-content">
	<div class="row max_width align-center">
		<div class="small-12 medium-10 large-8 columns">
			<?php do_action( 'woocommerce_before_edit_account_address_form' ); ?>
		
			<?php if ( ! $load_address ) : ?>
				<?php wc_get_template( 'myaccount/my-address.php' ); ?>
			<?php else : ?>
		
				<form method="post">
		
					<h3><?php echo apply_filters( 'woocommerce_my_account_edit_address_title', $page_title, $load_address ); ?></h3>
					
					<div class="woocommerce-address-fields">
					
						<?php do_action( "woocommerce_before_edit_address_form_{$load_address}" ); ?>
						
						<div class="woocommerce-address-fields__field-wrapper">
						
						<?php foreach ( $address as $key => $field ) : ?>
			
							<?php woocommerce_form_field( $key, $field, ! empty( $_POST[ $key ] ) ? wc_clean( $_POST[ $key ] ) : $field['value'] ); ?>
			
						<?php endforeach; ?>
						
						</div>
			
						<?php do_action( "woocommerce_after_edit_address_form_{$load_address}" ); ?>
			
						<p>
							<input type="submit" class="button" name="save_address" value="<?php esc_attr_e( 'Save Address', 'north' ); ?>" />
							<?php wp_nonce_field( 'woocommerce-edit_address' ); ?>
							<input type="hidden" name="action" value="edit_address" />
						</p>
					
					</div>
					
				</form>
		
			<?php endif; ?>
		
			<?php do_action( 'woocommerce_after_edit_account_address_form' ); ?>
		</div>
	</div>
</div>