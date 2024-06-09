<?php
session_start();

// Vérifie si l'utilisateur est connecté
if (!isset($_SESSION['user_id'])) {
    // Redirigez l'utilisateur vers la page de connexion
    header("Location: ./login.php");
    exit(); // Assurez-vous de quitter le script après la redirection
}

require('./test.php'); 

$trefle_api_key = 'toV0euDXox1vvvvVmJwUxTAIvElcqVPSYlDAWKrYdo4';

// Récupération de toutes les familles disponibles (toutes les pages)
$families = [];
$page = 1;
$has_next_page = true;

while ($has_next_page) {
    $families_url = 'https://trefle.io/api/v1/families?token=' . $trefle_api_key . '&page=' . $page;

    $ch = curl_init($families_url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);

    if (curl_errno($ch)) {
        echo 'Erreur lors de l\'exécution de la requête cURL : ' . curl_error($ch);
        break;
    } else {
        $decoded_response = json_decode($response, true);
        if (isset($decoded_response['data'])) {
            $families = array_merge($families, $decoded_response['data']);
            $has_next_page = isset($decoded_response['links']['next']);
            $page++;
        } else {
            echo 'Aucune donnée de famille n\'a été trouvée.';
            break;
        }
    }

    curl_close($ch);
}

// Vérification si une famille est sélectionnée
if (isset($_GET['family'])) {
    $selected_family = $_GET['family'];

    // Récupération de toutes les plantes
    $plants_url = 'https://trefle.io/api/v1/plants?token=' . $trefle_api_key;

    $ch = curl_init($plants_url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);

    if (curl_errno($ch)) {
        echo 'Erreur lors de l\'exécution de la requête cURL : ' . curl_error($ch);
    } else {
        $decoded_response = json_decode($response, true);
        if (isset($decoded_response['data'])) {
            $all_plants = $decoded_response['data'];

            // Filtrage des plantes par famille
            $plants = array_filter($all_plants, function ($plant) use ($selected_family) {
                return isset($plant['family']) && $plant['family'] === $selected_family;
            });
        } else {
            echo 'Aucune donnée de plante n\'a été trouvée.';
        }
    }

    curl_close($ch);
}
?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recherche de plantes par famille</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> <!-- Ajout de SweetAlert -->
    <style>
        .plant-card:hover img {
            transform: scale(1.05);
            transition: transform 0.3s ease-in-out;
        }
    </style>
</head>

<body class="bg-gray-100">
    <div class="container mx-auto px-4 py-8 justify-center items-center max-w-screen-xl">
        <h1 class="text-3xl font-bold mb-8 text-center">Recherche de plantes par famille</h1>

        <!-- Formulaire de sélection de la famille -->
        <form method="GET" action="" class="mb-8">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-1 gap-4 justify-center">
                <!-- Ajout de la classe justify-center -->
                <div class="col-span-2 sm:col-span-1">
                    <label for="family" class="sr-only">Sélectionnez une famille de plantes :</label>
                    <select name="family" id="family" class="border border-gray-300 rounded-md px-4 py-2 w-full focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        <option value="" selected disabled>Sélectionnez une famille</option>
                        <?php
                        // Génération des options de la liste déroulante à partir des familles disponibles
                        foreach ($families as $family) {
                            echo '<option value="' . $family['name'] . '">' . $family['name'] . '</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="col-span-1 sm:col-span-1 flex justify-center">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                        Rechercher
                    </button>
                </div>
            </div>
        </form>

        <!-- Affichage des plantes de la famille sélectionnée -->
        <?php
        if (isset($plants)) {
            if (count($plants) > 0) { // Vérifie si des plantes sont trouvées
                echo '<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">';
                foreach ($plants as $plant) {
                    echo '<div class="plant-card bg-white rounded-lg shadow-md overflow-hidden">';
                    echo '<a href="plant_details.php?id=' . $plant['id'] . '">';
                    echo '<img src="' . $plant['image_url'] . '" alt="' . $plant['common_name'] . '" class="w-full h-48 object-cover">';
                    echo '<div class="p-4">';
                    echo '<h2 class="text-xl font-semibold mb-2">' . $plant['common_name'] . '</h2>';
                    echo '<p class="text-gray-600">' . $plant['scientific_name'] . '</p>';
                    echo '</div></a></div>';
                }
                echo '</div>';
            } else {
                echo '<script>';
                echo 'Swal.fire({';
                echo '    icon: "error",';
                echo '    title: "Erreur!",';
                echo '    text: "Aucune plante trouvée pour cette famille",';
                echo '    showConfirmButton: false,';
                echo '    timer: 3000';
                echo '});';
                echo '</script>';
            }
        } else {
            echo '<p class="text-red-600"> Pas de plante trouvée pour cette famille ... </p>';
        }
        ?>
    </div>

</body>

</html>

