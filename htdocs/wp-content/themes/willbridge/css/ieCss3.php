<?php
/**
 * @package WordPress
 * @subpackage Willbridge
 * @since Willbridge 1.0
 * 
 * CSS 3 Rules for IE < 9
 * Created by CMSMasters
 * 
 */


header('Content-type: text/css');
require('../../../../wp-load.php');

?>

span.dropcap2,  
.button,
.button > span, 
.button_medium,
.button_medium >span,  
.button_large,  
.button_large > span, 
.cmsmsLike, 
#slide_top,
.cmsms_slides_nav,
a.cmsms_prev_slide,
a.cmsms_next_slide,
.cmsms_rounding, 
.widget_custom_popular_portfolio_entries figure img,
.tp-bullets,
.tp-leftarrow, 
.tp-rightarrow {behavior:url(<?php echo get_template_directory_uri(); ?>/css/pie.htc);}

.p_options_block .button, 
.p_options_block .button span {behavior:none;}
