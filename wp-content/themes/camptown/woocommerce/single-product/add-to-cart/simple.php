<?php

/**
 * Simple product add to cart
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/add-to-cart/simple.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.4.0
 */

defined('ABSPATH') || exit;

global $product;

if (!$product->is_purchasable()) {
	return;
}

echo wc_get_stock_html($product); // WPCS: XSS ok.

if ($product->is_in_stock()) : ?>

	<?php do_action('woocommerce_before_add_to_cart_form'); ?>

	<form class="cart content-single-product__cart" action="<?php echo esc_url(apply_filters('woocommerce_add_to_cart_form_action', $product->get_permalink())); ?>" method="post" enctype='multipart/form-data'>
		<?php do_action('woocommerce_before_add_to_cart_button'); ?>

		<div class="content-single-product__button-wrap">
			<?php
			do_action('woocommerce_before_add_to_cart_quantity');

			woocommerce_quantity_input(
				array(
					'min_value'   => apply_filters('woocommerce_quantity_input_min', $product->get_min_purchase_quantity(), $product),
					'max_value'   => apply_filters('woocommerce_quantity_input_max', $product->get_max_purchase_quantity(), $product),
					'input_value' => isset($_POST['quantity']) ? wc_stock_amount(wp_unslash($_POST['quantity'])) : $product->get_min_purchase_quantity(), // WPCS: CSRF ok, input var ok.
				)
			);

			do_action('woocommerce_after_add_to_cart_quantity');
			?>
			<input type="hidden" name="product_id" value="<?php echo esc_attr($product->get_id()); ?>">

			<button type="submit" name="add-to-cart" value="<?php echo esc_attr($product->get_id()); ?>" class="single_add_to_cart_button  btn site-color-btn"><?php echo esc_html($product->single_add_to_cart_text()); ?></button>
		</div>

		<?php do_action('woocommerce_after_add_to_cart_button'); ?>
	</form>

	<?php do_action('woocommerce_after_add_to_cart_form'); ?>

<?php else : ?>
	<a href="#out-of-stock-modal" class="out-of-stock-btn btn site-color-btn modal-btn">צור קשר</a>
	<div class="modal out-of-stock-modal" id="out-of-stock-modal">
		<div class="modal__inner">
			<div class="modal__title">

				<?php $custom_logo = wp_get_attachment_image_src(get_theme_mod('custom_logo'), 'full'); ?>


				<img class="header__logo-img" src="<?= $custom_logo[0]; ?>" alt="<?php bloginfo('name'); ?>">

			</div>
			<?php echo do_shortcode('[contact-form-7 id="3372" title="Out Of Stock Form"]') ?>
			<div class="modal__close  modal-close-btn">
				<i class="icon-close-thin"></i>
			</div>
		</div>
	</div>

	<style>
		.out-of-stock-btn {
			height: 54px;
			font-size: 18px;
			margin: 0 8px;
			width: 300px;
		}

		.out-of-stock-modal input:not([type=submit]) {
			margin-bottom: 20px;
		}

		.out-of-stock-modal input[type=submit] {
			margin-top: 12px;
			height: 50px;
			width: 100%;
			border-radius: 35px;
			font-weight: bold;
			border: none;
			transition: all ease .3s;
		}

		@media (max-width: 767px) {

			.out-of-stock-modal input:not([type=submit]) {
				height: 44px;
				margin-bottom: 15px;
			}

			.out-of-stock-modal input[type=submit] {
				height: 44px;

			}
		}

		@media (max-width: 767px) {
			.out-of-stock-btn {
				width: 288px;
				height: 46px;
				font-size: 17px;
				margin: 0 5px 0 11px;
			}
		}

		@media (max-width: 576px) {
			.out-of-stock-btn {
				width: 77vw;
			}
		}

		.out-of-stock {
			display: none;
		}
	</style>
	<script>
		document.addEventListener('wpcf7mailsent', function(event) {
			if ('3372' == event.detail.contactFormId) {
				let sendText = null;
				let inV = null
				if (!sendText) {
					inV = setInterval(insertMessage, 100);
				}

				function insertMessage() {
					sendText = jQuery(event.path[1]).find('.wpcf7-response-output').text();
					if (sendText !== '') {
						sendText = jQuery(event.path[1]).find('.wpcf7-response-output').text();
						jQuery('.success-subscribe-message span').html(sendText)

						removeInterval(inV)
					} else {
						sendText = null
					}

				}

				function removeInterval(interval) {
					clearInterval(interval);
				}


				jQuery('.placeholder').removeClass('is-focused');
				jQuery('#success-subscribe, .modal-close-area').fadeIn();
				jQuery('.modal__inner').fadeOut();
				setTimeout(function() {
					jQuery('#out-of-stock-modal, .modal-close-area').fadeOut();
				}, 3000)
				setTimeout(function() {
					jQuery('.modal__inner').fadeIn();
				}, 5000)



			}


		}, false);
	</script>
<?php endif; ?>