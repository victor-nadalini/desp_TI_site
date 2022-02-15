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
    <link rel="stylesheet" href="../css/desp login.css">
    <title>🖤desp login</title>
</head>

<body>
    <div class="caixa-informacoes">
        <h1>login</h1>
        <input type="email" name="email" placeholder="e-mail" maxlength="40">
        <br><br>
        <input type="password" name="senha" placeholder="senha" maxlength="15">
        <br><br>
        <a href="../pages/desp TI.html"><button class="botao-top">entrar</button></a>
    </div>
    <?php
    if(isset($_POST['email']));
    {
   
     $email = addslashes(($_POST['email']));
     $senha = addslashes(($_POST['senha'])); 
     if(!empty($email)&& !empty($senha))
     {
        $u->conectar("desp_ti_login","127.0.0.1","localhost","root","");
        if($u->msgErro == "")
        { 
      if($u -> logar($email,$senha))
      {
       header("privado.php");
      }
      else
      {
          ?>
          <div class="email-senha-incorretos">           +
          email e/ou senha estão errados!!!
          </div>
          <?php
      }
    }
    else
    {
        ?>
        <div class="erro">
           <?php echo "erro: ".$u->msgErro;?>
        </div>
        
        <?php
    }
     }else
     {
         ?>
         <div class="prencha-campos"> 
         preencha todos os campos!!!
         </div>
         <?php
     }
    }
    ?>
</body>

</html>