
<?php
$conn = mysqli_connect("localhost", "root", "", "meubanco");

if (!$conn) {
    die("Erro na conexão: " . mysqli_connect_error());
}
?>