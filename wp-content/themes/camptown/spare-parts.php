<?php
/*
  Template name: Spare parts
*/

defined('ABSPATH') || exit;
$prod = $_GET['prod'];
$spare_parts = get_field('spare_parts_products', $prod);
$col = 3;

if(!isset($prod)) {
    wp_redirect( get_home_url() );
    exit;
}

if(!isset($spare_parts)) {
    wp_redirect( get_home_url() );
    exit;
}


get_header('shop');
?>
<style>
    body {
        background: #f6f6f6;
    }
    .banner {
        background-color: <?php the_field('theme_color', 'option'); ?>;
    }
</style>
<section class="section spare-parts">
    <div class="breadcrumb">
        <?php echo do_shortcode('[wpseo_breadcrumb]'); ?>
    </div>
    <div class="container">
        <div class="spare-parts__inner">
            <div class="row">
                <div class="offset-lg-3 col-lg-6">
                    <h1 class="spare_parts__banner-title section-title"> חלקי חילוף <span><?= get_the_title($prod); ?></span></h1>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="section">
    <div class="container">
        <div class="woocommerce-page">
            <div class="products">
                <?php
                if($spare_parts) {

                    $args = array(
                        'post_type'      => 'product',
                        'posts_per_page' => 10,
                        'post__in' => $spare_parts
                    );
                    $loop = new WP_Query( $args );

                     while ( $loop->have_posts() ) : $loop->the_post();
                        global $product;

                        echo '<div class=" col-md-' . $col . ' col-6 products__item">';
                        wc_get_template_part('content', 'product');
                        echo '</div>';
                     endwhile;
                     wp_reset_query();
                }
                ?>
            </div>
        </div>
    </div>
</section>
<?php
get_footer('shop');
?>