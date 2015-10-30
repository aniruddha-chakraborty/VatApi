//jQuery to collapse the navbar on scroll
$(window).scroll(function() {
    if ($(".navbar").offset().top > 50) {
        $(".navbar-fixed-top").addClass("top-nav-collapse");
    } else {
        $(".navbar-fixed-top").removeClass("top-nav-collapse");
    }
});

//jQuery for page scrolling feature - requires jQuery Easing plugin
$(function() {
    $('a.page-scroll').bind('click', function(event) {
        var $anchor = $(this);
        $('html, body').stop().animate({
            scrollTop: $($anchor.attr('href')).offset().top
        }, 1500, 'easeInOutExpo');
        event.preventDefault();
    });
});
$('nav li a').on("click", function(){
    $('nav li a').removeClass('active');
    $(this).addClass('active');
})
//highlight navigation
  $(window).scroll(function() {
    var topoffset = 200;
    var windowpos = $(window).scrollTop() + topoffset;
    $('nav li a').removeClass('active');

    if (windowpos > $('#js').offset().top) {
      $('nav li a').removeClass('active');
      $('a[href$="#js"]').addClass('active');
    } //windowpos

    if (windowpos > $('#getting-started').offset().top) {
      $('nav li a').removeClass('active');
      $('a[href$="#getting-started"]').addClass('active');
    } //windowpos

    if (windowpos > $('#css').offset().top) {
      $('nav li a').removeClass('active');
      $('a[href$="#css"]').addClass('active');
    } //windowpos

    if (windowpos > $('#demo').offset().top) {
      $('nav li a').removeClass('active');
      $('a[href$="#demo"]').addClass('active');
    } //windowpos


  }); //window scroll
