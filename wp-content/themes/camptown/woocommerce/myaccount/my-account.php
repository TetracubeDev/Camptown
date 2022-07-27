<?php
/**
 * My Account page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/my-account.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.5.0
 */

defined( 'ABSPATH' ) || exit;

/**
 * My Account navigation.
 *
 * @since 2.6.0
 */
do_action( 'woocommerce_account_navigation' ); ?>


<style>
	.woocommerce-MyAccount-navigation-link--downloads, .woocommerce-MyAccount-navigation-link--payment-methods {
		display: none;
	}
	.woocommerce-MyAccount-navigation {
		background-color: #fff;
	}
	.woocommerce-MyAccount-navigation ul {
		display: flex;
		flex-direction: column;
	}
	.woocommerce-MyAccount-navigation-link--edit-address {
		order: 1;
	}
	.woocommerce-MyAccount-navigation-link--orders {
		order: 2;
	}
</style>


<div class="woocommerce-MyAccount-content">

	<?php
		/**
		 * My Account content.
		 *
		 * @since 2.6.0
		 */
		do_action( 'woocommerce_account_content' );
	?>
</div>


<script>
	/*jQuery(document).ready(function($) {
		$('#billing_city').select2({
            //minimumResultsForSearch: -1
        });

		$(document).ajaxComplete(function() {
            $('#billing_city').select2({
               // minimumResultsForSearch: -1
            });
		});
	});*/
</script>

