<?php
/**
 * @package WordPress
 * @subpackage Willbridge
 * @since Willbridge 1.0
 * 
 * Blog Post Full Width Audio Post Format Template
 * Created by CMSMasters
 * 
 */


global $blog_post_title, 
	$blog_post_tags;

$post_audio_link = explode(',', str_replace(' ', '', get_post_meta(get_the_ID(), 'post_audio_link', true)));

?>
<article id="post-<?php the_ID(); ?>" <?php post_class('post-article'); ?>>
	<header class="entry-header">
	<?php 
		if ($blog_post_title) { 
			cmsms_heading_nolink(get_the_ID());
		}
	?>
	</header>
	<?php 
		if ($post_audio_link[0] != '') {
			foreach ($post_audio_link as $post_audio) {
				$link = explode(':', $post_audio, 2);
				
				$audio_link[$link[0]] = $link[1];
			}
			
			echo '<div class="cmsms_media">' . 
				cmsmastersSingleAudioPlayer($audio_link) . 
			'</div>';
		}
	?>
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
		<div class="entry-content">
		<?php 
			the_content();
			
			wp_link_pages('before=<div class="subpage_nav"><strong>' . __('Pages', 'cmsmasters') . ':</strong>&link_before= [ &link_after= ] &after=</div>');
		?>
		</div>
	</div>
</article>