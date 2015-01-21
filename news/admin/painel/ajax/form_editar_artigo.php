<?php
require $_SERVER['DOCUMENT_ROOT'] . 'config.php'; 
$id=  filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);

$post=NEW app\models\post();
$dados_do_post=$post->pegar_pelo_id('id', $id);

?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Untitled</title>
        <link rel="stylesheet" href="../public/bootstrap/css/bootstrap.css">
        <link rel="stylesheet" href="../public/css/styles.css">

    </head>
    <body>

        <form action="" method="post" id="form_editar_artigo">
            <label>Titulo:</label>
            <input type="text" name="txt_titulo" value="<?php echo $dados_do_post->tb_post_titulo; ?>"  name="categoria" />

            <label>Categoria:</label>
            <select name="categoria_artigo">
                <?php
                $categorias = new \app\models\categoria();
                $categorias_encontradas = $categorias->listar();
                foreach ($categorias_encontradas as $categoria):
                    ?>
                    <option value="<?php echo $categoria->id; ?>" <?php echo ($categoria->id === $dados_do_post->tb_post_categoria) ? "selected='selected'" : ''; ?> ><?php echo $categoria->tb_categoria_nome; ?></option>
                <?php endforeach; ?>
            </select>
            <label>Slug:</label>
            <input type="hidden" value="<?php echo $dados_do_post->id; ?>" name="id" />
            <input type="text" value="<?php echo $dados_do_post->tb_post_slug; ?>" name="txt_slug"/>

            <label>Post:</label>
            <textarea name="txt_post" id="value-post"><?php echo stripslashes($dados_do_post->tb_post_texto); ?></textarea>

            <label></label>
            <input type="submit" class="btn btn-primary" id="bt_editar_form_artigo" value="editar" />
        </form>

        <div id="status"></div>

        <script src="../public/js/artigo.js"></script>
    </body>
</html>