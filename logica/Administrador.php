<?php
require ("Persona.php");
require ("./persistencia/Conexion.php");
require ("./persistencia/AdministradorDAO.php");
class Administrador extends Persona{
    
    private $productos;

    public function getProductos(){
        return $this->productos;
    }

    public function setProductos($productos){
        $this->productos = $productos;
    }
    public function __construct($idPersona=0,$nombre="",$apellido="",$correo="",$clave=0) {
        parent::__construct($idPersona, $nombre,$apellido,$correo,$clave);
    }
        
    public function consultarTodos(){
        $admines = array();
        $conexion = new Conexion();
        $conexion -> abrirConexion();
        $adminDao = new AdministradorDAO();
        $conexion -> ejecutarConsulta($adminDao -> consultarTodos());
        while($registro = $conexion -> siguienteRegistro()){
            $admin = new Administrador($registro[0], $registro[1], $registro[2], $registro[3], $registro[4]);
            array_push($admines, $admin);
        }
        $conexion -> cerrarConexion();
        return $admines; 
    }
}

?>




