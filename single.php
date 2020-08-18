<?php get_header(); ?>

<!--------------------------------------
HEADER
--------------------------------------->
<?php
if (have_posts()) :
    while (have_posts()) : the_post();
        wpb_set_post_views(get_the_ID());
?>
        <div class="container">
            <div class="jumbotron jumbotron-fluid mb-3 pl-0 pt-0 pb-0 bg-white position-relative">
                <div class="h-100 tofront">
                    <div class="row justify-content-between">
                        <div class="col-md-6 pt-6 pb-6 pr-6 align-self-center">
                            <p class="text-uppercase font-weight-bold">
                                <?php
                                $categories = get_the_category();
                                //  print_r($categories);  
                                foreach ($categories as $category) {
                                    $category_link = get_category_link( $category->cat_id );
                                    echo "<a class=\"text-danger\" href='" . get_category_link( $category->cat_ID ) . "'> {$category->name} | </a>";
                                }
                                ?>

                            </p>
                            <h1 class="display-4 secondfont mb-3 font-weight-bold"><?php the_title(); ?></h1>
                            <p class="mb-3">
                                Analysts told CNBC that the currency could hit anywhere between $1.35-$1.40 if the deal gets passed through the U.K. parliament.
                            </p>
                            <div class="d-flex align-items-center">
                                <img class="rounded-circle" src="<?php echo get_theme_file_uri(); ?>/assets/img/demo/avatar2.jpg" width="70">
                                <small class="ml-2"> <?php echo get_the_author(); ?> <span class="text-muted d-block"><?php echo get_the_date(); ?> &middot; 5 min. read</span>
                                </small>
                            </div>
                        </div>
                        <div class="col-md-6 pr-0">
                            <?php echo get_the_post_thumbnail($page->ID, 'large'); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Header -->

        <!--------------------------------------
MAIN
--------------------------------------->
        <div class="container pt-4 pb-4">
            <div class="row justify-content-center">
                <div class="col-lg-2 pr-4 mb-4 col-md-12">
                    <div class="sticky-top text-center">
                        <div class="text-muted">
                            Share this
                        </div>
                        <div class="share d-inline-block">
                            <!-- AddToAny BEGIN -->
                            <div class="a2a_kit a2a_kit_size_32 a2a_default_style">
                                <a class="a2a_dd" href="https://www.addtoany.com/share"></a>
                                <a class="a2a_button_facebook"></a>
                                <a class="a2a_button_twitter"></a>
                            </div>
                            <script async src="https://static.addtoany.com/menu/page.js"></script>
                            <!-- AddToAny END -->
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-lg-8">

                    <article class="article-post">
                        <p>
                            <?php the_content(); ?>
                        </p>
                    </article>

                    <?php
                    if (comments_open() || get_comments_number()) :
                        comments_template();
                    endif;
                    ?>
                    <?php if (comments_open() || have_comments()) : ?>
                        <!-- <div class="comments border mt-2 p-5 bg-lightblue">
                            <div class="container"> -->
                                <?php comment_form(); ?>
                            <!-- </div>
                        </div> -->
                    <?php endif; ?>

                </div>
            </div>
        </div>
<?php
    endwhile;

endif;
?>

<div class="container pt-4 pb-4">
    <h5 class="font-weight-bold spanborder"><span>Read next</span></h5>
    <div class="row">
        <!-- Recommended posts -->
        <?php
        //for use in the loop, list 5 post titles related to first tag on current post
        $rcount = 0;
        $tags = wp_get_post_tags($post->ID);
        if ($tags) {
            $first_tag = $tags[0]->term_id;
            $args = array(
                'tag__in' => array($first_tag),
                'post__not_in' => array($post->ID),
                'posts_per_page' => 4,
                'caller_get_posts' => 1
            );
            $my_query = new WP_Query($args);
            if ($my_query->have_posts()) {
                while ($my_query->have_posts()) : $my_query->the_post(); 
        ?>

        <?php if($rcount==0){ ?>        
        <div class="col-lg-6">
            <div class="card border-0 mb-4 box-shadow h-xl-300">
                <div style="background-image: url(<?php echo get_the_post_thumbnail_url(); ?>); height: 150px; background-size: cover; background-repeat: no-repeat;">
                </div>
                <div class="card-body px-0 pb-0 d-flex flex-column align-items-start">
                    <h2 class="h4 font-weight-bold">
                        <a class="text-dark" href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a>
                    </h2>
                    <p class="card-text">
                        <?php the_excerpt(); ?>
                    </p>
                    <div>
                        <small class="d-block"><a class="text-muted" href="#"><?php the_author(); ?></a></small>
                        <small class="text-muted"><?php the_date(); ?> · 5 min read</small>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>
        <?php if($rcount==0){ ?>
        <div class="col-lg-6">
            <div class="flex-md-row mb-4 box-shadow h-xl-300">
        <?php } ?>    
        <?php if($rcount>0){ ?>    
                <div class="mb-3 d-flex align-items-center">
                    <img height="80" src="<?php echo get_the_post_thumbnail_url(); ?>">
                    <div class="pl-3">
                        <h2 class="mb-2 h6 font-weight-bold">
                            <a class="text-dark" href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a>
                        </h2>
                        <div class="card-text text-muted small">
                            <?php the_author(); ?>
                        </div>
                        <small class="text-muted"><?php the_date(); ?> · 5 min read</small>
                    </div>
                </div>
        <?php } ?>
        <?php
                $rcount++;
                endwhile;
            }
            wp_reset_query();
        }
        ?>
            </div>
        </div>
    </div>
</div>
<!-- End Main -->

<?php get_footer(); ?>