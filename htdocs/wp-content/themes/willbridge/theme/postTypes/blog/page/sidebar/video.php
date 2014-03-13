<?php
/**
 * @package WordPress
 * @subpackage Willbridge
 * @since Willbridge 1.0
 * 
 * Blog Page with Sidebar Video Post Format Template
 * Created by CMSMasters
 * 
 */


$post_video_link = explode(',', str_replace(' ', '', get_post_meta(get_the_ID(), 'post_video_link', true)));

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php cmsms_heading(get_the_ID()); ?>
	</header>
	<footer class="entry-meta">
		<?php 
			if ($post_video_link[0] != '') {
				$try_link = explode(':', $post_video_link[0], 2);
				
				if ($try_link[0] != 'http') {
					foreach ($post_video_link as $post_video) {
						$link = explode(':', $post_video, 2);

						if ($link[0] != 'http') {
							$video_link[$link[0]] = $link[1];
						}
					}

					if (has_post_thumbnail()) {
						$poster = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'post-thumbnail');
						
						$video_link['poster'] = $poster[0];
					}
					
					echo '<div class="cmsms_media">' . 
						cmsmastersSingleVideoPlayer($video_link) . 
					'</div>';
				} else {
					echo '<div class="resizable_block">' . 
							get_video_iframe($post_video_link[0]) . 
						'</div>';
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