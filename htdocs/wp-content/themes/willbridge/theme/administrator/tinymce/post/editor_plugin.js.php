<?php 
/**
 * @package WordPress
 * @subpackage Willbridge
 * @since Willbridge 1.0
 * 
 * Post Type Shortcode Script
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

if (!isset($cmsmasters_shortcode_post)) {
	$cmsmasters_shortcode_post = new CMSMastersPost();
}

?>
(function () {
	tinymce.create('tinymce.plugins.<?php echo $cmsmasters_shortcode_post->buttonName; ?>', {
		init : function (c, url) {
			c.addCommand('<?php echo $cmsmasters_shortcode_post->buttonName; ?>_command', function () {
				tb_show('<?php echo __('CMSMasters', 'cmsmasters') . ' ' . $cmsmasters_shortcode_post->buttonTitle . ' ' . __('Shortcode', 'cmsmasters'); ?>', '#TB_inline');
				jQuery('#TB_ajaxContent').load(url + '/editor_plugin_popup.php');
				jQuery('#TB_ajaxContent').css( { 
					width : jQuery('#TB_ajaxContent').parent().width() - 30,
					height : jQuery('#TB_ajaxContent').parent().height() - 47
				} );
			} );
			
			c.addButton('<?php echo $cmsmasters_shortcode_post->buttonName; ?>', {
				title : '<?php echo $cmsmasters_shortcode_post->buttonTitle; ?>',
				cmd : '<?php echo $cmsmasters_shortcode_post->buttonName; ?>_command'
			} );
		} , 
		createControl : function () {
            return null;
		} , 
		getInfo : function () {
			return {
				longname : '<?php echo $cmsmasters_shortcode_post->buttonTitle . ' ' . __('Shortcode', 'cmsmasters'); ?>',
				author : '<?php _e('CMSMasters', 'cmsmasters'); ?>',
				authorurl : 'http://cmsmasters.net',
				infourl : 'http://cmsmasters.net',
				version : '1.0'
			};
		}
	} );
	
	tinymce.PluginManager.add('<?php echo $cmsmasters_shortcode_post->buttonName; ?>', tinymce.plugins.<?php echo $cmsmasters_shortcode_post->buttonName; ?>);
} )();
