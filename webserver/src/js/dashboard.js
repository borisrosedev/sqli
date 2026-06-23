

/**
 * En javascript window ( la fenêtre de navigation de votre navigateur est un OBJET)
 * Alors que l'accès à une propriété ou une méthode d'un objet aurait été géré commme cela en php
 * window->onload en javascript et dans beaucoup d'autres langages de programme 
 * c'est window.onload on appelle cela la notation pointée 
 * Ici window.onload est l'évènement de  fin de chargement des informations de la fenêtre 
 * Quand cet événement survient on associe sa gestion à une fonction (){} on appelle cela un
 * gestionnaire d'événement 
 */
window.onload = function() {

    /**
     * Après l'événement les instructions ci-dessous sont exécutées
     * 
     * On stocke dans la variable immuable logoutBtn l'élément HTML qui a comme identifiant 
     * logout-btn , cet élément html vous pouvez le trouver dans le fichier dashboard.php
     * Il s'agit comme vous aurez pu le comprendre du bouton de déconnexion.
     */

    const logoutBtn = document.getElementById('logout-btn');


    /**
     * Ensuite lui-même je lui associe un gestionnaire de l'événement clic. Autrement dit 
     * si un utilisateur clique dessus il doit amener la personne sur la page logout.php
     * 
     */

    logoutBtn.addEventListener('click', function(){
        location.href = 'logout.php';
    })

}