<?php 
/**
 * @package WordPress
 * @subpackage Willbridge
 * @since Willbridge 1.0
 * 
 * Navigation Description
 * Changed by CMSMasters
 * 
 */


class Nav_Description extends Walker_Nav_Menu {
    function start_el(&$output, $item, $depth, $args) {
        $classes = (empty($item->classes)) ? array() : (array) $item->classes;
        
        $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item));
        
        $class_names = (!empty($class_names)) ? ' class="' . esc_attr($class_names) . '"' : '';
        
        $output .= '<li id="menu-item-' . $item->ID . '" ' . $class_names . '>';
        
        $attributes = (!empty($item->attr_title)) ? ' title="'  . esc_attr($item->attr_title) . '"' : '';
        
        $attributes .= (!empty($item->target)) ? ' target="' . esc_attr($item->target) . '"' : '';
        
        $attributes .= (!empty($item->xfn)) ? ' rel="' . esc_attr($item->xfn) . '"' : '';
        
        $attributes .= (!empty($item->url)) ? ' href="' . esc_attr($item->url) . '"' : '';
        
        $description = (!empty($item->description) && $depth == 0) ? '<small style="border-color:#' . esc_attr($item->description) . ';"></small>' : '';
        
        $title = apply_filters('the_title', $item->title, $item->ID);
        
        $item_output = $args->before . '<a ' . $attributes . '>' . $args->link_before . $title . $args->link_after . $description . '</a>' . $args->after;
        
        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
    }
}

?>