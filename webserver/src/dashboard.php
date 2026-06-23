<?php
session_start();

if (!isset($_SESSION["id"]) && !isset($_SESSION["email"])) {
    header('Location: index.php');
}

$dsn = 'mysql:dbname=bank;host=mysql_lab;port=3306';
/**
 * On a préalablement défini un utilisateur app qui représente l'application
 * Ses droit sont limités à l'accès à 1 SEULE BASE DE DONNÉES 
 * On applique le principe de séparation des privilèges et plus particulièrement
 * le principe de moindre privilège 
 * On veut ABSOLUMENT EVITER UNE ESCALADE de privilèges.
 */
$user = 'app'; // 
$password = 'app';
try {
   $connection = new PDO($dsn, $user, $password);
   $stmt = $connection->query("SELECT * FROM dpo_get_users_view;");
   $db_users = $stmt->fetchAll();


} catch (PDOException $e) {
    die ($e->getMessage());
}

?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bank | Dashboard</title>
    
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bulma@1.0.4/css/bulma.min.css">
</head>

<body>

    <main class="is-flex is-flex-direction-column" style="min-height:100vh">

            <section class="p-5">
                <article class="message">
                    <div class="message-header">
                        Faire un prêt à:
                    </div>
                    <div class="message-body">
                        <? foreach ($db_users as $db_user): ?>
                            
                            <button class="button is-primary" style="text-transform:capitalize"><?=  $db_user["username"]; ?></button>


                        <? endforeach; ?>
                    </div>
                </article>
                <button id="logout-btn" class="button is-danger">Log out</button>

            </section>
          

        

    </main>
    <script src="./js/dashboard.js"></script>
</body>

</html>