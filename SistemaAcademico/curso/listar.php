<!DOCTYPE html>
<html>
    <head>
        <title>Cursos</title>
        <meta charset="utf-8">
     <!--   <link href="../css/estilo.css" rel="stylesheet">-->
     <link href="../css/form_buscar.css" rel="stylesheet">
         <style>
          #customers {
    font-family: Arial;
    border-collapse: separate;
    width: 100%;
     color:threeddarkshadow;
}

#customers td, #customers th {
    border: 1px solid #ddd;
    padding: 2.5px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd; color: black}

#customers tr.estilo{
    background-color: #ccc;
    color: black;

}


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
    font-family: arial;
    font-size: 14px;
}
div#interface{
     background-color: white;
    width: 1250px;
    margin: 0px auto 10px auto;
    box-shadow: 0px 0px 10px;
    padding: 0px 30px 50px 30px;
    
}
   

img {
	margin: 0 auto;
	text-align: center;
}
 .btn-insira:hover {
    background-color:#F35548; /* Green */
    color: white;
    
}
button.btn-insira{
    color: #2E2E2E;
    border: 2px solid #A4A4A4;
    cursor: pointer;
    border-radius: 5px;
    padding: 10px;
    font-size: 15px;
    margin-top: 10px;
    margin-left: 10px;
    margin-bottom: 20px;
    
}   

caption{
    font-size: 20px;
    margin-top: 20px;
    margin-bottom: 20px;
}
             td{
                 text-align: center;
             }
               .voltar{
                 background: white;
                 cursor: pointer;
             }
       </style>
    </head>
    <body>
        <div id="interface">
            <?php
            //session_start();
            include '../cabecalho.php';
            include '../bd/conectar.php';
            
            $pagina = (isset($_GET['pagina'])) ? $_GET['pagina'] : 1;
            $sql_curso = "select * from curso";
            $resultado_curso = mysqli_query($conexao, $sql_curso);
            $total = mysqli_num_rows($resultado_curso);
            $registros = 10;
            $numPaginas = ceil($total / $registros);
            $inicio = ($registros * $pagina) - $registros;
            ?>

            <form method="post" action="pesquisa.php?a=buscar" class="form-pesquisa">
                <div class="form_pesquisa">   
<!--                Pesquisar alunos: <input required="" type="search" placeholder="Por nome" name="pesquisaAluno">-->
                    <input required="" type="text" placeholder="   Pesquisar curso..." name="pesquisaCurso" />
                <button><img src="../img/search.png" height="30" width="30" style="cursor: pointer;"/></button>
                </div>
                </form>

            <?php
            ini_set("display_errors", true);

            $sql = "select curso.id, curso.nome as curso_nome, curso.descricao, curso.carga_horaria, curso.anoInicio, curso.semestreInicio, curso.anoTermino, curso.semestreTermino, "
                    . "tipo.nome as tipo_nome, turno.nome as turno_nome from tipo join curso on curso.tipo_id = tipo.id join turno on turno.id=curso.turno_id order by curso_nome limit $inicio,$registros";

            $resultado = mysqli_query($conexao, $sql);
            $total = mysqli_num_rows($resultado);
            ?>

            <form action="confirmacao_lote.php" method="post">   

                <table id="customers">
                    <caption>Cursos Cadastrados</caption>
                    <tr class="estilo">
                        <td>Selecionar</td><td>Tipo</td><td>Nome</td><td>Descrição</td><td>Carga horária</td><td>Ano de início</td><td>Semestre de início</td><td>Ano de término</td><td>Semestre de término</td><td>Turno</td><td>Excluir</td><td>Alterar</td>
                    </tr>
                    <?php
                    while ($linha = mysqli_fetch_array($resultado)) {
                        ?>
                        <tr>
                            <td><input type="checkbox" name="id[]" value="<?= $linha['id'] ?>"</td>
                            <td><?= $linha['tipo_nome'] ?></td>
                            <td><?= $linha['curso_nome'] ?></td>
                            <td><?= $linha['descricao'] ?></td>
                            <td><?= $linha['carga_horaria'] ?></td>
                            <td><?= $linha['anoInicio'] ?></td>
                            <td><?= $linha['semestreInicio'] ?></td>
                            <td><?= $linha['anoTermino'] ?></td>
                            <td><?= $linha['semestreTermino'] ?></td>
                            <td><?= $linha['turno_nome'] ?></td>

                            <td><a href="confirmacao.php?id=<?= $linha['id'] ?>">
                                    <img src="../img/excluir2.png" height="30" width="30"/></a></td>

                            <td><a href="form_alterar.php?id=<?= $linha['id'] ?>">
                                    <img src="../img/alterar2.png" height="30" width="30"/></a></td>
                        </tr>
                        <?php
                    }
                    ?>

                </table>
                <button class="btn-insira">Excluir</button>
                <?php
                if ($pagina > 1) {
                    echo "<a class='paginacao' href='listar.php?pagina=" . ($pagina - 1) . "'>&laquo; anterior</a>";
                }

                for ($i = 1; $i < $numPaginas + 1; $i++) {
                    $ativo = ($i == $pagina) ? 'numativo' : '';
                    echo "<a class='paginacao' href='listar.php?pagina= $i '> " . $i . " </a>";
                }

                if ($pagina < $numPaginas) {
                    echo "<a class='paginacao' href='listar.php?pagina=" . ($pagina + 1) . "'>proximo &raquo;</a>";
                }
                ?>

            </form>
            
        </div>
        <?php
        require_once '../rodape.php';
        ?>
