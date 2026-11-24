<?php

require_once "conexao.php";

if (!$conexao) {
    die("Erro na conexão: " . mysqli_connect_error());
}

echo "Conexão realizada com sucesso!<br>";

$banco = mysqli_query($conexao, "SELECT DATABASE()");

echo "Banco conectado: " . mysqli_fetch_row($banco)[0];

echo "<br><br>";

$consulta = mysqli_query($conexao, "DESCRIBE funcionario");

if (!$consulta) {
    die("Erro: " . mysqli_error($conexao));
}

while ($coluna = mysqli_fetch_assoc($consulta)) {
    echo $coluna['Field'] . "<br>";
}

?>