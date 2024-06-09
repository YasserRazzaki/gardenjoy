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
    <title>Détails de la plante</title>
</head>
<div class="bg-gray-100 py-8">
    <div class="max-w-md mx-auto bg-white p-8 rounded-lg shadow-md"> 
        <?php
        // Vérifier si l'identifiant de la plante est passé dans l'URL
        if(isset($_GET['id'])) {
            $plant_id = $_GET['id'];
            $trefle_api_key = 'toV0euDXox1vvvvVmJwUxTAIvElcqVPSYlDAWKrYdo4';
            $plant_url = 'https://trefle.io/api/v1/plants/' . $plant_id . '?token=' . $trefle_api_key;

            // Récupérer les informations de la plante
            $ch = curl_init($plant_url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $response = curl_exec($ch);

            if(curl_errno($ch)) {
                echo '<p class="text-red-600">Erreur lors de l\'exécution de la requête cURL : ' . curl_error($ch) . '</p>';
            } else {
                $decoded_response = json_decode($response, true);
                $json_encoded_response = json_encode($decoded_response);
                echo '<script>';
                echo 'console.log(' . $json_encoded_response . ');';
                echo '</script>';

                // Afficher les détails de la plante
                echo '<h1 class="text-2xl font-bold mb-4">' . ($decoded_response['data']['common_name'] ?? 'Non spécifié') . '</h1>';
                echo '<p><strong>Nom scientifique:</strong> ' . ($decoded_response['data']['scientific_name'] ?? 'Non spécifié') . '</p>';
                echo '<p><strong>Nom commun:</strong> ' . $decoded_response['data']['common_name'] . '</p>';
                echo '<p><strong>Observations:</strong> ' . $decoded_response['data']['observations'] . '</p>';
                echo '<p><strong>Id:</strong> ' . $decoded_response['data']['id'] . '</p>';
                echo '<p><strong>Genus:</strong> ' . $decoded_response['data']['main_species']['genus'] . '</p>';
                echo '<p><strong>Family:</strong> ' . $decoded_response['data']['main_species']['family'] . '</p>';
                echo '<p><strong>Rank:</strong> ' . $decoded_response['data']['main_species']['rank'] . '</p>';
                echo '<p><strong>Year:</strong> ' . $decoded_response['data']['year'] . '</p>';
                // Afficher la photo de la plante s'il y en a une
                if(isset($decoded_response['data']['image_url'])) {
                    echo '<p><b>Image : </b></p>';
                    echo '<img src="' . $decoded_response['data']['image_url'] . '" alt="Photo de la plante" class="rounded my-4 transition duration-300 ease-in-out transform hover:scale-105">';
                }
                echo '</p>';
                echo '<p><strong>Dernière modification:</strong> ' . $decoded_response['meta']['last_modified'] . '</p>';
              
                echo '<div class=" px-4 py-4 flex items-center justify-center"><button type="button" id="specificationsButton" class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none mr-4">
  Specs
</button>';
                echo '<button type="button" id="growthButton" class="mr-4 py-3 px-4 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-gray-200 text-gray-500 hover:border-blue-600 hover:text-blue-600 disabled:opacity-50 disabled:pointer-events-none dark:border-neutral-700 dark:text-neutral-400 dark:hover:text-blue-500 dark:hover:border-blue-600">
  Growth
</button>';
                echo '<button type="button" id="photosButton" class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-teal-500 text-white hover:bg-teal-600 disabled:opacity-50 disabled:pointer-events-none">
Photos
</button></div>';
                echo ' <div id="specificationsDiv" class="hidden mt-4"></div>
<div id="growthDiv" class="hidden mt-4"></div>
<div id="photosDiv" class="hidden mt-4"></div>' ;
                // Vous pouvez afficher d'autres informations ici selon vos besoins
            }

            curl_close($ch);
        } else {
            echo '<p class="text-red-600">Identifiant de la plante non fourni.</p>';
        }
        ?>
    </div>
    </div>
</html>
<script>
    // Récupérer les informations JSON encodées depuis PHP
    const decodedResponse = <?php echo json_encode($decoded_response); ?>;
    
        // Fonction pour afficher ou masquer les spécifications de la plante
        document.getElementById('specificationsButton').addEventListener('click', function() {
        const specificationsDiv = document.getElementById('specificationsDiv');
        if (specificationsDiv.classList.contains('hidden')) {
            const specifications = decodedResponse.data.main_species.specifications;
            console.log(specifications);
            specificationsDiv.innerHTML = '<h2>Spécifications de la plante</h2>';
            for (const key in specifications) {
                if (specifications[key] !== null) {
                    specificationsDiv.innerHTML += `<p><strong>${key}:</strong> ${specifications[key]}</p>`;
                }
            }
            specificationsDiv.classList.remove('hidden');
        } else {
            specificationsDiv.classList.add('hidden');
        }
    });

   // Fonction pour afficher ou masquer les informations de croissance de la plante
   document.getElementById('growthButton').addEventListener('click', function() {
        const growthDiv = document.getElementById('growthDiv');
        if (growthDiv.classList.contains('hidden')) {
            const growth = decodedResponse.data.main_species.growth;
            console.log(growth);
            growthDiv.innerHTML = '<h2>Informations de croissance de la plante</h2>';
            for (const key in growth) {
                if (growth[key] !== null) {
                    growthDiv.innerHTML += `<p><strong>${key}:</strong> ${JSON.stringify(growth[key])}</p>`;
                }
            }
            growthDiv.classList.remove('hidden');
        } else {
            growthDiv.classList.add('hidden');
        }
    });
// Fonction pour afficher ou masquer les photos de la plante
document.getElementById('photosButton').addEventListener('click', function() {
    const photosDiv = document.getElementById('photosDiv');
    if (photosDiv.classList.contains('hidden')) {
        photosDiv.innerHTML = '<h2>Photos de la plante</h2>';
        const categories = ['flower', 'fruit', 'habit', 'leaf', 'bark', 'other'];
        categories.forEach(category => {
            const photos = decodedResponse.data.main_species.images[category];
            if (photos && photos.length > 0) {
                photosDiv.innerHTML += `<div style="padding-top: 20px;"><h3>Catégorie ${category}</h3>`;
                photos.forEach((photo, index) => {
                    photosDiv.innerHTML += `<p><a href="${photo.image_url}" target="_blank" style="color: blue;">lien ${index + 1}</a> - Copyright: ${photo.copyright}</p>`;
                });
                photosDiv.innerHTML += `</div>`;
            }
        });
        photosDiv.classList.remove('hidden');
    } else {
        photosDiv.classList.add('hidden');
    }
});


</script>
