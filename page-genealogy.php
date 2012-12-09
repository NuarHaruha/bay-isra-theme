<?php
/*
Template Name: Genealogy Maps
*/
?>
<?php global $current_user, $cid;  get_currentuserinfo();?>
<?php mc_get_header('genealogy'); ?>
			<div id="content" class="clearfix row-fluid">

				<div id="main" class="span12 clearfix" role="main">
					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">
						<header>
							<div class="page-header">
                                <h1 class="page-title">
                                    Downlines Genealogy Maps
                                    <?php //the_title(); ?>
                                </h1>
                            </div>
						</header> <!-- end article header -->
						<section class="post_content">
                            <div class="genealogy-content">
                                <div id="infovis"></div>
                                <form name="dtree" method="post">
                                    <?php wp_nonce_field( TRTYPE::NONCE ); ?>
                                    <input type="hidden" id="uid" name="uid" value="<?php echo $current_user->ID; ?>">
                                </form>
							    <?php the_content(); ?>
                            </div>
                            <div id="log"></div>
						</section> <!-- end article section -->
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
				<?php //get_sidebar('genealogy'); // sidebar 1 ?>
			</div> <!-- end #content -->
<section id="genealogy-info" class="clear">
    <div id="sidebar1" class="fluid-sidebar sidebar" role="complementary">
        <div class="page-header">
            <h1 class="page-title">Summary</h1>
        </div>
        <div id="inner-details"></div>
    </div>
</section>
<?php mc_get_footer('genealogy'); ?>