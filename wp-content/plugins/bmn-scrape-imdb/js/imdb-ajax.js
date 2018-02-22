jQuery(document).ready(function($) {
  $('body').on('click', '#scrape-imdb', function (e) {
    e.preventDefault();
    var $me = $(this),
      action = 'imdb_ajax_action';

    var data = $.extend(true, $me.data(), {
      action: action,
      form_data: $('#post').serializeArray()
    });

    $.post(ajaxurl, data, function (response) {
      if (response == '0' || response == '-1'){
        console.error('IMDb AJAX error');
        console.log(response);
      } else {
        // TODO: Do stuff with your response
        console.log('AJAX successful');
        console.log($.parseJSON(response));

        var movie_data = $.parseJSON(response);

        $("div[data-name='year']").find('input').val(movie_data.year);
        $("div[data-name='synopsis']").find('textarea').val(movie_data.synopsis);
        $("div[data-name='director']").find('input').val(movie_data.director);
        $("div[data-name='runtime']").find('input').val(movie_data.runtime);
        $("div[data-name='imdb_rating']").find('input').val(movie_data.rating);
      }
    });
  })
});