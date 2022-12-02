<?php

/**
 * Single Product Image
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/product-image.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.5.1
 */

defined('ABSPATH') || exit;

// Note: `wc_get_gallery_image_html` was added in WC 3.3.2 and did not exist prior. This check protects against theme overrides being used on older versions of WC.
if (!function_exists('wc_get_gallery_image_html')) {
	return;
}

global $product;
$slider_rtl         = ( is_rtl() ) ? 'true' : 'false';
$wrapper_classes = apply_filters( 'woocommerce_single_product_image_gallery_classes', array(
    'woo-product-gallery-slider',
    'woocommerce-product-gallery',
    'wpgs--' . ( has_post_thumbnail() ? 'with-images' : 'without-images' ),
    'images',

) );

?>
<div class="<?php echo esc_attr( implode( ' ', array_map( 'sanitize_html_class', $wrapper_classes ) ) ); ?>" <?php echo esc_attr( $slider_rtl == 'true' ? 'dir=rtl' : '' ); ?> >
    <div class="product-slider">
        <div class="product-slider__inner" onmousemove="zoom(event)" style="background-image: url('<?php echo wp_get_attachment_url($product->get_image_id()); ?>')">
            <div class="woocommerce-product-gallery__image product-slider__image">
                <img src="<?php echo wp_get_attachment_url($product->get_image_id()); ?>" alt="<?php the_title(); ?>">
            </div>
        </div>

        <?php
        $attachment_ids = $product->get_gallery_image_ids();
        foreach ($attachment_ids as $attachment_id) { ?>
            <div class="product-slider__inner" onmousemove="zoom(event)" style="background-image: url('<?php echo $image_link = wp_get_attachment_url($attachment_id); ?>')">
                <div class="product-slider__image woocommerce-product-gallery__image--placeholder">
                    <img class="wp-post-image" src="<?php echo $image_link = wp_get_attachment_url($attachment_id); ?>" alt="<?php the_title(); ?>">
                </div>
            </div>
        <?php } ?>
    </div>
</div>

<script>
	function zoom(e) {
		var zoomer = e.currentTarget;
		e.offsetX ? offsetX = e.offsetX : offsetX = e.touches[0].pageX
		e.offsetY ? offsetY = e.offsetY : offsetX = e.touches[0].pageX
		x = offsetX / zoomer.offsetWidth * 100
		y = offsetY / zoomer.offsetHeight * 100
		zoomer.style.backgroundPosition = x + '% ' + y + '%';
	}
</script>