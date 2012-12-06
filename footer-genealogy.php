			<footer role="contentinfo">
			
				<div id="inner-footer" class="clearfix">
		          <hr />
		          <div id="widget-footer" class="clearfix row-fluid">
		            <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer1') ) : ?>
		            <?php endif; ?>
		            <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer2') ) : ?>
		            <?php endif; ?>
		            <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer3') ) : ?>
		            <?php endif; ?>
		          </div>
					
					<nav class="clearfix">
						
					</nav>
					
					<p class="pull-right">Developed by <a href="http://mdag.my" id="credit" title="MDAG Consultancy">MDAG Consultancy</a></p>
			
					<p class="attribution">&copy; 2012, Hakcipta Terpelihara.  <?php bloginfo('name'); ?>, D Baydura Sdn. Bhd</p>
				
				</div> <!-- end #inner-footer -->
				
			</footer> <!-- end footer -->
		
		</div> <!-- end #container -->
				
		<!--[if lt IE 7 ]>
  			<script src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.3/CFInstall.min.js"></script>
  			<script>window.attachEvent('onload',function(){CFInstall.check({mode:'overlay'})})</script>
		<![endif]-->
		
		<?php wp_footer(); // js scripts are inserted using this function ?>
        <script>
        $(document).ready(function(){
           init(); 
        });
        </script>
        </div>
    </section>
	</body>

</html>