
<?php
require_once "conexao.php";

$id = $_GET['id'];

$sql = "SELECT * FROM livro WHERE idlivro = ?";

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
    <title>Editar Livro</title>
</head>
<body>

<h1>Editar Livro</h1>

<form action="resultado_livro.php" method="post">

    <input type="hidden" name="idlivro"
    value="<?php echo $l['idlivro']; ?>">

    Título:<br>
    <input type="text" name="titulo"
    value="<?php echo $l['titulo']; ?>">
    <br><br>

    Autor:<br>
    <input type="text" name="autor"
    value="<?php echo $l['autor']; ?>">
    <br><br>

    Ano de publicação:<br>
    <input type="date" name="anopublicacao"
    value="<?php echo $l['anopublicacao']; ?>">
    <br><br>

    Editora:<br>
    <input type="text" name="editora"
    value="<?php echo $l['editora']; ?>">
    <br><br>

    Gênero:<br>
    <input type="text" name="genero"
    value="<?php echo $l['genero']; ?>">
    <br><br>

    <input type="submit" value="Salvar alterações">

</form>

</body>
</html>
