<?php
include("includes/config.php");
include("includes/header.php");
$mensagem = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = trim($_POST["nome"]);
    $preco = trim($_POST["preco"]);
    if (empty($nome) || empty($preco)) {
        $mensagem = "<div class='alert alert-danger'>Todos os campos são
obrigatórios.</div>";
    } elseif (!is_numeric($preco)) {
        $mensagem = "<div class='alert alert-warning'>O preço deve ser um
número válido.</div>";
    } else {
        $nome = mysqli_real_escape_string($conn, $nome);
        $preco = mysqli_real_escape_string($conn, $preco);
        $sql = "INSERT INTO produtos (nome, preco) VALUES ('$nome',
'$preco')";
        if (mysqli_query($conn, $sql)) {
            $mensagem = "<div class='alert alert-success'>Produto adicionado
com sucesso!</div>";
        } else {
            $mensagem = "<div class='alert alert-danger'>Erro ao adicionar: "
                . mysqli_error($conn) . "</div>";
        }
    }
}
?>
<h2 class="mb-4">Adicionar Novo Produto</h2>
<?php echo $mensagem; ?>
<form method="POST" class="mb-5">
    <div class="mb-3">
        <label for="nome" class="form-label">Nome do Produto</label>
        <input type="text" name="nome" id="nome" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="preco" class="form-label">Preço (€)</label>
        <input type="text" name="preco" id="preco" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary">Adicionar</button>
</form>
<a href="index.php" class="btn btn-secondary">Voltar à Lista</a>
<?php include("includes/footer.php"); ?>