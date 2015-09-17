<div class="farmer" id="farmer3">
    <div>

        <img src=<?php echo $user->getFarmer(2)->getURLforLogo();?> class="iconFarmer3" >

    </div>
    <div class="lvlFarmer">
        <p>
            LvL <?php echo $user->getFarmer(2)->getLevel(); ?><br />
        <div id="numberFarmer3">
            <?php echo $user->getFarmer(2)->getNumber(); ?>
        </div>
        <?php echo $user->getFarmer(2)->getName(); ?>
        </p>
    </div>
</div>