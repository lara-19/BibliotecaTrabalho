<?php
require_once "conexao.php";

$id = $_POST['idlivro'];
$titulo = $_POST['titulo'];
$autor = $_POST['autor'];
$anopublicacao = $_POST['anopublicacao'];
$editora = $_POST['editora'];
$genero = $_POST['genero'];

$sql = "UPDATE livro SET titulo = ?, autor = ?, anopublicacao = ?, editora = ?, genero = ? WHERE idlivro = ?";

$comando = mysqli_prepare($conexao, $sql);
mysqli_stmt_bind_param($comando, "sssssi", $titulo, $autor, $anopublicacao, $editora, $genero, $id);
mysqli_stmt_execute($comando);
header("location: listar_livro.php");

exit;
?>
