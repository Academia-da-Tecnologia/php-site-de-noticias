<?php

require $_SERVER['DOCUMENT_ROOT'] . 'config.php';

$dados = array();
parse_str($_POST['dados'], $dados);

$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
$nome = filter_var($dados['nome'], FILTER_SANITIZE_STRING);
$login = filter_var($dados['login'], FILTER_SANITIZE_STRING);

$attributes = array(
    'tb_administrador_nome' => $nome,
    'tb_administrador_login' => $login
);

$administrador = new \app\models\administrador();
$statusUpdateAdministrador=$administrador->atualizar($id, $attributes);
echo $statusUpdateAdministrador->errors;
$validation = new \app\classes\validationUniqueness();
$validation->typeObjectValidation($statusUpdateAdministrador);
if ($validation->validUniqueness()):
    echo 'atualizou';
else:
    $validation->createErrorsValidateUniqueness($attributes);
    $erros = $validation->getErrorValidateUniqueness();
    foreach ($erros as $erroValidate):
        echo $erroValidate.'<br />';
    endforeach;
endif;