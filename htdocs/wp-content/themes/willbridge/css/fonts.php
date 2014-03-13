<?php 
/**
 * @package WordPress
 * @subpackage Willbridge
 * @since Willbridge 1.0
 * 
 * Fonts & Colors Settings File
 * Created by CMSMasters
 * 
 */


header('Content-type: text/css');
require('../../../../wp-load.php');
require('../theme/classes/var.php');

?>
/* Fonts */

body, 
li p {
	font : <?php $content_font_new = explode(':', stripslashes($content_font));
	
	echo $content_font_size . 'px/' . 
	$content_line_height . 'px ' . 
	((strpos($content_font_new[0], '+')) ? "'" . str_replace('+', ' ', $content_font_new[0]) . "'" : $content_font_new[0]); ?>;
}

h1,
a.logo span.title {
	font : <?php $h1_font_new = explode(':', stripslashes($h1_font));
	
	echo $h1_font_size . 'px/' . 
	$h1_line_height . 'px ' . 
	((strpos($h1_font_new[0], '+')) ? "'" . str_replace('+', ' ', $h1_font_new[0]) . "'" : $h1_font_new[0]);
	
	if (str_replace('+', ' ', $h1_font_new[0]) !== str_replace('+', ' ', $content_font_new[0])) { 
		echo ((strpos($content_font_new[0], '+')) ? ", '" . str_replace('+', ' ', $content_font_new[0]) . "'" : ', ' . $content_font_new[0]);
	} ?>;
}

h2 {
	font : <?php $h2_font_new = explode(':', stripslashes($h2_font));
	
	echo $h2_font_size . 'px/' . 
	$h2_line_height . 'px ' . 
	((strpos($h2_font_new[0], '+')) ? "'" . str_replace('+', ' ', $h2_font_new[0]) . "'" : $h2_font_new[0]);
	
	if (str_replace('+', ' ', $h2_font_new[0]) !== str_replace('+', ' ', $content_font_new[0])) { 
		echo ((strpos($content_font_new[0], '+')) ? ", '" . str_replace('+', ' ', $content_font_new[0]) . "'" : ', ' . $content_font_new[0]);
	} ?>;
}

h2 {
	font-weight:800;
}

h3,
.sitemap > li > span > a {
	font : <?php $h3_font_new = explode(':', stripslashes($h3_font));
	
	echo $h3_font_size . 'px/' . 
	$h3_line_height . 'px ' . 
	((strpos($h3_font_new[0], '+')) ? "'" . str_replace('+', ' ', $h3_font_new[0]) . "'" : $h3_font_new[0]);
	
	if (str_replace('+', ' ', $h3_font_new[0]) !== str_replace('+', ' ', $content_font_new[0])) { 
		echo ((strpos($content_font_new[0], '+')) ? ", '" . str_replace('+', ' ', $content_font_new[0]) . "'" : ', ' . $content_font_new[0]);
	} ?>;
}

h4, 
#sidebar .widgettitle {
	font : <?php $h4_font_new = explode(':', stripslashes($h4_font));
	
	echo $h4_font_size . 'px/' . 
	$h4_line_height . 'px ' . 
	((strpos($h4_font_new[0], '+')) ? "'" . str_replace('+', ' ', $h4_font_new[0]) . "'" : $h4_font_new[0]);
	
	if (str_replace('+', ' ', $h4_font_new[0]) !== str_replace('+', ' ', $content_font_new[0])) { 
		echo ((strpos($content_font_new[0], '+')) ? ", '" . str_replace('+', ' ', $content_font_new[0]) . "'" : ', ' . $content_font_new[0]);
	} ?>;
}

h5 {
	font : <?php $h5_font_new = explode(':', stripslashes($h5_font));
	
	echo $h5_font_size . 'px/' . 
	$h5_line_height . 'px ' . 
	((strpos($h5_font_new[0], '+')) ? "'" . str_replace('+', ' ', $h5_font_new[0]) . "'" : $h5_font_new[0]);
	
	if (str_replace('+', ' ', $h5_font_new[0]) !== str_replace('+', ' ', $content_font_new[0])) { 
		echo ((strpos($content_font_new[0], '+')) ? ", '" . str_replace('+', ' ', $content_font_new[0]) . "'" : ', ' . $content_font_new[0]);
	} ?>;
}

