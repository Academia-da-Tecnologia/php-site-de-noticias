<?php
require $_SERVER['DOCUMENT_ROOT'] . '/config.php';
require '../functions/query_string.php';

//VERIFICA SE O ADMINISTRADOR ESTA LOGADO
\app\models\login::verificar_login('admin_logado');

//DESLOGAR DO SISTEMA
if (isset($_GET['logout'])):
    \app\models\login::deslogar('admin_logado');
endif;


//UPLOAD E CADASTRAR O BANNER
if (isset($_POST['enviar'])):

    $temp_foto = $_FILES['file_upload']['tmp_name'];
    $foto = $_FILES['file_upload']['name'];
    $categoria_id = $_POST['categoria'];

    //pegar slug da categoria pelo id do select
    $categoria = new app\models\categoria();
    $dados_categoria = $categoria->pegar_pelo_id('id', $categoria_id);

    $wide = \WideImage\WideImage::load($temp_foto);
    $imagem = new \app\classes\imagem();
    $nome_foto = $imagem->renomear($foto);
    $imagem->upload($wide, 'banners/slide', 600, 280);
    $imagem->upload($wide, 'banners/thumb', 290, 100);

    $slide = new \app\models\slide();
    $attributes = array(
        'tb_slide_caminho' => 'public/banners/slide/' . $nome_foto,
        'tb_slide_slug' => $dados_categoria->tb_categoria_slug,
        'tb_slide_categoria' => $categoria_id,
        'tb_slide_caminho_thumb' => 'public/banners/thumb/' . $nome_foto,
        'tb_slide_texto' => 'Temperinte interdum sempus odio urna eget curabitur semper convallis nunc laoreet.'
    );
    $slide->cadastrar($attributes);

endif;
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Painel Administrativo</title>

        <meta name="language" content="pt-br" /> 
        <meta name="robots" content="NOINDEX,NOFOLLOW" /> 

        <link rel="icon" type="image/png" href="../ico/chave.png" />
        <link rel="stylesheet" type="text/css" href="../public/css/painel.css" />
        <link rel="stylesheet" type="text/css" href="../public/css/geral.css" />
        <link rel="stylesheet" type="text/css" href="../public/css/basic.css" />
    </head>
    <body>
        <div id="painel">
            <div id="header">
                <div class="coom">
                    <a href="./" title="painel home" class="btnalt">painel home</a>
                    <a href="<?php echo site_url(); ?>" title="ver site" target="_blank" class="btnalt">ver site</a>
                    <a href="?logout" title="deslogar" class="btnalt">deslogar</a>
                </div><!-- /comm -->
            </div><!-- /header -->

            <div id="content">
                <ul class="nav"><?php require_once 'inc/nav.php'; ?></ul><!-- /nav -->
                <div class="pg">
                    <span style="display:none">
                        <span class="ms ok">ok</span>
                        <span class="ms no">Erro</span>
                        <span class="ms al">Alerta</span>
                        <span class="ms in">Informação</span>
                    </span>
                    <?php (isset($_GET['p'])) ? query_string($_GET['p']) : require_once 'inc/home.php'; ?>
                </div><!-- pg -->
            </div><!-- /content -->

            <div style="clear:both"></div> 
            <div id="footer">Desenvolvido por <a href="http://www.asolucoesweb.com.br" title="Sistema desenvolvido por Alexandre Cardoso">A Soluções Web</a></div>   
        </div><!-- //painel -->

        <script type="text/javascript" src="../public/js/jquery.js"></script>
        <script type="text/javascript" src="../public/js/jquery.simplemodal.js"></script>
        <script type="text/javascript" src="../public/tinymce/tinymce.min.js"></script>
        
        <script type="text/javascript"  src="../public/js/categoria.js"></script>
        <script type="text/javascript"  src="../public/js/artigo.js"></script>
        <script type="text/javascript"  src="../public/js/administrador.js"></script>
        <script type="text/javascript"  src="../public/js/publicidade.js"></script>
        <script type="text/javascript"  src="../public/js/slide.js"></script>
        <script type="text/javascript"  src="../public/js/emails.js"></script>
    </body>

</html>
