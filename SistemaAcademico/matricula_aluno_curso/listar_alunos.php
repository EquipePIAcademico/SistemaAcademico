<!DOCTYPE html>
<html>
    <head>
        <title>Cursos</title>
        <meta charset="utf-8">
       <!-- <link href="../css/estilo.css" rel="stylesheet">-->
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
    margin-left: 50px;
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
            
            $pegaid = $_GET['curso_id'];
            
         //  echo "O id é: $pegaid"; 
                    
            $sql = "select aluno_curso.aluno_id, aluno_curso.matricula, aluno_curso.curso_id, aluno.id, aluno.nome from aluno_curso "
                    . "join aluno on aluno_curso.aluno_id=aluno.id where aluno_curso.curso_id=$pegaid order by nome";
            
       $retorno = mysqli_query($conexao, $sql);
       
       ?>
        <form action="excluir_lote.php" method="post">
                <table id="customers">
                     <caption>Alunos Matriculados</caption>
                     <tr class="estilo">
                    <td>Selecionar</td> <td>Matricula</td><td>Nome do aluno</td><td>Excluir</td><td>Alterar</td>
                    </tr>
                    <?php
                    while ($linha = mysqli_fetch_array($retorno)) {
                        ?>
                        <tr>
                             <td><input type="checkbox" name="id[]" value="<?= $linha['id'] ?>"</td>
                            <td><?= $linha['matricula'] ?></td>
                            <td><?= $linha['nome'] ?></td>
                            <td><a href="excluir.php?id=<?= $linha['id'] ?>">
                                    <img src="../img/excluir2.png" height="30" width="30"/></a></td>

                            <td><a href="form_alterar.php?id=<?= $linha['id'] ?>">
                                    <img src="../img/alterar2.png" height="30" width="30"/></a></td>
                        </tr>
                        <?php
                    }
                    ?>

                </table><br>
             <button class="btn-insira">Excluir</button>
            </form>
            <input class="voltar" type="button" value="<<Voltar" onClick="JavaScript: window.history.back();">
       
       
       
       
       
       
       
       
       
           
