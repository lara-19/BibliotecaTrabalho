<?php

session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
     <form action="form_livro.php" method="post">
        <h1>Escolha um Livro</h1>
        <select name=livro>

        <?php

        require_omce "conexao.php";

        $sql = "SELECT * FROM livros";

        $comando = mysqli_prepare($conexao,$sql);
        mysqli_stmt_execute($comando);
        $livros mysqli_stmt_get_result($comando);

        while ($livro = mysqli_fetch_array($livros)) {
        
            $livro_id = $livro['idlivro'];
            $livro_titulo = $livro['titulo'];

            echo "<option value='$livro_id'>$livro_titulo</option>";

        }
        ?>

         </select> <br><br>

        <input type="submit" value="Avançar">

    </form>

</body>
</html>