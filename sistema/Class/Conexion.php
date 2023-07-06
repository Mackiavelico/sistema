<?php
/*Creacion de Clase Conexion*/
/**
 * Autor: PGATICA
 * Fecha: 19-jun-2023
 * * Modificado: 04/07/2023 - Jose Montecinos
 */

Class Conexion{
    private $host;
    private $user;
    private $pass;
    private $db;
    private $conexion;


    public function __construct(){//$host, $user, $pass, $db
        require_once "DB_CFG.php";//obtenemos nuestras constantes
        $this->host = host;        
        $this->user = user;        
        $this->pass = pass;        
        $this->db = db;        
    }

    public function Conecta(){
        //Conexion DB
        //POO
        $this->conexion = new mysqli($this->host,$this->user,$this->pass,$this->db);
        //Por Procedimiento
        //$conexion = mysqli_connect($this->host,$this->user,$this->pass,$this->db);

        //validamos si tenemos problemas!
        //por Procedimiento
        /*
        if($conexion == false){
            die("Conexion Error: ".mysqli_connect_error()) ;
        }*/
        //POO
        if($this->conexion->connect_errno){
            die("Conexion Error: (". $this->conexion->connect_errno. ") " . $this->conexion->connect_error);
        }
    }

    public function Desconecta($conexion){
        //Desconexion
        $this->conexion->close();
        //mysqli_close($conexion);
    }

    public function Ejecuta($consulta){
        $result = $this->conexion->query($consulta);
        return $result;
    }
 
}   


?>