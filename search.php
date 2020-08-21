<?php get_header(); ?>
<?php if (have_posts()) : ?>

    <div class="page-header py-5 bg-light text-center">
        <div class="container">
            <h1 class="entry-title">Search results for: "<?php the_search_query(); ?>"</h1>
        </div>
    </div>
    <div class='container py-3'>
        <?php
        while (have_posts()) : the_post(); ?>

            <article class="post my-4">
                <?php if (has_post_thumbnail()) { ?>
                    <div class="small-thumbnail">
                        <a href="<?php the_permalink() ?>"><?php the_post_thumbnail('small-thumbnail'); ?></a>
                    </div>
                <?php } ?>
                <h2 class="entry-title"><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h2>
                <p class="post-meta"><?php the_time('F jS, Y'); ?> | <a href="<?php echo get_author_posts_url(get_the_author_meta('ID'), get_the_author_meta('user_nicename')); ?>"><?php the_author(); ?></a>
                    | <?php
                        $categories = get_the_category();
                        $comma      = ', ';
                        $output     = '';

                        if ($categories) {
                            foreach ($categories as $category) {
                                $output .= '<a href="' . get_category_link($category->term_id) . '">' . $category->cat_name . '</a>' . $comma;
                            }
                            echo trim($output, $comma);
                        } ?>
                </p>
                <p>
                    <?php echo get_the_excerpt() ?>
                    <a href="<?php the_permalink() ?>">Read more &raquo</a>
                </p>
                <hr>
            </article>

    <?php endwhile;

    else :
        echo '<p>No search results found!</p>';

    endif;
    ?>
    </div>

    <?php get_footer(); ?>