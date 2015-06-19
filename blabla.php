<?php session_start();?>
<script language="JavaScript">
    function verif_formulaire()
    if(document.form1.email.value == "") {
        alert("Veuillez entrer votre email");
        document.form1.email.focus();
        return false;
    }

    else {
        validite('form1','email','EMAIL',0,30);
        if (probleme == 1) {
            document.form1.email.focus();
            return false;
        }
// Les lignes ajoutées sont ici	
        else	{


            var essai= '<?php echo $test; ?>' ;
            if (essai != 0)
            {
                alert('Cette adresse existe déjà');
                document.form1.email.focus();
                return false;
            }
        }
// fin du rajout
    }

    function validite(form1,champ,format,mini,maxi) {
        probleme = 0;
// ici normalement la fonction validite que je ne détaille pas
// pour ne pas alourdir l'énoncé du problème !
// En gros elle contient les expressions régulières
// et affiche des alert s'il y a une erreur de saisie.
// S'il y a une erreur elle définit la variable "probleme" à 1

    }
</script>

<?php
// connexion à la base
$connexion = mysql_connect($host,$user,$pass)
or die
 
mysql_select_db("$bdd")
or die
 
// Récupération des champs
if(isset($_POST['email'])) {
    $email = $_POST["email"] ;
    $_SESSION['email'] = $email;}
 
// initialistation de la variable de test
$test = 0;
 
// Verification de l'existence ou non de l'email dans la base
if(isset($_POST['email'])) {
    $resultat = mysql_query ("SELECT email FROM identification WHERE email ='$email'");
    $test = mysql_num_rows($resultat);

// si l'email est libre pas dans la base on enregistre. 
// j'ai du rajouter (&& ($email != "") à la condition sinon 
// ça m'enregistrait un enregistrement vide dans la base.
// Ca fait sans doute partie du problème.
    if(($test==0) && ($email != ""))
    {
// création de la requête SQL:
        $sql = "INSERT  INTO identification email VALUES '$email'";

//exécution de la requête SQL:
        $requete = mysql_query($sql, $connexion) or die
 
// si tout s'est bien passé j'appelle la page activation.php 
// qui m'affiche un récapitulatif des données saisies.
// Ca justifie la session tout en en haut du code
// afin de récupérer les données
include ("./activation.php");
 
mysql_close();
}
}
?>

</head>
<body>
<form action="formulaire.php" method="post" onSubmit="return verif_formulaire()"
      name="form1" class="Style1" id="form1">

    <p class="Style2"><strong>Email</strong> <strong>valide</strong>
        <input name="email" type="text" size="30" maxlength="30"
        <input type="submit" name="envoyer" id="envoyer" value="Créer votre profil" />