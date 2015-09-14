<div class="farmer">
    <div>

        <img src=<?php echo $user->getFarmer(2)->getURLforLogo();?> class="iconFarmer" >

    </div>
    <div class="lvlFarmer">
        <p>LvL <?php echo $user->getFarmer(2)->getLevel(); ?><br />
            <?php echo $user->getFarmer(2)->getNumber() ?> Mineur</p>
    </div>
</div>