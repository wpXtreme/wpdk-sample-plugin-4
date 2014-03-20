<?php

/**
 * Sample configuration class. In this class you define the model of your tree configuration.
 *
 * @class              ControlsPreferences
 * @author             wpXtreme team
 * @copyright          2013- wpXtreme
 * @date               20130716
 * @version            1.0.0
 */
class ControlsPreferences extends WPDKPreferences {

  /**
   * The configuration name used on database to store data
   *
   * @brief Configuration name
   *
   * @var string
   */
  const PREFERENCES_NAME = 'wpdk-controls-configuration';

  /**
   * Your own configuration property
   *
   * @brief Configuration version
   *
   * @var string $version
   */
  public $version = WPDK_SAMPLE_VERSION;

  /**
   * This is the pointer to your own tree configuration
   *
   * @brief Settings
   *
   * @var ControlsPreferencesSettingsBranch $settings
   */
  public $settings;

  /**
   * Return an instance of PreferencesModel class from the database or onfly.
   *
   * @brief Init
   *
   * @return PreferencesModel
   */
  public static function init()
  {
    return parent::init( self::PREFERENCES_NAME, __CLASS__, WPDK_SAMPLE_VERSION );
  }


  /**
   * Set the default preferences
   *
   * @brief Default preferences
   */
  public function defaults()
  {
    $this->settings = new ControlsPreferencesSettingsBranch();
  }

}

/**
 * Insert here all properties/configuration for your plugin settings
 *
 * @class ControlsPreferencesSettingsBranch
 *
 */
class ControlsPreferencesSettingsBranch extends WPDKPreferencesBranch {

  // You can define your comodity constants
  const MY_VALUE = 'wpdk-sample-value';

  /*
   * Preferences branch properties: this is the model that the view controller of configuration will handle,
   * in order to load and store properties.
   * Any value is related to a WPDK graphic control shown through ControlsPreferencesView class
   */
  public $value_text_box;
  public $value_check_box;
  public $value_combo_box;
  public $value_swipe;

  /**
   * Set the default preferences
   *
   * @brief Default preferences
   */
  public function defaults()
  {
    $this->value_text_box  = '';
    $this->value_check_box = '';
    $this->value_combo_box = '';
    $this->value_swipe     = '';
  }

  /**
   * Update this branch
   *
   * @brief Update
   */
  public function update()
  {
    // Update and sanitize from post data

    $this->value_text_box  = absint( $_POST[ self::MY_VALUE ] ); // note the constant in view
    $this->value_check_box = 'value_check_box';
    $this->value_combo_box = 'value_combo_box';
    $this->value_swipe     = 'value_swipe';

  }
}
