/**
 * Created by Zhenya on 16.11.2015.
 */
// ========================================================================= menu active
$(document).ready(function() {
    $('nav.blog-nav a').each(function () {
        var location = window.location.href;
        var link = this.href;
        if(location == link) {
            $(this).addClass('active');
        }
    });
    $('#right_menu a').each(function () {
        var location = window.location.href;
        var link = this.href;
        if(location == link) {
            $(this).parent('li').addClass('active');
        }
    });
});