<?php
 require_once "conexao.php";

 $nome = $_POST['nome'];
 $cpf = $_POST['cpf'];
 $email = $_POST['email'];
 $senha = $_POST['senha'];

 $nova_senha = password_hash($senha, PASSWORD_DEFAULT);

 $nome_arquivo = $_FILES['foto']['name'];
 $caminho_temporario = $_FILES['foto']['tpm_name'];

 $extensao = pathinfo($nome_arquivo, PATHINFO_EXTENSION);

  $novo_nome = uniqid() .".". $extensao;

$caminho_destino = "fotos_user/".$novo_nome;

move_uploaded_file($caminho_temporario,$caminho_destino);

$sql = "INSERT INTO fuuncionario (nome,cpf,email,senha,foto) VALUES (?,?,?,?)";

$comando = mysqli_prepare($conexao, $sql);

mysqli_stmt_bind_param($comando, "sssss",$nome,$cpf,$email,$senha,$foto);

mysqli_stmt_execute($comando);

header("location:index.php");
?>