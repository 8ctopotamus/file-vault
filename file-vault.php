<?php
/*
  Plugin Name: File Vault
  Plugin URI:  https://zylocod.es
  Description: A login area for users to download common and group-specific files.
  Version:     1.0
  Author:      Zylo, LLC
  Author URI:  https://zylocod.es
  License:     GPL2
  License URI: https://www.gnu.org/licenses/gpl-2.0.html
*/

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

$pluginName = 'File Vault';
$pluginSlug = 'file-vault';

include( plugin_dir_path( __FILE__ ) . 'includes/setup.php');
include( plugin_dir_path( __FILE__ ) . 'includes/acf-custom-fields.php');
include( plugin_dir_path( __FILE__ ) . 'includes/scripts-styles.php');
include( plugin_dir_path( __FILE__ ) . 'includes/load-template.php');

?>
