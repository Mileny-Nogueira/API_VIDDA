<?php
      require_once 'config.php'; 
      
      class Prescricao
      {
        public static function select(int $id)
        {
            $tabela = "tb_prescricao"; 
            $coluna = "id_prescricao";
            
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
            $tabela = "tb_prescricao";
            
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
           $tabela = "tb_prescricao";
       
           $connPdo = new PDO(dbDrive.':host='.dbHost.'; dbname='.dbName, dbUser, dbPass);
           $sql = "insert into $tabela (descricao_prescricao, validade_prescricao, id_consulta) values (:descricao, :validade, :consulta)";
           $stmt = $connPdo->prepare($sql);

           $stmt->bindValue(':descricao', $dados['descricao_prescricao']);
           $stmt->bindValue(':validade' , $dados['validade_prescricao']);
           $stmt->bindValue(':consulta' , $dados['id_consulta']);
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
            $tabela = "tb_prescricao";
            $coluna = "id_prescricao";
            
            $connPdo = new PDO(dbDrive.':host='.dbHost.'; dbname='.dbName, dbUser, dbPass);
            $sql = "update $tabela  set descricao_prescricao=:descricao, validade_prescricao=:validade, id_consulta=:consulta where $coluna = :id" ;
            $stmt = $connPdo->prepare($sql);
            $stmt->bindValue(':id' , $id) ;
            $stmt->bindValue(':descricao' , $dados['descricao_prescricao']);
            $stmt->bindValue(':validade' , $dados['validade_prescricao']);
            $stmt->bindValue(':consulta' , $dados['id_consulta']) ;        
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
            $tabela = "tb_prescricao";
            $coluna = "id_prescricao";

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