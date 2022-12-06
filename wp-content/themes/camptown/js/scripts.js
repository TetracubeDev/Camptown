const body = document.querySelector('body');
const miniCartToggler = document.querySelector('.header__cart');
const miniCartClose = document.querySelector('.left-modal__close');
const miniCartOverlay = document.querySelector('.left-modal__overlay');
miniCartToggler.addEventListener('click', function (e) {
    e.preventDefault()
    body.classList.toggle('left-modal-active');
})
miniCartClose.addEventListener('click', function (e) {
    body.classList.remove('left-modal-active');
})
miniCartOverlay.addEventListener('click', function (e) {
    body.classList.toggle('left-modal-active');
})



jQuery(document).ready(function ($) {
    jQuery('.tel').each(function () {
        let phoneNum = jQuery(this).text().replace(/[^0-9]/g, '');
        jQuery(this).attr('href', 'tel:' + phoneNum);
    })
    $('.wpcf7 input').on('input', function () {
        $(this).removeClass('wpcf7-not-valid')
    })

    $('.hasDatepicker').click(function () {
        let inpW = $(this).innerWidth()
        const rect = this.getBoundingClientRect();
        $('.ui-datepicker').css({
            'width': inpW + 'px',
            'min-width': inpW + 1 + 'px',
            'left': rect.left + 'px'
        })
    })





    // if($('.ui-datepicker').length){

    // }
    $('.lost_password').html('<a href="#lostPasss" class="modal-btn">שכחת סיסמה?</a>')
    $('.modal-btn').click(function (e) {
        e.preventDefault()
        $('.modal').fadeOut();
        let thisHref = $(this).attr('href');
        /*$(thisHref).show()*/

        $(thisHref).fadeIn()


        // $('body').addClass('modal-open');
        //quatityPriceUpdate();
        $(body).addClass('modal-open');
        $('.modal-close-area').fadeIn();

    })
    $('.modal-close-btn').click(function (e) {
        if ($(body).is('.page-template-template_warranty:not(.logged-in),.page-template-template_call-service:not(.logged-in) ')) {
            $('.modal').fadeOut()
            $('.login-modal').fadeIn()
        } else {
            $('.modal').fadeOut()
            $(body).removeClass('modal-open');
            $('.modal-close-area').fadeOut()
        }


    })




    function checkCookies() {
        let cookieDate = localStorage.getItem('cookieDate');
        let cookieNotification = $('#cookie_notification, .modal-close-area');
        let cookieBtn = $('.cookie_accept');

        // Если записи про кукисы нет или она просрочена на 1 год, то показываем информацию про кукисы
        if (!cookieDate) {
            $(body).addClass('modal-open');
            cookieNotification.fadeIn();
        }

        // При клике на кнопку, в локальное хранилище записывается текущая дата в системе UNIX
        cookieBtn.on('click', function () {
            localStorage.setItem('cookieDate', Date.now());
            cookieNotification.fadeOut();
        })
    }
    checkCookies();



    $('.open-table-modal-btn').click(function () {
        $(this).siblings('.modal').fadeIn()
        $('.modal-close-area').fadeIn()
    })
    var $hamburger = $(".header__toggler");
    $hamburger.on("click", function (e) {
        $hamburger.toggleClass("is-active");
        $(".mobile-nav").toggleClass("active");
        $("body").toggleClass("mobile-nav-active");
        $('.left-modal__close').click()
    });

    $hamburger.click(function () {
        $('.hiddenMenu').slideToggle();
    });





    $.fn.visible = function (partial) {
        let $t = $(this),
            $w = $(window),
            viewTop = $w.scrollTop(),
            viewBottom = viewTop + $w.height() - 200,
            _top = $t.offset().top,
            _bottom = _top + $t.height() - 200,
            compareTop = partial === true ? _bottom : _top,
            compareBottom = partial === true ? _top : _bottom;
        return ((compareBottom <= viewBottom) && (compareTop >= viewTop));
    };
    $('.animate').each(function (i, el) {
        var el = $(el);
        if (el.visible(true)) {
            el.addClass('in-view');
        } else {
            // el.removeClass('in-view');
        }
    });
    $(window).scroll(function (e) {
        $('.animate').each(function (i, el) {
            var el = $(el);
            if (el.visible(true)) {
                el.addClass('in-view');
            } else {
                // el.removeClass('in-view');
            }
        });
        header_scroll = jQuery(window).scrollTop();
        if (header_scroll >= 50) $('body').addClass("sticky");
        else $('body').removeClass("sticky");
        var arrow_up = jQuery(".back-to-top"),
            scroll = jQuery(window).scrollTop();
        if (scroll >= 500) arrow_up.addClass("in");
        else arrow_up.removeClass("in");


        if ($(window).width() < 1200) {
            if ($(".anchor").length) {
                let anchorOfTop = $('.anchor').offset().top;
                let headerH = $('.header').height() + 1
                let headerOfTop = $('.header').offset().top
                if (parseInt(anchorOfTop) <= headerOfTop + headerH) {
                    $('body').addClass('sticky-anchor')
                } else {
                    $('body').removeClass('sticky-anchor')
                }

            }
        }






    });

    $(".back-to-top").click(function () {
        $("html, body").animate({
            scrollTop: 0
        }, "slow");
        return false;
    });

    $(' .has-dropdown').click(function () {
        if ($(this).hasClass('in') && !$(this).is('.header__search.in')) {

            $(this).removeClass('in')
            $(this).parent().removeClass('in')

        } else {
            $(' .header__buttons>div').removeClass('in')
            $(this).addClass('in')
            $(this).parent().addClass('in')
        }

    })


    $(window).click(function (e) {
        if (!$(e.target).closest('.header__buttons>div').length) {
            $('.header__buttons, .header__buttons>div').removeClass('in')
            jQuery('#search-form-result').hide();
        } else if ($(e.target).closest('.search-close').length && $(window).width() < 768) {
            $('.header__buttons, .header__buttons>div').removeClass('in')
            jQuery('#search-form-result').hide();
        }
    })


    $('.reg-btn').click(function (e) {
        e.preventDefault()
        $('.modal  form.login').removeClass('active').hide()
        $('.modal  form.register').addClass('active').show()
    })
    $('.log-btn').click(function (e) {
        e.preventDefault()
        $('.modal  form.register').removeClass('active').hide()
        $('.modal  form.login').addClass('active').show()
    })


    jQuery('.main-slider').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        centerMode: true,
        autoplay: true,
        speed: 500,
        autoplaySpeed: 3000,
        dots: true,
        arrows: true,
        centerMode: false,
        fade: true,
        draggable: true,
        rtl: true,
        infinite: true,
        nextArrow: '<button class="slick-arrow slick-next"><i class="icon-arrow-left"></i>   </button>',
        prevArrow: '<button class="slick-arrow slick-prev"> <i class="icon-arrow-right"></i>     </button>  ',
    });

    if ($(window).width() > 767) {
        jQuery('.products-slider .horizontal-slider ').slick({
            slidesToShow: 4,
            slidesToScroll: 1,
            centerMode: false,
            autoplaySpeed: 3000,
            dots: false,
            arrows: true,


            // focusOnSelect: true,
            draggable: true,
            rtl: true,
            infinite: true,
            autoplay: true,
            speed: 500,
            autoplaySpeed: 3000,
            nextArrow: '<button class="slick-arrow slick-next"><i class="icon-arrow-left"></i>   </button>',
            prevArrow: '<button class="slick-arrow slick-prev"> <i class="icon-arrow-right"></i>     </button>  ',
            responsive: [

                {
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 3,

                    }
                },
                {
                    breakpoint: 767,
                    settings: {
                        slidesToShow: 1,

                        arrows: false,
                        centerMode: true,
                        infinite: false,
                    }
                }

            ]

        });
        jQuery('.related-products-slider .horizontal-slider ').slick({
            slidesToShow: 3,
            slidesToScroll: 1,
            centerMode: false,
            dots: false,
            arrows: true,
            adaptiveHeight: true,
            // focusOnSelect: true,
            speed: 500,
            autoplaySpeed: 3000,
            draggable: true,
            rtl: true,
            infinite: true,
            // autoplay: true,
            nextArrow: '<button class="slick-arrow slick-next"><i class="icon-arrow-left"></i>   </button>',
            prevArrow: '<button class="slick-arrow slick-prev"> <i class="icon-arrow-right"></i>     </button>  ',
            responsive: [

                {
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 3,

                    }
                },
                {
                    breakpoint: 767,
                    settings: {
                        slidesToShow: 1,

                        arrows: false,
                        centerMode: true,
                        infinite: false,
                    }
                }

            ]

        });
    }
    jQuery('.home-slider.blog-slider .horizontal-slider ').slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        centerMode: false,
        speed: 500,
        dots: true,
        dots: false,
        arrows: true,
        autoplay: true,
        speed: 500,
        autoplaySpeed: 3000,
        // focusOnSelect: true,
        draggable: true,
        rtl: true,

        customPaging: '40px',
        infinite: true,
        nextArrow: '<button class="slick-arrow slick-next"><i class="icon-arrow-left"></i>   </button>',
        prevArrow: '<button class="slick-arrow slick-prev"> <i class="icon-arrow-right"></i>     </button>  ',
        responsive: [

            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 3,

                }
            },
            {
                breakpoint: 767,
                settings: {
                    slidesToShow: 1,

                    centerMode: true,
                    variableWidth: true,

                }
            }

        ]

    });

    jQuery('.related-articles-carousel  ').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        centerMode: false,
        autoplay: true,
        speed: 500,
        autoplaySpeed: 3000,
        dots: false,
        arrows: true,

        // focusOnSelect: true,
        draggable: true,
        rtl: true,
        infinite: true,
        nextArrow: '<button class="slick-arrow slick-next"><i class="icon-arrow-left"></i>   </button>',
        prevArrow: '<button class="slick-arrow slick-prev"> <i class="icon-arrow-right"></i>     </button>  ',
        responsive: [

            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 3,

                }
            },
            {
                breakpoint: 767,
                settings: {
                    slidesToShow: 2,

                    centerMode: true,
                    variableWidth: true,

                }
            }

        ]

    });


    jQuery('.gallery-slider  ').slick({
        slidesToShow: 1.69,
        slidesToScroll: 1,
        centerMode: true,
        autoplay: true,
        speed: 500,
        autoplaySpeed: 3000,
        dots: false,
        arrows: true,

        // focusOnSelect: true,
        draggable: true,
        rtl: true,
        infinite: true,
        nextArrow: '<button class="slick-arrow slick-next"><i class="icon-arrow-left"></i>   </button>',
        prevArrow: '<button class="slick-arrow slick-prev"> <i class="icon-arrow-right"></i>     </button>  ',
        responsive: [


            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 1,


                    variableWidth: true,

                }
            }

        ]

    });



    jQuery('.product-slider').slick({
        slidesToShow: 1,
        slidesToScroll: 1,

        autoplay: true,
        speed: 500,
        autoplaySpeed: 3000,
        dots: true,
        arrows: true,

        // focusOnSelect: true,
        draggable: true,
        rtl: true,
        infinite: true,
        nextArrow: '<button class="slick-arrow slick-next"><i class="icon-arrow-left"></i>   </button>',
        prevArrow: '<button class="slick-arrow slick-prev"> <i class="icon-arrow-right"></i>     </button>  ',


    });


    //$('select').not('#billing_city, #shipping_city').niceSelect();

    if ($('.product-slider .slick-dots li').length == 1) {
        $('.product-slider .slick-dots').hide()
    }
    if ($(window).width() > 1199) {




        /*let selectFirst = $('select option:first-child').text()
        $('.nice-select .current').html(selectFirst)
        console.log(selectFirst)*/



        jQuery('.show-mega-menu').hover(
            function () {
                var el = jQuery(this),
                    id = jQuery(this).html();

                jQuery(this).addClass('open');
                jQuery(this).closest('a').addClass('open');
                $('body').addClass('mega-menu-open');
                jQuery('#mega-menu__' + id).addClass('open');

                jQuery(document).on('mousemove', function (e) {
                    if (el.is(':hover') || jQuery('#mega-menu__' + id).is(':hover')) { } else {
                        el.removeClass('open');
                        el.closest('a').removeClass('open');
                        jQuery('#mega-menu__' + id).removeClass('open');
                        $('body').removeClass('mega-menu-open');
                    }
                });
            }
        );

        $('.post__info-item .socials a').click(function (e) {
            e.preventDefault();
            var $link = $(this);
            var href = $link.attr('href');
            var network = $link.attr('data-network');

            var networks = {
                facebook: {
                    width: 600,
                    height: 300
                },
                linkedin: {
                    width: 600,
                    height: 300
                },
                twitter: {
                    width: 600,
                    height: 300
                },
            };

            var popup = function (network) {
                var options = 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,';
                window.open(href, '', options + 'height=' + networks[network].height + ',width=' + networks[network].width);
            }

            popup(network);
        });


    }






    if ($(window).width() < 1200) {
        // $('select').wrap('<div class="select-wpepper"></div>')
        // $('.sale-select select').niceSelect();
        $(".anchor__title").click(function () {
            $(this).next('ul').slideToggle()
            $(this).toggleClass('in')
        })
        jQuery('.show-mega-menu').click(

            function () {
                var el = jQuery(this),
                    id = jQuery(this).html();

                jQuery(this).addClass('open');
                jQuery(this).parent('a').addClass('open');

                jQuery('#mega-menu__' + id).addClass('open');


            }
        );
        jQuery('.megamenu__close').on('click', function (e) {
            $('.megamenu').removeClass('open')
        });
        $('.products-filter select').niceSelect()

    }

    // $('.frontend-form .acf-form-fields .acf-field:nth-child(1)').addClass('active')
    $('.frontend-form .acf-form-fields .acf-field:nth-child(1)').each(function () {
        $(this).addClass('active')
        $(this).find('.acf-input').fadeIn()
    })



    $('.frontend-form .acf-fields>.acf-field:nth-child(1)>.acf-label').click(function () {
        $(this).parent().toggleClass('active')
        $(this).siblings('.acf-input').slideToggle()

    })

    $('.frontend-form .acf-form-fields .acf-label').append('<i class="icon-cross"></i>')

    $('.icon-eye-open').click(function () {
        $(this).siblings('img').toggleClass('in')
    })


    $('.frontend-form .acf-form-fields .acf-field:nth-child(1) .step__button').click(function () {
        let is_ok = true
        const inputs = document.querySelectorAll('.frontend-form .acf-form-fields>.acf-field:nth-child(1)  input[required=required],.frontend-form .acf-form-fields>.acf-field:nth-child(1) .is-required [type=file]');

        if (inputs) {
            for (const input of inputs) {
                if (input.value === '') {
                    is_ok = false
                    input.classList.add('error')
                } else {
                    input.classList.remove('error')
                }
                if (input.files) {
                    // console.log(input)
                    if (!input.files.length) {
                        is_ok = false
                        input.closest('div').classList.add('error')
                    } else {
                        input.closest('div').classList.remove('error')
                    }
                }
            }
        }

        if (is_ok) {
            $('.frontend-form .acf-form-fields .acf-field:nth-child(1) .step__button').addClass('enable')
            $('.frontend-form .acf-fields>.acf-field:nth-child(2)>.acf-label').click(function () {
                $(this).parent().toggleClass('active')
                $(this).siblings('.acf-input').slideToggle()

            })
        } else {
            $('.frontend-form .acf-form-fields .acf-field:nth-child(1) .step__button').removeClass('enable')
        }
        if ($('.frontend-form .acf-form-fields .acf-field:nth-child(1) .step__button').hasClass('enable')) {
            $('.interactive-form__step li:first-child').next().addClass('check')
            $(this).closest('.acf-field.acf-field-group').removeClass('active')
            $(this).parent().parent().parent().parent().slideUp()
            // $(this).closest('.active').next('.acf-label').click()
            $('.frontend-form .acf-form-fields .acf-field:nth-child(2)').find('.acf-input').slideDown()
            $('.frontend-form .acf-form-fields .acf-field:nth-child(2)').addClass('active')
        }

    })


    $('.frontend-form .acf-form-fields .acf-field:nth-child(2) .step__button:not(.no_modal)').click(function () {
        let is_ok = true
        const inputs = document.querySelectorAll('.frontend-form .acf-form-fields  [required=required], .is-required [type=file]');
        // console.log(inputs)
        if (inputs) {
            for (const input of inputs) {
                if (input.value === '') {
                    is_ok = false
                    input.classList.add('error')
                } else {
                    input.classList.remove('error')
                }
                if (input.files) {

                    if (!input.files.length) {
                        is_ok = false
                        input.closest('div').classList.add('error')
                    } else {
                        input.closest('div').classList.remove('error')
                    }
                }
            }
        }

        if (is_ok && is_product_find) {
            $('.frontend-form .acf-form-fields .acf-field:nth-child(2) .step__button').addClass('enable')
        } else {
            $('.frontend-form .acf-form-fields .acf-field:nth-child(2) .step__button').removeClass('enable')
        }
        if ($('.frontend-form .acf-form-fields .acf-field:nth-child(2) .step__button').hasClass('enable')) {
            $('.interactive-form-modal, .modal-close-area').fadeIn()
            $('.interactive-form__step li.check').next().addClass('check')

        }

    })
    $('.interactive-form-modal__buttons a').click(function () {
        try {
            Convert_HTML_To_PDF()
        } catch (e) {
            // console.log(e)
        }

        /*  $('.acf-form .acf-form-submit [type=submit]').submit()
         $('.modal').fadeOut()
         $(body).removeClass('modal-open'); */
    })
    $('.frontend-form .acf-form-fields .acf-field:nth-child(2) .step__button.no_modal').click(function () {
        let is_ok = true
        const inputs = document.querySelectorAll('.frontend-form .acf-form-fields  [required=required], .is-required [type=file], .is-required select');
        console.log(inputs)
        if (inputs) {
            for (const input of inputs) {
                if (input.value === '') {
                    is_ok = false

                    if (input.nodeName === "SELECT") {
                        input.closest('.acf-field-select').querySelector('.nice-select').classList.add('error')
                    } else {
                        input.classList.add('error')
                    }
                } else {
                    if (input.nodeName === "SELECT") {
                        input.closest('.acf-field-select').querySelector('.nice-select').classList.remove('error')
                    } else {
                        input.classList.remove('error')
                    }
                }
                // console.log(input.value)
                if (input.files) {

                    if (!input.files.length) {
                        is_ok = false
                        input.closest('div').classList.add('error')
                    } else {
                        input.closest('div').classList.remove('error')
                    }
                }
            }
        }
        if (is_ok) {
            $('.acf-form .acf-form-submit [type=submit]').submit()

        }
    })

    if ($('.acf-field-file').length) {




        $('.acf-file-uploader input[type=hidden]').on('change', function () {
            if ($(this).val() != 0) {
                let id = $(this).closest('.file-block').attr('id');


                $('.' + id + ' .file-name-title').hide()
                $('.' + id + ' .file-name').append($('[data-name=filename]').text())
                $('.' + id + ' .remove-file ').css('display', 'flex')

            }

        })




    }




    if ($(window).width() < 768) {
        accordion('.footer-item-title.toggle');
    }
    if ($(window).width() < 1200) {
        $('.megamenu__open-sub-sub-menu').click(function () {
            var $_this = $(this).parent();

            if ($_this.hasClass('in')) {
                $_this.removeClass('in').next().slideUp();
            } else {
                $('.megamenu__open-sub-sub-menu').parent().removeClass('in').next().slideUp();
                $_this.toggleClass('in').next().slideDown();
            }



        })

        $('.megamenu__open-sub-sub-menu').each(function () {

            if (!$(this).closest('.megamenu__categories-item').find('ul').length) {
                $(this).css('display', 'none')
                $(this).closest('.megamenu__categories-item').find('i').css('display', 'none')
            }
        })

        // accordion('.megamenu__open-sub-sub-menu');
    }

    // accordion('.accordion .toggle-item');


    accordion($('.toggless__title'))

    function accordion(accordionclass) {
        $(accordionclass).click(function () {
            var $_this = $(this);


            if ($_this.hasClass('in')) {
                $_this.removeClass('in').next().slideUp();
            } else {
                $(accordionclass).removeClass('in').next().slideUp();
                $_this.toggleClass('in').next().slideDown();
            }
            $('.footer-item-title.toggle').parent().removeClass('in');
            $(this).parent().addClass('in');
        });
    }
    $('.toggless .btn:not(.custom-coupon__btn):not(#custom-shipping-methods__btn_3):not(.nextAccordion)').click(function () {
        $(this).closest('.toggless').next().find('.toggless__title').click()
        $('.interactive-form__step .check').next().addClass('check')
    })
    $('#custom-shipping-methods__btn_3').click(function () {
        if (is_valid_check_custom_shipping_methods__inputs_3()) {
            $(this).closest('.toggless').next().find('.toggless__title').click()
            $('.interactive-form__step .check').next().addClass('check')
        }
    })

    $('.nextAccordion').click(function () {
        if (is_valid_form_inputs()) {

            $(this).closest('.toggless').next().find('.toggless:first-child .toggless__title').click()
            $('.interactive-form__step .check').next().addClass('check')
        }
    })

    // $(".filter li").on('click', function() {
    //     var filter = $(this).data('filter');
    //     $(".home-slider.blog-slider .horizontal-slider").slick('slickUnfilter');


    //     $(".home-slider.blog-slider .horizontal-slider").slick('slickFilter', '.' + filter);



    // })



    function tooltip(tooltipClass) {
        $(tooltipClass).each(function () {
            tolltipW = $(this).outerWidth() / 2;
            tooltipParW = $(this).parent().width() / 2;
            console.log(tolltipW, tooltipParW)
            $(this).css('left', -(tolltipW - tooltipParW))

        })

    }
    tooltip($(' .tooltip'))


    // $('.single-product__add .tooltip, .image-content__target .product-card .tooltip').each(function() {
    //     tolltipW = $(this).width() / 2;
    //     $(this).css('left', -(tolltipW - 10))

    // })




    $('#pass-new-1').on('input', checkUnAuthUserPassword)




    /*
    $('#password_current').on('input', function () {
        let currentPass2Val = $('.pass-new input[type=password]').val();
        if ($(this).val() == currentPass2Val) {

            $('.pass-button').removeClass('pass-disabled')
        } else {
            $('.pass-button').addClass('pass-disabled')
        }
    })*/
    $(document).click(function (e) {
        if (!e.target.closest('.pass-validation')) {
            $('.pass-validation').removeClass('active')
        }
    })



    /*   $('.account__table-title').each(function() {
          $(this).val($(this).val().replace(/\D/gi, '')).replace(/\D/gi, '')
          console.log(this)
      }) */
    // let titles = document.querySelectorAll('.account__table-title')
    // console.log(titles)
    // if (titles && titles.length) {
    //     for (const iterator of titles) {
    //         iterator.textContent = iterator.textContent.replace(/\D/gi, '')

    //     }




    $(document).ajaxComplete(function () {
        $('.products-filter select').niceSelect()
        tooltip($('.tooltip'))
        tooltip($('.image-content__target .product-card'))
        $('.image-content__target .product').each(function () {

            const rect_2 = this.getBoundingClientRect();

            if (rect_2.left < 10) {
                // console.log('<10')
                let prodLeft = this.offsetLeft

                $(this).css('left', prodLeft - rect_2.left + 10 + 'px')

            }

            if (rect_2.right > $('.image-map').width()) {

                let prodLeft = this.offsetLeft
                console.log(prodLeft, $('.image-map').width() - rect_2.right)
                $(this).css('left', prodLeft + ($('.image-map').width() - rect_2.right) - 10 + 'px')

            }


        })
        if ($(window).width() > 1199) {
            // $('select').not('#billing_city, #shipping_city').niceSelect()
        }
        if ($('.mini-cart__item').length < 3) {
            $('.woocommerce-mini-cart').addClass('no-scroll')

        }
        if ($('.woocommerce-error[role=alert]').length) {
            $('.woocommerce-remove-coupon').click()
            $('.custom-coupon__hidden').addClass('error')
            $('.cart-discount.error').show()

        } else {
            $('.cart-discount.error').hide()
            $('.custom-coupon__hidden').removeClass('error')
        }

        $($('.single-product__add .tooltip')).each(function () {
            tolltipW = $(this).width() / 2;
            $(this).css('left', -(tolltipW - 10))

        })
        $('.custom-coupon__label.in').click(function () {
            $('.custom-coupon__hidden').slideToggle()
            $(this).toggleClass('in')
        })
        $('.custom-coupon input').on('input', function () {
            let val = $(this).val()
            $('.coupon .input-text').val(val)
        })

        $('.custom-coupon__label').addClass('in')
        $('.custom-coupon__hidden').show()
        $('.custom-coupon__btn').click(function () {
            $('.coupon .button').click()
            $('.custom-coupon__label').addClass('in')
        });

        if ($('.lost-passs-modal .login_msg.success ').text().length > 0) {
            $('.lost-passs-modal').fadeOut()

            $('#form-message').fadeIn()


            if ($(body).is('.page-template-template_warranty:not(.logged-in),.page-template-template_call-service:not(.logged-in)')) {
                setTimeout(function () {
                    $('#form-message').fadeOut()
                }, 3000)
                setTimeout(function () {
                    $('.login-modal').fadeIn()
                }, 3000)
            } else {
                setTimeout(function modalClose() {
                    $('.modal-close-btn').click()
                }, 3000)
            }
        }

        jQuery('.cart-btn__quantity').text(jQuery('.mini-cart__quantity').text());



    });

    $('.single_add_to_cart_button').click(function () {
        $(this).text('נוסף לסל');
    })

    $('.custom-coupon__label').click(function () {
        $('.custom-coupon__hidden').slideToggle()
        $(this).toggleClass('in')
    })
    $('.custom-coupon__inner input').on('input', function () {
        let val = $(this).val()
        $('.coupon .input-text, .checkout_coupon .input-text').val(val)
    })
    $('.custom-coupon__btn').click(function () {
        $('.coupon .button, .checkout_coupon  button').click()
        $('.custom-coupon__label').addClass('in')
    })

    setTimeout(
        function () {
            $('.image-content__target ').each(function () {
                let imgMapapH = $('.image-map').height();
                let item = $(this).find('.product-card ');

                if (this.offsetTop < (imgMapapH / 3)) {
                    $(item).closest('.image-content__target').addClass('image-content__bottom-tooltip')

                } else {
                    $(item).closest('.image-content__target').addClass('image-content__top-tooltip')

                }


            })

            tooltip($('.image-content__target .product-card'))
            $('.image-content__target .product').each(function () {

                const rect_2 = this.getBoundingClientRect();

                if (rect_2.left < 10) {
                    // console.log('<10')
                    let prodLeft = this.offsetLeft

                    $(this).css('left', prodLeft - rect_2.left + 10 + 'px')

                }

                if (rect_2.right > $('.image-map').width()) {

                    let prodLeft = this.offsetLeft
                    console.log(prodLeft, $('.image-map').width() - rect_2.right)
                    $(this).css('left', prodLeft + ($('.image-map').width() - rect_2.right) - 10 + 'px')

                }


            })


        }, 3000

    )




    // let el = $('.image-content__target')
    // for (let iterator of el) {
    //     let rect = iterator.getBoundingClientRect();
    //     console.log(rect.left)
    //     return {
    //         left: rect.left + window.scrollX,
    //         top: rect.top + window.scrollY
    //     };
    // }


    // if ($(window).width() < 1200) {
    //     $('.image-content__target').click(function() {
    //         if ($(this).is('.in')) {
    //             $(this).removeClass('in')
    //         } else {
    //             $('.image-content__target').removeClass('in')
    //             $(this).addClass('in')
    //         }


    //     })

    // }






    if ($(window).width() > 992) {
        $('.posts-filters li a').on('click', function (e) {
            e.preventDefault()

            $('.posts-filters li').removeClass('active');
            $(this).parent().addClass('active');




        });
    } else {
        $('.posts-filters__dropdown li a').on('click', function (e) {
            e.preventDefault()

            $('.posts-filters__dropdown li').removeClass('active');
            $(this).parent().addClass('active');



        });

    }


    $('.posts-filters >li> a ').click(function () {
        $('body').toggleClass('post-filters-in')

    })
    if ($(window).width() < 992) {
        $('.posts-filters__dropdown,.filters-bg').click(function () {
            $('body').removeClass('post-filters-in')

        })
    }


    AOS.init();


    if ($(".anchor").length) {

        // Cache selectors
        let lastId,
            topMenu = $(".anchor"),
            // All list items
            menuItems = topMenu.find("a"),
            // Anchors corresponding to menu items
            scrollItems = menuItems.map(function () {
                let item = $($(this).attr("href"));
                if (item.length) {
                    return item;
                }
            });

        // Bind click handler to menu items
        // so we can get a fancy scroll animation
        let hSection = $('.anchor');
        let headerH = $('.header').outerHeight()

        if (!hSection.length) {
            hSectionH = 0
        }

        menuItems.click(function (e) {

            let i;
            if ($(window).width() < 1200) {
                i = headerH + $('.anchor').height() - 30
                $('.anchor__title').click()
            } else {
                i = 10
            }
            let href = $(this).attr("href"),
                offsetTop = href === "#" ? 0 : $(href).offset().top - (i + headerH);
            $('html, body').stop().animate({
                scrollTop: offsetTop
            }, 1000);
            e.preventDefault();
        });

        $(window).scroll(function () {
            // Get container scroll position
            let fromTop = $(this).scrollTop();
            // Get id of current scroll item
            let cur = scrollItems.map(function () {
                if ($(this).offset().top - 300 <= fromTop) return this;
            });
            // Get the id of the current element
            cur = cur[cur.length - 1];
            let id = cur && cur.length ? cur[0].id : "";

            if (lastId !== id) {
                lastId = id;
                // Set/remove active class
                menuItems
                    .parent().removeClass("active")
                    .end().filter("[href='#" + id + "']").parent().addClass("active");
            }


        });

    }
    if ($('[data-fancybox]').length) {
        $('[data-fancybox]').fancybox({
            loop: true,
            buttons: [
                'zoom',
                'close'
            ],

        });

    }

    $('.seo__content').each(function () {
        let firstPar = $(this).find('p:first-child');
        let allContent = $(this).html();
        if ($(firstPar).text().length > 276 || $(this).children().length > 1) {
            $(this).parent().append('<div class="hiddenContent" style="display:none">' + allContent + '</div>')
            let shortText = $(this).text().slice(0, 276);
            $(this).html('<p>' + shortText + '</p>')
            $('.seo__show').show()
        }
    })

    $('.seo__show').click(function () {
        $(this).closest('.seo').find('.hiddenContent').show();
        $(this).closest('.seo').find('.seo__content').hide()
        $('.seo__hide').show()
        $('.seo__show').hide()
    })

    $('.seo__hide').click(function () {
        $(this).closest('.seo').find('.hiddenContent').hide();
        $(this).closest('.seo').find('.seo__content').show()
        $('.seo__hide').hide()
        $('.seo__show').show()
    })
});
window.addEventListener('load', () => {
    const files = document.querySelectorAll('.acf-file-uploader [type=file]');
    if (!files && !files.length) {
        return
    }
    for (const file of files) {
        const fileTitle = file.closest('.acf-field-file').previousElementSibling.querySelector('.file-name-title');
        const delete_btn = file.closest('.acf-field-file').previousElementSibling.querySelector('.remove-file');
        if (!fileTitle && !delete_btn) {
            return
        }
        file.addEventListener('change', () => {
            // console.dir(file.files);
            if (file.files.length) {


                fileTitle.textContent = file.files[0].name;
                delete_btn.style.display = 'inline-flex';
            } else {
                removeFileFromFileList(file, 0)
            }
        });
        if (delete_btn) {
            delete_btn.addEventListener('click', () => removeFileFromFileList(file, 0));
        }


        function removeFileFromFileList(file, index) {
            const dt = new DataTransfer()
            const input = file
            const {
                files
            } = input

            for (let i = 0; i < files.length; i++) {
                const file = files[i]
                if (index !== i)
                    dt.items.add(file) // here you exclude the file. thus removing it.
            }

            input.files = dt.files // Assign the updates list
            fileTitle.textContent = 'לא נבחר קובץ'
            delete_btn.style.display = 'none';
            // console.dir(file.files);
        }
    }
    /* const btn = document.querySelector('#step3');
    const submit = document.querySelector('.acf-form-submit [type=submit]');
    btn.addEventListener('click',()=>{
      
        submit.click()
    })
     */
});











