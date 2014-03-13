<?php
/**
 * @package WordPress
 * @subpackage Willbridge
 * @since Willbridge 1.0
 * 
 * CMSMasters Shortcodes
 * Created by CMSMasters
 * 
 */


/**
 * Dropcaps Shortcodes
 */
function cmsmasters_dropcap($atts, $content = null) {
    return '<span class="dropcap">' . do_shortcode($content) . '</span>';
}

add_shortcode('dropcap', 'cmsmasters_dropcap');


function cmsmasters_dropcap2($atts, $content = null) {
    return '<span class="dropcap2">' . do_shortcode($content) . '</span>';
}

add_shortcode('dropcap2', 'cmsmasters_dropcap2');



/**
 * Button Shortcode
 */
function cmsmasters_button($atts, $content = null) {
	extract(shortcode_atts(array(
	'link' => '#',
	'type' => 'button',
	'bgcolor' => '',
	'textcolor' => '',
	'target' => '',
	'lightbox' => ''
	), $atts));

	$out = '';

	$out .= '<a href="' . $link . '"';

	$out .= ' class="' . $type . '';

	$out .= '"';

	if (trim($bgcolor) != '') {
	$out .= ' style="background-color:' . $bgcolor . '";';
	}

	if ($target == '_blank') {
	$out .= ' target="' . $target . '"';
	}

	if ($lightbox == 'true') {
	$out .= ' rel="prettyPhoto"';
	}

	$out .= ' alt="';
	$out .= do_shortcode($content);
	$out .= '">'; 
	$out .= '<span';

	if (trim($textcolor) != '') {
	$out .= ' style="color:' . $textcolor . ';"';
	}

	$out .= '>';

	$out .= do_shortcode($content);

	$out .= '</span>' . 
	'</a>';

	return $out;
}

add_shortcode('button', 'cmsmasters_button');



/**
 * Information Boxes Shortcodes
 */
function cmsmasters_success_box($atts, $content = null) {
    return '<aside class="box success_box">' . 
        '<table>' . 
            '<tbody>' . 
                '<tr>' . 
                    '<td>&nbsp;</td>' . 
                    '<td>' . do_shortcode($content) . '</td>' . 
                '</tr>' . 
            '</tbody>' . 
        '</table>' . 
    '</aside>';
}

add_shortcode('success_box', 'cmsmasters_success_box');


function cmsmasters_error_box($atts, $content = null) {
    return '<aside class="box error_box">' . 
        '<table>' . 
            '<tbody>' . 
                '<tr>' . 
                    '<td>&nbsp;</td>' . 
                    '<td>' . do_shortcode($content) . '</td>' . 
                '</tr>' . 
            '</tbody>' . 
        '</table>' . 
    '</aside>';
}

add_shortcode('error_box', 'cmsmasters_error_box');


function cmsmasters_download_box($atts, $content = null) {
    return '<aside class="box download_box">' . 
        '<table>' . 
            '<tbody>' . 
                '<tr>' . 
                    '<td>&nbsp;</td>' . 
                    '<td>' . do_shortcode($content) . '</td>' . 
                '</tr>' . 
            '</tbody>' . 
        '</table>' . 
    '</aside>';
}

add_shortcode('download_box', 'cmsmasters_download_box');


function cmsmasters_warning_box($atts, $content = null) {
    return '<aside class="box warning_box">' . 
        '<table>' . 
            '<tbody>' . 
                '<tr>' . 
                    '<td>&nbsp;</td>' . 
                    '<td>' . do_shortcode($content) . '</td>' . 
                '</tr>' . 
            '</tbody>' . 
        '</table>' . 
    '</aside>';
}

add_shortcode('warning_box', 'cmsmasters_warning_box');


function cmsmasters_notice_box($atts, $content = null) {
    return '<aside class="box notice_box">' . 
        '<table>' . 
            '<tbody>' . 
                '<tr>' . 
                    '<td>&nbsp;</td>' . 
                    '<td>' . do_shortcode($content) . '</td>' . 
                '</tr>' . 
            '</tbody>' . 
        '</table>' . 
    '</aside>';
}

add_shortcode('notice_box', 'cmsmasters_notice_box');



/**
 * Tabs & Toggles Shortcodes
 */
function cmsmasters_tabs($atts, $content = null) {
    $content = str_replace('[tab]', '<div class="tabs_tab">', str_replace('[/tab]', '</div>', do_shortcode($content)));
    
    $out = '<div class="tab">' . 
        '<ul class="tabs">';
    
    foreach ($atts as $tab) {
        $out .= '<li>' . 
            '<a href="#">' . $tab . '</a>' . 
        '</li>';
    }
    
    $out .= '</ul>' . 
        '<div class="tab_content">' . $content . '</div>' . 
    '</div>';
    
    return $out;
}

add_shortcode('tabs', 'cmsmasters_tabs');


function cmsmasters_toggle($atts, $content = null) {
    extract(shortcode_atts(array(
        'title' => ''
    ), $atts));
    
    $out = '<div class="togg">' . 
		'<a class="tog" href="#">' . 
			'<span class="cmsms_plus">' . 
				'<span class="vert_line"></span>' . 
				'<span class="horiz_line"></span>' . 
			'</span>' . 
			$title . 
		'</a>' . 
		'<div class="tab_content" style="display: none;">' . 
			do_shortcode($content) . 
		'</div>' . 
    '</div>';
    
    return $out;
}

add_shortcode('toggle', 'cmsmasters_toggle');


function cmsmasters_accordion($atts, $content = null) {
    $content = str_replace('<div class="togg">', '<div class="acc">', do_shortcode($content));
    $content = str_replace('<a class="tog" href="#">', '<a class="tog" href="#">', do_shortcode($content));
	
    $out = '<div class="accordion">' . $content . '</div>';
    
    return $out;
}

add_shortcode('accordion', 'cmsmasters_accordion');


function cmsmasters_tour($atts, $content = null) {
    $content = str_replace('[tour_tab]', '<div class="tour_box">', str_replace('[/tour_tab]', '</div>', do_shortcode($content)));
    
    $out = '<div class="tour_content">' . 
        '<ul class="tour fl">';
    
    foreach ($atts as $tour) {
        $out .= '<li>' . 
			'<a href="#">' . 
				'<span class="cmsms_plus">' . 
					'<span class="vert_line"></span>' . 
					'<span class="horiz_line"></span>' . 
				'</span>' .
				'<span class="tour_title">' . $tour . '</span>' . 
			'</a>' . 
		'</li>';
    }
    
    $out .= '</ul><div class="tour_shadow"></div>' . 
        $content . 
    '</div>';
    
    return $out;
}

add_shortcode('tour', 'cmsmasters_tour');



/**
 * Columns Shortcodes
 */
function cmsmasters_one_third($atts, $content = null) {
    return '<div class="one_third">' . do_shortcode($content) . '</div>';
}

add_shortcode('one_third', 'cmsmasters_one_third');


function cmsmasters_one_third_last($atts, $content = null) {
    return '<div class="one_third last">' . do_shortcode($content) . '</div>' . 
    '<div class="cl"></div>';
}

add_shortcode('one_third_last', 'cmsmasters_one_third_last');


function cmsmasters_two_third($atts, $content = null) {
    return '<div class="two_third">' . do_shortcode($content) . '</div>';
}

add_shortcode('two_third', 'cmsmasters_two_third');


function cmsmasters_two_third_last($atts, $content = null) {
    return '<div class="two_third last">' . do_shortcode($content) . '</div>' . 
    '<div class="cl"></div>';
}

add_shortcode('two_third_last', 'cmsmasters_two_third_last');


function cmsmasters_one_half($atts, $content = null) {
    return '<div class="one_half">' . do_shortcode($content) . '</div>';
}

add_shortcode('one_half', 'cmsmasters_one_half');


function cmsmasters_one_half_last($atts, $content = null) {
    return '<div class="one_half last">' . do_shortcode($content) . '</div>' . 
    '<div class="cl"></div>';
}

add_shortcode('one_half_last', 'cmsmasters_one_half_last');


