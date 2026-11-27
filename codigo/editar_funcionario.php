<?php
require_once "conexao.php";

$id = $_GET['id'];

$sql = "SELECT * FROM funcionario WHERE idfuncionario = ?";

$comando = mysqli_prepare($conexao, $sql);

mysqli_stmt_bind_param($comando, "i", $id);

mysqli_stmt_execute($comando);

$resultado = mysqli_stmt_get_result($comando);

$l = mysqli_fetch_array($resultado);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Funcionario</title>
</head>
<body>

<h1>Editar Funcionario</h1>

<form action="resultado_funcionario.php" method="post" enctype="multipart/form-data"> </form>

    <input type="text" name="idfuncionario"
    value="<?php echo $l['idfuncionario']; ?>">

    Nome:<br>
    <input type="text" name="nome"
    value="<?php echo $l['nome']; ?>">
    <br><br>

    Cpf:<br>
    <input type="text" name="cpf"
    value="<?php echo $l['cpf']; ?>">
    <br><br>

    Email:<br>
    <input type="text" name="email"
    value="<?php echo $l['email']; ?>">
    <br><br>

    Senha:<br>
    <input type="text" name="senha"
    value="<?php echo $l['senha']; ?>">
    <br><br>

 
    Foto atual: <?php echo $l['foto']; ?>
    <br><br>

    <input type="submit" value="Salvar alterações">

</form>

</body>
</html>
