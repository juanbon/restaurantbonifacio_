<?php

class PDF extends FPDF {

    //  a esta funcion le paso el numero de mesa  solamente de ahi sè todo
// la mesa que le paso tiene que estar activada, de lo contrario se muestra, mesa invalida,
// Cargar los datos
// Tabla simple
    function Encabezado($header) {
        // Cabecera
        // Datos
        $this->SetFont('Arial', 'B', 10);

        $this->SetLeftMargin(70);
        $this->SetTopMargin(60);

        $this->Cell(70, 24, '', 0);
        $this->Ln();
        $this->Cell(70, 6, 'Comanda', 0, 0, 'C');
        $this->Ln();
        $this->Cell(70, 2, '', 'B');
        $this->Ln();
    }

    function Data($fecha, $hora, $mesa, $mozo) {
        // Cabecera
        // Datos
        $this->SetFont('Arial', '', 8);

        $this->SetLeftMargin(70);
        // $this->SetTopMargin(60);

        $this->Ln();
        $this->Cell(70, 6, 'Fecha: ' . $fecha . '            ' . $hora, 0);
        $this->Ln();
        $this->Cell(70, 6, 'Mesa: ' . $mesa, 0, 0);
        $this->Ln();
        $this->Cell(70, 6, 'Mozo: ' . $mozo, 0, 0);
        $this->Cell(70, 7, ' ', 0, 0);                 // salto de linea
        $this->Ln();
        $this->Cell(70, 6, 'Ud         Articulo', 'B');
        $this->Cell(70, 8, ' ', 0, 0);
        $this->Ln();
    }

    function Productos($productos) {
        // Cabecera
        // Datos      $this->Cell(70, 7,' ', 0, 0);

        foreach ($productos as $p) {
            $this->Cell(70, 6, $p['cantidad'] . '            ' . strtoupper($p['descripcion']), 0);    // strtoupper($str);
            $this->Ln();
        }
        
    }

    function Pie_pagina() {
        // Cabecera
        // Datos
        $this->SetFont('Arial', '', 8);

        $this->SetLeftMargin(70);
        // $this->SetTopMargin(60);
       // $this->Cell(70, 8, ' ', 0, 0);
    //    $this->Ln();
        $this->Cell(70, 6, '', 'T');

      //  $this->Ln();
       // $this->Cell(70, 2, '', 0);
        $this->Ln();
        $this->Cell(70, 6, 'NO VALIDO COMO FACTURA', 0, 0, 'C');
        $this->Ln();
    }

// Una tabla más completa
    function ImprovedTable($header, $data) {
        // Anchuras de las columnas
        $w = array(40, 35, 45, 40);
        // Cabeceras
        for ($i = 0; $i < count($header); $i++)
            $this->Cell($w[$i], 7, $header[$i], 1, 0, 'C');
        $this->Ln();
        // Datos
        foreach ($data as $row) {
            $this->Cell($w[0], 6, $row[0], 'LR');
            $this->Cell($w[1], 6, $row[1], 'LR');
            $this->Cell($w[2], 6, number_format($row[2]), 'LR', 0, 'R');
            $this->Cell($w[3], 6, number_format($row[3]), 'LR', 0, 'R');
            $this->Ln();
        }
        // Línea de cierre
        $this->Cell(array_sum($w), 0, '', 'T');
    }

// Tabla coloreada
    function FancyTable($header, $data) {
        // Colores, ancho de línea y fuente en negrita
        $this->SetFillColor(255, 0, 0);
        $this->SetTextColor(255);
        $this->SetDrawColor(128, 0, 0);
        $this->SetLineWidth(.3);
        $this->SetFont('', 'B');
        // Cabecera
        $w = array(40, 35, 45, 40);
        for ($i = 0; $i < count($header); $i++)
            $this->Cell($w[$i], 7, $header[$i], 1, 0, 'C', true);
        $this->Ln();
        // Restauración de colores y fuentes
        $this->SetFillColor(224, 235, 255);
        $this->SetTextColor(0);
        $this->SetFont('');
        // Datos
        $fill = false;
        foreach ($data as $row) {
            $this->Cell($w[0], 6, $row[0], 'LR', 0, 'L', $fill);
            $this->Cell($w[1], 6, $row[1], 'LR', 0, 'L', $fill);
            $this->Cell($w[2], 6, number_format($row[2]), 'LR', 0, 'R', $fill);
            $this->Cell($w[3], 6, number_format($row[3]), 'LR', 0, 'R', $fill);
            $this->Ln();
            $fill = !$fill;
        }
        // Línea de cierre
        $this->Cell(array_sum($w), 0, '', 'T');
    }

}

$pdf = new PDF();
// Títulos de las columnas
$header = array('');
// Carga de datos
// error
//  $mesa = 5;   //  esto es una vista, por lo general no se definen valores aca, vienen del controlador
// error 


$pdf->SetFont('Arial', '', 9);
$pdf->AddPage();
$pdf->Encabezado($header);
$pdf->Data($fecha, $hora, $mesa, $mozo);
$pdf->Productos($productos);
$pdf->Pie_pagina();

$pdf->Output();
?>