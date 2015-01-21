<?php

require $_SERVER['DOCUMENT_ROOT'] . 'config.php';

$id=  filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
$post=new app\models\post();

$dados_do_post=$post->pegar_pelo_id('id', $id);
app\classes\imagem::deletar('public/'.$dados_do_post->tb_post_foto);
$post->deletar($id);
echo 'deletou';