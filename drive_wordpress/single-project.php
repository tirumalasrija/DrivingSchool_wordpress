<?php
/**
 * The Template for displaying all single posts
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query. 
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 */
get_header();
?>
<?php
//global $post;
$image1 = '';
$image1[] = get_field('project_image1');
$image1[] = get_field('project_image2');
$image1[] = get_field('project_image3');
$image1[] = get_field('project_image4');
$image1[] = get_field('project_image5');
$image1[] = get_field('project_image6');
$image1[] = get_field('project_image7');
$image1[] = get_field('project_image8');
$image1[] = get_field('project_image9');
$image1[] = get_field('project_image10');
$image1[] = get_field('project_image11');
$image1[] = get_field('project_image12');
$image1[] = get_field('project_image13');
$image1[] = get_field('project_image14');
$image1[] = get_field('project_image15');
$image1[] = get_field('project_image16');
$categories = get_the_category();
 
?>
<div class="page">
    <section class="container-fluid work-bg">
        <div class="innerpage-container">
            <div class="col-md-4">				
                <div class="page-side">
                    <div class="vcenter-wrapper">
                        <div class="vcenter">
                            <div class="title">
                                <span><?php the_title(); ?></span>
                            </div>
                            <div class="rTable">
                                <div class="table-row">
                                    <div class="rTableCell-lft"><span class="colored">Project Title:</span></div>
                                    <div class="rTableCell-rght"><?php the_title(); ?></div>
                                </div>
                                <div class="table-row">
                                    <div class="rTableCell-lft"><span class="colored">Category:</span></div>
                                    <div class="rTableCell-rght"><?php echo custom_taxonomies_terms_links(); ?></div>
                                </div>
                                <!-- <div class="table-row">
                                        <div class="rTableCell-lft"><span class="colored">Date:</span></div>
                                        <div class="rTableCell-rght">10.5.2016</div>
                                </div> -->
                                <div class="table-row">
                                    <div class="rTableCell-lft"><span class="colored">Description:</span></div>
                                    <div class="rTableCell-rght"><?php echo $post->post_content; ?></div>
                                </div>
                            </div>
                            <div class="clear">&nbsp;</div>
                            <div class="row">
                                <!-- <div class="col-md-12 col-sm-6">
                                        <div class="supervisor">
                                                <div class="sv-avatar">
                                                        <img alt="staff image" src="assets/img/testmonials/01.jpg">
                                                </div>
                                                <div class="sv-detail">
                                                        <h3 class="sv-name">Mary Brandon</h3>
                                                        <span>Supervisor</span>
                                                </div>
                                        </div>
                                </div>
                                <div class="col-md-12 col-sm-6">
                                        <div class="supervisor">
                                                <div class="sv-avatar">
                                                        <img alt="staff image" src="assets/img/testmonials/02.jpg">
                                                </div>
                                                <div class="sv-detail">
                                                        <h3 class="sv-name">Bob Marlyn</h3>
                                                        <span>Assistant</span>
                                                </div>
                                        </div>
                                </div>
                                <div class="col-md-12 col-sm-6">
                                        <div class="supervisor">
                                                <div class="sv-avatar">
                                                        <img alt="staff image" src="assets/img/testmonials/01.jpg">
                                                </div>
                                                <div class="sv-detail">
                                                        <h3 class="sv-name">Mary Brandon</h3>
                                                        <span>Supervisor</span>
                                                </div>
                                        </div>
                                </div> -->
                                 <div class="col-md-12 text-center">
                                <?php
$next_post = get_previous_post();
if (!empty( $next_post )): ?>
  <a href="<?php echo get_permalink( $next_post->ID ); ?>" data-toggle="tooltip" class="portfolio-prev" title="Previous"> <i class="fa fa-angle-left"></i></a>
<?php endif; ?>
                              
                                </div>
                                  <div class="col-md-12 text-center">
                                <?php
$next_post = get_next_post();
if (!empty( $next_post )): ?>
  <a href="<?php echo get_permalink( $next_post->ID ); ?>" data-toggle="tooltip" class="portfolio-prev" title="Next"> <i class="fa fa-angle-right"></i></a>
<?php endif; ?>
                              
                                </div>
                                 
                                <div class="col-md-12 text-center">
                                    <a href="<?php echo get_permalink( get_page_by_path( 'Projects' ) ) ?>" data-toggle="tooltip" class="portfolio-prev" title="Back">
                                        Back
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>			
            <div class="col-md-8 pad-0-l-r">
                <div class="row">
                    <?php for ($x = 0; $x <= 16; $x++) { ?>
                    <?php if(!empty($image1[$x])&&$image1[$x]!=false) { ?>
                        <div class="col-md-12">
                            <img src="<?php echo $image1[$x]; ?>">
                        </div>
                    <?php } ?>
                    <?php }
                    ?>



                   
                </div>
            </div>
        </div>
    </section>
</div>

<?php get_footer(); ?>