<?php
 require_once "conexao.php";

 $titulo = $_POST['titulo'];
 $autor = $_POST['autor'];
 $anopublicacao = $_POST['anopublicacao'];
 $editora = $_POST['editora'];
 $genero = $_POST['genero'];


$sql = "INSERT INTO livro (titulo,autor,anopublicacao,editora,genero) VALUES (?,?,?,?,?)";

$comando = mysqli_prepare($conexao, $sql);

mysqli_stmt_bind_param($comando, "sssss",$titulo,$autor,$anopublicacao,$editora,$genero);

mysqli_stmt_execute($comando);



header("location:principal.php");
?>