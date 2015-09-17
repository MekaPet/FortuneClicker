<div class="farmer" id="farmer4">
    <div>

        <img src=<?php echo $user->getFarmer(3)->getURLforLogo();?> class="iconFarmer4" >

    </div>
    <div class="lvlFarmer">
        <p>
            LvL <?php echo $user->getFarmer(3)->getLevel(); ?><br />
        <div id="numberFarmer4">
            <?php echo $user->getFarmer(3)->getNumber(); ?>
        </div>
        <?php echo $user->getFarmer(3)->getName(); ?>
        </p>
    </div>
</div>