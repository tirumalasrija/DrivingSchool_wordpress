<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Home</title> 
        <link href="<?php echo get_template_directory_uri(); ?>/css/bootstrap.css" rel="stylesheet">
        <link href="<?php echo get_template_directory_uri(); ?>/css/theme.css" rel="stylesheet">
        <script src="<?php echo get_template_directory_uri(); ?>/js/jquery.js"></script>
        <script src="<?php echo get_template_directory_uri(); ?>/js/jquery-migrate-1.2.1.min.js"></script>
        <script src="<?php echo get_template_directory_uri(); ?>/js/jquery.mobile.customized.min.js"></script>
        <script src="<?php echo get_template_directory_uri(); ?>/js/jquery.rd-navbar.js"></script> 
        <script src='<?php echo get_template_directory_uri(); ?>/js/device.min.js'></script>
    </head>
    <body>
        <div class="page text-center">

            <header>
                <section class="well-sm">
                    <div class="container">
                        <ul class="inline-list pull-xs-right">
                            <li><a href="#" class="icon icon-default icon-sm fa-phone"> +313-846-0066</a></li>
                            <li><a href="<?php echo  get_field('gmail_link'); ?>"  target="_blank" class="icon icon-default icon-sm fa-envelope"></a></li>
                            <li><a href="<?php echo  get_field('facebook_link'); ?>" target="_blank" class="icon icon-default icon-sm fa-facebook"></a></li>
                            <li><a href="<?php echo  get_field('twitter_link'); ?>" target="_blank" class="icon icon-default icon-sm fa-twitter"></a></li>
                        </ul>
                    </div>
                </section>

                <div id="stuck_container" class="stuck_container">
                    <nav class="navbar navbar-default navbar-static-top">
                        <div class="left-part well-xs">
                            <div class="navbar-header">
                                <h1 class="navbar-brand">
                                    <a href="<?php echo home_url(); ?>" >
                                        UNITED
                                        <small>DRIVING SCHOOL</small>
                                    </a>
                                </h1>
                            </div>
                        </div>
                        <div class="right-part">

                            <?php if (has_nav_menu('primary')) : ?>
                                <?php
                                $args = array(
                                    'menu_class' => 'navbar-nav sf-menu',
                                    'menu' => 'primary'
                                );
                                wp_nav_menu($args);
                                ?>
                            <?php endif; ?>




                            <!--						<ul class="navbar-nav sf-menu" data-type="navbar">
                                                                                    
                                                                                    </ul>-->
                        </div>

                </div>

            </header>


