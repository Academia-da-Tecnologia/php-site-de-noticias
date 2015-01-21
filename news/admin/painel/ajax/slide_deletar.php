<?php

require $_SERVER['DOCUMENT_ROOT'].'config.php';

$slide=new \app\models\slide();
$id=filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);

$dados_slide=$slide->pegar_pelo_id('id', $id);
$foto=$dados_slide->tb_slide_caminho;
$thumb=$dados_slide->tb_slide_caminho_thumb;

//deletou os banners
\app\classes\imagem::deletar($foto);
\app\classes\imagem::deletar($thumb);

//deletou no banco o slide
$slide->deletar($id);
echo 'deletou';