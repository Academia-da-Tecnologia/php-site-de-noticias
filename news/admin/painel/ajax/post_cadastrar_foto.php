<?php

require $_SERVER['DOCUMENT_ROOT'] . 'config.php';

$temp_foto = $_FILES['upload']['tmp_name'];
$foto = $_FILES['upload']['name'];
$id = $_POST['id'];

//pegar slug da categoria pelo id do select
$post = new app\models\post();
$dados_post = $post->pegar_pelo_id('id', $id);

$wide = \WideImage\WideImage::load($temp_foto);
$imagem = new \app\classes\imagem();
$imagem->deletar('public/' . $dados_post->tb_post_foto);
$nome_foto = $imagem->renomear($foto);
$imagem->upload($wide, 'fotos', 200, 180);

$post->update_foto($id, 'fotos/' . $nome_foto);
echo 'upload';