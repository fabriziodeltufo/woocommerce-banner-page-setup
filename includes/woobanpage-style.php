<?php
/*
WP Plugin Style
*/

// Load CSS on the backend:admin
function woobanpage_admin_style() {

  wp_enqueue_style('woobanpage-admin-style', WPPLUGIN_URL . 'templates/admin/woobanpage-style.css',[],time() );

}
add_action( 'admin_enqueue_scripts', 'woobanpage_admin_style', 100 );


// Load CSS on the frontend
function woobanpage_style() {

  wp_enqueue_style('woobanpage-style', WPPLUGIN_URL . 'css/woobanpage-style.css',[],time() );

}
add_action( 'wp_enqueue_scripts', 'woobanpage_style', 100 );
