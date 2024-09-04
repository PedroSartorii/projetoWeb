<form action="pedidos.php?acao=cadastrar" method="POST">

    <p>
        <label>Produto:</label><br />
        <input type="text" name="produto" placeholder="Produto"/> 
    </p>
    <p>
        <label>Quantidade:</label><br />
        <input type="number" name="quantidade" placeholder="Quantidade"/> 
    </p>
    <p>
        <label>Peso:</label><br />
        <input type="number" name="peso" placeholder="Peso"/> 
    </p>
    <p>
        <label>Previsão de entrega:</label><br />
        <input type="date" name="entrega"/> 
    </p>
    <button>Cadastrar Pedido</button>
</form>