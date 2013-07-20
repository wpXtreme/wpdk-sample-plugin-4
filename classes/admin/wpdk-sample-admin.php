<?php
/**
 * This is the main admin class of your plugin. It extends the basic class WPDKWordPressAdmin, that gives you some facilities to handle operation in WordPress administrative
 * area.
 *
 * @class              WPDKSamplePlugin4Admin
 * @author             wpXtreme team
 * @copyright          2013- wpXtreme
 * @date               20130720
 * @version            1.0.0
 *
 */

class WPDKSamplePlugin4Admin extends WPDKWordPressAdmin {

  /**
   * This is the minumun capability required to display admin menu item
   *
   * @brief Menu capability
   */
  const MENU_CAPABILITY = 'manage_options';


  /**
   * Create and return a singleton instance of WPDKSamplePlugin4Admin class
   *
   * @brief Init
   *
   * @param WPDKSamplePlugin4 $plugin The main class of this plugin.
   *
   * @return WPDKSamplePlugin4Admin
   */
  public static function init( $plugin ) {
    static $instance = null;
    if ( is_null( $instance ) ) {
      $instance = new WPDKSamplePlugin4Admin( $plugin );
    }
    return $instance;
  }



  /**
   * Create an instance of WPDKSamplePlugin4Admin class
   *
   * @brief Construct
   *
   * @param WPDKSamplePlugin4 $plugin Main class of your plugin
   *
   * @return WPDKSamplePlugin4Admin
   */
  public function __construct( $plugin ) {

    parent::__construct( $plugin );

  }

  /**
   * Called by WPDKWordPressAdmin parent when the admin head is loaded
   *
   * @brief Admin head
   */
  public function admin_head() {

    // You can enqueue here all the scripts and css styles needed by your plugin, through wp_enqueue_script and wp_enqueue_style functions   */

  }

  /**
   * Called when WordPress is ready to build the admin menu.
   *
   * @brief Admin menu
   */
  public function admin_menu() {

    /* Load my own icon. */
    $icon_menu = $this->plugin->imagesURL . 'logo-16x16.png';

    // Build menu as an array. See documentation of method renderByArray of class WPDKMenu for details
    $menus = array(
      'wpdk_sampleplugin' => array(
        // Menu title shown as first entry in main navigation menu
        'menuTitle'  => __( 'WPDK Plug#4' ),
        // WordPress capability needed to see this menu - if current WordPress user does not have this capability, the menu will be hidden
        'capability' => self::MENU_CAPABILITY,
        // Icon to show in menu - see above
        'icon'       => $icon_menu,
        // Create two submenu item to this main menu
        'subMenus'   => array(

          array(
            // Menu item shown as first submenu in main navigation menu
            'menuTitle'      => __( 'Show Controls' ),
            // The web page title shown when this item is clicked
            'pageTitle'  => __( 'wpdk sample plugin #4 - Show Controls Configuration' ),
            // WordPress capability needed to see this menu item - if current WordPress user does not have this capability, this menu item will be hidden
            'capability' => self::MENU_CAPABILITY,
            // Function called whenever this menu item is clicked
            'viewController' => 'ControlsConfiguration4ViewController',
          ),

          // Add a divider to separate the first submenu item from the second
          WPDKSubMenuDivider::DIVIDER,

          array(
            // Menu item shown as second submenu in main navigation menu
            'menuTitle'      => __( 'Show About' ),
            // The web page title shown when this item is clicked
            'pageTitle'  => __( 'wpdk sample plugin #4 - Show About' ),
            // Function called whenever this menu item is clicked
            'viewController' => 'About4ViewController',
          ),
        )
      )
    );

    // Physically build the menu added to main navigation menu when this plugin is activated
    WPDKMenu::renderByArray( $menus );

  }

}
