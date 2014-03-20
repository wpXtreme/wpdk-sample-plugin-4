/**
 * Description
 *
 * @class           WPDKSamplePreferences
 * @author          =undo= <info@wpxtre.me>
 * @copyright       Copyright (C) 2012- wpXtreme Inc. All Rights Reserved.
 * @date
 * @version         1.0.0
 *
 */

jQuery( function ( $ )
{
  "use strict";

  window.WPDKSamplePreferences = (function ()
  {

    // This object
    var $t = {
      version : '1.0.0',
      init    : _init
    };

    /**
     * Return an instance of WPDKSamplePreferences object
     *
     * @private
     *
     * @return {}
     */
    function _init()
    {
      // Give a focus
      $( '#wpdk-sample-value' ).focus();

      // Before Swipe - this is an alias of 'change'
      /*
      $( '#swipe-second-area' ).on( 'swipe', function (e, knob, enable )
      {
        alert( 'on( "swipe" ) - the state should change in = ' + enable );

        return true;

      } );
      */

      // Before swipe
      $( '#swipe-second-area' ).on( 'change', function (e, knob, enable )
      {
        return confirm( 'on( "change" ) = the state should change in = ' + enable + ' - Are you sure?' );

      } );

      // After swipe
      $( '#swipe-second-area' ).on( 'changed', function (e, knob, enable )
      {
        alert( 'on( "changed" ) = Swipe changed in = ' + enable );
      } );

      // Button to change swipe state
      $( '#button-swipe' ).on( 'click', function() {
        $( '#swipe-second-area' ).swipe( true );

        return false;
      } );

      return $t;
    };

    return _init();

  })();

} );