export default {
  init() {
    // JavaScript to be fired on the home page
  },
  finalize() {
    jQuery(document).ready(() => $('body').scrollspy({ target: '#product-nav', offset: 200 }));
  },
};
