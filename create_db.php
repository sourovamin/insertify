<?php

function icp_table_install () {
   global $wpdb;

   $table_name = $wpdb->prefix ."insertify";
   
   //check the table already exist or not
   $check = $wpdb->get_results("SELECT 1
                               FROM $table_name
                               LIMIT 1");
   
   //if table doesn't exist, then create the table
if($check == FALSE){   
//Adding table in database
   
$charset_collate = $wpdb->get_charset_collate();

$sql = "CREATE TABLE $table_name (
    id bigint(20) NOT NULL AUTO_INCREMENT UNIQUE,
    name varchar(255) NOT NULL,
    type varchar(255) NOT NULL,
    ex_type_1 varchar(255),
    ex_type_2 varchar(255),
    content_1 longtext,
    content_2 longtext,
    content_3 longtext,
    activeness varchar(10) DEFAULT 'yes',
    shortcode varchar(10) DEFAULT 'no',
    data_1 varchar(255),
    data_2 varchar(255),
    number_1 bigint(20),
    number_2 bigint(20),
    date_1 datetime,
    date_2 datetime,
    setting varchar(255),
    
  PRIMARY KEY  (id)
) $charset_collate;";

require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
//dbDelta( $sql );
maybe_create_table($table_name, $sql );
}
    //end of creating table


}






//deactivation function
   function icp_deactivate_func(){
      //for future use
   }





?>