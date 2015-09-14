<?php
/**
 * Created by PhpStorm.
 * User: kedoPortable
 * Date: 19/06/2015
 * Time: 12:28
 */

    include 'including_file.php';
    //include 'Include/checkLog.php';
    include 'Include/header.php';

    include 'include/start.php';


?>
        <link rel="stylesheet" href="css/main.css" />
        <script src="Js/main.js" ></script>
    </head>
    <body>
        <div id="contener">
            <div id="jeu">
            <div id="gauche">
                <div id="result" class="boxBorder box">
                    <p>Mine Fortune <br />
                    Nombre de pépite : <?php ?><br />
                    Nombre de pépite/s : <?php echo $user->getRessourceList(); ?><br />
                    Nombre de pépite/Click : <?php ?></p>
                </div>

                <div id="divers" class="boxBorder box">
                    <img src="Media\Image\U\icon-pepite.png" id="pepite">
                </div>
            </div>
            <div id="centre">
                <div id="menu" class="boxBorder box">
                    menu
                </div>
                <div id="main" class="boxBorder box">
                    page principale
                </div>
            </div>
            <div id="droite">
                <div id="upgrade" class="boxBorder box">
                    upgrade
                </div>
                <div id="farmer"  class="boxBorder box">
                    <?php
                        include 'Block/farmer1.php';
                    ?>
                    <?php
                        include 'Block/farmer2.php';
                    ?>
                    <?php
                        include 'Block/farmer3.php';
                    ?>
                    <?php
                        include 'Block/farmer4.php';
                    ?>
                </div>
            </div>
         </div>





        </div>
    </body>
</html>