<?php
// Load file vault template
function file_vault_load_template( $page_template ) {
  if ( is_page( $pluginSlug ) ) {
    $page_template = dirname( __DIR__ ) . '/templates/file-vault-template.php';
  }
  return $page_template;
}
add_filter( 'page_template', 'file_vault_load_template' );
?>
