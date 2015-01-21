<?php
session_start();
ini_set('display_errors', E_ALL);
$root=$_SERVER['DOCUMENT_ROOT'];

define('HEADER', 1);
define('MIDDLE', 2);
define('FOOTER', 3);
define('SALT', 'senhasitedenoticias');

date_default_timezone_set('America/Sao_Paulo');
require_once $root.'public/functions/functions.php';
require_once $root.'vendor/autoload.php';
require_once $root.'autoload.php';
require_once $root.'connection.php';