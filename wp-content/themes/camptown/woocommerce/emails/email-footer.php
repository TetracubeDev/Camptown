<?php

/**
 * Email Footer
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/emails/email-footer.php.
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

defined('ABSPATH') || exit;
?>



</div>
<?= $site_address?>
<div class="email__after">
	<a href="#" styl>הסרה מרשימת תפוצה</a>
</div>
</div>
<style>
	.email__inner {
		width: 600px;
		max-width: 100%;
		border-radius: 10px;
		margin: auto;
		box-shadow: 0px 15px 32px 0px rgba(155, 155, 155, 0.17);
		background-color: rgb(255, 255, 255);
		border-color: rgb(241, 241, 241);
	}

	.email__body {
		text-align: center;
		color: rgb(10, 10, 10);
		font-family: "Arial";
		padding: 35px 40px 15px;
	}





	.email__body>p {
		font-size: 16px;
		font-family: "Arial";
		color: rgb(10, 10, 10);
		line-height: 1.5;
		text-align: center;
		text-shadow: 0px 0px 21px rgba(0, 0, 0, 0.26);
		margin-bottom: 2px;
	}

	.email__body a:not(.btn) {
		font-size: 16px;
		font-family: "Arial";
		color: #44b64c !important;
		line-height: 1.5;
		text-align: center;
		text-shadow: 0px 0px 21px rgba(0, 0, 0, 0.26);
		text-decoration: underline;
	}

	.email__body a:hover {
		text-decoration: none;
	}

	.email__bottom {
		font-size: 17px;
		font-family: "Arial";
		color: rgb(10, 10, 10);
		text-align: center;
		line-height: 1.412;
	}


	.btn {
		display: inline-block;
		margin: 13px auto 30px;
		border-radius: 25px;
		background-color: rgb(68, 182, 76);
		font-size: 18px;
		font-family: "Arial";
		color: white !important;
		font-weight: bold;
		line-height: 1;
		text-align: center;
		padding: 15px 30px;
		text-decoration: none;

	}

	.email__title {
		font-size: 30px;
		font-family: "Arial";
		color: rgb(10, 10, 10);
		font-weight: bold;
		line-height: 1;
		border-bottom: 4px solid rgba(68, 182, 76, 0.239);
		display: inline-block;
		margin-bottom: 15px;

	}



	.email__subtitle {
		font-size: 20px;
		font-family: "Arial";
		color: rgb(10, 10, 10);
		font-weight: bold;
		line-height: 1.6;
	}





	#header_wrapper {
		background-color: red !important;
		width: 100;
	}

	.email__header {
		width: 100%;
		height: 330px;
		display: grid;
		justify-items: center;
		position: relative;
		border-radius: 10px 10px 0 0;

	}

	.email__logo {
		text-align: center;

		background-repeat: no-repeat;
		border-radius: 10px 10px 0 0;
	}



	#template_header {
		display: none !important;
		width: 100%;

	}

	.email__wrap {
		border-width: 1px;
		border-color: rgb(241, 241, 241);
		border-style: solid;
		border-radius: 10px !important;
		background-color: rgb(255, 255, 255);
		box-shadow: 0px 15px 32px 0px rgba(155, 155, 155, 0.17);

	}

	#body_content {
		border-radius: 10px;
	}
.email__middle{
	display: flex;
	flex-wrap: wrap;
	padding: 20px 0;
	margin: 0 40px ;
	border-top: 1px solid rgb(241,241,241);
	border-bottom: 1px solid rgb(241,241,241);
}
	.email__middle-item{
		font-size: 17px;
		font-family: "Arial";
  color: rgb(10, 10, 10);
  line-height: 1.471;
  margin-left: 30px;
	}


</style>

<style>
	.email__footer {
		padding: 0 40px 30px;
	}


	.social {
		display: flex;
		text-align: center;

		margin: 0 -5px;
		padding: 16px 0;
		border-top: 1px solid rgb(226, 226, 226);
		border-bottom: 1px solid rgb(226, 226, 226);

	}


	.social__item {
		width: 40px;
		height: 40px;

		display: flex;
		text-align: center;
		border-width: 1px;
		border-color: rgb(6, 2, 0);
		border-style: solid;
		border-radius: 50%;
		background-color: rgb(255, 255, 255);
		box-shadow: 0px 15px 32px 0px rgba(155, 155, 155, 0.17);
		margin: 0 5px;
	}

	.social__item:first-child {
		margin-right: auto;
	}

	.social__item:last-child {
		margin-left: auto;
	}

	.social__item>img {



		display: block;
		margin: auto;
	}

	.email__footer-links {
		display: flex;
		margin-top: 15px;
	}

	.email__footer-links>a {
		display: inline-block;
		font-size: 17px;
		font-family: "Arial";
		color: rgb(10, 10, 10);
		font-weight: bold;
		line-height: 1.353;
		text-align: center;
		margin: auto;
		text-decoration: none;
	}

	.email__footer-links>a:first-child {
		margin-right: 0;
	}

	.email__footer-links>a:last-child {
		margin-left: 0;
	}
</style>
<style>
	.email__after{
	text-align: center;
	}
	.email__after>a{
		display: inline-block;
		font-size: 13px;
  font-family: "Arial";
  color: rgb(48, 48, 48);
  font-weight: bold;
  line-height: 1.769;
  margin-top: 20px;
  text-decoration: none;
	}


</style>

</body>

</html>