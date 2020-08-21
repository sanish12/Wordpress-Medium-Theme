<?php get_header(); ?>
<?php $current_category = get_queried_object(); ?>

<div class="page-header py-5 bg-light">
    <div class="container">
        <h1 class="entry-title"><?php echo $current_category->name ?></h1> <!-- Page Title -->
    </div>
</div>

<?php
$args = array(
    'category_name' => $current_category->name,
    'posts_per_page' => 9
);
$query = new WP_Query($args);
if ($query->have_posts()) :
    $post_count = 0;
    while ($query->have_posts()) : $query->the_post();
?>
        <?php if ($post_count == 0) { ?>
            <div class="container pt-4 pb-4 my-2">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="card border-0 mb-4 box-shadow h-xl-300">
                            <div style="background-image: url(<?php echo get_the_post_thumbnail_url(); ?>); height: 150px;    background-size: cover;    background-repeat: no-repeat;"></div>
                            <div class="card-body px-0 pb-0 d-flex flex-column align-items-start">
                                <h2 class="h4 font-weight-bold">
                                    <a class="text-dark" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </h2>
                                <p class="card-text">
                                    <?php the_excerpt( ); ?>
                                </p>
                                <div>
                                    <small class="d-block"><a class="text-muted" href="./author.html"><?php the_author(); ?></a></small>
                                    <small class="text-muted"><?php the_date(); ?> &middot; 5 min read</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="flex-md-row mb-4 box-shadow h-xl-300">
                        <?php } ?>
                        <?php if ($post_count > 0 && $post_count < 4) { ?>
                            <div class="mb-3 d-flex align-items-center">
                                <img height="80" src="<?php echo get_the_post_thumbnail_url(); ?>">
                                <div class="pl-3">
                                    <h2 class="mb-2 h6 font-weight-bold">
                                        <a class="text-dark" href="<?php echo the_permalink(); ?>"><?php the_title(); ?></a>
                                    </h2>
                                    <div class="card-text text-muted small">
                                        <?php the_author( ); ?>
                                    </div>
                                    <small class="text-muted">Dec 12 &middot; 5 min read</small>
                                </div>
                            </div>
                        <?php } ?>
                        <?php if ($post_count == 4) { ?>
                        </div><!-- end of flex-md-row for right sided header articles -->
                    </div><!-- end of col-lg-6 for right sided articles -->
                </div><!-- end of row for first set of articles -->
            </div><!-- end of container for first set of articles -->
            <div class="container">
                <div class="row justify-content-between">
                    <div class="col-md-8">
                        <h5 class="font-weight-bold spanborder"><span>All Stories</span></h5>
                    <?php } ?>
                    <?php if ($post_count >= 4) { ?>
                        <div class="mb-3 d-flex justify-content-between">
                            <div class="pr-3">
                                <h2 class="mb-1 h4 font-weight-bold">
                                    <a class="text-dark" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </h2>
                                <p>
                                    <?php the_excerpt( ); ?>
                                </p>
                                <div class="card-text text-muted small">
                                    <?php the_author(); ?>
                                </div>
                                <small class="text-muted"><?php the_date(); ?> &middot; 5 min read</small>
                            </div>
                            <img height="120" src="<?php echo get_the_post_thumbnail_url(); ?>">
                        </div>
                    <?php } ?>
                    <?php $post_count++; ?>
                <?php endwhile; ?>
            <?php endif; ?>
                    </div><!-- end of col-md-8 for all stories section -->
                </div><!-- end of row for all stories section -->
            </div><!-- end of container for all stories section-->
<!-- FOOTER -->
<?php get_footer(); ?>