// Quantity
jQuery(function ($) {
    if (!String.prototype.getDecimals) {
        String.prototype.getDecimals = function () {
            var num = this,
                match = ('' + num).match(/(?:\.(\d+))?(?:[eE]([+-]?\d+))?$/);
            if (!match) {
                return 0;
            }
            return Math.max(0, (match[1] ? match[1].length : 0) - (match[2] ? +match[2] : 0));
        }
    }
    $(document).on('click', '.plus, .minus', function () {
        // Get values
        var $qty = $(this).closest('.quantity').find('.qty'),
            currentVal = parseFloat($qty.val()),
            max = parseFloat($qty.attr('max')),
            min = parseFloat($qty.attr('min')),
            step = $qty.attr('step');
        // Format values
        if (!currentVal || currentVal === '' || currentVal === 'NaN') currentVal = 0;
        if (max === '' || max === 'NaN') max = '';
        if (min === '' || min === 'NaN') min = 1;
        if (step === 'any' || step === '' || step === undefined || parseFloat(step) === 'NaN') step = 1;
        // Change the value
        if ($(this).is('.plus')) {
            if (max && (currentVal >= max)) {
                $qty.val(max);
            } else {
                $qty.val((currentVal + parseFloat(step)).toFixed(step.getDecimals()));
            }
        } else {
            if (min && (currentVal <= min)) {
                $qty.val(min);
            } else if (currentVal > 0) {
                $qty.val((currentVal - parseFloat(step)).toFixed(step.getDecimals()));
            }
        }
        // Trigger change event
        $qty.trigger('change');
    });
    $('.single-product__description-title').click(function () {
        $(this).toggleClass('in')
        $(this).next().slideToggle()
    })

    if ($(window).width() > 991) {

        $('.share').click(function (e) {
            e.preventDefault();
            var $link = $(this);
            var href = $link.attr('href');
            var network = $link.attr('data-network');

            var networks = {
                facebook: {
                    width: 600,
                    height: 300
                },
                whatsapp: {
                    width: 600,
                    height: 300
                },
                twitter: {
                    width: 600,
                    height: 300
                },
            };

            var popup = function (network) {
                var options = 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,';
                window.open(href, '', options + 'height=' + networks[network].height + ',width=' + networks[network].width);
            }

            popup(network);
        });

    };


    if ($(window).width() < 992) {
        let MyAccountactiveLink = $('.woocommerce-MyAccount-navigation-link.is-active ')

        $('.woocommerce-MyAccount-navigation').prepend("<ul></ul>")
        $('.woocommerce-MyAccount-navigation ul:first-child').prepend(MyAccountactiveLink)
        // $('.woocommerce-MyAccount-navigation ul:last-child').

        $('.woocommerce-MyAccount-navigation-link.is-active ').click(function (e) {
            e.preventDefault()
            $(this).parent().next().slideToggle()
            $(this).closest('.woocommerce-MyAccount-navigation').toggleClass('active')
        })
    }

    $('.del-address').click(function (e) {
        e.preventDefault()
        $(this).parent().find('.modal').show()
    })


    function menuTop() {

        let headerH = $('.header').innerHeight()
        $('.header-menu').css('top', (headerH - 1) + "px")
    }
    $('.header-menu').each(function () {
        menuTop()
    })
    $(window).scroll(function () {
        setTimeout(menuTop, 100)

    })
});



