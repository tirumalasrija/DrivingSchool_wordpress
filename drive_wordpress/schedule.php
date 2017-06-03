<?php

/* Template Name: Schedule
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
<title>Schedules</title>
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
 
<div class="container contentbody">
<div> 
<div class="col-lg-3">
   <div class="form-area">  
        <form role="form">
        <br style="clear:both">
                   <h5 style="margin-bottom: 25px; text-align: center;">Contact Form</h5>
    				<div class="form-group">
						<input type="text" class="form-control" id="name" name="name" placeholder="Name" required>
					</div>
					<div class="form-group">
						<input type="text" class="form-control" id="email" name="email" placeholder="Email" required>
					</div>
					<!--<div class="form-group">
						<input type="text" class="form-control" id="mobile" name="mobile" placeholder="Mobile Number" required>
					</div>
					<div class="form-group">
						<input type="text" class="form-control" id="subject" name="subject" placeholder="Subject" required>
					</div>-->
                    <div class="form-group">
                    <textarea class="form-control" type="textarea" id="message" placeholder="Message" maxlength="170" rows="4"></textarea>
                    </div>

                    <button type="button" id="send" data-toggle="modal" data-target="#alertModal" class="btn btn-primary btn-block btn-lg send">Send</button><br/>
        </form>
    </div><br/><br/>
</div>
</div>
<div class="col-lg-9 completesc">
<h4 style="margin-top: 0px;margin-bottom: 20px;padding-left: 10px;color: #09a5df">Complete Schedule</h4><table style="width: 100%;">
<tbody>
<tr style="background:#eee;">
<td colspan="4"><h5 style="margin-top: 10px;color: #09a5df; margin-left: 10px; ">Driving Education and Testing Needs</h5>
</td>
</tr>
<tr style="background: #ddd;">
<td width="19%" class="BodyText"><strong style="margin-left: 10px;">Start Date</strong></td>

<td width="17%" class="BodyText"><strong>Timings</strong></td>
<td width="12%" class="BodyText">
<strong>Duration</strong></td>
</tr>
<?php 
global $post;
    query_posts(array( 
        'post_type' => 'schedule',
        'showposts' => -1 
    ) );  
?>
<?php while (have_posts()) : the_post(); ?>
<tr class="evenodd">
<td>
<div size="2" style="margin-left: 10px;"> <?php echo date("d-m-Y",strtotime(get_field("start_date",$post->ID))); ?></div>
</td>

<td><font size="2"><font color="#000"><?php echo get_field("timing",$post->ID); ?></font></font></td>
<td><font size="2"><font color="#000"><?php echo get_field("duration",$post->ID); ?> Weeks</font></font></td>
</tr>

<?php endwhile; ?>

</tbody>
</table>
</div>
</div>
</div>

 
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