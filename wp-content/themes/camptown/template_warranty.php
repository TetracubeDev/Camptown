<?php
/*
  Template name: Template Warranty
*/
?>
<?php
if ($_POST['find_scu'] == true) {
    $S = stripslashes($_POST["query"]);

    if ($S !== '') {
        $args = array(
            'posts_per_page'  => -1,
            'post_type'       => 'product',
            'meta_query' => array(
                array(
                    'key' => '_sku',
                    'value' => $S,
                    'compare' => 'LIKE'
                )
            )
        );
        $posts = get_posts($args);


        function createResponse($results)
        {
            $res = [];

            foreach ($results as $post) {

                $product = wc_get_product($post->ID);
                $res[$post->ID]["id"] = $post->ID;
                $res[$post->ID]["title"] = $product->get_name();
                $res[$post->ID]["subtitle"] = get_field('warranty', $post->ID);
                $res[$post->ID]["img"] = wp_get_attachment_image_url($product->get_image_id(), 'thumbnail');
                //  $res[$post->ID]["content"] = $post->post_content;    
                $res[$post->ID]["content"] = get_field('search_and_description', $post->ID);
                $res[$post->ID]["guid"] = $post->guid;
                $res[$post->ID]["post_type"] = $post->post_type;
                $res[$post->ID]["sku"] = $product->get_sku();
            }

            return  $res;
        }

        $response = createResponse($posts);
        echo json_encode($response);
    }



    exit;
}

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

    /*   .interactive-form__inner .hidden-without-sku{
       opacity: 0;
      
       transition: all .3s ease;
   }
   .interactive-form__inner .hidden-without-sku:not(.visible){
   
       max-height: 0!important;
       padding-top: 0!important;
       padding-bottom: 0!important;
       margin-top: 0!important;
       margin-bottom: 0!important;
      
   }
   .interactive-form__inner .hidden-without-sku.visible{
       opacity: 1;
       max-height: 2000px;
       padding-top: 0;
       padding-bottom: 0;
       margin-top: 0;
       margin-bottom: 0;
       transition: all .3s ease;
   } */
    .find-items {

        border: 1px solid black;
        position: absolute;
        top: calc(100% + 15px);
        right: 0;
        overflow: auto;
        max-height: 300px;
        background-color: white;
        min-width: 100%;
        border-radius: 10px;
        z-index: 10;
    }

    .ui-widget.ui-datepicker {
        background-color: white;
        border: 1px solid black;
        border-radius: 10px;
    }

    .finded-item {
        display: none !important;
    }

    .finded-item.active {
        display: flex !important;
    }

    .find-items>li {
        border-bottom: 1px solid black;

        transition: all .3s ease;
        cursor: pointer;
        padding: 5px 15px;
    }

    .find-items>li:last-child {
        border-bottom: none;


    }

    .find-items>li:hover {
        background-color: #f6f5f3;
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
                    <div class="interactive-form__step" id="warranty__user-info">
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
                                    <div class="text">מילוי פרטי מוצר</div>
                                </div>
                                <i class="icon-arrow-left"></i>
                            </li>
                            <li>
                                <div class="icon default-icon">
                                    <img src="/wp-content/themes/camptown/img/document-white.svg" alt="<?php the_title(); ?>">
                                    <img src="/wp-content/themes/camptown/img/document-color.svg" alt="<?php the_title(); ?>">
                                </div>
                                <div class="content">
                                    <div class="num">03</div>
                                    <div class="text">אנחנו נשמור לך את החשבונית</div>
                                </div>

                            </li>
                        </ul>
                    </div>
                    <div class="frontend-form" id="scu_search_form">


                        <?php
                        /*  temporary invisible method, to create custom warranty id */
                        $latestId = 1;

                        $args = array(
                            'post_type' => 'warranty',
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
                                    'post_type'     => 'warranty',
                                    'post_status'   => 'publish',
                                    //'post_title'    => ' רישום אחריות ' . $latestId,
                                ),
                                'return' => '/warranty-registration-form-successfully-received/',
                                'submit_value'  => 'Create new warranty'
                            )); ?>
                        <?php endwhile; ?>

                    </div>
                </div>


                <div class="col-lg-4">
                    <div class="alternative-sidebar">
                        <div class="alternative-sidebar__title">
                            <?php the_field('sidebar_title') ?>
                        </div>
                        <div class="alternative-sidebar__text">
                            <?php the_field('sidebar_top_text') ?>
                        </div>
                        <div class="alternative-sidebar__images">
                            <?php if (have_rows('sidebar_images')) : ?>
                                <?php while (have_rows('sidebar_images')) : the_row(); ?>
                                    <div>
                                        <div class="alternative-sidebar__image-text-wrapper">
                                            <div class="alternative-sidebar__image-text">
                                                <?php the_sub_field('sidebar_image_text') ?>
                                            </div>
                                            <div class="alternative-sidebar__image-text-underline">
                                                <?php the_sub_field('sidebar_image_text_underline') ?>
                                            </div>
                                        </div>
                                        <a href="<?= get_sub_field('sidebar_image')['url'] ?>" data-fancybox> <img src="<?= get_sub_field('sidebar_image')['url'] ?>" alt="<?= get_sub_field('sidebar_image')['alt'] ?>"></a>
                                        <div class="icon">
                                            <i class="icon-check"></i>
                                            <i class="icon-cross"></i>
                                        </div>
                                    </div>

                                <?php endwhile; ?>
                            <?php endif; ?>
                        </div>

                        <div class="alternative-sidebar_small-title">
                            <?php the_field('sidebar_bottom_title') ?>
                        </div>
                        <div class="alternative-sidebar__text">
                            <?php the_field('sidebar_bottom_text') ?>
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



