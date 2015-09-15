<div class="farmer">
    <div>

        <img src=<?php echo $user->getFarmer(0)->getURLforLogo();?> class="iconFarmer1" >

    </div>
    <div class="lvlFarmer">
        <p>LvL <?php echo $user->getFarmer(0)->getLevel(); ?><br />
        <?php echo $user->getFarmer(0)->getNumber(); ?> Clicker</p>
    </div>
</div>