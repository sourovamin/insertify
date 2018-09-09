<?php

//start of the function
function icp_site_info(){
    
    //get data from database
    global $wpdb;
    //$user_table = $wpdb->users;
    
    //Get total number of users
     $user_count = $wpdb->get_var( 
            "
            SELECT COUNT(*) 
            FROM $wpdb->users
            "
            );
     
     $page_count = $wpdb->get_var( 
            "
            SELECT COUNT(*) 
            FROM $wpdb->posts
            WHERE post_status = 'publish' AND post_type = 'page'
            "
            );
     
     $post_count = $wpdb->get_var( 
            "
            SELECT COUNT(*) 
            FROM $wpdb->posts
            WHERE post_status = 'publish' AND post_type = 'post'
            "
            );
    
    
    ?>
    
    
    <br>
    <h1><center>Site Information</center></h1>
    <center><p>Find all importants and basic info about your site here!</p></center>
    <br>
    
    
    
    <div style="overflow-x:auto;">
    <table class="icp_table">
        
        
        <tr> <th><b>Site Title</b></th> <td><?php echo get_bloginfo('name'); ?></td> </tr>
        <tr> <th><b>Site URL</b></th> <td><?php echo get_bloginfo('url'); ?></td> </tr>
        <tr> <th><b>Site Description</b></th> <td><?php echo get_bloginfo('description'); ?></td> </tr>
        <tr> <th><b>WordPress Version</b></th> <td><?php echo get_bloginfo('version'); ?></td> </tr>
        <tr> <th><b><i>* PHP Version</i></b></th> <td><?php echo phpversion(); ?></td> </tr>
        <tr> <th><b>Admin Email</b></th> <td><?php echo get_bloginfo('admin_email'); ?></td> </tr>
        <tr> <th><b>Encoding Type</b></th> <td><?php echo get_bloginfo('charset'); ?></td> </tr>
        <tr> <th><b>Content Type</b></th> <td><?php echo get_bloginfo('html_type'); ?></td> </tr>
        <tr> <th><b>Language</b></th> <td><?php echo get_bloginfo('language'); ?></td> </tr>
        
        <tr> <th><b>Total Number of Users</b></th> <td><?php echo $user_count; ?></td> </tr>
        
        <tr> <th><b>Total Published Pages</b></th> <td><?php echo $page_count; ?></td> </tr>
        <tr> <th><b>Total Published Posts</b></th> <td><?php echo $post_count; ?></td> </tr>
        <tr> <th><b>Active Theme</b></th> <td><?php echo wp_get_theme(); ?></td> </tr>
        <tr> <th><b>Current Stylesheet</b></th> <td><?php echo get_stylesheet() ?></td> </tr>
        
        <tr> <th><b>Total Installed Plugins</b></th> <td><?php print_r(count(get_plugins())); ?></td> </tr>
        
    </table>
    </div>
    
    
    
    
    
    
    <?php
}


?>