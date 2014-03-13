<?php
/**
 * @package WordPress
 * @subpackage Willbridge
 * @since Willbridge 1.0
 * 
 * Portfolio Project Full Width Album Project Format Template
 * Created by CMSMasters
 * 
 */


global $portfolio_post_title,
	$portfolio_post_tags;

$selected_numbercolumns_full_album = get_post_meta(get_the_ID(), 'selected_numbercolumns_full_album', true);

$project_tags = get_the_terms(get_the_ID(), 'pt-tags');

$attachments =& get_children(array(
	'post_type' => 'attachment', 
	'post_mime_type' => 'image', 
	'post_parent' => get_the_ID(), 
	'orderby' => 'menu_order', 
	'order' => 'ASC' 
));

if (!$selected_numbercolumns_full_album) {
    $selected_numbercolumns_full_album = 'four_blocks';
}

if ($selected_numbercolumns_full_album == 'four_blocks' || $selected_numbercolumns_full_album == 'three_blocks') {
    $project_thumb = 'project-thumb';
} elseif ($selected_numbercolumns_full_album == 'two_blocks') {
    $project_thumb = 'post-thumbnail';
} elseif ($selected_numbercolumns_full_album == 'one_block') {
    $project_thumb = 'full-thumb';
}

$colnumb = 0;

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(array('format-album', 'project', $selected_numbercolumns_full_album)); ?>>
	<header class="entry-header">
	<?php 
		if ($portfolio_post_title) { 
			cmsms_heading_nolink(get_the_ID());
		}
	?>
	</header>
<?php 
	if (sizeof($attachments) > 0) {
		echo '<div class="resize">';
		
		foreach ($attachments as $attachment) {
			if ($selected_numbercolumns_full_album == 'one_block') { 
				if ($colnumb == 1) {
					echo '</div><div class="resize">';
					
					$colnumb = 0;
				}
			} else if ($selected_numbercolumns_full_album == 'two_blocks') {
				if ($colnumb == 2) {
					echo '</div><div class="resize">';
					
					$colnumb = 0;
				}
			} else if ($selected_numbercolumns_full_album == 'three_blocks') {
				if ($colnumb == 3) {
					echo '</div><div class="resize">';
					
					$colnumb = 0;
				}
			} else if ($selected_numbercolumns_full_album == 'four_blocks') {
				if ($colnumb == 4) {
					echo '</div><div class="resize">';
					
					$colnumb = 0;
				}
			}
			
			echo '<div class="cmsms_media_box">' . 
				'<figure>' . 
					'<a href="' . $attachment->guid . '" rel="prettyPhoto[' . get_the_ID() . ']" title="' . $attachment->post_title . '" class="preloader">' . 
						wp_get_attachment_image($attachment->ID, $project_thumb, false, array( 
							'class' => 'fullwidth', 
							'alt' => $attachment->post_title, 
							'title' => $attachment->post_title, 
							'style' => 'width:100%; height:auto;' 
						)) . 
					'</a>' . 
				'</figure>' . 
			'</div>';
			
			$colnumb++;
		}
		
		echo '</div>';
	} elseif (has_post_thumbnail()) {
		echo '<div class="cmsms_media">';
		
		cmsms_thumb(get_the_ID(), 'full-thumb', false, 'prettyPhoto', true, true, true, true, false, 'full');
		
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