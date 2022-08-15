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
 * @package WooCommerce\Templates
 * @version 3.5.0
 */

if (!defined('ABSPATH')) {
	exit;
}


$user_id = get_current_user_id();
$customer = new WC_Customer($user_id);

?>
<style>
	.defaultBillingAddesses,
	.defaultShippingAddesses {
		display: none;
	}
</style>
<div class="defaultBillingAddesses">
	<span class="firstName"><?php echo $customer->get_billing_first_name(); ?></span>
	<span class="lastName"><?php echo $customer->get_billing_last_name(); ?></span>
	<span class="email"><?php echo $customer->get_email(); ?></span>
	<span class="phone"><?php echo $customer->get_billing_phone(); ?></span>
	<span class="city"><?php echo $customer->get_billing_city(); ?></span>
	<span class="address1"><?php echo $customer->get_billing_address_1(); ?></span>
	<span class="address2"><?php echo $customer->get_billing_address_2(); ?></span>
</div>
<div class="defaultShippingAddesses">
	<span class="firstName"><?php echo $customer->get_shipping_first_name(); ?></span>
	<span class="lastName"><?php echo $customer->get_shipping_last_name(); ?></span>
	<span class="email"><?php echo $customer->get_email(); ?></span>
	<span class="phone"><?php echo $customer->get_shipping_phone(); ?></span>
	<span class="city"><?php echo $customer->get_shipping_city(); ?></span>
	<span class="address1"><?php echo $customer->get_shipping_address_1(); ?></span>
	<span class="address2"><?php echo $customer->get_shipping_address_2(); ?></span>
</div>

<style>
	#billing_country_field,
	#shipping_country_field {
		display: none;
	}

	.woocommerce-billing-fields__field-wrapper,
	.woocommerce-shipping-fields__field-wrapper {
		display: flex;
		flex-wrap: wrap;
	}



	.form-row label {
		display: none;
	}

	#billing_first_name_field,
	#shipping_first_name_field {
		order: 1;
	}

	#billing_last_name_field,
	#shipping_last_name_field {
		order: 2;
	}

	#billing_email_field,
	#shipping_email_field {
		order: 3;
	}

	#billing_phone_field,
	#shipping_phone_field {
		order: 4;
	}

	#billing_city_field,
	#shipping_city_field {
		order: 5;
	}

	#billing_address_1_field,
	#shipping_address_1_field {
		order: 6;
	}

	#billing_address_2_field,
	#shipping_address_2_field {
		order: 7;
	}

	#billing_address_3_field,
	#shipping_address_3_field {
		order: 8;
	}
</style>




