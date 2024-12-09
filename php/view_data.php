<?php
// Fichier de données JSON
$dataFile = '../data/data.json';

// Vérifier si le fichier existe
if (file_exists($dataFile)) {
    $jsonData = file_get_contents($dataFile);
    $data = json_decode($jsonData, true);

    // Retourner les données en JSON
    header('Content-Type: application/json');
    echo json_encode($data);
} else {
    echo json_encode(["error" => "Le fichier data.json n'existe pas."]);
}
?>
