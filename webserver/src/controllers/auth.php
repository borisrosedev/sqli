<?php
/**
 *  CE BLOC REPRESENTE LE HANDLER du formulaire
 */
if (isset($_POST["email"]) && isset($_POST["password"])) {

    $email = htmlspecialchars($_POST["email"]);
    $password = htmlspecialchars($_POST["password"]);

    $data_source_name='mysql:host='.DB_HOST.';dbname='.DB_NAME.';port='.DB_PORT; 
    
    /**
     * L'extension PHP Data Objects ( PDO ) définit une interface légère 
     * et cohérente pour accéder à une base de données depuis PHP
     */
    /** ORM PDO */

    try {
        $connection = new PDO($data_source_name,DB_USER,DB_PASS, 
                [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
            );

        
        $statement=$connection->query(
                "SELECT * FROM get_all_users_without_hash WHERE email='".$email."'");

        $user=$statement->fetchAll()[0]; 
        // $user=$statement->fetch(); // best practise
        /**
         * je veux stocker dans la variable $user
         * UNIQUEMENT la première ligne de toutes les lignes que tu me donnes
         */
        echo "<div class='message animate__animated animate__slideInDown'><div class='message-header'>🎉 Connection succeeded !</div><div class='message-body'>".$user["email"]."</div></div>";

    } catch(Exception $e) {
        throw new Exception("Erreur de connexion");
    }
    

}

?>