<?php

require_once '../config.php';

$input_login = filter_var($_POST['login'], FILTER_SANITIZE_STRING);
$input_senha = filter_var($_POST['senha'], FILTER_SANITIZE_STRING);

$login = new \app\models\login();
$dados_login = $login->logar($input_login, $input_senha);

if (count($dados_login) == 1) {
    $_SESSION['admin_logado'] = true;
    $_SESSION['admin_nome'] = $dados_login->tb_administrador_nome;
    $_SESSION['admin_id'] = $dados_login->id;
    session_regenerate_id();
    echo 'logado';
} else {
    echo 'invalido';
}