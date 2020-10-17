<?php 
include('fpdf/fpdf.php');
include('conexao.php');

//$banco = new Conexao();

$allLogins = selectAllLogin();

$pdf = new FPDF();
$pdf -> AddPage();

//$pdf->Image(string file [,float x [, float y [, float h [, string type [, mixed link ]]]]]])
$pdf->Image('img/logo_powerdesk2.png',10,8,22);
$pdf -> Ln(20);
$pdf -> setFont('Arial','B',16);
$pdf -> Cell(190,10,utf8_decode('Power Desk'),0,0,"");
$pdf -> Ln(10);
//$pdf->Cell(40,20);
//   $pdf->Write(5,'NA continuação é mostrada a imagem ');
//$pdf->Image('img/logo_powerdesk2.png' , 80 ,22, 35 , 38,'PNG', 'http://www.oficinadanet.com.br');

// CABECALHO
$pdf -> setFont('Arial','B',16);
$pdf -> Cell(190,10,utf8_decode('Arquivo PDF'),0,0,"C");
$pdf -> Ln(15);

// TOPICO ABERTURA
$pdf -> setFont('Arial','B',12);
$pdf -> Cell(190,10,utf8_decode('1. ABERTURA'),0,0,"");
$pdf -> Ln(10);
// TITULOS
$pdf -> setFont('Arial','B',10);
$pdf -> Cell(30,7,"ID",1,0,"");
$pdf -> Cell(150,7,utf8_decode("Título"),1,0,"","");
$pdf -> Ln();
//DADOS DO BANCO
foreach ( $allLogins as $login ) {
	$pdf -> setFont('Arial','',10);
	$pdf -> Cell(30,7,utf8_decode($login["cd_login"]),1,0,"C");
	$pdf -> Cell(150,7,$login["email"],1,0,"C");
	$pdf -> Ln();
}
// TITULOS
$pdf -> setFont('Arial','B',10);
$pdf -> Cell(150,7,utf8_decode("Descrição"),1,0,"");
$pdf -> Cell(30,7,"Data",1,0,"");
$pdf -> Ln();

//DADOS DO BANCO
foreach ( $allLogins as $login ) {
	$pdf -> setFont('Arial','',10);
	$pdf -> Cell(150,7,$login["senha"],1,0,"C");
	$pdf -> Cell(30,7,utf8_decode($login["usuario"]),1,0,"C");
	$pdf -> Ln();
}

// TOPICO ACOMPANHAMENTO
$pdf -> Ln(10);
$pdf -> setFont('Arial','B',12);
$pdf -> Cell(190,10,utf8_decode('2. ACOMPANHAMENTO TÉCNICO'),0,0,"");
$pdf -> Ln(10);

// TITULOS
$pdf -> setFont('Arial','B',10);
$pdf -> Cell(60,15,utf8_decode("Técnico"),1,0,"","");
$pdf -> Cell(30,15,"Data",1,0,"");
$pdf -> Cell(30,15,utf8_decode("Início:"),1,0,"");
$pdf -> Cell(30,15,utf8_decode("Término:"),1,0,"");
$pdf -> Cell(40,15,utf8_decode("Visto"),1,0,"");
$pdf -> Ln();
$pdf -> Cell(150,7,utf8_decode("Serviços Executados"),1,0,"");
$pdf -> Cell(20,7,"Qtde.",1,0,"C");
$pdf -> Ln();
//ESPAÇOS P/ PREENCHIMENTO MANUAL
$pdf -> Cell(150,7,"",1,0,"");
$pdf -> Cell(20,7,"",1,0,"C");
$pdf -> Ln();
$pdf -> Cell(150,7,"",1,0,"");
$pdf -> Cell(20,7,"",1,0,"C");
$pdf -> Ln();
$pdf -> Cell(150,7,"",1,0,"");
$pdf -> Cell(20,7,"",1,0,"C");
$pdf -> Ln();
$pdf -> Cell(150,7,"",1,0,"");
$pdf -> Cell(20,7,"",1,0,"C");
$pdf -> Ln();
$pdf -> Cell(150,7,"",1,0,"");
$pdf -> Cell(20,7,"",1,0,"C");
$pdf -> Ln();
$pdf -> Cell(150,7,"",1,0,"");
$pdf -> Cell(20,7,"",1,0,"C");
$pdf -> Ln();
$pdf -> Cell(150,7,"",1,0,"");
$pdf -> Cell(20,7,"",1,0,"C");
$pdf -> Ln();
$pdf -> Cell(150,7,"",1,0,"");
$pdf -> Cell(20,7,"",1,0,"C");
$pdf -> Ln();
$pdf -> Cell(150,7,"",1,0,"");
$pdf -> Cell(20,7,"",1,0,"C");
$pdf -> Ln();
$pdf -> Cell(150,7,"",1,0,"");
$pdf -> Cell(20,7,"",1,0,"C");
$pdf -> Ln();

// TITULOS
$pdf -> Cell(150,40,utf8_decode("Observações"),1,0,"");
$pdf -> Ln();




$pdf -> Output();
 ?>

