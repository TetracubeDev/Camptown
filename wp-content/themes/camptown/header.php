<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php wp_head(); ?>





	<style>
		.home-services input[type=email] {
			background-image: url('/wp-content/themes/camptown/img/mail.svg');
		}

		.hasDatepicker {
			background-image: url('/wp-content/themes/camptown/img/53 calendar.svg');
		}

		@media (min-width: 1200px) {

			::-webkit-scrollbar-track {
				background: #fff;
			}

			::-webkit-scrollbar-thumb {
				background-color: <?php the_field('theme_color', 'option'); ?>;
			}

			:root {
				scrollbar-width: thin;
				scrollbar-color: <?php the_field('theme_color', 'option'); ?> #fff;
			}


		}

		.nice-select .list ul::-webkit-scrollbar-track,
		.select2-container--default .select2-results>.select2-results__options::-webkit-scrollbar-track {
			background: #e8e8e8;
		}

		.nice-select .list ul::-webkit-scrollbar-thumb,
		.select2-container--default .select2-results>.select2-results__options::-webkit-scrollbar-thumb {
			background-color: #060200;
		}

		.nice-select .list ul:root,
		.select2-container--default .select2-results>.select2-results__options:root {
			scrollbar-width: thin;
			scrollbar-color: #060200 #e8e8e8;
		}

		body,
		a,
		a:hover,
		p,
		.footer .socials a i,
		.home-services input[type=email],
		.dont-logout,
		input:not([type=submit]),
		.article__bottom,
		.banner-no-bg .breadcrumb span span span,
		.banner-no-bg .breadcrumb a,
		.banner-no-bg .breadcrumb,
		.single-product .breadcrumb span span span,
		.single-product .breadcrumb a,
		.nice-select,
		select,
		.banner.image_placeholder .breadcrumb,
		.banner.image_placeholder .breadcrumb span span span,
		.banner.image_placeholder .breadcrumb a,
		.toggless__title .icon,
		.woocommerce-breadcrumb,
		.banner__title.page-category-title,
		.woocommerce-account .breadcrumb,
		.woocommerce-account .breadcrumb a,
		.woocommerce-account .breadcrumb span span span,
		.spare-parts .breadcrumb,
		.spare-parts .breadcrumb a,
		.spare-parts .breadcrumb span span span,
		.select2-selection__arrow:before {
			color: <?php the_field('default_text', 'option'); ?>;
		}

		input::-moz-placeholder {
			color: <?php the_field('default_text', 'option'); ?>;
			font-family: 'Ploni DL 1.1 AAA';
			color: #767676 !important;
		}

		input::-ms-input-placeholder,
			{
			color: <?php the_field('default_text', 'option'); ?>;
			font-family: 'Ploni DL 1.1 AAA';
			color: #767676 !important;
		}

		input::-webkit-input-placeholder {
			color: <?php the_field('default_text', 'option'); ?>;
			font-family: 'Ploni DL 1.1 AAA';
			color: #767676 !important;
		}

		input::placeholder {
			color: <?php the_field('default_text', 'option'); ?>;
			font-family: 'Ploni DL 1.1 AAA';
			color: #767676 !important;
		}

		textarea::-moz-placeholder {
			color: #767676 !important;
		}

		textarea::-ms-input-placeholder {
			color: #767676 !important;
		}

		textarea:-webkit-input-placeholder {
			color: #767676 !important;
		}

		textarea::placeholder {
			color: #767676 !important;
		}

		select,
		.nice-select .current {
			color: #767676;
		}

		.acf-input input::-moz-placeholder {
			color: #767676;
		}

		.acf-input input::-ms-input-placeholder {
			color: #767676;
		}

		.acf-input input:-webkit-input-placeholder {
			color: #767676;
		}

		.acf-input input::placeholder {
			color: #767676;
		}


		.topbar a:not(.topbar__tel),
		.horizontal-slider .slick-arrow i,
		.horizontal-slider .slick-arrow:hover i,
		.main-slider .slick-arrow:hover,
		.home-services__link:hover,
		.home-services__link,
		.home-services__item:nth-child(2) .home-services__title,
		.home-services__item:nth-child(2) .home-services__text,
		.footer .socials a:hover i,
		.onsale,
		.modal__buttons a,
		.modal__buttons button,
		.modal__close i,
		a.whatsapp,
		a.whatsapp:hover,
		.banner__title,
		.breadcrumb,
		.breadcrumb a,
		.article-header__category,
		.article-header__category:hover,
		a.back-to-blog i,
		.site-color-btn,
		.site-color-btn:hover,
		input[type=checkbox]+span:before,
		.login-modal form .login-modal__submit button,
		.step__button,
		.icon-eye-open,
		input[type=submit],
		.products-filter .nice-select,
		.woocommerce-ordering .nice-select:before,
		.woocommerce-ordering .nice-select:before,
		.banner__text p,
		.login_msg.success,
		.cart-btn__quantity,
		.single-product__description-title.in:before,
		.product-slider .slick-arrow:hover,
		.single-product__share ul li i,
		.mini-cart__buttons a.checkout,
		.wc-proceed-to-checkout a,
		.woocommerce-form-login__submit,
		.place-order button,
		.woocommerce-Button,
		.woocommerce-Button:hover,
		.account__button,
		.account__button:hover,
		.woocommerce-address-fields button,
		.form_option_billing,
		.form_option_shipping {
			color: #fff;
		}



		a.topbar__tel,
		.topbar a:not(.topbar__tel):hover,
		.section-title span,
		.image-section__links a:after,
		.arrow-btn:after,
		.product-card__price,
		.mini-cart__price,
		.banner__title span,
		.posts-filters>li a:after,
		ol li:before,
		.default-content p a,
		.default-content li a,
		.login-socials p a,
		.megamenu__sub-category-title,
		.menu-image-title:before,
		.megamenu__sub-category-title i,
		.alternative-sidebar__images>div:first-child .alternative-sidebar__image-text-underline,
		.frontend-form__item-sub-title span,
		.error-thank-you__text a,
		.cookies__text a,
		.alternative-btn i,
		.single-product__price .amount,
		.single-product__info a:before,
		.mini-cart__club a:before,
		.cart-alert a:before,
		.product-price bdi,
		.cart-discount,
		.woocommerce-checkout-review-order .product-total .amount,
		.page-numbers li a:hover,
		.interactive-form-modal__content-text p a {
			color: <?php the_field('theme_color', 'option'); ?>;
		}

		input[type=submit],
		.main-slider .slick-arrow:hover,
		.main-slider .slick-dots li,
		.horizontal-slider .slick-arrow:hover,
		.whatsapp,
		.footer .form-subscribe input[type=submit],
		.home-services__link:hover,
		.post-card__category,
		.onsale,
		.modal__buttons a,
		.modal__buttons button,
		.article-header__category,
		.article-header__autor:before,
		.default-content ul li:before,
		.default-content p a:before,
		.default-content li a:before,
		.site-color-btn,
		.bordered-title span:before,
		.login-modal form .login-modal__submit button,
		.alternative-sidebar__images>div:first-child:after,
		.interactive-form__step li.check .icon,
		.step__button,
		.frontend-form__popup-image.in+span+.icon-eye-open:after,
		.footer .form-subscribe input[type=submit]:hover,
		.login_msg.success,
		.cart-btn__quantity,
		.product-slider .slick-arrow:hover,
		.spare_parts__content h3:before,
		.mini-cart__buttons a.checkout,
		.mini-cart__alert:before,
		.wc-proceed-to-checkout a,
		.wc-proceed-to-checkout a,
		.woocommerce-form-login__submit,
		.place-order button,
		.form_option_billing,
		.form_option_shipping,
		.woocommerce-Button,
		.account__button,
		.woocommerce-address-fields button,
		.back-to-top:hover {
			background-color: <?php the_field('theme_color', 'option'); ?>;
		}

		.alternative-sidebar__images>div:first-child .alternative-sidebar__image-text-underline {
			border-bottom: 1px solid <?php the_field('theme_color', 'option'); ?>;
		}

		.single-product__info a:after,
		.mini-cart__club a:after,
		.cart-alert a:after {
			background-color: #5f5d5b;
		}

		.single-product__info {
			border-top: 1px solid #fff;
		}

		.single-product__description {
			border-top: 1px solid #fff;

		}

		.single-product__botton-buttons {
			border-top: 1px solid #fff;
		}

		.single-product__description+.single-product__description,
		.woocommerce-cart-form table tr:not(:last-child) td {
			border-bottom: 1px solid #fff;
		}

		.section-title {
			color: <?php the_field('section_title_text', 'option'); ?>;
		}

		.main-slider__title,
		.main-slider__sub-title {
			color: <?php the_field('banner_text', 'option'); ?>;
		}

		.footer a:hover,
		.home-services__title,
		.blog-slider__filter li,
		.frontend-form__popup,
		.acf-input-prepend,
		.file-label,
		.hide-if-value a:before,
		.hide-if-value a:after,
		.anchor-content,
		.anchor-content ul li:before,
		.left-modal__title,
		.mini-cart__buttons a:not(.checkout),
		.woocommerce-cart-form .product-subtotal,
		.wc-proceed-to-checkout a,
		.woocommerce-checkout-review-order tfoot td {
			color: #0a0a0a;
		}

		.file-name {
			color: #767677;
		}

		.header__nav>li>a,
		.dropdown>li a,
		div.search input[type=text],
		.megamenu__main-category-title,
		.megamenu__sub-category-title,
		.megamenu__sub-sub-categories li {
			color: #1b1d22;
		}

		.header>.container-fluid,
		.main-slider .slick-arrow,
		.home-services input[type=email],
		.home-services__link,
		.home-services__icon,
		.image-content__target:before,
		.image-content__target,
		.wishlist__btn,
		.dropdown,
		.dropdown li a:hover .dropdown__icons,
		.modal__inner,
		.post-card,
		.about-list__item,
		.gallery-slider .slick-arrow,
		.megamenu__main-category,
		.megamenu__categories-img,
		.login-socials__divider span,
		.alternative-sidebar,
		.alternative-sidebar__images a,
		.interactive-form__step li .icon,
		.acf-field .acf-label,
		.nice-select .list,
		.call-sidebar__item,
		.woocommerce-page .category-line__image,
		.contacts-item,
		.contact-waze,
		.category-line__image.alternative-line__image,
		.sale-select .nice-select,
		.sale-item,
		.clients-club__content,
		.cart-alert,
		.anchor-content,
		.sitemap__item,
		.alternative-btn,
		.quantity,
		.single-product__description table tr:nth-child(odd) td,
		.single-product__description-title:before,
		.single-product__share span,
		.mini-cart__club,
		.spare_parts__content,
		.left-modal__close,
		.cart-block,
		.woocommerce-cart-form .product-remove a,
		.woocommerce-cart-form .product-quantity:before,
		.toggless__item,
		.ocwma_table_bill .billing_address,
		.woocommerce-Address,
		.cus_menu {
			background-color: #fff;
		}



		.article-header__category svg {
			fill: #fff;
		}

		.nice-select:after {
			border-bottom: 2px solid <?php the_field('theme_color', 'option'); ?>;
			border-right: 2px solid <?php the_field('theme_color', 'option'); ?>;

		}

		.contact-form__inner .nice-select:after,
		.sale-select .nice-select:after {
			border-bottom: 2px solid <?php the_field('default_text', 'option'); ?>;
			border-right: 2px solid <?php the_field('default_text', 'option'); ?>;

		}

		.sale-select .nice-select .current,
		.sale-select select {
			color: #888;
		}

		.header__nav>li>a:after,
		.footer-menu li>a:after,
		.megamenu__sub-sub-categories li a:after,
		.mobile-nav-active .header:after,
		.back-to-top,
		.home-services__link,
		.login-modal form .login-modal__submit button:hover,
		.about-list__icon,
		input[type=submit]:hover,
		.footer .form-subscribe input[type=submit],
		.products-filter .nice-select,
		.slick-dots li.slick-active,
		.single-product__description-title.in:before,
		.mini-cart__buttons a.checkout:hover,
		.wc-proceed-to-checkout a:hover,
		.woocommerce-form-login__submit:hover,
		.place-order button:hover,
		.account__button:hover,
		.woocommerce-address-fields button:hover,
		.woocommerce-Button:hover {
			background-color: <?php the_field('default_text', 'option'); ?>;
		}

		.form_option_billing:hover,
		.form_option_shipping:hover {
			background-color: <?php the_field('default_text', 'option'); ?> !important;
		}

		.megamenu__inner {
			background-color: #f4f3f1;
		}

		.tooltip {
			background-color: <?php the_field('default_text', 'option'); ?>;
			color: #f1f1f1;
		}

		.tooltip:before {
			border: 6px solid transparent;
			border-bottom: 9px solid <?php the_field('default_text', 'option'); ?>;
		}

		.anchor__icon,
		.interactive-form,
		.acf-field .acf-label label span,
		.clients-club,
		.woocommerce-page.single-product,
		.single-product .home-slider.products-slider,
		.mini-cart,
		.woocommerce-cart,
		.account__title,
		body.woocommerce-account {
			background-color: #f1f1f1;
		}

		.anchor ul li:before {
			border-color: #fff;
			background-color: #141414;

		}


		.anchor ul li.active:before,
		.nice-select .list {
			border-color: #dddddd;
		}

		.slick-dots li {
			border-color: <?php the_field('default_text', 'option'); ?>
		}

		.cookies .modal__close i {
			color: #d0d0d0;
		}


		.interactive-form__step .text,
		.acf-field .acf-label label,
		.frontend-form__item-sub-title,
		.mini-cart__club,
		.additional-info,
		.toggless__title,
		.woocommerce-checkout-review-order tfoot th,
		.woocommerce-form-login p:first-child {
			color: #010201;
		}

		.product-card__image {
			background: #fefefe;
		}

		.product-card .wishlist__btn .tooltip:before {

			border-top: 9px solid <?php the_field('default_text', 'option'); ?>;
		}

		.dropdown,
		.products-filter .nice-select .list {
			border-color: #e6e6e6;
		}

		.float-socials__links a {
			border-color: #000;
		}

		del,
		del .amount {
			color: #7c7c7c !important;
		}

		.nice-select .option {
			color: #0d0d0d;
		}

		.nice-select .option.selected {
			background-color: #f2f2f2;
		}

		input,
		textarea,
		.footer .form-subscribe input[type=submit],
		.nice-select,
		.nice-select:hover,
		.nice-select:active,
		.nice-select.open,
		.nice-select:focus,
		select,
		.bordered-btn,
		input[type=checkbox]+span:before,
		.login-socials a,
		.hide-if-value,
		.select2-container--default .select2-selection--single {
			border-color: <?php the_field('default_text', 'option'); ?>;
		}

		.home-services {
			background-color: #f4f4f4;
		}

		.login-socials__divider:before {
			background-color: #d7d7d7;
		}

		.modal__return {
			border-bottom: 1px solid #d7d7d7;
		}

		.acf-field .acf-label,
		.sitemap__title {
			border-bottom: 1px solid #e5e5e5;
		}

		.anchor-content>ul,
		.toggless__content {
			border-top: 1px solid #e5e5e5;
		}

		.woocommerce-checkout-review-order .product-thumbnai {
			border-color: #f2f2f2
		}


		input,
		.acf-input input {
			color: #767676;
		}

		.post-card__category,
		.post-card__category a {
			color: #f6f6f6;
		}

		.category-line__image,
		.footer .form-subscribe input:not([type=submit]),
		.slide__post-card>a,
		.posts,
		.article__bottom,
		.about-page,
		body.search,
		.megamenu__main-category-image,
		.woocommerce-page,
		.default-icon,
		.contacts-page,
		.grey-bg,
		.woocommerce-loop-category__title {
			background-color: #f6f6f6;
		}

		.image-section,
		.home-slider.products-slider {

			background-color: #f8f8f8;
		}

		.section-text {
			color: #373737;
		}

		.anchor__title,
		.banner-no-bg__subtitle {
			color: #141414;
		}

		li.woocommerce-MyAccount-navigation-link a {
			color: #0e0e0d;
		}

		.image-section__links a:before,
		.arrow-btn:before,
		.horizontal-slider .slick-arrow {
			background-color: #0a0a0a;
		}

		.header__toggler span,
		.header__toggler span:before,
		.header__toggler span:after {
			background-color: #030303;
		}

		.footer {
			background-color: #fff;
			border-top: 1px solid #e6e5e5;
		}

		.woocommerce-cart-form table tr th {
			border-bottom: 1px solid #0a0a0a;
		}

		.footer .socials a:hover,
		.logout-buttons a:hover,
		.posts-filters:after,
		a.back-to-blog,
		.site-color-btn:hover,
		input[type=checkbox]:checked+span:before {
			background-color: #000;
		}

		.footer-bottom {
			border-top: 1px solid #e1e2e2;
		}

		.footer .divider {
			background-color: #a1a1a1;
		}

		.develop a {
			color: rgba(6, 2, 0, 0.678);
		}

		.copyright {
			color: rgba(6, 2, 0, 0.678);
		}

		.header-icons,
		div.search input[type=text],
		.modal__return-btn>div {
			background-color: #f6f5f3;
		}

		.dropdown__icons,
		.dropdown>li>a:hover,
		.header-icons:hover {
			background: #ebebea;
		}

		.wpcf7-not-valid,
		.wpcf7-not-valid+.nice-select {
			border: 1px solid #fd0000 !important;
		}

		.alternative-sidebar__images>div:last-child .alternative-sidebar__image-text-underline {
			border-bottom: 1px solid #fd0000 !important;
		}

		.login_msg.fail,
		.login_msg.fail:before,
		.register_msg.fail,
		.register_msg.fail:before,
		.alternative-sidebar_small-title,
		.alternative-sidebar__images>div:last-child .alternative-sidebar__image-text-underline {
			color: #fd0000;
		}

		.alternative-sidebar__text li:before {
			background: #060200;
		}

		.alternative-sidebar__images>div:last-child:after {
			background-color: #fd0000;
		}

		.login_msg.fail,
		.register_msg.fail {
			background-color: #ffe5e5;
		}

		.banner__title {
			text-shadow: 0px 0px 27px rgba(0, 0, 0, 0.95);
		}

		.anchor {
			box-shadow: 0px 0px 98px 0px rgba(216, 216, 216, 0.97);
		}

		.posts-filters>li.active a {
			background: #060200;
			color: #fff;
		}


		.posts-filters li.active a {
			border-color: #000;
			background: #060200;
			color: #fff;
		}

		.posts-filters li.active a svg path {
			fill: #fff;
		}


		.article__introduction p,
		.article__introduction li,
		.alternative-sidebar__title,
		.sale-select .nice-select:before,
		.cart-block__title {
			color: #000;
		}

		.alternative-sidebar__title,
		.woocommerce-checkout-review-order .cart_item,
		.woocommerce-checkout-review-order-table tr:not(:last-child),
		.checkout-custom-login {
			border-bottom: 1px solid #d7d6d6;
		}

		.woocommerce-checkout-review-order .cart_item:first-child {
			border-top: 1px solid #d7d6d6;
		}

		.custom-coupon {
			border-bottom: 1px solid #d7d6d6;
			border-top: 1px solid #d7d6d6;
		}

		.interactive-form-modal__content:before {

			background-color: #d7d6d6;
		}

		.anchor,
		.sticky-anchor .header {
			background-color: #fbfdfd;
		}

		.login-modal__top-info {
			background-color: #d6efd8;
		}

		.mini-cart__buttons a:not(.checkout) {
			border: 1px solid #767676;
		}

		.mini-cart__buttons a:hover {
			background: #000 !important;
			color: #fff !important;
		}

		.table-modal .woocommerce-order-details__title:before {
			background: <?php the_field('theme_color', 'option'); ?>;
		}

		.table-modal .product-total .amount {
			color: <?php the_field('theme_color', 'option'); ?>;
		}

		.ocwma_modal-content button {
			background-color: <?php the_field('theme_color', 'option'); ?> !important;
			color: #fff;
		}

		@media(max-width: 1199px) {
			.header-menu {
				background-color: #f4f3f1;
			}

			.megamenu__main-category-image {
				background-color: #fff;
			}

			.default-content .anchor li a {
				color: #141414;
			}

			.topbar a:not(.topbar__tel),
			.topbar a:not(.topbar__tel):hover {
				color: #1b1d22 !important;
			}

			.topbar__tel {
				color: #fff !important;
				background: <?php the_field('theme_color', 'option'); ?> !important;
			}

			.megamenu__main-category,
			.header__nav>li>a,
			.megamenu__categories-item {
				border-bottom: 1px solid #fff;
			}

			.woocommerce-mini-cart::-webkit-scrollbar-track {
				background: #fff;
			}

			.woocommerce-mini-cart::-webkit-scrollbar-thumb {
				background-color: <?php the_field('theme_color', 'option'); ?>;
			}

			.woocommerce-mini-cart:root {
				scrollbar-width: thin;
				scrollbar-color: <?php the_field('theme_color', 'option'); ?> #fff;
			}


		}

		@media(min-width: 992px) {
			.posts-filters li a {
				border-color: #000;
			}
		}

		@media(max-width: 991px) {

			.terms a,
			.copyright {

				color: #060200;
			}

			.develop {

				border-top: 1px solid #e0e1e1;
			}

			.posts-filters__dropdown {
				border-color: #e6e6e6;
				background-color: #fff;
			}
		}

		@media(max-width: 767px) {
			.main-slider__link {
				background-color: <?php the_field('theme_color', 'option'); ?>;
				color: #fff;
			}

			.footer-item:not(:last-child):after,
			.footer .form-subscribe-title:after {

				background-color: #e0e0e0;
			}

			.has-dropdown.in .header-icons {
				background-color: <?php the_field('theme_color', 'option'); ?>;
			}

			.has-dropdown.in.header__search .header-icons {
				background: #f6f5f3;
			}

			.search {
				background-color: #fff;
				border-top: 1px solid #efefef
			}

			.search input[type=submit] {
				background-image: url('/wp-content/themes/camptown/img/search-black.svg');
			}

			.article,
			.related-articles,
			.related-articles .post-card {
				background-color: #f6f6f6;
			}

			.products-filter .nice-select {
				color: <?php the_field('default_text', 'option'); ?>;

			}

			.article__bottom,
			.products-filter .nice-select {
				background-color: #fff;
			}

			.products-filter .nice-select {
				border-color: #dedede;
			}

			.products-filter>div {
				border-right: 1px solid #dedede;
			}

			.related-articles .post-card>a {
				background: #fff;
			}

		}
	</style>


