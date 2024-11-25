<?php
require('database.php');

// Requête SQL correcte
$lesCubes = "SELECT idCube, nomCube FROM cubes";

// Exécution de la requête
$stmt = $bdd->query($lesCubes);
$cubes = $stmt->fetchAll(PDO::FETCH_ASSOC); // Récupérer tous les résultats sous forme de tableau associatif

// Encoder les résultats en JSON
$data = json_encode($cubes);

// Injecter les données dans le JavaScript
$head = <<< EOD
<script> let data = $data; </script>
EOD;
