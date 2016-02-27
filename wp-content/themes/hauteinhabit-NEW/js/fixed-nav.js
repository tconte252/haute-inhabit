var  mn = $(".main-menu");
    mns = "main-menu-scrolled";
    hdr = $('header').height();

$(window).scroll(function() {
  if( $(this).scrollTop() > 150 ) {
    mn.addClass(mns);
  } else {
    mn.removeClass(mns);
  }
});

var  nm = $(".search-wrapper");
    nms = "search-menu-scrolled";
    //hdr = $('header').height();

$(window).scroll(function() {
  if( $(this).scrollTop() > 150 ) {
    nm.addClass(nms);
  } else {
    nm.removeClass(nms);
  }
});