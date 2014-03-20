<?php

/**
 * @class           ControlsPreferencesViewController
 * @author          wpXtreme team
 * @copyright       Copyright (C) 2013 wpXtreme Inc. All Rights Reserved.
 * @date            2013-07-15
 * @version         1.0.0
 *
 */
class ControlsPreferencesViewController extends WPDKPreferencesViewController {

  /**
   * Return a singleton instance of WPXBannerizePreferencesViewController class
   *
   * @brief Singleton
   *
   * @return WPXBannerizePreferencesViewController
   */
  public static function init()
  {
    static $instance = null;
    if ( is_null( $instance ) ) {
      $instance = new self();
    }

    return $instance;
  }

  /**
   * Create an instance of ControlsPreferencesViewController class
   *
   * @brief Construct
   *
   * @return ControlsPreferencesViewController
   */
  public function __construct()
  {
    // Create the single view for each tab
    $settings_view = new ControlsPreferencesView();

    // Create each single tab
    $tabs = array(
      new WPDKjQueryTab( $settings_view->id, __( 'This is the main view of plugin, with configuration loading and recording' ), $settings_view->html() ),
    );

    parent::__construct( ControlsPreferences::init(), __( 'Graphic Controls View + configuration recording' ), $tabs );

  }

  /**
   * This static method is called when the head of this view controller is loaded by WordPress.
   * It is used by WPDKMenu for example, as 'admin_head-' action.
   *
   * @brief Head
   */
  public function admin_head()
  {
    // Enqueue pre-register WPDK components
    WPDKUIComponents::init()->enqueue( WPDKUIComponents::CONTROLS, WPDKUIComponents::TOOLTIP );

    // Enqueue your own styles and scripts
    wp_enqueue_script( 'wpdk-sample-preferences', WPDK_SAMPLE_URL_JAVASCRIPT . 'wpdk-sample-preferences.js', array(), WPDK_SAMPLE_VERSION );
  }

}

/**
 * This class is a custom WPDKView that embeds the display of all WPDK available graphic controls, and handling of related configuration
 *
 * @class           ControlsPreferencesView
 * @author          wpXtreme team
 * @copyright       Copyright (C) 2013 wpXtreme Inc. All Rights Reserved.
 * @date            2013-07-15
 * @version         1.0.0
 *
 */
class ControlsPreferencesView extends WPDKPreferencesView {

  /**
   * Create an instance of ControlsPreferencesView class
   *
   * @brief Construct
   *
   * @return ControlsPreferencesView
   */
  public function __construct()
  {

    // Get preferences model 
    $preferences = ControlsPreferences::init();

    // Build the default view structure of this specialized view
    parent::__construct( $preferences, 'settings' );

  }

  /**
   * This method generates all the available WPDK graphic controls, according to CLA: a WPDK internal syntax to create and display graphic controls in a view.
   *
   * @brief Construct
   *
   * @param ControlsPreferencesSettingsBranch $settings
   *
   * @return array $fields - The array of graphic controls to show in this view
   */
  function fields( $settings )
  {

    // Build WPDK graphic controls related to configuration data
    $fields = array(

      'First area'  => array(

        'This area contains only a input text box - Insert here a short description of this area, in terms of controls that it owns, or whatever you want',

        array(
          array(
            'type'  => WPDKUIControlType::TEXT,
            'name'  => ControlsPreferencesSettingsBranch::MY_VALUE,
            'label' => 'A text box',
            'title' => 'I am a tooltip for control WPDKUIControlType::TEXT',
            'value' => $settings->value_text_box
          ),
        ),

      ),

      'Second Area' => array(
        'This area contains a subset of other <em>WPDK graphic controls</em> - Insert here a short description of this area, in terms of controls that it owns, or whatever you want',
        array(
          array(
            'type'    => WPDKUIControlType::CHECKBOX,
            'name'    => 'checkbox_second_area',
            'id'      => 'checkbox_second_area',
            'label'   => 'Check me',
            'value'   => 'is_checked',
            'checked' => $settings->value_check_box
          )
        ),
        array(
          array(
            'type'    => WPDKUIControlType::SELECT,
            'id'      => 'combo_second_area',
            'label'   => 'Select an item',
            'name'    => 'combo_second_area',
            'options' => array(
              'one'   => 'Rome',
              'two'   => 'Milan',
              'three' => 'Paris'
            ),
            'value'   => $settings->value_combo_box
          ),

        ),

        'This is an <strong>amazing swipe control!</strong>',

        array(
          array(
            'type'  => WPDKUIControlType::SWIPE,
            'id'    => 'swipe-second-area',
            'name'  => 'swipe-second-area',
            'label' => 'Swipe me',
            'title' => 'Swipe me to display an alert',
            'value' => $settings->value_swipe
          ),
          array(
            'type'    => WPDKUIControlType::BUTTON,
            'content' => 'Change the state of swipe',
            'name'    => 'button-swipe'
          )
        )
      )
    );

    return $fields;

  }
}
