
jQuery(document).ready(function(){
    jQuery(".jq").click(function(){
        jQuery(this).hide();
    });
});




//JQuery to show only selected type and hide others

jQuery(document).ready(function () {
  jQuery("#ic_type_select").prop("selectedIndex", -1);
  jQuery('.ic_type').hide();
  //jQuery('#option1').show();
  jQuery('#ic_type_select').change(function () {
    jQuery('.ic_type').hide();
    jQuery('#'+jQuery(this).val()).show();
  })
});



//to show after para in insert in post


