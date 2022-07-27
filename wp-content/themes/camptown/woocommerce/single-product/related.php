<?php
/**
 * Related Products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/related.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     3.9.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( $related_products ) : ?>

	<section class="home-slider related-products-slider">

		<div class="container">
			<h2 class=" singe-product__section-title"> מוצרים נוספים שיכולים להתאים לכם </h2>

			<div class="horizontal-slider">

				<?php  $i = 3; foreach ( $related_products as $related_product ) :  ?>

						<?php
						$post_object = get_post( $related_product->get_id() );

						setup_postdata( $GLOBALS['post'] =& $post_object ); // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited, Squiz.PHP.DisallowMultipleAssignments.Found ?>
						

						<div class="slide" style="z-index: <?php echo "-" . $i ?>" data-aos="fade-up" data-aos-delay="<?php echo $i . "00" ?>" data-aos-duration="500" data-aos-anchor-placement="top-bottom">
			              <?php wc_get_template_part('content', 'product'); ?>
			            </div>

						

				<?php $i++; endforeach; ?>

			</div>
		</div>
		

		
		

	</section>
	<?php
endif;

wp_reset_postdata();
