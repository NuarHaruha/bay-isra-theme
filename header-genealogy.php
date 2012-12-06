<!doctype html>  
<!--[if IEMobile 7 ]> <html <?php language_attributes(); ?>class="no-js iem7"> <![endif]-->
<!--[if lt IE 7 ]> <html <?php language_attributes(); ?> class="no-js ie6"> <![endif]-->
<!--[if IE 7 ]>    <html <?php language_attributes(); ?> class="no-js ie7"> <![endif]-->
<!--[if IE 8 ]>    <html <?php language_attributes(); ?> class="no-js ie8"> <![endif]-->
<!--[if (gte IE 9)|(gt IEMobile 7)|!(IEMobile)|!(IE)]><!--><html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->
	
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		
		<title>
			<?php if ( !is_front_page() ) { echo wp_title( ' ', true, 'left' ); echo ' | '; }
			echo bloginfo( 'name' ); echo ' - '; bloginfo( 'description', 'display' );  ?> 
		</title>
				
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		<!-- icons & favicons -->
		<!-- For iPhone 4 -->
		<link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo get_template_directory_uri(); ?>/library/images/icons/h/apple-touch-icon.png">
		<!-- For iPad 1-->
		<link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo get_template_directory_uri(); ?>/library/images/icons/m/apple-touch-icon.png">
		<!-- For iPhone 3G, iPod Touch and Android -->
		<link rel="apple-touch-icon-precomposed" href="<?php echo get_template_directory_uri(); ?>/library/images/icons/l/apple-touch-icon-precomposed.png">
		<!-- For Nokia -->
		<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/library/images/icons/l/apple-touch-icon.png">
		<!-- For everything else -->
		<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/16.png">
				
		<!-- media-queries.js (fallback) -->
		<!--[if lt IE 9]>
			<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>			
		<![endif]-->

		<!-- html5.js -->
		<!--[if lt IE 9]>
			<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		
  		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

		<!-- wordpress head functions -->
		<?php wp_head(); ?>
		<!-- end of wordpress head -->

		<!-- theme options from options panel -->
		<?php get_wpbs_theme_options(); ?>

		<?php 

			// check wp user level
			$current_user = get_currentuserinfo(); 
			// store to use later
			global $user_level; 
		?>
        <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/library/css/genealogy.css">
        <!--[if IE]><script language="javascript" type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/library/js/excanvas.js"></script><![endif]-->
		<script src="<?php echo get_template_directory_uri(); ?>/library/js/jit.js"></script>
        <script>
var labelType, useGradients, nativeTextSupport, animate;

(function() {
  var ua = navigator.userAgent,
      iStuff = ua.match(/iPhone/i) || ua.match(/iPad/i),
      typeOfCanvas = typeof HTMLCanvasElement,
      nativeCanvasSupport = (typeOfCanvas == 'object' || typeOfCanvas == 'function'),
      textSupport = nativeCanvasSupport 
        && (typeof document.createElement('canvas').getContext('2d').fillText == 'function');
  //I'm setting this based on the fact that ExCanvas provides text support for IE
  //and that as of today iPhone/iPad current text support is lame
  labelType = (!nativeCanvasSupport || (textSupport && !iStuff))? 'Native' : 'HTML';
  nativeTextSupport = labelType == 'Native';
  useGradients = nativeCanvasSupport;
  animate = !(iStuff || !nativeCanvasSupport);
})();

var Log = {
  elem: false,
  write: function(text){
    if (!this.elem) 
      this.elem = document.getElementById('log');
    this.elem.innerHTML = text;
    this.elem.style.left = (500 - this.elem.offsetWidth / 2) + 'px';
  }
};


