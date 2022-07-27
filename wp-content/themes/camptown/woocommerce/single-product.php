<?php
/**
 * The Template for displaying all single products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header( 'shop' ); ?>

	
<section class="section">

	<div class="breadcrumb">
	<?php
                woocommerce_breadcrumb();
                ?>
	</div>


	<?php while ( have_posts() ) : ?>
		<?php the_post(); ?>

		<?php wc_get_template_part( 'content', 'single-product' ); ?>

	<?php endwhile; // end of the loop. ?>
	
</section>

<?php woocommerce_output_related_products(); ?>


<?php if (get_field('additional_products_show')) { ?>

<section class="home-slider products-slider">

	<div class="container">
		<h2 class="seo__title section-title"><?php the_field('additional_products_title'); ?></h2>

		<div class="horizontal-slider">
	        <?php $featured_items = get_field('additional_products');
	        if ($featured_items) :  $i = 3; ?>

	          <?php foreach ($featured_items as $post) :

	            setup_postdata($post); ?>
	            <div class="slide" style="z-index: <?php echo "-" . $i ?>" data-aos="fade-up" data-aos-delay="<?php echo $i . "00" ?>" data-aos-duration="500" data-aos-anchor-placement="top-bottom">
	              <?php wc_get_template_part('content', 'product'); ?>
	            </div>

	          <?php $i++;
	          endforeach; ?>

	        <?php endif; ?>
	        <?php wp_reset_postdata(); ?>
	      </div>
	</div>
</section>

<?php } ?>
	
<?php
get_footer( 'shop' );

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */
