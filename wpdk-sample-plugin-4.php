<?php

/**
 * Plugin Name:     WPDK Sample Plugin #4
 * Plugin URI:      http://wpdk.io
 * Description:     Sample #4 of WordPress plugin developed with WPDK framework - see readme.md in plugin root directory for details
 * Version:         1.0.0
 * Author:          wpXtreme
 * Author URI:      https://wpxtre.me
 * Text Domain:     wpdk-sample-plugin-4
 * Domain Path:     localization
 */

// Include WPDK framework - the root directory name of WPDK may be different.
// Please change the line below according to your environment.
if ( file_exists( trailingslashit( dirname( dirname( __FILE__ ) ) ) . 'wpxtreme/wpdk/wpdk.php' ) ) {
  require_once( trailingslashit( dirname( dirname( __FILE__ ) ) ) . 'wpxtreme/wpdk/wpdk.php' );
} else {
  require_once( 'wpdk/wpdk.php' );
}


/**
 * WPDKSamplePlugin is the main class of this plugin, and extends WPDKWordPressPlugin
 *
 * @class              WPDKSamplePlugin
 * @author             wpXtreme team
 * @copyright          Copyright (C) __WPXGENESI_PLUGIN_AUTHOR__.
 * @date               2013-07-20
 * @version            1.0.0
 *
 */
final class WPDKSamplePlugin extends WPDKWordPressPlugin {

  /**
   * Create an instance of WPDKSamplePlugin class
   *
   * @brief Construct
   *
   * @param string $file The main file of this plugin. Usually __FILE__
   *
   * @return WPDKSamplePlugin object instance
   */
  public function __construct( $file )
  {
    // Parent
    parent::__construct( $file );

    // Build my own internal defines
    $this->defines();

    // Include and parse internal classes of this plugin - basic usage, no WPDK autoloading technology
    require_once( plugin_dir_path( __FILE__ ) . 'classes/admin/wpdk-sample-admin.php' );
    require_once( plugin_dir_path( __FILE__ ) . 'classes/about/wpdk-sample-about-viewcontroller.php' );
    require_once( plugin_dir_path( __FILE__ ) . 'classes/preferences/wpdk-sample-preferences.php' );
    require_once( plugin_dir_path( __FILE__ ) . 'classes/preferences/wpdk-sample-preferences-viewcontroller.php' );

  }

  /**
   * Include the external defines file
   *
   * @brief Defines
   */
  private function defines()
  {
    require_once( 'defines.php' );
  }

  /**
   * Catch for activation. This method is called one shot.
   *
   * @brief Activation
   */
  public function activation()
  {
    // Override
  }

  /**
   * Catch for admin
   *
   * @brief Admin backend
   */
  public function admin()
  {
    WPDKSamplePluginAdmin::init( $this );
  }

  /**
   * Ready to init plugin configuration
   *
   * @brief Init configuration
   */
  public function preferences()
  {
    ControlsPreferences::init();
  }

  /**
   * Catch for deactivation. This method is called when the plugin is deactivate.
   *
   * @brief Deactivation
   */
  public function deactivation()
  {
    // Override
  }

}

// Set an instance of your plugin in order to make it ready to user activation and deactivation
$GLOBALS['WPDKSamplePlugin'] = new WPDKSamplePlugin( __FILE__ );
