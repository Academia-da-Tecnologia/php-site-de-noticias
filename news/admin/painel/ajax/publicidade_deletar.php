<?php

require $_SERVER['DOCUMENT_ROOT'] . 'config.php';

$id=  filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);

//pegar dados da publicidade
$publicidade=new \app\models\publicidade();
$dadosDaPublicidade=$publicidade->pegar_pelo_id('id', $id);
$foto=$dadosDaPublicidade->tb_publicidade_imagem;

//deletar imagem da publicidade
$imagem=new \app\classes\imagem();
$imagem->deletar('public/'.$foto);

$publicidade->deletar($id);
echo 'deletou';