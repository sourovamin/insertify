<?php


function ic_edit_entry_action_func($id){
    
    //require_once plugin_dir_path(__FILE__).'functions.php';
    
    //getting data from form
		global $wpdb;
		$table_name = $wpdb->prefix .'insertify';
		
		$name = $_POST["name"];
		if($_POST["activeness"] == 'on')
			{$activeness = 'yes';}
			else{$activeness = 'no';}
			
		$type = $_POST["type"];
		
		
		
		
		
		//start of insert in post
		if($type == 'insert_in_post'){
			$insert_in_post_ex_type_1 = $_POST["insert_in_post_ex_type_1"];
			$insert_in_post_position_data_1 = $_POST["insert_in_post_position_data_1"];
			$insert_in_post_content_1 = stripslashes($_POST["insert_in_post_content_1"]);
			
			if($insert_in_post_ex_type_1 == "after-para"){
				$insert_in_post_number_1 = $_POST["insert_in_post_number_1"];
			}
			else{$insert_in_post_number_1 = NULL;}
			
			
			if(strlen($insert_in_post_content_1) > 0){
				$edit_row = $wpdb->update( 
				$table_name, 
				array(
					'name' => $name, 
					//'type' => $type,
					'ex_type_1' => $insert_in_post_ex_type_1,
					'content_1' => $insert_in_post_content_1,
					'activeness' => $activeness,
					//'shortcode' => 'no',
					'data_1' => $insert_in_post_position_data_1,
					'number_1' => $insert_in_post_number_1,
					
				),
				
				array( 'id' => $id )
				);
				
				
				
				
				ic_success_fail_alert($edit_row);
				
			}
			else{ 
				ic_fill_req_field();
			 }
			
			
		}
		//end of insert in post
		
		
		
		
		
		
		
		
		
		//start of insert css
		if($type == 'insert_css'){
			$insert_css_ex_type_1 = $_POST["insert_css_ex_type_1"];
			$insert_css_content_1 = stripslashes($_POST["insert_css_content_1"]);
			
			
			if(strlen($insert_css_content_1) > 0){
				$edit_row = $wpdb->update( 
				$table_name, 
				array(
					'name' => $name, 
					//'type' => $type,
					'ex_type_1' => $insert_css_ex_type_1,
					'content_1' => $insert_css_content_1,
					'activeness' => $activeness,
					//'shortcode' => 'no',
					
				),
                
                array( 'id' => $id )
				);
				
				
				ic_success_fail_alert($edit_row);
				
			}
			else{ ic_fill_req_field(); }
			
			
		}
		//end of insert css
		
		
		
		
		
		
		
		
		
		//start of insert js
		if($type == 'insert_js'){
			$insert_js_ex_type_1 = $_POST["insert_js_ex_type_1"];
			$insert_js_content_1 = stripslashes($_POST["insert_js_content_1"]);
			
			
			if(strlen($insert_js_content_1) > 0){
				$edit_row = $wpdb->update( 
				$table_name, 
				array(
					'name' => $name, 
					//'type' => $type,
					'ex_type_1' => $insert_js_ex_type_1,
					'content_1' => $insert_js_content_1,
					'activeness' => $activeness,
					//'shortcode' => 'no',
					
				),
				
				array( 'id' => $id ) 
				);
				
				
				ic_success_fail_alert($edit_row);
				
			}
			else{ ic_fill_req_field(); }
			
			
		}
		//end of insert js
		
		
		
		
		
		
		
		
		//start of header & footer
		if($type == 'embed'){
        $embed_ex_type_1 = $_POST["embed_ex_type_1"];
        $embed_content_1 = stripslashes($_POST["embed_content_1"]);
    
			
			
			if(strlen($embed_content_1) > 0){
				$edit_row = $wpdb->update( 
				$table_name, 
				array(
					'name' => $name, 
					//'type' => $type,
					'ex_type_1' => $embed_ex_type_1,
					'content_1' => $embed_content_1,
					'activeness' => $activeness,
					//'shortcode' => 'no',
					
				),
				
				array( 'id' => $id ) 
				);
				
				
				ic_success_fail_alert($edit_row);
				
			}
			else{ ic_fill_req_field(); }
			
			
		}
		//end of header & footer
		
		
		
		
		
		
		
		
		
		//start of css individual
		if($type == 'css_individual'){
			
			$css_individual_content_1 = stripslashes($_POST["css_individual_content_1"]);
			
			
			if(strlen($css_individual_content_1) > 0){
				$edit_row = $wpdb->update( 
				$table_name, 
				array(
					'name' => $name, 
					//'type' => $type,
					'content_1' => $css_individual_content_1,
					'activeness' => $activeness,
					//'shortcode' => 'yes',
					
				),
				
				array( 'id' => $id ) 
				);
				
				
				ic_success_fail_alert($edit_row);
				
			}
			else{ ic_fill_req_field(); }
			
			
		}
		//end of css individual
		
		
		
		
		
		
		
		//start of js individual
		if($type == 'js_individual'){
			
			$js_individual_content_1 = stripslashes($_POST["js_individual_content_1"]);
			
			
			if(strlen($js_individual_content_1) > 0){
				$edit_row = $wpdb->update( 
				$table_name, 
				array(
					'name' => $name, 
					//'type' => $type,
					'content_1' => $js_individual_content_1,
					'activeness' => $activeness,
					//'shortcode' => 'yes',
					
				),
				
				array( 'id' => $id ) 
				);
				
				
				ic_success_fail_alert($edit_row);
				
			}
			else{ ic_fill_req_field(); }
			
		}
		//end of js individual
		
		
		
		
		
		
		
		
		//start of embed
		if($type == 'pdf'){
			$pdf_content_1 = stripslashes($_POST["pdf_content_1"]);
			$pdf_content_style = stripslashes($_POST["pdf_content_style"]);
			$pdf_data_1 = stripslashes($_POST["pdf_data_1"]);
			$pdf_data_2 = stripslashes($_POST["pdf_data_2"]);
			
			
			if(strlen($pdf_content_1) > 0){
				$edit_row = $wpdb->update( 
				$table_name, 
				array(
					'name' => $name, 
					//'type' => $type,
					'content_1' => $pdf_content_1,
					'content_2' => $pdf_content_style,
					'data_1' => $pdf_data_1,
					'data_2' => $pdf_data_2,
					'activeness' => $activeness,
					//'shortcode' => 'yes',
					
				),
				
				array( 'id' => $id ) 
				);
				
				
				ic_success_fail_alert($edit_row);
				
			}
			else{ ic_fill_req_field(); }
			
			
		}
		//end of embed
		
		
		
		
		
		
		
		
		
		//start of embed
		if($type == 'youtube'){
			$youtube_content_1 = stripslashes($_POST["youtube_content_1"]);
			$youtube_content_style = stripslashes($_POST["youtube_content_style"]);
			$youtube_data_1 = stripslashes($_POST["youtube_data_1"]);
			$youtube_data_2 = stripslashes($_POST["youtube_data_2"]);
			
			
			if(strlen($youtube_content_1) > 0){
				$edit_row = $wpdb->update( 
				$table_name, 
				array(
					'name' => $name, 
					//'type' => $type,
					'content_1' => $youtube_content_1,
					'content_2' => $youtube_content_style,
					'data_1' => $youtube_data_1,
					'data_2' => $youtube_data_2,
					'activeness' => $activeness,
					//'shortcode' => 'yes',
					
				),
				
				array( 'id' => $id ) 
				);
				
				
				ic_success_fail_alert($edit_row);
				
			}
			else{ ic_fill_req_field(); }
			
			
		}
		//end of embed
		
		
		
		
		
		
		//start of php snippet
		if($type == 'php'){
			
			$php_content_1 = stripslashes($_POST["php_content_1"]);
			$php_content_2 = stripslashes($_POST["php_content_2"]);
			$php_shortcode = $_POST["php_shortcode"];
			
			
			if(strlen($php_content_1) > 0){
				$edit_row = $wpdb->update( 
				$table_name, 
				array(
					'name' => $name, 
					//'type' => $type,
					'content_1' => $php_content_1,
					'content_2' => $php_content_2,
					'activeness' => $activeness,
					'shortcode' => $php_shortcode,
					
				),
				
				array( 'id' => $id ) 
				);
				
				
				ic_success_fail_alert($edit_row);
				
			}
			else{ ic_fill_req_field(); }
			
			
		}
		//end of php
		
		
		
		
		
		
		
		
		
		
		
		
	   
}


?>