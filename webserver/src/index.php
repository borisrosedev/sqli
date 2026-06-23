<?php 
session_start();
// ICI C'EST PHP !!!!
// Comment déclare-t-on une variable en php ?
$message = 'Login';  // j'initialise la variable message 
// elle stocke actuellement une chaîne de caractères "Login"


if (isset($_SESSION["id"]) && isset($_SESSION["role"])) {
    header("Location: dashboard.php");
} 
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bulma@1.0.4/css/bulma.min.css">
</head>

<body>

    <main style="min-height:100vh;display:flex;align-items:center;justify-content:center;">
        <!--
            On récupère les données via 
            le verbe HTTP POST plus sécurisé 
            que le verbe HTTP GET qui envoie 
            les credentials en clair dans l'URL

            action est l'attribut qui permet de
            dire où se trouve le gestionaire de traitement
            (handler) du formulaire 
            Si vous ne mettez pas de valeur , on déduit 
            que le programme de traitement du formulaire
            se trouve dans le même fichier que le formulaire

            Ici j'ai mis que le traitement du formulaire aurait lieu dans 
            le fichier login.php
        !-->
        <form method="POST" action="login.php">
            <header>
                <h1 class="title title-1 my-3"><?php echo $message . " | Bank "; ?></h1>
            </header>
            <div class="field">
                <p class="control has-icons-left has-icons-right">
                    <input
                        name="email"
                        class="input"
                        type="email"
                        placeholder="Email">
                    <span class="icon is-small is-left">
                        <i class="fas fa-envelope"></i>
                    </span>
                    <span class="icon is-small is-right">
                        <i class="fas fa-check"></i>
                    </span>
                </p>
            </div>
            <div class="field">
                <p class="control has-icons-left">
                    <input
                        name="password"
                        class="input"
                        type="text"
                        placeholder="Password">
                    <span class="icon is-small is-left">
                        <i class="fas fa-lock"></i>
                    </span>
                </p>
            </div>
            <div class="field">
                <p class="control">
                    <button class="button is-success">
                        Login
                    </button>
                </p>
            </div>


        </form>

    </main>
</body>

</html>