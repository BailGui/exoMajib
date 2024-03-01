<?php
session_start();

// Vérifier si l'utilisateur est connecté
function isUserLoggedIn() {
    return isset($_SESSION['username']);
}

// Authentification de l'utilisateur (exemple très basique)
function authenticateUser($username, $password) {
    // Vérifiez les informations d'identification ici (vous devriez utiliser une base de données pour cela)
    // Pour cet exemple, nous définissons un utilisateur par défaut
    $default_username = "admin";
    $default_password = "password";

    if ($username === $default_username && $password === $default_password) {
        $_SESSION['username'] = $username;
        return true;
    } else {
        return false;
    }
}

// Déconnexion de l'utilisateur
function logoutUser() {
    unset($_SESSION['username']);
}

// Enregistrer un nouvel article
function saveArticle($title, $content) {
    // Stocker l'article dans un fichier texte (vous devriez utiliser une base de données pour cela)
    $article = $title . "|" . $content . PHP_EOL;
    file_put_contents('articles.txt', $article, FILE_APPEND);
}
?>
