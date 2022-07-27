<?php
/*
  Template name: Template Terms
*/
?>
<?php get_header(); ?>
<div class="container">
    <div class="breadcrumb">
        <?php echo do_shortcode('[wpseo_breadcrumb]'); ?>
    </div>
</div>




</header>
<section class="faq terms-of-use grey-bg ">

    <div class="container">
        <div class="row">
            <div class="offset-lg-1 col-lg-10">
                <div class="banner-no-bg terms-of-use-banner">
                    <div class="breadcrumb">
                        <?php echo do_shortcode('[wpseo_breadcrumb]'); ?>
                    </div>
                    <div class="info-section question-title">
                        <div class="container">
                            <h1 class="banner-no-bg__title">
                                <?php the_title() ?>
                            </h1>
                            <div class="banner-no-bg__subtitle">

                                <?php the_field('subtitle') ?>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>


    </div>
    <div class="container">
        <div class="row">
            <div class="offset-lg-1 col-lg-7">
                <div class="faq-content">

                    <div class=" anchor anchor--sm">
                        <div class="anchor__title">
                            <div class="anchor__icon">
                                <i class="icon-content"></i>
                            </div>
                            <?php the_field('items_title') ?>
                        </div>
                        <ul>
                            <?php if (have_rows('items')) :
                                while (have_rows('items')) : the_row(); ?>
                                    <li>
                                        <a href="#faq<?php echo get_row_index(); ?>">
                                            <?php the_sub_field('title'); ?>
                                        </a>
                                    </li>
                            <?php
                                endwhile;
                            endif; ?>
                        </ul>
                    </div>
                    <div>
                        <div class="term-block">
                            <ol>
                                <?php if (have_rows('items')) :
                                    while (have_rows('items')) :  the_row(); ?>
                                        <li class="anchor-content accordion" id="faq<?php echo get_row_index(); ?>">
                                            <h2 class="anchor-content__title">
                                                <?php the_sub_field('title'); ?>
                                            </h2>
                                            <?php the_sub_field('terms') ?>
                                        </li>
                                <?php endwhile;
                                endif; ?>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3 ">
                <div class=" anchor ">
                    <div class="anchor__title">
                        <div class="anchor__icon">
                            <i class="icon-content"></i>
                        </div>
                        <?php the_field('items_title') ?>
                    </div>
                    <ul>
                        <?php if (have_rows('items')) :
                            while (have_rows('items')) : the_row(); ?>
                                <li>
                                    <a href="#faq<?php echo get_row_index(); ?>">
                                        <?php the_sub_field('title'); ?>
                                    </a>
                                </li>
                        <?php
                            endwhile;
                        endif; ?>
                    </ul>
                </div>
            </div>

        </div>
    </div>
</section>


<?php get_footer(); ?>