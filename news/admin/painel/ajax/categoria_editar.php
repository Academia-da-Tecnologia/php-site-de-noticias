<?php

require $_SERVER['DOCUMENT_ROOT'].'config.php';

$categoria=new \app\models\categoria();
$id=filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
$categoria_nome=filter_input(INPUT_POST, 'categoria', FILTER_SANITIZE_STRING);
$slug=filter_input(INPUT_POST, 'slug', FILTER_SANITIZE_STRING);
$attributes=array(
	'tb_categoria_nome' => $categoria_nome,
	'tb_categoria_slug'=>$slug
);
$categoria->atualizar($id,$attributes);
echo 'atualizou';