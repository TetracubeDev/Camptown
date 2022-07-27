<?php

/**
 * Order details table shown in emails.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/emails/email-order-details.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates\Emails
 * @version 3.7.0
 */

defined('ABSPATH') || exit;

$text_align = is_rtl() ? 'right' : 'left';

//do_action( 'woocommerce_email_before_order_table', $order, $sent_to_admin, $plain_text, $email ); 


?>

<h2>
	<?php
	if ($sent_to_admin && false) {
		$before = '<a class="link" href="' . esc_url($order->get_edit_order_url()) . '">';
		$after  = '</a>';
	} else {
		$before = '';
		$after  = '';
	}
	/* translators: %s: Order ID. */
	//	echo wp_kses_post( $before . sprintf( __( '[Order #%s]', 'woocommerce' ) . $after . ' (<time datetime="%s">%s</time>)', $order->get_order_number(), $order->get_date_created()->format( 'c' ), wc_format_datetime( $order->get_date_created() ) ) );
	?>

</h2>

<div class="email__middle">
	<div class="email__middle-item">
		<span>מספר הזמנה: </span><strong>#<?= $order->get_order_number() ?></strong>
	</div>
	<div class="email__middle-item">
		<span>התקבלה בתאריך: </span><strong><?= $order->get_date_created()->format('d F Y') ?></strong>
	</div>
