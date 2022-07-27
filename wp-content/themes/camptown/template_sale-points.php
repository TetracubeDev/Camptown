<?php
/*
  Template name: Template Sale Points
*/
?>

<?php
if ($_POST && $_POST['filter_query'] == true) {

    $category_id = $_POST['category'];
    /*  $sale = $_POST['sale']; */
    $args = array(

        'post_type' => 'sale_points',
        'posts_per_page' => -1,
        'tax_query' => array(
            array(
                'taxonomy' => 'region',
                'field' => 'term_id',
                'terms' => $category_id

            )
        )
    );

    $query = new WP_Query($args);

    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post(); 

            $city_title = get_field('city');
            $city_title_crop = str_replace(' ', '', $city_title);
                        
            ?>


            <div class="col-lg-3 col-md-4 col-6 col-md-6 sort-item <?php echo $city_title_crop; ?>">
                <div class="sale-item">
                    <div class="sale-item__title bordered-title">
                        <span>
                            <?php the_title(); ?>
                        </span>

                    </div>
                    <div class="sale-item__info">
                        <?php if (get_field('address')) { ?>
                            <div class="sale-item__address">
                                <span>
                                    כתובת:
                                </span>
                                <?php the_field('address'); ?>
                            </div>
                        <?php } ?>

                        <?php if (get_field('phone')) { ?>
                            <div class="sale-item__phone">
                                <span>
                                    טלפון:
                                </span>
                                <?php the_field('phone'); ?>
                            </div>
                        <?php } ?>

                    </div>
                    <?php if (get_field('waze')) { ?>
                        <div class="sale-item__waze">ניווט עם וייז:
                            <a href="<?php the_field('waze'); ?>" class="default-icon"> <i class="icon-waze"></i></a>
                        </div>
                    <?php } ?>
                </div>
            </div>

        <?php } ?>
    <?php } ?>
    <?php wp_reset_postdata(); ?>

<?php

    exit;
}


?>

<?php
if ($_POST && $_POST['city_query'] == true) {
   
    $category_id = $_POST['category'];
   
?>
  
        <?php
        $args = array(

            'post_type' => 'sale_points',
            'posts_per_page' => -1,
            'tax_query' => array(
                array(
                    'taxonomy' => 'region',
                    'field' => 'term_id',
                    'terms' => $category_id
    
                )
            )
        );
    
        $query = new WP_Query($args);
        $total = $query->found_posts;


        if ($query->have_posts()) { ?>
            <option value="בחר יישוב" selected="" disabled="">בחר יישוב</option>
            <?php while ($query->have_posts()) {
                $query->the_post(); 

                $city_title = get_field('city');
                $city_title_crop = str_replace(' ', '', $city_title);
                ?>
                <option value="<?php echo $city_title_crop; ?>"><?php the_field('city'); ?></option>
            <?php } ?>
        <?php } ?>
        <?php wp_reset_postdata(); ?>

  

<?php exit;
} ?>

