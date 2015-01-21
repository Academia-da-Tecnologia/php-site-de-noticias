<?php
require $_SERVER['DOCUMENT_ROOT'] . 'config.php';

$id=  filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
$administrador=new \app\models\administrador();
$administrador->deletar($id);
echo 'deletou';