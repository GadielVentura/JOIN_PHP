<?php

require 'config/config.php';

class Conexion extends Mysqli{

    public function __construct(){

    
    parent:: __construct(HOST,USERNAME,PASS,DB);
    $this -> set_charset('utf8');
        $this -> connect_errno ? die('error al conectar') :  '' ;

    }
}


//$db = new Conexion();
?>