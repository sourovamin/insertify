<?php

    //main function from menu
    function show_icp_site_info() {
        require_once plugin_dir_path(__FILE__).'functions.php';    
        
        
        //main page
        if (empty($_REQUEST["action"])) { 
            //include required files
            require_once plugin_dir_path(__FILE__).'info/main_page.php';
            icp_site_info();
        }
    
    
    /*
    if($_GET["action"] == "Complete User List"){
        echo "test";
    }
    
    if($_GET["action"] == "Complete Plugin List"){
        echo "test";
    }
    */

    

}




?>