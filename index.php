<?php
require_once('tcpdf/tcpdf.php');

// Código de barras do boleto (substitua pelo seu)
$codigo_barras = "34191090000140071236774190000013000000001239";

// Crie uma nova instância da classe TCPDF
$pdf = new TCPDF();

// Adicione uma nova página ao PDF
$pdf->AddPage();

// Defina a fonte
$pdf->SetFont('helvetica', '', 12);

// Adicione o código de barras
$pdf->write1DBarcode($codigo_barras, 'C39', '', '', '', 18, 0.4, $style = array('position' => 'C'));

// Saída do PDF para o navegador ou arquivo
$pdf->Output('boleto.pdf', 'I');
?>