<?php 
include('../chamado/pdf/fpdf/fpdf.php');
include('../chamado/conexao.php');

//$banco = new Conexao();
	if(isset($_GET['id']))	{
		$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
		$conn = new PDO('mysql:host=localhost;dbname=db_helpdesk', $username='root', $password='');
		$stmt = $conn->prepare(" select ce.cd_protocolo, ce.cd_empresa, chamado.ds_problema, chamado.nm_acompanhamento, chamado.ds_acompanhamento, chamado.ds_observacao, chamado.nm_titulo, chamado.nm_cliente,
			chamado.ds_acompanhamento_email, chamado.ds_tipo, chamado.ds_status, chamado.nm_autor,
			chamado.dt_abertura, chamado.dt_agendamento, chamado.dt_fechamento, chamado.ds_urgencia,
			empresa.nm_empresa
				from tb_chamado as chamado
					join chamado_empresa as ce
						on ce.cd_protocolo = chamado.cd_protocolo
							join tb_empresa as empresa
								on ce.cd_empresa = empresa.cd_empresa
									where chamado.cd_protocolo = '$id' ");
		    			$stmt->execute();
		    			$result = $stmt-> fetch(PDO::FETCH_ASSOC);
		    		}

// $allLogins = selectAllLogin();
// $chamado = visualizar();

$pdf = new FPDF();
$pdf -> AddPage();

// LO
$pdf->Image('img/logo_powerdesk2.png',95,5,22,);
$pdf -> Ln(20);
$pdf -> setFont('Arial','B',16);
$pdf -> Cell(190,10,utf8_decode('Power Desk'),0,0,"C");
$pdf -> Ln(10);

// CABECALHO
$pdf -> setFont('Arial','B',16);
$pdf -> Cell(190,10,utf8_decode('ORDEM DE SERVIÇO'),0,0,"C");
$pdf -> Ln(15);

// TOPICO ABERTURA
$pdf -> setFont('Arial','B',12);
$pdf -> Cell(190,10,utf8_decode('O.S. EXTERNA.'),0,0,"");
$pdf -> Ln(10);
// TITULOS
$pdf -> setFont('Arial','B',10);
$pdf -> Cell(30,7,"ID",1,0,"");
$pdf -> Cell(150,7,utf8_decode("Título"),1,0,"","");
$pdf -> Ln();
//DADOS DO BANCO
//foreach ( $result as $login ) {
	$pdf -> setFont('Arial','',10);
	$pdf -> Cell(30,7,utf8_decode($result["cd_protocolo"]),1,0,"C");
	$pdf -> Cell(150,7,utf8_decode($result["nm_titulo"]),1,0,"");
	$pdf -> Ln();
//}
// TITULOS
$pdf -> setFont('Arial','B',10);
$pdf -> Cell(150,7,utf8_decode("Descrição"),1,0,"");
$pdf -> Cell(30,7,"Data",1,0,"");
$pdf -> Ln();

//DADOS DO BANCO
// foreach ( $result as $login ) {
 	$pdf -> setFont('Arial','',10);
	$pdf -> Cell(150,7,utf8_decode($result["ds_problema"]),1,0,"");
 	$pdf -> Cell(30,7,utf8_decode($result["dt_abertura"]),1,0,"C");
 	$pdf -> Ln();
// }

// TOPICO ACOMPANHAMENTO
$pdf -> Ln(10);
$pdf -> setFont('Arial','B',12);
$pdf -> Cell(190,10,utf8_decode('ACOMPANHAMENTO TÉCNICO'),0,0,"");
$pdf -> Ln(10);

// TITULOS
$pdf -> setFont('Arial','B',10);
$pdf -> Cell(60,15,utf8_decode("Técnico:"),1,0,"","");

$pdf -> Cell(30,15,"Data",1,0,"");
$pdf -> Cell(30,15,utf8_decode("Início:"),1,0,"");
$pdf -> Cell(30,15,utf8_decode("Término:"),1,0,"");
$pdf -> Cell(30,15,utf8_decode("Visto"),1,0,"");
$pdf -> Ln();
$pdf -> Cell(155,7,utf8_decode("Serviços Executados"),1,0,"C");
$pdf -> Cell(25,7,"Qtde.",1,0,"C");
$pdf -> Ln();
//ESPAÇOS P/ PREENCHIMENTO MANUAL
$pdf -> Cell(155,7,"",1,0,"");
$pdf -> Cell(25,7,"",1,0,"C");
$pdf -> Ln();
$pdf -> Cell(155,7,"",1,0,"");
$pdf -> Cell(25,7,"",1,0,"C");
$pdf -> Ln();
$pdf -> Cell(155,7,"",1,0,"");
$pdf -> Cell(25,7,"",1,0,"C");
$pdf -> Ln();
$pdf -> Cell(155,7,"",1,0,"");
$pdf -> Cell(25,7,"",1,0,"C");
$pdf -> Ln();
$pdf -> Cell(155,7,"",1,0,"");
$pdf -> Cell(25,7,"",1,0,"C");
$pdf -> Ln();
$pdf -> Cell(155,7,"",1,0,"");
$pdf -> Cell(25,7,"",1,0,"C");
$pdf -> Ln();
$pdf -> Cell(155,7,"",1,0,"");
$pdf -> Cell(25,7,"",1,0,"C");
$pdf -> Ln();
$pdf -> Cell(155,7,"",1,0,"");
$pdf -> Cell(25,7,"",1,0,"C");
$pdf -> Ln();
$pdf -> Cell(155,7,"",1,0,"");
$pdf -> Cell(25,7,"",1,0,"C");
$pdf -> Ln();
$pdf -> Cell(155,7,"",1,0,"");
$pdf -> Cell(25,7,"",1,0,"C");
$pdf -> Ln();


// TITULOS
$pdf -> Cell(180,2,utf8_decode(""),1,0,"C","I");
$pdf -> Ln();
$pdf -> Cell(180,7,utf8_decode("Observações"),1,0,"C");
$pdf -> Ln();
$pdf -> Cell(180,60,utf8_decode(""),1,0,"");




$pdf -> Output();
 ?>

