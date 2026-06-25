<?php 

if (isset($_POST["register_email"]) && isset($_POST["register_password"])) {

    $registered_email=$_POST["register_email"];
    $is_true_email=filter_var($registered_email,FILTER_VALIDATE_EMAIL);
    $sanitized_email = $is_true_email;


    if(is_bool($is_true_email)) {
        echo "<div class='custom-fixed-top m-5 message is-danger animate__animated animate__slideInDown'><div class='message-header'>Invalid information</div><div class='message-body'>Invalid email</div></div>";
    } else {

        $registered_password=trim(htmlspecialchars($_POST["register_password"]));
        $pdo = new Database(DB_HOST,DB_NAME,DB_PORT,DB_USER,DB_PASS);

        $query=$pdo->prepare("SELECT * FROM dpo_get_users_with_password_view WHERE email=:email");
        $stmt=$query->execute(["email" => $registered_email]);

        if($query->fetch()) {
            echo "<div class='custom-fixed-top m-5 message is-danger animate__animated animate__slideInDown'><div class='message-header'>Invalid information</div><div class='message-body'>Invalid Email</div></div>";
        } else {
                   $insertion_query=$pdo->prepare("INSERT INTO users(username,email,password_hash) VALUES(?,?,?);"); 
                   $username = explode("@", $sanitized_email)[0];
                   $password_hash=password_hash($registered_password,PASSWORD_BCRYPT);
                   $insertion_query->execute([$username,$sanitized_email ,$password_hash]);
                   sleep(2);
                   header("Location: index.php");
                   exit;
                         
        }


    }



}

