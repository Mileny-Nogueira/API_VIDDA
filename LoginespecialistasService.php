<?php
include 'Loginespecialistas.php';
class LoginespecialistasService
{
    public function post(){
        $dados = json_decode(file_get_contents('php://input'), true, 512);
        if ($dados == null) {
                throw new Exception("Faltou as informações para o login");
        }
        return Loginespecialistas::verificarLogin($dados);    
    }
}