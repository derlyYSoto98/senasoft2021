<?php
include 'conect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de usuarios</title>
</head>
<body>
 <!--    creacion de formulario basico -->
    <form action="" name="form1" method="POST">
        <table>
            <tr>
                <td> 
                    <select name="tipo" id="tipo">
                        <option value="cedula">cedula</option>
                        <option value="targeta">targeta</option>
                    </select>
                </td>
             </tr>
             <tr>
                 <td> <input type="text" name="identificacion" id="identificacion" placeholder="Identificacion"></td>
             </tr>
             <tr>
                 <td> <input type="text" name="nombre" id="nombre" placeholder="nombre"></td>
             </tr>
             <tr>
                 <td> <input type="text" name="apellido" id="apellido" placeholder="apellido"></td>
             </tr>
             <tr>
                 <td> <input type="text" name="direccion" id="direccion" placeholder="direccion"></td>
             </tr>
             <tr>
                 <td> <input type="text" name="telefono" id="telefono" placeholder="telefono"></td>
             </tr>
             <tr>
                 <td> <input type="date" name="fecha" id="fecha" placeholder="fecha"></td>
             </tr>
             <tr>
                <td> 
                    <select name="estado" id="estado">
                        <option value="activo">activo</option>
                        <option value="inactivo">inactivo</option>
                    </select>
                </td>
                <td> <input type="submit" name="btn1" value="Registrar.."> </td>
        </table>
    </form>
    <!-- Iniciamos insercion de informacion a la base de datos -->
    <?php
      if (isset($_POST['btn1'])){
          $tipo=$_POST['tipo'];
          $ident=$_POST['identificacion'];
          $nombre=$_POST['nombre'];
          $apellido=$_POST['apellido'];
          $direc=$_POST['direccion'];
          $telef=$_POST['telefono'];
          $fecha=$_POST['fecha'];
          $estado=$_POST['estado'];
          /* Recive la informacion y se anexa ala base */
          try {
             $sql1="INSERT INTO cliente(`codigo_cli`, `tipo_documento`, `identificacion_cli`, `nombre_cli`, `apellido_cli`, `direccion_cli`, `telefono_cli`, `fecha_registro`, `estado_cli`) VALUES ('', :mtip, :mide, :mnom, :mape, :mdir, :mtel, :mfec, :msta)";
             $resultado= $cadena ->prepare($sql1);
             $resultado->execute(array(":mtip"=>$tipo, ":mide"=>$ident, ":mnom"=> $nombre, ":mape"=>$apellido, ":mdir"=>$direc, ":mtel"=>$telef, ":mfec"=>$fecha,":msta"=>$estado));

             ?>
             <script lenguage="javascript">window.alert('Usuario registrado con exito')</script>
            <?php
          } catch (Exception $e) {
            die('Alerta revise su conexion a la base de datos'.$e->getMessage());
          }
      } 

    ?>
</body>
</html>