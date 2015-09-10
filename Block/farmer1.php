<div class="farmer">
    <div>
    <?php
        $user->addNewFarmerToPlayer(1);
        $user->addNewFarmerToPlayer(2);
    ?>

        <img src=<?php echo $user->getFarmer(0)->getURLforLogo();?>>
        <img src=<?php echo $user->getFarmer(1)->getURLforLogo();?>>

    </div>
</div>