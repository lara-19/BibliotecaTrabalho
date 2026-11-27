<?php
require_once "conexao.php";

$sql = "SELECT * FROM livro";
$resultado = mysqli_query($conexao, $sql);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<h2>Empréstimos</h2>

<form action="salvar_emprestimo.php" method="post">

Data de Entrega:<br>
<input type="date" name="data_entrega"><br><br>

<br>
Data de Delução:<br>
<input type="date" name="data_recebimento">
<br><br>

Selecione um livro:<br>

 <?php
    while ($livro = mysqli_fetch_array($resultado)) {
    ?>

        <input type="checkbox"
               name="livros[]"
               value="<?php echo $livro['idlivro']; ?>">

        <?php echo $livro['titulo']; ?>

        <br>

    <?php
    }
    ?>

<input type="submit" name="Salvar"
    
</body>
</html>