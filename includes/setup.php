<?php
/*
 * Add 'lost password?' link to login form
 */
add_action( 'login_form_middle', 'add_lost_password_link' );
function add_lost_password_link() {
	return '<a href="/wp-login.php?action=lostpassword">Lost Password?</a>';
}

/*
 * Make sure that ACF is installed and activated
 */
if( !class_exists('acf') || !function_exists( 'the_field') ) {
	add_action( 'admin_notices', function() {
		global $pluginName;
		global $pluginSlug;
		?>
			<div class="update-nag notice">
			  <p><?php _e( '<strong>' . $pluginName . ' plugin:</strong> Please install the <a href="https://www.advancedcustomfields.com/" target="_blank">Advanced Custom Fields PRO</a>. It is required for this plugin to work properly.', $pluginSlug ); ?></p>
			</div>
		<?php
	} );
	return;
}

/*
 * Make sure that a page with the slug "meyer-member-area" exists.
 */
$page = get_page_by_path( $pluginSlug );
if (!$page) {
	add_action( 'admin_notices', function() {
		global $pluginName;
		global $pluginSlug;
		?>
			<div class="update-nag notice">
			  <p><?php _e( '<strong>' . $pluginName . ' plugin:</strong> You need to create a page with the permalink: <strong>' . $pluginSlug . '</strong>.', $pluginSlug ); ?></p>
			</div>
		<?php
	} );
	return;
}

/*
 * Add the options page
 */
if( function_exists('acf_add_options_page') ) {
	global $pluginName;
	global $pluginSlug;
	acf_add_options_page(array(
		'page_title' 	=> $pluginName,
		'menu_title'	=> $pluginName,
		'menu_slug' 	=> $pluginSlug . '-groups-files'
	));
}

/*
 * Get group names from Company Names textarea
 * and dynamically populates select fields
 */
function acf_load_group_field_choices( $field ) {
  // reset choices
  $field['select_group_access'] = array();
  // get the textarea value from options page without any formatting
  $choices = get_field('group_names', 'option', false);
  // explode the value so that each line is a new array piece
  $choices = explode("\n", $choices);
  // remove any unwanted white space
  $choices = array_map('trim', $choices);
  // loop through array and add to field 'choices'
  if( is_array($choices) ) {
    foreach( $choices as $choice ) {
      $field['choices'][ $choice ] = $choice;
    }
  }
  // return the field
  return $field;
}

// add Group Names to select_group_name in Group-Specific Files Repeater field
add_filter('acf/load_field/name=select_group_access', 'acf_load_group_field_choices');
// add Group Names to group_access in User File Access
add_filter('acf/load_field/name=group_access', 'acf_load_group_field_choices');

?>
