/**
 * @file
 * A JavaScript file for the theme.
 *
 * In order for this JavaScript to be loaded on pages, see the instructions in
 * the README.txt next to this file.
 */

// JavaScript should be made compatible with libraries other than jQuery by
// wrapping it with an "anonymous closure". See:
// - https://drupal.org/node/1446420
// - http://www.adequatelygood.com/2010/3/JavaScript-Module-Pattern-In-Depth
(function ($, Drupal, window, document, undefined) {


// To understand behaviors, see https://drupal.org/node/756722#behaviors
Drupal.behaviors.my_custom_behavior = {
  attach: function(context, settings) {

    // init mainnavigation
    $("body.mobile div#mainnavigation ul").hide();
    $("body div#langnavigation ul").hide();

    (function () {
        var $current = null,
            show,
            hide;

        getMenu = function ($trigger) {
            return $trigger.next();
        };

        show = function ($trigger, $menu) {
            $menu.slideDown(400);
            $trigger.addClass('open');
        };

        hide = function ($trigger, $menu) {
            $menu.slideUp(400);
            $trigger.removeClass('open');
        };

        $('span.openclose').click(
            function (event) {
                event.preventDefault();

                var $trigger = $(this),
                    $menu = getMenu($trigger);

                if ($current !== null) {
                    hide($current, getMenu($current));
                }

                if ($menu.is(':hidden')) {
                    show($trigger, $menu);
                    $current = $trigger;
                } else {
                    hide($trigger, $menu);
                    $current = null;
                }
            }
        );
    }());

  }
};


})(jQuery, Drupal, this, this.document);
