function readmore() {
    // Configure/customize these variables.
    var showChar = 80; // How many characters are shown by default
    var ellipsestext = "...";
    var moretext = "mais";
    var lesstext = "menos";


    $('.more').each(function() {
        var content = $(this).html();

        if (content.length > showChar) {

            var c = content.substr(0, showChar);
            var h = content.substr(showChar, content.length - showChar);

            var html = c + '<span class="moreellipses">' + ellipsestext + '&nbsp;</span><span class="morecontent"><span>' + h + '</span>&nbsp;&nbsp;<a href="" class="morelink">' + moretext + '</a></span>';

            $(this).html(html);
        }

    });
    $('.rb-more-portfolio').each(function() {
        var content = $(this).html();

        if (content.length > 50) {

            var c = content.substr(0, 50);
            var h = content.substr(showChar, content.length - showChar);

            var html = c + '<span class="moreellipses">' + ellipsestext + '&nbsp;</span>';

            $(this).html(html);
        }

    });

    $(".morelink").click(function() {
        if ($(this).hasClass("less")) {
            $(this).removeClass("less");
            $(this).html(moretext);
        } else {
            $(this).addClass("less");
            $(this).html(lesstext);
        }
        $(this).parent().prev().toggle();
        $(this).prev().toggle();
        return false;
    });
}

$(document).ready(function() {
    readmore();

    $('#modalPortfolio').on('shown.bs.modal', function() {
        $('#portfolioTitulo').trigger('focus');
    });

    $('#rb-profile-label-add-img').hover(function() {
        $('#rb-profile-cover').css( "display", "flex");
    },
    function() {
        $('#rb-profile-cover').css( "display", "none");
    });

    $('#rb-profile-add-img').change(function() {
        url = $(this).val();
        file = $(this)[0].files[0];
        $("#rb-profile-showimg").attr("src", window.URL.createObjectURL(file));
    });
});
