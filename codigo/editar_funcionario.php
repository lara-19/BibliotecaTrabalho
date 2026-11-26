<?php
session_start();

if (!isset($_SESSION['idfuncionario'])) {
    header("Location: index.php");
    exit;
}

header("Location: form_funcionario.php?editar=1");
exit;
?>