h5 {
	font-style:italic;
}

h6,
.portfolio_inner .hover_effect .post_category a,
.sitemap > li > ul > li > span > a,
.cms_archive li {
	font : <?php $h6_font_new = explode(':', stripslashes($h6_font));
				
	echo $h6_font_size . 'px/' . 
	$h6_line_height . 'px ' . 
	((strpos($h6_font_new[0], '+')) ? "'" . str_replace('+', ' ', $h6_font_new[0]) . "'" : $h6_font_new[0]);
	
	if (str_replace('+', ' ', $h6_font_new[0]) !== str_replace('+', ' ', $content_font_new[0])) { 
		echo ((strpos($content_font_new[0], '+')) ? ", '" . str_replace('+', ' ', $content_font_new[0]) . "'" : ', ' . $content_font_new[0]);
	} ?>;
}

h6,
.portfolio_inner .hover_effect .post_category a,
.sitemap > li > ul > li > span > a,
.cms_archive li {
	font-style:italic;
}

li {
	line-height:24px;
}

blockquote, 
q, 
.format-aside .entry-content {
	font : <?php $bqt_font_new = explode(':', stripslashes($bqt_font));
	
	echo $bqt_font_size . 'px/' . 
	$bqt_line_height . 'px ' . 
	((strpos($bqt_font_new[0], '+')) ? "'" . str_replace('+', ' ', $bqt_font_new[0]) . "'" : $bqt_font_new[0]);
	
	if (str_replace('+', ' ', $bqt_font_new[0]) !== str_replace('+', ' ', $content_font_new[0])) { 
		echo ((strpos($content_font_new[0], '+')) ? ", '" . str_replace('+', ' ', $content_font_new[0]) . "'" : ', ' . $content_font_new[0]);
	} ?>;
}

blockquote, 
q, 
.format-aside .entry-content {
	font-style:italic;
}

q:after, blockquote:after {
	font-family : <?php $bqt_font_new = explode(':', stripslashes($bqt_font));
	
	((strpos($bqt_font_new[0], '+')) ? "'" . str_replace('+', ' ', $bqt_font_new[0]) . "'" : $bqt_font_new[0]);
	
	if (str_replace('+', ' ', $bqt_font_new[0]) !== str_replace('+', ' ', $content_font_new[0])) { 
		echo ((strpos($content_font_new[0], '+')) ? ", '" . str_replace('+', ' ', $content_font_new[0]) . "'" : ', ' . $content_font_new[0]);
	} ?>;
}

code {
	font : <?php $code_font_new = explode(':', stripslashes($code_font));
	
	echo $code_font_size . 'px/' . 
	$code_line_height . 'px ' . 
	((strpos($code_font_new[0], '+')) ? "'" . str_replace('+', ' ', $code_font_new[0]) . "'" : $code_font_new[0]);
	
	if (str_replace('+', ' ', $code_font_new[0]) !== str_replace('+', ' ', $content_font_new[0])) { 
		echo ((strpos($content_font_new[0], '+')) ? ", '" . str_replace('+', ' ', $content_font_new[0]) . "'" : ', ' . $content_font_new[0]);
	} ?>;
}

span.dropcap,
span.dropcap2 {
	font-family : <?php $dcp_font_new = explode(':', stripslashes($dcp_font));
	
	((strpos($dcp_font_new[0], '+')) ? "'" . str_replace('+', ' ', $dcp_font_new[0]) . "'" : $dcp_font_new[0]);
	
	if (str_replace('+', ' ', $dcp_font_new[0]) !== str_replace('+', ' ', $content_font_new[0])) { 
		echo ((strpos($content_font_new[0], '+')) ? ", '" . str_replace('+', ' ', $content_font_new[0]) . "'" : ', ' . $content_font_new[0]);
	} ?>;
}

