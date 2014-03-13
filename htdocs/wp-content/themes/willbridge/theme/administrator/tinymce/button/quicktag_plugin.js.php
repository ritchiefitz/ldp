<?php 
/**
 * @package WordPress
 * @subpackage Willbridge
 * @since Willbridge 1.0
 * 
 * Button Quick Tags Script
 * Created by CMSMasters
 * 
 */


define('DOING_AJAX', true);
define('WP_ADMIN', true);

require_once('../../../../../../../wp-load.php');
require_once('../../../../../../../wp-admin/includes/admin.php');

do_action('admin_init');

if (!is_user_logged_in()) {
	die(__('You must be logged in to access this script', 'cmsmasters') . '.');
}

?>
edButtons[edButtons.length] = new edButton(
    'cmsms_button', 
    'button', 
    '[button link="#" type="button" bgcolor="" textcolor="" target="_self" lightbox="false" ]', 
    '[/button]' 
);
