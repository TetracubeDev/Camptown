<?php get_header(); ?>






<section >
    <div class=" banner-no-bg ">
        <div class="breadcrumb">
            <?php echo do_shortcode('[wpseo_breadcrumb]'); ?>
        </div>
        <div class="text-center">
            <div class="container">
                <div class="row">
                    <div class="offset-lg-3 col-lg-6">
                        <?php if (!have_posts()) { ?>
                            <h1 class="section-title">
                                 לא נמצאו תוצאות לחיפוש. 
                            </h1>
                            <div class="section-text ">
                                <a href="<?= get_home_url(); ?>" class="btn site-color-btn"> חזרה לעמוד הבית  </a>
                            </div>
                        <?php } else { ?>
                            <h1 class="section-title"><?php _e( 'Search', 'woocommerce' ); ?></h1>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



<section class="section woocommerce-page">
    <div class="container">
		<?
		$products = array();
		$articles = array();
		if (have_posts()) {
			while (have_posts()) {
				the_post();
				switch (get_post_type()) {
					case 'product':
						$products[] = get_the_ID();
					break;
					case 'post':
						$articles[] = get_the_ID();
					break;
				}
       		}
       	}
   		if (count($products) > 0) { ?>
   			<div class="row">
   				<div class="col-12">
       				<h2 class="section-title"> תוצאות חיפוש עבור : <?php echo get_search_query(); ?></h2>
       			</div>
   			</div>
			<div class="row products columns-4">

		        <? $args = array(
		            'posts_per_page' => -1,
		            'post_type' => 'product',
		            'post_status' =>'publish',
		            'post__in' => $products,
		        );
		        $products = new WP_Query($args);
		        if ($products->have_posts()) {
					while ($products->have_posts()) { $products->the_post(); ?>
                        <div class="col-md-4 col-6 products__item">
                            <?php wc_get_template_part('content', 'product'); ?>
                        </div>
                	<? }
                    wp_reset_postdata(); ?>
                <? } ?>
            </div>
   		<? }
		if (count($articles) > 0) { ?>
			<div class="row">
				<div class="col-12">
       				<h2 class="section-title"> תוצאות חיפוש עבור : <?php echo get_search_query(); ?></h2>
   				</div>
			</div>
            <div class="news-block">
                <div class="row">
			        <? $args = array(
			            'posts_per_page' => -1,
			            'post_type' => 'post',
			            'post_status' =>'publish',
			            'post__in' => $articles,
			        );
			        $articles = new WP_Query($args);
			        if ($articles->have_posts()) {
						while ($articles->have_posts()) { $articles->the_post(); ?>
                               <div class="col-lg-3 col-md-6 col-sm-6 col-12 sort-item <?= esc_html(get_the_category()[0]->slug) ?>">


                                    <div class="post-card  ">
                            

                                    <?= esc_html(the_field('icon')) ?>
                                        <div class="post-card__category">
                                     

                                            <?php the_category('');  ?>

                                        </div>
                                        <a href="<?php the_permalink() ?>">
                                            <div class="post-card__image">


                                                <?php if (has_post_thumbnail() && !post_password_required() && !is_attachment()) : ?>
                                                    <?php the_post_thumbnail('camptown-thumb', array('alt' => get_the_title())); ?>
                                                <?php else : ?>
                                                    <img src="<?php echo get_template_directory_uri(); ?>/images/no-image.svg" alt="<?php the_title(); ?>">
                                                <?php endif; ?>
                                            </div>

                                            <div class="post-card__content">
                                                <div class="post-card__title"><?php the_title(); ?></div>
                                                <div class="post-card__link">
                                                    <div class="arrow-btn">קרא עוד</div>
                                                </div>
                                            </div>


                                        </a>
                                    </div>
                                </div>
                    	<? } wp_reset_postdata(); ?>
                    <? } ?>
                </div>
            </div>
   		<? } ?>
    </div>
</section>


<?php get_footer(); ?>
