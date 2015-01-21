<?php
require '../config.php';
if (isset($_POST['bt_login'])):

    $input_login = filter_var($_POST['login'], FILTER_SANITIZE_STRING);
    $input_senha = filter_var($_POST['senha'], FILTER_SANITIZE_STRING);

    $login = new \app\models\login();
    $dados_login = $login->logar($input_login, crypt($input_senha, SALT));


    if (count($dados_login) == 1) {
        $_SESSION['admin_logado'] = true;
        $_SESSION['admin_nome'] = $dados_login->tb_administrador_nome;
        $_SESSION['admin_id'] = $dados_login->id;
        session_regenerate_id();
        header('Location:painel/');
    } else {
        $status_login = 'Erro ao logar';
        $tipo_mensagem_login = 'no';
    }

endif;
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Painel Administrativo - </title>

        <meta name="language" content="pt-br" /> 
        <meta name="robots" content="NOINDEX,NOFOLLOW" /> 

        <link rel="icon" type="image/png" href="ico/chave.png" />
        <link rel="stylesheet" type="text/css" href="public/css/login.css" />
        <link rel="stylesheet" type="text/css" href="public/css/geral.css" />

    </head>
    <body>
        <div id="login">

            <img src="public/images/login-logo.png" alt="Área administrativa | Login" title="Área administrativa | Login" />

            <?php
            if(isset($status_login)):
                echo '<span class="ms '.$tipo_mensagem_login.'">'.$status_login.'</span>';
            endif;        
            ?>

            <div style="display:none">
                <span class="ms no">Erro</span>
                <span class="ms al">Alerta</span>
                <span class="ms in">Informação</span>
            </div>

            <form name="login" action="" method="post">
                <label>
                    <span>Login:</span>
                    <input type="text" class="radius" name="login" />
                </label>
                <label>
                    <span>Senha:</span>
                    <input type="password" class="radius" name="senha" />
                </label>
                <input type="submit" value="Logar-se" name="bt_login" class="btn" />
            </form>

        </div><!-- //login -->

    </body>
</html>