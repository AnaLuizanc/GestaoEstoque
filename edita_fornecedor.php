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
            <h3>Editar Fornecedor</h3>
        </div>
        <form action="_atualiza_fornecedor.php" method="post" style="margin-top: 20px">
            <?php
                //faz a busca no BD para trazer os dados do registro pelo id
                $sql = "SELECT * FROM fornecedor WHERE id_fornecedor = $id";
                $buscar = mysqli_query($con, $sql);
                $array = mysqli_fetch_array($buscar); 
                $id_fornecedor = $array['id_fornecedor'];
                $nome_fornecedor = $array['nome_fornecedor'];
                $email_fornecedor = $array['email_fornecedor'];
                $cnpj = $array['cnpj'];
                $telefone = $array['telefone'];
                $status = $array['status'];
            ?>
            <input type="text" class="form-control" name="id" value="<?php echo $id_fornecedor ?>" style="display:none;">

            <div class="form-group">
                <label>ID</label>
                <input type="number" class="form-control" name="id_fornecedor" disabled value="<?php echo $id_fornecedor ?>">
                <br><label>Nome</label>
                <input type="text" class="form-control" name="nome_fornecedor" value="<?php echo $nome_fornecedor ?>">
                <label>E-mail</label>
                <input type="text" class="form-control" name="email_fornecedor" value="<?php echo $email_fornecedor ?>">
                <label>CNPJ</label>
                <input type="number" class="form-control" name="cnpj" value="<?php echo $cnpj ?>">
                <label>Telefone</label>
                <input type="number" class="form-control" name="telefone" value="<?php echo $telefone ?>">
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