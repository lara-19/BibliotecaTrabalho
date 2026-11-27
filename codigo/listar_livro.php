
<?php
require_once "conexao.php";

$sql = "SELECT * FROM livro";

$livro = mysqli_prepare($conexao, $sql);
mysqli_stmt_execute($livro);
$livros = mysqli_stmt_get_result($livro);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Listar Livros</title>
</head>
<body>

<h2>Lista de Livros</h2>

<table border="1">
    <tr>
        <th>ID</th>
        <th>Título</th>
        <th>Autor</th>
        <th>Ano de Publicação</th>
        <th>Editora</th>
        <th>Gênero</th>
        <th>Ação</th>
    </tr>

    <?php
    while ($l = mysqli_fetch_array($livros)) {
    

    echo "<tr>";
        echo "<td> {$l['idlivro']} </td>";
        echo "<td>{$l['titulo']} </td>";
        echo "<td>{$l['autor']} </td>";
        echo "<td>{$l['anopublicacao']} </td>";
        echo "<td>{$l['editora']} </td>";
        echo "<td>{$l['genero']} </td>";
        echo "<td><a href='editar_livro.php?id={$l['idlivro']}'>Editar</a></td>";
    echo "</tr>";

    
    }
    ?>


</table>

</body>
</html>
