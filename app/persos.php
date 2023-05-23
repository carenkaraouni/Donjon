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
 <style>
    
    h1 {
      text-align: center;
      font-family:Roboto Mono;
    }
    h4 {
      text-align: center;
    }
    tr{
        text-align: center;
    }
    body{
        background-color: rgb(245, 238, 248);
        
    }
    
    /*table {
      /*border-collapse: collapse;
      margin: auto;
      display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        height: 90vh;
      border: 1px solid black;
      padding: 20px;
    }*/
   
    
    </style>
    
   
  </style>

<?php require_once('_header.php'); ?>

    <h1>Vos personnages</h1>
    <h4>Choissez un personnage pour commencer a jouer</h4>
    <?php if (isset($_GET['msg'])) {
        echo "<div>" . $_GET['msg'] . "</div>";
    } ?>

    <table class="perso">
        <thead class="espace">
            <tr>
                <td>ID</td>
                <td class="espace">Nom</td>
                <td class="espace">Point de vie</td>
                <td class="espace">Or</td>
                <td class="espace">Force</td>
                <td class="espace">Intelligence</td>
                <td class="espace">Charisme</td>
                <td class="espace">Vitesse</td>
               
                <th width="35%">Action</th>
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
                    <td>
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

                        <a class="btn btn-red"href="persos_del.php?id=<?php echo $perso['id']; ?>" onClick="return confirm('Etes-vous sûr ?');">Supprimer</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
        </table>               
    <a href="persos_add.php" class="btn btn-green" >Créer un nouveau personnage </a>
    
</body>
</html>