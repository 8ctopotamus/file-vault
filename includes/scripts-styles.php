<?php
/*
 * Load scripts and styles
 */
function file_vault_register_scripts_and_styles() {
	global $pluginSlug;
	wp_enqueue_style( $pluginSlug . '-style', plugins_url( '/css/styles.css',  __DIR__ ));
}
add_action('wp_enqueue_scripts', 'file_vault_register_scripts_and_styles');

?>
