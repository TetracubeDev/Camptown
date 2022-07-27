<?php
/*
  Template name: Template Clients Club
*/
?>

<?php get_header(); ?>
<section class="clients-club">
    <div class="banner-no-bg clients-club__banner-no-bg ">
        <div class="breadcrumb">
            <?php echo do_shortcode('[wpseo_breadcrumb]'); ?>
        </div>
    </div>
    <div class="container">


        <div class="row">
            <div class="col-lg-8">
                <h1 class="clients-club__title">
                    <?php the_field('clients_club_title') ?>
                </h1>
                <div class="clients-club__subtitle">

                    <?php the_field('clients_club_subtitle') ?>
                </div>
                <a href="<?= get_field('clients_club_link')['url'] ?>" class="clients-club__link btn site-color-btn"><?= get_field('clients_club_link')['title'] ?></a>
                <div class="clients-club__content default-content">
               <?php the_field('clients_club_text') ?>
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

                                <a href="https://wa.me/<?php the_sub_field('sidebar_call_whatsapp') ?>" target="_blank" class="call-sidebar__item">
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

</section>
<?php get_footer(); ?>