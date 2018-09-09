<?php

//start of Users List function
function icp_users_func($atts){
    	$a = shortcode_atts( array(
        'role' => 'all',
    ),$atts);
        
        //shortcode attribute value in local variable
        
        $cat = $a['role'];
        
        
        

        
        
                //for all role
        if($cat == "all"){
        
            
			//get all users data
			$icpd = get_users();
			
			
            ?>
                
				<div style="overflow-x:auto;">
                <table class="icp_table">
						<caption>All Users</caption>
                    <tr> <th>User</th> <th>Email</th> <th>Registration Date</th> <th>Role</th> </tr>    
                
            <?php
    foreach($icpd as $icpd){
        ?>
            
            <tr>
                <td> <?php echo $icpd->display_name; ?> </td>
                <td> <?php echo $icpd->user_email; ?> </td>
                <td> <?php echo $icpd->user_registered; ?> </td>
                <td> <?php echo implode(', ', $icpd->roles); ?> </td>
            </tr>
            
        <?php
    }
    ?> </table></div> <?php
            
        }
        
        
        
        //for specific role
        else{
        
            //get users data by role
			$icpd = get_users("role=$cat");
			
            ?>
                
				<div style="overflow-x:auto;">
                <table class="icp_table">
						<caption>Role: <?php echo $cat;?> </caption>
                    <tr> <th>User</th> <th>Email</th> <th>Registration Date</th> </tr>    
                
            <?php
    foreach($icpd as $icpd){
        ?>
            
            <tr>
                <td> <?php echo $icpd->display_name; ?> </td>
                <td> <?php echo $icpd->user_email; ?> </td>
                <td> <?php echo $icpd->user_registered; ?> </td>
            </tr>
            
        <?php
    }
    ?> </table></div> <?php
            
        }
        

        
       
}
//end of Users

add_shortcode( 'ic-users', 'icp_users_func' );
//end Users including shortcode



?>