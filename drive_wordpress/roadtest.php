<?php

/* Template Name: RoadTest
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

get_header();
?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1"> 
<meta name="format-detection" content="telephone=no"/>
<title>Road Test</title>
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

<div class="col-md-12 col-sm-12">
<h4>Provide road test help in our car</h4>
<p class="small">At United Driving School Michigan, we have the services you need and trust. We provide a fully licensed driving school as well as a fully functional testing center. Our driving school curriculum provides you with the all of the requirements you need to get you on the road legally and safely.</p>
<p>In most states, successfully passing an United Driving School Michigan Road Test is all you need to qualify to receive an automobile or motorcycle driver’s license. Other states require you to take a road test administered by the licensing authority. To get ready for state licensing, take advantage of our comprehensive pre-test behind the wheel exercise. Contact All Star for either road test today.</p>


</div>
</section>

  
<section class="well-9 parallax" data-url="images/parallax01.jpg" data-mobile="true" data-speed="1">
<div class="container">
<h3 class="text-md-left">Road Test Training</h3>
<div class="row flow-offset-2 offset-6">
<div class="col-sm-3">
<div class="thumbnail-3">
<img src="images/page-3_img02.jpg" alt="">
<div class="caption text-md-left">
<h6>Regulatory Signs</h6>
</div>
</div>
</div>
<div class="col-sm-3">
<div class="thumbnail-3">
<img src="images/page-3_img03.jpg" alt="">
<div class="caption text-md-left">
<h6>Warning Signs</h6>
</div>
</div>
</div>
<div class="col-sm-3">
<div class="thumbnail-3">
<img src="images/page-3_img04.jpg" alt="">
<div class="caption text-md-left">
<h6>Street Signs</h6>
</div>
</div>
</div>
<div class="col-sm-3">
<div class="thumbnail-3">
<img src="images/page-3_img05.jpg" alt="">
<div class="caption text-md-left">
<h6>Custom Traffic Signs</h6>
</div>
</div>
</div>
<div class="col-sm-3 col-sm-clear">
<div class="thumbnail-3">
<img src="images/page-3_img06.jpg" alt="">
<div class="caption text-md-left">
<h6>Mounting Hardware</h6>
</div>
</div>
</div>
<div class="col-sm-3">
<div class="thumbnail-3">
<img src="images/page-3_img07.jpg" alt="">
<div class="caption text-md-left">
<h6>Reflective Traffic signs</h6>
</div>
</div>
</div>
<div class="col-sm-3">
<div class="thumbnail-3">
<img src="images/page-3_img08.jpg" alt="">
<div class="caption text-md-left">
<h6>Stop Signs</h6>
</div>
</div>
</div>
<div class="col-sm-3">
<div class="thumbnail-3">
<img src="images/page-3_img09.jpg" alt="">
<div class="caption text-md-left">
<h6>Speed Limit Signs</h6>
</div>
</div>
</div>
<div class="col-sm-3 col-sm-clear">
<div class="thumbnail-3">
<img src="images/page-3_img10.jpg" alt="">
<div class="caption text-md-left">
<h6>Parking Signs</h6>
</div>
</div>
</div>
<div class="col-sm-3">
<div class="thumbnail-3">
<img src="images/page-3_img11.jpg" alt="">
<div class="caption text-md-left">
<h6>Construction Signs</h6>
</div>
</div>
</div>
<div class="col-sm-3">
<div class="thumbnail-3">
<img src="images/page-3_img12.jpg" alt="">
<div class="caption text-md-left">
<h6>School Signs</h6>
</div>
</div>
</div>
<div class="col-sm-3">
<div class="thumbnail-3">
<img src="images/page-3_img13.jpg" alt="">
<div class="caption text-md-left">
<h6>Custom Parking Signs</h6>
</div>
</div>
</div>
<div class="col-sm-3 col-sm-clear">
<div class="thumbnail-3">
<img src="images/page-3_img14.jpg" alt="">
<div class="caption text-md-left">
<h6>Roadwork Signs</h6>
</div>
</div>
</div>
<div class="col-sm-3">
<div class="thumbnail-3">
<img src="images/page-3_img15.jpg" alt="">
<div class="caption text-md-left">
<h6>Handicapped Signs</h6>
</div>
</div>
</div>
<div class="col-sm-3">
<div class="thumbnail-3">
<img src="images/page-3_img16.jpg" alt="">
<div class="caption text-md-left">
<h6>Yield Signs</h6>
</div>
</div>
</div>
<div class="col-sm-3">
<div class="thumbnail-3">
<img src="images/page-3_img17.jpg" alt="">
<div class="caption text-md-left">
<h6>Metal Traffic Signs</h6>
</div>
</div>
</div>
</div>
</div>
</section>
</main>
	
 <div id="alertModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm">
        <div class="modal-content">
        	<div class="modal-body">
        		<h6 class="text-center">Thank you!</h6>
        		<p class="text-center">Thanks for your interest, we will be getting in touch shortly</p>
        		<br/>
        		<button id="send" class="bt btn btn-primary btn-lg center-block" data-dismiss="modal" aria-hidden="true">OK</button>
        	</div>
        </div>
        </div>
    </div>

<?php get_footer(); ?>
