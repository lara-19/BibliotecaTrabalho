
<?php
require_once "conexao.php";

$nome = $_POST['nome'];
$email = $_POST['email'];
$cpf = $_POST['cpf'];
$nova_senha = $_POST['senha'];
$foto = $_POST['foto'];


$senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);

$$nova_senha = password_hash($senha, PASSWORD_DEFAULT);

$nome_arquivo = $_FILES['foto']['name'];
$caminho_temporario = $_FILES['foto']['tmp_name'];

$extensao = pathinfo($nome_arquivo, PATHINFO_EXTENSION);

$novo_nome = uniqid() . "." . $extensao;

$caminho_destino = "fotos_user/" . $novo_nome;

move_uploaded_file($caminho_temporario, $caminho_destino);

$sql = "INSERT INTO leitor (nome, email, cpf, senha, foto) VALUES (?, ?, ?, ?, ?)";

$comando = mysqli_prepare($conexao, $sql);

mysqli_stmt_bind_param($comando, "sssss", $nome, $email, $cpf, $nova_senha, $foto);

mysqli_stmt_execute($comando);

header("Location: index.php");
?>
