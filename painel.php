<?php
session_start();

if(empty($_SESSION['logado']) || $_SESSION['logado'] == false){
    header('Location login.php');
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.simplecss.org/simple.min.css">
    
    
    <title>Sua conta</title>
</head>
<body>

    <header>
        <h1>Sua conta</h1>
        <p>Bem vindo a sua conta: <strong><?= $_SESSION['usuario']?></trong></p><br />


        <?php 

            require('controllers/feedback-create.controller.php');
            
        ?>

        

        <nav>
            <a href="logout.php">Sair</a>
        </nav>
            
</body>
</html>