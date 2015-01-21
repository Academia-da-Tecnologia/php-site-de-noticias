<?php

	if(isset($_POST['enviar'])):

	$validacoes=array(
		'nome'=> 'obrigatorio',
		'assunto' => 'obrigatorio',
		'email'=>'obrigatorio|email',
		'mensagem'=>'obrigatorio'
		);	

	$validation=new \app\classes\validation();
	$valido=$validation->validar($_POST,$validacoes);

	$emailCliente=filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
	$nomeCliente=filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
	$assuntoCliente=filter_input(INPUT_POST, 'assunto', FILTER_SANITIZE_STRING);
	$mensagemCliente=filter_input(INPUT_POST, 'mensagem', FILTER_SANITIZE_MAGIC_QUOTES);

	$email=new \app\classes\email();
	$email->setQuem('Site de noticias');
	$email->setPara($emailCliente); //o email do site
	$email->setAssunto('contato do site de noticias');
	$email->setBody($mensagemCliente);
	if($email->enviar_email()){
		//cadastrar no banco de dados a mensagem
		$msgEmailEnviado ='E-mail enviado com sucesso';
		$cadastrarEmail=new \app\models\email();
		$attributes=array(
			'tb_emails_nome' => $nomeCliente,
			'tb_emails_email' => $emailCliente,
			'tb_emails_assunto' => $assuntoCliente,
			'tb_emails_mensagem' => $mensagemCliente
		);
		$cadastrarEmail->cadastrar($attributes);
	}else{
		$msgEmailEnviado ='Erro ao enviar e-mail';
	}
	endif;	

?>
<div class="wrapper">
   <div class="container">
	   <form action="" method="post" accept-charset="utf-8">
	   	<label>Nome:</label>
	   	<input type="text" name="nome" value="" placeholder="">

	   	<label>Assunto:</label>
	   	<input type="text" name="assunto" value="" placeholder="">

	   	<label>E-mail:</label>
	   	<input type="text" name="email" value="" placeholder="">

	   	<label>Mensagem:</label>
	   	<textarea name="mensagem" rows="5" style="width: 200px;"></textarea>

	   	<label></label>
	   	<input type="submit" name="enviar" value="enviar">

	   </form>
	   <?php echo isset($msgEmailEnviado) ? '<div class="alert alert-info">'.$msgEmailEnviado.'</div>' : '';?>
	   <?php \app\classes\validation::mostrarErros(); ?>
   </div>
</div>