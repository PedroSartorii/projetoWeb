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

class Address {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function insertAddress($rua, $num, $cep, $cidade) {
        $stmt = $this->db->prepare('INSERT INTO endereco (rua, num, cep, cidade) VALUES (?, ?, ?, ?)');
        $stmt->bind_param('ssss', $rua, $num, $cep, $cidade);
        
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

$address = new Address($db);

if (isset($_POST) && count($_POST) > 0) {
    $rua = $_POST['rua'] ?? '';
    $num = $_POST['num'] ?? '';
    $cep = $_POST['cep'] ?? '';
    $cidade = $_POST['cidade'] ?? '';

    if ($rua == '' || $num == '' || $cep == '' || $cidade == '') {
        header('Location: endereco.php?acao=erro-campos');
        exit;
    } else {
        $address->insertAddress($rua, $num, $cep, $cidade);
       
        $msg = "Rua: $rua <br />Número: $num <br />CEP: $cep <br />Cidade: $cidade";
        echo $msg;
    }
} else {
    header('Location: endereco.php');
    exit;
}

$db->close();

?>
