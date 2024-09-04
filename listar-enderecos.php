<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.simplecss.org/simple.min.css">
    <link rel="stylesheet" href="css/painel.css">
    
    <title>Endereços</title>
</head>
<body>

    <div class="container">
    <h1>Endereços</h1>

<?php 

        require('controllers/endereco-list.controller.php');
    
?>


        
        <nav>
            <a href="endereco.php">Voltar</a>
        </nav>
</div>
</body>
</html>