</head>

<body <?php body_class(); ?>>
	<div class="wrapper">
		<header class="header">


			<div class="container-fluid">
				<div class="header__bar">
					<div class="header__toggler">
						<span></span>
					</div>


					<?php $custom_logo = wp_get_attachment_image_src(get_theme_mod('custom_logo'), 'full'); ?>
					<?php if (is_front_page()) { ?>
						<div class="header__logo">
							<img class="header__logo-img" src="<?= $custom_logo[0]; ?>" alt="<?php bloginfo('name'); ?>">
						</div>
					<? } else { ?>
						<a class="header__logo" href="<?= get_home_url(); ?>" title="<?php bloginfo('name'); ?>">
							<img class="header__logo-img" src="<?= $custom_logo[0]; ?>" alt="<?php bloginfo('name'); ?>">
						</a>
					<?php } ?>
					<div class="header__buttons">
						<div class="header__search with-tooltip has-dropdown">
							<div class="header-icons">
								<div class="header-icons__inner">
									<img src="/wp-content/themes/camptown/img/search-black.svg" alt="">
									<img src="/wp-content/themes/camptown/img/search-color.svg" alt="">
								</div>
								<div class="search-close"><i class="icon-close-thin"></i></div>
							</div>
							<div class="tooltip">חיפוש</div>
							<div class="search">
								<div class="search__inner">

									<form role="search" method="get" id="searchform" action="/">
										<input type="submit" id="searchsubmit" value="" />

										<input type="text" value="<?php echo get_search_query() ?>" placeholder="חיפוש" name="s" id="s" />
									</form>

                                    <div class="search-result-list" id="search-form-result">
                                        <div class="items">
                                        <?php
                                        $args = array(
                                            'posts_per_page' => -1,
                                            'post_type' => 'product',
                                            'post_status' =>'publish'
                                        );
                                        $products = new WP_Query($args);
                                        if($products->posts) {
                                            foreach($products->posts as $v) {
                                                $product = wc_get_product( $v->ID );
                                                $image = wp_get_attachment_image_src( get_post_thumbnail_id( $v->ID ), 'thumbnail' );
                                                echo '<div class="item">
                                                    <div class="searchable">'.$v->post_title.' '.$product->get_sku().'</div>
                                                    <a href="'.get_the_permalink($v->ID).'">
                                                        <span class="image">';
                                                        if($image) {
                                                            echo '<img src="'.$image[0].'" />';
                                                        }
                                                        echo '</span>
                                                        <span class="info">
                                                            <span class="name">'.$v->post_title.'</span>
                                                            <span class="sku">'.$product->get_sku().'</span>
                                                        </span>
                                                    </a>
                                                </div>';
                                            }
                                        }

                                        $cat_args = array(
                                            'orderby'    => 'name',
                                            'order'      => 'asc',
                                            'hide_empty' => false,
                                        );
                                        $product_categories = get_terms( 'product_cat', $cat_args);
                                        if($product_categories) {
                                            foreach ($product_categories as $v) {
                                                $thumbnail_id = get_term_meta($v->term_id, 'thumbnail_id', true );
                                                $image = wp_get_attachment_url($thumbnail_id);

                                                echo '<div class="item item-category">
                                                    <div class="searchable">'.$v->name.'</div>
                                                    <a href="'.get_category_link($v->term_id).'">
                                                        <span class="image">';
                                                if($image) {
                                                    echo '<img src="'.$image.'" />';
                                                }
                                                echo '</span>
                                                        <span class="info">
                                                            <span class="name">'.$v->name.'</span>
                                                        </span>
                                                    </a>
                                                </div>';
                                            }
                                        }
                                        ?>
                                        </div>
                                    </div>

									<!-- <form action="">
							<input type="search" placeholder="חיפוש">
							<input type="submit" value="">
						</form> -->
								</div>
							</div>
						</div>


						<?php if (is_user_logged_in()) { ?>
							<div class="header__login with-tooltip has-dropdown">
								<div class="header-icons">
									<div class="header-icons__inner desktop-icons ">
										<img src="/wp-content/themes/camptown/img/user-black.svg" alt="">
										<img src="/wp-content/themes/camptown/img/user-color.svg" alt="">
									</div>
									<div class="header-icons__inner mobile-icons">
										<img src="/wp-content/themes/camptown/img/user-black.svg" alt="">
										<img src="/wp-content/themes/camptown/img/user-white.svg" alt="">
									</div>
								</div>
								<div class="tooltip">אזור אישי</div>

								<ul class="dropdown">
									<li>
										<a href="/my-account/edit-address/">
											<div class="dropdown__icons">
												<img src="/wp-content/themes/camptown/img/user-black.svg" alt="">
												<img src="/wp-content/themes/camptown/img/user-color.svg" alt="">
											</div>

											אזור אישי
										</a>
									</li>
									<li>
										<a href="/my-account/orders/">
											<div class="dropdown__icons">
												<img src="/wp-content/themes/camptown/img/orders-black.svg" alt="">
												<img src="/wp-content/themes/camptown/img/orders-color.svg" alt="">
											</div>
											ההזמנות שלי
										</a>
									</li>
									<li>
										<a href="/my-account/my-club/">
											<div class="dropdown__icons">
												<img src="/wp-content/themes/camptown/img/star-black.svg" alt="">
												<img src="/wp-content/themes/camptown/img/star-color.svg" alt="">
											</div>
											מועדון לקוחות
										</a>
									</li>
									<li>
										<a href="/my-account/my-service/">
											<div class="dropdown__icons">
												<img src="/wp-content/themes/camptown/img/service-black.svg" alt="">
												<img src="/wp-content/themes/camptown/img/service-color.svg" alt="">
											</div>
											קריאות שירות שנפתחו
										</a>
									</li>
									<li>
										<a href="#logout" class="modal-btn">
											<div class="dropdown__icons">
												<img src="/wp-content/themes/camptown/img//logout-black.svg" alt="">
												<img src="/wp-content/themes/camptown/img//logout-color.svg" alt="">
											</div>
											התנתק
										</a>
									</li>
								</ul>
							</div>



						<?php } else { ?>
							<div class="header__login with-tooltip has-dropdown">
								<a href="#loginModal" class="header-icons modal-btn">
									<div class="header-icons__inner">
										<img src="/wp-content/themes/camptown/img/user-black.svg" alt="">
										<img src="/wp-content/themes/camptown/img/user-color.svg" alt="">
									</div>
								</a>
								<div class="tooltip">אזור אישי</div>
							</div>

						<?php }  ?>


						<?php if (is_user_logged_in()) { ?>

							<div class="header__wishlist with-tooltip">



								<a href="/my-account/my-wishlist/" class="header-icons">


									<div class="header-icons__inner">
										<img src="/wp-content/themes/camptown/img/heart-black.svg" alt="">
										<img src="/wp-content/themes/camptown/img/heart-color.svg" alt="">
									</div>
								</a>
								<div class="tooltip">מועדפים</div>
							</div>
						<?php } else { ?>
							<div class="header__wishlist with-tooltip">



								<a href="#loginModal" class="header-icons modal-btn">


									<div class="header-icons__inner">
										<img src="/wp-content/themes/camptown/img/heart-black.svg" alt="">
										<img src="/wp-content/themes/camptown/img/heart-color.svg" alt="">
									</div>
								</a>
								<div class="tooltip">מועדפים</div>
							</div>

						<?php } ?>
						<div class="header__cart  with-tooltip">
							<div class="header-icons">
								<div class="header-icons__inner">
									<img src="/wp-content/themes/camptown/img/backpack-black.svg" alt="">
									<img src="/wp-content/themes/camptown/img/backpack-color.svg" alt="">
								</div>
							</div>
							<div class="tooltip">סל קניות</div>

							<span class="cart-btn__quantity"><span><?php echo WC()->cart->get_cart_contents_count(); ?></span></span>
						</div>
					</div>





				</div>
			</div>

			<div class="header-menu">

				<ul class="header__nav ">
					<?php wp_nav_menu(array('container' => '', 'items_wrap' => '%3$s', 'theme_location' => 'primary')); ?>
				</ul>
				<div class="topbar">

					<div class="container-fluid">


						<?php if (have_rows('top_bar_menu', 'option')) : ?>
							<?php while (have_rows('top_bar_menu', 'option')) : the_row(); ?>
								<a href="<?= get_sub_field('link', 'option')['url'] ?>"><?= get_sub_field('link', 'option')['title'] ?></a>
							<?php endwhile; ?>
						<?php endif; ?>


						<a href="tel:5060" class="topbar__tel tel">
							<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 48 48" style="enable-background:new 0 0 48 48;" xml:space="preserve">

								<g>
									<g>
										<path fill="#fff" d="M27.3,48H24c-2.4,0-4.4-2-4.4-4.4c0-2.4,2-4.4,4.4-4.4h3.3c2.4,0,4.4,2,4.4,4.4C31.6,46,29.7,48,27.3,48z
 M24,41.5c-1.2,0-2.2,1-2.2,2.2c0,1.2,1,2.2,2.2,2.2h3.3c1.2,0,2.2-1,2.2-2.2c0-1.2-1-2.2-2.2-2.2H24z" />
									</g>
									<g>
										<path fill="#fff" d="M35.5,44.7h-4.9c-0.6,0-1.1-0.5-1.1-1.1c0-0.6,0.5-1.1,1.1-1.1h4.9c2.1,0,3.8-1.7,3.8-3.8v-4.9
