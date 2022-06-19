<?php
// Passando os dados obtidos pelo formulário para as variáveis abaixo
$nomeremetente = $_POST['name'];
$emailremetente = trim($_POST['email']);
$emaildestinatario = 'contato@seuhost.com.br';// Digite seu e-mail aqui, lem
$assunto = $_POST['assunto'];
$mensagem = $_POST['message'];
        
        $captchaResult = $_POST["captchaResult"];
		$firstNumber = $_POST["firstNumber"];
		$secondNumber = $_POST["secondNumber"];

		$checkTotal = $firstNumber + $secondNumber;
		
/* Montando a mensagem a ser enviada no corpo do e-mail. */
$mensagemHTML = '
<strong>Formulário de Contato Teste</strong>
<p><b>Nome:</b> '.$nomeremetente.' <p>
<b>E-Mail:</b> '.$emailremetente.' <p>
<b>Assunto:</b> '.$assunto.' <p>
<b>Mensagem:</b> '.$mensagem.'</p>
<hr>';
// O return-path deve ser ser o mesmo e-mail do remetente.
$headers = "MIME-Version: 1.1\r\n";
$headers .= "Content-type: text/html; charset=utf-8\r\n";
$headers .= "From: $emailremetente\r\n";
// remetente
$headers .= "Return-Path: $emaildestinatario \r\n";
// return-path

//$envio = mail($emaildestinatario, $assunto, $mensagemHTML, $headers, $captchaResult);
if($captchaResult == $checkTotal){
    $envio = mail($emaildestinatario, $assunto, $mensagemHTML, $headers);
	echo "<script>alert('E-mail enviado com sucesso.');window.location.assign('index.php');</script>"; }
else
{
			echo "<script>alert('Captcha errado. Tente novamente.');window.location.assign('index.php');</script>";
		}

?>
