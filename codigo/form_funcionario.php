<?php



require_once "form_funcionario.php";

if (!isset($_GET['id'])) {
    //formulário em branco
    $id = 0;
    $nome = "";
    $cpf = "";
    $email = "";
    $senha = "";
    $foto = "";
} else {
    
    $id = $_GET['id'];

    $sql = "SELECT * FROM funcionario WHERE idfuncionario = $id";

    require_once "../conexao.php";
    $resultado = mysqli_query($conexao, $sql);

    $linha = mysqli_fetch_array($resultado);
    $nome = $linha['nome'];
    $cpf = $linha['cpf'];
    $email = $linha['email'];
    $senha = $linha['senha'];
    $foto = $linha['fotos'];
}

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

  <br>
       <a href="principal.php"> Voltar </a>

</body>
</html>
