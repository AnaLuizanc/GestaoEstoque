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
    <div class="container" style="justify-content: center;margin-top:15%;">
        <div style="margin-top: 40px;">
            <h3>Cadastro de fornecedores</h3>
        </div>
        <form name="formulario" action="insere_fornecedor.php" method="post">
            <label for="">Nome</label>
            <input type="text" name="nome_fornecedor" class="form-control" autocomplete="new-password" required>
            <label for="">E-mail</label>
            <input type="text" name="email_fornecedor" class="form-control" autocomplete="off" required>
            <label for="">CNPJ</label>
            <input type="text" name="cnpj" class="form-control" autocomplete="off" required>
            <label for="">Telefone</label>
            <input type="text" name="telefone" class="form-control" autocomplete="new-password" required>
            <div style="text-align:center;margin:20px;">
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