<?php
/**
 * Plugin Name:     WPDK Sample Plugin #4
 * Plugin URI:      https://wpxtre.me
 * Description:     Sample #4 of WordPress plugin developed with WPDK framework - see readme.md in plugin root directory for details
 * Version:         1.0.0
 * Author:          wpXtreme
 * Author URI:      https://wpxtre.me
 * Text Domain:     wpdk-sample-plugin-4
 * Domain Path:     localization
 */

// Include WPDK framework - the root directory name of WPDK may be different.
// Please change the line below according to your environment.
require_once( trailingslashit( dirname( dirname( __FILE__ ))) . 'wpdk-production/wpdk.php' );

/**
 * WPDKSamplePlugin4 is the main class of this plugin, and extends WPDKWordPressPlugin
 *
 * @class              WPDKSamplePlugin4
 * @author             wpXtreme team
 * @copyright          Copyright (C) __WPXGENESI_PLUGIN_AUTHOR__.
 * @date               2013-07-20
 * @version            1.0.0
 *
 */
final class WPDKSamplePlugin4 extends WPDKWordPressPlugin {

  /**
   * Create an instance of WPDKSamplePlugin4 class
   *
   * @brief Construct
   *
   * @param string $file The main file of this plugin. Usually __FILE__
   *
   * @return WPDKSamplePlugin4 object instance
   */
  public function __construct( $file ) {

    parent::__construct( $file );

    // Build my own internal defines
    $this->defines();

    // Include and parse internal classes of this plugin - basic usage, no WPDK autoloading technology
    require_once( plugin_dir_path( __FILE__ ) . 'classes/config/wpdk-sample-configuration.php' );
    require_once( plugin_dir_path( __FILE__ ) . 'classes/config/wpdk-sample-configuration-vc.php' );
    require_once( plugin_dir_path( __FILE__ ) . 'classes/admin/wpdk-sample-admin.php' );

  }

  /**
   * Include the external defines file
   *
   * @brief Defines
   */
  private function defines() {
    include_once( 'defines.php' );
  }

  /**
   * Catch for activation. This method is called one shot.
   *
   * @brief Activation
   */
  public function activation() {
  }

  /**
   * Catch for admin
   *
   * @brief Admin backend
   */
  public function admin() {
    WPDKSamplePlugin4Admin::init( $this );
  }

  /**
   * Ready to init plugin configuration
   *
   * @brief Init configuration
   */
  public function configuration() {
    ControlsConfiguration4::init();
  }

  /**
   * Catch for deactivation. This method is called when the plugin is deactivate.
   *
   * @brief Deactivation
   */
  public function deactivation() {
    /** To override. */
  }

}

// Set an instance of your plugin in order to make it ready to user activation and deactivation
$GLOBALS['WPDKSamplePlugin4'] = new WPDKSamplePlugin4( __FILE__ );
