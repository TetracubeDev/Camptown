<div class="post-card ">
	<div class="post-card__category slide__category">
		<ul>
			<?php
			$categories = get_the_category();
			foreach ($categories as $category) {
				$name = $category->name;
				$category_link = get_category_link($category->term_id); ?>

				<li><a href="<?= $category_link; ?>"><?= file_get_contents(get_field('icon', $category)); ?> <?= esc_attr($name); ?></a></li>
			<?php } ?>
		</ul>
	</div>
	<a href="<?= the_permalink() ?>">
		<div class="post-card__image">
			<img src="<?= the_post_thumbnail_url() ?>" alt="<?= the_title() ?>">
		</div>

		<div class="post-card__content">
			<div class="post-card__title"><?php the_title(); ?></div>
			<div class="post-card__link">
				<div class="arrow-btn">קרא עוד</div>
			</div>
		</div>





	</a>
</div>