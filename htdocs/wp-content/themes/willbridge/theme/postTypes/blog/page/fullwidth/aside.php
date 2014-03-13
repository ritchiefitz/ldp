<?php
/**
 * @package WordPress
 * @subpackage Willbridge
 * @since Willbridge 1.0
 * 
 * Blog Page Full Width Aside Post Format Template
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
		<?php echo '<div class="entry-content">' . theme_excerpt(55, false) . '</div>'; ?>
	</div>
</article>