<?php

require $_SERVER['DOCUMENT_ROOT'] . 'config.php';

$emailResposta=filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$assunto=filter_input(INPUT_POST, 'assunto', FILTER_SANITIZE_STRING);
$mensagem=filter_input(INPUT_POST, 'mensagem', FILTER_SANITIZE_MAGIC_QUOTES);

$email=new \app\classes\email();
$email->setQuem('Site de noticias');
$email->setPara($emailResposta); //o email do site
$email->setAssunto('RE:'.$assunto);
$email->setBody($mensagem);
if($email->enviar_email()):
	echo 'enviado';
else:
	echo 'nenviado';
endif;