<?php
/**
 * @package WordPress
 * @subpackage Willbridge
 * @since Willbridge 1.0
 * 
 * Blog Post Full Width Standard Post Format Template
 * Created by CMSMasters
 * 
 */


global $blog_post_title, 
	$blog_post_tags;

?>
<article id="post-<?php the_ID(); ?>" <?php post_class('post-article'); ?>>
	<header class="entry-header">
	<?php 
		if ($blog_post_title) { 
			cmsms_heading_nolink(get_the_ID());
		}
	?>
	</header>
	<footer class="entry-meta">
		<?php 
			if (has_post_thumbnail()) { 
				echo '<div class="cmsms_media">';
				
				cmsms_thumb(get_the_ID(), 'full-thumb', false, 'prettyPhoto', true, false, true, true, false);
				
				echo '</div>';
			}
		?>
		<div class="atricle_box">
			<span class="cmsms_format"></span>
			<?php 
				cmsms_comments();
				
				cmsms_meta('post', 'post');
				
				cmsms_tags(get_the_ID(), 'post', 'post');
			?>
		</div>
	</footer>
	<div class="blog_text">
		<div class="entry-content">
		<?php 
			the_content();
		?>
		</div>
		<?php 
			wp_link_pages('before=<div class="subpage_nav"><strong>' . __('Pages', 'cmsmasters') . ':</strong>&link_before= [ &link_after= ] &after=</div>');
		?>
	</div>
</article>