<div class="row">
	<div class="col-12 col-lg-8">

		<h1 class="wc_title"><?php the_title(); ?></h1>


		<div class="interactive-form__step" id="warranty__user-info">
			<ul>
				<li class="check">
					<div class="icon default-icon">
						<img src="/wp-content/themes/camptown/img/personal-white.svg" alt="<?php the_title(); ?>">
					</div>
					<div class="content">
						<div class="num">01</div>
						<div class="text">מילוי פרטים אישיים</div>
					</div>
					<i class="icon-arrow-left"></i>
				</li>
				<li>
					<div class="icon default-icon">
						<img src="/wp-content/themes/camptown/img/delivery-white.svg" alt="<?php the_title(); ?>">
						<img src="/wp-content/themes/camptown/img/delivery-color.svg" alt="<?php the_title(); ?>">
					</div>
					<div class="content">
						<div class="num">02</div>
						<div class="text">בחירת משלוח ואיסוף</div>
					</div>
					<i class="icon-arrow-left"></i>
				</li>
				<li>
					<div class="icon default-icon">
						<img src="/wp-content/themes/camptown/img/address-white.svg" alt="<?php the_title(); ?>">
						<img src="/wp-content/themes/camptown/img/address-color.svg" alt="<?php the_title(); ?>">
					</div>
					<div class="content">
						<div class="num">03</div>
						<div class="text">פרטי משלוח</div>
					</div>
					<i class="icon-arrow-left"></i>
				</li>
				<li>
					<div class="icon default-icon">
						<img src="/wp-content/themes/camptown/img/payment-white.svg" alt="<?php the_title(); ?>">
						<img src="/wp-content/themes/camptown/img/payment-color.svg" alt="<?php the_title(); ?>">
					</div>
					<div class="content">
						<div class="num">04</div>
						<div class="text">תשלום</div>
					</div>

				</li>
			</ul>
		</div>

		<div class="checkout-interactive-form">
			<?php if (is_user_logged_in()) { ?>
				<div class="helloMessage">
					שלום, <? echo $customer->get_billing_first_name(); ?>!
				</div>
			<?php } ?>

			<?php global $woocommerce;

			if (empty($woocommerce->cart->applied_coupons)) { ?>

				<div class="toggless">
					<div class="toggless__item">
						<div class="toggless__title ">
							<div class="toggless__icon default-icon">
								<i class="icon-coupon"></i>
							</div>
							מימוש קופון
							<i class="icon-plus"></i>
						</div>
						<div class="toggless__content">
							<div class="custom-coupon__inner">

								<input type="text" class="coopon-inp" placeholder="קוד קופון">
								<div class="custom-coupon__btn btn site-color-btn">החל</div>
							</div>
							<div class="cart-discount error"> הזן קוד הנחה תקף </div>
							<?php foreach (WC()->cart->get_coupons() as $code => $coupon) : ?>
								<div class="cart-discount coupon-<?php echo esc_attr(sanitize_title($code)); ?>">
									<div><?php /* wc_cart_totals_coupon_label($coupon); */ ?></div>
									<div data-title="<?php echo esc_attr(wc_cart_totals_coupon_label($coupon, false)); ?>">הסכום שחסכת בקנייה זו <?php wc_cart_totals_coupon_html($coupon); ?></div>
								</div>
							<?php endforeach;   ?>
							<?php do_action('woocommerce_cart_totals_before_order_total'); ?>
						</div>
					</div>
				</div>

			<?php } ?>


			<div class="toggless <?php if (is_user_logged_in()) {
										echo 'hidden';
									} ?>">
				<div class="toggless__item">
					<div class="toggless__title ">
						<div class="toggless__icon default-icon">
							01
						</div>
						מילוי פרטים אישיים
						<i class="icon-plus"></i>
					</div>
					<div class="toggless__content">

						<?php

						do_action('woocommerce_before_checkout_form', $checkout);

						// If checkout registration is disabled and not logged in, the user cannot checkout.
						if (!$checkout->is_registration_enabled() && $checkout->is_registration_required() && !is_user_logged_in()) {
							echo esc_html(apply_filters('woocommerce_checkout_must_be_logged_in_message', __('You must be logged in to checkout.', 'woocommerce')));
							return;
						}

						?>


					</div>
				</div>
			</div>

			<form name="checkout" method="post" class="checkout woocommerce-checkout" action="<?php echo esc_url(wc_get_checkout_url()); ?>" enctype="multipart/form-data">
				<div class="toggless delivery-block">
					<div class="toggless__item">
						<div class="toggless__title in">
							<div class="toggless__icon default-icon">
								<?php if (!is_user_logged_in()) {
									echo '02';
								} else {
									echo '01';
								} ?>
							</div>
							בחירת משלוח ואיסוף
							<i class="icon-plus"></i>
						</div>
						<div class="toggless__content">
							<div class="custom-shipping-methods">
								<?php if (WC()->cart->needs_shipping() && WC()->cart->show_shipping()) : ?>
									<?php do_action('woocommerce_review_order_before_shipping'); ?>
									<?php wc_cart_totals_shipping_html(); ?>
									<?php do_action('woocommerce_review_order_after_shipping'); ?>
								<?php endif; ?>






							</div>

							<div id="my_shipping_method_value"></div>



							<?php
							foreach (WC()->cart->get_cart() as $cart_item) {

								$item_name = $cart_item['data']->get_title();
								echo '<div class="shipping-product-name"> ' . $item_name . ' </div>';
								$item_id = $cart_item['product_id'];

								if (have_rows('deliveries', $item_id)) : ?>
									<ul class="my_shipping_method">
										<?php while (have_rows('deliveries', $item_id)) : the_row();

										?>
											<li data-name="<?= $item_name ?>">
												<input name="my_shipping_method-<?php echo $item_id; ?>" <?php if (get_row_index() == 1) {
																												echo "checked";
																											} ?> data-cost="<?php the_sub_field('cost'); ?>" data-id="<?= $item_id; ?>" type="radio" value="<?php the_sub_field('id'); ?>" id="product-<?php echo $item_id; ?>-shipping-<?php the_sub_field('id'); ?>">
												<label for="product-<?php echo $item_id; ?>-shipping-<?php the_sub_field('id'); ?>">
													<strong><?php the_sub_field('name'); ?></strong>: <span class="price">₪ <?php the_sub_field('cost'); ?></span>
												</label>
												<div class="shipping_method_description"><small class="smdfw"> זמן אספקה: <?php the_sub_field('days'); ?> ימי עסקים </small></div>
											</li>
										<?php endwhile; ?>

										<li data-name="<?= $item_name ?>">
											<input name="my_shipping_method-<?php echo $item_id; ?>" data-cost="0.001" data-id="<?= $item_id; ?>" type="radio" value="local" id="product-<?php echo $item_id; ?>-shipping-local">
											<label for="product-<?php echo $item_id; ?>-shipping-local">
												<strong>איסוף מקומי</strong>: <span class="price">₪ 0</span>
											</label>
											<div class="shipping_method_description"><small class="smdfw">0 ימים</small></div>
										</li>
									</ul>

							<?php endif;
							}

							?>
							<input type="hidden" name="shipping_method_description-value" id="shipping_method_description-value">
							<input type="hidden" name="shipping_method_description-id" id="shipping_method_description-id">

							<script>
								let radios = document.querySelectorAll('.toggless__content>ul [type=radio]')

								if (radios.length) {
									for (const r of radios) {
										r.addEventListener('change', () => get_my_shipping_method())
									}
								}
								get_my_shipping_method()


								function get_my_shipping_method() {
									let result_str = ''
									let result_id = {

									};
									let methods = document.querySelectorAll('.toggless__content>ul ')
									let data_stor = document.querySelector('#shipping_method_description-value')
									let data_stor_id = document.querySelector('#shipping_method_description-id')

									if (methods.length) {
										for (const m of methods) {

											let label = m.querySelector('input:checked + label strong').innerText
											let price = m.querySelector('input:checked + label .price').innerText
											let desc = m.querySelector('input:checked + label + .shipping_method_description small').innerText
											let input = m.querySelector('input:checked')
											let name = m.querySelector('li').getAttribute('data-name')

											if (input && input.checked && desc && label) {
												//	debugger

												let id = input.value
												let product_id = input.getAttribute('data-id')
												let cost = input.getAttribute('data-cost')
												result_str += `<div>${name}</div>`
												result_str += '<div><strong>' + label + '</strong>: ' + price + '</div><div>'
												result_str += desc + '</div><br>'

												result_id[product_id] = {
													id,
													name,
													cost,
													desc,
													del_name: label
												};
											}
										}
										data_stor_id.value = JSON.stringify(result_id)
										data_stor.value = result_str
										//console.log(JSON.stringify(result_str))
										//console.log(JSON.stringify(result_id))
									}


								}
							</script>



							<div class="text-left">
								<span class="btn site-color-btn custom-shipping-methods__btn">המשך</span>
							</div>
						</div>
					</div>
				</div>


				<div class="toggless">
					<div class="toggless__item">
						<div class="toggless__title ">
							<div class="toggless__icon default-icon">
								<?php if (!is_user_logged_in()) {
									echo '03';
								} else {
									echo '02';
								} ?>
							</div>
							פרטי משלוח
							<i class="icon-plus"></i>
						</div>
						<div class="toggless__content" <?php if (!is_user_logged_in()) {
															echo 'style="display: none;"';
														} ?>>

							<?php if ($checkout->get_checkout_fields()) : ?>

								<?php do_action('woocommerce_checkout_before_customer_details'); ?>
								<div id="customer_details">

									<?php do_action('woocommerce_checkout_billing'); ?>
									<?php do_action('woocommerce_checkout_shipping'); ?>
									<?php do_action('woocommerce_checkout_after_customer_details'); ?>
								</div>

							<?php endif; ?>

							<div class="text-left">
								<span class="btn site-color-btn custom-shipping-methods__btn" id="custom-shipping-methods__btn_3">המשך</span>
							</div>
						</div>
					</div>
				</div>

				<div class="toggless">
					<div class="toggless__item">
						<div class="toggless__title">
							<div class="toggless__icon default-icon">
								<?php if (!is_user_logged_in()) {
									echo '04';
								} else {
									echo '03';
								} ?>
							</div>
							תשלום
							<i class="icon-plus"></i>
						</div>
						<div class="toggless__content">

							<?php do_action('payment_block', $checkout); ?>

						</div>
					</div>
				</div>

				<?php do_action('woocommerce_after_checkout_form', $checkout); ?>

			</form>

		</div>



	</div>

	<div class="col-12 col-lg-4">
		<?php do_action('woocommerce_checkout_before_order_review_heading'); ?>

		<?php do_action('woocommerce_checkout_before_order_review'); ?>

		<div id="order_review" class="cart-block woocommerce-checkout-review-order">
			<div class="cart_totals">
				<div class="cart-block__title">
					סיכום הקנייה
				</div>
			</div>


			<?php do_action('woocommerce_checkout_order_review'); ?>

		</div>

		<?php do_action('woocommerce_checkout_after_order_review'); ?>

	</div>







