<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="./assets/img/favicon.ico">
	<link rel="icon" type="image/png" href="./assets/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title><?php echo get_bloginfo('title'); ?></title>
	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,700|Source+Sans+Pro:400,600,700" rel="stylesheet">
	<!-- Font Awesome Icons -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
	<!-- Main CSS -->

	<?php wp_head(); ?>

</head>

<body>
	<!--------------------------------------
NAVBAR
--------------------------------------->
	<?php if (current_user_can('manage_options')) {
		echo "<nav class=\"topnav navbar navbar-expand-lg navbar-light bg-white fixed-top\" style='margin-top:32px'>";
	} else {
		echo "<nav class=\"topnav navbar navbar-expand-lg navbar-light bg-white fixed-top\">";
	}
	?>
	<div class="container">
		<a class="navbar-brand" href="<?php echo home_url(); ?>"><strong>Mundana</strong></a>
		<button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="navbar-collapse collapse" id="navbarColor02" style="">
			<?php

			wp_nav_menu(
				array(
					'theme_location' => 'header-menu',
					'container' => 'ul',
					'menu_class' => 'navbar-nav mr-auto d-flex align-items-center',
					'add_li_class' => 'nav-item',
				)
			);

			?>
			<form class="form-inline d-flex justify-content-center md-form form-sm mt-0" action="<?php echo home_url(); ?>" method="get">
				<input id='nav-search' class="form-control form-control-sm ml-3 w-75" name='s' type="text" placeholder="Search" aria-label="Search">
				<i class="fas fa-search pl-1" aria-hidden="true"></i>
			</form>
		</div>
	</div>
	</nav>

	</nav>
	<!-- End Navbar -->