<?php
require_once('tcpdf/tcpdf.php');

// Função para gerar o boleto em PDF
function gerarBoletoPDF($codigo_barras) {
    // Crie uma nova instância da classe TCPDF
    $pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);

    // Defina o título do documento
    $pdf->SetTitle('Boleto');

    // Adicione uma nova página ao PDF
    $pdf->AddPage();

    // Defina a fonte
    $pdf->SetFont('helvetica', '', 12);

    // Calcule a largura do código de barras
    $largura_codigo_barras = strlen($codigo_barras) * 4;

    // Calcule a posição horizontal para centralizar o código de barras
    $x = ($pdf->getPageWidth() - $largura_codigo_barras) / 2;

    // Calcule a posição vertical para centralizar o código de barras
    $y = ($pdf->getPageHeight() - 20) / 2;

    // Adicione o código de barras
    $pdf->write1DBarcode($codigo_barras, 'C39', $x, $y, '', 15, 0.4, $style = array('position' => 'C'));

    // Saída do PDF para o navegador
    $pdf->Output('boleto.pdf', 'I');
}

// Código de barras do boleto (substitua pelo seu)
$codigo_barras = "34191090000140071236774190000013000000001239";

// Chamada da função para gerar o boleto em PDF
gerarBoletoPDF($codigo_barras);
?>
