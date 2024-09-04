<?php
require_once 'controllers/endereco-list.controller.php';

// Configuração da conexão com o banco de dados
$servername = "127.0.0.1";
$username = "root";
$password = "1443";
$dbname = "projeto";

$db = new DatabaseConnection($servername, $username, $password, $dbname);
$db->connect();

$address = new Address($db);

if (isset($_GET['id'])) {
    $addressId = $_GET['id'];
    $address->deleteAddress($addressId);
}

$db->close();
?>

