<?php

    // Inserto el código del archivo conxiondb_agenda que tiene la conexión a la base de datos
    require('conexiondb_agenda.php');

    // si el formulario ha sido enviado procesa los datos del formulario                        
    if (isset($_GET['nArticulos'])) 
        {
            $sql = "SELECT * FROM Articulos";
            $queryArticulos = $conexionDB->query($sql);
            if ($queryArticulos->num_rows > 0)
            {
                echo "<table border-\"0\"; border-color- \"black\">";
                echo    "<tr style=\"background-color: beige\">";
                echo        "<td style=\"width:100px\">";
                echo            "Id Articulo";
                echo        "<td>";
                echo        "<td style=\"width:300px\">";
                echo            "Nombre";
                echo        "<td>";
                echo        "<td style=\"width:100px\">";
                echo            "Stock Actual";
                echo        "<td>";
                echo        "<td style=\"width:100px\">";
                echo            "Precio";
                echo        "<td>";
                echo    "<tr>";
                while ($fila = $queryArticulos->fetch_assoc())
                {
                    echo    "<tr>";
                    echo        "<td style=\"width:100px\">";
                    echo            $fila["idarticulo"];
                    echo        "<td>";
                    echo        "<td style=\"width:300px\">";
                    echo             $fila["nombre"];
                    echo        "<td>";
                    echo        "<td style=\"width:100px\">";
                    echo            $fila["stockactual"];
                    echo        "<td>";
                    echo        "<td style=\"width:100px\">";
                    echo            $fila["precio"];
                    echo        "<td>";
                    echo    "<tr>";                                                                    
                }
                echo    "</table>";            
            }
        }
        else 
        {
            if (isset($_GET['nHolaMundo'])) 
            {
                // Demo de PDF con Hola Mundo
                require("fpdf/fpdf.php");
                // Descargar librería de http://www.fpdf.org/
                $pdf = new FPDF();
                $pdf->AddPage();
                $pdf->SetFont('Arial','I',12);
                $pdf->Cell(40,10,'HOLA MUNDO');
                    ///    x (horiz)  y (vertical)
                $pdf->Output();
            }        
            else
            {
                if (isset($_GET['nPdf'])) 
                {
                    require("plantillaPDF.php");   
                    $pdf= new MiPDF();
                    $pdf->AliasNBPages();
                        // para que tome el número de página y salga abajo en el footer
                    $pdf->AddPage();
                    $pdf->SetFont('Arial','B',12);
                    $pdf->SetFillColor(232,232,232);
                        // color de fondo del encabezado
                    $pdf->Ln(10);
                        // dejo un espacio de 10
                    $pdf->Cell(25, 6, utf8_decode('Id Artículo'), 1, 0, 'C', 1);
                    $pdf->Cell(60, 6, 'Nombre', 1, 0, 'C', 1);
                    $pdf->Cell(30, 6, 'Stock Actual', 1, 0, 'C', 1);
                    $pdf->Cell(25, 6, 'Precio', 1, 1, 'C', 1);
                        // son los Títulos de la tabla
                        //     ancho/ alto/ texto/ borde/ salto de línea/ Centrado

                    $sql = "SELECT * FROM Articulos";
                    $queryArticulos = $conexionDB->query($sql);
                    if ($queryArticulos->num_rows > 0)
                    {
                        $pdf->SetFont('Arial','',10);
                            // fuente para las filas de la tabla
                        $pdf->SetFillColor(255,255,255);
                            // fondo blanco para las filas de la tabla

                        while ($fila = $queryArticulos->fetch_assoc())
                        {
                            // recorro el query imprimiendo los campos
                            $pdf->Cell(25, 6, $fila["idarticulo"], 1, 0, 'C', 1);
                            $pdf->Cell(60, 6, $fila["nombre"], 1, 0, 'L', 1);
                            $pdf->Cell(30, 6, $fila["stockactual"], 1, 0, 'R', 1);
                            $pdf->Cell(25, 6, $fila["precio"], 1, 1, 'R', 1);
                        }
                        $pdf->Output('', 'articulos_completo.pdf');
                        // acá mando la salida y con nombre por defecto como "articulos_completo.pdf"
                        // primer parámetro: nada: muestra el archivo, D muestra para descargarlo
                    }
                    else    
                        echo 'No hay artículos para mostrar';
                }
                else
                {
                    if (isset($_GET['nExcel'])) 
                    {
                        header('Content-type:application/vnd.ms-excel; charset-UT-8');
                        header('Content-Disposition: attachment;filename=reporte.xls');
                        header('Pragma: no-cache');
                        header('Expires: 0');
                        $sql = "SELECT * FROM Articulos";
                        $queryArticulos = $conexionDB->query($sql);
                        if ($queryArticulos->num_rows > 0)
                        {
                            echo "<table border-\"0\"; border-color- \"black\">";
                            echo    "<tr style=\"background-color: beige\">";
                            echo        "<td style=\"width:100px\">";
                            echo            "Id Articulo";
                            echo        "<td>";
                            echo        "<td style=\"width:300px\">";
                            echo            "Nombre";
                            echo        "<td>";
                            echo        "<td style=\"width:100px\">";
                            echo            "Stock Actual";
                            echo        "<td>";
                            echo        "<td style=\"width:100px\">";
                            echo            "Precio";
                            echo        "<td>";
                            echo    "<tr>";
                            while ($fila = $queryArticulos->fetch_assoc())
                            {
                                echo    "<tr>";
                                echo        "<td style=\"width:100px\">";
                                echo            $fila["idarticulo"];
                                echo        "<td>";
                                echo        "<td style=\"width:300px\">";
                                echo             $fila["nombre"];
                                echo        "<td>";
                                echo        "<td style=\"width:100px\">";
                                echo            $fila["stockactual"];
                                echo        "<td>";
                                echo        "<td style=\"width:100px\">";
                                echo            $fila["precio"];
                                echo        "<td>";
                                echo    "<tr>";                                                                    
                            }
                            echo    "</table>";                                                                    

                        }
                    }
                }
            }    
        }    

?>