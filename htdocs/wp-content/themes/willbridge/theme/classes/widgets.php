<?php
/**
 * @package WordPress
 * @subpackage Willbridge
 * @since Willbridge 1.3.2
 * 
 * Custom Theme Widgets
 * Created by CMSMasters
 * 
 */


/**
 * Flickr Widget Class
 */
class WP_Widget_Custom_Flickr extends WP_Widget {
	function __construct() {
		$widget_ops = array('classname' => 'widget_custom_flickr_entries', 'description' => __('Your Flickr account latest images', 'cmsmasters'));
		parent::__construct('custom-flickr', '&nbsp;' . __('CMSMS - Flickr', 'cmsmasters'), $widget_ops);
	}
	
	function widget($args, $instance) {
		extract($args);
		
		$title = apply_filters('widget_title', empty($instance['title']) ? __('Flickr', 'cmsmasters') : $instance['title'], $instance, $this->id_base);
		$user = isset($instance['user']) ? $instance['user'] : '';
		$number = isset($instance['number']) ? (int) $instance['number'] : '';
        $widget_width = isset($instance['widget_width']) ? $instance['widget_width'] : 'one_first';
		
        if (empty($instance['number']) || !$number = absint($instance['number'])) {
            $number = 6;
        } elseif ($number < 1) {
            $number = 1;
        } elseif ($number > 15) {
            $number = 15;
        }
		
		echo '<div class="' . $widget_width . '">' . 
			$before_widget . 
			'<div id="flickr">';
		
		if ($title) { 
			echo $before_title . $title . $after_title;
		}
		
		echo '<div class="wrap">' . 
				'<script type="text/javascript" src="http://www.flickr.com/badge_code_v2.gne?count=' . $number . '&amp;display=latest&amp;size=s&amp;layout=x&amp;source=user&amp;user=' . $user . '"></script>' . 
			'</div>' . 
			'<div class="cl"></div>' . 
			'<a class="link_arrow" href="http://www.flickr.com/photos/' . $user . '" target="_blank">' . __('All Flickr Images', 'cmsmasters') . '</a>' . 
			'</div>' . 
			$after_widget . 
		'</div>';
	}
	
	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		
		$instance['title'] = strip_tags($new_instance['title']);
        $instance['user'] = strip_tags($new_instance['user']);
        $instance['number'] = absint($new_instance['number']);
        $instance['widget_width'] = $new_instance['widget_width'];
		
		return $instance;
	}
	
    function form($instance) {
        $title = isset($instance['title']) ? esc_attr($instance['title']) : '';
        $user = isset($instance['user']) ? esc_attr($instance['user']) : '';
        $number = (isset($instance['number']) && $instance['number'] != 0) ? absint($instance['number']) : 6;
        $widget_width = (isset($instance['widget_width']) && $instance['widget_width'] != '') ? $instance['widget_width'] : 'one_first';
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title', 'cmsmasters'); ?>:<br />
                <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
            </label>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('user'); ?>"><?php _e('Flickr ID', 'cmsmasters'); ?> (<a href="http://www.idgettr.com" target="_blank">idGettr</a>):<br />
                <input class="widefat" id="<?php echo $this->get_field_id('user'); ?>" name="<?php echo $this->get_field_name('user'); ?>" type="text" value="<?php echo $user; ?>" />
            </label>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('number'); ?>"><?php _e("Enter the number of latest flickr images you'd like to display", 'cmsmasters'); ?>:<br /><br />
                <input id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" type="text" value="<?php echo $number; ?>" size="3" />
                <small style="color:#ff0000; float:right; padding-top:5px;"><?php _e('default is', 'cmsmasters'); ?> 6</small><br />
            </label>
        </p>
		<p style="border-top:1px solid #dfdfdf; border-bottom:1px solid #dfdfdf; padding:10px 0; overflow:hidden;">
			<label for="<?php echo $this->get_field_id('widget_width'); ?>">
				<?php _e('Choose the width of widget', 'cmsmasters'); ?>:<br /><br />
                <small style="color:#f00; float:right; padding-top:5px;"><?php _e('Only for horizontal sidebars', 'cmsmasters'); ?></small>
                <select id="<?php echo $this->get_field_id('widget_width'); ?>" name="<?php echo $this->get_field_name('widget_width'); ?>" style="float:left;">
                    <option <?php if ($widget_width == 'one_first') { echo 'selected="selected" '; } ?>value="one_first">-- 1/1 --&nbsp;</option>
                    <option <?php if ($widget_width == 'three_fourth') { echo 'selected="selected" '; } ?>value="three_fourth">-- 3/4 --&nbsp;</option>
                    <option <?php if ($widget_width == 'two_third') { echo 'selected="selected" '; } ?>value="two_third">-- 2/3 --&nbsp;</option>
                    <option <?php if ($widget_width == 'one_half') { echo 'selected="selected" '; } ?>value="one_half">-- 1/2 --&nbsp;</option>
                    <option <?php if ($widget_width == 'one_third') { echo 'selected="selected" '; } ?>value="one_third">-- 1/3 --&nbsp;</option>
                    <option <?php if ($widget_width == 'one_fourth') { echo 'selected="selected" '; } ?>value="one_fourth">-- 1/4 --&nbsp;</option>
                </select>
            </label>
		</p>
        <div style="clear:both;"></div>
        <?php
    }
}



/**
 * Twitter Widget Class
 */
class WP_Widget_Custom_Twitter extends WP_Widget {
	function __construct() {
		$widget_ops = array('classname' => 'widget_custom_twitter_entries', 'description' => __('Your Twitter account latest tweets', 'cmsmasters'));
		parent::__construct('custom-twitter', '&nbsp;' . __('CMSMS - Twitter', 'cmsmasters'), $widget_ops);
	}
	
	function widget($args, $instance) {
		extract($args);
		
		$title = apply_filters('widget_title', empty($instance['title']) ? __('Twitter', 'cmsmasters') : $instance['title'], $instance, $this->id_base);
		$user = isset($instance['user']) ? $instance['user'] : '';
		$number = isset($instance['number']) ? (int) $instance['number'] : '';
        $widget_width = isset($instance['widget_width']) ? $instance['widget_width'] : 'one_first';
		
		$uid = uniqid();
		
        if (empty($instance['number']) || !$number = absint($instance['number'])) {
            $number = 3;
        } elseif ($number < 1) {
            $number = 1;
        } elseif ($number > 20) {
            $number = 20;
        }
		
		echo '<div class="' . $widget_width . '">' . 
			$before_widget;
?>
		<script type="text/javascript">
			jQuery(document).ready(function () { 
				jQuery('#<?php echo $args['widget_id']; ?>_tweets').tweet( { 
					modpath : '<?php echo get_template_directory_uri(); ?>/theme/classes/load_tweets.php', 
					username : '<?php echo $user; ?>', 
					count : <?php echo $number; ?>, 
					loading_text : '<?php _e('loading...', 'cmsmasters'); ?>', 
					template : '{avatar}{join}{text}{time}' 
				} ); 
			} );
		</script>
<?php 
		if ($title) { 
			echo $before_title . $title . $after_title;
		}
		
		echo '<div id="' . $args['widget_id'] . '_tweets"></div>' . 
			$after_widget . 
		'</div>';
	}
	
	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		
		$instance['title'] = strip_tags($new_instance['title']);
        $instance['user'] = strip_tags($new_instance['user']);
        $instance['number'] = absint($new_instance['number']);
        $instance['widget_width'] = $new_instance['widget_width'];
		
		return $instance;
	}
	
    function form($instance) {
        $title = isset($instance['title']) ? esc_attr($instance['title']) : '';
        $user = isset($instance['user']) ? esc_attr($instance['user']) : '';
        $number = (isset($instance['number']) && $instance['number'] != 0) ? absint($instance['number']) : 3;
        $widget_width = (isset($instance['widget_width']) && $instance['widget_width'] != '') ? $instance['widget_width'] : 'one_first';
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title', 'cmsmasters'); ?>:<br />
                <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
            </label>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('user'); ?>"><?php _e('Twitter Username', 'cmsmasters'); ?>:<br />
                <input class="widefat" id="<?php echo $this->get_field_id('user'); ?>" name="<?php echo $this->get_field_name('user'); ?>" type="text" value="<?php echo $user; ?>" />
            </label>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('number'); ?>"><?php _e("Enter the number of latest tweets you'd like to display", 'cmsmasters'); ?>:<br /><br />
                <input id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" type="text" value="<?php echo $number; ?>" size="3" />
                <small style="color:#ff0000; float:right; padding-top:5px;"><?php _e('default is', 'cmsmasters'); ?> 3</small><br />
            </label>
        </p>
		<p style="border-top:1px solid #dfdfdf; border-bottom:1px solid #dfdfdf; padding:10px 0; overflow:hidden;">
			<label for="<?php echo $this->get_field_id('widget_width'); ?>">
				<?php _e('Choose the width of widget', 'cmsmasters'); ?>:<br /><br />
                <small style="color:#f00; float:right; padding-top:5px;"><?php _e('Only for horizontal sidebars', 'cmsmasters'); ?></small>
                <select id="<?php echo $this->get_field_id('widget_width'); ?>" name="<?php echo $this->get_field_name('widget_width'); ?>" style="float:left;">
                    <option <?php if ($widget_width == 'one_first') { echo 'selected="selected" '; } ?>value="one_first">-- 1/1 --&nbsp;</option>
                    <option <?php if ($widget_width == 'three_fourth') { echo 'selected="selected" '; } ?>value="three_fourth">-- 3/4 --&nbsp;</option>
                    <option <?php if ($widget_width == 'two_third') { echo 'selected="selected" '; } ?>value="two_third">-- 2/3 --&nbsp;</option>
                    <option <?php if ($widget_width == 'one_half') { echo 'selected="selected" '; } ?>value="one_half">-- 1/2 --&nbsp;</option>
                    <option <?php if ($widget_width == 'one_third') { echo 'selected="selected" '; } ?>value="one_third">-- 1/3 --&nbsp;</option>
                    <option <?php if ($widget_width == 'one_fourth') { echo 'selected="selected" '; } ?>value="one_fourth">-- 1/4 --&nbsp;</option>
                </select>
            </label>
		</p>
        <div style="clear:both;"></div>
        <?php
    }
}



/**
 * Recent Comments Widget Class
 */
class WP_Widget_Custom_Recent_Comments extends WP_Widget {
	function __construct() {
		$widget_ops = array('classname' => 'widget_custom_comments_entries', 'description' => __('Your blog latest comments', 'cmsmasters'));
		parent::__construct('custom-recent-comments', '&nbsp;' . __('CMSMS - Comments', 'cmsmasters'), $widget_ops);
	}
	
	function widget($args, $instance) {
		extract($args);
		
		$title = apply_filters('widget_title', empty($instance['title']) ? __('Latest Comments', 'cmsmasters') : $instance['title'], $instance, $this->id_base);
		$number = isset($instance['number']) ? (int) $instance['number'] : '';
        $widget_width = isset($instance['widget_width']) ? $instance['widget_width'] : 'one_first';
		
        if (empty($instance['number']) || !$number = absint($instance['number'])) {
            $number = 3;
        } elseif ($number < 1) {
            $number = 1;
        } elseif ($number > 15) {
            $number = 15;
        }
		
        global $wpdb;
		
        $now = gmdate('Y-m-d H:i:s', time());
        $lastmonth = gmdate('Y-m-d H:i:s', gmmktime(date('H'), date('i'), date('s'), date('m') - 12, date('d'), date('Y')));
		
        $r = "SELECT pp.ID, 
			pp.post_title, 
			pp.guid, 
			cc.comment_ID AS 'stammy', 
			cc.comment_ID, 
			cc.comment_author, 
			cc.comment_date, 
			cc.comment_content 
		FROM $wpdb->posts AS pp 
		INNER JOIN $wpdb->comments AS cc 
		ON ( 
			(pp.ID = cc.comment_post_ID) 
			AND 
			(cc.comment_approved = '1') 
			AND 
			(cc.comment_date < '$now') 
			AND 
			(cc.comment_date > '$lastmonth') 
		) 
		WHERE ( 
			(pp.post_type = 'post') 
			AND 
			(pp.post_status = 'publish') 
			AND 
			(pp.comment_status = 'open') 
		) 
		GROUP BY cc.comment_ID 
		ORDER BY stammy DESC LIMIT " . $number;
		
        $rcomments = $wpdb->get_results($r);
		
        if ($rcomments) { 
			echo '<div class="' . $widget_width . '">' . 
				$before_widget;
			
			if ($title) { 
				echo $before_title . $title . $after_title;
			}
			
            echo '<ul>';
			
            foreach ($rcomments as $comment) { 
                $comment_author = $comment->comment_author;
                $post_title = $comment->post_title;
                $post_link = $comment->guid;
                $comment_date = mysql2date('U', $comment->comment_date, false);
                $comment_content = $comment->comment_content;
				
				echo '<li>' . 
					'<strong>' . $comment_author . '</strong> ' . __('on', 'cmsmasters') . ' <a href="' . $post_link . '#comments" rel="bookmark">' . $post_title . '</a>' . 
					'<br />' . 
					'<abbr class="published" title="' . human_time_diff($comment_date, current_time('timestamp')) . ' ' . __('ago', 'cmsmasters') . '">' . human_time_diff($comment_date, current_time('timestamp')) . ' ' . __('ago', 'cmsmasters') . '</abbr>';
				
				the_content_limit($comment_content, 100, '');
				
                echo '</li>';
			}
			
			echo '</ul>' . 
				$after_widget . 
			'</div>';
        }
	}
	
	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		
		$instance['title'] = strip_tags($new_instance['title']);
        $instance['number'] = absint($new_instance['number']);
        $instance['widget_width'] = $new_instance['widget_width'];
		
		return $instance;
	}
	
    function form($instance) {
        $title = isset($instance['title']) ? esc_attr($instance['title']) : '';
        $number = (isset($instance['number']) && $instance['number'] != 0) ? absint($instance['number']) : 3;
        $widget_width = (isset($instance['widget_width']) && $instance['widget_width'] != '') ? $instance['widget_width'] : 'one_first';
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title', 'cmsmasters'); ?>:<br />
                <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
            </label>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('number'); ?>"><?php _e("Enter the number of posts latest comments you'd like to display", 'cmsmasters'); ?>:<br /><br />
                <input id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" type="text" value="<?php echo $number; ?>" size="3" />
                <small style="color:#ff0000; float:right; padding-top:5px;"><?php _e('default is', 'cmsmasters'); ?> 3</small><br />
            </label>
        </p>
		<p style="border-top:1px solid #dfdfdf; border-bottom:1px solid #dfdfdf; padding:10px 0; overflow:hidden;">
			<label for="<?php echo $this->get_field_id('widget_width'); ?>">
				<?php _e('Choose the width of widget', 'cmsmasters'); ?>:<br /><br />
                <small style="color:#f00; float:right; padding-top:5px;"><?php _e('Only for horizontal sidebars', 'cmsmasters'); ?></small>
                <select id="<?php echo $this->get_field_id('widget_width'); ?>" name="<?php echo $this->get_field_name('widget_width'); ?>" style="float:left;">
                    <option <?php if ($widget_width == 'one_first') { echo 'selected="selected" '; } ?>value="one_first">-- 1/1 --&nbsp;</option>
                    <option <?php if ($widget_width == 'three_fourth') { echo 'selected="selected" '; } ?>value="three_fourth">-- 3/4 --&nbsp;</option>
                    <option <?php if ($widget_width == 'two_third') { echo 'selected="selected" '; } ?>value="two_third">-- 2/3 --&nbsp;</option>
                    <option <?php if ($widget_width == 'one_half') { echo 'selected="selected" '; } ?>value="one_half">-- 1/2 --&nbsp;</option>
                    <option <?php if ($widget_width == 'one_third') { echo 'selected="selected" '; } ?>value="one_third">-- 1/3 --&nbsp;</option>
                    <option <?php if ($widget_width == 'one_fourth') { echo 'selected="selected" '; } ?>value="one_fourth">-- 1/4 --&nbsp;</option>
                </select>
            </label>
		</p>
        <div style="clear:both;"></div>
        <?php
    }
}



/**
 * Popular Posts Widget Class
 */
class WP_Widget_Custom_Popular_Posts extends WP_Widget {
	function __construct() {
		$widget_ops = array('classname' => 'widget_custom_popular_entries', 'description' => __('Most popular posts on your blog', 'cmsmasters'));
		parent::__construct('custom-popular-posts', '&nbsp;' . __('CMSMS - Popular Posts', 'cmsmasters'), $widget_ops);
	}
	
	function widget($args, $instance) {
		extract($args);
		
		$title = apply_filters('widget_title', empty($instance['title']) ? __('Popular Posts', 'cmsmasters') : $instance['title'], $instance, $this->id_base);
		$number = isset($instance['number']) ? (int) $instance['number'] : '';
        $widget_width = isset($instance['widget_width']) ? $instance['widget_width'] : 'one_first';
		
        if (empty($instance['number']) || !$number = absint($instance['number'])) {
            $number = 3;
        } elseif ($number < 1) {
            $number = 1;
        } elseif ($number > 15) {
            $number = 15;
        }
		
		$p = new WP_Query(array( 
			'posts_per_page' => $number, 
			'post_status' => 'publish', 
			'ignore_sticky_posts' => 1, 
			'post_type' => 'post', 
			'order' => 'DESC', 
			'orderby' => 'meta_value', 
			'meta_key' => 'cmsms_likes' 
		));
		
        if ($p->have_posts()) { 
			echo '<div class="' . $widget_width . '">' . 
				$before_widget;
			
			if ($title) { 
				echo $before_title . $title . $after_title;
			}
			
            echo '<ul>';
			
            while ($p->have_posts()) : $p->the_post();
				$pt_format = get_post_format();
				
				$attachments =& get_children(array(
					'post_type' => 'attachment', 
					'post_mime_type' => 'image', 
					'post_parent' => get_the_ID(), 
					'orderby' => 'menu_order', 
					'order' => 'ASC' 
				));
				
				$post_link_text = get_post_meta(get_the_ID(), 'post_link_text', true);
				$post_link_link = get_post_meta(get_the_ID(), 'post_link_link', true);
				
				echo '<li>';
				
				if ($pt_format == 'image' || $pt_format == 'gallery') {
					echo '<div class="alignleft">';
					
					if (has_post_thumbnail()) {
						cmsms_thumb(get_the_ID(), array(50, 50), true, false, false, false, false, true, false);
					} elseif (!has_post_thumbnail() && sizeof($attachments) > 0) {
						if (isset($att_counter)) {
							unset($att_counter);
						}
						
						foreach ($attachments as $attachment) { 
							if (!isset($att_counter) && $att_counter = true) { 
								cmsms_thumb(get_the_ID(), array(50, 50), true, false, false, false, true, true, $attachment->ID);
							}
						}
					} else {
						echo '<figure>' . 
							'<a href="' . get_permalink() . '"' . ' title="' . cmsms_title(get_the_ID(), false) . '">' . 
								'<img src="' . get_template_directory_uri() . '/images/PF-' . (($pt_format == 'image') ? 'placeholder' : $pt_format) . '.jpg' . '" alt="' . cmsms_title(get_the_ID(), false) . '" title="' . cmsms_title(get_the_ID(), false) . '" style="width:50px; height:50px;" />' . 
							'</a>' . 
						'</figure>';
					}
					
					echo '</div>';
				} else {
					echo '<div class="alignleft">';
					
					if (has_post_thumbnail() && $pt_format != 'video') {
						cmsms_thumb(get_the_ID(), array(50, 50), true, false, false, false, false, true, false);
					} else {
						echo '<figure>' . 
							'<a href="' . get_permalink() . '"' . ' title="' . cmsms_title(get_the_ID(), false) . '">' . 
								'<img src="' . get_template_directory_uri() . '/images/PF-' . (($pt_format == '') ? 'placeholder' : $pt_format) . '.jpg' . '" alt="' . cmsms_title(get_the_ID(), false) . '" title="' . cmsms_title(get_the_ID(), false) . '" style="width:50px; height:50px;" />' . 
							'</a>' . 
						'</figure>';
					}
					
					echo '</div>';
				}
				
				echo '<div class="ovh">';
				
				if ($pt_format != 'aside' && $pt_format != 'link' && $pt_format != 'quote') {
					echo '<a href="' . get_permalink() . '" title="' . cmsms_title(get_the_ID(), false) . '">' . cmsms_title(get_the_ID(), false) . '</a>' . 
					'<abbr class="published" title="' . get_the_time('d-m-Y') . '">' . human_time_diff(get_the_time('U'), current_time('timestamp')) . ' ' . __('ago', 'cmsmasters') . '</abbr>';
				} elseif ($pt_format == 'link') {
					echo '<a href="' . $post_link_link . '" title="' . $post_link_text . '">' . $post_link_text . '</a>' . 
					'<abbr class="published" title="' . get_the_time('d-m-Y') . '">' . human_time_diff(get_the_time('U'), current_time('timestamp')) . ' ' . __('ago', 'cmsmasters') . '</abbr>';
				} elseif ($pt_format == 'aside') {
					echo '<div class="entry-content">';
					
					theme_excerpt(20);
					
					echo '</div>' . 
					'<abbr class="published" title="' . get_the_time('d-m-Y') . '">' . human_time_diff(get_the_time('U'), current_time('timestamp')) . ' ' . __('ago', 'cmsmasters') . '</abbr>';
				} elseif ($pt_format == 'quote') {
					echo '<div class="entry-content">';
					
					theme_excerpt(20);
					
					echo '</div>' . 
					'<abbr class="published" title="' . get_the_time('d-m-Y') . '">' . human_time_diff(get_the_time('U'), current_time('timestamp')) . ' ' . __('ago', 'cmsmasters') . '</abbr>';
				}
				
				if ($pt_format != 'link' && $pt_format != 'aside' && $pt_format != 'quote') {
					echo '<div class="entry-content">';
					
					theme_excerpt(20);
					
					echo '</div>';
				}
				
				echo '</div>' . 
					'<div class="cl"></div>' . 
				'</li>';
			endwhile;
			
			echo '</ul>' . 
				$after_widget . 
			'</div>';
        }
		
		wp_reset_postdata();
		wp_reset_query();
	}
	
	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		
		$instance['title'] = strip_tags($new_instance['title']);
        $instance['number'] = absint($new_instance['number']);
        $instance['widget_width'] = $new_instance['widget_width'];
		