function refreshNiceSelect(element) {
    jQuery(element).niceSelect('update');
}

/* checkout check inputs */

function is_valid_check_custom_shipping_methods__inputs_3() {
    let billings_inputs = document.querySelectorAll('.checkout .woocommerce-billing-fields .validate-required .input-text, .checkout .woocommerce-billing-fields .validate-required select ');
    let shipping_inputs = document.querySelectorAll('.checkout .woocommerce-shipping-fields .validate-required .input-text, .checkout .woocommerce-shipping-fields .validate-required select ');
    let btn = document.querySelector('#custom-shipping-methods__btn_3');
    let ship_to_different_address_input = document.querySelector('[name=ship_to_different_address]');

    if (billings_inputs && billings_inputs.length &&
        shipping_inputs && shipping_inputs.length &&
        btn && ship_to_different_address_input) {


        let inputs
        let is_ok = true
        if (ship_to_different_address_input.checked) {
            inputs = [...billings_inputs, ...shipping_inputs]
        } else {
            inputs = billings_inputs
        }

        for (const input of inputs) {
            if (input.tagName === 'SELECT') {
                if (input.value === 'שם ישוב') {
                    is_ok = false
                    input.closest('.validate-required')?.querySelector('.select2-selection')?.classList.add('error')
                    input.classList.add('error')

                } else {
                    input.closest('.validate-required')?.querySelector('.select2-selection')?.classList.remove('error')
                    input.classList.remove('error')
                }
                continue
            }
            if (input.value === '') {
                is_ok = false
                input.classList.add('error')
            } else {
                input.classList.remove('error')
            }
        }

        return is_ok
    }

}

