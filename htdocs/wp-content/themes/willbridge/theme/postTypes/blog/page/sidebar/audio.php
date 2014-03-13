<?php
/**
 * @package WordPress
 * @subpackage Willbridge
 * @since Willbridge 1.0
 * 
 * Blog Page with Sidebar Audio Post Format Template
 * Created by CMSMasters
 * 
 */


$post_audio_link = explode(',', str_replace(' ', '', get_post_meta(get_the_ID(), 'post_audio_link', true)));

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php cmsms_heading(get_the_ID()); ?>
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