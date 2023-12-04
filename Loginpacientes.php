<?php
require_once 'config.php';
class Loginpacientes
{
    public static function verificarLogin($dados){
        $tabela = "tb_login_paciente";
        $colunaLogin = "email_login_paciente";
        $colunaSenha = "senha_login_paciente";
        
        $connPdo = new PDO(dbDrive.':host='.dbHost.'; dbname='.dbName, dbUser, dbPass);

        
        $sql = "select id_login_paciente from $tabela where $colunaLogin =:login and $colunaSenha =:senha";

    
        $stmt = $connPdo->prepare($sql);  

        $stmt->bindValue(':login' , $dados['email_login_paciente']);
        $stmt->bindValue(':senha' , $dados['senha_login_paciente']);

        $stmt->execute() ;
           
        if ($stmt->rowCount() > 0)
        {
            return $stmt->fetch(PDO::FETCH_ASSOC) ;
        }else{               
            throw new Exception("Mensagem: login não existe! Verifique se digitou corretamente o email e senha.");
        }
            
    }
}