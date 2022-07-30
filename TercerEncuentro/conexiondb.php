<?php
    
    //CONEXION A LA BASE DE DATOS
    try
    {
        $conexionDB = new mysqli("localhost", "root", "password", "agenda");
        if ($conexionDB->connect_error)
            {
                die("Ocurrió un error al conectar la base de datos!");
            }
            // $conexionDB->select_db("drugstore");

            echo "Conexión exitosa!";  
            echo "</br>";
    }
    catch (Exception $ex)
    {
        echo "Ocurrió un error al conectarse a la base de datos!". $ex->getMessage();
        
    }
    
 ?>