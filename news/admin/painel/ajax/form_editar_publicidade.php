<?php
require $_SERVER['DOCUMENT_ROOT'] . 'config.php';
$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);

$publicidade = new \app\models\publicidade();
$dadosDaPublicidade = $publicidade->pegar_pelo_id('id', $id);

//listar as vategorias
$categorias = new app\models\categoria();
$dados_da_categoria = $categorias->listar();

//listar tamanho da publicidade
$publicidadeTamanho = new \app\models\publicidadeTamanho();
$dados_da_publicidade_tamanho = $publicidadeTamanho->listar();

//listar posicao da publicidade
$publicidadePosicao = new app\models\publicidadePosicao();
$dados_da_publicidade_posicao = $publicidadePosicao->listar();
?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Cadastrar foto do post</title>
        <link rel="stylesheet" href="../public/bootstrap/css/bootstrap.css">
        <link rel="stylesheet" href="../public/css/styles.css">

    </head>
    <body>

        <form action="" method="post" id="form_editar_publicidade" enctype="multipart/form-data">

            <label>Nome:</label>
            <input type="text" name="nome" id="nome" value="<?php echo $dadosDaPublicidade->tb_publicidade_nome; ?>" />

            <label>Imagem:</label>
            <input type="file" name="upload"/>

            <label>Categoria:</label>
            <select name="categoria">
                <?php foreach ($dados_da_categoria as $categoria): ?>
                    <option value="<?php echo $categoria->id; ?>" <?php echo ($categoria->id == $dadosDaPublicidade->tb_publicidade_categoria) ? "selected='selected'" : ''; ?>><?php echo $categoria->tb_categoria_nome; ?></option>
                <?php endforeach; ?>
            </select>

            <label>Tamanho:</label>
            <select name="tamanho">
                <?php foreach ($dados_da_publicidade_tamanho as $publicidade): ?>
                    <option value="<?php echo $publicidade->id; ?>" <?php echo ($publicidade->id == $dadosDaPublicidade->tb_publicidade_tamanho) ? "selected='selected'" : ''; ?>><?php echo $publicidade->tb_publicidade_tamanho_valor; ?></option>
                <?php endforeach; ?>
            </select>

            <label>Posição:</label>
            <select name="posicao">
                <?php foreach ($dados_da_publicidade_posicao as $posicao): ?>
                    <option value="<?php echo $posicao->id; ?>" <?php echo ($posicao->id == $dadosDaPublicidade->tb_publicidade_posicao) ? "selected='selected'" : ''; ?>><?php echo $posicao->tb_publicidade_posicao_local; ?></option>
                <?php endforeach; ?>
            </select>

            <label>Slug:</label>
            <input type="text" name="slug" id="slug" value="<?php echo $dadosDaPublicidade->tb_publicidade_slug;  ?>" />

            <input type="hidden" name="id" value="<?php echo $dadosDaPublicidade->id; ?>" />
            
            <label></label>
            <input type="submit" class="btn btn-primary"  id="bt_form_alterar_publicidade" value="alterar" />
        </form>

        <div id="statusCadastrarPublicidade"></div>
        <script src="../public/js/publicidade.js"></script>
        <script src="../public/js/ajaxForm.js"></script>
    </body>
</html>