<?php

    require_once('functions.php');

    if (!isset($_SESSION['user'])) {
        header('Location: login.php');
    }

    if (!isset($_SESSION['perso'])) {
        header('Location: persos.php');
    }

    $bdd = connect();

    $sql = "SELECT * FROM donjons";

    $sth = $bdd->prepare($sql);
        
    $sth->execute();

    $donjons = $sth->fetchAll();
?>
<style>

</style>
<?php require_once('_header.php'); ?>
    <div class="container">
        <?php echo $_SESSION['perso']['name']; ?> <a class="btn btn-green" href="persos.php">Changer</a>
        <ul class= "carte">
            <?php foreach($donjons as $donjon) { ?>
                
               <div> <li class="rectangle"><a href="donjon_play.php?id=<?php echo $donjon['id']; ?>">
               <img class="donjon" src="img/bandeau-cite-perdue-1600x807.jpg">
                   <p  class="p" > <?php echo $donjon['name']; ?></p>
                </a></li></div>
            <?php } ?>
        </ul>
    </div>
</body>
</html>