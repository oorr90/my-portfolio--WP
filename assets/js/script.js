jQuery(document).ready(function($) {
//$is now jQuery

    var totalRows = $('.row');
    //console.log(totalRows.length);

    
    $('#contain').click(function (e) { //#A_ID is an example. Use the id of your Anchor
        $('html, body').animate({
            scrollTop: $('#project').offset().top - 20 //#DIV_ID is an example. Use the id of your destination on the page
        }, 'slow');
    });


	$( ".show1" ).click(function(e) {
        e.preventDefault();
            $(".row").not(".row1").slideUp();
            $( ".row1" ).slideToggle( "slow", function() {
    	});
     });
     
    $( ".show2" ).click(function(e) {
        e.preventDefault();
            $(".row").not(".row2").slideUp();
            $( ".row2" ).slideToggle( "slow", function() {
    	});
    });
    
    $( ".show3" ).click(function(e) {
        e.preventDefault();
            $(".row").not(".row3").slideUp();
            $( ".row3" ).slideToggle( "slow", function() {
    	});
     });

    $( ".show4" ).click(function(e) {
        e.preventDefault();
            $(".row").not(".row4").slideUp();
            $( ".row4" ).slideToggle( "slow", function() {
    	});
    });

    $( ".show5" ).click(function(e) {
        e.preventDefault();
            $(".row").not(".row5").slideUp();
            $( ".row5" ).slideToggle( "slow", function() {
    	});
    });

    $( ".show6" ).click(function(e) {
        e.preventDefault();
            $(".row").not(".row6").slideUp();
            $( ".row6" ).slideToggle( "slow", function() {
    	});
    });

    $( ".show7" ).click(function(e) {
        e.preventDefault();
            $(".row").not(".row7").slideUp();
            $( ".row7" ).slideToggle( "slow", function() {
    	});
    });

    $( ".show8" ).click(function(e) {
        e.preventDefault();
            $(".row").not(".row8").slideUp();
            $( ".row8" ).slideToggle( "slow", function() {
    	});
    });

});
