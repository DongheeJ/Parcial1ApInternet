<?php
class ProductoDAO{
    private $idProducto;
    private $nombre;
    private $cantidad;
    private $precioCompra;
    private $precioVenta;
    
    public function __construct($idProducto=0, $nombre="", $cantidad=0, $precioCompra=0, $precioVenta=0){
        $this -> idProducto = $idProducto;
        $this -> nombre = $nombre;
        $this -> cantidad = $cantidad;
        $this -> precioCompra = $precioCompra;
        $this -> precioVenta = $precioVenta;
    }
    
    public function consultarTodos(){
        return "select idProducto, nombre, cantidad, precioCompra, precioVenta
                from Producto";
    }
    public function joinWith_M_C(){
        return "SELECT p.nombre,p.cantidad,p.precioCompra,p.precioVenta,m.nombre,c.nombre 
        from Producto as p 
        JOIN Marca as m on p.Marca_idMarca = m.idMarca 
        JOIN Categoria as c ON c.idCategoria = p.Categoria_idCategoria;";
    }
    public function consultar_Categoria($Ncategoria=""){
        return "SELECT p.idProducto,p.nombre,p.cantidad,p.precioCompra,p.precioVenta from Producto as p 
        JOIN Categoria as c ON c.idCategoria = p.Categoria_idCategoria where c.nombre='".$Ncategoria."'";
    }
}

?>