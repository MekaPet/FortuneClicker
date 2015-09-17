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
            alert("Vous etes connecté");
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
                if(data == 1)
                {
                    alert("Votre compte a ete cree avec succes");
                    window.location.href = "main.php";
                }
                else if(data == 2)
                {
                    alert("pseudo non définit");
                }
                else if (data == 3)
                {
                    alert("password invalide. Il ne correspond pas aux critères de sécurité");
                }
                else if (data == 4)
                {
                    alert("password non définit");
                }
                else if (data == 5)
                {
                    alert("email non valide");
                }
                else if (data == 6)
                {
                    alert("email non définit");
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