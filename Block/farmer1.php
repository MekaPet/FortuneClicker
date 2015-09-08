/**
* Created by PhpStorm.
* User: Benjamin
* Date: 28/07/2015
* Time: 14:12
*/

<div class="farmer">
    <img src="<?php echo $user->getFarmer(1)-> ?>" >
    <?php
    echo $user->getFarmer(1)->
    var_dump($_SESSION);
    echo $user->getFarmer(0)->getName();
    ?>
</div>