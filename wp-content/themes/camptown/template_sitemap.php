<?php
/*
  Template name: Template Sitemap
*/
?>
<?php get_header(); ?>

</header>
<section class="sitemap">
    <div class="container">
        <div class="row">
            <div class="offset-lg-1 col-lg-10">
                <div class="banner-no-bg sitemap-banner">
                    <div class="breadcrumb">
                        <?php echo do_shortcode('[wpseo_breadcrumb]'); ?>
                    </div>
                    <div class="info-section question-title">
                        <div class="container">
                            <h1 class="banner-no-bg__title">
                                <?php the_title() ?>
                            </h1>
                            <div class="banner-no-bg__subtitle">

                                <?php the_content() ?>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="offset-lg-1 col-lg-10">
                <div class="sitemap">
                    
                    <div class="sitemap__item">
                    
                            <h2 class="sitemap__title">
                            מוצרים  
                            </h2>
                            <ul>
                                <?php
                                $args = array(
                                    'post_type' => 'product',
                                    'orderby' => 'date',
                                    'posts_per_page' => -1,
                                );

                                $query = new WP_Query($args);

                                if ($query->have_posts()) {
                                    while ($query->have_posts()) {
                                        $query->the_post(); ?>
                                        <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
                                    <?php } ?>
                                <?php } ?>
                                <?php wp_reset_postdata(); ?>
                            </ul>
                      
                    </div>
                    <div class="sitemap__item">
                      
                            <h2 class="sitemap__title">
                            קטגוריות מוצרים
                            </h2>
                            <ul>
                                <?php
                                $args = array(
                                    'taxonomy'   => "product_cat",
                                    'number'     => $number,
                                    'orderby'    => $orderby,
                                    'order'      => $order,
                                    'hide_empty' => true,
                                    'include'    => $ids
                                );

                                $product_categories = get_terms($args);

                                if ($product_categories) {
                                    foreach ($product_categories as $product_category) { ?>
                                        <li><a href="<?php echo esc_url(get_term_link($product_category)); ?>"><?php echo esc_html($product_category->name); ?></a></li>
                                <?php }
                                } ?>
                                <?php wp_reset_postdata(); ?>
                            </ul>
                        
                    </div>
                    <div class="sitemap__item">
                       
                            <h2 class="sitemap__title ">
                            מאמרים, טיפים, מידע מקצועי
                            </h2>
                            <ul>
                                <?php
                                $args = array(
                                    'post_type' => 'post',
                                    'orderby' => 'date',
                                    'posts_per_page' => -1,
                                );

                                $query = new WP_Query($args);

                                if ($query->have_posts()) {
                                    while ($query->have_posts()) {
                                        $query->the_post(); ?>
                                        <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
                                    <?php } ?>
                                <?php } ?>
                                <?php wp_reset_postdata(); ?>
                            </ul>

                      
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
<?php get_footer(); ?>