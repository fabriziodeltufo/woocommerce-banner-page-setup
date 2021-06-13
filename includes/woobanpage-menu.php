<?php
/*
WOO Banner Menu + Form.
*/

// MENU PLUGIN DEFINITION
function woobanpage_settings_page()
{
    add_menu_page(
        __( 'Woocommerce Banner Page Settings', 'woobanpage' ),
        __( 'WooCommerce Banner', 'woobanpage' ),
        'manage_options',
        'woobanpage',
        'woobanpage_settings_page_markup',
        'dashicons-plugins-checked',
        65
    );

}
add_action( 'admin_menu', 'woobanpage_settings_page' );


// FORM PAGE DEFINITION
function woobanpage_settings_page_markup()
{
    // Double check user capabilities
    if ( !current_user_can('manage_options') ) {
      return;
    }
    include( WPPLUGIN_DIR . 'templates/admin/woobanpage-form-page.php');


}


// // Add a link to your settings page in your plugin
// function wpplugin_add_settings_link( $links ) {
//     $settings_link = '<a href="admin.php?page=woobanpage">' . __( 'Settings' ) . '</a>';
//     array_push( $links, $settings_link );
//   	return $links;
// }
// $filter_name = "plugin_action_links_" . plugin_basename( __FILE__ );
// add_filter( $filter_name, 'woobanpage_add_settings_link' );
