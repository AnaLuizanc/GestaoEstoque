<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>    
    <?php
        include 'connection.php';
        $id = $_POST['id'];
        $nome_fornecedor = $_POST['nome_fornecedor'];
        $email_fornecedor = $_POST['email_fornecedor'];
        $cnpj = $_POST['cnpj'];
        $telefone = $_POST['telefone'];
        $status = $_POST['status'];
        $sql = "UPDATE fornecedor SET nome_fornecedor='$nome_fornecedor',email_fornecedor='$email_fornecedor',cnpj='$cnpj',telefone='$telefone', status='$status' WHERE id_fornecedor = $id";
        mysqli_query($con, $sql); //envia query para o BD
        mysqli_close($con);
    ?>
    <script>
        setTimeout(function () {
            document.getElementById("erro").style.display = "none"; history.go(-2);
        }, 2000);
        function hide() {
            document.getElementById("erro").style.display = "none";
        }
    </script>
    <div class="container">
        <div id="erro" class="alert alert-info alert-dismissible fade show">
            Fornecedor atualizado com sucesso!
        </div>
    </div>
</body>
</html>