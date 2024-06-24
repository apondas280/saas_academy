$(document).ready(function(){
    var $niceSelect1 = $('.language-dropdown select'),
    $testimonial = $('.testimonials-wrap'),
    $player_1 = $('#player'),
    $password = $('.toggle-password'),
    $counter = $('.counter'),
    $progress1 = $('.progress-1');
    // Nice Select 
    if ($niceSelect1.length > 0){
        $('.language-dropdown select').niceSelect();
    }
    

    // owlCarousel
    if ($testimonial.length > 0){
        $(".testimonials-wrap").owlCarousel({
            responsive: true,
            loop:true,
            dots:false,
            autoplay:true,
            autoHeight: true,
            margin: 30,
            slideSpeed : 200,
            items : 3,
            responsive:{
                0:{
                    items:1,
                },
                575:{
                    items:1,
                },
                767:{
                    items:2,
                },
                990:{
                    items:3,
                }
            }
        });
    }
    
    // Player js 
    if ($player_1.length > 0){
        const player = new Plyr('#player');
    }
    // Password Show Hide js 
    if ($password.length > 0){
        $(".toggle-password").click(function() {

            $(this).toggleClass("fa-eye fa-eye-slash");
            var input = $($(this).attr("toggle"));
            if (input.attr("type") == "password") {
              input.attr("type", "text");
            } else {
              input.attr("type", "password");
            }
        });
        $(".toggle-password-2").click(function() {

            $(this).toggleClass("fa-eye fa-eye-slash");
            var input = $($(this).attr("toggle"));
            if (input.attr("type") == "password") {
              input.attr("type", "text");
            } else {
              input.attr("type", "password");
            }
        });
    }

    // Counter Up jquery
    if ($counter.length > 0){
        $('.counter').counterUp({
            delay: 10,
            time: 1000,
        });
    }
	

    // Progressbar jquery
    if ($progress1.length > 0){
        $(".progress-1").each(function () {
            var datacount = $(this).attr("data-skill");
            $(this).rProgressbar({
                percentage: datacount,
                fillBackgroundColor: '#FACA21'
            });
         });
    }
    
    
    
});




// Accordion Menu 
if (screen.width < 992) {
    function accordion() {
        var Accordion = function(el, multiple) {
            this.el = el || {};
            this.multiple = multiple || false;
            var links = this.el.find('.menu-item-has-children > a');
            links.on('click', {el: this.el, multiple: this.multiple}, this.dropdown)
        }
    
        Accordion.prototype.dropdown = function(e) {
            var $el = e.data.el,
                $this = $(this),
                $next = $this.next();
    
            $next.slideToggle();
            $this.parent().toggleClass('active-submenu');
    
            if (!e.data.multiple) {
                $el.find('.menu-dropdown').not($next).slideUp().parent().removeClass('active-submenu');
                $el.find('.menu-dropdown').not($next).slideUp();
            };
        }
        var accordion = new Accordion($('.accordion-menu'), false);
    }
    accordion();
}
// Accordion Menu


// Wow JS 
new WOW().init();

// Aos Animation
// AOS.init({
//     duration: 800,
// });















