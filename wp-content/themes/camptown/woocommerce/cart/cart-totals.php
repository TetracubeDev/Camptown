<?php

/**
 * Cart totals
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart-totals.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 2.3.6
 */

defined('ABSPATH') || exit;

?>

<div class="cart_totals <?php echo (WC()->customer->has_calculated_shipping()) ? 'calculated_shipping' : ''; ?>">

	<div class="cart-block__title">

		סיכום הקנייה

	</div>



	<table class="shop_table">








		<?php if (wc_coupons_enabled()) { ?>
			<tr>
				<td colspan="2" class="actions">
					<div class="custom-coupon">
						<div class="custom-coupon__label">
							מימוש קופון <i class="icon-plus"></i>
						</div>
						<div class="custom-coupon__hidden">



							<div class="custom-coupon__inner">

								<input type="text" class="coopon-inp" placeholder="קוד קופון">
								<div class="custom-coupon__btn btn site-color-btn">החל</div>
							</div>
							<div class="cart-discount error">  הזן קוד הנחה תקף </div>
							<?php foreach (WC()->cart->get_coupons() as $code => $coupon) : ?>
								<div class="cart-discount coupon-<?php echo esc_attr(sanitize_title($code)); ?>">
									<div><?php /* wc_cart_totals_coupon_label($coupon); */ ?></div>
									<div data-title="<?php echo esc_attr(wc_cart_totals_coupon_label($coupon, false)); ?>">הסכום שחסכת בקנייה זו <?php wc_cart_totals_coupon_html($coupon); ?></div>
								</div>
							<?php endforeach;   ?>
						</div>
					</div>

				</td>
			</tr>
		<?php } ?>


		<?php do_action('woocommerce_cart_totals_before_order_total'); ?>

		<tr class="order-total">
			<th><?php esc_html_e('Total', 'woocommerce'); ?></th>
			<td data-title="<?php esc_attr_e('Total', 'woocommerce'); ?>"><?php wc_cart_totals_subtotal_html(); ?></td>
		</tr>

		<?php do_action('woocommerce_cart_totals_after_order_total'); ?>


	</table>


	<div class="wc-proceed-to-checkout">
		<?php do_action('woocommerce_proceed_to_checkout'); ?>
	</div>
	<div class="text-center">
		<a class="show-post back-to-shop" href="<?= get_permalink(wc_get_page_id('shop')) ?> "> חזרה לחנות </a>

	</div>
	<?php do_action('woocommerce_after_cart_totals'); ?>
</div>