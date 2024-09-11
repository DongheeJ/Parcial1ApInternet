<?php
require ("Persona.php");
require ("./persistencia/Conexion.php");
require ("./persistencia/ClienteDAO.php");
class Cliente extends Persona{
    public function __construct($idPersona=0,$nombre="",$apellido="",$correo="",$clave=0) {
        parent::__construct($idPersona, $nombre,$apellido,$correo,$clave);
    }
        
    public function consultarTodos(){
        $clientes = array();
        $conexion = new Conexion();
        $conexion -> abrirConexion();
        $clienteDao = new ClienteDAO();
        $conexion -> ejecutarConsulta($clienteDao -> consultarTodos());
        while($registro = $conexion -> siguienteRegistro()){
            $cliente = new Cliente($registro[0], $registro[1], $registro[2], $registro[3], $registro[4]);
            array_push($clientes, $cliente);
        }
        $conexion -> cerrarConexion();
        return $clientes; 
    }
}

?>




