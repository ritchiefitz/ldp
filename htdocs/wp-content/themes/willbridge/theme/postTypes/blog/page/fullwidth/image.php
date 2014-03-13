<?php
/**
 * @package WordPress
 * @subpackage Willbridge
 * @since Willbridge 1.0
 * 
 * Blog Page Full Width Image Post Format Template
 * Created by CMSMasters
 * 
 */

 
$attachments =& get_children(array(
	'post_type' => 'attachment', 
	'post_mime_type' => 'image', 
	'post_parent' => get_the_ID(), 
	'orderby' => 'menu_order', 
	'order' => 'ASC'
));

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php cmsms_heading(get_the_ID()); ?>
	</header>
	<footer class="entry-meta">
		<?php 
			if (has_post_thumbnail()) { 
				echo '<div class="blog_media">';
				
				cmsms_thumb(get_the_ID(), 'full-slider-thumb', false, 'prettyPhoto', true, false, true, true, false);
				
				echo '</div>';
			} elseif (!has_post_thumbnail() && sizeof($attachments) > 0) {
				foreach ($attachments as $attachment) { 
					if (!isset($counter) && $counter = true) { 
						echo '<div class="blog_media">';
						
						cmsms_thumb(get_the_ID(), 'full-slider-thumb', false, 'prettyPhoto', true, true, true, true, $attachment->ID);
						
						echo '</div>';
					}
				}
			}
		?>
		<div class="atricle_box">
			<span class="cmsms_format"></span>
			<?php 
				cmsms_comments();
				
				cmsms_meta();
				
				cmsms_tags(get_the_ID(), 'post', 'page');
			?>
		</div>
	</footer>
	<div class="blog_text">
		<?php 
			cmsms_exc_cont();
			
			cmsms_more(get_the_ID());
		?>
	</div>
</article>