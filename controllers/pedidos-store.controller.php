<?php

class DatabaseConnection {
    private $servername;
    private $username;
    private $password;
    private $dbname;
    private $conn;

    public function __construct($servername, $username, $password, $dbname) {
        $this->servername = $servername;
        $this->username = $username;
        $this->password = $password;
        $this->dbname = $dbname;
    }

    public function connect() {
        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);

        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    public function prepare($sql) {
        return $this->conn->prepare($sql);
    }

    public function close() {
        $this->conn->close();
    }
}

class Order {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function insertOrder($produto, $quantidade, $peso, $entrega) {
        $stmt = $this->db->prepare('INSERT INTO pedidos (produto, quantidade, peso, entrega) VALUES (?, ?, ?, ?)');
        $stmt->bind_param('ssss', $produto, $quantidade, $peso, $entrega);
        
        if (!$stmt->execute()) {
            die('Erro ao inserir dados no banco de dados: ' . $stmt->error);
        }
        
        $stmt->close();
    }
}

// Configuração da conexão com o banco de dados
$servername = "127.0.0.1";
$username = "root";
$password = "1443";
$dbname = "projeto";

// Criação dos objetos e execução do código
$db = new DatabaseConnection($servername, $username, $password, $dbname);
$db->connect();

$order = new Order($db);

if (isset($_POST) && count($_POST) > 0) {
    $produto = $_POST['produto'] ?? '';
    $quantidade = $_POST['quantidade'] ?? '';
    $peso = $_POST['peso'] ?? '';
    $entrega = $_POST['entrega'] ?? '';

    if ($produto == '' || $quantidade == '' || $peso == '' || $entrega =='') {
        header('Location: pedidos.php?acao=erro-campos');
        exit;
    } else {
        $order->insertOrder($produto, $quantidade, $peso, $entrega);
       
        $msg = "Produto: $produto <br />Quantidade: $quantidade <br />Peso: $peso kg<br /> Previsão de entrega: $entrega <br />";
        echo $msg;
    }
} else {
    header('Location: pedidos.php');
    exit;
}

$db->close();

?>