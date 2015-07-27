/**
 * Created by kedoPortable on 09/06/2015.
 */



$(document ).ready(function() {
    $("#Login").click( login );
    $("#newAccount").click( newAccount);

});

function login()
{
    $.post("AJAX/login.php",{mail: $("#mail").val(), password: $("#Password").val()},function(data)
    {
        if(data == 1)
        {
            window.location.href = "main.php";
        }
        else
        {
            alert ("L'identifiant et le mot de passe ne concorde pas.")
        }

    });
}

function newAccount()
{
    if ($("#PasswordRegistration").val() == $("#PasswordRegistrationVerif").val())
    {
        $.post("AJAX/RegisterAccount.php",
            {
                id: $("#nameRegistration").val(),
                password: $("#PasswordRegistration").val(),
                mail: $("#EmailRegistration").val()
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