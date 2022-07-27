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
	.defaultBillingAddesses, .defaultShippingAddesses {
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
						<div class="toggless__title">
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


			<div class="toggless <?php if (is_user_logged_in()) { echo 'hidden'; }?>" >
				<div class="toggless__item">
					<div class="toggless__title in">
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
				<div class="toggless">
					<div class="toggless__item">
						<div class="toggless__title">
							<div class="toggless__icon default-icon">
								<?php if (!is_user_logged_in()) { echo '02'; } else { echo '01'; } ?>
							</div>
							בחירת משלוח ואיסוף
							<i class="icon-plus"></i>
						</div>
						<div class="toggless__content" style="display: none;">
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
												<input name="my_shipping_method-<?php echo $item_id; ?>" <?php if (get_row_index() == 1 ) {echo "checked";} ?> data-cost="<?php the_sub_field('cost'); ?>" data-id="<?= $item_id; ?>" type="radio" value="<?php the_sub_field('id'); ?>" id="product-<?php echo $item_id; ?>-shipping-<?php the_sub_field('id'); ?>">
												<label for="product-<?php echo $item_id; ?>-shipping-<?php the_sub_field('id'); ?>">
													<strong><?php the_sub_field('name'); ?></strong>: <span class="price">₪ <?php the_sub_field('cost'); ?></span>
												</label>
												<div class="shipping_method_description"><small class="smdfw"> זמן אספקה: <?php the_sub_field('days'); ?> ימי עסקים </small></div>
											</li>
										<?php endwhile; ?>

										<li data-name="<?= $item_name ?>">
											<input name="my_shipping_method-<?php echo $item_id; ?>" data-cost="0.001" data-id="<?= $item_id; ?>" type="radio" value="local" id="product-<?php echo $item_id; ?>-shipping-local">
											<label for="product-<?php echo $item_id; ?>-shipping-local">
												<strong>Local Pickup</strong>: <span class="price">₪ 0</span>
											</label>
											<div class="shipping_method_description"><small class="smdfw">0 Days</small></div>
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
												result_str += '<div><strong>' + label + '</strong>: '+ price +'</div><div>'												
												result_str += desc + '</div><br>'

												result_id[product_id] = {id,name,cost,desc,del_name: label};
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
								<span class="btn site-color-btn custom-shipping-methods__btn" >המשך</span>
							</div>
						</div>
					</div>
				</div>


				<div class="toggless">
					<div class="toggless__item">
						<div class="toggless__title <?php if (is_user_logged_in()) { echo 'in'; } ?>">
							<div class="toggless__icon default-icon">
								<?php if (!is_user_logged_in()) { echo '03'; } else { echo '02'; } ?>
							</div>
							פרטי משלוח
							<i class="icon-plus"></i>
						</div>
						<div class="toggless__content" <?php if (!is_user_logged_in()) { echo 'style="display: none;"'; } ?>>

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
								<?php if (!is_user_logged_in()) { echo '04'; } else { echo '03'; } ?>
							</div>
							תשלום
							<i class="icon-plus"></i>
						</div>
						<div class="toggless__content" style="display: none;">

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

		$('body').on('updated_checkout', function() {


		});


		
	});
</script>