<div class="modal interactive-form-modal" id="step_2_modal">

    <div class="modal__inner ">
        <div class="modal__close  modal-close-btn">
            <i class="icon-close-thin"></i>
        </div>
        <div id="downloadModal">
            <div class="modal__title interactive-form-modal__title bordered-title ">
                <span>
                    רישום אחריות
                </span>

            </div>
            <div class="interactive-form-modal__inner">

                <div class="interactive-form-modal__content">
                    <div class="interactive-form-modal__content-title">
                        פרטי לקוח
                    </div>

                    <div class="interactive-form-modal__content-atributes">
                        <p class="modal__inner-name"></p>
                        <p class="modal__inner-email"></p>
                        <p class="modal__inner-phone"></p>
                    </div>
                    <div class="interactive-form-modal__content-title">
                        פרטי מוצר
                    </div>
                    <div class="frontend-form__item">
                        <div class="frontend-form__item-image">
                            <img src="/wp-content/uploads/2022/04/invoice-pic-exaple1.jpg" alt="דוגמה לחשבונית מס תקינה">
                        </div>
                        <div class="frontend-form__item-content">
                            <div class="frontend-form__item-title">
                            </div>

                        </div>
                    </div>
                    <div class="interactive-form-modal__content-text">
                        <p class="date"></p>
                        <p class="item__subtitle"></p>
                        <p class="item__warranty"></p>
                    </div>
                </div>
                <div class="interactive-form-modal__image">
                    <img src="/wp-content/uploads/2022/04/invoice-pic-exaple1.jpg" alt="">
                </div>
            </div>
        </div>
        <div class="modal__buttons interactive-form-modal__buttons">
            <a href="#">
                אני מאשר טופס רישום אחריות
            </a>
            <div class="text-center">
                <div class=" dont-logout  modal-close-btn">
                    חזרה
                </div>
            </div>

        </div>
    </div>
</div>

<script src="http://demos.codexworld.com/convert-html-to-pdf-using-javascript-jspdf/js/html2canvas.min.js"></script>
<script src="http://demos.codexworld.com/3rd-party/jsPDF/dist/jspdf.min.js"></script>

