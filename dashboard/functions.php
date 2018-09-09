
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">



<?php



//function to hide div
function ic_hide_id($div_id_name){
    ?>
    <style><?php echo "#".$div_id_name; ?> {display: none;}</style>
    <?php
}
//end of function to hide div


//function to hide div
function ic_hide_class($div_id_name){
    ?>
    <style><?php echo ".".$div_id_name; ?> {display: none;}</style>
    <?php
}
//end of function to hide div




//function to show success message
function ic_operation_success($name='no'){
    ?>
    <div class="alert alert-success">
						Operation Successful!<br>
						Access the entry from <b>Insertify >> Entries</b>
                        <?php if($name != 'no'){ ?> <br>Apply shortcode (anywhere in your site): <b>[insertify name="<?php echo $name; ?>"]</b> <?php } ?>
	</div>
    <?php
}
//end of function




//function to show failed message
function ic_operation_failed(){
    ?>
	
	<script>
		window.alert("Operation Failed! Database Connection Failure!");
		location.reload();
	</script>
	
    <?php
}
//end of function




//start of add new button function
function add_new_button(){
    ?>
    
    
    <form action="<?php echo admin_url( 'admin.php?page=icps_add_new' ) ?>" method="post" id="ic_add_new_button">
        <input type="submit" value="Add New" class="icp_button_1">
    </form>
    
    
    <?php
    
    
}
//end of add new button function




//alert start
function ic_success_fail_alert($operation){
	if($operation){
		?>
			<div class="alert alert-success">
			<strong>Entry Updated!</strong> Operation Successful.
			</div>
		<?php
	}
	else{
		?>
			<div class="alert alert-danger">
			<strong>Nothing Updated!</strong>
			</div>
		<?php
	}
}
//alert end






//function to show success message
function ic_fill_req_field(){
    ?>
    <div class="alert alert-warning">
			<strong>Error!</strong> Plese fill all the required (*) fields!.			
	</div>
    <?php
}
//end of function











?>