<?php

/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.4.0
 */

defined('ABSPATH') || exit;

get_header('shop');

/*Get Acf Description*/
if (is_shop()) {
	$cat_id = get_option('woocommerce_shop_page_id');
} else {
	$cat_id = get_queried_object();
}
?>

<style>
	.banner {
		background-color: <?php the_field('theme_color', 'option'); ?>;
	}
</style>


<?php if (get_field('spare_parts', $cat_id)) { ?>
    <section class="section spare-parts">
		<div class="breadcrumb">
			<?php echo do_shortcode('[wpseo_breadcrumb]'); ?>
		</div>
		<div class="container">
			<div class="spare-parts__inner">
				<div class="row">
					<div class="offset-lg-3 col-lg-6">
						<?php if (get_field('banner_title', $cat_id)) { ?>
							<h1 class="spare_parts__banner-title section-title"><?php the_field('banner_title', $cat_id); ?></h1>
						<?php } else { ?>
							<h1 class="spare_parts__banner-title section-title"><?php single_term_title(); ?></h1>
						<?php } ?>

						<?php if (get_field('spare_parts_title', $cat_id)) { ?>
							<h2 class="spare_parts__title"><?php the_field('spare_parts_title', $cat_id); ?></h2>
						<?php } ?>

						<?php if (get_field('spare_parts_subtitle', $cat_id)) { ?>
							<div class="seo__description section-text">


								<div class="spare_parts__subtitle section-text">
									<?php the_field('spare_parts_subtitle', $cat_id); ?>
								</div>


							</div>


						<?php } ?>

						<?php if (get_field('spare_parts_content', $cat_id)) { ?>
							<div class="spare_parts__content section-text">
								<?php the_field('spare_parts_content', $cat_id); ?>
							</div>

						<?php } ?>


					</div>
				</div>
			</div>


		</div>
	</section>

<?php } else { ?>
	<?php if (get_field('banner', $cat_id)) { ?>
		<section class="banner category-banner">
			<img src="<?= get_field('banner', $cat_id)['url'] ?>" alt="<?= get_field('banner', $cat_id)['alt'] ?>" class="banner__image">
		<?php } else { ?>
			<section class="banner image_placeholder <?php if (get_field('spare_parts', $cat_id)) { ?>parts<?php } ?>">
			<?php } ?>


			<div class="breadcrumb">
				<?php echo do_shortcode('[wpseo_breadcrumb]'); ?>
			</div>


			<?php if (get_field('banner', $cat_id)) { ?>
				<div class="container">
					<h1 class="banner__title">
						<?php if (get_field('banner_title', $cat_id)) { ?>
							<?php the_field('banner_title', $cat_id); ?>
						<?php } else { ?>
							<?php woocommerce_page_title(); ?>
						<?php } ?>
					</h1>

					<div class="banner__subtitle">
						<?php
						/**
						 * Hook: woocommerce_archive_description.
						 *
						 * @hooked woocommerce_taxonomy_archive_description - 10
						 * @hooked woocommerce_product_archive_description - 10
						 */
						do_action('woocommerce_archive_description');
						?>
					</div>
				</div>
			<?php } ?>


			</section>

		<?php } ?>



		<section class="section">
			<div class="container">

				<?php /*if (!get_field('spare_parts', $cat_id)) { ?>
					<div class="category-line">
						<div class="category-line__inner">
							<?php
							$args = array(
								'parent'       => $cat_id->term_id,
								'taxonomy'     => 'product_cat',
								'hide_empty' => 0,
							);
							$categories = get_categories($args);
							foreach ($categories as $category) {

								$thumbnail_id = get_term_meta($category->term_id, 'thumbnail_id', true);
								$image = wp_get_attachment_url($thumbnail_id);

							?>
								<div class="category-line__item">
									<a href="<?= get_category_link($category->term_id); ?>">
										<div class="category-line__image">

											<img src="<?= $image; ?>" alt="<?= $category->name; ?>">
										</div>
										<div class="category-line__title">
											<?= $category->name; ?>
										</div>
									</a>
								</div>
							<?php } ?>
						</div>
					</div>
				<?php }*/ ?>

				<div class="category-line">
					<div class="category-line__inner">
						<?php if (have_rows('category_items', $cat_id)) : ?>

							<?php while (have_rows('category_items', $cat_id)) : the_row(); ?>
							<?php
								$link = get_sub_field('link');
								$target = $link['target'] ? $link['target'] : '_self';
								?>
								<div class="category-line__item">
									<a href="<?php echo $link['url'] ?>" target="<?php echo esc_attr($target); ?>">
										<div class="category-line__image">
											<img src="<?php echo get_sub_field('icon'); ?>" alt="<?php echo $link['title']; ?>">
										</div>
										<div class="category-line__title">
											<?php echo $link['title']; ?>
										</div>
									</a>
								</div>

							<?php endwhile; ?>

						<?php endif; ?>
					</div>
				</div>







				<?php if (!get_field('banner', $cat_id)) { ?>
					<?php if (!get_field('spare_parts', $cat_id)) { ?>
						<h1 class="banner__title page-category-title">
							<?php if (get_field('banner_title', $cat_id)) { ?>
								<?php the_field('banner_title', $cat_id); ?>
							<?php } else { ?>
								<?php woocommerce_page_title(); ?>
							<?php } ?>
						</h1>
					<?php } ?>
					<div class="banner__subtitle">
						<?php
						/**
						 * Hook: woocommerce_archive_description.
						 *
						 * @hooked woocommerce_taxonomy_archive_description - 10
						 * @hooked woocommerce_product_archive_description - 10
						 */
						do_action('woocommerce_archive_description');
						?>
					</div>
				<?php } ?>

				<?php if (get_field('spare_parts', $cat_id)) {
					$col = 3;
				} else {
					$col = 4;
				}
				?>

				<?php
                if($cat_id->term_id) {
                    $spare_parts = get_field('spare_parts', 'product_cat_'.$cat_id->term_id);
                    if($spare_parts) {
                        $args = array(
                            'posts_per_page' => -1,
                            'post_type' => 'product',
                            'post_status' =>'publish',
                            'meta_query' => array(
                                'relation' => 'OR',
                                array(
                                    'key' => 'spare_parts_products',
                                    'value' => '',
                                    'compare' => '!='
                                )
                            )
                        );
                        $products_term = array();
                        $products = new WP_Query($args);
                        if($products->posts) {
                            foreach ($products->posts as $v) {
                                $sp = get_field('spare_parts_products', $v->ID);
                                if($sp) {
                                    foreach ($sp as $r) {
                                        $terms = get_the_terms( $r->ID, 'product_cat' );
                                        if($terms) {
                                            foreach ($terms as $t) {
                                                if($t->term_id == $cat_id->term_id) {
                                                    $products_term[] = $v->ID;
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                        $products_term = array_unique($products_term);
                        if($products_term) {
                            foreach ($products_term as $v) {
                                $image = wp_get_attachment_image_src( get_post_thumbnail_id( $v ), 'single-post-thumbnail' );
                                echo '<div class=" col-md-' . $col . ' col-6 products__item">
                                    <div class="product-card">
                                        <a href="/spare-parts/?prod='.$v.'" class="woocommerce-LoopProduct-link woocommerce-loop-product__link">
                                            <div class="product-card__image">
                                                <div class="product-card__image-inner">
                                                    <img width="300" height="300" src="'.$image[0].'" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt="" loading="lazy" />
                                                </div>
                                            </div>
                                            <div class="product-card__content">
                                                <div class="product-card__title">'.get_the_title($v).'</div>
                                            </div>
                                        </a>
                                    </div>
                                </div>';
                            }
                        }


                    } else {
                        if (woocommerce_product_loop()) {

                            if (!get_field('spare_parts', $cat_id)) {
                                /**
                                 * Hook: woocommerce_before_shop_loop.
                                 *
                                 * @hooked woocommerce_output_all_notices - 10
                                 * @hooked woocommerce_result_count - 20
                                 * @hooked woocommerce_catalog_ordering - 30
                                 */
                                echo '<div class="products-filter">';
                                do_action('woocommerce_before_shop_loop');

                                echo do_shortcode('[br_filter_single filter_id=371]');
                                echo '</div>';
                            }

                            woocommerce_product_loop_start();

                            if (wc_get_loop_prop('total')) {
                                while (have_posts()) {
                                    the_post();

                                    /**
                                     * Hook: woocommerce_shop_loop.
                                     */
                                    do_action('woocommerce_shop_loop');
                                    echo '<div class=" col-md-' . $col . ' col-6 products__item">';
                                    wc_get_template_part('content', 'product');
                                    echo '</div>';
                                }
                            }

                            woocommerce_product_loop_end();

                            /**
                             * Hook: woocommerce_after_shop_loop.
                             *
                             * @hooked woocommerce_pagination - 10
                             */
                            do_action('woocommerce_after_shop_loop');
                        } else {
                            /**
                             * Hook: woocommerce_no_products_found.
                             *
                             * @hooked wc_no_products_found - 10
                             */
                            do_action('woocommerce_no_products_found');
                        }
                    }
                }
				?>
			</div>
		</section>
		<?php if (get_field('seo', $cat_id)) { ?>
			<section class="section seo">
				<div class="container">
					<div class="seo__inner">
						<div class="row">
							<div class="offset-lg-3 col-lg-6">
								<?php if (get_field('seo_title', $cat_id)) { ?>
									<h2 class="seo__title section-title"><?php the_field('seo_title', $cat_id); ?></h2>
								<?php } ?>

								<?php if (get_field('seo_description', $cat_id)) { ?>
									<div class="seo__description section-text">


										<div class="seo__content">
											<?php the_field('seo_description', $cat_id); ?>
										</div>



									</div>
									<div class="seo__buttons">
										<span class="seo__show arrow-btn">קרא עוד</span>
										<span class="seo__hide arrow-btn">סגור</span>
									</div>

								<?php } ?>


							</div>
						</div>
					</div>

					<?php if (get_field('seo_image', $cat_id)) { ?>
						<div class="seo__image">
							<img src="<?= get_field('seo_image', $cat_id)['url'] ?>" alt="<?= get_field('seo_image', $cat_id)['alt'] ?>" >
						</div>
					<?php } ?>

				</div>
			</section>
		<?php } ?>

		<?php

		get_footer('shop');
