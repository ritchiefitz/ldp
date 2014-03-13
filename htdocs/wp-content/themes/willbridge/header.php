<?php
/**
 * @package WordPress
 * @subpackage Willbridge
 * @since Willbridge 1.0
 * 
 * Pages Header Template
 * Created by CMSMasters
 * 
 */


global $seo_enable, 
	$seo_description, 
	$seo_keywords, 
	$seo_title, 
	$site_favicon, 
	$custom_favicon, 
	$content_font, 
	$nav_title_font, 
	$nav_dropdown_font, 
	$h1_font, 
	$h2_font, 
	$h3_font, 
	$h4_font, 
	$h5_font, 
	$h6_font, 
	$dcp_font, 
	$bqt_font, 
	$code_font, 
	$small_font, 
	$input_font,  
	$custom_logo, 
	$site_name, 
	$custom_title_text, 
	$site_descr, 
	$custom_descr_text, 
	$header_height, 
	$navi_title_width, 
	$header_logo_top, 
	$header_logo_left, 
	$header_html, 
	$header_html_top, 
	$header_html_left, 
	$header_social, 
	$header_social_top, 
	$header_social_right, 
	$header_social_icons, 
	$site_header_html, 
	$custom_background_color, 
	$breadcrumbs_active, 
	$custom_background_img;

$selectedicons = explode(',', $header_social_icons);

$slider_active = get_post_meta(get_the_ID(), 'slidertools_active', true);
$slidertools_slider_id = get_post_meta(get_the_ID(), 'slidertools_slider_id', true);

if ($slider_active == 'true') {
    $sliderManager = new cmsmsSliderManager;
    $sliderOptions = $sliderManager->getSlider($slidertools_slider_id);
}

$bgtools_active = get_post_meta(get_the_ID(), 'bgtools_active', true);
$bgtools_color = get_post_meta(get_the_ID(), 'bgtools_color', true);
$bgtools_image = get_post_meta(get_the_ID(), 'bgtools_image', true);

$bgtools_color = ($bgtools_active == 'true' && $bgtools_color != '') ? $bgtools_color : $custom_background_color;
$bgtools_image = ($bgtools_active == 'true' && $bgtools_image != '') ? $bgtools_image : $custom_background_img;
$bgtools_image_v_pos = ($bgtools_active == 'true' && $bgtools_image != '') ? get_theme_bg(str_replace(get_template_directory_uri() . '/images/bgs/', '', $bgtools_image))->bg_position_y : get_theme_bg(str_replace(get_template_directory_uri() . '/images/bgs/', '', $custom_background_img))->bg_position_y;
$bgtools_image_h_pos = ($bgtools_active == 'true' && $bgtools_image != '') ? get_theme_bg(str_replace(get_template_directory_uri() . '/images/bgs/', '', $bgtools_image))->bg_position_x : get_theme_bg(str_replace(get_template_directory_uri() . '/images/bgs/', '', $custom_background_img))->bg_position_x;
$bgtools_image_rep = ($bgtools_active == 'true' && $bgtools_image != '') ? get_theme_bg(str_replace(get_template_directory_uri() . '/images/bgs/', '', $bgtools_image))->bg_repeat : get_theme_bg(str_replace(get_template_directory_uri() . '/images/bgs/', '', $custom_background_img))->bg_repeat;
$bgtools_image_att = ($bgtools_active == 'true' && $bgtools_image != '') ? get_theme_bg(str_replace(get_template_directory_uri() . '/images/bgs/', '', $bgtools_image))->bg_attachment : get_theme_bg(str_replace(get_template_directory_uri() . '/images/bgs/', '', $custom_background_img))->bg_attachment;

$page_layout = get_post_meta(get_the_ID(), 'page_layout', true);
$heading = get_post_meta(get_the_ID(), 'headingtools_active', true);
$heading_title = get_post_meta(get_the_ID(), 'headingtools_title', true);
$heading_description = get_post_meta(get_the_ID(), 'headingtools_description', true);
$heading_icon = get_post_meta(get_the_ID(), 'headingtools_icon', true);
$filter_active = get_post_meta(get_the_ID(), 'filter_active', true);

