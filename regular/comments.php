<?php





//start of Comments
function icp_comments_func($atts){
    	$a = shortcode_atts( array(
        'author' => 'nonexc',
        'email' => 'noneyc',
    ),$atts);
        
        //print_r($atts);
        
        $author = $a['author'];
        $email = $a['email'];
        
        global $wpdb;
        $table_name = $wpdb->comments;
        $temp_table = $wpdb->posts;
        
        
        
                //for Author
        if($author != "nonexc"){
        
            $icpd = $wpdb->get_results( 
            "
            SELECT * 
            FROM $table_name
            WHERE comment_author = '$author'
            "
            );
            ?>
			
			<div style="overflow-x:auto;">
			<table class="icp_table">
				<caption>Author: <?php echo $author;?> </caption>
                    <tr> <th>Date & Time</th> <th>Commented In</th> <th>Comment</th> </tr> 
			
			<?php
    foreach($icpd as $icpd){
        
        $post_id = $icpd->comment_post_ID;
            $temp = $wpdb->get_results( 
            "
            SELECT * 
            FROM $temp_table
            WHERE ID = $post_id
            "
            );        
        
        $filteredContent = wp_kses_post($icpd->comment_content);
        ?>
        
        
		<tr>
                <td> <?php echo $icpd->comment_date; ?> </td>
                <td> <?php foreach($temp as $temp){ ?> <a href="<?php echo $temp->guid; ?>"> <?php echo $temp->guid; ?> </a> <?php } ?> </td>
                <td> <?php echo $filteredContent; ?> </td>
        </tr>
		
        <?php

    }
	?> </table></div> <br>  <?php
            
        }
        //end of author
		

		
                //for email
        if($email != "noneyc"){
        
            $icpd = $wpdb->get_results( 
            "
            SELECT * 
            FROM $table_name
            WHERE comment_author_email = '$email'
            "
            );
            ?>
			
			<div style="overflow-x:auto;">
			<table class="icp_table">
				<caption>Author Email: <?php echo $email;?> </caption>
                    <tr> <th>Date & Time</th> <th>Commented In</th> <th>Comment</th> </tr> 
			
			<?php
    foreach($icpd as $icpd){
        
        $post_id = $icpd->comment_post_ID;
            $temp = $wpdb->get_results( 
            "
            SELECT * 
            FROM $temp_table
            WHERE ID = $post_id
            "
            );        
        
        //$filteredContent = apply_filters('the_content', $icpd->comment_content);
		$filteredContent = wp_kses_post($icpd->comment_content);
        ?>
        
        
		<tr>
                <td> <?php echo $icpd->comment_date; ?> </td>
                <td> <?php foreach($temp as $temp){ ?> <a href="<?php echo $temp->guid; ?>"> <?php echo $temp->guid; ?> </a> <?php } ?> </td>
                <td> <?php echo $filteredContent; ?> </td>
        </tr>
		
        <?php

    }
	?> </table></div> <br>  <?php
            
        }
        //end of email
        
       
}
//end of page

add_shortcode( 'ic-comments', 'icp_comments_func' );
//end page including shortcode






?>