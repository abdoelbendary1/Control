(function ($) {
  "use strict";
  var fullHeight = function () {
      $(".js-fullheight").css("height", $(window).height());
      $(window).resize(function () {
          $(".js-fullheight").css("height", $(window).height());
      });
  };
  fullHeight();
  $("#sidebarCollapse").on("click", function () {
      $("#sidebar").toggleClass("active");
  });
})(jQuery);


// Get the element to be scrolled
const element = document.querySelector('#scrollable');

// Set the height of the scrollbar to match the element height
const scrollbarHeight = element.clientHeight / element.scrollHeight * element.clientHeight;
document.documentElement.style.setProperty('--scrollbar-height', `${scrollbarHeight}px`);

// Add a scroll event listener to the element
element.addEventListener('scroll', function() {
  const scrollTop = element.scrollTop;
  const maxScrollTop = element.scrollHeight - element.clientHeight;
  const scrollbarHeight = element.clientHeight / element.scrollHeight * element.clientHeight;
  const scrollPercent = (scrollTop / maxScrollTop) * 100;
  const thumbPosition = scrollPercent * (element.clientHeight - scrollbarHeight) / 100;
  document.documentElement.style.setProperty('--thumb-position', `${thumbPosition}px`);
});