$seotools_active = get_post_meta(get_the_ID(), 'seotools_active', true);
$seotools_title = get_post_meta(get_the_ID(), 'seotools_title', true);
$seotools_description = get_post_meta(get_the_ID(), 'seotools_description', true);
$seotools_keywords = get_post_meta(get_the_ID(), 'seotools_keywords', true);

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo('charset'); ?>" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
        <?php if ($seo_enable) { ?>
		<meta name="description" content="<?php
		if ( 
			$seotools_active == 'true' && 
			$seotools_description != '' && 
			!is_home() && 
			!is_404() && 
			!is_archive() && 
			!is_search() 
		) {
			echo $seotools_description;
		} else {
			if ($seo_description == '') {
				bloginfo('description');
			} else {
				echo $seo_description;
			}
		}
		?>" />
		<meta name="keywords" content="<?php
			if ( 
				$seotools_active == 'true' && 
				$seotools_keywords != '' && 
				!is_home() && 
				!is_404() && 
				!is_archive() && 
				!is_search() 
			) {
				echo $seotools_keywords;
			} else {
				if ($seo_keywords == '') {
					bloginfo('name');
				} else {
					echo $seo_keywords;
				}
			}
		?>" />
		<title><?php
		if ( 
			$seotools_active == 'true' && 
			$seotools_title != '' && 
			!is_home() && 
			!is_404() && 
			!is_archive() && 
			!is_search() 
		) {
			echo $seotools_title;
		} else {
			if ($seo_title == '') {
			  wp_title('&laquo;', true, 'right');
			  echo ' ';
			  bloginfo('name');
			} else {
			  echo $seo_title;
			}
		}
		?></title>
        <?php } else { ?>
		<meta name="description" content="<?php bloginfo('description'); ?>" />
		<meta name="keywords" content="<?php bloginfo('name'); ?>" />
		<title><?php
		wp_title('&laquo;', true, 'right');
		bloginfo('name');
		?></title>
        <?php 
		}
        
        if ($site_favicon) {
            if (!$custom_favicon) { 
		?>
            <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/images/favicon.ico" type="image/x-icon" />
        <?php } else { ?>
            <link rel="shortcut icon" href="<?php echo $custom_favicon; ?>" type="image/x-icon" />
        <?php 
			}
        } 
		?>
        <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
        <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
        <?php 
		foreach (get_google_fonts() as $googlefont) { 
			if ( 
				$googlefont->font_parameter == $content_font || 
				$googlefont->font_parameter == $nav_title_font || 
				$googlefont->font_parameter == $nav_dropdown_font || 
				$googlefont->font_parameter == $h1_font || 
				$googlefont->font_parameter == $h2_font || 
				$googlefont->font_parameter == $h3_font || 
				$googlefont->font_parameter == $h4_font || 
				$googlefont->font_parameter == $h5_font || 
				$googlefont->font_parameter == $h6_font || 
				$googlefont->font_parameter == $dcp_font || 
				$googlefont->font_parameter == $bqt_font || 
				$googlefont->font_parameter == $code_font || 
				$googlefont->font_parameter == $small_font || 
				$googlefont->font_parameter == $input_font 
			) { 
				echo '<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=' . $googlefont->font_parameter . ':regular,italic,bold,bolditalic" type="text/css" />';
			} 
		}
		$ua = $_SERVER['HTTP_USER_AGENT'];
		
		$checker = array( 
			'iphone'=>preg_match('/iPhone|iPod|iPad/', $ua), 
			'blackberry'=>preg_match('/BlackBerry/', $ua), 
			'android'=>preg_match('/Android/', $ua), 
			'mac'=>preg_match('/Macintosh/', $ua) 
		);
		
        if (is_singular() && get_option('thread_comments')) {
            wp_enqueue_script('comment-reply');
        }
        
        wp_head();
		?>
        <!--[if lt IE 9]>
            <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/ieCss3.php" type="text/css" media="screen" />
            <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/ie.css" type="text/css" media="screen" />
        <![endif]-->
		<style type="text/css">
			#header .header_inner { 
				height : <?php echo $header_height; ?>px; 
			} 
			
			#header a.logo { 
				top : <?php echo $header_logo_top; ?>px; 
				left : <?php echo $header_logo_left; ?>px; 
			} 
			
			#navigation > li {
				width : <?php echo $navi_title_width; ?>%;
			}
			
			.custom_html {
				top : <?php echo $header_html_top?>px;
				left : <?php echo $header_html_left?>px;
			}
			
			.header_inner .social_list {
				top : <?php echo $header_social_top?>px;
				right : <?php echo $header_social_right?>px;
			}
			
			@media only screen and (max-width : 767px) { 
				
				#header .header_inner { 
					height : auto; 
				} 
				
				#header a.logo, 
				#header nav { 
					top : auto; 
				} 
				
				.custom_html {
					top : auto;
					left : auto;
				}
				
				.header_inner .social_list {
					top : auto;
					right : auto;
				}
				
			}
			
			@media only screen and (max-width: 540px) {
				#navigation > li {width:auto;}
			}
		</style>
		<?php if (is_admin_bar_showing()) { ?>
			<style type="text/css">
				html {margin-top:0 !important;}
				
				#page,
				.nav_wrap_inner.navi_scrolled {
					margin-top:28px !important;
				}
			</style>
		<?php } ?>
    </head>
    <body <?php if (is_page_template('splash.php')) {body_class('splash');} else {body_class();}?> style="background:<?php echo $bgtools_color . ' url(' . $bgtools_image . ') ' . $bgtools_image_h_pos . ' ' . $bgtools_image_v_pos . ' ' . $bgtools_image_rep . ' ' . $bgtools_image_att . ';'; ?>">
		<?php 
		if ( 
			!is_home() && 
			!is_404() && 
			!is_archive() && 
			!is_search() && 
			is_page_template('splash.php') && 
			$slider_active == 'true' && 
			!empty($sliderOptions) 
		) { 
			echo '<section id="top">';
		?>
						
<!-- _________________________ Start Slider __________________________ -->
			<?php include CMSMASTERS_PAGES . '/slider.php'; ?>
<!-- _________________________ Finish Slider __________________________ -->
					
		<?php 
			echo '</section>';
		}
		?>
