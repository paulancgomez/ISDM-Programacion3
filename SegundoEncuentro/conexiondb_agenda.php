<?php

    try
    {
        $conexionDB = new mysqli("localhost", "root", "", "agenda");
        if ($conexionDB->connect_error)
            {
                die("Ocurrió un error al conectar la base de datos!");
            }
            // $conexionDB->select_db("drugstore");

            //echo "Conexión exitosa! Vamos!";  
            //echo "</br>";
    }
    catch (Exception $ex)
    {
        echo "Ocurrió un error al conectarse a la base de datos!". $ex->getMessage();
        
    }
    
?>