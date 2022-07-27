<?php get_header(); ?>

<article class="article">
    <div class="container">




        <div class="row">
            <div class="col-lg-10 offset-lg-1">

                <div class="article__image">
                    <div class="breadcrumb article__breadcrumb">
                        <?= do_shortcode('[wpseo_breadcrumb]'); ?>
                    </div>

                    <?php if (has_post_thumbnail() && !post_password_required() && !is_attachment()) : ?>
                        <?php


                        the_post_thumbnail('full', array('class' => '', 'alt' => get_the_title()));

                        ?>

                    <?php else : ?>
                        <img src="<?php echo get_template_directory_uri(); ?>/images/no-image.svg" alt="<?php the_title(); ?>">
                    <?php endif; ?>
                </div>

            </div>
            <div class="col-12">



            </div>

        </div>



        <div class="row">

            <div class="col-lg-1 offset-lg-1">
                <div class="float-socials">

                    <div class="float-socials__links">
                        <a href="<?php echo get_permalink(get_option('page_for_posts')); ?>" class="back-to-blog"><i class="icon-arrow"></i></a>
                        <a class="share facebook-share" target="_blank" data-network="facebook" href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" title="Facebook">
                            <i class="icon-facebook"></i>
                        </a>


                        <a class="share whatsapp-share" target="_blank" data-network="whatsapp" href="https://wa.me/?text=<?php the_permalink(); ?>" title="WhatsApp">
                            <i class="icon-whatsapp"></i>
                        </a>

                        <a class="share twitter-share" target="_blank" data-network="twitter" href="https://www.twitter.com/share?url=<?php the_permalink(); ?>" title="Twitter">
                            <i class="icon-twitter"></i>
                        </a>


                    </div>
                </div>

            </div>


            <div class="col-lg-6">
                <div class="article-header">



                    <h1 class="article-header__title">
                        <?php the_title(); ?>
                    </h1>

                    <div class="article-header__info ">
                       


                            <?php
                            $categories = get_the_category();
                            foreach ($categories as $category) {
                                $name = $category->name;
                                $category_link = get_category_link($category->term_id); ?>

                                <a href="<?= $category_link; ?>" class="article-header__category "><?= file_get_contents(get_field('icon', $category)); ?> <?= esc_attr($name); ?></a>
                            <?php } ?>

                        

                        <div class="article-header__autor">
                            <? /*= get_the_author(''); */ ?> ישראל ישראלי
                        </div>

                        <?= get_the_date('d/m/y') ?>


                    </div>

                </div>
                <div class="article__content default-content">
                    <?php if (wp_is_mobile()) { ?>
                        <div class="article__anchor anchor anchor--sm">
                            <div class="anchor__title">
                                <div class="anchor__icon">
                                    <i class="icon-content"></i>
                                </div>
                                תוכן עניינים
                            </div>
                            <ul></ul>
                        </div>
                    <?php } ?>
                    <div class="article__introduction">
                        <?php the_field('introduction') ?>
                    </div>


                    <?php the_content(); ?>

                    <?php if (get_field('bottom_contemt_title') || get_field('bottom_content')) { ?>
                        <div class="article__bottom">
                            <div class="article__bottom__title"><?php the_field('bottom_contemt_title') ?></div>
                            <?php the_field('bottom_content') ?>
                        </div>
                    <?php } ?>
                    <?php if (have_rows('single_news_section')) : ?>
                        <?php while (have_rows('single_news_section')) : the_row(); ?>
                            <h2 id="id-<?= get_row_index(); ?>">
                                <?php the_sub_field('title'); ?>
                            </h2>
                            <?php the_sub_field('text'); ?>
                        <?php endwhile; ?>
                    <?php endif; ?>



                </div>

            </div>

            <div class="col-lg-3">
                <div class="article__anchor anchor">
                    <div class="anchor__title">
                        <div class="anchor__icon">
                            <i class="icon-content"></i>
                        </div>
                        תוכן עניינים
                    </div>
                    <ul></ul>
                </div>
            </div>
        </div>






    </div>

</article>

<?php
$args = array(
    'post_type' => 'post',
    'posts_per_page' => -1,
    'post_status' => 'publish',
    'category__in' => wp_get_post_categories($post->ID),
    'post__not_in' => array($post->ID)
);

$query = new WP_Query($args);

if ($query->have_posts()) { ?>

    <section class="related-articles">
        <div class="container">
            <div class="row">
                <div class="offset-lg-1 col-lg-10">
                    <div class="related-articles__inner">
                        <h2 class="related-articles__title">עוד מאמרים</h2>
                        <div class=" related-articles-carousel horizontal-slider">

                            <?php while ($query->have_posts()) {
                                $query->the_post(); ?>
                                <div class="slide">
                                    <?php get_template_part('template_parts/loop', get_post_format()); ?>
                                </div>

                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

    </div>
<?php } ?>
<?php wp_reset_postdata(); ?>
<script>
    document.addEventListener('DOMContentLoaded', function() {

        /**
         * Створює якорі
         * @param {string} ulSelector 
         * @param {string} h2Selector 
         */
        function addAnchor(ulSelector, h2Selector) {
            const select = document.querySelector(ulSelector);
            const h2s = document.querySelectorAll(h2Selector);

            const items = []
            for (let i = 0; i < h2s.length; i++) {

                h2s[i].id = 'anchor-' + i
                items.push(h2s[i].textContent)
            }

            select.innerHTML = items.map((item, key) => (
                `<li><a data-anchor = "anchor-${key}" href ="#anchor-${key}"> ${item}</a> </li>`
            )).join('')
            let as = select.querySelectorAll('a');
            for (const a of as) {
                a.addEventListener('click', (e) => {
                    e.preventDefault()
                    let scrollTo = document.querySelector(`.default-content h2[id=${a.getAttribute('href').replace('#','')}]`)
                    if (scrollTo) {
                        scrollTo.scrollTo();
                    }

                })
            }
        }

        addAnchor('.anchor ul', '.article h2')

    });
</script>
<?php get_footer(); ?>