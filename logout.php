<?php
session_start(); // Démarrez la session pour pouvoir accéder aux variables de session

// Détruisez toutes les variables de session
$_SESSION = array();

// Si vous voulez détruire complètement la session, effacez également le cookie de session.
// Notez que cela détruira la session et pas seulement les données de session !
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// Finalement, détruisez la session.
session_destroy();

// Redirigez l'utilisateur vers la page de connexion ou une autre page appropriée
header("Location: ./login.php");
exit();