<?php get_header(); ?>
<section class="sale-page grey-bg">
    <div class="sale-banner banner">
        <?php if (has_post_thumbnail() && !post_password_required() && !is_attachment()) :
            the_post_thumbnail('full', array('class' => 'banner__image banner__image-desktop contacts-banner__image', 'alt' => get_the_title()));
        endif; ?>
        <img src="<?= get_field('mobile_banner')['url']  ?>" alt="<?= get_field('mobile_banner')['alt']  ?>" class="banner__image banner__image-mobile">
        <div class="breadcrumb">
            <?php echo do_shortcode('[wpseo_breadcrumb]'); ?>
        </div>

        <div class="container">

            <h1 class="banner__title">
                <?php the_title(); ?>
            </h1>



        </div>


    </div>
    <div class="container">
        <div class="category-line alternative-line sale-points-line">
            <div class="category-line__inner">

                <?php
                $args = array(
                    'taxonomy'     => 'region',
                    'hide_empty' => 0,
                );
                $categories = get_categories($args); ?>

                <div class="category-line__item ">
                    <a href="/sale-points/" class="active">
                        <div class="category-line__image alternative-line__image">

                            <img src="/wp-content/uploads/2022/04/all-country.jpg" alt="">
                        </div>
                        <div class="category-line__title">
                            כל הארץ
                        </div>
                    </a>
                </div>


                <?php foreach ($categories as $category) {
                ?>
                    <div class="category-line__item">
                        <a class="tax" href="<?= $category->term_id; ?>">
                            <div class="category-line__image alternative-line__image">
                                <img src="<?= get_field('icon', $category)['url']; ?>" alt="<?= get_field('icon', $category)['alt']; ?>">
                            </div>
                            <div class="category-line__title">
                                <?= $category->name; ?>
                            </div>
                        </a>
                    </div>
                <?php } ?>
            </div>
        </div>

    </div>


    <div class="sale-select">
        <div class="container">
            <select>
                <option value="בחר יישוב" selected="" disabled="">בחר יישוב</option>
                <?php
                $args = array(
                    'post_type' => 'sale_points',
                    'posts_per_page' => -1,
                );

                $query = new WP_Query($args);
                $total = $query->found_posts;


                if ($query->have_posts()) {
                    while ($query->have_posts()) {
                        $query->the_post(); 
                        $city_title = get_field('city');
                        $city_title_crop = str_replace(' ', '', $city_title);
                        ?>
                        
                        <option value="<?php echo $city_title_crop; ?>"><?php the_field('city'); ?></option>
                    <?php } ?>
                <?php } ?>
                <?php wp_reset_postdata(); ?>

            </select>
        </div>

    </div>
    <div class="sale-content">
        <div class="sale-content__count">
            <span> <?= $total; ?></span> חנויות נמצאו
        </div>
        <div class="sale-content__title">
            <?php the_field('subtitle'); ?>
        </div>
    </div>
    <div class="sale-items">
        <div class="container">
            <div class="row">

                <?php
                $args = array(
                    'post_type' => 'sale_points',
                    'posts_per_page' => -1,
                );

                $query = new WP_Query($args);

                if ($query->have_posts()) {
                    while ($query->have_posts()) {
                        $query->the_post(); 


                            $city_title = get_field('city');
                            $city_title_crop = str_replace(' ', '', $city_title);
                        
                        ?>


                        <div class="col-lg-3 col-md-4 col-6 col-md-6 sort-item <?php echo $city_title_crop; ?>">
                            <div class="sale-item">
                                <div class="sale-item__title bordered-title">
                                    <span>
                                        <?php the_title(); ?>
                                    </span>

                                </div>
                                <div class="sale-item__info">
                                    <?php if (get_field('address')) { ?>
                                        <div class="sale-item__address">
                                            <span>
                                                כתובת:
                                            </span>
                                            <?php the_field('address'); ?>
                                        </div>
                                    <?php } ?>

                                    <?php if (get_field('phone')) { ?>
                                        <div class="sale-item__phone">
                                            <span>
                                                טלפון:
                                            </span>
                                            <?php the_field('phone'); ?>
                                        </div>
                                    <?php } ?>

                                </div>
                                <?php if (get_field('waze')) { ?>
                                    <div class="sale-item__waze">ניווט עם וייז:
                                        <a href="<?php the_field('waze'); ?>" class="default-icon"> <i class="icon-waze"></i></a>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>

                    <?php } ?>
                <?php } ?>
                <?php wp_reset_postdata(); ?>






            </div>
        </div>

    </div>

</section>
<?php get_footer(); ?>

<script>
  
    const category_btn = document.querySelectorAll('.category-line__item a.tax')
    let cur_cat = ''
    /* let cur_sale ='' */
    const sale_select = document.querySelector('.sale-select select')
    
    const sale_items = document.querySelector('.sale-items>.container>.row')
  /*   console.log(category_btn) */

    /* sale_select.addEventListener('change',()=>{

        cur_sale=sale_select.value
        showData ();

        console.log(cur_cat)
        console.log(cur_sale)
    }) */

    for (const btn of category_btn) {
      

        btn.addEventListener('click', (e) => {
            e.preventDefault()
            jQuery('.category-line__item:first-child a').removeClass('active')
            cur_cat=btn.getAttribute('href').replace('#','').trim()
            showData();

            for (const iterator of category_btn) {
              
                let curr = e.target.closest('.category-line__item a.tax')
                if(curr && iterator !== curr){
                  
                    iterator.classList.remove('active')
                }
            }
            btn.classList.add('active')

        })
    }


    async function showData() {
        let result = await fetchQueryCat()
        let city_select = await fetchQueryCity()
        if (result) {

            sale_items.style = 'transition: all .6s ease; opacity: 0;'
            sale_items.innerHTML = result;
            setTimeout(() => {
                sale_items.style = ' opacity: 1;'
            }, 300);
          /*   console.log(result) */
        }
        if (city_select) {
           
            sale_select.innerHTML =city_select
            refreshNiceSelect(sale_select) 

            jQuery('.sale-select li').on('click', function(e) {
                e.preventDefault()
               
                var classToFilter = jQuery(this).attr('data-value');
                var hide = jQuery('.sort-item').not('.' + classToFilter);
                var show = jQuery('.sort-item.' + classToFilter)
                show.show().addClass('active');
                hide.hide().removeClass('active');
                console.log('sds');
            });
          
        }
    }

    async function fetchQueryCat() {
        const data = new URLSearchParams();

        data.append('filter_query', true)
        data.append('category', cur_cat)
        /*  data.append('sale', cur_sale) */
        let response = await fetch(window.location.href, {
            method: 'POST',
            headers: {
                // 'Content-Type': 'application/json;charset=utf-8'
            },
            body: data

        });

        return await response.text()

    }
    async function fetchQueryCity() {
        const data = new URLSearchParams();

        data.append('city_query', true)
        data.append('category', cur_cat)
        let response = await fetch(window.location.href, {
            method: 'POST',
            headers: {
                // 'Content-Type': 'application/json;charset=utf-8'
            },
            body: data

        });

        return await response.text()

    }


    jQuery(document).ready(function($) {
        $('.sale-select li').on('click', function(e) {
            e.preventDefault()
            var classToFilter = $(this).attr('data-value');
            var hide = $('.sort-item').not('.' + classToFilter);
            var show = $('.sort-item.' + classToFilter)
            show.show().addClass('active');
            hide.hide().removeClass('active');
            console.log('ss');
        });
        $(document).ajaxComplete(function() {

        })
    })
</script>