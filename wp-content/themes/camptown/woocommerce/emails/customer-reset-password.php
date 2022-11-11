<?php

/**
 * Customer Reset Password email
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/emails/customer-reset-password.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates\Emails
 * @version 4.0.0
 */

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

?>

<?php do_action('woocommerce_email_header', $email_heading, $email); ?>
<?php

$site_address = $_SERVER['SERVER_NAME'];
$site_name = get_bloginfo('name');

?>

<div class="email__header">

	<div class="email__logo" style="background-image:url( http://<?= $site_address ?>/wp-content/uploads/2022/03/forgot-pass.jpg)">
		<img src="http://<?= $site_address ?>/wp-content/uploads/2022/03/LOGO-white.png" alt="logo" style="margin-top: 40px;">
	</div>
</div>
<div class="email__body">

	<h1 class="email__title" style="">
איפוס סיסמה
</h1>
	<div class="email__subtitle" >
	התקבלה בקשה לאיפוס הסיסמה עבור המשתמש הבא:

	</div>
	<p style="font-size: 16px; margin-top:2px">שם משתמש: <a href="mailto:<?= $email->recipient?>" style=" color: rgb(10, 10, 10)!important; text-decoration: none!important"></a><?= $email->recipient?></p>
	<p style="font-size: 17px; margin-top:11px"> <strong>בקישור הבא אפשר לבחור סיסמא חדשה:</strong></p>
	<a style="margin-bottom: 15px;" href="<?php echo esc_url(add_query_arg(array('key' => $reset_key, 'id' => $user_id), wc_get_endpoint_url('lost-password', '', wc_get_page_permalink('myaccount')))); ?>" class="btn">בחירת סיסמא חדשה</a>
	<p >אם לא רצית לאפס את סיסמתך, התעלם מהודעה זו ושום דבר לא יקרה. </p>
	<div class="email__bottom">
	<strong>בברכה, </strong>צוות <span style="text-transform: capitalize;"><?= $site_name ?></span>

	</div>
</div>
<?php if (false) { ?>

	<?php /* translators: %s: Customer username */ ?>
	<p><?php printf(esc_html__('Hi %s,', 'woocommerce'), esc_html($user_login)); ?></p>
	<?php /* translators: %s: Store name */ ?>
	<p><?php printf(esc_html__('Someone has requested a new password for the following account on %s:', 'woocommerce'), esc_html(wp_specialchars_decode(get_option('blogname'), ENT_QUOTES))); ?></p>
	<?php /* translators: %s: Customer username */ ?>
	<p><?php printf(esc_html__('Username: %s', 'woocommerce'), esc_html($user_login)); ?></p>
	<p><?php esc_html_e('If you didn\'t make this request, just ignore this email. If you\'d like to proceed:', 'woocommerce'); ?></p>
	<p>
		<a class="link" href="<?php echo esc_url(add_query_arg(array('key' => $reset_key, 'id' => $user_id), wc_get_endpoint_url('lost-password', '', wc_get_page_permalink('myaccount')))); ?>"><?php // phpcs:ignore 
																																																			?>
			<?php esc_html_e('Click here to reset your password', 'woocommerce'); ?>
		</a>
	</p>

	<?php
	/**
	 * Show user-defined additional content - this is set in each email's settings.
	 */
	if ($additional_content) {
		echo wp_kses_post(wpautop(wptexturize($additional_content)));
	}
	?>
<?php } ?>

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

.בקישור_הבא_אפשר_לבחור_סיסמא_חדשה: {
  font-size: 17px;
  font-family: "Arial";
  color: rgb(10, 10, 10);
  font-weight: bold;
  line-height: 1.471;
  text-align: center;
  position: absolute;
  left: 569.916px;
  top: 806.415px;
  width: 279px;
  height: 15px;
  z-index: 39;
}




</style>