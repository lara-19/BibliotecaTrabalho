<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
     
    <h1>Formulário de Livros</h1>

    <form action="salvar_livro.php" method="post">

      Título:<br>
      <input type="text" name="titulo">
      <br><br>
      Autor:<br>
      <input type="text" name="autor">
      <br><br>
      Ano de publicação:<br>
      <input type="date" name="anopublicacao">
      <br><br>
      Editora:<br>
      <input type="text" name="editora">
      <br><br>
      Gênero:<br>
      <input type="text" name="genero">
      <br><br>
      
      <input type="submit" name="Cadastar livro">
</body>
</html>