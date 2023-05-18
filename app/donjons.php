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

<?php require_once('_header.php'); ?>
    <div class="container">
        <?php echo $_SESSION['perso']['name']; ?> (<a href="persos.php">Changer</a>)
        <ul>
            <?php foreach($donjons as $donjon) { ?>
               <div class="carte"> <li><a href="donjon_play.php?id=<?php echo $donjon['id']; ?>">
                    <?php echo $donjon['name']; ?>
                </a></li></div>
            <?php } ?>
        </ul>
    </div>
</body>
</html>