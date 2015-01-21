<?php require_once '../config.php'; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="EN" lang="EN" dir="ltr">
    <head profile="http://gmpg.org/xfn/11">
        <title>News Magazine</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="imagetoolbar" content="no" />
        <link rel="stylesheet" href="<?php echo site_url(); ?>public/styles/layout.css" type="text/css" />
        <link rel="stylesheet" href="<?php echo site_url(); ?>public/bootstrap/css/bootstrap.css" type="text/css" />

    </head>
    <body id="top">
        <form action="" method="post" id="form_login">
            <label>Login:</label>
            <input type="text" name="login" id="login" />

            <label>Senha:</label>
            <input type="text" name="senha" id="senha" />

            <label></label>
            <button id="bt_logar" class="btn btn-primary">OK</button>

        </form>
        <div id="mensagem"></div>
    </body>
    <script type="text/javascript" src="<?php echo site_url(); ?>public/scripts/jquery-1.4.1.min.js"></script>
    <script type="text/javascript" src="<?php echo site_url(); ?>public/scripts/jquery.easing.1.3.js"></script>
    <script type="text/javascript" src="<?php echo site_url(); ?>public/scripts/jquery.timers.1.2.js"></script>
    <script src="<?php echo site_url() ?>public/scripts/admin.js"></script>
</html>