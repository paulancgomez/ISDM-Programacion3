<?php

    // Demo de PDF con Hola Mundo
    require("fpdf/fpdf.php");
    // Descargar librería de http://www.fpdf.org/
    $pdf = new FPDF();
    $pdf->AddPage();
    $pdf->SetFont('Arial','B',12);
    $pdf->Cell(40,10,'HOLA MUNDO');
        ///    x   y
    $pdf->Output();

    require("plantillaPDF.php");   
    echo 'despues de plantilla';
    $pdf= new MiPDF();
    $pdf->AliasNBPages();
        // para que tome el número de página y salga abajo en el footer
    $pdf->AddPage();
    $pdf->SetFont('Arial','B',12);
    $pdf->SetFillColor(232,232,232);
        // color del encabezado
    $pdf->Ln(10);
        // dejo un espacio de 10
    $pdf->Cell(20, 6, utf8_decode('Código'), 1, 0, 'C', 1);
    $pdf->Cell(60, 6, 'Nombre', 1, 0, 'C', 1);
    $pdf->Cell(25, 6, 'Stock Act.', 1, 0, 'C', 1);
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
            $pdf->Cell(20, 6, $fila["id"], 1, 0, 'C', 1);
            $pdf->Cell(60, 6, $fila["nombre"], 1, 0, 'C', 1);
            $pdf->Cell(25, 6, $fila["stockactual"], 1, 0, 'C', 1);
            $pdf->Cell(25, 6, $fila["precio"], 1, 1, 'C', 1);
        }
        $pdf->Output('', 'articulos_completo.pdf');
            // acá mando la salida y con nombre por defecto como "articulos_completo.pdf"
            // primer parámetro: nada: muestra el archivo, D muestra para descargarlo
    }
    else    
        echo 'No hay artículos para mostrar';
    
    $queryArt->free_result();





?>