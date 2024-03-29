/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!*****************************************!*\
  !*** ./javascript/customize-preview.js ***!
  \*****************************************/
(function ($, api, _) {
  api('primary_color_50', function (value) {
    value.bind(function (to) {
      document.body.style.setProperty('--primary-color-50', to);
    });
  });
  api('primary_color_100', function (value) {
    value.bind(function (to) {
      document.body.style.setProperty('--primary-color-100', to);
    });
  });
  api('primary_color_200', function (value) {
    value.bind(function (to) {
      document.body.style.setProperty('--primary-color-200', to);
    });
  });
  api('primary_color_300', function (value) {
    value.bind(function (to) {
      document.body.style.setProperty('--primary-color-300', to);
    });
  });
  api('primary_color_400', function (value) {
    value.bind(function (to) {
      document.body.style.setProperty('--primary-color-400', to);
    });
  });
  api('primary_color_500', function (value) {
    value.bind(function (to) {
      document.body.style.setProperty('--primary-color-500', to);
    });
  });
  api('primary_color_600', function (value) {
    value.bind(function (to) {
      document.body.style.setProperty('--primary-color-600', to);
    });
  });
  api('primary_color_700', function (value) {
    value.bind(function (to) {
      document.body.style.setProperty('--primary-color-700', to);
    });
  });
  api('primary_color_800', function (value) {
    value.bind(function (to) {
      document.body.style.setProperty('--primary-color-800', to);
    });
  });
  api('primary_color_900', function (value) {
    value.bind(function (to) {
      document.body.style.setProperty('--primary-color-900', to);
    });
  });
  api('header_button_text', function (value) {
    value.bind(function (to) {
      $('#site-header .header-button a').text(to);
    });
  });
  api('header_button_link', function (value) {
    value.bind(function (to) {
      $('#site-header .header-button a').attr('href', to);
    });
  });
  api('footer_icp_text', function (value) {
    value.bind(function (to) {
      $('#site-footer .icp').text(to);
    });
  });
  api('blog_title', function (value) {
    value.bind(function (to) {
      $('#site-content .archive-header .archive-title').html(to);
    });
  });
  api('blog_slogan', function (value) {
    value.bind(function (to) {
      $('#site-content .archive-header .archive-subtitle').html(to);
    });
  });
})(jQuery, wp.customize, _);
/******/ })()
;