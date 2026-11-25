<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Usuario</h1>
    <?php
    $query_funcionario ="SELECT id, nome FROM funcionario";
    $resultado_funcionario = prepare($query_funcionario)
    $resultado_funcionario = execute();

    
    ?>
</body>
</html>