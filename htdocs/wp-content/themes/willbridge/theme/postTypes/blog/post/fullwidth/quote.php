<?php
/**
 * @package WordPress
 * @subpackage Willbridge
 * @since Willbridge 1.0
 * 
 * Blog Post Full Width Quote Post Format Template
 * Created by CMSMasters
 * 
 */


global $blog_post_tags;

?>
<article id="post-<?php the_ID(); ?>" <?php post_class('post-article'); ?>>
	<blockquote>
	<?php 
		if (has_excerpt()) {
			echo '<p>' . get_the_excerpt() . '</p>';
		} else {
			echo '<p>' . __('Enter post excerpt', 'cmsmasters') . '</p>';
		}
	?>
	</blockquote>
	<div class="entry-content">
	<?php 
		the_content();
	?>
	</div>
	<footer class="entry-meta">
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
		<?php 
		wp_link_pages('before=<div class="subpage_nav"><strong>' . __('Pages', 'cmsmasters') . ':</strong>&link_before= [ &link_after= ] &after=</div>');
		?>
	</div>
</article>