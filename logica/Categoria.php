<?php
require_once ("./persistencia/Conexion.php");
require ("./persistencia/CategoriaDAO.php");
class Categoria{
    private $idCategoria;
    private $nombre;
    
    public function __construct($idCategoria=0,$nombre= ""){
        $this->idCategoria = $idCategoria;
        $this->nombre = $nombre;
    }
    /**
     * Get the value of idCategoria
     */ 
    public function getIdCategoria()
    {
        return $this->idCategoria;
    }

    /**
     * Set the value of idCategoria
     *
     * @return  self
     */ 
    public function setIdCategoria($idCategoria)
    {
        $this->idCategoria = $idCategoria;

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
        $categorias = array();
        $conexion = new Conexion();
        $conexion -> abrirConexion();
        $categoriaDAO = new CategoriaDAO();
        $conexion->ejecutarConsulta($categoriaDAO->consultarTodos());
        while($registro = $conexion->siguienteRegistro()){
            $categoria = new Categoria($registro[0], $registro[1]);
            array_push($categorias, $categoria);
        }
        $conexion->cerrarConexion();
        return $categorias;
    }
}
?>