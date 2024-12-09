const express = require("express");
const fs = require("fs");
const bodyParser = require("body-parser");

const app = express();
app.use(bodyParser.json());
app.use(bodyParser.urlencoded({ extended: true }));

// Endpoint pour recevoir les données
app.post("/submit", (req, res) => {
    const data = req.body;

    // Charger les données existantes
    let clients = [];
    if (fs.existsSync("data.json")) {
        clients = JSON.parse(fs.readFileSync("data.json", "utf8"));
    }

    // Ajouter le client
    clients.push(data);

    // Sauvegarder
    fs.writeFileSync("data.json", JSON.stringify(clients, null, 2));

    res.send("Données enregistrées avec succès !");
});

// Lancer le serveur
const PORT = 3000;
app.listen(PORT, () => {
    console.log(`Serveur démarré sur http://localhost:${PORT}`);
});