		return $instance;
	}
	
    function form($instance) {
        $title = isset($instance['title']) ? esc_attr($instance['title']) : '';
        $number = (isset($instance['number']) && $instance['number'] != 0) ? absint($instance['number']) : 3;
        $widget_width = (isset($instance['widget_width']) && $instance['widget_width'] != '') ? $instance['widget_width'] : 'one_first';
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title', 'cmsmasters'); ?>:<br />
                <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
            </label>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('number'); ?>"><?php _e("Enter the number of popular posts you'd like to display", 'cmsmasters'); ?>:<br /><br />
                <input id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" type="text" value="<?php echo $number; ?>" size="3" />
                <small style="color:#ff0000; float:right; padding-top:5px;"><?php _e('default is', 'cmsmasters'); ?> 3</small><br />
            </label>
        </p>
		<p style="border-top:1px solid #dfdfdf; border-bottom:1px solid #dfdfdf; padding:10px 0; overflow:hidden;">
			<label for="<?php echo $this->get_field_id('widget_width'); ?>">
				<?php _e('Choose the width of widget', 'cmsmasters'); ?>:<br /><br />
                <small style="color:#f00; float:right; padding-top:5px;"><?php _e('Only for horizontal sidebars', 'cmsmasters'); ?></small>
                <select id="<?php echo $this->get_field_id('widget_width'); ?>" name="<?php echo $this->get_field_name('widget_width'); ?>" style="float:left;">
                    <option <?php if ($widget_width == 'one_first') { echo 'selected="selected" '; } ?>value="one_first">-- 1/1 --&nbsp;</option>
                    <option <?php if ($widget_width == 'three_fourth') { echo 'selected="selected" '; } ?>value="three_fourth">-- 3/4 --&nbsp;</option>
                    <option <?php if ($widget_width == 'two_third') { echo 'selected="selected" '; } ?>value="two_third">-- 2/3 --&nbsp;</option>
                    <option <?php if ($widget_width == 'one_half') { echo 'selected="selected" '; } ?>value="one_half">-- 1/2 --&nbsp;</option>
                    <option <?php if ($widget_width == 'one_third') { echo 'selected="selected" '; } ?>value="one_third">-- 1/3 --&nbsp;</option>
                    <option <?php if ($widget_width == 'one_fourth') { echo 'selected="selected" '; } ?>value="one_fourth">-- 1/4 --&nbsp;</option>
                </select>
            </label>
		</p>
        <div style="clear:both;"></div>
        <?php
    }
}



/**
 * Latest Posts Widget Class
 */
class WP_Widget_Custom_Latest_Posts extends WP_Widget {
	function __construct() {
		$widget_ops = array('classname' => 'widget_custom_recent_entries', 'description' => __('Latest posts on your blog', 'cmsmasters'));
		parent::__construct('custom-recent-posts', '&nbsp;' . __('CMSMS - Latest Posts', 'cmsmasters'), $widget_ops);
	}
	
	function widget($args, $instance) {
		extract($args);
		
		$title = apply_filters('widget_title', empty($instance['title']) ? __('Latest Posts', 'cmsmasters') : $instance['title'], $instance, $this->id_base);
		$number = isset($instance['number']) ? (int) $instance['number'] : '';
        $widget_width = isset($instance['widget_width']) ? $instance['widget_width'] : 'one_first';
		
        if (empty($instance['number']) || !$number = absint($instance['number'])) {
            $number = 3;
        } elseif ($number < 1) {
            $number = 1;
        } elseif ($number > 15) {
            $number = 15;
        }
		
		$l = new WP_Query(array( 
			'posts_per_page' => $number, 
			'post_status' => 'publish', 
			'ignore_sticky_posts' => 1, 
			'post_type' => 'post' 
		));
		
        if ($l->have_posts()) { 
			echo '<div class="' . $widget_width . '">' . 
				$before_widget;
			
			if ($title) { 
				echo $before_title . $title . $after_title;
			}
			
            echo '<ul>';
			
            while ($l->have_posts()) : $l->the_post();
				$pt_format = get_post_format();
				
				$attachments =& get_children(array(
					'post_type' => 'attachment', 
					'post_mime_type' => 'image', 
					'post_parent' => get_the_ID(), 
					'orderby' => 'menu_order', 
					'order' => 'ASC' 
				));
				
				$post_link_text = get_post_meta(get_the_ID(), 'post_link_text', true);
				$post_link_link = get_post_meta(get_the_ID(), 'post_link_link', true);
				
				echo '<li>';
				
				if ($pt_format == 'image' || $pt_format == 'gallery') {
					echo '<div class="alignleft">';
					
					if (has_post_thumbnail()) {
						cmsms_thumb(get_the_ID(), array(50, 50), true, false, false, false, false, true, false);
					} elseif (!has_post_thumbnail() && sizeof($attachments) > 0) {
						if (isset($att_counter)) {
							unset($att_counter);
						}
						
						foreach ($attachments as $attachment) { 
							if (!isset($att_counter) && $att_counter = true) { 
								cmsms_thumb(get_the_ID(), array(50, 50), true, false, false, false, true, true, $attachment->ID);
							}
						}
					} else {
						echo '<figure>' . 
							'<a href="' . get_permalink() . '"' . ' title="' . cmsms_title(get_the_ID(), false) . '">' . 
								'<img src="' . get_template_directory_uri() . '/images/PF-' . (($pt_format == 'image') ? 'placeholder' : $pt_format) . '.jpg' . '" alt="' . cmsms_title(get_the_ID(), false) . '" title="' . cmsms_title(get_the_ID(), false) . '" style="width:50px; height:50px;" />' . 
							'</a>' . 
						'</figure>';
					}
					
					echo '</div>';
				} else {
					echo '<div class="alignleft">';
					
					if (has_post_thumbnail() && $pt_format != 'video') {
						cmsms_thumb(get_the_ID(), array(50, 50), true, false, false, false, false, true, false);
					} else {
						echo '<figure>' . 
							'<a href="' . get_permalink() . '"' . ' title="' . cmsms_title(get_the_ID(), false) . '">' . 
								'<img src="' . get_template_directory_uri() . '/images/PF-' . (($pt_format == '') ? 'placeholder' : $pt_format) . '.jpg' . '" alt="' . cmsms_title(get_the_ID(), false) . '" title="' . cmsms_title(get_the_ID(), false) . '" style="width:50px; height:50px;" />' . 
							'</a>' . 
						'</figure>';
					}
					
					echo '</div>';
				}
				
				echo '<div class="ovh">';
				
				if ($pt_format != 'aside' && $pt_format != 'link' && $pt_format != 'quote') {
					echo '<a href="' . get_permalink() . '" title="' . cmsms_title(get_the_ID(), false) . '">' . cmsms_title(get_the_ID(), false) . '</a>' . 
					'<abbr class="published" title="' . get_the_time('d-m-Y') . '">' . human_time_diff(get_the_time('U'), current_time('timestamp')) . ' ' . __('ago', 'cmsmasters') . '</abbr>';
				} elseif ($pt_format == 'link') {
					echo '<a href="' . $post_link_link . '" title="' . $post_link_text . '">' . $post_link_text . '</a>' . 
					'<abbr class="published" title="' . get_the_time('d-m-Y') . '">' . human_time_diff(get_the_time('U'), current_time('timestamp')) . ' ' . __('ago', 'cmsmasters') . '</abbr>';
				} elseif ($pt_format == 'aside') {
					echo '<div class="entry-content">';
					
					theme_excerpt(20);
					
					echo '</div>' . 
					'<abbr class="published" title="' . get_the_time('d-m-Y') . '">' . human_time_diff(get_the_time('U'), current_time('timestamp')) . ' ' . __('ago', 'cmsmasters') . '</abbr>';
				} elseif ($pt_format == 'quote') {
					echo '<div class="entry-content">';
					
					theme_excerpt(20);
					
					echo '</div>' . 
					'<abbr class="published" title="' . get_the_time('d-m-Y') . '">' . human_time_diff(get_the_time('U'), current_time('timestamp')) . ' ' . __('ago', 'cmsmasters') . '</abbr>';
				}
				
				if ($pt_format != 'link' && $pt_format != 'aside' && $pt_format != 'quote') {
					echo '<div class="entry-content">';
					
					theme_excerpt(20);
					
					echo '</div>';
				}
				
				echo '</div>' . 
					'<div class="cl"></div>' . 
				'</li>';
			endwhile;
			
			echo '</ul>' . 
				$after_widget . 
			'</div>';
        }
		
		wp_reset_postdata();
		wp_reset_query();
	}
	
	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		
		$instance['title'] = strip_tags($new_instance['title']);
        $instance['number'] = absint($new_instance['number']);
        $instance['widget_width'] = $new_instance['widget_width'];
		
		return $instance;
	}
	
    function form($instance) {
        $title = isset($instance['title']) ? esc_attr($instance['title']) : '';
        $number = (isset($instance['number']) && $instance['number'] != 0) ? absint($instance['number']) : 3;
        $widget_width = (isset($instance['widget_width']) && $instance['widget_width'] != '') ? $instance['widget_width'] : 'one_first';
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title', 'cmsmasters'); ?>:<br />
                <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
            </label>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('number'); ?>"><?php _e("Enter the number of latest posts you'd like to display", 'cmsmasters'); ?>:<br /><br />
                <input id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" type="text" value="<?php echo $number; ?>" size="3" />
                <small style="color:#ff0000; float:right; padding-top:5px;"><?php _e('default is', 'cmsmasters'); ?> 3</small><br />
            </label>
        </p>
		<p style="border-top:1px solid #dfdfdf; border-bottom:1px solid #dfdfdf; padding:10px 0; overflow:hidden;">
			<label for="<?php echo $this->get_field_id('widget_width'); ?>">
				<?php _e('Choose the width of widget', 'cmsmasters'); ?>:<br /><br />
                <small style="color:#f00; float:right; padding-top:5px;"><?php _e('Only for horizontal sidebars', 'cmsmasters'); ?></small>
                <select id="<?php echo $this->get_field_id('widget_width'); ?>" name="<?php echo $this->get_field_name('widget_width'); ?>" style="float:left;">
                    <option <?php if ($widget_width == 'one_first') { echo 'selected="selected" '; } ?>value="one_first">-- 1/1 --&nbsp;</option>
                    <option <?php if ($widget_width == 'three_fourth') { echo 'selected="selected" '; } ?>value="three_fourth">-- 3/4 --&nbsp;</option>
                    <option <?php if ($widget_width == 'two_third') { echo 'selected="selected" '; } ?>value="two_third">-- 2/3 --&nbsp;</option>
                    <option <?php if ($widget_width == 'one_half') { echo 'selected="selected" '; } ?>value="one_half">-- 1/2 --&nbsp;</option>
                    <option <?php if ($widget_width == 'one_third') { echo 'selected="selected" '; } ?>value="one_third">-- 1/3 --&nbsp;</option>
                    <option <?php if ($widget_width == 'one_fourth') { echo 'selected="selected" '; } ?>value="one_fourth">-- 1/4 --&nbsp;</option>
                </select>
            </label>
		</p>
        <div style="clear:both;"></div>
        <?php
    }
}



/**
 * Popular Projects Widget Class
 */
class WP_Widget_Custom_Popular_Portfolio extends WP_Widget {
	function __construct() {
		$widget_ops = array('classname' => 'widget_custom_popular_portfolio_entries', 'description' => __('Popular projects on your portfolio', 'cmsmasters'));
		parent::__construct('custom-popular-portfolio', '&nbsp;' . __('CMSMS - Popular Projects', 'cmsmasters'), $widget_ops);
	}
	
    function widget($args, $instance) {
		extract($args);
		
		$title = apply_filters('widget_title', empty($instance['title']) ? __('Popular Projects', 'cmsmasters') : $instance['title'], $instance, $this->id_base);
		$number = isset($instance['number']) ? (int) $instance['number'] : '';
        $widget_width = isset($instance['widget_width']) ? $instance['widget_width'] : 'one_first';
		
        if (empty($instance['number']) || !$number = absint($instance['number'])) {
            $number = 3;
        } elseif ($number < 1) {
            $number = 1;
        } elseif ($number > 15) {
            $number = 15;
        }
		
        $pp = new WP_Query(array( 
			'posts_per_page' => $number, 
			'post_status' => 'publish', 
			'ignore_sticky_posts' => 1, 
			'post_type' => 'portfolio', 
			'order' => 'DESC', 
			'orderby' => 'meta_value', 
			'meta_key' => 'cmsms_likes' 
		));
		
        if ($pp->have_posts()) { 
			echo '<div class="' . $widget_width . '">' . 
				$before_widget . 
				'<script type="text/javascript">' . 
					'jQuery(document).ready(function () { ' . 
						"jQuery('#" . $args['widget_id'] . " .widget_custom_portfolio_entries_slides').cmsmsResponsiveContentSlider( { " . 
							"sliderWidth : '100%', " . 
							"sliderHeight : 'auto', " . 
							'animationSpeed : 500, ' . 
							"animationEffect : 'slide', " . 
							"animationEasing : 'easeInOutExpo', " . 
							'pauseTime : 5000, ' . 
							'activeSlide : 1, ' . 
							'touchControls : true, ' . 
							'pauseOnHover : false, ' . 
							'arrowNavigation : true, ' . 
							'slidesNavigation : true ' . 
						'} ); ' . 
					'} ); ' . 
				'</script>' . 
				'<div class="widget_custom_portfolio_entries_container">';
			
			if ($title) { 
				echo $before_title . $title . $after_title;
			}
			
			echo '<ul class="widget_custom_portfolio_entries_slides responsiveContentSlider">';
			
            while ($pp->have_posts()) : $pp->the_post();
				$pj_format = get_post_meta(get_the_ID(), 'pt_format', true);
				
				$attachments =& get_children(array(
					'post_type' => 'attachment', 
					'post_mime_type' => 'image', 
					'post_parent' => get_the_ID(), 
					'orderby' => 'menu_order', 
					'order' => 'ASC' 
				));
				
				echo '<li>';
				
				if ($pj_format == 'video') {
					echo '<figure>' . 
						'<img src="' . get_template_directory_uri() . '/images/PF-XL-video.jpg' . '" alt="' . cmsms_title(get_the_ID(), false) . '" title="' . cmsms_title(get_the_ID(), false) . '" class="fullwidth" />' . 
					'</figure>';
				} else {
					if (has_post_thumbnail()) {
						echo '<figure>' . 
							get_the_post_thumbnail(get_the_ID(), 'full-thumb', array( 
								'class' => 'fullwidth', 
								'alt' => cmsms_title(get_the_ID(), false), 
								'title' => cmsms_title(get_the_ID(), false), 
								'style' => 'width:100%; height:auto;' 
							)) . 
						'</figure>';
					} elseif (sizeof($attachments) > 0) {
						if (isset($att_counter)) {
							unset($att_counter);
						}
						
						foreach ($attachments as $attachment) {
							if (!isset($att_counter) && $att_counter = true) {
								echo '<figure>' . 
									wp_get_attachment_image($attachment->ID, 'full-thumb', false, array( 
										'class' => 'fullwidth', 
										'alt' => cmsms_title(get_the_ID(), false), 
										'title' => cmsms_title(get_the_ID(), false), 
										'style' => 'width:100%; height:auto;' 
									)) . 
								'</figure>';
							}
						}
					} else {
						echo '<figure>' . 
							'<img src="' . get_template_directory_uri() . '/images/PF-XL-gallery.jpg' . '" alt="' . cmsms_title(get_the_ID(), false) . '" title="' . cmsms_title(get_the_ID(), false) . '" class="fullwidth" />' . 
						'</figure>';
					}
				}
				
				echo '<a href="' . get_permalink() . '" title="' . cmsms_title(get_the_ID(), false) . '">' . cmsms_title(get_the_ID(), false) . '</a>';
				
				echo '</li>';
			endwhile;
			
			echo '</ul>' . 
				'</div>' . 
				$after_widget . 
			'</div>';
        }
		
		wp_reset_postdata();
		wp_reset_query();
    }
	
	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		
		$instance['title'] = strip_tags($new_instance['title']);
        $instance['number'] = absint($new_instance['number']);
        $instance['widget_width'] = $new_instance['widget_width'];
		
		return $instance;
	}
	
    function form($instance) {
        $title = isset($instance['title']) ? esc_attr($instance['title']) : '';
        $number = (isset($instance['number']) && $instance['number'] != 0) ? absint($instance['number']) : 3;
        $widget_width = (isset($instance['widget_width']) && $instance['widget_width'] != '') ? $instance['widget_width'] : 'one_first';
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title', 'cmsmasters'); ?>:<br />
                <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
            </label>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('number'); ?>"><?php _e("Enter the number of popular projects you'd like to display", 'cmsmasters'); ?>:<br /><br />
                <input id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" type="text" value="<?php echo $number; ?>" size="3" />
                <small style="color:#ff0000; float:right; padding-top:5px;"><?php _e('default is', 'cmsmasters'); ?> 3</small><br />
            </label>
        </p>
		<p style="border-top:1px solid #dfdfdf; border-bottom:1px solid #dfdfdf; padding:10px 0; overflow:hidden;">
			<label for="<?php echo $this->get_field_id('widget_width'); ?>">
				<?php _e('Choose the width of widget', 'cmsmasters'); ?>:<br /><br />
                <small style="color:#f00; float:right; padding-top:5px;"><?php _e('Only for horizontal sidebars', 'cmsmasters'); ?></small>
                <select id="<?php echo $this->get_field_id('widget_width'); ?>" name="<?php echo $this->get_field_name('widget_width'); ?>" style="float:left;">
                    <option <?php if ($widget_width == 'one_first') { echo 'selected="selected" '; } ?>value="one_first">-- 1/1 --&nbsp;</option>
                    <option <?php if ($widget_width == 'three_fourth') { echo 'selected="selected" '; } ?>value="three_fourth">-- 3/4 --&nbsp;</option>
                    <option <?php if ($widget_width == 'two_third') { echo 'selected="selected" '; } ?>value="two_third">-- 2/3 --&nbsp;</option>
                    <option <?php if ($widget_width == 'one_half') { echo 'selected="selected" '; } ?>value="one_half">-- 1/2 --&nbsp;</option>
                    <option <?php if ($widget_width == 'one_third') { echo 'selected="selected" '; } ?>value="one_third">-- 1/3 --&nbsp;</option>
                    <option <?php if ($widget_width == 'one_fourth') { echo 'selected="selected" '; } ?>value="one_fourth">-- 1/4 --&nbsp;</option>
                </select>
            </label>
		</p>
        <div style="clear:both;"></div>
        <?php
    }
}



/**
 * Latest Projects Widget Class
 */
class WP_Widget_Custom_Recent_Portfolio extends WP_Widget {
	function __construct() {
		$widget_ops = array('classname' => 'widget_custom_recent_portfolio_entries', 'description' => __('Latest projects on your portfolio', 'cmsmasters'));
		parent::__construct('custom-recent-portfolio', '&nbsp;' . __('CMSMS - Latest Projects', 'cmsmasters'), $widget_ops);
	}
	
