<?php
$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'cadastro_de_cards';

$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}
?>
