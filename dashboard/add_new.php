<?php

function icp_add_new(){
    
	require_once plugin_dir_path(__FILE__).'functions.php';
	//$categories = get_categories();
    
	
	
	
	
    //start of html
    ?>
    
	<script>
		function fail_alert(){
			window.alert("Please fill all the required fields!");
			//location.reload();
		}
	</script>
	
	
  
    
    <br>
    <h1><center>Add New</center></h1>
    <center><p>Add entries here and access these from <b>Insertify >> Entries</b></p></center>
    <br>
    
    
    
    
    
    
    
    <?php
	
	
    //main page
    if (empty($_REQUEST["ic_add_new_submit"])) { 
            //include required files
            require_once plugin_dir_path(__FILE__).'add/add_display.php';
            ic_add_new_display();
        }	
	//end of main page
	
	
    
    //Add Action Page
    if($_REQUEST["ic_add_new_submit"] == "Add Entry"){
        
        
        require_once plugin_dir_path(__FILE__).'add/add_action.php';
        ic_add_new_action();
        
        require_once plugin_dir_path(__FILE__).'entry/edit_entry.php';
		ic_hide_id("edit_entry_title");
		ic_hide_id("ic_edit_button_id");
        global $wpdb;
		$table_name = $wpdb->prefix .'insertify';
        $last_id = $wpdb->get_var( "SELECT MAX(id) FROM $table_name" );
        ic_edit_entry_func($last_id);
        
        
        ?>
		
		<form action="" method="post" id="ic_another_button">
        <input type="submit" value="Add Another Entry" name="ic_another_submit" class="icp_button_1">
        </form>
		
		<?php
        
    }
    //End of Add Action Page
	
	
	
}
//end of function

?>