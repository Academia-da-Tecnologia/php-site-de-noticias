<?php require_once 'config.php'; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="EN" lang="EN" dir="ltr">
    <head profile="http://gmpg.org/xfn/11">
        <title>News Magazine</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="imagetoolbar" content="no" />
        <link rel="stylesheet" href="<?php echo site_url(); ?>public/styles/layout.css" type="text/css" />
        <link rel="stylesheet" href="<?php echo site_url(); ?>public/styles/basic.css" type="text/css" />
        <link rel="stylesheet" href="<?php echo site_url(); ?>public/bootstrap/css/bootstrap.css" type="text/css" />
    </head>
    <body id="top">
        <?php require 'inc/header.php'; ?>
        <?php (isset($_GET['p'])) ? app\classes\url::verificar_url($_GET['p']) : require_once 'inc/home.php'; ?>
        <?php require 'inc/footer.php'; ?>
    </body>
    <script type="text/javascript" src="<?php echo site_url(); ?>public/scripts/jquery-1.4.1.min.js"></script>
    <script type="text/javascript" src="<?php echo site_url(); ?>public/scripts/jquery.easing.1.3.js"></script>
    <script type="text/javascript" src="<?php echo site_url(); ?>public/scripts/jquery.timers.1.2.js"></script>
    <script type="text/javascript" src="<?php echo site_url(); ?>public/scripts/jquery.galleryview.2.1.1.min.js"></script>
    <script type="text/javascript" src="<?php echo site_url(); ?>public/scripts/facebook.js"></script>
    <script type="text/javascript" src="<?php echo site_url(); ?>public/scripts/google.js"></script>
    <script type="text/javascript" src="<?php echo site_url(); ?>public/scripts/twitter.js"></script>
    <script type="text/javascript" src="<?php echo site_url(); ?>public/scripts/jquery.galleryview.setup.js"></script>
    <script type="text/javascript" src="<?php echo site_url(); ?>public/scripts/jquery.simplemodal_1.js"></script>
    <script type="text/javascript" src="<?php echo site_url(); ?>public/scripts/admin.js"></script>
</html>