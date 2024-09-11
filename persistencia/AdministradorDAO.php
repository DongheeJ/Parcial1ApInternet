<?php
class AdministradorDAO{
    public function consultarTodos(){
        return "SELECT idAdministrador,nombre,apellido,correo,clave FROM Administrador;";
    }
}
?>