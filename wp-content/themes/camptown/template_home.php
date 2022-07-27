<?php
/*
  Template name: Template Home
*/
?>
<?php get_header(); ?>



<?php if (have_rows('main_slider')) : ?>

  <section class="main-slider ">
    <?php while (have_rows('main_slider')) : the_row(); ?>
      <div class="slide">

        <img src="<?= get_sub_field('image_mobile')['url']; ?>" alt="<?= get_sub_field('image_mobile')['alt']; ?>" class="main-slider__img-mobile">
        <img src="<?= get_sub_field('image')['url']; ?>" alt="<?= get_sub_field('image')['alt']; ?>"" class=" main-slider__img-desktop">
        <div class="main-slider__description">
          <div class="container">
            <h1 class="main-slider__title animate-title" data-aos="fade-up" data-aos-delay="600" data-aos-duration="500" data-aos-anchor-placement="top-bottom"><?php the_sub_field('title'); ?></h1>
            <p class="main-slider__sub-title"><?php the_sub_field('sub-title'); ?></p>
            <?php
            $image_link =  get_sub_field('link');
            if ($image_link) {
            ?>
              <a href="<?= $image_link['url']; ?>" class="main-slider__link"><?= $image_link['title']; ?></a>
            <?php } ?>
          </div>
        </div>
      </div>
    <?php endwhile; ?>
  </section>
<?php endif; ?>



<?php if (get_field('category_section_show')) { ?>
  <?php /*
  $terms = get_field('category_section');
  if ($terms) : ?>

    <div class="home-category">
      <div class="container">
        <div class="category-line">

          <?php foreach ($terms as $term) :
            $thumbnail_id = get_term_meta($term->term_id, 'thumbnail_id', true);
            $image = wp_get_attachment_url($thumbnail_id);
          ?>


            <div class="category-line__item">
              <a href="<?php echo esc_url(get_term_link($term)); ?>">
                <div class="category-line__image">

                  <img src="<?= $image; ?>" alt="<?php echo esc_html($term->name); ?>">
                </div>
                <div class="category-line__title">
                  <?php echo esc_html($term->name); ?>
                </div>
              </a>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  <?php endif;*/ ?>


<?php if (have_rows('category_items')) : ?>
  <div class="home-category">
    <div class="container">
      <div class="category-line">
        <?php while (have_rows('category_items')) : the_row(); ?>

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
      </div>
    </div>
  </div>
<?php endif; ?>


<?php } ?>

<?php if (get_field('image_section_1_show')) { ?>

  <section class="image-section image-section-1">
    <div class="container">
      <div class="row">

        <div class="col-lg-7">
          <div class="image-section-1__img-wrapper">

            <img src="<?= get_field('image_section_1_image')['url']; ?>" alt="<?= get_field('image_section_1_image')['alt']; ?>" uk-parallax="scale: 1.1,1;">

          </div>
        </div>

        <div class="col-lg-5">
          <div class="image-section__content">
            <h2 class="section-title" data-aos="fade-up" data-aos-delay="450" data-aos-duration="500" data-aos-anchor-placement="top-bottom">
              <?php the_field('image_section_1_title'); ?>
            </h2>

            <div class="image-section__text">
              <?php the_field('image_section_1_text'); ?>
            </div>



            <?php if (have_rows('image_section_1_links')) : ?>

              <div class="image-section__links">
                <?php while (have_rows('image_section_1_links')) : the_row(); ?>




                  <a href="<?= get_sub_field('link')['url']; ?>"><?= get_sub_field('link')['title']; ?></a>



                <?php endwhile; ?>
              </div>
            <?php endif; ?>
          </div>

        </div>

      </div>

    </div>
  </section>
<?php } ?>



<?php if (get_field('products_section_show')) { ?>

  <section class="home-slider products-slider">
    <div class="container">
      <div class="horizontal-slider">
        <?php $featured_items = get_field('products_section');
        if ($featured_items) :  $i = 3; ?>

          <?php foreach ($featured_items as $post) :

            setup_postdata($post); ?>
            <div class="slide" style="z-index: <?php echo "-" . $i ?>" data-aos="fade-up" data-aos-delay="<?php echo $i . "00" ?>" data-aos-duration="500" data-aos-anchor-placement="top-bottom">
              <?php wc_get_template_part('content', 'product'); ?>
            </div>

          <?php $i++;
          endforeach; ?>

        <?php endif; ?>
        <?php wp_reset_postdata(); ?>
      </div>
    </div>
  </section>

<?php } ?>


