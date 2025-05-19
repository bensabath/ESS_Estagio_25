<?php
include('config/init.sql');
include("includes/header.php");
$result = mysqli_query($conn, "SELECT * FROM produtos");
echo "<h2 class='mb-3'>Produtos disponíveis:</h2><ul class='listunstyled'>";
while ($row = mysqli_fetch_assoc($result)) {
 echo "<li class='mb-1'>• {$row['nome']} - {$row['preco']} €</li>";
}
echo "</ul>";
include("includes/footer.php");
?>