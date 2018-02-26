$(document).ready(function() {
  $('.select2').select2({
    placeholder: $(this).data('placeholder'),
  });

  var lightbox = $('.simple-lightbox a').simpleLightbox({
    captions: false,
    showCounter: false
  });
});