<?php

function ic_copy_entry_func($id){
    global $wpdb;
	$table_name = $wpdb->prefix .'insertify';
    
    $icdb = $wpdb->get_results( 
	  "
	  SELECT * 
	  FROM $table_name
      WHERE id = '$id'
      LIMIT 1
	  "
    );
    
    foreach($icdb as $icdb){
        
        $copy_row = $wpdb->insert( 
				$table_name, 
				array(
					'name' => $icdb->name."-copy",
					'type' => $icdb->type,
                    'ex_type_1' => $icdb->ex_type_1,
                    'ex_type_2' => $icdb->ex_type_2,
					'content_1' => $icdb->content_1,
					'content_2' => $icdb->content_2,
                    'content_3' => $icdb->content_3,
					'activeness' => $icdb->activeness,
					'shortcode' => $icdb->shortcode,
                    'data_1' => $icdb->data_1,
					'data_2' => $icdb->data_2,
                    'number_1' => $icdb->number_1,
					'number_2' => $icdb->number_2,
                    'date_1' => $icdb->date_1,
					'date_2' => $icdb->date_2,
                    'setting' => $icdb->setting,
					
				) 
				);
        
        
        if($copy_row){
                            ?> <script>
                                    
                                    alert("Entry Copied!");
                                    location.reload();
                                </script> <?php
                        
                        }
        
        
    }
    
}



?>