<?php

/**
 * Customer processing order email
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/emails/customer-processing-order.php.
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

if (!defined('ABSPATH')) {
	exit;
}

/*
 * @hooked WC_Emails::email_header() Output the email header
 */
do_action('woocommerce_email_header', $email_heading, $email); ?>
<?php
/* function getProtectedValue($obj, $name)
{
	$array = (array)$obj;
	$prefix = chr(0) . '*' . chr(0);
	return $array[$prefix . $name];
} */
$site_address = get_site_url();
$site_name = get_bloginfo('name');
// $site_address = getProtectedValue($email, 'placeholders')['{site_url}'];
// $site_name = getProtectedValue($email, 'placeholders')['{site_title}'];
?>
<?php if (false) { ?>
	<?php /* translators: %s: Customer first name */ ?>
	<p><?php printf(esc_html__('Hi %s,', 'woocommerce'), esc_html($order->get_billing_first_name())); ?></p>
	<?php /* translators: %s: Order number */ ?>
	<p><?php printf(esc_html__('Just to let you know &mdash; we\'ve received your order #%s, and it is now being processed:', 'woocommerce'), esc_html($order->get_order_number())); ?></p>
<?php } ?>
<div class="email__header" style="height: unset; text-align: center; border-bottom: 1px solid rgb(241, 241, 241);">

	<img src="http://<?= $site_address ?>/wp-content/uploads/2022/04/LOGO-black-email.png" alt="logo" style="margin: 40px auto 23px;">
</div>
<div class="email__body">


	<h1 class="email__title"><?php printf(esc_html__('היי %s,', 'woocommerce'), esc_html($order->get_billing_first_name())); ?></h1>
	<div class="email__subtitle">
		ההזמנה שלך התקבלה בהצלחה!
	</div>
	<p style="margin-top: 5px;">
		תודה שרכשת ב-<?= $site_name ?>. קיבלנו את ההזמנה שביצעת, מס' <?= $order->get_order_number() ?>, אנחנו כעת מטפלים בה. לכל שאלה ניתן לפנות אלינו במייל: <a href="mailto:orders@camptown.co.il">orders@camptown.co.il</a>
		או בצ'ט דרך <a href="http://<?= $site_address ?>">האתר</a><br>
	</p>
</div>
<?php

/*
 * @hooked WC_Emails::order_details() Shows the order details table.
 * @hooked WC_Structured_Data::generate_order_data() Generates structured data.
 * @hooked WC_Structured_Data::output_structured_data() Outputs structured data.
 * @since 2.5.0
 */
do_action('woocommerce_email_order_details', $order, $sent_to_admin, $plain_text, $email);

/*
 * @hooked WC_Emails::order_meta() Shows order meta data.
 */
//do_action( 'woocommerce_email_order_meta', $order, $sent_to_admin, $plain_text, $email );

/*
 * @hooked WC_Emails::customer_details() Shows customer details
 * @hooked WC_Emails::email_address() Shows email address
 */
//do_action( 'woocommerce_email_customer_details', $order, $sent_to_admin, $plain_text, $email );

/**
 * Show user-defined additional content - this is set in each email's settings.
 */
/* if ( $additional_content ) {
	echo wp_kses_post( wpautop( wptexturize( $additional_content ) ) );
} */

/*
 * @hooked WC_Emails::email_footer() Output the email footer
 */
?>
<div class="email__bottom" style="margin-bottom: 10px;">
	תודה שרכשתם ב- <a target="_blank" href="http://<?= $site_address ?>" style="text-decoration: none;"><span style=" color:#44b64c; "><?= $site_address ?></span></a>!

</div>
<div class="email__footer">
	<div class="social">

		<a href="#" class="social__item">
			<img src="http://<?= $site_address ?>/wp-content/uploads/2022/03/facebook-f-brands.png" alt="facebook" style=" width: 10px;">
		</a>
		<a href="#" class="social__item">
			<img src="http://<?= $site_address ?>/wp-content/uploads/2022/03/instagram-brands.png" alt="instagram" style=" width: 16px;">
		</a>
		<a href="#" class="social__item" style="align-items: center; justify-content: center;">
			<img src="http://<?= $site_address ?>/wp-content/uploads/2022/03/youtube-brands.png" alt="youtube" style=" width: 17px;">
		</a>
	</div>
	<div class="email__footer-links" style="justify-content: space-between;">
		<a href="#" target="_blank">גרילים/מנגלים</a> |
		<a href="#" target="_blank">קמפינג_וטיולים</a> |
		<a href="#" target="_blank">לגן_ולחצר</a> |
		<a href="#" target="_blank">מועדון_לקוחות</a>
	</div>
</div>
<?php
do_action('woocommerce_email_footer', $email);
?>
<style>


</style>