<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recherche par ID de plante</title>
</head>
<body class="bg-gray-100">
<?php session_start();

// Vérifie si l'utilisateur est connecté
if (!isset($_SESSION['user_id'])) {
    // Redirigez l'utilisateur vers la page de connexion
    header("Location: ./login.php");
    exit(); // Assurez-vous de quitter le script après la redirection
}

require('./test.php'); ?> 
    <div class="container mx-auto px-4 py-8">
        <div class="max-w-md mx-auto bg-white p-6 rounded-lg shadow-md">
            <h1 class="text-3xl font-bold text-center mb-6">Recherche par ID de plante</h1>
            <form class="flex items-center justify-center mb-6" action="" method="GET">
                <input type="number" id="id_plante" name="id_plante" value="<?php echo isset($_GET['id_plante']) ? htmlspecialchars($_GET['id_plante']) : ''; ?>" class="py-2 border border-gray-300 w-full rounded-md focus:outline-none focus:ring focus:ring-blue-500" required>
                <button type="submit" class="px-2 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 ml-2 focus:outline-none focus:ring focus:ring-blue-500">Rechercher</button>
            </form>

            <?php if(isset($_GET['id_plante'])): ?>
                <?php
                // Vérifier si l'ID de la plante est passé dans l'URL
                $plant_id = $_GET['id_plante'];
                $trefle_api_key = 'toV0euDXox1vvvvVmJwUxTAIvElcqVPSYlDAWKrYdo4';
                $plant_url = 'https://trefle.io/api/v1/plants/' . $plant_id . '?token=' . $trefle_api_key;

                // Récupérer les informations de la plante depuis l'API
                $ch = curl_init($plant_url);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                $response = curl_exec($ch);

                if(curl_errno($ch)) {
                    echo '<p class="text-red-600">Erreur lors de l\'exécution de la requête cURL : ' . curl_error($ch) . '</p>';
                } else {
                    $decoded_response = json_decode($response, true);
                    if(isset($decoded_response['data'])) {
                        ?>
                        <div class="bg-white rounded shadow-md">
                            <h2 class="text-xl font-bold mb-4">Détails de la plante</h2>
                            <p><strong>Nom scientifique:</strong> <?php echo $decoded_response['data']['scientific_name']; ?></p>
                            <p><strong>Nom commun:</strong> <?php echo $decoded_response['data']['common_name']; ?></p>
                            <p><strong>Observations:</strong> <?php echo $decoded_response['data']['observations']; ?></p>
                            <p><strong>Id:</strong> <?php echo $decoded_response['data']['id']; ?></p>
                            <p><strong>Genus:</strong> <?php echo $decoded_response['data']['main_species']['genus']; ?></p>
                            <p><strong>Family:</strong> <?php echo $decoded_response['data']['main_species']['family']; ?></p>
                            <p><strong>Rank:</strong> <?php echo $decoded_response['data']['main_species']['rank']; ?></p>
                            <?php if(isset($decoded_response['data']['image_url'])): ?>
                                <p><b>Image :</b></p>
                                <img src="<?php echo $decoded_response['data']['image_url']; ?>" alt="Photo de la plante" class="rounded my-4">
                            <?php endif; ?>
                        </div>
                        <?php
                    } else {
                        echo '<p class="text-red-600">Aucune information trouvée pour l\'ID de plante spécifié.</p>';
                    }
                }
                curl_close($ch);
            
             endif; ?>     
        </div>
    </div>
</body>
</html>