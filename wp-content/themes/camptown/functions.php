<?php
//add_filter('show_admin_bar', '__return_false'); // Відключити адмінпанель
function enqueue_custom_style()
{
    wp_enqueue_style('bootstrap_reboot_css', get_template_directory_uri() . '/css/bootstrap-reboot.css');
    wp_enqueue_style('bootstrap_grid_css', get_template_directory_uri() . '/css/bootstrap-grid-rtl.css');
    wp_enqueue_style('atlasFont_css', get_template_directory_uri() . '/fonts/poloni/stylesheet.css');
    wp_enqueue_style('iconmoon_css', get_template_directory_uri() . '/css/iconmoon.css');
    wp_enqueue_style('slick_css', get_template_directory_uri() . '/css/slick.css');
    wp_enqueue_style('aos_css', get_template_directory_uri() . '/css/aos.css');
    wp_enqueue_style('fancybox_css', get_template_directory_uri() . '/css/jquery.fancybox.min.css');
    wp_enqueue_style('nice-select_css', get_template_directory_uri() . '/css/nice-select.css');
    wp_enqueue_style('my-account._css', get_template_directory_uri() . '/css/my-account.css');
    wp_enqueue_style('style', get_template_directory_uri() . '/style.css');

    wp_deregister_style('yith-wcwl-main');
}
add_action('wp_enqueue_scripts', 'enqueue_custom_style');

