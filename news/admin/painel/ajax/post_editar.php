<?php

require $_SERVER['DOCUMENT_ROOT'] . 'config.php';

$dados = array();
parse_str($_POST['values'], $dados);

$id = filter_var($dados['id'], FILTER_SANITIZE_NUMBER_INT);
$titulo = filter_var($dados['txt_titulo'], FILTER_SANITIZE_STRING);
$categoria = filter_var($dados['categoria_artigo'], FILTER_SANITIZE_NUMBER_INT);
$slug = filter_var($dados['txt_slug'], FILTER_SANITIZE_STRING);
$texto = filter_input(INPUT_POST, 'textarea', FILTER_SANITIZE_MAGIC_QUOTES);

$post = new app\models\post();
$attributes = array(
    'tb_post_titulo' => $titulo,
    'tb_post_categoria' => $categoria,
    'tb_post_slug' => $slug,
    'tb_post_texto' => $texto
);

$post->atualizar($id, $attributes);
echo 'atualizou';