<?php
/*
  Template name: Template Call Service
*/
?>
<?php acf_form_head(); ?>
<?php get_header(); ?>

<style>
    .frontend-form .acf-input .acf-label,
    .acf-field[data-name='id'],
    .defaultBillingAddesses {
        display: none;
    }

    html[dir=rtl] .frontend-form .acf-field[data-width]+.acf-field[data-width],
    .frontend-form .acf-fields>.acf-field,
    .frontend-form .acf-fields.-border {
        border: none;
    }

    .ui-widget.ui-datepicker {
        background-color: white;
        border: 1px solid black;
        border-radius: 10px;
    }
</style>

<?php
$user_id = get_current_user_id();
$customer = new WC_Customer($user_id);

$billing_first_name = $customer->get_billing_first_name();
$billing_last_name = $customer->get_billing_last_name();
$user_email = $customer->get_email();
$billing_phone = $customer->get_billing_phone();

?>
<div class="defaultBillingAddesses">
    <span class="firstName"><?php echo $billing_first_name ?></span>
    <span class="lastName"><?php echo $billing_last_name ?></span>
    <span class="email"><?php echo $user_email ?></span>
    <span class="phone"><?php echo $billing_phone ?></span>
</div>

<section class="interactive-form">
    <div class="banner-no-bg">
        <div class="breadcrumb">
            <?php echo do_shortcode('[wpseo_breadcrumb]'); ?>
        </div>
    </div>
    <div class="interactive-form__inner">
        <div class="container">
            <div class="row">

                <div class="col-lg-8">
                    <h1 class="interactive-form__title">
                        <?php the_title(); ?>
                    </h1>
                    <div class="interactive-form__text ">
                        <?php the_field('form_subtitle'); ?>
                    </div>
                    <div class="interactive-form__step">
                        <ul>
                            <li class="check">
                                <div class="icon default-icon">
                                    <img src="/wp-content/themes/camptown/img/personal-white.svg" alt="<?php the_title(); ?>">
                                </div>
                                <div class="content">
                                    <div class="num">01</div>
                                    <div class="text">מילוי פרטים אישיים</div>
                                </div>
                                <i class="icon-arrow-left"></i>
                            </li>
                            <li>
                                <div class="icon default-icon">
                                    <img src="/wp-content/themes/camptown/img/product-white.svg" alt="<?php the_title(); ?>">
                                    <img src="/wp-content/themes/camptown/img/product-color.svg" alt="<?php the_title(); ?>">
                                </div>
                                <div class="content">
                                    <div class="num">02</div>
                                    <div class="text">
                                        מילוי פרטי מוצר
                                    </div>
                                </div>
                                <i class="icon-arrow-left"></i>
                            </li>
                            <li>
                                <div class="icon default-icon">
                                    <img src="/wp-content/themes/camptown/img/service-kriat-white.svg" alt="<?php the_title(); ?>">
                                    <img src="/wp-content/themes/camptown/img/service-kriat-color.svg" alt="<?php the_title(); ?>">
                                </div>
                                <div class="content">
                                    <div class="num">03</div>
                                    <div class="text">נציג שירות לקוחות שלנו יחזור אליכם</div>
                                </div>

                            </li>
                        </ul>
                    </div>
                    <div class="frontend-form">

                        <?php
                        $latestId = 1;

                        $args = array(
                            'post_type' => 'call_service',
                            'posts_per_page' => 1,
                        );
                        $query = new WP_Query($args);
                        if ($query->have_posts()) { ?>
                            <?php while ($query->have_posts()) {
                                $query->the_post(); ?>

                                <?php if (have_rows('customer_info')) : ?>
                                    <?php while (have_rows('customer_info')) : the_row(); ?>
                                        <?php
                                        $latestId = get_sub_field('id') + rand(1, 5);
                                        ?>

                                        <script>
                                            jQuery(document).ready(function($) {
                                                $(".acf-field[data-name='id'] input").val(<?= $latestId; ?>);
                                            });
                                        </script>
                                    <?php endwhile; ?>
                                <?php endif; ?>

                            <?php } ?>
                        <?php } ?>
                        <?php wp_reset_postdata(); ?>

                        <?php while (have_posts()) : the_post(); ?>
                            <?php acf_form(array(
                                'post_id'       => 'new_post',
                                'uploader' => 'basic',

                                'new_post'      => array(
                                    'post_type'     => 'call_service',
                                    'post_status'   => 'publish',
                                    //'post_title'    => ' קריאת שירות ' . $latestId,
                                ),
                                'return' => '/form-call-service-absorbed-successfully/',
                                'submit_value'  => 'Create new call'
                            )); ?>
                        <?php endwhile; ?>
                    </div>
                </div>


                <div class="col-lg-4">
                    <div class="alternative-sidebar call-sidebar">
                        <img src="<?= get_field('sidebar_bg')['url'] ?>" alt="<?= get_field('sidebar_bg')['alt'] ?>" class="alternative-sidebar__bg">


                        <div class="call-sidebar__items">


                            <?php if (have_rows('sidebar_call_phone')) : ?>

                                <?php while (have_rows('sidebar_call_phone')) : the_row(); ?>

                                    <a href="tel:<?php the_sub_field('phone') ?>" class="call-sidebar__item">
                                        <div class="call-sidebar__item-icon default-icon">
                                            <img src="<?= get_sub_field('icon')['url']  ?>" alt="<?= get_sub_field('icon')['alt']  ?>">
                                        </div>
                                        <div class="acall-sidebar__item-text">
                                            <?php the_sub_field('text') ?>
                                        </div>
                                    </a>

                                <?php endwhile; ?>

                            <?php endif; ?>
                            <?php if (have_rows('sidebar_call_whatsapp')) : ?>
                                <?php while (have_rows('sidebar_call_whatsapp')) : the_row(); ?>

                                    <a href="https://wa.me/+972509065124" target="_blank" class="call-sidebar__item">
                                        <div class="call-sidebar__item-icon default-icon">
                                            <img src="<?= get_sub_field('icon')['url']  ?>" alt="<?= get_sub_field('icon')['alt']  ?>">
                                        </div>
                                        <div class="call-sidebar__item-text">
                                            <?php the_sub_field('text') ?>
                                        </div>
                                    </a>

                                <?php endwhile; ?>

                            <?php endif; ?>



                        </div>


                    </div>
                </div>
            </div>
        </div>

    </div>

