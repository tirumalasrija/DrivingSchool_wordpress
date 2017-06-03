<?php

/* Template Name: DriveTraining
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
 ?>
 <!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="format-detection" content="telephone=no"/>
<title>Drivers Training</title> 
<link href="<?php echo get_template_directory_uri(); ?>/css/bootstrap.css" rel="stylesheet"> 
<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/jquery-migrate-1.2.1.min.js"></script>
<!--[if lt IE 9]>
    <div style=' clear: both; text-align:center; position: relative;'>
        <a href="https://windows.microsoft.com/en-US/internet-explorer/..">
            <img src="images/ie8-panel/warning_bar_0000_us.jpg" border="0" height="42" width="820"
                 alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today."/>
        </a>
    </div>
    <script src="js/html5shiv.js"></script>
    <![endif]-->
<script src='<?php echo get_template_directory_uri(); ?>/js/device.min.js'></script>
</head>
<body>
<div class="page text-center">
<header class="mod-1 bg-info">
<section class="well-sm">
<div class="container">
<ul class="inline-list pull-xs-right">
<li><a href="#" class="icon icon-default icon-sm fa-phone"> +313-846-0066</a></li>
<li><a href="#" class="icon icon-default icon-sm fa-envelope"></a></li>
<li><a href="#" class="icon icon-default icon-sm fa-facebook"></a></li>
<li><a href="#" class="icon icon-default icon-sm fa-twitter"></a></li>
</ul>
</div>
</section>
 
<div id="stuck_container" class="stuck_container">
<nav class="navbar navbar-default navbar-static-top">
<div class="left-part well-xs">
<div class="navbar-header">
<h1 class="navbar-brand">
<a href="<?php echo  home_url();?>" >
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
</div>
</nav>
</div>
 
</header>
 
 
<main class="text-center">
 
<section class="well-10">
<div class="container text-md-left">
<h3>Drivers Training</h3>
<h6>
<small>
<?php  global  $post; ?>
<?php  echo $post->post_content; ?>
</small>
</h6>
<div class="row offset-7 flow-offset-2">
<div class="col-md-6">
<div class="bg-image bg-image-1 inset-1 well-11">
<h3>Segment-1</h3>
<p class="small offset-8 text-white"><?php echo  get_field('segment1'); ?></p>
<h6>Requirements/Privileges</h6>
<ul class="marked-list text-left prefix-1">
	 <?php 
    query_posts(array( 
        'post_type' => 'firstsigment',
        'showposts' => -1 
    ) );  
?>
<?php while (have_posts()) : the_post(); ?>
<li><?php the_content(); ?>
</li>
<?php endwhile; ?>
</ul>
<a href="<?php echo get_permalink(get_page_by_path('Contact Us')); ?>" class="btn-link">contact us</a>


</div>
</div>
<div class="col-md-6">
<div class="bg-image bg-image-1 inset-1 well-12">
<h3>Segment- 2</h3>
<p class="small offset-8 text-white"><?php echo  get_field('segment2'); ?></p>
<h6>Requirements/Privileges</h6>
<ul class="marked-list text-left prefix-1">
	 <?php 
    query_posts(array( 
        'post_type' => 'secondsegment',
        'showposts' => -1 
    ) );  
?>
<?php while (have_posts()) : the_post(); ?>
<li><?php the_content(); ?>
</li>
<?php endwhile; ?>
</ul>
<a href="<?php echo get_permalink(get_page_by_path('Contact Us')); ?>" class="btn-link">contact us</a>
</div>
</div>



</div>
</div>
</section>
 
</main>
 
<?php get_footer(); ?>