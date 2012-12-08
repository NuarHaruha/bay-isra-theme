<?php
/**
 * userinfo functions
 * 
 * @author Nuarharuha <nhnoah+bay-isra@gmail.com> 
 */
 
 
 function mc_get_user_role(){  
    global $current_user;
    return $current_user->roles[0];
 }	

add_action('wp_ajax_nopriv_mc_jsonp', 'mc_jsonp_request');
add_action('wp_ajax_mc_jsonp', 'mc_jsonp_request');

function mc_jsonp_request(){
 
     switch($_REQUEST['fn']){
          case 'username_exists':
                if (!isset($_REQUEST['uname'])) return false;
               $output = username_exists($_REQUEST['uname']) ;
          break;
          default:
              $output = 'No function specified, check your jQuery.ajax() call';
          break;
 
     }
 
    $output = (is_null($output)) ? "true" : "false";
    
    echo $output;
    die();
 
}


