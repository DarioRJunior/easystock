<?php

include('../../connection/config.php');
include('../../connection/verifica.php');
include('../../connection/fpdf184/fpdf.php');

$relatorio = "SELECT * FROM vendas WHERE id_clientes = '" . $_SESSION["id_usuario"] . "'";

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(40, 10, 'Relatório de Vendas');
$pdf->Ln();
$pdf->Cell(40, 10, 'Nome');
$pdf->Cell(40, 10, 'Quantidade');
$pdf->Cell(40, 10, 'Preço');
$pdf->Cell(40, 10, 'Data');
$pdf->Ln(15);

foreach($con->query($relatorio) as $row) {
    $pdf->Cell(40, 10, utf8_decode($row['nome']), 1, 0, 'L');
    $pdf->Cell(40, 10, utf8_decode($row['quantidade']), 1, 0, 'L');
    $pdf->Cell(40, 10, utf8_decode($row['preco']), 1, 0, 'L');
    $pdf->Cell(40, 10, utf8_decode($row['dataVenda']), 1, 0, 'L');
    $pdf->Ln(15);
}

$pdf->Output();


?>