    function widget($args, $instance) {
		extract($args);
		
		$title = apply_filters('widget_title', empty($instance['title']) ? __('Latest Projects', 'cmsmasters') : $instance['title'], $instance, $this->id_base);
		$number = isset($instance['number']) ? (int) $instance['number'] : '';
        $widget_width = isset($instance['widget_width']) ? $instance['widget_width'] : 'one_first';
		
        if (empty($instance['number']) || !$number = absint($instance['number'])) {
            $number = 3;
        } elseif ($number < 1) {
            $number = 1;
        } elseif ($number > 15) {
            $number = 15;
        }
		
        $lp = new WP_Query(array( 
			'posts_per_page' => $number, 
			'post_status' => 'publish', 
			'ignore_sticky_posts' => 1, 
			'post_type' => 'portfolio' 
		));
		
        if ($lp->have_posts()) { 
			echo '<div class="' . $widget_width . '">' . 
				$before_widget . 
				'<script type="text/javascript">' . 
					'jQuery(document).ready(function () { ' . 
						"jQuery('#" . $args['widget_id'] . " .widget_custom_portfolio_entries_slides').cmsmsResponsiveContentSlider( { " . 
							"sliderWidth : '100%', " . 
							"sliderHeight : 'auto', " . 
							'animationSpeed : 500, ' . 
							"animationEffect : 'slide', " . 
							"animationEasing : 'easeInOutExpo', " . 
							'pauseTime : 5000, ' . 
							'activeSlide : 1, ' . 
							'touchControls : true, ' . 
							'pauseOnHover : false, ' . 
							'arrowNavigation : true, ' . 
							'slidesNavigation : true ' . 
						'} ); ' . 
					'} ); ' . 
				'</script>' . 
				'<div class="widget_custom_portfolio_entries_container">';
			
			if ($title) { 
				echo $before_title . $title . $after_title;
			}
			
			echo '<ul class="widget_custom_portfolio_entries_slides responsiveContentSlider">';
			
            while ($lp->have_posts()) : $lp->the_post();
				$pj_format = get_post_meta(get_the_ID(), 'pt_format', true);
				
				$attachments =& get_children(array(
					'post_type' => 'attachment', 
					'post_mime_type' => 'image', 
					'post_parent' => get_the_ID(), 
					'orderby' => 'menu_order', 
					'order' => 'ASC' 
				));
				
				echo '<li>';
				
				if ($pj_format == 'video') {
					echo '<figure>' . 
						'<img src="' . get_template_directory_uri() . '/images/PF-XL-video.jpg' . '" alt="' . cmsms_title(get_the_ID(), false) . '" title="' . cmsms_title(get_the_ID(), false) . '" class="fullwidth" />' . 
					'</figure>';
				} else {
					if (has_post_thumbnail()) {
						echo '<figure>' . 
							get_the_post_thumbnail(get_the_ID(), 'full-thumb', array( 
								'class' => 'fullwidth', 
								'alt' => cmsms_title(get_the_ID(), false), 
								'title' => cmsms_title(get_the_ID(), false), 
								'style' => 'width:100%; height:auto;' 
							)) . 
						'</figure>';
					} elseif (sizeof($attachments) > 0) {
						if (isset($att_counter)) {
							unset($att_counter);
						}
						
						foreach ($attachments as $attachment) {
							if (!isset($att_counter) && $att_counter = true) {
								echo '<figure>' . 
									wp_get_attachment_image($attachment->ID, 'full-thumb', false, array( 
										'class' => 'fullwidth', 
										'alt' => cmsms_title(get_the_ID(), false), 
										'title' => cmsms_title(get_the_ID(), false), 
										'style' => 'width:100%; height:auto;' 
									)) . 
								'</figure>';
							}
						}
					} else {
						echo '<figure>' . 
							'<img src="' . get_template_directory_uri() . '/images/PF-XL-gallery.jpg' . '" alt="' . cmsms_title(get_the_ID(), false) . '" title="' . cmsms_title(get_the_ID(), false) . '" class="fullwidth" />' . 
						'</figure>';
					}
				}
				
				echo '<a href="' . get_permalink() . '" title="' . cmsms_title(get_the_ID(), false) . '">' . cmsms_title(get_the_ID(), false) . '</a>';
				
				echo '</li>';
			endwhile;
			
			echo '</ul>' . 
				'</div>' . 
				$after_widget . 
			'</div>';
        }
		
		wp_reset_postdata();
		wp_reset_query();
    }
	
	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		
		$instance['title'] = strip_tags($new_instance['title']);
        $instance['number'] = absint($new_instance['number']);
        $instance['widget_width'] = $new_instance['widget_width'];
		
		return $instance;
	}
	
    function form($instance) {
        $title = isset($instance['title']) ? esc_attr($instance['title']) : '';
        $number = (isset($instance['number']) && $instance['number'] != 0) ? absint($instance['number']) : 3;
        $widget_width = (isset($instance['widget_width']) && $instance['widget_width'] != '') ? $instance['widget_width'] : 'one_first';
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title', 'cmsmasters'); ?>:<br />
                <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
            </label>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('number'); ?>"><?php _e("Enter the number of latest projects you'd like to display", 'cmsmasters'); ?>:<br /><br />
                <input id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" type="text" value="<?php echo $number; ?>" size="3" />
                <small style="color:#ff0000; float:right; padding-top:5px;"><?php _e('default is', 'cmsmasters'); ?> 3</small><br />
            </label>
        </p>
		<p style="border-top:1px solid #dfdfdf; border-bottom:1px solid #dfdfdf; padding:10px 0; overflow:hidden;">
			<label for="<?php echo $this->get_field_id('widget_width'); ?>">
				<?php _e('Choose the width of widget', 'cmsmasters'); ?>:<br /><br />
                <small style="color:#f00; float:right; padding-top:5px;"><?php _e('Only for horizontal sidebars', 'cmsmasters'); ?></small>
                <select id="<?php echo $this->get_field_id('widget_width'); ?>" name="<?php echo $this->get_field_name('widget_width'); ?>" style="float:left;">
                    <option <?php if ($widget_width == 'one_first') { echo 'selected="selected" '; } ?>value="one_first">-- 1/1 --&nbsp;</option>
                    <option <?php if ($widget_width == 'three_fourth') { echo 'selected="selected" '; } ?>value="three_fourth">-- 3/4 --&nbsp;</option>
                    <option <?php if ($widget_width == 'two_third') { echo 'selected="selected" '; } ?>value="two_third">-- 2/3 --&nbsp;</option>
                    <option <?php if ($widget_width == 'one_half') { echo 'selected="selected" '; } ?>value="one_half">-- 1/2 --&nbsp;</option>
                    <option <?php if ($widget_width == 'one_third') { echo 'selected="selected" '; } ?>value="one_third">-- 1/3 --&nbsp;</option>
                    <option <?php if ($widget_width == 'one_fourth') { echo 'selected="selected" '; } ?>value="one_fourth">-- 1/4 --&nbsp;</option>
                </select>
            </label>
		</p>
        <div style="clear:both;"></div>
        <?php
    }
}



/**
 * Contact Information Widget Class
 */
class WP_Widget_Custom_Contact_Info extends WP_Widget {
	function __construct() {
		$widget_ops = array('classname' => 'widget_custom_contact_info_entries', 'description' => __('Your contact information', 'cmsmasters'));
		$control_ops = array('width' => 600);
		parent::__construct('custom-contact-info', '&nbsp;' . __('CMSMS - Contact Information', 'cmsmasters'), $widget_ops, $control_ops);
	}
	
	function widget($args, $instance) {
		extract($args);
		
		$title = apply_filters('widget_title', empty($instance['title']) ? __('Contact Information') : $instance['title'], $instance, $this->id_base);
        $name = isset($instance['name']) ? $instance['name'] : '';
        $address = isset($instance['address']) ? $instance['address'] : '';
        $city = isset($instance['city']) ? $instance['city'] : '';
        $state = isset($instance['state']) ? $instance['state'] : '';
        $zip = isset($instance['zip']) ? $instance['zip'] : '';
        $phone = isset($instance['phone']) ? $instance['phone'] : '';
        $email = isset($instance['email']) ? $instance['email'] : '';
        $widget_width = isset($instance['widget_width']) ? $instance['widget_width'] : 'one_first';
		
		echo '<div class="' . $widget_width . '">' . 
			$before_widget;
		
		if ($title) { 
			echo $before_title . $title . $after_title;
		}
		
		if ($name != '') { 
			echo '<span class="contact_widget_name">' . $name . '</span>' . 
			'<br />';
		}
		
		if ($address != '') { 
			echo '<span class="contact_widget_address">' . $address . '</span>' . 
			'<br />';
		}
		
		if ($city != '') { 
			echo '<span class="contact_widget_city">' . $city . '</span>' . 
			'<br />';
		}
		
		if ($state != '') { 
			echo '<span class="contact_widget_state">' . $state . '</span>' . 
			'<br />';
		}
		
		if ($zip != '') { 
			echo '<span class="contact_widget_zip">' . $zip . '</span>' . 
			'<br />';
		}
		
		if ($phone != '') { 
            echo '<span class="contact_widget_phone">' . 
				'<span style="display:inline-block; width:80px;">' . __('Phone', 'cmsmasters') . ':&nbsp;</span>' . 
				$phone . 
			'</span>' . 
			'<br />';
		}
		
        if ($email != '') { 
            echo '<span class="contact_widget_email">' . 
				'<span style="display:inline-block; width:80px;">' . __('Email', 'cmsmasters') . ':&nbsp;</span>' . 
				'<a href="mailto:' . $email . '">' . $email . '</a>' . 
			'</span>' . 
			'<br />';
		}
		
        echo $after_widget . 
        '</div>';
    }
	
	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		
		$instance['title'] = strip_tags($new_instance['title']);
        $instance['name'] = strip_tags($new_instance['name']);
        $instance['address'] = strip_tags($new_instance['address']);
        $instance['city'] = strip_tags($new_instance['city']);
        $instance['state'] = strip_tags($new_instance['state']);
        $instance['zip'] = strip_tags($new_instance['zip']);
        $instance['phone'] = strip_tags($new_instance['phone']);
        $instance['email'] = strip_tags($new_instance['email']);
        $instance['widget_width'] = $new_instance['widget_width'];
		
		return $instance;
	}
	
    function form($instance) {
        $title = isset($instance['title']) ? esc_attr($instance['title']) : '';
        $name = isset($instance['name']) ? esc_attr($instance['name']) : '';
        $address = isset($instance['address']) ? esc_attr($instance['address']) : '';
        $city = isset($instance['city']) ? esc_attr($instance['city']) : '';
        $state = isset($instance['state']) ? esc_attr($instance['state']) : '';
        $zip = isset($instance['zip']) ? esc_attr($instance['zip']) : '';
        $phone = isset($instance['phone']) ? esc_attr($instance['phone']) : '';
        $email = isset($instance['email']) ? esc_attr($instance['email']) : '';
        $widget_width = (isset($instance['widget_width']) && $instance['widget_width'] != '') ? $instance['widget_width'] : 'one_first';
        ?>
        <p style="width:48%; float:left; padding-right:4%; clear:both;">
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title', 'cmsmasters'); ?>:<br />
                <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
            </label>
        </p>
        <p style="width:48%; float:right;">
            <label for="<?php echo $this->get_field_id('name'); ?>"><?php _e('Name', 'cmsmasters'); ?>:<br />
                <input class="widefat" id="<?php echo $this->get_field_id('name'); ?>" name="<?php echo $this->get_field_name('name'); ?>" type="text" value="<?php echo $name; ?>" />
            </label>
        </p>
        <p style="width:48%; float:left; padding-right:4%; clear:both;">
            <label for="<?php echo $this->get_field_id('address'); ?>"><?php _e('Address', 'cmsmasters'); ?>:<br />
                <input class="widefat" id="<?php echo $this->get_field_id('address'); ?>" name="<?php echo $this->get_field_name('address'); ?>" type="text" value="<?php echo $address; ?>" />
            </label>
        </p>
        <p style="width:48%; float:right;">
            <label for="<?php echo $this->get_field_id('city'); ?>"><?php _e('City', 'cmsmasters'); ?>:<br />
                <input class="widefat" id="<?php echo $this->get_field_id('city'); ?>" name="<?php echo $this->get_field_name('city'); ?>" type="text" value="<?php echo $city; ?>" />
            </label>
        </p>
        <p style="width:48%; float:left; padding-right:4%; clear:both;">
            <label for="<?php echo $this->get_field_id('state'); ?>"><?php _e('State', 'cmsmasters'); ?>:<br />
                <input class="widefat" id="<?php echo $this->get_field_id('state'); ?>" name="<?php echo $this->get_field_name('state'); ?>" type="text" value="<?php echo $state; ?>" />
            </label>
        </p>
        <p style="width:48%; float:right;">
            <label for="<?php echo $this->get_field_id('zip'); ?>"><?php _e('Zip', 'cmsmasters'); ?>:<br />
                <input class="widefat" id="<?php echo $this->get_field_id('zip'); ?>" name="<?php echo $this->get_field_name('zip'); ?>" type="text" value="<?php echo $zip; ?>" />
            </label>
        </p>
        <p style="width:48%; float:left; padding-right:4%; clear:both;">
            <label for="<?php echo $this->get_field_id('phone'); ?>"><?php _e('Phone', 'cmsmasters'); ?>:<br />
                <input class="widefat" id="<?php echo $this->get_field_id('phone'); ?>" name="<?php echo $this->get_field_name('phone'); ?>" type="text" value="<?php echo $phone; ?>" />
            </label>
        </p>
        <p style="width:48%; float:right;">
            <label for="<?php echo $this->get_field_id('email'); ?>"><?php _e('Email', 'cmsmasters'); ?>:<br />
                <input class="widefat" id="<?php echo $this->get_field_id('email'); ?>" name="<?php echo $this->get_field_name('email'); ?>" type="text" value="<?php echo $email; ?>" />
            </label>
        </p>
		<p style="border-top:1px solid #dfdfdf; border-bottom:1px solid #dfdfdf; padding:10px 0; overflow:hidden; clear:both;">
			<label for="<?php echo $this->get_field_id('widget_width'); ?>">
				<?php _e('Choose the width of widget', 'cmsmasters'); ?>:<br /><br />
                <small style="color:#f00; float:right; padding-top:5px;"><?php _e('Only for horizontal sidebars', 'cmsmasters'); ?></small>
                <select id="<?php echo $this->get_field_id('widget_width'); ?>" name="<?php echo $this->get_field_name('widget_width'); ?>" style="float:left;">
                    <option <?php if ($widget_width == 'one_first') { echo 'selected="selected" '; } ?>value="one_first">-- 1/1 --&nbsp;</option>
                    <option <?php if ($widget_width == 'three_fourth') { echo 'selected="selected" '; } ?>value="three_fourth">-- 3/4 --&nbsp;</option>
                    <option <?php if ($widget_width == 'two_third') { echo 'selected="selected" '; } ?>value="two_third">-- 2/3 --&nbsp;</option>
                    <option <?php if ($widget_width == 'one_half') { echo 'selected="selected" '; } ?>value="one_half">-- 1/2 --&nbsp;</option>
                    <option <?php if ($widget_width == 'one_third') { echo 'selected="selected" '; } ?>value="one_third">-- 1/3 --&nbsp;</option>
                    <option <?php if ($widget_width == 'one_fourth') { echo 'selected="selected" '; } ?>value="one_fourth">-- 1/4 --&nbsp;</option>
                </select>
            </label>
		</p>
        <div style="clear:both;"></div>
        <?php
    }
}



/**
 * Contact Form Widget Class
 */
class WP_Widget_Custom_Contact_Form extends WP_Widget {
	function __construct() {
		$widget_ops = array('classname' => 'widget_custom_contact_form_entries', 'description' => __('Your website contact form widget', 'cmsmasters'));
		parent::__construct('custom-contact-form', '&nbsp;' . __('CMSMS - Contact Form', 'cmsmasters'), $widget_ops);
	}
    
