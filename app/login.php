<?php

    require_once('functions.php');
    if (isset($_POST["send"])){
        $bdd = connect ();
        //dd($_POST);

        $sql= "SELECT * FROM users WHERE `email` = :email;";

        $sth=$bdd->prepare($sql);
        $sth->execute([
            'email'     => $_POST['email']
        ]);

        $user = $sth->fetch();
        
        if ($user && password_verify($_POST['password'], $user['password']) ){
           // dd($user);
           $_SESSION['user'] = $user;
           header('Location: persos.php');
        } else{
            $msg = "Email ou mot de passe incorrect !";
        }
        /*header('Location: login.php');*/
    }

?>
<style>
    form {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        height: 100vh;
      border: 1px solid black;
      padding: 20px;
      background: rgba(255,255,255, 0.5);
      text-align: center;
    font-size: 18px;
      position: absolute; 
      top: 50%; 
      left: 50%;
       transform: translate(-50%, -50%);
       height: 250;
       border-radius: 30px;

    }
    
    input, select, textarea {
      border: 1px solid gray;
      padding: 5px;
      margin-bottom: 10px;
      border-radius: 30px;

    }
</style>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php require_once('_header.php')?>
    <form action="" method="post">
        <h1>Connexion</h1>

        <?php
            if (isset($msg)) {
                echo "<div>" . $msg . "</div>";
            } ?>
        <div>
            <label for="email">Email</label>
            <input type="email" placeholder="Entrez votre email" name="email" id="email">
        </div>
        <div>
            <label for="password">Mot de passe</label>
            <input type="password" placeholder="Entrez votre mot de passe" name="password" id="password">
        </div>
        <div>
        <input type="submit" class="btn btn-green" name="send" value="Connexion" />
        </div>
    </form>

    <style>
        body {
            background-image: url(img/assassins-creed-odyssey.jpg);
            background-size: cover;
        }
    </style>
    
</body>
</html>


