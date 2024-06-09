<?php session_start();

// Vérifie si l'utilisateur est connecté
if (!isset($_SESSION['user_id'])) {
    // Redirigez l'utilisateur vers la page de connexion
    header("Location: ./login.php");
    exit(); // Assurez-vous de quitter le script après la redirection
}

require('./test.php'); ?> 
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recherche de plantes</title>
</head>
<div>
    <?php
$trefle_api_key = 'toV0euDXox1vvvvVmJwUxTAIvElcqVPSYlDAWKrYdo4';
$fruits_vegetables_url = 'https://trefle.io/api/v1/plants?token=' . $trefle_api_key . '&filter[edible]=true&filter[vegetable]=true';

// Récupérer des fruits et légumes comestibles
$ch = curl_init($fruits_vegetables_url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);

if(curl_errno($ch)) {
    echo 'Erreur lors de l\'exécution de la requête cURL : ' . curl_error($ch);
} else {
    $decoded_response = json_decode($response, true);
    
    // Diviser les fruits et légumes en groupes de quatre
    $plants_groups = array_chunk($decoded_response['data'], 4);
    
    // Faire quelque chose avec la réponse JSON, par exemple l'afficher
    echo '<div class="container mx-auto px-4 py-8">';
    
    // Boucler à travers chaque groupe de quatre fruits et légumes
    foreach ($plants_groups as $group) {
        echo '<div class="flex flex-wrap px-32 -mx-4">';
        
        // Boucler à travers chaque fruit ou légume dans le groupe
        foreach ($group as $plant) {
            echo '<div class="w-full md:w-1/2 lg:w-1/4 px-4 mb-8">';
            echo '<div class="flex flex-col items-center justify-center">';
            echo '<img alt="' . $plant['common_name'] . '" class="w-full h-64 object-cover rounded-lg" src="' . $plant['image_url'] . '" />';
            echo '<p class="text-center mt-2">' . $plant['common_name'] . '</p>';
            echo '</div></div>';
        }
        
        echo '</div>';
    }
    
    echo '</div>';
}

curl_close($ch);
?></div>
</html>