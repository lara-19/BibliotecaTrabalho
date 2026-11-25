<?php
 require_once "conexao.php";

 $data_entrega = $_POST['data_entrega'];
 $data_recebimento = $_POST['data_recebimento'];

$sql = "INSERT INTO emprestimo(data_entrega,data_recebimento) VALUES (?,?)";

$comando = mysqli_prepare($conexao, $sql);

mysqli_stmt_bind_param($comando, "ii", $data_entrega, $data_recebimento);

mysqli_stmt_execute($comando);

header("location:index.php");

?>