</div>
<div style="margin: 0 40px 20px;">
	<table class="td" cellspacing="0" cellpadding="6" style="width: 100%; font-family: 'Arial, sans-serif'; border:none">
		<thead>
			<tr>
				<th class="td" scope="col" style=" font-family: Arial, sans-serif; color:rgb(10, 10, 10); font-size: 16px; font-weight: bold; border: none; border-bottom: 1px solid rgba(10,10,10, 0.4); text-align:<?php echo esc_attr($text_align); ?>;"><?php esc_html_e('Product', 'woocommerce'); ?></th>
				<th class="td" scope="col" style=" font-family: Arial, sans-serif; color:rgb(10, 10, 10); font-size: 16px; font-weight: bold; border: none; border-bottom: 1px solid rgba(10,10,10, 0.4); text-align:<?php echo esc_attr($text_align); ?>;"><?php esc_html_e('Quantity', 'woocommerce'); ?></th>
				<th class="td" scope="col" style=" font-family: Arial, sans-serif; color:rgb(10, 10, 10); font-size: 16px; font-weight: bold; border: none; border-bottom: 1px solid rgba(10,10,10, 0.4); text-align:<?php echo esc_attr($text_align); ?>;"><?php esc_html_e('Price', 'woocommerce'); ?></th>
				<th class="td" scope="col" style=" font-family: Arial, sans-serif; color:rgb(10, 10, 10); font-size: 16px; font-weight: bold; border: none; border-bottom: 1px solid rgba(10,10,10, 0.4); text-align:<?php echo esc_attr($text_align); ?>;"><?php esc_html_e('Shipping', 'woocommerce'); ?></th>
			</tr>
		</thead>
		<tbody>
			<?php
			echo wc_get_email_order_items( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				$order,
				array(
					'show_sku'      => $sent_to_admin,
					'show_image'    => true,
					'image_size'    => array(32, 32),
					'plain_text'    => $plain_text,
					'sent_to_admin' => $sent_to_admin,
				)
			);
			?>
		</tbody>
	</table>
	<div class="order__info-bottom" style="text-align:<?php echo esc_attr($text_align); ?>;">
		<div class="order__info-item">
			<?php
			$item_totals = $order->get_order_item_totals();
			$order_data = $order->get_data();


			if ($item_totals) {
				$i = 0;
				foreach ($item_totals as $total) {
					$i++;
			?>

					<div class="order__info-row">
						<div class="order__info-title">
							<?php echo wp_kses_post($total['label']); ?>
						</div>
						<div class="order__info-description">
							<?php echo wp_kses_post($total['value']); ?>
						</div>
					</div>

				<?php
				}
			}
			if ($order->get_customer_note()) {
				?>
				<div class="order__info-row">
					<div class="order__info-title">
						<?php esc_html_e('Note:', 'woocommerce'); ?>
					</div>
					<div class="order__info-description">
						<?php echo wp_kses_post(nl2br(wptexturize($order->get_customer_note()))); ?>
					</div>
				</div>
			<?php
			}
			?>


		</div>
		<div class="order__info-item">
			<h3 class="order__heading">כתובת לאספקה:</h3>
			<div class="order__info-row">
				<?php if (!empty($f_name = $order->get_billing_first_name())) { ?>
					<div class="order__info-title w100">
						<?php echo $f_name; ?>
					</div>
				<?php } ?>

				<?php if (!empty($l_name = $order->get_billing_last_name())) { ?>
					<div class="order__info-title w100">
						<?php echo $l_name; ?>
					</div>
				<?php } ?>

				<?php if (!empty($phone=$order->get_billing_phone())) { ?>
					<div class="order__info-title w100">
						<?php echo $order->get_billing_phone() ?>
					</div>
				<?php } ?>

				<?php if (!empty($city = $order->get_billing_city())) { ?>
					<div class="order__info-title w100">
						<?php echo $city; ?>
					</div>
				<?php } ?>

				<?php if (!empty($add_1 = $order->get_billing_address_1())) { ?>
					<div class="order__info-title w100">
						<?php echo $add_1; ?>
					</div>
				<?php } ?>

				<?php if (!empty($add_2 = $order->get_billing_address_2())) { ?>
				<div class="order__info-title w100">
					<?php echo $add_2; ?>
				</div>
				<?php } ?>

				<?php if (!empty($add_3 = $order->get_meta('billing_address_3'))) { ?>
					<div class="order__info-title w100">
						<?php echo $add_3; ?>
					</div>
				<?php } ?>

				

				
			</div>


			
				<hr>
				<h3 class="order__heading"><?php esc_html_e( 'Shipping address', 'woocommerce' ); ?>:</h3>
				<div class="order__info-row">
					<?php if (!empty($f_name = $order->get_shipping_first_name())) { ?>
						<div class="order__info-title w100">
							<?php echo $f_name; ?>
						</div>
					<?php } ?>

					<?php if (!empty($l_name = $order->get_shipping_last_name())) { ?>
						<div class="order__info-title w100">
							<?php echo $l_name; ?>
						</div>
					<?php } ?>

					<?php if (!empty($phone=$order->get_shipping_phone())) { ?>
						<div class="order__info-title w100">
							<?php echo $order->get_shipping_phone() ?>
						</div>
					<?php } ?>

					<?php if (!empty($city = $order->get_shipping_city())) { ?>
						<div class="order__info-title w100">
							<?php echo $city; ?>
						</div>
					<?php } ?>

					<?php if (!empty($add_1 = $order->get_shipping_address_1())) { ?>
						<div class="order__info-title w100">
							<?php echo $add_1; ?>
						</div>
					<?php } ?>

					<?php if (!empty($add_2 = $order->get_shipping_address_2())) { ?>
						<div class="order__info-title w100">
							<?php echo $add_2; ?>
						</div>
					<?php } ?>

					<?php if (!empty($add_3 = $order->get_meta('shipping_address_3'))) { ?>
						<div class="order__info-title w100">
							<?php echo $add_3; ?>
						</div>
					<?php } ?>

					
				</div>


		</div>
	</div>
	<?php if (false) { ?>
		<tfoot>
			<?php
			$item_totals = $order->get_order_item_totals();

			if ($item_totals) {
				$i = 0;
				foreach ($item_totals as $total) {
					$i++;
			?>
					<tr>
						<th class="td" scope="row" colspan="2" style="text-align:<?php echo esc_attr($text_align); ?>; <?php echo (1 === $i) ? 'border-top-width: 4px;' : ''; ?>"><?php echo wp_kses_post($total['label']); ?></th>
						<td class="td" style="text-align:<?php echo esc_attr($text_align); ?>; <?php echo (1 === $i) ? 'border-top-width: 4px;' : ''; ?>"><?php echo wp_kses_post($total['value']); ?></td>
					</tr>
				<?php
				}
			}
			if ($order->get_customer_note()) {
				?>
				<tr>
					<th class="td" scope="row" colspan="2" style="text-align:<?php echo esc_attr($text_align); ?>;"><?php esc_html_e('Note:', 'woocommerce'); ?></th>
					<td class="td" style="text-align:<?php echo esc_attr($text_align); ?>;"><?php echo wp_kses_post(nl2br(wptexturize($order->get_customer_note()))); ?></td>
				</tr>
			<?php
			}
			?>
		</tfoot>
	<?php } ?>
</div>

<style>
	.order__heading {
		font-size: 16px;
		font-family: "Arial";
		color: rgb(10, 10, 10);
		font-weight: bold;
		margin: 1px 0 3px;

	}


	.order__info-item {
		padding: 15px 0;
		border-bottom: 1px solid rgb(241, 241, 241);
		;
	}

	.order__info-item:first-child {

		/* 	border-top: 1px solid rgb(241,241,241);; */
	}

	.order__info-item:last-child {

		border-bottom: none;
	}

	.w100 {
		width: 100%;
	}

	.order__info-title {
		display: inline-flex;
		font-size: 16px;
		font-family: "Arial";
		color: rgb(10, 10, 10);
		line-height: 1.438;
	}

	.order__info-description {
		font-size: 16px;
		font-family: "Arial";
		color: rgb(10, 10, 10);
		line-height: 1.438;
		display: inline-flex;
		font-weight: 700;
	}
</style>
<?php do_action('woocommerce_email_after_order_table', $order, $sent_to_admin, $plain_text, $email); ?>