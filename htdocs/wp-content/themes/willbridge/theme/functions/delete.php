<?php
/**
 * @package WordPress
 * @subpackage Willbridge
 * @since Willbridge 1.0
 * 
 * Theme Icons Delete
 * Created by CMSMasters
 * 
 */


if ($_POST['file']) { 
	$deletefile = '../../images/theme_icons/' . $_POST['file']; 
}

if (file_exists($deletefile)) {
	unlink($deletefile);
} else {
	echo 'error';
}

?>