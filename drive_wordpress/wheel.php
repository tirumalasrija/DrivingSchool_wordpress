<?php

/* Template Name: wheel
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
<title>Contact</title>
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
 
<section class="well-8">
<div class="container relative text-left">
<div class="row flow-offset-1">
<div class="col-md-12">
<img src="<?php echo get_template_directory_uri(); ?>/images/img2.jpg" alt=""/>
</div>
<div class="col-md-10 col-md-offset-1 content-aside-bottom bg-image bg-image-2">
<h5>Adult Behind-the-Wheel Training</h5>
<p>We offer municipal grade, professional traffic signs that do not rust and can easily withstand harsh weather conditions for many years. We do accept government purchase orders. No order is too big or small.</br>we've been teaching people to drive for 25 years and have taught over 4.1 million people how to drive. Our driving school is the only one in the country that is both approved by the Road Safety Educators' Association and accredited by the Driving School Association of the Americas.

Our professional, patient driving instructors offer driving lessons for teens, adults, and mature drivers in California, Georgia, and Texas.

Our drivers training covers everything you need to know to ace the driving test and become a safe, confident driver. Start your behind-the-wheel training United Driving School</p>
<h5>Same day Adult Behind-the-Wheel Training</h5>
<p>We proudly serve the traffic sign needs of states, counties, cities, towns, villages, road districts, businesses, shopping centers, construction companies, hospitals, schools, mobile home parks, golf courses, airports, homeowner associations.</p>
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
