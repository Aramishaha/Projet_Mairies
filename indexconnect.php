<?php 
//session_start();

require('securityAction.php'); 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cube homepage</title>
    <link rel="stylesheet" href="cubesconnect.css" >
</head>
<body>

    <nav class="navbar">
        <ul>
            <li><a href="indexconnect.php">Accueil</a></li>
            <?php 
            if (!empty($_SESSION['login.php']))
             {
                ?>
                <li><a href="cubes.php"> Utilisateurs </a></li>
                <?php
             }
             else
             {
                echo '<li><a href="login.php"> Connexion </a></li>';
                print_r($_SESSION);
             }
             ?>
            <li><a href="cubes.php"> Contact </a></li>
            <li><a href="">Solution</a></li>
            <li><a href="">Présentation</a></li>
            <?php 
            if (!empty($_SESSION['login.php']))
             {
                ?>
                <li><a href="logoutAction.php">Déconnexion</a></li>
                <?php
             }
             else
             {
                echo '<li><a href="login.php"> Connexion </a></li>';
                print_r($_SESSION);
             }
             ?>
        </ul>
    </nav>

    <div class="container">
        dfgrvgrg
    </div>

   
    
</body>
</html>