<?= esc_html(the_field('icon')) ?>
<div class="post-card__category">
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