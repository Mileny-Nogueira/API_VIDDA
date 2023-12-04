<?php

    include 'PacientesService.php';
    include 'EspecialistasService.php';
    include 'ConsultasService.php';
    include 'PrescricaoService.php';
    include 'LoginespecialistasService.php';
    include 'LoginpacientesService.php';
    
    header("Content-Type: application/json; charset=UTF-8");  
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: GET,POST,PUT,DELETE");
    header("Access-Control: no-cache, no-store, must-revalidate");
    header("Access-Control-Max-Age: 86400");  
    header("Access-Control-Allow-Headers: Content-Type, Authorization");

    if ($_GET['url']){
       
        $url = explode('/' , $_GET['url']);
         
        if ($url[0] === 'api' ){
            array_shift($url);
            
            $service = ucfirst($url[0]).'Service' ;  

            array_shift($url); 
            
            $method = strtolower( $_SERVER['REQUEST_METHOD']); 

            try {
               
                $response =  call_user_func_array(array( new  $service , $method), $url) ;
                
                http_response_code(200) ;
             
                echo json_encode( array('status' => 'sucess' , 'data' => $response));
                
            } catch (Exception $e) {
                http_response_code(404) ;
                
                echo json_encode( array('status' => 'error' , 'data' => $e->getMessage()));
            }  

        } 
    }