<!-- _________________________ Start Page _________________________ -->
		<section id="page"<?php 
		if ( 
			!$checker['iphone'] && 
			!$checker['blackberry'] && 
			!$checker['android'] && 
			!$checker['mac'] 
		) { 
			echo ' class="csstransition"'; 
		} 
		?>>
			<a href="#" id="slide_top"></a>
			
<!-- _________________________ Start Container _________________________ -->
			<div class="container">

<!-- _________________________ Start Header _________________________ -->
				<header id="header">
					<div class="header_inner">
					<?php 
					if ($site_name) {
						if ($custom_title_text) {
							$blog_title = $custom_title_text;
						} else {
							$blog_title = get_bloginfo('name');
							$blog_title = ($blog_title) ? $blog_title : 'Willbridge';
						}
						
						if ($custom_descr_text) {
							$blog_descr = $custom_descr_text;
						} else {
							$blog_descr = get_bloginfo('description');
							$blog_descr = ($blog_descr) ? $blog_descr : 'Premium Responsive WordPress Theme';
						}
						
						echo '<a href="' . home_url() . '/" title="' . $blog_title . '" class="logo">' . 
							'<span class="title">' . $blog_title . '</span>';
						
						if ($site_descr) { 
							echo '<br />' . 
							'<span class="title_text">' . $blog_descr . '</span>'; 
						}
						
						echo '</a>';
					} else {
						if (!$custom_logo) { 
							echo '<a href="' . home_url() . '/" title="' . get_bloginfo('name') . '" class="logo">' . 
								'<img src="' . get_template_directory_uri() . '/images/logo.png" alt="' . get_bloginfo('name') . '" />' . 
							'</a>';
						} else { 
							echo '<a href="' . home_url() . '/" title="' . get_bloginfo('name') . '" class="logo">' . 
								'<img src="' . $custom_logo . '" alt="' . get_bloginfo('name') . '" />' . 
							'</a>';
						}
					}
					?>
					
					<?php
					if ($site_header_html == 'true') {
						echo '<div class="custom_html">'. stripslashes($header_html) . '</div>';
					}
					?>
					<?php 
					if ($header_social) {
						echo '<ul class="social_list">';
						
						foreach ($selectedicons as $selectedicon) {
							foreach (get_social_icons() as $socialicon) {
								if ($socialicon->icon_name == $selectedicon && $socialicon->icon_name == 'email') {
									echo '<li>' . 
										'<a target="_blank" href="mailto:' . $socialicon->icon_link . '" title="' . $socialicon->icon_tooltip . '">' . 
											'<img src="' . get_template_directory_uri() . '/images/social_icons/' . $socialicon->icon_file . '" alt="' . $socialicon->icon_name . '" />' . 
										'</a>' . 
									'</li>';
								} elseif ($socialicon->icon_name == $selectedicon) {
									echo '<li>' . 
										'<a target="_blank" href="' . $socialicon->icon_link . '" title="' . $socialicon->icon_tooltip . '">' . 
											'<img src="' . get_template_directory_uri() . '/images/social_icons/' . $socialicon->icon_file . '" alt="' . $socialicon->icon_name . '" />' . 
										'</a>' . 
									'</li>';
								}
							}
						}
						
						echo '</ul>';
					}
					?>
					</div>
					<div class="nav_wrap">
						<div class="nav_wrap_inner">
							<div class="responsibe_block">
								<div class="responsibe_block_inner">
									<a href="javascript:void(0);" class="resp_navigation"></a>
									<?php 
									if ($header_social) {
										echo '<ul class="social_list">';
										
										foreach ($selectedicons as $selectedicon) {
											foreach (get_social_icons() as $socialicon) {
												if ($socialicon->icon_name == $selectedicon && $socialicon->icon_name == 'email') {
													echo '<li>' . 
														'<a target="_blank" href="mailto:' . $socialicon->icon_link . '" title="' . $socialicon->icon_tooltip . '">' . 
															'<img src="' . get_template_directory_uri() . '/images/social_icons/' . $socialicon->icon_file . '" alt="' . $socialicon->icon_name . '" />' . 
														'</a>' . 
													'</li>';
												} elseif ($socialicon->icon_name == $selectedicon) {
													echo '<li>' . 
														'<a target="_blank" href="' . $socialicon->icon_link . '" title="' . $socialicon->icon_tooltip . '">' . 
															'<img src="' . get_template_directory_uri() . '/images/social_icons/' . $socialicon->icon_file . '" alt="' . $socialicon->icon_name . '" />' . 
														'</a>' . 
													'</li>';
												}
											}
										}
										
										echo '</ul>';
									}
									?>
								</div>
							</div>
