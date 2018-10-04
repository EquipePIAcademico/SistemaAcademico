<!DOCTYPE html>
<html>
    <head>
        <title>Cursos</title>
        <meta charset="utf-8">
     <!--   <link href="../css/estilo.css" rel="stylesheet">-->
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

body{
    background-color: #dddddd;
    color: rgba(0,0,0,1);
    font-family: sans-serif;
    font-size: 14px;
}
div#interface{
     background-color: white;
    width: 1250px;
    margin: 0px auto 10px auto;
    box-shadow: 0px 0px 10px;
    padding: 0px 30px 50px 30px;
    
}
.form-pesquisa{
    position: absolute;
    left: 900px;

   
}
       </style>
    </head>
    <body>
        <div id="interface">
            <?php
            //session_start();
            include '../cabecalho.php';

            include '../bd/conectar.php';
            ?>

            <form method="post" action="pesquisa.php?a=buscar" class="form-pesquisa">
                Pesquisar cursos: <input type="search" placeholder="Por nome" name="pesquisaCurso">
                <input class="btn" type="submit" value="Buscar">
            </form>

            <?php
            ini_set("display_errors", true);

            $sql = "select curso.id, curso.nome as curso_nome, curso.descricao, curso.carga_horaria, curso.anoInicio, curso.semestreInicio, curso.anoTermino, curso.semestreTermino, "
                    . "tipo.nome as tipo_nome, turno.nome as turno_nome from tipo join curso on curso.tipo_id = tipo.id join turno on turno.id=curso.turno_id order by curso_nome";

            $resultado = mysqli_query($conexao, $sql);
            ?>

            <form action="excluir_lote.php" method="post">   

                <table id="customers">
                    <caption>Cursos Cadastrados</caption>
                    <tr>
                        <td align="center" valign="top">Selecionar</td><td align="center" valign="top">Tipo</td><td align="center" valign="top">Nome</td><td align="center" valign="top">Descrição</td><td align="center" valign="top">Carga horária</td><td align="center" valign="top">Ano de início</td><td align="center" valign="top">Semestre de início</td><td align="center" valign="top">Ano de término</td><td align="center" valign="top">Semestre de término</td><td align="center" valign="top">Turno</td><td align="center" valign="top">Excluir</td><td align="center" valign="top">Alterar</td>
                    </tr>
                    <?php
                    while ($linha = mysqli_fetch_array($resultado)) {
                        ?>
                        <tr>
                            <td align="center" valign="top"><input type="checkbox" name="id[]" value="<?= $linha['id'] ?>"</td>
                            <td align="center" valign="top"><?= $linha['tipo_nome'] ?></td>
                            <td align="center" valign="top"><?= $linha['curso_nome'] ?></td>
                            <td align="center" valign="top"><?= $linha['descricao'] ?></td>
                            <td align="center" valign="top"><?= $linha['carga_horaria'] ?></td>
                            <td align="center" valign="top"><?= $linha['anoInicio'] ?></td>
                            <td align="center" valign="top"><?= $linha['semestreInicio'] ?></td>
                            <td align="center" valign="top"><?= $linha['anoTermino'] ?></td>
                            <td align="center" valign="top"><?= $linha['semestreTermino'] ?></td>
                            <td align="center" valign="top"><?= $linha['turno_nome'] ?></td>

                            <td align="center" valign="top"><a href="excluir.php?id=<?= $linha['id'] ?>">
                                    <img src="../img/excluir2.png" height="30" width="30"/></a></td>

                            <td align="center" valign="top"><a href="form_alterar.php?id=<?= $linha['id'] ?>">
                                    <img src="../img/alterar2.png" height="30" width="30"/></a></td>
                        </tr>
                        <?php
                    }
                    ?>

                </table>
                <input class="btn" type="submit" value="Excluir">

            </form>
        </div>
        <?php
        require_once '../rodape.php';
        ?>