/* end checkout check inputs */






document.addEventListener('DOMContentLoaded', function () {
    let pass = document.querySelectorAll('[type=password]')

    if (pass.length) {
        for (const item of pass) {
            item.addEventListener('keyup', (e) => {
                checkUnAuthUserPassword(e.target)
            })
        }
    }
});




function checkUnAuthUserPassword(selector = null) {
    let currPassInput = document.querySelector('#pass-new-1');
    if (selector) {
        currPassInput = selector
    }

    let currentPassVal = jQuery(currPassInput).val();
    let currentPass = jQuery(currPassInput).val();
    console.log(jQuery(currPassInput).closest('form').find('.pass-validation '))
    if (jQuery(currPassInput).val().length > 0) {
        jQuery(currPassInput).closest('form').find('.pass-validation ').addClass('active')
    } else[
        jQuery(currPassInput).closest('form').find('.pass-validation ').removeClass('active')
    ]
    if (jQuery(currPassInput).val().length >= 8) {
        jQuery(currPassInput).closest('form').find('.pass-count').addClass('active')

    } else {
        jQuery(currPassInput).closest('form').find('.pass-count').removeClass('active')
    }




    if (/\d/.test(jQuery(currPassInput).val())) {
        jQuery(currPassInput).closest('form').find('.pass-num').addClass('active')
    } else {
        jQuery(currPassInput).closest('form').find('.pass-num').removeClass('active')
    }



    if (/[A-Z]/.test(jQuery(currPassInput).val())) {
        jQuery(currPassInput).closest('form').find('.pass-register').addClass('active')
    } else {
        jQuery(currPassInput).closest('form').find('.pass-register').removeClass('active')
    }

    if (jQuery(currPassInput).closest('form').find('.pass-register').hasClass('active') && jQuery(currPassInput).closest('form').find('.pass-num').hasClass('active') && jQuery(currPassInput).closest('form').find('.pass-count').hasClass('active')) {

        jQuery(currPassInput).closest('form').find('.pass-validation').removeClass('active')
        jQuery('.pass-audit').show(300)
        /*if ($('#password_current').length) {
            if ($(this).val() == currentPassVal) {

                $('.pass-button').removeClass('pass-disabled')
            } else {
                $('.pass-button').addClass('pass-disabled')
            }
        } else {
            $('.pass-button').removeClass('pass-disabled')
        }*/



    }


    if (jQuery('#create-user').length &&
        jQuery('#create-user')[0].checked) {

        if (check_password(currPassInput)) {
            jQuery('#account_password').val(currentPass)

        } else {
            jQuery('#account_password').val('')

        }

    }

}

