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
            
            .dropbtn {
                background-color: #80d695;
                color: white;
                padding: 16px;
                font-size: 16px;
                border: none;
                cursor: pointer;
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
            .dropdown-admin a {
              
                padding: 12px 16px;
                text-decoration: none;
                display: inline;
                 background-color: #3e8e41;
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
            .l{
                margin-top: 50px;
                margin-left: -120px;
            }
            
            
        </style>
    </head>
    <body>

        <header id="cabecalho">
            
                <!--  <ul type="disc">-->
                <?php

                if (estaLogado()) {
                    if (exibirUsername() == 'administrador') {
                       // echo '<h3 class="nome">Olá ' . exibirUsername() . '  </h3> ';
                         ?>
                           <div class="dropdown"><?php
                        echo "<a href='http://localhost/SistemaAcademico/usuario/form_inserir.php'><button class='dropbtn'>Cadastrar usuários </button></a>";
                       ?> </div>
                      <div class="dropdown"><?php 
                       echo "<a href='http://localhost/SistemaAcademico/usuario/listar.php'><button class='dropbtn'>Gerenciamento de usuários</button></a>";
                     ?></div>
                     <div class="dropdown"><?php 
                       echo "<a href='http://localhost/SistemaAcademico/usuario/listar_perfil.php'><button class='dropbtn'>Meu perfil </button></a>";
                       ?></div>
                   <?php
                    } else if (exibirPerfilAcesso() == 'secretario(a)') {
                      //  echo '<h3 class="nome">Olá ' . exibirUsername() . '  </h3> ';
                     ?>   <div class="dropdown"><?php 
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
                      
                        echo "<a href='http://localhost/SistemaAcademico/matricula_aluno_turma/form_inserir.php'>Matricular aluno em turma</a>";
                       
                        ?></div>
                    </div>
                    <div class="dropdown">   
                            <?php echo "<button class='dropbtn'>Gerenciamento</button>"; ?>
                        <div class="dropdown-gerenciamento"><?php
                  echo "<a href='http://localhost/SistemaAcademico/matricula_aluno_curso/listar_cursos.php'>Alunos Matriculados em Curso</a>";
                       echo "<a href='http://localhost/SistemaAcademico/matricula_aluno_turma/listar_turmas.php'>Alunos Matriculados em turma</a>";
                        echo "<a href='http://localhost/SistemaAcademico/aluno/listar.php'>Gerenciamento de alunos   </a>";
                    echo "<a href='http://localhost/SistemaAcademico/tipo/listar.php'>Gerenciamento de tipos de curso   </a>";
                    echo "<a href='http://localhost/SistemaAcademico/curso/listar.php'>Gerenciamento de cursos   </a>";
                    echo "<a href='http://localhost/SistemaAcademico/disciplina/listar.php'>Gerenciamento de disciplinas   </a>";
                    echo "<a href='http://localhost/SistemaAcademico/turma/listar.php'>Gerenciamento de turmas   </a>";
                      
                      
                            ?>  </div>
                    </div>



                            <?php
                        } else {
                            echo 'Olá ' . exibirUsername() . '   ';
                            echo "<li><a href='#'>Registrar notas   </a></li>";
                            echo "<li><a href='http://localhost/SistemaAcademico/registro_frequencia/listar_turmas.php'>Registrar frequência   </a></li>";
                        }
                        ?>
                <div class="dropdown">
                <?php
              echo "<a href='http://localhost/SistemaAcademico/usuario/logout.php'><button class='dropbtn'>Logout</button></a>";
            ?>
              </div><?php
              
                        } else {
                
                header('Location: http://localhost/SistemaAcademico/usuario/form_login.php');
                 
                }
                ?></div>
                    </header>
                    </body>
                    </html>