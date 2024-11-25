<?php 
session_start();
require('database.php');



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chronomètre</title>
    <link rel="stylesheet" href="chrono.css">
    <link rel="stylesheet" href="navbar.css">
</head>
<body>
    
<nav class="navbar">
    <ul>
        <?php 
        if (!empty($_SESSION['login.php'])) {
            ?>
            <li><a href="indexconnect.php">Accueil</a></li>
            <?php
        } else {
            echo '<li><a href="index.html"> Accueil </a></li>';
        }
        ?>
        <li><a href="cubes.php"> Cubes </a></li>
        <li><a href="chrono1.php">Chronomètre</a></li>
        <li><a href="">Solution</a></li>
        <li><a href="">Présentation</a></li>
        <?php 
        if (!empty($_SESSION['login.php'])) {
            ?>
            <li><a href="logoutAction.php">Déconnexion</a></li>
            <?php
        } else {
            echo '<li><a href="login.php"> Connexion </a></li>';
        }
        ?>
    </ul>
</nav>

<div class="chronometre">
    <div class="time">
        <span>0 h</span>
        <span>0 min</span>
        <span>0 s</span>
        <span>0 ms</span>
    </div>

    <div class="controls">
        <button id="start" onclick="start()">Start</button>
        <button id="stop" onclick="stop()">Stop</button>
        <button id="reset" onclick="reset()">Reset</button>
    </div>
    <br>
    
</div>

<br>


<script src="chronochat.js"></script>
</body>
</html>
