<img src="img/<?php echo $_SESSION['fight']['ennemi']->photo; ?>" />
<h2><?php echo $_SESSION['fight']['ennemi']->name; ?></h2>
<div>
    <b>Point de vie:</b> <?php echo $_SESSION['fight']['ennemi']->pol; ?></h2>
</div>
<div>
    <b>XP:</b> <?php echo $_SESSION['fight']['ennemi']->xp; ?></h2>
</div>
<div>
    <b>Force:</b> <?php echo $_SESSION['fight']['ennemi']->power; ?></h2>
</div>
<div>
    <b>Vitesse vie:</b> <?php echo $_SESSION['fight']['ennemi']->speed; ?></h2>
</div>
<div>
    <b>Or:</b> <?php echo $_SESSION['fight']['ennemi']->gold; ?></h2>
</div>
<div>
    <b>Constitution:</b> <?php echo $_SESSION['fight']['ennemi']->constitution; ?></h2>
</div>