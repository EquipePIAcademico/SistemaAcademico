<!DOCTYPE html>
<html>
    <head>
        <title>Alterar Cadastro</title>
        <meta charset="utf-8">
        <link href="../css/estilo.css" rel="stylesheet">
        <link href="../css/form.css" rel="stylesheet">
          <script>
function formatar(mascara, documento){
  var i = documento.value.length;
  var saida = mascara.substring(0,1);
  var texto = mascara.substring(i)
  
  if (texto.substring(0,1) != saida){
            documento.value += texto.substring(0,1);
  }
  
}
 
</script>
<style>
    .button:hover {
    background-color:blue; /* Green */
    color: white;
    
}
.button{
      background-color: ;
    color: #2E2E2E;
    border: 2px solid #A4A4A4;
    cursor: pointer;
    border-radius: 5px;
    padding: 10px;
    font-size: 15px;
    margin-bottom: 20px;
}
</style>
    </head>
    <body>
        <div id="interface">

            <?php
            include '../cabecalho.php';
            $id = $_GET['id'];
            include '../bd/conectar.php';
            $sql_pessoa = "select * from usuario where id = $id";

            $resultado = mysqli_query($conexao, $sql_pessoa);

            $linha = mysqli_fetch_array($resultado);
            ?>


            <h3 id="cadastro">Alterar Cadastro</h3>
            <form method="post" action="alterar.php?username=<?= $linha['username'] ?>">
                <input type="hidden" name="id" value="<?= $id ?>">

                <label>Nome: </label>
                <input type="text" required="" name="nome" value="<?= $linha['nome'] ?>"><br>
                <label>E-mail:</label> 
                <input type="email" required="" name="email" value="<?= $linha['email'] ?>"><br>
                <label>Data de nascimento: </label>
                <input type="date" required="" name="dataN" value="<?= $linha['dataN'] ?>"><br>
                <label>CPF: </label>
                <input type="text" required="" name="cpf" maxlength="14" OnKeyPress="formatar('###.###.###-##', this)" value="<?= $linha['cpf'] ?>"><br>
                <label>Perfil de acesso:</label> 
                <select name="perfil_acesso" disabled="">
                    <option selected="" value="<?= $linha['id'] ?>"><?= $linha['perfil_acesso'] ?></option>
                </select><br>
                <label>Username: </label>
                <input type="text" disabled="" name="username" value="<?= $linha['username'] ?>"><br>
                <label>Password: </label>
                <input type="password" required="" name="password" value="<?= $linha['password'] ?>"><br><br>

                <button class="button">Alterar</button>
            </form>


            <?php
            require_once '../rodape.php';
            ?>

        </div>
    </body>
</html>