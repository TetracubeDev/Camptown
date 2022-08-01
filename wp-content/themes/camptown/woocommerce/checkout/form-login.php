<?php

/**
 * Checkout login form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-login.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.8.0
 */

defined('ABSPATH') || exit;

if (is_user_logged_in() || 'no' === get_option('woocommerce_enable_checkout_login_reminder')) {
    return;
}

?>

<div class="checkout-custom-login">
    <div class="login-socials__login-form">
        <?php

        woocommerce_login_form(
            array(
                // 'message'  => esc_html__( 'If you have shopped with us before, please enter your details below. If you are a new customer, please proceed to the Billing section.', 'woocommerce' ),
                'message'  => esc_html__('כניסה ללקוחות רשומים', 'woocommerce'),
                'redirect' => wc_get_checkout_url(),
                'hidden'   => false,
            )
        );
        ?>
    </div>
    <div class="login-socials checkout-custom-login__login-socials">
        <a href="#">
            <svg viewBox="0 0 24 24" width="24" height="24" xmlns="http://www.w3.org/2000/svg">
                <g transform="matrix(1, 0, 0, 1, 27.009001, -39.238998)">
                    <path fill="#4285F4" d="M -3.264 51.509 C -3.264 50.719 -3.334 49.969 -3.454 49.239 L -14.754 49.239 L -14.754 53.749 L -8.284 53.749 C -8.574 55.229 -9.424 56.479 -10.684 57.329 L -10.684 60.329 L -6.824 60.329 C -4.564 58.239 -3.264 55.159 -3.264 51.509 Z"></path>
                    <path fill="#34A853" d="M -14.754 63.239 C -11.514 63.239 -8.804 62.159 -6.824 60.329 L -10.684 57.329 C -11.764 58.049 -13.134 58.489 -14.754 58.489 C -17.884 58.489 -20.534 56.379 -21.484 53.529 L -25.464 53.529 L -25.464 56.619 C -23.494 60.539 -19.444 63.239 -14.754 63.239 Z"></path>
                    <path fill="#FBBC05" d="M -21.484 53.529 C -21.734 52.809 -21.864 52.039 -21.864 51.239 C -21.864 50.439 -21.724 49.669 -21.484 48.949 L -21.484 45.859 L -25.464 45.859 C -26.284 47.479 -26.754 49.299 -26.754 51.239 C -26.754 53.179 -26.284 54.999 -25.464 56.619 L -21.484 53.529 Z"></path>
                    <path fill="#EA4335" d="M -14.754 43.989 C -12.984 43.989 -11.404 44.599 -10.154 45.789 L -6.734 42.369 C -8.804 40.429 -11.514 39.239 -14.754 39.239 C -19.444 39.239 -23.494 41.939 -25.464 45.859 L -21.484 48.949 C -20.534 46.099 -17.884 43.989 -14.754 43.989 Z"></path>
                </g>
            </svg>
            כניסה עם Google
        </a>
        <a href="#">
            <svg xmlns="http://www.w3.org/2000/svg" height="800" width="1200" viewBox="-204.79995 -341.33325 1774.9329 2047.9995">
                <path d="M1365.333 682.667C1365.333 305.64 1059.693 0 682.667 0 305.64 0 0 305.64 0 682.667c0 340.738 249.641 623.16 576 674.373V880H402.667V682.667H576v-150.4c0-171.094 101.917-265.6 257.853-265.6 74.69 0 152.814 13.333 152.814 13.333v168h-86.083c-84.804 0-111.25 52.623-111.25 106.61v128.057h189.333L948.4 880H789.333v477.04c326.359-51.213 576-333.635 576-674.373" fill="#1877f2"></path>
                <path d="M948.4 880l30.267-197.333H789.333V554.609C789.333 500.623 815.78 448 900.584 448h86.083V280s-78.124-13.333-152.814-13.333c-155.936 0-257.853 94.506-257.853 265.6v150.4H402.667V880H576v477.04a687.805 687.805 0 00106.667 8.293c36.288 0 71.91-2.84 106.666-8.293V880H948.4" fill="#fff"></path>
            </svg>

            כניסה עם Facebook
        </a>

    </div>

</div>


<div class="form-group">
    <p class="form-group__title">לקוחות חדשים? </p>
    <p class="form-group__subtitle">ניתן להמשיך בתהליך הרכישה כאורח או ליצור חשבון אם תרצו.</p>
    <div class="form-group__inputs">
        <input class="newAccFName" type="text" placeholder="* שם פרטי">
        <input class="newAccLName" type="text" placeholder="* שם משפחה">
        <input class="newAccLEmail" type="email" placeholder="* כתובת אימייל">
        <input class="newAccLTel" type="tel" placeholder="* מספר טלפון">
    </div>
    <label for="create-user" class="form-group__checkbox">
        <input type="checkbox" id="create-user">
        <span>ליצור חשבון לקוח בסיום ההזמנה </span>
    </label>


    <div class="form-group__wide passMask pass-new" >
        <span class="show-password-input"></span>
        <input type="password" placeholder="* סיסמה" id="pass-new-1">

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

</div>

<div class="text-left">
    <span class="btn site-color-btn nextAccordion" >המשך</span>
</div>