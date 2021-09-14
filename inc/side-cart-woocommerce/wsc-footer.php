<?php

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}


$subtotal_txt 		= 'Total';
$cart_txt 			= 'Carrito';
$chk_txt 			= 'Checkout';
$cont_txt 			= 'Seguir comprando';
//shop-sidebar-cart-shop-label, 
?>

	<div class="wsc-footer main-font bg-main-light">

	<?php if(!WC()->cart->is_empty()): ?>

		<div class="wsc-footer-a">
			<h6 class="wsc-subtotal">
				<span><?php echo esc_html($subtotal_txt) ?></span> <?php echo wc_price(WC()->cart->subtotal); ?>
			</h6>
		</div>

		<div class="wsc-footer-b">
			<?php $hide_btns = WC()->cart->is_empty() ? 'style="display: none;"' : '';?>

			<?php if(!empty($chk_txt)): ?>
				<a  href="<?php echo esc_url( wc_get_checkout_url() ); ?>" class="button wsc-chkt btn" <?php echo esc_attr( $hide_btns ); ?>><?php echo esc_html($chk_txt); ?></a>
			<?php endif; ?>

			<?php if(!empty($cont_txt)): ?>
				<a  href="#" class="wsc-cont"><?php echo esc_html( $cont_txt ); ?></a>
			<?php endif; ?>
		</div>

	</div>
			<?php endif;?>

</div>
