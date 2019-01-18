/** import external dependencies */
import 'jquery';
import 'select2';
import 'jquery-match-height';

// Import everything from autoload
import "./autoload/**/*"


/** import local dependencies */
import Router from './util/Router';
import common from './routes/common';
import home from './routes/home';
import aboutUs from './routes/about';
import single from './routes/single';
import singleProduct from './routes/single-product';

/**
 * Populate Router instance with DOM routes
 * @type {Router} routes - An instance of our router
 */
const routes = new Router({
  /** All pages */
  common,
  /** Home page */
  home,
  /** Home page */
  single,
  /** Product Single */
  singleProduct,
  /** About Us page, note the change from about-us to aboutUs. */
  aboutUs,
});

/** Load Events */
jQuery(document).ready(() => routes.loadEvents());
