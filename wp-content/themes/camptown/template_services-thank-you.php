<?php
/*
  Template name: Template Call Services Thank You
*/
?>

<?php get_header(); ?>

<section class="error-thank-you banner-no-bg call-services-thank-you services-thank-you">

    <div class="breadcrumb">
        <?php echo do_shortcode('[wpseo_breadcrumb]'); ?>
    </div>
    <?php if (has_post_thumbnail() && !post_password_required() && !is_attachment()) :
        the_post_thumbnail('full', array('class' => 'error-thank-you__desktop-banner', 'alt' => get_the_title()));
    endif; ?>

    <img src="<?= get_field('mobile_banner')['url'] ?>" alt="<?= get_field('mobile_banner')['alt'] ?>" class="error-thank-you__mobile-banner">

    <div class="error-thank-you__inner">
        <div class="error-thank-you__icon default-icon">
            <img src="<?= get_field('icon')['url'] ?>" alt="<?= get_field('icon')['alt'] ?>">
        </div>
        <h1 class="error-thank-you__title"><?php the_title() ?></h1>
        <div class="error-thank-you__text"><?php the_field('text') ?></div>
        <a href="<?= get_field('link')['url'] ?>" class="error-thank-you__link btn site-color-btn"><?= get_field('link')['title'] ?></a>
    </div>


</section>




<?php get_footer(); ?>