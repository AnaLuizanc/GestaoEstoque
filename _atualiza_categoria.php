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
        $categoria = $_POST['categoria'];
        $status = $_POST['status'];
        $sql = "UPDATE categoria SET categoria='$categoria', status='$status' WHERE id_categoria = $id";
        mysqli_query($con, $sql); //envia query para o BD
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
            Categoria atualizada com sucesso!
        </div>
    </div>
</body>
</html>