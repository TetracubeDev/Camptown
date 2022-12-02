<footer class="footer">
    <div class="container">
        <div class="footer-top">
            <div class="footer-item in footer-address">

                <?php if (have_rows('footer_1', 'option')) : ?>
                    <?php while (have_rows('footer_1', 'option')) : the_row(); ?>
                        <?php if (have_rows('footer_address', 'option')) : ?>
                            <?php while (have_rows('footer_address', 'option')) : the_row(); ?>
                                <div class="item">
                                    <div class="footer-item-title in">
                                        <?php the_sub_field('title', 'option') ?>
                                    </div>
                                    <p><?php the_sub_field('text', 'option') ?></p>
                                </div>
                            <?php endwhile; ?>
                        <?php endif; ?>
                        <?php if (have_rows('footer_contacts', 'option')) : ?>
                            <?php while (have_rows('footer_contacts', 'option')) : the_row(); ?>
                                <div class="item">
                                    <div class="item-title">
                                        <?php the_sub_field('title', 'option') ?>
                                    </div>
                                    <?php while (have_rows('contacts', 'option')) : the_row(); ?>


                                        <p> טלפון: <a href="tel:<?php the_sub_field('phone', 'option') ?>" class="tel"><?php the_sub_field('phone', 'option') ?></a></p>
                                        <p> דוא”ל: <a href="mailto:<?php the_sub_field('e-mail', 'option') ?>"><?php the_sub_field('e-mail', 'option') ?></a></p>
                                        <p> שעות פעילות: <?php the_sub_field('activity_time', 'option') ?></p>



                                    <?php endwhile; ?>
                                </div>
                            <?php endwhile; ?>
                        <?php endif; ?>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>

            <div class="footer-item">
                <?php if (have_rows('footer_2', 'option')) : ?>
                    <?php while (have_rows('footer_2', 'option')) : the_row(); ?>
                        <div class="footer-item-title  toggle"><?php the_sub_field('title') ?></div>
                        <div class="toggle-item footer-menu">
                            <div class="menu-footer-menu-container">
                                <ul class="menu">
                                    <?php while (have_rows('menu', 'option')) : the_row(); ?>
                                        <?php $footer_2_link =  get_sub_field('link')  ?>
                                        <li><a href="<?php echo $footer_2_link['url'] ?>"><?php echo $footer_2_link['title'] ?></a></li>
                                    <?php endwhile; ?>
                                </ul>

                            </div>
                        </div>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>

            <div class="footer-item">
                <?php if (have_rows('footer_3', 'option')) : ?>
                    <?php while (have_rows('footer_3', 'option')) : the_row(); ?>
                        <div class="footer-item-title  toggle"><?php the_sub_field('title') ?></div>
                        <div class="toggle-item footer-menu">
                            <div class="menu-footer-menu-container">
                                <ul class="menu">
                                    <?php while (have_rows('menu', 'option')) : the_row(); ?>
                                        <?php $footer_3_link =  get_sub_field('link')  ?>
                                        <li><a href="<?php echo $footer_3_link['url'] ?>"><?php echo $footer_3_link['title'] ?></a></li>
                                    <?php endwhile; ?>
                                </ul>

                            </div>
                        </div>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>

            <div class="footer-item">
                <?php if (have_rows('footer_4', 'option')) : ?>
                    <?php while (have_rows('footer_4', 'option')) : the_row(); ?>
                        <div class="footer-item-title  toggle"><?php the_sub_field('title') ?></div>
                        <div class="toggle-item footer-menu">
                            <div class="menu-footer-menu-container">
                                <ul class="menu">
                                    <?php while (have_rows('menu', 'option')) : the_row(); ?>
                                        <?php $footer_4_link =  get_sub_field('link')  ?>
                                        <li><a href="<?php echo $footer_4_link['url'] ?>"><?php echo $footer_4_link['title'] ?></a></li>
                                    <?php endwhile; ?>
                                </ul>

                            </div>
                        </div>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>


            <div class="footer-item">

                <?php if (have_rows('footer_5', 'option')) : ?>
                    <?php while (have_rows('footer_5', 'option')) : the_row(); ?>

                        <div class="footer-item-title  toggle"><?php the_sub_field('title') ?></div>

                        <div class="toggle-item footer-menu">
                            <div class="menu-footer-menu-container">
                                <ul class="menu">
                                    <?php while (have_rows('menu', 'option')) : the_row(); ?>
                                        <?php $footer_5_link =  get_sub_field('link')  ?>
                                        <li><a href="<?php echo $footer_5_link['url'] ?>"><?php echo $footer_5_link['title'] ?></a></li>
                                    <?php endwhile; ?>
                                </ul>

                            </div>
                        </div>

                    <?php endwhile; ?>
                <?php endif; ?>


                <?php if (have_rows('subscribe_form', 'option')) : ?>
                    <?php while (have_rows('subscribe_form', 'option')) : the_row(); ?>

                        <?= do_shortcode(get_sub_field('form_shortcode')); ?>

                        <?php if (have_rows('socials', 'option')) : ?>
                            <?php while (have_rows('socials', 'option')) : the_row(); ?>
                                <div class="item">
                                    <div class="socials">
                                        <a href="<?php the_sub_field('facebook', 'option'); ?>" target="_blank">
                                            <i class="icon-facebook"></i>
                                        </a>
                                        <a href="<?php the_sub_field('instagram', 'option'); ?>" target="_blank">
                                            <i class="icon-insta"></i>

                                        </a>
                                        <a href="<?php the_sub_field('youtube', 'option'); ?>" target="_blank">
                                            <i class="icon-youtube"></i>

                                        </a>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                        <?php endif; ?>
            </div>
        <?php endwhile; ?>
    <?php endif; ?>


        </div>
        <div class="footer-advantages">
            <?php if (have_rows('footer_advantages', 'option')) : ?>
                <?php while (have_rows('footer_advantages', 'option')) : the_row(); ?>
                    <div class="item">
                        <div class="image default-icon">
                            <img src="<?php the_sub_field('image', 'option'); ?>" alt="">
                        </div>
                        <p><?php the_sub_field('title', 'option'); ?> </p>
                    </div>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
        <div class="terms">
            <?php the_field('footer_terms', 'option') ?>
        </div>
    </div>
    <div class="container">
        <div class="footer-bottom">
            <div class="copyright"><?= date("Y"); ?> &copy; <?php the_field('copyright', 'option'); ?></div>
            <div class="footer-payment"><img src="<?php the_field('footer_payment_info', 'option') ?>" alt="Payment">
            </div>
            <div class="develop">
                <?php the_field('developers', 'option'); ?>
                <a href="https://digitouch.co.il/services/building-wordpress-sites/" target="_blank"><img src="<?php the_field('digitouch-logo', 'option'); ?>" alt="בניית אתרים" /></a>
            </div>
        </div>
    </div>



    <a href="https://wa.me/<?php the_field('whatsapp', 'option') ?>" class="whatsapp" target="_blank">


        ייעוץ
        בוואטסאפ

        <i class="icon-whatsapp"></i>
    </a>

    <div class="back-to-top">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">
            <!--! Font Awesome Pro 6.0.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
            <path d="M352 352c-8.188 0-16.38-3.125-22.62-9.375L192 205.3l-137.4 137.4c-12.5 12.5-32.75 12.5-45.25 0s-12.5-32.75 0-45.25l160-160c12.5-12.5 32.75-12.5 45.25 0l160 160c12.5 12.5 12.5 32.75 0 45.25C368.4 348.9 360.2 352 352 352z" />
        </svg>
    </div>
