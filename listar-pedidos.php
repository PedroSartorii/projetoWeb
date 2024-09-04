<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.simplecss.org/simple.min.css">
    <link rel="stylesheet" href="css/painel.css">
    
    <title>Pedidos</title>
</head>
<body>

    <div class="container">
    <h1>Pedidos</h1>

<?php 

        require('controllers/pedidos-list.controller.php');
    
?>


        
        <nav>
            <a href="pedidos.php">Voltar</a>
        </nav>
</div>
</body>
</html>