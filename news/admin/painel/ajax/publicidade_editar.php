<?php

require $_SERVER['DOCUMENT_ROOT'] . 'config.php';

$nome = filter_var($_POST['nome'], FILTER_SANITIZE_STRING);
$categoria = filter_var($_POST['categoria'], FILTER_SANITIZE_NUMBER_INT);
$tamanho = filter_var($_POST['tamanho'], FILTER_SANITIZE_NUMBER_INT);
$posicao = filter_var($_POST['posicao'], FILTER_SANITIZE_NUMBER_INT);
$slug = filter_var($_POST['slug'], FILTER_SANITIZE_STRING);
$id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);

$publicidade = new \app\models\publicidade();
$dadosDaPublicidade = $publicidade->pegar_pelo_id('id', $id);

$imagem = new \app\classes\imagem();

if (!empty($_FILES['upload']['name'])):

    $imagemPublicidade = $_FILES['upload']['name'];
    $imagemTemporariaPublicidade = $_FILES['upload']['tmp_name'];

    $imagem->deletar('public/' . $dadosDaPublicidade->tb_publicidade_imagem);

    $tamanhoPublicidade = new \app\models\publicidadeTamanho();
    $dados_da_publicidade_tamanho = $tamanhoPublicidade->pegar_pelo_id('id', $tamanho);

    $textoTamanhoPublicidade = $dados_da_publicidade_tamanho->tb_publicidade_tamanho_valor;
    $explodeTamanho = explode('x', $textoTamanhoPublicidade);

    $wide = \WideImage\WideImage::load($imagemTemporariaPublicidade);
    $novoNome = $imagem->renomear($imagemPublicidade);
    $imagem->upload($wide, 'publicidade', $explodeTamanho[0], $explodeTamanho[1]);
    $nomePublicidade = 'publicidade/' . $novoNome;
else:
    $nomePublicidade = $dadosDaPublicidade->tb_publicidade_imagem;
endif;

$attributes = array(
    'tb_publicidade_tamanho' => $tamanho,
    'tb_publicidade_posicao' => $posicao,
    'tb_publicidade_imagem' => $nomePublicidade,
    'tb_publicidade_slug' => $slug,
    'tb_publicidade_categoria' => $categoria,
    'tb_publicidade_nome' => $nome,
);

$publicidade->atualizar($id, $attributes);
echo 'atualizou';