<?php
/* Template Name: About Us
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
<title>Our Goal</title>
<link href="<?php echo get_template_directory_uri(); ?>/css/bootstrap.css" rel="stylesheet">
<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/jquery-migrate-1.2.1.min.js"></script>
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


</div>
</nav>
</div>
</header>
<main class="text-center">
<section class="well-5">
<div class="container">
<div class="row flow-offset-1 text-md-left">
<div class="col-md-4  text-sm-left">
<h4>Teen &amp; Adult Driver Education</h4>
<ul class="marked-list text-left">
			 <?php 
    query_posts(array( 
        'post_type' => 'education',
        'showposts' => -1 
    ) );  
?>
<?php while (have_posts()) : the_post(); ?>
<li><?php the_content(); ?>
</li>
<?php endwhile; ?>
</ul>
<p class="small">For more information please feel free to navigate our site. For Segment 1-2, road training and road testing, click on the <a style="color:red;" href="<?php echo get_permalink(get_page_by_path('Drivers Training')); ?>">Driver’s training</a> link above. For information regarding our testing center.
</p>
<a href="<?php echo get_permalink(get_page_by_path('Contact Us')); ?>" class="btn btn-lg btn-primary">contact</a>
</div>
<div class="col-md-1 col-sm-6">

</div>
<div class="col-md-7 col-sm-12">
<h3>Our Goal</h3>

<ul class="marked-list text-left">
		 <?php 
    query_posts(array( 
        'post_type' => 'ourgoal',
        'showposts' => -1 
    ) );  
?>
<?php while (have_posts()) : the_post(); ?>
<li><?php the_content(); ?>
</li>
<?php endwhile; ?>
</ul>
</div>
</div>
</div>
</section>
</main>
							<?php get_footer(); ?>