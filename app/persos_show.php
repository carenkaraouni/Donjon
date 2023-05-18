<?php 
    require_once('functions.php');

    if (!isset($_SESSION['user'])) {
        header('Location: login.php');
    }

    if (!isset($_GET['id'])) {
        header('Location: persos.php?msg=id non passé !');
    }

    $bdd = connect();

    $sql="SELECT * FROM persos WHERE id = :id AND user_id=:user_id;";

    $sth = $bdd->prepare($sql);
        
    $sth->execute([
        'id'          => $_GET['id'],
        'user_id'     => $_SESSION['user']['id']
    ]);

    $perso = $sth->fetch();
?>

<?php require_once('_header.php'); ?>

<h1>Détails du personnage</h1>

<b>Nom:</b> <?php echo $perso['name']; ?><br>
<b>Point de vie :</b> <?php echo $perso['pdv']; ?><br>
<b>Or :</b> <?php echo $perso['gold']; ?><br>
<b>Force :</b> <?php echo $perso['for']; ?><br>
<b>Intelligence :</b> <?php echo $perso['int']; ?><br>
<b>Charisme :</b> <?php echo $perso['char']; ?><br>
<b>Vitesse :</b> <?php echo $perso['vit']; ?><br>
<div>
    <a href="persos.php" class="btn btn-red">Retour</a>
</div>

</body>
</html>