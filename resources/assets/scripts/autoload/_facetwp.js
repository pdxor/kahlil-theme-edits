/**
 * FacetWP javascript
 *
 */

 /**
  * Hide empty facets
  */
 /*eslint-disable*/
 $(document).on('facetwp-loaded', function() {
  $.each(FWP.settings.num_choices, function(key, val) {
      var $parent = $('.facetwp-facet-' + key).closest('form');
      (0 === val) ? $parent.hide() : $parent.show();
  });
});
/*eslint-enable*/

/**
* Scroll back to the top when Facet is reloaded
*/
$(document).on('facetwp-loaded', function() {
 $('html, body').animate({
   scrollTop: $('#top').offset().top,
 }, 200);
});


/**
* Sometimes the Resources pager doesn't reload properly when hitting "Refresh" or "Back".
*/
/*eslint-disable*/
$( document ).ready( function() {
 if($('body').hasClass('shortcode-resources')) {
   FWP.refresh()
 }
});
/*eslint-enable*/


/**
* Show a spinner animation when Facet refreshes
*/
$(document).on('facetwp-refresh', function() {
 $('.facetwp-loader').addClass('loading');
 $('.facetwp-template').animate({ opacity: 0 }, 300);
});
$(document).on('facetwp-loaded', function() {
 $('.facetwp-template').animate({ opacity: 1 }, 300);
 $('.facetwp-loader').removeClass('loading');
});
