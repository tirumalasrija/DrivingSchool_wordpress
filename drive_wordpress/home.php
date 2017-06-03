<?php

/* Template Name: home
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>


<?php get_header(); ?>

			<div class="camera_container">
				<div id="camera" class="camera_wrap">
				 <?php 
    query_posts(array( 
        'post_type' => 'slide',
        'showposts' => -1 
    ) );  
?>
<?php while (have_posts()) : the_post(); ?>
					<div data-src="<?php the_post_thumbnail_url( 'full' );  ?>">
						<!--<div class="camera_caption fadeIn">
							<div class="container">
								<h2 class="text-primary text-uppercase">we have the services </h2>
								<p class="h2">
									<small> you need and trust</small>
								</p>
							</div>
						</div>-->
					</div>
			
				<?php endwhile;   ?>	
				</div>
			</div>


			<main>

				<section class="well-1">
					<div class="container">
						<div class="row flow-offset-1">
							<div class="col-lg-6 text-lg-left">
								<h1 class="marker">Welcome</h1>
							<?php	$my_postid = 1;//This is page id or post id
$content_post = get_post($my_postid);
$content = $content_post->post_content;
$content = apply_filters('the_content', $content);
$content = str_replace(']]>', ']]&gt;', $content);
echo $content; ?>
								</div>
							<img src="<?php echo get_the_post_thumbnail_url(1); ?>" alt="" class="offset-1">
						</div>
					</div>
				</section>
<?php wp_reset_query(); ?>
				<section class="well-2 parallax">
					<div class="container relative text-md-left">
						<div class="content-aside-right-top bg-image bg-image-1">
							<h3>We provide</h3>
							<ul class="marked-list text-left">
							
								<li><a href="<?php echo get_permalink(get_page_by_path('About Us')); ?>"><?php echo  get_field('home_about_us_title'); ?></a></li>
								<li><a href="<?php echo get_permalink(get_page_by_path('Drivers Training')); ?>"><?php echo  get_field('drive_training'); ?></a></li>
								<li><a href="<?php echo get_permalink(get_page_by_path('Wheel')); ?>"><?php echo  get_field('wheel'); ?></a></li>
								<li><a href="<?php echo get_permalink(get_page_by_path('Wheel')); ?>"><?php echo  get_field('wheel'); ?></a></li>
								<li><a href="<?php echo get_permalink(get_page_by_path('IT Testing')); ?>"><?php echo  get_field('ittesting'); ?></a></li>
								<li><a href="<?php echo get_permalink(get_page_by_path('Road Test')); ?>"><?php echo  get_field('road'); ?></a></li>
								
							</ul>
						</div>
						<img src="<?php echo get_template_directory_uri(); ?>/images/page-1_img02.jpg" alt=""/>
					</div>
					<div class="container relative text-left">
						<div class="row flow-offset-1">
							<div class="col-md-10 col-md-offset-1 content-aside-top bg-image bg-image-2">
								<div class="row flow-offset-1">
									<ul class="index-list col-md-6">
									 <?php 
    query_posts(array( 
        'post_type' => 'sign',
        'showposts' => 3,
		'order' =>'desc' 
    ) );  
?>
<?php while (have_posts()) : the_post(); ?>
										<li>
											<h5><?php the_title(); ?></h5>
											<p class="small"><?php the_content(); ?></p>
											</li>
											<?php endwhile; ?>
												</ul>
												<ul class="index-list index-list--2 col-md-6">
													 <?php 
    query_posts(array( 
        'post_type' => 'sign',
        'showposts' => 3,
		'order' =>'asc' 
    ) );  
?>
<?php while (have_posts()) : the_post(); ?>
													<li>
															<h5><?php the_title(); ?></h5>
											<p class="small"><?php the_content(); ?></p>
													</li>
													<?php endwhile; ?>
														</ul>
													</div>
												</div>
												<div class="col-md-12">
													<img src="<?php echo get_template_directory_uri(); ?>/images/page-1_img03.jpg" alt=""/>
												</div>
											</div>
										</div>
									</section>


									<section class="well-3">
										<div class="container">
											<div class="row flow-offset-1">
												<div class="col-md-4 text-md-left">
													<div class="media">
														<div class="media-left">
															<span class="icon icon-primary icon-lg fa-home"></span>
														</div>
														<div class="media-body offset-2">
															<address>
																<dl>
																	
																	<?php dynamic_sidebar( 'address'); ?>
																			</dl>
															</address>
														</div>
													</div>
												</div>
												<div class="col-md-4 text-md-left">
													<div class="media">
														<div class="media-left">
															<span class="icon icon-primary icon-lg  fa-phone"></span>
														</div>
														<div class="media-body offset-2">
															<address>
																<dl>
																	
																	<?php dynamic_sidebar( 'phone'); ?>
																	
																</dl>
															</address>
														</div>
													</div>
												</div>
												<div class="col-md-4 text-md-left">
													<div class="media">
														<div class="media-left">
															<span class="icon icon-primary icon-md fa-envelope"></span>
														</div>
														<div class="media-body offset-2">
															<address>
																<dl>
																
																	<?php dynamic_sidebar( 'email'); ?>
																	

																</dl>
															</address>
														</div>
													</div>
												</div>
											</div>
										</div>
									</section>



								</main>

<?php get_footer(); ?>