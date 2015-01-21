<?php

require $_SERVER['DOCUMENT_ROOT'].'config.php';

$id=filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);

$categoria=new \app\models\categoria();
$categoria->deletar($id);
echo 'deletou';