    function widget($args, $instance) {
        extract($args);
		
		$title = apply_filters('widget_title', empty($instance['title']) ? __('Contact Form') : $instance['title'], $instance, $this->id_base);
        $email = isset($instance['email']) ? $instance['email'] : '';
        $formname = isset($instance['formname']) ? $instance['formname'] : '';
        $widget_width = isset($instance['widget_width']) ? $instance['widget_width'] : 'one_first';
		
		$encodedEmail = base64_encode($formname . '|' . $email . '|' . $formname);
		
		global $wpdb, $shortname;
		
		wp_enqueue_script('validator');
		wp_enqueue_script('validatorLanguage');
		
		echo '<div class="' . $widget_width . '">' . 
			$before_widget;
		
		if ($title) { 
			echo $before_title . $title . $after_title;
		}
        
        if ($wpdb->get_var("SELECT id FROM " . $wpdb->prefix . $shortname . "_forms WHERE type = 'form' AND parent_slug = '" . $formname . "'") != '') {
            $results = $wpdb->get_results("SELECT * FROM " . $wpdb->prefix . $shortname . "_forms WHERE parent_slug='" . $formname . "' ORDER BY number ASC");
            
            foreach ($results as $form_result) {
                $form_descr = unserialize($form_result->description);
                
                if ($form_result->type == 'form') {
                    $out = '<div class="cmsms-form-builder">' .
                        '<div class="widgetinfo">' . $form_descr[1] . '</div>' .
                        '<script type="text/javascript">' .
                            'jQuery(document).ready(function () { ' .
                                "jQuery('#form_" . $formname . "').validationEngine('init');" .
                                "jQuery('#form_" . $formname . " a#" . $formname . "_wformsend').click(function () { " .
                                    "jQuery('#form_" . $formname . " .loading').animate( { opacity : 1 } , 250);";
                }
            }
            
            foreach ($results as $form_result) {
                if ($form_result->type == 'checkbox') {
                    $out .= "var var_" . $form_result->slug . " = '';" . 
                    "jQuery('input[name=\'" . $form_result->slug . "\']:checked').each(function () { " . 
                        "var_" . $form_result->slug . " += jQuery(this).val();" . 
                    "} );";
                }
            }
            
            foreach ($results as $form_result) {
                if ($form_result->type == 'checkboxes') {
                    $out .= "var var_" . $form_result->slug . " = '';" . 
                    "jQuery('input[name=\'" . $form_result->slug . "\']:checked').each(function () { " . 
                        "var_" . $form_result->slug . " += jQuery(this).val() + ', ';" . 
                    "} );" . 
                    "if (var_" . $form_result->slug . " != '') { " . 
                        "var_" . $form_result->slug . " = var_" . $form_result->slug . ".slice(0, -2);" . 
                    "}";
                }
            }
            
            foreach ($results as $form_result) {
                if ($form_result->type == 'form') {
                    $out .= "if (jQuery('#form_" . $formname . "').validationEngine('validate')) { " .
                        "jQuery.post('" . get_template_directory_uri() . "/theme/functions/form-builder-sendmail.php', { ";
                }
            }
            
            foreach ($results as $form_result) {
                if ($form_result->type != 'form') {
                    if ($form_result->type == 'checkboxes' || $form_result->type == 'checkbox') {
                        $out .= $form_result->slug . " : var_" . $form_result->slug . ", ";
                    } else if ($form_result->type == 'radiobutton') {
                        $out .= $form_result->slug . " : jQuery('input[name=\'" . $form_result->slug . "\']:checked').val(), ";
                    } else {
                        $out .= $form_result->slug . " : jQuery('#" . $form_result->slug . "').val(), ";
                    }
                }
            }
            
            foreach ($results as $form_result) {
                if ($form_result->type == 'form') {
                    $out .= "contactemail : '" . $encodedEmail . "', " .
                                        "formname : '" . $formname . "'" .
                                    '} , function (data) { ' .
                                        "jQuery('#form_" . $formname . " .loading').animate( { opacity : 0 } , 250);" .
                                        "jQuery('#form_" . $formname . "').fadeOut('slow');" .
                                        "document.getElementById('form_" . $formname . "').reset();" .
                                        "jQuery('#form_" . $formname . "').parent().find('.widgetinfo').hide();" .
                                        "jQuery('#form_" . $formname . "').parent().find('.widgetinfo').fadeIn('fast');" .
                                        "jQuery('html, body').animate( { scrollTop : jQuery('#form_" . $formname . "').offset().top - 140 } , 'slow');" .
                                        "jQuery('#form_" . $formname . "').parent().find('.widgetinfo').delay(5000).fadeOut(1000, function () { " . 
                                            "jQuery('#form_" . $formname . "').fadeIn('slow');" . 
                                        "} );" .
                                    '} );' .
                                    'return false;' .
                                '} else { ' .
                                    "jQuery('#form_" . $formname . " .loading').animate( { opacity : 0 } , 250);" .
                                    'return false;' .
                                '}' .
                            '} );' .
                        '} );' .
                    '</script>' .
                    '<form action="#" method="post" id="form_' . $formname . '">';
                }
            }
            
            foreach ($results as $form_result) {
                if ($form_result->type != 'form') {
                    $field_label = $form_result->label;
                    $field_name = $form_result->slug;
                    $vals = unserialize($form_result->value);
                    $params = unserialize($form_result->parameters);
                    
                    $required_label = (in_array('required', $params)) ? ' <span>*</span>' : '';
                    $required = (in_array('required', $params)) ? 'required,' : '';
                    
                    $minSize = '';
                    $maxSize = '';
					
					foreach ($params as $param) {
						if (str_replace('minSize', '', $param) != $param) {
							$minSize = $param . ',';
						}
						
						if (str_replace('maxSize', '', $param) != $param) {
							$maxSize = $param . ',';
						}
					}
                    
                    $customEmail = (in_array('custom[email]', $params)) ? 'custom[email],' : '';
                    $customUrl = (in_array('custom[url]', $params)) ? 'custom[url],' : '';
                    $customNumber = (in_array('custom[number]', $params)) ? 'custom[number],' : '';
                    $customOnlyNumberSp = (in_array('custom[onlyNumberSp]', $params)) ? 'custom[onlyNumberSp],' : '';
                    $customOnlyLetterSp = (in_array('custom[onlyLetterSp]', $params)) ? 'custom[onlyLetterSp],' : '';
                    $validate_val = $required . $minSize . $maxSize . $customEmail . $customUrl . $customNumber . $customOnlyNumberSp . $customOnlyLetterSp;
                    $validate = ($validate_val != '') ? ' class="validate[' . substr($validate_val, 0, -1) . ']"' : '';
					$descr = (unserialize($form_result->description) != '' && unserialize($form_result->description) != ' ') ? '<span class="db">' . stripslashes(unserialize($form_result->description)) . '</span>' : '';
                    
                    switch ($form_result->type) {
                    case 'text':
                        $out .= '<div class="form_info cmsms_input">' .
                            '<label for="' . $field_name . '">' . $field_label . $required_label . '</label>' .
                            '<input type="text" name="' . $field_name . '" id="' . $field_name . '" value=""' . $validate . ' />' .
                            $descr .
                        '</div>' .
                        '<div class="cl"></div>';
                        break;
                    case 'email':
                        $out .= '<div class="form_info cmsms_input">' .
                            '<label for="' . $field_name . '">' . $field_label . $required_label . '</label>' .
                            '<input type="text" name="' . $field_name . '" id="' . $field_name . '" value=""' . $validate . ' />' .
                            $descr .
                        '</div>' .
                        '<div class="cl"></div>';
                        break;
                    case 'textarea':
                        $out .= '<div class="form_info cmsms_textarea">' .
                            '<label for="' . $field_name . '">' . $field_label . $required_label . '</label>' .
                            '<textarea name="' . $field_name . '" id="' . $field_name . '" cols="58" rows="6"' . $validate . '></textarea>' .
                            $descr .
                        '</div>' .
                        '<div class="cl"></div>';
                        break;
                    case 'dropdown':
                        $out .= '<div class="form_info cmsms_select">' .
                            '<label>' . $field_label . $required_label . '</label>' .
                            '<select name="' . $field_name . '" id="' . $field_name . '"' . $validate . '>';
                        
                        foreach ($vals as $val) {
                            $out .= '<option value="' . $val . '">' . $val . '</option>';
                        }

                        $out .= '</select>' .
                            '<div class="cl"></div>' .
                            $descr .
                        '</div>' .
                        '<div class="cl"></div>';
                        break;
                    case 'radiobutton':
                        $out .= '<div class="form_info cmsms_radio">' .
                            '<label>' . $field_label . $required_label . '</label>' .
                            $descr;
                        
                        $i = 1;
                        
                        foreach ($vals as $val) {
                            $checked = ($i == 1) ? ' checked="checked"' : '';
                            
                            $out .= '<div class="check_parent">' .
                                '<input type="radio" name="' . $field_name . '" id="' . $field_name . $i . '" value="' . $val . '"' . $validate . $checked . ' />' .
                                '<label for="' . $field_name . $i . '">' . $val . '</label>' .
                            '</div>' .
                            '<div class="cl"></div>';
                            
                            $i++;
                        }
                        
                        $out .= '</div>' .
                        '<div class="cl"></div>';
                        break;
                    case 'checkbox':
                        $out .= '<div class="form_info cmsms_checkboxes">' .
                            '<label>' . $field_label . $required_label . '</label>' .
                            $descr .
                            '<div class="check_parent">' .
                                '<input type="checkbox" name="' . $field_name . '" id="' . $field_name . '" value="' . $vals[0] . '"' . $validate . ' />' .
                                '<label for="' . $field_name . '">' . $vals[0] . '</label>' .
                            '</div>' .
                            '<div class="cl"></div>' .
                        '</div>' .
                        '<div class="cl"></div>';
                        break;
                    case 'checkboxes':
                        $out .= '<div class="form_info cmsms_checkboxes">' .
                            '<label>' . $field_label . '</label>' .
                            $descr;
                        
                        $i = 1;
                        
                        foreach ($vals as $val) {
                            $out .= '<div class="check_parent">' .
                                '<input type="checkbox" name="' . $field_name . '" id="' . $field_name . $i . '" value="' . $val . '" />' .
                                '<label for="' . $field_name . $i . '">' . $val . '</label>' .
                            '</div>' .
                            '<div class="cl"></div>';
                            
                            $i++;
                        }
                        
                        $out .= '</div>' .
                        '<div class="cl"></div>';
                        break;
                    }
                }
            }
            
            foreach ($results as $form_result) {
                if ($form_result->type == 'form') {
                    $out .= '<div class="loading"></div>' .
                    '<div class="fl"><a id="' . $formname . '_wformsend" class="button" href="#"><span>' . __('Submit', 'cmsmasters') . '</span></a></div>';
                    
                    if (in_array('reset', unserialize($form_result->parameters))) {
                        $out .= '<div class="fl" style="padding:0 0 0 10px;"><a id="' . $formname . '_wformclear" class="button" href="#" onclick="if (confirm(\'' . __('Do you really want to reset the form?', 'cmsmasters') . '\')) document.getElementById(\'form_' . $formname . '\').reset(); return false;"><span>' . __('Reset', 'cmsmasters') . '</span></a></div>';
                    }
                    
                    $out .= '<div class="cl"></div>' .
						'</form>' .
					'</div>';
                }
            }
            
            echo $out;
        }
        
        echo $after_widget . 
		'</div>';
    }
    
	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		
		$instance['title'] = strip_tags($new_instance['title']);
        $instance['email'] = strip_tags($new_instance['email']);
        $instance['formname'] = strip_tags($new_instance['formname']);
        $instance['widget_width'] = $new_instance['widget_width'];
		
		return $instance;
	}
	
    function form($instance) {
        global $wpdb, $shortname;
        
        $get_forms = $wpdb->get_results("SELECT * FROM " . $wpdb->prefix . $shortname . "_forms WHERE type='form'");
        
        $title = isset($instance['title']) ? esc_attr($instance['title']) : '';
        $email = isset($instance['email']) ? esc_attr($instance['email']) : '';
        $formname = (isset($instance['formname']) && $instance['formname'] != '') ? $instance['formname'] : '';
        $widget_width = (isset($instance['widget_width']) && $instance['widget_width'] != '') ? $instance['widget_width'] : 'one_first';
        ?>
		<p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title', 'cmsmasters'); ?>:<br />
                <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
            </label>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('email'); ?>"><?php _e('Email', 'cmsmasters'); ?>:<br />
                <input class="widefat" id="<?php echo $this->get_field_id('email'); ?>" name="<?php echo $this->get_field_name('email'); ?>" type="text" value="<?php echo $email; ?>" />
            </label>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('formname'); ?>"><?php _e('Form Name', 'cmsmasters'); ?>:<br />
                <select class="widefat" id="<?php echo $this->get_field_id('formname'); ?>" name="<?php echo $this->get_field_name('formname'); ?>">
                    <option value=""><?php _e('Choose Form Name Here', 'cmsmasters'); ?> &nbsp;</option>
                    <?php
                    foreach ($get_forms as $get_form) {
                        $val = $get_form->slug;
                        $name = $get_form->label;
						
                        if ($formname == $val) {
                            $selected = ' selected="selected"';
                        } else {
                            $selected = '';
                        }
						
                        echo '<option' . $selected . ' value="' . $val . '">' . $name . '</option>';
                    }
                    ?>
                </select>
            </label>
        </p>
		<p style="border-top:1px solid #dfdfdf; border-bottom:1px solid #dfdfdf; padding:10px 0; overflow:hidden;">
			<label for="<?php echo $this->get_field_id('widget_width'); ?>">
				<?php _e('Choose the width of widget', 'cmsmasters'); ?>:<br /><br />
                <small style="color:#f00; float:right; padding-top:5px;"><?php _e('Only for horizontal sidebars', 'cmsmasters'); ?></small>
                <select id="<?php echo $this->get_field_id('widget_width'); ?>" name="<?php echo $this->get_field_name('widget_width'); ?>" style="float:left;">
                    <option <?php if ($widget_width == 'one_first') { echo 'selected="selected" '; } ?>value="one_first">-- 1/1 --&nbsp;</option>
                    <option <?php if ($widget_width == 'three_fourth') { echo 'selected="selected" '; } ?>value="three_fourth">-- 3/4 --&nbsp;</option>
                    <option <?php if ($widget_width == 'two_third') { echo 'selected="selected" '; } ?>value="two_third">-- 2/3 --&nbsp;</option>
                    <option <?php if ($widget_width == 'one_half') { echo 'selected="selected" '; } ?>value="one_half">-- 1/2 --&nbsp;</option>
                    <option <?php if ($widget_width == 'one_third') { echo 'selected="selected" '; } ?>value="one_third">-- 1/3 --&nbsp;</option>
                    <option <?php if ($widget_width == 'one_fourth') { echo 'selected="selected" '; } ?>value="one_fourth">-- 1/4 --&nbsp;</option>
                </select>
            </label>
		</p>
        <div style="clear:both;"></div>
        <?php
    }
}



/**
 * Advertisement Widget Class
 */
class WP_Widget_Custom_Advertisement extends WP_Widget {
	function __construct() {
		$widget_ops = array('classname' => 'widget_custom_advertisement_entries', 'description' => __('Your advertisement', 'cmsmasters'));
		$control_ops = array('width' => 600);
		parent::__construct('custom-advertisement', '&nbsp;' . __('CMSMS - Advertisement', 'cmsmasters'), $widget_ops, $control_ops);
	}
	
	function widget($args, $instance) {
		extract($args);
		
		$title = apply_filters('widget_title', empty($instance['title']) ? __('Advertisement') : $instance['title'], $instance, $this->id_base);
        $image1 = isset($instance['image1']) ? $instance['image1'] : '';
        $link1 = isset($instance['link1']) ? $instance['link1'] : '';
        $image2 = isset($instance['image2']) ? $instance['image2'] : '';
        $link2 = isset($instance['link2']) ? $instance['link2'] : '';
        $image3 = isset($instance['image3']) ? $instance['image3'] : '';
        $link3 = isset($instance['link3']) ? $instance['link3'] : '';
        $image4 = isset($instance['image4']) ? $instance['image4'] : '';
        $link4 = isset($instance['link4']) ? $instance['link4'] : '';
        $image5 = isset($instance['image5']) ? $instance['image5'] : '';
        $link5 = isset($instance['link5']) ? $instance['link5'] : '';
        $image6 = isset($instance['image6']) ? $instance['image6'] : '';
        $link6 = isset($instance['link6']) ? $instance['link6'] : '';
        $widget_width = isset($instance['widget_width']) ? $instance['widget_width'] : 'one_first';
		
		echo '<div class="' . $widget_width . '">' . 
			$before_widget;
		
		if ($title) { 
			echo $before_title . $title . $after_title;
		}
		
		if ($image1 != '' && $link1 != '') {
			echo '<figure class="adv_widget_image">' . 
				'<a href="' . $link1 . '" target="_blank">' . 
					'<img src="' . $image1 . '" width="125" height="125" alt="" />' . 
				'</a>' . 
			'</figure>';
		}

		if ($image2 != '' && $link2 != '') {
			echo '<figure class="adv_widget_image">' . 
				'<a href="' . $link2 . '" target="_blank">' . 
					'<img src="' . $image2 . '" width="125" height="125" alt="" />' . 
				'</a>' . 
			'</figure>';
		}

		if ($image3 != '' && $link3 != '') {
			echo '<figure class="adv_widget_image">' . 
				'<a href="' . $link3 . '" target="_blank">' . 
					'<img src="' . $image3 . '" width="125" height="125" alt="" />' . 
				'</a>' . 
			'</figure>';
		}

		if ($image4 != '' && $link4 != '') {
			echo '<figure class="adv_widget_image">' . 
				'<a href="' . $link4 . '" target="_blank">' . 
					'<img src="' . $image4 . '" width="125" height="125" alt="" />' . 
				'</a>' . 
			'</figure>';
		}

		if ($image5 != '' && $link5 != '') {
			echo '<figure class="adv_widget_image">' . 
				'<a href="' . $link5 . '" target="_blank">' . 
					'<img src="' . $image5 . '" width="125" height="125" alt="" />' . 
				'</a>' . 
			'</figure>';
		}

		if ($image6 != '' && $link6 != '') {
			echo '<figure class="adv_widget_image">' . 
				'<a href="' . $link6 . '" target="_blank">' . 
					'<img src="' . $image6 . '" width="125" height="125" alt="" />' . 
				'</a>' . 
			'</figure>';
		}
		
        echo $after_widget . 
			'<div class="cl"></div>' . 
        '</div>';
    }
	
	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		
		$instance['title'] = strip_tags($new_instance['title']);
        $instance['image1'] = strip_tags($new_instance['image1']);
        $instance['link1'] = strip_tags($new_instance['link1']);
        $instance['image2'] = strip_tags($new_instance['image2']);
        $instance['link2'] = strip_tags($new_instance['link2']);
        $instance['image3'] = strip_tags($new_instance['image3']);
        $instance['link3'] = strip_tags($new_instance['link3']);
        $instance['image4'] = strip_tags($new_instance['image4']);
        $instance['link4'] = strip_tags($new_instance['link4']);
        $instance['image5'] = strip_tags($new_instance['image5']);
        $instance['link5'] = strip_tags($new_instance['link5']);
        $instance['image6'] = strip_tags($new_instance['image6']);
        $instance['link6'] = strip_tags($new_instance['link6']);
        $instance['widget_width'] = $new_instance['widget_width'];
		
		return $instance;
	}
	
    function form($instance) {
        $title = isset($instance['title']) ? esc_attr($instance['title']) : '';
		$image1 = isset($instance['image1']) ? esc_attr($instance['image1']) : '';
		$link1 = isset($instance['link1']) ? esc_attr($instance['link1']) : '';
		$image2 = isset($instance['image2']) ? esc_attr($instance['image2']) : '';
		$link2 = isset($instance['link2']) ? esc_attr($instance['link2']) : '';
		$image3 = isset($instance['image3']) ? esc_attr($instance['image3']) : '';
		$link3 = isset($instance['link3']) ? esc_attr($instance['link3']) : '';
		$image4 = isset($instance['image4']) ? esc_attr($instance['image4']) : '';
		$link4 = isset($instance['link4']) ? esc_attr($instance['link4']) : '';
		$image5 = isset($instance['image5']) ? esc_attr($instance['image5']) : '';
		$link5 = isset($instance['link5']) ? esc_attr($instance['link5']) : '';
		$image6 = isset($instance['image6']) ? esc_attr($instance['image6']) : '';
		$link6 = isset($instance['link6']) ? esc_attr($instance['link6']) : '';
        $widget_width = (isset($instance['widget_width']) && $instance['widget_width'] != '') ? $instance['widget_width'] : 'one_first';
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title', 'cmsmasters'); ?>:<br />
                <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
            </label>
        </p>
        <p style="width:48%; float:left; padding-right:4%; clear:both;">
            <label for="<?php echo $this->get_field_id('image1'); ?>"><?php _e('Image', 'cmsmasters'); ?> #1:<br />
                <input class="widefat" id="<?php echo $this->get_field_id('image1'); ?>" name="<?php echo $this->get_field_name('image1'); ?>" type="text" value="<?php echo $image1; ?>" />
            </label>
        </p>
        <p style="width:48%; float:right;">
            <label for="<?php echo $this->get_field_id('link1'); ?>"><?php _e('Link', 'cmsmasters'); ?> #1:<br />
                <input class="widefat" id="<?php echo $this->get_field_id('link1'); ?>" name="<?php echo $this->get_field_name('link1'); ?>" type="text" value="<?php echo $link1; ?>" />
            </label>
        </p>
        <p style="width:48%; float:left; padding-right:4%; clear:both;">
            <label for="<?php echo $this->get_field_id('image2'); ?>"><?php _e('Image', 'cmsmasters'); ?> #2:<br />
                <input class="widefat" id="<?php echo $this->get_field_id('image2'); ?>" name="<?php echo $this->get_field_name('image2'); ?>" type="text" value="<?php echo $image2; ?>" />
            </label>
        </p>
        <p style="width:48%; float:right;">
            <label for="<?php echo $this->get_field_id('link2'); ?>"><?php _e('Link', 'cmsmasters'); ?> #2:<br />
                <input class="widefat" id="<?php echo $this->get_field_id('link2'); ?>" name="<?php echo $this->get_field_name('link2'); ?>" type="text" value="<?php echo $link2; ?>" />
            </label>
        </p>
        <p style="width:48%; float:left; padding-right:4%; clear:both;">
            <label for="<?php echo $this->get_field_id('image3'); ?>"><?php _e('Image', 'cmsmasters'); ?> #3:<br />
                <input class="widefat" id="<?php echo $this->get_field_id('image3'); ?>" name="<?php echo $this->get_field_name('image3'); ?>" type="text" value="<?php echo $image3; ?>" />
            </label>
        </p>
        <p style="width:48%; float:right;">
            <label for="<?php echo $this->get_field_id('link3'); ?>"><?php _e('Link', 'cmsmasters'); ?> #3:<br />
                <input class="widefat" id="<?php echo $this->get_field_id('link3'); ?>" name="<?php echo $this->get_field_name('link3'); ?>" type="text" value="<?php echo $link3; ?>" />
            </label>
        </p>
        <p style="width:48%; float:left; padding-right:4%; clear:both;">
            <label for="<?php echo $this->get_field_id('image4'); ?>"><?php _e('Image', 'cmsmasters'); ?> #4:<br />
                <input class="widefat" id="<?php echo $this->get_field_id('image4'); ?>" name="<?php echo $this->get_field_name('image4'); ?>" type="text" value="<?php echo $image4; ?>" />
            </label>
        </p>
        <p style="width:48%; float:right;">
            <label for="<?php echo $this->get_field_id('link4'); ?>"><?php _e('Link', 'cmsmasters'); ?> #4:<br />
                <input class="widefat" id="<?php echo $this->get_field_id('link4'); ?>" name="<?php echo $this->get_field_name('link4'); ?>" type="text" value="<?php echo $link4; ?>" />
            </label>
        </p>
        <p style="width:48%; float:left; padding-right:4%; clear:both;">
            <label for="<?php echo $this->get_field_id('image5'); ?>"><?php _e('Image', 'cmsmasters'); ?> #5:<br />
                <input class="widefat" id="<?php echo $this->get_field_id('image5'); ?>" name="<?php echo $this->get_field_name('image5'); ?>" type="text" value="<?php echo $image5; ?>" />
            </label>
        </p>
        <p style="width:48%; float:right;">
            <label for="<?php echo $this->get_field_id('link5'); ?>"><?php _e('Link', 'cmsmasters'); ?> #5:<br />
                <input class="widefat" id="<?php echo $this->get_field_id('link5'); ?>" name="<?php echo $this->get_field_name('link5'); ?>" type="text" value="<?php echo $link5; ?>" />
            </label>
        </p>
        <p style="width:48%; float:left; padding-right:4%; clear:both;">
            <label for="<?php echo $this->get_field_id('image6'); ?>"><?php _e('Image', 'cmsmasters'); ?> #6:<br />
                <input class="widefat" id="<?php echo $this->get_field_id('image6'); ?>" name="<?php echo $this->get_field_name('image6'); ?>" type="text" value="<?php echo $image6; ?>" />
            </label>
        </p>
        <p style="width:48%; float:right;">
            <label for="<?php echo $this->get_field_id('link6'); ?>"><?php _e('Link', 'cmsmasters'); ?> #6:<br />
                <input class="widefat" id="<?php echo $this->get_field_id('link6'); ?>" name="<?php echo $this->get_field_name('link6'); ?>" type="text" value="<?php echo $link6; ?>" />
            </label>
        </p>
		<p style="border-top:1px solid #dfdfdf; border-bottom:1px solid #dfdfdf; padding:10px 0; overflow:hidden; clear:both;">
			<label for="<?php echo $this->get_field_id('widget_width'); ?>">
				<?php _e('Choose the width of widget', 'cmsmasters'); ?>:<br /><br />
                <small style="color:#f00; float:right; padding-top:5px;"><?php _e('Only for horizontal sidebars', 'cmsmasters'); ?></small>
                <select id="<?php echo $this->get_field_id('widget_width'); ?>" name="<?php echo $this->get_field_name('widget_width'); ?>" style="float:left;">
                    <option <?php if ($widget_width == 'one_first') { echo 'selected="selected" '; } ?>value="one_first">-- 1/1 --&nbsp;</option>
                    <option <?php if ($widget_width == 'three_fourth') { echo 'selected="selected" '; } ?>value="three_fourth">-- 3/4 --&nbsp;</option>
                    <option <?php if ($widget_width == 'two_third') { echo 'selected="selected" '; } ?>value="two_third">-- 2/3 --&nbsp;</option>
                    <option <?php if ($widget_width == 'one_half') { echo 'selected="selected" '; } ?>value="one_half">-- 1/2 --&nbsp;</option>
                    <option <?php if ($widget_width == 'one_third') { echo 'selected="selected" '; } ?>value="one_third">-- 1/3 --&nbsp;</option>
                    <option <?php if ($widget_width == 'one_fourth') { echo 'selected="selected" '; } ?>value="one_fourth">-- 1/4 --&nbsp;</option>
                </select>
            </label>
		</p>
        <div style="clear:both;"></div>
        <?php
    }
}



