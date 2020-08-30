<?php get_header(); ?>
<div class="container">
    <?php
    $categories = get_categories();
    foreach ($categories as $category) {
        if ($category->count > 0){
        echo '<div class="col-md-4"><a href="' . get_category_link($category->term_id) . '">' . $category->name . '</a></div>';
        }
    }
    ?>
</div>
<?php get_footer(); ?>