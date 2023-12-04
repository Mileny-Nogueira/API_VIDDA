<?php
  
    include 'Especialistas.php';
    class EspecialistasService 
    {
          public function get( $id = null )
          {
              if ($id){         
                 return Especialistas::select($id) ;
              }else{
                 return Especialistas::selectAll() ;
              }

          }

          public function post()
          {           
             $dados = json_decode(file_get_contents('php://input'), true, 512);
             if ($dados == null) {
                 throw new Exception("Faltou as informações para incluir");
             }             
             return Especialistas::insert($dados);
          }
    
          public function put($id = null)          
          {
              if ($id == null ){
                 throw new Exception("Falta o código");
              }                             
        
              $dados = json_decode(file_get_contents('php://input'), true, 512);
              if ($dados == null ){
                 throw new Exception("Faltou as informações para alterar");
              }
              return Especialistas::alterar($id, $dados);  
          }
    
          public function delete($id = null)
          {
              if($id == null ){
                  throw new Exception("Falta o código");
              }
              return Especialistas::delete( $id );   
          }
          
   }

   