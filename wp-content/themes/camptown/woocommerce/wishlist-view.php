<?php
/**
 * Wishlist page template - Standard Layout
 *
 * @author YITH
 * @package YITH\Wishlist\Templates\Wishlist\View
 * @version 3.0.0
 */

/**
 * Template variables:
 *
 * @var $wishlist                      \YITH_WCWL_Wishlist Current wishlist
 * @var $wishlist_items                array Array of items to show for current page
 * @var $wishlist_token                string Current wishlist token
 * @var $wishlist_id                   int Current wishlist id
 * @var $users_wishlists               array Array of current user wishlists
 * @var $pagination                    string yes/no
 * @var $per_page                      int Items per page
 * @var $current_page                  int Current page
 * @var $page_links                    array Array of page links
 * @var $is_user_owner                 bool Whether current user is wishlist owner
 * @var $show_price                    bool Whether to show price column
 * @var $show_dateadded                bool Whether to show item date of addition
 * @var $show_stock_status             bool Whether to show product stock status
 * @var $show_add_to_cart              bool Whether to show Add to Cart button
 * @var $show_remove_product           bool Whether to show Remove button
 * @var $show_price_variations         bool Whether to show price variation over time
 * @var $show_variation                bool Whether to show variation attributes when possible
 * @var $show_cb                       bool Whether to show checkbox column
 * @var $show_quantity                 bool Whether to show input quantity or not
 * @var $show_ask_estimate_button      bool Whether to show Ask an Estimate form
 * @var $show_last_column              bool Whether to show last column (calculated basing on previous flags)
 * @var $move_to_another_wishlist      bool Whether to show Move to another wishlist select
 * @var $move_to_another_wishlist_type string Whether to show a select or a popup for wishlist change
 * @var $additional_info               bool Whether to show Additional info textarea in Ask an estimate form
 * @var $price_excl_tax                bool Whether to show price excluding taxes
 * @var $enable_drag_n_drop            bool Whether to enable drag n drop feature
 * @var $repeat_remove_button          bool Whether to repeat remove button in last column
 * @var $available_multi_wishlist      bool Whether multi wishlist is enabled and available
 * @var $no_interactions               bool
 */

if ( ! defined( 'YITH_WCWL' ) ) {
	exit;
} // Exit if accessed directly
?>


<!-- WISHLIST TABLE -->
<div
	class="shop_table cart wishlist_table wishlist_view traditional responsive <?php echo $no_interactions ? 'no-interactions' : ''; ?> <?php echo $enable_drag_n_drop ? 'sortable' : ''; ?> "
	data-pagination="<?php echo esc_attr( $pagination ); ?>" data-per-page="<?php echo esc_attr( $per_page ); ?>" data-page="<?php echo esc_attr( $current_page ); ?>"
	data-id="<?php echo esc_attr( $wishlist_id ); ?>" data-token="<?php echo esc_attr( $wishlist_token ); ?>">

	<?php $column_count = 2; ?>


	<div class="wishlist-items-wrapper row products columns-4">
	<?php
	if ( $wishlist && $wishlist->has_items() ) :
		foreach ( $wishlist_items as $item ) :
			/**
			 * Each of the wishlist items
			 *
			 * @var $item \YITH_WCWL_Wishlist_Item
			 */
			global $product;

			$product      = $item->get_product();
			$availability = $product->get_availability();
			$stock_status = isset( $availability['class'] ) ? $availability['class'] : false;

			if ( $product && $product->exists() ) :
				?>
				<?php $product_id = esc_attr( $item->get_product_id() ); ?>
				<div class="col-md-4 col-6 products__item" id="yith-wcwl-row-<?php echo esc_attr( $item->get_product_id() ); ?>" data-row-id="<?php echo esc_attr( $item->get_product_id() ); ?>">
					<div class="product-card">
						<?php if (get_field('badge' , $product_id)) { ?>
							<span class="onsale" style="background-color: <?php the_field('badge_color', $product_id); ?>"><?php the_field('badge', $product_id); ?></span>
						<?php } ?>

						<?php if ( $show_cb ) : ?>
							<td class="product-checkbox">
								<input type="checkbox" value="yes" name="items[<?php echo esc_attr( $item->get_product_id() ); ?>][cb]"/>
							</td>
						<?php endif ?>

						<?php if ( $show_remove_product ) : ?>
							

							<div class="wishlist__btn product-remove">
								<div class="tooltip">
									הסרת מוצר מהרשימה
								</div>
								<a href="<?php echo esc_url( $item->get_remove_url() ); ?>" class="remove remove_from_wishlist" title="<?php echo esc_html( apply_filters( 'yith_wcwl_remove_product_wishlist_message_title', __( 'Remove this product', 'yith-woocommerce-wishlist' ) ) ); ?>">
									<i class="icon-heart-full"></i>
								</a>
							</div>
						<?php endif; ?>



						<div class="product-card__image">
							<?php do_action( 'yith_wcwl_table_before_product_thumbnail', $item, $wishlist ); ?>
		
								<a class="product-card__image-inner" href="<?php echo esc_url( get_permalink( apply_filters( 'woocommerce_in_cart_product', $item->get_product_id() ) ) ); ?>">
									<?php echo wp_kses_post( $product->get_image() ); ?>
								</a>

							<?php do_action( 'yith_wcwl_table_after_product_thumbnail', $item, $wishlist ); ?>
						</div>

						<div class="product-card__content">
							<?php do_action( 'yith_wcwl_table_before_product_name', $item, $wishlist ); ?>
							<div class="product-card__title">
								<a href="<?php echo esc_url( get_permalink( apply_filters( 'woocommerce_in_cart_product', $item->get_product_id() ) ) ); ?>">
									<?php echo wp_kses_post( apply_filters( 'woocommerce_in_cartproduct_obj_title', $product->get_title(), $product ) ); ?>
								</a>
								<?php
									if ( $show_variation && $product->is_type( 'variation' ) ) {
										/**
										 * Product is a Variation
										 *
										 * @var $product \WC_Product_Variation
										 */
										echo wp_kses_post( wc_get_formatted_variation( $product ) );
									}
								?>
							</div>

							<?php do_action( 'yith_wcwl_table_after_product_name', $item, $wishlist ); ?>

						



							<?php if ( $show_price || $show_price_variations ) : ?>
								<div class="product-card__price">
									<?php do_action( 'yith_wcwl_table_before_product_price', $item, $wishlist ); ?>

									<?php
									if ( $show_price ) {
										echo wp_kses_post( $item->get_formatted_product_price() );
									}

									if ( $show_price_variations ) {
										echo wp_kses_post( $item->get_price_variation() );
									}
									?>

									<?php do_action( 'yith_wcwl_table_after_product_price', $item, $wishlist ); ?>
								</div>
							<?php endif ?>

						</div>

					

					</div>

					

				</div>
				<?php
			endif;
		endforeach;
	else :
		?>
		<div>
			<div class="account__subtitle"> אין מוצרים ברשימת המועדפים </div>
		</div>
		<?php
	endif;

	if ( ! empty( $page_links ) ) :
		?>
		<div class="pagination-row wishlist-pagination">
			<div>
				<?php echo wp_kses_post( $page_links ); ?>
			</div>
		</div>
	<?php endif ?>
	</div>

</div>
