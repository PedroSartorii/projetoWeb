<?php

class AddressController {
    public function showErrorMessage() {
        echo '<div class="error">Preencha todos os campos!</div>';
    }

    public function handleCreateAddress() {
        require('controllers/endereco-create.controller.php');
    }

    public function handleStoreAddress() {
        require('controllers/endereco-store.controller.php');
    }
}

?>

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
        $acao = $_GET['acao'] ?? 'endereco';

        $addressController = new AddressController();

        if ($acao == 'erro-campos') {
            $addressController->showErrorMessage();
        }

        if ($acao == 'cadastrar') {
            $addressController->handleStoreAddress();
        } else {
            $addressController->handleCreateAddress();
        }
        ?>

        <nav>
            <a href="listar-enderecos.php">Ver endereços</a>
        </nav>
        </p>
        <nav>
            <a href="painel.php">Voltar</a>
        </nav>
    </div>
</body>

</html>


