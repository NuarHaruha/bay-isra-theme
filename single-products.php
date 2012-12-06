<?php get_header('frontpage'); ?>  
    <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>  
        <?php  
            //get post thumbnail url  
            $post_thumbnail_id = get_post_thumbnail_id();  
            $post_thumbnail_url = wp_get_attachment_url($post_thumbnail_id);  
        ?>  
			
<div id="content" class="clearfix row-fluid">			
<div id="main" class="span12 clearfix bg-trans" role="main">        
        <section id="theproduct">
                <article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">
				<header>
                    <div class="page-header">
                    <h2 class="page-title"><?php the_title(); ?></h1>  
                    </div>
                </header>
                
        
        
            <div class="row-fluid">
                
                <div class="span4">
                <img id="product-img" src="<?php echo get_template_directory_uri(); ?>/public/tb.php?src=<?php if(!empty($post_thumbnail_url)){ echo $post_thumbnail_url; } else {  echo get_template_directory_uri()."/library/img/cart-purple.png"; } ?>&h=300&w=300" alt="<?php the_title(); ?>" />
                </div>  
                <div id="product-desc" class="span8">                      
                    <div id="the-content">
                <?php the_content(); ?>  
                <dl>
                <?php if( get_post_meta($post->ID, 'price', true)): ?>  
                    <dd>Harga (RM): <?php echo get_post_meta($post->ID, 'price', true); ?></dd>
                <?php endif; ?>
                <?php if( get_post_meta($post->ID, 'retail_price', true)): ?>  
                    <dd>Harga Runcit (RM): <?php echo get_post_meta($post->ID, 'retail_price', true); ?></dd>
                <?php endif; ?>                
                </dl>
                    </div>  
                <div>
            
            </div>
            </article>
        </section>  
</div>
</div>        
        <div class="cb"></div>
    <?php endwhile; ?>  
<?php get_footer('frontpage'); ?> 