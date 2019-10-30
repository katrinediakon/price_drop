$(function () {
    //script for popups
    $('a.show_popup').click(function () {
        $('div.'+$(this).attr("rel")).fadeIn(500);
        $("body").append("<div id='overlay'></div>");
        $('#overlay').show().css({'filter' : 'alpha(opacity=80)'});
        return false;
    });
    $('a.close').click(function () {
        $(this).parent().fadeOut(100);
        $('#overlay').remove('#overlay');
        return false;
    });

    //script for tabs
    $("div.selectTabs").each(function () {
        var tmp = $(this);
        $(tmp).find(".lineTabs li").each(function (i) {
            $(tmp).find(".lineTabs li:eq("+i+") a").click(function(){
                var tab_id=i+1;
                $(tmp).find(".lineTabs li").removeClass("active");
                $(this).parent().addClass("active");
                $(tmp).find(".tab_content div").stop(false,false).hide();
                $(tmp).find(".tab"+tab_id).stop(false,false).fadeIn(300);
                return false;
            });
        });
    });
});

function product_subscription(id) {
    let email = document.getElementById("email").value;
    if (email.length > 0
        && (email.match(/.+?\@.+/g) || []).length !== 1) {
        alert('Вы ввели некорректный e-mail!');
    } else {
        var currentLocation = window.location;
        var id;
        closeForm();
        $.ajax({
            type: 'POST',
            url: currentLocation,
            async: false,
            data: "FOLOW=" + id + "&EMAIL=" + document.getElementById("email").value,
            success: function (data) {
                if (data == "Вы уже подписаны на данный товар") {
                    alert(data);
                }
            }
        });

    }
}