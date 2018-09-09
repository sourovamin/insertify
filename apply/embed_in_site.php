<?php


//function to add code in header area
    function ic_embed_in_head_free(){
        
 //get data from database       
        global $wpdb;
    $table_name = $wpdb->prefix .'insertify';
    
    $icdb = $wpdb->get_results( 
	  "
	  SELECT * 
	  FROM $table_name
      WHERE type = 'embed' AND ex_type_1 = 'head' AND activeness = 'yes' AND shortcode = 'no'
	  "
    );
    
    //start of the loop for retreiving data
    
        foreach($icdb as $icdb){
        
        $content_1 = $icdb->content_1;
     
            
            
            echo wp_kses_post($content_1);
            
     
            
        }
     
    }
    
//adding action    
add_action('wp_head', 'ic_embed_in_head_free');







//function to add code in footer area
    function ic_embed_in_foot_free(){
        
 //get data from database       
        global $wpdb;
    $table_name = $wpdb->prefix .'insertify';
    
    $icdb = $wpdb->get_results( 
	  "
	  SELECT * 
	  FROM $table_name
      WHERE type = 'embed' AND ex_type_1 = 'foot' AND activeness = 'yes' AND shortcode = 'no'
	  "
    );
    
    //start of the loop for retreiving data
    
        foreach($icdb as $icdb){
        
        $content_1 = $icdb->content_1;
     
            echo wp_kses_post($content_1);
            
        }
     
    }
    
//adding action    
add_action('wp_footer', 'ic_embed_in_foot_free');








?>