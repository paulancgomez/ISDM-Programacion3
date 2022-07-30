<?php
    require("conexiondb.php");
        try{
    
            $conexionDB->begin_transaction(MYSQLI_TRANS_START_READ_WRITE);

            $sql="INSERT INTO Ventas_enca (Fechaemision, Nrocomprobante, Total, Idusuario, Idcaja, Idcliente)
                VALUES (Curdate(), 3, 500, NULL, NULL, 1)";
            $queryVentas=$conexionDB->query($sql);
            if (!$queryVentas)
                throw new Exception($conexionDB->error);
            else
            {  
                $sql="INSERT INTO Ventas_Item (Idventa, Orden, Idarticulo, Cantidad, Precio)
                    VALUES (".$conexionDB->insert_id.",1,1,1,500)";
                $queryVentas_Item=$conexionDB->query($sql);
                if (!$queryVentas_Item)
                    throw new Exception($conexionDB->error);
                else
                {
                    $conexionDB->commit();
                    echo "Grabación exitosa de nueva venta !";
                }
            }
        }
        catch (Exception $ex)
        {
            $conexionDB->rollback();
            echo "Ocurrió un error al intentar grabar la Venta! " . $ex->getMessage();
        }
    
?>
          