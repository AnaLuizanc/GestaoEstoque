<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Lista fornecedores</title>
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
        <h3>Lista de produtos</h3>
        <div style="text-align: right; margin-top: 20px;">
            <a href="cadastra_produto.php" role="button" class="btn btn-success btn-sm">Cadastrar produto</a>
        </div>
        <br>
        <table id="table_id" class="table">
            <thead>
                <tr>
                    <th scope="col">Código</th>
                    <th scope="col">Produto</th>
                    <th scope="col">Saldo</th>
                    <th scope="col">Tipo</th>
                    <th scope="col">Categoria</th>
                    <th scope="col">Fornecedor</th>
                    <th scope="col">Operações</th>
                </tr>
            </thead>
            <?php
                include 'connection.php';
                $sql = "SELECT * FROM produto";
                $busca = mysqli_query($con, $sql);
                while($array = mysqli_fetch_array($busca)){
                    $codigo = $array['codigo'];
                    $produto = $array['produto'];
                    $saldo = $array['saldo'];
                    $tipo = $array['tipo'];
                    $categoria_id_categoria = $array['categoria_id_categoria'];
                    $fornecedor_id_fornecedor = $array['fornecedor_id_fornecedor'];

                    $sql_categoria = "SELECT categoria FROM categoria WHERE id_categoria = $categoria_id_categoria";
                    $busca_categoria = mysqli_query($con, $sql_categoria);
                    while($array_categoria = mysqli_fetch_array($busca_categoria)){
                        $nome_categoria = $array_categoria['categoria'];
                    }

                    $sql_fornecedor = "SELECT nome_fornecedor FROM fornecedor WHERE id_fornecedor = $fornecedor_id_fornecedor";
                    $busca_fornecedor = mysqli_query($con, $sql_fornecedor);
                    while($array_fornecedor = mysqli_fetch_array($busca_fornecedor)){
                        $nome_fornecedor = $array_fornecedor['nome_fornecedor'];
                    }
            ?>
                    <tr>
                        <td><?php echo $codigo ?></td>
                        <td><?php echo $produto ?></td>
                        <td><?php echo $saldo ?></td>
                        <td><?php echo $tipo ?></td>
                        <td><?php echo $nome_categoria ?></td>
                        <td><?php echo $nome_fornecedor ?></td>
                        <td>
                            <a title="Editar" href="edita_produto.php?id=<?php echo $codigo ?>" role="button"
                            class="btn btn-warning btn-sm"><i class="far fa-edit"></i>&nbsp; Editar</a>
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