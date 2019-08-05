$(window).on('load', function () {
   $('#log_v').css({
       'transform': 'scale(10) rotate(360deg)',
       'margin-left': '80vw',
       'margin-top': '70vh'
   }); 
});

function big_block(type) {

    var block = ['news', 'doc', 'otdel'];

    $('#f_' + type).css({
        'font-weight': 'bolder',
        'letter-spacing': "10px"
    });
    $('#' + type).css({
        'opacity': "1",
        'top': '10vh'
    });

    block.forEach(function (element) {
        if (element !== type) {
            $('#' + element).css({
                'opacity': "0",
                'top': '100vh'
            });
            $('#f_' + element).css({
                'font-weight': 'normal',
                'letter-spacing': "normal"
            });
        }

    });


}


function close_block(type) {
    $('#f_' + type).css({
        'font-weight': 'normal',
        'letter-spacing': "normal"
    });
    $('#' + type).css({
        'opacity': "0",
        'top': '100vh'
    });
}