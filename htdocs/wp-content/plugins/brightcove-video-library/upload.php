<?php

// Include the BCMAPI SDK
require_once("../../../wp-load.php");
require 'class.phpmailer.php';
require('bc-mapi.php');

// Instantiate the class, passing it our Brightcove API tokens (read, then write)
$bc = new BCMAPI(
'5lr_GNp0hRM6wYM1r_lfuSZBSAGKVt94K2Kgb4sBLHNSKxdZg6qLOA..',
'6FHUqplUwtI-VGmNoT9_fKuqoKqNHzFmazmVce4w8SZPSiLdFLjkMQ..'
 );
// at this point it will separate for uploading vs. editing
//-------------------UPLOAD----------------//
if($_POST['action'] == 'upload' && current_user_can('edit_posts')){	
	$rawTags = Array(); 
	$tags = Array(); // only valid entries will be put into this array
	if($_POST['tags'] != ''){
		$rawTags = explode(",", $_POST['tags']);
		for($i = 0; $i < sizeof($rawTags); $i++){
			$rawTags[$i] = trim($rawTags[$i]);
			if($rawTags[$i] != ''){
				$tags[] = $rawTags[$i];
			}
		}
	}
	// Create an array of meta data from our form fields
	$metaData = array(
		'name' => $_POST['title'],
		'shortDescription' => $_POST['desc'],
		'tags' => $tags
	);

	// Option
	$options = array(
		'create_multiple_renditions'=>true,
		'encode_to'=>'MP4'
	);
	
	// move the file to the uploads directory instead of temp, because it can get cleared before it finished uploading
	$upload_dir = wp_upload_dir();
	$path = $upload_dir['path'];
	rename($_FILES['file']['tmp_name'], $path.'/'.$_FILES['file']['name']);
	$file = $path.'/'.$_FILES['file']['name'];

	$user_info = wp_get_current_user();
	$user_email = $user_info->user_email;
	//// Upload the video and give the user their ID
	$response;	
	$jsResponse = "";
		try{
			$response = $bc->createMedia('video', $file, $metaData, $options);
			
			if(is_numeric($response)){
			//send the id back to the browser
				$jsResponse .= "<p>Finished! Your video ID is <b>" . $response . ".</b> It won't be available in the gallery immediately, but you can attach it to a post.</p>";
			
				//send the confirmation email
				$message = "<p>Your video, \"" . $_POST['title'] . "\" has been uploaded successfully.";
				$message .= "<br />Your video ID is " . $response . ", you can use the id to attach the video to a post";
				$message .= "<br />Please note the video may not be available to view yet because it's being processed.</p>";
	
				$mailer = new PHPMailer();
				$mailer->IsMail();
	
				$mailer->AddReplyTo("no_reply@byuicomm.net", "I~Comm Student Media");
				$mailer->AddAddress($user_email);
				$mailer->SetFrom("no_reply@byuicomm.net", "I~Comm Student Media");
				$mailer->Subject = "Video Uploaded - I~Comm";
	
				$mailer->AltBody = $message;
				$mailer->MsgHTML($message);
			
				try{
					$mailer->Send();
					$jsResponse .= '<p>You will recieve a confirmation email containing your video id at <b>'. $user_email .'</b></p>';
				}catch(Exception $e){
					$jsResponse .= '<p>There is no email address associated with your account, so you won\'t recieve a confirmation email.</p>';	
				}
				echo $jsResponse;
			  }else{
				echo "<p><b>There was an error uploading your video</b></p>";
				emailAdmin($user_email);
			   }
			
		}catch(Exception $e){
			//email admin because it failed
			echo "<p><b>There was an error uploading your video</b></p>";
			emailAdmin($user_email, $e);
		}
		unlink($file); //Deletes the file
	//-----------------------EDIT-------------------//
	}else if($_POST['action'] == 'edit' && current_user_can('edit_pages')){
		try{
			// --validate nonce-- //
			if(!wp_verify_nonce($_POST['edit-form-nonce'],'edit-form-nonce')) 
				{echo 'Update failed'; die();} 
			$tags = Array();
			if($_POST['tag-input'] != ''){
				$tags = explode(",", $_POST['tag-input']);
				for($i = 0; $i < sizeof($tags); $i++){
					$tags[$i] = trim($tags[$i]);
				}
			}
			// Create an array of meta data from our form fields
			$metaData = array(
				'id' => $_POST['videoID'],
				'name' => $_POST['title'],
				'shortDescription' => $_POST['desc'],
				'tags' => $tags
			);
			$response = $bc->update('video',$metaData);
			$message = "<ul><li><b>Video Updated Successfully!</b></li>";
			$message .= "<li>Title: ".$response->name."</li>";
			$message .= "<li>Description: ".$response->shortDescription."</li>";
			$message .= "<li>Tags: ";
			foreach($response->tags as $count => $tag){
				if($count != 0) $message .= ',';
				$message .= $tag;
			}
			$message .= "</li>";
			$message .= "<li>Please not that these changes won't take effect immediately</li></ul>";
			
			print_r($message);
			
		}catch(Exception $e){
			echo "<b>There was an error updating the video. Make sure you filled out all fields correctly</b>";	
			//print_r($e);
		}
	//---------------------DELETE--------------------//
	}else if($_POST['action'] == 'delete' && current_user_can('edit_pages')){
		try{
			// --validate nonce-- //
			if(!wp_verify_nonce($_POST['delete-form-nonce'],'delete-form-nonce')) 
				{echo 'Delete failed'; die();} 
				
			$bc->delete('video', $_POST['videoID']);
			echo "<p><b>Video deleted.</b> Changes won't take effect immediately</p>"; 
		}catch(Exception $e){
			echo "Failed to delete the video";
		}
	}
			
			
	//attempt to email the admin when uploading fails
	function emailAdmin($email, $error = "unidentified error"){
		$message = "Email : ".$email;
		$message .= "<br />";
		$message .= $error;

		$mailer = new PHPMailer();
		$mailer->IsMail();

		$mailer->AddReplyTo("no_reply@byuicomm.net", "I~Comm Student Media");
		$mailer->AddAddress('rykerblunck@gmail.com');
		$mailer->SetFrom("no_reply@byuicomm.net", "I~Comm Student Media");
		$mailer->Subject = "UPLOAD FAILED";

		$mailer->AltBody = $message;
		$mailer->MsgHTML($message);
		
		$mailer->Send();
	}
	
?>