function enqueue_custom_script()
{
//    wp_deregister_script('jquery');
//    wp_register_script('jquery', get_template_directory_uri() . '/js/jquery.js');
//    wp_enqueue_script('jquery');


    wp_enqueue_script('jcfilter', get_template_directory_uri() . '/js/jcfilter.js', array('jquery'), true);
    wp_enqueue_script('slick_js', get_template_directory_uri() . '/js/slick.min.js', array('jquery'), true);
    wp_enqueue_script('smoothscroll_js', get_template_directory_uri() . '/js/SmoothScroll.js', array('jquery'), true);
    wp_enqueue_script('uikit_js', get_template_directory_uri() . '/js/uikit.min.js', array('jquery'), true);
    wp_enqueue_script('aos_js', get_template_directory_uri() . '/js/aos.js', array('jquery'), true);
    wp_enqueue_script('fancybox_js', get_template_directory_uri() . '/js/jquery.fancybox.min.js', array('jquery'), true);
    wp_enqueue_script('nice-select_js', get_template_directory_uri() . '/js/jquery.nice-select.js', array('jquery'), true);

    if ( is_home() ) {
        wp_enqueue_script('loadmore_js', get_template_directory_uri() . '/js/myloadmore.js', array('jquery'), true);
    }

    if (basename(get_page_template()) === 'template_contacts.php') {
        //include google maps api
        wp_enqueue_script('map_init_js', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyCZ-1-VCFCkvwgmWMN6QfeQqIQBg7JcklU&libraries=places&language=en', array('jquery'), true);
        wp_enqueue_script('map_js', get_template_directory_uri() . '/js/contact_map.js', array('jquery', 'map_init_js'), true);
    }
    if (basename(get_page_template()) === 'template_warranty.php') {


        wp_enqueue_script('map_js', get_template_directory_uri() . '/js/uikit.min.js', array('jquery'), true);
    }

    wp_enqueue_script('script_js', get_template_directory_uri() . '/js/scripts.js', array('jquery'), true);
}

add_action('get_footer', 'enqueue_custom_script');

//google map key for ACF
function my_acf_google_map_api($api)
{
    $api['key'] = 'AIzaSyCZ-1-VCFCkvwgmWMN6QfeQqIQBg7JcklU';
    return $api;
}
add_filter('acf/fields/google_map/api', 'my_acf_google_map_api');

add_image_size('camptown-thumb', 375, 375, true);

/*Theme Settings*/
function theme_setup()
{
    add_theme_support('custom-logo');
    register_nav_menu('primary', 'Primary menu');
    add_theme_support('post-thumbnails');
    add_theme_support('title-tag');
    add_theme_support('woocommerce');
}

add_action('after_setup_theme', 'theme_setup');


/*ACF OPRIONS*/
if (function_exists('acf_add_options_page')) {
    acf_add_options_page(array(
        'page_title'    => 'Theme General Settings',
        'menu_title'    => 'Theme Settings',
        'menu_slug'     => 'theme-general-settings',
        'capability'    => 'edit_posts',
        'redirect'      => false
    ));
}








add_filter('woocommerce_sale_flash', 'lw_hide_sale_flash');
function lw_hide_sale_flash()
{
    return false;
}



// Remove each style one by one
add_filter('woocommerce_enqueue_styles', 'jk_dequeue_styles');
function jk_dequeue_styles($enqueue_styles)
{
    //if ( !(is_account_page() ) ) {
    unset($enqueue_styles['woocommerce-general']);    // Remove the gloss
    unset($enqueue_styles['woocommerce-layout']);     // Remove the layout
    unset($enqueue_styles['woocommerce-smallscreen']);    // Remove the smallscreen optimisation
    //}
    return $enqueue_styles;
}



//Remove order by rating
function xr_remove_orderby_rating($orderby)
{
    unset($orderby["rating"]);
    unset($orderby["popularity"]);
    unset($orderby["date"]);

    $orderby = array(
        'menu_order' => __(' ברירת מחדל '),
        'price'      => __(' מחיר: מהנמוך לגבוה '),
        'price-desc' => __(' מחיר: מהגבוה לנמוך '),
    );

    return $orderby;
}
add_filter("woocommerce_catalog_orderby", 'xr_remove_orderby_rating', 20);




add_filter('woocommerce_catalog_orderby', 'misha_change_sorting_options_order', 5);

function misha_change_sorting_options_order($options)
{

    $options = array(

        'menu_order' => __('Default sorting', 'woocommerce'), // you can change the order of this element too
        'price'      => __('Sort by price: low to high', 'woocommerce'), // I need sorting by price to be the first
        'date'       => __('Sort by latest', 'woocommerce'), // Let's make "Sort by latest" the second one

        // and leave everything else without changes
        'popularity' => __('Sort by popularity', 'woocommerce'),
        'rating'     => 'Sort by average rating', // __() is not necessary
        'price-desc' => __('Sort by price: high to low', 'woocommerce'),

    );

    return $options;
}

add_filter('wp_nav_menu_objects', 'my_wp_nav_menu_objects', 10, 2);
function my_wp_nav_menu_objects($items, $args)
{
    foreach ($items as &$item) {
        $sub_menu = get_field('sub_menu', $item);
        if ($sub_menu) {
            if (wp_is_mobile()) {
                $item->title .= '</a><span class="show-mega-menu">' . $sub_menu . '</span>';
            } else {
                $item->title .= '<span class="show-mega-menu">' . $sub_menu . '</span></a>';
            }
        }
    }
    return $items;
}









/**
 * @snippet       WooCommerce Add New Tab @ My Account
 * @how-to        Get CustomizeWoo.com FREE
 * @author        Rodolfo Melogli
 * @compatible    WooCommerce 5.0
 * @donate $9     https://businessbloomer.com/bloomer-armada/
 */

// ------------------
// 1. Register new endpoint (URL) for My Account page
// Note: Re-save Permalinks or it will give 404 error

function bbloomer_add_wishlist_page_endpoint()
{
    add_rewrite_endpoint('my-wishlist', EP_ROOT | EP_PAGES);
    add_rewrite_endpoint('my-club', EP_ROOT | EP_PAGES);
    add_rewrite_endpoint('my-warranties', EP_ROOT | EP_PAGES);
    add_rewrite_endpoint('my-service', EP_ROOT | EP_PAGES);
}

add_action('init', 'bbloomer_add_wishlist_page_endpoint');

// ------------------
// 2. Add new query var

function bbloomer_wishlist_page_query_vars($vars)
{
    $vars[] = 'my-wishlist';
    $vars[] = 'my-club';
    $vars[] = 'my-warranties';
    $vars[] = 'my-service';
    return $vars;
}

add_filter('query_vars', 'bbloomer_wishlist_page_query_vars', 0);

// ------------------
// 3. Insert the new endpoint into the My Account menu

function bbloomer_add_wishlist_page_link_my_account($items)
{
    $items['my-wishlist'] = ' מועדפים ';
    $items['my-club'] = ' מועדון לקוחות ';
    $items['my-warranties'] = ' סטטוס אחריות ';
    $items['my-service'] = ' קריאות שירות שנפתחו ';
    return $items;
}

add_filter('woocommerce_account_menu_items', 'bbloomer_add_wishlist_page_link_my_account');

// ------------------
// 4. Add content to the new tab

function bbloomer_wishlist_page_content()
{
    include 'woocommerce/myaccount/my-wishlist.php';
}
add_action('woocommerce_account_my-wishlist_endpoint', 'bbloomer_wishlist_page_content');

function bbloomer_club_page_content()
{
    include 'woocommerce/myaccount/my-club.php';
}
add_action('woocommerce_account_my-club_endpoint', 'bbloomer_club_page_content');

function bbloomer_warranties_page_content()
{
    include 'woocommerce/myaccount/my-warranties.php';
}
add_action('woocommerce_account_my-warranties_endpoint', 'bbloomer_warranties_page_content');

function bbloomer_service_page_content()
{
    include 'woocommerce/myaccount/my-service.php';
}
add_action('woocommerce_account_my-service_endpoint', 'bbloomer_service_page_content');
// Note: add_action must follow 'woocommerce_account_{your-endpoint-slug}_endpoint' format




add_action('get_header', 'tsm_do_acf_form_head', 1);
function tsm_do_acf_form_head()
{
    // Bail if not logged in or not able to post
    if (!(is_user_logged_in() || current_user_can('publish_posts'))) {
        return;
    }
    acf_form_head();
}











add_action('wp_footer', function () { ?>
    <?php if (is_singular('product')) : ?>
        <script>
            jQuery(document).ready(function() {
                ajaxAddToCartMy();
            });

            function ajaxAddToCartMy() {
                jQuery('.single-product__add').each(function() {
                    var _box = jQuery(this);
                    _box.find('form.cart').submit(function() {
                        var _form = jQuery(this),
                            product_qty = _form.find('input[name=quantity]').val() || 1,
                            product_id = _form.find('input[name=product_id]').val(),
                            variation_id = _form.find('input[name=variation_id]').val() || 0;
                        var mark_f = false;
                        var data = {
                            action: 'my_woocommerce_ajax_add_to_cart',
                            product_id: product_id,
                            product_sku: '',
                            quantity: product_qty,
                            variation_id: variation_id
                        };
                        jQuery.ajax({
                            type: 'post',
                            url: wc_add_to_cart_params.ajax_url,
                            data: data,
                            beforeSend: function(response) {
                                _box.removeClass('added').addClass('loading');
                                if (mark_f) clearTimeout(mark_f);
                            },
                            complete: function(response) {
                                _box.addClass('added').removeClass('loading');
                                mark_f = setTimeout(function() {
                                    _box.removeClass('added');
                                }, 2000);
                            },
                            success: function(response) {
                                if (response.error & response.product_url) {
                                    window.location = response.product_url;
                                    return;
                                } else {
                                    jQuery(document.body).trigger('added_to_cart', [response.fragments, response.cart_hash]);

                                    jQuery('body').trigger('update_checkout');
                                    jQuery('.cart-btn__quantity').text(jQuery('.mini-cart__quantity').text());
                                    jQuery('body').toggleClass('left-modal-active');

                                    if (jQuery(window).width() > 1440) {
                                        if (jQuery('.mini-cart__item').length > 4) {

                                            jQuery('.cart_list').addClass('scrolled')
                                        }
                                    }


                                    if (jQuery(window).width() < 1440) {
                                        if (jQuery('.mini-cart__item').length > 2) {

                                            jQuery('.cart_list').addClass('scrolled')
                                        }
                                    }
                                }
                            },
                        });
                        return false;
                    });
                });
            }
        </script>
    <?php endif; ?>
    <script>
        jQuery(document).ready(function() {
            updateQtyInMinicart();
        });

        function updateQtyInMinicart() {
            var t_f = false;
            jQuery('#mini-cart').on('change', 'div.quantity input.qty', function() {
                if (t_f) clearTimeout(t_f);
                var t_hold = jQuery(this).parents('.mini-cart__item');
                t_hold.addClass('can_update_qty');
                t_f = setTimeout(function() {
                    var mark_f = false;
                    var data = {
                        cart_item_key: t_hold.data('cart_key'),
                        qty: t_hold.find('div.quantity input.qty').val(),
                        action: 'my_woocommerce_ajax_update_cart'
                    };
                    jQuery.ajax({
                        type: 'post',
                        url: wc_add_to_cart_params.ajax_url,
                        data: data,
                        beforeSend: function(response) {
                            t_hold.removeClass('qty_updated').removeClass('can_update_qty').addClass('loading');
                            if (mark_f) clearTimeout(mark_f);
                        },
                        complete: function(response) {
                            t_hold.addClass('qty_updated').removeClass('loading');
                            mark_f = setTimeout(function() {
                                t_hold.removeClass('qty_updated');
                            }, 2000);
                        },
                        success: function(response) {
                            if (response.error & response.product_url) {
                                window.location = response.product_url;
                                return;
                            } else {
                                jQuery('body').trigger('update_checkout');
                                jQuery(document.body).trigger('added_to_cart', [response.fragments, response.cart_hash]);
                            }
                            jQuery('.cart-btn__quantity').text(jQuery('.mini-cart__quantity').text());
                        },
                    });
                }, 500);
            });
        }
    </script>
    <?php
});

/**/
add_action('wp_ajax_my_woocommerce_ajax_add_to_cart', 'my_woocommerce_ajax_add_to_cart');
add_action('wp_ajax_nopriv_my_woocommerce_ajax_add_to_cart', 'my_woocommerce_ajax_add_to_cart');
function my_woocommerce_ajax_add_to_cart()
{
    $product_id = apply_filters('ql_woocommerce_add_to_cart_product_id', absint($_POST['product_id']));
    $quantity = empty($_POST['quantity']) ? 1 : wc_stock_amount($_POST['quantity']);
    $variation_id = absint($_POST['variation_id']);
    $passed_validation = apply_filters('ql_woocommerce_add_to_cart_validation', true, $product_id, $quantity);
    $product_status = get_post_status($product_id);

    if ($passed_validation && WC()->cart->add_to_cart($product_id, $quantity, $variation_id) && 'publish' === $product_status) {
        do_action('ql_woocommerce_ajax_added_to_cart', $product_id);
        if ('yes' === get_option('ql_woocommerce_cart_redirect_after_add')) {
            wc_add_to_cart_message(array($product_id => $quantity), true);
        }
        WC_AJAX::get_refreshed_fragments();
    } else {
        $data = array(
            'error' => true,
            'product_url' => apply_filters('ql_woocommerce_cart_redirect_after_error', get_permalink($product_id), $product_id)
        );
        echo wp_send_json($data);
    }
    wp_die();
}
/**/
add_action('wp_ajax_my_woocommerce_ajax_remove_from_cart', 'my_woocommerce_ajax_remove_from_cart');
add_action('wp_ajax_nopriv_my_woocommerce_ajax_remove_from_cart', 'my_woocommerce_ajax_remove_from_cart');
function my_woocommerce_ajax_remove_from_cart()
{
    $prod_id = apply_filters('ql_woocommerce_add_to_cart_product_id', absint($_POST['product_id']));
    $qty = empty($_POST['quantity']) ? 1 : wc_stock_amount($_POST['quantity']);
    $v_id = absint($_POST['variation_id']);
    if ($prod_id && $qty) {
        foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item) {
            $_product   = apply_filters('woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key);
            $product_id = apply_filters('woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key);

            if ($_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters('woocommerce_widget_cart_item_visible', true, $cart_item, $cart_item_key)) {
                if ($prod_id == $product_id && (!$v_id || $v_id == $cart_item['variation_id'])) {
                    $old_qty = $cart_item['quantity'];
                    $old_qty -= $qty;
                    if ($old_qty < 0) $old_qty = 0;
                    WC()->cart->set_quantity($cart_item_key, $old_qty, true);
                }
            }
        }
    }
    WC_AJAX::get_refreshed_fragments();
    wp_die();
}
/**/
add_action('wp_ajax_my_woocommerce_ajax_update_cart', 'my_woocommerce_ajax_update_cart');
add_action('wp_ajax_nopriv_my_woocommerce_ajax_update_cart', 'my_woocommerce_ajax_update_cart');
function my_woocommerce_ajax_update_cart()
{
    $cart_item_key = $_POST['cart_item_key'];
    $product_values = WC()->cart->get_cart_item($cart_item_key);
    $product_quantity = apply_filters('woocommerce_stock_amount_cart_item', apply_filters('woocommerce_stock_amount', preg_replace("/[^0-9\.]/", '', filter_var($_POST['qty'], FILTER_SANITIZE_NUMBER_INT))), $cart_item_key);
    $passed_validation  = apply_filters('woocommerce_update_cart_validation', true, $cart_item_key, $product_values, $product_quantity);

    if ($passed_validation) {
        WC()->cart->set_quantity($cart_item_key, $product_quantity, true);
    }
    WC_AJAX::get_refreshed_fragments();
    wp_die();
}









// My Account 


add_filter( 'woocommerce_account_menu_items', function($items) {
    unset($items['downloads']); // Remove downloads item
    $items['orders'] = 'ההזמנות שלי';

    return $items;
}, 99, 1 );




function wc_remove_bill_fields($fields)
{
    unset($fields['billing_company']);
    unset($fields['billing_state']);
    unset($fields['billing_postcode']);

    $fields['billing_phone']['placeholder'] = '* מספר טלפון';
    $fields['billing_email']['placeholder'] = '* תובת אימייל';

    return $fields;
}
add_filter('woocommerce_billing_fields', 'wc_remove_bill_fields');



function wc_remove_ship_fields($fields)
{
    unset($fields['shipping_company']);
    unset($fields['shipping_state']);
    unset($fields['shipping_postcode']);

    return $fields;
}

add_filter('woocommerce_shipping_fields', 'wc_remove_ship_fields');




/*
function override_acc_bill_city_fields($fields)
{

    $myArray = file('wp-content/themes/camptown/cities.txt');
    $option_cities = [];
    foreach ($myArray as $value) {
        $value =  trim(preg_replace('/\n/', '', $value));
        $option_cities[$value] = $value;
    }

    // $option_cities = array(
    //   //  '' => __( 'Select your city' ),
    //     'City 2' => 'City 2',
    //     'City 3' => 'City 3',
    //     'City 4' => 'City 4',
    //     'City 5' => 'City 5',

    // );

    $fields['billing_city']['type'] = 'select';
    $fields['billing_city']['options'] = $option_cities;
    return $fields;
}
add_filter('woocommerce_billing_fields', 'override_acc_bill_city_fields');





function override_acc__ship_city_fields($fields)
{

    $myArray = file('wp-content/themes/camptown/cities.txt');
    $option_cities = [];
    foreach ($myArray as $value) {
        $value =  trim(preg_replace('/\n/', '', $value));
        $option_cities[$value] = $value;
    }


    $fields['shipping_city']['type'] = 'select';
    $fields['shipping_city']['options'] = $option_cities;
    return $fields;
}
add_filter('woocommerce_shipping_fields', 'override_acc__ship_city_fields');



*/



// Checkout


function override_checkout_city_fields($fields)
{

    $myArray = file('wp-content/themes/camptown/cities.txt');
    $option_cities = [];
    foreach ($myArray as $value) {
        $value =  trim(preg_replace('/\n/', '', $value));
        $option_cities[$value] = $value;
    }

    $fields['billing']['billing_city']['type'] = 'select';
    $fields['billing']['billing_city']['options'] = $option_cities;
    $fields['shipping']['shipping_city']['type'] = 'select';
    $fields['shipping']['shipping_city']['options'] = $option_cities;
    return $fields;
}
add_filter('woocommerce_checkout_fields', 'override_checkout_city_fields');



/**
Remove all possible fields
 **/
function wc_remove_checkout_fields($fields)
{
    // Billing fields
    unset($fields['billing']['billing_company']);
    unset($fields['billing']['billing_state']);
    unset($fields['billing']['billing_postcode']);
    // Shipping fields
    unset($fields['shipping']['shipping_company']);
    unset($fields['shipping']['shipping_state']);
    unset($fields['shipping']['shipping_postcode']);


    $fields['billing']['billing_phone']['placeholder'] = '* מספר טלפון';
    $fields['billing']['billing_email']['placeholder'] = '* תובת אימייל';

    // Order fields
    unset($fields['order']['order_comments']);
    return $fields;
}
add_filter('woocommerce_checkout_fields', 'wc_remove_checkout_fields');




add_filter('woocommerce_default_address_fields', 'override_default_address_checkout_fields', 20, 1);
function override_default_address_checkout_fields($address_fields)
{
    $address_fields['first_name']['placeholder'] = '* שם';
    $address_fields['last_name']['placeholder'] = '* מלא';
    $address_fields['city']['placeholder'] = '* יישוב';
    $address_fields['address_1']['placeholder'] = '* רחוב';
    $address_fields['address_2']['placeholder'] = '* מספר בית';
    $address_fields['phone']['placeholder'] = '* מספר טלפון';
    $address_fields['email']['placeholder'] = '* כתובת אימייל';

    $address_fields['address_2']['required'] = true;
    $address_fields['phone']['required'] = true;
    $address_fields['email']['required'] = true;




    return $address_fields;
}









/**
 * @snippet       Add First & Last Name to My Account Register Form - WooCommerce
 * @how-to        Get CustomizeWoo.com FREE
 * @author        Rodolfo Melogli
 * @compatible    WC 3.9
 * @donate $9     https://businessbloomer.com/bloomer-armada/
 */
  
///////////////////////////////
// 1. ADD FIELDS
  
add_action( 'woocommerce_register_form_start', 'bbloomer_add_name_woo_account_registration' );
  
function bbloomer_add_name_woo_account_registration() {
    ?>
  
    <p class="form-row form-row-first">
        <input type="text" placeholder="* <?php _e( 'First name', 'woocommerce' ); ?>" class="input-text" name="billing_first_name" id="reg_billing_first_name" value="<?php if ( ! empty( $_POST['billing_first_name'] ) ) esc_attr_e( $_POST['billing_first_name'] ); ?>" />
    </p>
  
    <p class="form-row form-row-last">
        <input type="text" placeholder="* <?php _e( 'Last name', 'woocommerce' ); ?>" class="input-text" name="billing_last_name" id="reg_billing_last_name" value="<?php if ( ! empty( $_POST['billing_last_name'] ) ) esc_attr_e( $_POST['billing_last_name'] ); ?>" />
    </p>
  
    <div class="clear"></div>
  
    <?php
}
  
///////////////////////////////
// 2. VALIDATE FIELDS
  
add_filter( 'woocommerce_registration_errors', 'bbloomer_validate_name_fields', 10, 3 );
  
function bbloomer_validate_name_fields( $errors, $username, $email ) {
    if ( isset( $_POST['billing_first_name'] ) && empty( $_POST['billing_first_name'] ) ) {
        $errors->add( 'billing_first_name_error', __( '<strong>Error</strong>: First name is required!', 'woocommerce' ) );
    }
    if ( isset( $_POST['billing_last_name'] ) && empty( $_POST['billing_last_name'] ) ) {
        $errors->add( 'billing_last_name_error', __( '<strong>Error</strong>: Last name is required!.', 'woocommerce' ) );
    }
    return $errors;
}
  
///////////////////////////////
// 3. SAVE FIELDS
  
add_action( 'woocommerce_created_customer', 'bbloomer_save_name_fields' );
  
function bbloomer_save_name_fields( $customer_id ) {
    if ( isset( $_POST['billing_first_name'] ) ) {
        update_user_meta( $customer_id, 'billing_first_name', sanitize_text_field( $_POST['billing_first_name'] ) );
        update_user_meta( $customer_id, 'shipping_first_name', sanitize_text_field( $_POST['billing_first_name'] ) );
        update_user_meta( $customer_id, 'first_name', sanitize_text_field($_POST['billing_first_name']) );
    }
    if ( isset( $_POST['billing_last_name'] ) ) {
        update_user_meta( $customer_id, 'billing_last_name', sanitize_text_field( $_POST['billing_last_name'] ) );
        update_user_meta( $customer_id, 'shipping_last_name', sanitize_text_field( $_POST['billing_last_name'] ) );
        update_user_meta( $customer_id, 'last_name', sanitize_text_field($_POST['billing_last_name']) );
    }
  
}


// Change payment methods position

remove_action('woocommerce_checkout_order_review', 'woocommerce_checkout_payment', 20);
add_action('payment_block', 'woocommerce_checkout_payment', 20);






add_action("template_redirect", 'redirection_function');
function redirection_function(){
    global $woocommerce;
    if( is_cart() && WC()->cart->cart_contents_count == 0){
        wp_safe_redirect( get_permalink( woocommerce_get_page_id( 'shop' ) ) );
    }
}













// Sending email after Front-end post submission
add_action('acf/save_post', 'yourdomain_save_post', 15);

function yourdomain_save_post($post_id)
{
    // Return if not a post
    if (get_post_type($post_id) !== 'warranty') { // here 'post' will be your post type

        return;
    }

    // Return if editing in admin
    if (is_admin()) {
        return;
    }

    $attachments = array();

    // Vars

    if (have_rows('customer_info', $post_id)) :
        while (have_rows('customer_info', $post_id)) : the_row();
            $id = get_sub_field('id', $post_id);
            $first_name = get_sub_field('first_name', $post_id);
            $last_name = get_sub_field('last_name', $post_id);
            $email = get_sub_field('email', $post_id);
            $phone = get_sub_field('phone', $post_id);
        endwhile;
    endif;

    if (have_rows('purchase_info', $post_id)) :
        while (have_rows('purchase_info', $post_id)) : the_row();
            $product_sku = get_sub_field('product_sku', $post_id);
            $date_of_purchase = get_sub_field('date_of_purchase', $post_id);
            $place_of_purchase = get_sub_field('place_of_purchase', $post_id);
            $file = get_sub_field('receipt_file', $post_id)['url'];
            $pdf = get_sub_field('certificate_pdf', $post_id)['url'];

            $attachments[] = get_sub_field('receipt_file', $post_id)['url'];
            $attachments[] = get_sub_field('certificate_pdf', $post_id)['url'];

        endwhile;
    endif;

    $from    = 'info@camptown.s877.upress.link';
    $toEmail = $email;
    $subject = 'Warranty ' . $post_id;
    $message = "";
    $message .= "First Name: $first_name\r\n";
    $message .= "Last Name: $last_name\r\n";
    $message .= "Email: $email\r\n";
    $message .= "Phone: $phone\r\n";

    $message .= "Product sku: $product_sku\r\n";
    $message .= "Date of purchase: $date_of_purchase\r\n";
    $message .= "Place of purchase: $place_of_purchase\r\n";

    foreach ($attachments as $key => $attachment) {
        $attachments[$key] = str_replace('/wp-content', WP_CONTENT_DIR, wp_make_link_relative($attachment));
    }

    wp_mail($toEmail, $subject, $message, $from, $attachments);


    $data['ID'] = $post_id;
	$data['post_title'] = $post_id . ' רישום אחריות ' . ', ' . $first_name . ' ' . $last_name . ', ' . $phone;
	$data['post_name'] = sanitize_title( $post_id );

	wp_update_post( $data );
}










// Sending email after Front-end post submission
add_action('acf/save_post', 'yourdomain_call_save_post', 15);

function yourdomain_call_save_post($post_id)
{
    // Return if not a post
    if (get_post_type($post_id) !== 'call_service') { // here 'post' will be your post type

        return;
    }

    // Return if editing in admin
    if (is_admin()) {
        return;
    }

    $attachments = array();

    // Vars

    if (have_rows('customer_info', $post_id)) :
        while (have_rows('customer_info', $post_id)) : the_row();
            $id = get_sub_field('id', $post_id);
            $first_name = get_sub_field('first_name', $post_id);
            $last_name = get_sub_field('last_name', $post_id);
            $email = get_sub_field('email', $post_id);
            $phone = get_sub_field('phone', $post_id);
        endwhile;
    endif;

    if (have_rows('purchase_info', $post_id)) :
        while (have_rows('purchase_info', $post_id)) : the_row();
            $select_1 = get_sub_field('select_1', $post_id);
            $date_of_purchase = get_sub_field('date_of_purchase', $post_id);
            $place_of_purchase = get_sub_field('place_of_purchase', $post_id);
            $place_of_purchase = get_sub_field('place_of_purchase', $post_id);
            $product_name = get_sub_field('product_name', $post_id);
            $details = get_sub_field('details', $post_id);
            $receipt_file_1 = get_sub_field('receipt_file_1', $post_id)['url'];
            $receipt_file_2 = get_sub_field('receipt_file_2', $post_id)['url'];

            $attachments[] = get_sub_field('receipt_file_1', $post_id)['url'];
            $attachments[] = get_sub_field('receipt_file_2', $post_id)['url'];

        endwhile;
    endif;

    $from    = 'info@camptown.s877.upress.link';
    $toEmail = $email;
    $subject = 'Call Service ' . $post_id;
    $message = "";
    $message .= "First Name: $first_name\r\n";
    $message .= "Last Name: $last_name\r\n";
    $message .= "Email: $email\r\n";
    $message .= "Phone: $phone\r\n";

    $message .= "Select: $select_1\r\n";
    $message .= "Date of purchase: $date_of_purchase\r\n";
    $message .= "Place of purchase: $place_of_purchase\r\n";
    $message .= "Product name: $product_name\r\n";
    $message .= "Details: $details\r\n";

    foreach ($attachments as $key => $attachment) {
        $attachments[$key] = str_replace('/wp-content', WP_CONTENT_DIR, wp_make_link_relative($attachment));
    }

    wp_mail($toEmail, $subject, $message, $from, $attachments);

    
    $data['ID'] = $post_id;
	$data['post_title'] = $post_id . ' קריאת שירות ' . ', ' . $first_name . ' ' . $last_name . ', ' . $phone;
	$data['post_name'] = sanitize_title( $post_id );

    wp_update_post( $data );
}








add_action('woocommerce_checkout_update_order_meta', function ($order_id, $posted) {

    $str = $_POST['shipping_method_description-value'];
    $replaced_str = str_replace(['\\'], '', $_POST['shipping_method_description-id']);



    $order = new WC_Order($order_id);


    $order->update_meta_data('delivery_methods', $str);
    $order->update_meta_data('delivery_methods_info', $replaced_str);
    $order->save();
}, 10, 2);


add_action('woocommerce_admin_order_data_after_order_details', 'admin_order_display_delivery_order_id', 60, 1);
function admin_order_display_delivery_order_id($order)
{

    $delivery_order_id = get_post_meta($order->get_id(), 'delivery_methods', true);

    $delivery_id = !empty($delivery_order_id) ? $delivery_order_id : '<span style="color:red">' . __('Not yet.') . '</span>';
    echo '<br clear="all"><p><strong>' . __('Delivery Order Id') . ':</strong> ' . $delivery_id . '</p>';
}



function camptown_order_send($order_id) {

    $order = wc_get_order($order_id);

    $price_cost_total = 0;
    $price_market_total = 0;
    $orders = array();
    $order_items = array();
    $order_shipments = array();

    $delivery_methods_info = $order->get_meta('delivery_methods_info');
    $delivery_methods_info = (!empty($delivery_methods_info)) ? json_decode($delivery_methods_info, true) : array();

    $order_cancelled = ($order->get_status() == 'cancelled') ? 1 : 0;
    $order_cancelled_date = ($order->get_status() == 'cancelled') ? date('Y-m-d') . 'T' . date('H:i:s') . '.342Z' : null;

    foreach ($order->get_items() as $item_id => $item) {
        if (get_field('price_cost', $item->get_product_id())) {
            $price_cost_total += get_field('price_cost', $item->get_product_id());
        }
        if (get_field('price_market', $item->get_product_id())) {
            $price_market_total += get_field('price_market', $item->get_product_id());
        }
        $product = wc_get_product($item->get_product_id());
        if ($item->get_variation_id()) {
            $variation = wc_get_product($item->get_variation_id());
        }

        $shipping_id = '';
        $shipping_cost = '';
        $shipping_method = '';
        foreach ($delivery_methods_info as $key => $delivery_info) {
            if ($key == $item->get_product_id()) {
               $shipping_id = $delivery_info['id'];
               $shipping_cost = $delivery_info['cost'];
               $shipping_method = $delivery_info['del_name'];
            }
        }

        $order_items[] = array(
            'ItemID' => ($item->get_variation_id()) ? get_post_meta($variation->get_variation_id(), '_product_id', true) : get_field('product_id', $item->get_product_id()),
            'Makat' => ($item->get_variation_id()) ? $variation->get_sku() : $product->get_sku(),
            'Cost_Price' => number_format(get_field('price_cost', $item->get_product_id()), 2),
            'SellingPrice' => number_format($item->get_total(), 2),
            'Description' => get_field('description', $item->get_product_id()),
            'Model' => ($item->get_variation_id()) ? get_post_meta($variation->get_variation_id(), '_model', true) : get_field('model', $item->get_product_id()),
            'Quantity' => $item->get_quantity(),
            'Canceled' => $order_cancelled,
            'CanceledDate' => $order_cancelled_date,
            'ShipmentId' => $shipping_id,
        );

        $order_shipments[] = array(
            'ShipmentId' => $shipping_id,
            'ShipmentCode' => $shipping_id,
            'Package_Estimated_Quantity' => 1,
            'Estimated_Customer_Received_Date' => date('Y-m-d', strtotime('+1 week', strtotime($order->get_date_created()))) . 'T' . $order->get_date_created()->date('H:i:s') . '.342Z',
            'Shipping_Distributor_Receive_Date' => date('Y-m-d', strtotime('+1 week', strtotime($order->get_date_created()))) . 'T' . $order->get_date_created()->date('H:i:s') . '.342Z',
            'ShippingPrice' => $shipping_cost,
            'Method' => $shipping_id,
            'MethodName' => $shipping_method,
            'Status' => 1,
            'Label_Link_URL' => '',
            'Label_Link_PDF' => '',
            'First_name' => $order->get_billing_first_name(),
            'Last_name' => $order->get_billing_last_name(),
            'Email' => $order->get_billing_email(),
            'Phone' => $order->get_billing_phone(),
            'Phone2' => '',
            'Company_name' => '',
            'Street' => $order->get_billing_address_1(),
            'House_no' => $order->get_billing_address_2(),
            'Apartment_no' => $order->get_meta('billing_address_3'),
            'Floor_no' => '',
            'Entrance' => '',
            'City' => $order->get_billing_city(),
            'Zipcode' => '',
            'Pob' => '',
            'PickupLocationCode' => '',
            'PickupLocationTitle' => '',
            'PickupLocationAddress' => '',
            'Canceled' => $order_cancelled,
            'CanceledDate' => $order_cancelled_date,
        );
    }

    $orders[] = array(
        'CustomerID' => get_field('customer_id_number', 'option'),
        'OrderNumber' => $order_id,
        'Comments' => '',
        'CreatedDate' => $order->get_date_created()->date('Y-m-d') . 'T' . $order->get_date_created()->date('H:i:s') . '.342Z',
        'TotalDiscount_CostPrice' => number_format($price_cost_total, 2),
        'TotalDiscount_SellingPrice' => number_format($order->get_subtotal(), 2),
        'PaymentType' => $order->get_payment_method(),
        'PaymentNumber' => '',
        'PaymentName' => $order->get_payment_method_title(),
        'MoreComments' => '',
        'MoreInfo' => '',
        'OrderItems' => $order_items,
        'OrderShipments' => $order_shipments
    );

    $jsonData = array(
        'username' => 'Camptown268',
        'password' => 'Camptown862',
        'orders' => $orders
    );


    $url = 'https://ws.admonis.com/api/PushPlatformsOrders';
    $ch = curl_init($url);

    $jsonDataEncoded = json_encode($jsonData);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDataEncoded);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $result = curl_exec($ch);

    error_log(print_r($result, true), 3, __DIR__ . '/my-log.log');
    error_log(print_r($jsonDataEncoded, true), 3, __DIR__ . '/my-log.log');

    curl_close($ch);
}
add_action('woocommerce_thankyou', 'camptown_order_send');
add_action('woocommerce_order_status_cancelled', 'camptown_order_send', 10, 1);

add_action('wp_ajax_nopriv_delete_post', 'delete_post_callback');
add_action('wp_ajax_delete_post', 'delete_post_callback');
function delete_post_callback()
{

    check_ajax_referer('myajax-nonce', 'nonce_code');

    if (!wp_verify_nonce($_POST['nonce_code'], 'myajax-nonce')) die('Stop!');

    $post_id = $_POST['postId'];
    $user_id = $_POST['userId'];

    $the_post = get_post($post_id);
    if ($the_post->post_author == $user_id) {
        $res = 'yes';
        wp_delete_post($post_id);
    } else {
        $res = 'no';
    }

    $json_data['result'] = $res;
    wp_send_json($json_data);
    wp_die();
}

// Render fields at the bottom of variations - does not account for field group order or placement.
add_action('woocommerce_product_after_variable_attributes', function ($loop, $variation_data, $variation) {
    global $abcdefgh_i; // Custom global variable to monitor index
    $abcdefgh_i = $loop;
    // Add filter to update field name
    add_filter('acf/prepare_field', 'acf_prepare_field_update_field_name');

    // Loop through all field groups
    $acf_field_groups = acf_get_field_groups();
    foreach ($acf_field_groups as $acf_field_group) {
        foreach ($acf_field_group['location'] as $group_locations) {
            foreach ($group_locations as $rule) {
                // See if field Group has at least one post_type = Variations rule - does not validate other rules
                if ($rule['param'] == 'post_type' && $rule['operator'] == '==' && $rule['value'] == 'product_variation') {
                    // Render field Group
                    acf_render_fields($variation->ID, acf_get_fields($acf_field_group));
                    break 2;
                }
            }
        }
    }

    // Remove filter
    remove_filter('acf/prepare_field', 'acf_prepare_field_update_field_name');
}, 10, 3);

// Filter function to update field names
function  acf_prepare_field_update_field_name($field)
{
    global $abcdefgh_i;
    $field['name'] = preg_replace('/^acf\[/', "acf[$abcdefgh_i][", $field['name']);
    return $field;
}

// Save variation data
add_action('woocommerce_save_product_variation', function ($variation_id, $i = -1) {
    // Update all fields for the current variation
    if (!empty($_POST['acf']) && is_array($_POST['acf']) && array_key_exists($i, $_POST['acf']) && is_array(($fields = $_POST['acf'][$i]))) {
        foreach ($fields as $key => $val) {
            update_field($key, $val, $variation_id);
        }
    }
}, 10, 2);

function pmxi_edit_attrs($post_id, $xml_node, $is_update)
{
    $import_id = wp_all_import_get_import_id();
    $prod = wc_get_product($post_id);
    if ($import_id == '1' && $prod->is_type('variable')) {
        $record = json_decode(json_encode((array)$xml_node), 1);

        $product_attributes = get_post_meta($post_id, '_product_attributes', true);
        if ($product_attributes['temporary-name'] && $record['Options']['Option']['Title']) {
            $new_value = $record['Options']['Option']['Title'];
            $new_key = sanitize_title($new_value);


            $product_attributes[$new_key] = $product_attributes['temporary-name'];
            unset($product_attributes['temporary-name']);
            $product_attributes[$new_key]['name'] = $new_value;
        }
        update_post_meta($post_id, '_product_attributes', $product_attributes);

        global $wpdb;
        $result = $wpdb->query("update wp_postmeta set meta_key = 'attribute_" . $new_key . "' where meta_key = 'attribute_temporary-name'");

        if ($prod->get_children()) {
            foreach ($prod->get_children() as $key => $variation_id) {
                if ($record['Options']['Option']['OptionItem'][$key]['ID']) {
                    update_post_meta($variation_id, '_product_id', $record['Options']['Option']['OptionItem'][$key]['ID']);
                }
                if ($record['Options']['Option']['OptionItem'][$key]['Model']) {
                    update_post_meta($variation_id, '_model', $record['Options']['Option']['OptionItem'][$key]['Model']);
                }
            }
        }
    }
}
add_action('pmxi_saved_post', 'pmxi_edit_attrs', 10, 3);

add_filter('wp_all_import_minimum_number_of_variations', 'wpai_wp_all_import_minimum_number_of_variations', 10, 3);
function wpai_wp_all_import_minimum_number_of_variations($min_number_of_variations, $pid, $import_id)
{
    return 1;
}



add_action('wp_ajax_woo_get_ajax_data', 'woo_get_ajax_data');
add_action('wp_ajax_nopriv_woo_get_ajax_data', 'woo_get_ajax_data');
function woo_get_ajax_data()
{
    check_ajax_referer('camptown_total', 'nonce');
    WC()->session->set('camptown_total', $_POST['total']);
    die();
}

add_filter('woocommerce_package_rates', 'conditional_custom_shipping_cost', 90, 2);
function conditional_custom_shipping_cost($rates, $package)
{
    if (WC()->session->get('camptown_total')) {
        foreach ($rates as $rate_key => $rate_values) {
            if ('flat_rate' == $rate_values->method_id) {
                $rates[$rate_key]->cost = WC()->session->get('camptown_total');
                $taxes = array();
                foreach ($rates[$rate_key]->taxes as $key => $tax) {
                    $taxes[$key] = WC()->session->get('camptown_total');
                }
                $rates[$rate_key]->taxes = $taxes;
            }
        }
    }
    return $rates;
}

add_action('woocommerce_checkout_update_order_review', 'refresh_shipping_methods', 10, 1);
function refresh_shipping_methods($post_data)
{
    if (WC()->session->get('camptown_total')) {
        foreach (WC()->cart->get_shipping_packages() as $package_key => $package) {
            WC()->session->set('shipping_for_package_' . $package_key, false);
        }
        WC()->cart->calculate_shipping();
    }
    return;
}

add_action('wp_footer', function () {
    if (is_checkout() && !is_wc_endpoint_url()) { ?>
        <script>
            jQuery(document).ready(function($) {

                function calcTotal() {
                    var total = 0;
                    $(".my_shipping_method input[type=radio]:checked").each(function() {
                        total += Number($(this).attr("data-cost"));
                    });
                    //$("#my_shipping_method_value").text(total);
                    $.ajax({
                        type: 'POST',
                        url: wc_checkout_params.ajax_url,
                        data: {
                            'action': 'woo_get_ajax_data',
                            'total': total===0?0.000000000000001: total,
                            'nonce': '<?php echo wp_create_nonce('camptown_total'); ?>'
                        },
                        success: function(result) {
                            $('body').trigger('update_checkout');
                            $(document).ajaxComplete(function() {
                                $('.shippingCost').html('₪' + total.toFixed());
                            });
                        },
                        error: function(error) {
                            console.log(error);
                        }
                    });


                }

                calcTotal();

                $(".my_shipping_method input[type=radio]").click(function() {
                    calcTotal();
                });
            });
        </script>
<?php }
});

// Add third address field
add_filter('woocommerce_checkout_fields' , 'custom_address_field');
function custom_address_field( $fields ) {
    $fields['shipping']['shipping_address_3'] = array(
        'placeholder'   => _x('דירה', 'placeholder', 'woocommerce'),
        'label'     => __('', 'woocommerce'),
        'required'  => false,
        'class'     => array('form-row-wide'),
        'clear'     => true,
        'priority'  => 65
    );
    $fields['billing']['billing_address_3'] = array(
        'placeholder'   => _x('דירה', 'placeholder', 'woocommerce'),
        'label'     => __('', 'woocommerce'),
        'required'  => false,
        'class'     => array('form-row-wide'),
        'clear'     => true,
        'priority'  => 65
    );
    return $fields;
}
add_action('woocommerce_checkout_update_order_meta', 'custom_address_field_update_order_meta');
function custom_address_field_update_order_meta($order_id) {
    if (!empty($_POST['shipping_address_3'])) {
        update_post_meta($order_id, 'shipping_address_3', sanitize_text_field( $_POST['shipping_address_3']));
    }
    if (!empty($_POST['billing_address_3'])) {
        update_post_meta($order_id, 'billing_address_3', sanitize_text_field( $_POST['billing_address_3']));
    }
}
add_filter('woocommerce_default_address_fields', 'woo_new_default_address_fields');
function woo_new_default_address_fields($fields) {
    $fields['address_3'] = array(
        'label' => __('דירה', 'woocommerce'),
        'class' => array('form-row-wide'),
    );
    return $fields;
}
add_filter('woocommerce_order_formatted_billing_address', 'woo_custom_order_formatted_billing_address', 10, 2);
function woo_custom_order_formatted_billing_address($address, $WC_Order) {
    $address = array(
        'first_name'    => $WC_Order->billing_first_name,
        'last_name'     => $WC_Order->billing_last_name,
        'company'       => $WC_Order->billing_company,
        'address_1'     => $WC_Order->billing_address_1,
        'address_2'     => $WC_Order->billing_address_2,
        'address_3'     => $WC_Order->billing_address_3,
        'city'          => $WC_Order->billing_city,
        'state'         => $WC_Order->billing_state,
        'postcode'      => $WC_Order->billing_postcode,
        'country'       => $WC_Order->billing_country,
        'email'         => $WC_Order->billing_email,
        'phone'         => $WC_Order->billing_phone,
    );
    return $address;
}
add_filter('woocommerce_order_formatted_shipping_address', 'woo_custom_order_formatted_shipping_address', 10, 2);
function woo_custom_order_formatted_shipping_address($address, $WC_Order) {
    $address = array(
        'first_name'    => $WC_Order->shipping_first_name,
        'last_name'     => $WC_Order->shipping_last_name,
        'company'       => $WC_Order->shipping_company,
        'address_1'     => $WC_Order->shipping_address_1,
        'address_2'     => $WC_Order->shipping_address_2,
        'address_3'     => $WC_Order->shipping_address_3,
        'city'          => $WC_Order->shipping_city,
        'state'         => $WC_Order->shipping_state,
        'postcode'      => $WC_Order->shipping_postcode,
        'country'       => $WC_Order->shipping_country,
        'email'         => $WC_Order->shipping_email,
        'phone'         => $WC_Order->shipping_phone,
    );
    return $address;
}
add_filter('woocommerce_formatted_address_replacements', function($replacements, $args) {
    $replacements['{address_3}'] = $args['address_3'];
    return $replacements;
}, 10, 2);
add_filter('woocommerce_localisation_address_formats', 'woo_includes_address_formats', 10, 1);
function woo_includes_address_formats($address_formats) {
    $address_formats['default'] = "{name}\n{company}\n{address_1}\n{address_2}\n{address_3}\n{city}\n{state}";
    return $address_formats;
}