function cmsmasters_one_fourth($atts, $content = null) {
    return '<div class="one_fourth">' . do_shortcode($content) . '</div>';
}

add_shortcode('one_fourth', 'cmsmasters_one_fourth');


function cmsmasters_one_fourth_last($atts, $content = null) {
    return '<div class="one_fourth last">' . do_shortcode($content) . '</div>' . 
    '<div class="cl"></div>';
}

add_shortcode('one_fourth_last', 'cmsmasters_one_fourth_last');


function cmsmasters_three_fourth($atts, $content = null) {
    return '<div class="three_fourth">' . do_shortcode($content) . '</div>';
}

add_shortcode('three_fourth', 'cmsmasters_three_fourth');


function cmsmasters_three_fourth_last($atts, $content = null) {
    return '<div class="three_fourth last">' . do_shortcode($content) . '</div>' . 
    '<div class="cl"></div>';
}

add_shortcode('three_fourth_last', 'cmsmasters_three_fourth_last');



/**
 * Dividers Shortcodes
 */
function cmsmasters_divider() {
    return '<div class="divider"></div>';
}

add_shortcode('divider', 'cmsmasters_divider');


function cmsmasters_divider_top() {
    return '<div class="divider">' . 
        '<a class="fr" href="#"><small class="color_2">' . __('Top', 'cmsmasters') . ' &uarr;</small></a>' . 
        '<div class="cl"></div>' . 
    '</div>';
}

add_shortcode('divider_top', 'cmsmasters_divider_top');


function cmsmasters_clear() {
    return '<div class="cl"></div>';
}

add_shortcode('clear', 'cmsmasters_clear');



/**
 * Video Shortcodes
 */
function cmsmasters_video_widget($atts) {
    extract(shortcode_atts(array(
        'url' => '' 
    ), $atts));
    
    $out = '<div class="resizable_block">' . 
		get_video_iframe($url) . 
	'</div>';
    
    return $out;
}

add_shortcode('video', 'cmsmasters_video_widget');


function cmsmasters_html5video_widget($atts, $content = null) {
    extract(shortcode_atts(array(
		'mp4' => '',
		'm4v' => '',
		'ogg' => '',
		'ogv' => '',
		'webm' => '',
		'webmv' => '',
		'poster' => '',
		'controls' => '',
		'autoplay' => '',
		'loop' => '',
		'preload' => ''
	), $atts));
	
    $out = '<div class="resizable_block">' . 
		'<video class="fullwidth"';
	
    if ($poster != '') {
        $out .= ' poster="' . $poster . '"';
    }
	
    if ($controls != '') {
        $out .= ' controls="controls"';
    }
	
    if ($autoplay != '') {
        $out .= ' autoplay="autoplay"';
    }
	
    if ($loop != '') {
        $out .= ' loop="loop"';
    }
	
    if ($preload != '') {
        $out .= ' preload="' . $preload . '"';
    }
	
    $out .= '>';
	
	if ($mp4 != '') {
        $out .= '<source src="' . $mp4 . '" type="video/mp4" />';
	}
	
	if ($m4v != '') {
        $out .= '<source src="' . $m4v . '" type="video/mp4" />';
	}
	
	if ($ogg != '') {
        $out .= '<source src="' . $ogg . '" type="video/ogg" />';
	}
	
	if ($ogv != '') {
        $out .= '<source src="' . $ogv . '" type="video/ogg" />';
	}
	
	if ($webm != '') {
        $out .= '<source src="' . $webm . '" type="video/webm" />';
	}
	
	if ($webmv != '') {
        $out .= '<source src="' . $webmv . '" type="video/webm" />';
	}
	
	$out .= do_shortcode($content) . 
		'</video>' . 
	'</div>';
	
    return $out;
}

add_shortcode('html5video', 'cmsmasters_html5video_widget');


function cmsmastersSingleVideoPlayer($atts, $content = null) {
    extract(shortcode_atts(array(
		'mp4' => '', 
		'm4v' => '', 
		'ogg' => '', 
		'ogv' => '', 
		'webm' => '', 
		'webmv' => '', 
		'poster' => '' 
	), $atts));
	
    $unique_id = uniqid();
	
    $out = '<script type="text/javascript"> ' . 
        'jQuery(document).ready(function () { ' . 
            "jQuery('#jquery_jplayer_" . $unique_id . "').jPlayer( { " . 
                'ready : function () { ' . 
                    "jQuery(this).jPlayer('setMedia', { ";

                    if ($mp4 != '') {
                        $out .= "m4v : '" . $mp4 . "', ";
                    }

                    if ($m4v != '') {
                        $out .= "m4v : '" . $m4v . "', ";
                    }

                    if ($ogg != '') {
                        $out .= "ogv : '" . $ogg . "', ";
                    }

                    if ($ogv != '') {
                        $out .= "ogv : '" . $ogv . "', ";
                    }

                    if ($webm != '') {
                        $out .= "webmv : '" . $webm . "', ";
                    }

                    if ($webmv != '') {
                        $out .= "webmv : '" . $webmv . "', ";
                    }

                        $out .= "poster : '" . $poster . "' " . 
                    '} ); ' . 
                '}, ' . 
                "cssSelectorAncestor : '#jp_container_" . $unique_id . "', " . 
                "swfPath : '" . get_template_directory_uri() . "/css/', " . 
                "supplied : 'mp4, m4v, ogg, ogv, webm, webmv', " . 
				'size : { ' . 
					"width : '100%', " . 
					"height : '100%' " . 
				'} ' . 
            '} ); ' . 
        '} ); ' . 
    '</script>' . 
    '<div id="jp_container_' . $unique_id . '" class="jp-video fullwidth">' . 
        '<div class="jp-type-single">' . 
			'<div id="jquery_jplayer_' . $unique_id . '" class="jp-jplayer"></div>' .
			'<div class="jp-gui">' . 
				'<div class="jp-video-play">' . 
					'<a href="javascript:;" class="jp-video-play-icon" tabindex="1" title="' . __('Play', 'cmsmasters') . '">' . __('Play', 'cmsmasters') . '</a>' . 
				'</div>' . 
				'<div class="jp-interface">' . 
					'<div class="jp-progress">' . 
						'<div class="jp-seek-bar">' . 
							'<div class="jp-play-bar"></div>' . 
						'</div>' . 
					'</div>' . 
					'<div class="jp-duration"></div>' . 
					'<div class="jp-time-sep">/</div>' . 
					'<div class="jp-current-time"></div>' . 
					'<div class="jp-controls-holder">' . 
						'<ul class="jp-controls">' . 
							'<li><a href="javascript:;" class="jp-play" tabindex="1" title="' . __('Play', 'cmsmasters') . '"><span>' . __('Play', 'cmsmasters') . '</span></a></li>' . 
							'<li><a href="javascript:;" class="jp-pause" tabindex="1" title="' . __('Pause', 'cmsmasters') . '"><span>' . __('Pause', 'cmsmasters') . '</span></a></li>' . 
							'<li class="li-jp-stop"><a href="javascript:;" class="jp-stop" tabindex="1" title="' . __('Stop', 'cmsmasters') . '"><span>' . __('Stop', 'cmsmasters') . '</span></a></li>' . 
						'</ul>' . 
						'<div class="jp-volume-bar">' . 
							'<div class="jp-volume-bar-value"></div>' . 
						'</div>' . 
						'<ul class="jp-toggles">' . 
							'<li><a href="javascript:;" class="jp-mute" tabindex="1" title="' . __('Mute', 'cmsmasters') . '"><span>' . __('Mute', 'cmsmasters') . '</span></a></li>' . 
							'<li><a href="javascript:;" class="jp-unmute" tabindex="1" title="' . __('Unmute', 'cmsmasters') . '"><span>' . __('Unmute', 'cmsmasters') . '</span></a></li>' . 
							'<li class="li-jp-full-screen"><a href="javascript:;" class="jp-full-screen" tabindex="1" title="' . __('Full Screen', 'cmsmasters') . '"><span>' . __('Full Screen', 'cmsmasters') . '</span></a></li>' . 
							'<li class="li-jp-restore-screen"><a href="javascript:;" class="jp-restore-screen" tabindex="1" title="' . __('Restore Screen', 'cmsmasters') . '"><span>' . __('Restore Screen', 'cmsmasters') . '</span></a></li>' . 
						'</ul>' . 
						'<div class="jp-title">' . 
							'<ul>' . 
								'<li></li>' . 
							'</ul>' . 
						'</div>' . 
					'</div>' . 
				'</div>' . 
				'<div class="jp-no-solution">' . 
					'<span>' . __('Update Required', 'cmsmasters') . ' </span>' . 
					__('To play the media you will need to either update your browser to a recent version or update your', 'cmsmasters') . ' <a href="http://get.adobe.com/flashplayer/" target="_blank">' . __('Flash plugin', 'cmsmasters') . '</a>.' . 
				'</div>' . 
			'</div>' . 
        '</div>' . 
    '</div>';
	
    return $out;
}

