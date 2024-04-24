Exemplo completo de código PHP que gera um boleto em PDF responsivo e centralizado na página:

```php
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
```

Certifique-se de ter a biblioteca TCPDF instalada e o diretório "tcpdf" acessível no mesmo diretório que o seu script PHP. Este código irá gerar um boleto em PDF responsivo, centralizado horizontal e verticalmente na página. O código de barras será posicionado automaticamente no centro da página.

Para obter a biblioteca TCPDF, você pode baixá-la diretamente do site oficial ou clonar o repositório GitHub. Aqui estão os passos para ambas as opções:

### Opção 1: Baixar do site oficial:

1. Acesse o site oficial do TCPDF: [TCPDF - PHP Class for PDF](https://tcpdf.org/).
2. Na página inicial, você encontrará um link para download. Clique nele para baixar o arquivo compactado contendo a biblioteca.
3. Após o download, descompacte o arquivo ZIP em um diretório de sua escolha em seu servidor.

### Opção 2: Clonar o repositório GitHub:

1. Vá para o repositório TCPDF no GitHub: [TCPDF GitHub Repository](https://github.com/tecnickcom/TCPDF).
2. No canto superior direito, clique no botão verde "Code" e selecione "Download ZIP" para baixar o repositório como um arquivo ZIP.
3. Após o download, descompacte o arquivo ZIP em um diretório de sua escolha em seu servidor.

### Instalação:

Depois de obter a biblioteca TCPDF, você precisa instalá-la no diretório do seu projeto. Geralmente, é uma boa prática colocar a biblioteca em um diretório separado e referenciá-la conforme necessário.

Por exemplo, suponha que você tenha baixado a biblioteca TCPDF em um diretório chamado "tcpdf" no mesmo diretório onde está seu script PHP. Seu diretório de projeto pode parecer com isto:

```
seu_projeto/
├── tcpdf/
│   ├── ... (arquivos do TCPDF)
├── seu_script.php
```

Em seguida, você pode incluir a classe TCPDF no seu script PHP usando o `require_once` conforme mostrado no exemplo de código anterior. Certifique-se de ajustar o caminho do `require_once` de acordo com a localização real da biblioteca TCPDF no seu servidor.