<?php
   
    include 'Prescricao.php'; 

    class PrescricaoService {
    
          public function get( $id = null )
          {
              if ($id){           

                 return Prescricao::select($id);

              }else{

                 return Prescricao::selectAll();

              }
          }
     
          public function post()
          {        
             $dados = json_decode(file_get_contents('php://input'), true, 512);
             if ($dados == null) {

                 throw new Exception("Faltou as informações para incluir");

             }         

             return Prescricao::insert($dados);

          }

      
          public function put($id = null)          
          {
              if ($id == null ){

                 throw new Exception("Falta a referência do campo.");

              }                             
      
              $dados = json_decode(file_get_contents('php://input'), true, 512);
              if ($dados == null ){

                 throw new Exception("Faltou as informações para alterar.");

              }

              return Prescricao::alterar($id, $dados);  

          }
        
          public function delete($id = null)
          {
              if($id == null ){

                  throw new Exception("Falta o código");
                  
              }

              return Prescricao::delete( $id );   
              
          }
   }
    