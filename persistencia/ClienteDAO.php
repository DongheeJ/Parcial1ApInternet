<?php
class ClienteDAO{
    public function consultarTodos(){
        return "SELECT idCliente,nombre,apellido,correo,clave FROM Cliente;";
    }
}
?>