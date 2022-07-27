<?php get_header();   ?>
<?php if (is_checkout() && empty(is_wc_endpoint_url('order-received')) || is_cart()) { ?>

    <section class="section grey-bg">



        <div class="container">

            <?php if (is_checkout() || is_cart()) { ?>
                <?php
                woocommerce_breadcrumb();
                ?>
            <?php } ?>
            <div class="row">
                <div class="col-12">

                    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                            <?php the_content(); ?>
                    <?php endwhile;
                    endif; ?>
                    <br>

                </div>
            </div>
        </div>
    </section>

<?php } else if (is_checkout() && !empty(is_wc_endpoint_url('order-received'))) { ?>

    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <?php the_content(); ?>
    <?php endwhile;
    endif; ?>
<?php } else if (is_account_page()) { ?>
    <section class="section ">



        <div class="container">

            <div class="woocommerce-breadcrumb">
                <?= do_shortcode('[wpseo_breadcrumb]'); ?>
            </div>

            <div class="row">
                <div class="offset-lg-1 col-lg-10 col-12">

                    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                            <?php the_content(); ?>
                    <?php endwhile;
                    endif; ?>
                    <br>

                </div>
            </div>
        </div>
    </section>


<?php } else { ?>

    <div class="container">
        <div class="breadcrumb ">
            <?= do_shortcode('[wpseo_breadcrumb]'); ?>
        </div>
    </div>
    <section class="section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="default-content">
                        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                                <?php the_content(); ?>
                        <?php endwhile;
                        endif; ?>
                        <br>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php } ?>
<?php get_footer(); ?>