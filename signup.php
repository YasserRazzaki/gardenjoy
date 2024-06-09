<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Register</title>
</head>
<body>
<div class="min-h-screen bg-gray-200 flex flex-col justify-center py-12 sm:px-6 lg:px-8">
    <div class="sm:mx-auto sm:w-full sm:max-w-md">
        <img class="mx-auto h-10 w-auto" src="https://www.svgrepo.com/show/301692/login.svg" alt="Workflow">
        <h2 class="mt-6 text-center text-3xl leading-9 font-extrabold text-gray-900">
            Create a new account
        </h2>
        <p class="mt-2 text-center text-sm leading-5 text-gray-500 max-w">
            Or
            <a href="./login.php" class="font-medium text-blue-600 hover:text-blue-500 focus:outline-none focus:underline transition ease-in-out duration-150">
                login to your account
            </a>
        </p>
    </div>

    <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
        <div class="bg-white py-8 px-4 shadow sm:rounded-lg sm:px-10">
            <form method="POST" action="">
                <div>
                    <input type="hidden" id="image_selected" name="image_selected" value="">
                    <label for="name" class="block text-sm font-medium leading-5 text-gray-700">Name</label>
                    <div class="mt-1 relative rounded-md shadow-sm">
                        <input id="name" name="name" placeholder="John Doe" type="text" required="" value="" class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                        <div class="hidden absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-red-500" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                      d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                      clip-rule="evenodd">
                                </path>
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="mt-6">
                    <label for="email" class="block text-sm font-medium leading-5 text-gray-700">
                        Email address
                    </label>
                    <div class="mt-1 relative rounded-md shadow-sm">
                        <input id="email" name="email" placeholder="user@example.com" type="email" required="" value="" class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                        <div class="hidden absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-red-500" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                      d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                      clip-rule="evenodd"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="mt-6">
                    <label for="password" class="block text-sm font-medium leading-5 text-gray-700">
                        Password
                    </label>
                    <div class="mt-1 rounded-md shadow-sm">
                        <input id="password" placeholder="password.com" name="password" type="password" required="" class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                    </div>
                </div>

                <div class="mt-6">
                    <label for="name" class="block text-sm font-medium leading-5 text-gray-700">
                        Ville
                    </label>
                    <div class="mt-1 rounded-md shadow-sm">
                        <input id="ville" placeholder="ville" name="ville" type="text" required="" class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                    </div>
                </div>

                <div class="mt-6">
                    <label for="number" class="block text-sm font-medium leading-5 text-gray-700">
                        Code Postal
                    </label>
                    <div class="mt-1 rounded-md shadow-sm">
                        <input id="number" placeholder="code postal" name="code_postal" type="number" required="" class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                    </div>
                </div>

                <div class="mt-6">
                    <label for="name" class="block text-sm font-medium leading-5 text-gray-700">
                        Profile Picture
                    </label>
                    <div class="mt-1 rounded-md shadow-sm">
                        <input id="image_profil" placeholder="ville" name="image_profil" type="text" required="" class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                    </div>
                </div>

                <div class="mt-6">
                    <span class="block w-full rounded-md shadow-sm">
                        <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition duration-150 ease-in-out">
                            Create account
                        </button>
                    </span>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
// Connexion à la base de données
$conn = mysqli_connect("localhost", "root", "root", "gardenjoy");

// Vérifier la connexion
if (!$conn) {
    die("Échec de la connexion à la base de données: " . mysqli_connect_error());
}

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $name = mysqli_real_escape_string($conn, $_POST['name'] ?? '');
    $email = mysqli_real_escape_string($conn, $_POST['email'] ?? '');
    $password = mysqli_real_escape_string($conn, $_POST['password'] ?? '');
    $ville = mysqli_real_escape_string($conn, $_POST['ville'] ?? '');
    $code_postal = mysqli_real_escape_string($conn, $_POST['code_postal'] ?? '');
    $image_profil = mysqli_real_escape_string($conn, $_POST['image_profil'] ?? '');

    // Requête d'insertion des données dans la table des utilisateurs
    $sql = "INSERT INTO utilisateurs (nom, email, mot_de_passe, ville, code_postal, image_profil) VALUES ('$name', '$email', '$password', '$ville', '$code_postal', '$image_profil')";

    // Exécuter la requête
    if (mysqli_query($conn, $sql)) {
        // Afficher une notification de succès avec SweetAlert
        echo '<script>';
        echo 'Swal.fire({';
        echo '    icon: "success",';
        echo '    title: "Success!",';
        echo '    text: "New user added successfully!",';
        echo '    showConfirmButton: false,';
        echo '    timer: 2000';
        echo '}).then(() => {';
        echo '    window.location.href = "./login.php";'; // Redirection vers la page de connexion
        echo '});';
        echo '</script>';
    } else {
        // Afficher une notification d'erreur avec SweetAlert
        echo '<script>';
        echo 'Swal.fire({';
        echo '    icon: "error",';
        echo '    title: "Error!",';
        echo '    text: "Error adding user: ' . mysqli_error($conn) . '"';
        echo '});';
        echo '</script>';
    }
}

// Fermer la connexion à la base de données
mysqli_close($conn);
?>
</body>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Outfit&family=Poppins:wght@300&display=swap');
    * {
        font-family: "Poppins";
    }
    .selected {
        border: 4px solid limegreen;
    }
</style>
</html>
