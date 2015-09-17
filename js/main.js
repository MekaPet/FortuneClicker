/**
 * Created by kedoPortable on 28/07/2015.
 */
$(document ).ready(function() {
    $("#pepite").click( clickPepite );
});

function clickPepite()
{
    $.post("AJAX/main.php",
        {
            methode: "ClickPepite"
        },
        function (data)
        {
            alert(data);
            $('#PepiteDispoHTML').html(data);
        });
}