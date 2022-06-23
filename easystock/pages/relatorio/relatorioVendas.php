<?php

include('../../connection/config.php');
include('../../connection/verifica.php');
include('../../connection/fpdf184/fpdf.php');

function invdata($dataVenda)
{
    $parte = explode("-", $dataVenda);
    return ($parte[2] . "-" . $parte[1] . "-" . $parte[0]);
}

function floatpreco($preco)
{
    return number_format($preco, 2, ',', '.');
}

$relatorio = "SELECT * FROM vendas WHERE id_clientes = '" . $_SESSION["id_usuario"] . "'";
$query_relatorio = "SELECT COUNT(id_venda) AS qnt_vendas, SUM(preco) AS total_vendas FROM vendas WHERE id_clientes = '" . $_SESSION["id_usuario"] . "'";

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(40, 10, utf8_decode('Relatório de Vendas'));
$pdf->Ln(15);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(100, 10, utf8_decode('Nome'), 1, 0, 'C');
$pdf->Cell(30, 10, utf8_decode('Quantidade'), 1, 0, 'C');
$pdf->Cell(30, 10, utf8_decode('Preço'), 1, 0, 'C');
$pdf->Cell(30, 10, utf8_decode('Data'), 1, 0, 'C');
$pdf->Ln(10);


foreach($con->query($relatorio) as $row) {
    $pdf->Cell(100, 10, utf8_decode($row['nome']), 1, 0, 'C');
    $pdf->Cell(30, 10, utf8_decode($row['quantidade']), 1, 0, 'C');
    $pdf->Cell(30, 10, utf8_decode($row['preco']), 1, 0, 'C');
    $pdf->Cell(30, 10, utf8_decode(invdata($row['dataVenda'])), 1, 0, 'C');
    $pdf->Ln(10);
}

foreach($con->query($query_relatorio) as $row) {
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(100, 10, utf8_decode('Valor Total'), 1, 0, 'C');
    $pdf->Cell(90, 10, utf8_decode(floatpreco($row['total_vendas'])), 1, 0, 'C');
    $pdf->Ln(10);
}

$pdf->Output();


?>