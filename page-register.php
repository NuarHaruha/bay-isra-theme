<?php
/*
Template Name: Register New
*/
?>
<?php do_action('mc_register_user',$_REQUEST)?>
<?php get_header('frontpage'); ?>

<div id="content" class="clearfix row-fluid" xmlns="http://www.w3.org/1999/html">
			
				<div id="main" class="span12 clearfix bg-trans" role="main">

					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					
					<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">
						
						<header>
							
							<div class="page-header row-fluid">
                                <div class="span4">
                                    <h2 class="page-title">
                                    <img src="<?php echo get_template_directory_uri().'';?>/library/img/man-purple.png" width="32" style="maring-bottom:10px"/>
                                    Registration</h2>
                                </div>                            
                                <div class="span8">
                                    <section id="progress-indicator" class="span12 pull-right">
                                        <div id="progress-daftar" class="progress hide">
                                          <div id="progress-ticker" class="bar bar-success progress-striped" style="width:10%" data-percentage="10">10% complete</div>
                                          <div id="progress-ticker-" class="bar bar" style="width:90%" data-percentage="90"></div>
                                        </div> 
                                    </section>
                                </div>

                            </div>
						
						</header> <!-- end article header -->
					
						<section class="post_content">
							<?php the_content(); ?>

                            <?php if (stockist_can_register()): ?>
                            <?php get_template_part('form','register'); ?>
                            <?php else: ?>
                                <div class="bg-trans block">
                                    <h4>Notice</h4>
                                    <p>
                                        We are very sorry, you don't have a "Starter Kit" to register a new members.
                                    </p>
                                    <p>
                                        <a href="/purchase/product/" class="btn btn-small btn-secondary" title="Purchase Starter Kit">Purchase Starter Kit</a>
                                    </p>

                                </div>
                            <?php endif;?>

					
						</section> <!-- end article section -->
						
						<footer>
			
							<p class="clearfix"><?php the_tags('<span class="tags">' . __("Tags","bonestheme") . ': ', ', ', '</span>'); ?></p>
							
						</footer> <!-- end article footer -->
					
					</article> <!-- end article -->
					
					<?php //comments_template(); ?>
					
					<?php endwhile; ?>	
					
					<?php else : ?>
					
					<article id="post-not-found">
					    <header>
					    	<h1><?php _e("Not Found", "bonestheme"); ?></h1>
					    </header>
					    <section class="post_content">
					    	<p><?php _e("Sorry, but the requested resource was not found on this site.", "bonestheme"); ?></p>
					    </section>
					    <footer>
					    </footer>
					</article>
					
					<?php endif; ?>
			
				</div> <!-- end #main -->
    
				<?php //get_sidebar(); // sidebar 1 ?>
    
			</div> <!-- end #content -->

<?php get_footer('frontpage'); ?>