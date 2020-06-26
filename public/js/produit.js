$(document).ready(function() {
    var $window = $(window);
    var tabwrap = $('#tab-buttons');
    var prefooter = $('#fh5co-footer');
    var prefooter_top = prefooter.offset().top;
    var prefooter_height = prefooter.height();
    var prefooter_bottom = prefooter_top + prefooter_height;
    var info_sec = $('#contents');

    var info_sec_top = info_sec.offset().top;
    //console.log(prefooter_top);
    $window.on('scroll', function() {
      var scrollTop = $window.scrollTop();
      var viewport_height = $(window).height();
      var scrollTop_bottom = scrollTop + viewport_height;
      //console.log(scrollTop_bottom);
      if(scrollTop_bottom >= (prefooter_top + 50) || scrollTop_bottom <= (info_sec_top + 400))
      {
        tabwrap.addClass('d-none');
      }
      else
      {
        tabwrap.removeClass('d-none');
      }
    });
});

