<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Home Page</title>
        <link href="css/estilo.css" rel="stylesheet">
    </head>
    <body>
        
            <header id="cabecalho">
                <nav id="menu">
                <ul type="disc">
                    <?php
                    require_once 'usuario/autenticacao.php';

                    if (estaLogado()) {
                        if (exibirUsername() == 'administrador') {
                            echo '<h3 class="nome">Olá ' . exibirUsername() . '  </h3> ';
                            echo "<li><a href='http://localhost/SistemaAcademico/usuario/form_inserir.php'>Cadastrar usuários </a></li>";
                            echo "<li><a href='http://localhost/SistemaAcademico/usuario/listar.php'>Gerenciamento de usuários   </a></li>";
                            echo "<li><a href='http://localhost/SistemaAcademico/usuario/listar_perfil.php'>Meu perfil   </a></li>";
                        } else if (exibirPerfilAcesso() == 'secretario(a)') {
                            echo '<h3 class="nome">Olá ' . exibirUsername() . '  </h3> ';
                            echo "<li><a href='http://localhost/SistemaAcademico/index.php'>Home</a></li>";                             
                            echo "<li><a href='http://localhost/SistemaAcademico/aluno/form_inserir.php'>Cadastrar alunos</a></li>";
                            echo "<li><a href='http://localhost/SistemaAcademico/tipo/form_inserir.php'>Cadastrar tipos de curso   </a></li>";
                            echo "<li><a href='http://localhost/SistemaAcademico/curso/form_inserir.php'>Cadastrar cursos   </a>";
                            echo "<li><a href='http://localhost/SistemaAcademico/disciplina/form_inserir.php'>Cadastrar disciplinas   </a></li>";
                            echo "<li><a href='http://localhost/SistemaAcademico/turma/form_inserir.php'>Cadastrar turmas   </a></li>";
                            echo "<li><a href='http://localhost/SistemaAcademico/matricula_aluno_curso/form_inserir.php'>Matricular aluno em curso</a></li>";
                            echo "<li><a href='http://localhost/SistemaAcademico/matricula_aluno_turma/form_inserir.php'>Matricular aluno em turma</a></li>";
                            echo "<li><a href='http://localhost/SistemaAcademico/aluno/listar.php'>Gerenciamento de alunos   </a></li>";
                            echo "<li><a href='http://localhost/SistemaAcademico/tipo/listar.php'>Gerenciamento de tipos de curso   </a></li>";
                            echo "<li><a href='http://localhost/SistemaAcademico/curso/listar.php'>Gerenciamento de cursos   </a></li>";
                            echo "<li><a href='http://localhost/SistemaAcademico/disciplina/listar.php'>Gerenciamento de disciplinas   </a></li>";
                            echo "<li><a href='http://localhost/SistemaAcademico/turma/listar.php'>Gerenciamento de turmas   </a></li>";
                        } else {
                            echo 'Olá ' . exibirUsername() . '   ';
                            echo "<li><a href='#'>Registrar notas   </a></li>";
                            echo "<li><a href='#'>Registrar frequência   </a></li>";
                        }
                        echo "<li><a href='http://localhost/SistemaAcademico/usuario/logout.php'>Logout   </a></li>";
                    } else {
                        echo '<p>Seja Bem-Vindo(a)</p>';
                        echo "<li><a href='http://localhost/SistemaAcademico/usuario/form_login.php'>Login   </a></li>";
                        echo "<li><a href='http://localhost/SistemaAcademico/usuario/form_inserir.php'>Cadastrar   </a></li>";
                    }
                    ?>
                </ul>
                    </nav>
            </header>
         
    </body>

</html>    