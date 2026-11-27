
<?php

require_once "conexao.php";

$data_entrega = $_POST['data_entrega'];
$data_recebimento = $_POST['data_recebimento'];

$idleitor = $_POST['idleitor'];
$idfuncionario = $_POST['idfuncionario'];

// Verifica se um livro foi selecionado
if (isset($_POST['livros']) && count($_POST['livros']) == 1) {

    $idlivro = $_POST['livros'][0];

    $sql = "INSERT INTO emprestimo
    (data_entrega, data_recebimento, idleitor, idlivro, idfuncionario)
    VALUES (?, ?, ?, ?, ?)";

    $comando = mysqli_prepare($conexao, $sql);

    mysqli_stmt_bind_param(
        $comando,
        "ssiii",
        $data_entrega,
        $data_recebimento,
        $idleitor,
        $idlivro,
        $idfuncionario
    );

    if (mysqli_stmt_execute($comando)) {

        header("location:index.php");
        exit;

    } else {

        echo "Erro ao salvar empréstimo!";

    }

} else {

    echo "Selecione apenas um livro!";

}

?>
