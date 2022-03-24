// Campaign carousel
$(".main-carousel").owlCarousel({
  loop: true,
  margin: 10,
  nav: false,
  autoplay: true,
  autoplayTimeout: 3000,
  autoplaySpeed: 1000,
  autoplayHoverPause: true,
  responsive: {
    0: {
      items: 1,
    },
    600: {
      items: 1,
    },
    1000: {
      items: 1,
    },
  },
});

// Custom navigation for main carousel
var owl4 = $(".main-carousel");
owl4.owlCarousel();
// Go to the next item
$(".customNextBtnMain").click(function () {
  owl4.trigger("next.owl.carousel");
});
// Go to the previous item
$(".customPrevBtnMain").click(function () {
  // With optional speed parameter
  // Parameters has to be in square bracket '[]'
  owl4.trigger("prev.owl.carousel", [300]);
});

// Campaign carousel
$(".campaigns-carousel").owlCarousel({
  loop: true,
  margin: 10,
  nav: false,
  responsive: {
    0: {
      items: 1,
    },
    600: {
      items: 2,
    },
    1000: {
      items: 3,
    },
  },
});

// Custom navigation for campaigns carousel
var owl = $(".campaigns-carousel");
owl.owlCarousel();
// Go to the next item
$(".customNextBtn").click(function () {
  owl.trigger("next.owl.carousel");
});
// Go to the previous item
$(".customPrevBtn").click(function () {
  // With optional speed parameter
  // Parameters has to be in square bracket '[]'
  owl.trigger("prev.owl.carousel", [300]);
});

$(".gallery").each(function () {
  // the containers for all your galleries
  $(this).magnificPopup({
    delegate: "a", // the selector for gallery item
    type: "image",
    gallery: {
      enabled: true,
    },
    zoom: {
      enabled: true, // By default it's false, so don't forget to enable it

      duration: 300, // duration of the effect, in milliseconds
      easing: "ease-in-out",
      opener: function (openerElement) {
        return openerElement.is("img")
          ? openerElement
          : openerElement.find("img");
      },
    },
  });
});

// Gallery carousel
$(".gallery-carousel").owlCarousel({
  center: true,
  loop: true,
  margin: 10,
  nav: false,
  responsive: {
    0: {
      center: false,
      items: 1,
    },
    600: {
      items: 3,
    },
    1000: {
      items: 3,
    },
  },
});
// Custom navigation for gallery carousel
var owl2 = $(".gallery-carousel");
owl2.owlCarousel();
// Go to the next item
$(".customNextBtnGallery").click(function () {
  owl2.trigger("next.owl.carousel");
});
// Go to the previous item
$(".customPrevBtnGallery").click(function () {
  // With optional speed parameter
  // Parameters has to be in square bracket '[]'
  owl2.trigger("prev.owl.carousel", [300]);
});

// Work carousel
$(".work-carousel").owlCarousel({
  loop: true,
  margin: 10,
  items: 1,
  nav: false,
  responsive: {
    0: {
      items: 1,
    },
    600: {
      items: 1,
    },
    1000: {
      items: 1,
    },
  },
});
// Custom navigation for work carousel
var owl3 = $(".work-carousel");
owl3.owlCarousel();
// Go to the next item
$(".customNextBtnOurWork").click(function () {
  owl3.trigger("next.owl.carousel");
});
// Go to the previous item
$(".customPrevBtnOurWork").click(function () {
  // With optional speed parameter
  // Parameters has to be in square bracket '[]'
  owl3.trigger("prev.owl.carousel", [300]);
});