.button, 
.button_medium, 
.button_large, 
.comment-reply-link,
.tabs li a,
.cmsms_comments {font-family:
	<?php $h6_font_new = explode(':', stripslashes($h6_font));
	
	echo ((strpos($h6_font_new[0], '+')) ? "'" . str_replace('+', ' ', $h6_font_new[0]) . "'" : $h6_font_new[0]);
	
	if (str_replace('+', ' ', $h6_font_new[0]) !== str_replace('+', ' ', $content_font_new[0])) { 
		echo ((strpos($content_font_new[0], '+')) ? ", '" . str_replace('+', ' ', $content_font_new[0]) . "'" : ', ' . $content_font_new[0]);
	} ?>;
}

small, 
abbr {
	font : <?php $small_font_new = explode(':', stripslashes($small_font));
	
	echo $small_font_size . 'px/' . 
	$small_line_height . 'px ' . 
	((strpos($small_font_new[0], '+')) ? "'" . str_replace('+', ' ', $small_font_new[0]) . "'" : $small_font_new[0]);
	
	if (str_replace('+', ' ', $small_font_new[0]) !== str_replace('+', ' ', $content_font_new[0])) { 
		echo ((strpos($content_font_new[0], '+')) ? ", '" . str_replace('+', ' ', $content_font_new[0]) . "'" : ', ' . $content_font_new[0]);
	} ?>;
}

input, 
textarea, 
select, 
option, 
.cmsms-form-builder .check_parent input[type="checkbox"]+label, 
.cmsms-form-builder .check_parent input[type="radio"]+label, 
.wpcf7 .wpcf7-list-item input[type="checkbox"]+span, 
.wpcf7 .wpcf7-list-item input[type="radio"]+span {
	font : <?php $input_font_new = explode(':', stripslashes($input_font));
	
	echo $input_font_size . 'px/' . 
	$input_line_height . 'px ' . 
	((strpos($input_font_new[0], '+')) ? "'" . str_replace('+', ' ', $input_font_new[0]) . "'" : $input_font_new[0]);
	
	if (str_replace('+', ' ', $input_font_new[0]) !== str_replace('+', ' ', $content_font_new[0])) { 
		echo ((strpos($content_font_new[0], '+')) ? ", '" . str_replace('+', ' ', $content_font_new[0]) . "'" : ', ' . $content_font_new[0]);
	} ?>;
}

#navigation > li > a > span {
	font : <?php $nav_title_font_new = explode(':', stripslashes($nav_title_font));
	
	echo $nav_title_font_size . 'px/20px ' . 
	((strpos($nav_title_font_new[0], '+')) ? "'" . str_replace('+', ' ', $nav_title_font_new[0]) . "'" : $nav_title_font_new[0]);
	
	if (str_replace('+', ' ', $nav_title_font_new[0]) !== str_replace('+', ' ', $content_font_new[0])) { 
		echo ((strpos($content_font_new[0], '+')) ? ", '" . str_replace('+', ' ', $content_font_new[0]) . "'" : ', ' . $content_font_new[0]);
	} ?>;
}

#navigation > li > a > span {
	font-weight : 600;
}

#navigation ul li a {
	font : <?php $nav_title_font_new = explode(':', stripslashes($nav_dropdown_font));
	
	echo $nav_dropdown_font_size . 'px/' . 
	$nav_dropdown_line_height . 'px ' . 
	((strpos($nav_title_font_new[0], '+')) ? "'" . str_replace('+', ' ', $nav_title_font_new[0]) . "'" : $nav_title_font_new[0]);
	
	if (str_replace('+', ' ', $nav_title_font_new[0]) !== str_replace('+', ' ', $content_font_new[0])) { 
		echo ((strpos($content_font_new[0], '+')) ? ", '" . str_replace('+', ' ', $content_font_new[0]) . "'" : ', ' . $content_font_new[0]);
	} ?>;
}

#navigation ul li a {
	font-weight: 600;
}


/* Colors */

/* ---------------------------------------------- Content Color */

body, 
.jp-playlist-current a,
.wp-pagenavi a,
.cmsmsLike span {
	color : <?php echo $text_color; ?>;
}

