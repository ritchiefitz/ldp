<?php
/**
 * @package WordPress
 * @subpackage Willbridge
 * @since Willbridge 1.0
 * 
 * Main Theme Functions File
 * Created by CMSMasters
 * 
 */


// CMSMasters Directories
define('CMSMASTERS_THEME', get_template_directory() . '/theme');
define('CMSMASTERS_PAGES', CMSMASTERS_THEME . '/pages');
define('CMSMASTERS_CLASSES', CMSMASTERS_THEME . '/classes');
define('CMSMASTERS_FUNCTIONS', CMSMASTERS_THEME . '/functions');
define('CMSMASTERS_ADMIN', CMSMASTERS_THEME . '/administrator');
define('CMSMASTERS_ADMIN_TMCE', CMSMASTERS_ADMIN . '/tinymce');
define('CMSMASTERS_ADMIN_CSS', get_template_directory_uri() . '/theme/administrator/css');
define('CMSMASTERS_ADMIN_JS', get_template_directory_uri() . '/theme/administrator/js');
define('CMSMASTERS_ADMIN_TINYMCE', get_template_directory_uri() . '/theme/administrator/tinymce');



// Load Theme Local File
$locale = get_locale();

if (is_admin()) {
    load_theme_textdomain('cmsmasters', CMSMASTERS_ADMIN . '/languages');
	
    $locale_file = CMSMASTERS_ADMIN . '/languages/' . $locale . '.php';
} else {
    load_theme_textdomain('cmsmasters', CMSMASTERS_THEME . '/languages');
	
    $locale_file = CMSMASTERS_THEME . '/languages/' . $locale . '.php';
}

if (is_readable($locale_file)) {
    require_once($locale_file);
}



// Load Theme Options
require_once(CMSMASTERS_ADMIN . '/admin-options.php');

// Load Admin Interface
require_once(CMSMASTERS_ADMIN . '/admin-interface.php');

// Load Admin Meta Boxes
require_once(CMSMASTERS_ADMIN . '/post-options.php');

// Load Slider Manager
require_once(CMSMASTERS_ADMIN . '/slider-manager.php'); 

// Load Form Builder
require_once(CMSMASTERS_ADMIN . '/form-builder.php');

// Load Admin Scripts and Styles
require_once(CMSMASTERS_ADMIN . '/admin-scripts.php');

// Load TinyMCE and QuickTag Plugins
require_once(CMSMASTERS_ADMIN_TMCE . '/tinymce-buttons.php');

// Load Theme Functions
require_once(CMSMASTERS_FUNCTIONS . '/theme-functions.php');

// Load Likes
require_once(CMSMASTERS_FUNCTIONS . '/likes.php');

// Load Navigation Select
require_once(CMSMASTERS_CLASSES . '/nav-select.php');

// Load Navigation Description
require_once(CMSMASTERS_CLASSES . '/nav-description.php');

// Load Options from the Database
require_once(CMSMASTERS_CLASSES . '/var.php');

// Load Pagination
require_once(CMSMASTERS_CLASSES . '/wp-pagenavi.php');

// Load Breadcrumbs
require_once(CMSMASTERS_CLASSES . '/breadcrumb.php');

// Load Sidebar Generator Class
require_once(CMSMASTERS_CLASSES . '/sidebar-generator.php');

// Load CMSMasters Portfolio Post Type
require_once(CMSMASTERS_CLASSES . '/portfolio-posttype.php');

// Load Custom CMSMasters Widgets Classes
require_once(CMSMASTERS_CLASSES . '/widgets.php');

// Load Custom Default Widgets Classes
require_once(CMSMASTERS_CLASSES . '/widgets-default.php');

// Load Slider Manager Data Access
require_once(CMSMASTERS_CLASSES . '/slider-manager.php');

// Load Slider Manager Controller
require_once(CMSMASTERS_CLASSES . '/slider-controller.php');

// Load Template Functions
require_once(CMSMASTERS_FUNCTIONS . '/template-functions.php');

// Load Custom Shortcodes
require_once(CMSMASTERS_FUNCTIONS . '/shortcodes.php');

// Load Custom Comments Template
require_once(CMSMASTERS_FUNCTIONS . '/comments.php');


// Create Database Tables Backggounds, Fonts, Icons, Forms, Sliders, Likes & Redirect to Theme Options Page on Theme Activation
if (isset($_GET['activated'])) {
	require_once(CMSMASTERS_FUNCTIONS . '/database-import.php');
}

