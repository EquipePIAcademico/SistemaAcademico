<?php
error_reporting(E_ALL ^ E_NOTICE);
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Excluir curso</title>
        <meta charset="utf-8">
        <!-- <link href="../css/estilo.css" rel="stylesheet">-->
        <style>
            h3{
                display: flex;
                justify-content: center;

            }
            .btn-continuar:hover {
                background-color:green; /* Green */
                color: white;

            }
            .btn-gerenciamento:hover{
                background-color:blue; /* Green */
                color: white;
            }
            .button{
                color: #2E2E2E;
                border: 2px solid #A4A4A4;
                cursor: pointer;
                border-radius: 5px;
                padding: 10px;
                font-size: 15px;

            }

            .btn-continuar{
                position: absolute;
                left: 460px;
                background-color: #ccc;

            }
            .btn-gerenciamento{
                background-color: #ccc;
                position: absolute;
                left: 590px;
            }
        </style>



        <?php
        ini_set("display_errors", true);

        include '../bd/conectar.php';
        include '../cabecalho.php';

        $id = $_POST['id'];
        $i = 0;
        
        foreach ($id as $value) {

            $sql_valid = "select distinct usuario.nome from usuario join turma on turma.professor_id=usuario.id where "
                    . "usuario.perfil_acesso='professor(a)' and turma.professor_id=$value";

            $retorno_valid = mysqli_query($conexao, $sql_valid);

            $resultado_valid = mysqli_fetch_array($retorno_valid);

            if ($resultado_valid == null) {
                $sql = "delete from usuario where id= $value";

                mysqli_query($conexao, $sql);
            }
            while ($i==0){
            ?>
        <h3 id="cadastro">Usuário excluído com sucesso!</h3>
        <a href=listar.php class="btn-gerenciamento button">Voltar para gerenciamento</a>
        <?php
        $i++;
            }
        //header('Location: listar.php');
    }

    if ($resultado_valid != null) {
        ?><h3 id="cadastro">Professor(es) associado(s) à turmas! Primeiramente deve-se excluir as turmas</h3>

        <a href=listar.php class="btn-gerenciamento button">Voltar para gerenciamento</a>

        <?php
    }
