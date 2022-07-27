<?php get_header();
$post_id = get_option('page_for_posts'); ?>


<section class="banner">
    <img src="<?php echo get_field('banner_image', 335)['url'] ?>" alt="<?php echo get_field('banner_image', 335)['alt'] ?>" class="banner__image">
    <div class="breadcrumb">
        <?php echo do_shortcode('[wpseo_breadcrumb]'); ?>
    </div>

    <div class="container">
        <h1 class="banner__title">
            <?php single_cat_title(); ?>
        </h1>
    </div>
</section>



<?php $categories = get_categories(); ?>

<section class="posts">
    <div class="container">

        <ul class="posts-filters sort-list">
            
        </ul>



        <div class="news-block">
            <div class="row">
                <?php
                    if( have_posts() ) :

                        $i = 3;
                        /* Start the Loop */
                        while ( have_posts() ) :
                            the_post(); ?>
                            <div class="col-lg-3 col-md-6 col-sm-6 col-12 sort-item <?= esc_html(get_the_category()[0]->slug) ?>">
                                <div class="post-card " data-aos="fade-up" data-aos-delay="<?php echo $i . "00" ?>" data-aos-duration="500" data-aos-anchor-placement="top-bottom" data-aos-once="true">
                                    <?php get_template_part( 'template_parts/post', get_post_format() ); ?>
                                </div>
                            </div>
                        <?php $i++; endwhile;

                    endif; 
                ?>
                <?php
                global $wp_query;

                if (  $wp_query->max_num_pages > 1 ) { ?>
                    <div class="col-12 more-articles text-center">
                        <div class="arrow-btn">הצג עוד מאמרים</div>
                    </div>
                    
                <?php }?>
                
            </div>
        </div>

        

        
    </div>
</section>

<?php get_footer(); ?>