<?php


//start of the function for general shortcodes
function icp_plugin_shortcodes_func($atts){
    
    $a = shortcode_atts( array(
        'id' => 0,
        'name' => 'xyz-name-t',
    ),$atts);
    
    $id = $a['id'];
    $name = $a['name'];
    
    //connecting to database
    global $wpdb;
    $table_name = $wpdb->prefix.'insertify';
    
    //print_r($a);
    
    //connecting shortcode with database
    if($id != 0){
        $icdb = $wpdb->get_results( 
            "
            SELECT * 
            FROM $table_name
            WHERE id = '$id' AND shortcode = 'yes' AND activeness = 'yes'
            "
            );
    }
    
    
    elseif($name != "xyz-name-t"){
        $icdb = $wpdb->get_results( 
            "
            SELECT * 
            FROM $table_name
            WHERE name = '$name' AND shortcode = 'yes' AND activeness = 'yes'
            LIMIT 1
            "
            );
    }
    
    //end of connecting
    
    
    
    //retreiving data from database
    foreach($icdb as $icdb){
        
        //getting data in variable
        $type = $icdb->type;
        $ex_type_1 = $icdb->ex_type_1;
        $ex_type_2 = $icdb->ex_type_2;
        $content_1 = $icdb->content_1;
        $content_2 = $icdb->content_2;
        $content_3 = $icdb->content_3;
        $data_1 = $icdb->data_1;
        $data_2 = $icdb->data_2;
        $number_1 = $icdb->number_1;
        $number_2 = $icdb->number_2;
        $date_1 = $icdb->date_1;
        $date_2 = $icdb->date_2;
        $setting = $icdb->setting;
        
        
        
        //switch type for different types
        
        switch($type){
            
            //for inserting css in individual page or post
            case "css_individual":
                echo '<style>'.$content_1.'</style>';
                break;
            //end of inserting css
            
            
            //for inserting js in individual page or post
            case "js_individual":
                echo '<script>'.$content_1.'</script>';
                break;
            //end of inserting js
            
            
            
            //for inserting pdf
            case "pdf":
                
                //getting the link only
                if (strpos($content_1, '<a href') !== false){
                    $content_ex = explode('"',$content_1);
                     $content = $content_ex[1];
                }
                else{
                    $content = $content_1;
                }
                
                
                //start buffering to maintain html codes actual position
                ob_start();
                ?>
                
                <object width="<?php echo $data_1;?>" height="<?php echo $data_2;?>" data="<?php echo $content;?>" style="<?php echo $content_2;?>" >
                </object>
                
                <?php
                 return ob_get_clean();
                break;
            //end of inserting pdf
        
            
            
            //for inserting youtube
            case "youtube":
                
                if(strlen($content_1)<12){
                    $yt_out = "https://www.youtube.com/embed/".$content_1;
                }
                else{
                    $yt_out = str_replace("watch?v=","embed/",$content_1);
                }
                
                //start buffering to maintain html codes actual position
                ob_start();
                ?>
                
                <iframe width="<?php echo $data_1;?>" height="<?php echo $data_2;?>"
                src="<?php echo $yt_out?>" style="<?php echo $content_2;?>" >
                </iframe>
                
                <?php
                 return ob_get_clean();
                break;
            //end of inserting youtube
            
            
            
            
            //for inserting php
            case "php":
                
                //start buffering to maintain html codes actual position
                ob_start();
                    eval(wp_kses_post($content_1));   
                ob_end_flush();
                break;
            //end of inserting php
            
            
            
            
            
        }
        //end of switch
        
        
        
    }
    //end of foreach
    
       
}
//end of shortcode function




//adding shortcode
add_shortcode( 'insertify', 'icp_plugin_shortcodes_func' );





?>