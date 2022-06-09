<?php

include('../../connection/config.php');
include('../../connection/verifica.php');
include('../../connection/fpdf184/fpdf.php');

$relatorio = "SELECT * FROM clientes ORDER BY id ASC";

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(40, 10, utf8_decode('Relatório de Vendas'));
$pdf->Ln(15);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(15, 10, utf8_decode('id'), 1, 0, 'C');
$pdf->Cell(60, 10, utf8_decode('nome'), 1, 0, 'C');
$pdf->Cell(60, 10, utf8_decode('nome da empresa'), 1, 0, 'C');
$pdf->Cell(60, 10, utf8_decode('email'), 1, 0, 'C');
$pdf->Ln(10);


foreach($con->query($relatorio) as $row) {
    $pdf->Cell(15, 10, utf8_decode($row['id']), 1, 0, 'C');
    $pdf->Cell(60, 10, utf8_decode($row['nome']), 1, 0, 'C');
    $pdf->Cell(60, 10, utf8_decode($row['nome_empresa']), 1, 0, 'C');
    $pdf->Cell(60, 10, utf8_decode($row['email']), 1, 0, 'C');
    $pdf->Ln(10);
}

$pdf->Output();


?>