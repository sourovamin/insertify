<?php


function ic_add_new_display(){
    
    $categories = get_categories();
    
    ?>
    
   <script>
	jQuery(document).ready(function () {
		jQuery("#insert_in_post_after_para").hide();
    jQuery("#insert_in_post_position").change(function(){
        var op_val = jQuery(this).val();
        if (op_val == "after-para") {
            jQuery("#insert_in_post_after_para").show();
		}
    })
	});
	
	
	function ic_validate_add_new() {
        //alert("Bla Bla Bla");
        //return false;
		var j_type = document.getElementById("ic_type_select").value;
		var j_name = document.getElementById("ic_entry_name").value;
		var temp;
		
		switch(j_type){
			case "insert_in_post":
				temp = document.getElementById("insert_in_post_content").value;
				break;
			case "insert_css":
				temp = document.getElementById("insert_css_css").value;
				break;
			case "insert_js":
				temp = document.getElementById("insert_js_js").value;
				break;
			case "embed":
				temp = document.getElementById("embed_content").value;
				break;
			case "css_individual":
				temp = document.getElementById("css_individual_css").value;
				break;
			case "js_individual":
				temp = document.getElementById("js_individual_js").value;
				break;
			case "pdf":
				temp = document.getElementById("pdf_content").value;
				break;
			case "youtube":
				temp = document.getElementById("youtube_link").value;
				break;
			case "php":
				temp = document.getElementById("php_code_insert").value;
				break;
		}
		
		if (temp == "" || j_name == "" || !j_type) {
            alert("Please Fill All The Required *Fields!");
			return false;
        }
		
    }
	</script>
   
   
	
	
    
    <!-- Start of the form -->
    <form id="ic_add_new_form" action="" method="post" onsubmit="return ic_validate_add_new()">
    
    <!-- Start of Main div -->
    <div class="icp_div_1">
	
    <!-- Start of Initial Components -->
        <div class="row">
            <div class="col-sm-10">	
            *Name:<input type="text" id="ic_entry_name" name="name" required>(should be unique)
            </div>
            <div class="col-sm-2">	
            *Active<br><label class="ic_switch"><input type="checkbox" name="activeness" checked><span class="ic_slider round"></span></label>
            </div>
        </div>


        *Type: 
        <select id="ic_type_select" name="type" required>
          <option value="insert_in_post">Insert Ad/Content</option>
          <option value="insert_css">Insert CSS</option>
          <option value="insert_js">Insert JS</option>
          <option value="embed">Header & Footer</option>
          <option value="css_individual">CSS (individual)</option>
          <option value="js_individual">JS (individual)</option>
          <option value="pdf">Embed PDF</option>
          <option value="youtube">Youtube Video</option>
		  <option value="php">PHP Snippet</option>
        </select>
    <!-- End of Initial Components -->
    

    <!-- Start of Insert in Post div -->
    <div id="insert_in_post" class="ic_type">
        <div class="icp_div_2">
            <center><p><i>Insert Ad/Contents to Posts in Different Positions Based on Categories</i></p></center>
            <br>
            Position in Post: <select id="insert_in_post_position" name="insert_in_post_ex_type_1">
                        <option value="start">Start</option>
                        <option value="end">End</option>
                        <option value="middle">Middle</option>
                        <option value="one-fourth">One-Fourth</option>
                        <option value="third-fourth">Third-Fourth</option>
						<option value="after-para">After Specific Para</option>
                      </select>
			
			<div id="insert_in_post_after_para">
				<br><br> After No. of Para: <input type="number" name="insert_in_post_number_1" value="2" min="0" step="1">
			</div>
			
            
            <br><br>
            
            Category: <select id="insert_in_post_category" name="insert_in_post_position_data_1">
                        <option value="all">All</option>
                        
                        <?php foreach($categories as $category){ ?>
                            <option value="<?php echo $category->name; ?>"> <?php echo $category->name; ?> </option>
                            
                        <?php } ?>
                        
                      </select>
            
            <br><br>
            
            *Content:
             <?php wp_editor("Content Here!","insert_in_post_content", array('textarea_rows'=>10, 'textarea_name'=>'insert_in_post_content_1')); ?>
            
        </div>
    </div>
    <!-- End of Insert in Post div -->
    
    
    
    
    <!-- Start of Insert CSS div -->
    <div id="insert_css" class="ic_type">
        
        <div class="icp_div_2">
            <center><p><i>Insert CSS for the Whole Site or the Admin Area</i></p></center>
            <br>
            Where To: <select id="insert_css_option" name="insert_css_ex_type_1">
                        <option value="site">Site</option>
                        <option value="admin">Admin Area</option>
                      </select>
            
            <br><br>
            
            *CSS: <br>
            <textarea rows="8" cols="80" id="insert_css_css" name="insert_css_content_1" class="ic_text_area"></textarea>
            
        </div>   
        
    </div>
    <!-- End of Insert CSS div -->
    
    
    
    
    
    <!-- Start of Insert JS div -->
    <div id="insert_js" class="ic_type">
        
        
        <div class="icp_div_2">
            <center><p><i>Insert JS for the Whole Site or the Admin Area</i></p></center>
            <br>
            Where To: <select id="insert_js_option" name="insert_js_ex_type_1">
                        <option value="site">Site</option>
                        <option value="admin">Admin Area</option>
                      </select>
            
            <br><br>
            
            *JavaScript: <br>
            <textarea rows="8" cols="80" id="insert_js_js" name="insert_js_content_1" class="ic_text_area"></textarea>
            
        </div>
        
        
    </div>
    <!-- End of Insert JS div -->
    
    
        
    
    <!-- Start of Embed Header Footer div -->
    <div id="embed" class="ic_type">
        
        
        <div class="icp_div_2">
            <center><p><i>Embed Script in Header or Footer Area</i></p></center>
            <br>
            Embed In: <select id="embed_area" name="embed_ex_type_1">
                        <option value="head">Header Area</option>
                        <option value="foot">Footer Area</option>
                      </select>
            
            <br><br>
            
            *Content: <br>
            <?php wp_editor("Content Here!","embed_content", array('textarea_rows'=>10, 'textarea_name'=>'embed_content_1')); ?>
            
        </div>
        
        
    </div>
    <!-- End of Embed Header Footer div -->
    
    
    
    
    <!-- Start of CSS individual div -->
    <div id="css_individual" class="ic_type">
        
        <div class="icp_div_2">
            <center><p><i>Insert CSS in Page or Post Using Shortcode</i></p></center>
            
            *CSS: <br>
            <textarea rows="8" cols="80" id="css_individual_css" name="css_individual_content_1" class="ic_text_area"></textarea>
        
        
        </div>
        
    </div>
    <!-- End of CSS individual div -->
    
    
    
    
    <!-- Start of JS individual div -->
    <div id="js_individual" class="ic_type">
        
        <div class="icp_div_2">
            <center><p><i>Insert JavaScript in Page or Post Using Shortcode</i></p></center>
            
            *JavaScript: <br>
            <textarea rows="8" cols="80" id="js_individual_js" name="js_individual_content_1" class="ic_text_area"></textarea>
        
        
        </div>
        
    </div>
    <!-- End of JS individual div -->
    
    
    
    
    <!-- Start of embed PDF div -->
    <div id="pdf" class="ic_type">
        
        <div class="icp_div_2">
            <center><p><i>Embed PDF Anywhere Using Shortcode</i></p></center>
            
            Width: <input type="text" id="pdf_width" name="pdf_data_1" value="100%" size="10" style="margin-right: 30%;">
            Height: <input type="text" id="pdf_height" name="pdf_data_2" value="600px" size="10" >
            
            <br><br>
            
            *PDF (Enter PDF file link or upload with <b>Add Media</b>): <br><br>
            <?php wp_editor("","pdf_content", array('textarea_rows'=>3, 'textarea_name'=>'pdf_content_1')); ?>
            
            <br><br>
            
            CSS Style:<br>
            <textarea rows="4" cols="80" id="pdf_style" name="pdf_content_style" class="ic_text_area"></textarea>
        
        </div>
        
    </div>
    <!-- End of embed PDF div -->
    
    
    
    
    <!-- Start of Youtube video div -->
    <div id="youtube" class="ic_type">
        
        <div class="icp_div_2">
            <center><p><i>Embed Youtube Video Anywhere Using Shortcode</i></p></center>
            
            Width: <input type="text" id="youtube_width" name="youtube_data_1" value="560px" size="10" style="margin-right: 30%;">
            Height: <input type="text" id="youtube_height" name="youtube_data_2" value="315px" size="10" >
            
            <br><br>
            
            *Video Link or Video ID: <br>
            <textarea rows="2" cols="80" id="youtube_link" name="youtube_content_1" class="ic_text_area"></textarea>
            
            <br><br>
            
            CSS Style:<br>
            <textarea rows="4" cols="80" id="youtube_style" name="youtube_content_style" class="ic_text_area"></textarea>
        
        </div>
        
    </div>

	<!-- End of Youtube video div -->
	
	
	
	
	
	<!-- Start of insert php div -->
    <div id="php" class="ic_type">
        
        <div class="icp_div_2">
            <center><p><i>It's Recommended Not to Use, If You Are Not Good at It.<br>Wrong Codes Can Break Your Site!<br>Don't Use PHP Start & End Tags.</i></p></center>
            
			<br>
			*Use In/With: <select id="use_in_with" name="php_shortcode">
                        <option value="yes">With Shortcode</option>
                      </select>
			
			<br><br>
			
            *PHP Code: <br>
            <textarea rows="8" cols="80" id="php_code_insert" name="php_content_1" class="ic_text_area"></textarea>
			
			<br><br>
			
			Description: <br>
            <textarea rows="3" cols="80" id="php_description_insert" name="php_content_2" class="ic_text_area"></textarea>
        
        
        </div>
        
    </div>
    <!-- End of insert php div -->
	
	
	
	
	
	
	
	
	

</div>
 <!-- End of Main div -->
 
 
    <input type="submit" value="Add Entry" name="ic_add_new_submit" class="icp_button_1">
 
 
    </form>
 <!-- End of the form -->
    
    
    
    <?php
    
}





?>