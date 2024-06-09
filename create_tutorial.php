<?php
require('./test.php');
if (!isset($_SESSION['user_id'])) {
    // Redirigez l'utilisateur vers la page de connexion
    header("Location: ./login.php");
    exit(); // Assurez-vous de quitter le script après la redirection
}
// Paramètres de connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "root";
$database = "gardenjoy";

// Connexion à la base de données
$conn = mysqli_connect($servername, $username, $password, $database);

// Vérifier la connexion
if (!$conn) {
    die("Échec de la connexion à la base de données: " . mysqli_connect_error());
}

// Vérification si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupération des données du formulaire
    $title = $_POST["title"];
    $description = $_POST["description"];
    $image_link = $_POST["image"];
    $author = $_SESSION["username"]; // Supposant que le nom d'utilisateur est stocké dans la session

    // Vérification des données
    if (empty($title) || empty($description) || empty($image_link) || empty($author)) {
        echo "Veuillez remplir tous les champs.";
    } else {
        // Préparation de la requête SQL d'insertion
        $sql = "INSERT INTO tutorials (title, description, image, author) VALUES (?, ?, ?, ?)";

        if ($stmt = mysqli_prepare($conn, $sql)) {
            // Liaison des paramètres à la requête
            mysqli_stmt_bind_param($stmt, "ssss", $title, $description, $image_link, $author);

            // Exécution de la requête
            if (mysqli_stmt_execute($stmt)) {
                echo '<script>';
                echo 'Swal.fire({';
                echo '    icon: "success",';
                echo '    title: "Success!",';
                echo '    text: "New article added successfully!",';
                echo '    showConfirmButton: false,';
                echo '    timer: 2000';
                echo '}).then(() => {';
                echo '    window.location.href = "./tutorials.php";'; // Redirection vers la page de connexion
                echo '});';
                echo '</script>';
                exit();
            } else {
                echo "Erreur lors de l'exécution de la requête : " . mysqli_stmt_error($stmt);
            }         

            // Fermeture de la déclaration
            mysqli_stmt_close($stmt);
        } else {
            echo "Erreur lors de la préparation de la requête : " . mysqli_error($conn);
        }
    }
}

// Fermeture de la connexion
mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer un tutoriel</title>
</head>
<div class="bg-gray-100 p-4">
    <div class="max-w-md mx-auto bg-white p-8 rounded-lg shadow-md">
        <h1 class="text-2xl font-bold mb-4">Créer un nouveau tutoriel</h1>
        <form action="" method="POST">
            <div class="mb-4">
                <label for="title" class="block text-gray-700 font-semibold">Title:</label>
                <input type="text" id="title" name="title" class="h-8 block w-full border border-gray-400 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>
            <div class="mb-4">
                <label for="description" class="block text-gray-700 font-semibold">Description:</label>
                <textarea id="description" name="description" rows="4" class="block w-full border border-gray-400 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" required></textarea>
            </div>
            <div class="mb-4">
                <label for="image" class="block text-gray-700 font-semibold">Image:</label>
                <input type="text" id="image" name="image" class="h-8 block w-full border border-gray-400 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">Create Tutorial</button>
        </form>
    </div>
</div>
</html>
