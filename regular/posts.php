<?php

//start of the function for posts list
function icp_posts_func($atts){
    	$a = shortcode_atts( array(
        'cat' => 'all',
        'head' => 'Recent Posts',
        'num' => 5,
    ),$atts);
    
	//attribute value in local variable    
    $cat = $a['cat'];
    $head = $a['head'];
    $num = $a['num'];
    
    global $wpdb;
    $table_name = $wpdb->posts;



//start of default category all
    if($cat == "all"){

        $icpd = $wpdb->get_results( 
        "
        SELECT * 
        FROM $table_name
        WHERE post_status = 'publish' AND post_type = 'post'
        ORDER BY post_date DESC
        LIMIT $num
        "
        );
        
            ?>
                
				<div style="overflow-x:auto;">
                <table class="icp_table">
                    <tr> <th><?php echo $head; ?> </tr>    
                
            <?php
    foreach($icpd as $icpd){
        ?>
            
            <tr>
                <td> <a href="<?php echo $icpd->guid; ?>"> <?php echo $icpd->post_title; ?> </td>
            </tr>
            
        <?php
    }
    ?> </table></div> <?php
                        
    }
//end of all

    
    else{
        
//start of random posts
    if($cat == "rand"){

        $icpd = $wpdb->get_results( 
        "
        SELECT * 
        FROM $table_name
        WHERE post_status = 'publish' AND post_type = 'post'
        ORDER BY RAND()
        LIMIT $num
        "
        );
        
            ?>
                
				<div style="overflow-x:auto;">
                <table class="icp_table">
                    <tr> <th><?php if($head=="Recent Posts"){echo "Random Posts";} else{echo $head;} ?> </tr>    
                
            <?php
    foreach($icpd as $icpd){
        ?>
            
            <tr>
                <td> <a href="<?php echo $icpd->guid; ?>"> <?php echo $icpd->post_title; ?> </td>
            </tr>
            
        <?php
    }
    ?> </table></div> <?php      
        
    }
    
    
//start of specific category
    else{
        
        $icpd = $wpdb->get_results( 
        "
		SELECT *
		FROM $table_name
		LEFT JOIN $wpdb->term_relationships ON
		($wpdb->posts.ID = $wpdb->term_relationships.object_id)
		LEFT JOIN $wpdb->term_taxonomy ON
		($wpdb->term_relationships.term_taxonomy_id = $wpdb->term_taxonomy.term_taxonomy_id)
		LEFT JOIN $wpdb->terms ON
		($wpdb->term_taxonomy.term_taxonomy_id = $wpdb->terms.term_id)
		WHERE $wpdb->posts.post_status = 'publish'
		AND $wpdb->term_taxonomy.taxonomy = 'category'
		AND $wpdb->terms.name = '$cat'
		ORDER BY post_date DESC
		LIMIT $num
        "
        );
        
            ?>
                
				<div style="overflow-x:auto;">
                <table class="icp_table">
                    <tr> <th><?php if($head=="Recent Posts"){echo $cat;} else{echo $head;} ?> </tr>    
                
            <?php
    foreach($icpd as $icpd){
        ?>
            
            <tr>
                <td> <a href="<?php echo $icpd->guid; ?>"> <?php echo $icpd->post_title; ?> </td>
            </tr>
            
        <?php
    }
    ?> </table></div> <?php         
        
    }
//end of specific category


    
    }




}




add_shortcode( 'ic-post', 'icp_posts_func' );
//end posts including shortcode


?>