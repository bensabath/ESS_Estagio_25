<?php
include("includes/config.php");
include("includes/header.php");

$result = mysqli_query($conn, "SELECT * FROM produtos");

echo "<h2 class='mb-4'>Produtos disponíveis:</h2>";
echo "<table class='table table-striped'>";
echo "<thead><tr><th>Nome</th><th>Preço (€)</th><th>Ações</th></tr></thead><tbody>";

while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>{$row['nome']}</td>";
    echo "<td>{$row['preco']}</td>";
    echo "<td>
        <a href='edit-product.php?id={$row['id']}' class='btn btn-sm btn-warning'>Editar</a>
        <a href='delete-product.php?id={$row['id']}' class='btn btn-sm btn-danger' onclick='return confirm(\"Tens a certeza que queres eliminar este produto?\")'>Eliminar</a>
    </td>";
    echo "</tr>";
}

echo "</tbody></table>";

include("includes/footer.php");
?>
