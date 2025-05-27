<?php
include("config/config.php");
$id = $_GET['id'] ?? null;
if ($id && is_numeric($id)) {
    mysqli_query($conn, "DELETE FROM produtos WHERE id = $id");
}
header("Location: index.php");
exit;
?>