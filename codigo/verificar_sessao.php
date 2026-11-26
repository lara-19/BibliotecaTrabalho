<?php
session_start();

if (!isset($_SESSION['idfuncionario'])) {
    header("Location: ../principal.php");
}
?>