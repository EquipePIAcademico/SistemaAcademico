<!DOCTYPE html>
<html>
    <head>
        <title>Turmas Cadastradas</title>
        <meta charset="utf-8">
      <!--  <link href="../css/estilo.css" rel="stylesheet">-->
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
    margin-left: 40px;
    margin-bottom: 20px;
    
}   

caption{
    font-size: 20px;
    margin-top: 20px;
    margin-bottom: 20px;
}
             form{
                 background-color: white;
                 margin-top: -20px;
                 margin-left: 20px;
                 margin-right: 20px;
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
            ini_set("display_errors", true);

            $pagina = (isset($_GET['pagina'])) ? $_GET['pagina'] : 1;
            $sql_turma = "select * from turma";
            $resultado_turma = mysqli_query($conexao, $sql_turma);
            $total = mysqli_num_rows($resultado_turma);
            $registros = 10;
            $numPaginas = ceil($total / $registros);
            $inicio = ($registros * $pagina) - $registros;
            
            $sql = "select turma.id, turma.nVagas, disciplina.nome as disc_nome, semestre.valor as semestre_valor, usuario.nome as professor_nome from "
                    . "usuario join turma on turma.professor_id=usuario.id join disciplina on disciplina.id=turma.disciplina_id join semestre on "
                    . "semestre.id=turma.semestre_id where perfil_acesso='professor(a)' limit $inicio,$registros";

            $resultado = mysqli_query($conexao, $sql);
            $total = mysqli_num_rows($resultado);
            ?> 
            <form action="pesquisa.php?a=buscar" method="post" class="form-pesquisa">
                 <br><br>
              <div class="form_pesquisa">
                  <input required="" type="text" placeholder="    Semestre..." name="pesquisaSemestre" />
                <button><img src="../img/search.png" height="30" width="30" style="cursor: pointer;"/></button>
<!--<input class="btn" type="submit" value="Buscar">-->
                
             </div>
                <div class="form_pesquisa">
<!--                    Pesquisar disciplinas: <input type="search" placeholder="Por nome" name="pesquisaDisciplina" >-->
                    <input required="" type="text" placeholder="    Pesquisar disciplina..." name="pesquisaDisciplina" />
               
            </div>
                </form>
            <br><br>
            <form action="confirmacao_lote.php" method="post">   
                <table id="customers">
                    
                    <caption>Turmas Cadastradas</caption>
                    <tr class="estilo">
                        <td>Selecionar</td><td>Número de vagas</td><td>Disciplina</td><td>Semestre</td><td>Professor(a)</td><td>Excluir</td><td>Alterar</td>
                    </tr>
                    <?php
                    while ($linha = mysqli_fetch_array($resultado)) {
                        ?>
                        <tr>
                            <td><input type="checkbox" name="id[]" value="<?= $linha['id'] ?>"</td>
                            <td><?= $linha['nVagas'] ?></td>
                            <td><a class="disciplina" href="../disciplina/listar.php"><?= $linha['disc_nome'] ?></a></td>
                            <td><?= $linha['semestre_valor'] ?></td>
                            <td><?= $linha['professor_nome'] ?></td>
                            
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
<!--            <input class="voltar" type="button" value="<<Voltar" onClick="JavaScript: window.history.back();">-->
        </div>
        <?php
        require_once '../rodape.php';
        ?>