<!-- _________________________ Start Navigation _________________________ -->
							<nav>
							<?php
							if (has_nav_menu('primary')) {
								wp_nav_menu(array( 
									'theme_location' => 'primary', 
									'container' => false, 
									'menu_id' => 'navigation', 
									'menu_class' => 'navigation', 
									'link_before' => '<span>', 
									'link_after' => '</span>',
									'walker' => new Nav_Description()
								));
							} else {
								echo '<ul id="navigation">';
								
								wp_list_pages(array( 
									'title_li' => '', 
									'link_before' => '<span>', 
									'link_after' => '</span>' 
								));
								
								echo '</ul>';
							}
							?>
							</nav>
<!-- _________________________ Finish Navigation _________________________ -->
						</div>
					</div>
					<div class="cl"></div>
				</header>
<!-- _________________________ Finish Header _________________________ -->
				<?php if (!is_page_template('splash.php') && !is_front_page() && $breadcrumbs_active == 'true') {
					include CMSMASTERS_PAGES . '/breadcrumbs.php';
				}
				?>
<!-- _________________________ Start Middle _________________________ -->
				<?php if (!is_page_template('splash.php')) {
					echo '<section id="middle"'; 
					if (is_page_template('portfolio.php')) { echo ' class="portfolio_page"'; } echo '>';
				}?>
<!-- _________________________ Start Top _________________________ -->
					<?php 
					if ( 
						!is_home() && 
						!is_404() && 
						!is_archive() && 
						!is_search() && 
						!is_page_template('splash.php') && 
						$slider_active == 'true' && 
						!empty($sliderOptions) 
					) { 
						echo '<section id="top">';
					?>
						
<!-- _________________________ Start Slider __________________________ -->
						<?php include CMSMASTERS_PAGES . '/slider.php'; ?>
<!-- _________________________ Finish Slider __________________________ -->
					
					<?php 
						echo '</section>';
					}
					?>
