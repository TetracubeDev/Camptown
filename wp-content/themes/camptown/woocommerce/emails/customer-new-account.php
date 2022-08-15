<?php

/**
 * Customer new account email
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/emails/customer-new-account.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates\Emails
 * @version 6.0.0
 */

defined('ABSPATH') || exit;

do_action('woocommerce_email_header', $email_heading, $email); ?>

<?php
/* function getProtectedValue($obj, $name)
{
	$array = (array)$obj;
	$prefix = chr(0) . '*' . chr(0);
	return $array[$prefix . $name];
} */
/* $site_address = getProtectedValue($email, 'placeholders')['{site_url}'];
$site_name = getProtectedValue($email, 'placeholders')['{site_title}']; */

$site_address = get_site_url();
$site_name = get_bloginfo('name');
?>

<div class="email__header">

	<div class="email__logo" style="background-image:url( http://<?= $site_address ?>/wp-content/uploads/2022/03/mail-welcome.jpg)">
		<img src="http://<?= $site_address ?>/wp-content/uploads/2022/03/LOGO-white.png" alt="logo" style="margin-top: 40px;">
	</div>
</div>

<div class="email__body">

	<h1 class="email__title"><?php printf(esc_html__('היי %s,', 'woocommerce'), esc_html($user_login)); ?></h1>
	<div class="email__subtitle">
		איזה כיף שנרשמת לאתר!
	</div>

	<p style="margin-top: 5px;">שמחים לעדכן שעכשיו יש לך איזור אישי שם אפשר לשמור ולעדכן פרטים אישיים, לעקוב אחרי הזמנות קודמות וכמובן להנות מכל המבצעים וההטבות השוות שלנו.

	</p>
	<p style="margin-top: 5px;">כמו כן, אנחנו מזמינים אותך להצטרף למועדון הלקוחות שלנו שנותן הטבות בלעדיות ומאפשר לצבור ולממש נקודות באתר. <a href="#" style="color: white">להצטרפות לחץ כאן</a> </p>
	<a href="<?= esc_url(wc_get_page_permalink('myaccount'))?>" class="btn">מעבר לאתר</a>
	
	<?php if (false) { ?>
		<?php /* translators: %1$s: Site title, %2$s: Username, %3$s: My account link */ ?>
		<p><?php printf(esc_html__('Thanks for creating an account on %1$s. Your username is %2$s. You can access your account area to view orders, change your password, and more at: %3$s', 'woocommerce'), esc_html($blogname), '<strong>' . esc_html($user_login) . '</strong>', make_clickable(esc_url(wc_get_page_permalink('myaccount')))); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped 
			?></p>
		<?php if ('yes' === get_option('woocommerce_registration_generate_password') && $password_generated && $set_password_url) : ?>
			<?php // If the password has not been set by the user during the sign up process, send them a link to set a new password 
			?>
			<p><a href="<?php echo esc_attr($set_password_url); ?>"><?php printf(esc_html__('Click here to set your new password.', 'woocommerce')); ?></a></p>
		<?php endif; ?>

		<?php
		/**
		 * Show user-defined additional content - this is set in each email's settings.
		 */
		if ($additional_content) {
			echo wp_kses_post(wpautop(wptexturize($additional_content)));
		}
		?>
	<?php } ?>
	<div class="email__bottom">
		<strong>בברכה, </strong>צוות <span style="text-transform: capitalize;"><?= $site_name ?></span>

	</div>

</div>
<div class="email__footer">
	<div class="social">

		<a href="#" class="social__item">
			<img src="http://<?=  $site_address ?>/wp-content/uploads/2022/03/facebook-f-brands.png" alt="facebook" style=" width: 10px;">
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
