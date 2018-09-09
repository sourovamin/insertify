<?php




    function ic_js_in_site_free(){
        
        //$css_insert = ".css_1106 {color: red;background-color: #f2f2f2; font-size: 70px;}";
 
 //get data from database       
        global $wpdb;
    $table_name = $wpdb->prefix .'insertify';
    
    $icdb = $wpdb->get_results( 
	  "
	  SELECT * 
	  FROM $table_name
      WHERE type = 'insert_js' AND activeness = 'yes' AND ex_type_1 = 'site' AND shortcode = 'no'
	  "
    );
    
    //start of the loop for retreiving data
    
        foreach($icdb as $icdb){
        $name = $icdb->name;
        $content_1 = $icdb->content_1;
            
            wp_enqueue_script( $name, plugin_dir_url( __FILE__ ).'js/icp_js_site.js' );
            wp_add_inline_script( $name, $content_1 );
        }
    
    
    
    }

    
    add_action( 'wp_enqueue_scripts', 'ic_js_in_site_free' );



?>