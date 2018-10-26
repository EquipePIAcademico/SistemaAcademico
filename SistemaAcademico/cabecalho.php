<?php
                require_once 'usuario/autenticacao.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Home Page</title>
       <link href="css/estilo.css" rel="stylesheet">

        <style>
            
            a{
                text-decoration: none;
                color: black;
            }
            a.disciplina{
                text-decoration: none;
                color: threeddarkshadow;
 
            }
            a.disciplina:hover{
                color: #17a2b8;
            }
            .dropbtn {
                background-color: #80d695;
                color: white;
                padding: 16px;
                font-size: 16px;
                border: none;
                cursor: pointer;
                
            }
            .admin{
                background-color: #80d695;
                color: white;
                padding: 16px;
                font-size: 16px;
                border: none;
                cursor: pointer;
                  position: relative;
                display: inline-block;
                text-decoration: none;
                
            }
            .admin:hover{
                background-color: #3e8e41;
            }
            .dropdown {
                position: relative;
                display: inline-block;
            }

            .dropdown-cadastro {
                display: none;
                position: absolute;
                background-color: #f9f9f9;
                min-width: 160px;
                box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
                z-index: 1;
            }


            .dropdown-matricula {
                display: none;
                position: absolute;
                background-color: #f9f9f9;
                min-width: 160px;
                box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
                z-index: 1;
            }
            .dropdown-gerenciamento {
                display: none;
                position: absolute;
                background-color: #f9f9f9;
                min-width: 160px;
                box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
                z-index: 1;
            }



            .dropdown-cadastro a {
                color: black;
                padding: 12px 16px;
                text-decoration: none;
                display: block;
            }

            .dropdown-matricula a {
                color: black;
                padding: 12px 16px;
                text-decoration: none;
                display: block;
            }
           

            .dropdown-gerenciamento a {
                color: black;
                padding: 12px 16px;
                text-decoration: none;
                display: block;
            }


            .dropdown-cadastro a:hover {background-color: #f1f1f1}
            .dropdown-matricula a:hover {background-color: #f1f1f1}
            .dropdown-gerenciamento a:hover {background-color: #f1f1f1}

            .dropdown:hover .dropdown-cadastro {
                display: block;
            }

            .dropdown:hover .dropdown-matricula {
                display: block;

            }

            .dropdown:hover .dropdown-gerenciamento {
                display: block;
            }

            .dropdown:hover .dropbtn {
                background-color: #3e8e41;
            }
            #cabecalho{
             display: flex;
            justify-content: center;
            }
            .login{
            display: flex;
            justify-content: center;
            }
           
            
        </style>
    </head>
    <body>

        <header id="cabecalho">
          <div class="dropdown">
            
                <!--  <ul type="disc">-->
                <?php
                  require_once 'usuario/autenticacao.php';
            
                if (estaLogado()) {
                    if (exibirUsername() == 'administrador') {
                       // echo '<h3 class="nome">Olá ' . exibirUsername() . '  </h3> ';
                        ?><div class="admin"><?php
                        echo "<a href=//localhost/SistemaAcademico/index.php>Home</a>";
                        ?></div><div class="admin"><?php
                        echo "<a href='http://localhost/SistemaAcademico/usuario/form_inserir.php'>Cadastrar usuários</a>";
                      ?></div><div class="admin"><?php
                       echo "<a href='http://localhost/SistemaAcademico/usuario/listar.php'>Gerenciamento de usuários</a>";
                       ?></div><div class="admin">
            <?php
                       echo "<a href='http://localhost/SistemaAcademico/usuario/listar_perfil.php'>Meu perfil </a>";
                       
                       ?></div></div><?php
                    } else if (exibirPerfilAcesso() == 'secretario(a)') {
                      //  echo '<h3 class="nome">Olá ' . exibirUsername() . '  </h3> ';
                     
                        echo "<a href=//localhost/SistemaAcademico/index.php><button class='dropbtn'>Home</button> </a>   ";
                        ?>
                     </div>
                    <div class="dropdown">
                        <?php echo "<button class='dropbtn'> Cadastros</button>"; ?>

                        <div class="dropdown-cadastro"><?php
                echo "<a href='http://localhost/SistemaAcademico/aluno/form_inserir.php'>Cadastrar alunos</a>";
                echo "<a href='http://localhost/SistemaAcademico/tipo/form_inserir.php'>Cadastrar tipos de curso   </a>";
                echo "<a href='http://localhost/SistemaAcademico/curso/form_inserir.php'>Cadastrar cursos   </a>";
                echo "<a href='http://localhost/SistemaAcademico/disciplina/form_inserir.php'>Cadastrar disciplinas   </a>";
                echo "<a href='http://localhost/SistemaAcademico/turma/form_inserir.php'>Cadastrar turmas   </a>";
                        ?> </div>
                    </div>

                    <div class="dropdown">   
        <?php echo "<button class='dropbtn'>Matriculas</button>"; ?>
                        <div class="dropdown-matricula"><?php
                        echo "<a href='http://localhost/SistemaAcademico/matricula_aluno_curso/form_inserir.php'>Matricular aluno em curso</a>";
                      
                        echo "<a href='http://localhost/SistemaAcademico/matricula_aluno_turma/form_inserir_aluno_1.php'>Matricular aluno em turma</a>";
                       
                        ?></div>
                    </div>
                    <div class="dropdown">   
                            <?php echo "<button class='dropbtn'>Gerenciamento</button>"; ?>
                        <div class="dropdown-gerenciamento"><?php
                  echo "<a href='http://localhost/SistemaAcademico/matricula_aluno_curso/listar_cursos.php'>Alunos Matriculados em Curso</a>";
                       echo "<a href='http://localhost/SistemaAcademico/matricula_aluno_turma/listar_curso.php'>Alunos Matriculados em turma</a>";
                        echo "<a href='http://localhost/SistemaAcademico/aluno/listar.php'>Gerenciamento de alunos   </a>";
                    echo "<a href='http://localhost/SistemaAcademico/tipo/listar.php'>Gerenciamento de tipos de curso   </a>";
                    echo "<a href='http://localhost/SistemaAcademico/curso/listar.php'>Gerenciamento de cursos   </a>";
                    echo "<a href='http://localhost/SistemaAcademico/disciplina/listar.php'>Gerenciamento de disciplinas   </a>";
                    echo "<a href='http://localhost/SistemaAcademico/turma/listar.php'>Gerenciamento de turmas   </a>";
                      
                      
                            ?>  </div>
                    </div>



                            <?php
                        } else {
                            //echo 'Olá ' . exibirUsername() . '   ';?>
                                 <div class="dropdown">   
        <?php echo "<button class='dropbtn'>Registros</button>"; ?>
                     <div class="dropdown-matricula"><?php
                            echo "<a href='#'>Registrar notas</a>";
                            echo "<a href='http://localhost/SistemaAcademico/registro_frequencia/listar_cursos_professores.php'>Registrar frequência</a>";
                            ?></div></div><?php
                            }
                        ?>
                <div class="dropdown"><?php
              echo "<a href='http://localhost/SistemaAcademico/usuario/logout.php'><button class='dropbtn'>Logout</button></a>";
              ?></div><?php
              }else{
                  echo '<p>Seja Bem-Vindo(a)</p>';
                  ?>
                  <div class="dropdown login">
                    <?php
                  echo "<a href='http://localhost/SistemaAcademico/usuario/form_login.php'><button class='dropbtn'>Login</button></a>";
              ?>  </div>
                <?php  
                }
                ?>
                    </header>
                    </body>
                    </html>
