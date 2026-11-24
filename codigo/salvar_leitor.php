<?php
require_once "conexao.php";

$nome = $_POST['nome'];
$email = $_POST['email'];
$cpf = $_POST['cpf'];


$sql = "INSERT INTO leitor (nome, email, cpf) VALUES (?, ?, ?)";

$comando = mysqli_prepare($conexao, $sql);

mysqli_stmt_bind_param($comando, "sss", $nome, $email, $cpf);

mysqli_stmt_execute($comando);

header("Location: form_leitor.php");
?>