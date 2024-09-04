<?php
    $usuario = $_POST['usuario'] ?? '';
    $senha = $_POST['senha'] ?? '';
    $erro = false;

    session_start();

    if($usuario == 'admin' && $senha == '123456'){
        $_SESSION['logado'] = true;
        $_SESSION['usuario'] = 'Administrador';

        header('Location: painel.php');
    } else if(!empty($_POST)) {
        $erro= true;
    }

    if(!empty($_SESSION['Logado']) && $_SESSION['Logado']) {
        header('Location: painel.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    
    <title>Login</title>
</head>
<body>
    <header>
        <h2>Entre em sua conta </h2>
    </header>

    <main>
        <form method="POST" action="index.php">
            <?php if ($erro) : ?>
                <div class="error">
                    Usuário ou Senha Inválidos! Tente Novamente.
                    <?php endif ?>
            </div>
            
            <label>Usuário: </label><br />
            <input type="text" name="usuario" placeholder="usuario"/><br />

            <label>Senha: </label><br />
            <input type="password" name="senha" placeholder="senha"/><br />

            <button>Entrar</button>
        </form>
    </main>
</body>
</html>