</footer>

</div>
<!--end wrapper-->

<div class="mini-cart left-modal" id="mini-cart">
    <div class="cont"><?php /*woocommerce_mini_cart();*/ ?></div>
</div>





<div class="modal logout-modal" id="logout">


    <div class="modal__inner ">
        <div class="modal__close  modal-close-btn">
            <i class="icon-close-thin"></i>
        </div>
        <div class="modal__title">
            האם ברצונך להתנתק מהאתר?

        </div>
        <div class="modal__buttons logout-buttons">
            <?php if (is_account_page()) { ?>
                <a href="<?php echo wp_logout_url(home_url()); ?>">כן</a>
            <?php } else { ?>
                <a href="<?php echo wp_logout_url(get_permalink()); ?>">כן</a>
            <?php } ?>

            <div class=" dont-logout  modal-close-btn">
                בטל
            </div>

        </div>
    </div>
</div>

<div class="modal login-modal" id="loginModal">


    <div class="modal__inner ">
        <div class="modal__close  modal-close-btn">
            <i class="icon-close-thin"></i>
        </div>


        <?php wc_get_template('myaccount/form-login.php'); ?>

        <div class="login-socials">
            <div class="login-socials__divider"><span>או</span></div>
            <a href="#">
                <svg viewBox="0 0 24 24" width="24" height="24" xmlns="http://www.w3.org/2000/svg">
                    <g transform="matrix(1, 0, 0, 1, 27.009001, -39.238998)">
                        <path fill="#4285F4" d="M -3.264 51.509 C -3.264 50.719 -3.334 49.969 -3.454 49.239 L -14.754 49.239 L -14.754 53.749 L -8.284 53.749 C -8.574 55.229 -9.424 56.479 -10.684 57.329 L -10.684 60.329 L -6.824 60.329 C -4.564 58.239 -3.264 55.159 -3.264 51.509 Z" />
                        <path fill="#34A853" d="M -14.754 63.239 C -11.514 63.239 -8.804 62.159 -6.824 60.329 L -10.684 57.329 C -11.764 58.049 -13.134 58.489 -14.754 58.489 C -17.884 58.489 -20.534 56.379 -21.484 53.529 L -25.464 53.529 L -25.464 56.619 C -23.494 60.539 -19.444 63.239 -14.754 63.239 Z" />
                        <path fill="#FBBC05" d="M -21.484 53.529 C -21.734 52.809 -21.864 52.039 -21.864 51.239 C -21.864 50.439 -21.724 49.669 -21.484 48.949 L -21.484 45.859 L -25.464 45.859 C -26.284 47.479 -26.754 49.299 -26.754 51.239 C -26.754 53.179 -26.284 54.999 -25.464 56.619 L -21.484 53.529 Z" />
                        <path fill="#EA4335" d="M -14.754 43.989 C -12.984 43.989 -11.404 44.599 -10.154 45.789 L -6.734 42.369 C -8.804 40.429 -11.514 39.239 -14.754 39.239 C -19.444 39.239 -23.494 41.939 -25.464 45.859 L -21.484 48.949 C -20.534 46.099 -17.884 43.989 -14.754 43.989 Z" />
                    </g>
                </svg>
                כניסה עם Google
            </a>
            <a href="#">
                <svg xmlns="http://www.w3.org/2000/svg" height="800" width="1200" viewBox="-204.79995 -341.33325 1774.9329 2047.9995">
                    <path d="M1365.333 682.667C1365.333 305.64 1059.693 0 682.667 0 305.64 0 0 305.64 0 682.667c0 340.738 249.641 623.16 576 674.373V880H402.667V682.667H576v-150.4c0-171.094 101.917-265.6 257.853-265.6 74.69 0 152.814 13.333 152.814 13.333v168h-86.083c-84.804 0-111.25 52.623-111.25 106.61v128.057h189.333L948.4 880H789.333v477.04c326.359-51.213 576-333.635 576-674.373" fill="#1877f2" />
                    <path d="M948.4 880l30.267-197.333H789.333V554.609C789.333 500.623 815.78 448 900.584 448h86.083V280s-78.124-13.333-152.814-13.333c-155.936 0-257.853 94.506-257.853 265.6v150.4H402.667V880H576v477.04a687.805 687.805 0 00106.667 8.293c36.288 0 71.91-2.84 106.666-8.293V880H948.4" fill="#fff" />
                </svg>

                כניסה עם Facebook
            </a>
            <p>
                על ידי התחברות או יצירת חשבון אתם מסכימים עם <a href="#">תנאי השימוש והצהרת הפרטיות</a> שלנו
            </p>
        </div>

    </div>