add_shortcode('single_video_player', 'cmsmastersSingleVideoPlayer');


function cmsmastersMultipleVideoPlayer($atts, $content = null) {
    $unique_id = uniqid();
	
	$out = '<script type="text/javascript"> ' . 
        'jQuery(document).ready(function () { ' . 
            'new jPlayerPlaylist( { ' . 
				"jPlayer : '#jquery_jplayer_" . $unique_id . "', " . 
                "cssSelectorAncestor : '#jp_container_" . $unique_id . "', " . 
			'}, [' . do_shortcode($content) . '], { ' . 
                "swfPath : '" . get_template_directory_uri() . "/css/', " . 
                "supplied : 'mp4, m4v, ogg, ogv, webm, webmv', " . 
				'size : { ' . 
					"width : '100%', " . 
					"height : '100%' " . 
				'} ' . 
            '} ); ' . 
        '} ); ' . 
    '</script>' . 
    '<div id="jp_container_' . $unique_id . '" class="jp-video fullwidth playlist">' . 
		'<div class="jp-type-playlist">' . 
			'<div class="jp-type-list-parent">' . 
				'<div class="jp-type-list">' . 
					'<div id="jquery_jplayer_' . $unique_id . '" class="jp-jplayer"></div>' . 
					'<div class="jp-gui">' . 
						'<div class="jp-video-play">' . 
							'<a href="javascript:;" class="jp-video-play-icon" tabindex="1" title="' . __('Play', 'cmsmasters') . '">' . __('Play', 'cmsmasters') . '</a>' . 
						'</div>' . 
						'<div class="jp-interface">' . 
							'<div class="jp-progress">' . 
								'<div class="jp-seek-bar">' . 
									'<div class="jp-play-bar"></div>' . 
								'</div>' . 
							'</div>' . 
							'<div class="jp-duration"></div>' . 
							'<div class="jp-time-sep">/</div>' . 
							'<div class="jp-current-time"></div>' . 
							'<div class="jp-controls-holder">' . 
								'<ul class="jp-controls">' . 
									'<li><a href="javascript:;" class="jp-play" tabindex="1" title="' . __('Play', 'cmsmasters') . '"><span>' . __('Play', 'cmsmasters') . '</span></a></li>' . 
									'<li><a href="javascript:;" class="jp-pause" tabindex="1" title="' . __('Pause', 'cmsmasters') . '"><span>' . __('Pause', 'cmsmasters') . '</span></a></li>' . 
									'<li class="li-jp-stop"><a href="javascript:;" class="jp-stop" tabindex="1" title="' . __('Stop', 'cmsmasters') . '"><span>' . __('Stop', 'cmsmasters') . '</span></a></li>' . 
									'<li class="li-jp-previous"><a href="javascript:;" class="jp-previous" tabindex="1" title="' . __('Previous', 'cmsmasters') . '"><span>' . __('Previous', 'cmsmasters') . '</span></a></li>' . 
									'<li class="li-jp-next"><a href="javascript:;" class="jp-next" tabindex="1" title="' . __('Next', 'cmsmasters') . '"><span>' . __('Next', 'cmsmasters') . '</span></a></li>' . 
								'</ul>' . 
								'<div class="jp-volume-bar">' . 
									'<div class="jp-volume-bar-value"></div>' . 
								'</div>' . 
								'<ul class="jp-toggles">' . 
									'<li><a href="javascript:;" class="jp-mute" tabindex="1" title="' . __('Mute', 'cmsmasters') . '"><span>' . __('Mute', 'cmsmasters') . '</span></a></li>' . 
									'<li><a href="javascript:;" class="jp-unmute" tabindex="1" title="' . __('Unmute', 'cmsmasters') . '"><span>' . __('Unmute', 'cmsmasters') . '</span></a></li>' . 
									'<li class="li-jp-full-screen"><a href="javascript:;" class="jp-full-screen" tabindex="1" title="' . __('Full Screen', 'cmsmasters') . '"><span>' . __('Full Screen', 'cmsmasters') . '</span></a></li>' . 
									'<li class="li-jp-restore-screen"><a href="javascript:;" class="jp-restore-screen" tabindex="1" title="' . __('Restore Screen', 'cmsmasters') . '"><span>' . __('Restore Screen', 'cmsmasters') . '</span></a></li>' . 
								'</ul>' . 
								'<div class="jp-title">' . 
									'<ul>' . 
										'<li></li>' . 
									'</ul>' . 
								'</div>' . 
							'</div>' . 
						'</div>' . 
						'<div class="jp-no-solution">' . 
							'<span>' . __('Update Required', 'cmsmasters') . '</span>' . 
							__('To play the media you will need to either update your browser to a recent version or update your', 'cmsmasters') . ' <a href="http://get.adobe.com/flashplayer/" target="_blank">' . __('Flash plugin', 'cmsmasters') . '</a>.' . 
						'</div>' . 
					'</div>' . 
				'</div>' . 
			'</div>' . 
			'<div class="jp-playlist">' . 
				'<ul>' . 
					'<li>' . 
						'<div>' . 
							'<a href="javascript:;" class="jp-playlist-item-remove"></a>' . 
							'<a href="javascript:;" class="jp-playlist-item"></a>' . 
						'</div>' . 
					'</li>' . 
				'</ul>' . 
			'</div>' . 
		'</div>' . 
    '</div>';
	
    return $out;
}

add_shortcode('multiple_video_player', 'cmsmastersMultipleVideoPlayer');


function cmsmastersPlaylistVideo($atts, $content = null) {
    extract(shortcode_atts(array(
		'mp4' => '',
		'm4v' => '',
		'ogg' => '',
		'ogv' => '',
		'webm' => '',
		'webmv' => '',
		'poster' => '',
		'title' => ''
	), $atts));
	
    $out = '{ ';

    if ($mp4 != '') {
        $out .= "m4v : '" . $mp4 . "', ";
    }

    if ($m4v != '') {
        $out .= "m4v : '" . $m4v . "', ";
    }

    if ($ogg != '') {
        $out .= "ogv : '" . $ogg . "', ";
    }

    if ($ogv != '') {
        $out .= "ogv : '" . $ogv . "', ";
    }

    if ($webm != '') {
        $out .= "webmv : '" . $webm . "', ";
    }

    if ($webmv != '') {
        $out .= "webmv : '" . $webmv . "', ";
    }

        $out .= "poster : '" . $poster . "', " . 
        "title : '" . $title . "' " . 
    '}';
	
    return $out;
}

add_shortcode('video_playlist', 'cmsmastersPlaylistVideo');



/**
 * Audio Shortcodes
 */
