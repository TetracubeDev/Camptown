<?php

if ($_POST && $_POST['blog-filter'] && $_POST['query']) {

    $query = json_decode(stripslashes($_POST['query']), true);
    $numberposts = $_POST['numberposts'];
    $cat_id = $query['cur_cat'] !== '' ? get_category_by_slug($query['cur_cat'])->cat_ID : '';

    if ($_POST['load_more'] && $_POST['load_more'] == true) {

        $args = array('numberposts' => $query['posts_length'] + $numberposts, 'category' => $cat_id);
    } else {
        $args = array('numberposts' => $numberposts, 'category' => $cat_id);
    }

    $posts_count_2 = count(get_posts(array('numberposts' => -1, 'category' => $cat_id)));
    $curr_posts = get_posts($args);


?>

    <?php if ($curr_posts) {
        foreach ($curr_posts as $post) {
            setup_postdata($post);
    ?>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12 sort-item <?= esc_html(get_the_category()[0]->slug) ?>" data-count=<?= $posts_count_2 ?>>
                <div class="post-card ">
                    <?php get_template_part('template_parts/post', get_post_format()); ?>
                </div>
            </div>
        <?php
        }
        wp_reset_postdata();
        ?>
<?php };
    exit;
}

?>