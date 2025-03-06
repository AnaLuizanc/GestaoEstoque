<!DOCTYPE html>
<html lang="pt-br">
<head>

<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css">
    <title>Document</title>
</head>

<?php
    include 'connection.php';
    $codigo = $_POST['codigo'];
    $produto = $_POST['produto'];
    $saldo = $_POST['saldo'];
    $tipo = $_POST['tipo'];
    $preco_compra = $_POST['preco_compra'];
    $dt_cadastro = date('Y-m-d H:i:s');
    $categoria_id_categoria = $_POST['categoria'];
    $fornecedor_id_fornecedor = $_POST['fornecedor'];

    $sql = "INSERT INTO produto(codigo,produto,saldo,tipo,preco_compra,dt_cadastro,categoria_id_categoria,fornecedor_id_fornecedor) VALUES ('$codigo','$produto','$saldo','$tipo','$preco_compra','$dt_cadastro','$categoria_id_categoria','$fornecedor_id_fornecedor')";
    mysqli_close($con);
?>

<script>    
    setTimeout(function() {
        history.go(-2);
    }, 2000);
</script>

<body>
    <div class="container">
        <div id="erro" class="alert alert-info">
            Produto salvo com sucesso!
        </div>
    </div>
</body>
</html>