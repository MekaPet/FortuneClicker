<div class="farmer">
    <div>

        <img src=<?php echo $user->getFarmer(3)->getURLforLogo();?> class="iconFarmer4" >

    </div>
    <div class="lvlFarmer">
        <p>LvL <?php echo $user->getFarmer(3)->getLevel(); ?><br />
            <?php echo $user->getFarmer(3)->getNumber() ?> Mine</p>
    </div>
</div>