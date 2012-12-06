<?php
/*
Template Name: Product
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
                        
                            <form id="purchase_form" action="" method="post" class="form-horizontal">
                                <input type="hidden" name="action" value="save" />
                            <?php get_template_part('block','userinfo');?>
                            <?php get_template_part('block','stokisinfo');?>
                            <?php  get_template_part('loop','products');?>
                            <?php  get_template_part('block','deliveryinfo');?>
                            <?php the_content();?>
                            
                            <section id="submit-purchase-button">
                                <div class="block bg-trans clearfix">
                                <p class="pull-right">
                                    <input type="reset" class="btn" value="Reset">
                                    <button type="submit" class="btn btn-success">Continue</button>
                                </p>                                
                                </div>
                            </section>
                            <section id="shipping-info">
                                <div class="block bg-trans-50 border-light">
                                    <div class="content-header">
                                        <h4 class="page-title">Placing Order</h4>
                                    </div>  
                                    <div class="content text-size-">
                                    <p>Simply add your desired items to the shopping cart and proceed with our secure checkout system <!-- using your ATM Card (or ATM Debit Card) Visa, MasterCard, Discover or American Express card-->. Payment information is transmitted via SSL encryption technology and you may complete the entire ordering process through our website.
If you need any assistance with the ordering process, feel free to contact our concierge via phone (+607.237.9657) or by e-mail via our <a href="/hubungi-kami/">contact form</a>.</p>
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