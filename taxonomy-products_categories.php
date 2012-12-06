<?php

$slug = get_query_var( 'term' );  
$term = get_term_by( 'slug', $slug , 'product_categories' );  
$term_id = $term->term_id;  
$args=array(  
        'hide_empty'        => 0,  
        'parent'        => $term_id,  
        'taxonomy'      => 'product_categories');  
$categories=get_categories($args); 


if(!$categories){  
    //get the product category name  
    echo "<h1 class='entry-title'>".$term->name."</h1>";  
    $args = array(  
    'posts_per_page' => 2, //remember posts per page should be less or more that what's set in general settings  
    'paged' => $paged, 
    'meta_key' => 'price', 
    'orderby' => 'meta_value_num', 
    'order' => 'ASC', 
    'tax_query' => array( 
                array( 
                'taxonomy' => 'product_categories', 
                'field' => 'slug', 
                'terms' => $slug)  
        )  
    );
}    