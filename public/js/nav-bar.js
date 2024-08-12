$(document).ready(function () {
    $(window).scroll(function () {
        var scroll_pos = $(window).scrollTop();
        if (scroll_pos > 120) {
            $("#nav-bar").css('background-color', '#040404');
            $("#nav-bar").css('box-shadow', '0 0 15px #090909');
        } else {
            $("#nav-bar").css('background-color', 'transparent');
            $("#nav-bar").css('box-shadow', '0 0 0 transparent');
        }          
    });
});
