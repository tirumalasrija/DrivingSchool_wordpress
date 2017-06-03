<?php

/* Template Name: ittesting
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
 
<section class="well-5">
<div class="container">
<div class="row flow-offset-1">
<div class="col-md-12 col-sm-12">
<h3>IT Testing center prometric</h3>
<ul class="marked-list text-left">
<li>Our vehicles also have a second brake system which puts the instructor in control just in case our students make a mistake. </li>
<li>Our instructors are certified, licensed, and fully accredited to meet the demands of the state of Michigan.</li>
<li>Instructors go through a rigorous background and driving record check.</li>
<li> Our goal is to provide the excellent service and total student satisfaction.</li>
</ul>

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
