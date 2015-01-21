<?php require $_SERVER['DOCUMENT_ROOT'] . 'config.php'; ?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Untitled</title>
        <link rel="stylesheet" href="../public/bootstrap/css/bootstrap.css">
        <link rel="stylesheet" href="../public/css/styles.css">

    </head>
    <body>

        <form action="" method="post" id="form_cadastrar_artigo">
            <label>Titulo:</label>
            <input type="text" name="txt_titulo"  name="categoria" />

            <label>Categoria:</label>
            <select name="categoria_artigo">
                <?php
                $categorias = new \app\models\categoria();
                $categorias_encontradas = $categorias->listar();
                foreach ($categorias_encontradas as $categoria):
                    ?>
                    <option value="<?php echo $categoria->id; ?>"><?php echo $categoria->tb_categoria_nome; ?></option>
                <?php endforeach; ?>
            </select>
            <label>Slug:</label>
            <input type="text" name="txt_slug"/>

            <label>Post:</label>
            <textarea name="txt_post" id="value-post"></textarea>

            <label></label>
            <input type="submit" class="btn btn-primary" id="bt_cadastrar_artigo" value="cadastrar" />
        </form>

        <div id="status"></div>

        <script src="../public/js/artigo.js"></script>
    </body>
</html>