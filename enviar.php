<?php 

    ob_start();

    session_start();

    $cnpj = $_SESSION['cnpj'];
    
    

    //conexao com o banco de dados MYSQL
    require('funcs/conexaoBD.php');


    use Dompdf\Dompdf;

    //instaciamos o DOMPDF biblioteca para gerar o PDF
  
    require_once('lib/dompdf/autoload.inc.php');

    $dompdf = new Dompdf(['enable_remote' => true]);
 
 




    //aqui eh atribuido o ano no formato AAAA para concatenar com a data
    $anoAtual = date('Y');
    $anoAnterior = ($anoAtual - 1);
    
    $data = '14 de Abril de ' . $anoAtual;
    
    $consulta = $pdo->query("SELECT * FROM unimeds WHERE CNPJ = '$cnpj'");
    while ($linha = $consulta->FETCH(PDO::FETCH_ASSOC)) {

      
        $id = $linha['Autoid'];
        $nome = $linha['NomeUnimed'];
        $cnpj = $linha['CNPJ'];
        $codigo = $linha['CodUnimed'];
        $endereco = $linha['Endereco'];
       
    }

    $html = '<!DOCTYPE html>
    <html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>PDF</title>
    </head>
        <body>
            <div style="border: 0px solid red; width: 700px; height: 900px;">
                <center><img width=500 height=75 src="home/unimedtc/public_html/cartaquitacao/resources/images/timbradoTopo.jpg">
                <h2>DECLARAÇÃO ANUAL DE QUITAÇÃO DE DÉBITOS</center></h2>
              ';
                $html .= '<br>';
                $html .= 'Contratante: ' . $nome;  
                $html .= '<br>';
                $html .= 'CNPJ: ' . $cnpj; 
                $html .= '<br>';
                $html .= 'Três Corações, ' . $data;
                $html .= '<br>';
                $html .= '<p align="justify">Pelo presente instrumento, a Unimed Três Corações Cooperativa de Trabalho Médico Ltda, operadora de plano de assistência à saúde, com registro perante a ANS sob o nº 35903-3, inscrita no CNPJ sob o nº 42.855.999.0001-09, situada à Rua Dr. Moacir Resende, 358, Centro, na cidade de Três Corações/MG, neste ato representada pelo Diretor Presidente Dr. Gilberto Silva Teixeira, em consonância e cumprimento da Lei Federal nº 12.007/09, vem DECLARAR o pagamento de todas as contribuições (mensalidades, co-participação, franquia, e outras) de janeiro a dezembro do ano de '. $anoAnterior . ', referente ao plano de assistência à saúde.</p>';
                $html .= '<p align="justify">Fica ressalvado o direito de a Unimed Três Corações cobrar quaisquer dúvidas de responsabilidade do beneficiário titular acima identificado que vierem a ser apuradas e ainda não cobradas, a título de co-participação por utilização do plano de saúde.</p>';
                $html .= '<p align="justify">Esta Declaração substitui, para a comprovação do cumprimento das obrigações do consumidor, as quitações dos faturamentos mensais dos débitos do ano a que se refere e dos anos anteriores.</p>';
                $html .= '<br>';
                $html .= '<br>';
                $html .= '<br>';
                $html .= '<br>';
                $html .= "<center><img src=/home/unimedtc/public_html/cartaquitacao/resources/images/assinatura.jpg'> ";
                $html .= '<br>';
                $html .= 'Três Corações, ' . $data;
                $html .= '<br>';
                $html .= '<br>';
                $html .= '<br>';
                $html .= '<br>';
                $html .= '<br>';
                $html .= '<br>';
                $html .= '<br>';
                $html .= '<br>';
                $html .= '<br>';
                $html .= '<br>';
                $html .= '<img src=<img width=700  src="/timbradoBase.jpg"></center>';
           $html .= ' </div>
        </body>
    </html>';
        




    $dompdf->loadHtml($html);
    $dompdf->set_option("defaultFont", "Arial");
    $dompdf->setPaper("A4", "portrait");
    $dompdf->render();
    $dompdf->stream('DEC_QUIT_DEBITOS_' . date('d-m-Y'));
    
    






?>