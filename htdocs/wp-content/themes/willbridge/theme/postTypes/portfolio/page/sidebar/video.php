<?php
/**
 * @package WordPress
 * @subpackage Willbridge
 * @since Willbridge 1.0
 * 
 * Portfolio Page with Sidebar Video Project Format Template
 * Created by CMSMasters
 * 
 */


global $selected_numbercolumns_sidebar;

$project_video_link = explode(',', str_replace(' ', '', get_post_meta(get_the_ID(), 'project_video_link', true)));

if (!$selected_numbercolumns_sidebar) {
    $selected_numbercolumns_sidebar = 'three_blocks';
}

if ($selected_numbercolumns_sidebar == 'three_blocks' || $selected_numbercolumns_sidebar == 'two_blocks') {
    $project_thumb = 'project-thumb';
}

$pt_sort_categs = get_the_terms(0, 'pt-sort-categ');

if ($pt_sort_categs != '') {
	$pt_categs = '';
	
	foreach ($pt_sort_categs as $pt_sort_categ) {
		$pt_categs .= ' ' . $pt_sort_categ->slug;
	}
	
	$pt_categs = ltrim($pt_categs, ' ');
}

?>
<article id="post-<?php the_ID(); ?>" <?php post_class('format-video'); ?> data-category="<?php echo $pt_categs; ?>">
	<div class="portfolio_inner">
		<div class="portfolio_inner_box">
		<?php 
			
			if (has_post_thumbnail()) {
				cmsms_thumb(get_the_ID(), $project_thumb, true, false, true, false, true, true, false);
			} elseif ($project_video_link[0] != '') {
				$try_link = explode(':', $project_video_link[0], 2);
				
				if ($try_link[0] != 'http') {
					foreach ($project_video_link as $post_video) {
						$link = explode(':', $post_video, 2);
						
						if ($link[0] != 'http') {
							$video_link[$link[0]] = $link[1];
						}
					}
					
					if (has_post_thumbnail()) {
						$image_link = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), $project_thumb, false);
						
						$video_link['poster'] = $image_link[0];
					}
					
					echo cmsmastersSingleVideoPlayer($video_link);
				} else {
					echo '<div class="resizable_block">' . 
						get_video_iframe($project_video_link[0]) . 
					'</div>';
				}
			} elseif (has_post_thumbnail()) {
				cmsms_thumb(get_the_ID(), $image_width, $image_height, false, 'prettyPhoto');
			}
			
			echo '<header class="entry-header">' . 
			'<h6 class="entry-title">';
			cmsms_heading(get_the_ID(), 'project', 'sidebar');
			echo '</h6>' . 
			'</header>';
			echo '<div class="hover_effect">' . 
				'<h5 class="entry-title">'; 
				cmsms_heading(get_the_ID(), 'project', 'sidebar');
				echo '</h5>';
				
				echo '<div class="hover_effect_links">';
				$try_link2 = explode(':', $project_video_link[0], 2);
				if ($try_link2[0] == 'http') {
					echo '<a class="cmsms_imagelink" title="' . cmsms_title(get_the_ID(), false) . '" rel="prettyPhoto" href="' . 
						$project_video_link[0] . '">' . 
					'</a>';
					
				} 
				echo '<a class="cmsms_link" href="' . get_permalink() . '"></a>';
				
				echo '</div>';
				cmsms_meta('project', 'page', get_the_ID(), 'pt-sort-categ', 'sidebar');
			
			echo '</div>';
			/*cmsms_meta('project', 'page', get_the_ID(), 'pt-sort-categ', 'sidebar');
			
			cmsms_exc_cont('project', 'sidebar');
			
			cmsms_more(get_the_ID(), 'project', 'sidebar');*/
		?>
		</div>
	</div>
</article>