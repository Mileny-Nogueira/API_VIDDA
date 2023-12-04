<?php

    include 'Pacientes.php'; 

    class PacientesService {
      
        public function get( $id = null ){
            if ($id){           

                return Pacientes::select($id);

            }else{

                return Pacientes::selectAll();

            }
        }
          
        public function post(){        
            $dados = json_decode(file_get_contents('php://input'), true, 512);
            if ($dados == null) {

                throw new Exception("Faltou as informações");

            }else{
                return Pacientes::insert($dados);
            }      
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

              return Pacientes::alterar($id, $dados);  

          }
  
          public function delete($id = null)
          {
              if($id == null ){

                  throw new Exception("Falta o código");
                  
              }

              return Pacientes::delete( $id );   
              
          }
   }
    