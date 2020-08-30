<?php get_header(); ?>
<div class="page-header bg-lightblue py-5">
    <h1 class="text-center">Contact Us</h1>
</div>
<div class="container py-4">
    <?php while (have_posts()) : the_post(); ?>
        <p><?php the_content(); ?></p>
    <?php endwhile; ?>
    <div class="row">
        <div class="col-6">
            <img src="<?php echo get_template_directory_uri() ?>/assets/img/demo/intro.jpg" class="img-fluid" alt="">
        </div>
        <div class="col-6">
            <form class="py-4">
                <div class="form-group">
                    <label for="exampleFormControlInput1">Full Name</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Email address</label>
                    <input type="email" class="form-control" id="exampleFormControlInput1">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Subject</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Example textarea</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="5"></textarea>
                </div>
                <div class="form-group">
                    <button class="btn btn-primary" type="submit">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php get_footer() ?>