/**
 * Embeded Video Widget Class
 */
class WP_Widget_Custom_Video extends WP_Widget {
	function __construct() {
		$widget_ops = array('classname' => 'widget_custom_video_entries', 'description' => __('Video from youtube, vimeo or dailymotion', 'cmsmasters'));
		parent::__construct('custom-video', '&nbsp;' . __('CMSMS - Embeded Video', 'cmsmasters'), $widget_ops);
	}
	
	function widget($args, $instance) {
		extract($args);
		
		$title = apply_filters('widget_title', empty($instance['title']) ? __('Embeded Video') : $instance['title'], $instance, $this->id_base);
        $url = isset($instance['url']) ? $instance['url'] : '';
        $widget_width = isset($instance['widget_width']) ? $instance['widget_width'] : 'one_first';
		
		echo '<div class="' . $widget_width . '">' . 
			$before_widget;
		
		if ($title) { 
			echo $before_title . $title . $after_title;
		}
		
		if ($url != '') {
			echo '<div class="resizable_block">' . 
				get_video_iframe($url) . 
			'</div>';
		}
		
        echo $after_widget . 
        '</div>';
    }
	
	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		
		$instance['title'] = strip_tags($new_instance['title']);
        $instance['url'] = strip_tags($new_instance['url']);
        $instance['widget_width'] = $new_instance['widget_width'];
		
		return $instance;
	}
	
    function form($instance) {
        $title = isset($instance['title']) ? esc_attr($instance['title']) : '';
		$url = isset($instance['url']) ? esc_attr($instance['url']) : '';
        $widget_width = (isset($instance['widget_width']) && $instance['widget_width'] != '') ? $instance['widget_width'] : 'one_first';
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title', 'cmsmasters'); ?>:<br />
                <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
            </label>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('url'); ?>"><?php _e('Video URL', 'cmsmasters'); ?>:<br />
                <input class="widefat" id="<?php echo $this->get_field_id('url'); ?>" name="<?php echo $this->get_field_name('url'); ?>" type="text" value="<?php echo $url; ?>" />
            </label>
        </p>
		<p style="border-top:1px solid #dfdfdf; border-bottom:1px solid #dfdfdf; padding:10px 0; overflow:hidden;">
			<label for="<?php echo $this->get_field_id('widget_width'); ?>">
				<?php _e('Choose the width of widget', 'cmsmasters'); ?>:<br /><br />
                <small style="color:#f00; float:right; padding-top:5px;"><?php _e('Only for horizontal sidebars', 'cmsmasters'); ?></small>
                <select id="<?php echo $this->get_field_id('widget_width'); ?>" name="<?php echo $this->get_field_name('widget_width'); ?>" style="float:left;">
                    <option <?php if ($widget_width == 'one_first') { echo 'selected="selected" '; } ?>value="one_first">-- 1/1 --&nbsp;</option>
                    <option <?php if ($widget_width == 'three_fourth') { echo 'selected="selected" '; } ?>value="three_fourth">-- 3/4 --&nbsp;</option>
                    <option <?php if ($widget_width == 'two_third') { echo 'selected="selected" '; } ?>value="two_third">-- 2/3 --&nbsp;</option>
                    <option <?php if ($widget_width == 'one_half') { echo 'selected="selected" '; } ?>value="one_half">-- 1/2 --&nbsp;</option>
                    <option <?php if ($widget_width == 'one_third') { echo 'selected="selected" '; } ?>value="one_third">-- 1/3 --&nbsp;</option>
                    <option <?php if ($widget_width == 'one_fourth') { echo 'selected="selected" '; } ?>value="one_fourth">-- 1/4 --&nbsp;</option>
                </select>
            </label>
		</p>
        <div style="clear:both;"></div>
        <?php
    }
}



/**
 * HTML5 Video Widget Class
 */
class WP_Widget_Custom_HTML5_Video extends WP_Widget {
	function __construct() {
		$widget_ops = array('classname' => 'widget_custom_html5_video_entries', 'description' => __('Your HTML5 Video', 'cmsmasters'));
		$control_ops = array('width' => 600);
		parent::__construct('custom-html5-video', '&nbsp;' . __('CMSMS - HTML5 Video', 'cmsmasters'), $widget_ops, $control_ops);
	}
	
	function widget($args, $instance) {
		extract($args);
		
		$title = apply_filters('widget_title', empty($instance['title']) ? __('HTML5 Video') : $instance['title'], $instance, $this->id_base);
        $srcmp4 = isset($instance['srcmp4']) ? $instance['srcmp4'] : '';
        $srcogg = isset($instance['srcogg']) ? $instance['srcogg'] : '';
        $srcwebm = isset($instance['srcwebm']) ? $instance['srcwebm'] : '';
        $poster = isset($instance['poster']) ? $instance['poster'] : '';
        $text = (isset($instance['text']) && $instance['text'] != '') ? $instance['text'] : __('Your browser does not support the video tag.', 'cmsmasters');
        $controls = isset($instance['controls']) ? $instance['controls'] : 'controls';
        $autoplay = isset($instance['autoplay']) ? $instance['autoplay'] : '';
        $loop = isset($instance['loop']) ? $instance['loop'] : '';
        $preload = isset($instance['preload']) ? $instance['preload'] : 'none';
        $widget_width = isset($instance['widget_width']) ? $instance['widget_width'] : 'one_first';
		
		echo '<div class="' . $widget_width . '">' . 
			$before_widget;
		
		if ($title) { 
			echo $before_title . $title . $after_title;
		}
		
		$out = '<div class="resizable_block">' . 
			'<video class="fullwidth"';
		
		if ($poster != '') {
			$out .= ' poster="' . $poster . '"';
		}
		
		if ($controls != '') {
			$out .= ' controls="controls"';
		}
		
		if ($autoplay != '') {
			$out .= ' autoplay="autoplay"';
		}
		
		if ($loop != '') {
			$out .= ' loop="loop"';
		}
		
		if ($preload != '') {
			$out .= ' preload="' . $preload . '"';
		}
		
		$out .= '>';
		
		if ($srcmp4 != '') {
			$out .= '<source src="' . $srcmp4 . '" type="video/mp4" />';
		}
		
		if ($srcogg != '') {
			$out .= '<source src="' . $srcogg . '" type="video/ogg" />';
		}
		
		if ($srcwebm != '') {
			$out .= '<source src="' . $srcwebm . '" type="video/webm" />';
		}
		
		$out .= $text . 
			'</video>' . 
		'</div>';
		
		echo $out . 
			$after_widget . 
        '</div>';
    }
	
	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['srcmp4'] = strip_tags($new_instance['srcmp4']);
        $instance['srcogg'] = strip_tags($new_instance['srcogg']);
		$instance['srcwebm'] = strip_tags($new_instance['srcwebm']);
		$instance['poster'] = strip_tags($new_instance['poster']);
		$instance['text'] = strip_tags($new_instance['text']);
		$instance['controls'] = strip_tags($new_instance['controls']);
		$instance['autoplay'] = strip_tags($new_instance['autoplay']);
		$instance['loop'] = strip_tags($new_instance['loop']);
		$instance['preload'] = strip_tags($new_instance['preload']);
        $instance['widget_width'] = $new_instance['widget_width'];
		
		return $instance;
	}
	
    function form($instance) {
        $title = isset($instance['title']) ? esc_attr($instance['title']) : '';
		$srcmp4 = isset($instance['srcmp4']) ? esc_attr($instance['srcmp4']) : '';
		$srcogg = isset($instance['srcogg']) ? esc_attr($instance['srcogg']) : '';
		$srcwebm = isset($instance['srcwebm']) ? esc_attr($instance['srcwebm']) : '';
		$poster = isset($instance['poster']) ? esc_attr($instance['poster']) : '';
		$text = (isset($instance['text']) && $instance['text'] != '') ? esc_attr($instance['text']) : __('Your browser does not support the video tag.', 'cmsmasters');
		$controls = isset($instance['controls']) ? esc_attr($instance['controls']) : 'controls';
		$autoplay = isset($instance['autoplay']) ? esc_attr($instance['autoplay']) : '';
		$loop = isset($instance['loop']) ? esc_attr($instance['loop']) : '';
		$preload = isset($instance['preload']) ? esc_attr($instance['preload']) : 'none';
        $widget_width = (isset($instance['widget_width']) && $instance['widget_width'] != '') ? $instance['widget_width'] : 'one_first';
        ?>
        <p style="width:48%; float:left; padding-right:4%; clear:both;">
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title', 'cmsmasters'); ?>:<br />
                <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
            </label>
        </p>
        <p style="width:48%; float:right;">
            <label for="<?php echo $this->get_field_id('srcmp4'); ?>"><?php echo __('Video', 'cmsmasters') . ' .mp4 ' . __('File Format Source', 'cmsmasters'); ?>:<br />
                <input class="widefat" id="<?php echo $this->get_field_id('srcmp4'); ?>" name="<?php echo $this->get_field_name('srcmp4'); ?>" type="text" value="<?php echo $srcmp4; ?>" />
            </label>
        </p>
        <p style="width:48%; float:left; padding-right:4%; clear:both;">
            <label for="<?php echo $this->get_field_id('srcogg'); ?>"><?php echo __('Video', 'cmsmasters') . ' .ogg ' . __('File Format Source', 'cmsmasters'); ?>:<br />
                <input class="widefat" id="<?php echo $this->get_field_id('srcogg'); ?>" name="<?php echo $this->get_field_name('srcogg'); ?>" type="text" value="<?php echo $srcogg; ?>" />
            </label>
        </p>
        <p style="width:48%; float:right;">
            <label for="<?php echo $this->get_field_id('srcwebm'); ?>"><?php echo __('Video', 'cmsmasters') . ' .webm ' . __('File Format Source', 'cmsmasters'); ?>:<br />
                <input class="widefat" id="<?php echo $this->get_field_id('srcwebm'); ?>" name="<?php echo $this->get_field_name('srcwebm'); ?>" type="text" value="<?php echo $srcwebm; ?>" />
            </label>
        </p>
        <p style="width:48%; float:left; padding-right:4%; clear:both;">
            <label for="<?php echo $this->get_field_id('poster'); ?>"><?php _e('Poster URL', 'cmsmasters'); ?>:<br />
                <input class="widefat" id="<?php echo $this->get_field_id('poster'); ?>" name="<?php echo $this->get_field_name('poster'); ?>" type="text" value="<?php echo $poster; ?>" />
            </label>
        </p>
        <p style="width:48%; float:right;">
            <label for="<?php echo $this->get_field_id('text'); ?>"><?php _e('Video Tag Not Support Text', 'cmsmasters'); ?>:<br />
                <input class="widefat" id="<?php echo $this->get_field_id('text'); ?>" name="<?php echo $this->get_field_name('text'); ?>" type="text" value="<?php echo $text; ?>" />
            </label>
        </p>
        <p style="width:48%; float:left; padding-right:4%; clear:both;">
            <label for="<?php echo $this->get_field_id('controls'); ?>"><?php _e('Controls', 'cmsmasters'); ?>:<br />
				<select class="widefat" id="<?php echo $this->get_field_id('controls'); ?>" name="<?php echo $this->get_field_name('controls'); ?>">
					<option value="controls"<?php if ($controls == 'controls') { echo ' selected="selected"'; } ?>><?php _e('Enable Controls', 'cmsmasters'); ?></option>
					<option value=""<?php if ($controls == '') { echo ' selected="selected"'; } ?>><?php _e('Disable Controls', 'cmsmasters'); ?></option>
				</select>
            </label>
        </p>
        <p style="width:48%; float:right;">
            <label for="<?php echo $this->get_field_id('autoplay'); ?>"><?php _e('Autoplay', 'cmsmasters'); ?>:<br />
				<select class="widefat" id="<?php echo $this->get_field_id('autoplay'); ?>" name="<?php echo $this->get_field_name('autoplay'); ?>">
					<option value=""<?php if ($autoplay == '') { echo ' selected="selected"'; } ?>><?php _e('Disable Autoplay', 'cmsmasters'); ?></option>
					<option value="autoplay"<?php if ($autoplay == 'autoplay') { echo ' selected="selected"'; } ?>><?php _e('Enable Autoplay', 'cmsmasters'); ?></option>
				</select>
            </label>
        </p>
        <p style="width:48%; float:left; padding-right:4%; clear:both;">
            <label for="<?php echo $this->get_field_id('loop'); ?>"><?php _e('Repeat', 'cmsmasters'); ?>:<br />
				<select class="widefat" id="<?php echo $this->get_field_id('loop'); ?>" name="<?php echo $this->get_field_name('loop'); ?>">
					<option value=""<?php if ($loop == '') { echo ' selected="selected"'; } ?>><?php _e('Disable Repeat', 'cmsmasters'); ?></option>
					<option value="loop"<?php if ($loop == 'loop') { echo ' selected="selected"'; } ?>><?php _e('Enable Repeat', 'cmsmasters'); ?></option>
				</select>
            </label>
        </p>
        <p style="width:48%; float:right;">
            <label for="<?php echo $this->get_field_id('preload'); ?>"><?php _e('Preload', 'cmsmasters'); ?>:<br />
				<select class="widefat" id="<?php echo $this->get_field_id('preload'); ?>" name="<?php echo $this->get_field_name('preload'); ?>">
					<option value="none"<?php if ($preload == 'none') { echo ' selected="selected"'; } ?>><?php _e('Not Preload', 'cmsmasters'); ?></option>
					<option value="auto"<?php if ($preload == 'auto') { echo ' selected="selected"'; } ?>><?php _e('Preload Auto', 'cmsmasters'); ?></option>
					<option value="metadata"<?php if ($preload == 'metadata') { echo ' selected="selected"'; } ?>><?php _e('Preload as Metadata', 'cmsmasters'); ?></option>
				</select>
            </label>
        </p>
		<p style="border-top:1px solid #dfdfdf; border-bottom:1px solid #dfdfdf; padding:10px 0; overflow:hidden; clear:both;">
			<label for="<?php echo $this->get_field_id('widget_width'); ?>">
				<?php _e('Choose the width of widget', 'cmsmasters'); ?>:<br /><br />
                <small style="color:#f00; float:right; padding-top:5px;"><?php _e('Only for horizontal sidebars', 'cmsmasters'); ?></small>
                <select id="<?php echo $this->get_field_id('widget_width'); ?>" name="<?php echo $this->get_field_name('widget_width'); ?>" style="float:left;">
                    <option <?php if ($widget_width == 'one_first') { echo 'selected="selected" '; } ?>value="one_first">-- 1/1 --&nbsp;</option>
                    <option <?php if ($widget_width == 'three_fourth') { echo 'selected="selected" '; } ?>value="three_fourth">-- 3/4 --&nbsp;</option>
                    <option <?php if ($widget_width == 'two_third') { echo 'selected="selected" '; } ?>value="two_third">-- 2/3 --&nbsp;</option>
                    <option <?php if ($widget_width == 'one_half') { echo 'selected="selected" '; } ?>value="one_half">-- 1/2 --&nbsp;</option>
                    <option <?php if ($widget_width == 'one_third') { echo 'selected="selected" '; } ?>value="one_third">-- 1/3 --&nbsp;</option>
                    <option <?php if ($widget_width == 'one_fourth') { echo 'selected="selected" '; } ?>value="one_fourth">-- 1/4 --&nbsp;</option>
                </select>
            </label>
		</p>
        <div style="clear:both;"></div>
        <?php
    }
}



/**
 * HTML5 Audio Widget Class
 */
class WP_Widget_Custom_HTML5_Audio extends WP_Widget {
	function __construct() {
		$widget_ops = array('classname' => 'widget_custom_html5_audio_entries', 'description' => __('Your HTML5 Audio', 'cmsmasters'));
		$control_ops = array('width' => 600);
		parent::__construct('custom-html5-audio', '&nbsp;' . __('CMSMS - HTML5 Audio', 'cmsmasters'), $widget_ops, $control_ops);
	}
	
	function widget($args, $instance) {
		extract($args);
		
		$title = apply_filters('widget_title', empty($instance['title']) ? __('HTML5 Audio') : $instance['title'], $instance, $this->id_base);
        $srcmp3 = isset($instance['srcmp3']) ? $instance['srcmp3'] : '';
        $srcogg = isset($instance['srcogg']) ? $instance['srcogg'] : '';
        $srcwebm = isset($instance['srcwebm']) ? $instance['srcwebm'] : '';
        $text = (isset($instance['text']) && $instance['text'] != '') ? $instance['text'] : __('Your browser does not support the audio tag.', 'cmsmasters');
        $controls = isset($instance['controls']) ? $instance['controls'] : 'controls';
        $autoplay = isset($instance['autoplay']) ? $instance['autoplay'] : '';
        $loop = isset($instance['loop']) ? $instance['loop'] : '';
        $preload = isset($instance['preload']) ? $instance['preload'] : 'none';
        $widget_width = isset($instance['widget_width']) ? $instance['widget_width'] : 'one_first';
		
		echo '<div class="' . $widget_width . '">' . 
			$before_widget;
		
		if ($title) { 
			echo $before_title . $title . $after_title;
		}
		
		$out = '<audio class="fullwidth"';
		
		if ($controls != '') {
			$out .= ' controls="controls"';
		}
		
		if ($autoplay != '') {
			$out .= ' autoplay="autoplay"';
		}
		
		if ($loop != '') {
			$out .= ' loop="loop"';
		}
		
		if ($preload != '') {
			$out .= ' preload="' . $preload . '"';
		}
		
		$out .= '>';
		
		if ($srcmp3 != '') {
			$out .= '<source src="' . $srcmp3 . '" type="audio/mpeg" />';
		}
		
		if ($srcogg != '') {
			$out .= '<source src="' . $srcogg . '" type="audio/ogg" />';
		}
		
		if ($srcwebm != '') {
			$out .= '<source src="' . $srcwebm . '" type="audio/webm" />';
		}
		
		$out .= $text . 
		'</audio>';
		
		echo $out . 
			$after_widget . 
        '</div>';
    }
	
	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['srcmp3'] = strip_tags($new_instance['srcmp3']);
        $instance['srcogg'] = strip_tags($new_instance['srcogg']);
		$instance['srcwebm'] = strip_tags($new_instance['srcwebm']);
		$instance['text'] = strip_tags($new_instance['text']);
		$instance['controls'] = strip_tags($new_instance['controls']);
		$instance['autoplay'] = strip_tags($new_instance['autoplay']);
		$instance['loop'] = strip_tags($new_instance['loop']);
		$instance['preload'] = strip_tags($new_instance['preload']);
        $instance['widget_width'] = $new_instance['widget_width'];
		