function check_password(input) {
    return input.value.length >= 8 &&
        /\d/.test(input.value) &&
        /[A-Z]/.test(input.value)

}




function is_valid_form_inputs() {
    let create_inputs = document.querySelectorAll('.form-group__inputs input');
    let create_user_checkbox = document.querySelector('#create-user');
    let new_pass = document.querySelector('#pass-new-1');

    checkUnAuthUserPassword()
    if (create_inputs && create_inputs.length) {

        let inputs
        let is_ok = true
        if (create_user_checkbox?.checked) {
            inputs = [...create_inputs, new_pass]
        } else {
            inputs = create_inputs
        }
        for (const input of inputs) {
            if (input.id === 'pass-new-1' && !check_password(input)) {

                is_ok = false
                input.classList.add('error')
            } else if (input.value === '') {
                is_ok = false
                input.classList.add('error')
            } else {
                input.classList.remove('error')
            }
        }

        return is_ok
    }

}



















/* cabinet  */

document.addEventListener('DOMContentLoaded', () => {
    let inputs = document.querySelectorAll('.woocommerce-EditAccountForm.edit-account input.input-text, .woocommerce-ResetPassword input.input-text:not(#user_login)');
    let submit_btn = document.querySelector('.woocommerce-EditAccountForm.edit-account [type=submit], .woocommerce-ResetPassword [type=submit]');
    let [pass_1, pass_2] = document.querySelectorAll('.woocommerce-EditAccountForm.edit-account #password_1, .woocommerce-EditAccountForm.edit-account #password_2, .woocommerce-ResetPassword #password_1, .woocommerce-ResetPassword #password_2');
    let is_ok = true

    if (inputs.length && submit_btn && pass_1 && pass_2) {

        for (const input of inputs) {
            input.addEventListener('keyup', (e) => inputHandler(e, input, inputs))
        }
        submit_btn.closest('form').addEventListener('submit', (e) => submitHandler(e, inputs))
        console.log(submit_btn.closest('form'))
        pass_2.closest('.woocommerce-form-row').style.display = 'none'
        pass_1.addEventListener('keyup', (e) => {

            pass_2.value = pass_1.value

        })
    }

    function submitHandler(e, inputs) {
        is_ok = true


        for (const input of inputs) {
            if (input.value > 10) {
                debugger
            }

            if (input.value === '') {
                input.classList.add('error')
            } else {
                input.classList.remove('error')
            }

            if (input.id === 'password_1' && !checkPasswordStrength(input.value)) {
                input.classList.add('error')
            } else if (input.id === 'password_1' && checkPasswordStrength(input.value)) {
                input.classList.remove('error')
            }
        }


        for (const input of inputs) {
            if (input.classList.contains('error')) {
                is_ok = false
            }
        }
        if (!is_ok) {

            e.preventDefault()
            submit_btn.disabled = true
            submit_btn.style.pointerEvents = 'none'
            submit_btn.classList.add('disabled')
        } else {

            submit_btn.disabled = false
            submit_btn.style.pointerEvents = 'auto'
            submit_btn.classList.remove('disabled')

        }
    }

    function inputHandler(e, input, inputs) {



        is_ok = true
        for (const input of inputs) {
            if (input.value === '') {
                input.classList.add('error')
            } else {
                input.classList.remove('error')
            }

            if (input.id === 'password_1' && !checkPasswordStrength(input.value)) {
                input.classList.add('error')
            } else if (input.id === 'password_1' && checkPasswordStrength(input.value)) {
                input.classList.remove('error')
            }
        }


        for (const inp of inputs) {
            if (inp.classList.contains('error')) {
                is_ok = false
            }
        }

        if (!is_ok) {
            e.preventDefault()

            submit_btn.disabled = true
            submit_btn.style.pointerEvents = 'none'
            submit_btn.classList.add('disabled')
        } else {
            submit_btn.disabled = false
            submit_btn.style.pointerEvents = 'auto'
            submit_btn.classList.remove('disabled')
        }




    }

    function checkPasswordStrength(pass) {
        return !(pass.length < 8 || !/\d/.test(pass) || !/[A-Z]/.test(pass))
    }
});
/* end cabinet  */
window.addEventListener('load', () => {
    console.log(jQuery("[name=add-to-cart],.single_add_to_cart_button "))

    jQuery("[name=add-to-cart],.single_add_to_cart_button ").on('click', () => {
        jQuery("[name=add-to-cart],.single_add_to_cart_button ").text(" מוסיף...")
        jQuery(document).ajaxComplete((event, xhr, settings) => {
            console.log(event)
            jQuery("[name=add-to-cart],.single_add_to_cart_button ").text("נוסף לסל")

        })
        jQuery(document).ajaxComplete(() => {

        })
    })

});