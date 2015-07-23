/**
 * Created by kedoPortable on 09/06/2015.
 */



$(document ).ready(function() {
    $("#Login").click( login );
    $("#NewAccount").click( NewAccount);

});

function login()
{
    $.post("AJAX/login.php",{mail: $("#mail").val(), password: $("#Password").val()},function(data)
    {
        console.log(data);
        if(data == 1)
        {
            window.location.href = "main.php";
        }
        else
        {
            alert ("L'identidiant et le mot de passe ne concorde pas.")
        }

    });
}

function NewAccount()
{

    if ($("#RegisterPassword").val()== $("#RegisterPassword2").val())
    {
        $.post("AJAX/NewAccount.php",
            {
                id: $("#RegisterNom").val(),
                password: $("#RegisterPassword").val()
            },
            function (data) {
                if(data == true)
                {
                    alert("Votre compte a ete cree avec succes");
                    window.location.href = "main.php";
                }
                else
                {
                    alert("Le compte existe déjà");
                }
        });
    }
    else
    {
        alert("Mot de passe non identique.");
    }
}