<div class="farmer" id="farmer2">
    <div>

        <img src=<?php echo $user->getFarmer(1)->getURLforLogo();?> class="iconFarmer2" >

    </div>
    <div class="lvlFarmer">
        <p>
            LvL <?php echo $user->getFarmer(1)->getLevel(); ?><br />
        <div id="numberFarmer2">
            <?php echo $user->getFarmer(1)->getNumber(); ?>
        </div>
        <?php echo $user->getFarmer(1)->getName(); ?>
        </p>
    </div>
</div>