<?php
session_start(); 
/** 
 * 
*/
require_once './config/config.php';
require_once './models/Database.php';
require_once './controllers/auth.php';
require_once './controllers/lend.php';


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bank</title>
    <link rel="icon" type="image/pgn" href="./assets/bank.png">
    <link rel="stylesheet" href="./css/global.css" >
     <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
  />
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bulma@1.0.4/css/bulma.min.css">
    <script src="https://kit.fontawesome.com/1b1fa6fbda.js" crossorigin="anonymous"></script>

</head>

<body>

    <?php if(isset($_SESSION["id"])): ?>
        <?php include './views/dashboard.php'?>
           <script type="module" src="./js/dashboard.js"></script>
    <?php else: ?>
        <?php include './views/login.php'?>
        <script type="module" src="./js/login.js"></script>
    <?php endif ?>
  

</body>

</html>