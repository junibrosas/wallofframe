// jQuery for page scrolling feature - requires jQuery Easing plugin
$(function() {

    // equalize a responsive column
    $('.equalized').responsiveEqualHeightGrid();

    // scroll page
    $('a.page-scroll').bind('click', function(event) {
        var $anchor = $(this);
        $('html, body').stop().animate({
            scrollTop: $($anchor.attr('href')).offset().top
        }, 1500, 'easeInOutExpo');
        event.preventDefault();
    });

    // owl carousel
    $("#owl-related").owlCarousel({
        autoPlay: 3000, //Set AutoPlay to 3 seconds

        items : 4,
        itemsDesktop : [1199,3],
        itemsDesktopSmall : [979,3],
        navigation: true,
        navigationText: [
            "<i class='fa fa-angle-left'></i>",
            "<i class='fa fa-angle-right'></i>"
        ]
    });


    // owl carousel
    $("#owl-recommended").owlCarousel({
        autoPlay: 3000, //Set AutoPlay to 3 seconds

        items : 2,
        itemsDesktop : [1199,3],
        itemsDesktopSmall : [979,3],
    });

    //icheck
    if($('.icheck').length > 0){
        $('.icheck').iCheck({
            checkboxClass: 'icheckbox_flat-red',
            radioClass: 'iradio_flat-red'
        });

        $('.iCheck-all').on('ifChecked', function() {
            $('.icheck').iCheck('check');
        });

        $('.iCheck-all').on('ifUnchecked', function() {
            $('.icheck').iCheck('uncheck');
        });
    }

    //nail thumb
    $('.nailthumb-container').nailthumb();

    // this is a confirmation used before checking out order.
    /*var confirmButton = $('.confirmation-action');
    confirmButton.click(function(event){
        event.preventDefault();

        var choice = confirm(this.getAttribute('data-confirm'));
        if (choice) {
            $('.checkout-order-form').submit();
        }
    });*/

});

// Highlight the top nav as scrolling occurs
$('body').scrollspy({
    target: '.navbar-fixed-top'
})

// Closes the Responsive Menu on Menu Item Click
$('.navbar-collapse ul li a').click(function() {
    $('.navbar-toggle:visible').click();
});




