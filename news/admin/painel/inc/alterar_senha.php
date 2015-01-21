<?php
if(isset($_POST['alterar_senha'])):

	$administrador= new \app\models\administrador();
	$senha_antiga=filter_input(INPUT_POST, 'senha_antiga', FILTER_SANITIZE_STRING);
	$senha_nova=filter_input(INPUT_POST, 'senha_nova', FILTER_SANITIZE_STRING);
	$adminId = $_SESSION['admin_id'];

	$validation = new \app\classes\validation();
	$validacoes=array(
		'senha_antiga' => 'obrigatorio',
		'senha_nova' => 'obrigatorio'
	);

	$valido=$validation->validar($_POST,$validacoes);

	if($valido){
		$dadosAdministrador=$administrador->pegar_pelo_id('id',$adminId);
		if(crypt($senha_antiga, SALT) == $dadosAdministrador->tb_administrador_senha){
			$attributesAtualizarSenha=array( 
				'tb_administrador_senha' => crypt($senha_nova, SALT)
			);
			$atualizar=$administrador->atualizar($adminId,$attributesAtualizarSenha);
			if($atualizar){
				$statusUpdate = 'Senha alterada com sucesso';
			}else{
				$statusUpdate = 'Erro ao atualizar senha';
			}
		}else{
			$statusUpdate = 'Digite sua senha antiga';
		}
	}
endif;
?>
<form action="" method="post" accept-charset="utf-8">

	<label>Senha Antiga</label>
	<input type="text" name="senha_antiga" value="" placeholder="">

	<label>Nova Senha</label>
	<input type="text" name="senha_nova" class="form-control" value="" placeholder="">

	<label></label>
	<input type="submit" name="alterar_senha" class="btn btn-primary" placeholder="" value="alterar">
</form>
<?php echo \app\classes\validation::mostrarErros(); ?>
<?php echo isset($statusUpdate) ? $statusUpdate : ''; ?>