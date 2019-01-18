import stickybits from 'stickybits'

import "../partials/modal-pdf-speedbump.js";
import "../partials/product-smooth-scroll.js";

export default {
  init() {
    // JavaScript to be fired on all pages
  },
  finalize() {

    // Stickybits polyfill and class adding for sticky navbar
    stickybits('.navbar-wrapper', {
      noStyles: true,
      useStickyClasses: true,
    });

    
    // Place the user's cursor in the SDS search field when the collapse is uncollapsed
    $('#SDSTray').on('shown.bs.collapse', function () {
      $("#SDSSearch").focus();
    });

    $('#SDSTray').on('show.bs.collapse', function() {
      $('#navbarSupportedContent').collapse('hide');
    });

    $('#navbarSupportedContent').on('show.bs.collapse', function() {
      $('#SDSTray').collapse('hide');
    });

    // Add .alert-link to links in .alerts
    $('.alert a').addClass('alert-link');

    // MatchHeight all the things
    $('.callout-product .fl-callout-content .card-body').matchHeight({
      byRow: false,
    });
    $('.product-group-img-link').matchHeight();

  },
};
