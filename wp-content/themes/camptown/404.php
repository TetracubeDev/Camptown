
<?php get_header(); ?>

<section class="error-thank-you banner-no-bg ">

    <div class="breadcrumb">
        <?php echo do_shortcode('[wpseo_breadcrumb]'); ?>
    </div>
    <img src="<?= get_field('error_404_bg', 'option')['url'] ?>" alt="<?= get_field('error_404_bg', 'option')['alt'] ?>" class="error-bg">

    <div class="error-thank-you__inner error-inner">
        <div class="error-thank-you__icon default-icon error-icon">
            <img src="<?= get_field('error_404_icon', 'option')['url'] ?>" alt="<?= get_field('error_404_icon', 'option')['alt'] ?>">
        </div>
        <h1 class="error-thank-you__title error-title"><?php the_field('error_404_title' , 'option') ?></h1>
        <div class="error-thank-you__text error-subtitle"><?php the_field('error_404_text' , 'option') ?></div>
        <a href="<?= get_field('error_404_link', 'option')['url'] ?>" class="error-thank-you__link btn site-color-btn"><?= get_field('error_404_link','option')['title'] ?></a>

    </div>


</section>

<?php get_footer(); ?>