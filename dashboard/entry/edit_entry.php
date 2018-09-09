<?php

function ic_edit_entry_func($id){
    
	//require_once plugin_dir_path(__FILE__).'functions.php';
	$categories = get_categories();
    
    
    
    //getting data
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
    
    
    
    
    
    
    //start of html
    ?>
    
	<script>
		function fail_alert(){
			window.alert("Please fill all the required fields!");
			return false;
		}
		
		//for hiding or showing after para div
		jQuery(document).ready(function () {
		jQuery("#insert_in_post_after_para").hide();
        var op_val = jQuery("#insert_in_post_position").val();
        if (op_val == "after-para") {
            jQuery("#insert_in_post_after_para").show();
		}
	
			jQuery("#insert_in_post_position").change(function(){
			var op_val_1 = jQuery(this).val();
			if (op_val_1 != "after-para") {
				jQuery("#insert_in_post_after_para").hide();
			}
			else{
			jQuery("#insert_in_post_after_para").show();
			}
			})
		
		});
		
	</script>
	
	
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
  
    
	<div id="edit_entry_title">
    <br>
    <h1><center>Edit Entry</center></h1>
    <center><p>Edit and update entry here</p></center>
    <br>
    </div>
    
    
    <?php
    //start of the foreach
    
    
    ic_hide_class("ic_edit");
    
    
      
         foreach($icdb as $icdb){   
            
            //getting data
                    $name = $icdb->name;
					$type = $icdb->type;
                    $ex_type_1 = $icdb->ex_type_1;
                    $ex_type_2 = $icdb->ex_type_2;
					$content_1 = $icdb->content_1;
					$content_2 = $icdb->content_2;
                    $content_3 = $icdb->content_3;
					$activeness = $icdb->activeness;
					$shortcode = $icdb->shortcode;
                    $data_1 = $icdb->data_1;
					$data_2 = $icdb->data_2;
                    $number_1 = $icdb->number_1;
					$number_2 = $icdb->number_2;
                    $date_1 = $icdb->date_1;
					$date_2 = $icdb->date_2;
                    $setting = $icdb->setting;
            
            
            
        
    ?>
    
    
    <style> <?php echo "#".$type; ?> {display: block;} </style>
    
    
    <!-- Start of the form -->
    <form id="ic_edit_form" action="" method="post">
    
	<input type="hidden" name="edit_action_id" value="<?php echo $id; ?>" >
	<input type="hidden" name="type" value="<?php echo $type; ?>" >
	
	
    <!-- Start of Main div -->
    <div class="icp_div_1">
	
    <!-- Start of Initial Components -->
        <div class="row">
            <div class="col-sm-10">	
            *Name:<input type="text" name="name" value="<?php echo $name; ?>" required>(should be unique)
            </div>
            <div class="col-sm-2">	
            *Active<br><label class="ic_switch"><input type="checkbox" name="activeness" <?php if($activeness == 'yes'){echo "checked";} ?> ><span class="ic_slider round"></span></label>
            </div>
        </div>


        *Type: 
        <select id="ic_type_edit" name="type_show" disabled>
          <option value="insert_in_post" <?php if($type == 'insert_in_post'){echo "selected";} ?> >Insert Ad/Content</option>
          <option value="insert_css" <?php if($type == 'insert_css'){echo "selected";} ?> >Insert CSS</option>
          <option value="insert_js" <?php if($type == 'insert_js'){echo "selected";} ?> >Insert JS</option>
          <option value="embed" <?php if($type == 'embed'){echo "selected";} ?> >Header & Footer</option>
          <option value="css_individual" <?php if($type == 'css_individual'){echo "selected";} ?> >CSS (individual)</option>
          <option value="js_individual" <?php if($type == 'js_individua'){echo "selected";} ?> >JS (individual)</option>
          <option value="pdf" <?php if($type == 'pdf'){echo "selected";} ?> >Embed PDF</option>
          <option value="youtube" <?php if($type == 'youtube'){echo "selected";} ?> >Youtube Video</option>
		  <option value="php" <?php if($type == 'php'){echo "selected";} ?> >PHP Snippet</option>
        </select>
    <!-- End of Initial Components -->
    

    <!-- Start of Insert in Post div -->
    <div id="insert_in_post" class="ic_edit">
        <div class="icp_div_2">
            <center><p><i>Insert Ad/Contents to Posts in Different Positions Based on Categories</i></p></center>
            <br>
            Position in Post: <select id="insert_in_post_position" name="insert_in_post_ex_type_1">
                        <option value="start" <?php if($ex_type_1 == 'start'){echo "selected";} ?> >Start</option>
                        <option value="end" <?php if($ex_type_1 == 'end'){echo "selected";} ?> >End</option>
                        <option value="middle" <?php if($ex_type_1 == 'middle'){echo "selected";} ?> >Middle</option>
                        <option value="one-fourth" <?php if($ex_type_1 == 'one-fourth'){echo "selected";} ?> >One-Fourth</option>
                        <option value="third-fourth" <?php if($ex_type_1 == 'third-fourth'){echo "selected";} ?> >Third-Fourth</option>
						<option value="after-para" <?php if($ex_type_1 == 'after-para'){echo "selected";} ?> >After Specific Para</option>
                      </select>
			
			<div id="insert_in_post_after_para">
				<br><br> After No. of Para: <input type="number" name="insert_in_post_number_1" value="<?php echo $number_1; ?>" min="0" step="1">
			</div>
			
            
            <br><br>
            
            Category: <select id="insert_in_post_category" name="insert_in_post_position_data_1">
                        <option value="all" <?php if($data_1 == 'all'){echo "selected";} ?> >All</option>
                        
                        <?php foreach($categories as $category){ ?>
                            <option value="<?php echo $category->name; ?>" <?php if($data_1 == $category->name){echo "selected";} ?> > <?php echo $category->name; ?> </option>
                            
                        <?php } ?>
                        
                      </select>
            
            <br><br>
            
            *Content:
             <?php wp_editor( wp_kses_post($content_1),"insert_in_post_content", array('textarea_rows'=>10, 'textarea_name'=>'insert_in_post_content_1')); ?>
            
        </div>
    </div>
    <!-- End of Insert in Post div -->
    
    
    
    
    <!-- Start of Insert CSS div -->
    <div id="insert_css" class="ic_edit">
        
        <div class="icp_div_2">
            <center><p><i>Insert CSS for the Whole Site or the Admin Area</i></p></center>
            <br>
            Where To: <select id="insert_css_option" name="insert_css_ex_type_1">
                        <option value="site" <?php if($ex_type_1 == 'site'){echo "selected";} ?> >Site</option>
                        <option value="admin" <?php if($ex_type_1 == 'admin'){echo "selected";} ?> >Admin Area</option>
                      </select>
            
            <br><br>
            
            *CSS: <br>
            <textarea rows="8" cols="80" id="insert_css_css" name="insert_css_content_1" class="ic_text_area"><?php echo $content_1; ?></textarea>
            
        </div>   
        
    </div>
    <!-- End of Insert CSS div -->
    
    
    
    
    
    <!-- Start of Insert JS div -->
    <div id="insert_js" class="ic_edit">
        
        
        <div class="icp_div_2">
            <center><p><i>Insert JS for the Whole Site or the Admin Area</i></p></center>
            <br>
            Where To: <select id="insert_js_option" name="insert_js_ex_type_1">
                        <option value="site" <?php if($ex_type_1 == 'site'){echo "selected";} ?> >Site</option>
                        <option value="admin" <?php if($ex_type_1 == 'admin'){echo "selected";} ?> >Admin Area</option>
                      </select>
            
            <br><br>
            
            *JavaScript: <br>
            <textarea rows="8" cols="80" id="insert_js_js" name="insert_js_content_1" class="ic_text_area"><?php echo $content_1; ?></textarea>
            
        </div>
        
        
    </div>
    <!-- End of Insert JS div -->
    
    
        
    
    <!-- Start of Embed Header Footer div -->
    <div id="embed" class="ic_edit">
        
        
        <div class="icp_div_2">
            <center><p><i>Embed Script in Header or Footer Area</i></p></center>
            <br>
            Embed In: <select id="embed_area" name="embed_ex_type_1">
                        <option value="head" <?php if($ex_type_1 == 'head'){echo "selected";} ?> >Header Area</option>
                        <option value="foot" <?php if($ex_type_1 == 'foot'){echo "selected";} ?> >Footer Area</option>
                      </select>
            
            <br><br>
            
            *Content: <br>
            <?php wp_editor( wp_kses_post($content_1),"embed_content", array('textarea_rows'=>10, 'textarea_name'=>'embed_content_1')); ?>
            
        </div>
        
        
    </div>
    <!-- End of Embed Header Footer div -->
    
    
    
    
    <!-- Start of CSS individual div -->
    <div id="css_individual" class="ic_edit">
        
        <div class="icp_div_2">
            <center><p><i>Insert CSS in Page or Post Using Shortcode</i></p></center>
            
            *CSS: <br>
            <textarea rows="8" cols="80" id="css_individual_css" name="css_individual_content_1" class="ic_text_area"><?php echo $content_1; ?></textarea>
        
        
        </div>
        
    </div>
    <!-- End of CSS individual div -->
    
    
    
    
    <!-- Start of JS individual div -->
    <div id="js_individual" class="ic_edit">
        
        <div class="icp_div_2">
            <center><p><i>Insert JavaScript in Page or Post Using Shortcode</i></p></center>
            
            *JavaScript: <br>
            <textarea rows="8" cols="80" id="js_individual_js" name="js_individual_content_1" class="ic_text_area"><?php echo $content_1; ?></textarea>
        
        
        </div>
        
    </div>
    <!-- End of JS individual div -->
    
    
    
    
    <!-- Start of embed PDF div -->
    <div id="pdf" class="ic_edit">
        
        <div class="icp_div_2">
            <center><p><i>Embed PDF Anywhere Using Shortcode</i></p></center>
            
            Width: <input type="text" id="pdf_width" name="pdf_data_1" size="10" value="<?php echo $data_1; ?>" style="margin-right: 30%;">
            Height: <input type="text" id="pdf_height" name="pdf_data_2" value="<?php echo $data_2; ?>" size="10" >
            
            <br><br>
            
            *PDF (Enter PDF file link or upload with <b>Add Media</b>): <br><br>
            <?php wp_editor( wp_kses_post($content_1),"pdf_content", array('textarea_rows'=>3, 'textarea_name'=>'pdf_content_1')); ?>
            
            <br><br>
            
            CSS Style:<br>
            <textarea rows="4" cols="80" id="pdf_style" name="pdf_content_style" class="ic_text_area"><?php echo $content_2; ?></textarea>
        
        </div>
        
    </div>
    <!-- End of embed PDF div -->
    
    
    
    
    <!-- Start of Youtube video div -->
    <div id="youtube" class="ic_edit">
        
        <div class="icp_div_2">
            <center><p><i>Embed Youtube Video Anywhere Using Shortcode</i></p></center>
            
            Width: <input type="text" id="youtube_width" name="youtube_data_1" value="<?php echo $data_1; ?>" size="10" style="margin-right: 30%;">
            Height: <input type="text" id="youtube_height" name="youtube_data_2" value="<?php echo $data_2; ?>" size="10" >
            
            <br><br>
            
            *Video Link or Video ID: <br>
            <textarea rows="2" cols="80" id="youtube_link" name="youtube_content_1" class="ic_text_area"><?php echo $content_1; ?></textarea>
            
            <br><br>
            
            CSS Style:<br>
            <textarea rows="4" cols="80" id="youtube_style" name="youtube_content_style" class="ic_text_area"><?php echo $content_2; ?></textarea>
        
        </div>
        <!-- End of Youtube video div -->
        
    </div>
	
	
	
	
	
	<!-- Start of PHP snippet div -->
    <div id="php" class="ic_edit">
        
        <div class="icp_div_2">
            <center><p><i>It's Recommended Not to Use, If You Are Not Good at It.<br>Wrong Codes Can Break Your Site!<br>Don't Use PHP Start & End Tags.</i></p></center>
            
			<br>
			*Use In/With <select id="use_in_with" name="php_shortcode">
                        <option value="yes" <?php if($shortcode == 'yes'){echo "selected";} ?> >With Shortcode</option>
                        
                      </select>
			
			<br><br>
			
            *PHP Code: <br>
            <textarea rows="8" cols="80" id="php_code_insert" name="php_content_1" class="ic_text_area"><?php echo $content_1; ?></textarea>
			
			<br><br>
			
			Description: <br>
            <textarea rows="3" cols="80" id="php_code_insert" name="php_content_2" class="ic_text_area"><?php echo $content_2; ?></textarea>
        
        
        </div>
        
    </div>
    <!-- End of PHP snippet div -->
	
	
	
	
	
	
	
	
	



</div>
 <!-- End of Main div -->
 
 
    <input type="submit" value="Update" name="ic_edit_submit" id="ic_edit_button_id" class="icp_button_1">
 
 
    </form>
 <!-- End of the form -->
    
    
    
    <?php
	
	
	
    
    
    
    
    }
    //end of foreach
	
}
//end of function

?>