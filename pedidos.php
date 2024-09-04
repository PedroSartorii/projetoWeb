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
    <h1>Seus Pedidos</h1>


    <?php 

    $acao = $_GET['acao'] ?? 'pedido';

    if($acao =='erro-campos') {
        echo '<div class="error">Preencha todos os campos!</div>';
    }

    if($acao == 'cadastrar') {
        require('controllers/pedidos-store.controller.php');
    }else{
        require('controllers/pedidos-create.controller.php');
    }

?>

    <nav>
        <a href="listar-pedidos.php">Ver pedidos</a>
    </nav></p>
    <nav>
        <a href="painel.php">Voltar</a>
    </nav>
</div>
</body>
</html>