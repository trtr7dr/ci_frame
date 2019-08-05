/**
 * @copyright 2015 MSCMS
 * @author http://polyakov.co.ua <zhenya_polyakov@mail.ru>
 * @cms http://mscms.com.ua <dev@mscms.com.ua>
 */
$(document).ready(function() {
});
// ========================================================================= menu active
$(function () {
    $('#hmenu a').each(function () {
        var location = window.location.href;
        var link = this.href;
        if(location == link) {
            $(this).parent('li').addClass('active');
            $(this).parent('li').parent('ul').parent('li:not(.module)').addClass('active');
        }
    });
});

//===================================================== search form
$(document).ready(function() {
    $('.page-header .search-form .form-control').on('click', function () {
        $(this).addClass("open");
        $(this).find('.form-control').focus();

        $('.page-header .search-form .form-control').on('blur', function () {
            $(this).removeClass("open");
            $(this).unbind("blur");
        });
    });
    // handle header search button click
    $('#search-submit').on('click', function () {
        $(this).closest('.search-form').submit();
    });
});
// ===================================== fixedMenu
$(window).scroll(function(){
    if($(window).scrollTop() >= 50) {
        $(".navbar-fixed-top.second").addClass('fixed');
    } else {
        $(".navbar-fixed-top.second").removeClass('fixed');
    }
});

//======================================== InitTextEditor


//============================================ ADMINAPI

var CMSApi = {
    //======================================== bootBox show image
    
    //======================================== ajax file Uploader
    
    //======================================== showMessages after breadcrumb
   
    //======================================== elFinder
    
    //=============================== urlTranslit
    urlTranslit: function(namefield, urlfield){
        var translitChars = new Array;
        var auto = true;

        translitChars['А'] = 'a'; translitChars['Б'] = 'b'; translitChars['В'] = 'v'; translitChars['Г'] = 'g'; translitChars['Д'] = 'd'; translitChars['Е'] = 'e'; translitChars['Ж'] = 'j'; translitChars['З'] = 'z';
        translitChars['И'] = 'i'; translitChars['Й'] = 'y'; translitChars['К'] = 'k'; translitChars['Л'] = 'l'; translitChars['М'] = 'm'; translitChars['Н'] = 'n'; translitChars['О'] = 'o'; translitChars['П'] = 'p';
        translitChars['Р'] = 'r'; translitChars['С'] = 's'; translitChars['Т'] = 't'; translitChars['У'] = 'u'; translitChars['Ф'] = 'f'; translitChars['Х'] = 'h'; translitChars['Ц'] = 'ts'; translitChars['Ч'] = 'ch';
        translitChars['Ш'] = 'sh'; translitChars['Щ'] = 'sch'; translitChars['Ъ'] = ''; translitChars['Ы'] = 'yi'; translitChars['Ь'] = ''; translitChars['Э'] = 'e'; translitChars['Ю'] = 'yu'; translitChars['Я'] = 'ya';
        translitChars['а'] = 'a'; translitChars['б'] = 'b'; translitChars['в'] = 'v'; translitChars['г'] = 'g'; translitChars['д'] = 'd'; translitChars['е'] = 'e'; translitChars['ж'] = 'j'; translitChars['з'] = 'z';
        translitChars['и'] = 'i'; translitChars['й'] = 'y'; translitChars['к'] = 'k'; translitChars['л'] = 'l'; translitChars['м'] = 'm'; translitChars['н'] = 'n'; translitChars['о'] = 'o'; translitChars['п'] = 'p';
        translitChars['р'] = 'r'; translitChars['с'] = 's'; translitChars['т'] = 't'; translitChars['у'] = 'u'; translitChars['ф'] = 'f'; translitChars['х'] = 'h'; translitChars['ц'] = 'ts'; translitChars['ч'] = 'ch';
        translitChars['ш'] = 'sh'; translitChars['щ'] = 'sch'; translitChars['ъ'] = 'y'; translitChars['ы'] = 'yi'; translitChars['ь'] = ''; translitChars['э'] = 'e'; translitChars['ю'] = 'yu'; translitChars['я'] = 'ya';
        translitChars[' '] = '-'; translitChars['.'] = ''; translitChars['/'] = '-';

        function translit(string) {
            var result = '';
            for (var i = 0; i < 126; i++) {
                var stringChar = string.substr(i, 1);
                if (translitChars[stringChar]) {
                    result += translitChars[stringChar];
                } else {
                    result += stringChar;
                }
            }
            result = result.replace(/[^A-Za-z0-9_\-]/g, '');
            return result.toLowerCase();
        }

        var string = $('#' + namefield).val();
        var translitString = translit(string);
        $('#' + urlfield).val(translitString);


        $('.form-horizontal').bootstrapValidator('revalidateField', urlfield);

    }

    //========================================DELETE AJAX FUNCTION
    
}

