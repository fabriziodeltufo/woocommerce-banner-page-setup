<?php
/*
WOO Banner Settings Page
*/

function woobanpage_settings() {

  // If plugin settings don't exist, then create them
  if( !get_option( 'woobanpage_settings' ) ) {
      add_option( 'woobanpage_settings' );
  }

  // Define (at least) one section for our fields
  add_settings_section(
    // Unique identifier for the section
    'woobanpage_settings_section',
    // Section Title
    __( 'Frontside Banner Section', 'woobanpage' ),
    // Callback for an optional description
    'woobanpage_settings_section_callback',
    // Admin page to add section to
    'woobanpage'
  );

  add_settings_field(
    // Unique identifier for field
    'woobanpage_settings_custom_text',
    // Field Title
    __( 'Custom Text', 'woobanpage'),
    // Callback for field markup
    'woobanpage_settings_custom_text_callback',
    // Page to go on
    'woobanpage',
    // Section to go in
    'woobanpage_settings_section'
  );

  register_setting(
    'woobanpage_settings',
    'woobanpage_settings'
  );

}
add_action( 'admin_init', 'woobanpage_settings' );


function woobanpage_settings_section_callback() {

  esc_html_e( 'Insert the frontside message', 'woobanpage' );

}


function woobanpage_settings_custom_text_callback() {

  $options = get_option( 'woobanpage_settings' );

	$custom_text = '';
	if( isset( $options[ 'custom_text' ] ) ) {
		$custom_text = esc_html( $options['custom_text'] );
	}

  echo '<input type="text" id="woobanpage_customtext" name="woobanpage_settings[custom_text]" value="' . $custom_text . '" />';

}

function woobanpage_display_banner()
{

  $options = get_option( 'woobanpage_settings' );

  $custom_text = '';

    if( isset( $options[ 'custom_text' ] ) )
    {
      $custom_text = esc_html( $options['custom_text'] );
    }

    if( is_front_page() )
    {
      ?>
          <div class="header-banner"><?php esc_html_e($custom_text); ?></div>
      <?php
    }

};
add_action('wp_head', 'woobanpage_display_banner');
