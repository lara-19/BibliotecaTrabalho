<?php
session_start();

if (!isset($_SESSION['idfuncionario'])) {
    header("Location: index.php");
    exit;
}

header("Location: form_funcionario.php?editar=1");
exit;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
     <form action="salvar_funcionario.php" method="post" enctype="multipart/form-data">

      <h1>Cadastro de funcionários.</h1>
      <br>

      Nome do funcionário: <br>
      <input type="text" name="nome" value="<?php echo $nome; ?>"> <br> 
      <br>

      CPF:<br>
      <input type="text" name="cpf" value="<?php echo $cpf; ?>"> <br>
      <br>

      Email do Funcionário: <br>
      <input type="text" name="email" value="<?php echo $email; ?>"> <br>
      <br>

      Senha:<br>
      <input type="text" name="senha"value="<?php echo $senha; ?>"> 
      <br>

      Foto: <br>
      <input type="file" name="foto"> <br>
      <br>
          
      <input type="submit" name="Cadastrar">
      
  </form>
</body>
</html>