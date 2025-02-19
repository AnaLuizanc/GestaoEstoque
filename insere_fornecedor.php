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
    $nome_fornecedor = $_POST['nome_fornecedor'];
    $email_fornecedor = $_POST['email_fornecedor'];
    $cnpj = $_POST['cnpj'];
    $telefone = $_POST['telefone'];

    $sql = "INSERT INTO fornecedor(nome_fornecedor,email_fornecedor,cnpj,telefone) VALUES ('$nome_fornecedor','$email_fornecedor','$cnpj','$telefone')";
    mysqli_query($con, $sql);
?>

<script>    
    setTimeout(function() {
        history.go(-2);
    }, 2000);
</script>

<body>
    <div class="container">
        <div id="erro" class="alert alert-info">
            Fornecedor salvo com sucesso!
        </div>
    </div>
</body>
</html>