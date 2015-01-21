<?php

require $_SERVER['DOCUMENT_ROOT'] . 'config.php';

$dados = array();
parse_str($_POST['dados_administrador'], $dados);

$nome = filter_var($dados['txt_nome'], FILTER_SANITIZE_STRING);
$login = filter_var($dados['txt_login'], FILTER_SANITIZE_STRING);
$senha = filter_var($dados['txt_senha'], FILTER_SANITIZE_STRING);

$senha_crypt = crypt($senha, '$1saltnews');

$administrador = new \app\models\administrador();
$attributes = array(
    'tb_administrador_nome' => $nome,
    'tb_administrador_login' => $login,
    'tb_administrador_senha' => $senha_crypt
);

$statusCadastrarAdministrador=$administrador->cadastrar($attributes);
$validation = new \app\classes\validationUniqueness();
$validation->typeObjectValidation($statusCadastrarAdministrador);
if ($validation->validUniqueness()):
    echo 'atualizou';
else:
    $validation->createErrorsValidateUniqueness($attributes);
    $erros = $validation->getErrorValidateUniqueness();
    foreach ($erros as $erroValidate):
        echo $erroValidate.'<br />';
    endforeach;
endif;