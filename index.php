<?php
// Traitement de la soumission du formulaire
include ("backend.php");
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    //...


} if (isset($_POST['action']) && $_POST['action'] === 'logout') {
    logoutUser();
    header('Location: index.php');
    exit();
} elseif (isset($_POST['action']) && $_POST['action'] === 'publish') {
    $title = $_POST['title'];
    $content = $_POST['content'];
    saveArticle($title, $content);
}elseif (isset($_POST['action']) && $_POST['action'] === 'login') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    if (authenticateUser($username, $password)) {
    header('Location: index.php');
    exit();
}else {echo "Please enter the correct login details";}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Publication d'articles</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="container">
        <h1>Publication d'articles</h1>
        <?php  if (!isUserLoggedIn()) { ?>
            <form method="post" action="index.php" class="articleForm">
                <input type="hidden" name="action" value="login">
                <input type="text" name="username" placeholder="Nom d'utilisateur" required>
                <input type="password" name="password" placeholder="Mot de passe" required>
                <button type="submit">Se connecter</button>

                <?php //if... : 
                ?>

                <p><?php }else{ ?></p>
            <?php   ?>
            </form>

            <?php //... 
            ?>

            <form id="articleForm" class="articleForm" method="post" action="index.php">
                <input type="hidden" name="action" value="publish">
                <input type="text" name="title" id="title" placeholder="Titre de l'article" required>
                <textarea name="content" id="content" placeholder="Contenu de l'article" required></textarea>
                <button type="submit">Publier</button>
            </form>
            <form method="post" action="index.php">
                <input type="hidden" name="action" value="logout">
                <button type="submit">Se déconnecter</button>
            </form>
            <?php }//... 
            ?>

            <div id="articles">
                <?php
                // Afficher les articles existants depuis le fichier texte :)
                $articles = array_reverse(file('articles.txt'));
                foreach ($articles as $article) {
                    list($title, $content) = explode('|', $article);
               
                    echo "<article><h2>$title</h2><p>$content</p></article>";
                }
                ?>
            </div>
    </div>


</body>

</html>