
<!DOCTYPE html>

<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->

<!-- Head BEGIN -->
<head>
    <meta charset="utf-8">
    <title>Metronic Frontend (with Top Bar)</title>

    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

    <meta content="Metronic Shop UI description" name="description">
    <meta content="Metronic Shop UI keywords" name="keywords">
    <meta content="keenthemes" name="author">

    <meta property="og:site_name" content="-CUSTOMER VALUE-">
    <meta property="og:title" content="-CUSTOMER VALUE-">
    <meta property="og:description" content="-CUSTOMER VALUE-">
    <meta property="og:type" content="website">
    <meta property="og:image" content="-CUSTOMER VALUE-"><!-- link to image for socio -->
    <meta property="og:url" content="-CUSTOMER VALUE-">

    <link rel="shortcut icon" href="favicon.ico">

    <!-- Fonts START -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700|PT+Sans+Narrow|Source+Sans+Pro:200,300,400,600,700,900&amp;subset=all" rel="stylesheet" type="text/css">
    <!-- Fonts END -->

    <!-- Global styles START -->
    <link href="<?=base_url()?>assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?=base_url()?>assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Global styles END -->

    <!-- Page level plugin styles START -->
    <link href="<?=base_url()?>assets/global/plugins/fancybox/source/jquery.fancybox.css" rel="stylesheet">
    <link href="<?=base_url()?>assets/global/plugins/carousel-owl-carousel/owl-carousel/owl.carousel.css" rel="stylesheet">
    <link href="<?=base_url()?>assets/global/plugins/slider-revolution-slider/rs-plugin/css/settings.css" rel="stylesheet">
    <!-- Page level plugin styles END -->

    <!-- Theme styles START -->
    <link href="<?=base_url()?>assets/global/css/components.css" rel="stylesheet">
    <link href="<?=base_url()?>assets/frontend/layout/css/style.css" rel="stylesheet">
    <link href="<?=base_url()?>assets/frontend/pages/css/style-revolution-slider.css" rel="stylesheet"><!-- metronic revo slider styles -->
    <link href="<?=base_url()?>assets/frontend/layout/css/style-responsive.css" rel="stylesheet">
    <link href="<?=base_url()?>assets/frontend/layout/css/themes/red.css" rel="stylesheet" id="style-color">
    <link href="<?=base_url()?>assets/frontend/layout/css/custom.css" rel="stylesheet">
    <!-- Theme styles END -->
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/global/plugins/bootstrap-datepicker/css/datepicker3.css"/>

    <link href="<?=base_url()?>assets/mycss/style.css" rel="stylesheet">

    <!-- Core plugins BEGIN (For ALL pages) -->
    <script src="<?=base_url()?>assets/global/plugins/jquery.min.js" type="text/javascript"></script>
    <script src="<?=base_url()?>assets/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>
    <script src="<?=base_url()?>assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="<?=base_url()?>assets/global/plugins/jquery-form.js" type="text/javascript"></script>

    <script type="text/javascript" src="<?=base_url()?>assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>

    <script>
        var baseURL = "<?=base_url()?>";
    </script>

</head>
<!-- Head END -->

<!-- Body BEGIN -->
<body class="corporate">
<!-- BEGIN STYLE CUSTOMIZER -->
<div class="color-panel hidden-sm">
    <div class="color-mode-icons icon-color"></div>
    <div class="color-mode-icons icon-color-close"></div>
    <div class="color-mode">
        <p>THEME COLOR</p>
        <ul class="inline">
            <li class="color-red current color-default" data-style="red"></li>
            <li class="color-blue" data-style="blue"></li>
            <li class="color-green" data-style="green"></li>
            <li class="color-orange" data-style="orange"></li>
            <li class="color-gray" data-style="gray"></li>
            <li class="color-turquoise" data-style="turquoise"></li>
        </ul>
    </div>
</div>
<!-- END BEGIN STYLE CUSTOMIZER -->

<!-- BEGIN TOP BAR -->
<div class="pre-header">
    <div class="container">
        <div class="row">
            <!-- BEGIN TOP BAR LEFT PART -->
            <div class="col-md-6 col-sm-6 additional-shop-info">
                <ul class="list-unstyled list-inline">
                    <li><i class="fa fa-phone"></i><span>+1 456 6717</span></li>
                    <li><i class="fa fa-envelope-o"></i><span>info@keenthemes.com</span></li>
                </ul>
            </div>
            <!-- END TOP BAR LEFT PART -->
            <!-- BEGIN TOP BAR MENU -->
            <div class="col-md-6 col-sm-6 additional-nav">
                <ul class="list-unstyled list-inline pull-right">
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" data-target="#" href="javascript:;">Log In</a>
                        <ul class="dropdown-menu">
                            <li class="login-dropdown-item"><a href="<?=base_url()?>f-login-doctor">Log In As Doctor</a></li>
                            <li class="login-dropdown-item"><a href="<?=base_url()?>f-login-patient">Log In As Patient</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" data-target="#" href="javascript:;">Register</a>
                        <ul class="dropdown-menu">
                            <li class="login-dropdown-item"><a href="<?=base_url()?>f-signup-doctor">Register As Doctor</a></li>
                            <li class="login-dropdown-item"><a href="<?=base_url()?>f-signup-patient">Register As Patient</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- END TOP BAR MENU -->
        </div>
    </div>
</div>
<!-- END TOP BAR -->
<!-- BEGIN HEADER -->
<div class="header">
    <div class="container">
        <a class="site-logo" href="index.html"><img src="<?=base_url()?>assets/frontend/layout/img/logos/logo-corp-red.png" alt="Metronic FrontEnd"></a>

        <a href="javascript:void(0);" class="mobi-toggler"><i class="fa fa-bars"></i></a>

        <!-- BEGIN NAVIGATION -->
        <div class="header-navigation pull-right font-transform-inherit">
            <ul>
                <li><a href="<?=base_url()?>">Home</a></li>
                <li><a href="#">Patient Portal</a></li>
                <li><a href="#">Provider Portal</a></li>
                <li><a href="#">Hostpital</a></li>

            </ul>
        </div>
        <!-- END NAVIGATION -->
    </div>
</div>
<!-- Header END -->
