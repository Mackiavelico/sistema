<?php
/*Creacion de Clase Autenticar*/

/**
 * Autor: PGATICA
 * Fecha: 19-jun-2023
 * * Modificado: 04/07/2023 - Jose Montecinos
 */
require("Class/Conexion.php");
session_start();
class Autenticar
{
    private $rut;
    private $clave;


    public function __construct($rut, $clave)
    {
        $this->rut = $rut;
        $this->clave = $clave;
    }



    public function Validar()
    {
        $conexion = new Conexion();
        $conexion->Conecta();

        $consulta = "SELECT * FROM usuario WHERE rut = '$this->rut' AND clave = '$this->clave'";

        $resultado = $conexion->Ejecuta($consulta);  // es una funcion

        if ($resultado->num_rows == 1) {

            $row = $resultado->fetch_assoc();
            $tipoUsuario = $row['codigo_perfil'];

            $rut = $row['rut'];

          // var_dump($rut);
         //die();


           $_SESSION[$tipoUsuario]= 'codigo_perfil';

            if ($tipoUsuario == 1) {
                $_SESSION['rut']= $rut;
                header("location: Panel.php");

            } elseif ($tipoUsuario == 2) {
                $_SESSION['rut']= $rut;
                header("location:panelNormal.php");

            } else {
                header('Location: index.php');
            }
        }
    }
}
