<?php
	

/**
 * HTML tag Helper function 
 * function _t()
 * 
 * @author Avice (chaoskaizer ) Devereux <ck+filtered@animepaper.net> 
 * @param string		$tag html tagname; a p strong
 * @param mixed|string	$content			the content 
 * @param mixed|array	$htmlattributes 	html tag attributes in pair key value
 * 
 * example
 * <code>
 * echo _t('a','website',array('href'=>'http://blog.kaizeku.com'));
 * echo _t('script','',array('src'=>'http://getfirebug.com/releases/lite/1.2/firebug-lite-compressed.js'));
 * </code>
 */
function _t($tag = 'a', $content = false, $htmlattributes = false)
{


	$tag = strtolower($tag);
	$htm = '<' . $tag;

	if (is_array($htmlattributes))
	{

		// add name || id for input
		if ($tag == 'input')
		{
			if (isset($htmlattributes['id']))
			{
				$htmlattributes['name'] = $htmlattributes['id'];
			} elseif (isset($htmlattributes['name']))
			{
				$htmlattributes['id'] = $htmlattributes['name'];
			}

		}

		$esc_prop = array_flip(array('title', 'alt', 'caption', 'content'));

		foreach ($htmlattributes as $name => $txt)
		{

			$name = strtolower($name);

			if ($tag == 'blockquote')
			{
				if ($name == 'cite')
				{
					$txt = urlencode($txt);
				}
			}

			if (isset($esc_prop[$name]))
			{
				$htm .= ' ' . $name . '="' . esc_attr($txt) . '"';
			} else
			{
				$htm .= ' ' . $name . '="' . $txt . '"';
			}
		}


		unset($htmlattributes, $esc_prop, $name, $txt);
	}

	$typesingle = array_flip(array('img', 'input', 'hr', 'link', 'meta', 'br'));

	/**
	 * HTML Compatibility Guideline 2
	 * Include a space before the trailing /
	 * {@link http://www.w3.org/TR/xhtml1/#C_2 Empty Elements}
	 */
	$htm .= (isset($typesingle[$tag])) ? ' />' : '>' . $content . '</' . $tag . '>';

	/** 
	 * WCAG AAA
	 * newline for common BLOCK elements
	 */
	$newline_tag = array_flip(array('h1', 'h2', 'h3', 'h4', 'h5', 'h6', 'p', 'ul',
		'ol', 'dl', 'li', 'script', 'pre', 'code', 'div', 'form', 'table', 'dt', 'dd',
		'blockquote', 'meta', 'link', 'title'));

	if (isset($newline_tag[$tag]))
	{
		$htm .= PHP_EOL;
	}

	unset($typesingle, $newline_tag, $tag, $content);

	return $htm;
}
/**
 * @see _t
 */
function t($tag = 'a', $content = false, $htmlattributes = false)
{
	echo _t($tag, $content, $htmlattributes);
}

add_action('wp_footer','mc_footer_script_pendaftaran');
function mc_footer_script_pendaftaran(){    
    if (is_page_template('page-register.php')){
        
        $js = array('jquery.validate.min','tab-daftar','jsonp');
        echo "\n";
        foreach ($js as $k){
            $uri = apply_filters('rel_uri',get_template_directory_uri().'/library/js/'.$k.'.js');
            
            echo "\t\t"._t('script','',array('src'=> $uri));
        }
    }
}
add_action('wp_footer','mc_footer_script_purchase_form');
function mc_footer_script_purchase_form(){
    if (is_page_template('page-products.php')){
        
        $js = array('currency','product-purchase');
        echo "\n";
        foreach ($js as $k){
            $uri = apply_filters('rel_uri',get_template_directory_uri().'/library/js/'.$k.'.js');
            
            echo "\t\t"._t('script','',array('src'=> $uri));
        }
    }    
}

add_action('wp_footer','mc_footer_script_purchase_history');
function mc_footer_script_purchase_history(){
    if (is_page_template('page-purchase-history.php')){
        
        $js = array('highcharts');
        echo "\n";
        foreach ($js as $k){
            $uri = apply_filters('rel_uri',get_template_directory_uri().'/library/js/'.$k.'.js');
            
            echo "\t\t"._t('script','',array('src'=> $uri));
        }
    }    
}

add_filter('rel_uri','rel_uri');
function rel_uri($url){ return wp_make_link_relative($url); }