function cmsmasters_html5audio_widget($atts, $content = null) {
    extract(shortcode_atts(array(
        'mp3' => '',
        'mp4' => '',
        'm4a' => '',
        'ogg' => '',
        'oga' => '',
        'webm' => '',
        'webma' => '',
        'wav' => '',
		'preload' => 'none',
		'controls' => '',
		'autoplay' => '',
		'loop' => ''
	), $atts));
	
    $out = '<audio style="width:100%;"';
	
    if ($controls != '') {
        $out .= ' controls="' . $controls . '"';
    }
	
    if ($autoplay != '') {
        $out .= ' autoplay="' . $autoplay . '"';
    }
	
    if ($loop != '') {
        $out .= ' loop="' . $loop . '"';
    }
	
    if ($preload != 'preload') {
        $out .= ' preload="' . $preload . '"';
    } else {
        $out .= ' preload=""';
    }
	
    $out .= '>';
	
    if ($mp3 != '') {
        $out .= '<source src="' . $mp3 . '" type="audio/mpeg" />';
    }
	
    if ($mp4 != '') {
        $out .= '<source src="' . $mp4 . '" type="audio/mpeg" />';
    }
	
    if ($m4a != '') {
        $out .= '<source src="' . $m4a . '" type="audio/mpeg" />';
    }
	
    if ($ogg != '') {
        $out .= '<source src="' . $ogg . '" type="audio/ogg" />';
    }
	
    if ($oga != '') {
        $out .= '<source src="' . $oga . '" type="audio/ogg" />';
    }
	
    if ($webm != '') {
        $out .= '<source src="' . $webm . '" type="audio/webm" />';
    }
	
    if ($webma != '') {
        $out .= '<source src="' . $webma . '" type="audio/webm" />';
    }
	
    if ($wav != '') {
        $out .= '<source src="' . $wav . '" type="audio/wav" />';
    }
	
    $out .= do_shortcode($content) . 
    '</audio>';
	
    return $out;
}

add_shortcode('html5audio', 'cmsmasters_html5audio_widget');


function cmsmastersSingleAudioPlayer($atts, $content = null) {
    extract(shortcode_atts(array(
        'mp3' => '',
        'mp4' => '',
        'm4a' => '',
        'ogg' => '',
        'oga' => '',
        'webma' => '',
        'webm' => '',
        'wav' => '' 
    ), $atts));
    
    $unique_id = uniqid();
    
    $out = '<script type="text/javascript"> ' . 
        'jQuery(document).ready(function () { ' . 
            "jQuery('#jquery_jplayer_" . $unique_id . "').jPlayer( { " . 
                'ready : function () { ' . 
                    "jQuery(this).jPlayer('setMedia', { ";

                    if ($mp3 != '') {
                        $out .= "m4a : '" . $mp3 . "', ";
                    }

                    if ($mp4 != '') {
                        $out .= "m4a : '" . $mp4 . "', ";
                    }

                    if ($m4a != '') {
                        $out .= "m4a : '" . $m4a . "', ";
                    }

                    if ($ogg != '') {
                        $out .= "oga : '" . $ogg . "', ";
                    }

                    if ($oga != '') {
                        $out .= "oga : '" . $oga . "', ";
                    }

                    if ($webma != '') {
                        $out .= "webma : '" . $webma . "', ";
                    }

                    if ($webm != '') {
                        $out .= "webma : '" . $webm . "', ";
                    }

                    if ($wav != '') {
                        $out .= "wav : '" . $wav . "', ";
                    }

                    $out .= '} ); ';

                    $out = str_replace(', }', ' }', $out);

                $out .= '} , ' . 
                "cssSelectorAncestor : '#jp_container_" . $unique_id . "', " . 
                "swfPath : '" . get_template_directory_uri() . "/css/', " . 
                "supplied : 'mp3, m4a, ogg, oga, webm, webma, wav', " . 
                "wmode : 'window' " . 
            '} ); ' . 
        '} ); ' . 
    '</script>' . 
    '<div id="jquery_jplayer_' . $unique_id . '" class="jp-jplayer" style="display:none;"></div>' . 
    '<div id="jp_container_' . $unique_id . '" class="jp-audio">' . 
        '<div class="jp-type-single">' . 
			'<div class="jp-gui jp-interface">' . 
				'<div class="jp-progress">' . 
					'<div class="jp-seek-bar">' . 
						'<div class="jp-play-bar"></div>' . 
					'</div>' . 
				'</div>' . 
				'<div class="jp-duration"></div>' . 
				'<div class="jp-time-sep">/</div>' . 
				'<div class="jp-current-time"></div>' .
				'<div class="jp-controls-holder">' .  
					'<ul class="jp-controls">' . 
						'<li><a href="javascript:;" class="jp-play" tabindex="1" title="' . __('Play', 'cmsmasters') . '"><span>' . __('Play', 'cmsmasters') . '</span></a></li>' . 
						'<li><a href="javascript:;" class="jp-pause" tabindex="1" title="' . __('Pause', 'cmsmasters') . '"><span>' . __('Pause', 'cmsmasters') . '</span></a></li>' . 
						'<li><a href="javascript:;" class="jp-stop" tabindex="1" title="' . __('Stop', 'cmsmasters') . '"><span>' . __('Stop', 'cmsmasters') . '</span></a></li>' . 
					'</ul>' . 
					'<div class="jp-volume-bar">' . 
						'<div class="jp-volume-bar-value"></div>' . 
					'</div>' . 
					'<ul class="jp-toggles">' . 
						'<li><a href="javascript:;" class="jp-mute" tabindex="1" title="' . __('Mute', 'cmsmasters') . '"><span>' . __('Mute', 'cmsmasters') . '</span></a></li>' . 
						'<li><a href="javascript:;" class="jp-unmute" tabindex="1" title="' . __('Unmute', 'cmsmasters') . '"><span>' . __('Unmute', 'cmsmasters') . '</span></a></li>' . 
					'</ul>' . 
				'</div>' . 
			'</div>' . 
			'<div class="jp-title">' . 
				'<ul>' . 
					'<li></li>' . 
				'</ul>' . 
			'</div>' . 
			'<div class="jp-no-solution">' . 
				'<span>' . __('Update Required', 'cmsmasters') . '</span>' . 
				__('To play the media you will need to either update your browser to a recent version or update your', 'cmsmasters') . ' <a href="http://get.adobe.com/flashplayer/" target="_blank">' . __('Flash plugin', 'cmsmasters') . '</a>.' . 
			'</div>' . 
        '</div>' . 
    '</div>';
    
    return $out;
}

add_shortcode('single_audio_player', 'cmsmastersSingleAudioPlayer');


function cmsmastersMultipleAudioPlayer($atts, $content = null) {
    $unique_id = uniqid();

    $out = '<script type="text/javascript"> ' . 
        'jQuery(document).ready(function () { ' . 
            'new jPlayerPlaylist( { ' . 
				"jPlayer : '#jquery_jplayer_" . $unique_id . "', " . 
                "cssSelectorAncestor : '#jp_container_" . $unique_id . "' " . 
			'} , [' . do_shortcode($content) . '], { ' . 
                "swfPath : '" . get_template_directory_uri() . "/css/', " . 
                "supplied : 'mp3, m4a, ogg, oga, webm, webma, wav', " . 
                "wmode : 'window' " . 
            '} ); ' . 
        '} ); ' . 
    '</script>' . 
    '<div id="jquery_jplayer_' . $unique_id . '" class="jp-jplayer" style="display:none;"></div>' . 
	'<div id="jp_container_' . $unique_id . '" class="jp-audio">' . 
		'<div class="jp-type-playlist">' . 
			'<div class="jp-gui jp-interface">' . 
				'<div class="jp-progress">' . 
					'<div class="jp-seek-bar">' . 
						'<div class="jp-play-bar"></div>' . 
					'</div>' . 
				'</div>' . 
				'<div class="jp-duration"></div>' . 
				'<div class="jp-time-sep">/</div>' . 
				'<div class="jp-current-time"></div>' . 
				'<div class="jp-controls-holder">' .  
					'<ul class="jp-controls">' . 
						'<li><a href="javascript:;" class="jp-play" tabindex="1" title="' . __('Play', 'cmsmasters') . '"><span>' . __('Play', 'cmsmasters') . '</span></a></li>' . 
						'<li><a href="javascript:;" class="jp-pause" tabindex="1" title="' . __('Pause', 'cmsmasters') . '"><span>' . __('Pause', 'cmsmasters') . '</span></a></li>' . 
						'<li><a href="javascript:;" class="jp-stop" tabindex="1" title="' . __('Stop', 'cmsmasters') . '"><span>' . __('Stop', 'cmsmasters') . '</span></a></li>' . 
						'<li><a href="javascript:;" class="jp-previous" tabindex="1" title="' . __('Previous', 'cmsmasters') . '"><span>' . __('Previous', 'cmsmasters') . '</span></a></li>' . 
						'<li><a href="javascript:;" class="jp-next" tabindex="1" title="' . __('Next', 'cmsmasters') . '"><span>' . __('Next', 'cmsmasters') . '</span></a></li>' . 
					'</ul>' . 
					'<div class="jp-volume-bar">' . 
						'<div class="jp-volume-bar-value"></div>' . 
					'</div>' . 
					'<ul class="jp-toggles">' . 
						'<li><a href="javascript:;" class="jp-mute" tabindex="1" title="' . __('Mute', 'cmsmasters') . '"><span>' . __('Mute', 'cmsmasters') . '</span></a></li>' . 
						'<li><a href="javascript:;" class="jp-unmute" tabindex="1" title="' . __('Unmute', 'cmsmasters') . '"><span>' . __('Unmute', 'cmsmasters') . '</span></a></li>' . 
					'</ul>' . 
				'</div>' . 
            '</div>' . 
			'<div class="jp-title">' . 
				'<ul>' . 
					'<li></li>' . 
				'</ul>' . 
			'</div>' . 
			'<div class="jp-no-solution">' . 
				'<span>' . __('Update Required', 'cmsmasters') . '</span>' . 
				__('To play the media you will need to either update your browser to a recent version or update your', 'cmsmasters') . ' <a href="http://get.adobe.com/flashplayer/" target="_blank">' . __('Flash plugin', 'cmsmasters') . '</a>.' . 
			'</div>' . 
        '</div>' . 
		'<div class="jp-playlist">' . 
			'<ul>' . 
				'<li>' . 
					'<div>' . 
						'<a href="javascript:;" class="jp-playlist-item-remove"></a>' . 
						'<a href="javascript:;" class="jp-playlist-item"></a>' . 
					'</div>' . 
				'</li>' . 
			'</ul>' . 
		'</div>' . 
    '</div>';
    
    return $out;
}

