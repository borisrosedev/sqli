<?php 



if(isset($_POST["amount"]) && isset($_POST["target_account_id"])) {
    $amount = (int)htmlspecialchars($_POST["amount"]);
    $target_account = htmlspecialchars($_POST["target_account_id"]);
    
    if($amount < 0) {
        echo "<div class='custom-fixed-top m-5 message is-danger animate__animated animate__slideInDown'><div class='message-header'>Connection failed</div><div class='message-body'>The amount must be greater than 0</div></div>";
    } else {
        $pdo = new Database(DB_HOST,DB_NAME,DB_PORT,DB_USER,DB_PASS);
        $query=$pdo->prepare("SELECT * FROM accounts WHERE user_id = ?");
        $query->execute([$_SESSION["id"]]);
        $current_user_account=$query->fetch();
        if($current_user_account["balance"] < $amount) {
            echo "<div class='m-5 message is-danger animate__animated animate__slideInDown'><div class='message-header'>Connection failed</div><div class='message-body'>Insuffisant balance</div></div>";
        } else {
            try {
                $pdo->beginTransaction();
                $update_target_account_query=$pdo->prepare("UPDATE accounts SET balance = balance + ? WHERE id = ?");
                $update_target_account_query->execute([$amount,$target_account]);
                $update_current_user_account_query=$pdo->prepare("UPDATE accounts SET balance = balance - ? WHERE user_id = ?");
                $update_current_user_account_query->execute([$amount,$_SESSION["id"]]);
                $pdo->commit();
            } catch (Exception $e) {
                $pdo->rollBack();
                throw $e;
            }

        }



    }
}