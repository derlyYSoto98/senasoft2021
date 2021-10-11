<?php
      /* Cadena de conexion a la ase de datos*/
try {
    $cadena= new PDO('mysql:host=localhost; dbname=mascota_feliz','root', '');
} catch (Exception $e) {
    die('Alerta revise su conexion a la base de datos'.$e->getMessage());
}
?>