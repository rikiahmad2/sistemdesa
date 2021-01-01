 <!DOCTYPE html>

 <!--[if IE 9]>         <html class="no-js lt-ie10" lang="en"> <![endif]-->
 <!--[if gt IE 9]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
 <head>
    <meta charset="utf-8">

    <title>SIWADES</title>

    <meta name="description" content="AppUI is a Web App Bootstrap Admin Template created by pixelcave and published on Themeforest">
    <meta name="author" content="pixelcave">
    <meta name="robots" content="noindex, nofollow">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <!-- Icons -->
    <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
    <link rel="icon" type="image/png" href="<?=base_url('assets/');?>img/logo.png">
    <!-- END Icons -->
    <!-- Stylesheets -->
    <!-- Bootstrap is included in its original form, unaltered -->
    <link rel="stylesheet" href="<?=base_url('assets/');?>css/bootstrap.min.css">
    <!-- Related styles of various icon packs and plugins -->
    <link rel="stylesheet" href="<?=base_url('assets/');?>css/plugins.css">
    <!-- The main stylesheet of this template. All Bootstrap overwrites are defined in here -->
    <link rel="stylesheet" href="<?=base_url('assets/');?>css/main.css">
    <!-- The themes stylesheet of this template (for using specific theme color in individual elements - must included last) -->
    <link rel="stylesheet" href="<?=base_url('assets/');?>css/themes.css">
    <!-- END Stylesheets -->
    <!-- Modernizr (browser feature detection library) -->
    <script src="<?=base_url('assets/');?>js/vendor/modernizr-3.3.1.min.js"></script>
</head>
<body>
    <!-- Page Wrapper -->
    <!-- In the PHP version you can set the following options from inc/config file -->
        <!--
            Available classes:

            'page-loading'      enables page preloader
        -->
        <div id="page-wrapper" class="page-loading">
            <div class="preloader">
                <div class="inner">
                    <!-- Animation spinner for all modern browsers -->
                    <div class="preloader-spinner themed-background hidden-lt-ie10"></div>

                    <!-- Text for IE9 -->
                    <h3 class="text-primary visible-lt-ie10"><strong>Loading..</strong></h3>
                </div>
            </div>
            <div id="page-container" class="header-fixed-top sidebar-visible-lg-full">
                
                <div id="sidebar">
                    <!-- Sidebar Brand -->
                    <div id="sidebar-brand" class="themed-background">
                        <a href="../pilihan.php" class="sidebar-title">
                            <i class="fa fa-cube"></i> <span class="sidebar-nav-mini-hide"><strong>SIWADES</strong></span>
                        </a>
                    </div>
                    <!-- END Sidebar Brand -->

                    <!-- Wrapper for scrolling functionality -->
                    <div id="sidebar-scroll">
                        <!-- Sidebar Content -->
                        <div class="sidebar-content">
                            <!-- Sidebar Navigation -->
                            <ul class="sidebar-nav">
                                <li >
                                    <a href="<?=base_url('Penduduk/'); ?>" class="<?= $active == "dashboard" ? "active" : ""; ?>">
                                        <i class="fa fa-cubes sidebar-nav-icon"></i> Dashboard
                                    </a>
                                </li>
                                <li class="sidebar-separator">
                                    <i class="fa fa-ellipsis-h"></i>
                                </li>
                                 <li >
                                    <a href="<?=base_url('Penduduk/detailKk/'.$kk['no_kk'].''); ?>" class="<?= $active == "kartukeluarga" ? "active" : ""; ?>">
                                        <i class="fa fa-cubes sidebar-nav-icon"></i> Kartu Keluarga
                                    </a>
                                </li>

                                <li class="sidebar-separator">
                                    <i class="fa fa-ellipsis-h"></i>
                                </li>

                                <li>
                                    <a href="<?=base_url('Home/chat'); ?>" class="<?= $active == "chat" ? "active" : ""; ?>"><i class="fa fa-share-alt sidebar-nav-icon">
                                    </i><span class="sidebar-nav-mini-hide">Chatting an</span>
                                </a>
                                </li>

                        </ul>
                        <!-- END Sidebar Navigation -->

                        <!-- Color Themes -->
                        <!-- Preview a theme on a page functionality can be found in assets/js/app.js - colorThemePreview() -->
                        <!-- END Color Themes -->
                    </div>
                    <!-- END Sidebar Content -->
                </div>
                <!-- END Wrapper for scrolling functionality -->

                <!-- Sidebar Extra Info -->
                <div id="sidebar-extra-info" class="sidebar-content sidebar-nav-mini-hide">
                    <div class="text-center">
                        <small><span>2020</span> &copy; <a href="">Mufti</a></small>
                    </div>
                </div>
                <!-- END Sidebar Extra Info -->
            </div>