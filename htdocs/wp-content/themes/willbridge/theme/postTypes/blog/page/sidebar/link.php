<?php
/**
 * @package WordPress
 * @subpackage Willbridge
 * @since Willbridge 1.0
 * 
 * Blog Page with Sidebar Link Post Format Template
 * Created by CMSMasters
 * 
 */


$post_link_text = get_post_meta(get_the_ID(), 'post_link_text', true);
$post_link_link = get_post_meta(get_the_ID(), 'post_link_link', true);

if ($post_link_text == '') {
    $post_link_text = __('Enter link text', 'cmsmasters');
}

if ($post_link_link == '') {
    $post_link_link = '#';
}

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<h1>
			<a href="<?php echo $post_link_link; ?>" target="_blank"><?php echo $post_link_text; ?></a>
		</h1>
		<h6>- <?php echo $post_link_link; ?> -</h6>
	</header>
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