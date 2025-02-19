<?php

$usuario = $_POST['inputUser'];
$senhausuario = $_POST['inputPassword'];

include 'connection.php';

if($connected){
    $sql = "SELECT * FROM usuarios WHERE nome_usuario = '$usuario' and senha = '$senhausuario' ";

    $buscar = mysqli_query($con, $sql);
    $total = mysqli_num_rows($buscar);

    if($total > 0) {
        $dados = mysqli_fetch_array($buscar);
        if($dados){
            session_start();
            $_SESSION['usuario'] = $dados['nome_usuario'];
            $_SESSION['permissao'] = $dados['permissao'];
            header("location: menu.php");
        }
    }else {
        echo ("<script>alert('Erro nos dados do Usuário/Senha!');</script>");
        echo "<meta HTTP-EQUIV='Refresh' target='_blank' CONTENT='0;URL=index.php'>";
    }
}

?>