/**
 * Custom Content Types
 */

add_action('init','ldpshow_custom_type');
function ldpshow_custom_type(){
	register_post_type('ldpshow',
		array(
			 //customize labels
			'labels'=>array(
						'name'=>'Latter-day Profiles',
						'singular'=>'Latter-day Profile',
						'all_items'=>'All Episodes',
						'add_new'=>'Add New Episode',
						'add_new_item'=>'Add New Episode',
						'edit_item'=>'Edit Episode',
						'new_item'=>'New Episode',
						'view_item'=>'View Episode',
						'search_items'=>'Search Episode',
						'not_found'=>'No Episodes Found',
						'not_found_in_trash'=>'No Episodes Found in Trash',
						'parent'=>'Parent Episode',
						'menu_name'=>'Latter-day Profiles',
						),
			'supports'=>array('title','editor','author','thumbnail','trackbacks','custom-fields','revision', 'comments'),
			'public'=>true,
			'rewrite'=>array('slug'=>'ldp','with_front'=>true),
		)
	);
}

/**
*  ldpShow Taxonomies
*     Taxonomy will be called 'Seasons'
*
* @author
* @param
* @return
**/
//Taxonomy Hierarchical
add_action('init','ldpshow_taxonomies');
function ldpshow_taxonomies(){
	register_taxonomy('ldpseason','ldpshow',
		array(
			'hierarchical'=>true,
			'labels'=>array(
						'name'=>'Seasons',
						'singular_name'=>'Season',
						'search_items'=>'Search Seasons',
						'popular_items'=>'Popular Seasons',
						'all_items'=>'All Seasons',
						'parent_item'=>'Parent Season',
						'parent_item_colon'=>'Parent Season',
						'edit_item'=>'Edit Season',
						'update_item'=>'Update Seasons',
						'add_new_item'=>'Add New Seasons',
						'new_item_name'=>'New Seasons',
						)
		)
	);
}

/**
*  DevPress Edit ldpShow Columns
*     Edit the information columns displayed in 'All Episodes'
*
* @author
* @param $columns_ldpshow (information columns)
* @return &columns_ldpshow (updated columns)
**/
//Custom Columns
add_filter( 'manage_edit-ldpshow_columns', 'devpress_edit_ldpshow_columns' ) ;
function devpress_edit_ldpshow_columns( $columns_ldpshow ) {

	$columns_ldpshow = array(
		'cb'=>__('<input type="checkbox" />'),
		'title' => __( 'Title' ),
		'ldpseason' => __( 'Season' ),
		'author'=>__('Author'),
		'date' => __( 'Date' )
	);

	return $columns_ldpshow;
}

/**
*  DevPress Manage ldpShowColumns 
*     Manage the information inside the columns displayed in 'All Episodes'
*
* @author
* @param &column_ldpshow, $post_id (edited columns and current post)
* @return
*/
add_action( 'manage_ldpshow_posts_custom_column', 'devpress_manage_ldpshow_columns', 10, 2 );
function devpress_manage_ldpshow_columns( $column_ldpshow, $post_id ) {
	global $post;
	switch( $column_ldpshow ) {
		/* If displaying the 'seasons' column. */
		case 'ldpseason' :
			/* Get the seasons for the post. */
			$terms_ldpshow = get_the_terms( $post_id, 'ldpseason' );
			/* If terms were found. */
			if ( !empty( $terms_ldpshow ) ) {
				$out = array();
				/* Loop through each term, linking to the 'edit posts' page for the specific term. */
				foreach ( $terms_ldpshow as $term_ldpshow ) {
					$out[] = sprintf( '<a href="%s">%s</a>',
						esc_url( add_query_arg( array( 'post_type' => $post->post_type, 'ldpseason' => $term_ldpshow->slug ), 'edit.php' ) ),
						esc_html( sanitize_term_field( 'name', $term_ldpshow->name, $term_ldpshow->term_id, 'ldpseason', 'display' ) )
					);
				}
				/* Join the terms, separating them with a comma. */
				echo join( ', ', $out );
			}
			/* If no terms were found, output a default message. */
			else {
				_e( 'No Seasons' );
			}
			break;
		/* Just break out of the switch statement for everything else. */
		default :
			break;
	}
}

?>