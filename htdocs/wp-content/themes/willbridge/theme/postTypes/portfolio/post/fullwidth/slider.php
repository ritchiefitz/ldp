<?php
/**
 * @package WordPress
 * @subpackage Willbridge
 * @since Willbridge 1.0
 * 
 * Portfolio Project Full Width Slider Project Format Template
 * Created by CMSMasters
 * 
 */


global $portfolio_post_title, 
	$portfolio_post_tags;

$project_tags = get_the_terms(get_the_ID(), 'pt-tags');

$attachments =& get_children(array(
	'post_type' => 'attachment', 
	'post_mime_type' => 'image', 
	'post_parent' => get_the_ID(), 
	'orderby' => 'menu_order', 
	'order' => 'ASC', 
	'exclude' => get_post_thumbnail_id(get_the_ID()) 
));

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(array('format-slider', 'project')); ?>>
	<header class="entry-header">
	<?php 
		if ($portfolio_post_title) { 
			cmsms_heading_nolink(get_the_ID());
		}
	?>
	</header>
	<div class="cmsms_media">
		<?php if (sizeof($attachments) > 1 || (sizeof($attachments) == 1 && has_post_thumbnail())) { ?>
		<div class="shortcode_slideshow" id="slideshow_<?php the_ID(); ?>">
			<div class="shortcode_slideshow_body">
				<script type="text/javascript">
					jQuery(window).load(function () { 
						jQuery('#slideshow_<?php the_ID(); ?> .shortcode_slideshow_slides').cmsmsResponsiveContentSlider( { 
							sliderWidth : '100%', 
							sliderHeight : 'auto', 
							animationSpeed : 500, 
							animationEffect : 'slide', 
							animationEasing : 'easeInOutExpo', 
							pauseTime : 0, 
							activeSlide : 1, 
							touchControls : true, 
							pauseOnHover : false, 
							arrowNavigation : false, 
							slidesNavigation : true 
						} ); 
					} );
				</script>
				<div class="shortcode_slideshow_container">
					<ul class="shortcode_slideshow_slides responsiveContentSlider">
				<?php 
					if (has_post_thumbnail()) {
						echo '<li>' . 
							'<figure>' . 
								wp_get_attachment_image(get_post_thumbnail_id(get_the_ID()), 'full-slider-thumb', false, array( 
									'class' => 'fullwidth', 
									'alt' => cmsms_title(get_the_ID(), false), 
									'title' => cmsms_title(get_the_ID(), false), 
									'style' => 'width:100%; height:auto;' 
								)) . 
							'</figure>' . 
						'</li>';
					}
					
					foreach ($attachments as $attachment) {
						echo '<li>' . 
							'<figure>' . 
								wp_get_attachment_image($attachment->ID, 'full-slider-thumb', false, array( 
									'class' => 'fullwidth', 
									'alt' => $attachment->post_title, 
									'title' => $attachment->post_title, 
									'style' => 'width:100%; height:auto;' 
								)) . 
							'</figure>' . 
						'</li>';
					}
				?>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<?php 
	} elseif (sizeof($attachments) == 1 && !has_post_thumbnail()) {
		foreach ($attachments as $attachment) {
			echo '<div class="cmsms_media">';
			
			cmsms_thumb(get_the_ID(), 'full-slider-thumb', false, 'prettyPhoto', true, true, true, true, $attachment->ID, 'full');
			
			echo '</div>';
		}
	} elseif (has_post_thumbnail()) {
		echo '<div class="cmsms_media">';
		
		cmsms_thumb(get_the_ID(), 'full-slider-thumb', false, 'prettyPhoto', true, true, true, true, false, 'full');
		
		echo '</div>';
	}
	
	echo '<div class="cl"></div>';
	echo '<div class="two_third">' . 
		'<h3>' . __('Project description', 'cmsmasters') . '</h3>';
		if (get_the_content() != '') {
			echo '<div class="entry-content">';
			
			the_content();
			
			wp_link_pages('before=<div class="subpage_nav"><strong>' . __('Pages', 'cmsmasters') . ':</strong>&link_before= [ &link_after= ] &after=</div>');
			
			echo '</div>';
		} else {
			echo '';
		}
	
	echo '</div>';
	
	echo '<footer class="entry-meta one_third">';
		echo '<h3>' . __('Project details', 'cmsmasters') . '</h3>' . 
		'<ul class="cmsms_details">';
			cmsms_meta('project', 'post', get_the_ID(), 'pt-sort-categ');
			
			if ($portfolio_post_tags && $project_tags) {
				cmsms_tags(get_the_ID(), 'project', 'post', 'fullwidth', 'pt-tags');
			}
			
			cmsms_project_details();
		echo '</ul>';
	echo '</footer>' . 
	'<div class="cl"></div>';
?>
</article>