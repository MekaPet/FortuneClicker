/**
* Created by PhpStorm.
* User: Benjamin
* Date: 28/07/2015
* Time: 14:12
*/

<div class="farmer">
    <div>
    <?php
        echo $_SESSION["user"]->getFarmer(1)->getLevel();
    ?></div>
</div>