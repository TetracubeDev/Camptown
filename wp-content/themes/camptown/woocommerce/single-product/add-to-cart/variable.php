<?php

/**
 * Variable product add to cart
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/add-to-cart/variable.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.5.5
 */

defined('ABSPATH') || exit;

global $product;

$attribute_keys  = array_keys($attributes);
$variations_json = wp_json_encode($available_variations);
$variations_attr = function_exists('wc_esc_json') ? wc_esc_json($variations_json) : _wp_specialchars($variations_json, ENT_QUOTES, 'UTF-8', true);

do_action('woocommerce_before_add_to_cart_form'); ?>

<form class="variations_form cart" action="<?php echo esc_url(apply_filters('woocommerce_add_to_cart_form_action', $product->get_permalink())); ?>" method="post" enctype='multipart/form-data' data-product_id="<?php echo absint($product->get_id()); ?>" data-product_variations="<?php echo $variations_attr; // WPCS: XSS ok. 
																																																																						?>">
	<?php do_action('woocommerce_before_variations_form'); ?>

	<?php if (empty($available_variations) && false !== $available_variations) : ?>
		<!-- <p class="stock out-of-stock"> -->
		<?php /* echo esc_html(apply_filters('woocommerce_out_of_stock_message', __('This product is currently out of stock and unavailable.', 'woocommerce'))); */ ?>
		<!-- </p> -->
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
	<?php else : ?>
		<table class="variations" cellspacing="0">
			<tbody>
				<?php foreach ($attributes as $attribute_name => $options) : ?>
					<tr>
						<th class="label"><label for="<?php echo esc_attr(sanitize_title($attribute_name)); ?>"><?php echo wc_attribute_label($attribute_name); // WPCS: XSS ok. 
																												?></label></th>
						<td class="value">
							<?php
							wc_dropdown_variation_attribute_options(
								array(
									'options'   => $options,
									'attribute' => $attribute_name,
									'product'   => $product,
								)
							);
							echo end($attribute_keys) === $attribute_name ? wp_kses_post(apply_filters('woocommerce_reset_variations_link', '<a class="reset_variations" href="#">' . esc_html__('Clear', 'woocommerce') . '</a>')) : '';
							?>
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
		<?php do_action('woocommerce_after_variations_table'); ?>

		<div class="single_variation_wrap">
			<?php
			/**
			 * Hook: woocommerce_before_single_variation.
			 */
			do_action('woocommerce_before_single_variation');

			/**
			 * Hook: woocommerce_single_variation. Used to output the cart button and placeholder for variation data.
			 *
			 * @since 2.4.0
			 * @hooked woocommerce_single_variation - 10 Empty div for variation data.
			 * @hooked woocommerce_single_variation_add_to_cart_button - 20 Qty and cart button.
			 */
			do_action('woocommerce_single_variation');

			/**
			 * Hook: woocommerce_after_single_variation.
			 */
			do_action('woocommerce_after_single_variation');
			?>
		</div>
	<?php endif; ?>

	<?php do_action('woocommerce_after_variations_form'); ?>
</form>

<?php
do_action('woocommerce_after_add_to_cart_form');
