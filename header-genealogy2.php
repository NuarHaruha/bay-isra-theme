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
    
    $parent_code = mdag_get_full_name($parent_id);
?>        
        "id": "<?php echo $parent_code;?>",
        "name": "<?php echo mdag_get_full_name($parent_id);?> (<?php echo mdag_get_id_ahli($parent_id);?>)",
        <?php
        $reld = "<h4>$parent_code</h4>Upline";
                
        echo '"data":{"relation":"'.$reld.'"},';        
?>                
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
                            
                $reld = "<h4>$acc_name</h4>Direct Downline LV 1";
                
                echo '"data":{"relation":"'.$reld.'"},';

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
                            echo '"data":{"relation":"<h4>'.$lv2_acc_name.'</h4>Direct Downline LV2"}';
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


    //init data
    
    //end
    
    //init RGraph
    var rgraph = new $jit.RGraph({
        //Where to append the visualization
        injectInto: 'infovis',
        //Optional: create a background canvas that plots
        //concentric circles.
        background: {
          CanvasStyles: {
            strokeStyle: '#555'
          }
        },
        //Add navigation capabilities:
        //zooming by scrolling and panning.
        Navigation: {
          enable: true,
          panning: true,
          zooming: 10
        },
        //Set Node and Edge styles.
        Node: {
            color: '#ddeeff'
        },
        
        Edge: {
          color: '#C17878',
          lineWidth:1.5
        },

        onBeforeCompute: function(node){
            Log.write("centering " + node.name + "...");
            //Add the relation list in the right column.
            //This list is taken from the data property of each JSON node.
            $jit.id('inner-details').innerHTML = node.data.relation;
        },
        
        //Add the name of the node in the correponding label
        //and a click handler to move the graph.
        //This method is called once, on label creation.
        onCreateLabel: function(domElement, node){
            domElement.innerHTML = node.name;
            domElement.onclick = function(){
                rgraph.onClick(node.id, {
                    onComplete: function() {
                        Log.write("done");
                    }
                });
            };
        },
        //Change some label dom properties.
        //This method is called each time a label is plotted.
        onPlaceLabel: function(domElement, node){
            var style = domElement.style;
            style.display = '';
            style.cursor = 'pointer';

            if (node._depth <= 1) {
                style.fontSize = "0.8em";
                style.color = "#ccc";
            
            } else if(node._depth == 2){
                style.fontSize = "0.7em";
                style.color = "#494949";
            
            } else {
                style.display = 'none';
            }

            var left = parseInt(style.left);
            var w = domElement.offsetWidth;
            style.left = (left - w / 2) + 'px';
        }
    });
    //load JSON data
    rgraph.loadJSON(json);
    //trigger small animation
    rgraph.graph.eachNode(function(n) {
      var pos = n.getPos();
      pos.setc(-200, -200);
    });
    rgraph.compute('end');
    rgraph.fx.animate({
      modes:['polar'],
      duration: 2000
    });
    //end
    //append information about the root relations in the right column
    $jit.id('inner-details').innerHTML = rgraph.graph.getNode(rgraph.root).data.relation;
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