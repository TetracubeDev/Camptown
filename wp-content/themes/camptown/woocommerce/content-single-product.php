<?php

/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined('ABSPATH') || exit;

global $product;
?>

<div id="product-<?php the_ID(); ?>" <?php wc_product_class('container', $product); ?>>
	<?php
	/**
	 * Hook: woocommerce_before_single_product.
	 *
	 * @hooked woocommerce_output_all_notices - 10
	 */
	do_action('woocommerce_before_single_product');

	if (post_password_required()) {
		echo get_the_password_form(); // WPCS: XSS ok.
		return;
	}
	?>

	<div class="row">
		<div class="col-12 col-lg-6">
			<div class="single-product-content">
				<div class="text-center">
					<a href="<?php echo get_permalink( wc_get_page_id( 'shop' ) ); ?>" class="alternative-btn ">
						<i class="icon-arrow-right"></i>
						חזור
					</a>
					<?php woocommerce_template_single_title(); ?>
					<div class="single-product__price">
						<?php woocommerce_template_single_price(); ?>
					</div>
					<?php if ($product->get_sku() !== '') { ?>
						<div class="single-product__sku">
							<span><?php _e('SKU:', 'woocommerce'); ?> <?= $product->get_sku(); ?></span>
						</div>
					<?php } ?>


					<div class="single-product__add">
						<?php woocommerce_template_single_add_to_cart(); ?>
						<?= do_shortcode('[yith_wcwl_add_to_wishlist]'); ?>
					</div>

				</div>
				<div class="single-product__info">


					<?php if( have_rows('deliveries') ): ?>
					    <?php while( have_rows('deliveries') ): the_row(); 
					        ?>
				        	<div class="single-product__delivery">
					       		<i class="icon-delivery"></i>
					       		<div>
					       			<p><strong><?php the_sub_field('name'); ?></strong> - ₪ <?php the_sub_field('cost'); ?></p>
									<p style="color: #706f6f;">זמן אספקה:  <?php the_sub_field('days'); ?> ימי עסקים</p>
								</div>
							</div>
					    <?php endwhile; ?>
					<?php endif; ?>



					<?php if (get_field('warranty')) { ?>
						<div class="single-product__warranty">
							<i class="icon-certificate"></i>
							<div>
								<strong>אחריות:</strong> <?php the_field('warranty'); ?>
							</div>
						</div>
					<?php } ?>


					<?php if (get_field('link')) { ?>
						<div class="single-product__link">
							<i class="icon-whatsapp"></i>
							<div>
								<?php the_field('link'); ?>
							</div>
						</div>
					<?php } ?>

				</div>

				<?php if (get_field('description_long')) { ?>
					<div class="single-product__description">
						<div class="single-product__description-title">

							תיאור המוצר
						</div>
						<div class="single-product__hidden">
							<?php the_field('description_long'); ?>
						</div>
					</div>
				<?php } ?>


				<?php if (get_field('description_2')) { ?>
					<div class="single-product__description">
						<div class="single-product__description-title">

							משלוחים והחזרות
						</div>
						<div class="single-product__hidden">
							<div class="default-content">
								<?php the_field('description_2'); ?>
							</div>
						</div>
					</div>
				<?php } ?>

				<div class="single-product__botton-buttons">
					<?php if (get_field('file')) { ?>
						<div class="single-product__file alternative-btn">
							<a href="<?= get_field('file')['url']; ?>" download><i class="icon-pdf"></i> <?= get_field('file')['title']; ?></a>
						</div>
					<?php } else { ?>
						<div >
							
						</div>
					<?php } ?>

					<div class="single-product__share alternative-btn has-dropdown">
						<span><i class="icon-share"></i> שתף מוצר </span>
						<ul class="dropdown">
							<li>
								<a class="share facebook-share" target="_blank" data-network="facebook" href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" title="Facebook">
									<div class="icon fb">
										<i class="icon-facebook"></i>
									</div>
									פייסבוק
								</a>

							</li>
							<li>
								<a class="share twitter-share" target="_blank" data-network="twitter" href="https://www.twitter.com/share?url=<?php the_permalink(); ?>" title="Twitter">
									<div class="icon tw">
										<i class="icon-twitter"></i>
									</div>
									טוויטר
								</a>
							</li>
							<li>

								<a class="share whatsapp-share" target="_blank" data-network="whatsapp" href="https://wa.me/?text=<?php the_permalink(); ?>" title="WhatsApp">
									<div class="icon wa">
										<i class="icon-whatsapp"></i>
									</div>
									ווטסאפ
								</a>

							</li>
							<li>
								<a href="mailto:?subject=<?php the_title(); ?>&amp;body=<?php the_title(); ?> <?php the_permalink(); ?>">
									<div class="icon mail">
										<i class="icon-mail"></i>
									</div>
									מייל
								</a>
							</li>


							<li>
								<a href="#" id="copyLink" class="copy-link-btn">
									<div class="icon link">
										<i class="icon-share1"></i>
									</div>
									העתק קישור
								</a>
							</li>



						</ul>
					</div>
				</div>
			</div>
		</div>
		<div class="col-12 col-lg-6">
			<?php if (get_field('badge')) { ?>
				<div class="onsale" style="background-color: <?php the_field('badge_color'); ?>"><?php the_field('badge'); ?></div>
			<?php } ?>
			<?php
			/**
			 * Hook: woocommerce_before_single_product_summary.
			 *
			 * @hooked woocommerce_show_product_sale_flash - 10
			 * @hooked woocommerce_show_product_images - 20
			 */
			do_action('woocommerce_before_single_product_summary');
			?>
		</div>
	</div>

</div>
<script>
	jQuery(document).ready(function($) {
		var $temp = $("<input>");
		var $url = $(location).attr('href');
		$('#copyLink').click(function(e) {
			e.preventDefault()
			$("body").append($temp);
			$temp.val($url).select();
			document.execCommand("copy");
			$temp.remove();
		});
	});
</script>
<?php do_action('woocommerce_after_single_product'); ?>