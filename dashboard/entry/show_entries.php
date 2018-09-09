<?php


function icp_show_entries(){
    
    
        //get data from database
    global $wpdb;
    $table_name = $wpdb->prefix .'insertify';
    
    $icdb = $wpdb->get_results( 
            "
            SELECT * 
            FROM $table_name
            "
            );
    ?>
    
    
    <div style="overflow-x:auto;" id="ic_entry_div">
        <table class="icp_table" id="ic_entry_table">
            
            <tr> <th>ID</th> <th>Name</th> <th>Type</th> <th>Action</th> <th>Active</th> <th>Shortcode</th> </tr>
            
    
    <?php
    foreach($icdb as $icdb){
        
        $id = $icdb->id;
        $name = $icdb->name;
        $type = $icdb->type;
        $activeness = $icdb->activeness;
        $shortcode = $icdb->shortcode;
        
    ?>
        
            <tr>
                <td> <?php echo $id; ?> </td>
                <td> <?php echo $name; ?> </td>
                <td>
                    <?php
                    //type name
                    switch($type){
                        case "insert_in_post":
                            echo "Insert Ad/Content";
                            break;
                        case "insert_css":
                            echo "Insert CSS";
                            break;
                        case "insert_js":
                            echo "Insert JS";
                            break;
                        case "embed":
                            echo "Header & Footer";
                            break;
                        case "css_individual":
                            echo "CSS (individual)";
                            break;
                        case "js_individual":
                            echo "JS (individual)";
                            break;
                        case "pdf":
                            echo "Embed PDF";
                            break;
                        case "youtube":
                            echo "Youtube Video";
                            break;
                        case "php":
                            echo "PHP Snippet";
                            break;
                    }
                    ?>
                </td>
                
                
                <td>
                    
                    <form action="<?php echo admin_url( 'admin.php' ); ?>" method="get" style="display: inline;">
                        <input type="hidden" name="page" value="icps_entries" >
                        <input type="hidden" name="edit_id" value="<?php echo $id; ?>">
                        <input type="submit" value="Edit" name="action" style="background-color:#4CAF50; cursor: pointer; color: white; margin-right:15px;">
                    </form>
                    
                    
                    
                    
                    <form action="" method="post" style="display: inline;">
                        <input type="hidden" name="copy_id" value="<?php echo $id; ?>">
                        <input type="submit" name="ic_copy_entry_button" value="Copy" style="background-color:orange; cursor: pointer; color: white; margin-right:15px;">
                    </form>
                    
                    
                    
                    
                    
                    
                    
                    <form action="" method="post" style="display: inline;">
                        <input type="hidden" name="delete_id" value="<?php echo $id; ?>">
                        <input type="submit" value="Delete" name="ic_delete_entry_button" style="background-color:red; cursor: pointer; color: white;">
                    </form>
                    
                    
                    
                    
                    
                </td>
                
                <td> <?php if($activeness == 'yes'){echo "Yes";}else{echo "No";} ?> </td>
                
                <td> <?php if($shortcode == "yes"){ ?><textarea rows="1" cols="22" >[insertify id="<?php echo $icdb->id; ?>"]</textarea> <?php } ?> </td>
            
            </tr>    
    
    
    <?php } ?>
    
        </table>
    </div>

    <?php



}
    
    




?>