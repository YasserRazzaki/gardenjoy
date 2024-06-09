<?php session_start();

// Vérifie si l'utilisateur est connecté
if (!isset($_SESSION['user_id'])) {
    // Redirigez l'utilisateur vers la page de connexion
    header("Location: login.php");
    exit(); // Assurez-vous de quitter le script après la redirection
}

require('./test.php'); ?> 
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Découvrez nos recommandations du jour</title>
    
    <!-- Ajouter les liens vers les fichiers CSS de Slick Carousel -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css"/>
    
    <!-- Ajouter jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    <!-- Ajouter le fichier JavaScript de Slick Carousel -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
</head>
<?php
$trefle_api_key = 'toV0euDXox1vvvvVmJwUxTAIvElcqVPSYlDAWKrYdo4';
$random_page = rand(1, 10); // Génère un nombre aléatoire pour la page
$random_plants_url = 'https://trefle.io/api/v1/plants?token=' . $trefle_api_key . '&page=' . $random_page . '&page_size=4';

// Récupérer quelques plantes aléatoires
$ch = curl_init($random_plants_url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);

if(curl_errno($ch)) {
    echo 'Erreur lors de l\'exécution de la requête cURL : ' . curl_error($ch);
} else {
    $decoded_response = json_decode($response, true);
    
    // Diviser les plantes en groupes de quatre
    $plants_groups = array_chunk($decoded_response['data'], 4);
    
    // Faire quelque chose avec la réponse JSON, par exemple l'afficher
    echo '<div class="container mx-auto px-8 py-8">';
    echo '<h1 class="text-3xl font-bold mb-8 text-center">Découvrez nos recommandations du jour</h1>';
    
    // Affichage du carrousel
    echo '<div class="slick-carousel">';
    
    // Boucler à travers chaque groupe de quatre plantes
    foreach ($plants_groups as $group) {
        echo '<div>';
        echo '<div class="flex flex-wrap justify-center">';
        
        
        // Boucler à travers chaque plante dans le groupe
        foreach ($group as $plant) { 
      
            echo '<div class="w-full md:w-full lg:w-1/4 px-4 mb-8">';
            echo '<div class="flex flex-col items-center justify-center">';
            echo '<img alt="' . $plant['common_name'] . '" class="w-full h-64 object-cover rounded-lg transition duration-300 ease-in-out transform hover:scale-105 cursor-pointer" src="' . $plant['image_url'] . '" onclick="redirectToPlantDetails(' . htmlspecialchars(json_encode($plant), ENT_QUOTES, 'UTF-8') . ')" />';
            echo '<p class="text-center mt-2">' . $plant['common_name'] . '</p>';
            echo '</div></div>';
        }
        
        echo '</div></div>';
    }
    
    echo '</div>'; // Fermeture de la classe slick-carousel
    
    echo '</div>'; // Fermeture de la classe container
}

curl_close($ch);

?>

<script>
    // Fonction pour rediriger l'utilisateur vers la page de détails de la plante
    function redirectToPlantDetails(plant) {
        // Récupérer l'URL de la page de détails de la plante
        var plantDetailsUrl = 'plant_details.php?id=' + plant.id; // Assurez-vous d'avoir une page plant_details.php pour afficher les détails de la plante
        
        // Rediriger l'utilisateur vers la page de détails de la plante
        window.location.href = plantDetailsUrl;
    }
    
    // Initialisation du carrousel avec Slick Carousel
    $('.slick-carousel').slick({
        slidesToShow: 2,
        slidesToScroll: 1,
        dots: true,
        arrows: true,
        infinite: true,
        autoplay: true,
        autoplaySpeed: 8000,
    responsive: [
        {
            breakpoint: 1024, // Taille de l'écran à partir de laquelle vous souhaitez modifier le nombre d'images affichées
            settings: {
                slidesToShow: 1 // Afficher trois images à la fois sur les écrans plus petits que 1024px
            }
        },
        {
            breakpoint: 768, // Taille de l'écran à partir de laquelle vous souhaitez modifier le nombre d'images affichées
            settings: {
                slidesToShow: 1 // Afficher deux images à la fois sur les écrans plus petits que 768px
            }
        }
    ]}
    );
</script>
</html>