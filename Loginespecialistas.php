<?php
require_once 'config.php';
class Loginespecialistas
{
    public static function verificarLogin($dados){
        $tabela = "tb_login_especialista";
        $colunaLogin = "email_login_especialista";
        $colunaSenha = "senha_login_especialista";
        
        $connPdo = new PDO(dbDrive.':host='.dbHost.'; dbname='.dbName, dbUser, dbPass);

        
        $sql = "select id_login_especialista from $tabela where $colunaLogin =:login and $colunaSenha =:senha";

    
        $stmt = $connPdo->prepare($sql);  

        $stmt->bindValue(':login' , $dados['email_login_especialista']);
        $stmt->bindValue(':senha' , $dados['senha_login_especialista']);

        $stmt->execute() ;
           
        if ($stmt->rowCount() > 0)
        {
            return $stmt->fetch(PDO::FETCH_ASSOC) ;
        }else{               
            throw new Exception("Mensagem: login não existe! Verifique se digitou corretamente o email e senha.");
        }
            
    }
}