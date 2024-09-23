<?php
require_once ("./persistencia/Conexion.php");
require ("./persistencia/MarcaDAO.php");
class Marca{
    private $idMarca;
    private $nombre;
    public function __construct($idMarca=0, $nombre= ""){
        $this->idMarca = $idMarca;
        $this->nombre = $nombre;
    }

    /**
     * Get the value of idMarca
     */ 
    public function getIdMarca()
    {
        return $this->idMarca;
    }

    /**
     * Set the value of idMarca
     *
     * @return  self
     */ 
    public function setIdMarca($idMarca)
    {
        $this->idMarca = $idMarca;

        return $this;
    }

    /**
     * Get the value of nombre
     */ 
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set the value of nombre
     *
     * @return  self
     */ 
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function consultarTodos(){
        $marcas = array();
        $conexion = new Conexion();
        $conexion -> abrirConexion();
        $marcaDao = new MarcaDAO();
        $conexion->ejecutarConsulta($marcaDao->consultarTodos());
        while($registro = $conexion->siguienteRegistro()){
            $marca = new Marca($registro[0], $registro[1]);
            array_push($marcas, $marca);
        }
        $conexion->cerrarConexion();
        return $marcas;
    }
}
?>