input, 
textarea {color:#808080;}

.cmsmsLike {background-color:#cccccc;}

.cont_nav,
.cont_nav a:hover,
.cont_nav a {color:#ffffff;}

/* ---------------------------------------------- Navigation Color */

#navigation > li > a {
	background-color : <?php echo $nav_title_bg_color; ?>;
	color : <?php echo $nav_title_color; ?>;
}

#navigation > li.current-menu-ancestor > a, 
#navigation > li.current-menu-item > a, 
#navigation > li:hover > a:hover, 
#navigation > li:hover > a {
	background-color : <?php echo $nav_title_active_bg_color; ?>;
	color : <?php echo $nav_title_active_color; ?>;
}

#navigation ul li a {
	background-color : <?php echo $nav_dropdown_bg_color; ?>;
	color : <?php echo $nav_dropdown_color; ?>;
}

#navigation > li > ul {background-color : <?php echo $nav_dropdown_bg_color; ?>;}

#navigation ul li.current_page_item > a,
#navigation ul li.current-menu-ancestor > a,
#navigation ul li.current_page_ancestor > a,
#navigation ul li > a:hover,
#navigation ul li:hover > a {
	background-color : <?php echo $nav_dropdown_active_bg_color; ?>;
	color : <?php echo $nav_dropdown_active_color; ?>;
}

.nav_wrap_inner.navi_scrolled,
.responsibe_block {background-color : <?php echo $nav_title_bg_color; ?>;}

/* ---------------------------------------------- Links Colors */

.cmsmsLike:hover, 
.cmsmsLike.active, 
.resp_navigation.active,
.widget_custom_popular_portfolio_entries .cmsms_content_slider_parent ul.cmsms_slides_nav li.active a, 
.widget_custom_recent_portfolio_entries .cmsms_content_slider_parent ul.cmsms_slides_nav li.active a, 
.widget_custom_popular_portfolio_entries .cmsms_content_slider_parent ul.cmsms_slides_nav li:hover a,
.widget_custom_recent_portfolio_entries .cmsms_content_slider_parent ul.cmsms_slides_nav li:hover a,
.widget_custom_testimonials_entries .cmsms_content_slider_parent ul.cmsms_slides_nav li.active a, 
.widget_custom_testimonials_entries .cmsms_content_slider_parent ul.cmsms_slides_nav li:hover a,
.tp-bullets.simplebullets .bullet:hover, 
.tp-bullets.simplebullets .bullet.selected,
#slide_top,
ul.cmsms_slides_nav li.active a, 
ul.cmsms_slides_nav li:hover a,
span.dropcap2,
.tog:hover .cmsms_plus, 
.tog.current .cmsms_plus,
.tour li.current .cmsms_plus,
.tour li a:hover .cmsms_plus,
.cmsms_comments,
.wp-pagenavi > span.current,
.wp-pagenavi a:hover,
.portfolio_inner .hover_effect,
a.cmsms_close_video:hover {background-color : <?php echo $link_color; ?>;}

.tabs li a.current {background : <?php echo $link_color; ?>;}

input[type="text"]:focus,
input[type="password"]:focus,
textarea:focus,
select:focus,
#bottom input[type="text"]:focus, 
#bottom input[type="password"]:focus, 
#bottom textarea:focus, 
#bottom select:focus,
.tabs > li a.current, 
.wp-pagenavi > span.current,
.wp-pagenavi a:hover {
	border-color : <?php echo $link_color; ?>;
}

a, 
.color_3,
.post footer .published,
.post .entry-title a:hover,
.post.format-link .entry-title a,
.cmsmsLike:hover span,
.cmsmsLike.active span,
.portfolio_inner .entry-title a:hover {
	color : <?php echo $link_color; ?>;
}

/* ---------------------------------------------- Responsive Slider */

.slideCaptionInnerBlock {
	background:#000000;
	background:rgba(0, 0, 0, .7);
}