function init(){
    //init data
    var json = {
<?php
    $current_user = $GLOBALS['current_user']; 
    $parent_id = $current_user->ID;
    //var_dump($current_user);
    //$parent_id = 3;
    
?>        
        "id": "<?php echo mdag_get_id_ahli($parent_id);?>",
        "name": "<?php echo mdag_get_full_name($parent_id);?> (<?php echo mdag_get_id_ahli($parent_id);?>)",
        "children": [<?php
        $downlines = mdag_find_downline(1,$parent_id);
        $cnt = count($downlines);
        
        $last = $cnt+1;
        
        if ($cnt >= 0){
            for ($i=0;$i<$cnt; $i++){
                $d_id = $downlines[$i]['downline_id'];
                
                $acc_id = mdag_get_id_ahli($d_id);
                $acc_name = mdag_get_full_name($d_id);
                
                echo '{';
                echo '"id": "'.$acc_id.'",';
                echo '"name": "'.$acc_name.'  ('.$acc_id.')",';                            
                
                echo '"data":{"relation":"Downline LV1","band":"'.mdag_get_id_ahli($parent_id).'"},';

                if (has_downline($acc_id)){
                    echo "\t\t\n".'"children":['."\n";
                    $lv_2 = mdag_find_downline(1,$d_id);
                        $cnt_lv2 = count($lv_2);
                        
                        for ($xi=0;$xi<$cnt_lv2; $xi++){
                            
                            $lv2_d_id = $lv_2[$xi]['downline_id'];
                            
                            $lv2_acc_id = mdag_get_id_ahli($lv2_d_id);
                            $lv2_acc_name = mdag_get_full_name($lv2_d_id);
                                            
                            echo '{';
                            echo '"id": "'.$lv2_acc_id.'",';
                            echo '"name": "'.$lv2_acc_name.'  ('.mdag_get_id_ahli($lv2_d_id).')",';
                            echo '"data":{"relation":"Downline LV2","band":"'.$acc_id.'"}';
                            echo '}';
                            if ($xi != $cnt_lv2+1) echo ','."\n";                            
                        }
                        
                    echo '],'."\n";
                }
                
                echo '}';
                
                

                if ($i != $last) echo ','."\n";
            }
        }
    
        ?>
        ],
        "data": []
    };
 
    //end
    var infovis = document.getElementById('infovis');
    var w = infovis.offsetWidth - 50, h = infovis.offsetHeight - 50;
    
    //init Hypertree
    var ht = new $jit.Hypertree({
      //id of the visualization container
      injectInto: 'infovis',
      //canvas width and height
      width: w,
      height: h,
      //Change node and edge styles such as
      //color, width and dimensions.
      Node: {
          dim: 9,
          color: "#f00"
      },
      Edge: {
          lineWidth: 2,
          color: "#088"
      },
      onBeforeCompute: function(node){
          Log.write("centering");
      },
      //Attach event handlers and add text to the
      //labels. This method is only triggered on label
      //creation
      onCreateLabel: function(domElement, node){
          domElement.innerHTML = node.name;
          $jit.util.addEvent(domElement, 'click', function () {
              ht.onClick(node.id, {
                  onComplete: function() {
                      ht.controller.onComplete();
                  }
              });
          });
      },
      //Change node styles when labels are placed
      //or moved.
      onPlaceLabel: function(domElement, node){
          var style = domElement.style;
          style.display = '';
          style.cursor = 'pointer';
          if (node._depth <= 1) {
              style.fontSize = "0.8em";
              style.color = "#ddd";

          } else if(node._depth == 2){
              style.fontSize = "0.6em";
              style.color = "#888";

          } else {
              style.display = 'none';
          }

          var left = parseInt(style.left);
          var w = domElement.offsetWidth;
          style.left = (left - w / 2) + 'px';
      },
      
      onComplete: function(){
          Log.write("done");
          
          //Build the right column relations list.
          //This is done by collecting the information (stored in the data property) 
          //for all the nodes adjacent to the centered node.
          var node = ht.graph.getClosestNodeToOrigin("current");
          var html = "<h4>" + node.name + "</h4><b>Relation:</b>";
          html += "<ol>";
          node.eachAdjacency(function(adj){
              var child = adj.nodeTo;
              if (child.data) {
                  var rel = (child.data.band == node.name) ? child.data.relation : node.data.relation;
                  html += "<li>" + child.name + " " + "<div class=\"relation\">(relation: " + rel + ")</div></li>";
                  console.log(child.data.band);
              }
          });
          html += "</ol>";
          $jit.id('inner-details').innerHTML = html;
      }
    });
    //load JSON data.
    ht.loadJSON(json);
    //compute positions and plot.
    ht.refresh();
    //end
    ht.controller.onComplete();
    
   
}
        
        </script>
	</head>
	
	<body <?php body_class('purple'); ?>>
        <section id="template" class="bg-purple">
        <div class="bg-gradient">
				
		<header role="banner">
		
			<div id="inner-header" class="clearfix">
				
				<div class="navbar navbar-fixed-top">
					<div class="navbar-inner">
						<div class="container-fluid nav-container">
							<nav role="navigation">
								<a class="brand" id="logo" title="<?php echo get_bloginfo('description'); ?>" href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a>
								
								<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
							        <span class="icon-bar"></span>
							        <span class="icon-bar"></span>
							        <span class="icon-bar"></span>
								</a>
								
								<div class="nav-collapse">
									<?php bones_main_nav(); // Adjust using Menus in Wordpress Admin ?>
								</div>
								 
							</nav>
							
							
						</div>
					</div>
				</div>
			
			</div> <!-- end #inner-header -->
		
		</header> <!-- end header -->
		
		<div class="container-fluid">
        <?php if(!is_front_page()): ?>
        <section id="breadcrumbs">
            <?php get_template_part('block','breadcrumbs');?>
        </section>
        <?php endif;?>