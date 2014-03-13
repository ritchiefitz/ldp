<?php
/**
 * @package WordPress
 * @subpackage Willbridge
 * @since Willbridge 1.0
 * 
 * Blog Post with Sidebar Aside Post Format Template
 * Created by CMSMasters
 * 
 */


global $blog_post_tags;

?>
<article id="post-<?php the_ID(); ?>" <?php post_class('post-article'); ?>>
	<header class="entry-header">
		<?php 
			if (get_the_content() != '') {
				echo '<div class="entry-content">' . get_the_content() . '</div>';
			} else {
				echo '<div class="entry-content">' . get_the_excerpt() . '</div>';
			}
		?>
	</header>
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
	<?php 
		wp_link_pages('before=<div class="subpage_nav"><strong>' . __('Pages', 'cmsmasters') . ':</strong>&link_before= [ &link_after= ] &after=</div>');
	?>
</article>