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
    $categoria = $_POST['categoria'];
    $sql = "INSERT INTO categoria(categoria) VALUES ('$categoria')";
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
            Categoria salva com sucesso!
        </div>
    </div>
</body>
</html>