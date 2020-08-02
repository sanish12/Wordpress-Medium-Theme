<?php get_header(); ?>  

<!--------------------------------------
HEADER
--------------------------------------->
<!-- Get Sticky Post -->
<?php
$args = array(
	'posts_per_page' => 1,
	'post__in' => get_option( 'sticky_posts' ),
	'ignore_sticky_posts' => 1
);
$the_query = new WP_Query($args);

if ( $the_query->have_posts() ) : 
	 while ( $the_query->have_posts() ) : $the_query->the_post();
?>
<div class="container">
	<div class="jumbotron jumbotron-fluid mb-3 pt-0 pb-0 bg-lightblue position-relative">
		<div class="pl-4 pr-0 h-100 tofront">
			<div class="row justify-content-between">
				<div class="col-md-6 pt-6 pb-6 align-self-center">
					<h1 class="secondfont mb-3 font-weight-bold"><?php the_title(); ?></h1>
					<p class="mb-3">
						<?php the_excerpt(); ?>
					</p>
					<a href="<?php echo get_permalink(); ?>" class="btn btn-dark">Read More</a>
				</div>
				<div class="col-md-6 d-none d-md-block pr-0" style="background-size:cover;background-image:url(<?php echo get_the_post_thumbnail_url(); ?>);">	</div>
			</div>
		</div>
	</div>
</div>
<?php

endwhile; 
endif;

?>

<!-- End Header -->
    
    
<!--------------------------------------
MAIN
--------------------------------------->
<?php
$args = array(
	'posts_per_page' => 4,
	'tag' => 'highlight'
);
$the_latest_posts = new WP_Query($args);
$count = 1;	
?>    
<div class="container pt-4 pb-4">
	<div class="row">
	<?php
	if($the_latest_posts->have_posts()):
	while( $the_latest_posts->have_posts() ) : $the_latest_posts->the_post( );
	if($count==1){ 
	?>
		<div class="col-lg-6">
			<div class="card border-0 mb-4 box-shadow ">              
                <div style="background-image: url(<?php echo get_the_post_thumbnail_url(); ?>); height: 150px;    background-size: cover;    background-repeat: no-repeat;"></div>               
				<div class="card-body px-0 pb-0 d-flex flex-column align-items-start">
					<h2 class="h4 font-weight-bold">
					<a class="text-dark" href="<?php echo get_permalink(); ?>"> <?php the_title(); ?> </a>
					</h2>
					<p class="card-text">
						<?php the_excerpt(); ?>
					</p>
					<div>
						<small class="d-block"><a class="text-muted" href="./author.html">Favid Rick</a></small>
						<small class="text-muted">Dec 12 &middot; 5 min read</small>
					</div>
				</div>
			</div>
		</div>
<?php $count++;  
	  echo"<div class=\"col-lg-6\">";
		}//end of if
		else{
		?>
			<div class="flex-md-row mb-4 box-shadow">
				<div class="mb-3 d-flex align-items-center">
					<img height="80" src="<?php echo get_theme_file_uri() ?>/assets/img/demo/blog4.jpg">
					<div class="pl-3">
						<h2 class="mb-2 h6 font-weight-bold">
						<a class="text-dark" href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a>
						</h2>
						<div class="card-text text-muted small">
							 <?php the_excerpt(  ); ?>
						</div>
						<small class="text-muted">Dec 12 &middot; 5 min read</small>
					</div>
				</div>
			</div>	  
<?php	
		}  
		endwhile;
		endif; 
?>	
		</div>
	</div>
</div>
    
<div class="container">
	<div class="row justify-content-between">
		<div class="col-md-8">
			<h5 class="font-weight-bold spanborder"><span>All Stories</span></h5>
			<?php 
				if (have_posts()) :
          			while (have_posts()) : the_post(); ?>
			<div class="mb-3 d-flex justify-content-between">
				<div class="pr-3">
					<h2 class="mb-1 h4 font-weight-bold">
					<a class="text-dark" href="<?php echo get_permalink( ); ?>"><?php the_title( ); ?></a>
					</h2>
					<p>
						<?php the_excerpt(  ) ?>
					</p>
					<div class="card-text text-muted small">
						 <?php the_author( ); ?>
					</div>
					<small class="text-muted">Dec 12 &middot; 5 min read</small>
				</div>
				<img height="120" src="<?php echo get_theme_file_uri() ?>/assets/img/demo/blog8.jpg">
			</div>
			<?php
				endwhile;
				endif;
			?>
		</div>
		<div class="col-md-4 pl-4">
            <h5 class="font-weight-bold spanborder"><span>Popular</span></h5>
			<ol class="list-featured">
				<?php 
					$args = array(
						'posts_per_page' => 4,
						'meta_key' => 'wpb_post_views_count', 
						'orderby' => 'meta_value_num', 
						'order' => 'DESC', 
					);
					$the_popular_posts = new WP_Query($args);
					if($the_popular_posts->have_posts(  )):
						while($the_popular_posts->have_posts(  )) : $the_popular_posts->the_post(  );
				?>
				<li>
				<span>
				<h6 class="font-weight-bold">
				<a href="<?php echo get_permalink( ); ?>" class="text-dark"><?php the_title(); ?></a>
				</h6>
				<p class="text-muted">
					<?php the_author(  ); ?>
				</p>
				</span>
				</li>
				<?php 
					endwhile;
					endif;
				?>
			</ol>
		</div>
	</div>
</div>

<?php get_footer(); ?>