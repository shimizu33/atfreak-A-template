(function() {
  $(function() {
    var sp_break, window_width;
    sp_break = 640;
    window_width = $(window).width();
    $(window).on('resize', function() {
      return window_width = $(window).width();
    });
    $('a[href^="tel:"]').on('click', function() {
      if (window_width > sp_break) {
        return false;
      }
    });
    return $('a[href^="#"]' + 'a:not([data-role="switch"])').on('click', function() {
      var href, position, speed, target;
      speed = 500;
      href = $(this).attr('href');
      target = $(href === "#" || (href === "" ? 'html' : href));
      position = href === '#site_header' ? 0 : target.offset().top;
      $('body,html').animate({
        scrollTop: position
      }, speed, 'swing');
      return false;
    });
  });

}).call(this);
