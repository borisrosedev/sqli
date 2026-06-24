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

        
        $statement=$connection->prepare(
                "SELECT * FROM get_all_users_without_hash WHERE email=:email", [PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY]);
        
        $statement->execute(['email' => $email]);

        

        $user=$statement->fetchAll()[0]; 
        // $user=$statement->fetch(); // best practise
            /**
             * je veux stocker dans la variable $user
             * UNIQUEMENT la première ligne de toutes les lignes que tu me donnes
             */
            sleep(2);
        if (!$user) {
            echo "<div class='m-5 message is-danger animate__animated animate__slideInDown'><div class='message-header'>Connection failed</div><div class='message-body'>Try again</div></div>";
        

        
        } else {

            // IMPORTANT : aucun echo ici, sinon header()/setcookie() seraient ignorés
            // ("headers already sent"). On pose la session puis on redirige.
            setcookie("token", $user["id"], time() + 1000 * 60 * 3, "", "", false, true);

            $_SESSION["id"] = $user["id"];
            $_SESSION["username"] = $user["username"];
            $_SESSION["email"] = $user["email"];

            header("Location: index.php");
            exit;

        }

    } catch(Exception $e) {
       
        throw new Exception("Erreur de connexion");
    }
    

}

?>