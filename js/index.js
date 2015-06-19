/**
 * Created by Benjamin on 10/06/2015.
 */
// Se déclanche lors de la tentative d'inscription.
$( document ).ready(function() {
    $("#inscri").click(function () {
        // Requête Ajax en GET.
        $.post("login.php", {name: $("#log").val(), pass: $("#mdp").val()})
            // Lorsque la requête s'est terminée, on teste la valeur.
            .done(function (data) {
                //si la réponse est correcte.
                alert(data);
            });
    });

    $("#connect").click(function () {
        //alert("connecte moi");
        //Requête Ajax en GET.
        $.post("connect.php", {name2: $("#logConnect").val(), pass2: $("#mdpConnect").val()})
            // Lorsque la requête s'est terminée, on teste la valeur.
            .done(function (data) {
                if(data == 0){
                    alert("Bienvenue sur Click Fortune!!");
                    document.location.href = "by/Accueil.html";
                }else{
                    alert(data);
                }
            });
    });

    // Se declanche lors du click sur connectez-vous
    $("#connection").click(function(){
        // affiche connectez-vous
         $("#cont2").show();
    });
});