		return $instance;
	}
	
    function form($instance) {
        $title = isset($instance['title']) ? esc_attr($instance['title']) : '';
		$srcmp3 = isset($instance['srcmp3']) ? esc_attr($instance['srcmp3']) : '';
		$srcogg = isset($instance['srcogg']) ? esc_attr($instance['srcogg']) : '';
		$srcwebm = isset($instance['srcwebm']) ? esc_attr($instance['srcwebm']) : '';
		$text = (isset($instance['text']) && $instance['text'] != '') ? esc_attr($instance['text']) : __('Your browser does not support the audio tag.', 'cmsmasters');
		$controls = isset($instance['controls']) ? esc_attr($instance['controls']) : 'controls';
		$autoplay = isset($instance['autoplay']) ? esc_attr($instance['autoplay']) : '';
		$loop = isset($instance['loop']) ? esc_attr($instance['loop']) : '';
		$preload = isset($instance['preload']) ? esc_attr($instance['preload']) : 'none';
        $widget_width = (isset($instance['widget_width']) && $instance['widget_width'] != '') ? $instance['widget_width'] : 'one_first';
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title', 'cmsmasters'); ?>:<br />
                <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
            </label>
        </p>
        <p style="width:48%; float:left; padding-right:4%; clear:both;">
            <label for="<?php echo $this->get_field_id('srcmp3'); ?>"><?php echo __('Audio', 'cmsmasters') . ' .mp3 ' . __('File Format URL', 'cmsmasters'); ?>:<br />
                <input class="widefat" id="<?php echo $this->get_field_id('srcmp3'); ?>" name="<?php echo $this->get_field_name('srcmp3'); ?>" type="text" value="<?php echo $srcmp3; ?>" />
            </label>
        </p>
        <p style="width:48%; float:right;">
            <label for="<?php echo $this->get_field_id('srcogg'); ?>"><?php echo __('Audio', 'cmsmasters') . ' .ogg ' . __('File Format URL', 'cmsmasters'); ?>:<br />
                <input class="widefat" id="<?php echo $this->get_field_id('srcogg'); ?>" name="<?php echo $this->get_field_name('srcogg'); ?>" type="text" value="<?php echo $srcogg; ?>" />
            </label>
        </p>
        <p style="width:48%; float:left; padding-right:4%; clear:both;">
            <label for="<?php echo $this->get_field_id('srcwebm'); ?>"><?php echo __('Audio', 'cmsmasters') . ' .webm ' . __('File Format URL', 'cmsmasters'); ?>:<br />
                <input class="widefat" id="<?php echo $this->get_field_id('srcwebm'); ?>" name="<?php echo $this->get_field_name('srcwebm'); ?>" type="text" value="<?php echo $srcwebm; ?>" />
            </label>
        </p>
        <p style="width:48%; float:right;">
            <label for="<?php echo $this->get_field_id('text'); ?>"><?php _e('Audio Tag Not Support Text', 'cmsmasters'); ?>:<br />
                <input class="widefat" id="<?php echo $this->get_field_id('text'); ?>" name="<?php echo $this->get_field_name('text'); ?>" type="text" value="<?php echo $text; ?>" />
            </label>
        </p>
        <p style="width:48%; float:left; padding-right:4%; clear:both;">
            <label for="<?php echo $this->get_field_id('controls'); ?>"><?php _e('Controls', 'cmsmasters'); ?>:<br />
				<select class="widefat" id="<?php echo $this->get_field_id('controls'); ?>" name="<?php echo $this->get_field_name('controls'); ?>">
					<option value="controls"<?php if ($controls == 'controls') { echo ' selected="selected"'; } ?>><?php _e('Enable Controls', 'cmsmasters'); ?></option>
					<option value=""<?php if ($controls == '') { echo ' selected="selected"'; } ?>><?php _e('Disable Controls', 'cmsmasters'); ?></option>
				</select>
            </label>
        </p>
        <p style="width:48%; float:right;">
            <label for="<?php echo $this->get_field_id('autoplay'); ?>"><?php _e('Autoplay', 'cmsmasters'); ?>:<br />
				<select class="widefat" id="<?php echo $this->get_field_id('autoplay'); ?>" name="<?php echo $this->get_field_name('autoplay'); ?>">
					<option value=""<?php if ($autoplay == '') { echo ' selected="selected"'; } ?>><?php _e('Disable Autoplay', 'cmsmasters'); ?></option>
					<option value="autoplay"<?php if ($autoplay == 'autoplay') { echo ' selected="selected"'; } ?>><?php _e('Enable Autoplay', 'cmsmasters'); ?></option>
				</select>
            </label>
        </p>
        <p style="width:48%; float:left; padding-right:4%; clear:both;">
            <label for="<?php echo $this->get_field_id('loop'); ?>"><?php _e('Repeat', 'cmsmasters'); ?>:<br />
				<select class="widefat" id="<?php echo $this->get_field_id('loop'); ?>" name="<?php echo $this->get_field_name('loop'); ?>">
					<option value=""<?php if ($loop == '') { echo ' selected="selected"'; } ?>><?php _e('Disable Repeat', 'cmsmasters'); ?></option>
					<option value="loop"<?php if ($loop == 'loop') { echo ' selected="selected"'; } ?>><?php _e('Enable Repeat', 'cmsmasters'); ?></option>
				</select>
            </label>
        </p>
        <p style="width:48%; float:right;">
            <label for="<?php echo $this->get_field_id('preload'); ?>"><?php _e('Preload', 'cmsmasters'); ?>:<br />
				<select class="widefat" id="<?php echo $this->get_field_id('preload'); ?>" name="<?php echo $this->get_field_name('preload'); ?>">
					<option value="none"<?php if ($preload == 'none') { echo ' selected="selected"'; } ?>><?php _e('Not Preload', 'cmsmasters'); ?></option>
					<option value="auto"<?php if ($preload == 'auto') { echo ' selected="selected"'; } ?>><?php _e('Preload Auto', 'cmsmasters'); ?></option>
					<option value="metadata"<?php if ($preload == 'metadata') { echo ' selected="selected"'; } ?>><?php _e('Preload as Metadata', 'cmsmasters'); ?></option>
				</select>
            </label>
        </p>
		<p style="border-top:1px solid #dfdfdf; border-bottom:1px solid #dfdfdf; padding:10px 0; overflow:hidden; clear:both;">
			<label for="<?php echo $this->get_field_id('widget_width'); ?>">
				<?php _e('Choose the width of widget', 'cmsmasters'); ?>:<br /><br />
                <small style="color:#f00; float:right; padding-top:5px;"><?php _e('Only for horizontal sidebars', 'cmsmasters'); ?></small>
                <select id="<?php echo $this->get_field_id('widget_width'); ?>" name="<?php echo $this->get_field_name('widget_width'); ?>" style="float:left;">
                    <option <?php if ($widget_width == 'one_first') { echo 'selected="selected" '; } ?>value="one_first">-- 1/1 --&nbsp;</option>
                    <option <?php if ($widget_width == 'three_fourth') { echo 'selected="selected" '; } ?>value="three_fourth">-- 3/4 --&nbsp;</option>
                    <option <?php if ($widget_width == 'two_third') { echo 'selected="selected" '; } ?>value="two_third">-- 2/3 --&nbsp;</option>
                    <option <?php if ($widget_width == 'one_half') { echo 'selected="selected" '; } ?>value="one_half">-- 1/2 --&nbsp;</option>
                    <option <?php if ($widget_width == 'one_third') { echo 'selected="selected" '; } ?>value="one_third">-- 1/3 --&nbsp;</option>
                    <option <?php if ($widget_width == 'one_fourth') { echo 'selected="selected" '; } ?>value="one_fourth">-- 1/4 --&nbsp;</option>
                </select>
            </label>
		</p>
        <div style="clear:both;"></div>
        <?php
    }
}



/**
 * Text with Icon Widget Class
 */
class WP_Widget_Custom_Icon_Text extends WP_Widget {
	function __construct() {
		$widget_ops = array('classname' => 'widget_custom_text_icon', 'description' => __('Your custom featured block', 'cmsmasters'));
		$control_ops = array('width' => 600);
		parent::__construct('custom-text-icon', '&nbsp;' . __('CMSMS - Featured Block', 'cmsmasters'), $widget_ops, $control_ops);
	}
	
	function widget($args, $instance) {
		extract($args);
		
		$title = apply_filters('widget_title', empty($instance['title']) ? __('Featured Block') : $instance['title'], $instance, $this->id_base);
        $subtitle = isset($instance['subtitle']) ? $instance['subtitle'] : '';
        $icon = isset($instance['icon']) ? $instance['icon'] : '';
        $text = isset($instance['text']) ? $instance['text'] : '';
        $widget_width = isset($instance['widget_width']) ? $instance['widget_width'] : 'one_first';
		
		echo '<div class="' . $widget_width . '">' . 
			$before_widget;
		
		if ($title || $icon != '') {
			echo '<table style="width:100%;">' . 
				'<tr>';
			
			if ($icon != '') {
				echo '<td>' . 
					'<img src="' . $icon . '" alt="" />' . 
				'</td>';
			}
			
			echo '<td>' . 
				'<div class="widgettitle">';
			
			if ($title) {
				echo '<h2>' . $title . '</h2>';
			}
			
			if ($subtitle) {
				echo '<h6>' . $subtitle . '</h6>';
			}
			
			echo '</div>' . 
			'</td>';
			
			echo '</tr>' . 
			'</table>';
		}
		
		if ($text != '') {
			echo '<div class="cms_widget_content">' . 
				$text . 
			'</div>';
		}
		
		echo $after_widget . 
        '</div>';
    }
	
	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['subtitle'] = strip_tags($new_instance['subtitle']);
		$instance['icon'] = strip_tags($new_instance['icon']);
		$instance['text'] = $new_instance['text'];
        $instance['widget_width'] = $new_instance['widget_width'];
		
		return $instance;
	}
	
    function form($instance) {
        $title = isset($instance['title']) ? esc_attr($instance['title']) : '';
        $subtitle = isset($instance['subtitle']) ? esc_attr($instance['subtitle']) : '';
		$icon = isset($instance['icon']) ? esc_attr($instance['icon']) : '';
		$text = isset($instance['text']) ? esc_attr($instance['text']) : '';
        $widget_width = (isset($instance['widget_width']) && $instance['widget_width'] != '') ? $instance['widget_width'] : 'one_first';
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title', 'cmsmasters'); ?>:<br />
                <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
            </label>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('subtitle'); ?>"><?php _e('Subtitle', 'cmsmasters'); ?>:<br />
                <input class="widefat" id="<?php echo $this->get_field_id('subtitle'); ?>" name="<?php echo $this->get_field_name('subtitle'); ?>" type="text" value="<?php echo $subtitle; ?>" />
            </label>
        </p>
        <p style="margin:0;">
            <label for="<?php echo $this->get_field_id('icon'); ?>"><?php _e('Icon', 'cmsmasters'); ?>:<br />
                <input id="<?php echo $this->get_field_id('icon'); ?>" name="<?php echo $this->get_field_name('icon'); ?>" type="hidden" value="<?php echo $icon; ?>" />
            </label>
        </p>
		<div class="cmsmasters_icon_list" style="overflow:hidden;">
			<ul id="icons<?php echo $this->get_field_id('icon'); ?>" class="iconslist" style="margin:0 0 1em; overflow:hidden;">
			<?php
			$themeicons = array();
			
			if (is_dir(TEMPLATEPATH . '/images/theme_icons/')) {
				if ($open_dirs = opendir(TEMPLATEPATH . '/images/theme_icons/')) {
					while (($themeicon = readdir($open_dirs)) !== false) {
						if ( 
							stristr($themeicon, '.png') !== false || 
							stristr($themeicon, '.jpg') !== false || 
							stristr($themeicon, '.jpeg') !== false || 
							stristr($themeicon, '.gif') !== false || 
							stristr($themeicon, '.ico') !== false 
						) {
							$themeicons[] = $themeicon;
						}
					}
				}
			}
			
			foreach ($themeicons as $themeicon) {
				if ($themeicon != '') {
					if ($icon == get_template_directory_uri() . '/images/theme_icons/' . $themeicon) {
						echo '<li class="current_icon" style="border:2px solid #d54e21; float:left; padding:0; margin:0 3px 3px 0; cursor:pointer;">' . 
							'<img src="' . get_template_directory_uri() . '/images/theme_icons/' . $themeicon . '" alt="' . $themeicon . '" width="24" height="24" style="display:block;" />' . 
						'</li>';
					} else {
						echo '<li style="float:left; padding:2px; margin:0 3px 3px 0; cursor:pointer;">' . 
							'<img src="' . get_template_directory_uri() . '/images/theme_icons/' . $themeicon . '" alt="' . $themeicon . '" width="24" height="24" style="display:block;" />' . 
						'</li>';
					}
				}
			}
			?>
			</ul>    
		</div>
        <p>
            <label for="<?php echo $this->get_field_id('text'); ?>"><?php _e('Text', 'cmsmasters'); ?>:<br />
                <textarea class="widefat" id="<?php echo $this->get_field_id('text'); ?>" name="<?php echo $this->get_field_name('text'); ?>" type="text" style="min-height:100px; resize:vertical;"><?php echo $text; ?></textarea>
            </label>
        </p>
		<p style="border-top:1px solid #dfdfdf; border-bottom:1px solid #dfdfdf; padding:10px 0; overflow:hidden;">
			<label for="<?php echo $this->get_field_id('widget_width'); ?>">
				<?php _e('Choose the width of widget', 'cmsmasters'); ?>:<br /><br />
                <small style="color:#f00; float:right; padding-top:5px;"><?php _e('Only for horizontal sidebars', 'cmsmasters'); ?></small>
                <select id="<?php echo $this->get_field_id('widget_width'); ?>" name="<?php echo $this->get_field_name('widget_width'); ?>" style="float:left;">
                    <option <?php if ($widget_width == 'one_first') { echo 'selected="selected" '; } ?>value="one_first">-- 1/1 --&nbsp;</option>
                    <option <?php if ($widget_width == 'three_fourth') { echo 'selected="selected" '; } ?>value="three_fourth">-- 3/4 --&nbsp;</option>
                    <option <?php if ($widget_width == 'two_third') { echo 'selected="selected" '; } ?>value="two_third">-- 2/3 --&nbsp;</option>
                    <option <?php if ($widget_width == 'one_half') { echo 'selected="selected" '; } ?>value="one_half">-- 1/2 --&nbsp;</option>
                    <option <?php if ($widget_width == 'one_third') { echo 'selected="selected" '; } ?>value="one_third">-- 1/3 --&nbsp;</option>
                    <option <?php if ($widget_width == 'one_fourth') { echo 'selected="selected" '; } ?>value="one_fourth">-- 1/4 --&nbsp;</option>
                </select>
            </label>
		</p>
        <div style="clear:both;"></div>
        <?php
    }
}



/**
 * Divider Widget Class
 */
class WP_Widget_Custom_Divider extends WP_Widget {
	function __construct() {
		$widget_ops = array('classname' => 'widget_custom_divider_entries', 'description' => __('Divider for widgets rows', 'cmsmasters'));
		parent::__construct('custom-divider', '&nbsp;' . __('CMSMS - Divider', 'cmsmasters'), $widget_ops);
	}
	
	function widget($args, $instance) {
		extract($args);
		
        $divider_type = isset($instance['divider_type']) ? $instance['divider_type'] : '';
		
		if ($divider_type == 'line') {
			echo '<div class="divider"></div>';
		} else {
			echo '<div class="cl"></div>';
		}
    }
	
	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		
		$instance['divider_type'] = strip_tags($new_instance['divider_type']);
		
		return $instance;
	}
	
	function form($instance) {
		$divider_type = isset($instance['divider_type']) ? esc_attr($instance['divider_type']) : '';
		?>
        <p>
            <label for="<?php echo $this->get_field_id('divider_type'); ?>"><?php _e('Divider Type', 'cmsmasters'); ?>:<br />
                <select class="widefat" id="<?php echo $this->get_field_id('divider_type'); ?>" name="<?php echo $this->get_field_name('divider_type'); ?>">
					<option value=""<?php if ($divider_type == '') { echo ' selected="selected"'; } ?>><?php _e('Divider without Line', 'cmsmasters'); ?></option>
					<option value="line"<?php if ($divider_type == 'line') { echo ' selected="selected"'; } ?>><?php _e('Divider with Line', 'cmsmasters'); ?></option>
				</select>
            </label>
        </p>
		<?php
	}
}



/**
 * Facebook Widget Class
 */
class WP_Widget_Custom_Facebook extends WP_Widget {
	function __construct() {
		$widget_ops = array('classname' => 'widget_custom_facebook_entries', 'description' => __('Your Facebook like box', 'cmsmasters'));
		parent::__construct('custom-facebook', '&nbsp;' . __('CMSMS - Facebook', 'cmsmasters'), $widget_ops);
	}
	
	function widget($args, $instance) {
		extract($args);
		
		$title = apply_filters('widget_title', empty($instance['title']) ? __('Facebook', 'cmsmasters') : $instance['title'], $instance, $this->id_base);
		$url = isset($instance['url']) ? $instance['url'] : '';
        $widget_width = isset($instance['widget_width']) ? $instance['widget_width'] : 'one_first';
		
		echo '<div class="' . $widget_width . '">' . 
			$before_widget;
		
		if ($title) { 
			echo $before_title . $title . $after_title;
		}
		
		echo '<iframe src="//www.facebook.com/plugins/likebox.php?href=' . urlencode($url) . '&amp;width=100&amp;height=258&amp;colorscheme=light&amp;show_faces=true&amp;border_color=%23ffffff&amp;stream=false&amp;header=false" scrolling="no" frameborder="0" style="border:none; background:#ffffff; overflow:hidden; width:100%; height:258px;" allowTransparency="true"></iframe>' . 
			'<div class="cl"></div>' . 
			$after_widget . 
		'</div>';
	}
	
	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		
		$instance['title'] = strip_tags($new_instance['title']);
        $instance['url'] = strip_tags($new_instance['url']);
        $instance['widget_width'] = $new_instance['widget_width'];
		
		return $instance;
	}
	
    function form($instance) {
        $title = isset($instance['title']) ? esc_attr($instance['title']) : '';
        $url = isset($instance['url']) ? esc_attr($instance['url']) : '';
        $widget_width = (isset($instance['widget_width']) && $instance['widget_width'] != '') ? $instance['widget_width'] : 'one_first';
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title', 'cmsmasters'); ?>:<br />
                <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
            </label>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('url'); ?>"><?php _e('Facebook Page URL', 'cmsmasters'); ?> :<br />
                <input class="widefat" id="<?php echo $this->get_field_id('url'); ?>" name="<?php echo $this->get_field_name('url'); ?>" type="text" value="<?php echo $url; ?>" />
            </label>
        </p>
		<p style="border-top:1px solid #dfdfdf; border-bottom:1px solid #dfdfdf; padding:10px 0; overflow:hidden;">
			<label for="<?php echo $this->get_field_id('widget_width'); ?>">
				<?php _e('Choose the width of widget', 'cmsmasters'); ?>:<br /><br />
                <small style="color:#f00; float:right; padding-top:5px;"><?php _e('Only for horizontal sidebars', 'cmsmasters'); ?></small>
                <select id="<?php echo $this->get_field_id('widget_width'); ?>" name="<?php echo $this->get_field_name('widget_width'); ?>" style="float:left;">
                    <option <?php if ($widget_width == 'one_first') { echo 'selected="selected" '; } ?>value="one_first">-- 1/1 --&nbsp;</option>
                    <option <?php if ($widget_width == 'three_fourth') { echo 'selected="selected" '; } ?>value="three_fourth">-- 3/4 --&nbsp;</option>
                    <option <?php if ($widget_width == 'two_third') { echo 'selected="selected" '; } ?>value="two_third">-- 2/3 --&nbsp;</option>
                    <option <?php if ($widget_width == 'one_half') { echo 'selected="selected" '; } ?>value="one_half">-- 1/2 --&nbsp;</option>
                    <option <?php if ($widget_width == 'one_third') { echo 'selected="selected" '; } ?>value="one_third">-- 1/3 --&nbsp;</option>
                    <option <?php if ($widget_width == 'one_fourth') { echo 'selected="selected" '; } ?>value="one_fourth">-- 1/4 --&nbsp;</option>
                </select>
            </label>
		</p>
        <div style="clear:both;"></div>
        <?php
    }
}



/**
 * Info Blocks Widget Class
 */
class WP_Widget_Custom_Colored_Blocks extends WP_Widget {
	function __construct() {
		$widget_ops = array('classname' => 'widget_custom_colored_blocks_entries', 'description' => __('Your Info blocks', 'cmsmasters'));
		$control_ops = array('width' => 600);
		parent::__construct('custom-colored-blocks', '&nbsp;' . __('CMSMS - Info Blocks', 'cmsmasters'), $widget_ops, $control_ops);
	}
	
