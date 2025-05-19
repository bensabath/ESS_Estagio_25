<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'meubanco';
$conn = mysqli_connect($host, $user, $pass, $db);
mysqli_set_charset($conn, "utf8");
if (!$conn) {
 die("Erro na ligação à base de dados: " . mysqli_connect_error());
}
?>