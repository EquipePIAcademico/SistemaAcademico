<?php
                
                 $url = "http://localhost/SistemaAcademico";   
                require_once 'usuario/autenticacao.php';
                
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Home Page</title>
        <link href="css/estilo.css" rel="stylesheet">

        <style>
            body{
                font-family: arial;
            }
            
            a{
                text-decoration: none;
                color: white;
            }
            a.disciplina{
                text-decoration: none;
                color: threeddarkshadow;

            }
            a.disciplina:hover{
                color: #17a2b8;
            }
            a.paginacao{
               display: inline-block;
                 padding: 0;
                margin: 0;
                 color: black;
    padding: 8px 16px;
    text-decoration: none;
    border-radius: 5px;
            }
            a.paginacao:hover:not(.active)
            {background-color: #ddd;}
            
            
            
            
            
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

            .cancelar{
                background-color: #ddd;
                padding: 8px 16px;
    border-radius: 15px;
      position: absolute;
              left: 580px;
            
    
                
            }
            .confirmar{
                background-color: #ddd;
                padding: 8px 16px;
                border-radius: 15px;
                  position: absolute;
              left: 680px;
            
    
            }
            a.cancelar:hover{
                background-color: red;
                padding: 8px 16px;
                border-radius: 5px;
    
            }    
            
            h3{
                text-align: center;
            }
            input.confirmar{
                color: white;
                 background-color: #ddd;
                padding: 8px 16px;
                border-radius: 15px;
                border-style: none;
                  position: absolute;
              left: 680px;
            
             
            }
            input.cancelar{
                color: white;
                padding: 8px 16px;
                 background-color: #ddd;
                padding: 8px 16px;
                border-radius: 15px;
                border-style: none;
                  position: absolute;
              left: 580px;
            

            }
             a.confirmar:hover{
                  background-color: green;
                padding: 8px 16px;
                border-radius: 5px;
                cursor: pointer;
    
            }
            input.cancelar:hover{
                 background-color: red;
                padding: 8px 16px;
                border-radius: 5px;
                cursor: pointer;
            }
           input.confirmar:hover{
                 background-color: green;
                padding: 8px 16px;
                border-radius: 5px;
                cursor: pointer;
            }
           
        </style>
    </head>
    <body>

        <header id="cabecalho">
          <div>
            
                <!--  <ul type="disc">-->
                <?php
                require_once 'usuario/autenticacao.php';

                if (estaLogado()) {
                    if (exibirUsername() == 'administrador') {
                       // echo '<h3 class="nome">Olá ' . exibirUsername() . '  </h3> ';
                        ?><div class="admin">
                        <a href='<?=$url?>/index.php'>Home</a>
                        </div><div class="admin">
                        <a href='<?=$url?>/usuario/form_inserir.php'>Cadastrar usuários</a>
                      </div><div class="admin">
                       <a href='<?=$url?>/usuario/listar.php'>Gerenciamento de usuários</a>
                       </div><div class="admin">
            
                       <a href='<?=$url?>/usuario/listar_perfil.php'>Meu perfil </a>
                       
                       </div></div>
            <?php
                    } else if (exibirPerfilAcesso() == 'secretario(a)') {?>
<!--                      <h3 class="nome">Olá ' . exibirUsername() . '  </h3> ';-->
                        <div class="dropdown">
                        <a href='<?=$url?>/index.php'><button class='dropbtn'>Home</button> </a>
                       </div>
                        
                     </div>
                    <div class="dropdown">
                       <button class='dropbtn'> Cadastros</button>

                        <div class="dropdown-cadastro">
                <a href='<?=$url?>/aluno/form_inserir.php'>Cadastrar alunos</a>
                <a href='<?=$url?>/tipo/form_inserir.php'>Cadastrar tipos de curso   </a>
                <a href='<?=$url?>/curso/form_inserir.php'>Cadastrar cursos   </a>
                <a href='<?=$url?>/disciplina/form_inserir.php'>Cadastrar disciplinas   </a>
                <a href='<?=$url?>/turma/form_inserir.php'>Cadastrar turmas   </a>
                         </div>
                    </div>

                    <div class="dropdown">   
        <button class='dropbtn'>Matriculas</button>
                        <div class="dropdown-matricula">
                        <a href='<?=$url?>/matricula_aluno_curso/form_inserir.php'>Matricular aluno em curso</a>
                      
                        <a href='<?=$url?>/matricula_aluno_turma/form_inserir_aluno_1.php'>Matricular aluno em turma</a>
                       
                        </div>
                    </div>
                    <div class="dropdown">   
                            <button class='dropbtn'>Gerenciamento</button>
                        <div class="dropdown-gerenciamento">
                  <a href='<?=$url?>/matricula_aluno_curso/listar_cursos.php'>Alunos Matriculados em Curso</a>
                       <a href='<?=$url?>/matricula_aluno_turma/listar_curso.php'>Alunos Matriculados em turma</a>
                        <a href='<?=$url?>/aluno/listar.php'>Gerenciamento de alunos   </a>
                    <a href='<?=$url?>/tipo/listar.php'>Gerenciamento de tipos de curso   </a>
                    <a href='<?=$url?>/curso/listar.php'>Gerenciamento de cursos   </a>
                    <a href='<?=$url?>/disciplina/listar.php'>Gerenciamento de disciplinas   </a>
                    <a href='<?=$url?>/turma/listar.php'>Gerenciamento de turmas   </a>
                      
                      
                              </div>
                    </div>
                     <div class="dropdown">   
                            <button class='dropbtn'>Relatórios</button>
                        <div class="dropdown-gerenciamento">
                  <a href='<?=$url?>/relatorios/aprovacao/form.php'>Emitir relatório de aprovação</a>
                  <a href='<?=$url?>/relatorios/reprovacao_disciplina/listar_cursos.php'>Emitir relatório de reprovação por disciplina</a>
                  <a href='<?=$url?>/relatorios/reprovacao_curso/listar_cursos.php'>Emitir relatório de reprovação por curso</a>
                  <a href='<?=$url?>/relatorios/reprovacao_renda/form.php'>Emitir relatório de reprovação por faixa de renda</a>
                  <a href='<?=$url?>/relatorios/diario_classe/listar_cursos.php'>Emitir diário de classe</a>
                              </div>
                     </div>

                            <?php
                        } else {
                            //echo 'Olá ' . exibirUsername() . '   ';?>
                     <div class="dropdown">
                     
                      <a href='<?=$url?>/index.php'><button class='dropbtn'>Home</button> </a> 
                         </div>
                                 <div class="dropdown">   
                        <button class='dropbtn'>Registros</button>
                     
                            <a href='<?=$url?>/registro_notas/listar_cursos_professores.php'>Registrar notas</a>
                            <a href='<?=$url?>/registro_frequencia/listar_cursos_professores.php'>Registrar frequência</a>
                            </div>
                                 </div>
                           
                             <div class="dropdown">   
                            <button class='dropbtn'>Gerenciamento</button>
                        <div class="dropdown-gerenciamento">
                            <a href='<?=$url?>/registro_notas/listar_curso.php'>Gerenciamento de notas</a>
                   <a href='<?=$url?>/registro_frequencia/listar_curso.php'>Gerenciamento de frequência</a>
                      
                              </div>
                    </div>
                         <?php   
                        }
                        ?>
                     
                <div class="dropdown">
              <a href='<?=$url?>/usuario/logout.php'><button class='dropbtn'>Logout</button></a>
              </div><?php
              }else{?>
                  <p>Seja Bem-Vindo(a)</p>
                  
                  <div class="dropdown login">
                   
                  <a href='<?=$url?>/usuario/form_login.php'><button class='dropbtn'>Login</button></a>
                 
               </div>
                <?php  
                }
                ?>
          
    </header>
</body>
</html>