.responsiveSlider, 
.responsiveSlider h1, 
.responsiveSlider h2, 
.responsiveSlider h3, 
.responsiveSlider h4, 
.responsiveSlider h5, 
.responsiveSlider h6 {color:#ffffff;}

.responsiveSlider h1 {
	font-size:30px;
	line-height:36px;
}

a:hover {
	color : <?php echo $link_hover_color; ?>;
}

/* ---------------------------------------------- Splash Slider */

.splash .slideCaptionInnerBlock h1 {
	font-weight:800;
	font-size:72px;
	line-height:72px;
}

.splash .slideCaptionInnerBlock h6 {
	font-size:30px;
	font-style:normal;
	line-height:36px;
}

/* ---------------------------------------------- Revolution Slider */

.fullwidthbanner h1 {
	font-size:36px;
	line-height:36px;
	color:#3a3a3a;
}

.fullwidthbanner h2 {
	font-weight:800;
	font-size:36px;
	line-height:36px;
	color:#3a3a3a;
}

.fullwidthbanner h3 {
	font-weight:800;
	font-size:72px;
	line-height:72px;
}

/* ---------------------------------------------- Headings Colors */

h1,
.post .entry-title a,
.post.format-link .entry-title a:hover {
	color : <?php echo $h1_color; ?>;
}

h2 {
	color : <?php echo $h2_color; ?>;
}

h3 {
	color : <?php echo $h3_color; ?>;
}

h4 {
	color : <?php echo $h4_color; ?>;
}

h5,
.tog,
.tog:hover,
.tabs li a,
.tour li a {
	color : <?php echo $h5_color; ?>;
}

h6,
.portfolio_inner .entry-title a {
	color : <?php echo $h6_color; ?>;
}

.color_2, 
q:before, 
blockquote:before, 
q, 
blockquote {
	color : <?php echo $bqt_color; ?>;
}

code {
	color : <?php echo $code_color; ?>;
}

small, 
abbr {
	color : <?php echo $small_color; ?>;
}

input, 
textarea, 
select, 
option, 
.cmsms-form-builder .check_parent input[type="checkbox"]+label, 
.cmsms-form-builder .check_parent input[type="radio"]+label, 
.wpcf7 .wpcf7-list-item input[type="checkbox"]+span, 
.wpcf7 .wpcf7-list-item input[type="radio"]+span {
	color : <?php echo $input_color; ?>;
}

/* ---------------------------------------------- Bottom and Footer Colors */

#bottom, 
#bottom a:hover {
	color : <?php echo $bottom_color; ?>;
}

#bottom h1,
#bottom h2,
#bottom h3,
#bottom h4,
#bottom h5,
#bottom h6,
#bottom .color_2 {
	color : <?php echo $bottom_heading_color; ?>;
}

#footer,
#footer a {
	color : <?php echo $footer_color; ?>;
}

/* ---------- Small Monitor (Note: Design for a width less than 1024px) ---------- */

@media only screen and (max-width: 1023px) {
	
	.responsiveSlider h1 {
		font-size:1.5em;
		line-height:1.2em;
	}
	
	.portfolio_inner .hover_effect .post_category a {font-size:.9em;}
	
	.portfolio_inner .hover_effect .entry-title {font-size:1.1em;}
	
}

/* ---------- Small Tablet & Mobile (Note: Design for a width less than 541px) ---------- */

@media only screen and (max-width: 540px) {

	.responsibe_block_inner {border-color : <?php echo $link_color; ?>;}
	
	#navigation > li > ul {background:none;}
	
	#navigation > li > a,
	#navigation ul li a{
		background-color:#ffffff;
		color:#3c3c3c;
		font-weight:normal;
		font-style:italic;
	}
	
	#navigation li.current-menu-ancestor > a, 
	#navigation li.current-menu-item > a, 
	#navigation li:hover > a:hover, 
	#navigation li:hover > a,	
	#navigation ul li.current_page_item a, 
	#navigation ul li.current-menu-ancestor a, 
	#navigation ul li.current_page_ancestor a, 
	#navigation ul li a:hover, 
	#navigation ul li:hover > a {
		background-color:#fcfcfc;
		color:#3c3c3c;
	}
	
}
