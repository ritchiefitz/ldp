<?php 
/**
 * @package WordPress
 * @subpackage Willbridge
 * @since Willbridge 1.0
 * 
 * Button Shortcodes Script
 * Created by CMSMasters
 * 
 */


define('DOING_AJAX', true);
define('WP_ADMIN', true);

require_once('../../../../../../../wp-load.php');
require_once('../../../../../../../wp-admin/includes/admin.php');

do_action('admin_init');

if (!is_user_logged_in()) {
	die(__('You must be logged in to access this page', 'cmsmasters') . '.');
}

if (isset($_GET['content']) && $_GET['content'] != '') {
	$content = htmlspecialchars(stripslashes($_GET['content']));
} else {
	$content = ''; 
}

?>
<style type="text/css">
    #TB_window {
        font:13px sans-serif;
        overflow-x:hidden;
        overflow-y:auto;
    }
	
    #TB_ajaxContent h3 {
        margin-bottom:1em;
    }
    
    #TB_ajaxContent .media-item .describe {
        border-top:0;
    }
	
    #mColorPicker {
        z-index:999999;
    }
</style>
<script type="text/javascript">
    jQuery(document).ready(function () {
	
        jQuery('input[type="color"]').mColorPicker( { "imageFolder" : '<?php echo get_template_directory_uri(); ?>/theme/administrator/images/mColorPicker/' } );
        
        jQuery(window).resize(function () {
            if (jQuery('#TB_window').height() - 44 > jQuery('.popup_content').height() + 20) {
                jQuery('#TB_ajaxContent').height(jQuery('#TB_window').height() - 44);
            } else {
                jQuery('#TB_ajaxContent').height(jQuery('.popup_content').height() + 20);
            }
        } );
		
    } );
    
    function insertShortcode() {
        if (window.tinyMCE) {
            var shortcode_tag = '', 
				popup_tr_value = jQuery('#TB_ajaxContent .popup_tr_value'), 
				but_text = jQuery('#button_text').val(), 
				but_link = jQuery('#button_link').val(), 
				but_type = jQuery('#button_type').val(), 
				but_bg = jQuery('#button_bg').val();
				but_color = jQuery('#button_color').val();
				but_target = jQuery('#button_target'), 
				but_lightbox = jQuery('#button_lightbox');
            
            for (var i = 0, ilength = popup_tr_value.length; i < ilength; i += 1) {
                popup_tr_value[i].style.removeProperty('border');
                
                if (popup_tr_value.eq(i).attr('aria-required') === 'true') {
                    if (popup_tr_value.eq(i).val() === '' || popup_tr_value.eq(i).val() === ' ') {
                        alert('<?php _e('Enter required fields!', 'cmsmasters'); ?>');
                        
                        popup_tr_value.eq(i).css('border', '1px solid #ff0000').focus();
                        
                        return false;
                    }
                }
            }
            
            shortcode_tag = '[button link="' + but_link + '" type="' + but_type + '"';
             
            if (but_bg !== '' && but_bg !== ' ') {
                shortcode_tag += ' bgcolor="' + but_bg + '"';
            }
            
            if (but_color !== '' && but_color !== ' ') {
                shortcode_tag += ' textcolor="' + but_color + '"';
            }
            
            if (but_target.is(':checked')) {
                shortcode_tag += ' target="' + but_target.val() + '"';
            }
            
            if (but_lightbox.is(':checked')) {
                shortcode_tag += ' lightbox="' + but_lightbox.val() + '"';
            }
            
            shortcode_tag += ']' + but_text + '[/button]';
            
            window.tinyMCE.activeEditor.selection.setContent(shortcode_tag);
            edInsertContent('', shortcode_tag);
            
            tb_remove();
        }
        
        return false;
    }
    
    function closePopup() {
        tb_remove();
        
        return false;
    }
