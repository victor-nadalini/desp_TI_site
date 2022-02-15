<?php 
require_once './usuarios.php';
$u = new usuario;
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/desp TI cadastro.css">
    <link rel="stylesheet" href="../sql/servidor.sql">
    <title>🖤desp cadastro</title>
</head>

<body>
    <div class="caixa-de-informações">
        <form method="POST">
            <h1>cadastro</h1>
            <input type="text" name="nome" placeholder="nome completo" maxlength="50">
            <br><br>
            <input type="email" name="email" placeholder="e-mail" maxlength="40">
            <br><br>
            <input type="tel" name="telefone" placeholder="telefone" maxlength="30">
            <br><br>
            <input type="password" name="senha" placeholder="senha" maxlength="15">
            <br><br>
            <input type="password" name="confsenha" placeholder="confirmar senha" maxlength="15">
            <br><br>
            <a href="../pages/desp TI.html"><button class="botao-top">cadastrar</button></a>
        </form>
    </div>
    <?php
//verificar se clicou no botão 
if(isset($_POST['nome']));
{
 $nome = addslashes(($_POST['nome']));
 $telefone = addslashes(($_POST['telefone']));
 $email = addslashes(($_POST['email']));
 $senha = addslashes(($_POST['senha']));
 $confirmarSenha = addslashes(($_POST['confsenha']));
 //verificar se não esta vazio se esta prenchido 
 if(!empty($nome)&& !empty($telefone)&& !empty($email)&& !empty($senha)&& !empty($confirmarSenha) )
 {
     $u->conectar("desp_ti_login","127.0.0.1","MSSQLSERVER","root","");
  if($u->msgErro == "")
  {
      if($senha == $confirmarSenha)
      {
        if($u->cadastrar($nome,$telefone,$email,$senha))
        {
            ?>
            <div id="mensagem-sucesso">
            cadastrado corretamente, acesse para entrar
            </div>
            <?php
        }
        else
        {
            ?>
            <div id="email-ja-cadastrado">
            o email ja esta cadastrado
            </div>
          <?php
        }
      }
      else
      {
          ?>
          <div class="conf-senha-nao-corresponde">
         senha e confirmar senha não correspondem
          </div>
          <?php
      }
  }
  else
  {
         ?>
          <div class="mensagem-de-erro">
          <?php echo "erro: " .$u-> msgErro; ?>
          </div>
          <?php
  }
 }else
 {
     ?>
     <div class="todos-os-campos">
      preencha todos os campos!!!
     </div>
    <?php
 }
}
?>
</body>
</html>