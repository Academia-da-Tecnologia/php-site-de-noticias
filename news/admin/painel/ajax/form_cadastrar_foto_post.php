<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Cadastrar foto do post</title>
        <link rel="stylesheet" href="../public/bootstrap/css/bootstrap.css">
        <link rel="stylesheet" href="../public/css/styles.css">

    </head>
    <body>

        <form action="" method="post" id="form_cadastrar_foto_artigo" enctype="multipart/form-data">

            <label>Foto:</label>
            <input type="file" name="upload"/>

            <label></label>
            <input type="submit" class="btn btn-primary" data-id="<?php echo $_POST['id']; ?>" id="bt_cadastrar_foto_post" value="cadastrar" />
        </form>

        <div id="status"></div>


        <script src="../public/js/artigo.js"></script>
        <script src="../public/js/ajaxForm.js"></script>

    </body>
</html>