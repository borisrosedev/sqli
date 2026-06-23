<?php


/**
 * Si on s'arrête à cela c'est un ⚠️ DANGER pour 
 * le programme car cela sous-entend que l'on a une 
 * confiance AVEUGLE en l'utilisateur
 */

/**
 * Si et seulement si l'utilisateur a mis qqch dans le formulaire au niveau 
 * du champs email et aussi au niveau du champs password alors 
 * on exécute ce bloc de code.
 */
if (isset($_POST["email"]) && isset($_POST["password"])) {


    $user_email = $_POST["email"];
    $user_password = $_POST["password"];
    /* Comparer les informations de login de l'utilisateur
   par rapport aux enregistrements de la table 
   users.
*/

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

    

    /**
     * Le try catch permet de garantir la gestion de l'erreur 
     * Cela augmente la robustesse de l'application , sa capacité à tolérer 
     * la faute (l'erreur)
     */
    try {
        $connection = new PDO($dsn, $user, $password);
        session_start();
        echo "Connexion réussie";
     
        /**
         * Surtout ne jamais récupérer TOUT L'ENREGISTRE
         * Ne pas oublier le MOINDRE PRIVILEDE
         * Principe du NEED TO KNOW
         */
        $statement=$connection->query("SELECT * FROM users WHERE email = '$user_email' and password_hash = '$user_password'");


        /*
        * Le statement n'était pas exploitable par PHP donc 
        * j'ai appelé la méthode fetch du statement qui met de récuper tout sous forme 
        * d'un tableau [] 
        */
        $db_user = $statement->fetchAll()[0];
        

        /**
         * [
         *   "id" => id,
         *   "role" => 'user',
         *   "password_hash" => $ad$10...
         * ]
         */
        $_SESSION["id"] = $db_user["id"];
        $_SESSION["email"] = $db_user["email"];
        $_SESSION["role"] = $db_user["role"];


    } catch (PDOException $e) {
        die($e->getMessage());
    }


    /**
     * FIN DU BLOC CONDITIONNEL 
     */
}


?>

