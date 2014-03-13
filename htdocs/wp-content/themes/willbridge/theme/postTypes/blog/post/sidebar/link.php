<?php
/**
 * @package WordPress
 * @subpackage Willbridge
 * @since Willbridge 1.0
 * 
 * Blog Post with Sidebar Link Post Format Template
 * Created by CMSMasters
 * 
 */


global $blog_post_tags;

$post_link_text = get_post_meta(get_the_ID(), 'post_link_text', true);
$post_link_link = get_post_meta(get_the_ID(), 'post_link_link', true);

if ($post_link_text == '') {
    $post_link_text = __('Enter link text', 'cmsmasters');
}

if ($post_link_link == '') {
    $post_link_link = '#';
}

?>
<article id="post-<?php the_ID(); ?>" <?php post_class('post-article'); ?>>
	<h1>
		<a href="<?php echo $post_link_link; ?>" target="_blank"><?php echo $post_link_text; ?></a>
	</h1>
	<h6>- <?php echo $post_link_link; ?> -</h6>
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
			the_content();
			
			wp_link_pages('before=<div class="subpage_nav"><strong>' . __('Pages', 'cmsmasters') . ':</strong>&link_before= [ &link_after= ] &after=</div>');

		?>
	</div>
</article>