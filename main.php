<?php
/**
 * Created by PhpStorm.
 * User: kedoPortable
 * Date: 19/06/2015
 * Time: 12:28
 */

    include 'including_file.php';
    include 'Include/checkLog.php';
    include 'Include/header.php';



?>
        <link rel="stylesheet" href="css/main.css" />
        <script src="Js/main.js" ></script>
    </head>
    <body>
        <div id="contener">
            <div id="result" class="boxBorder box">
                resultat
            </div>
            <div id="menu" class="boxBorder box">
                menu
            </div>
            <div id="upgrade" class="boxBorder box">
                upgrade
            </div>
            <div id="divers" class="boxBorder box">
                divers
            </div>
            <div id="main" class="boxBorder box">
                page principale
            </div>
            <div id="farmer"  class="boxBorder box">
                <?php
                    include 'Block/farmer1.php';
                ?>
            </div>
        </div>
    </body>
</html>