	function widget($args, $instance) {
		extract($args);
		
        $block_show_1 = isset($instance['block_show_1']) ? $instance['block_show_1'] : '';
        $block_color_1 = isset($instance['block_color_1']) ? $instance['block_color_1'] : '#ff9108';
        $title_1 = isset($instance['title_1']) ? $instance['title_1'] : '';
        $text_1 = isset($instance['text_1']) ? $instance['text_1'] : '';
		
        $block_show_2 = isset($instance['block_show_2']) ? $instance['block_show_2'] : '';
        $block_color_2 = isset($instance['block_color_2']) ? $instance['block_color_2'] : '#ebe823';
        $title_2 = isset($instance['title_2']) ? $instance['title_2'] : '';
        $text_2 = isset($instance['text_2']) ? $instance['text_2'] : '';
		
        $block_show_3 = isset($instance['block_show_3']) ? $instance['block_show_3'] : '';
        $block_color_3 = isset($instance['block_color_3']) ? $instance['block_color_3'] : '#a0e0a9';
        $title_3 = isset($instance['title_3']) ? $instance['title_3'] : '';
        $text_3 = isset($instance['text_3']) ? $instance['text_3'] : '';
		
        $block_show_4 = isset($instance['block_show_4']) ? $instance['block_show_4'] : '';
        $block_color_4 = isset($instance['block_color_4']) ? $instance['block_color_4'] : '#00ada7';
        $title_4 = isset($instance['title_4']) ? $instance['title_4'] : '';
        $text_4 = isset($instance['text_4']) ? $instance['text_4'] : '';
		
		if ($block_show_1 != 'hide' && $block_show_2 != 'hide' && $block_show_3 != 'hide' && $block_show_4 != 'hide') {
			$widgets_width = 'four_box';
		} elseif ( 
			($block_show_1 != 'hide' && $block_show_2 != 'hide' && $block_show_3 != 'hide') || 
			($block_show_1 != 'hide' && $block_show_3 != 'hide' && $block_show_4 != 'hide') || 
			($block_show_2 != 'hide' && $block_show_3 != 'hide' && $block_show_4 != 'hide') 
		) {
			$widgets_width = 'three_box';
		} elseif ( 
			($block_show_1 != 'hide' && $block_show_2 != 'hide') || 
			($block_show_1 != 'hide' && $block_show_3 != 'hide') || 
			($block_show_1 != 'hide' && $block_show_4 != 'hide') || 
			($block_show_2 != 'hide' && $block_show_3 != 'hide') || 
			($block_show_2 != 'hide' && $block_show_4 != 'hide') || 
			($block_show_3 != 'hide' && $block_show_4 != 'hide') 
		) {
			$widgets_width = 'two_box';
		} elseif ($block_show_1 != 'hide' || $block_show_2 != 'hide' || $block_show_3 != 'hide' || $block_show_4 != 'hide') {
			$widgets_width = 'one_box';
		}
		
		echo '<div class="one_first">' . 
			$before_widget;
		
		if ($block_show_1 != 'hide') {
			echo '<div class="widget_colored ' . $widgets_width . '">' . 
				'<div class="widget_colored_inner">';
			
			if ($title_1 != '') {
				echo '<h2 class="widgettitle" style="border-color:' . $block_color_1 . ';">' . $title_1 . '</h2>';
			}
			
			if ($text_1 != '') {
				echo '<p>' . $text_1 . '</p>';
			}
			
			echo '</div>' . 
			'</div>';
		}
		
		if ($block_show_2 != 'hide') {
			echo '<div class="widget_colored ' . $widgets_width . '">' . 
				'<div class="widget_colored_inner">';
			
			if ($title_2 != '') {
				echo '<h2 class="widgettitle" style="border-color:' . $block_color_2 . ';">' . $title_2 . '</h2>';
			}
			
			if ($text_2 != '') {
				echo '<p>' . $text_2 . '</p>';
			}
			
			echo '</div>' . 
			'</div>';
		}
		
		if ($block_show_3 != 'hide') {
			echo '<div class="widget_colored ' . $widgets_width . '">' . 
				'<div class="widget_colored_inner">';
			
			if ($title_3 != '') {
				echo '<h2 class="widgettitle" style="border-color:' . $block_color_3 . ';">' . $title_3 . '</h2>';
			}
			
			if ($text_3 != '') {
				echo '<p>' . $text_3 . '</p>';
			}
			
			echo '</div>' . 
			'</div>';
		}
		
		if ($block_show_4 != 'hide') {
			echo '<div class="widget_colored ' . $widgets_width . '">' . 
				'<div class="widget_colored_inner">';
			
			if ($title_4 != '') {
				echo '<h2 class="widgettitle" style="border-color:' . $block_color_4 . ';">' . $title_4 . '</h2>';
			}
			
			if ($text_4 != '') {
				echo '<p>' . $text_4 . '</p>';
			}
			
			echo '</div>' . 
			'</div>';
		}
		
		echo $after_widget . 
        '</div>';
    }
	
	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		
        $instance['block_show_1'] = strip_tags($new_instance['block_show_1']);
        $instance['block_color_1'] = strip_tags($new_instance['block_color_1']);
        $instance['title_1'] = strip_tags($new_instance['title_1']);
        $instance['text_1'] = $new_instance['text_1'];
		
        $instance['block_show_2'] = strip_tags($new_instance['block_show_2']);
        $instance['block_color_2'] = strip_tags($new_instance['block_color_2']);
        $instance['title_2'] = strip_tags($new_instance['title_2']);
        $instance['text_2'] = $new_instance['text_2'];
		
        $instance['block_show_3'] = strip_tags($new_instance['block_show_3']);
        $instance['block_color_3'] = strip_tags($new_instance['block_color_3']);
        $instance['title_3'] = strip_tags($new_instance['title_3']);
        $instance['text_3'] = $new_instance['text_3'];
		
        $instance['block_show_4'] = strip_tags($new_instance['block_show_4']);
        $instance['block_color_4'] = strip_tags($new_instance['block_color_4']);
        $instance['title_4'] = strip_tags($new_instance['title_4']);
        $instance['text_4'] = $new_instance['text_4'];
		
		return $instance;
	}
	
    function form($instance) {
        $block_show_1 = isset($instance['block_show_1']) ? esc_attr($instance['block_show_1']) : '';
        $block_color_1 = isset($instance['block_color_1']) ? esc_attr($instance['block_color_1']) : '#1a8368';
        $title_1 = isset($instance['title_1']) ? esc_attr($instance['title_1']) : '';
        $text_1 = isset($instance['text_1']) ? esc_attr($instance['text_1']) : '';
		
        $block_show_2 = isset($instance['block_show_2']) ? esc_attr($instance['block_show_2']) : '';
        $block_color_2 = isset($instance['block_color_2']) ? esc_attr($instance['block_color_2']) : '#b3d32f';
        $title_2 = isset($instance['title_2']) ? esc_attr($instance['title_2']) : '';
        $text_2 = isset($instance['text_2']) ? esc_attr($instance['text_2']) : '';
		
        $block_show_3 = isset($instance['block_show_3']) ? esc_attr($instance['block_show_3']) : '';
        $block_color_3 = isset($instance['block_color_3']) ? esc_attr($instance['block_color_3']) : '#ffd007';
        $title_3 = isset($instance['title_3']) ? esc_attr($instance['title_3']) : '';
        $text_3 = isset($instance['text_3']) ? esc_attr($instance['text_3']) : '';
		
        $block_show_4 = isset($instance['block_show_4']) ? esc_attr($instance['block_show_4']) : '';
        $block_color_4 = isset($instance['block_color_4']) ? esc_attr($instance['block_color_4']) : '#fd6800';
        $title_4 = isset($instance['title_4']) ? esc_attr($instance['title_4']) : '';
        $text_4 = isset($instance['text_4']) ? esc_attr($instance['text_4']) : '';
        ?>
        <p style="width:48%; float:left; padding-right:4%; clear:both;">
            <label for="<?php echo $this->get_field_id('block_show_1'); ?>"><?php _e('First Block Visibility', 'cmsmasters'); ?>:<br />
                <select class="widefat" id="<?php echo $this->get_field_id('block_show_1'); ?>" name="<?php echo $this->get_field_name('block_show_1'); ?>">
					<option value=""<?php if ($block_show_1 == '') { echo ' selected="selected"'; } ?>><?php _e('Show', 'cmsmasters'); ?></option>
					<option value="hide"<?php if ($block_show_1 == 'hide') { echo ' selected="selected"'; } ?>><?php _e('Hide', 'cmsmasters'); ?></option>
				</select>
            </label>
        </p>
        <p style="width:48%; float:right;">
            <label for="<?php echo $this->get_field_id('block_show_2'); ?>"><?php _e('Second Block Visibility', 'cmsmasters'); ?>:<br />
                <select class="widefat" id="<?php echo $this->get_field_id('block_show_2'); ?>" name="<?php echo $this->get_field_name('block_show_2'); ?>">
					<option value=""<?php if ($block_show_2 == '') { echo ' selected="selected"'; } ?>><?php _e('Show', 'cmsmasters'); ?></option>
					<option value="hide"<?php if ($block_show_2 == 'hide') { echo ' selected="selected"'; } ?>><?php _e('Hide', 'cmsmasters'); ?></option>
				</select>
            </label>
        </p>
        <p style="width:48%; float:left; padding-right:4%; clear:both;">
            <label for="<?php echo $this->get_field_id('title_1'); ?>"><?php _e('First Block Title', 'cmsmasters'); ?>:<br />
                <input class="widefat" id="<?php echo $this->get_field_id('title_1'); ?>" name="<?php echo $this->get_field_name('title_1'); ?>" type="text" value="<?php echo $title_1; ?>" />
            </label>
        </p>
        <p style="width:48%; float:right;">
            <label for="<?php echo $this->get_field_id('title_2'); ?>"><?php _e('Second Block Title', 'cmsmasters'); ?>:<br />
                <input class="widefat" id="<?php echo $this->get_field_id('title_2'); ?>" name="<?php echo $this->get_field_name('title_2'); ?>" type="text" value="<?php echo $title_2; ?>" />
            </label>
        </p>
        <p style="width:48%; float:left; padding-right:4%; clear:both;">
            <label for="<?php echo $this->get_field_id('block_color_1'); ?>"><?php _e('First Block Border Color', 'cmsmasters'); ?>:<br />
                <input id="<?php echo $this->get_field_id('block_color_1'); ?>" name="<?php echo $this->get_field_name('block_color_1'); ?>" type="color" value="<?php echo $block_color_1; ?>" data-hex="true" />
            </label>
        </p>
        <p style="width:48%; float:right;">
            <label for="<?php echo $this->get_field_id('block_color_2'); ?>"><?php _e('Second Block Border Color', 'cmsmasters'); ?>:<br />
                <input id="<?php echo $this->get_field_id('block_color_2'); ?>" name="<?php echo $this->get_field_name('block_color_2'); ?>" type="color" value="<?php echo $block_color_2; ?>" data-hex="true" />
            </label>
        </p>
        <p style="width:48%; float:left; padding-right:4%; clear:both;">
            <label for="<?php echo $this->get_field_id('text_1'); ?>"><?php _e('First Block Text', 'cmsmasters'); ?>:<br />
                <textarea class="widefat" id="<?php echo $this->get_field_id('text_1'); ?>" name="<?php echo $this->get_field_name('text_1'); ?>"><?php echo $text_1; ?></textarea>
            </label>
        </p>
        <p style="width:48%; float:right;">
            <label for="<?php echo $this->get_field_id('text_2'); ?>"><?php _e('Second Block Text', 'cmsmasters'); ?>:<br />
                <textarea class="widefat" id="<?php echo $this->get_field_id('text_2'); ?>" name="<?php echo $this->get_field_name('text_2'); ?>"><?php echo $text_2; ?></textarea>
            </label>
        </p>
        <p style="border-top:1px solid #dfdfdf; width:48%; float:left; padding-top:10px; padding-right:4%; clear:both;">
            <label for="<?php echo $this->get_field_id('block_show_3'); ?>"><?php _e('Third Block Visibility', 'cmsmasters'); ?>:<br />
                <select class="widefat" id="<?php echo $this->get_field_id('block_show_3'); ?>" name="<?php echo $this->get_field_name('block_show_3'); ?>">
					<option value=""<?php if ($block_show_3 == '') { echo ' selected="selected"'; } ?>><?php _e('Show', 'cmsmasters'); ?></option>
					<option value="hide"<?php if ($block_show_3 == 'hide') { echo ' selected="selected"'; } ?>><?php _e('Hide', 'cmsmasters'); ?></option>
				</select>
            </label>
        </p>
        <p style="border-top:1px solid #dfdfdf; width:48%; float:right; padding-top:10px;">
            <label for="<?php echo $this->get_field_id('block_show_4'); ?>"><?php _e('Fourth Block Visibility', 'cmsmasters'); ?>:<br />
                <select class="widefat" id="<?php echo $this->get_field_id('block_show_4'); ?>" name="<?php echo $this->get_field_name('block_show_4'); ?>">
					<option value=""<?php if ($block_show_4 == '') { echo ' selected="selected"'; } ?>><?php _e('Show', 'cmsmasters'); ?></option>
					<option value="hide"<?php if ($block_show_4 == 'hide') { echo ' selected="selected"'; } ?>><?php _e('Hide', 'cmsmasters'); ?></option>
				</select>
            </label>
        </p>
        <p style="width:48%; float:left; padding-right:4%; clear:both;">
            <label for="<?php echo $this->get_field_id('title_3'); ?>"><?php _e('Third Block Title', 'cmsmasters'); ?>:<br />
                <input class="widefat" id="<?php echo $this->get_field_id('title_3'); ?>" name="<?php echo $this->get_field_name('title_3'); ?>" type="text" value="<?php echo $title_3; ?>" />
            </label>
        </p>
        <p style="width:48%; float:right;">
            <label for="<?php echo $this->get_field_id('title_4'); ?>"><?php _e('Fourth Block Title', 'cmsmasters'); ?>:<br />
                <input class="widefat" id="<?php echo $this->get_field_id('title_4'); ?>" name="<?php echo $this->get_field_name('title_4'); ?>" type="text" value="<?php echo $title_4; ?>" />
            </label>
        </p>
        <p style="width:48%; float:left; padding-right:4%; clear:both;">
            <label for="<?php echo $this->get_field_id('block_color_3'); ?>"><?php _e('Third Block Border Color', 'cmsmasters'); ?>:<br />
                <input id="<?php echo $this->get_field_id('block_color_3'); ?>" name="<?php echo $this->get_field_name('block_color_3'); ?>" type="color" value="<?php echo $block_color_3; ?>" data-hex="true" />
            </label>
        </p>
        <p style="width:48%; float:right;">
            <label for="<?php echo $this->get_field_id('block_color_4'); ?>"><?php _e('Fourth Block Border Color', 'cmsmasters'); ?>:<br />
                <input id="<?php echo $this->get_field_id('block_color_4'); ?>" name="<?php echo $this->get_field_name('block_color_4'); ?>" type="color" value="<?php echo $block_color_4; ?>" data-hex="true" />
            </label>
        </p>
        <p style="width:48%; float:left; padding-right:4%; clear:both;">
            <label for="<?php echo $this->get_field_id('text_3'); ?>"><?php _e('Third Block Text', 'cmsmasters'); ?>:<br />
                <textarea class="widefat" id="<?php echo $this->get_field_id('text_3'); ?>" name="<?php echo $this->get_field_name('text_3'); ?>"><?php echo $text_3; ?></textarea>
            </label>
        </p>
        <p style="width:48%; float:right;">
            <label for="<?php echo $this->get_field_id('text_4'); ?>"><?php _e('Fourth Block Text', 'cmsmasters'); ?>:<br />
                <textarea class="widefat" id="<?php echo $this->get_field_id('text_4'); ?>" name="<?php echo $this->get_field_name('text_4'); ?>"><?php echo $text_4; ?></textarea>
            </label>
        </p>
        <div style="clear:both;"></div>
        <?php
    }
}



/**
 * Testimonials Widget Class
 */
class WP_Widget_Custom_Testimonials extends WP_Widget {
	function __construct() {
		$widget_ops = array('classname' => 'widget_custom_testimonials_entries', 'description' => __('Testimonials on your blog', 'cmsmasters'));
		parent::__construct('custom-testimonials', '&nbsp;' . __('CMSMS - Testimonials', 'cmsmasters'), $widget_ops);
	}
	
    function widget($args, $instance) {
		extract($args);
		
		$title = apply_filters('widget_title', empty($instance['title']) ? __('Testimonials', 'cmsmasters') : $instance['title'], $instance, $this->id_base);
		$number = isset($instance['number']) ? (int) $instance['number'] : '';
        $widget_width = isset($instance['widget_width']) ? $instance['widget_width'] : 'one_first';
		
        if (empty($instance['number']) || !$number = absint($instance['number'])) {
            $number = 3;
        } elseif ($number < 1) {
            $number = 1;
        } elseif ($number > 15) {
            $number = 15;
        }
		
        $t = new WP_Query(array( 
			'posts_per_page' => $number, 
			'post_status' => 'publish', 
			'ignore_sticky_posts' => 1, 
			'post_type' => 'post'
		));
		
        if ($t->have_posts()) { 
			echo '<div class="' . $widget_width . '">' . 
				$before_widget . 
				'<script type="text/javascript">' . 
					'jQuery(document).ready(function () { ' . 
						"jQuery('#" . $args['widget_id'] . " .widget_custom_testimonials_entries_slides').cmsmsResponsiveContentSlider( { " . 
							"sliderWidth : '100%', " . 
							"sliderHeight : 'auto', " . 
							'animationSpeed : 500, ' . 
							"animationEffect : 'slide', " . 
							"animationEasing : 'easeInOutExpo', " . 
							'pauseTime : 5000, ' . 
							'activeSlide : 1, ' . 
							'touchControls : true, ' . 
							'pauseOnHover : false, ' . 
							'arrowNavigation : true, ' . 
							'slidesNavigation : true ' . 
						'} ); ' . 
					'} ); ' . 
				'</script>' . 
				'<div class="widget_custom_testimonials_entries_container">';
			
			if ($title) { 
				echo $before_title . $title . $after_title;
			}
			
			echo '<ul class="widget_custom_testimonials_entries_slides responsiveContentSlider">';
			
            while ($t->have_posts()) : $t->the_post();
				$pt_format = get_post_format();
				if ($pt_format == 'quote') {
					echo '<li>';
						echo '<div class="testimonials_text">';
						
						theme_excerpt(20);
						
						echo '</div>';
						
						the_author_posts_link();
						
					echo '</li>';
				}
			endwhile;
			
			echo '</ul>' . 
				'</div>' . 
				$after_widget . 
			'</div>';
        }
		
		wp_reset_postdata();
		wp_reset_query();
    }
	
	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		
		$instance['title'] = strip_tags($new_instance['title']);
        $instance['number'] = absint($new_instance['number']);
        $instance['widget_width'] = $new_instance['widget_width'];
		
		return $instance;
	}
	
    function form($instance) {
        $title = isset($instance['title']) ? esc_attr($instance['title']) : '';
        $number = (isset($instance['number']) && $instance['number'] != 0) ? absint($instance['number']) : 3;
        $widget_width = (isset($instance['widget_width']) && $instance['widget_width'] != '') ? $instance['widget_width'] : 'one_first';
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title', 'cmsmasters'); ?>:<br />
                <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
            </label>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('number'); ?>"><?php _e("Enter the number of testimonials you'd like to display", 'cmsmasters'); ?>:<br /><br />
                <input id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" type="text" value="<?php echo $number; ?>" size="3" />
                <small style="color:#ff0000; float:right; padding-top:5px;"><?php _e('default is', 'cmsmasters'); ?> 3</small><br />
            </label>
        </p>
		<p style="border-top:1px solid #dfdfdf; border-bottom:1px solid #dfdfdf; padding:10px 0; overflow:hidden;">
			<label for="<?php echo $this->get_field_id('widget_width'); ?>">
				<?php _e('Choose the width of widget', 'cmsmasters'); ?>:<br /><br />
                <small style="color:#f00; float:right; padding-top:5px;"><?php _e('Only for horizontal sidebars', 'cmsmasters'); ?></small>
                <select id="<?php echo $this->get_field_id('widget_width'); ?>" name="<?php echo $this->get_field_name('widget_width'); ?>" style="float:left;">
                    <option <?php if ($widget_width == 'one_first') { echo 'selected="selected" '; } ?>value="one_first">-- 1/1 --&nbsp;</option>
                    <option <?php if ($widget_width == 'three_fourth') { echo 'selected="selected" '; } ?>value="three_fourth">-- 3/4 --&nbsp;</option>
                    <option <?php if ($widget_width == 'two_third') { echo 'selected="selected" '; } ?>value="two_third">-- 2/3 --&nbsp;</option>
                    <option <?php if ($widget_width == 'one_half') { echo 'selected="selected" '; } ?>value="one_half">-- 1/2 --&nbsp;</option>
                    <option <?php if ($widget_width == 'one_third') { echo 'selected="selected" '; } ?>value="one_third">-- 1/3 --&nbsp;</option>
                    <option <?php if ($widget_width == 'one_fourth') { echo 'selected="selected" '; } ?>value="one_fourth">-- 1/4 --&nbsp;</option>
                </select>
            </label>
		</p>
        <div style="clear:both;"></div>
        <?php
    }
}



