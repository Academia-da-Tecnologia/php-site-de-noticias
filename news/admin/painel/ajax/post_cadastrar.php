<?php
require $_SERVER['DOCUMENT_ROOT'].'config.php';

$dados=array();
parse_str($_POST['values'],$dados);

$titulo=filter_var($dados['txt_titulo'], FILTER_SANITIZE_STRING);
$categoria=filter_var($dados['categoria_artigo'], FILTER_SANITIZE_NUMBER_INT);
$slug=filter_var($dados['txt_slug'], FILTER_SANITIZE_MAGIC_QUOTES);
$texto_post=$_POST['textarea'];

$post=new \app\models\post();
$attributes=array(
	'tb_post_titulo'=>$titulo,
	'tb_post_data'=>date('Y-m-d H:i:s'),
	'tb_post_texto' => $texto_post,
	'tb_post_autor'=>$_SESSION['admin_nome'],
	'tb_post_slug'=>$slug,
	'tb_post_categoria'=>$categoria
);
$post->cadastrar($attributes);
echo 'cadastrado';