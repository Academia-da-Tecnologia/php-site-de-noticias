<?php
require $_SERVER['DOCUMENT_ROOT'] . 'config.php';

$categorias = new app\models\categoria();
$dados_da_categoria = $categorias->listar();

$publicidadeTamanho = new \app\models\publicidadeTamanho();
$dados_da_publicidade_tamanho = $publicidadeTamanho->listar();

$publicidadePosicao=new app\models\publicidadePosicao();
$dados_da_publicidade_posicao=$publicidadePosicao->listar();
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

        <form action="" method="post" id="form_cadastrar_publicidade" enctype="multipart/form-data">

            <label>Nome:</label>
            <input type="text" name="nome" id="nome" />

            <label>Imagem:</label>
            <input type="file" name="upload"/>

            <label>Categoria:</label>
            <select name="categoria">
                <?php foreach ($dados_da_categoria as $categoria): ?>
                    <option value="<?php echo $categoria->id; ?>"><?php echo $categoria->tb_categoria_nome; ?></option>
                <?php endforeach; ?>
            </select>

            <label>Tamanho:</label>
            <select name="tamanho">
                <?php foreach ($dados_da_publicidade_tamanho as $publicidade): ?>
                    <option value="<?php echo $publicidade->id; ?>"><?php echo $publicidade->tb_publicidade_tamanho_valor; ?></option>
                <?php endforeach; ?>
            </select>
            
             <label>Posição:</label>
            <select name="posicao">
                <?php foreach ($dados_da_publicidade_posicao as $posicao): ?>
                    <option value="<?php echo $posicao->id; ?>"><?php echo $posicao->tb_publicidade_posicao_local; ?></option>
                <?php endforeach; ?>
            </select>

            <label>Slug:</label>
            <input type="text" name="slug" id="slug" />

            <label></label>
            <input type="submit" class="btn btn-primary" id="bt_form_cadastrar_publicidade" value="cadastrar" />
        </form>

        <div id="statusCadastrarPublicidade"></div>
        <script src="../public/js/publicidade.js"></script>
        <script src="../public/js/ajaxForm.js"></script>
    </body>
</html>