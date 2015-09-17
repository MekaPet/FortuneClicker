/**
 * Created by kedoPortable on 28/07/2015.
 */
$(document ).ready(function()
{
    $("#pepite").click( clickPepite );
    $("#farmer1").click( clickFarmer1 );
    pepiteParSeconde();
});

function clickPepite()
{
    $.post("AJAX/main.php",
        {
            methode: "ClickPepite"
        },
        function (data)
        {
            $('#PepiteDispoHTML').html(data);
        });
}

function clickFarmer1()
{

    $.ajax({
        url: 'AJAX/main.php',
        type: "post",
        data:
        {
            methode: "buyFarmer1",
            number: 1
        },
        dataType: 'json',
        success: function (json) {
            $('#numberFarmer1').html(json.number);
            $('#PepiteDispoHTML').html(json.ressourceAvailable);
            $('#RessourceParInstance').html(json.peptiteParSeconde);
        }
    });
}

function pepiteParSeconde()
{
    $.ajax({
        url: 'AJAX/main.php',
        type: "post",
        data:
        {
            methode: "ressourcePerSeconde"
        },
        dataType: 'html',
        success: function (data) {
            $('#PepiteDispoHTML').html(data);
        }
    });
    setTimeout(pepiteParSeconde,1000);
}
