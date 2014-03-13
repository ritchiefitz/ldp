<?php
/**
 * @package WordPress
 * @subpackage Willbridge
 * @since Willbridge 1.0
 * 
 * Blog Page Full Width Quote Post Format Template
 * Created by CMSMasters
 * 
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
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
		<blockquote>
			<?php 
				if (has_excerpt()) {
					the_excerpt();
				} else {
					echo '<p>' . __('Enter post excerpt', 'cmsmasters') . '</p>';
				}
			?>
		</blockquote>
		<?php 
			if (get_the_content('') != '') { 
				global $more;
				
				$more = 0;
				
				the_content('');
			}
		?>
	</div>
</article>