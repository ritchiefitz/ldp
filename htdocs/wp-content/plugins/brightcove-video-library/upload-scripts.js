function get_upload_form(){
    
    jQuery('#exchangable').load('/wp-content/plugins/brightcove-video-library/upload-form.html', function(){
       jQuery('#jsonForm').show();
       jQuery('#video-player').hide();
       jQuery("#edit-box").hide();
       display_box("Upload a New Video");
       jQuery('#mask').attr("onclick", "");
	   
	   // ------ CHARACTER COUNTER FOR DESCRIPTION FIELD --------- //
		jQuery('#desc').keyup(function(){
			jQuery('.instructions span').html(250 - jQuery(this).val().length);		
		});
    });
}
