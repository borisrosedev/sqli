<?php

if (!empty($_POST["new_account_amount"])) {
 
    $new_account_amount = filter_var((float)$_POST["new_account_amount"], FILTER_SANITIZE_NUMBER_FLOAT);

    if (!$new_account_amount) {
        echo "<div class='m-5 message is-danger animate__animated animate__slideInDown'><div class='message-header'>Invalid Information</div><div class='message-body'>The amount must be a number</div></div>";
    } else {
        $pdo = new Database(DB_HOST, DB_NAME, DB_PORT, DB_USER, DB_PASS);
        $query = $pdo->prepare("INSERT INTO accounts(user_id,balance) VALUES(?,?);");
        $query->execute([$_SESSION["id"], $new_account_amount]);
        header("Location: index.php");
        exit;
    }
}
