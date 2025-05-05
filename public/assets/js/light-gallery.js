(function($) {
  'use strict';
  if ($("#lightgallery").length) {
    $("#lightgallery").lightGallery();
  }

  // if ($("#lightgallery-without-thumb").length) {
  //   $("#lightgallery-without-thumb").lightGallery({
  //     thumbnail: true,
  //     animateThumb: false,
  //     showThumbByDefault: false
  //   });
  // }



  if ($("#lightgallery-without-thumb").length) {
    $("#lightgallery-without-thumb").lightGallery({
      selector: 'a.image-tile',
      thumbnail: true,
      animateThumb: false,
      showThumbByDefault: false
    });
  }

  if ($("#video-gallery").length) {
    $("#video-gallery").lightGallery();
  }
})(jQuery);