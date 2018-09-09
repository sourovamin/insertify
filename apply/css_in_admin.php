<?php


    


    function ic_css_in_admin_free(){
        

 
 //get data from database       
        global $wpdb;
    $table_name = $wpdb->prefix .'insertify';
    
    $icdb = $wpdb->get_results( 
	  "
	  SELECT * 
	  FROM $table_name
      WHERE type = 'insert_css' AND activeness = 'yes' AND ex_type_1 = 'admin' AND shortcode = 'no'
	  "
    );
    
    //start of the loop for retreiving data
    
        foreach($icdb as $icdb){
        $name = $icdb->name;
        $content_1 = $icdb->content_1;
            
            wp_enqueue_style( $name, plugin_dir_url( __FILE__ ).'css/icp_insert_admin.css' );
            wp_add_inline_style( $name, $content_1 );
        }
    
    
    
    }

    

    add_action('admin_enqueue_scripts', 'ic_css_in_admin_free');
    add_action('login_enqueue_scripts', 'ic_css_in_admin_free');
    
?>