<?php if (get_field('about_section_show')) { ?>
  <section class="home-about about-section">
    <div class="container">
      <div class="row">
        <div class="offset-lg-3 col-lg-6">
          <h2 class="section-title">
            <?php the_field('about_title'); ?>
          </h2>
          <div class="section-text">
            <?php the_field('about_text'); ?>
          </div>
          <?php
          $link = get_field('about_link');
          $target = $link['target'] ? $link['target'] : '_self';
          ?>
          <a href="<?php echo $link['url'] ?>" class="arrow-btn" target="<?php echo esc_attr($target); ?>"><?php echo $link['title']; ?></a>
        </div>
      </div>
    </div>

  </section>
<?php } ?>

<?php if (get_field('image_section_2_show')) { ?>
  <section class="image-section image-section-2">
    <div class="container">
      <div class="row">


        <div class="col-lg-5">
          <div class="image-section__content image-section__content--2">
            <h2 class="section-title">
              <?php the_field('image_section_2_title'); ?>
            </h2>

            <div class="image-section__text">
              <?php the_field('image_section_2_text'); ?>
            </div>
            <?php if (have_rows('image_section_2_links')) : ?>
              <div class="image-section__links">
                <?php while (have_rows('image_section_2_links')) : the_row(); ?>
                  <a href="<?= get_sub_field('link')['url']; ?>"><?= get_sub_field('link')['title']; ?></a>
                <?php endwhile; ?>
              </div>
            <?php endif; ?>
          </div>
        </div>
        <div class="col-lg-7">
          <div class="image-content">
            <div class="image-map" style="position: relative;">
              <img src="<?= get_field('image_section_2_image')['url']; ?>" alt="<?= get_field('image_section_2_image')['alt']; ?>" class="image-section__img-desktop" uk-parallax="scale: 1.1,1;">
              <?php if (have_rows('image_map')) : ?>
                <?php while (have_rows('image_map')) : the_row();
                  $coords = explode(',', get_sub_field('coordinate')); ?>

                  <div class="image-content__target" style="left:<?= $coords[0]; ?>;top:<?= $coords[1] ?>;">
                    <i class="icon-plus"></i>

                     <?php $featured_items = get_sub_field('product');
                      if ($featured_items) : $post = $featured_items;
                      setup_postdata( $post ); ?>

                       
                          <div class="image_map__hidden">
                            <?php wc_get_template_part('content', 'product'); ?>
                          </div>


                      <?php endif; ?>
                      <?php wp_reset_postdata(); ?>
                  </div>
                <?php endwhile; ?>
              <?php endif; ?>
            </div>
          </div>
        </div>
      </div>
  </section>
<?php } ?>

<?php if (get_field('posts_show')) { ?>
  <section class="home-slider blog-slider ">
    <div class="container">
      <div class="section-title text-center ">
        <?php the_field('posts_title') ?>
      </div>
      <?php
      $paged = (get_query_var('paged')) ? absint(get_query_var('paged')) : 1;
      $args = array(
        'post_type' => 'post',
        'orderby' => 'date',
        'posts_per_page' => 8,
        'paged' => $paged
      );
      $query = new WP_Query($args);

      if ($query->have_posts()) {
        $i = 3; ?>

        <div class="horizontal-slider">

          <?php while ($query->have_posts()) {
            $query->the_post(); ?>



            <div class="slide sort-item cat-1" data-aos="fade-up" data-aos-delay="<?php echo $i . "00" ?>" data-aos-duration="500" data-aos-anchor-placement="top-bottom">
              <div class="post-card slide__post-card">
                <div class="post-card__category slide__category">
                  <ul>
                    <?php
                    $categories = get_the_category();
                    foreach( $categories as $category) {
                      $name = $category->name;
                      $category_link = get_category_link( $category->term_id ); ?>

                      <li><a href="<?= $category_link; ?>"><?= file_get_contents(get_field('icon', $category)); ?> <?= esc_attr( $name); ?></a></li>
                    <?php } ?>
                  </ul>
                </div>
                <a href="<?php the_permalink() ?>">
                  <div class="post-card__image">
                    <?php if (has_post_thumbnail() && !post_password_required() && !is_attachment()) : ?>
                      <?php the_post_thumbnail('camptown-thumb', array('alt' => get_the_title())); ?>

                    <?php else : ?>
                      <img src="<?= get_template_directory_uri(); ?>/images/no-image.svg" alt="<?php the_title(); ?>">
                    <?php endif; ?>
                  </div>

                  <div class="post-card__title"><?php the_title(); ?></div>

                  <div class="post-card__link">
                    <div class="arrow-btn">קרא עוד</div>
                  </div>



                </a>
              </div>
            </div>


          <?php
            $i++;
          } ?>

        </div>
      <?php } ?>
      <?php wp_reset_postdata(); ?>
    </div>
  </section>
<?php } ?>


