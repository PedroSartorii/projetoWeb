<form action="endereco.php?acao=selecionar" method="POST">
<style>
    button {
        border: none;
        background-color: #565656;
        padding: 20px;
        text-align: center;
      }

      button span.titulo {
        font-size: 24px;
        line-height: 1.2;
        display: block;
        color: white;
      }

      button span.subtitulo {
        font-size: 16px;
        line-height: 1.2;
        display:block;
        color: white;
      }

</style>


        <button>
            <span class="titulo">Endereços</span>
            <span class="subtitulo">Alterar endereços para pedidos</span>

            <?php 
                if (isset($_POST['enderecos'])) {
                    header('Location: endereco.php');
                    exit;
                } 
            ?>
        </button>

</form>
