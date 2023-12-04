<?php
      require_once 'config.php' ;
      
      class Especialistas {
        public static function select($id)
        {
            $tabela = "tb_especialista";
            $coluna = "email_especialista";
      
            $connPdo = new PDO(dbDrive.':host='.dbHost.'; dbname='.dbName, dbUser, dbPass);
            
            $sql = "select * from $tabela where $coluna = :id" ;
            
            $stmt = $connPdo->prepare($sql);  

            $stmt->bindValue(':id' , $id) ;
          
            $stmt->execute() ;
           
            if ($stmt->rowCount() > 0) 
            {
                return $stmt->fetch(PDO::FETCH_ASSOC) ;
        
            }else{   
                throw new Exception("Sem registro de especialista");
            }

        }
        
        public static function selectAll()
        {
            $tabela = "tb_especialista"; 
            
            $connPdo = new PDO(dbDrive.':host='.dbHost.'; dbname='.dbName, dbUser, dbPass);
      
            $sql = "select * from $tabela"  ;
       
            $stmt = $connPdo->prepare($sql);
    
            $stmt->execute() ;

            if ($stmt->rowCount() > 0)
            {
                return $stmt->fetchAll(PDO::FETCH_ASSOC) ;
            }else{
                throw new Exception("Sem registros");
            }

        }
        
        public static function insert($dados)
         {            
            $tabela = "tb_especialista";
           
            $connPdo = new PDO(dbDrive.':host='.dbHost.'; dbname='.dbName, dbUser, dbPass);
           
            $sql = "insert into $tabela 
            (nome_especialista, 
            sexo_especialista, 
            email_especialista, 
            especialidade_especialista, 
            registro_especialista, 
            senha_especialista, 
            cpf_especialista) 
            values 
            (:nome_especialista, 
            :sexo_especialista, 
            :email_especialista, 
            :especialidade_especialista, 
            :registro_especialista, 
            :senha_especialista, 
            :cpf_especialista)";
   
            $stmt = $connPdo->prepare($sql);
    
            $stmt->bindValue(':nome_especialista', $dados['nome_especialista']);
            $stmt->bindValue(':sexo_especialista', $dados['sexo_especialista']);
            $stmt->bindValue(':email_especialista', $dados['email_especialista']);
            $stmt->bindValue(':especialidade_especialista', $dados['especialidade_especialista']);
            $stmt->bindValue(':registro_especialista', $dados['registro_especialista']);
            $stmt->bindValue(':senha_especialista', $dados['senha_especialista']);
            $stmt->bindValue(':cpf_especialista', $dados['cpf_especialista']);
            $stmt->execute() ;

            if ($stmt->rowCount() > 0)
            {
                return 'Dados cadastrados com sucesso!!!';
            }else{
                throw new Exception("Erro ao  inserir os dados!!");
            }
         }
     
        public static function alterar($id, $dados)
        {
            $tabela = "tb_especialista";
            $coluna = "id_especialista";
            
            $connPdo = new PDO(dbDrive.':host='.dbHost.'; dbname='.dbName, dbUser, dbPass);
            $sql = "update $tabela  set 
            nome_especialista=:nome_especialista, 
            sexo_especialista=:sexo_especialista,
            email_especialista=:email_especialista,
            especialidade_especialista=:especialidade_especialista,
            registro_especialista=:registro_especialista,
            senha_especialista=:senha_especialista,
            cpf_especialista=:cpf_especialista
            where $coluna = :id";

            $stmt = $connPdo->prepare($sql);
            $stmt->bindValue(':id' , $id) ;
            $stmt->bindValue(':nome_especialista', $dados['nome_especialista']);
            $stmt->bindValue(':sexo_especialista', $dados['sexo_especialista']);
            $stmt->bindValue(':email_especialista', $dados['email_especialista']);
            $stmt->bindValue(':especialidade_especialista', $dados['especialidade_especialista']);
            $stmt->bindValue(':registro_especialista', $dados['registro_especialista']);
            $stmt->bindValue(':senha_especialista', $dados['senha_especialista']);
            $stmt->bindValue(':cpf_especialista', $dados['cpf_especialista']);
            $stmt->execute() ;

            if ($stmt->rowCount() > 0)
            {
                return 'Dados alterados com sucesso!';
            }else{
                throw new Exception("Erro ao  alterar os dados!!");
            }
        }
     
        public static function delete($id)
        {
            $tabela = "tb_especialista";
            $coluna = "id_especialista";

            $connPdo = new PDO(dbDrive.':host='.dbHost.'; dbname='.dbName, dbUser, dbPass);
            $sql = "delete from $tabela where $coluna = :id_especialista"  ;
            $stmt = $connPdo->prepare($sql);
            $stmt->bindValue(':id_especialista' , $id) ;
            $stmt->execute() ;

            if ($stmt->rowCount() > 0)
            {
                return 'Dados excluídos com sucesso!';
            }else{
                throw new Exception("Erro ao excluir os dados!!");
            }
        }   


      }