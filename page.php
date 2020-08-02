<?php get_header(); ?>
<div class="page-header py-5 bg-light">
    <div class="container">
        <h1 class="entry-title"><?php the_title(); ?></h1> <!-- Page Title -->
    </div>
</div>
<div class="container py-2">
    <div id="content" class="pageContent">

    <?php
    // TO SHOW THE PAGE CONTENTS
    while ( have_posts() ) : the_post(); ?> <!--Because the_content() works only inside a WP Loop -->
        <div class="entry-content-page">
            <?php the_content(); ?> <!-- Page Content -->
        </div><!-- .entry-content-page -->

    <?php
    endwhile; //resetting the page loop
    wp_reset_query(); //resetting the page query
    ?>
    </div>
</div>
<?php get_footer(); ?>