export default {
  init() {
    // JavaScript to be fired on the Business Unit taxonomy
  },
  finalize() {

    // JavaScript to be fired on the Business Unit taxonomy, after the init JS

    // Scroll to the top when facets are reloaded
        $(document).on('facetwp-loaded', function() {
          $('.facetwp-type-dropdown .facetwp-dropdown').select2({
            theme: "bootstrap",
          });

            $('html, body').animate({
                scrollTop: $('body').offset().top,
            }, 500);

        });

    /*eslint-disable */

        $(document).on('facetwp-loaded', function() {
            $.each(FWP.settings.num_choices, function(key, val) {
                var $parent = $('.facetwp-facet-' + key).closest('.widget');
                (0 === val) ? $parent.hide() : $parent.show();
            });
        });

    /*eslint-enable */


  },
};
