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
        <form action="" method="post" id="form_cadastrar_administrador">
            <label>Nome:</label>
            <input type="text" name="txt_nome"  name="categoria" />

            <label>Login:</label>
            <input type="text" name="txt_login"/>

            <label>Senha:</label>
            <input type="text" name="txt_senha" id="value-post"/>

            <label></label>
            <input type="submit" class="btn btn-primary" value="cadastrar" id="bt_form_cadastrar_administrador"/>
        </form>

        <div id="status-cadastrar-administrador"></div>

        <script src="../public/js/administrador.js"></script>
    </body>
</html>