<?php 
session_start();
require('database.php');

$hours = (int) $_POST['hours'];
$minutes = (int) $_POST['minutes'];
$seconds = (int) $_POST['seconds'];
$milliseconds = (int) $_POST['milliseconds'];
$idCube = (int) $_POST['idCube'];
$idUser = (int) $_POST['idUser'];
print_r($_POST);
// Conversion du chrono en format TIME
$chrono = sprintf('%02d:%02d:%02d.%03d', $hours, $minutes, $seconds, $milliseconds);

$stmt = $bdd->prepare("INSERT INTO temps (idUser, idCube, chrono) VALUES (:idUser, :idCube, :chrono)");
echo "INSERT INTO temps (idUser, idCube, chrono) VALUES ('$idUser', '$idCube', '$chrono');";
if ($stmt->execute(['idUser' => $idUser, 'idCube' => $idCube, 'chrono' => $chrono])) {
    header('Location: chrono.php?id='.$idCube);
    exit; // Utilisez exit pour éviter d'exécuter le reste du code
} else {
    // Affichez l'erreur si l'insertion échoue
    echo "Erreur lors de l'enregistrement : " . $stmt->errorInfo()[2];
}

$bdd = null;
?>
