<?php
require $_SERVER['DOCUMENT_ROOT'] . 'config.php';

$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
$administrador = new \app\models\administrador();
$dados_do_administrador = $administrador->pegar_pelo_id('id', $id);
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
        <form action="" method="post" id="form_editar_administrador">
            <label>Nome:</label>
            <input type="text" value="<?php echo $dados_do_administrador->tb_administrador_nome; ?>"  name="nome" />

            <label>Login:</label>
            <input type="text" value="<?php echo $dados_do_administrador->tb_administrador_login; ?>" name="login"/>

            <label></label>
            <input type="submit" class="btn btn-primary" data-id="<?php echo $dados_do_administrador->id; ?>" id="bt_editar_form_administrador" value="editar" />
        </form>

        <div id="status_atualizar_administrador"></div>

        <script src="../public/js/administrador.js"></script>
    </body>
</html>