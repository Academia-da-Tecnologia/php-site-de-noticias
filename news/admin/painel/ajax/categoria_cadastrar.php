<?php

require $_SERVER['DOCUMENT_ROOT'] . 'config.php';

$nome = filter_var($_POST['categoria'], FILTER_SANITIZE_STRING);
$slug = filter_var($_POST['slug'], FILTER_SANITIZE_STRING);

$categoria = new \app\models\categoria();

//verificar se categoria ja existe
$dados_categoria = $categoria->verificar_categoria($nome);
if (count($dados_categoria) == 1) {
    echo 'jacadastrado';
} else {
    $attributes = array(
        'tb_categoria_nome' => $nome,
        'tb_categoria_slug' => $slug
    );
    $categoria->cadastrar($attributes);
    echo 'cadastrou';
}