c0-0.6,0.5-1.1,1.1-1.1s1.1,0.5,1.1,1.1v4.9C41.5,42,38.8,44.7,35.5,44.7z" />
									</g>
									<g>
										<path fill="#fff" d="M40.4,34.9h-1.6c-1.5,0-2.7-1.2-2.7-2.7v-9.8c0-1.5,1.2-2.7,2.7-2.7h1.6c3.3,0,6,2.7,6,6v3.3
C46.4,32.2,43.7,34.9,40.4,34.9z M38.7,21.8c-0.3,0-0.5,0.2-0.5,0.5v9.8c0,0.3,0.2,0.5,0.5,0.5h1.6c2.1,0,3.8-1.7,3.8-3.8v-3.3
c0-2.1-1.7-3.8-3.8-3.8H38.7z" />
									</g>
									<g>
										<path fill="#fff" d="M9.3,34.9H7.6c-3.3,0-6-2.7-6-6v-3.3c0-3.3,2.7-6,6-6h1.6c1.5,0,2.7,1.2,2.7,2.7v9.8C12,33.7,10.8,34.9,9.3,34.9z
 M7.6,21.8c-2.1,0-3.8,1.7-3.8,3.8v3.3c0,2.1,1.7,3.8,3.8,3.8h1.6c0.3,0,0.5-0.2,0.5-0.5v-9.8c0-0.3-0.2-0.5-0.5-0.5H7.6z" />
									</g>
									<g>
										<path fill="#fff" d="M40.4,21.8c-0.6,0-1.1-0.5-1.1-1.1v-3.3C39.3,9,32.4,2.2,24,2.2S8.7,9,8.7,17.5v3.3c0,0.6-0.5,1.1-1.1,1.1
