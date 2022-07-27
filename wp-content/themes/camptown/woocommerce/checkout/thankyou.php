<?php
/**
 * Thankyou page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/thankyou.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.7.0
 */

defined( 'ABSPATH' ) || exit;

?>
<style>
	.hidden {
		display: none;
	}
</style>
<section class="error-thank-you banner-no-bg ">

	<div class="breadcrumb">
        <?php echo do_shortcode('[wpseo_breadcrumb]'); ?>
    </div>

	<img src="<?= get_field('thank_you_image', 'option')['url'] ?>" alt="<?= get_field('thank_you_image', 'option')['alt'] ?>" class="error-thank-you__desktop-banner">

	<img src="<?= get_field('thank_you_image_mobile', 'option')['url'] ?>" alt="<?= get_field('thank_you_image_mobile', 'option')['alt'] ?>" class="error-thank-you__mobile-banner">

	<div class="error-thank-you__inner">
		

		<?php
		if ( $order ) :

			do_action( 'woocommerce_before_thankyou', $order->get_id() );
			?>

			<?php if ( $order->has_status( 'failed' ) ) : ?>

				<p class="woocommerce-notice woocommerce-notice--error woocommerce-thankyou-order-failed"><?php esc_html_e( 'Unfortunately your order cannot be processed as the originating bank/merchant has declined your transaction. Please attempt your purchase again.', 'woocommerce' ); ?></p>

				<p class="woocommerce-notice woocommerce-notice--error woocommerce-thankyou-order-failed-actions">
					<a href="<?php echo esc_url( $order->get_checkout_payment_url() ); ?>" class="button pay"><?php esc_html_e( 'Pay', 'woocommerce' ); ?></a>
					<?php if ( is_user_logged_in() ) : ?>
						<a href="<?php echo esc_url( wc_get_page_permalink( 'myaccount' ) ); ?>" class="button pay"><?php esc_html_e( 'My account', 'woocommerce' ); ?></a>
					<?php endif; ?>
				</p>

			<?php else : ?>
				
				<div class="error-thank-you__icon default-icon">
					<img src="<?= get_field('thank_you_icon', 'option')['url'] ?>" alt="<?= get_field('thank_you_icon', 'option')['alt'] ?>">
				</div>

				<h1 class="error-thank-you__title">
					<?= get_field("thank_you_title", 'option') ?>
				</h1>

				<div class="error-thank-you__text">
					<?= get_field("thank_you_subtitle", 'option') ?>
					<?php
						echo $order->get_id();
					?>
					
					<?php 
						//print_r($order);
					?>
				</div>

			
			<?php endif; ?>

			<div class="hidden">
				<?php do_action( 'woocommerce_thankyou_' . $order->get_payment_method(), $order->get_id() ); ?>
				<?php do_action( 'woocommerce_thankyou', $order->get_id() ); ?>
			</div>

			

		<?php else : ?>

			<div class="error-thank-you__text">
				<p class="woocommerce-notice woocommerce-notice--success woocommerce-thankyou-order-received"><?php echo apply_filters( 'woocommerce_thankyou_order_received_text', esc_html__( 'Thank you. Your order has been received.', 'woocommerce' ), null ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
			</div>

		<?php endif; ?>


		<a href="<?= home_url() ?>" class="error-thank-you__link btn site-color-btn">חזרה לעמוד הבית</a>


    </div>

</section>