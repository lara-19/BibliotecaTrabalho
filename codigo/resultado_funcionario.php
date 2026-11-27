
<?php
require_once "conexao.php";

$id = $_POST['idfuncionario'];
$nome = $_POST['nome'];
$cpf = $_POST['cpf'];
$email = $_POST['email'];
$senha = $_POST['senha'];

if ($_FILES['foto']['name'] != "") {

    $nome_arquivo = $_FILES['foto']['name'];

    $caminho_temporario = $_FILES['foto']['tmp_name'];

    $extensao = pathinfo($nome_arquivo, PATHINFO_EXTENSION);

    $novo_nome = uniqid() . "." . $extensao;

    $caminho_destino = "fotos_user/" . $novo_nome;

    move_uploaded_file($caminho_temporario, $caminho_destino);

    $foto = $novo_nome;

} else {

    $sql2 = "SELECT foto FROM funcionario WHERE idfuncionario = ?";

    $comando2 = mysqli_prepare($conexao, $sql2);

    mysqli_stmt_bind_param($comando2, "i", $id);

    mysqli_stmt_execute($comando2);

    $resultado = mysqli_stmt_get_result($comando2);

    $l = mysqli_fetch_array($resultado);

    $foto = $l['foto'];

}

$sql = "UPDATE funcionario SET nome = ?, cpf = ?, email = ?, senha = ?, foto = ? WHERE idfuncionario = ?";

$comando = mysqli_prepare($conexao, $sql);

mysqli_stmt_bind_param($comando, "sssssi", $nome, $cpf, $email, $senha, $foto, $id);

mysqli_stmt_execute($comando);

header("location: listar_funcionario.php");

exit;
?>
