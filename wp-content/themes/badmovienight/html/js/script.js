$(function () {
  var request;

  $('#employment_form').submit(function (event) {
    event.preventDefault();

    if (request) {
      request.abort();
    }

    var $form = $(this);
    var $inputs = $form.find('input, select, button');
    var $resultsArea = $('.form-result');

    var serializedData = $form.serialize();

    $inputs.prop('disabled', true);
    $resultsArea.hide();

    request = $.ajax({
      url: '/form_process.php',
      type: 'post',
      data: serializedData
    });

    request.done(function (response, textStatus, jqXHR) {
      $resultsArea.html(response).slideDown(200, function () {
        $('html, body').animate({
          scrollTop: $resultsArea.offset().top
        }, 200);
      });
    });

    request.fail(function (jqXHR, textStatus, errorThrown) {
      console.error('The following error occurred: ' + textStatus, errorThrown);
    });

    request.always(function () {
      $inputs.prop('disabled', false);
    });
  });
});