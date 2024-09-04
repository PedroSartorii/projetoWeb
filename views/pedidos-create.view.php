<form action="pedidos.php?acao=selecionar" method="POST">

<?php
  ?>
        <button>
            <span class="titulo">Seus pedidos</span>
            <span class="subtitulo">Conferir seus pedidos e status</span>

            <?php 
                if (isset($_POST['pedidos'])) {
                    header('Location: pedidos.php');
                    exit;
                } 
            ?>
        </button>

</form>