<?php if (get_field('services_show')) { ?>

  <div class="home-services">






    <?php if (have_rows('services_section_right')) : ?>
      <?php while (have_rows('services_section_right')) : the_row(); ?>
        <div class="home-services__item">
          <div class="home-services__inner">
            <div class="home-services__icon">
              <img src="<?= get_sub_field('icon')['url']; ?>" alt="<?= get_sub_field('icon')['alt']; ?>">
            </div>
            <h2 class="home-services__title">
              <?php the_sub_field('title'); ?>
            </h2>
            <p class="home-services__text">
              <?php the_sub_field('text'); ?>
            </p>

            <?php
            $link = get_sub_field('link');
            $target = $link['target'] ? $link['target'] : '_self';
            ?>


            <a href="<?= $link['url'] ?>" target="<?= esc_attr($target); ?>" class="home-services__link"><?= $link['title']; ?></a>

          </div>
        </div>

    <?php endwhile;
    endif; ?>



    <?php if (have_rows('services_section_center')) : ?>
      <?php while (have_rows('services_section_center')) : the_row(); ?>
        <div class="home-services__item">


          <img src="<?= get_sub_field('background')['url']; ?>" alt="<?= get_sub_field('background')['alt']; ?>" class="home-services__bg" uk-parallax="scale: 1.1,1;">

          <div class="home-services__inner">
            <div class="home-services__icon">

              <img src="<?= get_sub_field('icon')['url']; ?>" alt="<?= get_sub_field('icon')['alt']; ?>" class="home-services__icon-desktop">
              <img src="<?= get_sub_field('icon_mobile')['url']; ?>" alt="<?= get_sub_field('icon')['alt']; ?>" class="home-services__icon-mobile">

            </div>
            <h2 class="home-services__title">
              <?php the_sub_field('title'); ?>
            </h2>
            <p class="home-services__text">
              <?php the_sub_field('text'); ?>
            </p>
          
            <?= do_shortcode(get_sub_field('form_shortcode')); ?>
          </div>
        </div>

    <?php endwhile;
    endif ?>



    <?php if (have_rows('services_section_left')) : ?>
      <?php while (have_rows('services_section_left')) : the_row(); ?>
        <div class="home-services__item">
          <div class="home-services__inner">
            <div class="home-services__icon">
              <img src="<?= get_sub_field('icon')['url']; ?>" alt="<?= get_sub_field('icon')['alt']; ?>" class="home-services__icon-desktop">
              <img src="<?= get_sub_field('icon_mobile')['url']; ?>" alt="<?= get_sub_field('icon')['alt']; ?>" class="home-services__icon-mobile">
            </div>
            <h2 class="home-services__title">
              <?php the_sub_field('title'); ?>
            </h2>
            <p class="home-services__text">
              <?php the_sub_field('text'); ?>
            </p>

            <?php
            $link = get_sub_field('link');
            $target = $link['target'] ? $link['target'] : '_self';
            ?>


            <a href="<?php echo $link['url'] ?>" target="<?php echo esc_attr($target); ?>" class="home-services__link"><?php echo $link['title']; ?></a>

          </div>
        </div>

    <?php endwhile;
    endif ?>
  </div>
<?php } ?>
<?php get_footer(); ?>