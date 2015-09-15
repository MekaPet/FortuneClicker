/**
 * Created by kedoPortable on 28/07/2015.
 */
$(document ).ready(function() {
    $("#pepite").click( clickPepite );
    alert("page loead");
});

function clickPepite()
{
    $.post("AJAX/main.php",
        {
            methode: "ClickPepite"
        },
        function (data)
        {
            alert("pika");
            $('#PepiteDispoHTML').html(data);
        });
}