/**
 * Recent Comments, Popular and Latest Posts Widget Class
 */
class WP_Widget_Popular_Latest_Posts_Recent_Comments extends WP_Widget {
	function __construct() {
		$widget_ops = array('classname' => 'widget_custom_latest_popular_recent_entries', 'description' => __('Popular and latest posts, comments', 'cmsmasters'));
		parent::__construct('custom-latest-popular-recent', '&nbsp;' . __('CMSMS - Latest, Popular and Comment', 'cmsmasters'), $widget_ops);
	}
	
	function widget($args, $instance) {
		extract($args);
		
		$title = apply_filters('widget_title', empty($instance['title']) ? '' : $instance['title'], $instance, $this->id_base);
		$latest = isset($instance['latest']) ? $instance['latest'] : true;
		$popular = isset($instance['popular']) ? $instance['popular'] : true;
		$recent = isset($instance['recent']) ? $instance['recent'] : true;
		$number = isset($instance['number']) ? (int) $instance['number'] : '';
        $widget_width = isset($instance['widget_width']) ? $instance['widget_width'] : 'one_first';
		
        if (empty($instance['number']) || !$number = absint($instance['number'])) {
            $number = 3;
        } elseif ($number < 1) {
            $number = 1;
        } elseif ($number > 15) {
            $number = 15;
        }
		
		echo '<div class="' . $widget_width . '">' . 
			$before_widget;
		
		if ($title) { 
			echo $before_title . $title . $after_title;
		}
		
		echo '<div class="tab">' . 
				'<ul class="tabs">';
		
		if ($latest) {
			echo '<li>' . 
				'<a href="#"><span>' . __('Latest', 'cmsmasters') . '</span></a>' . 
			'</li>'; 
		}
		
		if ($popular) {
			echo '<li>' . 
				'<a href="#"><span>' . __('Popular', 'cmsmasters') . '</span></a>' . 
			'</li>'; 
		}
		
		if ($recent) {
			echo '<li>' . 
				'<a href="#"><span>' . __('Comments', 'cmsmasters') . '</span></a>' . 
			'</li>'; 
		}
		
		if (!$latest && !$popular && !$recent) {
			echo '<li>' . 
				'<a href="#"><span>' . __('Latest', 'cmsmasters') . '</span></a>' . 
			'</li>'; 
		}
		
		echo '</ul>' . 
		'<div class="tab_content">';
		
		if ($latest) {
			$l = new WP_Query(array( 
				'posts_per_page' => $number, 
				'post_status' => 'publish', 
				'ignore_sticky_posts' => 1, 
				'post_type' => 'post' 
			));
			
			if ($l->have_posts()) { 
				echo '<div class="tabs_tab">' . 
					'<ul>';
				
				while ($l->have_posts()) : $l->the_post();
					$pt_format = get_post_format();
					
					$attachments =& get_children(array(
						'post_type' => 'attachment', 
						'post_mime_type' => 'image', 
						'post_parent' => get_the_ID(), 
						'orderby' => 'menu_order', 
						'order' => 'ASC' 
					));
					
					$post_link_text = get_post_meta(get_the_ID(), 'post_link_text', true);
					$post_link_link = get_post_meta(get_the_ID(), 'post_link_link', true);
					
					echo '<li>';
					
					if ($pt_format == 'image' || $pt_format == 'gallery') {
						echo '<div class="alignleft">';
						
						if (has_post_thumbnail()) {
							cmsms_thumb(get_the_ID(), array(60, 60), true, false, false, false, false, true, false);
						} elseif (!has_post_thumbnail() && sizeof($attachments) > 0) {
							if (isset($att_counter)) {
								unset($att_counter);
							}
							
							foreach ($attachments as $attachment) { 
								if (!isset($att_counter) && $att_counter = true) { 
									cmsms_thumb(get_the_ID(), array(60, 60), true, false, false, false, true, true, $attachment->ID);
								}
							}
						} else {
							echo '<figure>' . 
								'<a href="' . get_permalink() . '"' . ' title="' . cmsms_title(get_the_ID(), false) . '">' . 
									'<img src="' . get_template_directory_uri() . '/images/PF-' . (($pt_format == 'image') ? 'placeholder' : $pt_format) . '.jpg' . '" alt="' . cmsms_title(get_the_ID(), false) . '" title="' . cmsms_title(get_the_ID(), false) . '" style="width:60px; height:60px;" />' . 
								'</a>' . 
							'</figure>';
						}
						
						echo '</div>';
					} else {
						echo '<div class="alignleft">';
						
						if (has_post_thumbnail() && $pt_format != 'video') {
							cmsms_thumb(get_the_ID(), array(60, 60), true, false, false, false, false, true, false);
						} else {
							echo '<figure>' . 
								'<a href="' . get_permalink() . '"' . ' title="' . cmsms_title(get_the_ID(), false) . '">' . 
									'<img src="' . get_template_directory_uri() . '/images/PF-' . (($pt_format == '') ? 'placeholder' : $pt_format) . '.jpg' . '" alt="' . cmsms_title(get_the_ID(), false) . '" title="' . cmsms_title(get_the_ID(), false) . '" style="width:60px; height:60px;" />' . 
								'</a>' . 
							'</figure>';
						}
						
						echo '</div>';
					}
					
					echo '<div class="ovh">';
					
					if ($pt_format != 'aside' && $pt_format != 'link' && $pt_format != 'quote') {
						echo '<a href="' . get_permalink() . '" title="' . cmsms_title(get_the_ID(), false) . '">' . cmsms_title(get_the_ID(), false) . '</a>' . 
						'<abbr class="published" title="' . get_the_time('d-m-Y') . '">' . human_time_diff(get_the_time('U'), current_time('timestamp')) . ' ' . __('ago', 'cmsmasters') . '</abbr>';
					} elseif ($pt_format == 'link') {
						echo '<a href="' . $post_link_link . '" title="' . $post_link_text . '">' . $post_link_text . '</a>' . 
						'<abbr class="published" title="' . get_the_time('d-m-Y') . '">' . human_time_diff(get_the_time('U'), current_time('timestamp')) . ' ' . __('ago', 'cmsmasters') . '</abbr>';
					} elseif ($pt_format == 'aside') {
						echo '<div class="entry-content">';
						
						theme_excerpt(20);
						
						echo '</div>' . 
						'<abbr class="published" title="' . get_the_time('d-m-Y') . '">' . human_time_diff(get_the_time('U'), current_time('timestamp')) . ' ' . __('ago', 'cmsmasters') . '</abbr>';
					} elseif ($pt_format == 'quote') {
						echo '<div class="entry-content">';
						
						theme_excerpt(20);
						
						echo '</div>' . 
						'<abbr class="published" title="' . get_the_time('d-m-Y') . '">' . human_time_diff(get_the_time('U'), current_time('timestamp')) . ' ' . __('ago', 'cmsmasters') . '</abbr>';
					}
					
					echo '</div>' . 
						'<div class="cl"></div>' . 
					'</li>';
				endwhile;
				
				echo '</ul>' . 
				'</div>';
			}
		}
		
		wp_reset_postdata();
		wp_reset_query();
		
		if ($popular) {
			$p = new WP_Query(array( 
				'posts_per_page' => $number, 
				'post_status' => 'publish', 
				'ignore_sticky_posts' => 1, 
				'post_type' => 'post', 
				'order' => 'DESC', 
				'orderby' => 'meta_value', 
				'meta_key' => 'cmsms_likes' 
			));
			
			if ($p->have_posts()) { 
				echo '<div class="tabs_tab">' . 
					'<ul>';
				
				while ($p->have_posts()) : $p->the_post();
					$pt_format = get_post_format();
					
					$attachments =& get_children(array(
						'post_type' => 'attachment', 
						'post_mime_type' => 'image', 
						'post_parent' => get_the_ID(), 
						'orderby' => 'menu_order', 
						'order' => 'ASC' 
					));
					
					$post_link_text = get_post_meta(get_the_ID(), 'post_link_text', true);
					$post_link_link = get_post_meta(get_the_ID(), 'post_link_link', true);
					
					echo '<li>';
					
					if ($pt_format == 'image' || $pt_format == 'gallery') {
						echo '<div class="alignleft">';
						
						if (has_post_thumbnail()) {
							cmsms_thumb(get_the_ID(), array(60, 60), true, false, false, false, false, true, false);
						} elseif (!has_post_thumbnail() && sizeof($attachments) > 0) {
							if (isset($att_counter)) {
								unset($att_counter);
							}
							
							foreach ($attachments as $attachment) { 
								if (!isset($att_counter) && $att_counter = true) { 
									cmsms_thumb(get_the_ID(), array(60, 60), true, false, false, false, true, true, $attachment->ID);
								}
							}
						} else {
							echo '<figure>' . 
								'<a href="' . get_permalink() . '"' . ' title="' . cmsms_title(get_the_ID(), false) . '">' . 
									'<img src="' . get_template_directory_uri() . '/images/PF-' . (($pt_format == 'image') ? 'placeholder' : $pt_format) . '.jpg' . '" alt="' . cmsms_title(get_the_ID(), false) . '" title="' . cmsms_title(get_the_ID(), false) . '" style="width:60px; height:60px;" />' . 
								'</a>' . 
							'</figure>';
						}
						
						echo '</div>';
					} else {
						echo '<div class="alignleft">';
						
						if (has_post_thumbnail() && $pt_format != 'video') {
							cmsms_thumb(get_the_ID(), array(60, 60), true, false, false, false, false, true, false);
						} else {
							echo '<figure>' . 
								'<a href="' . get_permalink() . '"' . ' title="' . cmsms_title(get_the_ID(), false) . '">' . 
									'<img src="' . get_template_directory_uri() . '/images/PF-' . (($pt_format == '') ? 'placeholder' : $pt_format) . '.jpg' . '" alt="' . cmsms_title(get_the_ID(), false) . '" title="' . cmsms_title(get_the_ID(), false) . '" style="width:60px; height:60px;" />' . 
								'</a>' . 
							'</figure>';
						}
						
						echo '</div>';
					}
					
					echo '<div class="ovh">';
					
					if ($pt_format != 'aside' && $pt_format != 'link' && $pt_format != 'quote') {
						echo '<a href="' . get_permalink() . '" title="' . cmsms_title(get_the_ID(), false) . '">' . cmsms_title(get_the_ID(), false) . '</a>' . 
						'<abbr class="published" title="' . get_the_time('d-m-Y') . '">' . human_time_diff(get_the_time('U'), current_time('timestamp')) . ' ' . __('ago', 'cmsmasters') . '</abbr>';
					} elseif ($pt_format == 'link') {
						echo '<a href="' . $post_link_link . '" title="' . $post_link_text . '">' . $post_link_text . '</a>' . 
						'<abbr class="published" title="' . get_the_time('d-m-Y') . '">' . human_time_diff(get_the_time('U'), current_time('timestamp')) . ' ' . __('ago', 'cmsmasters') . '</abbr>';
					} elseif ($pt_format == 'aside') {
						echo '<div class="entry-content">';
						
						theme_excerpt(20);
						
						echo '</div>' . 
						'<abbr class="published" title="' . get_the_time('d-m-Y') . '">' . human_time_diff(get_the_time('U'), current_time('timestamp')) . ' ' . __('ago', 'cmsmasters') . '</abbr>';
					} elseif ($pt_format == 'quote') {
						echo '<div class="entry-content">';
						
						theme_excerpt(20);
						
						echo '</div>' . 
						'<abbr class="published" title="' . get_the_time('d-m-Y') . '">' . human_time_diff(get_the_time('U'), current_time('timestamp')) . ' ' . __('ago', 'cmsmasters') . '</abbr>';
					}
					
					echo '</div>' . 
						'<div class="cl"></div>' . 
					'</li>';
				endwhile;
				
				echo '</ul>' . 
				'</div>';
			}
		}
		
		wp_reset_postdata();
		wp_reset_query();
		
		if ($recent) {
			global $wpdb;
			
			$now = gmdate('Y-m-d H:i:s', time());
			$lastmonth = gmdate('Y-m-d H:i:s', gmmktime(date('H'), date('i'), date('s'), date('m') - 12, date('d'), date('Y')));
			
			$r = "SELECT pp.ID, 
				pp.post_title, 
				pp.guid, 
				cc.comment_ID AS 'stammy', 
				cc.comment_ID, 
				cc.comment_author, 
				cc.comment_date, 
				cc.comment_content 
			FROM $wpdb->posts AS pp 
			INNER JOIN $wpdb->comments AS cc 
			ON ( 
				(pp.ID = cc.comment_post_ID) 
				AND 
				(cc.comment_approved = '1') 
				AND 
				(cc.comment_date < '$now') 
				AND 
				(cc.comment_date > '$lastmonth') 
			) 
			WHERE ( 
				(pp.post_type = 'post') 
				AND 
				(pp.post_status = 'publish') 
				AND 
				(pp.comment_status = 'open') 
			) 
			GROUP BY cc.comment_ID 
			ORDER BY stammy DESC LIMIT " . $number;
			
			$rcomments = $wpdb->get_results($r);
			
			if ($rcomments) { 
				echo '<div class="tabs_tab">' . 
					'<ul>';
				
				foreach ($rcomments as $comment) { 
					$comment_author = $comment->comment_author;
					$post_title = $comment->post_title;
					$post_link = $comment->guid;
					$comment_date = mysql2date('U', $comment->comment_date, false);
					$comment_content = $comment->comment_content;
					
					echo '<li>' . 
						'<strong>' . $comment_author . '</strong> ' . __('on', 'cmsmasters') . ' <a href="' . $post_link . '#comments" rel="bookmark">' . $post_title . '</a>' . 
						'<br />' . 
						'<abbr class="published" title="' . human_time_diff($comment_date, current_time('timestamp')) . ' ' . __('ago', 'cmsmasters') . '">' . human_time_diff($comment_date, current_time('timestamp')) . ' ' . __('ago', 'cmsmasters') . '</abbr>';
					
					the_content_limit($comment_content, 100, '');
					
					echo '</li>';
				}
				
				echo '</ul>' . 
				'</div>';
			}
		}
		
		wp_reset_postdata();
		wp_reset_query();
		
		echo '</div>' . 
			'</div>' .
			$after_widget . 
		'</div>';
	}
	
	function update($new_instance, $old_instance) {
		$new_instance = (array) $new_instance;
		$instance = array( 
			'latest' => 0, 
			'popular' => 0, 
			'recent' => 0 
		);
		
		foreach ($instance as $field => $val) {
			if (isset($new_instance[$field])) {
				$instance[$field] = 1;
			}
		}
		
		if ($new_instance['latest'] == '' && $instance['popular'] == '' && $instance['recent'] == '') {
			$instance['latest'] = 1;
		}
		
		$instance['title'] = strip_tags($new_instance['title']);
        $instance['number'] = absint($new_instance['number']);
        $instance['widget_width'] = $new_instance['widget_width'];
		
		return $instance;
	}
	
    function form($instance) {
        $title = isset($instance['title']) ? esc_attr($instance['title']) : '';
		$instance = wp_parse_args((array) $instance, array( 
			'latest' => true, 
			'popular' => true, 
			'recent' => true 
		) );
        $number = (isset($instance['number']) && $instance['number'] != 0) ? absint($instance['number']) : 3;
        $widget_width = (isset($instance['widget_width']) && $instance['widget_width'] != '') ? $instance['widget_width'] : 'one_first';
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title', 'cmsmasters'); ?>:<br />
                <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
            </label>
        </p>
		<p>
			<input class="checkbox" type="checkbox" <?php checked($instance['latest'], true); ?> id="<?php echo $this->get_field_id('latest'); ?>" name="<?php echo $this->get_field_name('latest'); ?>" /> 
			<label for="<?php echo $this->get_field_id('latest'); ?>"><?php _e('Latest Posts', 'cmsmasters'); ?></label>
		</p>
		<p>
			<input class="checkbox" type="checkbox" <?php checked($instance['popular'], true); ?> id="<?php echo $this->get_field_id('popular'); ?>" name="<?php echo $this->get_field_name('popular'); ?>" /> 
			<label for="<?php echo $this->get_field_id('popular'); ?>"><?php _e('Popular Posts', 'cmsmasters'); ?></label>
		</p>
		<p>
			<input class="checkbox" type="checkbox" <?php checked($instance['recent'], true); ?> id="<?php echo $this->get_field_id('recent'); ?>" name="<?php echo $this->get_field_name('recent'); ?>" /> 
			<label for="<?php echo $this->get_field_id('recent'); ?>"><?php _e('Recent Comments', 'cmsmasters'); ?></label>
		</p>
        <p>
            <label for="<?php echo $this->get_field_id('number'); ?>"><?php _e("Enter the number of recent comments, popular and latest posts you'd like to display", 'cmsmasters'); ?>:<br /><br />
                <input id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" type="text" value="<?php echo $number; ?>" size="3" />
                <small style="color:#ff0000; float:right; padding-top:5px;"><?php _e('default is', 'cmsmasters'); ?> 3</small><br />
            </label>
        </p>
		<p style="border-top:1px solid #dfdfdf; border-bottom:1px solid #dfdfdf; padding:10px 0; overflow:hidden;">
			<label for="<?php echo $this->get_field_id('widget_width'); ?>">
				<?php _e('Choose the width of widget', 'cmsmasters'); ?>:<br /><br />
                <small style="color:#f00; float:right; padding-top:5px;"><?php _e('Only for horizontal sidebars', 'cmsmasters'); ?></small>
                <select id="<?php echo $this->get_field_id('widget_width'); ?>" name="<?php echo $this->get_field_name('widget_width'); ?>" style="float:left;">
                    <option <?php if ($widget_width == 'one_first') { echo 'selected="selected" '; } ?>value="one_first">-- 1/1 --&nbsp;</option>
                    <option <?php if ($widget_width == 'three_fourth') { echo 'selected="selected" '; } ?>value="three_fourth">-- 3/4 --&nbsp;</option>
                    <option <?php if ($widget_width == 'two_third') { echo 'selected="selected" '; } ?>value="two_third">-- 2/3 --&nbsp;</option>
                    <option <?php if ($widget_width == 'one_half') { echo 'selected="selected" '; } ?>value="one_half">-- 1/2 --&nbsp;</option>
                    <option <?php if ($widget_width == 'one_third') { echo 'selected="selected" '; } ?>value="one_third">-- 1/3 --&nbsp;</option>
                    <option <?php if ($widget_width == 'one_fourth') { echo 'selected="selected" '; } ?>value="one_fourth">-- 1/4 --&nbsp;</option>
                </select>
            </label>
		</p>
        <div style="clear:both;"></div>
        <?php
    }
}


function wp_custom_widgets_init() {
    if (!is_blog_installed()) {
        return;
    }
    
    register_widget('WP_Widget_Custom_Flickr');
    register_widget('WP_Widget_Custom_Twitter');
    register_widget('WP_Widget_Custom_Recent_Comments');
    register_widget('WP_Widget_Custom_Popular_Posts');
    register_widget('WP_Widget_Custom_Latest_Posts');
    register_widget('WP_Widget_Custom_Popular_Portfolio');
    register_widget('WP_Widget_Custom_Recent_Portfolio');
    register_widget('WP_Widget_Custom_Contact_Info');
    register_widget('WP_Widget_Custom_Contact_Form');
    register_widget('WP_Widget_Custom_Advertisement');
    register_widget('WP_Widget_Custom_Video');
    register_widget('WP_Widget_Custom_HTML5_Video');
    register_widget('WP_Widget_Custom_HTML5_Audio');
    register_widget('WP_Widget_Custom_Icon_Text');
    register_widget('WP_Widget_Custom_Divider');
    register_widget('WP_Widget_Custom_Facebook');
	register_widget('WP_Widget_Custom_Colored_Blocks');
	register_widget('WP_Widget_Custom_Testimonials');
	register_widget('WP_Widget_Popular_Latest_Posts_Recent_Comments');
    
    do_action('widgets_init');
}

add_action('init', 'wp_custom_widgets_init', 1);

