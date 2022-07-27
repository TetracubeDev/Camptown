<?php

/**
 * Email Order Items
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/emails/email-order-items.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates\Emails
 * @version 3.7.0
 */

defined('ABSPATH') || exit;

$text_align  = is_rtl() ? 'right' : 'left';
$margin_side = is_rtl() ? 'left' : 'right';

$delivery_methods_info = $order->get_meta('delivery_methods_info');
$delivery_methods_info = (!empty($delivery_methods_info)) ? json_decode($delivery_methods_info, true) : array();
?>

<?php 
foreach ($items as $item_id => $item) :
	$product       = $item->get_product();
	$sku           = '';
	$purchase_note = '';
	$image         = '';

	if (!apply_filters('woocommerce_order_item_visible', true, $item)) {
		continue;
	}

	if (is_object($product)) {
		$sku           = $product->get_sku();
		$purchase_note = $product->get_purchase_note();
		$image         = $product->get_image($image_size);
	}

    foreach ($delivery_methods_info as $key => $delivery_info) {
        if ($key == $item->get_product_id()) {
           $shipping_cost = $delivery_info['cost'];
           $shipping_method = $delivery_info['del_name'];
           $shipping_desc = $delivery_info['desc'];
        }
    }
?>
	<tr class="<?php echo esc_attr(apply_filters('woocommerce_order_item_class', 'order_item', $item, $order)); ?>" style="  ">
		<td class="td has-image" style=" padding: 15px 0px 15px 5px; text-align:<?php echo esc_attr($text_align); ?>; vertical-align: middle; font-family:  Arial, sans-serif; word-wrap:break-word; border: none; border-bottom: 1px solid rgb(241,241,241);">
			<div style="display: flex; align-items: center;">


				<?php

				// Show title/image etc.
				if ($show_image) {
					echo '<div class="image-wrap" style=" align-items: center;">';

					echo wp_kses_post(apply_filters('woocommerce_order_item_thumbnail', $image, $item));
					echo	'</div>';
				}

				// Product name.
				echo '<span class="item_name" style=" display: inline-flex; align-items: center;">';
				echo wp_kses_post(apply_filters('woocommerce_order_item_name', $item->get_name(), $item, false));
				echo '</span>';
				// SKU.
				if ($show_sku && $sku) {
					echo wp_kses_post(' (#' . $sku . ')');
				}

				// allow other plugins to add additional product information here.
				do_action('woocommerce_order_item_meta_start', $item_id, $item, $order, $plain_text);

				wc_display_item_meta(
					$item,
					array(
						'label_before' => '<strong class="wc-item-meta-label" style="float: ' . esc_attr($text_align) . '; margin-' . esc_attr($margin_side) . ': .25em; clear: both">',
					)
				);

				// allow other plugins to add additional product information here.
				do_action('woocommerce_order_item_meta_end', $item_id, $item, $order, $plain_text);

				?>
			</div>
		</td>
		<td class="td" style="font-size: 16px;  font-family: Arial; color: rgb(1, 2, 1); line-height: 1.2; padding: 15px 5px; text-align:<?php echo esc_attr($text_align); ?>; vertical-align:middle;   border: none; border-bottom: 1px solid rgb(241,241,241);">
			<?php
			$qty          = $item->get_quantity();
			$refunded_qty = $order->get_qty_refunded_for_item($item_id);

			if ($refunded_qty) {
				$qty_display = '<del>' . esc_html($qty) . '</del> <ins>' . esc_html($qty - ($refunded_qty * -1)) . '</ins>';
			} else {
				$qty_display = esc_html($qty);
			}
			echo wp_kses_post(apply_filters('woocommerce_email_order_item_quantity', $qty_display, $item));
			?>
		</td>
		<td class="td" style="font-size: 16px;  font-family: Arial; color: rgb(1, 2, 1); line-height: 1.2;padding: 15px 5px; text-align:<?php echo esc_attr($text_align); ?>; vertical-align:middle;   border: none; border-bottom: 1px solid rgb(241,241,241);">
			<?php echo wp_kses_post($order->get_formatted_line_subtotal($item)); ?>
		</td>
		<td style="font-size: 16px;  font-family: Arial; color: rgb(1, 2, 1); line-height: 1.2; padding: 15px 5px; text-align:<?php echo esc_attr($text_align); ?>; vertical-align:middle;   border: none; border-bottom: 1px solid rgb(241,241,241);">
			<span><strong><?php echo $shipping_method; ?></strong>: <?php echo $shipping_cost; ?></span><br><span><?php echo $shipping_desc; ?></span>
		</td>
	</tr>
	<?php

	if ($show_purchase_note && $purchase_note) {
	?>
		<tr>
			<td colspan="3" style="font-size: 16px;  font-family: Arial; color: rgb(1, 2, 1); line-height: 1.2;padding: 15px 5px; text-align:<?php echo esc_attr($text_align); ?>; vertical-align:middle; ">
				<?php
				echo wp_kses_post(wpautop(do_shortcode($purchase_note)));
				?>
			</td>
		</tr>
	<?php
	}
	?>
	
<?php endforeach; ?>
<style>
		.has-image .image-wrap {
			border: 1px solid rgb(228, 228, 228);
			width: 90px;
			height: 90px;
			display: inline-flex;
			margin-left: 15px;

		}

		.image-wrap>img {
			display: block;
			margin: auto;
			width: 60px;
			max-width: 100%;
			max-height: 100%;
		}

		.item_name {
			font-size: 16px;
			font-family: "Arial";
			color: rgb(6, 2, 0);
			font-weight: bold;
			line-height: 1.2;
		}
	</style>