s-1.1-0.5-1.1-1.1v-3.3C6.5,7.8,14.4,0,24,0s17.5,7.8,17.5,17.5v3.3C41.5,21.3,41,21.8,40.4,21.8z" />
									</g>
								</g>
							</svg>

							<?php the_field('top_bar_text', 'option') ?>
						</a>
					</div>
				</div>

				<?php
				$args = array(
					'post_type' => 'mega_menu',
					'post_status' => 'publish',
					'posts_per_page' => -1
				);

				$query = new WP_Query($args);
				while ($query->have_posts()) {
					$query->the_post();
				?>


					<div id="mega-menu__<?php the_ID(); ?>" class="megamenu">
						<div class="megamenu__inner">
							<div class="megamenu__close"><i class="icon-arrow-back-mobile"></i> חזרה</div>

							<div class="megamenu__main-category">
								<?php if (get_field('main_category_link')) :
									$value = get_field('main_category_link');
									$target = $value['target'] ? $value['target'] : '_self';
								?>

									<div class="megamenu__main-category-image">
										<img src="<?php the_field('main_category_image'); ?>" alt="<?php echo $value['title'] ?>">
									</div>

									<?php if (wp_is_mobile()) { ?>
										<a href="<?php echo $value['url'] ?>" target="<?php echo esc_attr($target); ?>" class="megamenu__main-category-title"><?php echo $value['title'] ?></a>
									<?php } else { ?>
										<div class="megamenu__main-category-title"><?php echo $value['title'] ?></div>
									<?php } ?>

									<a href="<?php echo $value['url'] ?>" target="<?php echo esc_attr($target); ?>" class="megamenu__main-category-link site-color-btn btn">
										לכל המוצרים
										<i class="icon-arrow-left"></i>
									</a>

								<?php endif; ?>
							</div>


							<div class="megamenu__categories">
								<div class="megamenu__categories-right">
									<?php if (have_rows('main_subategory_right')) : ?>
										<?php while (have_rows('main_subategory_right')) : the_row(); ?>


											<?php if (get_sub_field('sub_category')) :
												$value = get_sub_field('sub_category');
												$target = $value['target'] ? $value['target'] : '_self';
											?>
												<div class="megamenu__categories-item">
													<div class="megamenu__sub-category-title">
														<div class="megamenu__open-sub-sub-menu"></div>
														<div class="megamenu__categories-img">
															<img src="<?php the_sub_field('sub_category_icon'); ?>" alt="<?php echo $value['title'] ?>">
														</div>
														<a href="<?php echo $value['url'] ?>" target="<?php echo esc_attr($target); ?>">
															<?php echo $value['title'] ?>
															<i class="icon-arrow-left"></i>
														</a>
													</div>

													<?php if (have_rows('sub_categories')) : ?>
														<ul class="megamenu__sub-sub-categories">
															<?php while (have_rows('sub_categories')) : the_row(); ?>



																<?php if (get_sub_field('link')) :
																	$value = get_sub_field('link');
																	$target = $value['target'] ? $value['target'] : '_self';
																?>
																	<li>
																		<a href="<?php echo $value['url'] ?>" target="<?php echo esc_attr($target); ?>">
																			<?php echo $value['title'] ?>
																		</a>
																	</li>
																<?php endif; ?>



															<?php endwhile; ?>
														</ul>
													<?php endif; ?>
												</div>

											<?php endif; ?>

										<?php /*$category_link = get_sub_field('subcategory'); ?>
										<div clasS="megamenu__categories-item">
											<?php if ($category_link) : ?>
												<div class="megamenu__sub-category-title">
													<div class="megamenu__open-sub-sub-menu"></div>
													<div class="megamenu__categories-img">
														<img src="<?= get_field('icon', $category_link)['url']; ?>" alt="<?php echo esc_html($category_link->name); ?>">
													</div>
													<a href="<?php echo esc_url(get_term_link($category_link)); ?>">
														<?php echo esc_html($category_link->name); ?>
														<i class="icon-arrow-left"></i>
													</a>
												</div>

											<?php endif; ?>
											<?php $sub_category_link = get_sub_field('subcategories'); ?>
											<?php if ($sub_category_link) : ?>
												<ul class="megamenu__sub-sub-categories">
													<?php foreach ($sub_category_link as $term) : ?>
														<li><a href="<?php echo esc_url(get_term_link($term)); ?>"><?php echo esc_html($term->name); ?></a></li>
													<?php endforeach; ?>
												</ul>
											<?php endif; ?>
										</div>
									<?php */ endwhile; ?>
									<?php endif; ?>
								</div>




								<div class="megamenu__categories-center">
									<?php if (have_rows('main_subcategory_center')) : ?>
										<?php while (have_rows('main_subcategory_center')) : the_row(); ?>

											<?php if (get_sub_field('sub_category')) :
												$value = get_sub_field('sub_category');
												$target = $value['target'] ? $value['target'] : '_self';
											?>
												<div class="megamenu__categories-item">
													<div class="megamenu__sub-category-title">
														<div class="megamenu__open-sub-sub-menu"></div>
														<div class="megamenu__categories-img">
															<img src="<?php the_sub_field('sub_category_icon'); ?>" alt="<?php echo $value['title'] ?>">
														</div>
														<a href="<?php echo $value['url'] ?>" target="<?php echo esc_attr($target); ?>">
															<?php echo $value['title'] ?>
															<i class="icon-arrow-left"></i>
														</a>
													</div>

													<?php if (have_rows('sub_categories')) : ?>
														<ul class="megamenu__sub-sub-categories">
															<?php while (have_rows('sub_categories')) : the_row(); ?>



																<?php if (get_sub_field('link')) :
																	$value = get_sub_field('link');
																	$target = $value['target'] ? $value['target'] : '_self';
																?>
																	<li>
																		<a href="<?php echo $value['url'] ?>" target="<?php echo esc_attr($target); ?>">
																			<?php echo $value['title'] ?>
																		</a>
																	</li>
																<?php endif; ?>



															<?php endwhile; ?>
														</ul>
													<?php endif; ?>
												</div>
											<?php endif; ?>

										<?php /*$category_link = get_sub_field('subcategory'); ?>
										<div clasS="megamenu__categories-item">
											<?php if ($category_link) : ?>
												<div class="megamenu__sub-category-title">
													<div class="megamenu__open-sub-sub-menu"></div>
													<div class="megamenu__categories-img">
														<img src="<?= get_field('icon', $category_link)['url']; ?>" alt="<?php echo esc_html($category_link->name); ?>">
													</div>
													<a href="<?php echo esc_url(get_term_link($category_link)); ?>">
														<?php echo esc_html($category_link->name); ?>
														<i class="icon-arrow-left"></i>
													</a>
												</div>
											<?php endif; ?>
											<?php $sub_category_link = get_sub_field('subcategories'); ?>
											<?php if ($sub_category_link) : ?>
												<ul class="megamenu__sub-sub-categories">
													<?php foreach ($sub_category_link as $term) : ?>
														<li><a href="<?php echo esc_url(get_term_link($term)); ?>"><?php echo esc_html($term->name); ?></a></li>
													<?php endforeach; ?>
												</ul>
											<?php endif; ?>
										</div>
									<?php */ endwhile; ?>
									<?php endif; ?>
								</div>

								<?php if (have_rows('main_subcategory_left')) : ?>

									<div class="megamenu__categories-left">
										<?php while (have_rows('main_subcategory_left')) : the_row(); ?>

											<?php if (get_sub_field('sub_category')) :
												$value = get_sub_field('sub_category');
												$target = $value['target'] ? $value['target'] : '_self';
											?>
												<div class="megamenu__categories-item">
													<div class="megamenu__sub-category-title">
														<div class="megamenu__open-sub-sub-menu"></div>
														<div class="megamenu__categories-img">
															<img src="<?php the_sub_field('sub_category_icon'); ?>" alt="<?php echo $value['title'] ?>">
														</div>
														<a href="<?php echo $value['url'] ?>" target="<?php echo esc_attr($target); ?>">
															<?php echo $value['title'] ?>
															<i class="icon-arrow-left"></i>
														</a>
													</div>

													<?php if (have_rows('sub_categories')) : ?>
														<ul class="megamenu__sub-sub-categories">
															<?php while (have_rows('sub_categories')) : the_row(); ?>



																<?php if (get_sub_field('link')) :
																	$value = get_sub_field('link');
																	$target = $value['target'] ? $value['target'] : '_self';
																?>
																	<li>
																		<a href="<?php echo $value['url'] ?>" target="<?php echo esc_attr($target); ?>">
																			<?php echo $value['title'] ?>
																		</a>
																	</li>
																<?php endif; ?>



															<?php endwhile; ?>
														</ul>
													<?php endif; ?>
												</div>
											<?php endif; ?>


										<?php /*$category_link = get_sub_field('subcategory'); ?>
										<div clasS="megamenu__categories-item">
											<?php if ($category_link) : ?>
												<div class="megamenu__sub-category-title">
													<div class="megamenu__open-sub-sub-menu"></div>
													<div class="megamenu__categories-img">
														<img src="<?= get_field('icon', $category_link)['url']; ?>" alt="<?php echo esc_html($category_link->name); ?>">
													</div>
													<a href="<?php echo esc_url(get_term_link($category_link)); ?>">
														<?php echo esc_html($category_link->name); ?>
														<i class="icon-arrow-left"></i>
													</a>
												</div>
											<?php endif; ?>
											<?php $sub_category_link = get_sub_field('subcategories'); ?>
											<?php if ($sub_category_link) : ?>
												<ul class="megamenu__sub-sub-categories">
													<?php foreach ($sub_category_link as $term) : ?>
														<li><a href="<?php echo esc_url(get_term_link($term)); ?>"><?php echo esc_html($term->name); ?></a></li>
													<?php endforeach; ?>
												</ul>
											<?php endif; ?>
										</div>
										
									<?php */ endwhile; ?>
									</div>
								<?php endif; ?>

							</div>
							<?php if (have_rows('page_block')) : ?>
								<div class="page-block">
									<?php while (have_rows('page_block')) : the_row(); ?>





										<a href="<?php echo get_sub_field('link')['url']; ?>">
											<div class="page-block__image">
												<img src="<?php echo get_sub_field('image')['url'] ?>" alt="<?php echo get_sub_field('image')['alt'] ?>">
											</div>
											<div class="page-block__title">
												<?php echo esc_html(get_sub_field('title')); ?>
											</div>

											<div class="arrow-btn">קרא עוד</div>

										</a>


									<?php endwhile; ?>
								</div>
							<?php endif; ?>
						</div>

					</div>


				<?php }
				wp_reset_query(); ?>





			</div>




			<div class="mini-cart left-modal" id="mini-cart">
				<div class="left-modal__title">
					<div class="left-modal__close">
						<i class="icon-cross"></i>
					</div>
					סל קניות

				</div>
				<div class="widget_shopping_cart_content">
					<?php woocommerce_mini_cart(); ?>
				</div>
			</div>
			<div class="left-modal__overlay"></div>








		</header>