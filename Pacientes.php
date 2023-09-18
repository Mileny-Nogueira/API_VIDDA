<?php
      require_once 'config.php'; 
      
      class Pacientes 
      {
        public static function select(int $id)
        {
            $tabela = "tb_paciente"; 
            $coluna = "id_paciente";
            
            $connPdo = new PDO(dbDrive.':host='.dbHost.'; dbname='.dbName, dbUser, dbPass);
            
            $sql = "select * from $tabela where $coluna = :id";
            $stmt = $connPdo->prepare($sql);  
            $stmt->bindValue(':id' , $id) ;
            $stmt->execute();

            if ($stmt->rowCount() > 0)
            {
                return $stmt->fetch(PDO::FETCH_ASSOC);
                
            }else{       

                throw new Exception("Sem registro de paciente.");
            }
        }
        
        public static function selectAll()
        {
            $tabela = "tb_paciente";
            
            $connPdo = new PDO(dbDrive.':host='.dbHost.'; dbname='.dbName, dbUser, dbPass);
            $sql = "select * from $tabela";
            $stmt = $connPdo->prepare($sql);
            $stmt->execute();

            if ($stmt->rowCount() > 0)
            {

                return $stmt->fetchAll(PDO::FETCH_ASSOC);

            }else{

                throw new Exception("Nenhum registro foi encontrado.");

            }
        }

        public static function insert($dados)
        {            
           $tabela = "tb_paciente";
       
           $connPdo = new PDO(dbDrive.':host='.dbHost.'; dbname='.dbName, dbUser, dbPass);
           $sql = "insert into $tabela (nome_paciente, cpf_paciente, sexo_paciente, data_nascimento_paciente, email_paciente, nome_responsavel_paciente) values (:nome, :cpf, :sexo, :data, :email, :resp)";
           $stmt = $connPdo->prepare($sql);

           $stmt->bindValue(':nome', $dados['nome_paciente']);
           $stmt->bindValue(':cpf' , $dados['cpf_paciente']);
           $stmt->bindValue(':sexo' , $dados['sexo_paciente']);
           $stmt->bindValue(':data' , $dados['data_nascimento_paciente']);
           $stmt->bindValue(':email' , $dados['email_paciente']);
           $stmt->bindValue(':resp' , $dados['nome_responsavel_paciente']);
           $stmt->execute() ;

           if ($stmt->rowCount() > 0)
           {
               return 'Dados cadastrados com sucesso!';

           }else{

               throw new Exception("Erro ao  inserir! Verifique se informou os dados corretamente.");

           }
        }

        public static function alterar($id, $dados)
        {
            $tabela = "tb_paciente";
            $coluna = "id_paciente";
            
            $connPdo = new PDO(dbDrive.':host='.dbHost.'; dbname='.dbName, dbUser, dbPass);
            $sql = "update $tabela  set nome_paciente=:nome, cpf_paciente=:cpf, sexo_paciente=:sexo, data_nascimento_paciente=:data, email_paciente=:email, nome_responsavel_paciente=:resp where $coluna = :id" ;
            $stmt = $connPdo->prepare($sql);
            $stmt->bindValue(':id' , $id) ;
            $stmt->bindValue(':nome' , $dados['nome_paciente']);
            $stmt->bindValue(':cpf' , $dados['cpf_paciente']);
            $stmt->bindValue(':sexo' , $dados['sexo_paciente']) ; 
            $stmt->bindValue(':data' , $dados['data_nascimento_paciente']);     
            $stmt->bindValue(':email' , $dados['email_paciente']);   
            $stmt->bindValue(':resp' , $dados['nome_responsavel_paciente']);         
            $stmt->execute() ;

            if ($stmt->rowCount() > 0)
            {
                return 'Dados alterados com sucesso!';

            }else{

                throw new Exception("Erro ao  alterar os dados!");

            }
        }
   
        public static function delete($id)
        {
            $tabela = "tb_paciente";
            $coluna = "id_paciente";

            $connPdo = new PDO(dbDrive.':host='.dbHost.'; dbname='.dbName, dbUser, dbPass);
           
            $sql = "delete from $tabela where $coluna = :id" ;
            $stmt = $connPdo->prepare($sql);
            $stmt->bindValue(':id' , $id);
            $stmt->execute() ;

            if ($stmt->rowCount() > 0)
            {
                return 'Dados excluídos com sucesso!';

            }else{

                throw new Exception("Erro ao excluir os dados!");

            }
        }   
      }