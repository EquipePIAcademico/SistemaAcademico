<html>
    <head>
        <title>Home Page</title>
        <meta charset="utf-8">
        <link href="css/estilo.css" rel="stylesheet">
        <style>

            #container {
                display: flex;
                justify-content: center;

            }

            .box {
                vertical-align: top;
                display: inline-block;
                width: 450px; height: 300px;
                border: 2px solid;
                border-color: #ccc;
                margin: 50px 40px 10px 10px;
                padding-left: 10px;     
            }
            a.home {    font-family: verdana, arial, sans-serif; 
                        font-size: 10pt; 
                        font-weight: bold; 
                        padding: 4px; 
                        background-color: #ffffcc; 
                        color: #666666; 
                        text-decoration: none; 
                        display: flex;
                        justify-content: center;
                        margin-right: 10px;
            }
            .home:hover { 
                border-bottom: 1px solid #cccccc; 
                border-top: 2px solid #666666; 
                border-right: 1px solid #cccccc; 
                border-left: 2px solid #666666; 
            } 
            .titulo{
                padding: 8px; 
                background-color: #ccc; 
                color: white; 
                margin-left: -10px;
                text-align: center;
                font-size: 16px;

            }
            li{
                font-family: oxygen;
            }

        </style>
        <link href="https://fonts.googleapis.com/css?family=Indie+Flower|Lato|Montserrat|Oxygen" rel="stylesheet">

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
                if ((exibirPerfilAcesso() == 'secretario(a)') && (exibirUsername() != 'administrador')) {
                    $sql_aluno_id = "select id from aluno order by id desc limit 10";

                    $retorno_aluno_id = mysqli_query($conexao, $sql_aluno_id);
                    ?><div id="container">
                        <div class="box">
                            <h4 class="titulo">Últimos alunos cadastrados </h4>
                            <?php
                            while ($aluno_id = mysqli_fetch_array($retorno_aluno_id)) {
                                $sql = "select aluno.nome from aluno where aluno.id=$aluno_id[0]";

                                $retorno = mysqli_query($conexao, $sql);

                                $resultado = mysqli_fetch_array($retorno);
                                ?> <li><?= $resultado['nome'] ?></li><?php
                            }
                            ?><br>
                            <a href=aluno/form_inserir.php class="home">Cadastrar novos alunos</a>  
                        </div> <br><br>
                        <?php
                        $sql_aluno_curso_id = "select id from aluno_curso order by id desc limit 10";

                        $retorno_aluno_curso_id = mysqli_query($conexao, $sql_aluno_curso_id);
                        ?>  <div class="box"><h4 class="titulo">Últimas matriculas em curso realizadas </h4><?php
                        while ($aluno_curso_id = mysqli_fetch_array($retorno_aluno_curso_id)) {
                            $sql = "select curso.nome as nome_curso, aluno.nome as nome_aluno from aluno join aluno_curso on aluno_curso.aluno_id=aluno.id "
                                    . "join curso on curso.id=aluno_curso.curso_id where aluno_curso.id=$aluno_curso_id[0]";

                            $retorno = mysqli_query($conexao, $sql);

                            $resultado = mysqli_fetch_array($retorno);

                            echo "<li>" . $resultado['nome_aluno'] . " em " . $resultado['nome_curso'] . "</li>";
                        }
                        ?>

                            <br> <a href=matricula_aluno_curso/form_inserir.php class="home">Matricular novos alunos em curso</a> 
                        </div><br><br>
                        <?php
                        $sql_aluno_turma_id = "select id from aluno_turma order by id desc limit 4";

                        $retorno_aluno_turma_id = mysqli_query($conexao, $sql_aluno_turma_id);
                        ?> <div class="box"><h4 class="titulo"> Últimas matriculas em turma realizadas </h4><?php
                        while ($aluno_turma_id = mysqli_fetch_array($retorno_aluno_turma_id)) {
                            $sql_aluno_turma = "select turma.id, aluno.nome from aluno join aluno_turma on aluno_turma.aluno_id=aluno.id "
                                    . "join turma on turma.id=aluno_turma.turma_id where aluno_turma.id=$aluno_turma_id[0]";

                            $retorno_aluno_turma = mysqli_query($conexao, $sql_aluno_turma);

                            $resultado_aluno_turma = mysqli_fetch_array($retorno_aluno_turma);


                            if ($resultado_aluno_turma != null) {
                                $sql_turma = "select disciplina.nome, semestre.valor from disciplina join turma on turma.disciplina_id=disciplina.id join "
                                        . "semestre on semestre.id=turma.semestre_id where turma.id=$resultado_aluno_turma[id]";

                                $retorno_turma = mysqli_query($conexao, $sql_turma);

                                $resultado_turma = mysqli_fetch_array($retorno_turma);

                                echo "<li>" . $resultado_aluno_turma['nome'] . " em turma | Disciplina: " . $resultado_turma['nome'] . " | Semestre: " . $resultado_turma['valor'] . "</li><br>";
                            }
                        }
                        ?>

                            <br><a href=matricula_aluno_turma/form_inserir_aluno_1.php class="home">Matricular novos alunos em turma</a>  
                        </div>
                    </div>
                    <?php
                }
            }
            require_once './rodape.php';
            ?>   
        </div>
</html>
