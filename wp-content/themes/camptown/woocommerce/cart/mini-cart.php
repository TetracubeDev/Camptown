<?php

/**
 * Mini-cart
 *
 * Contains the markup for the mini-cart, used by the cart widget.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/mini-cart.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 5.2.0
 */

defined('ABSPATH') || exit;

do_action('woocommerce_before_mini_cart'); ?>

<span class="mini-cart__quantity"><?php echo WC()->cart->get_cart_contents_count(); ?></span>

<?php if (!WC()->cart->is_empty()) : ?>



	<div class="mini-cart__club">
		<div class="mini-cart__club-title">
			<img src="<?= get_field('club_icon', 'option')['url'] ?>" alt="<?= get_field('club_icon', 'option')['alt'] ?>">
			<span> מצטרפים למועדון וצוברים נקודות </span>
		</div>
		<?php if (get_field('club_link', 'option')) : ?>
			<?php
			$value = get_field('club_link', 'option');
			$target = $value['target'] ? $value['target'] : '_self'; ?>
			<a href="<?php echo $value['url'] ?>" target="<?php echo esc_attr($target); ?>"><?php echo $value['title'] ?></a>
		<?php endif; ?>
	</div>



	<div class="woocommerce-mini-cart cart_list product_list_widget <?php echo esc_attr($args['list_class']); ?>">
		<?php
		do_action('woocommerce_before_mini_cart_contents');

		foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item) {
			$_product   = apply_filters('woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key);
			$product_id = apply_filters('woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key);

			if ($_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters('woocommerce_widget_cart_item_visible', true, $cart_item, $cart_item_key)) {
				$product_name      = apply_filters('woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key);
				$thumbnail         = apply_filters('woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key);
				$product_price     = apply_filters('woocommerce_cart_item_price', WC()->cart->get_product_price($_product), $cart_item, $cart_item_key);
				$product_permalink = apply_filters('woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink($cart_item) : '', $cart_item, $cart_item_key);
		?>
				<div class="mini-cart__item woocommerce-mini-cart-item <?php echo esc_attr(apply_filters('woocommerce_mini_cart_item_class', 'mini_cart_item', $cart_item, $cart_item_key)); ?>" data-cart_key="<?php echo $cart_item_key; ?>">
					<div class="mini-cart__alert">
						המוצר התווסף לסל קניות
					</div>
					<div class="mini-cart__content">

						<div class="mini-cart__image">
							<a href="<?php echo esc_url($product_permalink); ?>">
								<?php echo $thumbnail; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped 
								?>
							</a>
						</div>

						<div>
							<div class="mini-cart__title">
								<?php echo wp_kses_post($product_name) ?>
							</div>

							<div class="mini-cart__subtitle">
								<?php echo wc_get_formatted_cart_item_data($cart_item); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped 
								?>
							</div>
							<div class="mini-cart__qty">
								<?php
								if ($_product->is_sold_individually()) {
									$product_quantity = sprintf('1 <input type="hidden" name="cart[%s][qty]" value="1" />', $cart_item_key);
								} else {
									$product_quantity = woocommerce_quantity_input(
										array(
											'input_name'   => "cart[{$cart_item_key}][qty]",
											'input_value'  => $cart_item['quantity'],
											'max_value'    => $_product->get_max_purchase_quantity(),
											'min_value'    => '1',
											'product_name' => $_product->get_name(),
										),
										$_product,
										false
									);
								}
								echo apply_filters('woocommerce_cart_item_quantity', $product_quantity, $cart_item_key, $cart_item); // PHPCS: XSS ok.
								?>
								<?php /*
								<div class="mini-cart__price" data-price="<?php echo $_product->get_price(); ?>">
									<?php echo wc_price($_product->get_price() * $cart_item['quantity']); ?>
								</div>
								*/ ?>
								<?php if ( $price_html = $_product->get_price_html() ) : ?>
									<div class="mini-cart__price"><?php echo $price_html; ?></div>
								<?php endif; ?>
							</div>
						</div>

						<div>
							<div class="mini-cart__remove">
								<?php
								echo apply_filters( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
									'woocommerce_cart_item_remove_link',
									sprintf(
										'<a href="%s" class="remove remove_from_cart_button" aria-label="%s" data-product_id="%s" data-cart_item_key="%s" data-product_sku="%s">
									<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
												viewBox="0 0 24 24" style="enable-background:new 0 0 24 24;" xml:space="preserve">
										<g>
											<path d="M3.9,21c-0.2,0-0.5-0.1-0.6-0.3c-0.3-0.3-0.3-0.9,0-1.2L19.5,3.3c0.3-0.3,0.9-0.3,1.2,0c0.3,0.3,0.3,0.9,0,1.2L4.5,20.7
												C4.3,20.9,4.1,21,3.9,21z"/>
										</g>
										<g>
											<path d="M20.1,21c-0.2,0-0.5-0.1-0.6-0.3L3.3,4.5c-0.3-0.3-0.3-0.9,0-1.2s0.9-0.3,1.2,0l16.2,16.2c0.3,0.3,0.3,0.9,0,1.2
												C20.6,20.9,20.3,21,20.1,21z"/>
										</g>
									</svg>
								</a>',
										esc_url(wc_get_cart_remove_url($cart_item_key)),
										esc_attr__('Remove this item', 'woocommerce'),
										esc_attr($product_id),
										esc_attr($cart_item_key),
										esc_attr($_product->get_sku())
									),
									$cart_item_key
								);
								?>
							</div>


						</div>
					</div>
				</div>

		<?php
			}
		}

		do_action('woocommerce_mini_cart_contents');
		?>
	</div>


	<div class="mini-cart__actions">

		<div class="mini-cart__total">
			<?php
			/**
			 * Hook: woocommerce_widget_shopping_cart_total.
			 *
			 * @hooked woocommerce_widget_shopping_cart_subtotal - 10
			 */
			do_action('woocommerce_widget_shopping_cart_total');
			?>
		</div>
		<div class="mini-cart__buttons">
			<?php do_action('woocommerce_widget_shopping_cart_before_buttons'); ?>

			<?php do_action('woocommerce_widget_shopping_cart_buttons'); ?>
		</div>
	</div>
	<?php do_action('woocommerce_widget_shopping_cart_after_buttons'); ?>

<?php else : ?>
	<style>
		@media (max-width: 767px) {
			.cart-btn {
				opacity: 0;
			}
		}
	</style>
	<p class="woocommerce-mini-cart__empty-message"><?php esc_html_e('No products in the cart.', 'woocommerce'); ?></p>

<?php endif; ?>