<script>
    let is_product_find = false

    window.addEventListener('load', () => {
        let finded_item = document.querySelector('.finded-item')
        const sku_input = document.querySelector('#scu_search input')
        finded_item.closest('.acf-field').style = 'display:none!important;'
        let timeout = null;
        jQuery('.hidden-without-sku').fadeOut()
        console.log(jQuery('.hidden-without-sku'))

        function inputHandler(el, i) {

            if (el.value === '') {
                i.style.opacity = '0'
            } else {
                i.style.opacity = '1'
            }
            clearInterval(timeout)
            timeout = setTimeout(async () => {

                old_ul = sku_input.parentElement.querySelector('.find-items')
                if (old_ul) {
                    old_ul.remove()
                }
                const ul = document.createElement('ul')
                ul.classList.add('find-items')

                let val = el.value.trim().toUpperCase()
                old_ul = sku_input.parentElement.querySelector('.find-items')
                if (val === '') {
                    return
                }
                let res = await fetchQuery(val)
                console.log(Object.values(res).length)
                if (val !== '' && Object.values(res).length) {

                    sku_input.after(ul)
                    ul.parentElement.style = 'position:relative; overflow: visible'

                } else {
                    if (old_ul) {
                        old_ul.remove()
                    }
                    return
                }


                ul.innerHTML = ''
                for (const item of Object.values(res)) {
                    let li = document.createElement('li')
                    let a = document.createElement('a')
                    a.href = '#'
                    li.append(a)
                    find_items_a_handler(a, ul, item, sku_input)

                    a.innerHTML = `
                   
                  ${item.sku}
                  <br>
                  ${item.title}
                   `
                    ul.append(li)


                }
            }, 500)


        }

        function find_items_a_handler(a, ul, item, sku_input) {


            let img = finded_item.querySelector('img')
            let title = finded_item.querySelector('.frontend-form__item-title')
            let subtitle = finded_item.querySelector('.frontend-form__item-sub-title')
            let modal_product_img = document.querySelector('#step_2_modal .frontend-form__item-image img')
            let modal_product_title = document.querySelector('#step_2_modal .frontend-form__item-title')
            let modal_product_subtitle = document.querySelector('#step_2_modal .item__subtitle')

            finded_item.classList.remove('active')
            finded_item.closest('.acf-field').style = 'display:block; width:100%'

            document.addEventListener('click', (e) => {
                if (!e.target.closest('.finded-item')) {
                    ul.remove()
                }
            })
            a.parentElement.addEventListener('click', (e) => {
                if (finded_item) {
                    jQuery('.hidden-without-sku').fadeIn()
                    e.preventDefault()
                    console.log(item)
                    img.setAttribute('src', item.img)
                    img.setAttribute('alt', item.title)
                    modal_product_img.setAttribute('src', item.img)
                    modal_product_img.setAttribute('alt', item.title)
                    title.textContent = item.title
                    modal_product_title.innerText = item.title
                    modal_product_subtitle.innerText = item.subtitle
                    if (item.subtitle) {
                        subtitle.innerHTML = `<span>פרטי האחריות:</span> ${item.subtitle}`;
                    } else {
                        subtitle.innerHTML = ''
                    }

                    sku_input.value = item.sku
                    finded_item.classList.add('active')
                    is_product_find = true
                    const step3_btn = document.querySelector('#step3')
                    const step2_date = document.querySelector('#step_2_date input');

                    ul.remove()
                } else {
                    jQuery('.hidden-without-sku').fadeOut()
                }

            })

        }

        let i = document.createElement('i')
        sku_input.addEventListener('input', () => inputHandler(sku_input, i))
        let i_wrap = document.createElement('div')
        i_wrap.classList.add('acf-input-wrap')
        i_wrap.append(i)
        i.classList.add('icon-close')
        i.style = 'cursor:pointer;'
        i.style = 'opacity:0;'
        i.addEventListener('click', () => {
            sku_input.value = ''
            sku_input.focus()
            jQuery('.hidden-without-sku').fadeOut()
            i.style = 'opacity:0;'
            let ul = sku_input.closest('.acf-input-wrap').querySelector('.find-items')
            if (ul) {
                ul.remove()
            }
            finded_item.closest('.acf-field').style = 'display:none!important;'

        })
        sku_input.after(i_wrap)
        async function fetchQuery(query) {
            const data = new URLSearchParams();

            data.append('find_scu', true)
            data.append('query', query)
            let response = await fetch(window.location.href, {
                method: 'POST',
                headers: {
                    // 'Content-Type': 'application/json;charset=utf-8'
                },
                body: data

            });

            return await response.json()

        }


    });

    window.addEventListener('load', () => {
        let submit_user_info = document.querySelector(' #step2');
        let first_name_user_info = document.querySelector('.info-first-name input');
        let last_name_user_info = document.querySelector(' .info-last-name input');
        let email_name_user_info = document.querySelector('.info-email input');
        let phone_name_user_info = document.querySelector('.info-phone input');
        let modal_user_name = document.querySelector('.modal__inner-name');
        let modal_user_email = document.querySelector('.modal__inner-email');
        let modal_user_phone = document.querySelector('.modal__inner-phone');
        if (submit_user_info && first_name_user_info && last_name_user_info && email_name_user_info &&
            phone_name_user_info && modal_user_name && modal_user_email && modal_user_phone
        ) {
            submit_user_info.addEventListener('click', () => {
                modal_user_name.innerText = first_name_user_info.value + ' ' + last_name_user_info.value;
                modal_user_email.innerText = `${email_name_user_info.value}`
                modal_user_phone.innerText = `${phone_name_user_info.value}`
                const step3_btn = document.querySelector('#step3')
                const step2_date = document.querySelector('#step_2_date input');
            })
        }





    });

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

        for (const iterator of date_inputs) {

        }
        if (window.innerWidth > 767) {
            $('#step_2_date input').datepicker({
                dateFormat: 'dd.mm.y',
                showOtherMonths: true,
                selectOtherMonths: true,
            });
        } else {
            $('#step_2_date input').datepicker({
                "dayNamesMin": ["א", "ב", "ג", "ד", "ה", "ו", "ש"],
                monthNames: ["יָנוּאַר,", "פֶבּרוּאַר ,", "מֶרץ,", "אַפּרִיל,,", "מַאי,", "יוּנִי,", "יוּלִי,", "אוֹגוּסט,", "סֶפּטֶמבֶּר,", "אוקטובר,", "נוֹבֶמבֶּר ,", "דֶצֶמבֶּר ,"],

                "dateFormat": "mm/dd/yy",
                showOtherMonths: true,
                selectOtherMonths: true
                // isRTL: true,
            });
        }



        $('[data-name="first_name"] input').val($('.firstName').html());
        $('[data-name="last_name"] input').val($('.lastName').html());
        $('[data-name="email"] input').val($('.email').html());
        $('[data-name="phone"] input').val($('.phone').html());


    });
    window.addEventListener('load', () => {
        const step3_btn = document.querySelector('#step3')
        const step2_date = document.querySelector('#step_2_date input');
        const step2_place_of_purchase = document.querySelector('#place_of_purchase textarea');
       
        let modal_date = document.querySelector('#step_2_modal .date');
        let modal_place = document.querySelector('#step_2_modal .item__subtitle');
        let modal_warranty = document.querySelector('#step_2_modal .item__warranty');

        const modal2 = document.querySelector('#step_2_modal');
        step3_btn.addEventListener('click', (e) => {
            let modal_warranty_res = document.querySelector('.frontend-form__item-sub-title');
            modal_date.innerHTML = `<strong>תארוך מילוי טופס:</strong> ${step2_date.value}`
            modal_place.innerHTML = `<strong>מקום רכישה:</strong> ${step2_place_of_purchase.value}`
            if( modal_warranty_res ) {
            	modal_warranty.innerHTML = modal_warranty_res.innerHTML
            }else {
            	modal_warranty.innerHTML = ``
            }
            

        })


    });



    /*
     * Convert HTML content to PDF
     */
    function Convert_HTML_To_PDF() {
        var elementHTML = document.getElementById('downloadModal');

        html2canvas(elementHTML, {
            useCORS: true,
            onrendered: function(canvas) {
                var pdf = new jsPDF('p', 'pt', 'letter', true);
                var dataURL;
                var pageHeight = 980;
                var pageWidth = 900;
                for (var i = 0; i <= elementHTML.clientHeight / pageHeight; i++) {
                    var srcImg = canvas;
                    var sX = 0;
                    var sY = pageHeight * i; // start 1 pageHeight down for every new page
                    var sWidth = pageWidth;
                    var sHeight = pageHeight;
                    var dX = 0;
                    var dY = 0;
                    var dWidth = pageWidth;
                    var dHeight = pageHeight;

                    window.onePageCanvas = document.createElement("canvas");
                    onePageCanvas.setAttribute('width', pageWidth);
                    onePageCanvas.setAttribute('height', pageHeight);
                    var ctx = onePageCanvas.getContext('2d');
                    ctx.drawImage(srcImg, sX, sY, sWidth, sHeight, dX, dY, dWidth, dHeight);

                    var canvasDataURL = onePageCanvas.toDataURL("image/png", 0.3);
                    dataURL = canvasDataURL
                    var width = onePageCanvas.width;
                    var height = onePageCanvas.clientHeight;

                    if (i > 0) // if we're on anything other than the first page, add another page
                        pdf.addPage(612, 864); // 8.5" x 12" in pts (inches*72)

                    pdf.setPage(i + 1); // now we declare that we're working on that page
                    pdf.addImage(canvasDataURL, 'PNG', 20, 40, (width * .62), (height * .62), 'FAST'); // add content to the page

                    // Save the PDF
                    //let docName = jQuery('#downloadModal .modal__title span').text();
                    let docName = `warranty`;
                    let first_name_user_info = document.querySelector('.info-first-name input');
                    let last_name_user_info = document.querySelector(' .info-last-name input');
                    let phone_name_user_info = document.querySelector('.info-phone input');
                    if (first_name_user_info && last_name_user_info && phone_name_user_info) {
                        docName = `${first_name_user_info.value} ${last_name_user_info.value}, ${phone_name_user_info.value}`
                    }



                    let file = document.querySelector('#PDFUploader input[type=file]');

                    if (file) {
                        let newFile = new File([pdf.output('blob')], docName + ".pdf", {
                            type: "application/pdf"
                        });
                        const dataTransfer = new DataTransfer()
                        dataTransfer.items.add(newFile)

                        file.files = dataTransfer.files
                        // console.log(file.files)



                    }
                    jQuery('.acf-form .acf-form-submit [type=submit]').submit()
                    jQuery('.modal').fadeOut()
                    jQuery(body).removeClass('modal-open');
                }




            }

        });
    }







    // $('#generatereport').click(function() {
    //     var pdf = new jsPDF();
    //     var temp = $('#lppresults');

    //     pdf.fromHTML(temp.html(), 15, 15, {
    //         'width': 170,
    //     });
    //     //pdf.save('sample-file.pdf');
    //     console.dir(file.files)
    //     newFile = new File([pdf.output('blob')], "image.pdf", {
    //         type: "application/pdf"
    //     });
    //     const dataTransfer = new DataTransfer()
    //     dataTransfer.items.add(newFile)

    //     file.files = dataTransfer.files
    // }

    /*       var formData = new FormData();
          formData.append('pdf', blob);

          formData.append('path', window.location.origin); */

    /*    $.ajax('/upload.php', {
           method: 'POST',
           data: formData,
           enctype: 'multipart/form-data',
           processData: false,
           contentType: false,
           success: function(response) {
               console.log(response);
           },
           error: function(response) {
               console.log('error');
           }
       }); */

    // });

    window.addEventListener('load', () => {
        let file_input = document.querySelector('[data-name=receipt_file] [type=file]');
        let to = document.querySelector('.interactive-form-modal__image>img');
        let step_button = document.querySelector('.step__button#step3 ');

        document.querySelector('[data-name=date_of_purchase] input').setAttribute("autoComplete", "none");

        if (file_input && to && step_button) {
            //step_button.style.pointerEvents='none'
            file_input.addEventListener('change', (e) => {

                let file = e.target.files[0]
                if (file && (file.type === 'image/jpeg' || file.type === 'image/png')) {
                    getBase64(file, to, step_button);
                    file_input.closest('div').classList.remove('error')

                } else {
                    file_input.files = new DataTransfer().files
                    /*   file_input.closest('div').classList.add('error') */
                    console.log(file_input)
                    file_input.change()
                }


            })
        }

    });

    function getBase64(file, to, step_button) {
        var reader = new FileReader();
        reader.readAsDataURL(file);
        reader.onload = function() {
            to.src = reader.result;
            /*   step_button.style.pointerEvents='all' */
        };
        reader.onerror = function(error) {
            console.log('Error: ', error);
        };
    }
</script>




<?php get_footer(); ?>