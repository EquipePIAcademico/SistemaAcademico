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
                font-family: roboto;
            }

        </style>

        <link href="https://fonts.googleapis.com/css?family=Roboto|Roboto+Condensed" rel="stylesheet">


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
                if (exibirUsername() == 'administrador') {
                    $sql_secretario_id = "select id from usuario where perfil_acesso='secretario(a)' and username !='administrador' order by id desc limit 10";

                    $retorno_secretario_id = mysqli_query($conexao, $sql_secretario_id);
                    ?><div id="container">
                        <div class="box">
                            <h4 class="titulo">Últimos secretários cadastrados </h4>
                            <?php
                            while ($secretario_id = mysqli_fetch_array($retorno_secretario_id)) {
                                $sql = "select usuario.nome from usuario where usuario.id=$secretario_id[0]";

                                $retorno = mysqli_query($conexao, $sql);

                                $resultado = mysqli_fetch_array($retorno);
                                ?> <li><?= $resultado['nome'] ?></li><?php
                            }
                            ?><br>
                            <a href=usuario/form_inserir.php class="home">Cadastrar novos secretários</a>  
                        </div> <br><br>
                        <?php
                        $sql_professor_id = "select id from usuario where perfil_acesso='professor(a)' order by id desc limit 10";

                        $retorno_professor_id = mysqli_query($conexao, $sql_professor_id);
                        ?><div id="container">
                            <div class="box">
                                <h4 class="titulo">Últimos professores cadastrados </h4>
                                <?php
                                while ($professor_id = mysqli_fetch_array($retorno_professor_id)) {
                                    $sql = "select usuario.nome from usuario where usuario.id=$professor_id[0]";

                                    $retorno = mysqli_query($conexao, $sql);

                                    $resultado = mysqli_fetch_array($retorno);
                                    ?> <li><?= $resultado['nome'] ?></li><?php
                                }
                                ?><br>
                                <a href=usuario/form_inserir.php class="home">Cadastrar novos professores</a>  
                            </div> <br><br>
                            <?php
                        } else if (exibirPerfilAcesso() == 'secretario(a)') {
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
                                $sql_aluno_turma_id = "select id from aluno_turma order by id desc limit 3";

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
                        } else {
                            $sql_nota_id = "select distinct id from nota group by nota.turma_id order by id desc limit 10";
                            $retorno_nota_id = mysqli_query($conexao, $sql_nota_id);
                            ?>  <div class="box"><h4 class="titulo">Últimos registros de notas</h4><?php
                            while ($nota_id = mysqli_fetch_array($retorno_nota_id)) {
                                $sql = "select distinct disciplina.nome, nota.id from turma join nota on nota.turma_id=turma.id join disciplina on disciplina.id=turma.disciplina_id where nota.id=$nota_id[0]";

                                $retorno_nota = mysqli_query($conexao, $sql);

                                $resultado_nota = mysqli_fetch_array($retorno_nota);

                                if ($resultado_nota != null) {
                                    $sql_nota = "select distinct disciplina.nome from turma join nota on nota.turma_id=turma.id join disciplina on disciplina.id=turma.disciplina_id 
                                             where nota.id=$resultado_nota[id]";

                                    $retorno_disciplina = mysqli_query($conexao, $sql_nota);

                                    $resultado_nota = mysqli_fetch_array($retorno_disciplina);

                                    echo "<li>" . $resultado_nota['nome'];
                                }
                            }
                            ?><br><a href=registro_notas/listar_cursos_professores.php class="home">Fazer novos registros</a> </div> <?php
                                $sql_freq_id = "select distinct id from frequencia group by frequencia.turma_id order by id desc limit 10";
                                $retorno_freq_id = mysqli_query($conexao, $sql_freq_id);
                                ?>  <div class="box"><h4 class="titulo">Últimos registros de frequência</h4><?php
                                while ($freq_id = mysqli_fetch_array($retorno_freq_id)) {
                                    $sql = "select distinct disciplina.nome, frequencia.id from turma join frequencia on frequencia.turma_id=turma.id join disciplina on disciplina.id=turma.disciplina_id where frequencia.id=$freq_id[0]";

                                    $retorno_freq = mysqli_query($conexao, $sql);

                                    $resultado_freq = mysqli_fetch_array($retorno_freq);

                                    if ($resultado_freq != null) {
                                        $sql_freq = "select distinct disciplina.nome from turma join frequencia on frequencia.turma_id=turma.id join disciplina on disciplina.id=turma.disciplina_id where frequencia.id=$resultado_freq[id]";

                                        $retorno_disciplina = mysqli_query($conexao, $sql_freq);

                                        $resultado_freq = mysqli_fetch_array($retorno_disciplina);

                                        echo "<li>" . $resultado_freq['nome'];
                                    }
                                }
                                ?><br><a href=registro_frequencia/listar_cursos_professores.php class="home">Fazer novos registros</a>   </div><?php
                            }
                        }

                       
                        ?></div><?php
                         require_once './rodape.php';
                        ?>   


                </html>
