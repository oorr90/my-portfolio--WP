jQuery(document).ready(function($) {
//$is now jQuery

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

});