</script>
<div class="popup_content">
    <h3 class="media-title" style="width:598px;"><?php echo __('Set Your Custom', 'cmsmasters') . ' ' . __('Button', 'cmsmasters') . ' ' . __('Shortcode Options', 'cmsmastes'); ?></h3>
    <div id="media-items" class="media-upload-form">
        <div class="media-item">
            <table class="describe">
                <tbody>
                    <tr>
                        <th class="label" valign="top" style="width:130px; padding-top:15px;" scope="row">
                            <span class="alignleft">
                                <label for="button_text"><?php _e('Text', 'cmsmasters'); ?></label>
                            </span>
                            <span class="alignright">
                                <abbr class="required" title="<?php _e('required', 'cmsmasters'); ?>">*</abbr>
                            </span>
                        </th>
                        <td class="field" style="padding-top:10px;">
                            <input type="text" value="<?php echo $content; ?>" name="button_text" id="button_text" aria-required="true" class="popup_tr_value" />
                        </td>
                    </tr>
                    <tr>
                        <th class="label" valign="top" style="width:130px; padding-top:15px;" scope="row">
                            <span class="alignleft">
                                <label for="button_link"><?php _e('Link', 'cmsmasters'); ?></label>
                            </span>
                            <span class="alignright">
                                <abbr class="required" title="<?php _e('required', 'cmsmasters'); ?>">*</abbr>
                            </span>
                        </th>
                        <td class="field" style="padding-top:10px;">
                            <input type="text" value="" name="button_link" id="button_link" aria-required="true" class="popup_tr_value" />
                        </td>
                    </tr>
                    <tr>
                        <th class="label" valign="top" style="width:130px; padding-top:15px;" scope="row">
                            <span class="alignleft">
                                <label for="button_type"><?php _e('Type', 'cmsmasters'); ?></label>
                            </span>
                            <span class="alignright">
                                <abbr class="required" title="<?php _e('required', 'cmsmasters'); ?>">*</abbr>
                            </span>
                        </th>
                        <td class="field" style="padding-top:10px;">
                            <select name="button_type" id="button_type" aria-required="true" class="popup_tr_value">
                                <option value="button"><?php _e('Small button', 'cmsmasters'); ?>&nbsp;</option>
                                <option value="button_medium"><?php _e('Medium button', 'cmsmasters'); ?>&nbsp;</option>
                                <option value="button_large"><?php _e('Large button', 'cmsmasters'); ?>&nbsp;</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th class="label" valign="top" style="width:130px; padding-top:15px;" scope="row">
                            <span class="alignleft">
                                <label for="button_bg"><?php _e('Bg. Color #1', 'cmsmasters'); ?></label>
                            </span>
                        </th>
                        <td class="field" style="padding-top:10px;">
                            <input id="button_bg" type="color" name="button_bg" value="#ffffff" data-hex="true" class="popup_tr_value" style="width:80px" />

                        </td>
                    </tr>
                    <tr>
                        <th class="label" valign="top" style="width:130px; padding-top:15px;" scope="row">
                            <span class="alignleft">
                                <label for="button_color"><?php _e('Text Color', 'cmsmasters'); ?></label>
                            </span>
                        </th>
                        <td class="field" style="padding-top:10px;">
                            <input id="button_color" type="color" name="button_color" value="#ffffff" data-hex="true" class="popup_tr_value" style="width:80px" />
                        </td>
                    </tr>
                    <tr>
                        <th class="label" valign="top" style="width:130px; padding-top:15px;" scope="row">
                            <span class="alignleft">
                                <label for="button_target"><?php _e('Target', 'cmsmasters'); ?></label>
                            </span>
                        </th>
                        <td class="field" style="padding-top:15px;">
                            <input type="checkbox" value="_blank" name="button_target" id="button_target" class="popup_tr_value" />
                            <label for="button_target"><?php _e('Open link in a new tab/window', 'cmsmasters'); ?></label>
                        </td>
                    </tr>
                    <tr>
                        <th class="label" valign="top" style="width:130px; padding-top:15px;" scope="row">
                            <span class="alignleft">
                                <label for="button_lightbox"><?php _e('Lightbox', 'cmsmasters'); ?></label>
                            </span>
                        </th>
                        <td class="field" style="padding-top:15px;">
                            <input type="checkbox" value="true" name="button_lightbox" id="button_lightbox" class="popup_tr_value" />
                            <label for="button_lightbox"><?php _e('Open link in a lightbox', 'cmsmasters'); ?></label>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div style="overflow:hidden; width:598px; padding:15px 10px 0 15px;">
        <div style="float: left">
            <input type="button" id="cancel" class="button" name="cancel" value="<?php _e('Cancel', 'cmsmasters'); ?>" onclick="closePopup();" />
        </div>
        <div style="float: right">
            <input type="submit" id="insert" class="button-primary" name="insert" value="<?php _e('Insert Shortcode', 'cmsmasters'); ?>" onclick="insertShortcode();" />
        </div>
    </div>
</div>
