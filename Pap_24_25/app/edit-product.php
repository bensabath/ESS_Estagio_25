<?php
include("includes/config.php");
include("includes/header.php");


$id = $_GET['id'] ?? null;
$mensagem = "";
if (!$id) {
 echo "<div class='alert alert-danger'>ID inválido.</div>";
 include("includes/footer.php");
 exit;
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
 $nome = mysqli_real_escape_string($conn, $_POST["nome"]);
 $preco = mysqli_real_escape_string($conn, $_POST["preco"]);
 if (mysqli_query($conn, "UPDATE produtos SET nome='$nome', preco='$preco' WHERE id=$id")) {
 $mensagem = "<div class='alert alert-success'>Produto atualizado com sucesso.</div>";
 } else {
 $mensagem = "<div class='alert alert-danger'>Erro ao atualizar.</div>";
 }
}
$dados = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM produtos WHERE id = $id"));
?>
<h2>Editar Produto</h2>
<?php echo $mensagem; ?>
<form method="POST">
 <div class="mb-3">
 <label for="nome" class="form-label">Nome</label>
 <input type="text" name="nome" value="<?php echo $dados['nome']; ?>" class="form-control">
 </div>
 <div class="mb-3">
 <label for="preco" class="form-label">Preço</label>
 <input type="text" name="preco" value="<?php echo $dados['preco']; ?>" class="form-control">
 </div>
 <button type="submit" class="btn btn-primary">Guardar Alterações</button>

 <a href="index.php" class="btn btn-secondary">Cancelar</a>
</form>
<?php include("includes/footer.php"); 