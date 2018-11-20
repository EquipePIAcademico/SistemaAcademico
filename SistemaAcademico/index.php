<html>
    <head>
        <title>Home Page</title>
        <meta charset="utf-8">
        <link href="css/estilo.css" rel="stylesheet">
    </head>

    <body>
        <div id="interface">
            <?php
            require_once './cabecalho.php';
            include './bd/conectar.php';
            require_once 'usuario/autenticacao.php';
            ?>   
            <?php
            if (estaLogado()) {
                $sql_aluno_id = "select id from aluno order by id desc limit 10";

                $retorno_aluno_id = mysqli_query($conexao, $sql_aluno_id);

                echo "Últimos alunos cadastrados : " . "<br>";

                while ($aluno_id = mysqli_fetch_array($retorno_aluno_id)) {
                    $sql = "select aluno.nome from aluno where aluno.id=$aluno_id[0]";

                    $retorno = mysqli_query($conexao, $sql);

                    $resultado = mysqli_fetch_array($retorno);

                    echo $resultado['nome'] . "<br>";
                }
                ?>

                <a href=aluno/form_inserir.php>Cadastrar novos alunos</a>  
                
                <?php
                
                $sql_aluno_curso_id = "select id from aluno_curso order by id desc limit 10";

                $retorno_aluno_curso_id = mysqli_query($conexao, $sql_aluno_curso_id);

                echo "Últimas matriculas em curso realizadas : " . "<br>";

                while ($aluno_curso_id = mysqli_fetch_array($retorno_aluno_curso_id)) {
                    $sql = "select curso.nome as nome_curso, aluno.nome as nome_aluno from aluno join aluno_curso on aluno_curso.aluno_id=aluno.id "
                            . "join curso on curso.id=aluno_curso.curso_id where aluno_curso.id=$aluno_curso_id[0]";

                    $retorno = mysqli_query($conexao, $sql);

                    $resultado = mysqli_fetch_array($retorno);

                    echo $resultado['nome_aluno'] . " em " . $resultado['nome_curso'] . "<br>";
                }
                ?>

                <a href=matricula_aluno_curso/form_inserir.php>Matricular novos alunos em curso</a> 
                
                <?php
                
                $sql_aluno_turma_id = "select id from aluno_turma order by id desc limit 10";

                $retorno_aluno_turma_id = mysqli_query($conexao, $sql_aluno_turma_id);

                echo "Últimas matriculas em turma realizadas : " . "<br>";

                while ($aluno_turma_id = mysqli_fetch_array($retorno_aluno_turma_id)) {
                    $sql_aluno_turma = "select turma.id, aluno.nome from aluno join aluno_turma on aluno_turma.aluno_id=aluno.id "
                            . "join turma on turma.id=aluno_turma.turma_id where aluno_turma.id=$aluno_turma_id[0]";

                    $retorno_aluno_turma = mysqli_query($conexao, $sql_aluno_turma);

                    $resultado_aluno_turma = mysqli_fetch_array($retorno_aluno_turma);
                    
                    $sql_turma = "select disciplina.nome, semestre.valor from disciplina join turma on turma.disciplina_id=disciplina.id join "
                            . "semestre on semestre.id=turma.semestre_id where turma.id=$resultado_aluno_turma[id]";

                    $retorno_turma = mysqli_query($conexao, $sql_turma);

                    $resultado_turma = mysqli_fetch_array($retorno_turma);
                    
                    echo $resultado_aluno_turma['nome'] . " em turma => disciplina: " . $resultado_turma['nome'] . " semestre: " . $resultado_turma['valor'] . "<br>";
                }
                ?>

                <a href=matricula_aluno_turma/form_inserir_aluno_1.php>Matricular novos alunos em turma</a> 
                
                <?php
            }
            require_once './rodape.php';
            ?>   
        </div>
</html>