</section>

<script>
    jQuery(document).ready(function($) {
        $('.acf-form-fields .acf-field-group').each(function(index) {
            index += 1;
            $('.acf-label label', this).prepend('<span>0' + index + '</span>');

        })
    });
</script>
<?php if (!is_user_logged_in()) { ?>
    <script>
        jQuery(document).ready(function($) {
            $('.acf-form').submit(function(event) {
                event.preventDefault();
                //add stuff here
            });
        });
    </script>
<?php } ?>





<script>
    let select = document.querySelector('#call-service-select select');
    if (select) {
        select.children[0].innerText = 'מהות פניה *'
        select.addEventListener('change',()=>{
            refreshNiceSelect(select) 
        })
    }
    jQuery(document).ready(function($) {
        let date_inputs = document.querySelectorAll('#step_2_date input')
        if (date_inputs && date_inputs.length) {
            var today = new Date();
            var dd = String(today.getDate()).padStart(2, '0');
            var mm = String(today.getMonth() + 1).padStart(2, '0');
            var yy = String(today.getFullYear()).substr(-2);

            today = dd + '.' + mm + '.' + yy;

            for (const iterator of date_inputs) {
                iterator.value = today
            }
        }


        if (window.innerWidth > 767) {
            $('[data-name="date_of_purchase"] input').datepicker({
                dateFormat: 'dd.mm.y',
                showOtherMonths: true,
                selectOtherMonths: true,
            });
        } else {
            $('[data-name="date_of_purchase"] input').datepicker({
                "dayNamesMin": ["א", "ב", "ג", "ד", "ה", "ו", "ש"],
                monthNames: ["יָנוּאַר,", "פֶבּרוּאַר ,", "מֶרץ,", "אַפּרִיל,,", "מַאי,", "יוּנִי,", "יוּלִי,", "אוֹגוּסט,", "סֶפּטֶמבֶּר,", "אוקטובר,", "נוֹבֶמבֶּר ,", "דֶצֶמבֶּר ,"],
                showOtherMonths: true,
                selectOtherMonths: true,
                "dateFormat": "mm/dd/yy",
                // isRTL: true,
            });
        }

        $('[data-name="first_name"] input').val($('.firstName').html());
        $('[data-name="last_name"] input').val($('.lastName').html());
        $('[data-name="email"] input').val($('.email').html());
        $('[data-name="phone"] input').val($('.phone').html());
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        let formBtns = document.querySelectorAll('.interactive-form .remove-file');
        for (const btn of formBtns) {
            btn.addEventListener('click', (e) => {
                e.preventDefault()

            })
        }

        let files = document.querySelectorAll('.interactive-form [type=file]');

        document.querySelector('[data-name=date_of_purchase] input').setAttribute("autoComplete", "none");




        if (files && files.length) {

            for (const file of files) {
                let submit = file.closest('form').querySelector('[type=submit]')
                let error = file.closest('label').querySelector('.selected-file')

                let errorText = error.textContent

                if (!submit && !error) {
                    return
                }
                file.addEventListener('change', (e) => {
                    console.log(file.files[0])
                    e.preventDefault()

                    if (file.files[0].type === "application/pdf" || file.files[0].type === "application/msword") {
                        error.classList.remove('error')
                        error.textContent = file.files[0].name
                        submit.removeAttribute('disabled')
                    } else {
                        submit.setAttribute('disabled', 'disabled')
                        error.classList.add('error')
                        error.textContent = errorText

                    }

                })
            }
            /*    for (const iterator of object) {
                   
               }
               files[0].closest('form').addEventListener('submit',()=>{

               }) */

        }

    });
</script>
<?php get_footer(); ?>