<!-- <script>

	let checout_script=document.querySelector('.wc-checkout-js')
	if (checout_script) {
		checout_script.remove()
	}
	jQuery(function(g) {
		if ("undefined" == typeof wc_checkout_params) return !1;
		var f = {
				updateTimer: !(g.blockUI.defaults.overlayCSS.cursor = "default"),
				dirtyInput: !1,
				selectedPaymentMethod: !1,
				xhr: !1,
				$order_review: g("#order_review"),
				$checkout_form: g("form.checkout"),
				init: function() {
					g(document.body).on("update_checkout", this.update_checkout), g(document.body).on("init_checkout", this.init_checkout), this.$checkout_form.on("click", 'input[name="payment_method"]', this.payment_method_selected), g(document.body).hasClass("woocommerce-order-pay") && (this.$order_review.on("click", 'input[name="payment_method"]', this.payment_method_selected), this.$order_review.on("submit", this.submitOrder), this.$order_review.attr("novalidate", "novalidate")), this.$checkout_form.attr("novalidate", "novalidate"), this.$checkout_form.on("submit", this.submit), this.$checkout_form.on("input validate change", ".input-text, select, input:checkbox", this.validate_field), this.$checkout_form.on("update", this.trigger_update_checkout), this.$checkout_form.on("change", 'select.shipping_method, input[name^="shipping_method"], #ship-to-different-address input, .update_totals_on_change select, .update_totals_on_change input[type="radio"], .update_totals_on_change input[type="checkbox"]', this.trigger_update_checkout), this.$checkout_form.on("change", ".address-field select", this.input_changed), this.$checkout_form.on("change", ".address-field input.input-text, .update_totals_on_change input.input-text", this.maybe_input_changed), this.$checkout_form.on("keydown", ".address-field input.input-text, .update_totals_on_change input.input-text", this.queue_update_checkout), this.$checkout_form.on("change", "#ship-to-different-address input", this.ship_to_different_address), this.$checkout_form.find("#ship-to-different-address input").trigger("change"), this.init_payment_methods(), "1" === wc_checkout_params.is_checkout && g(document.body).trigger("init_checkout"), "yes" === wc_checkout_params.option_guest_checkout && g("input#createaccount").on("change", this.toggle_create_account).trigger("change")
				},
				init_payment_methods: function() {
					var e = g(".woocommerce-checkout").find('input[name="payment_method"]');
					1 === e.length && e.eq(0).hide(), f.selectedPaymentMethod && g("#" + f.selectedPaymentMethod).prop("checked", !0), 0 === e.filter(":checked").length && e.eq(0).prop("checked", !0);
					var t = e.filter(":checked").eq(0).prop("id");
					1 < e.length && g('div.payment_box:not(".' + t + '")').filter(":visible").slideUp(0), e.filter(":checked").eq(0).trigger("click")
				},
				get_payment_method: function() {
					return f.$checkout_form.find('input[name="payment_method"]:checked').val()
				},
				payment_method_selected: function(e) {
					e.stopPropagation(), 1 < g(".payment_methods input.input-radio").length ? (t = g("div.payment_box." + g(this).attr("ID")), (e = g(this).is(":checked")) && !t.is(":visible") && (g("div.payment_box").filter(":visible").slideUp(230), e && t.slideDown(230))) : g("div.payment_box").show(), g(this).data("order_button_text") ? g("#place_order").text(g(this).data("order_button_text")) : g("#place_order").text(g("#place_order").data("value"));
					var t = g('.woocommerce-checkout input[name="payment_method"]:checked').attr("id");
					t !== f.selectedPaymentMethod && g(document.body).trigger("payment_method_selected"), f.selectedPaymentMethod = t
				},
				toggle_create_account: function() {
					g("div.create-account").hide(), g(this).is(":checked") && (g("#account_password").val("").trigger("change"), g("div.create-account").slideDown())
				},
				init_checkout: function() {
					g(document.body).trigger("update_checkout")
				},
				maybe_input_changed: function(e) {
					f.dirtyInput && f.input_changed(e)
				},
				input_changed: function(e) {
					f.dirtyInput = e.target, f.maybe_update_checkout()
				},
				queue_update_checkout: function(e) {
					if (9 === (e.keyCode || e.which || 0)) return !0;
					f.dirtyInput = this, f.reset_update_checkout_timer(), f.updateTimer = setTimeout(f.maybe_update_checkout, "1000")
				},
				trigger_update_checkout: function() {
					f.reset_update_checkout_timer(), f.dirtyInput = !1, g(document.body).trigger("update_checkout")
				},
				maybe_update_checkout: function() {
					var e, t = !0;
					!g(f.dirtyInput).length || (e = g(f.dirtyInput).closest("div").find(".address-field.validate-required")).length && e.each(function() {
						"" === g(this).find("input.input-text").val() && (t = !1)
					}), t && f.trigger_update_checkout()
				},
				ship_to_different_address: function() {
					g("div.shipping_address").hide(), g(this).is(":checked") && g("div.shipping_address").slideDown()
				},
				reset_update_checkout_timer: function() {
					clearTimeout(f.updateTimer)
				},
				is_valid_json: function(e) {
					try {
						var t = JSON.parse(e);
						return t && "object" == typeof t
					} catch (o) {
						return !1
					}
				},
				validate_field: function(e) {
					var t = g(this),
						o = t.closest(".form-row"),
						c = !0,
						i = o.is(".validate-required"),
						n = o.is(".validate-email"),
						r = o.is(".validate-phone"),
						a = "",
						e = e.type;
					"input" === e && o.removeClass("woocommerce-invalid woocommerce-invalid-required-field woocommerce-invalid-email woocommerce-invalid-phone woocommerce-validated"), "validate" !== e && "change" !== e || (i && ("checkbox" === t.attr("type") && !t.is(":checked") || "" === t.val()) && (o.removeClass("woocommerce-validated").addClass("woocommerce-invalid woocommerce-invalid-required-field"), c = !1), n && t.val() && ((a = new RegExp(/^([a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+(\.[a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+)*|"((([ \t]*\r\n)?[ \t]+)?([\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*(([ \t]*\r\n)?[ \t]+)?")@(([a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.)+([a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[0-9a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.?$/i)).test(t.val()) || (o.removeClass("woocommerce-validated").addClass("woocommerce-invalid woocommerce-invalid-email woocommerce-invalid-phone"), c = !1)), r && (a = new RegExp(/[\s\#0-9_\-\+\/\(\)\.]/g), 0 < t.val().replace(a, "").length && (o.removeClass("woocommerce-validated").addClass("woocommerce-invalid woocommerce-invalid-phone"), c = !1)), c && o.removeClass("woocommerce-invalid woocommerce-invalid-required-field woocommerce-invalid-email woocommerce-invalid-phone").addClass("woocommerce-validated"))
				},
				update_checkout: function(e, t) {
					f.reset_update_checkout_timer(), f.updateTimer = setTimeout(f.update_checkout_action, "5", t)
				},
				update_checkout_action: function(e) {
					var t, o, c, i, n, r, a, u, d, s, m, l, p, h, _;
					f.xhr && f.xhr.abort(), 0 !== g("form.checkout").length && (e = void 0 !== e ? e : {
						update_shipping_method: !0
					}, a = t = g("#billing_country").val(), u = o = g("#billing_state").val(), d = c = g(":input#billing_postcode").val(), s = i = g("#billing_city").val(), m = n = g(":input#billing_address_1").val(), h = r = g(":input#billing_address_2").val(), l = g(f.$checkout_form).find(".address-field.validate-required:visible"), p = !0, l.length && l.each(function() {
						"" === g(this).find(":input").val() && (p = !1)
					}), g("#ship-to-different-address").find("input").is(":checked") && (a = g("#shipping_country").val(), u = g("#shipping_state").val(), d = g(":input#shipping_postcode").val(), s = g("#shipping_city").val(), m = g(":input#shipping_address_1").val(), h = g(":input#shipping_address_2").val()), !(h = {
						security: wc_checkout_params.update_order_review_nonce,
						payment_method: f.get_payment_method(),
						country: t,
						state: o,
						postcode: c,
						city: i,
						address: n,
						address_2: r,
						s_country: a,
						s_state: u,
						s_postcode: d,
						s_city: s,
						s_address: m,
						s_address_2: h,
						has_full_address: p,
						post_data: g("form.checkout").serialize()
					}) !== e.update_shipping_method && (_ = {}, g('select.shipping_method, input[name^="shipping_method"][type="radio"]:checked, input[name^="shipping_method"][type="hidden"]').each(function() {
						_[g(this).data("index")] = g(this).val()
					}), h.shipping_method = _), g(".woocommerce-checkout-payment, .woocommerce-checkout-review-order-table").block({
						message: null,
						overlayCSS: {
							background: "#fff",
							opacity: .6
						}
					}), f.xhr = g.ajax({
						type: "POST",
						url: wc_checkout_params.wc_ajax_url.toString().replace("%%endpoint%%", "update_order_review"),
						data: h,
						success: function(e) {
							var t, o;
							e && !0 === e.reload ? window.location.reload() : (g(".woocommerce-NoticeGroup-updateOrderReview").remove(), o = g("#terms").prop("checked"), t = {}, g(".payment_box :input").each(function() {
								var e = g(this).attr("id");
								e && (-1 !== g.inArray(g(this).attr("type"), ["checkbox", "radio"]) ? t[e] = g(this).prop("checked") : t[e] = g(this).val())
							}), e && e.fragments && (g.each(e.fragments, function(e, t) {
								f.fragments && f.fragments[e] === t || g(e).replaceWith(t), g(e).unblock()
							}), f.fragments = e.fragments), o && g("#terms").prop("checked", !0), g.isEmptyObject(t) || g(".payment_box :input").each(function() {
								var e = g(this).attr("id");
								e && (-1 !== g.inArray(g(this).attr("type"), ["checkbox", "radio"]) ? g(this).prop("checked", t[e]).trigger("change") : (-1 !== g.inArray(g(this).attr("type"), ["select"]) || null !== g(this).val() && 0 === g(this).val().length) && g(this).val(t[e]).trigger("change"))
							}), e && "failure" === e.result && (o = g("form.checkout"), g(".woocommerce-error, .woocommerce-message").remove(), e.messages ? o.prepend('<div class="woocommerce-NoticeGroup woocommerce-NoticeGroup-updateOrderReview">' + e.messages + "</div>") : o.prepend(e), o.find(".input-text, select, input:checkbox").trigger("validate").trigger("blur"), f.scroll_to_notices()), f.init_payment_methods(), g(document.body).trigger("updated_checkout", [e]))
						}
					}))
				},
				handleUnloadEvent: function(e) {
					return -1 === navigator.userAgent.indexOf("MSIE") && !document.documentMode || (e.preventDefault(), undefined)
				},
				attachUnloadEventsOnSubmit: function() {
					g(window).on("beforeunload", this.handleUnloadEvent)
				},
				detachUnloadEventsOnSubmit: function() {
					g(window).off("beforeunload", this.handleUnloadEvent)
				},
				blockOnSubmit: function(e) {
					1 !== e.data("blockUI.isBlocked") && e.block({
						message: null,
						overlayCSS: {
							background: "#fff",
							opacity: .6
						}
					})
				},
				submitOrder: function() {
					f.blockOnSubmit(g(this))
				},
				submit: function() {
					f.reset_update_checkout_timer();
					var o = g(this);
					return o.is(".processing") || !1 !== o.triggerHandler("checkout_place_order") && !1 !== o.triggerHandler("checkout_place_order_" + f.get_payment_method()) && (o.addClass("processing"), f.blockOnSubmit(o), f.attachUnloadEventsOnSubmit(), g.ajaxSetup({
						dataFilter: function(e, t) {
							if ("json" !== t) return e;
							if (f.is_valid_json(e)) return e;
							t = e.match(/{"result.*}/);
							return null !== t && f.is_valid_json(t[0]) ? (console.log("Fixed malformed JSON. Original:"), console.log(e), e = t[0]) : console.log("Unable to fix malformed JSON"), e
						}
					}), g.ajax({
						type: "POST",
						url: wc_checkout_params.checkout_url,
						data: o.serialize(),
						dataType: "json",
						success: function(e) {
							console.log(e)
							/* f.detachUnloadEventsOnSubmit();
							try {
								if ("success" !== e.result || !1 === o.triggerHandler("checkout_place_order_success", e)) throw "failure" === e.result ? "Result failure" : "Invalid response"; - 1 === e.redirect.indexOf("https://") || -1 === e.redirect.indexOf("http://") ? window.location = e.redirect : window.location = decodeURI(e.redirect)
							} catch (t) {
								if (!0 === e.reload) return void window.location.reload();
								!0 === e.refresh && g(document.body).trigger("update_checkout"), e.messages ? f.submit_error(e.messages) : f.submit_error('<div class="woocommerce-error">' + wc_checkout_params.i18n_checkout_error + "</div>")
							} */
						},
						error: function(e, t, o) {
							//f.detachUnloadEventsOnSubmit(), f.submit_error('<div class="woocommerce-error">' + o + "</div>")
						}
					})), !1
				},
				submit_error: function(e) {
					g(".woocommerce-NoticeGroup-checkout, .woocommerce-error, .woocommerce-message").remove(), f.$checkout_form.prepend('<div class="woocommerce-NoticeGroup woocommerce-NoticeGroup-checkout">' + e + "</div>"), f.$checkout_form.removeClass("processing").unblock(), f.$checkout_form.find(".input-text, select, input:checkbox").trigger("validate").trigger("blur"), f.scroll_to_notices(), g(document.body).trigger("checkout_error", [e])
				},
				scroll_to_notices: function() {
					var e = g(".woocommerce-NoticeGroup-updateOrderReview, .woocommerce-NoticeGroup-checkout");
					e.length || (e = g("form.checkout")), g.scroll_to_notices(e)
				}
			},
			e = {
				init: function() {
					g(document.body).on("click", "a.showcoupon", this.show_coupon_form), g(document.body).on("click", ".woocommerce-remove-coupon", this.remove_coupon), g("form.checkout_coupon").hide().on("submit", this.submit)
				},
				show_coupon_form: function() {
					return g(".checkout_coupon").slideToggle(400, function() {
						g(".checkout_coupon").find(":input:eq(0)").trigger("focus")
					}), !1
				},
				submit: function() {
					var t = g(this);
					if (t.is(".processing")) return !1;
					t.addClass("processing").block({
						message: null,
						overlayCSS: {
							background: "#fff",
							opacity: .6
						}
					});
					var o = {
						security: wc_checkout_params.apply_coupon_nonce,
						coupon_code: t.find('input[name="coupon_code"]').val()
					};
					return g.ajax({
						type: "POST",
						url: wc_checkout_params.wc_ajax_url.toString().replace("%%endpoint%%", "apply_coupon"),
						data: o,
						success: function(e) {
							g(".woocommerce-error, .woocommerce-message").remove(), t.removeClass("processing").unblock(), e && (t.before(e), t.slideUp(), g(document.body).trigger("applied_coupon_in_checkout", [o.coupon_code]), g(document.body).trigger("update_checkout", {
								update_shipping_method: !1
							}))
						},
						dataType: "html"
					}), !1
				},
				remove_coupon: function(e) {
					e.preventDefault();
					var t = g(this).parents(".woocommerce-checkout-review-order"),
						e = g(this).data("coupon");
					t.addClass("processing").block({
						message: null,
						overlayCSS: {
							background: "#fff",
							opacity: .6
						}
					});
					var o = {
						security: wc_checkout_params.remove_coupon_nonce,
						coupon: e
					};
					g.ajax({
						type: "POST",
						url: wc_checkout_params.wc_ajax_url.toString().replace("%%endpoint%%", "remove_coupon"),
						data: o,
						success: function(e) {
							g(".woocommerce-error, .woocommerce-message").remove(), t.removeClass("processing").unblock(), e && (g("form.woocommerce-checkout").before(e), g(document.body).trigger("removed_coupon_in_checkout", [o.coupon_code]), g(document.body).trigger("update_checkout", {
								update_shipping_method: !1
							}), g("form.checkout_coupon").find('input[name="coupon_code"]').val(""))
						},
						error: function(e) {
							wc_checkout_params.debug_mode && console.log(e.responseText)
						},
						dataType: "html"
					})
				}
			},
			t = {
				init: function() {
					g(document.body).on("click", "a.showlogin", this.show_login_form)
				},
				show_login_form: function() {
					return g("form.login, form.woocommerce-form--login").slideToggle(), !1
				}
			},
			o = {
				init: function() {
					g(document.body).on("click", "a.woocommerce-terms-and-conditions-link", this.toggle_terms)
				},
				toggle_terms: function() {
					if (g(".woocommerce-terms-and-conditions").length) return g(".woocommerce-terms-and-conditions").slideToggle(function() {
						var e = g(".woocommerce-terms-and-conditions-link");
						g(".woocommerce-terms-and-conditions").is(":visible") ? (e.addClass("woocommerce-terms-and-conditions-link--open"), e.removeClass("woocommerce-terms-and-conditions-link--closed")) : (e.removeClass("woocommerce-terms-and-conditions-link--open"), e.addClass("woocommerce-terms-and-conditions-link--closed"))
					}), !1
				}
			};
		f.init(), e.init(), t.init(), o.init()
	}); 
</script> -->