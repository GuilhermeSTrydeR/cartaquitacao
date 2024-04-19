<?php
    $consulta=mysql_query("SELECT NomeUnimed, CNPJ FROM unimeds WHERE CNPJ = '$cnpjUni'");







    if(mysql_num_rows($consulta)>0) {

        // Fazendo o looping para exibição de todos registros que contiverem em nomedatabela

        $pdf = new FPDF();

        $pdf->AddPage();

        $pdf->SetFont('Arial','B',16);



        $pdf->Image('Imgs/AppLogo.jpg',10,8,40);



        $pdf->Cell(190,50,'DECLARAÇÃO ANUAL DE QUITAÇÃO DE DÉBITOS',0,1,'C');

        $pdf->SetFont('Arial','',12);





        while ($dados = mysql_fetch_array($consulta)) {
            
            //aqui eh encodado para utf8 afim de resolver problemas de acento
            $nomeUnimed = utf8_encode($dados['NomeUnimed']);
            
            $pdf->Write(10,'Contratante: ');

            $pdf->Write(10, $nomeUnimed);

            $pdf->Ln(10);

            $pdf->Write(10,'CNPJ: ');

            $pdf->Write(10,$dados['CNPJ']);

        }

        $pdf->Ln(15);




        $pdf->Write(10, '         Três Corações, '.$data.'.');

        $pdf->Ln(15);



        $pdf->Write(10,'          Pelo presente instrumento, a Unimed Três Corações Cooperativa de Trabalho Médico Ltda, operadora de plano de assistência à saúde, com registro perante a ANS sob o nº 35903-3, inscrita no CNPJ sob o nº 42.855.999.0001-09, situada à Rua Dr. Moacir Resende, 358, Centro, na cidade de Três Corações/MG, neste ato representada pelo Diretor Presidente Dr. Gilberto Silva Teixeira, em consonância e cumprimento da Lei Federal nº 12.007/09, vem DECLARAR o pagamento de todas as contribuições (mensalidades, co-participação, franquia, e outras) de janeiro a dezembro do ano de 2021, referente ao plano de assistência à saúde.');

        $pdf->Ln(10);



        $pdf->Write(10,'          Fica ressalvado o direito de a Unimed Três Corações cobrar quaisquer dúvidas de responsabilidade do beneficiário titular acima identificado que vierem a ser apuradas e ainda não cobradas, a título de co-participação por utilização do plano de saúde.');

        $pdf->Ln(10);



        $pdf->Write(10,'          Esta Declaração substitui, para a comprovação do cumprimento das obrigações do consumidor, as quitações dos faturamentos mensais dos débitos do ano a que se refere e dos anos anteriores.');

        $pdf->Ln(10);


        $pdf->Write(10,'          Três Corações, '.$data.'.');

        $pdf->Ln(25);
        



        $pdf->Image('Imgs/Assinatura.jpg',75,255,60);



        $pdf->Output();

    }
?>