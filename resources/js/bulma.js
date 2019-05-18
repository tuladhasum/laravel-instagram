try {
   window.Popper = require('popper.js').default;
   window.$ = window.jQuery = require('jquery');

   require('bootstrap');
} catch (e) {}


$(document).ready(function() {

   // Check for click events on the navbar burger icon
   $(".navbar-burger").click(function() {

      // Toggle the "is-active" class on both the "navbar-burger" and the "navbar-menu"
      $(".navbar-burger").toggleClass("is-active");
      $(".navbar-menu").toggleClass("is-active");

   });
});
