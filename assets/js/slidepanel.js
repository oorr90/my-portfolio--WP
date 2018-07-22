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
