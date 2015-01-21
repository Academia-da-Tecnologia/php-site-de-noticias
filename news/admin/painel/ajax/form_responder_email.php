<?php
    require $_SERVER['DOCUMENT_ROOT'] . 'config.php';
    $id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
    $emails=new \app\models\email();
    $emailEncontrado=$emails->pegar_pelo_id('id', $id);
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
        <form action="" method="post" id="form_responder_email" enctype="multipart/form-data">

            <label>Nome:</label>
            <input type="text" name="nome" id="nome" value="<?php echo $emailEncontrado->tb_emails_nome; ?>" />

            <label>Assunto:</label>
            <input type="text" name="assunto" id="assunto"  value="<?php echo $emailEncontrado->tb_emails_assunto; ?>"/>

            <label>E-mail:</label>
            <input type="text" name="email" id="email" value="<?php echo $emailEncontrado->tb_emails_email; ?>"/>

            <label>Mensagem:</label>
            <textarea name="mensagem" id="mensagem"><?php echo $emailEncontrado->tb_emails_mensagem; ?></textarea>
        
            <label></label>
            <input type="submit" class="btn btn-primary" id="bt_form_responder_email" value="responder" />
            <div id="status-enviar-email"></div>
        </form>
        <script src="../public/js/emails.js"></script>
    </body>
</html>