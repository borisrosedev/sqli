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




<section class="p-5">

    <h1 class="title title-1">Bank | Login </h1>
    <form method='POST' action=''>

        <!--- ITERATION -->

        <?php foreach($form_fields as $f): ?>


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
                    name="<?= $f["name"] ?>"
                >
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
                type="submit">Submit</button>
            <button 
                class="button is-danger" 
                type="reset">Reset</button>
        </section>

    </form>

</section>