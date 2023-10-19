<?php
	session_start();
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;

	require 'path/to/PHPMailer/src/Exception.php';
	require 'path/to/PHPMailer/src/PHPMailer.php';
	require 'path/to/PHPMailer/src/SMTP.php';
	$nome = filter_input(INPUT_POST, 'nome');
	$email = filter_input(INPUT_POST, 'email');
	$text = filter_input(INPUT_POST, 'text');
	$message = filter_input(INPUT_POST, 'message');
	$Mailer = new PHPMailer();
	
	//Define que será usado SMTP
	$Mailer->IsSMTP();
	
	//Enviar e-mail em HTML
	$Mailer->isHTML(true);
	
	//Aceitar carasteres especiais
	//To load the French version
	$Mailer->setLanguage('pt_br', '/optional/path/to/language/directory/');
	
	//Configurações
	$Mailer->SMTPAuth = true;
	$Mailer->SMTPSecure = 'ssl';
	
	//nome do servidor
	$Mailer->Host = 'smtp-relay.brevo.com';
	//Porta de saida de e-mail 
	$Mailer->Port = 587;
	
	//Dados do e-mail de saida - autenticação
	$Mailer->Username = 'azidyaleatorio@gmail.com';
	$Mailer->Password = '2PJAvTasUrKbd3Vx';
	
	//E-mail remetente (deve ser o mesmo de quem fez a autenticação)
	$Mailer->From = $email;
	
	//Nome do Remetente
	$Mailer->FromName = $nome;
	
	//Assunto da mensagem
	$Mailer->Subject = $text;
	
	//Corpo da Mensagem
	$Mailer->Body = $message;
	
	//Corpo da mensagem em texto
	$Mailer->AltBody = $message;
	
	//Destinatario 
	$Mailer->AddAddress('azidyaleatorio@gmail.com');
	
	if($Mailer->Send()){
		echo "E-mail enviado com sucesso";
	}else{
		echo "Erro no envio do e-mail: " . $Mailer->ErrorInfo;
	}
	
?>