<?php
/*
Template Name: Downlines
*/
?>
<?php global $current_user; $cid = $current_user->ID;?>
<?php do_action('purchased_save',$cid);?>
<?php get_header('frontpage');  ?>			
			<div id="content" class="clearfix row-fluid">			
				<div id="main" class="span12 clearfix bg-trans" role="main">
					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>					
					<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">						
						<header>
							
							<div class="page-header">                            
                            <h2 class="page-title">
                            <img src="<?php echo get_template_directory_uri().'';?>/library/img/cart-purple.png" width="32" style="maring-bottom:10px"/>
                            <?php the_title(); ?></h2>
                            </div>
						
						</header> <!-- end article header -->
					
						<section id="catalogue" class="post_content">
                        <div class="row-fluid">
                        
                            <?php get_template_part('block','userinfo');?>                            
                            </div>
                            <?php get_template_part('loop','downlines');?>
                            <?php the_content();?>
                            
                            <section id="shipping-info">
                                <div class="block bg-trans-50 border-light">
                                    <div class="content-header">
                                        <h4 class="page-title">Downlines &amp; Multi Level Marketing</h4>
                                    </div>  
                                    <div class="content text-size-">
                                    <p>A downline is, in reality, a sales organization made up of independent distributors. It is not owned by key distributors, nor is it owned by an the company.<!--
                                    <p>Multilevel marketing is a form of one-on-one direct selling by which companies contract with independent distributors to market products and compensate those distributors through sales commissions on sale of product produced by their sales organization, as well as offering distributors the opportunity to profit through the differential between wholesale and retail price. </p>-->
                                    For more info, feel free to contact our concierge via phone (+607.237.9657) or by e-mail via our <a href="/hubungi-kami/">contact form</a>.</p>
                                    </div>
                                </div>
                            </section>
                            </form><!-- end.form -->
                        </div>
					
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