$('.dropdown-menu a').click(function (e) {
    if  (window.innerWidth < 768){
      $('.navbar-collapse').collapse('toggle');
    }
  });
  
$(window).scroll(function() {
    if ($(this).scrollTop() >= 20) {        // If page is scrolled more than 50px
        $('#return-to-top').fadeIn(200);    // Fade in the arrow
    } else {
        $('#return-to-top').fadeOut(200);   // Else fade out the arrow
    }
});

$('#return-to-top').click(function() {      // When arrow is clicked
    $('body,html').animate({
        scrollTop : 0                       // Scroll to top of body
    }, 500);
});


$('body').scrollspy({target: ".navbar", offset: 50});

$("#collapsingNavbar a").on('click', function(event) {

  if (this.hash !== "") {

    event.preventDefault();
    var hash = this.hash;

    $('html, body').animate({
      scrollTop: $(hash).offset().top
    }, 800, function(){
      window.location.hash = hash;
    });

  }
});


