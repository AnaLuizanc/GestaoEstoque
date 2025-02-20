<?php
    include 'connection.php';
    $id = $_GET['id'];
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD PHP</title>
    <link rel="stylesheet"href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
</head>

<body>
    <div class="container" style="margin-top: 40px; width: 500px;" id="container">
        <div style="text-align: center;">
            <h3>Editar Categoria</h3>
        </div>
        <form action="_atualiza_categoria.php" method="post" style="margin-top: 20px">
            <?php
                //faz a busca no BD para trazer os dados do registro pelo id
                $sql = "SELECT * FROM categoria WHERE id_categoria = $id";
                $buscar = mysqli_query($con, $sql);
                $array = mysqli_fetch_array($buscar);   
                $id_categoria = $array['id_categoria'];
                $categoria = $array['categoria'];
                $status = $array['status'];
            ?>
            <input type="text" class="form-control" name="id" value="<?php echo $id_categoria ?>" style="display:none;">

            <div class="form-group">
                <label>Nome da categoria</label>
                <input type="text" class="form-control" name="categoria" value="<?php echo $categoria ?>">
            </div>
                <div class="form-group">
                    <label>Status</label>
                    <select class="form-control" name="status" id="status">
                        <option value="<?php echo $status ?>"><?php echo ucfirst($status)?></option>
                        <option value="ativo">Ativo</option>
                        <option value="inativo">Inativo</option>
                    </select>
                </div>
                <div style="text-align: right;">
                    <button type="submit" id="botao" class="btn btn-warning btn-sm">Atualizar</button>
                </div>
        </form>
    </div>
</body>
</html>