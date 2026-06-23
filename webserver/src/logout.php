<?php 

session_start();
session_unset();
session_destroy();

/**
 * La personne qui a cliqué sur le bouton Deconnection de la page dashboard.php st arrivé ici
 * Or ici on supprime tous les éléments de session et on redirige l'utilisateur vers index.php
 */

header("Location: index.php");




?>