</div>



<script>
	jQuery(document).ready(function($) {
		$('#billing_city, #shipping_city').select2({
			//minimumResultsForSearch: -1
		});


		$('.newAccFName').on('input', function() {
			let val = $(this).val()
			$('#billing_first_name').val(val)
		})
		$('.newAccLName').on('input', function() {
			let val = $(this).val()
			$('#billing_last_name').val(val)
		})
		$('.newAccLEmail').on('input', function() {
			let val = $(this).val()
			$('#billing_email').val(val)
		})
		$('.newAccLTel').on('input', function() {
			let val = $(this).val()
			$('#billing_phone').val(val)
		})


		$("#create-user").change(function() {
			if(this.checked) {
				$( "#createaccount" ).prop( "checked", true );
				$( ".passMask" ).slideDown(300);
				$( ".create-account" ).slideDown(300);
			} else {
				$( "#createaccount" ).prop( "checked", false );
				$( ".passMask" ).slideUp(300);
				$( ".create-account" ).slideUp(300);
			}
		});



		$(document).ajaxComplete(function() {
			var shippingCost = $('#shipping_method input:checked + label .amount').text();
			if (shippingCost) {
				$('.shippingCost').html(shippingCost);
			} else {
				$('.shippingCost').html('0 ₪');
			}
			$('#billing_city, #shipping_city').select2({
				//minimumResultsForSearch: -1
			});





		});



		$(document).ajaxComplete(function() {
			jQuery( 'html, body' ).stop();
		});

		$( document.body ).on( 'checkout_error', ()=>{
			setTimeout(() => {
				if ($('.woocommerce-NoticeGroup').length) {
					$('.woocommerce-NoticeGroup').insertAfter('.interactive-form__step')//where you want to place it
				}

				$('html, body').animate({
					scrollTop: $(".interactive-form__step").offset().top
				}, 1000);
			}, 0);
		} );



	});
</script>
