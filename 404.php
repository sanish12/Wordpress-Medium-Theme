<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/favicon.ico">
    <link rel="icon" type="image/png" href="./assets/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title><?php wp_title(''); ?></title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,700|Source+Sans+Pro:400,600,700" rel="stylesheet">
    <?php wp_head(); ?>
</head>

<body>
    <div class="container">
        <h1 style="font-size: 10rem">404</h1>
        <p>Oops, couldnt get the page you're looking for</p>
        <form action="<?php echo home_url(); ?>" method="get">
            <div class="input-group mb-3">

                <input type="text" name='s' class="form-control" placeholder="Looking for something..." aria-label="Recipient's username" aria-describedby="basic-addon2">
                <div class="input-group-append">
                    <button class="btn btn-outline-primary" type="submit">Search</button>
                </div>
            </div>
        </form>
    </div>

    <?php wp_footer(); ?>
</body>

</html>