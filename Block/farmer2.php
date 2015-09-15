<div class="farmer">
    <div>

        <img src=<?php echo $user->getFarmer(1)->getURLforLogo();?> class="iconFarmer2" >

    </div>
    <div class="lvlFarmer">
        <p>LvL <?php echo $user->getFarmer(1)->getLevel(); ?><br />
            <?php echo $user->getFarmer(1)->getNumber() ?> Pioche</p>
    </div>
</div>