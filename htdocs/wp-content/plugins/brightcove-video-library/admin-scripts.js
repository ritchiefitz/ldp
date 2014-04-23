var formFeedback = document.createElement('div');
formFeedback.setAttribute('class','form-feedback');

function get_edit_form(){
    if(modVP != undefined)
        modVP.pause(true);
    jQuery('#current-video-head').html('Edit Video');
	var url = '/wp-content/plugins/brightcove-video-library/edit-form.php';
	
    jQuery('#exchangable').load(url, function(){
        //this stuff needs to be here becuase it's dynamically loaded and jQuery can't find it anywhere else in the code
        jQuery("#edit-box").hide();
        jQuery("#form-title").attr("value", currentVideoArray["name"]);
        jQuery("#desc").attr("value", currentVideoArray["shortDescription"]);
        jQuery("#form-submit").click(function(){
            jQuery("#edit-form").submit();
        });
		jQuery("#delete-yes").click(function(){
			jQuery("#delete-form").submit();
		});
        var tagString = "";
        for(var i = 0; i < currentVideoArray["tags"].length; i++){
            tagString += currentVideoArray["tags"][i];
			if(i != currentVideoArray["tags"].length - 1){
				tagString += ", ";
			}
        }
        
        jQuery("#tag-input").attr("value", tagString);
        jQuery("#edit-form-id").attr("value", videoID);
		
        jQuery('#edit-form').submit(function(e){
			e.preventDefault();
			//----------VALIDATE--------//
            if(!(jQuery('#form-title').val() == '' || jQuery('#desc').val() == '')){
			//----------SUBMIT----------//
				jQuery.post('/wp-content/plugins/brightcove-video-library/upload.php',jQuery(this).serialize(),
					function(data){
						jQuery(formFeedback).remove();
						jQuery(formFeedback).html(data);
						jQuery('#edit-form').after(formFeedback);
					}
				);
			}
			else{
				jQuery(formFeedback).remove();
				jQuery(formFeedback).html('<p><b>The Title and Description fields are required</b></p>');
				jQuery('#edit-form').after(formFeedback);
			}
			return false;
    	});
		
		jQuery('#delete-form-id').attr('value',videoID);
		
		jQuery('#delete-form').submit(function(e){
			e.preventDefault();
			jQuery.post('/wp-content/plugins/brightcove-video-library/upload.php',jQuery(this).serialize(),
				function(data){
					jQuery(formFeedback).remove();
					jQuery(formFeedback).html(data);
					jQuery('#delete-form').after(formFeedback);
				}
			);
			return false;
		});
		// ------ CHARACTER COUNTER FOR DESCRIPTION FIELD --------- //
		jQuery('.instructions span').html(250 - jQuery('#desc').val().length);	//this line makes it work on load
		jQuery('#desc').keyup(function(){
			jQuery('.instructions span').html(250 - jQuery(this).val().length);		
		});
    });
        
    jQuery('#mask').attr("onclick", "cancel_edit()");
    jQuery('#close-box').attr("onclick", "cancel_edit()");
    jQuery('#video-player').hide();
}

function cancel_edit(){
    close_box();
    jQuery('#mask').attr("onclick", "close_box()");
    jQuery("#edit-box").show();
    jQuery('#video-player').show();
    jQuery('#exchangable').load('/wp-content/plugins/brightcove-video-library/player.html');
}

function show_delete(){
    jQuery('#delete-form').show();
}
function hide_delete(){
    jQuery('#delete-form').hide();
}