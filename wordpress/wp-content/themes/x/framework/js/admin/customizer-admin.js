// =============================================================================
// JS/ADMIN/CUSTOMIZER-ADMIN.JS
// -----------------------------------------------------------------------------
// Customizer admin functionality.
// =============================================================================

// =============================================================================
// TABLE OF CONTENTS
// -----------------------------------------------------------------------------
//   01. Customizer Admin Functionality
// =============================================================================

// Customizer Admin Functionality
// =============================================================================

jQuery(document).ready(function($) {
  $('#customizer-upload').change(function() {
    $('#customizer-submit').removeAttr('disabled');
  });

  $('head').append('<style type="text/css"> @import url("http://fonts.googleapis.com/css?family=Lato:100,300,900"); #x-customizer-preloader { position: fixed; top: 0; left: 0; right: 0; bottom: 0; text-align: center; background-color: #fff; z-index: 9999999; } #x-customizer-preloader #x-customizer-preloader-inner { display: table; position: absolute; top: 50%; left: 50%; width: 450px; margin: -90px 0 0 -225px; background-repeat: no-repeat; background-position: center 155px; background-color: #fff; } #x-customizer-preloader p.status { display: table-cell; vertical-align: middle; position: relative; padding: 0 0 10px; font-family: Lato, "Helvetica Neue", Helvetica, Arial, sans-serif; line-height: 1.1; color: #333; } #x-customizer-preloader p.status span { position: relative; display: block; z-index: 99999999; } #x-customizer-preloader p.status span.loading { margin-left: -2px; font-size: 84px; font-weight: 100; letter-spacing: -2px; text-transform: uppercase; } #x-customizer-preloader p.status span.step { margin-top: 9px; font-size: 18px; font-weight: 300; } #x-customizer-preloader p.status > span.progress { margin-top: 9px; font-weight: 900; } #x-customizer-preloader h1.powered-by { position: absolute; left: 0; right: 0; bottom: 24px; margin-right: -6px; font-size: 14px; font-weight: 300; letter-spacing: 6px; line-height: 1.1; text-transform: uppercase; color: #b5b5b5; } </style>');

  $('a[href="customize.php"], a[href*="customize.php?url="]').click( function(e) {
    $('head').append('<style type="text/css"> body { overflow: hidden !important; } </style>');
    $('body').prepend('<div id="x-customizer-preloader"><div id="x-customizer-preloader-inner"><p class="status"><span class="loading">Loading</span><span class="step">(Step 1 of 2) Initializing X Customizer</span><span class="progress"></span></p></div><h1 class="powered-by">Powered by Theme.co</h1></div>');
    var progress = $('.progress');
    var timesRun = 0;
    var interval = setInterval( function() {
      timesRun += 1;
      if (progress.html().length > 8) {
        progress[0].innerHTML = '';
      } else {
        progress[0].innerHTML += ' . ';
      }
      if (timesRun === 51) { clearInterval(interval); }
    }, 500);
  });
});