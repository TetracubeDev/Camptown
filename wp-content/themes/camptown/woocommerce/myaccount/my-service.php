<h1 class="account__title"> ריאות שירות שנפתחו </h1>

<?php

$user_id = get_current_user_id();

$args = array(
	'post_type' => 'call_service',
	'author' => $user_id,
	'posts_per_page' => -1,
);

$query = new WP_Query($args);

if ($query->have_posts()) { ?>
	<table class="account__table account__table-desktop services-table">
		<thead>
			<tr>
				<th> מספר טופס </th>
				<th> תאריך </th>
				<th> סטטוס </th>
				<th> פעולה </th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			<?php while ($query->have_posts()) {
				$query->the_post(); ?>
				<tr>
					<td>
						<?php /*if (have_rows('customer_info')) : ?>
							<?php while (have_rows('customer_info')) : the_row(); ?>
								<?php the_sub_field('id'); ?>
							<?php endwhile; ?>
						<?php endif; */ ?>
						<?php echo get_the_id() ?>
					</td>
					<td><?php echo get_the_date('d.m.y') ?></td>
					<td> לורם יפסום </td>
					<td>
						<a class=" modal-btn" href="#step_<?php echo get_the_id() ?>_modal"> הצג פרטים </a>


					</td>
					<td>
						<a class="account__delete modal-btn" href="#delete-<?php echo get_the_id(); ?>"></a>

					</td>
				</tr>
			<?php } ?>
		</tbody>
	</table>
	<table class="account__table account__table-mobile services-table">
		<thead>
			<tr>
				<th> מספר טופס </th>

				<th> פעולה </th>
			</tr>
		</thead>
		<tbody>
			<?php while ($query->have_posts()) {
				$query->the_post(); ?>
				
				<tr>
					<td>
						<p><?php echo get_the_id() ?></p>
						<p><?php echo get_the_date('d.m.y') ?></p>
						<p> לורם יפסום</p>
					</td>
					<td>
						<a class="account__delete modal-btn" href="#delete-<?php echo get_the_id(); ?>"></a>
						<a class=" modal-btn" href="#step_<?php echo get_the_id() ?>_modal"> הצג פרטים </a>
					</td>
				</tr>
			<?php } ?>
		</tbody>
	</table>
<?php } else { ?>
	<table class="account__table empty-table">
		<thead>
			<tr>
				<th> מספר טופס </th>
				<th> תאריך </th>
				<th> סטטוס </th>
				<th> פעולה </th>

			</tr>
		</thead>
		<tbody>
			<tr>
				<td class="account__subtitle" colspan="5"> אין מוצרים רשומים לאחריות </td>
			</tr>
		</tbody>
	</table>
<?php } ?>
<?php wp_reset_postdata(); ?>
<div class="text-center-mobile">
	<a href="/call-service-form/" class="account__button"> טופס פתיחת קריאת שרות </a>
</div>