</div>
<div class="modal lost-passs-modal" id="lostPasss">

    <div class="modal__inner ">
        <div class="modal__close  modal-close-btn">
            <i class="icon-close-thin"></i>
        </div>
        <div class="modal__return">
            <div class="modal__return-btn modal-close-btn">
                <div class="modal__return-btn-icon"><i class="icon-arrow-back-mobile"></i></div>
                חזרה
            </div>
        </div>

        <?php wc_get_template('myaccount/form-lost-password.php'); ?>


    </div>
</div>

<div class="modal" id="form-message">
    <div class="text-center">
        <div class="form-complete-message">
            <div class="icon"><i class="icon-check"></i></div>
            קישור לאיפוס סיסמה נשלח לכתובת המייל שהוקלדה
        </div>
    </div>
</div>

<div class="modal" id="success-subscribe">
    <div class="text-center">
        <div class="form-complete-message success-subscribe-message">
            <div class="icon"><i class="icon-check"></i></div>
            <span></span>

        </div>
    </div>
</div>

<div class="modal" id="success-login">
    <div class="text-center">
        <div class="form-complete-message">
            <div class="icon"><i class="icon-check"></i></div>
            ﻿התחברת בהצלחה
        </div>
    </div>
</div>
<div class="modal cookies" id="cookie_notification">
    <div class="modal__inner cookies__inner">
        <div class="modal__close  modal-close-btn">
            <i class="icon-close-thin"></i>
        </div>
        <div class="cookies__image">
            <img src="<?= get_field('cookies_image', 'option')['url']  ?>" alt="<?= get_field('cookies_image', 'option')['alt']  ?>">
        </div>
        <div class="cookies__text">
            <p>
                <?php the_field('cookies_text', 'option'); ?>
            </p>
        </div>
        <div class="cookies__btn site-color-btn btn  modal-close-btn cookie_accept">
            אישור
        </div>
    </div>
