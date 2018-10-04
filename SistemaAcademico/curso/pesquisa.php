<!DOCTYPE html>
<html>
    <head>
        <title>Cursos</title>
        <meta charset="utf-8">
<!--        <link href="../css/estilo.css" rel="stylesheet">-->
       <style>
          #customers {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

#customers td, #customers th {
    border: 1px solid #ddd;
    padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #4CAF50;
    color: white;
}
.btn{
    font-family: arial;
    font-size: 14px;
    border: none;
    padding: 10px;
    cursor: pointer;
    background-color:green;
    margin-top: 10px;
}

       </style>


    </head>
    <body>
        <div id="interface">

            <?php
            //session_start();
            include '../cabecalho.php';
            include '../bd/conectar.php';

            $a = $_GET['a'];

            if ($a == "buscar") {
                $pesquisaCurso = trim($_POST['pesquisaCurso']);
                $sql = "select curso.id, curso.nome, curso.descricao, curso.carga_horaria, curso.anoInicio, curso.semestreInicio, curso.anoTermino, curso.semestreTermino, tipo.nome as tipo_nome, turno.nome as turno_nome 
                        from tipo join curso on curso.tipo_id = tipo.id join turno on turno.id=curso.turno_id where curso.nome like '" . $pesquisaCurso . "%'  order by curso.nome";
                $resultado = mysqli_query($conexao, $sql);
                $numRegistros = mysqli_num_rows($resultado);
                if ($numRegistros != 0) {
                    ?>
                    <form action="excluir_lote.php" method="post">   

                        <table id="customers">
                            <caption>Cursos Cadastrados</caption>
                            <tr>
                                <td class="cc">Selecionar</td><td class="cc">Tipo</td><td class="cc">Nome</td><td class="cc">Descrição</td><td class="cc">Carga horária</td><td class="cc">Ano de início</td><td class="cc">Semestre de início</td><td class="cc">Ano de término</td><td class="cc">Semestre de término</td><td class="cc">Turno</td><td class="ce">Excluir</td><td class="ca">Alterar</td>
                            </tr>
                            <?php
                            while ($linha = mysqli_fetch_array($resultado)) {
                                ?>
                                <tr>
                                    <td><input type="checkbox" name="id[]" value="<?= $linha['id'] ?>"</td>
                                    <td><?= $linha['tipo_nome'] ?></td>
                                    <td><?= $linha['nome'] ?></td>
                                    <td><?= $linha['descricao'] ?></td>
                                    <td><?= $linha['carga_horaria'] ?></td>
                                    <td><?= $linha['anoInicio'] ?></td>
                                    <td><?= $linha['semestreInicio'] ?></td>
                                    <td><?= $linha['anoTermino'] ?></td>
                                    <td><?= $linha['semestreTermino'] ?></td>
                                    <td><?= $linha['turno_nome'] ?></td>

                                    <td><a href="excluir.php?id=<?= $linha['id'] ?>">
                                            <img src="../img/excluir2.png" height="30" width="30"/></a></td>

                                    <td><a href="form_alterar.php?id=<?= $linha['id'] ?>">
                                            <img src="../img/alterar2.png" height="30" width="30"/></a></td>
                                </tr>
                                <?php
                            }
                            ?>
                        </table>
                        <input class = "btn" type = "submit" value = "Excluir">

                    </form>
                </div>
                <?php
            } else {
                echo "<script>alert('Nenhum curso foi encontrado com o nome $pesquisaCurso')</script>";
            }
            ?>


            <?php
        }
        require_once '../rodape.php';
        ?>
    