<?php 

session_start();
require('database.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cubes</title>
    <link rel="stylesheet" href="cubesconnect.css" >

    <style>
        table {
            width: 80%;
            border-collapse: collapse; /* Remove spacing between cells */
            margin: 20px auto; /* Center the table */
        }

        td {
            border: 1px solid #999; /* Add border to cells */
            padding: 10px;
            text-align: center;
        }

        img {
            width: 100px; /* Set a fixed width for images */
            height: auto; /* Maintain aspect ratio */
        }
    </style>

</head>
<body>

    <nav class="navbar">
            <ul>
            <?php 
            if (!empty($_SESSION['login.php']))
            {
                ?>
                <li><a href="indexconnect.php">Accueil</a></li>
                <?php
            }
            else
            {
                echo '<li><a href="index.html"> Accueil </a></li>';
                // print_r($_SESSION);
            }
            ?>
            
            <li><a href="cubes.php"> Cubes </a></li>
            <li><a href="chrono1.php"> Chronomètre </a></li>
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
                // print_r($_SESSION);
            }
            ?>
            </ul>
        </nav>

        <div class="container">
        <?php 
            if (!empty($_SESSION['login.php']))
            {
                ?>
                <table>
                    <?php 
                    // connexion à la base
                    $query = 'SELECT * FROM utilisateur'; // requete : select * from utilisateur;
                    $cubes = $bdd->query($query)->fetchAll(PDO::FETCH_ASSOC); // recuperation des données dans une variable $cubes ;
               
                    foreach ($cubes as $cube) {
                        echo "<td>
                                <a href='chrono.php?id=".$cube['idUser']."'>
                                    <img src='".$cube['image']."' alt='".$cube['pseudo']."'>
                                    <p>".$cube['pseudo']."</p>
                                    <tr>
                                    
                                </a>
                              </td>";
                    }
                    ?>
                     
                    

                    
                    
                
                <?php
            }
            else
            {
                ?>
                <table>
                    <tr>
                        <td>Gan 11 M Pro</td>
                        
                        <td><a href="login.php"><img id="Gan 11 M Pro"src="Gan 356 XS.jpg" alt="Gan 11 M Pro" /></td>
                        <td class="tempscube">Connectez-vous pour enregistrez un temps</td>
                    </tr>
                    <tr>
                        <td>MoYu Weilong WR M 2020</td>
                        <td><a href="login.php"><img id="MoYu Weilong WR M 2020" src="MoYu Weilong WR M 202.jpg" alt="MoYu Weilong WR M 2020" /></td>
                        <td class="tempscube">Connectez-vous pour enregistrez un temps</td>
                    </tr> 
                    <tr>
                        <td>Gan 356 XS</td>
                        <td><a href="login.php"><img id="Gan 356 XS" src="Gan 356 XS.jpg" alt="Gan 356 XS" /></td>
                        <td class="tempscube">Connectez-vous pour enregistrez un temps</td>
                    </tr>
                    <tr>
                        <td>QiYi Valk 3 Elite M</td>
                        <td><a href="login.php"><img id="QiYi Valk 3 Elite M" src="QiYi Valk 3 Elite M.jpg" alt="QiYi Valk 3 Elite M" /></td>
                        <td class="tempscube">Connectez-vous pour enregistrez un temps</td>
                    </tr>
                    <tr>
                        <td>MoYu WeiLong GTS3 M</td>
                        <td><a href="login.php"><img id="MoYu WeiLong GTS3 M" src="MoYu WeiLong GTS3 M.jpg" alt="MoYu WeiLong GTS3 M" /></td>
                        <td class="tempscube">Connectez-vous pour enregistrez un temps</td>
                    </tr> 
                    <tr>
                        <td>QiYi MS Magnetic</td>
                        <td><a href="login.php"><img id="QiYi MS Magnetic" src="QiYi MS Magnetic.jpg" alt="QiYi MS Magnetic" /></td>
                        <td class="tempscube">Connectez-vous pour enregistrez un temps</td>
                    </tr>
                    <tr>
                        <td>Angstrom Valk 3 Elite M</td>
                        <td><a href="login.php"><img id="Angstrom Valk 3 Elite M" src="Angstrom Valk 3 elite M.jpg" alt="Angstrom Valk 3 Elite M" /></td>
                        <td class="tempscube">Connectez-vous pour enregistrez un temps</td>
                    </tr>
                    <tr>
                        <td>YongJun YuLong V2 M</td>
                        <td><a href="login.php"><img id="YongJun YuLong V2 M" src="YongJun YuLong V2 M.jpg" alt="YongJun YuLong V2 M" /></td>
                        <td class="tempscube">Connectez-vous pour enregistrez un temps</td>
                    </tr> 
                    <tr>
                        <td>QiYi Warrior S stickerless</td>
                        <td><a href="login.php"><img id="QiYi Warrior S stickerless" src="QiYi Warrior S stickerless.jpg" alt="QiYi Warrior S stickerless" /></td>
                        <td class="tempscube">Connectez-vous pour enregistrez un temps</td>
                    </tr>
                </table>
                
            <?php
            }
            ?>


        </div>

   
    
</body>
</html>
