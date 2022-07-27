<?php
/*
  Template name: Template About
*/
?>

<?php get_header(); ?>
<section class="about-page">
    <div class="about-banner banner-no-bg ">
        <div class="breadcrumb">
            <?php echo do_shortcode('[wpseo_breadcrumb]'); ?>
        </div>
        <div class="about-section">
          
            <div class="container">
                <div class="row">
                    <div class="offset-lg-3 col-lg-6">
                        <h1 class="section-title about-section__title">
                            <?php the_field('banner_title'); ?>
                        </h1>
                        <div class="section-text about-section__text">
                            <?php the_field('banner_text'); ?>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="about-banner__image">
            <?php if (has_post_thumbnail() && !post_password_required() && !is_attachment()) :
                the_post_thumbnail('full', array('class' => 'about__desktop-banner', 'alt' => get_the_title(), 'uk-parallax="scale: 1.1,1;' => ''));
            endif; ?>
        </div>
    </div>

    <div class="about-list">
        <div class="container">
            <div class="row">
                <?php $i = 3; ?>
                <?php while (have_rows('about_list')) :  the_row(); ?>
                    <div class="col-lg-4">
                        <div class="about-list__item" data-aos="fade-up" data-aos-delay="<?php echo $i . "00" ?>" data-aos-duration="500" data-aos-anchor-placement="top-bottom">
                            <div class="about-list__icon">
                                <img src="<?= get_sub_field('icon')['url']; ?>" alt="<?= get_sub_field('image_mobile')['icon']; ?>">

                            </div>
                            <p class="about-list__text section-text">
                                <?php the_sub_field('text') ?>
                            </p>
                        </div>
                    </div>
                <?php $i++;
                endwhile; ?>
            </div>
        </div>

    </div>
    <div class="about-gallery">
        <div class=" gallery gallery-slider">
            <?php
            $images = get_field('gallery');
            if ($images) : ?>

                <?php foreach ($images as $image) : ?>
                    <div class="slide">

                        <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
                    </div>
                <?php endforeach; ?>

            <?php endif; ?>
        </div>
    </div>

</section>
<?php get_footer(); ?>