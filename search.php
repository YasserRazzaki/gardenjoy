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
<div class="bg-gray-100 py-8">
    <div class="max-w-md mx-auto bg-white p-8 rounded-lg items-center justify-center mt-16 shadow-md">
        <h1 class="text-2xl font-bold mb-4">Recherche de plantes</h1>
        <form method="GET" action="" class="mb-4">
            <label for="search" class="block mb-2">Entrez le nom de la plante :</label>
            <input type="text" name="search" id="search" required class="border border-gray-300 rounded-md py-2 px-4 w-full">
            <button type="submit" class="mt-2 bg-blue-500 text-white rounded-md py-2 px-4 hover:bg-blue-600">Rechercher</button>
        </form>
        
        <?php
        // Vérifier si une recherche a été effectuée
        if(isset($_GET['search'])) {
            $search_term = $_GET['search'];
            $trefle_api_key = 'toV0euDXox1vvvvVmJwUxTAIvElcqVPSYlDAWKrYdo4';
            $plants_url = 'https://trefle.io/api/v1/plants/search?token=' . $trefle_api_key . '&q=' . urlencode($search_term);

            // Récupérer les plantes correspondant à la recherche
            $ch = curl_init($plants_url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $response = curl_exec($ch);

            if(curl_errno($ch)) {
                echo '<p class="text-red-600">Erreur lors de l\'exécution de la requête cURL : ' . curl_error($ch) . '</p>';
            } else {
                $decoded_response = json_decode($response, true);
                
                // Afficher les plantes correspondantes
                echo '<h2 class="text-lg font-bold mb-2">Résultats de la recherche pour "' . $search_term . '" :</h2>';
                echo '<ul>';
                foreach ($decoded_response['data'] as $plant) {
                    echo '<li class="mb-1"><a href="plant_details.php?id=' . $plant['id'] . '" class="text-blue-500 hover:underline">' . $plant['common_name'] . '</a></li>';
                }
                echo '</ul>';
            }

            curl_close($ch);
        }
        ?>
    </div>
    </div>
</html>
