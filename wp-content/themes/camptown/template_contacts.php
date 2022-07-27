<?php
/*
  Template name: Template Contacts
*/
?>

<?php get_header(); ?>
<section class="contacts-page">
    <div class="contacts-banner banner">
        <?php if (has_post_thumbnail() && !post_password_required() && !is_attachment()) :
            the_post_thumbnail('full', array('class' => 'banner__image banner__image-desktop contacts-banner__image', 'alt' => get_the_title()));
        endif; ?>
        <img src="<?= get_field('mobile_banner')['url']  ?>" alt="<?= get_field('mobile_banner')['alt']  ?>" class="banner__image banner__image-mobile">
        <div class="breadcrumb">
            <?php echo do_shortcode('[wpseo_breadcrumb]'); ?>
        </div>

        <div class="container">

            <h1 class="banner__title">
                <?php the_title(); ?>
            </h1>
            <div class="banner__text contacts-banner__text">
                <?php the_field('bnner_text'); ?>
            </div>


        </div>


    </div>

    <?php if (have_rows('items')) : ?>

        <div class="contacts-list">
            <div class="container">
                <div class="row">
                    <div class="offset-lg-1 col-lg-10">
                        <div class="contacts-list__items">



                            <?php while (have_rows('items')) : the_row(); ?>
                                <div class="contacts-item">
                                    <div>
                                        <div class="contacts-item__icon default-icon">
                                            <img src="<?= get_sub_field('icon')['url'] ?>" alt="<?= get_sub_field('icon')['alt'] ?>">
                                        </div>
                                    </div>
                                    <div>
                                        <div class="contacts-item__title">
                                            <?php the_sub_field('title') ?>
                                        </div>
                                        <div class="contacts-item__content">
                                            <?php the_sub_field('content') ?>
                                        </div>
                                    </div>
                                </div>

                            <?php endwhile; ?>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    <?php endif; ?>



    <div class="contact-form">
        <div class="container">
            <div class="row">
                <div class="offset-lg-3 col-lg-6">
                    <?= do_shortcode(get_field('contact_form_shortcode')) ?>
                </div>
            </div>
        </div>
    </div>



    <?php
    $location = get_field('google_map');
    if ($location) : ?>
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="contact-map">
                        <div class="contact-waze">
                            <div class="contact-waze__text"><?php the_field('waze_text') ?></div>
                            <a href="<?php the_field('waze_link') ?>" class="contact-map-waze__button site-color-btn btn"><i class="icon-waze"></i><?php the_field('waze_title') ?></a>
                        </div>

                        <div class="acf-map map" data-zoom="">
                            <div class="marker" data-lat="<?php echo esc_attr($location['lat']); ?>" data-lng="<?php echo esc_attr($location['lng']); ?>">
                                <div class="marker__content">
                                    <div class="marker__image">
                                        <img src="/wp-content/themes/camptown/img/pin.png" alt="<?php bloginfo('name'); ?>">
                                    </div>


                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    <?php endif; ?>
</section>


<?php get_footer(); ?>