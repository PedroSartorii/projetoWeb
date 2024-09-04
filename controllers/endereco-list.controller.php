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

class Address {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getAllAddresses() {
        $sql = "SELECT * FROM endereco";
        $result = $this->db->query($sql);
    
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "Rua: " . $row["rua"] . "<br>";
                echo "Número: " . $row["num"] . "<br>";
                echo "CEP: " . $row["cep"] . "<br>";
                echo "Cidade: " . $row["cidade"] . "<br>";
                echo "<a href='editar-enderecos.php?id=" . $row["id"] . "'>Editar</a> ";
                echo "<a href='excluir-endereco.php?id=" . $row["id"] . "' onclick='return confirm(\"Tem certeza que deseja excluir este endereço?\")'>Excluir</a>";
                echo "<br><br>";
            }
        } else {
            echo "Nenhum endereço cadastrado.";
            echo "<br><br>";
        } 
    }

    public function deleteAddress($id) {
        $sql = "DELETE FROM endereco WHERE id = $id";
        $result = $this->db->query($sql);

        if ($result === TRUE) {
            return true;
        } else {
            return false;
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

$address = new Address($db);

if (isset($_GET['id'])) {
    $addressId = $_GET['id'];
    $deleted = $address->deleteAddress($addressId);

    if ($deleted) {
        echo "<div class='success-message'>Endereço excluído com sucesso.</div>";
        echo "<br>";
        echo "<a href='listar-enderecos.php'>Voltar</a> ";
    } else {
        echo "<div class='error-message'>Erro ao excluir endereço.</div>";
    }
}

$address->getAllAddresses();

$db->close();

?>
