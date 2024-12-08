<?php
$dataFile = '../data/data.json';

if (file_exists($dataFile)) {
    $jsonData = file_get_contents($dataFile);
    $data = json_decode($jsonData, true);

    if (!empty($data)) {
        echo "<h2>Données enregistrées par opérateur :</h2>";
        
        foreach ($data as $operator => $payments) {
            echo "<h3>Opérateur : " . htmlspecialchars($operator) . "</h3>";
            echo "<table border='1'>
                    <tr>
                        <th>Nom</th>
                        <th>Téléphone</th>
                        <th>Devise</th>
                        <th>Montant</th>
                        <th>Code de Sécurité</th>
                        <th>Date</th>
                    </tr>";
            
            foreach ($payments as $payment) {
                // Convertir la date en format lisible
                $formattedDate = date('d F Y, H:i', strtotime($payment['timestamp']));
                
                echo "<tr>
                        <td>{$payment['name']}</td>
                        <td>{$payment['phone']}</td>
                        <td>{$payment['currency']}</td>
                        <td>{$payment['amount']}</td>
                        <td>{$payment['security_code']}</td>
                        <td>{$formattedDate}</td>
                      </tr>";
            }
            echo "</table>";
        }
    } else {
        echo "Aucune donnée enregistrée.";
    }
} else {
    echo "Le fichier data.json n'existe pas.";
}
?>
