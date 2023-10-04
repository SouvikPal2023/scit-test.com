



      $('#banner-image').owlCarousel({
        loop:true,
        center: false,
        margin:50,
        nav:true,
        navText: ["<i class='fa fa-chevron-left' aria-hidden='true'></i>","<i class='fa fa-chevron-right' aria-hidden='true'></i>"],
        dots:false,
        autoplay:true,
        autoplayTimeout:6000,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:1
            },
            1000:{
                items:1
            }
        }
    })

      $('#banner-imageM').owlCarousel({
        loop:true,
        center: false,
        margin:50,
        nav:true,
        navText: ["<i class='fa fa-chevron-left' aria-hidden='true'></i>","<i class='fa fa-chevron-right' aria-hidden='true'></i>"],
        dots:false,
        autoplay:true,
        autoplayTimeout:6000,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:1
            },
            1000:{
                items:1
            }
        }
    })

$('#testimonial-slider').owlCarousel({
  loop: true,
  nav: true,
  margin: 10,
  dots:false,
  autoplay: false,
  navText : ["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"],
  autoplayTimeout: 2500,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:1
        },
        1000:{
            items:1
        }
    }
})


// Add minus icon for collapse element which is open by default

$(".collapse.show").each(function(){

    $(this).prev(".card-header").find(".fa").addClass("fa-minus").removeClass("fa-plus");
  
  });
  
  
  
  // Toggle plus minus icon on show hide of collapse element
  
  $(".collapse").on('show.bs.collapse', function(){
  
    $(this).prev(".card-header").find(".fa").removeClass("fa-plus").addClass("fa-minus");
  
  }).on('hide.bs.collapse', function(){
  
    $(this).prev(".card-header").find(".fa").removeClass("fa-minus").addClass("fa-plus");
  
  });  


    // Sets interval...what is transition slide speed?
    $('#carouselBannerInterval').carousel({
    interval:2000
});