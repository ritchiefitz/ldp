<?php
/**
 * @package WordPress
 * @subpackage Willbridge
 * @since Willbridge 1.0
 * 
 * Template Name: Splash
 * Created by CMSMasters
 * 
 */


get_header();

$page_layout = get_post_meta(get_the_ID(), 'page_layout', true);

if (!$page_layout) { 
    $page_layout = 'nobg'; 
}

?>

<?php get_footer(); ?>