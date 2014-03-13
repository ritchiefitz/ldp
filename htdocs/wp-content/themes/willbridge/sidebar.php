<?php
/**
 * @package WordPress
 * @subpackage Willbridge
 * @since Willbridge 1.0
 * 
 * Sidebar Template
 * Created by CMSMasters
 * 
 */


if (function_exists('generated_dynamic_sidebar_cmsmasters')) {
    generated_dynamic_sidebar_cmsmasters(1);
} else {
    echo '<aside class="widget widget_search">';
    
    get_search_form();
    
    echo '</aside';
}

?>