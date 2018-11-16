<!DOCTYPE html>
<html>
    <head>
        <title>Cursos</title>
        <meta charset="utf-8">
<!--        <link href="../css/estilo.css" rel="stylesheet">-->
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
    margin-left: 80px;
    margin-bottom: 20px;
    
}   

caption{
    font-size: 20px;
    margin-top: 40px;
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
            
           //$turma_id = $_GET['turma_id'];
            
            
            
            $curso_id = $_GET['curso'];
            
            $turma_id = $_GET['turma_id'];
                
                  
//            $disciplina_id = $_GET['disciplina_id'];
//            $semestre_id = $_GET['semestre_id'];
//            
         //  echo "O id é: $pegaid"; 
                    
//             
//            $sql_aluno = "select nome, aluno_curso.matricula from aluno join aluno_turma"
//                    . " on aluno.id=aluno_turma.aluno_id "
//                    . "join aluno_curso on aluno_curso.aluno_id=aluno.id where aluno_turma.disciplina_id=$disciplina_id AND aluno_turma.aluno_id=105";
//            
//           $sql_aluno = "select aluno.nome," 
//                    . "aluno_curso.matricula" 
//                    . "from aluno join aluno_curso" 
//                   . "on aluno_curso.aluno_id=aluno.id" 
//                   . "join curso on aluno_curso.curso_id=curso.id" 
//                   . "join disciplina on disciplina.curso_id=curso.id" 
//                   . "join turma on turma.disciplina_id=disciplina.id"
//                   . "join aluno_turma on aluno_turma.aluno_id=aluno.id";
//                   
//                 $sql_aluno = "select DISTINCT aluno.nome, aluno_curso.matricula "
//                  . "from aluno_turma join disciplina "
//                  . "on aluno_turma.disciplina_id=disciplina.id "
//                  . "join curso on curso.id=disciplina.curso_id " 
//                  . "join aluno_curso on aluno_curso.curso_id=curso.id "
//                  . "join turma on turma.disciplina_id=disciplina.id "
//                  . "JOIN ALUNO ON ALUNO.id=ALUNO_CURSO.aluno_id "
//                  . "WHERE ALUNO_TURMA.turma_id=$disciplina_id";

//            
//         $sql_aluno = "select aluno.nome, aluno_curso.matricula from "
//                 . "aluno join aluno_turma on aluno.id=aluno_turma.aluno_id "
//                 . "join aluno_curso on aluno_curso.aluno_id=aluno.id "
//                 . "join curso on aluno_curso.curso_id=curso.id "
//                 . "join turma on aluno_curso.turma_id=turma.id";
////         
//            
//                  $sql = "select aluno_turma.aluno_id, "
//                . "aluno.nome, aluno_turma.semestre_id, "
//                . "aluno_turma.disciplina_id, aluno_curso.matricula from aluno_curso "
//                . "join aluno on aluno.id=aluno_curso.aluno_id "
//                . "join aluno_turma on aluno.id=aluno_turma.aluno_id "
//                . "join disciplina on aluno_turma.disciplina_id=disciplina.id "
//                . "where (select aluno_curso.matricula, aluno_curso.aluno_id, aluno_turma.aluno_id from aluno_curso join aluno_turma"
//                    . "on aluno_curso.aluno_id=aluno_turma.aluno_id)";
//            
            
//            $sql_aluno = "select aluno.nome, aluno_curso.matricula from aluno join aluno_curso on aluno.id=aluno_curso.aluno_id join turma on aluno_curso.curso_id=turma.curso_id where turma.id=$turma_id";
  
            
            
            
            
            
            
            
            $sql_aluno = "select distinct aluno.id, aluno.nome, aluno_curso.matricula from aluno join aluno_curso on aluno.id=aluno_curso.aluno_id join aluno_turma on aluno_turma.aluno_id=aluno_curso.aluno_id where aluno_curso.curso_id=$curso_id AND aluno_turma.turma_id=$turma_id"; 
    
//            if ($resultado = mysqli_query($conexao, $sql_aluno)){
//         
//                $total_registros = mysqli_num_rows($resultado);
//                
//            }
//            
           
   $retorno = mysqli_query($conexao, $sql_aluno);
            
            
       
//       $sql = "select aluno_turma.semestre_id from aluno_turma where aluno_turma.semestre_id=$semestre_id";
       
      
       $data = date('d-m-Y');
       ?>
        <form action="inserir_frequencia.php" method="post">
                <table id="customers">
                     <caption>Alunos Matriculados</caption>
                     <tr class="estilo">
                        <td>Matricula</td><td>Nome do aluno</td><td>Frequência</td>
                    </tr>
                    <?php
                    while ($linha = mysqli_fetch_array($retorno)) {
                        
                        ?>
                        <tr>
                            
                        <input type="hidden" name="aluno_id[]" value="<?= $linha['id']?>">
                        <input type="hidden" name="data[]" value="<?= $data?>">
                         <input type="hidden" name="turma_id[]" value="<?= $turma_id?>">
<!--                             <td><input type="checkbox" name="id[]" value="<?= $linha['id'] ?>"</td>-->
                             <td><?= $linha['matricula'] ?></td>
                            <td><?= $linha['nome'] ?></td>
                            <td>
                                <select name="frequencia[]">
                                    <option value="presenca">Presença</option>
                                    <option value="falta">Falta</option>
                                </select>
                                
                            </td>
                            
<!--                            
                            <td><a href="excluir.php?id=<?= $linha['id'] ?>">
                                    <img src="../img/excluir2.png" height="30" width="30"/></a></td>

                            <td><a href="form_alterar.php?id=<?= $linha['id'] ?>">
                                    <img src="../img/alterar2.png" height="30" width="30"/></a></td>-->
                        </tr>
                        <?php
                      
                       
                    }
                    ?>

                </table><br>
<!--                <input type="hidden" name="total_de_alunos" value="<?=$i?>">-->
            <input class="btn" type="submit" value="Inserir">
            </form>
            <?php
           
            ?>
            
            
<!--            <input class="voltar" type="button" value="<<Voltar" onClick="JavaScript: window.history.back();">-->
<?php
            
       
       
       
       
       
       
       
       
           
