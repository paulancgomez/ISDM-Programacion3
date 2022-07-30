<?php
    require("conexiondb.php");
         
    //CABECERA DE FACTURA
    $sql="INSERT INTO Ventas_enca (Fechaemision, Nrocomprobante, Total, Idusuario, Idcaja, Idcliente)
        VALUES (Curdate(), 11, 100, NULL, NULL, 1)";
    $queryVentas=$conexionDB->query($sql);
    if (!$queryVentas)
        echo "Error en Encabezado!";
    else
    {  
        //DETALLE DE FACTURA
        $sql="INSERT INTO Ventas_Item (Idventa, Orden, Idarticulo, Cantidad, Precio)
        VALUES (".$conexionDB->insert_id.", 1, 1, 1, 100)";
        $queryVentas_Item=$conexionDB->query($sql);
        if (!$queryVentas_Item)
            echo "Error en Item!";
    }           
    
?>
        