<?php





//start of page
//initializing the function
function icp_page_func($atts){
		
		//shortcode attributes
    	$a = shortcode_atts( array(
        'id' => 0,
        'name' => 'nonex',
        'title' => 'noney',
		'head' => 'no',
    ),$atts);
        

        //getting attributes in local variable
        $id = $a['id'];
        $name = $a['name'];
        $titile = $atts['titile'];
		$head = $a['head'];
        
		//accessing wp database
        global $wpdb;
        $table_name = $wpdb->posts;
        
        //for ID
        if($id !=0){
        
            $icpd = $wpdb->get_results( 
            "
            SELECT * 
            FROM $table_name
            WHERE ID = '$id'
            "
            );
            
    foreach($icpd as $icpd){
		
		//adding title
		if($head == "yes"){
		?>
		<h2><?php echo $icpd->post_title; ?></h2>
		
		<?php }       
		//$filteredContent = apply_filters('the_content', $icpd->post_content);
        //echo $filteredContent;
		echo wp_kses_post($icpd->post_content);
    }
            
        }
        
        
				//for random post
		if($name == "rand"){
				
            $icpd = $wpdb->get_results( 
            "
            SELECT * 
            FROM $table_name
            WHERE post_type = 'post' AND post_status = 'publish'
			ORDER BY RAND()
			LIMIT 1
            "
            );
            
    foreach($icpd as $icpd){
		
		//adding title
		if($head == "yes"){
		?>
		<h2><?php echo $icpd->post_title; ?></h2>
		
		<?php }
        //$filteredContent = apply_filters('the_content', $icpd->post_content);
        //echo $filteredContent;
		echo wp_kses_post($icpd->post_content);
    }				
				
		}
		
		
			
                //for Name
        elseif($name != "nonex"){
        
            $icpd = $wpdb->get_results( 
            "
            SELECT * 
            FROM $table_name
            WHERE post_name = '$name'
			LIMIT 1
            "
            );
            
    foreach($icpd as $icpd){
		
		//adding title
		if($head == "yes"){
		?>
		<h2><?php echo $icpd->post_title; ?></h2>
		
		<?php }
        //$filteredContent = apply_filters('the_content', $icpd->post_content);
        //echo $filteredContent;
		echo wp_kses_post($icpd->post_content);
    }
            
        }
        

		
                //for title
        if($titile != "noney"){
        
            $icpd = $wpdb->get_results( 
            "
            SELECT * 
            FROM $table_name
            WHERE post_title = '$titile'
			LIMIT 1
            "
            );
            
    foreach($icpd as $icpd){
		
		//adding title
		if($head == "yes"){
		?>
		<h2><?php echo $icpd->post_title; ?></h2>
		
		<?php }
        //$filteredContent = apply_filters('the_content', $icpd->post_content);
        //echo $filteredContent;
		echo wp_kses_post($icpd->post_content);
    }
            
        }
        
       
}
//end of function

add_shortcode( 'ic', 'icp_page_func' );
//end page including shortcode



?>