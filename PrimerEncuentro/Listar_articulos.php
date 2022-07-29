<?php

    try
    {
        $conexionDB = new mysqli("localhost", "root", "rootroot", "drugstore", 8080);
        if ($conexionDB->connect_error)
            {
                die("Ocurrió un error al conectar la base de datos!");
            }
            // $conexionDB->select_db("drugstore");

            echo "Conexión exitosa! Vamos!";  
            echo "</br>";
            echo "</br>";
            echo "</br>";


            echo "Consulta a la Base de Datos";    
            echo "</br>";
            echo "==========================";    
            echo "</br>";
            $sql = "SELECT * FROM ARTICULOS";
            $queryArt = $conexionDB->query($sql);
            if ($queryArt->num_rows > 0)
            {
                while ($fila = $queryArt->fetch_array())
                {
                    echo "Detalle: " . $fila[0] . "</br>";
                }
            }
            $queryArt->free_result();


    }
    catch (Exception $ex)
    {
        echo "Ocurrió un error al conectarse a la base de datos!". $ex->getMessage();
        
    }

    
   

?>