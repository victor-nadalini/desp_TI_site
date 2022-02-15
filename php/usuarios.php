<?php 

class usuario
{
    protected $pdo;
    public $msgErro = "";//tudo ok


    public function conectar($nome,$host,$usuario,$senha)
    {

         global $pdo;
         try {
            $pdo = new PDO("mysql:dbname=".$nome."host=".$host,$usuario,$senha);
         } catch (PDOException $e) {

         $msgErro = $e->getMessage();

         }

    }
    public function cadastrar($nome, $telefone, $email, $senha)
    {
        global $pdo;
        //verificar se não existe email cadastrado 
        $sql = $pdo-> prepare("SELECT id_usuario FROM usuarios WHERE email = :e");
        $sql->bindValue(":e" , $email);
        $sql -> execute(); 
        if($sql->rowCount() > 0)
        {
            return false;//ja esta cadastrada
        }
        else
        {
              //caso não cadastrar
              $sql->prepare("INSERT INTO usuarios (nome, telefone, email, senha) VALUES (:n,:t,:e:s)");
              $sql->bindValue(":n" , $nome);
              $sql->bindValue(":t" , $telefone);
              $sql->bindValue(":e" , $email);
              $sql->bindValue(":s" ,md5($senha));
              $sql->execute();
              return true; 
        }

        //caso não, cadastrar


    }
    public function logar($email, $senha)
    {
        global $pdo;
        //verificar se o email e senha estão cadastrados, se sim 
        $sql = $pdo -> prepare("SELECT id_usuarios FROM usuarios WHERE email = :e AND senha = :s");
        $sql -> bindValue(":e",$email);
        $sql -> bindValue(":s",md5($senha));
        $sql -> execute(); 
        if($sql->rowCout() > 0)
        { 
        //entrar no sistema (sessão)
        $dado = $sql -> fetch();
        session_start();
        $_SESSION['id_usuario'] = $dado['id_usuario']; 
        return true;//logado com sucesso 
        }
        else
        {
         return false;//não foi possivel logar 
        }
    }
} 
?>