<?php

/**
 * @class           AboutViewController
 * @author          wpXtreme team
 * @copyright       Copyright (C) 2013 wpXtreme Inc. All Rights Reserved.
 * @date            2013-07-11
 * @version         1.0.0
 *
 */
class AboutViewController extends WPDKViewController {

  /**
   * Create an instance of AboutViewController class
   *
   * @brief Construct
   *
   * @return AboutViewController
   */
  public function __construct()
  {
    // Build the container, with default header
    parent::__construct( 'my-view-controller', 'WPDK Sample Plugin #4 - Output of second view controller' );
  }

  public function display()
  {

    // call parent display to build default page structure
    parent::display();

    // show custom content
    ?>
    <h3>View Controller ID: <?php echo $this->id ?></h3>
    <div>This is a generic content of second view controller.</div>
  <?php
  }

}