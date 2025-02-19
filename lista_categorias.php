<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Adicionar categoria</title>
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css">
</head>

<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header('Location: index.php');
}
?>

<body style="margin-right: 16px;">

    <div style="margin-top: 40px;">
        <h3>Lista de categorias</h3>
        <div style="text-align: right; margin-top: 20px;">
            <a href="cadastra_categoria.php" role="button" class="btn btn-success btn-sm">Cadastrar categoria</a>
        </div>
        <br>
        <table id="table_id" class="table">
            <thead>
                <tr>
                    <th scope="col">Descrição da categoria</th>
                    <th scope="col">Status</th>
                    <th scope="col">Operações</th>
                </tr>
            </thead>
            <?php
                include 'connection.php';
                $sql = "SELECT * FROM categoria";
                $busca = mysqli_query($con, $sql);
                while($array = mysqli_fetch_array($busca)){
                    $id_categoria = $array['id_categoria'];
                    $categoria = $array['categoria'];
                    $status = $array['status'];
                    if($status == "inativo") $estilo = "<span style='color:red;'>$status</span>";
                    else $estilo = $status;
                    ?>
                    <tr>
                        <td><?php echo $categoria ?></td>
                        <td><?php echo $estilo ?></td>
                        <td>
                            <a title="Editar" href="edita_categoria.php?id=<?php echo $id_categoria ?>" role="button"
                            class="btn btn-warning btn-sm"><i class="far fa-edit"></i>&nbsp; Editar</a>
                            <a title="Excluir" href="deleta_categoria.php?id=<?php echo $id_categoria ?>" role="button"
                            class="btn btn-danger btn-sm"><i class="far fa-trash-alt"></i>&nbsp; Excluir</a>
                        </td>
                    </tr>
                    <?php } ?>
        </table>
    </div>
    
    <script src="js/jquery-3.4.1.slim.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript" charset="utf8" src="js/jquery.dataTables.js"></script>

    <script>
        $(document).ready(function (){
            $('#table_id').DataTable({
                "language": {
                    "lengthMenu": "Mostrando _MENU_ registros por página",
                    "zeroRecords": "Nada encontrado",
                    "info": "Mostrando _PAGE_ de _PAGES_",
                    "infoEmpty": "Nenhum registro encontrado",
                    "infoFiltered": "(Filtrado de _MAX_ registros totais)",
                    "search": "Pesquisar:",
                    "paginate": {
                        "first": "Primeira",
                        "last": "&Uacute;ltima",
                        "next": "Pr&oacute;xima",
                        "previous": "Anterior"
                    },
                    "infoFiltered": "(Filtrado de _MAX_ registros no total)"
                }
            });
        });
    </script>

</body>
</html>