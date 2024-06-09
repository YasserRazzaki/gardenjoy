<?php 
     session_start();
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
    <title>Tutoriels</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<div class="bg-gray-100 p-4">
<div class="bg-gray-100 p-4">
    <h1 class="text-2xl font-bold mb-4">Tutoriels</h1>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
        <?php
        // Paramètres de connexion à la base de données
        $servername = "localhost";
        $username = "root";
        $password = "root";
        $database = "gardenjoy";

        // Connexion à la base de données
        $mysqli = new mysqli($servername, $username, $password, $database);

        // Vérification de la connexion
        if ($mysqli->connect_error) {
            die("Échec de la connexion à la base de données : " . $mysqli->connect_error);
        }

        // Récupération des données des tutoriels depuis la base de données
        $sql = "SELECT * FROM tutorials";
        $result = $mysqli->query($sql);

        if ($result->num_rows > 0) {
            // Affichage des tutoriels sous forme de cartes
            while ($row = $result->fetch_assoc()) {
                echo '<div class="bg-white rounded-lg shadow-md p-4">';
                echo '<h2 class="text-xl font-bold mb-2">' . $row["title"] . '</h2>';
                echo '<img src="' . $row["image"] . '" alt="Image du tutoriel" class="w-full mb-2">';
                echo '<p class="text-gray-700">' . $row["description"] . '</p>';
                echo '<p class="text-sm text-gray-500 mt-2">Auteur: ' . $row["author"] . '</p>';

                // Vérifie si l'utilisateur est l'auteur du tutoriel
                if ($_SESSION['username'] == $row["author"]) {
                    // Affiche des liens pour modifier et supprimer le tutoriel
                    echo '<div class="flex justify-between mt-4">';
                    echo '<a href="modifier_tutoriel.php?id=' . $row["id"] . '" class="text-green-500 hover:text-green-700 mr-2" title="Modifier">
                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" color="blue" class="w-6 h-6" viewBox="0 0 50 50">
                    <path d="M 43.125 2 C 41.878906 2 40.636719 2.488281 39.6875 3.4375 L 38.875 4.25 L 45.75 11.125 C 45.746094 11.128906 46.5625 10.3125 46.5625 10.3125 C 48.464844 8.410156 48.460938 5.335938 46.5625 3.4375 C 45.609375 2.488281 44.371094 2 43.125 2 Z M 37.34375 6.03125 C 37.117188 6.0625 36.90625 6.175781 36.75 6.34375 L 4.3125 38.8125 C 4.183594 38.929688 4.085938 39.082031 4.03125 39.25 L 2.03125 46.75 C 1.941406 47.09375 2.042969 47.457031 2.292969 47.707031 C 2.542969 47.957031 2.90625 48.058594 3.25 47.96875 L 10.75 45.96875 C 10.917969 45.914063 11.070313 45.816406 11.1875 45.6875 L 43.65625 13.25 C 44.054688 12.863281 44.058594 12.226563 43.671875 11.828125 C 43.285156 11.429688 42.648438 11.425781 42.25 11.8125 L 9.96875 44.09375 L 5.90625 40.03125 L 38.1875 7.75 C 38.488281 7.460938 38.578125 7.011719 38.410156 6.628906 C 38.242188 6.246094 37.855469 6.007813 37.4375 6.03125 C 37.40625 6.03125 37.375 6.03125 37.34375 6.03125 Z"></path>
                    </svg>
                  </a>';                  
                    echo '<a href="supprimer_tutoriel.php?id=' . $row["id"] . '" class="text-red-500 hover:text-red-700" title="Supprimer"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg></a>';
                    echo '</div>';
                }

                echo '</div>';
            }
        } else {
            echo '<p>Aucun tutoriel trouvé.</p>';
        }

        // Fermeture de la connexion à la base de données
        $mysqli->close();
        ?>
    </div>
    </div>
    </div>
</html>