<?php
if ($query->have_posts()) { ?>

	<?php while ($query->have_posts()) {
		$query->the_post(); ?>

		<div class="modal interactive-form-modal" id="step_<?php echo get_the_id() ?>_modal">


			<div class="modal__inner ">
				<div class="modal__close  modal-close-btn">
					<i class="icon-close-thin"></i>
				</div>
				<div class="modal__title interactive-form-modal__title bordered-title ">
					<?php if (have_rows('customer_info')) : ?>
						<?php while (have_rows('customer_info')) : the_row(); ?>
							<span>
								קריאת שירות
								<?php echo get_the_id() ?>
							</span>
						<?php endwhile; ?>
					<?php endif; ?>
				</div>
				<div class="interactive-form-modal__inner">

					<div class="interactive-form-modal__content">
						<div class="interactive-form-modal__content-title">
							פרטי לקוח
						</div>

						<div class="interactive-form-modal__content-atributes">
							<?php if (have_rows('customer_info')) : ?>
								<?php while (have_rows('customer_info')) : the_row(); ?>
									<p class="modal__inner-name"><?php the_sub_field('first_name'); ?> <?php the_sub_field('last_name'); ?></p>
									<p class="modal__inner-email"><?php the_sub_field('email'); ?></p>
									<p class="modal__inner-phone"><?php the_sub_field('phone'); ?></p>
								<?php endwhile; ?>
							<?php endif; ?>
						</div>

						<?php if (have_rows('purchase_info')) : ?>
							<?php while (have_rows('purchase_info')) : the_row(); ?>

								<div class="interactive-form-modal__content-title">
									פרטי מוצר
								</div>

								<div class="interactive-form-modal__content-text">
									<p>
										<strong>מהות פניה:</strong> <?php the_sub_field('select_1'); ?>
									</p>

									<p>
										<strong>תאריך מילוי טופס:</strong> <?php the_sub_field('date_of_purchase'); ?>
									</p>

									<p>
										<strong>מקום רכישה:</strong> <?php the_sub_field('place_of_purchase'); ?>
									</p>

									<p>
										<strong>שם המוצר:</strong> <?php the_sub_field('product_name'); ?>
									</p>

									<p>
										<strong>פירוט התקלה/בקשה:</strong> <?php the_sub_field('details'); ?>
									</p>

									<?php
									$file = get_sub_field('receipt_file_1');
									if ($file) : ?>
										<p><strong>חשבונית רכישה:</strong> <a href="<?php echo $file['url']; ?>" download><?php echo $file['filename']; ?></a> </p>
									<?php endif; ?>


									<?php
									$file = get_sub_field('receipt_file_2');
									if ($file) : ?>
										<p><strong>תמונות של מוצר:</strong> <a href="<?php echo $file['url']; ?>" download><?php echo $file['filename']; ?></a> </p>
									<?php endif; ?>





								</div>
							<?php endwhile; ?>
						<?php endif; ?>
					</div>
					<div class="interactive-form-modal__image">
						<?php if (have_rows('purchase_info')) : ?>
							<?php while (have_rows('purchase_info')) : the_row();
								$file = get_sub_field('receipt_file_1');
								if( $file ): ?>
									<img src="<?php echo $file['url']; ?>" alt="<?php echo $file['filename']; ?>">
								<?php endif; ?>
							<?php endwhile; ?>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>


		<div class="modal logout-modal service-delete" id="delete-<?php echo get_the_id(); ?>">
			<div class="modal__inner ">
				<div class="modal__close  modal-close-btn">
					<i class="icon-close-thin"></i>
				</div>
				<div class="modal__title">
					<?php if (have_rows('customer_info')) : ?>
						<?php while (have_rows('customer_info')) : the_row(); ?>
							האם ברצונך למחוק קריאת שירות <?php echo get_the_id() ?>#?
						<?php endwhile; ?>
					<?php endif; ?>
				</div>
				<div class="modal__buttons logout-buttons">

					<a href="#" class="delete-post" data-id="<?php echo get_the_id(); ?>" data-user="<?php echo get_current_user_id(); ?>" href="">כן</a>

					<div class="dont-logout  modal-close-btn">
						בטל
					</div>

				</div>
			</div>
		</div>

	<?php } ?>
<?php } ?>












<script>
	jQuery(document).ready(function($) {
		$('.delete-post').click(function(e) {
			e.preventDefault();
			var postId = jQuery(this).attr("data-id");
			var userId = jQuery(this).attr("data-user");

			$.ajax({
				type: "post",
				url: "<?php echo admin_url('admin-ajax.php'); ?>",
				data: {
					action: "delete_post",
					postId: postId,
					userId: userId,
					nonce_code: "<?php echo wp_create_nonce('myajax-nonce'); ?>"
				},
				success: function(response) {
					console.log(response.result);
					location.reload();
				}
			});
		})
	});
</script>