add_shortcode('multiple_audio_player', 'cmsmastersMultipleAudioPlayer');


function cmsmastersPlaylistAudio($atts, $content = null) {
    extract(shortcode_atts(array(
        'mp3' => '',
        'mp4' => '',
        'm4a' => '',
        'ogg' => '',
        'oga' => '',
        'webm' => '',
        'webma' => '',
        'wav' => '',
        'title' => ''
    ), $atts));
    
    $out = '{ ';

    if ($mp3 != '') {
        $out .= "m4a : '" . $mp3 . "', ";
    }

    if ($mp4 != '') {
        $out .= "m4a : '" . $mp4 . "', ";
    }

    if ($m4a != '') {
        $out .= "m4a : '" . $m4a . "', ";
    }

    if ($ogg != '') {
        $out .= "oga : '" . $ogg . "', ";
    }

    if ($oga != '') {
        $out .= "oga : '" . $oga . "', ";
    }

    if ($webma != '') {
        $out .= "webma : '" . $webma . "', ";
    }

    if ($webm != '') {
        $out .= "webma : '" . $webm . "', ";
    }

    if ($wav != '') {
        $out .= "wav : '" . $wav . "', ";
    }

    $out .= "title : '" . $title . "' " . 
    '}';
    
    return $out;
}

add_shortcode('audio_playlist', 'cmsmastersPlaylistAudio');



/**
 * Post Types Shortcodes
 */
function posttype_shortcode($atts, $content = null) {
    extract(shortcode_atts(array(
        'post_type' => 'post',
        'post_sort' => 'latest',
        'post_category' => '',
        'post_number' => '3',
        'post_scroll' => 'false',
        'shortcode_title' => ''
    ), $atts));
    
	global $page_layout;
	
    $uuid = uniqid();
	
    $queryArgs = array( 
		'posts_per_page' => $post_number, 
		'post_status' => 'publish', 
		'ignore_sticky_posts' => 1, 
		'post_type' => $post_type 
	);
	
    switch ($post_sort) {
    case 'category':
        if ($post_type == 'post') {
            $queryArgs['category_name'] = $post_category;
        } else {
            $queryArgs['tax_query'] = array(
                array( 
                    'taxonomy' => 'pt-categ', 
                    'field' => 'slug', 
                    'terms' => array($post_category) 
                )
            );
        }
        
        break;
    case 'popular':
        $queryArgs['order'] = 'DESC';
        $queryArgs['orderby'] = 'meta_value';
        $queryArgs['meta_key'] = 'cmsms_likes';
        
        break;
    }
    
    $out = '<section id="portfolio_shortcode_'.$uuid.'" class="post_type_shortcode">';
    $out .= '<h3>';
        if($shortcode_title != ''){
            $out .= $shortcode_title;
        }
    $out .= '</h3>';
    if($post_scroll == 'true'){
		$out .= "<script type=\"text/javascript\">
			jQuery(document).ready(function () { 
				jQuery('#portfolio_shortcode_$uuid .post_type_list').cmsmsResponsiveContentSlider( { 
					sliderWidth : '100%', 
					sliderHeight : 'auto', 
					animationSpeed : 500, 
					animationEffect : 'slide', 
					animationEasing : 'easeInOutExpo', 
					pauseTime : 0, 
					activeSlide : 1, 
					touchControls : true, 
					pauseOnHover : false, 
					arrowNavigation : true, 
					slidesNavigation : false 
				} );
			} );
		</script>";
	$out .= '<ul class="post_type_list responsiveContentSlider">'.
	'<li class="latest_item">';
    }else{
    $out .= '<ul class="post_type_list">'.
		'<li class="latest_item">';
    }
    $col_counter = 0;
    $posttype_query = new WP_Query($queryArgs);
    
    if ($posttype_query->have_posts()) :
        while ($posttype_query->have_posts()) : $posttype_query->the_post();
			$out .= '<article class="'; 
			if ($post_type == 'post') {
				$out .= 'blog';
			} else {
				$out .= 'portfolio';
			}
			$out .= ' hentry'.(($page_layout == 'nobg') ? ' one_fourth' : ' one_third') . '">' . 
				'<div class="portfolio_inner">' . 
					'<div class="portfolio_inner_box">';
			
			if ($post_type == 'portfolio') {
				$project_format = get_post_meta(get_the_ID(), 'pt_format', true);
				
				$type = $project_format;
			} else {
				$type = get_post_format();
			}
			
			$attachments =& get_children(array(
				'post_type' => 'attachment', 
				'post_mime_type' => 'image', 
				'post_parent' => get_the_ID(), 
				'orderby' => 'menu_order', 
				'order' => 'ASC' 
			));
			
			if ($type == 'slider' || $type == 'album' || $type == 'gallery') {
				if (has_post_thumbnail()) {
					$out .= cmsms_thumb(get_the_ID(), 'project-thumb', true, false, true, false, true, false, false);
				} elseif (sizeof($attachments) > 0) {
					if (isset($counter)) {
						unset($counter);
					}
					
					foreach ($attachments as $attachment) {
						if (!isset($counter) && $counter = true) {
							$out .= cmsms_thumb(get_the_ID(), 'project-thumb', true, false, true, false, true, false, $attachment->ID);
						}
					}
				} else {
					$out .= '<figure>' . 
						'<a class="preloader" href="' . get_permalink() . '"' . ' title="' . cmsms_title(get_the_ID(), false) . '">' . 
							'<img src="' . get_template_directory_uri() . '/images/PT-gallery.jpg' . '" alt="' . cmsms_title(get_the_ID(), false) . '" title="' . cmsms_title(get_the_ID(), false) . '" class="fullwidth" />' . 
						'</a>' . 
					'</figure>';
				}
			} else {
				if (has_post_thumbnail()) {
					$out .= cmsms_thumb(get_the_ID(), 'project-thumb', true, false, true, false, true, false, false);
				} else {
					$out .= '<figure>' . 
						'<a class="preloader" href="' . get_permalink() . '"' . ' title="' . cmsms_title(get_the_ID(), false) . '">' . 
							'<img src="' . get_template_directory_uri() . '/images/PT-' . (($type == 'image' || $type == '') ? 'placeholder' : $type) . '.jpg' . '" alt="' . cmsms_title(get_the_ID(), false) . '" title="' . cmsms_title(get_the_ID(), false) . '" class="fullwidth" />' . 
						'</a>' . 
					'</figure>';
				}
			}
			
			$out .= '<header class="entry-header">' . 
					'<h6 class="entry-title">' . 
						'<a href="' . get_permalink() . '">' . cmsms_title(get_the_ID(), false) . '</a>' . 
					'</h6>' . 
				'</header>';
			
			$out .= '<div class="hover_effect">' . 
				'<h5 class="entry-title">' . 
					'<a href="' . get_permalink() . '">' . cmsms_title(get_the_ID(), false) . '</a>' . 
				'</h5>';
			
			$out .= '<div class="hover_effect_links">' . 
				'<a class="cmsms_link" href="' . get_permalink() . '"></a>' . 
			'</div>';
			
			if ($post_type == 'post') {
				if (get_the_category()) {
					$out .= '<div class="post_category">' . 
						get_the_category_list(', ') . 
					'</div>';
				}
			} else {
				if (get_the_terms(get_the_ID(), 'pt-sort-categ')) {
						$out .= '<div class="post_category">' . 
							get_the_term_list(get_the_ID(), 'pt-sort-categ', '', ', ', '').
						'</div>';
				}
			}
					$out .= '</div>' . 
					'</div>' . 
				'</div>' . 
			'</article>';
			
			$col_counter++;
			if ($page_layout == 'nobg' && $col_counter == 4) {

					if ($posttype_query->current_post+1 == $posttype_query->post_count) :

					else:
							$out .= '</li><li class="latest_item">';
					endif;
					$col_counter = 0;
			} elseif ($page_layout != 'nobg' && $col_counter == 3) {
					if ($posttype_query->current_post+1 == $posttype_query->post_count) :

					else:
							$out .= '</li><li class="latest_item">';
					endif;
					$col_counter = 0;
			}
        endwhile;
    endif;
        $out .= "</li></ul>";
    
    $out .= '</section>';
    
    wp_reset_postdata();
    
    return $out;
}

