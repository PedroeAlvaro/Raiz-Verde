<?php
$host = "localhost";
$user = "root";    // Usuário padrão XAMPP
$pass = "";        // Senha padrão XAMPP
$db   = "raizverde";

// Conectar
$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}
?>