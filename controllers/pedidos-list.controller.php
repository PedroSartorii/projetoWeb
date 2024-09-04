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

    public function query($sql) {
        return $this->conn->query($sql);
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

    public function getAllOrders() {
        $sql = "SELECT * FROM pedidos";
        $result = $this->db->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "Produto: " . $row["produto"] . "<br>";
                echo "Quantidade: " . $row["quantidade"] . "<br>";
                echo "Peso: " . $row["peso"] . "<br>";
                echo "Previsão de Entrega: " . $row["entrega"] . "<br>";
                echo "<a href='editar-pedidos.php?id=" . $row["id"] . "'>Editar</a> ";
                echo "<a href='excluir-pedidos.php?id=" . $row["id"] . "' onclick='return confirm(\"Tem certeza que deseja excluir este endereço?\")'>Excluir</a>";
                echo "<br><br>";
            }
        } else {
            echo "Nenhum pedido cadastrado.";
        }
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
$order->getAllOrders();

$db->close();

?>


