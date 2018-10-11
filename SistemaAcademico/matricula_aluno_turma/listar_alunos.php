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

body{
    background-color: #dddddd;
    color: rgba(0,0,0,1);
    font-family: sans-serif;
    font-size: 14px;
}
div#interface{
    background-color: white;
    width: 1300px;
    margin: 0px auto 10px auto;
    box-shadow: 0px 0px 10px;
    padding: 0px 0px 50px 30px;
}
.form-pesquisa{
    position: absolute;
    left: 900px;

   
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
    margin-left: 85px;
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
       </style>
    </head>
    <body>
        <div id="interface">
            <?php
            //session_start();
            include '../cabecalho.php';

            include '../bd/conectar.php';

            ini_set("display_errors", true);
            
            
//            $aluno_curso_id = $_GET['aluno_curso_id'];
            $disciplina_id = $_GET['disciplina_id'];
            $semestre_id = $_GET['semestre_id'];
            
         //  echo "O id é: $pegaid"; 
                    
//            $sql = "select aluno_curso.aluno_id, aluno_turma.aluno_id from aluno_curso join aluno_turma on aluno_curso.aluno_id=aluno_turma.aluno_id";
            
            $sql = "select aluno_turma.aluno_id,
                aluno.nome, aluno_turma.semestre_id, 
                aluno_turma.disciplina_id, aluno_curso.matricula from aluno 
                join aluno_turma on aluno.id=aluno_turma.aluno_id 
                join disciplina on aluno_turma.disciplina_id=disciplina.id
                where aluno_turma.semestre_id=$semestre_id and aluno_turma.disciplina_id = $disciplina_id;";
            
       $retorno = mysqli_query($conexao, $sql);
       
//       $sql = "select aluno_turma.semestre_id from aluno_turma where aluno_turma.semestre_id=$semestre_id";
       
      
       
       ?>
        <form action="excluir_lote.php" method="post">
                <table id="customers">
                     <caption>Alunos Matriculados</caption>
                    <tr>
                        <td>Selecionar</td><td>Matricula</td><td>Nome do aluno</td><td>Excluir</td><td>Alterar</td>
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
<?php
            
       
       
       
       
       
       
       
       
           