</div>


<div class="modal-close-area modal-close-btn"></div>



<script>
    if (jQuery('.wpcf7-form').length) {
        var disableSubmit = false;
        jQuery('input.wpcf7-submit[type="submit"]').click(function() {
            jQuery(':input[type="submit"]')
            if (disableSubmit == true) {
                return false;
            }
            disableSubmit = true;
            return true;
        })

        var wpcf7Elm = document.querySelector('.wpcf7');
        wpcf7Elm.addEventListener('wpcf7submit', function(event) {
            jQuery(':input[type="submit"]')
            disableSubmit = false;
        }, false);
    }





    document.addEventListener('wpcf7mailsent', function(event) {

        let sendText = null;
        let inV = null
        if (!sendText) {
            inV = setInterval(insertMessage, 100);

        }

        function insertMessage() {
            sendText = jQuery(event.path[1]).find('.wpcf7-response-output').text();
            if (sendText !== '') {
                sendText = jQuery(event.path[1]).find('.wpcf7-response-output').text();
                jQuery('.success-subscribe-message span').html(sendText)

                removeInterval(inV)
            } else {
                sendText = null
            }

        }

        function removeInterval(interval) {
            clearInterval(interval);
        }


        if ('767' == event.detail.contactFormId) {
            location = '<?php echo site_url() ?>/thank-you/';

        } else {
            jQuery('.placeholder').removeClass('is-focused');
            jQuery('#success-subscribe, .modal-close-area').fadeIn();
            setTimeout(function() {
                jQuery('#success-subscribe, .modal-close-area').fadeOut();
            }, 3000)
        }



        /*    jQuery( document ).ajaxComplete(function() {
               let sendText = jQuery(' .wpcf7-response-output').text();
                   console.log( sendText )
                   
           }); */



    }, false);

    jQuery(document).ready(function(){
        jQuery('#searchform #s').keyup(function () {
            var e = jQuery(this),
                value = e.val(),
                count = value.length;

            if(count > 2) {
                jQuery('#search-form-result').show();
            } else {
                jQuery('#search-form-result').hide();
            }
        });

        jQuery('#searchform #s').jcOnPageFilter({
            parentSectionClass:'clinics_requests_items',
            parentLookupClass:'item',
            childBlockClass:'searchable',
        });
    });
</script>

<?php

//$path = __DIR__ . '/my-log25.log';
//$file = file_get_contents($path);
//foreach (json_decode($file)  as $f){
//    if ($f) {
//
//        $url = 'https://ws.admonis.com/api/feedback';
//        $ch = curl_init($url);
//        curl_setopt($ch, CURLOPT_POST, 1);
//        curl_setopt($ch, CURLOPT_POSTFIELDS, $f);
//        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
//        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//        $result = curl_exec($ch);
//
//        error_log(print_r($result, true), 3, __DIR__ . '/  ');
//        error_log(print_r($f, true), 3, __DIR__ . '/my-log999.log');
//
//        curl_close($ch);
//        file_put_contents($path, $result);
//    }
//}

wp_footer(); ?>
</body>

</html>