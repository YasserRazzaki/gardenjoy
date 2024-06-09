<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recherche de clients par ville</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <h2>Recherche de clients par ville</h2>
    <form action="recherche_clients.php" method="GET">
        <label for="lettre_ville">Entrez une lettre pour la ville :</label>
        <input type="text" id="lettre_ville" name="lettre_ville" maxlength="1" required>
        <button type="submit">Rechercher</button>
    </form>
</body>
</html>

<?php
// Connexion à la base de données (à remplir avec vos propres informations)
$serveur = "localhost";
$utilisateur = "root";
$mdp = "root";
$base_de_donnees = "dev_back";

$connexion = new mysqli($serveur, $utilisateur, $mdp, $base_de_donnees);

// Vérification de la connexion
if ($connexion->connect_error) {
    die("La connexion a échoué : " . $connexion->connect_error);
}

// Récupération de la lettre saisie par l'utilisateur
$lettre_ville = $_GET['lettre_ville'];

// Requête SQL pour rechercher les clients habitant dans une ville commençant par la lettre spécifiée
$sql = "SELECT nom_client FROM client WHERE adresse_ville_client LIKE '$lettre_ville%'";
$resultat = $connexion->query($sql);

// Affichage des résultats
if ($resultat->num_rows > 0) {
    echo "<h2>Résultats de la recherche :</h2>";
    while($row = $resultat->fetch_assoc()) {
        echo "Client : " . $row["nom_client"] . "<br>";
    }
} else {
    echo "<h2>Aucun résultat trouvé.</h2>";
}

// Fermeture de la connexion
$connexion->close();
?>
