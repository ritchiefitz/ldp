<?php
/**
 * @package WordPress
 * @subpackage Willbridge
 * @since Willbridge 1.0
 * 
 * Slider Template
 * Created by CMSMasters
 * 
 */


$slider_active = get_post_meta(get_the_ID(), 'slidertools_active', true);
$slidertools_slider_id = get_post_meta(get_the_ID(), 'slidertools_slider_id', true);

$sliderManager = new cmsmsSliderManager;
$sliderOptions = $sliderManager->getSlider($slidertools_slider_id);

if ($sliderOptions != false) {
	$sliderData = json_decode($sliderOptions['slider']);
}

$sliderType = $sliderData->header->slider_type;

if (isset($sliderData) && isset($sliderType)) {
	foreach ($sliderData->footer as $cat => $val) {
		foreach ($val as $f_name => $f_val) {
			$sliderParameters['slider'][$f_name] = $f_val;
		}
	}
	
	switch ($sliderType) {
	case 'responsive':
		wp_enqueue_script('responsiveSlider');
		
		?>
		<script type="text/javascript">
			jQuery(document).ready(function () { 
				jQuery('#slider').cmsmsResponsiveSlider( { 
					animationSpeed : <?php echo ($sliderParameters['slider']['slider_animation'] != '') ? (int) ($sliderParameters['slider']['slider_animation'] * 1000) : '600'; ?>, 
					animationEffect : '<?php echo ($sliderParameters['slider']['slider_effect'] != '') ? $sliderParameters['slider']['slider_effect'] : 'fade'; ?>', 
					animationEasing : '<?php echo ($sliderParameters['slider']['slider_easing'] != '') ? $sliderParameters['slider']['slider_easing'] : 'easeInOutExpo'; ?>', 
					pauseTime : <?php echo ($sliderParameters['slider']['slider_pause'] != '') ? (int) ($sliderParameters['slider']['slider_pause'] * 1000) : '7000'; ?>, 
					activeSlide : <?php echo ($sliderParameters['slider']['active_slide'] != '') ? $sliderParameters['slider']['active_slide'] : '1'; ?>, 
					buttonControls : <?php echo ($sliderParameters['slider']['button_controls'] == 'true') ? 'true' : 'false'; ?>, 
					touchControls : <?php echo ($sliderParameters['slider']['touch_controls'] == 'true') ? 'true' : 'false'; ?>, 
					pauseOnHover : <?php echo ($sliderParameters['slider']['pause_on_hover'] == 'true') ? 'true' : 'false'; ?>, 
					showCaptions : <?php echo ($sliderParameters['slider']['slides_caption'] == 'true') ? 'true' : 'false'; ?>, 
					arrowNavigation : <?php echo ($sliderParameters['slider']['arrow_navigation'] == 'true') ? 'true' : 'false'; ?>, 
					arrowNavigationHover : <?php echo ($sliderParameters['slider']['arrow_navigation_hover'] == 'true') ? 'true' : 'false'; ?>, 
					slidesNavigation : <?php echo ($sliderParameters['slider']['slides_navigation'] == 'true') ? 'true' : 'false'; ?>, 
					slidesNavigationHover : <?php echo ($sliderParameters['slider']['slides_navigation_hover'] == 'true') ? 'true' : 'false'; ?>, 
					showTimer : <?php echo ($sliderParameters['slider']['slider_timer'] == 'true') ? 'true' : 'false'; ?>, 
					timerHover : <?php echo ($sliderParameters['slider']['slider_timer_hover'] == 'true') ? 'true' : 'false'; ?> 
				} ); 
			} );
		</script>
		<?php 
		
		cmsmasters_responsive_slider(array( 
			'id' => $slidertools_slider_id, 
			'data' => $sliderData 
		));
		
		break;
	case 'revolution':
		wp_enqueue_style('revolutionSlider');
		wp_enqueue_script('revolutionSliderPlugin');
		wp_enqueue_script('revolutionSlider');
		
		?>
		<script type="text/javascript">
			jQuery(document).ready(function () { 
				if (jQuery.fn.cssOriginal !== undefined) {
					jQuery.fn.css = jQuery.fn.cssOriginal;
				}
				
				jQuery('.fullwidthbanner').revolution( { 
					delay : <?php echo ($sliderParameters['slider']['revolution_slider_delay'] != '') ? (int) ($sliderParameters['slider']['revolution_slider_delay'] * 1000) : '7000'; ?>, 
					startwidth : 1200, 
					startheight : <?php echo ($sliderParameters['slider']['revolution_slider_height'] != '') ? $sliderParameters['slider']['revolution_slider_height'] : '530'; ?>, 
					onHoverStop : '<?php echo ($sliderParameters['slider']['revolution_slider_pause_on_hover'] == 'true') ? 'on' : 'off'; ?>', 
					navigationType : '<?php if ($sliderParameters['slider']['revolution_slider_navi'] == 'true') { echo 'bullet';} else {echo 'none';} ?>', 
					navigationArrows : '<?php if ($sliderParameters['slider']['revolution_slider_navi'] == 'true') { echo 'nexttobullets';} else {echo 'none';} ?>', 
					navigationStyle : 'round', 
					touchenabled : '<?php echo ($sliderParameters['slider']['revolution_slider_touch'] == 'true') ? 'on' : 'off'; ?>', 
					navOffsetHorizontal : 0, 
					navOffsetVertical : 20, 
					fullWidth : 'on', 
					shadow : 0 
				} );
			} );
		</script>
		<?php 
		
		cmsmasters_revolution_slider(array( 
			'id' => $slidertools_slider_id, 
			'data' => $sliderData 
		));
		
		break;
	}
}