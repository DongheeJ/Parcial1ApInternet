<?php
require_once ("./persistencia/Conexion.php");
require ("./persistencia/ProductoDAO.php");
require_once("logica/Categoria.php");
require_once("logica/Marca.php");

class Producto{
    private $idProducto;
    private $nombre;
    private $cantidad;
    private $precioCompra;
    private $precioVenta;
    private $categoria;
    private $marca;
    public function getIdProducto() {
        return $this->idProducto;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getCantidad() {
        return $this->cantidad;
    }

    public function getPrecioCompra () {
        return $this->precioCompra;
    }

    public function getPrecioVenta () {
        return $this->precioVenta;
    }

    public function setIdProducto($idProducto){
        $this->idProducto = $idProducto;
    }

    public function setNombre($nombre){
        $this->nombre = $nombre;
    }

    public function setCantidad($cantidad){
        $this->cantidad = $cantidad;
    }

    public function setPrecioCompra($precioCompra){
        $this->precioCompra = $precioCompra;
    }

    public function setPrecioVenta($precioVenta){
        $this->precioVenta = $precioVenta;
    }
    public function getCategoria()
    {
        return $this->categoria;
    }
    public function setCategoria($categoria): void
    {
        $this->categoria = $categoria;
    }
    public function getMarca()
    {
        return $this->marca;
    }
    public function setMarca($marca): void
    {
        $this->marca = $marca;
    }
    public function __construct($idProducto=0, $nombre="", $cantidad=0, $precioCompra=0, $precioVenta=0){
        $this -> idProducto = $idProducto;
        $this -> nombre = $nombre;
        $this -> cantidad = $cantidad;
        $this -> precioCompra = $precioCompra;
        $this -> precioVenta = $precioVenta;
    }
    
    public function consultarTodos(){
        $productos = array();
        $conexion = new Conexion();
        $conexion -> abrirConexion();
        $productoDAO = new ProductoDAO();
        $conexion -> ejecutarConsulta($productoDAO -> consultarTodos());
        while($registro = $conexion -> siguienteRegistro()){
            $producto = new Producto($registro[0], $registro[1], $registro[2], $registro[3], $registro[4]);
            array_push($productos, $producto);
        }
        $conexion -> cerrarConexion();
        return $productos;        
    }
    public function joinWith_M_C() {
        $productos = array();
        $conexion = new Conexion();
        $conexion -> abrirConexion();
        $productoDAO = new ProductoDAO();
        $conexion -> ejecutarConsulta($productoDAO -> joinWith_M_C());
        while($registro = $conexion -> siguienteRegistro()){
            $marca = new Marca($registro[5],$registro[6]);
            $categoria = new Categoria($registro[7],$registro[8]);
            $producto = new Producto($registro[0], $registro[1], $registro[2], $registro[3], $registro[4]);
            $producto->setCategoria($categoria);
            $producto->setMarca($marca);
            array_push($productos, $producto);
        }
        $conexion -> cerrarConexion();
        return $productos;    
    }
    public function consultarCategoria($Ncategoria=""){
        $productos = array();
        $conexion = new Conexion();
        $conexion -> abrirConexion();
        $productoDAO = new ProductoDAO();
        $conexion -> ejecutarConsulta($productoDAO -> consultar_Categoria($Ncategoria));
        while($registro = $conexion -> siguienteRegistro()){
            $producto = new Producto($registro[0], $registro[1], $registro[2], $registro[3], $registro[4]);
            array_push($productos, $producto);
        }
        $conexion -> cerrarConexion();
        return $productos;   
    }
}

?>