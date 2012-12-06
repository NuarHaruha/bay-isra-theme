<?php
/*
Template Name: Checkout Summary
*/
?>

<?php get_header('frontpage');?>
<?php global $current_user; $cid = $current_user->ID;?>
			
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
                            <?php get_template_part('block','stokisinfo');?>
                            <?php get_template_part('block','invoicesummary');?>
                            <?php the_content();?>      
                            <section id="purchase-navigation">
                                <div class="block bg-trans">
                                    <div class="content clearfix">
                                        <p class="btn-group pull-right">
                                            <a href="/" class="btn btn-small btn-inverse"><i class="icon-home"></i> Home</a>
                                            <a href="/purchase/invoices/" class="btn btn-small btn-inverse">Purchase History</a>                                            
                                            <a href="/purchase/product/" class="btn btn-small btn-inverse">New Purchase</a>
                                        </p>                                    
                                    </div>
                                </div>
                            </section>                      
                            <section id="purchase-history-notice">
                                <div class="block bg-trans-50 border-light">
                                    <div class="content-header">
                                        <h4 class="page-title">Thank You!</h4>
                                    </div>  
                                    <div class="content text-size-">
                                    <p>For more details info of your purchase history please contact our concierge via phone (+607.237.9657) or by e-mail via our <a href="/hubungi-kami/">contact form</a>.</p>
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