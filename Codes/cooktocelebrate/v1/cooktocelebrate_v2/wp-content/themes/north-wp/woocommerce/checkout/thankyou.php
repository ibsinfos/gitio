<?php
/**
 * Thankyou page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/thankyou.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version   3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<section class="my_woocommerce_page page-padding">
	<ul id="shippingsteps" class="row no-padding">
		<li class="first small-12 large-4 columns"><span>1</span><a href="#" data-target="billing_shipping"><?php _e('Billing &amp; Shipping', 'north'); ?></a></li>
		<li class="small-12 large-4 columns"><span>2</span><a href="#" data-target="order_review"><?php _e('Your Order &amp; Payment', 'north'); ?></a></li>
		<li class="active small-12 large-4 columns"><span>3</span><a href="#"><?php _e('Confirmation', 'north'); ?></a></li>
	</ul>
	<div class="row max_width align-center">
		<div class="small-12 medium-10 large-8 columns">
			<?php if ( $order ) : ?>
			
				<?php if ( $order->has_status( 'failed' ) ) : ?>
				
					<p class="woocommerce-notice woocommerce-notice--error woocommerce-thankyou-order-failed"><?php _e( 'Unfortunately your order cannot be processed as the originating bank/merchant has declined your transaction. Please attempt your purchase again.', 'north' ); ?></p>
					
					<p class="woocommerce-notice woocommerce-notice--error woocommerce-thankyou-order-failed-actions">
						<a href="<?php echo esc_url( $order->get_checkout_payment_url() ); ?>" class="button pay"><?php _e( 'Pay', 'north' ) ?></a>
						<?php if ( is_user_logged_in() ) : ?>
							<a href="<?php echo esc_url( wc_get_page_permalink( 'myaccount' ) ); ?>" class="button pay"><?php _e( 'My account', 'north' ); ?></a>
						<?php endif; ?>
					</p>
				
				
				<?php else : ?>
				
				<p class="woocommerce-thankyou-order-received"><?php echo apply_filters( 'woocommerce_thankyou_order_received_text', __( 'Thank you. Your order has been received.', 'north' ), $order ); ?></p>
				
				<ul class="woocommerce-order-overview woocommerce-thankyou-order-details order_details">
				
					<li class="woocommerce-order-overview__order order">
						<?php _e( 'Order number:', 'north' ); ?>
						<strong><?php echo $order->get_order_number(); ?></strong>
					</li>
				
					<li class="woocommerce-order-overview__date date">
						<?php _e( 'Date:', 'north' ); ?>
						<strong><?php echo wc_format_datetime( $order->get_date_created() ); ?></strong>
					</li>
				
					<li class="woocommerce-order-overview__total total">
						<?php _e( 'Total:', 'north' ); ?>
						<strong><?php echo $order->get_formatted_order_total(); ?></strong>
					</li>
				
					<?php if ( $order->get_payment_method_title() ) : ?>
				
					<li class="woocommerce-order-overview__payment-method method">
						<?php _e( 'Payment method:', 'north' ); ?>
						<strong><?php echo wp_kses_post( $order->get_payment_method_title() ); ?></strong>
					</li>
				
					<?php endif; ?>
				
				</ul>
				
				<?php endif; ?>
			
			<?php do_action( 'woocommerce_thankyou_' . $order->get_payment_method(), $order->get_id() ); ?>
			<?php do_action( 'woocommerce_thankyou', $order->get_id() ); ?>
			
			<?php else : ?>
			
			<p class="woocommerce-thankyou-order-received"><?php echo apply_filters( 'woocommerce_thankyou_order_received_text', __( 'Thank you. Your order has been received.', 'north' ), null ); ?></p>
			
			<?php endif; ?>
			</div>
		</div>
	</div>
</section>