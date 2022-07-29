<?php
    //CODIGO PHP

    // Inserto el código del archivo conexiondb_agenda que tiene la conexión a la base de datos
    require('conexiondb_agenda.php');

    // si el formulario ha sido enviado procesa los datos del formulario
    
    //BUSCAR
    if (isset($_GET['nBuscar'])) 
    {
        $idUsuario = $_GET["nIdUsuario"];
        $instruccionSql = "SELECT IdUsuario, ApeNom, Email FROM USUARIOS WHERE IdUsuario = '$idUsuario'";
        $resultado = $conexionDB->query($instruccionSql);
        if ($resultado->num_rows > 0)
        {
            echo "Usuario Encontrado!! </br>";
            echo "</br>";
            while ($fila = $resultado->fetch_object())
            {
                echo "IdUsuario: " . $fila->IdUsuario . "</br>";
                echo "Apellido y Nombre: " . $fila->ApeNom . "</br>";
                echo "E-Mail: " . $fila->Email . "</br>";                
            }    
        }
        else
            echo "Usuario NO Encontrado !!. </br>";
    }
    else
        //MODIFICAR
        if (isset($_GET['nModificar'])) 
        {
        $idUsuario = $_GET["nIdUsuario"];
        $instruccionSql = "SELECT IdUsuario, ApeNom, Email FROM USUARIOS WHERE IdUsuario = '$idUsuario'";
        $resultado = $conexionDB->query($instruccionSql);
        if ($resultado->num_rows > 0)
        {
            echo "Usuario Encontrado!! </br>";
            echo "</br>";
            $apenom = $_GET["nApenom"];
            $email = $_GET["nEmail"];
            $instruccionSql = "UPDATE USUARIOS SET ApeNom = '$apenom', Email = '$email' WHERE IdUsuario = '$idUsuario'";
            $resultado = $conexionDB->query($instruccionSql);
            if ($resultado)
                echo "Datos Actualizados con Exito !";
            else
                echo "Los Datos no fueron Actualizados";                                
         }    
         else
            echo "Usuario no encontrado!";
        }
        else
            //ELIMINAR
            if (isset($_GET['nEliminar'])) 
            {
            $idUsuario = $_GET["nIdUsuario"];
            $instruccionSql = "SELECT IdUsuario, ApeNom, Email FROM USUARIOS WHERE IdUsuario = '$idUsuario'";
            $resultado = $conexionDB->query($instruccionSql);
            if ($resultado->num_rows > 0)
            {
                echo "Usuario Encontrado!! </br>";
                echo "</br>";
                $instruccionSql = "DELETE FROM Usuarios WHERE IdUsuario = '$idUsuario'";
                $resultado = $conexionDB->query($instruccionSql);
                if ($resultado)
                    echo "Usuario elmininado con éxito !";
                else
                    echo "No se pudo eliminar el Usuario !";
            }
            else
                echo "Usuario NO Encontrado !!. </br>";
        }                  
?>