<!-- _________________________ Finish Top _________________________ -->
					<?php
					if (!$page_layout || is_home() || is_archive() || is_search()) {
						$page_layout = 'sidebar_bg';
					}
					
					if (is_404()) {
						$page_layout = 'nobg';
					}
					
					if (!$heading) {
						$heading = 'default';
					}
					
					if (!is_404() && !is_home()) {
						if (is_archive() || is_search() || $heading == 'default') {
						?>
							<div class="headline">
								<h2><?php
								if (is_search()) {
									echo __('Search Results for', 'cmsmasters') . ': <em>' . get_search_query() . '</em>';
								} elseif (is_archive()) {
									if (is_day()) {
										echo __('Daily Archives', 'cmsmasters') . ': <em>' . get_the_date() . '</em>';
									} elseif (is_month()) {
										echo __('Monthly Archives', 'cmsmasters') . ': <em>' . get_the_date('F Y') . '</em>';
									} elseif (is_year()) {
										echo __('Yearly Archives', 'cmsmasters') . ': <em>' . get_the_date('Y') . '</em>';
									} elseif (is_category()) {
										echo __('Category Archives', 'cmsmasters') . ': <em>' . single_cat_title('', false) . '</em>';
									} elseif (is_tag()) {
										echo __('Tag Archives', 'cmsmasters') . ': <em>' . single_tag_title('', false) . '</em>';
									} elseif (is_author()) {
										the_post();
										
										echo __('Author Archives', 'cmsmasters') . ': <em>' . get_the_author() . '</em>';
										
										rewind_posts();
									} elseif (taxonomy_exists('pt-sort-categ') || taxonomy_exists('pt-tags')) {
										_e('Portfolio Archives', 'cmsmasters');
									} else {
										_e('Website Archives', 'cmsmasters');
									}
								} else {
									the_title();
								}
								?></h2>
							</div>
						<?php
						} elseif (!is_archive() && !is_search() && $heading == 'custom') { 
						?>
							<div class="headline">
							<?php
							if ($heading_icon == '') {
								if ($heading_description == '') { 
									echo '<h2>' . (($heading_title != '') ? $heading_title : get_the_title()) . '</h2>';
								} else { 
								?>
								<table class="pagehead">
									<tbody>
										<tr>
											<td class="with_text">
												<?php 
												echo '<h2>' . (($heading_title != '') ? $heading_title : get_the_title()) . '</h2>' . 
												'<h6>' . $heading_description . '</h6>';
												?>
											</td>
										</tr>
									</tbody>
								</table>
								<?php 
								}
							} else { 
								?>
								<table class="pagehead clpad">
									<tbody>
										<tr>
											<td><img alt="" src="<?php echo $heading_icon; ?>" /></td>
											<td>
											<?php 
												
												if ($heading_description == '') {
												
													echo '<h2 class="icon_heading">' . (($heading_title != '') ? $heading_title : get_the_title()) . '</h2>';
													
												} else {
												
													echo '<h2>' . (($heading_title != '') ? $heading_title : get_the_title()) . '</h2>';
													echo '<h6>' . $heading_description . '</h6>';
												}
											?>
											</td>
										</tr>
									</tbody>
								</table>
							<?php } ?>
							</div>
						<?php 
						} elseif ( 
							( 
								!is_archive() && 
								!is_search() && 
								$heading == 'sidebar' && 
								is_active_sidebar('sidebar_top') 
							) 
						) { 
							echo '<section id="top_sidebar">';
							
							if (function_exists('dynamic_sidebar')) {
								dynamic_sidebar('sidebar_top');
							}
							
							echo '<div class="cl"></div>' . 
							'</section>';
							
						}
					}
					
					if (is_page_template('portfolio.php')) { 
						wp_enqueue_script('isotope');
						wp_enqueue_script('isotopeRun');
						
						if ($filter_active == 'true') { 
					?>
						<div class="pj_sort_wrap">
							<div class="pj_sort">
								<div class="p_options_loader"></div>
								<div class="p_options_block">
									<div class="p_sort">
										<a name="p_name" class="button" title="<?php _e('Name', 'cmsmasters'); ?>" href="#"><span><?php _e('Name', 'cmsmasters'); ?></span></a>
										<a name="p_date" class="button" title="<?php _e('Date', 'cmsmasters'); ?>" href="#"><span><?php _e('Date', 'cmsmasters'); ?></span></a>
									</div>
									<div class="p_filter">
										<div class="p_filter_container">
											<a class="p_cat_filter button" data-filter="article.portfolio" title="<?php _e('All Categories', 'cmsmasters'); ?>" href="#"><span><?php _e('All Categories', 'cmsmasters'); ?></span></a>
											<ul class="p_filter">
												<li class="current"><a data-filter="article.portfolio" title="<?php _e('All Categories', 'cmsmasters'); ?>" href="#" class="current"><?php _e('All Categories', 'cmsmasters'); ?></a></li>
												<?php
												$pt_categs = get_terms('pt-sort-categ', 'orderby=name');
												
												if (is_array($pt_categs) && !empty($pt_categs)) {
													foreach ($pt_categs as $pt_categ) {
														echo '<li><a href="#" data-filter="article.portfolio[data-category~=\'' . $pt_categ->slug . '\']" title="' . $pt_categ->name . '">' . $pt_categ->name . '</a></li>' . "\n";
													}
												}
												?>
											</ul>
										</div>
										<div class="cl"></div>
									</div>
									<div class="cl"></div>
								</div>
							</div>
						</div>
					<?php 
						}
					}
					?>
					<?php if (!is_page_template('splash.php')) {
						echo '<div class="content_wrap ' . $page_layout . '">';
					} ?>
