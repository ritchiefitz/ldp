<?php
/**
 * @package WordPress
 * @subpackage Willbridge
 * @since Willbridge 1.0
 * 
 * Portfolio Page Full Width Album Project Format Template
 * Created by CMSMasters
 * 
 */


global $selected_numbercolumns_full;

$attachments =& get_children(array(
	'post_type' => 'attachment', 
	'post_mime_type' => 'image', 
	'post_parent' => get_the_ID(), 
	'orderby' => 'menu_order', 
	'order' => 'ASC', 
	'exclude' => get_post_thumbnail_id(get_the_ID()) 
));

if (!$selected_numbercolumns_full) {
    $selected_numbercolumns_full = 'four_blocks';
}

if ($selected_numbercolumns_full == 'four_blocks' || $selected_numbercolumns_full == 'three_blocks') {
    $project_thumb = 'project-thumb';
} elseif ($selected_numbercolumns_full == 'two_blocks') {
    $project_thumb = 'post-thumbnail';
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
<article id="post-<?php the_ID(); ?>" <?php post_class('format-album'); ?> data-category="<?php echo $pt_categs; ?>">
	<div class="portfolio_inner">
		<div class="portfolio_inner_box">
		<?php 
			
			if (has_post_thumbnail()) {
				cmsms_thumb(get_the_ID(), $project_thumb, false, 'prettyPhoto', true, false, true, true, false, 'full');
			} elseif (sizeof($attachments) > 1) {
				foreach ($attachments as $attachment) {
					if (!isset($counter) && $counter = true) {
						cmsms_thumb(get_the_ID(), $project_thumb, false, 'prettyPhoto', true, false, true, true, $attachment->ID, 'full');
						
						$att = $attachment;
					}
				}
			}
			
			echo '<header class="entry-header">' . 
			'<h6 class="entry-title">'; 
			cmsms_heading(get_the_ID(), 'project', 'fullwidth');
			echo '</h6>' . 
			'</header>';
			echo '<div class="hover_effect">' . 
				'<h5 class="entry-title">'; 
				cmsms_heading(get_the_ID(), 'project', 'fullwidth');
				echo '</h5>';
				echo '<div class="hover_effect_links">';
				
				if (has_post_thumbnail()) {
					$link_img = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full');
					
					echo '<a href="' . $link_img[0] . '" class="cmsms_imagelink" rel="prettyPhoto[' . get_the_ID() . ']" title="' . cmsms_title(get_the_ID(), false) . '"></a>';
				} else if (sizeof($attachments) > 1) {
					$link_img = wp_get_attachment_image_src($att->ID, 'full');
					
					echo '<a href="' . $link_img[0] . '" class="cmsms_imagelink" rel="prettyPhoto[' . get_the_ID() . ']" title="' . $att->post_title . '"></a>';
				}
				
				echo '<a class="cmsms_link" href="' . get_permalink() . '"></a>';
				echo '</div>';
				
				cmsms_meta('project', 'page', get_the_ID(), 'pt-sort-categ', 'fullwidth');
			
			echo '</div>';
			
			if ( 
				(sizeof($attachments) > 1) || 
				(has_post_thumbnail() && sizeof($attachments) == 1) 
			) {
				echo '<div style="display:none;">';
				
				foreach ($attachments as $attachment) {
					if (!isset($counter)) {
						echo '<a href="' . $attachment->guid . '" rel="prettyPhoto[' . get_the_ID() . ']" title="' . $attachment->post_title . '">' . 
							wp_get_attachment_image($attachment->ID, 'full', false, array( 
								'class' => 'fullwidth', 
								'alt' => $attachment->post_title, 
								'title' => $attachment->post_title 
							)) . 
						'</a>';
					} else {
						unset($counter);
					}
				}
				
				echo '</div>';
			}
			
			/*cmsms_exc_cont('project', 'fullwidth');
			
			cmsms_more(get_the_ID(), 'project', 'fullwidth');*/
		?>
		</div>
	</div>
</article>