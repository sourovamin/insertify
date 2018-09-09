<?php





// Function to insert after paraghraphs.function to insert content in position
function ic_insert_after_paragraph_free( $insertion, $paragraph_id, $content ) {
$closing_p = '</p>';
$paragraphs = explode( $closing_p, $content );
$number = count($paragraphs);

//different numbers for different options
if($paragraph_id == -2){$break = $number/2;}
if($paragraph_id == -1){$break = ($number*1)/4;}
if($paragraph_id == -3){$break = ($number*3)/4;}

$break = floor($break);

foreach ($paragraphs as $index => $paragraph) {
if ( trim( $paragraph ) ) {
$paragraphs[$index] .= $closing_p;
}
if ( $break == $index + 1 ) {
$paragraphs[$index] .= $insertion;
}
}
return implode( '', $paragraphs );
}
//end of insert after paraghraph function












//start of the function

        function ic_content_in_post_free($content) {

//get data from database
    
    global $wpdb;
    $table_name = $wpdb->prefix .'insertify';
    
    $icdb = $wpdb->get_results( 
	  "
	  SELECT * 
	  FROM $table_name
      WHERE type = 'insert_in_post' AND activeness = 'yes'
	  "
    );
    
//start of the loop for retreiving data
    foreach($icdb as $icdb){
        
       $ex_type_1 = $icdb->ex_type_1;
       $content_1 = wp_kses_post($icdb->content_1);
       $data_1 = $icdb->data_1;
    
    if( $data_1 == "all" && is_single() && !is_home() ){
        
        if($ex_type_1 == "start"){
            $content = $content_1.$content;
        }
        
        if($ex_type_1 == "end"){
            $content = $content.$content_1;
        }
		
		if($ex_type_1 == "middle"){
            $content = ic_insert_after_paragraph_free( $content_1, -2 , $content );
        }
		
		if($ex_type_1 == "one-fourth"){
            $content = ic_insert_after_paragraph_free( $content_1, -1 , $content );
        }
		
		if($ex_type_1 == "third-fourth"){
            $content = ic_insert_after_paragraph_free( $content_1, -3 , $content );
        }
		
    
    }
    
    elseif(in_category($data_1) && is_single() && !is_home() ) {
        
        if($ex_type_1 == "start"){
            $content = $content_1.$content;
        }
        
        if($ex_type_1 == "end"){
            $content = $content.$content_1;
        }
		
		if($ex_type_1 == "middle"){
            $content = ic_insert_after_paragraph_free( $content_1, -2 , $content );
        }
		
		if($ex_type_1 == "one-fourth"){
            $content = ic_insert_after_paragraph_free( $content_1, -1 , $content );
        }
		
		if($ex_type_1 == "third-fourth"){
            $content = ic_insert_after_paragraph_free( $content_1, -3 , $content );
        }
		
    }


    }
//end of the loop
    
    return $content;
        }
        
        
        add_filter('the_content', 'ic_content_in_post_free');
		
		
		
		
		
		
		
		
		
		
		
		
	//for after pargraph	
		
		


// Function to insert after paraghraphs.function to insert content in position
function ic_insert_after_paragraph_pro( $insertion, $paragraph_id, $content ) {
$closing_p = '</p>';
$paragraphs = explode( $closing_p, $content );


foreach ($paragraphs as $index => $paragraph) {
if ( trim( $paragraph ) ) {
$paragraphs[$index] .= $closing_p;
}
if ( $paragraph_id == $index + 1 ) {
$paragraphs[$index] .= $insertion;
}
}
return implode( '', $paragraphs );
}
//end of insert after paraghraph function







//start of the function

        function ic_content_in_post_pro($content) {

//get data from database
    
    global $wpdb;
    $table_name = $wpdb->prefix .'insertify';
    
    $icdb = $wpdb->get_results( 
	  "
	  SELECT * 
	  FROM $table_name
      WHERE type = 'insert_in_post' AND ex_type_1 = 'after-para' AND number_1 > 0 AND activeness = 'yes'
	  "
    );
    
//start of the loop for retreiving data
    foreach($icdb as $icdb){
        
       $content_1 = $icdb->content_1;
       $data_1 = $icdb->data_1;
       $number_1 = $icdb->number_1;
    
    if( $data_1 == "all" && is_single() && !is_home() ){
        
            $content = ic_insert_after_paragraph_pro( $content_1, $number_1 , $content );
        }
		
    
    
    
    elseif(in_category($data_1) && is_single() && !is_home() ) {
        
            $content = ic_insert_after_paragraph_pro( $content_1, $number_1 , $content );       
    }


    }
//end of the loop
    
    return $content;
        }
        
        
        add_filter('the_content', 'ic_content_in_post_pro');



		
		


?>