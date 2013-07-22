<?php
/**
 * Sample configuration class. In this class you define the model of your tree configuration.
 *
 * @class              ControlsConfiguration
 * @author             wpXtreme team
 * @copyright          2013- wpXtreme
 * @date               20130716
 * @version            1.0.0
 */

class ControlsConfiguration4 extends WPDKConfiguration {

    /**
     * The configuration name used on database to store data
     *
     * @brief Configuration name
     *
     * @var string
     */
    const CONFIGURATION_NAME = 'wpdk-controls-configuration-4';

    /**
     * Your own configuration property
     *
     * @brief Configuration version
     *
     * @var string $version
     */
    public $version = '1.0.0';

    /**
     * This is the pointer to your own tree configuration
     *
     * @brief Settings
     *
     * @var ControlsSettings $settings
     */
    public $settings;

    /**
     * Return an instance of ControlsConfiguration class from the database or onfly.
     *
     * @brief Get the configuration
     *
     * @return ControlsConfiguration
     */
    public static function init() {

        $instance = parent::init( self::CONFIGURATION_NAME, __CLASS__ );

        /* Or if the onfly version is different from stored version. */
        if( version_compare( $instance->version, '1.0.0' ) < 0 ) {
            /* For i.e. you would like update the version property. */
            $instance->version = '1.0.0';
            $instance->update();
        }

        return $instance;
    }

    /**
     * Create an instance of ControlsConfiguration class
     *
     * @brief Construct
     *
     * @return ControlsConfiguration
     */
    public function __construct() {

        parent::__construct( self::CONFIGURATION_NAME );

        /* Init my tree settings. */
        $this->settings = new ControlsSettings4();

    }

}

/**
 * Insert here all properties/configuration for your plugin settings
 *
 * @class ControlsSettings4
 *
 */
class ControlsSettings4 {

    /* Configuration properties: this is the model that the view controller of configuration will handle,
       in order to load and store properties. Any value is related to a WPDK graphic control shown through ControlsConfigurationView class  */
    public $value_text_box;
    public $value_check_box;
    public $value_combo_box;
    public $value_swipe;

    /**
     * Create an instance of ControlsSettings4 class.
     * The constructor set the default values
     *
     * @brief Construct
     *
     * @return ControlsSettings4
     */
    public function __construct() {
        $this->resetToDefault();
    }

    /**
     * Optional. You can implement this method to reset to default value
     *
     * @brief Reset to default values
     */
    public function resetToDefault() {
        $this->value_text_box   = '';
        $this->value_check_box  = '';
        $this->value_combo_box  = '';
        $this->value_swipe      = '';
    }
}
