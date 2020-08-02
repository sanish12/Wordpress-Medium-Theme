<?php get_header(); ?>

<!--------------------------------------
HEADER
--------------------------------------->
<?php
if (have_posts()) :
    while (have_posts()) : the_post();
?>
        <div class="container">
            <div class="jumbotron jumbotron-fluid mb-3 pl-0 pt-0 pb-0 bg-white position-relative">
                <div class="h-100 tofront">
                    <div class="row justify-content-between">
                        <div class="col-md-6 pt-6 pb-6 pr-6 align-self-center">
                            <p class="text-uppercase font-weight-bold">
                                <a class="text-danger" href="./category.html">Stories</a>
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
                            <?php echo get_the_post_thumbnail( $page->ID, 'large'); ?>
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
                    <div class="border p-5 bg-lightblue">
                        <div class="row justify-content-between">
                            <div class="col-md-5 mb-2 mb-md-0">
                                <h5 class="font-weight-bold secondfont">Become a member</h5>
                                Get the latest news right in your inbox. We never spam!
                            </div>
                            <div class="col-md-7">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control" placeholder="Enter your e-mail address">
                                    </div>
                                    <div class="col-md-12 mt-2">
                                        <button type="submit" class="btn btn-success btn-block">Subscribe</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="comments border mt-2 p-5 bg-lightblue">
                        
                        <?php if (comments_open() || get_comments_number()) :
                            comments_template();
                        endif; ?>

                        <?php comment_form(); ?>

                    </div>
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
        <div class="col-lg-6">
            <div class="card border-0 mb-4 box-shadow h-xl-300">
                <div style="background-image: url(./assets/img/demo/3.jpg); height: 150px; background-size: cover; background-repeat: no-repeat;">
                </div>
                <div class="card-body px-0 pb-0 d-flex flex-column align-items-start">
                    <h2 class="h4 font-weight-bold">
                        <a class="text-dark" href="#">Brain Stimulation Relieves Depression Symptoms</a>
                    </h2>
                    <p class="card-text">
                        Researchers have found an effective target in the brain for electrical stimulation to improve mood in people suffering from depression.
                    </p>
                    <div>
                        <small class="d-block"><a class="text-muted" href="./author.html">Favid Rick</a></small>
                        <small class="text-muted">Dec 12 · 5 min read</small>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="flex-md-row mb-4 box-shadow h-xl-300">
                <div class="mb-3 d-flex align-items-center">
                    <img height="80" src="./assets/img/demo/blog4.jpg">
                    <div class="pl-3">
                        <h2 class="mb-2 h6 font-weight-bold">
                            <a class="text-dark" href="./article.html">Nasa's IceSat space laser makes height maps of Earth</a>
                        </h2>
                        <div class="card-text text-muted small">
                            Jake Bittle in LOVE/HATE
                        </div>
                        <small class="text-muted">Dec 12 · 5 min read</small>
                    </div>
                </div>
                <div class="mb-3 d-flex align-items-center">
                    <img height="80" src="./assets/img/demo/blog5.jpg">
                    <div class="pl-3">
                        <h2 class="mb-2 h6 font-weight-bold">
                            <a class="text-dark" href="./article.html">Underwater museum brings hope to Lake Titicaca</a>
                        </h2>
                        <div class="card-text text-muted small">
                            Jake Bittle in LOVE/HATE
                        </div>
                        <small class="text-muted">Dec 12 · 5 min read</small>
                    </div>
                </div>
                <div class="mb-3 d-flex align-items-center">
                    <img height="80" src="./assets/img/demo/blog6.jpg">
                    <div class="pl-3">
                        <h2 class="mb-2 h6 font-weight-bold">
                            <a class="text-dark" href="./article.html">Sun-skimming probe starts calling home</a>
                        </h2>
                        <div class="card-text text-muted small">
                            Jake Bittle in LOVE/HATE
                        </div>
                        <small class="text-muted">Dec 12 · 5 min read</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Main -->

<?php get_footer(); ?>