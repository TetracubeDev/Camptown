<?php

/**
 * Edit account form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-edit-account.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.5.0
 */

defined('ABSPATH') || exit;

do_action('woocommerce_before_edit_account_form'); ?>
<h1 class="account__title">פרטי חשבון</h1>
<form class="woocommerce-EditAccountForm edit-account" action="" method="post" <?php do_action('woocommerce_edit_account_form_tag'); ?>>

	<?php do_action('woocommerce_edit_account_form_start'); ?>
	<div class="edit-account__title">
		פרטים אישיים
	</div>
	<div class="edit-account__sub-title">
		השדות המסומנים בכוכבית (*) הינם שדות חובה

	</div>
	<div class="edit-account__inner">
		<p class="woocommerce-form-row woocommerce-form-row--first form-row form-row-first ">
			<label for="account_first_name"><?php esc_html_e('First name', 'woocommerce'); ?>&nbsp;<span class="required">*</span></label>
			<input placeholder="* <?php esc_html_e('First name', 'woocommerce'); ?>" type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="account_first_name" id="account_first_name" autocomplete="given-name" value="<?php echo esc_attr($user->first_name); ?>" />

		</p>
		<p class="woocommerce-form-row woocommerce-form-row--last form-row form-row-last">
			<label for="account_last_name"><?php esc_html_e('Last name', 'woocommerce'); ?>&nbsp;<span class="required">*</span></label>
			<input placeholder="* <?php esc_html_e('Last name', 'woocommerce'); ?>" type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="account_last_name" id="account_last_name" autocomplete="family-name" value="<?php echo esc_attr($user->last_name); ?>" />
		</p>


		<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
			<label for="account_display_name"><?php esc_html_e('Display name', 'woocommerce'); ?>&nbsp;<span class="required">*</span></label>
			<input type="text" placeholder="* <?php esc_html_e('Display name', 'woocommerce'); ?>" class="woocommerce-Input woocommerce-Input--text input-text" name="account_display_name" id="account_display_name" value="<?php echo esc_attr($user->display_name); ?>" /> <span><em><?php esc_html_e('This will be how your name will be displayed in the account section and in reviews', 'woocommerce'); ?></em></span>
		</p>





		<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
			<label for="account_email"><?php esc_html_e('Email address', 'woocommerce'); ?>&nbsp;<span class="required">*</span></label>
			<input placeholder="* <?php esc_html_e('Email address', 'woocommerce'); ?>" type="email" class="woocommerce-Input woocommerce-Input--email input-text" name="account_email" id="account_email" autocomplete="email" value="<?php echo esc_attr($user->user_email); ?>" />
		</p>
	</div>
	<fieldset>
		<div class="edit-account__title">
			סיסמה
		</div>
		<div class="edit-account__sub-title">
			השדות המסומנים בכוכבית (*) הינם שדות חובה


		</div>
		<div class="edit-account__pass edit-account__inner ">
			<div class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide ">
				<label for="password_current"><?php esc_html_e('Current password (leave blank to leave unchanged)', 'woocommerce'); ?></label>
				<input type="password" placeholder="* סיסמה נוכחית" class="woocommerce-Input woocommerce-Input--password input-text" name="password_current" id="password_current" autocomplete="off" />
			<div class="pass-validation">
				<strong>על הסיסמה להכיל לפחות:</strong>
			
			</div>
			</div>
			<div class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide pass-new">
				<label for="password_1"><?php esc_html_e('New password (leave blank to leave unchanged)', 'woocommerce'); ?></label>
				<input placeholder="* סיסמה חדשה" type="password" class="woocommerce-Input woocommerce-Input--password input-text" name="password_1" id="password_1" autocomplete="off" />
				<div class="pass-validation">
					<strong>על הסיסמה להכיל לפחות:</strong>
					<ul>
						<li class="pass-count"><i class="icon-bullet-check"></i>
							8 תווים
						</li>
						<li class="pass-register"><i class="icon-bullet-check"></i>אות 1 גדולה</li>
						<li class="pass-num"><i class="icon-bullet-check"></i>מספר </li>
					</ul>
				</div>
			</div>
			<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide" style="display:none">
				<label for="password_2"><?php esc_html_e('Confirm new password', 'woocommerce'); ?></label>
				<input type="password" class="woocommerce-Input woocommerce-Input--password input-text" name="password_2" id="password_2" autocomplete="off" />
			</p>
		</div>
	</fieldset>
	<div class="clear"></div>

	<?php do_action('woocommerce_edit_account_form'); ?>

	<p>
		<?php wp_nonce_field('save_account_details', 'save-account-details-nonce'); ?>
		<button type="submit" class="woocommerce-Button button" name="save_account_details" value="<?php esc_attr_e('Save changes', 'woocommerce'); ?>"><?php esc_html_e('Save changes', 'woocommerce'); ?></button>
		<input type="hidden" name="action" value="save_account_details" />
	</p>

	<?php do_action('woocommerce_edit_account_form_end'); ?>
</form>

<?php do_action('woocommerce_after_edit_account_form'); ?>