add_shortcode('posttype', 'posttype_shortcode');



/**
 * Contact Form Shortcode
 */
function custom_contact_form_sc($atts, $content = null) {
    extract(shortcode_atts(array(
        'formname' => '',
        'email' => ''
    ), $atts));
	
	wp_enqueue_script('validator');
	wp_enqueue_script('validatorLanguage');
    
    $out = cmsmasters_contact_form($formname, $email);
    
    return $out;
}

add_shortcode('contactform', 'custom_contact_form_sc');



/**
 * Google Map Shortcode
 */
function cmsmasters_googlemap($atts, $content = null) {
    extract(shortcode_atts(array(
        'map_type' => 'ROADMAP',
        'zoom' => '14',
        'address' => '',
        'latitude' => '',
        'longitude' => '',
        'marker' => '',
        'popup_html' => '',
        'popup' => 'false',
        'scroll_wheel' => 'false',
        'map_type_control' => 'false',
        'zoom_control' => 'false',
        'pan_control' => 'false',
        'scale_control' => 'false',
        'street_view_control' => 'false'
    ), $atts));
    
	wp_enqueue_script('gMapAPI');
	wp_enqueue_script('gMap');
    
    $id = uniqid();
	
    if (isset($latitude) && isset($longitude) && !empty($latitude) && !empty($longitude)) {
        $l = 'latitude : ' . $latitude . ', ' . 
        'longitude : ' . $longitude . ', ';
    } else {
        $l = '';
    }
    
    if (isset($marker) && $marker == 'true') {
        if (isset($latitude) && isset($longitude) && !empty($latitude) && !empty($longitude)) {
            $location = 'markers : [ { ' . 
                $l . 
                'html : "' . $popup_html . '", ' . 
                'popup : ' . $popup . 
            ' } ] , ';
        } else {
            $location = 'markers : [ { ' . 
                'address : "' . $address . '", ' . 
                'html : "' . $popup_html . '", ' . 
                'popup : ' . $popup . 
            ' } ] , ';
        }
    } else {
        if (isset($latitude) && isset($longitude) && !empty($latitude) && !empty($longitude)) {
            $location = $l;
        } else {
            $location = 'address : "' . $address . '", ';
        }
    }
    
    $options = $location . 
    'zoom : ' . $zoom . ', ' . 
    'maptype : google.maps.MapTypeId.' . $map_type . ', ' . 
    'scrollwheel : ' . $scroll_wheel . ', ' . 
    'mapTypeControl : ' . $map_type_control . ', ' . 
    'zoomControl : ' . $zoom_control . ', ' . 
    'panControl : ' . $pan_control . ', ' . 
    'scaleControl : ' . $scale_control . ', ' . 
    'streetViewControl : ' . $street_view_control;
    
    $out = '<div class="resizable_block">' . 
		'<div id="google_map_' . $id . '" class="google_map fullwidth"></div>' . 
	'</div>' . 
    '<script type="text/javascript">' . 
        'jQuery(document).ready(function () { ' . 
            'jQuery("#google_map_' . $id . '").gMap( { ' . $options . ' } );' . 
        ' } );' . 
    '</script>';
    
    return $out;
}

add_shortcode('googlemap', 'cmsmasters_googlemap');



/**
 * Content Slider Shortcode
 */
function cmsmasters_content_slider($atts, $content = null) {
    extract(shortcode_atts(array(
		'height' => 'auto', 
		'animation_speed' => '500', 
		'effect' => 'slide', 
		'easing' => 'easeInOutExpo', 
		'pause_time' => '7000', 
		'active_slide' => '1', 
		'pause_on_hover' => 'false', 
		'touch_control' => 'true', 
		'slides_control' => 'true', 
		'slides_control_hover' => 'false', 
		'arrow_control' => 'false', 
		'arrow_control_hover' => 'false' 
	), $atts));
	
    $id = uniqid();
	$images = explode(',', do_shortcode($content));
	
    $out = '<div class="shortcode_slideshow slider_shortcode" id="slideshow_' . $id . '">' . 
		'<div class="shortcode_slideshow_body">' . 
			'<script type="text/javascript">' . 
				'jQuery(document).ready(function () { ' . 
					"jQuery('#slideshow_" . $id . " .shortcode_slideshow_slides').cmsmsResponsiveContentSlider( { " . 
						"sliderWidth : '100%', " . 
						"sliderHeight : " . (($height == 'auto') ? "'auto'" : $height) . ", " . 
						'animationSpeed : ' . ($animation_speed * 1000) . ', ' . 
						"animationEffect : '" . $effect . "', " . 
						"animationEasing : '" . $easing . "', " . 
						'pauseTime : ' . ($pause_time * 1000) . ', ' . 
						'activeSlide : ' . $active_slide . ', ' . 
						'pauseOnHover : ' . (($pause_on_hover == 'true') ? 'true' : 'false') . ', ' . 
						'touchControls : ' . (($touch_control == 'true') ? 'true' : 'false') . ', ' . 
						'slidesNavigation : ' . (($slides_control == 'true') ? 'true' : 'false') . ', ' . 
						'slidesNavigationHover : ' . (($slides_control_hover == 'true') ? 'true' : 'false') . ', ' . 
						'arrowNavigation : ' . (($arrow_control == 'true') ? 'true' : 'false') . ', ' . 
						'arrowNavigationHover : ' . (($arrow_control_hover == 'true') ? 'true' : 'false') . ' ' . 
					'} ); ' . 
				'} );' . 
			'</script>' . 
			'<div class="shortcode_slideshow_container">' . 
				'<ul class="shortcode_slideshow_slides responsiveContentSlider">';
	
	foreach ($images as $image) { 
		$out .= '<li>' . 
			'<figure>' . 
				'<img src="' . $image . '" alt="" class="fullwidth" />' . 
			'</figure>' . 
		'</li>';
	}
	
    $out .= '</ul>' . 
			'</div>' . 
		'</div>' . 
	'</div>' . 
	'<br />';
	
    return $out;
}

