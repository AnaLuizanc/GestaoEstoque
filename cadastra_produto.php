<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<?php
    session_start();
    if (!isset($_SESSION['usuario'])) {
        header('Location: index.php');
    }
?>

<body>
    <div class="container" style="justify-content: center;">
        <div style="margin-top: 40px;">
            <h3>Cadastro de produtos</h3>
        </div>
        <form name="formulario" action="insere_produto.php" method="post">
            <label for="">Código</label>
            <input type="text" name="codigo" class="form-control" autocomplete="new-password" required>
            <label for="">Produto</label>
            <input type="text" name="produto" class="form-control" autocomplete="off" required>
            <label for="">Saldo</label>
            <input type="text" name="saldo" class="form-control" autocomplete="off" required>
            <label for="">Tipo</label>
            
            <input type="radio" name="tipo" value="nacional">
            <label for="">Nacional</label>
            <input type="radio" name="tipo" value="importado">
            <label for="">Importado</label><br>

            <label for="">Preço</label>
            <input type="text" name="preco_compra" class="form-control" autocomplete="new-password" required>
            <label for="">Fornecedor</label>
            <?php            
                include 'connection.php';

                if(!$con)
                    die("Falha na conexão: " . mysqli_connect_error());

                $sql = "SELECT id_fornecedor, nome_fornecedor FROM fornecedor";
                $result = mysqli_query($con, $sql);
            ?>
            <select name="fornecedor" class="form-control" required>
                <option value="" disabled selected>Selecione um fornecedor</option>
                <?php
                    if($result->num_rows > 0) {
                        //Exibe cada fornecedor como uma opção no select
                        while($row = $result->fetch_assoc())
                            echo "<option value='" . $row['id_fornecedor'] . "'>" . $row['id_fornecedor'] . " - " . $row['nome_fornecedor'] . "</option>";
                    }
                    else
                        echo "<option value='' disabled>Nenhum fornecedor encontrado</option>";
                    $con->close();
                ?>
            </select>

            <label for="">Categoria</label>
            <?php            
                include 'connection.php';

                if(!$con)
                    die("Falha na conexão: " . mysqli_connect_error());

                $sql = "SELECT id_categoria, categoria FROM categoria";
                $result = mysqli_query($con, $sql);
            ?>
            <select name="categoria" class="form-control" required>
                <option value="" disabled selected>Selecione uma categoria</option>
                <?php
                    if($result->num_rows > 0) {
                        //Exibe cada fornecedor como uma opção no select
                        while($row = $result->fetch_assoc())
                            echo "<option value='" . $row['id_categoria'] . "'>" . $row['id_categoria'] . " - " . $row['categoria'] . "</option>";
                    }
                    else
                        echo "<option value='' disabled>Nenhum fornecedor encontrado</option>";
                    $con->close();
                ?>
            </select>
            
            <div style="text-align:center;margin:20px;display:flex;justify-content:space-evenly;">
                <div>
                    <a href="cadastra_fornecedor.php" role="button" class="btn btn-success" style="background-color:#2a8bf6">Cadastrar fornecedor</a>
                    <a href="cadastra_categoria.php" role="button" class="btn btn-success" style="background-color:#b32abf">Cadastrar categoria</a>
                </div>
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#confSalvar">Cadastrar</button>
            </div>
        </form>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="confSalvar" role="dialog">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header" >
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Confirma cadastro</h4>
                </div>
                <div class="modal-body">
                    <p>Deseja confirmar o cadastro?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" onclick="javascript: document.formulario.submit();" class="btn btn-success"
                        data-dismiss="modal">Sim</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Não</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>

</body>
</html>