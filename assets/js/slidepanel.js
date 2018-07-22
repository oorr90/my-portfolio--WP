(function($) {
$('#toggle').toggle( 
    function() {
        $('#popout').animate({ left: 0 }, 'slow', function() {
            $('#toggle').html('<img src="http://localhost/olivia-orr/wp-content/themes/myportfolio/assets/images/menu.png" alt="close" />');
        });
    }, 
    function() {
        $('#popout').animate({ left: -250 }, 'slow', function() {
            $('#toggle').html('<img src="http://localhost/olivia-orr/wp-content/themes/myportfolio/assets/images/menu.png" alt="close" />');
        });
    }
);
})(jQuery);


//https://www.wpbeginner.com/wp-themes/how-to-create-a-mobile-ready-responsive-wordpress-menu/
