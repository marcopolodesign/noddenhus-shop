<?php
/**
 * Checkout Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-checkout.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.5.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


if ( ! $checkout->is_registration_enabled() && $checkout->is_registration_required() && ! is_user_logged_in() ) {
	echo esc_html( apply_filters( 'woocommerce_checkout_must_be_logged_in_message', __( 'You must be logged in to checkout.', 'woocommerce' ) ) );
	return;
} ?>

<div class="flex relative checkout-general-container">

<div class="w-40-ns pa4 checkout-details-container sticky top-0 flex">
	<div class="m-auto pa5 ph4 pt0  bg-white w-90-ns center">
		<div class="discount-code">
			<?php do_action( 'woocommerce_before_checkout_form', $checkout ); ?>
		</div>

		<div class="checkout-details">
			<h2 class="mb4">Detalle de tu compra:</h2>
			<p class="mt2">Nombre:<br><span id="detail-name"></span> <span id="detail-last"></span></p>

			<p class="mt2">Dirección:<br>
				<span id="detail-street"></span>
				<span id="detail-ap"></span>
				<span id="detail-city"></span>
				<span id="detail-province"></span>
				<span id="detail-pc"></span>
			</p>

			<p class="mt2">Teléfono:<br><span id="detail-phone"></span></p>
			<p class="mt2">Mail:<br><span id="detail-mail"></span></p>

		</div>
	</div>
	

</div>

	<form name="checkout" method="post" class="checkout woocommerce-checkout w-60-ns ml-auto mr-0 ph5 pv3 b5" action="<?php echo esc_url( wc_get_checkout_url() ); ?>" enctype="multipart/form-data">

	<div class="sd-header flex justify-between mv5">
			<h2 class="f2">Checkout</h2>
			<a href="/shop" class="close-sd bg-black flex anchor pa2" cursor-color="red">
					<img class="pa1" src="/wp-content/uploads/2020/01/close-icon.svg">
			</a>
			
	</div>


		<?php if ( $checkout->get_checkout_fields() ) : ?>

			<?php do_action( 'woocommerce_checkout_before_customer_details' ); ?>

			<div class="col2-set" id="customer_details">
				<div class="col-1">
					<?php do_action( 'woocommerce_checkout_billing' ); ?>
				</div>

				<div class="col-2">
					<?php do_action( 'woocommerce_checkout_shipping' ); ?>
				</div>
			</div>

			<?php do_action( 'woocommerce_checkout_after_customer_details' ); ?>

		<?php endif; ?>
		
		<?php do_action( 'woocommerce_checkout_before_order_review_heading' ); ?>
		
		<h3 id="order_review_heading"><?php esc_html_e( 'Your order', 'woocommerce' ); ?></h3>
		
		<?php do_action( 'woocommerce_checkout_before_order_review' ); ?>

		<div id="order_review" class="woocommerce-checkout-review-order">
			<?php do_action( 'woocommerce_checkout_order_review' ); ?>
		</div>

		<?php do_action( 'woocommerce_checkout_after_order_review' ); ?>

	</form>
</div>



<?php do_action( 'woocommerce_after_checkout_form', $checkout ); 


 ?>

