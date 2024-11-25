<?php 
session_start();
require('database.php');

$idCube = $_GET['id']; // Point-virgule ajouté
$req = "SELECT DISTINCT chrono FROM temps WHERE idCube = ? ORDER BY chrono ASC";
$stmt = $bdd->prepare($req); // Corrigé de $bdd à $pdo
$stmt->execute([$idCube]);
$lesMeilleurs = $stmt->fetchAll(PDO::FETCH_ASSOC);


$data = json_encode($lesMeilleurs);

$head = <<< EOD
<script>
    let data = $data;
</script>
EOD;
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

    <form id="chronoForm"action="save_time.php" method="POST">
        <input type="hidden" name="hours" id="hours">
        <input type="hidden" name="minutes" id="minutes">
        <input type="hidden" name="seconds" id="seconds">
        <input type="hidden" name="milliseconds" id="milliseconds">
        <?php 
         if (!isset($_SESSION['login.php']) && !isset($_GET['id'])) {
             ?>
            <input type="hidden" name="idUser" value="<?php null ?>">
            <input type="hidden" name="idCube" value="<?php null ?>">
            <?php
         } else {
             ?>
            <input type="hidden" name="idUser" value="<?php echo $_SESSION["auth"] ?>">
            <input type="hidden" name="idCube" value="<?php echo $_GET["id"] ?>">
            <?php
        }
        ?> 
        <!--php : if (!isset($_SESSION['id])) puis pareil avec $_GET['id'] 
        <input type="hidden" name="idUser" value="<--?= $_SESSION['id'] ?>">
        <input type="hidden" name="idCube" value="<--?= $_GET['id'] ?>"> -->
    </form>
    <div class="controls">
        <button id="start" onclick="start()">Start</button>
        <button id="stop" onclick="stop()">Stop</button>
        <button id="reset" onclick="reset()">Reset</button>
    </div>
    <br>
    <div class="controls">
        <button id="save" onclick="save()" style="width: 100%;">Save</button>
    </div>
</div>

<br>
<h3>Meilleurs temps : </h3>
<div id="best-times">
    <?php 
    echo $head;
    if (!empty($lesMeilleurs)) {
        foreach ($lesMeilleurs as $temps) {
            echo htmlspecialchars($temps['chrono']) . "<br>";
        }    
    } else {
        echo "<p> Aucun meileur temps trouvé. </p>";
    }
    ?>
    

</div>

<script src="chronochat.js"></script>
</body>
</html>
