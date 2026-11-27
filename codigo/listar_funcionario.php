
<?php
require_once "conexao.php";

$sql = "SELECT * FROM funcionario";

$funcionario = mysqli_prepare($conexao, $sql);
mysqli_stmt_execute($funcionario);
$funcionarios = mysqli_stmt_get_result($funcionario);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Listar Funcionario</title>
</head>
<body>

<h2>Lista de Funcionario</h2>

<table border="1">
    <tr>
        <th>ID</th>
        <th>nome</th>
        <th>cpf</th>
        <th>email</th>
        <th>senha</th>
        <th>Foto</th>
        <th>Ação</th>
    </tr>

    <?php
    while ($l = mysqli_fetch_array($funcionarios)) {
    

    echo "<tr>";
        echo "<td> {$l['idfuncionario']} </td>";
        echo "<td>{$l['nome']} </td>";
        echo "<td>{$l['cpf']} </td>";
        echo "<td>{$l['email']} </td>";
        echo "<td>{$l['senha']} </td>";
        echo "<td>{$l['foto']} </td>";
        echo "<td><a href='editar_funcionario.php?id={$l['idfuncionario']}'>Editar</a></td>";
    echo "</tr>";

    
    }
    ?>


</table>
    <br>
        <a href="tela_principal.php"> Voltar </a>
</body>
</html>
