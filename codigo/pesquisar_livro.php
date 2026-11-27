<?php
if (isset($_GET['valor'])) {
    $valor = $_GET['valor'];
} else {
    $valor = "";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Livros</title>
    <style>
        div {
            border-style: solid;
            margin-top: 5px;
            margin-bottom: 5px;
            width: 240px;
        }
    </style>
</head>

<body>
    <h2>Pesquisa de Usuários</h2>

    <form action="pesquisar_livro.php">
        Nome ou apelido: <br>
        <input type="text" name="valor" value="<?php echo $valor; ?>">
        <br><br>
        <input type="submit" value="Pesquisar">

        <br><br>
       
    </form>

    <?php
    if (isset($_GET['valor'])) {
        if ($_GET['valor'] != "") {
            $valor = $_GET['valor'];
            $valor = "%" . $valor . "%";

            require_once "conexao.php";

            // SELECT * FROM usuario WHERE nome LIKE "%z%" OR apelido LIKE "%z%";
            $sql = "SELECT * FROM livro WHERE titulo LIKE ? OR autor LIKE ?";
            $comando = mysqli_prepare($conexao, $sql);

            mysqli_stmt_bind_param($comando, "ss", $valor, $valor);

            mysqli_stmt_execute($comando);
            $livros = mysqli_stmt_get_result($comando);

            while ($livro = mysqli_fetch_array($livros)) {
    ?>
                <div>
                    <p>Nome: <?php echo $livro['titulo']; ?></p>
                    <p>Autor: <?php echo $livro['autor']; ?></p>

                </div>
            <?php
            }
        } else {
            ?>
            <p>Digite algo para pesquisar</p>
        <?php
        }
    } else {
        $valor = "";
        ?>
        <p>Digite algo para pesquisar</p>
    <?php
    }
    ?>
    <br>
     <a href="tela_principal.php">Voltar...</a>
</body>

</html>