add_shortcode('content_slider', 'cmsmasters_content_slider');




/**
 * Main Responsive Slider Shortcode
 */
function cmsmasters_responsive_slider($atts, $content = null) {
    extract(shortcode_atts(array(
		'id' => '', 
		'data' => '' 
	), $atts));
	
	if (isset($id) && isset($data)) {
		foreach ($data->footer as $cat => $val) {
			foreach ($val as $f_name => $f_val) {
				$parameters['slider'][$f_name] = $f_val;
			}
		}
		
        foreach ($data->slides as $slide => $val) {
            foreach ($val->header as $f_name => $f_val) {
                $slideParameters['slider']['slides'][$slide][$f_name] = $f_val;
            }
			
            if (isset($val->footer) && !empty($val->footer)) {
                foreach ($val->footer as $cat => $c_val) {
                    foreach ($c_val as $f_name => $f_val) {
                        $slideParameters['slider']['slides'][$slide][$f_name] = $f_val;
                    }
                }
            }
        }
		
		$out = '<ul id="slider" class="responsiveSlider" style="padding-bottom:' . $parameters['slider']['slider_height'] . '%;">';
		
		foreach ($slideParameters['slider']['slides'] as $slide) {
			$upload_img = $slide['upload_img'];
			$slide_title = $slide['slide_title'];
			$show_caption = $slide['show_caption'];
			$slide_caption_pos = $slide['slide_caption_pos'];
			$caption_title = $slide['caption_title'];
			$caption_subtitle = $slide['caption_subtitle'];
			$caption_text = $slide['caption_text'];
			$caption_link_enable = $slide['caption_link_enable'];
			$slide_caption_text_or_button = $slide['slide_caption_text_or_button'];
			$slide_caption_url_text = $slide['slide_caption_url_text'];
			$slide_link_text_value = $slide['slide_link_text_value'];
			$slide_link_target = $slide['slide_link_target'];
			$slide_add_video = $slide['slide_add_video'];
			$slide_video_url = $slide['slide_video_url'];
			$slide_img_pos = $slide['slide_img_pos'];
			$slide_as_link_add = $slide['slide_as_link_add'];
			$slide_as_link_url = $slide['slide_as_link_url'];
			$slide_as_link_target = $slide['slide_as_link_target'];
			
			$out .= '<li class="' . $slide_img_pos . '"';
			
			if ($slide_add_video == 'true' && $slide_video_url != '') {
				$out .= ' data-video="' . $slide_video_url . '"';
			}
			
			if (is_page_template('splash.php')) {
			$out .= ' style="background-image:url(' . $upload_img . ');"';
			}
			
			$out .= '>';
			
			if ($slide_as_link_target == 'true') {
				$slide_target = ' target="_blank"';
			} else {
				$slide_target = '';
			}
			
			if ($slide_as_link_add == 'true' && $slide_as_link_url != '') { 
				$out .= '<a href="' . $slide_as_link_url . '"' . (($caption_title != '') ? ' title="' . $caption_title . '"' : '') . $slide_target . '>';
			}
			
			$out .= '<img src="' . $upload_img . '" alt="' . $slide_title . '" />';
			
			if ($slide_as_link_add == 'true' && $slide_as_link_url != '') { 
				$out .= '</a>';
			}
			
			if ($show_caption == 'true') {
				$out .= '<div class="slideCaption ' . $slide_caption_pos . '">' . 
					'<div class="slideCaptionInner">' . 
						'<div class="slideCaptionInnerBlock">';
				
				if ($caption_title != '') {
					$out .= '<h1>' . $caption_title . '</h1>';
				}
				
				if ($caption_subtitle != '') {
					$out .= '<h6>' . $caption_subtitle . '</h6>';
				}
				
				if ($caption_text != '') {
					$out .= '<p>' . strip_tags($caption_text) . '</p>';
				}
				
				if ($slide_link_target == 'true') {
					$target = ' target="_blank"';
				} else {
					$target = '';
				}
				
				if ($caption_link_enable == 'true' && $slide_caption_text_or_button == 'link') {
					$out .= '<a' . $target . ' href="' . $slide_link_text_value . '">' . $slide_caption_url_text . '</a>';
				} elseif ($caption_link_enable == 'true' && $slide_caption_text_or_button == 'button') {
					$out .= '<a class="button"' . $target . ' href="' . $slide_link_text_value . '"><span>' . $slide_caption_url_text . '</span></a>';
				}
				
				$out .= '</div>' . 
					'</div>' . 
				'</div>';
			}
			
			$out .= '</li>';
		}
		
		$out .= '</ul>';
		
		echo $out;
	}
}

add_shortcode('cmsmasters_responsive_slider', 'cmsmasters_responsive_slider');



/**
 * Main Revolution Slider Shortcode
 */
