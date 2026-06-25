<?php

/**
 * form fields est un array / tableau associatif 
 * donc composé d'associations clef => valeur
 */
$form_fields = [
    "email" => [
        "title" => "Email",
        "placeholder" => "sandrine@gmail.com",
        "icon" => "fa-envelope",
        "type" => "email",
        "name" => "email"
    ],
    "password" => [
        "title" => "Password",
        "placeholder" => "**********",
        "icon" => "fa-lock",
        "type" => "password",
        "name" => "password"
    ],

];
/**
 * Vu que form_fields est un tableau on peut DONC ITERER VIA UNE BOUCLE !!!
 */




?>



<main class="is-flex is-flex-direction-column p-5" style="min-height:100vh; align-items:center; justify-content:center; ">
    <section style="width:400px" class="is-flex is-flex-direction-column">

        <h1 class="title title-1 is-flex is-align-items-center"><img class="mr-5" src="./assets/bank.png" width="40" height="40" alt="logo of Bank App"> Bank | Login </h1>
        <form id="login-form" class="is-flex is-flex-direction-column" method='POST' action=''>

            <!--- ITERATION -->

            <?php foreach ($form_fields as $f): ?>


                <div class="field">
                    <label
                        class="label">
                        <?= $f["title"] ?>
                    </label>
                    <div class="control has-icons-left has-icons-right">
                        <input
                            class="input"
                            type="<?= $f["type"] ?>"
                            placeholder="<?= $f["placeholder"] ?>"
                            name="<?= $f["name"] ?>">
                        <span class="icon is-left">
                            <i class="fas <?= $f["icon"] ?>"></i>
                        </span>

                    </div>
                </div>

            <?php endforeach ?>
            <!--- FIN ITERATATION -->
            <section class="is-flex">
                <button
                    class="button is-primary mr-5"
                    type="submit" id="submit-btn">Submit</button>
                <button
                    class="button is-danger"
                    id="reset-btn"
                    type="reset">Reset</button>
            </section>


        </form>


        <section class="my-5 message is-info slow">
            <div class="message-body ">
                <div class="is-flex is-justify-content-space-between">
                    <span class="icon-text has-text-info">
                        <span class="icon">
                            <i class="fas fa-info-circle"></i>
                        </span>         
                        <span>No account yet ...</span>     
                    </span> 
                    <button type="button" class="icon" role="button" id="signup-form-reveal-btn" tabindex="1">
                        <i id="signup-form-reveal-btn-icon" class="fas fa-angle-up" aria-hidden="true"></i>
                    </button>

                </div>
                <section id="signup-form-section" class="slow" style="height: 0;"></section>

                </p>
        </section>

    </section>
</main>