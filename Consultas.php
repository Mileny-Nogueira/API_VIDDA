<?php
      require_once 'config.php'; 
      
      class Consultas
      {
        public static function select(int $id)
        {
            $tabela = "tb_consulta"; 
            $coluna = "id_consulta";
            
            $connPdo = new PDO(dbDrive.':host='.dbHost.'; dbname='.dbName, dbUser, dbPass);
            
            $sql = "select * from $tabela where $coluna = :id";
            $stmt = $connPdo->prepare($sql);  
            $stmt->bindValue(':id' , $id) ;
            $stmt->execute();

            if ($stmt->rowCount() > 0)
            {
                return $stmt->fetch(PDO::FETCH_ASSOC);
                
            }else{       

                throw new Exception("Sem registro de prescrição com esse parâmetro.");
            }
        }
        
        public static function selectAll()
        {
            $tabela = "tb_consulta";
            
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
           $tabela = "tb_consulta";
       
           $connPdo = new PDO(dbDrive.':host='.dbHost.'; dbname='.dbName, dbUser, dbPass);
           $sql = "insert into $tabela (localizacao_consulta, data_consulta, id_paciente, id_especialista) values (:local, :data, :paciente, :especialista)";
           $stmt = $connPdo->prepare($sql);

           $stmt->bindValue(':local', $dados['localizacao_consulta']);
           $stmt->bindValue(':data' , $dados['data_consulta']);
           $stmt->bindValue(':paciente' , $dados['id_paciente']);
           $stmt->bindValue(':especialista' , $dados['id_especialista']);
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
            $tabela = "tb_consulta";
            $coluna = "id_consulta";
            
            $connPdo = new PDO(dbDrive.':host='.dbHost.'; dbname='.dbName, dbUser, dbPass);
            $sql = "update $tabela  set localizacao_consulta=:local, data_consulta=:data, id_paciente=:paciente, id_especialista=:especialista where $coluna = :id" ;
            $stmt = $connPdo->prepare($sql);
            $stmt->bindValue(':id' , $id) ;
            $stmt->bindValue(':local' , $dados['localizacao_consulta']);
            $stmt->bindValue(':data' , $dados['data_consulta']);
            $stmt->bindValue(':paciente' , $dados['id_paciente']);  
            $stmt->bindValue(':especialista' , $dados['id_especialista']);        
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
            $tabela = "tb_consulta";
            $coluna = "id_consulta";

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