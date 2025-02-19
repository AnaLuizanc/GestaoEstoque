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
            <h3>Cadastro de categorias</h3>
        </div>
        <form name="formulario" action="insere_categoria.php" method="post">
            <label for="">Nome da categoria</label>
            <input type="text" name="categoria" class="form-control" autocomplete="off" required>
            <div style="text-align:center;margin:20px;">
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#confSalvar" onclick="setCategoriaNome()">Cadastrar</button>
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
                    <p>Deseja confirmar cadastro de '<span id="categoriaNome"></span>'?</p>
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
    <script>
        function setCategoriaNome() {
            var categoria = document.querySelector('input[name="categoria"]').value;
            document.getElementById('categoriaNome').innerText = categoria;
        }
    </script>
</body>
</html>