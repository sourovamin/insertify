<?php



function icp_entries(){
    require_once plugin_dir_path(__FILE__).'functions.php';
    //require_once plugin_dir_path(__FILE__).'entry/edit_entry.php';
    //require_once plugin_dir_path(__FILE__).'entry/copy_entry.php';
    //require_once plugin_dir_path(__FILE__).'delete_entry.php';
    //require_once plugin_dir_path(__FILE__).'edit_entry_action.php';
    //require_once plugin_dir_path(__FILE__).'entry/show_entries.php';
    
    
    
    
    //without any action
    //main page- Entries
    if (empty($_REQUEST["action"])) { 
            //include required files
            require_once plugin_dir_path(__FILE__).'entry/show_entries.php';
            add_new_button();
            icp_show_entries();
        }
     //end of main page   
    
    
    //Edit Page    
    if($_REQUEST["action"] == "Edit" && empty($_REQUEST["ic_edit_submit"])){
        require_once plugin_dir_path(__FILE__).'entry/edit_entry.php';
        ic_edit_entry_func($_GET["edit_id"]);
    }
    //End of edit Page
    
    
    //Edit Action Page
    if($_REQUEST["action"] == "Edit" && $_REQUEST["ic_edit_submit"] == "Update"){
        require_once plugin_dir_path(__FILE__).'entry/edit_entry_action.php';
        require_once plugin_dir_path(__FILE__).'entry/edit_entry.php';
        ic_edit_entry_action_func($_POST['edit_action_id']);
        ic_edit_entry_func($_POST['edit_action_id']);
    }
    //End of edit action
    
    
    
    
    //copy entry
         if(empty($_REQUEST["action"]) && isset($_POST["ic_copy_entry_button"])){
            require_once plugin_dir_path(__FILE__).'entry/copy_entry.php';
            ic_copy_entry_func($_POST['copy_id']);                
            }
    //end of copy entry
    
    
    
    //delete entry
         if(empty($_REQUEST["action"]) && isset($_POST["ic_delete_entry_button"])){
            require_once plugin_dir_path(__FILE__).'entry/delete_entry.php';
            ic_delete_entry_func($_POST['delete_id']);                
            }
    //end of delete entry
    
    
    
    
    }

?>