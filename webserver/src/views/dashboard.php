<?php 

$pdo = new Database(DB_HOST,DB_NAME,DB_PORT,DB_USER,DB_PASS);

$query=$pdo->prepare("SELECT dto.*, a.balance,a.id as account_id,a.user_id FROM  get_all_users_without_hash dto JOIN accounts a ON dto.id = a.user_id");
$query->execute([]);
$error = null;
$user_balance = null;
if(!$query) {
  $error = "no users";
} else {
    $users = $query->fetchAll();
    for($i=0; $i < count($users);$i++) {
        if ($users[$i]["id"] == $_SESSION["id"]) {
            $user_balance = $users[$i]["balance"]; 
        }
    }
}

?>


<main class="is-flex is-flex-direction-column p-5" style="min-height:100vh; align-items:center; justify-content:center;">

    <section class="is-flex is-flex-direction-column"style="width:400px" >
                <h1 class="title title-1 is-flex is-align-items-center"><img class="mr-5" src="./assets/bank.png" width="40" height="40" alt="logo of Bank App"> Bank | Dashboard </h1>

        <article class="message is-link">
        <div class="message-header">
            <p class="is-capitalized">Bonjour <?=  $_SESSION["username"] ?></p>
          
        </div>
        <?php if($user_balance !== null): ?>
        <div class="message-body">
            <p>Your current balance is:  <?= $user_balance ?></p>
        </div>
        <?php endif ?>
        </article>
        

        <?php if($user_balance == null): ?>
            <div class="message my-5">
                <div class="message-header">Create an account</div>
                <form class="message-body is-flex" method="POST" action="">
                    <input 
                        type="number" 
                        name="new_account_amount"
                        placeholder="Amount"
                        class="input mr-5"
                    />
                    <button class="button is-warning">Create</button>
                </form>
            </div>

        <?php endif ?>
        <div class="message my-5">
            <div class="message-header">Lend money to: </div>

            <div class="message-body">
                <?php if(!$users): ?>
                    <p>No one to lend money to for now - Try later</p>
                <?php else: ?>
                    <ul>    
                        <?php foreach($users as $user): ?>
                            <?php if($user["id"] !== $_SESSION["id"]): ?>
                            <li class="card">
                                <div  class="card-content is-capitalized" aria-label="name of contact">
                                     <p class="title is-5"><?= $user["username"] ?></p>
                                     <p class="subtitle is-6"><?="current balance: ".$user["balance"] ?></p>  

                                </div>
                                <footer class="card-footer">
                                    <form class="card-footer-item" method="POST" action="">
                                        <input name="amount" class="input mr-4" type="number" placeholder="Amount " />
                                        <input name="target_account_id" style="display:none" value="<?= $user["account_id"] ?>" />
                                        <button  class="button is-warning"type="submit">Submit</button>
                                    </form>
                                    
                                </footer>
                            </li>
                            <?php endif ?>
                        <?php endforeach ?>
                    </ul>
                <?php endif ?>
            </div>
        </div>
       
    </section>
    <section class="">
        <button id="logout-btn" class="button is-danger">Log out</button>        
    </section>

</main>