<?php
session_start();

// Vérifiez si l'utilisateur est déjà connecté
if (isset($_SESSION['user_id'])) {
    // Rediriger vers la page d'accueil si l'utilisateur est déjà connecté
    header("Location: home.php");
    exit();
}

// Vérifiez si le formulaire de connexion a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Connexion à la base de données (assurez-vous de remplacer les valeurs par les vôtres)
    $conn = mysqli_connect("localhost", "root", "root", "gardenjoy");

    // Vérifier la connexion
    if (!$conn) {
        die("Échec de la connexion à la base de données: " . mysqli_connect_error());
    }

    // Récupérer l'email ou le nom d'utilisateur et le mot de passe du formulaire
    $identifier = $_POST['identifier']; // Peut être soit l'email soit le nom d'utilisateur
    $password = $_POST['password'];

    // Requête SQL pour sélectionner l'utilisateur en fonction de l'email ou du nom d'utilisateur
    $sql = "SELECT * FROM utilisateurs WHERE email = '$identifier' OR nom = '$identifier'";

    // Exécutez la requête
    $result = mysqli_query($conn, $sql);

    // Vérifiez si l'utilisateur existe
    if (mysqli_num_rows($result) == 1) {
        $user = mysqli_fetch_assoc($result);
        // Vérifiez si le mot de passe est correct
        if ($password === $user['mot_de_passe']) {
            // Mot de passe correct, connectez l'utilisateur
            $_SESSION['user_id'] = $user['id']; // Stockez l'ID de l'utilisateur dans la session
            $_SESSION['username'] = $user['nom']; // Stockez le nom d'utilisateur dans la session
            header("Location: home.php"); // Redirigez l'utilisateur vers la page de bienvenue après connexion
            exit();
        } else {
            // Mot de passe incorrect
            $error_message = "Mot de passe incorrect";
        }
    } else {
        // Utilisateur non trouvé
        $error_message = "Aucun utilisateur trouvé avec cet email ou nom d'utilisateur";
    }

    // Fermez la connexion à la base de données
    mysqli_close($conn);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Document</title>
</head>
<body class="max-h-screen">
<section class="border-red-500 bg-gray-200 min-h-screen flex items-center justify-center">
    <div class="bg-gray-100 p-5 flex rounded-2xl shadow-lg max-w-3xl">
        <div class="w-full px-5">
            <h2 class="text-xl font-bold text-[#002D74]">GardenJoy</h2>
            <p class="text-sm">Welcome in GardenJoy ! We are a platform dedicated to help gardening enthusiasts ! </p> <?php if (isset($error_message)) : ?>
                <p class="text-sm mt-4 text-red-500"><?php echo $error_message; ?></p>
            <?php endif; ?>
            <div class="mt-7 grid grid-cols-3 items-center text-gray-500">
                <hr class="border-gray-500" />
                <p class="text-center text-sm">Login Here</p>
                <hr class="border-gray-500" />
            </div>
            <form class="mt-6" method="POST" action="">
                <div>
                    <label class="block text-gray-700">Email Address or Username</label>
                    <input type="text" name="identifier" placeholder="Email Address or Username" class="w-full px-4 py-3 rounded-lg bg-gray-200 mt-2 border focus:border-blue-500 focus:bg-white focus:outline-none" autofocus required>
                </div>

                <div class="mt-4">
                    <label class="block text-gray-700">Password</label>
                    <input type="password" name="password" placeholder="Enter Password" class="w-full px-4 py-3 rounded-lg bg-gray-200 mt-2 border focus:border-blue-500 focus:bg-white focus:outline-none" required>
                </div>

                <div class="text-right mt-2">
                    <a href="./signup.php" class="text-sm font-semibold text-gray-700 hover:text-blue-700 focus:text-blue-700">Register</a>
                </div>

                <button type="submit" class="w-full block bg-blue-500 hover:bg-blue-400 focus:bg-blue-400 text-white font-semibold rounded-lg px-4 py-3 mt-6">Log In</button>
            </form>
        </div>
        <div class="w-full md:block hidden ">
            <img src="https://plus.unsplash.com/premium_photo-1667311649552-2cfab63bdcfc?q=80&w=1000&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MXx8bmF0dXJlJTIwaW1hZ2VzfGVufDB8fDB8fHww" class="rounded-2xl" alt="page img">
        </div>
    </div>
</section>
</body>
</html>

<style>
        @import url('https://fonts.googleapis.com/css2?family=Outfit&family=Poppins:wght@300&display=swap');

        * {
            font-family: "Poppins";
        }
    </style>