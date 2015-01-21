<?php

require $_SERVER['DOCUMENT_ROOT'] . 'config.php';

$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$categoria = filter_input(INPUT_POST, 'categoria', FILTER_SANITIZE_NUMBER_INT);
$tamanho = filter_input(INPUT_POST, 'tamanho', FILTER_SANITIZE_NUMBER_INT);
$posicao = filter_input(INPUT_POST, 'posicao', FILTER_SANITIZE_NUMBER_INT);
$slug = filter_input(INPUT_POST, 'slug', FILTER_SANITIZE_STRING);

if (empty($_FILES['upload']['name'])):
    echo 'Escolha uma foto';
else:

    $imagemPublicidade = $_FILES['upload']['name'];
    $imagemTemporariaPublicidade = $_FILES['upload']['tmp_name'];
    
    $tamanhoPublicidade = new \app\models\publicidadeTamanho();
    $dados_da_publicidade_tamanho = $tamanhoPublicidade->pegar_pelo_id('id', $tamanho);

    $textoTamanhoPublicidade = $dados_da_publicidade_tamanho->tb_publicidade_tamanho_valor;
    $explodeTamanho = explode('x', $textoTamanhoPublicidade);

    $wide = \WideImage\WideImage::load($imagemTemporariaPublicidade);

    $imagem = new \app\classes\imagem();
    $novoNome = $imagem->renomear($imagemPublicidade);
    $imagem->upload($wide, 'publicidade', $explodeTamanho[0], $explodeTamanho[1]);

    $attributes = array(
        'tb_publicidade_tamanho' => $tamanho,
        'tb_publicidade_posicao' => $posicao,
        'tb_publicidade_imagem' => 'publicidade/' . $novoNome,
        'tb_publicidade_slug' => $slug,
        'tb_publicidade_categoria' => $categoria,
        'tb_publicidade_nome' => $nome,
    );

    $publicidade = new \app\models\publicidade();
    try {
        $cadastrar = $publicidade->cadastrar($attributes);
        if ($cadastrar):
            echo 'upload';
        endif;
    } catch (ActiveRecord\ActiveRecordException $e) {
        echo $e->getMessage();
    }
endif;

