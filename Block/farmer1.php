<div class="farmer" id="farmer1">
    <div>

        <img src=<?php echo $user->getFarmer(0)->getURLforLogo();?> class="iconFarmer1" >

    </div>
    <div class="lvlFarmer">
        <p>
            LvL <?php echo $user->getFarmer(0)->getLevel(); ?><br />
            <div id="numberFarmer1">
                <?php echo $user->getFarmer(0)->getNumber(); ?>
            </div>
            <?php echo $user->getFarmer(0)->getName(); ?>
        </p>
    </div>
</div>