//===================================================== выпадающее меню в категориях
$('#category .btn:has(.fa-plus)').die('click').live('click', function() {
    var $this = $(this);
    $this.closest('.row-category').next().show();
    $this.hide().prev().show();
});
$('#category .btn:has(.fa-minus)').die('click').live('click', function() {
    var $this = $(this);
    $this.closest('.row-category').next().hide();
    $this.hide().next().show();
});

//===================================================== checkBoxes

//======================================== автоматическое заполнение meta_url при вводе названия

$(document).ready(function() {
    var translitChars = new Array;
    var auto = true;
    translitChars['А'] = 'a'; translitChars['Б'] = 'b'; translitChars['В'] = 'v'; translitChars['Г'] = 'g'; translitChars['Д'] = 'd'; translitChars['Е'] = 'e'; translitChars['Ж'] = 'j'; translitChars['З'] = 'z';
    translitChars['И'] = 'i'; translitChars['Й'] = 'y'; translitChars['К'] = 'k'; translitChars['Л'] = 'l'; translitChars['М'] = 'm'; translitChars['Н'] = 'n'; translitChars['О'] = 'o'; translitChars['П'] = 'p';
    translitChars['Р'] = 'r'; translitChars['С'] = 's'; translitChars['Т'] = 't'; translitChars['У'] = 'u'; translitChars['Ф'] = 'f'; translitChars['Х'] = 'h'; translitChars['Ц'] = 'ts'; translitChars['Ч'] = 'ch';
    translitChars['Ш'] = 'sh'; translitChars['Щ'] = 'sch'; translitChars['Ъ'] = ''; translitChars['Ы'] = 'yi'; translitChars['Ь'] = ''; translitChars['Э'] = 'e'; translitChars['Ю'] = 'yu'; translitChars['Я'] = 'ya';
    translitChars['а'] = 'a'; translitChars['б'] = 'b'; translitChars['в'] = 'v'; translitChars['г'] = 'g'; translitChars['д'] = 'd'; translitChars['е'] = 'e'; translitChars['ж'] = 'j'; translitChars['з'] = 'z';
    translitChars['и'] = 'i'; translitChars['й'] = 'y'; translitChars['к'] = 'k'; translitChars['л'] = 'l'; translitChars['м'] = 'm'; translitChars['н'] = 'n'; translitChars['о'] = 'o'; translitChars['п'] = 'p';
    translitChars['р'] = 'r'; translitChars['с'] = 's'; translitChars['т'] = 't'; translitChars['у'] = 'u'; translitChars['ф'] = 'f'; translitChars['х'] = 'h'; translitChars['ц'] = 'ts'; translitChars['ч'] = 'ch';
    translitChars['ш'] = 'sh'; translitChars['щ'] = 'sch'; translitChars['ъ'] = 'y'; translitChars['ы'] = 'yi'; translitChars['ь'] = ''; translitChars['э'] = 'e'; translitChars['ю'] = 'yu'; translitChars['я'] = 'ya';
    translitChars[' '] = '-'; translitChars['.'] = ''; translitChars['/'] = '-';

    $(function () {
        if ($("#meta_url").val() != '' || $("#meta_url").val() > 130) {
            auto = false;
        }
        $("#inputName").keyup(function () {
            if (auto) {
                var string = $(this).val();
                var translitString = translit(string);
                $("#meta_url").val(translitString);
            }
        });
        $("#meta_url").keyup(function () {
            auto = $(this).val() == '';
        });
    });

    function translit(string) {
        var result = '';
        for (var i = 0; i < 126; i++) {
            var stringChar = string.substr(i, 1);
            if (translitChars[stringChar]) {
                result += translitChars[stringChar];
            } else {
                result += stringChar;
            }
        }
        result = result.replace(/[^A-Za-z0-9_\-]/g, '');
        return result.toLowerCase();
    }
});

//======================================== validation bootstrap