function cmsmasters_revolution_slider($atts, $content = null) {
    extract(shortcode_atts(array(
		'id' => '', 
		'data' => '' 
	), $atts));
	
	if (isset($id) && isset($data)) {
		foreach ($data->footer as $cat => $val) {
			foreach ($val as $f_name => $f_val) {
				$parameters['slider'][$f_name] = $f_val;
			}
		}
		
        foreach ($data->slides as $slide => $val) {
            foreach ($val->header as $f_name => $f_val) {
                $slideParameters['slider']['slides'][$slide]['main_fields'][$f_name] = $f_val;
            }
			
            if (isset($val->footer) && !empty($val->footer)) {
                foreach ($val->footer as $cat => $c_val) {
                    foreach ($c_val as $f_name => $f_val) {
						if (isset($c_val->slide_obj_cat_type)) {
							$slideParameters['slider']['slides'][$slide][$cat][$f_name] = $f_val;
						} else {
							if ($f_name == 'upload_img') {
								$slideParameters['slider']['slides'][$slide]['main_fields'][$f_name . '_thumb'] = $f_val;
							} else {
								$slideParameters['slider']['slides'][$slide]['main_fields'][$f_name] = $f_val;
							}
						}
                    }
                }
            }
        }
		
		$out = '<div class="slider" style="max-height:' . $parameters['slider']['revolution_slider_height'] . 'px;">' . 
					'<div class="fullwidthbanner tp-simpleresponsive" style="height:' . $parameters['slider']['revolution_slider_height'] . 'px;">' . 
						'<ul>';
		
		foreach ($slideParameters['slider']['slides'] as $slide) {
			$obj_out = '';
			
			foreach ($slide as $object_name => $object_val) {
				if ($object_name == 'main_fields') {
					$upload_img = $object_val['upload_img'];
					$slide_title = $object_val['slide_title'];
					$slide_img_transition = $object_val['slide_img_transition'];
					$slide_slot_amount = $object_val['slide_slot_amount'];
					$slide_pause = $object_val['slide_pause'];
					$slide_link = $object_val['slide_link'];
					
					$out .= '<li data-transition="' . (($slide_img_transition != '') ? $slide_img_transition : 'boxfade') . '" data-slotamount="' . $slide_slot_amount . '"' . 
						(($slide_link != '') ? ' data-link="' . $slide_link . '"' : '') . 
						(($slide_pause != '' && $slide_pause != '0' && $slide_pause != '0.0') ? ' data-delay="' . ((int) ($slide_pause * 1000)) . '"' : '') . 
					'>' . 
						'<img src="' . (($upload_img != '') ? $upload_img : get_template_directory_uri() . '/images/pixel.png') . '" alt="' . $slide_title . '" />';
				} else {
					switch ($object_val['slide_obj_cat_type']) {
					case 'image':
						$upload_img = $object_val['upload_img'];
						$slide_obj_position_top = $object_val['slide_obj_position_top'];
						$slide_obj_position_left = $object_val['slide_obj_position_left'];
						$slide_obj_animation_type = $object_val['slide_obj_animation_type'];
						$slide_obj_animation_easing = $object_val['slide_obj_animation_easing'];
						$slide_obj_animation_speed = $object_val['slide_obj_animation_speed'];
						$slide_obj_animation_pause = $object_val['slide_obj_animation_pause'];
						
						$obj_out .= '<div class="caption ' . $slide_obj_animation_type . '" data-y="' . $slide_obj_position_top . '" data-x="' . $slide_obj_position_left . '" data-speed="' . ((int) ($slide_obj_animation_speed * 1000)) . '" data-start="' . ((int) ($slide_obj_animation_pause * 1000)) . '" data-easing="' . $slide_obj_animation_easing . '">' . 
							'<img src="' . $upload_img . '" alt="" />' . 
						'</div>';
						
						break;
					case 'heading1':
						$slide_obj_heading_1_text = stripslashes($object_val['slide_obj_heading_1_text']);
						$slide_obj_width = $object_val['slide_obj_width'];
						$slide_obj_position_top = $object_val['slide_obj_position_top'];
						$slide_obj_position_left = $object_val['slide_obj_position_left'];
						$slide_obj_animation_type = $object_val['slide_obj_animation_type'];
						$slide_obj_animation_easing = $object_val['slide_obj_animation_easing'];
						$slide_obj_animation_speed = $object_val['slide_obj_animation_speed'];
						$slide_obj_animation_pause = $object_val['slide_obj_animation_pause'];
						
						$obj_out .= '<h1 class="caption ' . $slide_obj_animation_type . ' ' . $slide_obj_width . '" data-y="' . $slide_obj_position_top . '" data-x="' . $slide_obj_position_left . '" data-speed="' . ((int) ($slide_obj_animation_speed * 1000)) . '" data-start="' . ((int) ($slide_obj_animation_pause * 1000)) . '" data-easing="' . $slide_obj_animation_easing . '">' . $slide_obj_heading_1_text . '</h1>';
						
						break;
					case 'heading2':
						$slide_obj_heading_2_text = stripslashes($object_val['slide_obj_heading_2_text']);
						$slide_obj_width = $object_val['slide_obj_width'];
						$slide_obj_position_top = $object_val['slide_obj_position_top'];
						$slide_obj_position_left = $object_val['slide_obj_position_left'];
						$slide_obj_animation_type = $object_val['slide_obj_animation_type'];
						$slide_obj_animation_easing = $object_val['slide_obj_animation_easing'];
						$slide_obj_animation_speed = $object_val['slide_obj_animation_speed'];
						$slide_obj_animation_pause = $object_val['slide_obj_animation_pause'];
						
						$obj_out .= '<h2 class="caption ' . $slide_obj_animation_type . ' ' . $slide_obj_width . '" data-y="' . $slide_obj_position_top . '" data-x="' . $slide_obj_position_left . '" data-speed="' . ((int) ($slide_obj_animation_speed * 1000)) . '" data-start="' . ((int) ($slide_obj_animation_pause * 1000)) . '" data-easing="' . $slide_obj_animation_easing . '">' . $slide_obj_heading_2_text . '</h2>';
						
						break;
					case 'heading3':
						$slide_obj_heading_3_text = stripslashes($object_val['slide_obj_heading_3_text']);
						$slide_obj_width = $object_val['slide_obj_width'];
						$slide_obj_position_top = $object_val['slide_obj_position_top'];
						$slide_obj_position_left = $object_val['slide_obj_position_left'];
						$slide_obj_animation_type = $object_val['slide_obj_animation_type'];
						$slide_obj_animation_easing = $object_val['slide_obj_animation_easing'];
						$slide_obj_animation_speed = $object_val['slide_obj_animation_speed'];
						$slide_obj_animation_pause = $object_val['slide_obj_animation_pause'];
						
						$obj_out .= '<h3 class="caption color_3 ' . $slide_obj_animation_type . ' ' . $slide_obj_width . '" data-y="' . $slide_obj_position_top . '" data-x="' . $slide_obj_position_left . '" data-speed="' . ((int) ($slide_obj_animation_speed * 1000)) . '" data-start="' . ((int) ($slide_obj_animation_pause * 1000)) . '" data-easing="' . $slide_obj_animation_easing . '">' . $slide_obj_heading_3_text . '</h3>';
						
						break;
					case 'butn':
						$slide_obj_button_text = stripslashes($object_val['slide_obj_button_text']);
						$slide_obj_button_link = $object_val['slide_obj_button_link'];
						$slide_obj_button_size = $object_val['slide_obj_button_size'];
						$slide_obj_position_top = $object_val['slide_obj_position_top'];
						$slide_obj_position_left = $object_val['slide_obj_position_left'];
						$slide_obj_animation_type = $object_val['slide_obj_animation_type'];
						$slide_obj_animation_easing = $object_val['slide_obj_animation_easing'];
						$slide_obj_animation_speed = $object_val['slide_obj_animation_speed'];
						$slide_obj_animation_pause = $object_val['slide_obj_animation_pause'];
						
						$obj_out .= '<a href="' . $slide_obj_button_link . '" class="' . $slide_obj_button_size . ' caption ' . $slide_obj_animation_type . '" data-y="' . $slide_obj_position_top . '" data-x="' . $slide_obj_position_left . '" data-speed="' . ((int) ($slide_obj_animation_speed * 1000)) . '" data-start="' . ((int) ($slide_obj_animation_pause * 1000)) . '" data-easing="' . $slide_obj_animation_easing . '">' . 
							'<span>' . $slide_obj_button_text . '</span>' . 
						'</a>';
						
						break;
					case 'video':
						$slide_obj_video_url = $object_val['slide_obj_video_url'];
						$slide_obj_width = $object_val['slide_obj_width'];
						$slide_obj_height = $object_val['slide_obj_height'];
						$slide_obj_position_top = $object_val['slide_obj_position_top'];
						$slide_obj_position_left = $object_val['slide_obj_position_left'];
						$slide_obj_animation_type = $object_val['slide_obj_animation_type'];
						$slide_obj_animation_easing = $object_val['slide_obj_animation_easing'];
						$slide_obj_animation_speed = $object_val['slide_obj_animation_speed'];
						$slide_obj_animation_pause = $object_val['slide_obj_animation_pause'];
						
						preg_match('/^(http:\/\/)(www\.)?([^\/]+)(\.com)/i', $slide_obj_video_url, $matches);
						
						if ($matches[3] == 'youtube') {
							preg_match('/^(http:\/\/)?(www\.)?youtube\.com\/(watch\?v=)?(v\/)?([^&]+)/i', $slide_obj_video_url, $matches);
							
							$match = $matches[5];
							
							$iframe = '<iframe src="http://www.youtube.com/embed/' . $match . '?rel=0&amp;showinfo=0&amp;hd=1&amp;fs=1&amp;wmode=transparent" width="' . $slide_obj_width . '" height="' . $slide_obj_height . '" frameborder="0" allowfullscreen></iframe>';
						} elseif ($matches[3] == 'vimeo') {
							preg_match('/^(http:\/\/)?(www\.)?vimeo\.com\/([^\/]+)/i', $slide_obj_video_url, $matches);
							
							$match = $matches[3];
							
							$iframe = '<iframe src="http://player.vimeo.com/video/' . $match . '?title=0&amp;byline=0&amp;portrait=0&amp;hd=1&amp;wmode=transparent" width="' . $slide_obj_width . '" height="' . $slide_obj_height . '" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>';
						}
						
						$obj_out .= '<div class="caption ' . $slide_obj_animation_type . '" data-y="' . $slide_obj_position_top . '" data-x="' . $slide_obj_position_left . '" data-speed="' . ((int) ($slide_obj_animation_speed * 1000)) . '" data-start="' . ((int) ($slide_obj_animation_pause * 1000)) . '" data-easing="' . $slide_obj_animation_easing . '">' . $iframe . '</div>';
						
						break;
					}
				}
			}
			
			$out .= $obj_out . '</li>';
		}
		
		$out .= '</ul>' . 
				'<div class="tp-bannertimer"' . (($parameters['slider']['revolution_slider_timer'] == 'true') ? ' style="display:block;"' : '') . '></div>' . 
			'</div>' .  
		'</div>';
		
		echo $out;
	}
}

add_shortcode('cmsmasters_revolution_slider', 'cmsmasters_revolution_slider');

