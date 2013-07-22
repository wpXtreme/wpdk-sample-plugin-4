<?php
/**
 * @class           ControlsConfiguration4ViewController
 * @author          wpXtreme team
 * @copyright       Copyright (C) 2013 wpXtreme Inc. All Rights Reserved.
 * @date            2013-07-15
 * @version         1.0.0
 *
 */
class ControlsConfiguration4ViewController extends WPDKViewController {

  /**
   * Create an instance of ControlsConfiguration4ViewController class
   *
   * @brief Construct
   *
   * @return ControlsConfiguration4ViewController
   */
  public function __construct()  {

    // Build the container view, with header title
    parent::__construct( 'controls-view-controller-4', 'This is the main view of plugin, with configuration loading and recording' );

    // Create a specialized WPDKView that embeds all WPDK graphic controls and configuration
    $controls_view = new ControlsConfiguration4View( 'Graphic Controls View + configuration recording' );

    // Add this specialized WPDKView to this ViewController
    $this->view->addSubview( $controls_view );

  }

}

/**
 * This class is a custom WPDKView that embeds the display of all WPDK available graphic controls, and handling of related configuration
 *
 * @class           ControlsConfiguration4View
 * @author          wpXtreme team
 * @copyright       Copyright (C) 2013 wpXtreme Inc. All Rights Reserved.
 * @date            2013-07-15
 * @version         1.0.0
 *
 */
class ControlsConfiguration4View extends WPDKConfigurationView {

  /**
   * Create an instance of ControlsConfiguration4View class
   *
   * @brief Construct
   *
   * @return ControlsConfiguration4View
   */
  public function __construct() {

    /* Get configuration data from model */
    $configuration = ControlsConfiguration4::init();

    // Build the default view structure of this specialized view
    parent::__construct( 'General settings', __( 'General settings'), $configuration );

  }

  /**
   * This method generates all the available WPDK graphic controls, according to CLA: a WPDK internal syntax to create and display graphic controls in a view.
   *
   * @brief Construct
   *
   * @return array $fields - The array of graphic controls to show in this view
   */
  function fields() {

    /* Get configuration data from model */
    $configuration = ControlsConfiguration4::init();

    /* Build WPDK graphic controls related to configuration data */
    $fields = array(

      'First area' => array(

        'This area contains only a input text box - Insert here a short description of this area, in terms of controls that it owns, or whatever you want',

        array(
          array(
            'type'  => WPDKUIControlType::TEXT,
            'name'  => 'input_text_box_1',
            'label' => 'A text box',
            'title' => 'I am a tooltip for control WPDKUIControlType::TEXT',
            'value' => $configuration->settings->value_text_box
          ),
        ),

      ),

      'Second Area' => array(
        'This area contains a subset of other <em>WPDK graphic controls</em> - Insert here a short description of this area, in terms of controls that it owns, or whatever you want',
        array(
          array(
            'type'  => WPDKUIControlType::CHECKBOX,
            'name'  => 'checkbox_second_area',
            'id'  => 'checkbox_second_area',
            'label' => 'Check me',
            'value' => 'is_checked',
            'checked' => $configuration->settings->value_check_box
          )
        ),
        array(
          array(
            'type'    => WPDKUIControlType::SELECT,
            'id'  => 'combo_second_area',
            'label'   => 'Select an item',
            'name'  => 'combo_second_area',
            'options' => array(
              'one'   => 'Rome',
              'two'   => 'Milan',
              'three' => 'Paris'
            ),
            'value'   => $configuration->settings->value_combo_box
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
            'value' => $configuration->settings->value_swipe
          )
        )
      )
    );

    return $fields;

  }

  // -----------------------------------------------------------------------------------------------------------------
  // Configuration actions
  // -----------------------------------------------------------------------------------------------------------------

  /**
   * Process the 'Update' request
   *
   * @brief Process the 'Update' request
   *
   * @return bool TRUE to update the configuration and display the standard sucessfully message, or FALSE to avoid
   * the update configuration and show a custom display.
   */
  public function updatePostData() {

    /* Get configuration data from model */
    $configuration = ControlsConfiguration4::init();

    // Update configuration
    // NOTE: you can insert here any type of low level check of data incoming from $_POST array
    $configuration->settings->value_text_box  = $_POST['input_text_box_1'];

    if( isset( $_POST['checkbox_second_area'] )) {
      $configuration->settings->value_check_box = $_POST['checkbox_second_area'];
    }
    else {
      $configuration->settings->value_check_box = '';
    }

    $configuration->settings->value_combo_box = $_POST['combo_second_area'];

    $configuration->settings->value_swipe     = $_POST['swipe-second-area'];

    return true;

  }

  /**
   * Process the 'Reset to default' request
   *
   * @brief Process the 'Reset to default' request
   *
   * @return bool TRUE
   */
  public function resetToDefault() {

    /* Get configuration data from model */
    $configuration = ControlsConfiguration4::init();

    /* Reset all data to default */
    $configuration->settings->resetToDefault();

    /* Save the default configuration */
    $configuration->update();

    return TRUE;

  }

}

/**
 * @class           About4ViewController
 * @author          wpXtreme team
 * @copyright       Copyright (C) 2013 wpXtreme Inc. All Rights Reserved.
 * @date            2013-07-11
 * @version         1.0.0
 *
 */
class About4ViewController extends WPDKViewController {

  /**
   * Create an instance of AboutViewController class
   *
   * @brief Construct
   *
   * @return AboutViewController
   */
  public function __construct() {
    // Build the container, with default header
    parent::__construct( 'my-view-controller-4', 'WPDK Sample Plugin #4 - Output of second view controller' );
  }

  public function display() {

    // call parent display to build default page structure
    parent::display();

    // show custom content
?>
    <h3>View Controller ID: <?php echo $this->id ?></h3>
    <div>This is a generic content of second view controller.</div>
<?php
  }

}
