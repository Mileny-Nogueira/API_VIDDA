<?php
    // Arquivo que mostra todos os serviços oferecidos pela API  
    include 'Pacientes.php'; 

    class PacientesService {
          //Método get para buscar os dados com ou sem parâmetro
          public function get( $id = null )
          {
              if ($id){           

                 return Pacientes::select($id);

              }else{

                 return Pacientes::selectAll();

              }
          }
          //Método post para inserir os dados
          public function post()
          {        
             $dados = json_decode(file_get_contents('php://input'), true, 512);
             if ($dados == null) {

                 throw new Exception("Faltou as informações para incluir");

             }         

             return Pacientes::insert($dados);

          }

          //Método put para alterar os dados
          public function put($id = null)          
          {
              if ($id == null ){

                 throw new Exception("Falta a referência do campo.");

              }                             
      
              $dados = json_decode(file_get_contents('php://input'), true, 512);
              if ($dados == null ){

                 throw new Exception("Faltou as informações para alterar.");

              }

              return Pacientes::alterar($id, $dados);  

          }
          //Método delete para excluir os dados
          public function delete($id = null)
          {
              if($id == null ){

                  throw new Exception("Falta o código");
                  
              }

              return Pacientes::delete( $id );   
              
          }
   }
    