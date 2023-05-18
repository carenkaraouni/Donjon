<?php require_once('functions.php');

    if (!isset($_SESSION['user'])) {
        header('Location: login.php');
    }

    $bdd = connect();

    $sql = "SELECT * FROM persos WHERE user_id = :user_id";

    $sth = $bdd->prepare($sql);
        
    $sth->execute([
        'user_id'     => $_SESSION['user']['id']
    ]);

    $persos = $sth->fetchAll();

    // dd($persos);

?>

<?php require_once('_header.php'); ?>

    <h1>Vos personnages</h1>
    <a href="persos_add.php">Créer un personnage </a>

    <?php if (isset($_GET['msg'])) {
        echo "<div>" . $_GET['msg'] . "</div>";
    } ?>

    <table>
        <thead>
            <tr>
                <td>ID</td>
                <td>Nom</td>
                <td>Point de vie</td>
                <td>Or</td>
                <td>Force</td>
                <td>Intelligence</td>
                <td>Charisme</td>
                <td>Vitesse</td>
                <td>Action</td>
            </tr>  
        </thead>
        <tbody>
            <?php foreach ($persos as $perso) { ?>
                <tr>
                    <td><?php echo $perso['id']; ?></td>
                    <td><?php echo $perso['name']; ?></td>
                    <td><?php echo $perso['pdv']; ?></td>
                    <td><?php echo $perso['gold']; ?></td>
                    <td><?php echo $perso['for']; ?></td>
                    <td><?php echo $perso['int']; ?></td>
                    <td><?php echo $perso['char']; ?></td>
                    <td><?php echo $perso['vit']; ?></td>
                    <td align="right">
                        <?php if ($perso['pdv'] > 0) { ?>
                            <a 
                                class="btn btn-grey"
                                href="persos_choice.php?id=<?php echo $perso['id']; ?>" 
                            >Choisir</a>
                        <?php } else { ?>
                            <a 
                                class="btn btn-green"
                                href="persos_respawn.php?id=<?php echo $perso['id']; ?>" 
                            >Résussité</a>
                        <?php } ?>
                        <a 
                            class="btn btn-grey"
                            href="persos_show.php?id=<?php echo $perso['id']; ?>" 
                        >Détails</a>

                        <a 
                            class="btn btn-blue"
                            href="persos_edit.php?id=<?php echo $perso['id']; ?>" 
                        >Modifier</a>

                        <a 
                            class="btn btn-red"
                            href="persos_del.php?id=<?php echo $perso['id']; ?>" 
                            onClick="return confirm('Etes-vous sûr ?');"
                        >Supprimer</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>